<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class seedMinio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:minio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed minio database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $time_start = microtime(true); 

        for ($i=0; $i < 100; $i++) { 
            Storage::cloud()->put("hello-{$i}.json", '{"hello-{'.$i.'}": "world"}');
        }
        $time_end = microtime(true);

        $execution_time = $time_end - $time_start;
        
        $this->info('Total Execution Time: '.$execution_time.' sec');

        return Command::SUCCESS;
    }
}
