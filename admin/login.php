<?php
session_start();
include '../db.php';

?>
<?php
if(isset($_POST['unm'])){
$unm=$_POST['unm'];
$pwd=$_POST['pwd'];
$q=$mysqli->query("select * from admin where unm='$unm' and pwd='$pwd'") or die("Unable to query");
$count=$q->num_rows;
if($count>0){
	$_SESSION['user']=$unm;
	header("Location:home.php");
}
else{
	header("Location:index.php?m=wrong");
}
}
?>
