<?php

class Clerk extends Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->view('dr-interfaces/dr-dashboard', $data);
    }
}