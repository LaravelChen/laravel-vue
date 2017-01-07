<?php

namespace App\Http\Controllers;

use App\Repository\CommentsRepository;
use Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comment;

    /**
     * CommentsController constructor.
     * @param CommentsRepository $comment
     */
    public function __construct(CommentsRepository $comment)
    {
        $this->comment=$comment;
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
            $data->user_id=$data->user->id;
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
        $result->article()->increment('comments_count');
        $result->time=$result->updated_at->diffForHumans();
        $result->name=$result->user->name;
        $result->reply_name=$result->reply_name;
        $result->avatar=$result->user->avatar;
        return $result;
    }
}
