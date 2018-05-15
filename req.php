<?php
session_start();
include 'db.php';
if(!isset($_SESSION['puid'])){
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <style type="text/css">
    	body {
    		background-image: url("https://www.pixelstalk.net/wp-content/uploads/2016/05/Silver-Blur-Background-Wallpaper.jpg");
    	}
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Manikanta Silks</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

                        <li class="nav-item active">
              <a class="nav-link" href="req.php">Request</a>
            </li>
                        <?php if(isset($_SESSION['puser'])){
              echo '     <li class="nav-item dropdown">
        <button class="dropdown-toggle" data-toggle="dropdown" href="#">Hello,'.strtoupper($_SESSION['puser']).'
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </li>';
            }
            else{
              echo '<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>';
            }
              ?>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Manikanta Silks</h1>
          <p class="lead text-muted">Create Request.</p>

          <?php


if(isset($_POST['req'])){
  $vtype=$_POST['vtype'];
  $puid=$_SESSION['puid'];
  $nm=$_POST['nm'];
  $model=$_POST['model'];
  $cmt=$_POST['cmt'];

  $q=$mysqli->query("insert into request (`vtype`,`puid`,`name`,`model`,`comment`) value('$vtype','$puid','$nm','$model','$cmt') ") or die("unable to select");
if($q==1){
echo '<p class="lead">Succesfully Created Request!</p>'
;  }
  else{
    echo "Unable to create Request!";
  }
}

?>
          <p>
          <table class="table table-hover">
          <form action="#" method="POST">
          <tr>
          <td>Select Vehicle Type</td>
          <td><select name="vtype">
          <option value="selected" disabled selected>Select Vehicle Type</option>
            <option value="car">Car</option>
            <option class="bike">Bike</option>
          </select></td></tr>
          <tr><td>Name: </td>
          <td><input type="text" name="nm" placeholder="Enter Bike Name"></td></tr>
          <tr><td>Model :</td><td><input type="text" name="model" placeholder="Enter Model"></td></tr>
                    <tr><td>Comments: </td>
          <td><input type="text" name="cmt" placeholder="Enter Comments"></td></tr>
          <tr><td></td><td>
          <input type="submit" class="btn btn-success" name="req"></td></tr>
          </form>
          </table>
          </p>
        </div>
      </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
