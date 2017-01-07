<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/2
 * Time: 下午3:58
 */

namespace App\Repository;


use App\User;

class UsersRepository
{
    public function store($info)
    {
        return User::create($info);
    }

    public function ById($id)
    {
        return User::find($id);
    }
}