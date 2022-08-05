<?php

namespace App\Console\Commands;

use App\Jobs\ParseHolidaysFileJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportHolidaysCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:holidays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import holidays.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Get 'local' storage disk - this is defined in config/filesystems.php.
        $disk = Storage::disk('local');
        //Get all files under the "Holidays" directory.
        $files = $disk->files('Holidays');

        //Iterate through all files in directory.
        foreach($files as $file) {
            //Dispatch a job for each file to process and create holidays within database.
            ParseHolidaysFileJob::dispatch($file);
        }

        return 0;
    }
}
