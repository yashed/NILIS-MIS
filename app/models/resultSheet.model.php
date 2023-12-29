<?php


/**
 * courses model
 */
class ResultSheet extends Model
{

    public $errors = [];
    protected $table = "mark_sheets";

    protected $allowedColumns = [
        'Id',
        'uploadName',
        'newName',
        'formId',
        'subjectCode',
        'date'

    ];


    public function examValidate($data)
    {

        $filePath = 'assets/csv/examsheets/' . $data['newName'];
        $fileContent = file_get_contents($filePath);


        $lines = explode("\n", $fileContent);


        var_dump($fileContent);
        for ($i = 4; $i < count($lines); $i++) {

            $values = str_getcsv($lines[$i]);
            if ($data['type'] == 'examiner1') {
                $mark = $values[2];
            }
            if ($data['type'] == 'examiner2') {
                $mark = $values[3];
            }
            if ($data['type'] == 'examiner3') {
                // $mark = $values[4];
            }
            if ($data['type'] == 'assestment') {
                $mark = $values[4];
            }

            if ($mark > 100 || $mark < 0) {
                $this->errors['marks'] = 'Invalid marks';
                var_dump("Invalid Marks , upload valid marksheet");
                return false;
            }
        }


        if (empty($this->errors)) {

            return true;
        }
        return false;
    }
}

?>