<?php
// delete_notification.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_notification'])) {
    // Get the notification ID from the form data
    $notify_id = $_POST['notify_id'];

    // Perform deletion using your delete function
    // For example:
    $notificationModel = new NotificationModel();
    $notificationModel->delete(['notify_id' => $notify_id]);

    // Redirect to a success page or reload the current page
    // header("Location: success.php");
    // exit();
}
?>
