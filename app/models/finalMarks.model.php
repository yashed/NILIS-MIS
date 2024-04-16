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
            show($record);
            $gradingRules = $grades->where(['DegreeID' => $record->degreeID]);

            // Determine the grade based on finalMarks and grading rules
            $grade = $this->determineGrade($record, $gradingRules);
            show($record->finalMarks);

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
        $finalMarks = $record->finalMarks;
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


    public function finalMarkValidate($data)
    {
        return true;
    }
}

?>