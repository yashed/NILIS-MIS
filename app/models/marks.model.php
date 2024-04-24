<?php


/**
 * courses model
 */
class Marks extends Model
{

    public $errors = [];
    protected $table = "marks";

    protected $allowedColumns = [
        'id',
        'studentIndexNo',
        'subjectCode',
        'degreeID',
        'examID',
        'examiner1Marks',
        'examiner2Marks',
        'examiner3Marks',
        'assessmentMarks'


    ];

    public function markValidate($data)
    {
        // show($data);
        if ($this->where2(['studentIndexNo' => $data['studentIndexNo'], 'subjectCode' => $data['subjectCode'], 'degreeID' => $data['degreeID'], 'examID' => $data['examID']])) {
            $this->errors['marks'] = 'Data is already submitted';
            $row = $this->where2(['studentIndexNo' => $data['studentIndexNo'], 'subjectCode' => $data['subjectCode'], 'degreeID' => $data['degreeID'], 'examID' => $data['examID']]);
            $row = (object) $row[0];
            $row->status = 'update';

            return $row;

        } else {

            // show($data);
            $data = (object) $data;
            $data->status = 'insert';

            return $data;
        }

    }
}

?>