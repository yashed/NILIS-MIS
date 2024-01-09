<?php

class DR extends Controller {

    public function index() {

        $degree = new Degree();

        // $degree->insert( $_POST );
        // show( $_POST );

        $data[ 'degrees' ] = $degree->findAll();
        //show( $data[ 'degrees' ] );

        $this->view( 'dr-interfaces/dr-dashboard', $data );
    }

    public function notification() {
        $this->view( 'dr-interfaces/dr-notification' );
    }

    public function degreeprograms() {
        $degree = new Degree();

        // $degree->insert( $_POST );
        // show( $_POST );

        $data[ 'degrees' ] = $degree->findAll();
        //show( $data[ 'degrees' ] );

        $this->view( 'dr-interfaces/dr-degreeprograms', $data );
    }

    public function degreeprofile() {
        $degree = new Degree();

        // $degree->insert( $_POST );
        // show( $_POST );

        $data[ 'degrees' ] = $degree->findAll();
        // show( $data[ 'degrees' ] );

        $this->view( 'dr-interfaces/dr-degreeprofile', $data );
    }

    public function newDegree() {

        //Create CSV file to getstudent data
        $degree = new Degree();
        $rowData = [ 'Full-Name', 'Email', 'Country', 'NIC-No', 'Date-Of-Birth', 'Fax', 'Address', 'Phone-No' ];
        $studentCSV = 'assets/csv/output/student-data-input.csv';
        $f = fopen( $studentCSV, 'w' );

        // Write the header row to the CSV file
        fputcsv( $f, $rowData );
        fclose( $f );

        //get uploaded csv file
        if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && $_POST[ 'student-data' ] == 'upload-csv' ) {
            show( $_POST );
            show( $_FILES );
            if ( isset( $_FILES[ 'student-data' ] ) && $_FILES[ 'student-data' ][ 'error' ] === UPLOAD_ERR_OK ) {
                $uploadDirectory = 'assets/csv/input/';

                // Replace with your desired directory path
                // Ensure the directory exists
                // if ( !is_dir( $uploadDirectory ) ) {
                //         mkdir( $uploadDirectory, 0777, true );
                //     }

                $fileName = $_FILES[ 'student-data' ][ 'name' ];
                $fileTmpName = $_FILES[ 'student-data' ][ 'tmp_name' ];
                $targetPath = $uploadDirectory . $fileName;
                echo $targetPath;
                if ( move_uploaded_file( $fileTmpName, $targetPath ) ) {
                    echo 'File uploaded successfully.';
                } else {
                    echo 'Failed to upload file.';
                }
            } else {
                echo 'Error uploading file.';

            }
        }

        $data[ 'degrees' ] = $degree->findAll();
        //show( $data[ 'degrees' ] );

        $this->view( 'dr-interfaces/dr-newdegree', $data );
    }

    public function userprofile() {
        $degree = new Degree();

        // $degree->insert( $_POST );
        // show( $_POST );

        $data[ 'degrees' ] = $degree->findAll();
        //show( $data[ 'degrees' ] );

        $this->view( 'dr-interfaces/dr-userprofile', $data );
    }

    public function participants( $id = null, $action = null, $id2 = null ) {

        $st = new StudentModel();
        if ( !empty( $id ) ) {
            if ( !empty( $action ) ) {
                if ( $action === 'delete' && !empty( $id2 ) ) {
                    $st->delete( [ 'id' => $id2 ] );
                }
            } else if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
                // print_r( $_POST );
                // die;
                $st->update( $_POST[ 'id' ], $_POST );
                // redirect( 'student/'.$id );
                $data[ 'student' ] = $st->where( [ 'indexNo' => $id ] )[ 0 ];

                $this->view( 'common/student/student.view', $data );
                return;
            } else {
                $data[ 'student' ] = $st->where( [ 'indexNo' => $id ] )[ 0 ];

                $this->view( 'common/student/student.view', $data );
                return;
            }
        }
        $data[ 'students' ] = $st->findAll();
        //print_r( $data );
        // die;
        $this->view( 'dr-interfaces/dr-participants', $data );
    }

    public function settings() {
        $this->view( 'dr-interfaces/dr-settings' );
    }

    public function login() {
        $this->view( 'login/login.view' );
    }

    public function dr_notifications() {
        $this->view( 'dr-interfaces/dr-notification');
    }

}

?>