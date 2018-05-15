<?php
session_start();
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
 
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Manikanta Silks</a>
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
              <a class="nav-link" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>
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
                        <li class="nav-item">
              <a class="nav-link" href="admin/index.php">Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>
      <section class="text-center">
        <div class="container">
<br><br><br><h3>Payment</h3>
       <form action="pay.php" method="post">   
  <table class="table">
    <tr>
      <td>Name on the Card:</td>
      <td><input type="text" name="name"></td>
    </tr>

    <tr>
      <td>Card Number:</td>
      <td><input type="number" name="number"></td>
    </tr>

    <tr>
      <td>CVV:</td>
      <td><input type="cvv" name="cvv"></td>
    </tr>

    <tr>
      <td>Expiry Date:</td>
      <td><input type="date" name="date"></td>
    </tr>
    <tr><td></td><td><input type="submit" class="btn btn-success" name="submit"></td></tr>
  </table>
</form>
        </div>
      </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>