<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/9
 * Time: 上午7:32
 */

namespace App\Repository;


use App\Notification;
use App\User;

class NotificationRepository
{
    /**
     * @param $result
     * @return static
     */
    public function notificationcreat($result)
    {
        $user = User::where('name', $result->reply_name)->first();
        return Notification::create([
            'from_name' => \Auth::user()->name,
            'user_id' => $user->id,
            'article_id' => $result->article_id,
            'comment_id' => $result->id,
            'is_read' => 0,
        ]);
    }

    /**
     * @return mixed
     */
    public function ByNotificationAll()
    {
        $result = Notification::where('user_id', \Auth::id())->get();
        foreach ($result as $notification) {
            $notification->body = $notification->comment->body;
            $notification->avatar=$notification->user->avatar;
        }
        return $result;
    }

    /**
     *
     */
    public function ByAllRead(){
        $result=Notification::where(['user_id'=>\Auth::id(),'is_read'=>0])->get();
        foreach($result as $notification){
            $notification->update([
                'is_read'=>1
            ]);
        };
    }

    /**
     * @return mixed
     */
    public function notreadcount(){
       return Notification::where(['user_id'=>\Auth::id(),'is_read'=>0])->count();
    }
}