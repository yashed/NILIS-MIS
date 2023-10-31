<?php 

/**
 * courses model
 */
class Degree extends Model
{
	
	public $errors = [];
	protected $table = "degree";

	protected $allowedColumns = [

		'DegreeID',
        'DegreeType',
        'DegreeName',
        'Duration',
        'AcademicYear',
        'SubjectID',
        'GradeID',
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['DegreeID']))
		{
			$this->errors['DegreeID'] = "A DegreeID is required";
		}
        else if(!preg_match("/^[a-zA-Z \-\_\&]+$/", trim($data['title'])))
		{
			$this->errors['title'] = "DegreeID can only have letters, spaces and [-_&]";
		}
		

		if(empty($data['DegreeType']))
		{
			$this->errors['DegreeType'] = "A DegreeType is required";
		}
        else if(!preg_match("/^[a-zA-Z \-\_\&]+$/", trim($data['title'])))
		{
			$this->errors['DegreeType'] = "DegreeType can only have letters, spaces and [-_&]";
		}
        if(empty($data['DegreeName']))
		{
			$this->errors['DegreeName'] = "A DegreeName is required";
		}
        else if(!preg_match("/^[a-zA-Z \-\_\&]+$/", trim($data['title'])))
		{
			$this->errors['DegreeName'] = "DegreeName can only have letters, spaces and [-_&]";
		}
        if(empty($data['AcademicYear']))
		{
			$this->errors['AcademicYear'] = "A AcademicYear is required";
		}
        if(empty($data['Duration']))
		{
			$this->errors['Duration'] = "A Duration is required";
		}
        if(empty($data['SubjectID']))
		{
			$this->errors['SubjectID'] = "A SubjectID is required";
		}
        if(empty($data['GradeID']))
		{
			$this->errors['GradeID'] = "A GradeID is required";
		}
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


	public function edit_validate($data,$id)
	{
		$this->errors = [];

		if(empty($data['firstname']))
		{
			$this->errors['firstname'] = "A first name is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/", trim($data['firstname'])))
		{
			$this->errors['firstname'] = "first name can only have letters without spaces";
		}
		

		if(empty($data['lastname']))
		{
			$this->errors['lastname'] = "A last name is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/", trim($data['lastname'])))
		{
			$this->errors['lastname'] = "last name can only have letters without spaces";
		}

		//check email
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}else
		if($results = $this->where(['email'=>$data['email']]))
		{
			foreach ($results as $result) {
				if($id != $result->id)
					$this->errors['email'] = "That email already exists";
			}
			
		}

		if(!empty($data['phone']))
		{
			if(!preg_match("/^(09|\+2609)[0-9]{8}$/", trim($data['phone'])))
			{
				$this->errors['phone'] = "Phone number not valid";
			}
		}

		if(!empty($data['facebook_link']))
		{
			if(!filter_var($data['facebook_link'],FILTER_VALIDATE_URL))
			{
				$this->errors['facebook_link'] = "Facebook link is not valid";
			}
		}

		if(!empty($data['twitter_link']))
		{
			if(!filter_var($data['twitter_link'],FILTER_VALIDATE_URL))
			{
				$this->errors['twitter_link'] = "Twitter link is not valid";
			}
		}

		if(!empty($data['instagram_link']))
		{
			if(!filter_var($data['instagram_link'],FILTER_VALIDATE_URL))
			{
				$this->errors['instagram_link'] = "Instagram link is not valid";
			}
		}

		if(!empty($data['linkedin_link']))
		{
			if(!filter_var($data['linkedin_link'],FILTER_VALIDATE_URL))
			{
				$this->errors['linkedin_link'] = "Linkedin link is not valid";
			}
		}

  
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}


}