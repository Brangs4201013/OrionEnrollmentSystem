
<?php 
require("../Config/connecttodb.php");

if(isset($_POST['createschoolyear'])){
   
    $Schoolyr_id = $_POST['Schoolyr_id'];
    $Schoolyear = $_POST['Schoolyear'];
    $Semester = $_POST['Semester'];
   

    $sql = "INSERT INTO schoolyear ( Schoolyr_id, Schoolyear, Semester) VALUES ('$Schoolyr_id', '$Schoolyear', '$Semester')";   
    $result = mysqli_query($connect, $sql);
    if($result){
        echo "Record saved successfully";
        header("Location: School_Year_list.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}
 
if(isset($_POST['updateschoolyear'])){
    $Schoolyr_id = $_POST['Schoolyr_id'];
    $Schoolyear = $_POST['Schoolyear'];
    $Semester = $_POST['Semester'];
    $sql = "UPDATE schoolyear SET Schoolyear='$Schoolyear', Semester='$Semester' WHERE Schoolyr_id='$Schoolyr_id'";
    $result = mysqli_query($connect, $sql);
    if($result){
        echo "Record updated successfully";
        header("Location: School_Year_list.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

if(isset($_POST['deleteschoolyear'])){
    $Schoolyr_id = $_POST['Schoolyr_id'];
    $sql = "DELETE FROM schoolyear WHERE Schoolyr_id='$Schoolyr_id'";
    $result = mysqli_query($connect, $sql);
    if($result){
        echo "Record deleted successfully";
        header("Location: School_Year_list.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}
if(isset($_POST['cancel'])){
    header("Location: School_Year_list.php");
}


?>