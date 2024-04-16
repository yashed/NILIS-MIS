<?php


/**
 * courses model
 */
class FinalMarks extends Model
{

    public $errors = [];
    protected $table = "final_marks";

    protected $allowedColumns = [
        'id',
        'studentIndexNo',
        'subjectCode',
        'examID',
        'degreeID',
        'finalMarks',
        'grade'



    ];

    public function updateGrades($data)
    {
        foreach ($data as $record) {

            //get grading values
            $grades = new Grades();

            $gradingRules = $grades->where(['DegreeID' => $record->degreeID]);

            // Determine the grade based on finalMarks and grading rules
            $grade = $this->determineGrade($record, $gradingRules);


            // Update the grade
            $this->updateRows(
                ['grade' => $grade],
                ['id' => $record->id]
            );
        }
    }

    // Helper function to determine the grade
    private function determineGrade($record, $gradingRules)
    {
        $finalMarks = round($record->finalMarks);
        $studentType = $record->studentType;
        $semester = $record->semester;
        $indexNo = $record->studentIndexNo;
        $subjectCode = $record->subjectCode;

        // show($gradingRules);
        foreach ($gradingRules as $rule) {

            if ($finalMarks >= $rule->MinMarks && $finalMarks <= $rule->MaxMarks) {
                //get main grade (remove + and - from the grade)

                $mainGrade = substr($rule->Grade, 0, 1);
                if ($studentType == 'repeate' && $mainGrade < 'C') {

                    return 'C';
                }
                if ($studentType == 'medical/repeat' && $mainGrade < 'C') {

                    //get repete subjects
                    $repeateSubjects = getRepeatedSubjects($indexNo, $semester);

                    //check wheter the subject is a repete subject
                    foreach ($repeateSubjects as $subject) {
                        if ($subject->subjectCode == $subjectCode) {
                            return 'C';
                        }
                    }
                }
                return $rule->Grade;
            }
        }
        return NULL;
    }


    public function addRepeteStudents($data)
    {

        $repeteStudent = new RepeatStudents();

        foreach ($data as $repeteData) {

            if ($repeteStudent->repeatStudentDataValidation($repeteData)) {

                //set repete student data to insert
                $studentData['degreeID'] = $repeteData->degreeID;
                $studentData['semester'] = $repeteData->semester;
                $studentData['degreeShortName'] = $repeteData->DegreeShortName;
                $studentData['examID'] = $repeteData->examID;
                $studentData['indexNo'] = $repeteData->indexNo;
                $studentData['subjectCode'] = $repeteData->subjectCode;
                $studentData['attempt'] = $repeteData->attempt;

                $repeteStudent->insert($studentData);

            }
        }
    }

    public function addMedicalStudents($data)
    {

    }

    public function finalMarkValidate($data)
    {
        return true;
    }
}

?>