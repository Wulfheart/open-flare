<?php

namespace App\Requests\Report;

use App\Requests\Report\Context\Request;
use App\Requests\Report\Context\RequestData;
use App\Requests\Report\Context\Route;
use Spatie\LaravelData\Data;

class Context extends Data
{
    public function __construct(
        public Request $request,
        public RequestData $requestData,
        /** @var array<string: string> */
        public array $headers,
        public array $cookies,
        /** @var array<string: string> */
        public array $session,
        public Route $route,
        /** @var array<string: string> */
        public array $env,
        // public array
    ){}
}