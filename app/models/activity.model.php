<?php


/**
 * courses model
 */
class Activity extends Model
{

    public $errors = [];
    protected $table = "activity";

    protected $allowedColumns = [
        'id',
        'user',
        'discription',
        'date',
        'time'

    ];

    public function Validate($data)
    {
        return true;
    }
}

?>