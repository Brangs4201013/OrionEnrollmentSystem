<?php 
include ('../Config/layout.php');
 include '../Config/connecttodb.php';
?>

<div class="container">
          <div class="page-inner">
            
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Student List</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Add a new Student</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Total Amount</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                          <th>Name</th>
                            <th>Total Amount</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include ('../Config/connecttodb.php');
                           $sql = "SELECT * FROM user INNER JOIN invoice ON user.User_ID = invoice.User_ID WHERE user.type='student'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["Fname"]."  ".$row['Lname']." ".$row['User_ID']."</td>";
                                echo "<td>".$row["Total_Amount"]."</td>";
                                echo "<td>".$row["Due_date"]."</td>";
                                echo "<td>".$row["Status"]."</td>";
                                echo "<td>";
                                echo "<a href='#' class='btn btn-link btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#editUserModal' 
                                        data-id='".$row["User_ID"]."' 
                                        data-username='".$row["Username"]."' 
                                        data-fname='".$row["Fname"]."' 
                                        data-lname='".$row["Lname"]."' 
                                        data-minitial='".$row["Minitial"]."' 
                                        data-gender='".$row["Gender"]."' 
                                        data-age='".$row["Age"]."' 
                                        data-contact='".$row["Contact"]."' 
                                        data-email='".$row["Email"]."' 
                                        data-department='".$row["Department"]."'>
                                        <i class='icon-book-open  '></i>
                                      </a>";
                                echo "<a href='payment.php?user_id=".$row["User_ID"]."' type='button' class='btn btn-link btn-danger select-btn'>";
                                echo "<i class='icon-paypal'></i>";
                                echo "</a>";
                                echo "</td>";
                                echo "</tr>";
                                 }
                            } else {
                                echo "0 results";
                            }
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="BillingController.php" method="POST">
                    <div class="row ">
                    <div class="col-md-6">
                   <div class="form-group">      
    <label for="Student">Student</label>
    <select class="form-control" id="User_ID" name="User_ID">
        <option value=" ">Select Student</option>             
        <?php
         include '../Config/connecttodb.php';
         $sql = "SELECT * FROM user WHERE type ='student'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<option value = '".$row['User_ID']."'>".$row['Fname']. " ".$row['Lname']." ".$row['Minitial']."</option>";
            }
          }
        ?>
    </select>
</div>
                            <div class="form-group">
                                <label for="Total_Amount">Total_Amount</label>
                                <input type="number" class="form-control" id="Total_Amount" name="Total_Amount" placeholder="Enter Total_Amount" required>
                            </div>
                            <div class="form-group">
                                <label for="Due_date">Due Date</label>
                                <input type="text" class="form-control" id="Due_date" name="Due_date" placeholder="Enter Due Date" required>
                            </div>
                            <div class="form-group">
                                <label for="Status">Status</label>
                                <select class="form-control" id="Status" name="Status" required>
                                    <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
                                    <option value="Partial">Partial</option>
                                </select>
                            </div>              
                        </div>

                    </div>
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="saveStudent">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of create student modal -->

<!-- view student modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUserModalLabel">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Student details will be displayed here -->
                <form action="View Student.php" method="POST">
                <input type="hidden" id="editUserID" name="user_id">

            </div>
        </div>
    </div>
</div>
<!-- end of view student modal -->

<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Student List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_user.php" method="POST">
                    <input type="hidden" id="editUserID" name="user_id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editUsername">Student Name</label>
                                <input type="text" class="form-control" id="editUsername" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="editPassword">New Password (Leave blank to keep current)</label>
                                <input type="password" class="form-control" id="editPassword" name="password">
                            </div>
                            <div class="form-group">
                                <label for="editFname">First Name</label>
                                <input type="text" class="form-control" id="editFname" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label for="editLname">Last Name</label>
                                <input type="text" class="form-control" id="editLname" name="lname" required>
                            </div>
                            <div class="form-group">
                                <label for="editMinitial">Middle Initial</label>
                                <input type="text" class="form-control" id="editMinitial" name="minitial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editGender">Gender</label>
                                <select class="form-control" id="editGender" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editAge">Age</label>
                                <input type="number" class="form-control" id="editAge" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="editContact">Contact</label>
                                <input type="text" class="form-control" id="editContact" name="contact" required>
                            </div>
                            <div class="form-group">
                                <label for="editEmail">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="editDepartment">Department</label>
                                <input type="text" class="form-control" id="editDepartment" name="department" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="editStudent">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</div>
</div>

<!-- script for select student-->

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