<?php

class Admission extends Controller
{

    public function index()
    {
    }

    public function login()
    {

        $this->view('sar-interfaces/admission-card-login');
    }

    public function Card()
    {

        $this->view('sar-interfaces/admission-card');
    }
}
