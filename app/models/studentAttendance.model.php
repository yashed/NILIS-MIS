<?php

/**
 * repeat students model
 */

class studentAttendance extends Model
{

    public $errors = [];
    protected $table = "student_attendance";
    protected $allowedColumns = [

        'id',
        'index_no',
        'attendance',
        'degree_name',
        'degree_id'
     ];

    
}