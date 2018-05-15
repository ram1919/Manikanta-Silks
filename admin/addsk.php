<?php
session_start();
include '../db.php';
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
      <h4>Add Silks</h4>
<table class="table table-hover">
        <form action="" method="POST" enctype="multipart/form-data">
        <tr>
        <td>Category</td>
        <td>
        <select name="cat">
        <option value="selected" disabled selected>Select Category</option>
        <?php
        $qu=$mysqli->query("select * from cat");
        
        while($q=mysqli_fetch_array($qu)){
         echo '
         
         
           <option value="'.$q['id'].'">'.$q['cat'].'</option>
         
         ';
        }  
        ?> 
        </select>
        </td> 
        </tr>
  <tr>
    <td>Silk Name</td>
    <td><input type="text" name="bnm"></td>
  </tr>
  <tr>
    <td>Cost</td>
    <td><input type="number" name="cost" pattern="[0-9]"></td>
  </tr>

  <tr>
    <td>Description</td>
    <td><input type="text" name="dsc" ></td>
  </tr>
        <tr><td>Image</td><td> <input type="file" name="image" /></td>
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
if(isset($_POST['bnm'])){
  $bnm=$_POST['bnm'];
  $cost=$_POST['cost'];

  $dsc=$_POST['dsc'];
  $cat=$_POST['cat'];
  
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$file_name)));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   $q=$mysqli->query("insert into cloth (`name`,`catid`,`cost`,`imgurl`,`dsc`) values('$bnm','$cat','$cost','images/$file_name','$dsc')");
   if($q==1){
    echo 'Successfully inserted!';
   }
   else{
    echo 'Unable to insert';
   }
 }
?>