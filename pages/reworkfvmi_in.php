<?php
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

require('../dist/includes/dbcon.php');

$id = $_POST["id"];
$cus_sn = $_POST["cus_sn"];
$tmstmp = time();
$user_id = $_SESSION['id'];

$defectcode = $_POST["defectcode"];
$component = $_POST["component"];
$location = $_POST["location"];
$action = $_POST["action"];
$remark = $_POST["remark"];


	mysqli_query($con,"INSERT INTO rework_fvmi(id,cus_sn, defectcode, component, location, action, remark,timestamp, user_id)VALUES('$id','$cus_sn','$defectcode','$component','$location','$action','$remark','$tmstmp', '$user_id')")or die(mysqli_error($con));
	mysqli_query($con, "UPDATE debug_fvmi SET status = 0 WHERE id = '$id'");
	Print'<script>alert("Data Saved!");</script>';
	Print'<script>window.location.assign("reworkfvmi.php");</script>';
	 
?>