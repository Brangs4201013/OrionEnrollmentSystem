<?php 
include '../Config/connecttodb.php';

if(isset($_POST['saveSchedule'])){
    $Teacher_ID = $_POST['Teacher_ID'];
    $Subject_ID = $_POST['Subject_ID'];
    $Classtime = $_POST['Classtime'];

    
        
    // Use prepared statements
    $sql = "INSERT INTO schedule (Teacher_ID,Subject_ID, Classtime) 
            VALUES ( ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $Teacher_ID, $Subject_ID, $Classtime);
    $stmt->execute();

$sql1 = "update subject set Sched_ID = (select max(Sched_ID) from schedule) where Subject_ID = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $Subject_ID);


    if ($stmt1->execute()) {
        header("Location: Scheduleindex.php?message=created");
    } else {
        echo "Error: " . $stmt->error;
    }

}
if(isset($_POST['editSchedule'])){
    $Teacher_ID = $_POST['Teacher_ID'];
    $Subject_ID = $_POST['Subject_ID'];
    $Classtime = $_POST['Classtime'];

    $sql = "UPDATE schedule SET Teacher_ID = ?, Subject_ID = ?, Classtime = ? WHERE Sched_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisi", $Teacher_ID, $Subject_ID, $Classtime, $_POST['Sched_ID']);
    // Use prepared statements
    

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
