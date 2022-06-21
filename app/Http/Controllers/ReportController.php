<?php

namespace App\Http\Controllers;

use App\Models\Exception;
use App\Models\Project;
use App\Models\Stacktrace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
                file_put_contents(storage_path('req.json'), json_encode($req));
                Storage::put('/req.json', json_encode($req));

                $hash = hash('sha256',
                    $r->input('exception_class').$r->input('message').json_encode($r->input('stacktrace')));

                $exception = Exception::create([
                    'tracking_uuid' => $r->input('tracking_uuid'),
                    'project_id' => $project->id,

                    'context' => $r->input('context', new \stdClass()),
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

            });
        } catch (\Throwable $t) {

        }

    }
}
