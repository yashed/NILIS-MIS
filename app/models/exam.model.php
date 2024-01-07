<?php


/**
 * courses model
 */
class Exam extends Model
{

    public $errors = [];
    protected $table = "exam";

    protected $allowedColumns = [
        'examID',
        'examType',
        'degreeID',
        'semester',
        'status'
    ];

    public function examValidate($data)
    {
        return true;
    }
}

?>