
<?php 
    include ('../Config/layout.php');
    ?>
   



    <div class="container">
          <div class="page-inner">

          
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">SchoolYear</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSchoolyear">Add a new SchoolYear</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Schoolyr ID</th>
                            <th>SchoolYear</th>
                            <th>Semester</th>
                            <th>Actions</th>
                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                          <th>Schoolyr_ID</th>
                            <th>SchoolYear</th>
                            <th>Semester</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include ('../Config/connecttodb.php');
                            $sql = "SELECT * FROM schoolyear";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["Schoolyr_ID"]."</td>";
                                echo "<td>".$row["Schoolyear"]."</td>";
                                echo "<td>".$row["Semester"]."</td>";
                              
                                echo "<td>";
                                echo "<a href='#' class='btn btn-link btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#editSchoolyearModal' 
                                        data-Schoolyr_ID='".$row["Schoolyr_ID"]."' 
                                        data-Schoolyear='".$row["Schoolyear"]."' 
                                        data-Semester='".$row["Semester"]."'>
                                        <i class='fa fa-edit'></i>                                  
                                      </a>";
                                    

                                echo "<a href='SchoolYearController.php?SY_id=".$row["Schoolyr_ID"]."' type='button' class='btn btn-link btn-danger delete-btn'>";
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
<div class="modal fade" id="addSchoolyear" tabindex="-1" aria-labelledby="addSchoolyearLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSchoolyearLabel">Add New SchoolYear</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="SchoolYearController.php" method="POST">
                    <div class="row">
                        <div class="col-md-10 ms-auto me-auto">
                       
                        <div class="form-group">
                                <label for="editSchoolyear">SchoolYear</label>
                                <select class="form-control" id="editSchoolyear" name="Schoolyear" required>
                                    <option value="2025 - 2026">2025 - 2026</option>
                                    <option value="2026 - 2027">2026 - 2027</option>
                                    <option value="2027 - 2028">2027 - 2028</option>
                                    <option value="2028 - 2029">2028 - 2029</option>
                                    <option value="2029 - 2030">2029 - 2030</option>

                                </select>
                            </div>

                            
                            <div class="form-group">
                                <label for="editSemester">Semester</label>
                                <select class="form-control" id="editSemester" name="Semester" required>
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                    <option value="Summer">Summer</option>
                                  
                                </select>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="saveSchoolYear">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of create student modal -->
 <!-- Edit Student Modal -->
<div class="modal fade" id="editSchoolyearModal" tabindex="-1" aria-labelledby="editSchoolYearLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSchoolYearLabel">Edit SchoolYear</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="SchoolYearController.php" method="POST">
                <input type="hidden" id="Schoolyr_ID" name="schoolyr_ID">

                    <div class="row">
                    <div class="col-md-10 ms-auto me-auto">
                        
                        <div class="form-group">
                                <label for="editSchoolyear">SchoolYear</label>
                                <select class="form-control" id="editSchoolyear" name="Schoolyear" required>
                                    <option value="2025 - 2026">2025 - 2026</option>
                                    <option value="2026 - 2027">2026 - 2027</option>
                                    <option value="2027 - 2028">2027 - 2028</option>
                                    <option value="2028 - 2029">2028 - 2029</option>
                                    <option value="2029 - 2030">2029 - 2030</option>

                                </select>
                            </div>
                          

                            <div class="form-group">
                                <label for="editSemester">Semester</label>
                                <select class="form-control" id="editSemester" name="Semester" required>
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                    <option value="Summer">Summer</option>
                                  
                                </select>
                            </div>
                        </div>
                        
                
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="editSchoolyear">Submit</button>
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
    var editModal = document.getElementById("editSchoolyearModal");
    editModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
    
        document.getElementById("editSchoolyear").value = button.getAttribute("data-Schoolyear");
        document.getElementById("editSemester").value = button.getAttribute("data-Semester");
       
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
            text: "New SchoolYear record created successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "SchoolYearindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to create stuSchoolYeardent record.",
            icon: "error"
        }).then(() => {
            window.location.href = "SchoolYearindex.php";
        });
    }
    if (message === 'deleted') {
        swal({
            title: "Success!",
            text: "SchoolYear record deleted successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "SchoolYearindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to delete SchoolYear record.",
            icon: "error"
        }).then(() => {
            window.location.href = "SchoolYearindex.php";
        });
    }
    if (message === 'updated') {
        swal({
            title: "Success!",
            text: "SchoolYear record updated successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "SchoolYearindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to update SchoolYear record.",
            icon: "error"
        }).then(() => {
            window.location.href = "SchoolYearindex.php";
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