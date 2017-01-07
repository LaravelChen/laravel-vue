<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/1
 * Time: 下午10:07
 */

namespace App\Repository;


use App\Article;

class ArticlesRepository
{
    public function Byid($id){
        return Article::find($id);
    }

    public function ByAll(){
        return Article::all();
    }
}