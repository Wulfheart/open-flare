<?php

namespace App\Http\Controllers;

use App\DTO\Context\Context;
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
        $data = file_get_contents(__DIR__ . '/data.json');

        $decoded = json_decode($data, true);
        $context = collect($decoded)->get('context');

        $ctx = new Context($context);

        $x = $ctx->logs[0]->message;

        return response("Ok");
    }
}
