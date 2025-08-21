
<style>
    #table_header{font-size: 14px; text-align:center; background:lightgray;}
    #td_header{font-size: 12px;}
    table,  tr {
        border: 1px solid;
    }
    td {
        border: 1px dotted;
    }

</style>

<?php
require_once 'Include/Header.php';
require_once '../../ReportAction/aReport.php';

require_once "../../Action/aCommon.php";
$aCommon = new ActionCommon();
$Municipality = $aCommon->GetMunicipality();

$report = new ActionReport();

$DriverName = (isset($_REQUEST['DriverName'])) ? $_REQUEST['DriverName'] : '';
$NID = (isset($_REQUEST['NID'])) ? $_REQUEST['NID'] : '';
$RegNo = (isset($_REQUEST['RegNo'])) ? $_REQUEST['RegNo'] : '';
$Mobile = (isset($_REQUEST['Mobile'])) ? $_REQUEST['Mobile'] : '';
$cDivision = (isset($_REQUEST['cDivision'])) ? $_REQUEST['cDivision'] : '';
$cSubDivision = (isset($_REQUEST['cSubDivision'])) ? $_REQUEST['cSubDivision'] : '';

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

$DriverList = $report->GetAllDriver($WardNo,$Area,$DriverName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision);
// var_dump($DriverList);die;

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
                                    <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইক চালকের তালিকা</br></h3>
                                </div>
                                <!--<tr>
                                    <td ><h4 style="padding-top: 22px; margin-left: 447px;font-size: 20px;">খাগড়াছড়ি পৌরসভা</h4></td><br>
                                    <td ><h5 style="margin-left: 462px;margin-top: -24px;font-size: 15px;">সকল চালকের তালিকা</h5></td>
                                </tr>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-8" >
                        <div class="rptContainer">
                            <table border="1" class="table  table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="table">
                                <?php
                                $i = 0;
                                $TempWardNo = "";
                                foreach ($DriverList["Driver"] as $key => $res)
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
                                            <td>নাম</td>
                                            <td>পিতা/স্বামীর নাম</td>
                                            <td>মাতার নাম</td>
                                            <td>রক্তের গ্রূপ</td>
                                            <td>জন্ম তারিখ</td>
                                            <td>ভোটার আইডি</td>
                                            <td>হোল্ডিং নং</td>
                                            <td>মোবাইল নং</td>
                                            <td>গ্রাম/মহল্লা</td>
                                            <td>মন্তব্য</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        
                                        echo "<tr id='td_header'>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$res['d_name']."</td>";
                                        echo "<td>".$res['d_father_name']."</td>";
                                        echo "<td>".$res['d_mother_name']."</td>";
                                        echo "<td>".$res['d_blood_group']."</td>";
                                        echo "<td>".$res['d_dob']."</td>";
                                        echo "<td>".$res['d_nid']."</td>";
                                        echo "<td>".$res['d_holding_no']."</td>";
                                        echo "<td>".$res['d_mobile']."</td>";
                                        echo "<td>".$res['area']."</td>";
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
                                        echo "<td>".$res['d_name']."</td>";
                                        echo "<td>".$res['d_father_name']."</td>";
                                        echo "<td>".$res['d_mother_name']."</td>";
                                        echo "<td>".$res['d_blood_group']."</td>";
                                        echo "<td>".$res['d_dob']."</td>";
                                        echo "<td>".$res['d_nid']."</td>";
                                        echo "<td>".$res['d_holding_no']."</td>";
                                        echo "<td>".$res['d_mobile']."</td>";
                                        echo "<td>".$res['area']."</td>";
                                        echo "</tr>";
                                    
                                    }
                                }
                                ?>
                            </table>
                            <tr id="td_header">
                                <td>সর্বমোট চালকের সংখ্যা:</td>
                                <td align="center"><?php echo count($DriverList["Driver"]); ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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