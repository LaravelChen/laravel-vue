<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/11
 * Time: 上午11:24
 */

namespace App\MyCommand;


use App\User;
use \Hash;

class MyCommand
{
    public function createadmin($data){
       return User::create([
            'name'=>$data['name'],
            'password'=>$data['password'],
            'email'=>$data['email'],
            'avatar'=>'picture/default.png',
            'is_admin'=>1,
            'remember_token' => str_random(40),
        ]);
    }
}