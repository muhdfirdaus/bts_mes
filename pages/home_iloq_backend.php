<!DOCTYPE html>
<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif; 
?>
<html lang="en" >

    <head>
        <meta charset="utf-8">
        <title>Beyonics Precision. Driven. Apps</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="javascript/jquery-3.1.1.min.js" charset="utf-8"></script>
        <script src="javascript/script.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="cointainer">
            <ul id="list">

                <li class="li">
                    <span class="icon">
                        <!-- <i class="fa fa-home fa-2x icon1 " aria-hidden="true"></i> -->
                        <i class="fa fa-barcode fa-2x icon1 " aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="snregister.php"><strong>Boxbuild SN Register</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-search fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="finalVMI.php"><strong>FVMI</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-bug fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="testFVMI.php"><strong>Debug FVMI</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-retweet fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="#"><strong>Rework FVMI</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-cube fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="#"><strong>Pack</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-search fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="#"><strong>OBA</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-truck fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="#"><strong>Ship</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-chevron-circle-left fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="home_iloq.php"><strong>Back</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>
				
				
               

            </ul>
        </div>
    </body>
	
	
</html>
  
 
