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

    <title>Bikes and Cars</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript">
      

    </script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Bikes and Cars</a>
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
            <li class="nav-item">
              <a class="nav-link" href="bikes.php">Bikes</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="cars.php">Cars</a>
            </li>
            <li class="nav-item">
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

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Cars</h1>
          <div class="list-group">
            <a href="cars.php" class="list-group-item">All</a>
            <?php
            $qu=$mysqli->query("select * from ccat");
            while($q=mysqli_fetch_array($qu)){
              echo '
              <a href="cars.php?cid='.$q['id'].'&cat='.$q['cat'].'" class="list-group-item">'.$q['cat'].'</a> ';}
              ?>                     
          </div>

        </div>
        <?php
        if(!isset($_GET['cat'])){

          echo '
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

                        <h4><u>Showing All</u></h4>
         <!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/suzuki-gsx-s1000f.jpeg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>-->

          <div class="row">';
 
          $q=$mysqli->query("select * from car");
          $c=$q->num_rows;
          if($c<0){
            echo '<h4>No Cars Available with this Category</h4>';
          }
          //echo '<h4>Showing for :'.$cat.'</h4>';
          echo '<div class="row">';
          
          while($qu=mysqli_fetch_array($q)){
            $cid=$qu['id'];
            $cnm=$qu['name'];
            $cost=$qu['cost'];
            $img=$qu['imgurl'];
            $dsc=$qu['dsc'];
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="car.php?car='.$cid.'"><img class="card-img-top" src="'.$img.'" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="car.php?car='.$cid.'">'.$cnm.'</a>
                  </h4>
                  <h5>₹'.$cost.'</h5>
                  <p class="card-text">'.wordwrap($dsc,5).'</p>
                </div>
              </div>
            </div>
            ';}
            echo '</div></div>';
          }
          ?>
 <!--           <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/suzuki-gsx-s1000f.jpeg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item One</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Two</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Three</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Four</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Five</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Six</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

          </div>
          <!-- /.row ->

        </div>
        <!-- /.col-lg-9 -->
        <?php 

        if(isset($_GET['cat'])){
          $cid=$_GET['cid'];
          $cat=$_GET['cat'];
          echo '<div class="col-lg-9">
          <h4>Showing For : '.$cat.'</h4>';
 
          $q=$mysqli->query("select * from car where catid=$cid");
          $c=$q->num_rows;
          if($c<0){
            echo '<h4>No Bikes Available with this Category</h4>';
          }
          //echo '<h4>Showing for :'.$cat.'</h4>';
          echo '<div class="row">';
          
          while($qu=mysqli_fetch_array($q)){
            $cid=$qu['id'];
            $cnm=$qu['name'];
            $cost=$qu['cost'];
            $img=$qu['imgurl'];
            $dsc=$qu['dsc'];
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="car.php?car='.$cid.'"><img class="card-img-top" src="'.$img.'" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="car.php?car='.$cid.'">'.$cnm.'</a>
                  </h4>
                  <h5>₹'.$cost.'</h5>
                  <p class="card-text">'.wordwrap($dsc,5).'</p>
                </div>
              </div>
            </div>
            ';}
            echo '</div></div>';
          }
          ?>



      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

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
