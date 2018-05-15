

<?php
session_start();
include 'db.php';
if(!isset($_SESSION['puid'])){
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manikanta Silks</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
<style type="text/css">
.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
    width:20%;
    display: inline !important;
  }
  .actions .btn{
    width:36%;
    margin:1.5em 0;
  }
  
  .actions .btn-info{
    float:left;
  }
  .actions .btn-danger{
    float:right;
  }
  
  table#cart thead { display: none; }
  table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
  table#cart tbody tr td:first-child { background: #333; color: #fff; }
  table#cart tbody td:before {
    content: attr(data-th); font-weight: bold;
    display: inline-block; width: 8rem;
  }
  
  
  
  table#cart tfoot td{display:block; }
  table#cart tfoot td .btn{display:block;}
  
}
</style>
<script type="text/javascript">
  function upTo(){
    var qty=document.getElementById('qty').value;
     var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("requests").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "upd.php?qty="+qty, true);
  xhttp.send();
  }
</script>

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
                        <li class="nav-item active">
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


<div class="container">
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:50%">Item</th>
              <th style="width:10%">Price</th>
              <th style="width:8%">Quantity</th>
              <th style="width:22%" class="text-center">Subtotal</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          <tbody>
          
                  <?php 
                  $uid=$_SESSION['puid'];
                  $tot=0;
                  $qu=$mysqli->query("select * from cart where uid=$uid");
                  while($qui=mysqli_fetch_array($qu)){
                    $tot=$tot+$qui['total'];
                    $_SESSION['tot']=$tot;
                    $iid=$qui['clid'];
                    $caid=$qui['id'];
                  $i=$mysqli->query("select * from cloth where id=$iid");
                  $it=mysqli_fetch_array($i);

                    echo '
                      <tr>
              <td data-th="Product">
                <div class="row">
                                  <div class="col-sm-10">
                    <h4 class="nomargin">'.$it['name'].'</h4>
                  </div>
                </div>
              </td>
              <td data-th="Price">'.$qui['cost'].'</td>
              <td data-th="Quantity">
                <input disabled id="qty" type="text" class="form-control text-center" value="'.$qui['qty'].'"><a href="upd.php?qty=p&caid='.$caid.'" class="fa fa-plus"></a> ';
                if($qui['qty']>1){ echo '<a href="upd.php?qty=m&caid='.$caid.'" class="fa fa-minus"></a>';}
                echo '
              </td>

              <td data-th="Subtotal" class="text-center"><span id="subt">'.$qui['total'].'</span></td>
              <td class="actions" data-th="">
                
                <a href="upd.php?remi=y&id='.$caid.'"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>                
              </td>
            </tr>
                ';
                  }
                  ?>
                  <!--<button onclick="upTo();" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>-->
                            

          </tbody>
          <tfoot>

            <tr>
            <td></td>
              <!--<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>-->
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong>Total ₹ <?php echo $_SESSION['tot']; ?></strong></td>
              <td><a href="pay.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
        </table>
</div>

</body>
</html>