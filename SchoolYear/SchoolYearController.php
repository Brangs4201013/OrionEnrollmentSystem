<?php 
include '../Config/connecttodb.php';

if(isset($_POST['saveSchoolYear'])){
   
    $Schoolyear = $_POST['Schoolyear'];
    $Semester = $_POST['Semester'];
    

    // Use prepared statements
    $sql = "INSERT INTO schoolyear ( Schoolyear, Semester) 
            VALUES ( ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $Schoolyear, $Semester);

    if ($stmt->execute()) {
        header("Location: SchoolYearindex.php?message=created");
    } else {
        echo "Error: " . $stmt->error;
    }
}
if(isset($_POST['editSchoolyear'])){

    $Schoolyear = $_POST['Schoolyear'];
    $Semester = $_POST['Semester'];
    
    $sql = "INSERT INTO schoolyear (Schoolyear , Semester) 
    VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$Schoolyear, $Semester);

    if ($stmt->execute()) {
        header("Location: SchoolYearindex.php?message=updated");
    } else {
        echo "Error: " . $stmt->error;
    }
}

if (isset($_GET['SY_id'])) {
    $id = intval($_GET['SY_id']); // Convert to integer to prevent SQL injection

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "DELETE FROM schoolyear WHERE Schoolyr_ID = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if ($stmt->execute()) {
        header("Location: SchoolYearindex.php?message=deleted");
    } else {
        echo "Error: " . $stmt->error;
    }

}
?>
