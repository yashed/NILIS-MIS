<?php


/**
 * courses model
 */
class ResultSheet extends Model
{

    public $errors = [];
    protected $table = "mark_sheets";

    protected $allowedColumns = [
        'Id',
        'uploadName',
        'newName',
        'formId',
        'subjectCode',
        'date'

    ];


    public function examValidate($data)
    {
        return true;
    }
}

?>