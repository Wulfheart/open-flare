<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Backtrace\Backtrace;
use Spatie\FlareClient\Report;
use Spatie\Ignition\Contracts\Solution;
use Spatie\Ignition\Ignition;

class ReportController extends Controller
{
    public function __invoke(Request $request){
        $req = $request->request->all();
        Storage::put('/req.json', json_encode($req));
        var_dump("HELLO WORLD");
        // $project = (new Report())->stacktrace(new Backtrace())
        // app(Ignition::class)->
        $x = 0;
    }
}
