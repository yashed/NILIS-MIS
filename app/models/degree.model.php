<?php

class Degree extends Model
{

	public $errors = [];
	protected $table = "degree";

	protected $allowedColumns = [

		'DegreeID',
		'DegreeType',
		'DegreeShortName',
		'DegreeName',
		'Duration',
		'AcademicYear',
		'Status',
		'createdDate',
	];

	public function validate($data)
	{
		$this->errors = [];
		//DegreeID
		// if (empty($data['DegreeID'])) {
		// 	$this->errors['DegreeID'] = "A DegreeID is required";
		// }
		//DegreeType
		// Degree Type
		if (empty($data['DegreeType'])) {
			$this->errors['DegreeType'] = "A DegreeType is required";
		} else {
			$degreeType = trim($data["DegreeType"]);
			// Use a regular expression to match letters, spaces, and the numbers 1 and 2
			if (!preg_match("/^[a-zA-Z12\s]+$/", $degreeType)) {
				$this->errors['DegreeType'] = "Degree Type can only have letters, spaces, 1, or 2.";
			}
		}
		//DegreeShortName
		if (empty($data['DegreeShortName'])) {
			$this->errors['DegreeShortName'] = "A DegreeShortName is required";
		} else if (!preg_match("/^[A-Z]+$/", trim($data['DegreeShortName']))) {
            $this->errors['DegreeShortName'] = 'A Degree Short Name can only be only capital letters.';
        }
		//DegreeName
		if (empty($data['DegreeName'])) {
			$this->errors['DegreeName'] = "A DegreeName is required";
		} else if (!preg_match("/^[a-zA-Z\s]+$/", trim($data["DegreeName"]))) {
            $this->errors['DegreeName'] = "Degree Name can only have letters, spaces.";
        }
		// Academic Year
		if (empty($data['AcademicYear'])) {
			$this->errors['AcademicYear'] = "An Academic Year is required";
		} else {
			$academicYear = trim($data['AcademicYear']);
			// Use a regular expression to match a four-digit year (e.g., 2023)
			if (!preg_match("/^\d{4}$/", $academicYear)) {
				$this->errors['AcademicYear'] = 'Academic Year should be in YYYY format';
			} else {
				$year = (int) $academicYear;
				if ($year < 1000 || $year > 9999) {
					$this->errors['AcademicYear'] = 'Academic Year must be a valid year';
				}
			}
		}
		//Duration
		if (empty($data['Duration'])) {
			$this->errors['Duration'] = "A Duration is required";
		} else if (!preg_match("/^[1-2]+$/", trim($data["Duration"]))) {
            $this->errors['Duration'] = "Duration can only have numbers.";
        }
		//createdDate
		if (empty($data['createdDate'])) {
			$this->errors['createdDate'] = "A created date is required";
		} else if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", trim($data['EndingDate']))) {
            $this->errors['createdDate'] = 'created Date should be in YYYY-MM-DD format';
        }
		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
}
