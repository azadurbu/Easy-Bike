
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

//echo "<br>Ward: ".$WardNo;
//echo "<br>Area: ".$Area;

$LicenseList = $report->GetTotalLicences($WardNo,$Area);
//var_dump($LicenseList);

?>
    <div class="right_col" role="main">
    <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <button type="submit" name="submit" class="btn btn-success " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 19px !important;font-family: serif;" onclick="printOwnerReport()" >Print</button>
    <div id="printableOwnerRpt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-offset-8" >
                        <div class="rptContainer">
                            <div class="rptHeader">
                                <div class="invHeader">
                                            <tr><img src="../../Content/Other/logo.png" alt="LOGO" width="45" height="45" align="left" style="margin-left: 5px;"></tr>
                                            <h3 style="text-align: center;"> <?php echo $Municipality[0]["m_name"]; ?> কার্যালয়  <br>ইজিবাইকের সকল লাইসেন্সের তালিকা</br></h3>
                                </div>
                              <!--  <tr>
                                    <td ><h4 style="padding-top: 22px; margin-left: 447px;font-size: 20px;">খাগড়াছড়ি পৌরসভা</h4></td><br>
                                    <td ><h5 style="margin-left: 462px;margin-top: -24px;font-size: 15px;">সকল লাইসেন্সের তালিকা</h5></td>
                                </tr> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-8" >
                        <div class="rptContainer">
                            <table id="responsive" border="1" class="table  table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <?php
                                $i = 0;
                                $TempWardNo = "";
                                foreach ($LicenseList["TotalLicences"] as $key => $res)
                                {
                                    if($i==0)
                                    {
                                        if($res['ward_no'] != "")
                                        {
                                            $TempWardNo = $res['ward_no'];

                                            echo "<tr>";
                                            echo '<td colspan="6">ওয়ার্ড নং-'.$res['ward_no']."</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                        <tr id="table_header">
                                            <td>#</td>
                                            <td>লাইসেন্স নং</td>
                                            <td>গাড়ীর রঙ</td>
                                            <td>গাড়ীর মালিকের নাম</td>
                                            <td>রেজিস্ট্রেশনের তারিখ</td>
                                            <td>গ্রাম/মহল্লা</td>
                                            <td>মন্তব্য</td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    else
                                    {
                                        if($TempWardNo != $res['ward_no'])
                                        {
                                            $TempWardNo = $res['ward_no'];

                                            echo "<tr>";
                                            echo '<td colspan="6">ওয়ার্ড নং-'.$res['ward_no']."</td>";
                                            echo "</tr>";
                                            $i=1;
                                        }

                                        echo "<tr id='td_header'>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$res['v_reg_no']."</td>";
                                        echo "<td>".$res['v_color']."</td>";
                                        echo "<td>".$res['o_name']."</td>";
                                        echo "<td>".$res['v_reg_date']."</td>";
                                        echo "<td>".$res['area']."</td>";
                                        echo "<td></td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                }
                                ?>
                            </table>

                            <tr id="td_header">
                                <td>সর্বমোট লাইসেন্সের সংখ্যা:</td>
                                <td align="center"><?php echo count($LicenseList["TotalLicences"]); ?></td>
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