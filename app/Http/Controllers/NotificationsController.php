<?php

namespace App\Http\Controllers;


use App\Repository\NotificationRepository;

class NotificationsController extends Controller
{
    /**
     * @var NotificationRepository
     */
    protected $notification;

    /**
     * NotificationsController constructor.
     * @param NotificationRepository $notification
     */
    public function __construct(NotificationRepository $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return mixed
     */
    public function show()
    {
        return $this->notification->ByNotificationAll();
    }

    /**
     * @return array
     */
    public function allread(){
        $this->notification->ByAllRead();
        return ['success'=>true];
    }

    /**
     *
     */
    public function notreadcount(){
       return $this->notification->notreadcount();
    }
}
