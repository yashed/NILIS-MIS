<?php

class Notification extends Controller
{
    public function index()
    {
        $notification = new NotificationModel();
        $data['notifications'] = $notification->findAll();

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['notify_id'])) {
            $notifyId = htmlspecialchars($_POST['notify_id']);
        
            // Initialize the NotificationModel or any other necessary classes
            // $notificationModel = new NotificationModel(); // Uncomment this line if you have a NotificationModel class
        
            // Call the delete method to delete the notification
            // Replace NotificationModel with your actual model name and delete with your actual method name
            // $notificationModel->delete($notifyId); // Uncomment this line if you have a delete method in your model
            $notification = new NotificationModel();
            $notification->delete($notifyId);
            // Return a response to the client-side JavaScript to indicate success or failure
            echo "Notification deleted successfully"; // You can customize this response as needed
        } else {
            http_response_code(400); // Bad request status code
            echo "Invalid request"; // You can customize this error message as needed
        }
        $this->view('components/notification-bar/notification-box', $data);
 }
    
    
}
