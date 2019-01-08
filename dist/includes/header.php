<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Singapore"); 
?>
<?php include('../dist/includes/dbcon.php');
?>

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container-fluid"><meta http-equiv="refresh" content="1800;url=logoutlanding.php"/>
            <div class="navbar-header" style="padding-left:20px">
              <a href="home_iloq_backend.php" class="navbar-brand"><b><i class="glyphicon glyphicon-home"></i> Beyonics BTS MES </b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li class="dropdown notifications-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon glyphicon-road text-blue"></i>
                      SMT
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">

                          <li><!-- start notification -->
                              <a href="profile.php">
                                <i class="glyphicon glyphicon-user text-orange"></i>
                                W/O Registration
                              </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                              <a href="box_cfg.php">
                                <i class="glyphicon glyphicon-th-list text-orange"></i>SN Registration
                              </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                              <a href="#printerip" class="dropdown-toggle" data-target="#printerip" data-toggle="modal">
                                <i class="glyphicon glyphicon-print text-orange"></i>AOI
                              </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown notifications-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon glyphicon-folder-close text-green"></i>
                      Backend
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">

                          <li><!-- start notification -->
                              <a href="profile.php">
                                <i class="glyphicon glyphicon-user text-orange"></i>
                                Boxbuild Register
                              </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                              <a href="box_cfg.php">
                                <i class="glyphicon glyphicon-th-list text-orange"></i>Final VMI
                              </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                              <a href="#printerip" class="dropdown-toggle" data-target="#printerip" data-toggle="modal">
                                <i class="glyphicon glyphicon-print text-orange"></i>Packing
                              </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown notifications-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-cog text-red"></i>
                      Configuration
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">

                          <li><!-- start notification -->
                              <a href="profile.php">
                                <i class="glyphicon glyphicon-user text-orange"></i>
                                User profile ( <?php echo $_SESSION['name'];?> )
                              </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                              <a href="box_cfg.php">
                                <i class="glyphicon glyphicon-th-list text-orange"></i>Box Configuration
                              </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                              <a href="#printerip" class="dropdown-toggle" data-target="#printerip" data-toggle="modal">
                                <i class="glyphicon glyphicon-print text-orange"></i>Printer IP
                              </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-off text-red"></i> Logout 
                      
                    </a>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>


<!--start of REPORT modal--> 
<div id="reportmodal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Report by Box/Pallet ID</h4>
      </div>
      <div style="font-size:11px" class="modal-body">
        <form class="form-horizontal" id="form_report" method="post" action="report_box.php" enctype='multipart/form-data'>
          <div class="form-group">
            <label class="control-label col-lg-2" for="box">Box ID</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="box_id" name="box_id" placeholder="Box ID">  
            </div>
          </div><hr>
          <div class="form-group">
            <label class="control-label col-lg-2" for="pallet">Pallet ID</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="pallet_id" name="pallet_id" placeholder="Pallet ID">  
            </div>
          </div>
          <div class="form-group control-label text-red">*Please insert ONE(1) field only</div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_submit">Send</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>  
  </div><!--end of modal-dialog-->
</div> 
<!--end of REPORT modal--> 


<!--start of LABEL PRINTING modal--> 
<div id="labelprint" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Print Label</h4>
      </div>
      <div style="font-size:11px" class="modal-body">
        <form class="form-horizontal" id="form_report" method="post" action="print_box.php" enctype='multipart/form-data'>
          <div class="form-group">
            <label class="control-label col-lg-2" for="box">Box ID</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="box_id" name="box_id" placeholder="Box ID">  
            </div>
          </div><hr>
          <div class="form-group">
            <label class="control-label col-lg-2" for="printer_ip">Printer IP</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="printer_ip" name="printer_ip" placeholder="Printer IP" value="<?php echo $ip; ?>">  
            </div>
          </div>
          <!-- <div class="form-group control-label text-red">*Please insert ONE(1) field only</div> -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_submit">Send</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>  
  </div><!--end of modal-dialog-->
</div> 
<!--end of LABEL PRINTING modal--> 


<!--start of PRINTER IP CONFIG modal--> 
<div id="printerip" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Printer IP Setup</h4>
      </div>
      <div style="font-size:11px" class="modal-body">
        <form class="form-horizontal" id="form_report" method="post" action="printer_cfg.php" enctype='multipart/form-data'>
          <div class="form-group">
            <label class="control-label col-lg-2" for="printer_ip">Printer IP</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" id="printer_ip" name="printer_ip" placeholder="Printer IP" value="<?php echo $ip; ?>">  
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_submit">Send</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>  
  </div><!--end of modal-dialog-->
</div> 
<!--end of LABEL PRINTING modal--> 