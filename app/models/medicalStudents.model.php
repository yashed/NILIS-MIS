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
        'status'

    ];

    public function medicalStudentValidation($data)
    {
        return true;
    }
}
