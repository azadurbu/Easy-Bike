<?php 
	require_once "Action/aCommon.php";
    $aCommon = new ActionCommon();

    $Pin = "";
    $Code = "";
    $Token = "";
    $NewToken = "";
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

    if(isset($_REQUEST["Pin"]))
    {
        $Pin = $_REQUEST["Pin"];

        $msg = $aCommon->PinExist($Pin);


        if($msg=="Invalid Pin!! Try again!!")
        {
            $Matched = false;
        }
        else if( $msg = "Pin Matched!!")
        {
            $Matched = true;
        }
    }

    // if(isset($_REQUEST["TokenInset"]))
    // {
    //     $NewToken = $_REQUEST["NewToken"];

    //     echo "<br> TOKEN : ".$response = $aCommon->InsertToken($Code, $NewToken);
    // }

	// echo "<br>".$Code = $_REQUEST["code"];
 //    echo "<br>".$Date = date("Y-m-d");


    $Date = date("Y-m-d");


    if($Matched)
    {
        $Token = $aCommon->GetTokenByCodeAndDate($Code,$Date);

        if($Token == "")
        {
            $NewToken = $aCommon->GenerateToken();
        }   
    }
    

    $RegInfo ="";

    // if($Token == "" )
    // {
    //
    // }

   

	$RegInfo = $aCommon->GetRegistrationInfo($Code);

    if($RegInfo)
    {
        $RegNo = $RegInfo[0]["v_reg_no"];
        $Owner = $RegInfo[0]["o_name"];
        $NID = $RegInfo[0]["o_nid"];
        $HoldingNo = $RegInfo[0]["o_holding_no"];
        $Mobile = $RegInfo[0]["o_mobile"];
        $Path = $RegInfo[0]["o_photo_path"];
        $Model = $RegInfo[0]["v_model"];
        $Color = $RegInfo[0]["v_color"];
        $Detail = $RegInfo[0]["v_detail"];
    }

    



	// var_dump($RegInfo);


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
        <?php require_once '_GenerateToken.php'; ?>

        <?php 
            if(!$Matched)
            {
        ?>

                <form  action="" method="post" name="CheckPin" id="CheckPin" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="modal-content">
                
                        <!--<input type="hidden" name="DocType" id="DocType" value="VCL">-->
                        <input type="hidden" name="ActionType" id="ActionType" value="CheckPin">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Insert Pin</h4>
                        </div>

                        <div class="modal-body">
                            <?php
                                if($msg != "")
                                {
                            ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <strong>
                                        <?php echo $msg; ?>
                                        </strong>
                                    </div>
                            <?php 
                                }
                            ?>

                            <div class="form-group">
                                <label for="Pin">Pin <span class="required">*</span></label>
                                <input class="form-control" type="password" name="Pin" id="Pin" value="" required="required">
                            </div>

                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="Submit" class="btn btn-primary">Submit</button>
                    <!--        <button type="Submit" class="btn btn-primary" onclick="AddVehicle()">Add Record</button> -->
                        </div>
                    
                    </div>
                </form>

        <?php
            }
            else
            {
        ?>


                <div class="right_col" role="main">
                  <div class="">

        			<div class="clearfix"></div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h3>রেজিস্ট্রেশান তথ্য</h3>
                          
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <br />

                            <div class="row">
                            	<div class="col-xs-12 col-sm-4 text-center">
                                    <img style="height:200px; width:200px;" src="<?php echo $Path; ?>">
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <?php 

                                        if($Token != "")
                                        {
                                    ?>
                                            <div class="alert alert-danger alert-dismissible fade in" role="alert"><strong>Token Already Generated : <?php echo $Token; ?></strong></div>
                                    <?php
                                        }
                                    ?>
                                	<div class="form-group">
        								<label for="RegNo">রেজিস্ট্রেশন নং <span class="required">*</span></label>
        								<input class="form-control" type="text" name="RegNo" id="RegNo" value="<?php echo $RegNo; ?>" required="required" readonly="readonly">
        							</div>


                                    <div class="form-group">
                                        <label  for="OwnerName">মালিকের নাম <span class="required">*</span></label>
                                        <input class="form-control" type="text" name="OwnerName" id="OwnerName" value="<?php echo $Owner; ?>" required="required" readonly="readonly">
                                    </div>
        		                    <div class="form-group">
        								<label for="NID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
        								<input class="form-control" type="text" name="NID" id="NID" required="required"  value="<?php echo $NID; ?>" readonly="readonly">
        							</div>
                                </div>
                           
                            </div>

        					<div class="form-group">
        						<label for="HoldingNo">হোল্ডিং নম্বর <span class="required">*</span></label>
        						<input class="form-control" type="text" name="HoldingNo" id="HoldingNo" required="required"   value="<?php echo $HoldingNo; ?>" readonly="readonly">
        					</div>

        					<div class="form-group">
        						<label for="Mobile">মোবাইল নং <span class="required">*</span></label>
        						<input class="form-control" type="text" name="Mobile" id="Mobile"  value="<?php echo $Mobile; ?>" required="required" readonly="readonly">
        					</div>

        					<div class="form-group">
        						<label  for="Model">গাড়ীর মডেল <span class="required">*</span></label>
        						<input class="form-control" type="text" name="Model" id="Model"  value="<?php echo $Model; ?>" required="required" readonly="readonly">
        					</div>
        					
        					<div class="form-group">
        						<label for="Color">গাড়ীর রঙ <span class="required">*</span></label>
        						<input class="form-control" type="text" name="Color" id="Color"  value="<?php echo $Color; ?>" required="required" readonly="readonly">
        					</div>

        					<div class="form-group">
        						<label for="Detail">ইজিবাইকে ক্রয়ের ডিলারের নাম/ শো
        								-রুমের নাম ও ঠিকানা <span class="required">*</span></label>
        						<textarea class="form-control" type="text" name="Detail" id="Detail"   required="required" required="required" readonly="readonly"> <?php echo $Detail; ?></textarea>
        					</div>
        					<?php 

                                if($Token=="")
                                {
                            ?>
                            <div align="center">
                                <button  data-toggle="modal" data-target="#GenerateTokenModal"  type="button" class="btn btn-primary"> Generate Token <i class="fa fa-plus-edit"></i></button>
                            </div>

                            <?php
                                }

                            ?>
        					<div class="ln_solid"></div>
        	
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

        <?php
            }
        ?>
   
    <script src="./Theme/vendors/jquery/dist/jquery.min.js"></script>
    <script src="./Theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./Custom/JS/common.js"></script>

</body>