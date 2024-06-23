<?php

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
        // if (empty($data['SubjectID'])) {
        //     $this->errors['SubjectID'] = "A SubjectID is required";
        // } else if (!preg_match("/^[0-9]+$/", trim($data['SubjectID']))) {
        //     $this->errors['SubjectID'] = "SubjectID can only have numbers.";
        // }
        //SubjectCode
        if (empty($data['SubjectCode'])) {
            $this->errors['SubjectCode'] = "A Subject Code is required";
        } else if (!preg_match("/^[A-Z0-9]+$/", trim($data["SubjectCode"]))) {
            $this->errors['SubjectCode'] = "Subject Code can only have letters and numbers.";
        }
        //SubjectName
        if (empty($data['SubjectName'])) {
            $this->errors['SubjectName'] = "A Subject Name is required";
        } else if (!preg_match("/^[a-zA-Z]+$/", trim($data["SubjectName"]))) {
            $this->errors['SubjectName'] = "Subject Name can only have letters.";
        }
        //NoCredits
        if (empty($data['NoCredits'])) {
            $this->errors['NoCredits'] = "A Number of Credits is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['NoCredits']))) {
            $this->errors['NoCredits'] = "Number of Credits can only have numbers.";
        }
		//DegreeID
		if (empty($data['DegreeID'])) {
			$this->errors['DegreeID'] = "A DegreeID is required";
		} else if (!preg_match("/^[1-9]+$/", trim($data['DegreeID']))) {
			$this->errors['DegreeID'] = "DegreeID can only have numbers.";
		}
        //semester
        // Semester
        if (empty($data['semester'])) {
            $this->errors['semester'] = "A semester is required";
        } else {
            $semester = trim($data['semester']);
            // Use a regular expression to match only the values 1, 2, 3, or 4
            if (!preg_match("/^[1-4]$/", $semester)) {
                $this->errors['semester'] = "Semester can only be 1, 2, 3, or 4.";
            }
        }
		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

}
