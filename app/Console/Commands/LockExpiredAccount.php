<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class LockExpiredAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:lock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lock accounts after a certain period of changing password';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::chunk(100, function ($users) {
            foreach ($users as $user) {
                $last_password_history = $user->passwordHistories()->latest()->first();
                if (!empty($last_password_history) && $last_password_history->created_at->diffInDays(Carbon::now()) >= 45) {
                    $user->is_default_password = true;
                    $user->disableLogging();
                    $user->save();
                    activity('users')
                        ->on($user)
                        ->log('password-expired');
                    $user->enableLogging();
                }
            }
        });
    }
}
