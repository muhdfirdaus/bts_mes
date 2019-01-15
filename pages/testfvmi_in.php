<?php
require('../dist/includes/dbcon.php');

$cus_sn = $_POST["cus_sn"];
$tmstmp = time();

$db_handle = mysql_connect($host, $uname, $pass);
$db_found = mysql_select_db($dbname, $db_handle);

if ($db_found){
   
	$result = mysqli_query($con, "SELECT lockTest FROM sn_master WHERE sn = $cus_sn")or die(mysqli_error($con));
	$row=mysqli_fetch_array($result);
	if ($row[0] != "P")
	{
	
		Print'<script>alert("Insert Defect Information!");</script>';
		Print'<script>window.location.assign("debugfvmi.php");</script>';
	} else 
	{
	Print'<script>alert("Product have no defect.");</script>';
	Print'<script>window.location.assign("testfvmi.php");</script>';
	}

}
	?>