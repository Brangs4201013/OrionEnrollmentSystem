<?php 


include ('../Config/layout.php');

?>
 

 <div class="container">
          <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                <div class="card">

                  <div class="card-header">
                    <h4 class="card-title">Basic</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Schlyr_ID</th>
                            <th>Schoolyear</th>
                            <th>Semester</th>
                           
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Schoolyr_ID</th>
                            <th>Schoolyear</th>
                            <th>Semester</th>
                           
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            require("../Config/connecttodb.php");
                            $sql = "SELECT * FROM schoolyear";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>" . $row['Schoolyr_ID'] . "</td>";
                                echo "<td>" . $row['Schoolyear'] . "</td>";
                                echo "<td>" . $row['Semester'] . "</td>";
                                echo "<td><a href='Edit_School_Year_Form.php?Schoolyr_ID=". $row['Schoolyr_ID'] . "'class='btn btn-warning'>
                               <span class='btn-label'>
                          <i class='fa fa-info'></i>
                        </span>Edit</a></td>";
                                echo "<td><a href='Delete_School_Year_Form.php?Schoolyr_ID=". $row['Schoolyr_ID'] . "'>Delete</a></td>";
                                echo "</tr>";

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
            </div>

