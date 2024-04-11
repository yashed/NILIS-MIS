<?php

class student_Attendance extends Controller
{
    public function index()
    {
        $attendance = new studentAttendance();
        $data['attendances'] = $attendance->findAll();
        $this->view('clerk-interfaces/clerk-attendance',$data);
 }
    
    
}