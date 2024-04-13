<?php


/**
 * courses model
 */
class Examiner3Subject extends Model
{

    public $errors = [];
    protected $table = "examiner3_eligibility";

    protected $allowedColumns = [
        'id',
        'subCode',
        'examID',
        'degreeID',
        'semester',
        'status'

    ];

    public function DataValidate($data)
    {
        if ($this->where2(['subCode' => $data['subCode'], 'examID' => $data['examID'], 'degreeID' => $data['degreeID']])) {
            $this->errors['exist'] = 'This data is already exists';

            return false;

        } else {
            return true;
        }
    }
}

?>