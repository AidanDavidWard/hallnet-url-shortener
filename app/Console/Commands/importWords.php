<?php

namespace App\Console\Commands;

use App\Word;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class importWords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:words';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Takes any text files in storage/app/import and imports its words. Assumes that the last word on each line with the intended import word';

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
                $words = explode("\n", $file);
                $wordCount = count($words);
                $this->info("Importing $wordCount words");
                foreach ($words as $word) {
                    $word = preg_split('/\s+/', $word);
                    $word = end($word);
                    if ($word !== '') {
                        $word = Word::firstOrCreate(['name' => $word]);
                    } else {
                        $this->info('Word was excluded for being blank');
                    }
                }
            }
        } else {
            $this->error("No files found in storage/app/import");
        }
    }
}
