<?php 
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$model = $_POST['model'];
	$model_no =$_POST['model_no'];
	$qty =$_POST['qty'];
	
	
	mysqli_query($con,"update box_config set model='$model',model_no='$model_no',qty='$qty' where id=1")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully update box configurations!');</script>";
	echo "<script>document.location='box_cfg.php'</script>";  
?>
