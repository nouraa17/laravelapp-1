<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;


class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automating Daily Backups';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // https://www.itsolutionstuff.com/post/laravel-10-daily-weekly-monthly-automatic-database-backupexample.html'
        $filename = "backup-" . now()->format('Y-m-d') . ".gz";
    
        $command = env('DB_DUMP_BINARY_PATH') . " --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD')
        . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE')
        . " | \"C:\\Program Files\\7-Zip\\7z.exe\" a -si " . storage_path() . "backup\\" . $filename ;
        
        $returnVar = NULL;
        $output  = NULL;
    
        exec($command, $output, $returnVar);
    }

}
