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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clothes.php">Silks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Welcome to Manikanta Silks</h1>
          <p class="lead text-muted">Login to Continue.</p>
          <p>
          <form action="#" method="POST">
          <input type="text" name="unm" placeholder="Username"><br>
          <input type="password" name="psw" placeholder="password"><br>
          <input type="submit" class="btn btn-success" name="log">
          </form>
          </p><br>
          <p class="lead text-muted">Or Register Now.</p>
          <form action="#" method="POST">
            <input type="text" name="name" placeholder="Enter Your Name"><br>
            <input type="text" name="punm" placeholder="Enter Username"><br>
            <input type="password" name="ppwd" placeholder="Enter password"><br>
            <input class="btn btn-success" type="submit" name="reg">
          </form>

          </p>
        </div>
      </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
session_start();
include 'db.php';

if(isset($_POST['log'])){
  $unm=$_POST['unm'];
  $psw=$_POST['psw'];
  $q=$mysqli->query("select * from user where unm='$unm' and psw='$psw'") or die("unable to select");
  $c=$q->num_rows;
  if($c>0){
  /*if(isset($_GET['a'])){
    if($_GET['a']=='bk'){
    $bk=$_GET['bk'];
    header("Location:bike.php?bk=$bk");
    }
  else if($_GET['a']=='car'){
    $car=$_GET['car'];
    header("Location:car.php?car=$car");
  }
  else{
    header("Location:index.php");
  }  
  }
  //header("Location:")*/
  $_SESSION['puser']=$unm;
    //$q=$mysqli->query("select * from puser where unm='$unm'");
    $qu=mysqli_fetch_array($q);
    $_SESSION['puid']=$qu['id'];
   
  header("Location:clothes.php");
  }
  else{
    echo "wrong username 0r password!";
  }
}
if(isset($_POST['reg'])){
  $name=$_POST['name'];
  $unm=$_POST['punm'];
  $psw=$_POST['ppwd'];
  $q=$mysqli->query("insert into user (`name`,`unm`,`psw`) values('$name','$unm','$psw')");
  if($q==1){
header("Location:login.php");
}
}

?>