<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Lockout;
use App\User;

class LogLockout
{
  /**
     * Handle the event.
     *
     * @param  LogEvent  $event
     * @return void
     */
    public function handle(Lockout $event)
    {
        $user = User::where('username', $event->request->username)->first();
        $user->is_locked = true;
        $user->save();
        activity('session')
            ->by($user)
            ->on($user)
            ->log('locked-out');
    }
}
