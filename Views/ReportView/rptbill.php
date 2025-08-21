
<style>
    #table_header{font-size: 14px; text-align:center; background:lightgray;}
    #td_header{font-size: 12px;}
    table,  tr {
        border: 1px solid;
    }
    td {
        border: 1px dotted;
    }
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto;border: 2px solid;}
    thead { display:table-header-group }
    tfoot { display:table-footer-group }

</style>
<?php
require_once 'Include/Header.php';
require_once '../../ReportAction/aReport.php';

require_once "../../Action/aCommon.php";
$aCommon = new ActionCommon();
$Municipality = $aCommon->GetMunicipality();

$report = new ActionReport();


$WardNo = "";
if(isset($_REQUEST["WardNo"]))
{
    $WardNo = $_REQUEST["WardNo"];
}
$Area = "";
if(isset($_REQUEST["Area"]))
{
    $Area = $_REQUEST["Area"];
}
$Status = "";
if(isset($_REQUEST["Status"]))
{
    $Status = $_REQUEST["Status"];
}
$Start_date = "";
$RStart_date = "";
if(isset($_REQUEST["Start_date"]))
{
    $Start_date = $_REQUEST["Start_date"];

    $RStart_date = date_format(date_create_from_format('Y-m-d', $Start_date), 'd-m-Y');
        //date("d-m-Y", strtotime($Start_date));
}
$End_date = "";
$REnd_date = "";
if(isset($_REQUEST["End_date"]))
{
    $End_date = $_REQUEST["End_date"];
    $REnd_date = date_format(date_create_from_format('Y-m-d', $End_date), 'd-m-Y');
        //date("d-m-Y", strtotime($End_date));
}

//echo "<br>Ward: ".$WardNo;
//echo "<br>Area: ".$Area;
//echo "<br>Status: ".$Status;
//echo "<br>Start_date: ".$Start_date;
//echo "<br>End_date: ".$End_date;
//echo "<br>";

$BillList = $report->GetAllBillRpt($WardNo,$Area,$Status,$Start_date,$End_date);
//var_dump($BillList);

?>
    <div class="right_col" role="main">
    <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <button type="submit" name="submit" class="btn btn-success " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 12px !important;font-family: serif;" onclick="printOwnerReport()" >Print</button>
    <a onclick="exportF(this)" id="downloadLink"  class="btn btn-success"  style="float: right !important;height: 39px !important;width: 73px !important; font-size: 19px !important;font-family: serif;" >Excel</a>
    <div id="printableOwnerRpt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-offset-4" >
                        <div class="rptContainer">
                            <div class="rptHeader">
                                <tr>
                                <?php
                                    if($Status == 0)
                                    {
                                ?>
                                        <div class="invHeader">
                                            <tr><img src="../../Content/Other/logo.png" alt="LOGO" width="45" height="45" align="left" style="margin-left: 5px;"></tr>
                                            <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইকের সকল অপরিশোধিত বিলের তালিকা</br></h3>
                                            <h3 style="text-align: right;font-size: 12px;"> From: <?php echo $RStart_date; ?>&nbsp;&nbsp;&nbsp;To: <?php echo $REnd_date; ?></br></h3>
                                        </div>
                                    <!--<td ><h4 style="padding-top: 22px; margin-left: 447px;font-size: 20px;">খাগড়াছড়ি পৌরসভা</h4></td>
                                    <br>
                                    <td ><h5 style="margin-left: 427px;margin-top: -24px;font-size: 15px;">সকল অপরিশোধিত বিলের তালিকা</h5></td>-->

                                <?php
                                    }
                                    else if($Status == 1)
                                    {
                                ?>
                                
                                <div class="invHeader">
                                            <tr><img src="../../Content/Other/logo.png" alt="LOGO" width="45" height="45" align="left" style="margin-left: 5px;"></tr>
                                            <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইকের সকল পরিশোধিত বিলের তালিকা</br></h3>
                                            <h3 style="text-align: right;font-size: 12px;"> From: <?php echo $RStart_date; ?>&nbsp;&nbsp;&nbsp;To: <?php echo $REnd_date; ?></br></h3>
                                </div>
                                      <!--  <td ><h4 style="padding-top: 22px; margin-left: 447px;font-size: 20px;">খাগড়াছড়ি পৌরসভা</h4></td>
                                        <br>
                                        <td ><h5 style="margin-left: 432px;margin-top: -24px;font-size: 15px;">সকল পরিশোধিত বিলের তালিকা</h5></td>-->

                                <?php
                                    }
                                    else
                                    {
                                ?>
                                
                               <div class="invHeader">
                                            <tr><img src="../../Content/Other/logo.png" alt="LOGO" width="45" height="45" align="left" style="margin-left: 5px;"></tr>
                                            <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইকের সকল বিলের তালিকা</br></h3>
                                           <h3 style="text-align: right;font-size: 12px;"> From: <?php echo $RStart_date; ?>&nbsp;&nbsp;&nbsp;To: <?php echo $REnd_date; ?></br></h3>
                               </div>
                                      <!--  <td><h4 style="padding-top: 22px; margin-left: 447px;font-size: 20px;">খাগড়াছড়ি পৌরসভা</h4></td>
                                        <br>
                                        <td><h5 style="margin-left: 462px;margin-top: -24px;font-size: 15px;">সকল বিলের তালিকা</h5></td>-->
                                <?php
                                    }
                                ?>
                                </tr>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-8" >
                        <div class="rptContainer">
                            <table id="table" border="1" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                <?php
                                $i = 0;
                                $TempWardNo = "";
                                $TotalRegFee = 0;
                                $TotalArrear = 0;
                                $TotalSurCharge = 0;
                                $TotalAmnt = 0;
                                $TotalDue = 0;
                                foreach ($BillList["BillRpt"] as $key => $res)
                                {
                                    $TotalRegFee += $res['reg_fee'];
                                    $TotalArrear += $res['arrear'];
                                    $TotalSurCharge += $res['sur_charge'];
                                    $TotalAmnt += $res['total'];
                                    $TotalDue += $res['due'];
                                    $PaymentDate="";
                                    if($res['payment_date']=="0000-00-00")
                                    {
                                        $PaymentDate = "";
                                    }
                                    else
                                    {
                                        $PaymentDate = $res['payment_date'];
                                    }
                                    
                                    if($i==0)
                                    {
                                        // if($res['ward_no'] != "")
                                        // {
                                        //     $TempWardNo = $res['ward_no'];

                                        //     echo "<tr>";
                                        //     echo '<td colspan="12">ওয়ার্ড নং-'.$res['ward_no']."</td>";
                                        //     echo "</tr>";
                                        // }
                                        ?>
                                        <tr id="table_header" >
                                            <td >#</td>
                                            <td>মালিকের নাম </td>
                                            <td>অর্থ বছর</td>
                                            <td>রেজিস্ট্রেশন নং</td>
                                            <td>রেজিস্ট্রেশনের তারিখ</td>
                                            <td>মেয়াদ উত্তীর্ণের তারিখ</td>
                                            <td>রেজিস্ট্রেশন ফি</td>
                                            <td>বকেয়া</td>
                                            <td>সারচার্জ</td>
                                            <td>সর্বমোট</td>
                                            <td>পরিশোধযোগ্য</td>
                                            <td>প্রদানের তারিখ</td>
                                            <td>ব্যাংকের নাম</td>
                                            <td>মন্তব্য</td>
<!--                                            <td>একাউন্ট নাম</td>-->
                                        </tr>
                                        <?php
                                        $i++;
                                        
                                        echo "<tr id='td_header'>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$res['o_name']."</td>";
                                        echo "<td>".$res['fiscal_year']."</td>";
                                        echo "<td>".$res['v_reg_no']."</td>";
                                        echo "<td align='center'>".$res['reg_date']."</td>";
                                        echo "<td align='center'>".$res['expired_date']."</td>";
                                        echo "<td align='right'>".$res['reg_fee']."</td>";
                                        echo "<td align='right'>".$res['arrear']."</td>";
                                        echo "<td align='right'>".$res['sur_charge']."</td>";
                                        echo "<td align='right'>".$res['total']."</td>";
                                        echo "<td align='right'>".$res['due']."</td>";
                                        echo "<td align='center'>".$PaymentDate."</td>";
                                        echo "<td align='center'>".$res['b_name']."</td>";
                                        echo "<td></td>";
                                   //     echo "<td align='center'>".$res['ac_name']."</td>";
                                        echo "</tr>";
                                        
                                        
                                        
                                    }
                                    else
                                    {
                                        // if($TempWardNo != $res['ward_no'])
                                        // {
                                        //     $TempWardNo = $res['ward_no'];

                                        //     echo "<tr>";
                                        //     echo '<td colspan="12">ওয়ার্ড নং-'.$res['ward_no']."</td>";
                                        //     echo "</tr>";
                                        //     $i=0;
                                        // }
                                        $i++;
                                        echo "<tr id='td_header'>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$res['o_name']."</td>";
                                        echo "<td>".$res['fiscal_year']."</td>";
                                        echo "<td>".$res['v_reg_no']."</td>";
                                        echo "<td align='center'>".$res['reg_date']."</td>";
                                        echo "<td align='center'>".$res['expired_date']."</td>";
                                        echo "<td align='right'>".$res['reg_fee']."</td>";
                                        echo "<td align='right'>".$res['arrear']."</td>";
                                        echo "<td align='right'>".$res['sur_charge']."</td>";
                                        echo "<td align='right'>".$res['total']."</td>";
                                        echo "<td align='right'>".$res['due']."</td>";
                                        echo "<td align='center'>".$PaymentDate."</td>";
                                        echo "<td align='center'>".$res['b_name']."</td>";
                                        echo "<td></td>";
                                   //   echo "<td align='center'>".$res['ac_name']."</td>";
                                        echo "</tr>";
                        
                                    }
                                }
                                ?>
                                <tr id="td_header">
                                    
                                    <td colspan="3">সর্বমোট বিলের সংখ্যা:</td>
                                    <td align="center"><?php echo count($BillList["BillRpt"]); ?></td>
                                    <td></td>
                                    <td></td>
                                    <td align="right"><?php echo $TotalRegFee; ?></td>
                                    <td align="right"><?php echo $TotalArrear; ?></td>
                                    <td align="right"><?php echo $TotalSurCharge; ?></td>
                                    <td align="right"><?php echo $TotalAmnt; ?></td>
                                    <td align="right"><?php echo $TotalDue; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'Include/Footer.php';
?>
<script>
function exportF(elem) {
    var table = document.getElementById("table");
    var html = table.outerHTML;
    var url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html); // Set your html table into url 
    elem.setAttribute("href", url);
    elem.setAttribute("download", "export.xls"); // Choose the file name
    return false;
}
</script>