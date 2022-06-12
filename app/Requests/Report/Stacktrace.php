<?php

namespace App\Requests\Report;

use Spatie\LaravelData\Data;

class Stacktrace extends Data
{
    public function __construct(
        public string $file,
        public int $line_number,
        public string $method,
        public string $class,
        /** @var array{string: string} $code_snippet */
        public array $code_snippet,
        public bool $application_frame,
    ){}
}