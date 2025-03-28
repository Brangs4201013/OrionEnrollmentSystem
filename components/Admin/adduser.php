<?php
session_start();
session_regenerate_id(true);

include '../Config/connecttodb.php';

$message = "";

if (!isset($conn)) {
    die("<p style='color:red; text-align:center;'>Database connection error!</p>");
}

// Handling User Addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = trim($_POST['Username']);
    $Password = password_hash(trim($_POST['Password']), PASSWORD_DEFAULT);
    $Fname = trim($_POST['Fname']);
    $Lname = trim($_POST['Lname']);
    $Minitial = trim($_POST['Minitial']);
    $Gender = trim($_POST['Gender']);
    $Age = trim($_POST['Age']);
    $Contact = trim($_POST['Contact']);
    $Email = trim($_POST['Email']);
    $Departname = trim($_POST['Departname']);
    $Type = trim($_POST['Type']);

    $stmt = $conn->prepare("INSERT INTO user (Username, Password, Fname, Lname, Minitial, Gender, Age, Contact, Email, Departname, Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssssssissss", $Username, $Password, $Fname, $Lname, $Minitial, $Gender, $Age, $Contact, $Email, $Departname, $Type);
        if ($stmt->execute()) {
            $message = "<p style='color:green; text-align:center;'>User added successfully!</p>";
        } else {
            $message = "<p style='color:red; text-align:center;'>Error adding user.</p>";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background: black;
            color: white;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .form-box {
            background: rgba(30, 30, 50, 0.9);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
            width: 400px;
            margin: auto;
        }
        input, select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            background: #121232;
            color: white;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-box">
        <h2>Add User</h2>
        <?php echo $message; ?>
        <form action="" method="post">
            <input type="text" name="Username" placeholder="Username" required><br>
            <input type="password" name="Password" placeholder="Password" required><br>
            <input type="text" name="Fname" placeholder="First Name" required><br>
            <input type="text" name="Lname" placeholder="Last Name" required><br>
            <input type="text" name="Minitial" placeholder="Middle Initial"><br>
            <input type="text" name="Gender" placeholder="Gender" required><br>
            <input type="number" name="Age" placeholder="Age" required><br>
            <input type="text" name="Contact" placeholder="Contact" required><br>
            <input type="email" name="Email" placeholder="Email" required><br>
            <input type="text" name="Departname" placeholder="Department Name" required><br>
            <select name="Type" required>
                <option value="">Select Type</option>
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
            </select><br>
            <button type="submit">Add User</button>
        </form>
    </div>
</div>
</body>
</html>

