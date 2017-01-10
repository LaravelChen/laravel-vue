<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/7
 * Time: 下午5:16
 */

namespace App\Repository;


use App\Article;

class VotesRepository
{

    /**
     * @param $id
     * @return mixed
     */
    public function ByArticleVoteCount($id)
    {
        $article= Article::find($id);
        return $article->votes_count;
    }

    /**
     * @param $id
     */
    public function AddandDe($id){
        $article= Article::find($id);
        if(\Auth::user()->voted($id)){
            $article->increment('votes_count');
        }else{
            $article->decrement('votes_count');
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function votefont($id){
        if(\Auth::user()->voted($id)){
            $font="已点赞";
        }else{
            $font="点赞";
        }
        return $font;
    }
}