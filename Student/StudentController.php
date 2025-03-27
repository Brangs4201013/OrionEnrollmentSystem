<?php
include '../Config/connecttodb.php';
if(isset($_POST['CreateStudent'])){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Minitial = $_POST['Minitial'];
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $Contact = $_POST['Contact'];
    $Email = $_POST['Email'];
    $Department = $_POST['Department'];
    $Type = $_POST['Type'];

$sql = "INSERT INTO user (Username,Password,Fname,Lname,Minitial,Gender,Age,Contact,Email,Department,Type) VALUES ('$Username,'$Password','$Fname', '$Lname', '$Mname','$Gender','$Age','$Contact','$Email','$Department','$Type')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully')</script>";
        header('Location: StudentList.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
if(isset($_POST['CreateStudent'])){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Minitial = $_POST['Minitial'];
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('record Updated successfully')</script>";
        header('Location: StudentList.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
if(isset($_POST['CreateStudent'])){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Minitial = $_POST['Minitial'];
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert(' record Deleted successfully')</script>";
        header('Location: StudentList.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}







?>