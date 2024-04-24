<?php

/**
 * courses model
 */
class ExamTimeTable extends Model
{
    public $errors = [];
    protected $table = "exam_timetable";

    protected $allowedColumns = [

        'subjectCode',
        'subjectName',
        'date',
        'time',
        'degreeID',
        'semester',
        'examID'
    ];

    public function examTimetableValidate($data)
    {
        $this->errors = [];


        // return true;
        $now = new DateTime();

        if ($data['date'] > $now) {
            if (empty($errors['date'])) {
                $this->errors['date'] = '* Invalid Date ';
            }
        }
        if (empty($data['subjectName'])) {
            if (empty($errors['subjectName'])) {
                $this->errors['subjectName'] = '* Subject Name is required';
            }
        }


        if (empty($this->errors)) {

            return true;
        }
        return false;
    }




}