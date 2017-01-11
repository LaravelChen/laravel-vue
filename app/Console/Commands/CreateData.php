<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create date';

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
        $this->call('key:generate');
        $this->call('migrate');
        $this->call('db:seed');
        $this->info('恭喜您，数据创建完毕!哈哈!');
    }
}
