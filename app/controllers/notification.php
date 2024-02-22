<?php

class Notification extends Controller
{
    public function index()
    {
        $notification = new NotificationModel();

        $data['notifications'] = $notification->findAll();

 }
    
    
}
