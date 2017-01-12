<?php

namespace App\Http\Controllers;

use App\Repository\CommentsRepository;
use App\Repository\NotificationRepository;
use Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comment;
    protected  $notification;


    /**
     * CommentsController constructor.
     * @param CommentsRepository $comment
     * @param NotificationRepository $notification
     */
    public function __construct(CommentsRepository $comment, NotificationRepository $notification)
    {
        $this->comment=$comment;
        $this->notification=$notification;
        $this->middleware('auth')->except('commentlist');
    }

    /**
     * @param Request $request
     * @return static
     */
    public function store(Request $request)
    {
        $result=$this->comment->store(array_merge($request->all(),["user_id"=>Auth::id()]));
        $result->article()->increment('comments_count');
        $result->time=$result->updated_at->diffForHumans();
        $result->name=$result->user->name;
        $result->avatar=$result->user->avatar;
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function commentlist($id)
    {
        $result= $this->comment->ByArticleId($id);
        foreach($result as $data){
            $data->time=$data->updated_at->diffForHumans();
            $data->name=$data->user->name;
            $data->avatar=$data->user->avatar;
        }
        return $result;
    }

    /**
     * @param Request $request
     * @return static
     */
    public function reply(Request $request)
    {
        $result=$this->comment->store(array_merge($request->all(),["user_id"=>Auth::id()]));
        $this->notification->notificationcreat($result);
        $result->article()->increment('comments_count');
        $result->time=$result->updated_at->diffForHumans();
        $result->name=$result->user->name;
        $result->reply_name=$result->reply_name;
        $result->avatar=$result->user->avatar;
        return $result;
    }

    /**
     * @return mixed
     */
    public function commenttotal(){
        $total= $this->comment->ByUserId();
        foreach($total as $comment){
            $comment->title=$comment->article->title;
        }
        return $total;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editcommentshow($id){
        $result= $this->comment->Byid($id);
        return $result->body;
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function editcommentupdate(Request $request, $id)
    {
        $result= $this->comment->Byid($id);
        $result->update([
            'body'=>$request->get('body')
        ]);
        return ['article_id'=>$result->article_id];
    }
}
