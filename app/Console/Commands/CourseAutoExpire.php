<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Course;
use App\Models\CourseUser;
use Carbon\Carbon;

class CourseAutoExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course:autoexpire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the end date and expires the outdated courses';

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
        Course::where('ended_at', '<', Carbon::now())
            ->where('status_id', 8)
            ->update([
                'status_id' => 9,
            ]);
        CourseUser::where('ended_at', '<', Carbon::now())
            ->where('status_id', '=', 13)
            ->update([
                'status_id' => 15,
            ]);
    }
}
