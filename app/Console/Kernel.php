<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    public function bootstrap()
    {
        // Don't forget to call parent bootstrap
        parent::bootstrap();

        if (config('app.debug')) {
            try {
                // @phpstan-ignore-next-line
                xdebug_connect_to_client();
            } catch (\Throwable $t) {
                print_r("Even though debug mode is enabled it seems that you don't have XDebug installed\n\n");
            }
        }
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
