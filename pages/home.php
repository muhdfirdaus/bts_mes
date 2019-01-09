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
                        <i class="fa fa-dropbox fa-2x icon1 " aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="home_iloq.php"><strong>iLOQ</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-dropbox fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="#"><strong>Carling</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-dropbox fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="#"><strong>Hauppauge</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

                <li class="li">
                    <span class="icon">
                        <i class="fa fa-power-off fa-2x icon1" aria-hidden="true"></i>
                        <i class="tooltip"></i>
                    </span>
                    <p class="text">
                        <a href="logout.php"><strong>Logout</strong></a>
                    </p>
                    <div class="clr"></div>
                </li>

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
  
 
