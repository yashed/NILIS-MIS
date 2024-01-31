<?php

class Grades extends Model
{

    public $errors = [];
    protected $table = "grading values";
    protected $allowedColumns = [
        'GradeID',
        'Grade',
        'Max Marks',
        'Min Marks',
        'GPV',
        'DegreeID',

    ];
    public function validate($data)
	{
		$this->errors = [];
        //GradeID
        if (empty($data['GradeID'])) {
            $this->errors['GradeID'] = "A GradeID is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['GradeID']))) {
            $this->errors['GradeID'] = "GradeID can only have numbers.";
        }
        //Grade
        if (empty($data['Grade'])) {
            $this->errors['Grade'] = "A Grade is required";
        } else if (!preg_match("/^[a-zA-Z]+$/", trim($data["Grade"]))) {
            $this->errors['Grade'] = "Grade can only have letters.";
        }
        //Max Marks
        if (empty($data['Max Marks'])) {
            $this->errors['Max Marks'] = "A Max Marks is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['Max Marks']))) {
            $this->errors['Max Marks'] = "Max Marks can only have numbers.";
        }
        //Min Marks
        if (empty($data['Min Marks'])) {
            $this->errors['Min Marks'] = "A Min Marks is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['Min Marks']))) {
            $this->errors['Min Marks'] = "Min Marks can only have numbers.";
        }
        //GPV
        if (empty($data['GPV'])) {
            $this->errors['GPV'] = "A GPV is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['GPV']))) {
            $this->errors['GPV'] = "GPV can only have numbers.";
        }

        return false;
	}
}