<?php 
include '../Config/connecttodb.php';

if(isset($_POST['saveSchedule'])){
   
    $Schoolyear = $_POST['User_ID'];
    $Semester = $_POST['Subject_ID'];
    $Semester = $_POST['Classtime'];

    
        
    // Use prepared statements
    $sql = "INSERT INTO schedule ( User_ID, Subject_ID, Classtime) 
            VALUES ( ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $User_ID, $Subject_ID, $Classtime);

    if ($stmt->execute()) {
        header("Location: Scheduleindex.php?message=created");
    } else {
        echo "Error: " . $stmt->error;
    }
}
if(isset($_POST['editSchedule'])){
    $User_ID = $_POST['User_ID'];
    $Subject_ID = $_POST['Subject_ID'];
    $Classtime = $_POST['Classtime'];
    

    if ($stmt->execute()) {
        header("Location: Scheduleindex.php?message=updated");
    } else {
        echo "Error: " . $stmt->error;
    }
}

if (isset($_GET['sched_id'])) {
    $id = intval($_GET['sched_id']); // Convert to integer to prevent SQL injection

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "DELETE FROM Schedule WHERE Sched_ID = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if ($stmt->execute()) {
        header("Location: Scheduleindex.php?message=deleted");
    } else {
        echo "Error: " . $stmt->error;
    }

}
?>
