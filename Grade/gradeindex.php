<?php 


include ('../Config/layout.php');

?>
 
 <div class="container">
          <div class="page-inner">
            <h1>Enrolled Studentlist</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../Config/connecttodb.php'; // Include your database connection file

                    // Fetch enrolled students from the database
                    $sql = "SELECT * FROM user WHERE Type = 'Student'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['User_ID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Fname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Lname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                            echo "<td><a href='viewgrade.php?User_ID=" . htmlspecialchars($row['User_ID']) . "' class='btn btn-warning'>View Grade</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    mysqli_close($conn); // Close the database connection
                    ?>
                </tbody>
                
            </div>
</div>

 