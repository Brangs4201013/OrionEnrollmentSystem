<?php 
include '../Config/connecttodb.php';

if(isset($_POST['saveSchoolYear'])){
   
    $Schoolyear = $_POST['User_ID'];
    $Semester = $_POST['Schoolyr_ID'];
    $Schoolyear = $_POST['Subject_ID'];
   

    // Use prepared statements
    $sql = "INSERT INTO enrollment ( User_ID, Schoolyr_ID, Subject_ID)
    VALUES ( ?, ?, ?)"; 
        
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii",$User_ID, $Schoolyr_ID, $Subject_ID);

    if ($stmt->execute()) {
        header("Location: Enrollmentindex.php?message=created");
    } else {
        echo "Error: " . $stmt->error;
    }
}
if(isset($_POST['editEnrollment'])){
    $User_ID = $_POST['User_ID'];
    $Schoolyr_ID = $_POST['Schoolyr_ID'];
    $Subject_ID = $_POST['Subject_ID'];

    
    $sql = "INSERT INTO enrollment (User_ID , Schoolyr_ID, Subject_ID) 
     VALUES ( ?, ?, ?, ?, ?, ?)"; 

$stmt = $conn->prepare($sql);
$stmt->bind_param("iii",$User_ID, $Schoolyr_ID, $Subject_ID);

    if ($stmt->execute()) {
        header("Location: Enrollmentindex.php?message=updated");
    } else {
        echo "Error: " . $stmt->error;
    }
}

if (isset($_GET['E_id'])) {
    $id = intval($_GET['E_id']); // Convert to integer to prevent SQL injection

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "DELETE FROM enrollment WHERE E_ID = ?");
    mysqli_stmt_bind_param($stmt, "iii", $id);
    if ($stmt->execute()) {
        header("Location: Enrollmentindex.php?message=deleted");
    } else {
        echo "Error: " . $stmt->error;
    }

}
?>
