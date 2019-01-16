<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Exam;
use App\Models\ExamUser;
use Carbon\Carbon;

class ExamAutoExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exam:autoexpire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the end date and expires the outdated exams';

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
        Exam::where('expired_at', '<', Carbon::now())
            ->where('status_id', 1)
            ->update([
                'status_id' => 2,
            ]);
        ExamUser::where('ended_at', '<', Carbon::now())
            ->where('status_id', '=', 3)
            ->update([
                'status_id' => 6,
            ]);
    }
}
