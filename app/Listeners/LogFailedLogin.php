<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Failed;

class LogFailedLogin
{
  /**
     * Handle the event.
     *
     * @param  LogEvent  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        activity('session')
            ->by($event->user)
            ->on($event->user)
            ->log('login-failed');
    }
}
