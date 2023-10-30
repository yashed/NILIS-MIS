<?php

class DegreeController {
    public function createDegreeProgram() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission
            $degreeType = $_POST['degree_type'];
            $selectedDegree = $_POST['selected_degree'];

            // Call the model to insert data into the database
            $degreeModel = new DegreeModel();
            $degreeModel->insertDegreeProgram($degreeType, $selectedDegree);

            // Redirect or show a success message
        }
    }
}
