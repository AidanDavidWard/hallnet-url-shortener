<?php

namespace App\Console\Commands;

use App\Shortcode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class importShortcodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:shortcodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Takes any text files in storage/app/import and imports its shortcodes. Assumes that the last word on each line with the intended import word';

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
     * @return mixed
     */
    public function handle()
    {
        $local = Storage::disk('local');

        $files = $local->files('import');
        $fileCount = count($files);
        
        if ($fileCount > 0) {
            $this->info("Found $fileCount files to import");
            foreach ($files as $file) {
                $this->info("Importing $file");
                $file = $local->get($file);
                $shortcodes = explode("\n", $file);
                $shortcodeCount = count($shortcodes);
                $this->info("Importing $shortcodeCount shortcodes");
                foreach ($shortcodes as $shortcode) {
                    $shortcode = preg_split('/\s+/', $shortcode);
                    $shortcode = end($shortcode);
                    if ($shortcode !== '') {
                        $shortcode = Shortcode::firstOrCreate(['name' => $shortcode]);
                    } else {
                        $this->info('Shortcode was excluded for being blank');
                    }
                }
            }
        } else {
            $this->error("No files found in storage/app/import");
        }
    }
}
