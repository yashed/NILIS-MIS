<?php

/**
 *calendar controller
 */

class Calendar extends Controller
{

    public function index()
    {
        $degreetimetable = new DegreeTimeTable(); 
        $data['degreetimetables'] = $degreetimetable->findAll();
        $this->view('components/calender/calender-2ndview', $data);
    }
}

?>