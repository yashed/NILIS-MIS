<?php

/**
 *calendar controller
 */

class Calendar extends Controller
{

    public function index()
    {
        $degree = new Degree();
        $degreetimetable = new DegreeTimeTable(); 
        $data['degrees'] = $degree->findAll();
        $data['degreetimetables'] = $degreetimetable->findAll();
        $this->view('components/calender/calender-2ndview', $data);
    }
}

?>