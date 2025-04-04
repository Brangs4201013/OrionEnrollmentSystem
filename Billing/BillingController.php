<?php 
include '../Config/connecttodb.php';

if(isset($_POST['viewStudent'])){
    $User_ID = $_POST['User_ID'];
    $sql = "SELECT * FROM user WHERE User_ID='$User_ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["User_ID"]. " - Name: " . $row["Fname"]. " " . $row["Lname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}
if(isset($_POST['saveStudent'])){
    $User_ID = $_POST['User_ID'];
    $Total_Amount = $_POST['Total_Amount'];
    $Due_date = $_POST['Due_date'];
    $Status = $_POST['Status'];
    $sql = "INSERT INTO invoice (User_ID,Total_Amount, Due_date, Status)
         VALUES ('$User_ID','$Total_Amount', '$Due_date', '$Status')";
         if ($conn->query($sql) === TRUE) {
            header("Location: invoice.php");
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }      
}
// Save Payment
if(isset($_POST['SavePayment'])){
            $User_ID = $_POST['User_ID'];
            $Invoice_ID = $_POST['Invoice_ID'];
            $Amountpaid = $_POST['Amountpaid'];
            $Paymentmethod = $_POST['Paymentmethod'];
            $sql = "INSERT INTO payment (Invoice_ID, Amountpaid, Paymentmethod)
             VALUES ('$Invoice_ID', '$Amountpaid', '$Paymentmethod')";
            if ($conn->query($sql) === TRUE) {

               // header("Location: invoice.php?user_id=$User_ID&message=updated");
            } 
        }

if (isset($_GET['user_id'])) {
    $id = intval($_GET['user_id']); // Convert to integer to prevent SQL injection

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE User_ID = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if ($stmt->execute()) {
        header("Location: invoice.php?message=updated");
    } else {
        echo "Error: " . $stmt->error;
    }

}

?>
