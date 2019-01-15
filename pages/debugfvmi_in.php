<?php
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

require('../dist/includes/dbcon.php');


$cus_sn = $_POST["cus_sn"];
$tmstmp = time();
$user_id = $_SESSION['id'];
$status = '1';

$defectcode = $_POST["defectcode"];
$component = $_POST["component"];
$location = $_POST["location"];
$remark = $_POST["remark"];

$defectcode2 = $_POST["defectcode2"];
$component2 = $_POST["component2"];
$location2 = $_POST["location2"];
$remark2 = $_POST["remark2"];

$defectcode3 = $_POST["defectcode3"];
$component3 = $_POST["component3"];
$location3 = $_POST["location3"];
$remark3 = $_POST["remark3"];

$defectcode4 = $_POST["defectcode4"];
$component4 = $_POST["component4"];
$location4 = $_POST["location4"];
$remark4 = $_POST["remark4"];

$defectcode5 = $_POST["defectcode5"];
$component5 = $_POST["component5"];
$location5 = $_POST["location5"];
$remark5 = $_POST["remark5"];

if ($defectcode != "Null")
{
	mysqli_query($con,"INSERT INTO debug_fvmi(cus_sn, defectcode, component, location, remark,timestamp, user_id, status)VALUES('$cus_sn','$defectcode','$component','$location','$remark','$tmstmp', '$user_id', '$status')")or die(mysqli_error($con));
	
	Print'<script>alert("Data Saved!");</script>';
	Print'<script>window.location.assign("debugfvmi.php");</script>';
	} if ($defectcode2 != "Null"){
	mysqli_query($con,"INSERT INTO debug_fvmi(cus_sn, defectcode, component, location, remark,timestamp, user_id, status)VALUES('$cus_sn','$defectcode2','$component2','$location2','$remark2','$tmstmp', '$user_id', '$status')")or die(mysqli_error($con));
	Print'<script>alert("Data Saved!");</script>';
	Print'<script>window.location.assign("debugfvmi.php");</script>';
	} if ($defectcode3 != "Null"){
	mysqli_query($con,"INSERT INTO debug_fvmi(cus_sn, defectcode, component, location, remark,timestamp, user_id, status)VALUES('$cus_sn','$defectcode3','$component3','$location3','$remark3','$tmstmp', '$user_id', '$status')")or die(mysqli_error($con));
	Print'<script>alert("Data Saved!");</script>';
	Print'<script>window.location.assign("debugfvmi.php");</script>';
	} if ($defectcode4 != "Null"){
	mysqli_query($con,"INSERT INTO debug_fvmi(cus_sn, defectcode, component, location, remark,timestamp, user_id, status)VALUES('$cus_sn','$defectcode4','$component4','$location4','$remark4','$tmstmp', '$user_id', '$status')")or die(mysqli_error($con));
	Print'<script>alert("Data Saved!");</script>';
	Print'<script>window.location.assign("debugfvmi.php");</script>';
	} if ($defectcode5 != "Null"){
	mysqli_query($con,"INSERT INTO debug_fvmi(cus_sn, defectcode, component, location, remark,timestamp, user_id, status)VALUES('$cus_sn','$defectcode5','$component5','$location5','$remark5','$tmstmp', '$user_id', '$status')")or die(mysqli_error($con));
	Print'<script>alert("Data Saved!");</script>';
	Print'<script>window.location.assign("debugfvmi.php");</script>';
	}
?>