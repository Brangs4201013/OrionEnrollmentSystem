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
                  <?php
                            include ('../Config/connecttodb.php');
                            // Fetch data from the database
                            $User_ID = $_GET['user_id'];
                            $sql = "SELECT * FROM user INNER JOIN invoice ON user.User_ID = invoice.User_ID 
                            -- INNER JOIN payment ON invoice.Invoice_ID = payment.Invoice_ID
                             WHERE user.User_ID ='".$User_ID."'";   
                            $result = $conn->query($sql);
                          
                                // Output data of each row
                                $row = $result->fetch_assoc();
                                    echo "<h4>Student ID: " . $row["User_ID"]. "</h4>";
                                    echo "<h4>Name: " . $row["Fname"]. " " . $row["Minitial"]. " " . $row["Lname"]. "</h4>";
                            $result = $conn->query($sql);
                          
                            ?>
                            <p>
                            <a href="invoice.php" class="btn btn-primary">Back</a>

                            </p>
                 </div>
        </div>  
<div><div>
<div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Payment History</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                      <tr>
        <th>Payment Date</th>
        <th>Amount Paid</th>
        <th>Payment Method</th>
    </tr>
                      </thead>
                        <tbody>
                        <?php 
    $invoice_ID = $row['Invoice_ID'];               
    $sql = "SELECT * FROM  invoice INNER JOIN payment ON invoice.Invoice_ID = payment.Invoice_ID
    WHERE invoice.Invoice_ID = '".$invoice_ID."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo  "<tr><td>" . $row["Paymentdate"]. "</td><td>" . $row["Amountpaid"]. "</td><td>" . $row["Paymentmethod"]. "</td></tr>";
        }
    } 
    ?>
</table>
</div>

<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Pay</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="BillingController.php" method="POST">
                    <input type="hidden" name="Invoice_ID" value="<?php echo $row['Invoice_ID']; ?>">
                    <input type="hidden" name="User_ID" value="<?php echo $row['User_ID']; ?>">
                    <div class="row ">
                    <div class="col-md-6">      
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
                            <!-- <div class="form-group">
                                <label for="Status">Status</label>
                                <select class="form-control" id="Status" name="Status" required>
                                    <option value="Paid">Paid</option>
                                    <option value="Partial">Partial</option>
                                </select>
                            </div>               -->
                        </div>

                    </div>
                    <div class="card-action ms-auto me-auto" style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="SavePayment">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


