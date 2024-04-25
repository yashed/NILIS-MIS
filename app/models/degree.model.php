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
		if (empty($data['DegreeID'])) {
			$this->errors['DegreeID'] = "A DegreeID is required";
		}
		//DegreeType
		if (empty($data['DegreeType'])) {
			$this->errors['DegreeType'] = "A DegreeType is required";
		}
		//DegreeShortName
		if (empty($data['DegreeShortName'])) {
			$this->errors['DegreeShortName'] = "A DegreeShortName is required";
		}
		//DegreeName
		if (empty($data['DegreeName'])) {
			$this->errors['DegreeName'] = "A DegreeName is required";
		}
		//AcademicYear
		if (empty($data['AcademicYear'])) {
			$this->errors['AcademicYear'] = "A AcademicYear is required";
		}
		//Duration
		if (empty($data['Duration'])) {
			$this->errors['Duration'] = "A Duration is required";
		}
		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
}
