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
        'issuing_date'
     ];

    // public function countNotifications() {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count
    //         FROM notifications
    //         WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
    //         OR type = 'Examination' AND msg_type = 'Exam-end-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-start-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-end-alert'
    //         OR type = 'Study Leave' AND msg_type = 'student_attendance_alert';
    //     ";
    //     $res = $this->query($query);
    //     if($res) {
    //         return $res;
    //     }
    // }

    // public function countNotificationsDirector() {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count
    //         FROM notifications
    //         WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
    //         OR type = 'Examination' AND msg_type = 'Exam-end-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-start-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-end-alert'
    //         OR type = 'Examination' AND msg_type = 'director-remind';
    //     ";
    //     $res = $this->query($query);
    //     if($res) {
    //         return $res;
    //     }
    // }

    // public function countNotificationsSAR() {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count
    //         FROM notifications
    //         WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
    //         OR type = 'Examination' AND msg_type = 'Exam-end-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-start-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-end-alert'
    //         OR type = 'Examination' AND msg_type = 'Exam-attendance-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Send-warnings-alert';
    //     ";
    //     $res = $this->query($query);
    //     if($res) {
    //         return $res;
    //     }
    // }

    // public function countNotificationsDR() {
    //     $query = "
    //         SELECT COUNT(*) AS notification_count
    //         FROM notifications
    //         WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
    //         OR type = 'Examination' AND msg_type = 'Exam-end-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
    //         OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-start-alert'
    //         OR type = 'Study Leave' AND msg_type = 'Studyleave-end-alert'
    //         OR type = 'Examination' AND msg_type = 'payment_check_alert'
    //         OR type = 'Study Leave' AND msg_type = 'degree-changed-check';
    //     ";
    //     $res = $this->query($query);
    //     if($res) {
    //         return $res;
    //     }
    //       }

    //       public function countNotificationsAdmin() {
    //         $query = "
    //             SELECT COUNT(*) AS notification_count
    //             FROM notifications
    //             WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
    //             OR type = 'Examination' AND msg_type = 'Exam-end-alert'
    //             OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
    //             OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
    //             OR type = 'Study Leave' AND msg_type = 'Studyleave-start-alert'
    //             OR type = 'Study Leave' AND msg_type = 'Studyleave-end-alert'
    //             OR type = 'Examination' AND msg_type = 'payment_check_alert'
    //             OR type = 'Study Leave' AND msg_type = 'degree-changed-check';
    //         ";
    //         $res = $this->query($query);
    //         if($res) {
    //             return $res;
    //         }
             
            
    //     }

    //     public function countNotificationsAssistSAR() {
    //         $query = "
    //             SELECT COUNT(*) AS notification_count
    //             FROM notifications
    //             WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
    //             OR type = 'Examination' AND msg_type = 'Exam-end-alert'
    //             OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
    //             OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
    //             OR type = 'Study Leave' AND msg_type = 'Studyleave-start-alert'
    //             OR type = 'Study Leave' AND msg_type = 'Studyleave-end-alert'
    //             OR type = 'Examination' AND msg_type = 'Exam-attendance-alert'
    //             OR type = 'Study Leave' AND msg_type = 'Send-warnings-alert';
    //         ";
    //         $res = $this->query($query);
    //         if($res) {
    //             return $res;
    //         }
             
            
    //     }

    public function countNotificationsDR($sessionUsername) {
        $query = "
            SELECT COUNT(*) AS notification_count_dr
            FROM notifications
            WHERE ((type = 'Examination' AND msg_type = 'Exam-start-alert' AND usernames = ?)
                OR (type = 'Examination' AND msg_type = 'Exam-end-alert' AND usernames = ?)
                OR (type = 'Vacation' AND msg_type = 'Vacation-start-alert' AND usernames = ?)
                OR (type = 'Vacation' AND msg_type = 'Vacation-end-alert' AND usernames = ?)
                OR (type = 'Study Leave' AND msg_type = 'Studyleave-start-alert' AND usernames = ?)
                OR (type = 'Study Leave' AND msg_type = 'Studyleave-end-alert' AND usernames = ?)
                OR (type = 'Examination' AND msg_type = 'payment_check_alert')
                OR (type = 'Examination' AND msg_type = 'degree-changed-check'));
        ";
        // Pass the $sessionUsername for each placeholder
        $res = $this->query($query, [$sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername, $sessionUsername]);
        if($res) {
            return $res;
        }
    }

    
}
