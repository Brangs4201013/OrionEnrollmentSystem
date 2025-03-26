<?php
session_start();
session_regenerate_id(true);

include 'connecttodb.php';


$message = "";
$loggedInUser = "";

// Handling Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = trim($_POST['Username']);
    $Password = trim($_POST['Password']);
    $action = $_POST['action'];

    if ($action == "register") {
        $stmt = $conn->prepare("SELECT Username FROM user WHERE Username = ?");
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "<p style='color:red; text-align:center;'>Username already taken!</p>";
        } else {
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user (Username, Password) VALUES (?, ?)");
            $stmt->bind_param("ss", $Username, $hashedPassword);
            if ($stmt->execute()) {
                $message = "<p style='color:green; text-align:center;'>Registration successful! Please log in.</p>";
            } else {
                $message = "<p style='color:red; text-align:center;'>Error: " . $conn->error . "</p>";
            }
            $stmt->close();
        }
    }

    if ($action == "login") {
        $stmt = $conn->prepare("SELECT Password FROM user WHERE Username = ?");
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($Password, $row['Password'])) {
                $_SESSION['Username'] = $Username;
                $loggedInUser = $Username;
                header('Location: homepage.php');
                exit();
            } else {
                $message = "<p style='color:red; text-align:center;'>Invalid password.</p>";
            }
        } else {
            $message = "<p style='color:red; text-align:center;'>Invalid username.</p>";
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
    <title>Login & Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            background: radial-gradient(circle at bottom, #0a0a32, #000010);
            color: white;
            text-align: center;
            height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .star {
            position: absolute;
            width: 3px;
            height: 3px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 8px white;
            animation: twinkle 2s infinite alternate;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 0.3; }
        }

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            background: rgba(30, 30, 50, 0.9);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
            width: 300px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            background: #121232;
            color: white;
            text-align: center;
            font-size: 16px;
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

        .switch {
            margin-top: 10px;
            color: lightblue;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="stars">
    <script>
        const starsContainer = document.querySelector('body');
        for (let i = 0; i < 100; i++) {
            let star = document.createElement('div');
            star.classList.add('star');
            star.style.top = Math.random() * 100 + '%';
            star.style.left = Math.random() * 100 + '%';
            starsContainer.appendChild(star);
        }
    </script>
</div>

<div class="login-container">
    <div class="login-box">
        <h2 id="formHeader">Login</h2>
        <?php echo $message; ?>
        <form id="authForm" action="" method="post">
            <input type="text" name="Username" placeholder="Username" required><br>
            <input type="password" name="Password" placeholder="Password" required><br>
            <input type="hidden" name="action" id="formAction" value="login">
            <button type="submit">Login</button>
        </form>
    </div>
</div>

</body>
</html>