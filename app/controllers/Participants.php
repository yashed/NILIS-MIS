<?php

class Participants extends Controller{


    public function index(){

        $db = new Database();
        // $db->create_student_table();
        
        // $st = new Student();
        // $data= $st->findAll();

       //show($res);
       
    //    $users = new User();
    //    $users->insert($data);
        
        $this->view('dr-interfaces/dr-participants.view');



}
}
?>