<?php

class Grades extends Model
{

    public $errors = [];
    protected $table = "grading_values";
    protected $allowedColumns = [
        'GradeID',
        'Grade',
        'MaxMarks',
        'MinMarks',
        'GPV',
        'DegreeID',

    ];
    public function validate($data)
	{
		$this->errors = [];
        //GradeID
        // if (empty($data['GradeID'])) {
        //     $this->errors['GradeID'] = "A GradeID is required";
        // } else if (!preg_match("/^[0-9]+$/", trim($data['GradeID']))) {
        //     $this->errors['GradeID'] = "GradeID can only have numbers.";
        // }
        //Grade
        if (empty($data['Grade'])) {
            $this->errors['Grade'] = "A Grade is required";
        } else if (!preg_match("/^[A-Z\-\+]+$/", trim($data["Grade"]))) {
            $this->errors['Grade'] = "Grade can only have letters and + or -.";
        }
        //Max Marks
        if (empty($data['Max Marks'])) {
            $this->errors['Max Marks'] = "A Max Marks is required";
        } else {
            $maxMarks = trim($data['Max Marks']);
            if (!preg_match("/^[0-9]+$/", $maxMarks)) {
                $this->errors['Max Marks'] = "Max Marks can only have numbers.";
            } elseif ($maxMarks < 0 || $maxMarks > 100) {
                $this->errors['Max Marks'] = "Max Marks must be between 0 and 100.";
            }
        }
        // Min Marks
        if (empty($data['Min Marks'])) {
            $this->errors['Min Marks'] = "A Min Marks is required";
        } else {
            $minMarks = trim($data['Min Marks']);
            if (!preg_match("/^[0-9]+$/", $minMarks)) {
                $this->errors['Min Marks'] = "Min Marks can only have numbers.";
            } elseif ($minMarks < 0 || $minMarks > 100) {
                $this->errors['Min Marks'] = "Min Marks must be between 0 and 100.";
            }
        }
        //GPV
        // GPV
        if (empty($data['GPV'])) {
            $this->errors['GPV'] = "A GPV is required";
        } else {
            $gpv = trim($data['GPV']);
            // Use a regular expression to match a value with one or two decimal places
            if (!preg_match("/^\d(?:\.\d{1,2})?$/", $gpv)) {
                $this->errors['GPV'] = "GPV can only have numbers with up to two decimal places.";
            } else {
                // Convert the GPV value to a float and check the range
                $gpvValue = (float) $gpv;
                if ($gpvValue < 0.0 || $gpvValue > 4.0 || fmod($gpvValue, 0.1) !== 0) {
                    $this->errors['GPV'] = "GPV must be between 0.0 and 4.0, in steps of 0.1.";
                }
            }
        }
        if (empty($this->errors)) {
			return true;
		}
        return false;
	}
}