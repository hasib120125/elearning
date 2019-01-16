<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Question;
use Carbon\Carbon;

class QuestionAutoExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'question:autoexpire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Question::where('expired_at', '<', Carbon::now())
            ->where('status_id', 7)
            ->update([
            'status_id' => 8,
        ]);
    }
}
