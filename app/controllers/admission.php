<?php

class Admission extends Controller
{

    public function index()
    {

    }

    public function login()
    {
        $exam = new Exam();
        $degree = new Degree();
        $admissionToken = new AdmissionToken();

        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $tokenData = $admissionToken->where(['token' => $token]);
            $indexNo = $tokenData[0]->indexNo;
            $examID = $tokenData[0]->examID;
        } else {

            $examID = isset($_GET['examID']) ? $_GET['examID'] : null;
            $indexNo = isset($_GET['indexNo']) ? $_GET['indexNo'] : null;
        }

        //get exam details
        if ($examID != null) {

            $examDetails = $exam->where(['examID' => intval($examID)]);

        } else {
            $examDetails = null;
        }
        if ($examDetails != null) {
            $degreeID = $examDetails[0]->degreeID;

            //get degree details
            if ($degreeID != null) {
                $degreeDetails = $degree->where(['degreeID' => intval($degreeID)]);

            } else {
                $degreeDetails = null;
            }

            $data['degreeDetails'] = $degreeDetails;

        }

        //create data array
        $data['examDetails'] = $examDetails;
        $data['indexNo'] = $indexNo;


        if (isset($_POST['submit'])) {

            //create token according to index number and examID
            $token = md5($_POST['index'] . $examID);

            $tokenData['indexNo'] = $_POST['index'];
            $tokenData['examID'] = $examID;
            $tokenData['token'] = $token;

            //insert token to database
            if ($admissionToken->Validate($tokenData)) {
                $admissionToken->insert($tokenData);
                redirect('admission/card?token=' . $token);
            } else {
                $data['errors'] = $admissionToken->errors;

            }


        }
        $this->view('sar-interfaces/admission-card-login', $data);
    }

    public function Card()
    {
        $token = isset($_GET['token']) ? $_GET['token'] : null;

        if ($token != null) {
            $admissionToken = new AdmissionToken();
            $tokenData = $admissionToken->where(['token' => $token]);
            $indexNo = $tokenData[0]->indexNo;
            $examID = $tokenData[0]->examID;
        } else {
            echo "Token invalid";
        }

        //get student data
        $student = new StudentModel();
        $examParticipants = new ExamParticipants();
        $examTimeTable = new ExamTimeTable();
        $repeateStudent = new RepeatStudents();
        $medicalStudent = new MedicalStudents();
        $degree = new Degree();
        $exam = new Exam();

        //get exam participant data
        $studentExamData = $examParticipants->where(['indexNo' => $indexNo, 'examID' => $examID]);
        $semester = $studentExamData[0]->semester;

        //get exam data
        $examData = $examTimeTable->where(['examID' => $examID]);

        //get degreeid
        $examDetails = $exam->where(['examID' => $examID]);
        $data['examDetails'] = $examDetails;

        if (!empty($examDetails)) {
            $degreeID = $examDetails[0]->degreeID;
        }

        if (!empty($degreeID)) {
            $data['degreeData'] = $degree->where(['degreeID' => $degreeID]);
        }


        //check the type of the participant
        if ($studentExamData[0]->studentType == 'initial') {
            $examTimeTableData = [];

            //get time table data 
            $TimeTableData[] = $examTimeTable->where(['examID' => $examID, 'semester' => $semester]);
            //convert array data to single array
            //in there it include multiple data inside one index so we need to get each data to seperate index that is why add this code
            foreach ($TimeTableData as $ttdata) {
                foreach ($ttdata as $tt) {
                    $examTimeTableData[] = [$tt];
                }
            }




        } else if ($studentExamData[0]->studentType == 'repeate') {

            //get the attempt of the repeate student
            $attempt = $repeateStudent->where(['indexNo' => $indexNo, 'semester' => $semester]);
            //get subject the student repeat
            // $subjects = $repeateStudent->where(['indexNo' => $indexNo, 'semester' => $semester, 'attempt' => $attempt[0]->attempt]);
            $subjects = getRepeatedSubjects($indexNo, $semester);

            //get time table data
            $examTimeTableData = [];
            //get subject data from timetable for each subject
            foreach ($subjects as $subject) {
                $subjectCode = $subject->subjectCode;
                $examTimeTableData[] = $examTimeTable->where(['examID' => $examID, 'semester' => $semester, 'subjectCode' => $subjectCode]);

            }



        } else if (($studentExamData[0]->studentType == 'medical')) {

            //get subject the student repeat
            $subjects = getMedicalSubjects($indexNo, $semester);

            $examTimeTableData = [];
            //get subject data from timetable for each subject
            foreach ($subjects as $subject) {
                $subjectCode = $subject->subjectCode;
                $examTimeTableData[] = $examTimeTable->where(['examID' => $examID, 'semester' => $semester, 'subjectCode' => $subjectCode]);
            }

        } else if ($studentExamData[0]->studentType == 'medical/repeat') {


            //get repeated subjects
            $subjects1 = getRepeatedSubjects($indexNo, $semester);

            //get medical approved subjects
            $subjects2 = getMedicalSubjects($indexNo, $semester);
            $Subjects = array_merge($subjects1, $subjects2);


            //get timetable data
            foreach ($Subjects as $subject) {

                $subjectCode = $subject->subjectCode;
                $examTimeTableData[] = $examTimeTable->where(['examID' => $examID, 'semester' => $semester, 'subjectCode' => $subjectCode]);

            }

        }


        $studentData = $student->where(['indexNo' => $indexNo]);
        $examData = $examTimeTable->where(['examID' => $examID]);
        $data['studentData'] = $studentData;
        $data['timeTableData'] = $examTimeTableData;

        // show($data['timeTableData']);
        $data['examData'] = $examData;


        $this->view('sar-interfaces/admission-card', $data);
    }
}
