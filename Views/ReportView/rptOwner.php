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
        border: 1px solid;
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

$OwnerName = (isset($_REQUEST['OwnerName'])) ? $_REQUEST['OwnerName'] : '';
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

//echo "<br>Ward: ".$WardNo;
//echo "<br>Area: ".$Area;

$OwnerList = $report->GetAllOwner($WardNo,$Area,$OwnerName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision);
// var_dump($OwnerList);

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
                                            <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইক মালিকের তালিকা</br></h3>
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
                                <table border="1"  style="font-size: 10px;  margin: 20px auto; table-layout: fixed;" cellspacing="0" width="100%" id="table">
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
                                                    <td>নাম</td>
                                                    <td>মালিকের কোড</td>
                                                    <td>Name</td>
                                                    <td>পিতা/স্বামীর নাম</td>
                                                    <td>মাতার নাম</td>
                                                    <td>রক্তের গ্রূপ</td>
                                                    <td>জন্ম তারিখ</td>
                                                    <td>এন আইডি</td>
                                                    <td>মোবাইল নং</td>
                                                    <td>মালিকের স্থায়ী ঠিকানা</td>
                                                    <td>মন্তব্য</td>
                                                </tr>
                                                <?php

                                                $i++;

                                                echo "<tr id='td_header'>";
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$res['o_name']."</td>";
                                                echo "<td>".$res['o_code']."</td>";
                                                echo "<td>".$res['owner_name_eng']."</td>";
                                                echo "<td>".$res['o_father_name']."</td>";
                                                echo "<td>".$res['o_mother_name']."</td>";
                                                echo "<td>".$res['o_blood_group']."</td>";
                                                echo "<td>".$res['o_dob']."</td>";
                                                echo "<td>".$res['o_nid']."</td>";
                                                echo "<td>".$res['o_mobile']."</td>";
                                                echo "<td style='width: 200px;'>".$res['PermanentAddress']."</td>";
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
                                                echo "<td>".$res['o_name']."</td>";
                                                echo "<td>".$res['o_code']."</td>";
                                                echo "<td>".$res['owner_name_eng']."</td>";
                                                echo "<td>".$res['o_father_name']."</td>";
                                                echo "<td>".$res['o_mother_name']."</td>";
                                                echo "<td>".$res['o_blood_group']."</td>";
                                                echo "<td>".$res['o_dob']."</td>";
                                                echo "<td>".$res['o_nid']."</td>";
                                                echo "<td>".$res['o_mobile']."</td>";
                                                echo "<td style='width: 200px;'>".$res['PermanentAddress']."</td>";
                                                echo "<td></td>";
                                                echo "</tr>";

                                            }
                                        }
                                        ?>
                                    </table>

                                    <tr id="td_header">
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