<?php

class Clerk extends Controller
{

    // function __construct()
    // {
    //     if (!Auth::is_clerk()) {
    //         message('You are not authorized to view this page');
    //         redirect('login');
    //     }
    // }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->view('clerk-interfaces/clerk-dashboard', $data);
    }

    public function notifications()
    {
        $this->view('clerk-interfaces\clerk-notifications');
    }

    public function settings()
    {
        $this->view('clerk-interfaces\clerk-settings');
    }

    public function updatedattendance()
    {
        $this->view('clerk-interfaces\clerk-updatedattendance');
    }

    public function attendance()
    {
        $this->view('clerk-interfaces\clerk-attendance');
    }
}