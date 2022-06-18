<?php

namespace App\Http\Controllers;

use App\Models\Exception;
use App\Models\Project;
use Illuminate\Http\Request;
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
        if($project == null) {
            abort(StatusCode::NOT_FOUND);
        }


        $r = $request;
        // $req = $request->request->all();
        // Storage::put('/req.json', json_encode($req));

        $hash = hash('sha256', $r->input('exception_class').$r->input('message') . json_encode($r->input('stacktrace')));

        $exception = Exception::create([
            'id' => Str::uuid()->toString(),
            'tracking_uuid' => $r->input('tracking_uuid'),

            'git_hash' => $r->input('context.git.hash'),
            'git_message' => $r->input('context.git.message'),
            'git_tag' => $r->input('context.git.tag'),
            'git_remote' => $r->input('context.git.remote'),
            'git_isDirty' => $r->input('context.git.isDirty'),

            'env' => $r->input('context.env'),
            'route' => $r->input('context.route'),
            'headers' => $r->input('context.headers'),
            'command_args' => $r->input('context.arguments'),
            'request' => $r->input('context.request'),
            'request_data_body' => $r->input('context.request_data.body'),
            'request_data_files' => $r->input('context.request_data.files'),
            'request_data_query_string' => $r->input('context.request_data.queryString'),
            'cookies' => $r->input('context.cookies'),
            'session' => $r->input('session'),
            'user' => $r->input('context.user'),
            'user_id' => $r->input('context.user.id'),
            'similarity_hash' => $hash,
            ... $r->all([
                'notifier', 'language', 'framework_version', 'language_version', 'exception_class', 'seen_at',
                'message',
                'stage', 'message_level', 'application_version',
            ]),


        ]);
    }
}
