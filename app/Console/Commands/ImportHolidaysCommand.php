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
    protected $description = 'Import holidays from storage//app//public//holidays folder.';

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
        $disk = Storage::disk('local');
        $files = $disk->files('Holidays');

        foreach($files as $file) {
            ParseHolidaysFileJob::dispatch($file);
        }

        return 0;
    }
}
