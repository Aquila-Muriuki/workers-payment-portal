<?php
session_start();
$error = "";

if (isset($_POST['username'])) 
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginSQL = "SELECT `password` FROM `staff` WHERE `username`='$username'";
    $con= new mysqli("localhost","root","","keyame");
    $result = $con->query($loginSQL);
    $dbPassword = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dbPassword = $row['password'];
        }
            
        if(md5($password)===$dbPassword)
        {
            session_start();
            $_SESSION['username'] = $username;
            header("Location:/index.php");
        }else
        {
            $error .= "Incorrect Password, please try again";
        }
    }else
    {
        $error .= "Incorrect username or password";
    }
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
    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/index.php">Staff Portal</a>
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
      </nav><br><br> -->
      
      <div class="row">
        <div class="col-lg-4 col-sm-2 col-md-2"></div>
        <div class="col-lg-4 col-sm-8 col-md-2">
        <br><br><br><br><br><br><br><br>
        <div class="row">
          <div></div>

        </div>
        <img src="icon.png" alt="Keyame Logo" height="50px" width="50px" style="align-self: center;">
        <?php
            if($error!=""){
                ?><div class="alert alert-danger alert-dismissible hidden">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Error:</strong> <?php echo($error);?>.
                </div><?php
            }
        ?>
        <h3 style="text-align:center;">Login</h3><br>
        <form action="login.php" method="post" autocomplete="on">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="email" placeholder="Enter username" name="username" required>
            <label for="username">Email</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            <label for="password">Password</label>
            </div><br>
            <div class="row center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        </div>
      </div>

      
<script src="res/popper.js"></script>
<script src="res/jquery-3.7.1.js"></script>
<script src="res/bootstrap.js"></script>
<script src="res/bootstrap.js"></script>
</body>
</html>