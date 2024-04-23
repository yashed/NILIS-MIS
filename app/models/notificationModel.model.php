<?php

/**
 * repeat students model
 */

class NotificationModel extends Model
{

    public $errors = [];
    protected $table = "notifications";
    protected $allowedColumns = [

        'notify_id',
        'description',
        'type'
     ];

    
}
