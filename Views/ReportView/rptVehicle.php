
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

        border:solid 1px; width:100px; word-wrap:break-word;
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

$ownerName = (isset($_REQUEST['ownerName'])) ? $_REQUEST['ownerName'] : '';
$NID = (isset($_REQUEST['NID'])) ? $_REQUEST['NID'] : '';
$RegNo = (isset($_REQUEST['RegNo'])) ? $_REQUEST['RegNo'] : '';
$Mobile = (isset($_REQUEST['Mobile'])) ? $_REQUEST['Mobile'] : '';

$cDivision = (isset($_REQUEST['cDivision'])) ? $_REQUEST['cDivision'] : '';
$cSubDivision = (isset($_REQUEST['cSubDivision'])) ? $_REQUEST['cSubDivision'] : '';
$Status = (isset($_REQUEST['Status'])) ? $_REQUEST['Status'] : '';

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

$VehicleList = $report->GetAllVehicleRpt($ownerName, $NID, $RegNo, $Mobile, $cDivision, $cSubDivision, $WardNo, $Area, $Status);
// var_dump($VehicleList);die;

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
                                    <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইকের সকল গাড়ির তালিকা</br></h3>
                                </div>
                                <!--
                                <tr>
                                    <td ><h4 style="padding-top: 22px; margin-left: 447px;font-size: 20px;">খাগড়াছড়ি পৌরসভা</h4></td><br>
                                    <td ><h5 style="margin-left: 462px;margin-top: -24px;font-size: 15px;">সকল গাড়ির তালিকা</h5></td>
                                </tr>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-8" >
                        <div class="rptContainer">
                            <table border="1"  style="font-size: 10px;  margin: 20px auto; table-layout: fixed;" cellspacing="0" width="100%" id="table">

                                        <tr id="table_header">
                                            <td style="width: 20px;">#</td>
                                            <td>রেজি: নং</td>
                                            <td>মালিকের কোড</td>
                                            <td>মালিকের নাম</td>
                                            <td>পিতার নাম</td>
                                            <td>মাতার নাম</td>
                                            <td>এনআইডি নং</td>
                                            <td>মোবাইল</td>
                                            <td>গাড়ীর মডেল</td>
                                            <td>গাড়ীর রঙ</td>
                                            <td>কার্ড স্টিকার ইসু তারিখ</td>
                                            <td>রেজি: তারিখ</td>
                                            <td style="width: 200px;" colspan=75">মালিকের স্থায়ী ঠিকানা</td>
                                            <td>মন্তব্য</td>
                                        </tr>
                                  <?php
                                $i = 0;
                                foreach ($VehicleList["Vehicle"] as $key => $res)
                                {
                                    $i++;
                                        echo "<tr id='td_header'>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$res['v_reg_no']."</td>";
                                        echo "<td>".$res['o_code']."</td>";
                                        echo "<td>".$res['o_name']."</td>";
                                        echo "<td>".$res['o_father_name']."</td>";
                                        echo "<td>".$res['o_mother_name']."</td>";
                                        echo "<td>".$res['o_nid']."</td>";
                                        echo "<td>".$res['o_mobile']."</td>";
                                        echo "<td>".$res['v_model']."</td>";
                                        echo "<td>".$res['v_color']."</td>";
                                        echo "<td>".$res['issue_date']."</td>";
                                        echo "<td>".$res['v_reg_date']."</td>";
                                        echo "<td style='width: 200px;' colspan=75%>".$res['PermanentAddress']."</td>";
                                        echo "<td></td>";
                                        echo "</tr>";


                                }
                                ?>
                            </table>
                            <tr id="td_header">
                                <td>সর্বমোট মালিকের সংখ্যা:</td>
                                <td align="center"><?php echo count($VehicleList["Vehicle"]); ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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