<?php

/**
 * reports class
 */

function __construct()
{
    // if (!Auth::logged_in()) {
    //     message('You are not authorized to view this page');

    //     redirect('_403_');
    // }
}

class Transcript extends Controller
{
    public function index()
    {

        redirect('transcript/login');
    }


    public function login()
    {
        $exam = new Exam();
        $degree = new Degree();
        $admissionToken = new AdmissionToken();
        $student = new StudentModel();
        $data = [];


        //check form submission and validate data
        if (isset($_POST['submit'])) {

            if (!empty($_POST['index'])) {
                $indexNo = $_POST['index'];
            }

            //check whether the index number is valid
            if ($student->indexNoValidation($_POST)) {
                redirect_blank('transcript/letter?indexNo=' . $indexNo);
            } else {
                $data['errors'] = $student->errors;

            }


        }
        $this->view('reports/transcript-login', $data);
    }

    public function letter()
    {
        $degree = new Degree();
        $studentModel = new StudentModel();
        $finalMarks = new FinalMarks();
        $repeat = new RepeatStudents();

        $indexNo = isset($_GET['indexNo']) ? $_GET['indexNo'] : null;
        //get student results currently uploaded
        $tables = ['subject', 'exam_attendance'];
        $columns = ['*'];
        $conditions = [
            'subject.SubjectCode = final_marks.subjectCode',
            'subject.DegreeID = final_marks.degreeID',
            'exam_attendance.examID = final_marks.examID',
            'exam_attendance.IndexNo = final_marks.studentIndexNo',
            'final_marks.subjectCode = exam_attendance.subjectCode',
        ];
        $whereConditions = [
            "final_marks.studentIndexNo = " . "'$indexNo'",
            "exam_attendance.IndexNo = " . "'$indexNo'",
            "exam_attendance.attendance = 1",
        ];
        $studnetRes = $finalMarks->joinWhere($tables, $columns, $conditions, $whereConditions);


        $data['studentData'] = $studentModel->where(['IndexNo' => $indexNo]);
        $data['studentResults'] = groupByColumn($studnetRes, 'semester');
        $data['repeateSubjects'] = getRepeatedSubjects($indexNo);
        $data['medicalSubjects'] = getMedicalSubjects($indexNo);
        $data['degreeDetails'] = $degree->where(['DegreeID' => $data['studentData'][0]->degreeID]);

        $this->view('reports/transtript-letter', $data);


    }

}
