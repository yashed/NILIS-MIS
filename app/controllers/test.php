<?php

class Test extends Controller
{



    public function index()
    {
        $repeatStudents = new RepeatStudents();
        $repeatStudents->setid(200);


        $this->view('view-templates/temp1');
    }

    public function t1()
    {

        $this->view('common/error-page/403');
    }
}
?>