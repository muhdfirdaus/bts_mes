<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Debug FVMI | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      .col-lg-3{
        margin:50px 0px;
      }
      
    </style>
 </head>
  <script language="javascript">
           var message="This function is not allowed here.";
           function clickIE4(){
                 if (event.button==2){
                     alert(message);
                     return false;
                 }
           }
           function clickNS4(e){
                if (document.layers||document.getElementById&&!document.all){
                        if (e.which==2||e.which==3){
                                  alert(message);
                                  return false;
                        }
                }
           }
           if (document.layers){
                 document.captureEvents(Event.MOUSEDOWN);
                 document.onmousedown=clickNS4;
           }
           else if (document.all&&!document.getElementById){
                 document.onmousedown=clickIE4;
           }
           document.oncontextmenu=new Function("alert(message);return false;")
</script>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-black layout-top-nav" onload="myFunction()">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) --> 
		 
          <!-- Main content -->
          <section class="content">
            <div class="panel panel-default">
              <div class="panel-heading"><b>Debug FVMI</b></div>
              <div class="panel-body">
                <form id="form_box" class="form-horizontal" method="post" action="debugfvmi_in.php" enctype='multipart/form-data'>
                  <p>PCBA S/N: <input type="text"  name="pcba_sn" id="pcba_sn" value="<?php echo $rows['pcba_sn']; ?> "/></p>
                  <p>Customer S/N: <input type="text"  name="cus_sn" id="cus_sn" value="<?php echo $rows['boxbuild_sn']; ?> " /></p>
				  <p>Please select defect code. If more then 5 defect, click unlink. Product will rejected!</p>
                  <br>
                 
                  <table class="table table-bordered table-striped">
                    <thead>
                      <th class="info text-center">Defect Code</th>
					  <th class="info text-center">Component Part</th>
					  <th class="info text-center">Defect Location</th>
                      <th class="info text-center">Remarks</th>
                    </thead>
                    <tbody>
                          <tr>
                            <td class="text-center"><select class="form-control" name="defectcode" id="defectcode">
								<option value="Null">Null</option>
                                <option value="f01">F01 - Defective Component</option>
                                <option value="f02">F02 - Bended/Lifted Lead</option>
                                <option value="f03">F03 - Chip/Knock Off</option>
                                <option value="f04">F04 - Damage</option>
                                <option value="f05">F05 - Delamination / Warpage</option>
                                <option value="f06">F06 - Dirty, Flux & stain</option>
								<option value="f07">F07 - Eeprom Reprogram</option>
								<option value="f08">F08 - Excess solder</option>
								<option value="f09">F09 - Insufficient Solder</option>
								<option value="f10">F10 - Lifted Pad</option>
								<option value="f11">F11 - Misalignment</option>
								<option value="f12">F12 - Missing Component</option>
								<option value="f13">F13 - No Defect Found</option>
								<option value="f14">F14 - No Insert / Wrong Insert</option>
								<option value="f15">F15 - No Programming</option>
								<option value="f16">F16 - No Solder / Non Wetting</option>
								<option value="f17">F17 - Open & Short Circuit / Scrap</option>
								<option value="f18">F18 - Overturn / Tombstone</option>
								<option value="f19">F19 - Solder Short</option>
								<option value="f20">F20 - Swap</option>
								<option value="f21">F21 - Wrong Component / Value</option>
								<option value="f20">F22 - Wrong Polarity</option>
								<option value="f20">F23 - Extra Trace</option>
								<option value="f20">F24 - Re-heat</option>
								<option value="f20">F25 - Re-Assembled</option>
								<option value="f20">F26 - Cosmetic Failure</option>
                            </select></td>
							<td class="text-center"><input type="text" class="form-control" name="component" id="component" /></td>
							<td class="text-center"><input type="text" class="form-control" name="location" id="location" /></td>
                            <td class="text-center"><textarea class="form-control" style="resize:none" rows="2" cols="50" name="remark" id="remark" maxlength="322"></textarea></td>
                          </tr>
						  <tr>
                            <td class="text-center"><select class="form-control" name="defectcode2" id="defectcode2">
								<option value="Null">Null</option>
                                <option value="f01">F01 - Defective Component</option>
                                <option value="f02">F02 - Bended/Lifted Lead</option>
                                <option value="f03">F03 - Chip/Knock Off</option>
                                <option value="f04">F04 - Damage</option>
                                <option value="f05">F05 - Delamination / Warpage</option>
                                <option value="f06">F06 - Dirty, Flux & stain</option>
								<option value="f07">F07 - Eeprom Reprogram</option>
								<option value="f08">F08 - Excess solder</option>
								<option value="f09">F09 - Insufficient Solder</option>
								<option value="f10">F10 - Lifted Pad</option>
								<option value="f11">F11 - Misalignment</option>
								<option value="f12">F12 - Missing Component</option>
								<option value="f13">F13 - No Defect Found</option>
								<option value="f14">F14 - No Insert / Wrong Insert</option>
								<option value="f15">F15 - No Programming</option>
								<option value="f16">F16 - No Solder / Non Wetting</option>
								<option value="f17">F17 - Open & Short Circuit / Scrap</option>
								<option value="f18">F18 - Overturn / Tombstone</option>
								<option value="f19">F19 - Solder Short</option>
								<option value="f20">F20 - Swap</option>
								<option value="f21">F21 - Wrong Component / Value</option>
								<option value="f20">F22 - Wrong Polarity</option>
								<option value="f20">F23 - Extra Trace</option>
								<option value="f20">F24 - Re-heat</option>
								<option value="f20">F25 - Re-Assembled</option>
								<option value="f20">F26 - Cosmetic Failure</option>
                            </select></td>
							<td class="text-center"><input type="text" class="form-control" name="component2" id="component2" /></td>
							<td class="text-center"><input type="text" class="form-control" name="location2" id="location2" /></td>
                            <td class="text-center"><textarea class="form-control" style="resize:none" rows="2" cols="50" name="remark2" id="remark2" maxlength="322"></textarea></td>
                          </tr>
						  <tr>
                            <td class="text-center"><select class="form-control" name="defectcode3" id="defectcode3">
								<option value="Null">Null</option>
                                <option value="f01">F01 - Defective Component</option>
                                <option value="f02">F02 - Bended/Lifted Lead</option>
                                <option value="f03">F03 - Chip/Knock Off</option>
                                <option value="f04">F04 - Damage</option>
                                <option value="f05">F05 - Delamination / Warpage</option>
                                <option value="f06">F06 - Dirty, Flux & stain</option>
								<option value="f07">F07 - Eeprom Reprogram</option>
								<option value="f08">F08 - Excess solder</option>
								<option value="f09">F09 - Insufficient Solder</option>
								<option value="f10">F10 - Lifted Pad</option>
								<option value="f11">F11 - Misalignment</option>
								<option value="f12">F12 - Missing Component</option>
								<option value="f13">F13 - No Defect Found</option>
								<option value="f14">F14 - No Insert / Wrong Insert</option>
								<option value="f15">F15 - No Programming</option>
								<option value="f16">F16 - No Solder / Non Wetting</option>
								<option value="f17">F17 - Open & Short Circuit / Scrap</option>
								<option value="f18">F18 - Overturn / Tombstone</option>
								<option value="f19">F19 - Solder Short</option>
								<option value="f20">F20 - Swap</option>
								<option value="f21">F21 - Wrong Component / Value</option>
								<option value="f20">F22 - Wrong Polarity</option>
								<option value="f20">F23 - Extra Trace</option>
								<option value="f20">F24 - Re-heat</option>
								<option value="f20">F25 - Re-Assembled</option>
								<option value="f20">F26 - Cosmetic Failure</option>
                            </select></td>
							<td class="text-center"><input type="text" class="form-control" name="component3" id="component3" /></td>
							<td class="text-center"><input type="text" class="form-control" name="location3" id="location3" /></td>
                            <td class="text-center"><textarea class="form-control" style="resize:none" rows="2" cols="50" name="remark3" id="remark3" maxlength="322"></textarea></td>
                          </tr>
						  <tr>
                            <td class="text-center"><select class="form-control" name="defectcode4" id="defectcode4">
								<option value="Null">Null</option>
                                <option value="f01">F01 - Defective Component</option>
                                <option value="f02">F02 - Bended/Lifted Lead</option>
                                <option value="f03">F03 - Chip/Knock Off</option>
                                <option value="f04">F04 - Damage</option>
                                <option value="f05">F05 - Delamination / Warpage</option>
                                <option value="f06">F06 - Dirty, Flux & stain</option>
								<option value="f07">F07 - Eeprom Reprogram</option>
								<option value="f08">F08 - Excess solder</option>
								<option value="f09">F09 - Insufficient Solder</option>
								<option value="f10">F10 - Lifted Pad</option>
								<option value="f11">F11 - Misalignment</option>
								<option value="f12">F12 - Missing Component</option>
								<option value="f13">F13 - No Defect Found</option>
								<option value="f14">F14 - No Insert / Wrong Insert</option>
								<option value="f15">F15 - No Programming</option>
								<option value="f16">F16 - No Solder / Non Wetting</option>
								<option value="f17">F17 - Open & Short Circuit / Scrap</option>
								<option value="f18">F18 - Overturn / Tombstone</option>
								<option value="f19">F19 - Solder Short</option>
								<option value="f20">F20 - Swap</option>
								<option value="f21">F21 - Wrong Component / Value</option>
								<option value="f20">F22 - Wrong Polarity</option>
								<option value="f20">F23 - Extra Trace</option>
								<option value="f20">F24 - Re-heat</option>
								<option value="f20">F25 - Re-Assembled</option>
								<option value="f20">F26 - Cosmetic Failure</option>
                            </select></td>
							<td class="text-center"><input type="text" class="form-control" name="component4" id="component4" /></td>
							<td class="text-center"><input type="text" class="form-control" name="location4" id="location4" /></td>
                            <td class="text-center"><textarea class="form-control" style="resize:none" rows="2" cols="50" name="remark4" id="remark4" maxlength="322"></textarea></td>
                          </tr>
						  <tr>
                            <td class="text-center"><select class="form-control" name="defectcode5" id="defectcode5">
								<option value="Null">Null</option>
                                <option value="f01">F01 - Defective Component</option>
                                <option value="f02">F02 - Bended/Lifted Lead</option>
                                <option value="f03">F03 - Chip/Knock Off</option>
                                <option value="f04">F04 - Damage</option>
                                <option value="f05">F05 - Delamination / Warpage</option>
                                <option value="f06">F06 - Dirty, Flux & stain</option>
								<option value="f07">F07 - Eeprom Reprogram</option>
								<option value="f08">F08 - Excess solder</option>
								<option value="f09">F09 - Insufficient Solder</option>
								<option value="f10">F10 - Lifted Pad</option>
								<option value="f11">F11 - Misalignment</option>
								<option value="f12">F12 - Missing Component</option>
								<option value="f13">F13 - No Defect Found</option>
								<option value="f14">F14 - No Insert / Wrong Insert</option>
								<option value="f15">F15 - No Programming</option>
								<option value="f16">F16 - No Solder / Non Wetting</option>
								<option value="f17">F17 - Open & Short Circuit / Scrap</option>
								<option value="f18">F18 - Overturn / Tombstone</option>
								<option value="f19">F19 - Solder Short</option>
								<option value="f20">F20 - Swap</option>
								<option value="f21">F21 - Wrong Component / Value</option>
								<option value="f20">F22 - Wrong Polarity</option>
								<option value="f20">F23 - Extra Trace</option>
								<option value="f20">F24 - Re-heat</option>
								<option value="f20">F25 - Re-Assembled</option>
								<option value="f20">F26 - Cosmetic Failure</option>
                            </select></td>
							<td class="text-center"><input type="text" class="form-control" name="component5" id="component5" /></td>
							<td class="text-center"><input type="text" class="form-control" name="location5" id="location5" /></td>
                            <td class="text-center"><textarea class="form-control" style="resize:none" rows="2" cols="50" name="remark5" id="remark5" maxlength="322"></textarea></td>
                          </tr>
				   </tbody>
                  </table>
				  <button type="button" id="btn_box" class="btn btn-primary" style="float: right;">Unlink</button>
				  <button type="submit" id="btn_box" class="btn btn-primary" style="float: right;">Save</button>
                </form>
				
              </div>
            </div>

	        </section><!-- /.content -->
          
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->


	<script>
    $(function() {
      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
	$.ajax({
	type: "GET",
	url: "temp_trans_del.php",
	data: dataString,
	success: function(){
		
	      }
	  });
	  
	  $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	  .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
	
	<script type="text/javascript" src="autosum.js"></script>
  
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
     <script>
      $(function () {
        $('#no_box').on('change',function(){
            limit = Number($("#no_box").val());
            window.location.href = ( "?limit=" + limit);
        });
        
        $("#btn_box").click(function () {
          document.getElementById("form_box").submit();
          // var valid = true;
          // var i;
          // for (i = 1; i < 21; i++) { 
          //   var sn_name = "sn"+i;
          //   var pass1 = document.getElementById(sn_name).value;
          //   var pass_t = pass1.trim();
          //   if(pass_t.length < 1 || pass_t == ""){
          //     valid = false;
          //   }
          // }
          // if(valid = false){
          //   alert("Product is not enough");
          // }
        });
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });

        
      });
    </script>
  </body>
</html>
