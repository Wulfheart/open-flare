<?php

namespace App\Requests\Report\Context;

class Route
{
    public function __construct(
        public string $route,
        /** @var array<string: string> $routeParameters */
        public array $routeParameters,
        public string $controllerAction,
        /** @var array<int: string> $middleware */
        public array $middleware,
    ){}
}