<?php


/**
 * courses model
 */
class FinalMarks extends Model
{

    public $errors = [];
    protected $table = "final_marks";

    protected $allowedColumns = [
        'id',
        'studentIndexNo',
        'subjectCode',
        'examID',
        'degreeID',
        'finalMarks',
        'grade'



    ];

    public function finalMarkValidate($data)
    {
        return true;
    }
}

?>