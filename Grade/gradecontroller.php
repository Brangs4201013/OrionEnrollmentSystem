<?php
// Include the database connection
include('../Config/connecttodb.php');

// GradeController class to manage grade-related operations
class GradeController {
    private $conn;

    // Constructor to initialize DB connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to fetch all grades from the database
    public function getAllGrades() {
        // Query to get all grades from the database
        $query = "SELECT * FROM grades";
        $result = $this->conn->query($query);
        return $result;
    }

    // Method to delete a grade by Grade_ID
    public function deleteGrade($gradeId) {
        // Prepared statement to prevent SQL injection
        $stmt = $this->conn->prepare("DELETE FROM grades WHERE Grade_ID = ?");
        $stmt->bind_param("i", $gradeId);
        
        if ($stmt->execute()) {
            // Return true if deletion is successful
            return true;
        } else {
            // Return false if there is an error during deletion
            return false;
        }
    }
}

// Check if delete action is triggered
if (isset($_POST['deleteGrade']) && isset($_POST['grade_id'])) {
    // Get grade ID from the POST request
    $gradeId = $_POST['grade_id'];

    // Instantiate the GradeController and delete the grade
    $gradeController = new GradeController($conn);

    // Attempt to delete the grade
    if ($gradeController->deleteGrade($gradeId)) {
        // Redirect or show success message after deletion
        header("Location: path_to_redirect_after_delete.php");  // Adjust the URL accordingly
        exit();
    } else {
        // Handle error if the grade cannot be deleted
        echo "Error deleting grade.";
    }
}
?>
