<?php

/**
 * courses model
 */

class Degree extends Model
{

    public $errors = [];
    protected $table = "exam_participants";


    public function exam_validation()
    {
        $this->errors = [];

        $now = new DateTime();

        if (empty($data['fname'])) {
            $this->errors['fname'] = 'A first name is required';

        }
    }
}
