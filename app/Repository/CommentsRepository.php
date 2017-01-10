<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/1
 * Time: 下午10:48
 */

namespace App\Repository;


use App\Comment;

class CommentsRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function Byid($id){
        return Comment::find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function ByAll(){
        return Comment::all();
    }

    /**
     * @param $info
     * @return static
     */
    public function store($info)
    {
        return Comment::create($info);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function ByArticleId($id){
       return Comment::where('article_id',$id)->get();
    }

    /**
     * @return mixed
     */
    public function  ByUserId(){
        return Comment::where('user_id',\Auth::id())->get();
    }
}