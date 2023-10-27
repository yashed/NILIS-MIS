<?php

class Home extends Controller{


    public function index(){
        
        $db = new Database();
        $db->create_tables();
       // $res= $db->query("select * from users");

       // show($res);
       
    //    $users = new User();
    //    $users->insert($data);

       $this->view('dr-interfaces/dr-dashboard.php');
    }
    public function edit(){
        echo "Home eddit ";
    }
    public function delete(){
        echo "Home delete ";
    }


}

?>