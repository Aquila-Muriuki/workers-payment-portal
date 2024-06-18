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
                <a class="nav-link active" aria-current="page" href="/newClient.php">New Client</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="/records.php">Records</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="/consolidation.php">Consolidation</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        <br><br>
      <div  class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <h2>New Customer</h2>
          <hr>
            <form action="/dataSaver.php" method="post">
                <h3>Personal Information</h3>
                <div class="row">
                    <div class="col">
                        <label for="email">First Name</label>
                      <input type="text" class="form-control" placeholder="Enter first name" name="first-name">
                    </div>
                    <div class="col">
                        <label for="email">Last Name</label>
                      <input type="text" class="form-control" placeholder="Enter last name" name="last-name">
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col">
                        <label for="email">Phone number</label>
                      <input type="tel" class="form-control" placeholder="0712345678" name="phone-number">
                    </div>
                    <div class="col">
                    </div>
                  </div><br>
                  <hr>
                  <h3>Service Information</h3>
                  <div class="row">
                    <div class="col">
                        <label for="email">Services</label>
                        <select class="form-select" id="serviceSelect" name="service-code">
                            <option value="Still-Photos" selected disabled>Select a service</option>
                            <?php
                                $con= new mysqli("localhost","root","","keyame");
                                $serviceSQL = "SELECT * FROM `services`";
                                $result = $con->query($serviceSQL);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['serviceCode']."'>".$row['serviceName']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="quantity">Quantity</label>
                      <input type="number" class="form-control" placeholder="Enter quantity" name="quantity">
                    </div>
                  </div><br>
                  <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </form>
        </div>
      </div>
    </div>
<script src="res/popper.js"></script>
<script src="res/jquery-3.7.1.js"></script>
<script src="res/bootstrap.js"></script>
<script src="res/bootstrap.js"></script>
</body>
</html>