<?php

/**
 * medical student model
 */

class MedicalStudents extends Model
{

    public $errors = [];
    protected $table = "medical_students";
    protected $allowedColumns = [

        'degreeID',
        'semester',
        'indexNo',
        'subjectCode',
        'attempt',
        'status',
        'written'

    ];

    public function medicalStudentValidation($data)
    {
        return true;
    }
    public function medicalStudentDataValidation($data)
    {
        if ($this->where2(['indexNo' => $data->indexNo, 'subjectCode' => $data->subjectCode, 'attempt' => $data->attempt])) {
            $this->errors['exist'] = 'data already exists';
            return false;
        }

        return true;
    }
}
