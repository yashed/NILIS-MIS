<?php

class Notification extends Controller
{
    public function index()
    {
        $notification = new NotificationModel();
        $data['notifications'] = $notification->findAll();

        // Check if the delete notification form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_notification'])) {
            // Get the notify_id from the request
            $notify_id = $_POST['notify_id'];
            
            // Delete the notification with the given notify_id
            $notificationModel = new NotificationModel();
            $notificationModel->delete(['notify_id' => $notify_id]);
            
            // Redirect back to the page that called the component
            $returnUrl = $_SERVER['HTTP_REFERER'];
            header("Location: $returnUrl");
            exit();
        }

        // Load the view with notifications data
        $this->view('components/notification-bar/notification-box', $data);
    }
}
