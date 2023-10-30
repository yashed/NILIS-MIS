<?php

/**
 * users model
 */

 class Student extends Model
 {

    public  $errors =[];
    protected $table = 'students';
    protected $allowedColumns =[
        'Email',
        'RegistrationNo',
        'Country',
        'IndexNo'
        ];
    }