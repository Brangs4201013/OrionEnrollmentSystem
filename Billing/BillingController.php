

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

if(isset($_POST['SavePayment'])){
            $Invoice_ID = $_POST['Invoice_ID'];
            $Paymentdate = $_POST['Paymentdate'];
            $Amountpaid = $_POST['Amountpaid'];
            $Paymentmethod = $_POST['Paymentmethod'];
            $sql = "INSERT INTO payment (Invoice_ID, Paymentdate, Amountpaid, Paymentmethod)
             VALUES ('$Invoice_ID', '$Paymentdate', '$Amountpaid', '$Paymentmethod')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

if(isset($_POST['editStudent'])){
    $UserID = $_POST['user_id'];
    $Username = $_POST['username'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Minitial = $_POST['minitial'];
    $Gender = $_POST['gender'];
    $Age = $_POST['age'];
    $Contact = $_POST['contact'];
    $Email = $_POST['email'];
    $Department = $_POST['department'];

    if (!empty($_POST['password'])) {
        $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE user SET Username=?, Fname=?, Lname=?, Minitial=?, Gender=?, Age=?, Contact=?, Email=?, Department=?, Password=? WHERE User_ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssisisssi", $Username, $Fname, $Lname, $Minitial, $Gender, $Age, $Contact, $Email, $Department, $Password, $UserID);
    } else {
        $sql = "UPDATE user SET Username=?, Fname=?, Lname=?, Minitial=?, Gender=?, Age=?, Contact=?, Email=?, Department=? WHERE User_ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssisissi", $Username, $Fname, $Lname, $Minitial, $Gender, $Age, $Contact, $Email, $Department, $UserID);
    }

    if ($stmt->execute()) {
        header("Location: invoice.php?message=updated");
    } else {
        echo "Error: " . $stmt->error;
    }
}

if (isset($_GET['user_id'])) {
    $id = intval($_GET['user_id']); // Convert to integer to prevent SQL injection

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "DELETE FROM user WHERE User_ID = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if ($stmt->execute()) {
        header("Location: invoice.php?message=updated");
    } else {
        echo "Error: " . $stmt->error;
    }

}
?>
