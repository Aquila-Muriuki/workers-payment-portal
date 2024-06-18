<?php
session_start();
if(!isset($_SESSION['username']))
{
  header("Location:/login.php");
}else
{
  $user = $_SESSION['username'];
}
if (isset($_GET['id']) && !empty($_GET['id'])) 
{
    $id = $_GET['id'];
    $con= new mysqli("localhost","root","","keyame");
    $balanceSQL = "SELECT `balance` FROM `clientservices` WHERE `serviceID`='$id'";

    $result = $con->query($balanceSQL);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $balance = $row['balance'];
        }
    }
    
}else
{
    header("Location:/index.php");
}

if(isset($_POST['cash']))

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
                <a class="nav-link" href="/records.php">Records</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link active" aria-current="page" href="/consolidation.php">Consolidation</a>
              </li>
            </ul>
          </div>
        </div>
      </nav><br><br>
      
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h3>Payment : total( <?php echo($balance);?> )</h3>
            <form action="payment.php" method="post">
                <div class="row">
                    <div class="col">
                        <label for="email">Cash</label>
                      <input type="number" class="form-control" value="0" placeholder="Enter amount" name="cash">
                      <input type="hidden" value="<?php echo($balance);?>" name="total" id="total">
                    </div>
                    <div class="col">
                        <label for="m-pesa">M-Pesa</label>
                      <input type="number" class="form-control" value="0" placeholder="Enter amount" name="m-pesa">
                    </div>
                  </div><br>
                  <div class="col">
                    <label for="email">M-Pesa STK Push Number</label>
                    <input type="number" class="form-control" placeholder="Enter phone number" name="stk-push-number">
                </div><br>
                  <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </form>
        </div>
      </div>

      
<script src="res/popper.js"></script>
<script src="res/jquery-3.7.1.js"></script>
<script src="res/bootstrap.js"></script>
<script src="res/bootstrap.js"></script>
</body>
</html>