<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$carton_id = $_POST['carton_id'];
	$no_box = $_POST['no_box'];
	$model = $_POST['model'];
	$id = $_SESSION['id'];
	$tmstmp = time(); 


    //Check for duplicate Box ID
    $dupmsg = 'Duplicate Box ID detected in: \n';
    $dupmsg_T = 0;
    for($i=1;$i<=$no_box;$i++){
        $dup_detect = 0;
        for($c=1;$c<=$no_box;$c++){
            if($c!=$i){
                $_POST['box'.$i]==$_POST['box'.$c]?$dup_detect=1:$dup_detect=$dup_detect;
            }
        }
        $dup_detect==1?$dupmsg.='-line '.$i.'\n':$dupmsg = $dupmsg;
        $dup_detect==1?$dupmsg_T = 1: $dupmsg_T=$dupmsg_T;
    }
    if($dupmsg_T==1){
        echo '<script type="text/javascript">alert("'.$dupmsg.'");</script>';
        echo "<script>window.history.back();</script>"; 
    }
    else{
		//check for existing data
		$existmsg='';
		$existed = 0;
		for($i=1;$i<=$no_box;$i++){
			$box_id= $_POST['box'.$i];
			$query=mysqli_query($con,"select count(*) as cnt from carton_box where box_id='$box_id'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
			if($row['cnt']!=0){
				$existed = 1;
				$existmsg.=$box_id.' on line '.$i.' already exist in the system!\n';
			}
		}
		if($existed){
			echo '<script type="text/javascript">alert("'.$existmsg.'");</script>';
        	echo "<script>window.history.back();</script>"; 
        }
        else{
            $i = 1;
            $qty = 0;
            $stop_proc = 0;
            $errmsg = '';
            while($i <= $no_box){
                
                $box_id= $_POST['box'.$i];
                $query=mysqli_query($con,"select qty,model from box_info where box_id='$box_id'")or die(mysqli_error());
                $row=mysqli_fetch_array($query);
                if($row != null && $row['model']==$model){
                    $qty = $qty + $row['qty'];
                    $box[$i] = $box_id;
                }
                elseif($row == null){
                    $errmsg .= '-Box ID in row '.$i.' is not exist!\n';
                    $stop_proc = 1;
                }
                elseif($row != null && $row['model']!=$model){
                    $errmsg .= '-Box ID in row '.$i.' is different model!\n';
                    $stop_proc = 1;
                }

                $i++;
            }
            if($stop_proc == 0){
                for($i=1;$i<=$no_box;$i++){
                    mysqli_query($con,"INSERT INTO carton_box(carton_id,box_id)VALUES('$carton_id','$box[$i]')")or die(mysqli_error($con));
                }
                mysqli_query($con,"INSERT INTO carton_info(carton_id,user_id,no_of_box,timestamp,model, qty)
                VALUES('$carton_id','$id', '$no_box', '$tmstmp',  '$model',  '$qty')")or die(mysqli_error($con));
                echo "<script type='text/javascript'>alert('Data saved!');</script>";
                
                //edit label file
                

                if($model=="OVAL LOCK INDOOR C10S.10.1.SB"){
                    $lblcode=".10.1.SB";
                    $lblcode2=".10.SB";
                }
                if($model=="OVAL LOCK INDOOR C10S.10.1.SB.SE"){
                    $lblcode=".10.1.SB.SE";
                    $lblcode2=".10.SB.SE";
                }
                if($model=="OVAL LOCK INDOOR C10S.10.2.SB"){
                    $lblcode=".10.2.SB";
                    $lblcode2=".10.SB";
                }
                if($model=="OVAL LOCK INDOOR C10S.10.2.SB.SE"){
                    $lblcode=".10.2.SB.SE";
                    $lblcode2=".10.SB.SE";
                }
                $lbldate = date('d/m/y',$tmstmp);
                $fp = fopen('C:/lblcarton.txt', 'w');
                fwrite($fp, '
^XA
^FWR
^FX horizontal line
^FO598,3^GB1,1205,3^FS
^FX vertical line
^FO598,700^GB300,1,3^FS

^CF0,50
^FO680,70^FDFrom:^FS
^FO680,770^FDTo:^FS

^CF0,30
^FO740,230^FDBeyonics Precision^FS
^FO707,230^FDNo. 95, Jalan i-Park 1/10,^FS
^FO674,230^FDKawasan Perindustrian i-Park,^FS
^FO643,230^FDBandar Indahpura,^FS
^FO610,230^FD8100 Kulai. Malaysia^FS

^FO740,880^FDILOQ^FS
^FO707,880^FDYrttipellontie^FS
^FO674,880^FD90230 Oulu^FS
^FO643,880^FDFinland^FS

^CF0,50
^FO520,70^FD(P) Customer Product IDs:^FS
^FO520,770^FD(Q) Qty:^FS
^FO460,70^FDIQ-M004142'.$lblcode.'^FS
^FO460,800^FD'.$qty.'^FS

^BY1.5,3
^FO390,70^BCR,65,N^FDPIQ-M004142'.$lblcode.'^FS
^FO390,770^BCR,65,N^FDQ'.$qty.'^FS

^FX horizontal line
^FO355,3^GB1,1205,3^FS

^CF0,60
^FO260,70^FDC10S'.$lblcode2.'^FS
^FO200,70^FDDate: '.$lbldate.'^FS

^FO230,770^FDWeight: 15KG^FS

^FX horizontal line
^FO175,3^GB1,1205,3^FS

^CF0,40
^FO95,70^FDPALLET ID:^FS
^CF0,50
^FO90,320^FD'.$carton_id.'^FS

^BY1.5,2
^FO90,770^BCR,65,N^FD'.$carton_id.'^FS

^FX horizontal line
^FO65,3^GB1,1205,3^FS

^XZ');
                fclose($fp);
                //label editting end 
                echo "<script type='text/javascript'>document.location='carton.php'</script>"; 
            }
            else{
                echo '<script type="text/javascript">alert("'.$errmsg.'");</script>';
                echo "<script>window.history.back();</script>";  
            }
        }
            
    }
	

	
?>
