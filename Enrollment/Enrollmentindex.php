
<?php 
    include ('../Config/layout.php');
    ?>




    <div class="container">
          <div class="page-inner">

          
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Enrollment</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEnrollment">Add a new Student</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>E_ID</th>
                            <th>User_ID</th>
                            <th>Schoolyr_ID	</th>
                            <th>Subject_ID	</th>
                            <th>Date</th>
                            <th>Year</th>
                            <th>Course_ID</th>
                            <th>Actions</th>
                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>E_ID</th>
                            <th>User_ID</th>
                            <th>Schoolyr_ID	</th>
                            <th>Subject_ID	</th>
                            <th>Date</th>
                            <th>Year</th>
                            <th>Course_ID</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include ('../Config/connecttodb.php');

                            $sql = "SELECT * FROM Enrollment";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["E_ID"]."</td>";
                                echo "<td>".$row["User_ID"]."</td>";
                                echo "<td>".$row["Schoolyr_ID"]."</td>";
                                echo "<td>".$row["Subject_ID"]."</td>";
                                echo "<td>".$row["Date"]."</td>";
                                echo "<td>".$row["Year"]."</td>";
                                echo "<td>".$row["Course_ID"]."</td>";
                              
                                echo "<td>";
                                echo "<a href='#' class='btn btn-link btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#editEnrollmentModal' 
                                        data-Schoolyr_ID='".$row["E_ID"]."' 
                                        data-Schoolyr_ID='".$row["User_ID"]."' 
                                        data-Schoolyear='".$row["Schoolyr_ID"]."' 
                                        data-Semester='".$row["Subject_ID"]."'>
                                        data-Schoolyear='".$row["Date"]."' 
                                        data-Schoolyear='".$row["Year"]."'
                                        data-Semester='".$row["Course_ID"]."'>
                                        <i class='fa fa-edit'></i>                                  
                                      </a>";
                                    

                                echo "<a href='EnrollmentController.php?E_id=".$row["E_ID"]."' type='button' class='btn btn-link btn-danger delete-btn'>";
                                echo "<i class='fa fa-times'></i>";
                                echo "</a>";
                                echo "</td>";
                                echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();

                            ?>
                        
                          </tbody>
                        </table>
                        </div>
                 </div>
        </div>
   

    <!-- create Student Modal -->
     <!-- Bootstrap Modal -->
<<!-- Bootstrap Modal -->
<div class="modal fade" id="addEnrollment" tabindex="-1" aria-labelledby="addEnrollmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEnrollmentLabel">Add New Enrollment </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="EnrollmentController.php" method="POST">
                    <div class="row">
                        <div class="col-md-10 ms-auto me-auto">
                       
                            <div class="form-group">
                                <label for="User_ID">Student</label>                    
                                <select name="User_ID" id="User_ID" class="form-control" required>
                                    <option value="">Select Student</option>
                                    <?php
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Student'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["User_ID"]."'>".$row["Fname"]." ".$row["Lname"]."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No students found</option>";
                                    }
                                
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Schoolyr_ID">SchoolYear</label>                          
                                <select name="Schoolyr_ID" id="Schoolyr_ID" class="form-control" required>
                                    <option value="">Select SchoolYear</option>
                                    <?php
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'SchoolYear'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["Schoolyr_ID"]."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No SchoolYear found</option>";
                                    }
                                
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Subject_ID">Subject</label>                            
                                <select name="Subject_ID" id="Subject_ID" class="form-control" required>
                                    <option value="">Select Subject</option>
                                    <?php
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Subject'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["Subject_ID"]."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No Subject found</option>";
                                    }
                                
                                    ?>
                                </select>
                            </div>

                            
                            <div class="form-group">
                                <label for="Date">Date</label>                           
                                <select name="Date" id="Date" class="form-control" required>
                                    <option value="">Select Date</option>
                                    <?php
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Date'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["Date"]."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No Date found</option>";
                                    }
                                
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Year">Year</label>                       
                                <select name="Year" id="Year" class="form-control" required>
                                    <option value="">Select Year</option>
                                    <?php
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Year'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["Year"]."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No Year found</option>";
                                    }
                                
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Course_ID">Course</label>                       
                                <select name="Course_ID" id="Course" class="form-control" required>
                                    <option value="">Select Course</option>
                                    <?php
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Course'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='".$row["Course_ID"]."</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No Course found</option>";
                                    }
                                
                                    ?>
                                </select>
                            </div>
                            
                    
                           
                        </div>
                    </div>
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="saveEnrollment">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of create student modal -->
 <!-- Edit Student Modal -->
<div class="modal fade" id="editEnrollmentModal" tabindex="-1" aria-labelledby="editEnrollmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEnrollmentLabel">Edit Enrollment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="EnrollmentController.php" method="POST">
                <input type="hidden" id="E_ID" name="E_ID">

                    <div class="row">
                        <div class="col-md-6">
                        
                        <div class="form-group">
                                <label for="User_id">User_id</label>
                                <input type="text" class="form-control" id="User_id" name="User_id" placeholder="Enter User_id" required>
                            </div>
                            <div class="form-group">
                                <label for="Schoolyr_ID">Schoolyr_ID</label>
                                <input type="text" class="form-control" id="Schoolyr_ID" name="Schoolyr_ID" placeholder="Enter Schoolyr_ID" required>
                            </div>
                            <div class="form-group">
                                <label for="Subject_ID">Subject_ID</label>
                                <input type="text" class="form-control" id="Subject_ID" name="Subject_ID" placeholder="Enter Subject_ID" required>
                            </div>
                            <div class="form-group">
                                <label for="Date">Date</label>
                                <input type="text" class="form-control" id="Date" name="Date" placeholder="Enter Date" required>
                            </div>
                            <div class="form-group">
                                <label for="Year">Year</label>
                                <input type="text" class="form-control" id="Year" name="Year" placeholder="Enter Year" required>
                            </div>
                            <div class="form-group">
                                <label for="Course_ID">Course_ID</label>
                                <input type="text" class="form-control" id="Course_ID" name="Course_ID" placeholder="Enter Course_ID" required>
                            </div>
                            
                        </div>
                        
                
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="editEnrollment">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</div>
</div>
<!-- script for edit moda -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    var editModal = document.getElementById("editEnrollmentModal");
    editModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
    
        document.getElementById("editUser_id").value = button.getAttribute("data-User_id");
        document.getElementById("editSchoolyr_ID").value = button.getAttribute("data-Schoolyr_ID");
        document.getElementById("editSubject_ID").value = button.getAttribute("data-Subject_ID");
        document.getElementById("editDate").value = button.getAttribute("data-Date");
        document.getElementById("editYear").value = button.getAttribute("data-Year");
        document.getElementById("editCourse_ID").value = button.getAttribute("data-Course_ID");
       
    });
});

</script>
<!-- script for notif alert  -->
<script>
    // Check if there is a message in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');

    if (message === 'created') {
        swal({
            title: "Success!",
            text: "New student record created successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Enrollmentindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to create student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Enrollmentindex.php";
        });
    }
    if (message === 'deleted') {
        swal({
            title: "Success!",
            text: "Student record deleted successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Enrollmentindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to delete student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Enrollmentindex.php";
        });
    }
    if (message === 'updated') {
        swal({
            title: "Success!",
            text: "Student record updated successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Enrollmentindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to update student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Enrollmentindex.php";
        });
    }

</script>
<!-- script for alert -->
<script>
    
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            let deleteUrl = this.getAttribute("href");

            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                buttons: {
                    confirm: {
                        text: "Yes, delete it!",
                        className: "btn btn-success",
                    },
                    cancel: {
                        visible: true,
                        className: "btn btn-danger",
                    },
                },
            }).then((confirmDelete) => {
                if (confirmDelete) {
                    window.location.href = deleteUrl; // Redirect to delete URL
                } else {
                    swal.close();
                }
            });
        });
    });
});
</script>


<!-- script for datatable -->
<script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>