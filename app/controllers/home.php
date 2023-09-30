<?php

class Home extends Controller{

public function index(){
    
    $db = new Database();
    $db->create_tables();
   $res= $db->query("select * from users");

//    show($res);
   
//    $users = new User();
//    $users->insert($data);

   $this->view('login');
}
public function edit(){
    echo "Home eddit ";
}
public function delete(){
    echo "Home delete ";
}


}

?>