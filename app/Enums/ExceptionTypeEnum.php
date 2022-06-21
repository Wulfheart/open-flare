<?php

namespace App\Enums;

enum ExceptionTypeEnum: string
{
    case CLI = 'cli';
    case WEB = 'web';
    case QUEUE = 'queue';
}