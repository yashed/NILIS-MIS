<?php

/**
 * users model
 */

 class StudentModel extends Model
 {

    public  $errors =[];
    protected $table = 'student';
    protected $primaryKey='id';
    protected $allowedColumns =[
        'id',
        'Email',
        'regNo',
        'country',
        'indexNo',
        'name',
        'nicNo',
        'birthdate',
        'fax',
        'address',
        'phoneNo',
        'Degree'
        ];
    }