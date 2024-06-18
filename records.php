<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("Location:/login.php");
}else
{
  $user = $_SESSION['username'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff &middot; Keyame</title>

    <link rel="stylesheet" href="res/bootstrap.css">
    <link rel="stylesheet" href="res/style.css">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/index.php">Staff</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/newClient.php">New Client</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link active" aria-current="page" href="/records.php">Records</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="/consolidation.php">Consolidation</a>
              </li>
            </ul>
          </div>
        </div>
      </nav><br><br>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <p>We have records of all clients served by the user</p>
            <h3>Records</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Service Name</th>
                    <th>Quantity</th>
                    <th>Cash Paid</th>
                    <th>M-Pesa paid</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php
            $con= new mysqli("localhost","root","","keyame");
            $serviceSQL = "SELECT * FROM `clientservices`";
            $result = $con->query($serviceSQL);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // get names
                    $loginSQL = "SELECT `firstName`,`lastName` FROM `clients` WHERE `customerID`='".$row["customerID"]."'";
                    $resultz = $con->query($loginSQL);
                    if ($resultz->num_rows > 0) {
                        while($rowz = $resultz->fetch_assoc()) {
                            if($row['balance']==0){$btn = "<button class='btn btn-success'>Fully Paid</button>";}
                            else{$btn = "<a href='/payment.php?id=".$row['serviceID']."'><button class='btn btn-primary'>Checkout</button></a>";}
                            echo "<tr><td>".$rowz['firstName']." ".$rowz['lastName']."</td><td>".$row['serviceType']."</td>
                            <td>".$row['serviceQuantity']."</td><td>".$row['cashPay']."</td>
                            <td>".$row['MpesaPay']."</td><td>".$row['balance']."</td>
                            <td>".$row['status']."</td><td>".$btn."</td></tr>";
                        }
                    }
                }
            }?>
                </tbody>
            </table>
        </div>
      </div>
  
<script src="res/popper.js"></script>
<script src="res/jquery-3.7.1.js"></script>
<script src="res/bootstrap.js"></script>
<script src="res/bootstrap.js"></script>
</body>
</html>