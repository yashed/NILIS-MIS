<?php

class StudentModel extends Model
{

    public $errors = [];
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $allowedColumns = [
        'id',
        'Email',
        'regNo',
        'country',
        'indexNo',
        'name',
        'nicNo',
        'birthdate',
        'whatsappNo',
        'address',
        'phoneNo',
        'degreeID',
        'attendance',
        'status',
        'gender',
    ];

    public function validate($data)
    {
        $this->errors = [];
        //id
        // if (empty($data['id'])) {
        //     $this->errors['id'] = "An id is required";
        // } else if (!preg_match("/^[a-zA-Z0-9 \-\_\&]+$/", trim($data['id']))) {
        //     $this->errors['id'] = "ID can only have letters, numbers, spaces, and [-_&]";
        // }
        //Email
        // if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
        //     $this->errors['Email'] = 'Email is not valid';
        // } else {
        //     if ($this->where2(['Email' => $data['Email']])) {
        //         $this->errors['emaEmailil'] = 'This Email is already exists';
        //     }
        // }
        //RegNo
        // if (empty($data['RegNo'])) {
        //     $this->errors['RegNo'] = "An RegNo is required";
        // } else if (!preg_match("/^[A-Z\/\0-9]+$/", trim($data['RegNo']))) {
        //     $this->errors['RegNo'] = "RegNo can only have letters, numbers, and [/]";
        // }
        //indexNO
        // if (empty($data['indexNo'])) {
        //     $this->errors['indexNo'] = "An indexNo is required";
        // } else if (!preg_match("/^[A-Z\/\0-9]+$/", trim($data['indexNo']))) {
        //     $this->errors['indexNo'] = "indexNo can only have letters, numbers, and [/]";
        // }
        //Name
        if (empty($data['name'])) {
            $this->errors['name'] = 'A name is required';
        }
        //nicNo
        if (empty($data['nicNo'])) {
            $this->errors['nicNo'] = 'A nicNo is required';
        } else if (!preg_match("/^[0-9\V]+$/", trim($data['nicNo']))) {
            $this->errors['nicNo'] = "nicNo can only have numbers, and [V]";
        }
        //birthdate
        if (empty($data['birthdate'])) {
            $this->errors['birthdate'] = 'A birthdate is required';
        } else if (!preg_match("/^[0-9\/\-]+$/", trim($data['birthdate']))) {
            $this->errors['birthdate'] = "birthdate can only have numbers, and [/-]";
        }
        //whatsapp number
        if (empty($data['whatsappNo'])) {
            $this->errors['whatsappNo'] = 'A whatsappNo is required';
        } else if (!preg_match("/^\+?[0-9\- ]+$/", $data['whatsappNo'])) {
            $this->errors['whatsappNo'] = "whatsapp number can only have numbers";
        }
        //address
        if (empty($data['address'])) {
            $this->errors['address'] = 'A address is required';
        } else if (!preg_match("/^[a-zA-Z \-\/]+$/", trim($data['address']))) {
            $this->errors['address'] = "address can only have letters, spaces, and [-/]";
        }
        //phoneNo
        if (empty($data['phoneNo'])) {
            $this->errors['phoneNo'] = 'A phoneNo is required';
        } else if (!preg_match("/^[0-9\- ]+$/", $data['phoneNo'])) {
            $this->errors['phoneNo'] = "phoneNo can only have numbers";
        }
        //Degree
        // if (empty($data['degreeID'])) {
        //     $this->errors['degreeID'] = 'A degreeID is required';
        // } else if (!preg_match("/^[0-9]+$/", trim($data['degreeID']))) {
        //     $this->errors['degreeID'] = "degreeID can only have numbers]";
        // }
        //attendance
        // if (empty($data['attendance'])) {
        //     $this->errors['attendance'] = 'A attendance is required';
        // } else if (!preg_match("/^[0-9]+$/", trim($data['attendance']))) {
        //     $this->errors['attendance'] = "attendance can only have numbers";
        // }
        //status
        // if (empty($data['status'])) {
        //     $this->errors['status'] = 'A status is required';
        // } else if (!preg_match("/^[a-zA-Z]+$/", trim($data['status']))) {
        //     $this->errors['status'] = "status can only have letters";
        // }
        //gender
        if (empty($data['gender'])) {
            $this->errors['gender'] = 'A gender is required';
        } else if (trim($data['gender']) != 'M' && trim($data['gender']) != 'M') {
            $this->errors['gender'] = 'A gender can only be M or F';
        }
        return empty($this->errors);
    }

    //indexNO validation
    public function indexNoValidation($data)
    {
        if ($this->where2(['indexNo' => $data['indexNo']])) {
            return true;
        } else {
            $this->errors['Index-Error'] = 'Incorrect Index Number';
            return false;
        }
    }
}
