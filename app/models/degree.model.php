<?php

class DegreeModel {
    private $db; // Your database connection

    public function __construct() {
        // Initialize the database connection here
    }

    public function insertDegreeProgram($degreeType, $selectedDegree) {
        // Implement SQL query to insert data into the database
        $sql = "INSERT INTO degree_programs (degree_type, selected_degree) VALUES (:degree_type, :selected_degree)";

        // Use prepared statements for security
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':degree_type', $degreeType);
        $stmt->bindParam(':selected_degree', $selectedDegree);

        // Execute the query
        $stmt->execute();
    }
}
