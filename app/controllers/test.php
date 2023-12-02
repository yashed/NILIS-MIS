<?php

class Test extends Controller
{


    public function index()
    {

        $this->view('view-templates/temp1');
    }

    public function t1()
    {
        $this->view('sar-interfaces/test');
    }
}
?>