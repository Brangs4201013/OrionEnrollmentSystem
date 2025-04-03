<?php 


include ('../Config/layout.php');
include ('../Grade/gradecontroller.php');  // Include the controller file

// Ensure $gradeController is properly initialized
if (!isset($gradeController)) {
    $gradeController = new GradeController($conn);
}

// Fetch grades from the controller
$grades = $gradeController->getAllGrades();

?>
 
 <div class="container">
          <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Grade Management</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="gradeTable" class="display table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Subject ID</th>
                                        <th>Grade</th>
                                        <th>Semester</th>
                                        <th>Year</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Check if grades are available
                                    if ($grades && $grades->num_rows > 0) {
                                        while ($row = $grades->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['Student_ID']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Subject_ID']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Grade']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Semester']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Year']) . "</td>";
                                            echo '<td>
                                                <form method="POST" action="../Grade/gradecontroller.php" onsubmit="return confirm(\'Are you sure you want to delete this grade?\');">
                                                    <input type="hidden" name="grade_id" value="' . $row['Grade_ID'] . '">
                                                    <button type="submit" name="deleteGrade" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No grades found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>