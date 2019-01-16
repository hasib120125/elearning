<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImageRename extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:rename {folder_path}';

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
        $folder_path = $this->argument('folder_path');
        $files = scandir($folder_path);
        foreach ($files as $key => $file) {
            if ($key < 2) {
                continue;
            }
        }
    }
}
