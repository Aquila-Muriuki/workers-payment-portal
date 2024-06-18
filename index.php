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
                <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/newClient.php">New Client</a>
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
      <div  class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8"><br><br>
          <h2>Welcome <?php echo($user);?>,</h2>
          <hr>
            
                  
        </div>
      </div>
    </div>
<script src="res/popper.js"></script>
<script src="res/jquery-3.7.1.js"></script>
<script src="res/bootstrap.js"></script>
<script src="res/bootstrap.js"></script>
</body>
</html>