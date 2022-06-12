<?php

namespace App\Requests\Report\Context;

class RequestData
{
    public function __construct(
        /** @var array<string, string> $queryString */
        public array $queryString,
        public array $body,
        public array $files,
    ){}

}