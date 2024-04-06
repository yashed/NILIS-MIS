<?php

class Notification extends Controller
{
    public function index()
    {
        $notification = new NotificationModel();
        $data['notifications'] = $notification->findAll();
        $this->view('components/notification-bar/notification-sar', $data);
    }
    
    
}
