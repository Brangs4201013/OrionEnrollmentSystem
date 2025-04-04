<?php 
    include ('../Config/layout.php');
    ?>
    <div class="container">
          <div class="page-inner">

          
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Subject List</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Add a new Subject</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Subject_code</th>
                            <th>Subject_Description</th>
                            <th>Sched_ID</th>
                            <th>Actions</th>
                          
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Subject_code</th>
                            <th>Subject_Description</th>
                            <th>Sched_ID</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include ('../Config/connecttodb.php');
                            $sql = "SELECT * FROM subject";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["Subjectcode"]."</td>";
                                echo "<td>".$row["Subjectdesc"]."</td>";
                                echo "<td>".$row["Sched_ID"]."</td>";
                                echo "<td>";
                                echo "<a href='#' class='btn btn-link btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#editUserModal' 
                                        data-id='".$row["Subject_ID"]."' 
                                        data-Subjectdesc='".$row["Subjectdesc"]."'
                                        data-Subjectcode='".$row["Subjectcode"]."'>
                                        <i class='fa fa-edit'></i>
                                      </a>";
                                echo "<a href='SubjectController.php?Subject_ID=".$row["Subject_ID"]."' type='button' class='btn btn-link btn-danger delete-btn'>";
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
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-MD modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="SubjectController.php" method="POST">
                    <div class="row ">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="Subjectcode">Subject Code</label>
                                <input type="Subjectcode" class="form-control" id="Subjectcode" name="Subjectcode" placeholder="Subjectcode" required>
                            </div>
                            <div class="form-group">
                                <label for="Subjectdesc">Subject Description</label>
                                <input type="text" class="form-control" id="Subjectdesc" name="Subjectdesc" placeholder="Enter Subject description" required>
                            </div>
                        </div>

                    </div>
                    <div class="card-action ms-auto me-auto mt-3" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="saveSubject">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of create student modal -->
 <!-- Edit Student Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="SubjectController.php" method="POST">
                    <input type="hidden" id="editSubjectID" name="Subject_id">

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                <label for="editSubjectcode">Subject Code</label>
                                <input type="text" class="form-control" id="editSubjectcode" name="Subjectcode" required>
                            </div>
                            <div class="form-group">
                                <label for="editSubjectdesc">Subject Description</label>
                                <input type="text" class="form-control" id="editSubjectdesc" name="Subjectdesc" required>
                            </div>
                            <div class="form-group">
                            <label for="editSched_ID">Sched_ID</label>
                                <select class="form-control" id="editSched_ID" name="Sched_ID" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-action ms-auto me-auto mt-3" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="editSubject">Submit</button>
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
    var editModal = document.getElementById("editUserModal");
    editModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        
        document.getElementById("editSubjectID").value = button.getAttribute("data-id");
        document.getElementById("editSubjectcode").value = button.getAttribute("data-Subjectcode");
        document.getElementById("editSubjectdesc").value = button.getAttribute("data-Subjectdesc");
    });
});

</script>
<!-- script for notif alert  -->
<script>
    // Check if there is a message in the URL
    // let urlParams = new URLSearchParams(window.location.search);
    // let message = urlParams.get('message');

    if (message === 'created') {
        swal({
            title: "Success!",
            text: "New subject record created successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Subjectindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to create subject record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Subjectindex.php";
        });
    }
    if (message === 'deleted') {
        swal({
            title: "Success!",
            text: "Subject record deleted successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Subjectindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to delete subject record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Subjectindex.php";
        });
    }
    if (message === 'updated') {
        swal({
            title: "Success!",
            text: "Subject record updated successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Subjectindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to update subject record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Subjectindex.php";
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