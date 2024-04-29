<?php

class Test extends Controller
{



    public function index()
    {
        $repeatStudents = new RepeatStudents();
        $repeatStudents->setid(200);
        $data['send'] = 'Yashed';
        $data['examID'] = 20;
        $data['degreeID'] = 6;
        $data['indexNo'] = 'DPL/01';

        $this->view('common/mail-views/admission-view', $data);
    }

    public function t1()
    {

        $this->view('common/error-page/403');
    }
}
?>