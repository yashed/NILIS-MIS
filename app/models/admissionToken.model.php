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

        $student = new StudentModel();

        if ($student->where2(['indexNo' => $data['indexNo']])) {

            return true;
        } else {

            $this->errors['indexNo'] = 'Invalid Index Number';
            return false;
        }


    }
}

?>