<?php


/**
 * courses model
 */
class Attendance extends Model
{

    public $errors = [];
    protected $table = "exam_attendance";

    protected $allowedColumns = [
        'id',
        'examID',
        'degreeID',
        'semester',
        'subjectCode',
        'attempt',
        'type',
        'regNo',
        'indexNo',
        'attendance'


    ];

    public function ValidateAttendance($data)
    {
        $subjectCode = $data['subjectCode'];
        $examinationID = $data['examID'];
        $indexNo = $data['indexNo'];

        //check whether data already exists
        //check using subject code
        if ($this->where2(['subjectCode' => $subjectCode, 'examID' => $examinationID, 'indexNo' => $indexNo])) {
            $this->errors['attendance'] = 'Data is already submitted';
            return false;

        } else {
            return true;
        }


    }
}

?>