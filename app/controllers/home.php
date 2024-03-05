<?php

class Home extends Controller
{


    public function index()
    {

        $db = new Database();
        $db->create_tables();
        // $db->createFinalMarksTrigger();
        // $res= $db->query("select * from users");

        // show($res);

        //    $users = new User();
        //    $users->insert($data);

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