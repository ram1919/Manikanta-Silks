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

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript">
      

    </script>
    
       <style type="text/css">
      body {
        background-image: url("images/7243-01-low-poly-background-16x9-1.jpg");
      }
      img {
            border: 1px solid #ddd;
    border-radius: 4px;
    padding: 15px;
    width: 200px;
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
                                    <li class="nav-item"> <span class="glyphicon glyphicon-shopping-cart"></span>
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

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <!--<h1 class="my-4">Silks</h1>-->
          <div class="list-group">
          <h4>Categories</h4>
            <a href="clothes.php" class="list-group-item"><button class="btn btn-primary">All</button> </a>
            <?php
            $qu=$mysqli->query("select * from cat");
            while($q=mysqli_fetch_array($qu)){
              echo '
              <a href="clothes.php?cid='.$q['id'].'&cat='.$q['cat'].'" class="list-group-item"><button class="btn btn-primary">'.$q['cat'].'</button></a> ';}
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

//  $q=$mysqli->query("select * from cloth order by cost desc");
          $q=$mysqli->query("select * from cloth");
          $c=$q->num_rows;
          if($c<0){
            echo '<br><h4>No Silks Available with this Category</h4>';
          }
          //echo '<h4>Showing for :'.$cat.'</h4>';
         // echo '<div class="row">';
          
          while($qu=mysqli_fetch_array($q)){
            $bid=$qu['id'];
            $bnm=$qu['name'];
            $cost=$qu['cost'];
            $img=$qu['imgurl'];
            $dsc=$qu['dsc'];
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="cloth.php?bk='.$bid.'"><img class="card-img-top" src="'.$img.'" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="cloth.php?bk='.$bid.'">'.$bnm.'</a>
                  </h4>
                  <h5>₹'.$cost.'</h5>
                  <!--<p class="card-text">'.wordwrap($dsc,5).'</p>-->
                </div>
              </div>
            </div>
            ';}
            echo '</div></div>';
          }
          ?>

        
        <!-- /.col-lg-9 -->
        <?php 

        if(isset($_GET['cat'])){
          $cid=$_GET['cid'];
          $cat=$_GET['cat'];
          echo '<div class="col-lg-9">
          <h4>Showing For : '.$cat.'</h4>';
 
          $q=$mysqli->query("select * from cloth where catid=$cid");
          $c=$q->num_rows;
          if($c<0){
            echo '<h4>No Silks Available with this Category</h4>';
          }
          //echo '<h4>Showing for :'.$cat.'</h4>';
         echo '<div class="row">';
          
          while($qu=mysqli_fetch_array($q)){
            $bid=$qu['id'];
            $bnm=$qu['name'];
            $cost=$qu['cost'];
            $img=$qu['imgurl'];
            $dsc=$qu['dsc'];
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="cloth.php?bk='.$bid.'"><img class="card-img-top" src="'.$img.'" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="cloth.php?bk='.$bid.'">'.$bnm.'</a>
                  </h4>
                  <h5>₹'.$cost.'</h5>
                  <!--<p class="card-text">'.wordwrap($dsc,5).'</p>-->
                </div>
              </div>
            </div>
            ';}
            echo '</div></div>';
          }
          ?>

</div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include 'footer.php'; ?>