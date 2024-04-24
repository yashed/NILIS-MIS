<?php

class Home extends Controller
{


    public function index()
    {

        $db = new Database();
        $db->create_tables();
        $db->create_procedure();
        $db->create_event();


        redirect('login');
        $this->view('common/login/login');
    }
    public function edit($id = null, $name = null)
    {
        echo "Home eddit " . $id;
        echo "Home eddit " . $name;
    }
    public function delete()
    {
        echo "Home delete ";
    }


}

?>