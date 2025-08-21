<?php
require_once "Action/aCommon.php";
$aCommon = new ActionCommon();

$Pin = "";
$Code = "";
$Matched = false;
$msg = "";

if(isset($_REQUEST["code"]))
{
    $Code = $_REQUEST["code"];
}
else
{
    echo "Invalid Code!!";
}

// if(isset($_REQUEST["Pin"]))
// {
//     $Pin = $_REQUEST["Pin"];

//     $msg = $aCommon->PinExist($Pin);


//     if($msg=="Invalid Pin!! Try again!!")
//     {
//         $Matched = false;
//     }
//     else if( $msg = "Pin Matched!!")
//     {
//         $Matched = true;
//     }
// }

// $Date = date("Y-m-d");


$DriverInfo ="";


$DriverInfo = $aCommon->GetDriverInfo($Code);

if($DriverInfo)
{
    $DriverName = $DriverInfo[0]["d_name"];
    $DriverFName = $DriverInfo[0]["d_father_name"];
    $DriverNID = $DriverInfo[0]["d_nid"];
    $DriverLic = $DriverInfo[0]["d_license_no"];
    $DriverMobile = $DriverInfo[0]["d_mobile"];
    $DriverBGroup = $DriverInfo[0]["d_blood_group"];
    $Path = $DriverInfo[0]["d_photo_path"];
    $DriverDivision = $DriverInfo[0]["division"];
    $DriverSubDivision = $DriverInfo[0]["sub_division"];
    $DriverWard = $DriverInfo[0]["ward_no"];
    $DriverVill = $DriverInfo[0]["area"];
}





 //var_dump($DriverInfo);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Easy Bike | </title>

    <!-- My Custome Script -->
    <link href="./Custom/CSS/myStyle.css" rel="stylesheet">
    <!--    <link href="./Custom/UserJsCss/CSS/userStyle.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link href="./Theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./Theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./Theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./Theme/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="./Theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="./Theme/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="./Theme/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="./Theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="./Theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="./Theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="./Theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="./Theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="./Theme/build/css/custom.min.css" rel="stylesheet">

</head>
<body>

    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>রেজিস্ট্রেশন তথ্য</h3>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <div class="row">
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <img style="height:200px; width:200px;" src="<?php echo $Path; ?>">
                                </div>
                                <div class="col-xs-12 col-sm-8">

                                    <div class="form-group">
                                        <label  for="DriverName">চালকের নাম <span class="required">*</span></label>
                                        <input class="form-control" type="text" name="DriverName" id="DriverName" value="<?php echo $DriverName; ?>" required="required" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label  for="FathersName">পিতা/স্বামীর নাম <span class="required">*</span></label>
                                        <input class="form-control" type="text" name="FathersName" id="FathersName" value="<?php echo $DriverFName; ?>" required="required" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="NID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
                                        <input class="form-control" type="text" name="NID" id="NID" required="required"  value="<?php echo $DriverNID; ?>" readonly="readonly">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="LicenseNo">পরিচয় নং <span class="required">*</span></label>
                                <input class="form-control" type="text" name="LicenseNo" id="LicenseNo"  value="<?php echo $DriverLic; ?>" required="required" readonly="readonly">
                            </div>


                            <div class="form-group">
                                <label for="Mobile">মোবাইল নং <span class="required">*</span></label>
                                <input class="form-control" type="text" name="Mobile" id="Mobile"  value="<?php echo $DriverMobile; ?>" required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label  for="DriverBGroup">রক্তের গ্রূপ <span class="required">*</span></label>
                                <input class="form-control" type="text" name="DriverBGroup" id="DriverBGroup"  value="<?php echo $DriverBGroup; ?>" required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="pDivision">জেলা <span class="required">*</span></label>
                                <input class="form-control" type="text" name="pDivision" id="pDivision"  value="<?php echo $DriverDivision; ?>" required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="pSubDivision">পৌরসভা <span class="required">*</span></label>
                                <input class="form-control" type="text" name="pSubDivision" id="pSubDivision"  value="<?php echo $DriverSubDivision; ?>" required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="pWardNo">ওয়ার্ড নং <span class="required">*</span></label>
                                <input class="form-control" type="text" name="pWardNo" id="pWardNo"  value="<?php echo $DriverWard; ?>" required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="pArea">গ্রাম/মহল্লা <span class="required">*</span></label>
                                <input class="form-control" type="text" name="pArea" id="pArea"  value="<?php echo $DriverVill; ?>" required="required" readonly="readonly">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script src="./Theme/vendors/jquery/dist/jquery.min.js"></script>
<script src="./Theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Custom/JS/common.js"></script>

</body>