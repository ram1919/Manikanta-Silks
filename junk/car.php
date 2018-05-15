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

    <!-- Custom styles for this template
 
            
            

 -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script language="javascript" type="text/javascript">


                    function chat_ajax(){
               var ajaxRequest;  // The variable that makes Ajax possible!
               
               try {
                  // Opera 8.0+, Firefox, Safari
                  ajaxRequest = new XMLHttpRequest();
               }catch (e) {
                  // Internet Explorer Browsers
                  try {
                     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  }catch (e) {
                     try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                     }
                  }
               }
               
               // Create a function that will receive data 
               // sent from the server and will update
               // div section in the same page.
          
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                    
                     var  chat= document.getElementById('chat');
                     chat.innerHTML = ajaxRequest.responseText;
                  }
               }

               ajaxRequest.open("GET", "ccmt.php", true);
               ajaxRequest.send(null); 
            }

            function chatbo(){
               var aR = new XMLHttpRequest();
                              aR.onreadystatechange = function(){
                  if(aR.readyState == 4){
                    
                     var  cmtbo= document.getElementById('cmtbo');
                     cmtbo.innerHTML = aR.responseText;
                  }
               }
     var cmt=document.getElementById("cmt").value;
    var puid=document.getElementById("puid").value;
    var bk=document.getElementById("bk").value;
  //var q="?cmt"+cmt;
    //var q+="&puid"+puid+"&bk"+bk;
               aR.open("GET", "inp.php?cmt="+cmt+"&puid="+puid+"&bk="+bk, true);
               //aR.send(null); 

            }
            setInterval(function(){chat_ajax()}, 1000)



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
              <a class="nav-link" href="#">Home
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
              <a class="nav-link" href="#">Request</a>
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
if(isset($_GET['car'])){

  $car=$_GET['car'];
  $_SESSION['url']='car.php?car='.$car;
  $_SESSION['car']=$car;
  $q=$mysqli->query("select * from car where id=$car");
  while($qu=mysqli_fetch_array($q)){

    echo '
    <!-- Page Content -->
    <div class="container">

      <div class="row">

       <div class="col-lg-3">
          <h1 class="my-4">Bikes</h1>
          <div class="list-group">
            <a href="bikes.php" class="list-group-item active">Go Back</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="'.$qu['imgurl'].'" alt="">
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
              <tr><th>Mileage</th><td>'.$qu['mage'].' KM/Li</td></tr>
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
            
           echo ' Please login to comment
            <a href="login.php" class="btn btn-success">Login</a><br> ';
          }
          else{
            //<form name="form"></form>

            $puid=$_SESSION['puid'];
            $car=$_SESSION['car'];

            echo '
            
            <form action="car.php?car='.$car.'#chat" method="POST">
            <input id="cmt" type="text" name="cmt" placeholder="Enter your comment" />
            <input id="puid" type="hidden" name="puid" value="'.$puid.'" />
            <input id="car" type="hidden" name="car" value="'.$car.'" />
            <input type="submit" name="cmtsub" value="Submit" />
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

if(isset($_POST['cmt'])){
  $cmt=$_POST['cmt'];
  $puid=$_SESSION['puid'];

  $car=$_SESSION['car'];
  //$puid=$_SESSION['puser'];
  
  $q=$mysqli->query("insert into ccomment (`puid`,`cid`,`cmt`) values('$puid','$car','$cmt')");
  
}
?>