<?php

namespace App\Console\Commands;

use App\MyCommand\MyCommand;
use App\User;
use Illuminate\Console\Command;

class Blog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create An Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $mycommand;
    public function __construct(MyCommand $mycommand)
    {
        parent::__construct();
        $this->mycommand=$mycommand;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('请输入管理员名字?');
        $email = $this->ask('请输入管理员邮箱?');
        $password = $this->ask('请输入密码?');
        $this->mycommand->createadmin($name,$password,$email);
        $this->info('恭喜您!创建管理员成功!哈哈!');
    }
}
