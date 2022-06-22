<?php

namespace App\DTO\Context;

use Spatie\DataTransferObject\DataTransferObject;

class Logs extends DataTransferObject
{
    public string $message;

    public string $level;

    public array $context;

    public float $microtime;
}
