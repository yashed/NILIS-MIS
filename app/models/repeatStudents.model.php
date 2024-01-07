<?php

/**
 * repeat students model
 */

class RepeatStudents extends Model
{

    public $errors = [];
    protected $table = "repeat_students";
    protected $allowedColumns = [

        'degreeID',
        'semester',
        'indexNo',
        'subjectCode',
        'attempt',
        'paymentStatus'

    ];

    public function repeatStudentValidation($data)
    {
        return true;
    }
}
