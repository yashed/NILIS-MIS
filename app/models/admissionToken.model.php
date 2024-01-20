<?php


/**
 * courses model
 */
class AdmissionToken extends Model
{

    public $errors = [];
    protected $table = "index_token";

    protected $allowedColumns = [
        'id',
        'indexNo',
        'examID',
        'token'

    ];

    public function Validate($data)
    {
        return true;
    }
}

?>