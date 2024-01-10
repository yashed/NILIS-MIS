<?php

/**
 * repeat students model
 */

class Subjects extends Model
{

    public $errors = [];
    protected $table = "subject";
    protected $allowedColumns = [

        'SubjectID',
        'SubjectCode',
        'SubjectName',
        'NoCredits',
        'DegreeID',


    ];

    public function repeatStudentValidation($data)
    {
        return true;
    }
}
