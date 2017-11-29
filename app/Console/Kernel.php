<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Action;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::transaction(function () {
                $actions = Action::where('state', 'started')->lockForUpdate()->get();

                foreach ($actions as $action){
                    $user_point = $action->user->userPoint->lockForUpdate()->first();

                    $user_point->update([
                        'approval_point' => ($user_point->approval_point + $action->point),
                        'pending_point' => ($user_point->pending_point - $action->point),
                    ]);

                    $action->update([
                        'state' => 'approval'
                    ]);
                }
            });
        })->hourly();

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
