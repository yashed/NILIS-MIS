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
        'degreeShortName',
        'examID',
        'semester',
        'indexNo',
        'subjectCode',
        'attempt',
        'paymentStatus',
        'written'

    ];

    public function repeatStudentDataValidation($data)
    {
        if ($this->where2(['indexNo' => $data->indexNo, 'subjectCode' => $data->subjectCode, 'attempt' => $data->attempt])) {
            $this->errors['exist'] = 'data already exists';
            return false;
        }

        return true;
    }
}
