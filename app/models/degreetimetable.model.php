<?php

class DegreeTimeTable extends Model
{
    public  $errors = [];
    protected $table = 'degree_timetable';
    protected $primaryKey = ['EventID', 'DegreeID'];
    protected $allowedColumns = [
        'EventID',
        'DegreeID',
        'EventName',
        'EventType',
        'StartingDate',
        'EndingDate'
    ];

    public function validate($data)
    {
        $this->errors = [];
        //event id
        if (empty($data['EventID'])) {
            $this->errors['EventID'] = "An id is required";
        } else if (!preg_match("/^[0-9]+$/", trim($data['EventID']))) {
            $this->errors['EventID'] = "EventID can only have numbers,";
        }
        //Degree id
        // if (empty($data['DegreeID'])) {
        //     $this->errors['DegreeID'] = 'A degreeID is required';
        // } else if (!preg_match("/^[0-9]+$/", trim($data['DegreeID']))) {
        //     $this->errors['DegreeID'] = "DegreeID can only have numbers]";
        // }
        //Event Name
        if (empty($data['EventName'])) {
            $this->errors['EventName'] = 'A Event Name is required';
        } else if (!preg_match("/^[a-zA-Z0-9\s \-\_]+$/", trim($data["EventName"]))) {
            $this->errors['EventName'] = "Event Name can only have letters, numbers, spaces.";
        }
        //Event Type
        if (empty($data['EventType'])) {
            $this->errors['EventType'] = 'A Event Type is required';
        } else if (!preg_match("/^[a-zA-Z\s]+$/", trim($data["EventType"]))) {
            $this->errors['EventType'] = "Event Type can only have letters and spaces.";
        }
        //Starting Date
        if (empty($data['StartingDate'])) {
            $this->errors['StartingDate'] = 'A Starting Date is required';
        } else if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", trim($data['StartingDate']))) {
            $this->errors['StartingDate'] = 'Starting Date should be in YYYY-MM-DD format';
        }
        
        // EndingDate
        if (empty($data['EndingDate'])) {
            $this->errors['EndingDate'] = 'An Ending Date is required';
        } else if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", trim($data['EndingDate']))) {
            $this->errors['EndingDate'] = 'Ending Date should be in YYYY-MM-DD format';
        }
    }

}

?>