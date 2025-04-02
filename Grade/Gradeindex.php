
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
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addGrade">Add a new Grade</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Grade ID</th>
                            <th>Enrollment ID</th>
                            <th>Grade</th>
                            <th>Actions</th>
                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                          <th>Grade ID</th>
                          <th>Enrollment ID</th>
                            <th>Grade</th>                           
                            <th>Actions</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include ('../Config/connecttodb.php');
                            $sql = "SELECT * FROM grades";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["Grade_ID "]."</td>";
                                echo "<td>".$row["E_ID"]."</td>";
                                echo "<td>".$row["Grade"]."</td>";
                              
                                echo "<td>";
                                echo "<a href='#' class='btn btn-link btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#editGradeModal' 
                                        data-Grade_ID='".$row["Grade_ID"]."' 
                                        data-E_ID='".$row["E_ID"]."' 
                                        data-Grade='".$row["Grade"]."'>
                                        <i class='fa fa-edit'></i>                                  
                                      </a>";
                                    

                                echo "<a href='SchoolYearController.php?Grd_id=".$row["Grade_ID"]."' type='button' class='btn btn-link btn-danger delete-btn'>";
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
<div class="modal fade" id="addGrade" tabindex="-1" aria-labelledby="addGradeLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGradeLabel">Add New Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="GradeController.php" method="POST">
                    <div class="row">
                        <div class="col-md-10 ms-auto me-auto">
                       
                        <div class="form-group">
                                <label for="editE_ID">Name</label>
                                <select class="form-control" id="editE_ID" name="E_ID" required>
                                <?php 
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Enrollment'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row["E_ID"]."></option>";
                                                }
                                            } else {
                                                echo "<option value=''>No Enrollment ID Available</option>";
                                            }
                                            $conn->close();

                            
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="editGrade">Semester</label>
                                <select class="form-control" id="editGrade" name="Grade" required>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                    <option value="hagbong">hagbong</option>
                                    <option value="Summer">Summer</option>
                                  
                                </select>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="saveGrade">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of create student modal -->
 <!-- Edit Student Modal -->
<div class="modal fade" id="editGradeModal" tabindex="-1" aria-labelledby="editGradeLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGradeLabel">Edit Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="GradeController.php" method="POST">
                <input type="hidden" id="Grade_ID" name="Grade_ID">

                    <div class="row">
                    <div class="col-sm-10 ms-auto me-auto">
                        
                    <div class="form-group">
                                <label for="editE_ID">Name</label>
                                <select class="form-control" id="editE_ID" name="E_ID" required>
                                <?php 
                                    include ('../Config/connecttodb.php');
                                    $sql = "SELECT * FROM user WHERE Type = 'Enrollment'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row["E_ID"]."></option>";
                                                }
                                            } else {
                                                echo "<option value=''>No Enrollment ID Available</option>";
                                            }
                                            $conn->close();

                            
                                    ?>
                                </select>
                            </div>

                             
                            <div class="form-group">
                                <label for="editGrade">Semester</label>
                                <select class="form-control" id="editGrade" name="Grade" required>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                    <option value="hagbong">hagbong</option>
                                    <option value="Summer">Summer</option>
                                  
                                </select>
                            </div>
                        </div>
                        
                
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="editGrade">Submit</button>
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
    var editModal = document.getElementById("editGradeModal");
    editModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
    
        document.getElementById("editE_ID").value = button.getAttribute("data-E_ID");
        document.getElementById("editGrade").value = button.getAttribute("data-Grade");
       
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
            window.location.href = "Gradeindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to create student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Gradeindex.php";
        });
    }
    if (message === 'deleted') {
        swal({
            title: "Success!",
            text: "Student record deleted successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Gradeindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to delete student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Gradeindex.php";
        });
    }
    if (message === 'updated') {
        swal({
            title: "Success!",
            text: "Student record updated successfully!",
            icon: "success"
        }).then(() => {
            window.location.href = "Gradeindex.php"; // Removes message from URL
        });
    } else if (message === 'error') {
        swal({
            title: "Error!",
            text: "Failed to update student record.",
            icon: "error"
        }).then(() => {
            window.location.href = "Gradeindex.php";
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