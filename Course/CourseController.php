<?php
include '../Config/connecttodb.php';

if(isset($_POST['saveCourse'])){
    $Coursecode = $_POST['Coursecode'];
    $coursedesc = $_POST['coursedesc'];
 
    // Use prepared statements
    $sql = "INSERT INTO course ( Coursecode, coursedesc) 
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param( "ss", $Coursecode, $coursedesc);

    if ($stmt->execute()) {
        header("Location: Courseindex.php?message=created");
    } else {
        echo "Error: " . $stmt->error;
    }
}
if(isset($_POST['editCourse'])){
    $Coursecode = $_POST['Coursecode'];
    $coursedesc = $_POST['coursedesc'];

    $sql = "UPDATE course SET Coursecode = ?, coursedesc = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$Coursecode, $coursedesc);

if ($stmt->execute()) {
header("Location: Courseindex.php?message=created");
} else {
echo "Error: " . $stmt->error;
}

}

if (isset($_GET['Course_id'])) {
    $id = intval($_GET['Course_id']); // Convert to integer to prevent SQL injection

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "DELETE FROM course WHERE Course_ID = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if ($stmt->execute()) {
        header("Location: Courseindex.php?message=deleted");
    } else {
        echo "Error: " . $stmt->error;
    }

}
?>