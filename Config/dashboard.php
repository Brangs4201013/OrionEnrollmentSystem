<?php 


include ('../Config/layout.php');
include ('../Config/connecttodb.php');  // Ensure DB connection is included
?>
 
 <div class="container">
          <div class="page-inner">
            <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Check Students</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Students</p>
                          <h4 class="card-title"><?php 
                         $sql = "SELECT COUNT(*) FROM user WHERE user.Type = 'Student'";
                         $result = mysqli_query($conn, $sql);
                         if ($result) {
                             $row = mysqli_fetch_array($result);
                             echo $row[0];  // This will echo the total count of students
                         } else {
                             echo "Error: " . mysqli_error($conn);
                         }
                         

                          ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Registered Students</p>
                          <h4 class="card-title">
                          <?php
                          $sql = "SELECT COUNT(*) FROM enrollment WHERE enrollment.E_ID";
                         $result = mysqli_query($conn, $sql);
                         if ($result) {
                             $row = mysqli_fetch_array($result);
                             echo $row[0];  // This will echo the total count of students
                         } else {
                             echo "Error: " . mysqli_error($conn);
                         }                         
                          ?>

                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                          
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Teachers</p>
                          <h4 class="card-title">
                          <?php
                          $sql = "SELECT COUNT(*) FROM user WHERE user.Type = 'Teacher'";
                          $result = mysqli_query($conn, $sql);
                          if ($result) {
                              $row = mysqli_fetch_array($result);
                              echo $row[0];  // This will echo the total count of students
                          } else {
                              echo "Error: " . mysqli_error($conn);
                          }
                          ?>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-4">
                <div class="card card-round">
                  <div class="card-body">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">List of Students</div>
                      <div class="card-tools">
                        <div class="dropdown">
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

           
                  
            </div>
</div>