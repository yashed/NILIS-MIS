<?php

/**
 * exam participants model
 */

class ExamParticipants extends Model
{

    public $errors = [];
    protected $table = "exam_participants";
    protected $allowedColumns = [
        'examID',
        'degreeID',
        'semester',
        'indexNo',
        'attempt',
        'studentType',

    ];

    public function examParticipantValidation($data)
    {
        return true;
    }
}
