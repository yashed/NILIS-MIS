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

    public function countNotifications() {
        $query = "
            SELECT COUNT(*) AS notification_count
            FROM notifications
            WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
            OR type = 'Examination' AND msg_type = 'Exam-end-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-start-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-end-alert'
            OR type = 'Study leave' AND msg_type = 'student_attendance_alert';
        ";
        $res = $this->query($query);
        if($res) {
            return $res;
        }
    }

    public function countNotificationsDirector() {
        $query = "
            SELECT COUNT(*) AS notification_count
            FROM notifications
            WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
            OR type = 'Examination' AND msg_type = 'Exam-end-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-start-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-end-alert'
            OR type = 'Examination' AND msg_type = 'director-remind';
        ";
        $res = $this->query($query);
        if($res) {
            return $res;
        }
    }

    public function countNotificationsSAR() {
        $query = "
            SELECT COUNT(*) AS notification_count
            FROM notifications
            WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
            OR type = 'Examination' AND msg_type = 'Exam-end-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-start-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-end-alert'
            OR type = 'Examination' AND msg_type = 'Exam-attendance-alert'
            OR type = 'Study leave' AND msg_type = 'Send-warnings-alert';
        ";
        $res = $this->query($query);
        if($res) {
            return $res;
        }
    }

    public function countNotificationsDR() {
        $query = "
            SELECT COUNT(*) AS notification_count
            FROM notifications
            WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
            OR type = 'Examination' AND msg_type = 'Exam-end-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
            OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-start-alert'
            OR type = 'Study leave' AND msg_type = 'Studyleave-end-alert'
            OR type = 'Examination' AND msg_type = 'payment_check_alert'
            OR type = 'Study leave' AND msg_type = 'degree-changed-check';
        ";
        $res = $this->query($query);
        if($res) {
            return $res;
        }
          }

          public function countNotificationsAdmin() {
            $query = "
                SELECT COUNT(*) AS notification_count
                FROM notifications
                WHERE type = 'Examination' AND msg_type = 'Exam-start-alert'
                OR type = 'Examination' AND msg_type = 'Exam-end-alert'
                OR type = 'Vacation' AND msg_type = 'Vacation-start-alert'
                OR type = 'Vacation' AND msg_type = 'Vacation-end-alert'
                OR type = 'Study leave' AND msg_type = 'Studyleave-start-alert'
                OR type = 'Study leave' AND msg_type = 'Studyleave-end-alert'
                OR type = 'Examination' AND msg_type = 'payment_check_alert'
                OR type = 'Study leave' AND msg_type = 'degree-changed-check';
            ";
            $res = $this->query($query);
            if($res) {
                return $res;
            }
             
            
        }
}
