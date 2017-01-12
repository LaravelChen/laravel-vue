<?php

namespace App\Console\Commands;

use App\MyCommand\MyCommand;
use Illuminate\Console\Command;
use Validator;

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
        $password = $this->secret('请输入密码?');
        $data = [
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ];
        if ( $this->register($data) ) {
            $this->info('恭喜您!创建管理员成功!哈哈!');
        } else {
            $this->error('抱歉您填写的数据有误!请确保您的用户名和邮箱是唯一的，密码至少6位!');
        }

    }

    public function register($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if (!$validator->passes()) {
            return false;
        }

        return $this->mycommand->createadmin($data);
    }
}
