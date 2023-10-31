<?php

/**
 * logout class
 */

class Logout extends Controller
{
    public function index()
    {
       Auth::logout();
        header('Location: login');
    }
}

?>