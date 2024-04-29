<?php

class Notification extends Controller
{
    public function index()
    {
        $notification = new NotificationModel();
        $data['notifications'] = $notification->findAll();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_notification'])) {

            $notify_id = $_POST['notify_id'];
            
            $notificationModel = new NotificationModel();
            $notificationModel->delete(['notify_id' => $notify_id]);
            
            $returnUrl = $_SERVER['HTTP_REFERER'];
            header("Location: $returnUrl");
            exit();
        }

        // Load the view with notifications data
        $this->view('components/notification-bar/notification-box', $data);
    }
}
