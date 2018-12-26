<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
$limit = $_POST['limit'];
$id = $_SESSION['id'];
$tmstmp = time();

$existmsg='';
$existed = 0;
//Check for duplicate SN
$dupmsg = 'Duplicate PCBA SN detected in: \n';
$dupmsg_T = 0;
for($i=1;$i<=$limit;$i++){
    $dup_detect = 0;
    for($c=1;$c<=$limit;$c++){
        if($c!=$i){
            $_POST['pcba'.$i]==$_POST['pcba'.$c]?$dup_detect=1:$dup_detect=$dup_detect;
        }
    }
    $dup_detect==1?$dupmsg.='-line '.$i.'\n':$dupmsg = $dupmsg;
    $dup_detect==1?$dupmsg_T = 1: $dupmsg_T=$dupmsg_T;
}

$dupmsgB = 'Duplicate Boxbuild SN detected in: \n';
$dupmsg_TB = 0;
for($i=1;$i<=$limit;$i++){
    $dup_detect2 = 0;
    for($c=1;$c<=$limit;$c++){
        if($c!=$i){
            $_POST['bbuild'.$i]==$_POST['bbuild'.$c]?$dup_detect2=1:$dup_detect2=$dup_detect2;
        }
    }
    $dup_detect2==1?$dupmsgB.='-line '.$i.'\n':$dupmsgB = $dupmsgB;
    $dup_detect2==1?$dupmsg_TB = 1: $dupmsg_TB=$dupmsg_TB;
}
$retback=0;
if($dupmsg_T==1){
    echo '<script type="text/javascript">alert("'.$dupmsg.'");</script>';
    $retback=1; 
}
if($dupmsg_TB==1){
    echo '<script type="text/javascript">alert("'.$dupmsgB.'");</script>';
    $retback=1; 
}
if($retback){
    echo "<script>window.history.back();</script>"; 
}

else{
    for($i=1; $i<=$limit; $i++){
        
        $bbuild=trim($_POST['bbuild'.$i], " ");
        $pcba=trim($_POST['pcba'.$i], " ");

        if(strlen($bbuild)>1 && strlen($pcba)>1)
        {    
            $query=mysqli_query($con,"select count(*) as cnt from sn_register where boxbuild_sn='$bbuild'")or die(mysqli_error($con));
            $row=mysqli_fetch_array($query);
            if($row['cnt']!=0){
                $existed = 1;
                $existmsg.='Boxbuild SN: '.$bbuild.' on line '.$i.' already exist in the system!\n';
            }

            
            $query=mysqli_query($con,"select count(*) as cnt from sn_register where pcba_sn='$pcba'")or die(mysqli_error($con));
            $row=mysqli_fetch_array($query);
            if($row['cnt']!=0){
                $existed = 1;
                $existmsg.='PCBA SN: '.$pcba.' on line '.$i.' already exist in the system!\n';
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Please fill all column!');</script>";
            echo "<script>window.history.back();</script>"; 
        }
    }

    if($existed){
        echo '<script type="text/javascript">alert("'.$existmsg.'");</script>';
        echo "<script>window.history.back();</script>"; 
    }
}
