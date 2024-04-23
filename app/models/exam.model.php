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
    public function examDataValidation($data)
    {
        //check whether normal examination already exists
        // show($this->where2(['degreeID' => $data['degreeID'], 'semester' => $data['semester'], 'examType' => 'normal']));
        if ($this->where2(['degreeID' => $data['degreeID'], 'semester' => $data['semester'], 'examType' => 'normal', 'status' => 'ongoing'])) {
            $this->errors['exam-error'] = 'Examination already created. Check examination page';
            return false;
        }
        if ($this->where2(['degreeID' => $data['degreeID'], 'semester' => $data['semester'], 'examType' => 'normal', 'status' => 'upcoming'])) {

            return true;
        } else {
            $this->errors['exam-error'] = 'No examination defined on degree time table or This examination was permenetly deleted';
            return false;
        }

    }
}

?>