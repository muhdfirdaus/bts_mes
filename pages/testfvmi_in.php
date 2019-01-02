<?php
require('../dist/includes/dbcon.php');

$pcba_sn = $_POST["pcba_sn"];
$cus_sn = $_POST["cus_sn"];
$tmstmp = time();

$db_handle = mysql_connect($host, $uname, $pass);
$db_found = mysql_select_db($dbname, $db_handle);

if ($db_found){
	$result = mysql_query("SELECT * FROM sn_master WHERE sn = $pcba_sn");
	$a = mysql_query("SELECT * FROM sn_master WHERE lockTest = 'F'");
	$a = mysql_query("SELECT * FROM sn_master WHERE durTest = 'T'");

if ($result>0)
{
	if ($a>0 || $b>0)
	{
	$fvmitest = "F";
	mysqli_query($con,"INSERT INTO sn_master(fvmitest,fvmitime)VALUES('$fvmitest','$tmstmp')")or die(mysqli_error($con));
	Print'<script>alert("Insert Defect Information!");</script>';
	Print'<script>window.location.assign("debugfvmi.php");</script>';
	} else 
	{
	print "Product have no defect.";
	}
} else 
{
	print "Database NOT Found.";
}
}


?>