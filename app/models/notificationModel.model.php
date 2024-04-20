<?php

/**
 * repeat students model
 */

class NotificationModel extends Model
{

    public $errors = [];
    protected $table = "notifications";
    protected $allowedColumns = [

        'notify_id',
        'description',
        'type',
        'msg_type',
        'issuing_date',
        'usernames'
     ];

    //  public function countNotifications($sessionUsername) {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count
    //         FROM notifications
    //         WHERE ((type = 'Examination' AND msg_type = 'Exam-start-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-end-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-start-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-end-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-start-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-end-alert' AND usernames = ?))
    //             OR (type = 'Study Leave' AND msg_type = 'student_attendance_alert');
    //     ";
    //     // Pass the $sessionUsername for each placeholder
    //     $res = $this->query($query, [$sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername]);
    //     if($res) {
    //         return $res;
    //     }
    // }

    // public function countNotificationsDirector($sessionUsername) {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count_director
    //         FROM notifications
    //         WHERE ((type = 'Examination' AND msg_type = 'Exam-start-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-end-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-start-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-end-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-start-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-end-alert' AND usernames = ?))
    //             OR (type = 'Examination' AND msg_type = 'director-remind');
    //     ";
    //     // Pass the $sessionUsername for each placeholder
    //     $res = $this->query($query, [$sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername]);
    //     if($res) {
    //         return $res;
    //     }
    // }
    
   

    // public function countNotificationsSAR($sessionUsername) {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count_sar
    //         FROM notifications
    //         WHERE ((type = 'Examination' AND msg_type = 'Exam-start-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-end-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-start-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-end-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-start-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-end-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-attendance-alert')
    //             OR (type = 'Study Leave' AND msg_type = 'Send-warnings-alert'));
    //     ";
    //     // Pass the $sessionUsername for each placeholder
    //     $res = $this->query($query, [$sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername]);
    //     if($res) {
    //         return $res;
    //     }
    // }
    

    // public function countNotificationsDR($sessionUsername) {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count_dr
    //         FROM notifications
    //         WHERE ((type = 'Examination' AND msg_type = 'Exam-start-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-end-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-start-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-end-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-start-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-end-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'payment_check_alert')
    //             OR (type = 'Examination' AND msg_type = 'degree-changed-check'));
    //     ";
    //     // Pass the $sessionUsername for each placeholder
    //     $res = $this->query($query, [$sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername]);
    //     if($res) {
    //         return $res;
    //     }
    // }
    

    //       public function countNotificationsAdmin($sessionUsername) {
    //         $query = "
    //         SELECT COUNT(*) AS notification_count_admin
    //         FROM notifications
    //         WHERE ((type = 'Examination' AND msg_type = 'Exam-start-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-end-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-start-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-end-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-start-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-end-alert' AND usernames = ?));
    //     ";
    //     // Pass the $sessionUsername for each placeholder
    //     $res = $this->query($query, [$sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername]);
    //     if($res) {
    //         return $res;
    //     }
             
            
    //     }

    //     public function countNotificationsAssistSAR($sessionUsername) {
    //         $query = "
    //         SELECT COUNT(*) AS notification_count_Asar
    //         FROM notifications
    //         WHERE ((type = 'Examination' AND msg_type = 'Exam-start-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-end-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-start-alert' AND usernames = ?)
    //             OR (type = 'Vacation' AND msg_type = 'Vacation-end-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-start-alert' AND usernames = ?)
    //             OR (type = 'Study Leave' AND msg_type = 'Studyleave-end-alert' AND usernames = ?)
    //             OR (type = 'Examination' AND msg_type = 'Exam-attendance-alert')
    //             OR (type = 'Study Leave' AND msg_type = 'Send-warnings-alert'));
    //     ";
    //     // Pass the $sessionUsername for each placeholder
    //     $res = $this->query($query, [$sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername]);
    //     if($res) {
    //         return $res;
    //     }
             
            
    //     }
}
