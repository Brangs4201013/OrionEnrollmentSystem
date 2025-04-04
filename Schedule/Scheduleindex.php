
<?php 
    include ('../Config/layout.php');
    ?>
    <div class="container">
          <div class="page-inner">

          
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Schedule</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSchedule">Add a new Schedule</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Sched_ID</th>
                            <th>Teacher_ID</th>
                            <th>Subject_ID</th>
                            <th>Classtime</th>
                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Sched_ID</th>
                            <th>Teacher_ID</th>
                            <th>Subject_ID</th>
                            <th>Classtime</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include ('../Config/connecttodb.php');
                            $sql = "SELECT * FROM schedule";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["Sched_ID"]."</td>";
                                echo "<td>".$row["Teacher_ID"]."</td>";
                                echo "<td>".$row["Subject_ID"]."</td>";
                                echo "<td>".$row["Classtime"]."</td>";
                              
                                echo "<td>";
                                echo "<a href='#' class='btn btn-link btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#editScheduleModal' 
                                        data-Sched_ID='".$row["Sched_ID"]."' 
                                        data-Teacher_ID='".$row["Teacher_ID"]."' 
                                        data-Subject_ID='".$row["Subject_ID"]."' 
                                        data-Classtime='".$row["Classtime"]."'>
                                        <i class='fa fa-edit'></i>                                  
                                      </a>";
                                    

                                echo "<a href='ScheduleController.php?sched_id=".$row["Sched_ID"]."' type='button' class='btn btn-link btn-danger delete-btn'>";
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
<div class="modal fade" id="addSchedule" tabindex="-1" aria-labelledby="addScheduleLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleLabel">Add New Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="ScheduleController.php" method="POST">
                    <div class="row">
                        <div class="col-md-10 ms-auto me-auto">
                    
                            <div class="form-group">
                                <label for="editTeacher_ID">Instructor</label>
                                <select class="form-control" id="editTeacher_ID" name="Teacher_ID" required>
                                <option value="">Select Instructor</option>
                                <?php 
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Teacher'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['User_ID']."'>".$row['Fname']." ".$row['Minitial']." ". $row['Lname']."</option>";
                                                }
                                            } else {
                                                echo "<option value=''> Teacher </option>";
                                            
                                            }
                                    ?>
                                </select>
                            </div>

                      
                            <div class="form-group">
                                <label for="editSubject_ID">Subject_ID</label>
                                <select class="form-control" id="editSubject_ID" name="Subject_ID" required>
                                <option value="">Select Subject</option>
                                <?php 
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM subject";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['Subject_ID']."'>".$row['Subjectcode']." - ".$row['Subjectdesc']."</option>";
                                                }
                                            } 
                                    ?>
                                </select>
                            </div>

                            
                          
                            <div class="form-group">
                                <label for="editClasstime">Classtime</label>
                                <select class="form-control" id="editClasstime" name="Classtime" required>

                                    <option value="">Select Class Time</option>
                                    <option value="MWF: 7:30 AM - 8:30 AM">MWF: 7:30 AM - 8:30 AM</option>
                                    <option value="MWF: 8:30 AM - 9:30 AM">MWF: 8:30 AM - 9:30 AM</option>
                                    <option value="MWF: 9:30 AM - 10:30 AM">MWF: 9:30 AM - 10:30 AM</option>
                                    <option value="MWF: 10:30 AM - 11:30 AM">MWF: 10:30 AM - 11:30 AM</option>
                                    <option value="MWF: 10:30 AM - 12:30 PM">MWF: 11:30 AM - 12:30 PM</option>
                                    <option value="MWF: 1:00 PM - 2:00 PM">MWF: 1:00 PM - 2:00 PM</option>
                                    <option value="MWF: 2:00 PM - 3:00 PM">MWF: 2:00 PM - 3:00 PM</option>
                                    <option value="MWF: 3:00 PM - 4:00 PM">MWF: 3:00 PM - 4:00 PM</option>
                                    <option value="MWF: 4:00 PM - 5:30 PM">MWF: 4:00 PM - 5:30 PM</option>
                                    <option value="TTH: 7:30 AM - 9:00 AM">TTH: 7:30 AM - 9:00 AM</option>
                                    <option value="TTH: 9:00 AM - 10:30 AM">TTH: 9:00 AM - 10:30 AM</option>
                                    <option value="TTH: 10:30 AM - 12:00 PM">TTH: 10:30 AM  - 12:00 PM</option>
                                    <option value="TTH: 1:00 PM - 2:30 PM">TTH: 1:00 PM - 2:30 PM</option>
                                    <option value="TTH: 2:30 PM - 4:00 PM">TTH: 2:30 PM - 4:00 PM</option>
                                    <option value="TTH: 4:00 PM - 5:30 PM">TTH: 4:00 PM - 5:30 PM</option>

                                   

                                
                                </select>
                            </div>

  
                        </div>
                    </div>
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="saveSchedule">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of create student modal -->
 <!-- Edit Student Modal -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" aria-labelledby="editScheduleLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editScheduleLabel">Edit Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="ScheduleController.php" method="POST">
                <input type="hidden" id="Sched_ID" name="Sched_ID">
                <div class="row">
                    <div class="col-sm-10 ms-auto me-auto">
                    <div class="form-group">
                                <label for="editTeacher_ID">Name</label>
                                <select class="form-control" id="editTeacher_ID" name="Teacher_ID" required>
                                <option value="">Select Instructor</option>
                                <?php 
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Teacher'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row["User_ID"]."'>".$row['Fname']." ".$row['Minitial']." ". $row['Lname']." "."</option>";
                                                }
                                            } else {
                                                echo "<option value=''>No Teachers Available</option>";
                                            }
                                    ?>
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="editSubject_ID">Subject_ID</label>
                                <select class="form-control" id="editSubject_ID" name="Subject_ID" required>
                                <option value="">Select Subject</option>
                                <?php 
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM subject";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row["Subject_ID"]."'>".$row["Subject_ID"].$row['Subjectcode']." - ".$row['Subjectdesc']."</option>";
                                                }
                                            } else {
                                                echo "<option value=''>No Subject Available</option>";
                                            }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="editClasstime">Classtime</label>
                                <select class="form-control" id="editClasstime" name="Classtime" required>
                                    <option value="">Select Class Time</option>
                                    <option value="MWF: 7:30 AM - 8:30 AM">MWF: 7:30 AM - 8:30 AM</option>
                                    <option value="MWF: 8:30 AM - 9:30 AM">MWF: 8:30 AM - 9:30 AM</option>
                                    <option value="MWF: 9:30 AM - 10:30 AM">MWF: 9:30 AM - 10:30 AM</option>
                                    <option value="MWF: 10:30 AM - 11:30 AM">MWF: 10:30 AM - 11:30 AM</option>
                                    <option value="MWF: 10:30 AM - 12:30 PM">MWF: 11:30 AM - 12:30 PM</option>
                                    <option value="MWF: 1:00 PM - 2:00 PM">MWF: 1:00 PM - 2:00 PM</option>
                                    <option value="MWF: 2:00 PM - 3:00 PM">MWF: 2:00 PM - 3:00 PM</option>
                                    <option value="MWF: 3:00 PM - 4:00 PM">MWF: 3:00 PM - 4:00 PM</option>
                                    <option value="MWF: 4:00 PM - 5:30 PM">MWF: 4:00 PM - 5:30 PM</option>
                                    <option value="TTH: 7:30 AM - 9:00 AM">TTH: 7:30 AM - 9:00 AM</option>
                                    <option value="TTH: 9:00 AM - 10:30 AM">TTH: 9:00 AM - 10:30 AM</option>
                                    <option value="TTH: 10:30 AM - 12:00 PM">TTH: 10:30 AM  - 12:00 PM</option>
                                    <option value="TTH: 1:00 PM - 2:30 PM">TTH: 1:00 PM - 2:30 PM</option>
                                    <option value="TTH: 2:30 PM - 4:00 PM">TTH: 2:30 PM - 4:00 PM</option>
                                    <option value="TTH: 4:00 PM - 5:30 PM">TTH: 4:00 PM - 5:30 PM</option>
                                    
                                   

                                
                                </select>
                            </div>


                        </div>
                                 
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="editSchedule">Submit</button>
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
    var editModal = document.getElementById("editScheduleModal");
    editModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
    
        document.getElementById("editSched_ID").value = button.getAttribute("data-Sched_ID");
        document.getElementById("editTeacher_ID").value = button.getAttribute("data-Teacher_ID");
        document.getElementById("editSubject_ID").value = button.getAttribute("data-Subject_ID");
        document.getElementById("editClasstime").value = button.getAttribute("data-Classtime");
       
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
            window.location.href = "Scheduleindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to create student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Scheduleindex.php";
        });
    }
    if (message === 'deleted') {
        swal({
            title: "Success!",
            text: "Student record deleted successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Scheduleindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to delete student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Scheduleindex.php";
        });
    }
    if (message === 'updated') {
        swal({
            title: "Success!",
            text: "Student record updated successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Scheduleindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to update student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Scheduleindex.php";
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