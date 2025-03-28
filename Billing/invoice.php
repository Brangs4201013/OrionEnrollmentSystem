<?php 
include ('../Config/layout.php');
require '../Config/connecttodb.php';
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<div class="container">
          <div class="page-inner">

          
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Student List</h4>
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
                                echo "<td>".$row["Fname"]."  ".$row['Lname']." ".$row['Minitial']."</td>";
                                echo "<td>".$row["Total_Amount"]."</td>";
                                echo "<td>".$row["Due-date"]."</td>";
                                echo "<td>".$row["Status"]."</td>";
                                echo "<td>";
                                // echo "<a href='#' class='btn btn-link btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#editUserModal' 
                                //         data-id='".$row["User_ID"]."' 
                                //         data-username='".$row["Username"]."' 
                                //         data-fname='".$row["Fname"]."' 
                                //         data-lname='".$row["Lname"]."' 
                                //         data-minitial='".$row["Minitial"]."' 
                                //         data-gender='".$row["Gender"]."' 
                                //         data-age='".$row["Age"]."' 
                                //         data-contact='".$row["Contact"]."' 
                                //         data-email='".$row["Email"]."' 
                                //         data-department='".$row["Department"]."'>
                                //         <i class='fa fa-edit'></i>
                                //       </a>";
                                // echo "<a href='StudentController.php?user_id=".$row["User_ID"]."' type='button' class='btn btn-link btn-danger delete-btn'>";
                                // echo "<i class='fa fa-times'></i>";
                               // echo "</a>";
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