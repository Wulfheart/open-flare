<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Flare;
use Spatie\Ignition\Config\IgnitionConfig;
use Spatie\Ignition\Contracts\SolutionProviderRepository;
use Spatie\Ignition\Ignition;
use Spatie\LaravelIgnition\ContextProviders\LaravelContextProviderDetector;
use Spatie\LaravelIgnition\Solutions\SolutionTransformers\LaravelSolutionTransformer;
use Spatie\LaravelIgnition\Support\LaravelDocumentationLinkFinder;
use Throwable;

class ExceptionController extends Controller
{
    public function __invoke(Request $request)
    {
        // $data = file_get_contents(__DIR__ . '/data.json');
        // // return response()->json($data);
        // $decoded  = json_decode($data);

        $user = User::factory()->create();
        Auth::login($user);

        Log::debug("Debug", [
            "Context" => true,
            "message" => "EPwdkf",
            "number" => 1
        ]);


        throw new \Exception("Exception");

        return response("Ok");
    }
}
