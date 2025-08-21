<?php 
// require_once "Action/aOwner.php";
require_once "Action/aVehicle.php";
// require_once "Action/aOwnerTransfer.php";

$aVehicle = new ActionVehicle();
$vehicle_info = json_decode($aVehicle->GetVehicleCardIsset($_GET['user']));
$issue_date = null;
if(isset($vehicle_info->Vehicle[0])) $issue_date = $vehicle_info->Vehicle[0]->issue_date;

// $ocbl_code = json_decode($aVehicle->GetVehicleOcblByVcl($_GET['user']));
// // echo '<pre>';
// // var_dump($ocbl_code->ocbl[0]);die;
// if(count($ocbl_code->ocbl[0]) != 0)
// 	$ocbl_code = $ocbl_code->ocbl[0]->ocbl_code;
// else
// 	$ocbl_code = '';
	
// echo $ocbl_code;
require_once 'OwnerCardBill/_OwnerCardBillReceivedCopy.php';
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
	.info-tab-cust tr:nth-child(even) {
		background-color: #dddddd;
	}
	.myQRFrame img{
		width: 75%;
	}
	.myQRFrame{
		padding-left:85px;
	}
	.reg-own{
		padding-top:20px;
		padding-left:85px;
		font-size:15px;
		color:black;
	}
	.btn-group-cust {
		margin-top:25px;
		margin-left:90px;
	}

	.cont>div{
	background:#dddddd;
	padding: 3px 0px 3px 10px;
	}
	
	.card {
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	transition: 0.3s;
	width: 100%;
	}
	.car {
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	transition: 0.3s;
	width: 100%;
	margin-top:25px;
	font-size:20px;
	padding:8px;
	}
	.card:hover {
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
	}
	.myQRFrame{
		padding-left:50px;
		font-size:15px;
		color:black;
	}
	#OwnerPhoto img {
		height:250px !important;
		width:250px !important;
	}
	.modal-footer{
		margin-top:20px;
	}
</style>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3> গাড়ির তথ্য </h3>
				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12">
				
					<div class="x_panel">

						<div class="clearfix"></div>
				
						<div class="x_content">
								
							<div class="container">
								<div class="row">
									<div class="col-sm-8">
										<table class="info-tab-cust">
											<tr>
												<td>রেজিস্ট্রেশন নং</td>
												<td><span id="RegNo2"></span> </td>
											</tr>

											<tr>
												<td>রেজিস্ট্রেশনের তারিখ</td>
												<td><span id="RegDate">&nbsp</span></td>
											</tr>
											
											<tr>
												<td>গাড়ীর মডেল</td>
												<td><span id="Model"> </span> </td>
											</tr>
											
											<tr>
												<td>গাড়ীর রঙ</td>
												<td><span id="Color"> </span> </td>
											</tr>
											<tr>
												<td>গাড়ির ইঞ্জিন নং/চেচিস নং</td>
												<td ><span id="chassis_no"></span></td> 
												
											</tr>
											<tr>
												<td>মালিকের নাম	</td>
												<td><span id="Owner2"> </span></td>
											</tr>
											<tr>
											<td>ইজিবাইক ক্রয়ের ডিলারের নাম/
												শো-রুমের নাম ও ঠিকানা</td>
											<td ><span id="Detail"></span></td> 
											</tr>
											<tr>
												<td> কার্ড ইস্যুর তারিখ </td>
												<td><span>
												<?php
												if($issue_date != null){
													echo '<div class="issue_date_show">Issued';
													echo ' ('.$issue_date.')</div>';
												}
												echo '
												<input type="date" name="issueDate" id="issueDate" ';
												if($issue_date != null) echo 'style="display:none"';
												echo ' >
												<input type="hidden" value="'.$_GET['user'].'" name="vehicleCode" id="vehicleCode">
												';
												?>
												</span></td>
											</tr>
										</table>
									</div>
								</div>
									
								<div class="modal-footer">
									<!-- <button type="Submit" class="btn btn-primary pull-right">Edit</button> -->
									<a href="VehicleView.php?user=<?php echo $_GET['user']?>" class="btn btn-primary"> back <i class="fa fa-plus-edit"></i></a>
									<?php
										if($issue_date != null){
											echo  '<button data-toggle="modal" data-target="#OwnerCardBillReceivedCopyModal" onclick="OwnerCardBillReceivedCopy(\''.$_GET['user'].'\')" type="button" class="btn btn-success"> Bill Received Copy <i class="fa fa-plus-edit"></i></button>';
											echo '<a id="vehicleCardIssueReIssue" class="btn btn-danger pull-right issue_date_show">REISSUE</a>';
										}
										echo '<a id="vehicleCardIssue" class="btn btn-success pull-right"';
										if($issue_date != null) echo 'style="display:none"';
										echo '>ISSUE</a>';
										
									?>
									
								</div>
							</div>	
                        </div>			
                </div>

            </div> 

        </div> 

    </div>            