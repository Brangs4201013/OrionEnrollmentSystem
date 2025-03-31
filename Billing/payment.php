<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMent</title>
</head>
<body>  
<div>
    <h1>Payment</h1>
    <form action="BillingController.php" method="post">
        <label for="Paymentdate">Payment Date:</label>
        <input type="text" id="Paymentdate" name="Paymentdate" required><br><br>
        <label for="Amountpaid">Amount:</label>
        <input type="text" id="Amountpaid" name="Amountpaid" required><br><br>
        <label for="Paymentmethod">Payment Method:</label>
        <select name="Paymentmethod" id="Paymentmethod" required>
            <option value="cash">Cash</option>
            <option value="credit_card">Credit Card</option>
            <option value="debit_card">Debit Card</option>
        </select><br><br>
        <input type="submit" value="Submit" name="SavePayment">
    </form>
</div>
</body>
</html>
