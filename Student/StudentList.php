<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>

   <div>
    <a href="RegisterStudent.php">Register Student</a>
   <?php
   include 'connecttodb.php';
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Student_ID</th><th>First Name</th><th>LastName</th><th>MiddleName</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["stud_id"]."</td><td>".$row["Fname"]."</td><td>".$row["Lname"]."</td><td>".$row["Mname"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
   </div>
    
</body>
</html>