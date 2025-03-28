<?php 
include '../Config/connecttodb.php';
 if(isset($_POST['SavePayment'])){
        $Invoice_ID = $_POST['Invoice_ID'];
        $Paymentdate = $_POST['Paymentdate'];
        $Amountpaid = $_POST['Amountpaid'];
        $Paymentmethod = $_POST['Paymentmethod'];
        $sql = "INSERT INTO payment (Invoice_ID, Payment_Date, Amount_Paid, Payment_Method)
         VALUES ('$Invoice_ID', '$Paymentdate', '$Amountpaid', '$Paymentmethod')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    header("Location: invoice.php");
    exit();
?>

<?php 
include '../Config/connecttodb.php';

if(isset($_POST['saveStudent'])){
    $Paymentdate = $_POST['Paymentdate'];
    $Amountpaid = $_POST['Amountpaid'];
    $Paymentmethod = $_POST['Paymentmethod'];
    $sql = "INSERT INTO invoice ( Paymentdate, Amountpaid, Paymentmethod)
         VALUES ('$Paymentdate', '$Amountpaid', '$Paymentmethod')";
         
         $stmt = $conn->prepare($sql);
    $stmt->bind_param('iis', '$Paymentdate', '$Amountpaid', '$Paymentmethod');

    if ($stmt->execute()) {
        header("Location: invoice.php?message=created");
    } else {
        echo "Error: " . $stmt->error;
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
