<?php

class Clerk extends Controller
{

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