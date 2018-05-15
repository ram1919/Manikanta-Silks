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
  <h4>Silks</h4>
  <?php
  if(isset($_GET['m'])){
    if($_GET['m']=='s'){
      echo '<h5>Succesfully Removed!</h5>';
    }
    if($_GET['m']=='u'){
      echo '<h5>Unable to Remove!</h5>';
    }
  }
  ?>
<table class="table table-hover">
  <tr>
    <td>S No.</td>
    <td>Name</td>
    <td>Category.</td>
    <td>Cost</td>

  </tr>
<?php
//session_start();
include '../db.php';
$qu=$mysqli->query("select * from cloth");
$i=0;
while($q=mysqli_fetch_array($qu)){
  $i=$i+1;
  $id=$q['id'];
  echo '
  <tr>
  <td>'.$i.'</td>
  <td>'.$q['name'].'</td>
  <td>'.$q['catid'].'</td>
  <td>'.$q['cost'].'</td>
  <td><a href="rmsk.php?id='.$id.'" class="btn btn-primary">Remove</a></td>
  </tr>';
}
?>


</table>
</div>
        <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $q=$mysqli->query("delete from cloth where id=$id");
  if($q==1){
    header("Location:rmsk.php?m=s");
  }
  else{
    header("Location:rmsk.php?m=u");
  }
}
?>