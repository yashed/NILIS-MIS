<?php

class Clerk extends Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->view('clark-dashboard/index', $data);
    }
}
