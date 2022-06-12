<?php

namespace App\Requests\Report\Context;

use Spatie\LaravelData\Data;

class Request extends Data
{
    public function __construct(
        public string $url,
        public ?string $ip,
        public string $method,
        public string $useragent,
    ){
    }
}