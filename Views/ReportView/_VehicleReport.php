<?php 
require_once "Action/aOwner.php";
require_once "Action/aVehicle.php";
require_once "Action/aOwnerTransfer.php";
$aOwner = new ActionOwner();

global $msg;

?>

<style>
  .info-tab-cust{
		width:100%;
		margin-left: auto;
  		margin-right: auto;
		color:black;
		font-size:15px;
		}
        .info-tab-cust td:first-child{
		font-weight: bold;
		padding-left:8px;
	}
	tr:nth-child(even) {
		background-color: #dddddd;
	}

	.btn-group-cust {
        margin-left:1000px;
	}
	.cont{
		padding:8px;
	}
	.cont>div{
	background:#dddddd;
	padding: 3px 0px 3px 10px;
	}
	
	.card {
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	transition: 0.3s;
	width: 100%;
	margin-top:20px;
	}
	.car {
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	transition: 0.3s;
	width: 100%;
	margin-top:30px;
	font-size:20px;
	padding:8px;
	}

	.card:hover {
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
	}

	.modal-footer{
		 margin-top:20px;
	}     
</style>

<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>গাড়ির তথ্যসমূহ </h3>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form target="_blank" action="Views/ReportView/rptVehicle.php" method="" name="frmVehicleRPT" id="frmVehicleRPT" data-parsley-validate class="form-horizontal form-label-left">

                            <input type="hidden" name="DocType" id="DocType" value="VCLRPT">
                            
                            <div class="container">
								<div class="row">
									<div class="col-sm-3" >
                                        <tr>
                                            <td>Name English</td>
                                            <td><input class="form-group" type="text" id="ownerName" name="ownerName"></td>
                                        </tr> 
                                    </div>
                                    <div class="col-sm-3" >
                                        <tr> 
                                            <td>এনআইডি নম্বর</td>
                                            <td><input class="form-group" type="number" id="NID" name="NID" ></td>
                                        </tr>
                                    </div>
                                    <div class="col-sm-3" >
                                        <tr> 
                                            <td>রেজিস্ট্রেশন নং</td>
                                            <td><input class="form-group" type="text" id="RegNo" name="RegNo" ></td>
                                        </tr>
                                    </div>
                                    <div class="col-sm-3" >
                                        <tr>
                                            <td>মোবাইল নং</td>
                                            <td><input class="form-group" type="number" id="Mobile" name="Mobile" ></td>
                                        </tr> 
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>  

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport">মালিকের তথ্যসমূহ<span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control" name="cDivision" id="cDivision" class="form-control" >
                                            <option value="">---- উপজেলা ----</option>
                                        </select>
                                    </div>
                                    <br>                              
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport"> <span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" name="cSubDivision" id="cSubDivision" class="form-control" >
                                        <option value="">---- পৌরসভা ----</option>
                                    </select>
                                    </div>
                                    <br>                              
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport"><span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control" class="form-control" name="WardNo" id="WardNo" class="form-control" >
                                            <option value="">---- ওয়ার্ড নং ----</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport"> <span class="required"></span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control" name="Area" id="Area" class="form-control" >
                                            <option value="">---- গ্রাম/মহল্লা ----</option>
                                        </select>
                                    </div>
                                    <br>                              
                                </div> 
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Status">স্ট্যাটাস<span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control" class="form-control" name="Status" id="Status" class="form-control">
                                            <option value="2">---- সকল গাড়ি ----</option>
                                            <option value="1">----কার্ড ও স্টিকার ইসু হয়েছে ----</option>
                                            <option value="0">----কার্ড ও স্টিকার ইসু হয়নি ----</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="Submit" class="btn btn-success pull-right">View</button>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
