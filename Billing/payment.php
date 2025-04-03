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
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Pay</button>
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
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <!-- <th>Actions</th> -->
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                          <th>Name</th>
                            <th>Total Amount</th>
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <!-- <th>Actions</th> -->
                          </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include ('../Config/connecttodb.php');
                            $sql = "SELECT * FROM user INNER JOIN invoice ON user.User_ID = invoice.User_ID INNER JOIN payment on payment.Invoice_ID = invoice.Invoice_ID WHERE user.type='student'";                          
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["Fname"]."  ".$row['Lname']." ".$row['Minitial']."</td>";
                                echo "<td>".$row["Total_Amount"]."</td>";
                                echo "<td>".$row["Amountpaid"]."</td>";
                                echo "<td>";
                               // echo "<form action='BillingController.php' method='post'>";
                               // echo "<input type='hidden' name='User_ID' value='".$row['User_ID']."'>";
                               // echo "<input type='hidden' name='Invoice_ID' value='".$row['Invoice_ID']."'>";
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
<div>

<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Pay</h5>
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
                                <label for="Total_Amount">Payment Date</label>
                                <input type="text" class="form-control" id="Payment Date" name="Payment Date" placeholder="Enter Date" required>
                            </div>
                            <div class="form-group">
                                <label for="Amountpaid">Amount</label>
                                <input type="text" class="form-control" id="Amountpaid" name="Amountpaid" placeholder="Enter Amount" required>
                            </div>
                            <div class="form-group">
                            <label for="Paymentmethod">Payment Method:</label>
        <select name="Paymentmethod" id="Paymentmethod" required>
            <option value="cash">Cash</option>
            <option value="credit_card">Credit Card</option>
            <option value="debit_card">Debit Card</option>
        </select>
                            </div>  
                            <div class="form-group">
                                <label for="Status">Status</label>
                                <select class="form-control" id="Status" name="Status" required>
                                    <option value="Paid">Paid</option>
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
<!-- <form action="BillingController.php" method="post">
        <label for="User_ID">Student ID:</label>
        <input type="text" id="User_ID" name="User_ID" required><br><br>
        <input type="submit" value="View Student" name="viewStudent">
    </form>
    <form action="BillingController.php" method="post">
        <label for="Invoice_ID">Invoice ID:</label>
        <input type="text" id="Invoice_ID" name="Invoice_ID" required><br><br>
        <input type="submit" value="View Payment" name="viewPayment">
    </form>
</div> -->
<div>

    <h2>Payment History</h2>
    <table border="1">
        <tr>
            <th>Students</th>
            <th>Payment Date</th>
            <th>Amount Paid</th>
            <th>Payment Method</th>
        </tr>
        <?php
        include '../Config/connecttodb.php';
        $sql = "SELECT * FROM payment INNER JOIN invoice ON payment.Invoice_ID = invoice.Invoice_ID INNER JOIN user ON invoice.User_ID = user.User_ID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo  "<tr><td>" . $row["Fname"]. " " . $row["Minitial"]. " " . $row["Lname"]. " </td><td>" . $row["Paymentdate"]. "</td><td>" . $row["Amountpaid"]. "</td><td>" . $row["Paymentmethod"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table>
</div>
<script>
        function validateForm() {
            var paymentDate = document.getElementById("Paymentdate").value;
            var amountPaid = document.getElementById("Amountpaid").value;
            var paymentMethod = document.getElementById("Paymentmethod").value;

            if (paymentDate == "" || amountPaid == "" || paymentMethod == "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
        document.querySelector("form").onsubmit = function() {
            return validateForm();
        };
    </script>

