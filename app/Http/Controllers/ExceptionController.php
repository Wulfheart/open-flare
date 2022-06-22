<?php

namespace App\Http\Controllers;

use App\DTO\Context\Context;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = file_get_contents(__DIR__.'/data.json');

        $decoded = json_decode($data, true);
        $context = collect($decoded)->get('context');

        $ctx = new Context($context);

        $x = $ctx->logs[0]->message;

        return response('Ok');
    }
}
