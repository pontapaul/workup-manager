<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckAddJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a check job in the queue.';

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
        dispatch(new \App\Jobs\CheckSites);
        $this->info('Job added');
    }
}
