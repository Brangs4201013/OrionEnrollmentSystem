<?php
// Include the layout and database connection files
include('../Config/layout.php');
include('../Config/connecttodb.php');

// Check if the User_ID is set in the URL
if (isset($_GET['User_ID'])) {
    $userID = $_GET['User_ID'];

    // Fetch student grades from the database
    $sql = "SELECT * FROM grades WHERE User_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, 'i', $userID);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch student info
    $studentSql = "SELECT * FROM user WHERE User_ID = ?";
    $studentStmt = mysqli_prepare($conn, $studentSql);
    mysqli_stmt_bind_param($studentStmt, 'i', $userID);
    mysqli_stmt_execute($studentStmt);
    $studentResult = mysqli_stmt_get_result($studentStmt);
    $studentInfo = mysqli_fetch_assoc($studentResult);

    if ($result && $studentInfo) {
        // Display student information
        echo "<div class='container'>";
        echo "<div class='page-inner'>";
        echo "<h1>Grades for " . htmlspecialchars($studentInfo['Fname']) . " " . htmlspecialchars($studentInfo['Lname']) . "</h1>";

        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr><th>Course</th><th>Grade</th></tr></thead>";
        echo "<tbody>";

        // Display each grade
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Course_Name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Grade']) . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        echo "</div>";
        echo "</div>";

    } else {
        echo "<p>No grades available for this student.</p>";
    }

    // Close the database connections
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($studentStmt);
} else {
    echo "<p>Student ID not provided!</p>";
}

// Close the database connection
mysqli_close($conn);
?>

