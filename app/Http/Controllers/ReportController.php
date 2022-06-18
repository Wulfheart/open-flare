<?php

namespace App\Http\Controllers;

use App\Models\Exception;
use App\Models\Log;
use App\Models\Project;
use App\Models\Query;
use App\Models\Stacktrace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Backtrace\Backtrace;
use Spatie\FlareClient\Report;
use Spatie\Ignition\Contracts\Solution;
use Spatie\Ignition\Ignition;
use Teapot\StatusCode;

class ReportController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var string $key */
        $key = $request->header('x-api-token');
        /** @var Project $project */
        $project = Project::query()->where('key', '=', $key)->first();
        if ($project == null) {
            abort(StatusCode::NOT_FOUND);
        }

        try {
            DB::transaction(function () use ($request, $project) {

                $r = $request;
                $req = $request->request->all();
                Storage::put('/req.json', json_encode($req));

                $hash = hash('sha256',
                    $r->input('exception_class').$r->input('message').json_encode($r->input('stacktrace')));

                $exception = Exception::create([
                    'tracking_uuid' => $r->input('tracking_uuid'),
                    'project_id' => $project->id,

                    'git_hash' => $r->input('context.git.hash'),
                    'git_message' => $r->input('context.git.message'),
                    'git_tag' => $r->input('context.git.tag'),
                    'git_remote' => $r->input('context.git.remote'),
                    'git_isDirty' => $r->input('context.git.isDirty'),

                    'env' => $r->input('context.env', new \stdClass()),
                    'route' => $r->input('context.route', new \stdClass()),
                    'headers' => $r->input('context.headers', new \stdClass()),
                    'command_args' => $r->input('context.arguments', []),
                    'request' => $r->input('context.request', new \stdClass()),
                    'request_data_body' => $r->input('context.request_data.body', new \stdClass()),
                    'request_data_files' => $r->input('context.request_data.files', new \stdClass()),
                    'request_data_query_string' => $r->input('context.request_data.queryString', new \stdClass()),
                    'cookies' => $r->input('context.cookies', new \stdClass()),
                    'session' => $r->input('session', new \stdClass()),
                    'user' => $r->input('context.user', new \stdClass()),
                    'user_id' => $r->input('context.user.id'),
                    'similarity_hash' => $hash,
                    ... $r->all([
                        'notifier', 'language', 'framework_version', 'language_version', 'exception_class', 'seen_at',
                        'message',
                        'stage', 'message_level', 'application_version',
                    ]),
                ]);

                $stacktrace = $request->input('stacktrace', []);
                foreach ($stacktrace as $index => $s) {
                    Stacktrace::create([
                        'file' => $s['file'],
                        'line_number' => $s['line_number'],
                        'method' => $s['method'],
                        'class' => $s['class'],
                        'application_frame' => $s['application_frame'],
                        'code_snippet' => $s['code_snippet'],
                        'ordinal_number' => $index,
                        'exception_id' => $exception->id,
                    ]);
                }

                $queries = $request->input('context.queries', []);
                foreach ($queries as $query) {
                    Query::create([
                        'exception_id' => $exception->id,
                        'time' => $query['time'],
                        'microtime' => $query['microtime'],
                        'bindings' => $query['bindings'],
                        'connection_name' => $query['connection_name'],
                        'sql' => $query['sql']
                    ]);
                }

                $logs = $request->input('context.logs', []);
                foreach ($logs as $log) {
                    Log::create([
                        'exception_id' => $exception->id,
                        'message' => $log['message'],
                        'level' => $log['level'],
                        'context' => $log['context'],
                        'microtime' => $log['microtime'],
                    ]);
                }
            });
        } catch (\Throwable $t) {

        }

    }
}
