<?php 
    include 'Include/Header.php'; 
    require_once "Action/aOwnerTransfer.php";
    $aOwnerTransfer = new ActionOwnerTransfer();
    $OwnerTransferList = $aOwnerTransfer->GetOwnerTransferListBillPrint($_GET['user']);
    // echo '<pre>'; var_dump($OwnerTransferList);die;
?>
<button type="submit" name="submit" class="btn btn-success " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 12px !important;font-family: serif;" onclick="printPVC()" >Print
</button>
<div id="printableAreaPVC">
<?php 
foreach($OwnerTransferList as $data){
?>
<div class="container"  style="background-color: white;">
    <div class="row" style="padding:10px">
        <?php for($i=1; $i<=3; $i++){?>
            <div class="col-sm-4">
                <div>
                    <div style="float: left; width: 20%; padding: 2px;">
                        <img src="images/logo.jpg" style="width:100%">
                    </div>
                    <div>
                        <div>
                            <p style="font-size:18px; color:black;">খাগড়াছড়ি পৌরসভা কার্যালয়</p>
                            <p style="font-size:15px; text-align: center; color:black;">খাগড়াছড়ি পার্বত্য জেলা। </p>
                        </div>
                    </div>
                </div>
                <div>
                    <p style="font-size:15px; text-align: center; padding-top: 25px; color:black;">ইজিবাইক মালিকানা পরিবর্তন ফি:</p>
                    <?php 
                    if($i == 1) {echo '<p style="font-size:15px; text-align: center; color:black;">ব্যাংক কপি</p>';}
                    else if($i == 2) {echo '<p style="font-size:15px; text-align: center; color:black;">পৌরসভা কপি</p>';}
                    else if($i == 3) {echo '<p style="font-size:15px; text-align: center; color:black;">গ্রাহক কপি</p>';}
                    ?>
                </div>
                <div style="padding-top: 25px; color:black; line-height:180%;">
                    <table>
                        <tr>
                            <th style="width:60%"> বিল নম্বর:</th>
                            <td><div class="invOwnerTrnsBillNoC"><?php echo $data['otbl_code'];?></div></td>
                        </tr>
                        <tr>
                            <th>ইজিবাইক রেজিস্ট্রেশন নম্বর:</th>
                            <td><div class="invOwnerTrnsRegNoC"><?php echo $data['reg_no'];?></div></td>
                        </tr>
                        <tr>
                            <th>মালিকের  নাম:</th>
                            <td><div class="invTrnsOwnerNameC"><?php echo $data['o_name'];?></div></td>
                        </tr>
                        <tr>
                            <th>মালিকের  আইডি:</th>
                            <td><div class="ownerid"></div><?php echo $data['o_code'];?></td>
                        </tr>
                        <tr>
                            <th>অর্থ বছর:</th>
                            <td><div class="fiscalYear"><?php echo $data['fiscal_year'];?></div></td>
                        </tr>
                        <tr>
                            <th>বিল ইস্যুর তারিখ:</th>
                            <td><div class="idate"></div><?php echo $data['issue_date'];?></td>
                        </tr>
                        <tr>
                            <th>বিল পরিশোধের তারিখ:</th>
                            <td><div class="billporisodhtarikh"><?php echo $data['payment_date'];?></div></td>
                        </tr>                                          
                    </table>
                </div>
                <div style="padding-top: 8px; color:black;">
                    <table id="t02" style="width:100%">
                        <tr>
                            <th style="border: 1px solid black; border-collapse: collapse;">মালিকানা পরিবর্তন ফি</th>
                            <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse; padding-right:3px">
                            <div class="ownertransfee"><?php echo $data['owner_transfer_fee'];?></div>
                        </td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black; border-collapse: collapse;">জরিমানা</th>
                            <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse"></td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black; border-collapse: collapse;">সারচার্জ</th>
                            <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse"></td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black; border-collapse: collapse;">বিবিধ</th>
                            <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse"></td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black; border-collapse: collapse;"><br></th>
                            <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse;"></td>
                        </tr>
                        <tr>
                            <th style="text-align: right; border: 1px solid black; border-collapse: collapse">  সর্বমোট বিল=</th>
                            <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse; padding-right:3px"><div class="ownertransfee"><?php echo $data['owner_transfer_fee'];?></div></td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-9">
                        <div style="padding-top: 60px; color:black;">
                            <table>
                                <tr>
                                    <th>...............................</th>
                                </tr>
                                <tr>
                                    <th>সংশ্লিষ্ট কর্মকর্তা/কর্মচারীর স্বাক্ষর</th>
                                </tr>
                                <tr>
                                    <th>খাগড়াছড়ি পৌরসভা।</th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-3" style="padding-top: 30px; color:black;">
                        <table style="width:100%">
                            <tr>
                                <th style="height:-100px; float:right; padding-bottom: 5px; padding-right:1px">                                
                                    <img class="card-sig" src="Views/sig.png" style=" width: 50px; height: 41px">              
                                </th>
                            </tr>
                            <tr>
                                <th style="float:left;">মেয়র</th>
                            </tr>
                            <tr>
                                <th style="float:left;">খাগড়াছড়ি পৌরসভা</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div style="padding-top: 30px; color:black;">
                    <table id="t03" style="width:100%">
                        <tr>
                            <th style="text-align: center; border: 1px solid black; border-collapse: collapse;">ব্যাংকের নাম</th>
                
                            <th style="text-align: center; border: 1px solid black; border-collapse: collapse;">শাখার নাম</th>
    
                            <th style="text-align: center; border: 1px solid black; border-collapse: collapse;">হিসাব নম্বর</th>
                        </tr>
                        <tr>
                            <td style="width:45%; padding: 8px; text-align: center; border: 1px solid black; border-collapse: collapse;"> <div class="bankname"><?php echo $data['b_name'];?></div></td>
                            <td style="width:35%; padding: 8px; text-align: center; border: 1px solid black; border-collapse: collapse;"> <div class="branchname"><?php echo $data['ac_branch'];?></div></td>
                            <td style="width:20%; padding: 8px; text-align: center; border: 1px solid black; border-collapse: collapse;"> <div class="accnumber"><?php echo $data['ac_no'];?></div></td>
                        </tr>
                    </table>
                </div>
        
            </div>
        <?php }?>
    </div>
</div>
<div style="padding-top:80px;"></div>
<?php } ?>
</div>
<script>

function printPVC() {
var printContents = document.getElementById('printableAreaPVC').innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
}
</script>

<!--     <script src="./Custom/QRCODE/jquery.qrcode.min.js"></script> -->
    <!--<script src="./Custom /UserJsCss/JS/UserJs.js"></script>-->
    <!-- jQuery -->
    <script src="./Theme/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./Theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
<!--     <script src="./Theme/vendors/fastclick/lib/fastclick.js"></script> -->
    <!-- NProgress -->
<!--     <script src="./Theme/vendors/nprogress/nprogress.js"></script> -->
	<!-- iCheck -->
     <script src="./Theme/vendors/iCheck/icheck.min.js"></script> 
    <!-- Chart.js -->
<!--     <script src="./Theme/vendors/Chart.js/dist/Chart.min.js"></script> -->
    <!-- gauge.js -->
<!--     <script src="./Theme/vendors/gauge.js/dist/gauge.min.js"></script> -->
    <!-- bootstrap-progressbar -->
<!--     <script src="./Theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
    <!-- iCheck -->
<!--     <script src="./Theme/vendors/iCheck/icheck.min.js"></script> -->
    <!-- Skycons -->
<!--     <script src="./Theme/vendors/skycons/skycons.js"></script> -->
    <!-- Flot -->
<!--     <script src="./Theme/vendors/Flot/jquery.flot.js"></script>
    <script src="./Theme/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="./Theme/vendors/Flot/jquery.flot.time.js"></script>
    <script src="./Theme/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="./Theme/vendors/Flot/jquery.flot.resize.js"></script> -->
    <!-- Flot plugins -->
<!--     <script src="./Theme/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="./Theme/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="./Theme/vendors/flot.curvedlines/curvedLines.js"></script> -->
    <!-- DateJS -->
<!--     <script src="./Theme/vendors/DateJS/build/date.js"></script> -->
    <!-- JQVMap -->
<!--     <script src="./Theme/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="./Theme/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="./Theme/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script> -->
    <!-- bootstrap-daterangepicker -->
    <script src="./Theme/vendors/moment/min/moment.min.js"></script>
   <!--  <script src="./Theme/vendors/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    <!-- Datatables -->
    <script src="./Theme/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./Theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./Theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./Theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./Theme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./Theme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./Theme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<!--     <script src="./Theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> -->
<!--     <script src="./Theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> -->
    <script src="./Theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<!--     <script src="./Theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script> -->
<!--     <script src="./Theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script> -->
<!--     <script src="./Theme/vendors/jszip/dist/jszip.min.js"></script> -->
<!--     <script src="./Theme/vendors/pdfmake/build/pdfmake.min.js"></script> -->
<!--     <script src="./Theme/vendors/pdfmake/build/vfs_fonts.js"></script> -->


<!--<script src="./Custom/JS/jquery.js"></script>-->
<script src="./Custom/JS/jquery.datetimepicker.full.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./Theme/build/js/custom.min.js"></script>
	<script src="./Custom/jquery.qrcode.min.js"></script>
	<!-- My Custom Script -->
    <script src="./Custom/JS/bootstrapSelect.js"></script>
    <!-- My Custom Script -->
    <script src="./Custom/JS/common.js"></script>
    <script src="./Custom/JS/spin.js"></script>

    <script src="./Custom/JS/location.js"></script>
	<script src="./Custom/JS/bill.js"></script>
    <script src="./Custom/JS/bank.js"></script>
    <script src="./Custom/JS/user.js"></script>


    

  </body>
  


</html>
