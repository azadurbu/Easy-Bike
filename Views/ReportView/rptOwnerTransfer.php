<style>
    @page { 
    
        size: auto;
        margin: 1mm; 
    }
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

$cDivision = (isset($_REQUEST['cDivision'])) ? $_REQUEST['cDivision'] : '';
$cSubDivision = (isset($_REQUEST['cSubDivision'])) ? $_REQUEST['cSubDivision'] : '';

$Status = (isset($_REQUEST['Status'])) ? $_REQUEST['Status'] : '';
$Start_date = (isset($_REQUEST['Start_date'])) ? $_REQUEST['Start_date'] : '';
$End_date = (isset($_REQUEST['End_date'])) ? $_REQUEST['End_date'] : '';

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

//echo "<br>Ward: ".$WardNo;
//echo "<br>Area: ".$Area;

$OwnerList = $report->GetAllOwnerTransfer($WardNo,$Area,$cDivision,$cSubDivision,$Status,$Start_date,$End_date);
// var_dump($OwnerList);die;

?>
<div class="right_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <button type="submit" name="submit" class="btn btn-success " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 19px !important;font-family: serif;" onclick="printOwnerReport()" >Print</button>
            <a onclick="exportF(this)" id="downloadLink"  class="btn btn-success"  style="float: right !important;height: 39px !important;width: 73px !important; font-size: 19px !important;font-family: serif;" >Excel</a>
            <div id="printableOwnerRpt">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-offset-8" >
                                <div class="rptContainer">
                                    <div class="rptHeader">
                                        <div class="invHeader">
                                            <tr><img src="../../Content/Other/logo.png" alt="LOGO" width="45" height="45" align="left" style="margin-left: 5px;"></tr>
                                            <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইক মালিকানা পরিবর্তনের তালিকা</br></h3>
                                        </div>

                                        <!-- <tr>
                                             <td  colspan="3"><img class="card-logo" src="../../Content/Other/khagrachari-logo.gif"></td>
                                             <td ><h4 style="padding-top: 22px; margin-left: 402;font-size: 20px;">ইজিবাইক খাগড়াছড়ি পৌরসভা</h4></td><br>
                                             <td ><h5 style="margin-left: 462px;margin-top: -24px;font-size: 15px;">সকল মালিকের তালিকা</h5></td>
                                         </tr>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-offset-8" >
                                <div class="rptContainer">
                                    <table id="table" border="1" class="table  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <?php
                                        $i = 0;
                                        $TempWardNo = "";
                                        foreach ($OwnerList["Owner"] as $key => $res)
                                        {
                                            if($i==0)
                                            {
                                                // if($res['ward_no'] != "")
                                                // {
                                                //     $TempWardNo = $res['ward_no'];

                                                //     echo "<tr>";
                                                //     echo '<td colspan="10">ওয়ার্ড নং-'.$res['ward_no']."</td>";
                                                //     echo "</tr>";
                                                // }
                                                ?>
                                                <tr id="table_header">
                                                    <td >#</td>
                                                    <td>রেজিস্ট্রেশন নাম্বার </td>
                                                    <td>বর্তমান মালিকের কোড </td>
                                                    <td>বর্তমান মালিকের নাম </td>
                                                    <td>পূর্বের মালিকের কোড </td>
                                                    <td>পূর্বের মালিকের নাম</td>
                                                    <td>পরিবর্তনের তারিখ</td>
                                                    <td>টাকার পরিমান</td>
                                                    <td>টাকা জমার তারিখ</td>
                                                    <!-- <td>জন্ম তারিখ</td>
                                                    <td>এন আইডি</td>
                                                    <td>হোল্ডিং নং</td>
                                                    <td>মোবাইল নং</td>
                                                    <td>গ্রাম/মহল্লা</td> -->
                                                    <td>মন্তব্য</td>
                                                </tr>
                                                <?php

                                                $i++;

                                                echo "<tr id='td_header'>";
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$res['reg_no']."</td>";
                                                echo "<td>".$res['current_owner_code']."</td>";
                                                echo "<td>".$res['current_owner_name']."</td>";
                                                echo "<td>".$res['previous_owner_code']."</td>";
                                                echo "<td>".$res['previous_owner_name']."</td>";
                                                echo "<td>".$res['o_transfer_date']."</td>";
                                                echo "<td>".$res['owner_transfer_fee']."</td>";
                                                echo "<td>".$res['payment_date']."</td>";
                                                // echo "<td>".$res['o_holding_no']."</td>";
                                                // echo "<td>".$res['o_mobile']."</td>";
                                                // echo "<td>".$res['area']."</td>";
                                                echo "<td></td>";
                                                echo "</tr>";


                                            }
                                            else
                                            {
                                                // if($TempWardNo != $res['ward_no'])
                                                // {
                                                //     $TempWardNo = $res['ward_no'];

                                                //     echo "<tr>";
                                                //     echo '<td colspan="10">ওয়ার্ড নং-'.$res['ward_no']."</td>";
                                                //     echo "</tr>";
                                                //     $i=0;
                                                // }
                                                $i++;
                                                echo "<tr id='td_header'>";
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$res['reg_no']."</td>";
                                                echo "<td>".$res['current_owner_code']."</td>";
                                                echo "<td>".$res['current_owner_name']."</td>";
                                                echo "<td>".$res['previous_owner_code']."</td>";
                                                echo "<td>".$res['previous_owner_name']."</td>";
                                                echo "<td>".$res['o_transfer_date']."</td>";
                                                echo "<td>".$res['owner_transfer_fee']."</td>";
                                                echo "<td>".$res['payment_date']."</td>";
                                                // echo "<td>".$res['o_holding_no']."</td>";
                                                // echo "<td>".$res['o_mobile']."</td>";
                                                // echo "<td>".$res['area']."</td>";
                                                echo "<td></td>";
                                                echo "</tr>";

                                            }
                                        }
                                        ?>
                                    </table>

                                    <!-- <tr id="td_header">
                                        <td>সর্বমোট মালিকের সংখ্যা:</td>
                                        <td align="center"><?php echo count($OwnerList["Owner"]); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> -->
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