<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\DataProperty;

class A {
    public string $x;
}

class B {
    public string $y;
    public string $z;
}




class Containment {
    public A|B $prop;
}


class TryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'try';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $json = '{"prop": {"x": "test"}}';

        $decoded = json_decode($json);
        throw new \Exception("From console");

        return 0;
    }
}
