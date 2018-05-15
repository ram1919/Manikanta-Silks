<?php
include 'db.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manikanta Silks</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 15px;
    width: 300px;
}
</style>


    <link href="css/shop-homepage.css" rel="stylesheet">
    <script language="javascript" type="text/javascript">



</script>
  
       <style type="text/css">
      body {
        background-image: url("images/7243-01-low-poly-background-16x9-1.jpg");
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
              <a class="nav-link" href="clothes.php">Silks</a>
            </li>
                        <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
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

<?php
if(isset($_GET['bk'])){

  $bk=$_GET['bk'];
  $_SESSION['url']='cloth.php?bk='.$bk;
  $_SESSION['bk']=$bk;
  $q=$mysqli->query("select * from cloth where id=$bk");
  while($qu=mysqli_fetch_array($q)){

    echo '
    <!-- Page Content -->
    <div class="container">

      <div class="row">

       <div class="col-lg-3">
          <h1 class="my-4">Silks</h1>
          <div class="list-group">
            <a href="clothes.php" class="list-group-item active">Go Back</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
            
            <img class="img-thumbnail" src="'.$qu['imgurl'].'" alt="">
            <div class="card-body">
              <h3 class="card-title">'.$qu['name'].'</h3>
              <h4>₹'.$qu['cost'].'</h4>
              <p class="card-text">'.$qu['dsc'].'</p>
              <!--<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars-->
              <table class="table table-hover">
              <tr><td></td><th><u>Details</u></th></tr>
              <tr><th>Name</th><td>'.$qu['name'].'</td></tr>
              <tr><th>Cost</th><td>'.$qu['cost'].'</td></tr>
              
              <tr><th>Test</th><td>'.$qu['name'].'</td></tr>
              <tr><th>Test</th><td>'.$qu['name'].'</td></tr>
              </table>
            </div>
          </div>
          <!-- /.card -->
                  </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->';

        }
      }
?><br>
        <center>

         <?php if(!isset($_SESSION['puser'])){
            
           echo ' Please login to add to cart
            <a href="login.php?a=bk&bk='.$bk.'" class="btn btn-success">Login</a><br> ';
          }
          else{
            //<form name="form"></form>

            $puid=$_SESSION['puid'];
            $bk=$_SESSION['bk'];

            echo '
            
            <form action="cloth.php?bk='.$bk.'" method="POST">
            <input type="submit" name="csub" value="Add to Cart" />
            </form>
           ';
          }
          //<input type="submit" name="submit">
          ?>
          </center>
          <div id="cmtbo">
          </div>
          <div id="chat">


          </div>


  
  

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

<?php

if(isset($_POST['csub'])){

  $puid=$_SESSION['puid'];

  $bk=$_SESSION['bk'];
  //$puid=$_SESSION['puser'];
  $c=$mysqli->query("select * from cloth where id='$bk'");
  $cl=mysqli_fetch_array($c);
  $clid=$cl['clid'];
  $qty=1;
  $cost=$cl['cost'];
  $total=$cost;
  $q=$mysqli->query("insert into cart (`uid`,`clid`,`qty`,`cost`,`total`) values('$puid','$bk','$qty','$cost','$total')");
  
  
}
?>