<?php

namespace App\Console\Commands;

use App\Models\Log;
use App\Models\User;
use Illuminate\Console\Command;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\DataProperty;

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
        User::all();
        \Illuminate\Support\Facades\Log::debug('Test');
        throw new \Exception("Command");

        return 0;
    }
}
