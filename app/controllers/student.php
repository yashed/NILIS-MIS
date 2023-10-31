<?php

class Student extends Controller
{


    public function index($id = null, $action = null, $id2 = null)
    {

        $st = new StudentModel();
        if (!empty($id)) {
            if (!empty($action)) {
                if ($action === 'delete' && !empty($id2)) {
                    $st->delete(["id" => $id2]);
                }
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // print_r($_POST);
                // die;
                $st->update($_POST['id'], $_POST);
                //    redirect('student/'.$id);
                $data['student'] = $st->where(['indexNo' => $id])[0];

                $this->view('student/student.view', $data);
                return;
            } else {
                $data['student'] = $st->where(['indexNo' => $id])[0];
               
                $this->view('student/student.view', $data);
                return;
            }
        }
        $data['students'] = $st->findAll();
        //print_r($data);
        // die;
        $this->view('dr-interfaces/dr-participants.view', $data);
    }
    public function delete($id = null)
    {
        if (!empty($id)) {
        }
    }
}
