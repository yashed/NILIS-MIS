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
        'degreeId',
        'date',
        'type',
        'examId',

    ];


    public function examValidate($data)
    {

        $filePath = 'assets/csv/examsheets/' . $data['newName'];
        $fileContent = file_get_contents($filePath);


        $lines = explode("\n", $fileContent);

        for ($i = 4; $i < count($lines); $i++) {

            $values = str_getcsv($lines[$i]);
            if ($data['type'] == 'examiner1') {
                $mark = $values[2];
            }
            if ($data['type'] == 'examiner2') {
                $mark = $values[3];
            }
            if ($data['type'] == 'examiner3') {
                $mark = $values[5];
            }
            if ($data['type'] == 'assestment') {
                $mark = $values[4];
            }

            if ($mark > 100 || $mark < 0) {
                $this->errors['marks'] = 'Invalid marks';
                return false;
            }
        }





        if (empty($this->errors)) {

            return true;
        } else {
            return false;
        }

    }

    public function marksheetValidation($data)
    {
        show('Inside the marks validation');
        $filePath = 'assets/csv/examsheets/' . $data['newName'];
        $tempfile = 'assets/csv/output/Marksheet_' . $data['subjectCode'] . '.csv';

        $handle1 = fopen($filePath, "r");
        $handle2 = fopen($tempfile, "r");

        // Skip the first 4 lines in each file
        for ($i = 0; $i < 4; $i++) {
            fgets($handle1);
            fgets($handle2);
        }

        // Initialize flag to track if first columns match
        $firstColumnMatch = true;

        // Read and compare lines from both files starting from line 5
        while (($line1 = fgetcsv($handle1)) !== false && ($line2 = fgetcsv($handle2)) !== false) {
            show($line1);
            show($line2);
            // Check if the content of the first column in both lines is the same
            if ($line1[0] !== $line2[0]) {
                // If not, set flag to false and break the loop
                $firstColumnMatch = false;
                break;
            }
        }

        // Close the files
        fclose($handle1);
        fclose($handle2);

        // Return true if the content of the first column matches in both files, otherwise return false

        if (!$firstColumnMatch) {
            $this->errors['marks'] = 'Invalid Results sheet uploaded';
            return false;
        }
        return $firstColumnMatch;
    }
}

?>