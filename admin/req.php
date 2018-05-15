<?php
session_start();
include '../db.php';
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
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
<table class="table table-hover">
<tr>
<td>S.No</td>
<td>User Name</td>

<td>Accept</td>
</tr>
<?php
$q=$mysqli->query("select * from request");
$i=0;
while($qu=mysqli_fetch_array($q)){
  $puid=$qu['puid'];
  $u=$mysqli->query("select * from puser where id=$puid");
  $us=mysqli_fetch_array($u);
  $unm=$us['name'];
  $i=$i+1;
  echo '
  <tr>
  <td>'.$i.'</td>
  <td>'.$unm.'</td>
  <td>'.$qu['vtype'].'</td>
  <td>'.$qu['name'].'</td>
  <td>'.$qu['model'].'</td>
  <td>'.$qu['comment'].'</td>
    <td></td>
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