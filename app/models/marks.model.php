<?php


/**
 * courses model
 */
class Marks extends Model
{

    public $errors = [];
    protected $table = "marks";

    protected $allowedColumns = [
        'id',
        'studentIndexNo',
        'subjectCode',
        'degreeID',
        'examID',
        'examiner1Marks',
        'examiner2Marks',
        'examiner3Marks',
        'assessmentMarks'


    ];

    public function markValidate($data)
    {
        return true;
    }
}

?>