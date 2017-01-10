<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/10
 * Time: 上午8:38
 */

namespace App\Repository;


use App\Article;
use App\Comment;
use App\Notification;
use App\User;

class AdminRepository
{
    /**
     * @return array
     */
    public function dashboardcount(){
        return [
            'userscount'=>User::all()->count(),
            'articlecount'=>Article::all()->count(),
            'commentcount'=>Comment::all()->count(),
        ];
    }

    /**
     * @return mixed
     */
    public function getinfo(){
        return User::find(\Auth::id());
    }

    /**
     * @return mixed
     */
    public function allusersinfo(){
        return User::latest()->get();
    }

    /**
     * @return mixed
     */
    public function articles(){
        return Article::latest()->get();
    }

    /**
     * @return mixed
     */
    public function comments(){
        $comments=Comment::latest()->get();
        foreach($comments as $comment){
            $comment->name=$comment->user->name;
        }
        return $comments;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function singleuser($id){
        return User::find($id);
    }

    /**
     * @param $id
     * @param $request
     * @return array
     */
    public function updatesingleuser($id, $request){
        $user=User::find($id);
        $user->update($request);
        return ['success'=>'true'];
    }

    /**
     * @param $id
     * @return array
     */
    public function deletesingleuser($id){
        $user=User::find($id);
        $user->delete();
        return ['success'=>'true'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function singlecomment($id){
        return Comment::find($id);
    }

    /**
     * @param $id
     * @param $request
     * @return array
     */
    public function updatesinglecomment($id, $request){
        $comment=Comment::find($id);
        $comment->update($request);
        return ['success'=>'true'];
    }

    /**
     * @param $id
     * @return array
     */
    public function deletesinglecomment($id){
        $comment=Comment::find($id);
        if($comment->reply_name!=''){
            $comment->notification->delete();
        }
        $article=Article::find($comment->article_id);
        $article->decrement('comments_count');
        $comment->delete();
        return ['success'=>'true'];
    }

    /**
     * @param $request
     * @return array
     */
    public function uploadsinglearticle($request){
        Article::create(array_merge($request,['user_id'=>\Auth::id()]));
        return ['success'=>'true'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editsinglearticle($id){
        return Article::find($id);
    }

    /**
     * @param $id
     * @param $request
     * @return array
     */
    public function updatesinglearticle($id, $request){
        $article=Article::find($id);
        $article->update($request);
        return ['success'=>'true'];
    }

    /**
     * @param $id
     * @return array
     */
    public function deletesinglearticle($id){
        $article=Article::find($id);
        $article->delete();
        return ['success'=>'true'];
    }
}