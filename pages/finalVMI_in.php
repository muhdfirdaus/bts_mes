<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
$limit = $_POST['limit'];
$id = $_SESSION['id'];
$tmstmp = time();

$incompleteData = 0;
for($i=1; $i<=$limit; $i++){
    
    $sn=trim($_POST['sn'.$i], " ");
    $result=trim($_POST['result'.$i], " ");

    if(strlen($sn)<=1)
    {    
        $incompleteData+=1;
    }
}

if($incompleteData == 0){
    for($i=1; $i<=$limit; $i++){
        $sn=trim($_POST['sn'.$i], " ");
        $result=trim($_POST['result'.$i], " ");

        $query=mysqli_query($con,"select count(*) as cnt from sn_master where sn='$sn'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
        if($row['cnt']!=0){
            mysqli_query($con,"UPDATE sn_master set fvmiTest='$result', fvmiTime='$tmstmp', fvmiTesterID='$id', lastUpdate='$tmstmp' where sn='$sn'" )or die(mysqli_error($con));
        }
        else{
            mysqli_query($con,"INSERT INTO sn_master(sn,fvmiTest, fvmiTime, fvmiTesterID, lastUpdate)VALUES('$sn','$result','$tmstmp','$id','$tmstmp')")or die(mysqli_error($con));
        }
    }
    echo "<script type='text/javascript'>alert('Data saved!');</script>";
    echo "<script type='text/javascript'>document.location='finalVMI.php'</script>";
}
else{
    echo "<script type='text/javascript'>alert('Please fill all column!');</script>";
    echo "<script>window.history.back();</script>"; 
}





