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
                        <i class="fa fa-industry fa-2x icon1 " aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="#"><strong>SMT</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-cubes fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="home_iloq_backend.php"><strong>Backend</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-chevron-circle-left fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="home.php"><strong>Back</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <!-- <li class="li">
                    <span class="icon">
                        <i class="fa fa-wrench fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="http://my-app01.my.beyonics.com/ccms/"><strong>CCS</strong></a>
                    </p>
                    <div class="clr"></div>
                </li> -->

                <!-- <li class="li">
                    <span class="icon">
                        <i class="fa fa-building fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="http://my-app01.my.beyonics.com/erp/"><strong>eFactory</strong></a>
                    </p>
                    <div class="clr"></div>
                </li> -->

                <!-- <li class="li">
                    <span class="icon">
                        <i class="fa fa fa-users fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="http://eapps.beyonics.com/telephone/navmenuResults.asp"><strong>Employee Directory</strong></a>
                    </p>
                    <div class="clr"></div>
                </li> -->
				
				
               

            </ul>
        </div>
    </body>
	
	
</html>
  
 
