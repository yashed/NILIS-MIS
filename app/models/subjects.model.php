<?php

/**
 * repeat students model
 */

class Subjects extends Model
{

    public $errors = [];
    protected $table = "subject";
    protected $allowedColumns = [

        'SubjectID',
        'SubjectCode',
        'SubjectName',
        'NoCredits',
        'DegreeID',
        'semester',
    ];
    public function validate($data)
	{
		$this->errors = [];
        //SubjectID
        if (empty($data['SubjectID'])) {
            $this->errors['SubjectID'] = "A SubjectID is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['SubjectID']))) {
            $this->errors['SubjectID'] = "SubjectID can only have numbers.";
        }
        //SubjectCode
        if (empty($data['SubjectCode'])) {
            $this->errors['SubjectCode'] = "A SubjectCode is required";
        } else if (!preg_match("/^[a-zA-Z0-9]+$/", trim($data["SubjectCode"]))) {
            $this->errors['SubjectCode'] = "SubjectCode can only have letters and numbers.";
        }
        //SubjectName
        if (empty($data['SubjectName'])) {
            $this->errors['SubjectName'] = "A SubjectName is required";
        } else if (!preg_match("/^[a-zA-Z]+$/", trim($data["SubjectName"]))) {
            $this->errors['SubjectName'] = "SubjectName can only have letters.";
        }
        //NoCredits
        if (empty($data['NoCredits'])) {
            $this->errors['NoCredits'] = "A NoCredits is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['NoCredits']))) {
            $this->errors['NoCredits'] = "NoCredits can only have numbers.";
        }
		//DegreeID
		if (empty($data['DegreeID'])) {
			$this->errors['DegreeID'] = "A DegreeID is required";
		} else if (!preg_match("/^[0-9]+$/", trim($data['DegreeID']))) {
			$this->errors['DegreeID'] = "DegreeID can only have numbers.";
		}
        //semester
        if (empty($data['semester'])) {
            $this->errors['semester'] = "A semester is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['semester']))) {
            $this->errors['semester'] = "semester can only have numbers.";
        }
		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

    public function repeatStudentValidation($data)
    {
        return true;
    }
}
