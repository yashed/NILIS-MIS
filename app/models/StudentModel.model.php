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
        //Name
        if (empty($data['name']) || !preg_match("/^[a-zA-Z.\s]+$/", trim($data['name']))) {
            $this->errors['name'] = 'A name is required';
        }
        //nicNo
        if (empty($data['nicNo'])) {
            $this->errors['nicNo'] = 'A nicNo is required';
        } else if (!preg_match("/^\d{12}$|^\d{9}[VX]$/", trim($data['nicNo']))) {
            $this->errors['nicNo'] = "nicNo can only have numbers, and [V]";
        }
        //birthdate
        if (empty($data['birthdate'])) {
            $this->errors['birthdate'] = 'A birthdate is required';
        } else if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", trim($data['birthdate']))) {
            $this->errors['birthdate'] = "birthdate can only have numbers, and [/-]";
        }
        //whatsapp number
        if (empty($data['whatsappNo'])) {
            $this->errors['whatsappNo'] = 'A whatsappNo is required';
        } else if (!preg_match("/^\d{9,15}$/", $data['whatsappNo'])) {
            $this->errors['whatsappNo'] = "whatsapp number can only have numbers";
        }
        //address
        if (empty($data['address'])) {
            $this->errors['address'] = 'A address is required';
        } else if (!preg_match("/^[A-Za-z0-9\s\/,-]+(?:[A-Za-z0-9\s\/,-]+)*$/", trim($data['address']))) {
            $this->errors['address'] = "address can only have letters, spaces, and [-/]";
        }
        //phoneNo
        if (empty($data['phoneNo'])) {
            $this->errors['phoneNo'] = 'A phoneNo is required';
        } else if (!preg_match("/^\d{9,15}$/", $data['phoneNo'])) {
            $this->errors['phoneNo'] = "phoneNo can only have numbers";
        }
        //gender
        if (empty($data['gender'])) {
            $this->errors['gender'] = 'A gender is required';
        } else if (trim($data['gender']) != 'M' && trim($data['gender']) != 'F') {
            $this->errors['gender'] = 'A gender can only be M or F';
        }
        //country
        if (empty($data['country'])) {
            $this->errors['country'] = 'A country is required';
        } else if (!preg_match("/^[a-zA-Z\s]+$/", trim($data['country']))) {
            $this->errors['country'] = 'A country can only be only letters.';
        }
        return ($this->errors);
    }
    //indexNO validation
    public function indexNoValidation($data)
    {
        if ($this->where2(['indexNo' => $data['index']])) {

            return true;
        } else {

            $this->errors['Index-Error'] = 'Incorrect Index Number';
            return false;
        }


    }
}