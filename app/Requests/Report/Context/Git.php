<?php

namespace App\Requests\Report\Context;

use Spatie\LaravelData\Data;

class Git extends Data
{
    public function __construct(
        public string $hash,
        public string $message,
        public string $tag,
        public string $remote,
        public bool $isDirty,
    ) {
    }
}
