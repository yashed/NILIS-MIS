<?php

class Home extends Controller
{


    public function index()
    {

        $db = new Database();
        redirect('login');
        $db->create_tables();
        $db->create_procedure();
        $db->create_event();


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