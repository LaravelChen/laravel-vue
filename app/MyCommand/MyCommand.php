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
    public function createadmin($name,$password,$email){
       return User::create([
            'name'=>$name,
            'password'=>Hash::make($password),
            'email'=>$email,
            'avatar'=>'picture/default.png',
            'is_admin'=>1,
            'remember_token' => str_random(10),
        ]);
    }
}