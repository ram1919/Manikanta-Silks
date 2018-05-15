<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Cat</title>
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
              <a class="nav-link" href="home.php">Home
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

      <div class="text-center" style="padding:50px 0">
      <h4>Add Category</h4>
<table class="table table-hover">
        <form action="" method="POST">
  <tr>
    <td>Category : </td>
    <td><input type="text" name="cat"></td>
  </tr>
        <td></td><td>
         <input class="btn btn-success" type="submit"/>
      </td></form>
</table>
</div>
      

              <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
if(isset($_POST['cat'])){
	$cat=$_POST['cat'];
	$q=$mysqli->query("insert into cat (cat) values ('$cat')");
	if($q==1){
		echo 'Successfully Added Category. Add More!';
	}
	else{
		echo 'Can`t add ';
	}
}
?>