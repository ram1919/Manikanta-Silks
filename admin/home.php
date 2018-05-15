<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location:index.php?m=wrong");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Manikanta Silks:Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
                        <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
<br><br>
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
<table class="table table-hover">
  <tr>
    <td>Add Category </td>
    <td><a href="addcat.php" class="btn btn-primary">Proceed</a></td>
  </tr>

    <tr>
    <td>Add Silks</td>
    <td><a href="addsk.php" class="btn btn-primary">Proceed</a></td>
  </tr>
 <!--   <tr>
    <td>Remove Silks</td>
    <td><a href="rmsk.php" class="btn btn-primary">Proceed</a></td>
  </tr>-->

</table>
</div>
        <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>