<?php 
require_once "Action/aOwner.php";
require_once "Action/aVehicle.php";
require_once "Action/aOwnerTransfer.php";
require_once '_GenerateQR.php';
$aOwner = new ActionOwner();

global $msg;

$aVehicle = new ActionVehicle();
$vehicle_info = json_decode($aVehicle->GetVehicleByCode($_GET['user']));
$o_id = $vehicle_info->Vehicle[0]->o_id;
$owner_bill_info = $aOwner->GetOwnerBill($o_id);
$status = 0;
// if(count($owner_bill_info) > 0){
// 	$key =  array_key_last($owner_bill_info);
// 	$status = $owner_bill_info[$key]['status'];
// 	$payment_date = $owner_bill_info[$key]['payment_date'];
// }
// vehicle owner transfer
$v_reg_no = $vehicle_info->Vehicle[0]->v_reg_no;

$Card = $ChildModuleAccessList[1]->Card;

// check card issue or not
$vehicle_info = json_decode($aVehicle->GetVehicleCardIsset($_GET['user']));
$issue_date = null;
if(isset($vehicle_info->Vehicle[0])) $issue_date = $vehicle_info->Vehicle[0]->issue_date;

$aOwnerTransfer = new ActionOwnerTransfer();
$OwnerTransferList = $aOwnerTransfer->GetVehicleOwnerTransferVRegNo($v_reg_no);
// echo '<pre>'; var_dump($OwnerTransferList);die;
function GetOwnerByOwnerID($OwnerID)
{
	$aOwner = new ActionOwner();
	$Owner = $aOwner->GetOwnerInfoByOwnerID($OwnerID);
	//var_dump($Owner);
	$OwnerName = "";
	if($Owner["Owner"])
	{
		$OwnerName = $Owner["Owner"][0]["o_name"];
	}

	return $OwnerName;
}
require_once '_Card.php';
require_once 'OwnerCardBill/_ViewOwnerCardInvoice.php' 
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

									<div class="col-sm-4" >
										<div class="myQRFrame">
											<div id="OwnerPhoto"></div>
										</div>
										<div class=reg-own>
											<div><span><b>Owner Code : </span></b><span id="OwnerCode"></span></div>
											<div><span><b>মালিকের নাম : </span></b><span id="Owner1"></span></div>
										</div>
									</div>
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
												<td><span id="chassis_no"> </span></td>
											</tr>
											<tr>
												<td>মালিকের নাম	</td>
												<td><span id="Owner2"> </span></td>
											</tr>
											<!-- <tr>
												<td>Last Renew Date</td>
												<td><span id="RegDate"> </span></td>
											</tr>
											<tr>
												<td>Next Renew Date</td>
												<td><span id=""> </span></td>
											</tr> -->
											<tr>
											<td>ইজিবাইক ক্রয়ের ডিলারের নাম/
												শো-রুমের নাম ও ঠিকানা</td>
											<td ><span id="Detail"></span></td> 
											</tr>
											<tr>
												<td> কার্ড ইস্যু স্ট্যাটাস </td>
												<td><span>
												<?php
												if($issue_date != null){
													echo 'Issued';
													echo ' ('.$issue_date.')';
												}else{
													echo 'Not Issued';
												}
												?>
												</span></td>
											</tr>
										</table>
									</div>
								</div>

								<div class="btn-group-cust">
									<div class="col-sm-3">
									<!-- <a href="GenerateQRVehicleNew.php?user=<?php echo $_GET['user']?>" target="_blank" class="btn btn-success">Sticker Print</a> -->
									<?php
									// echo "<button data-toggle=\"modal\" data-target=\"#QRModal\" onclick=\"GenerateQR('".$_GET['user']."')\" type=\"button\" class=\"btn btn-info\"> Sticker Print <i class=\"fa fa-plus-edit\"></i></button>";
									echo '<button data-toggle="modal" data-target="#QRModal" onclick="GenerateQR(\''.$_GET['user'].'\')" type="button" class="btn btn-success"> QR Sticker Print <i class="fa fa-plus-edit"></i></button>';
									?>
									</div>
									<div class="col-sm-3">
										<!-- <?php 
										if(count($owner_bill_info) > 0){
										if($status == 1){ ?>
											<a href="ViewOwnerBill.php?user=<?php echo $owner_bill_info[0]['ocbl_code']?>" class="btn btn-success"> Bill Payment </a>
										<?php }else{ ?>
											<a href="OwnerBillPosting.php?user=<?php echo $owner_bill_info[0]['ocbl_code']?>" class="btn btn-success"> Bill Payment </a>
										<?php }}else{
											echo '<a href="#" class="btn btn-success"> Bill Payment </a>';
										} ?> -->
										<a href="ViewCardIssue.php?user=<?php echo $_GET['user']?>" class="btn btn-success"> Card Issue </a>

									</div>
									<!-- <div class="col-sm-3"><button  class="btn btn-success">Card Print</button></div> -->
									<div class="col-sm-3">
									<?php
									echo "<button data-toggle=\"modal\" data-target=\"#CardModal\" onclick=\"CardInfo('".$_REQUEST['user']."')\" type=\"button\" class=\"btn btn-success\"> Print ID Card <i class=\"fa fa-plus-edit\"></i></button>";
									?>
									</div>
									<div class="col-sm-3"><a href="AddOwnerTransfer.php?user=<?php echo $_GET['user']?>" target="_blank" class="btn btn-success">মালিকানা পরিবর্তন করুন </a></div>	
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="car">
												<div><b>বিল স্টেটমেন্ট</b></div>	
												<table class="table table-striped table-bordered">
													<tr>
														<th>SL # </th>
														<th>বিল জেনারেটের তারিখ</th>
														<th>বিল #</th>
														<th>অর্থ বছর</th>
														<th>Payment Status</th>
														<th>Payment Date</th>
														<th>Action</th>
													</tr>
													<?php 
														$i=1;
														foreach ($owner_bill_info as $key => $val) 
														{
															if ($val['status'] == 1){
																$status = '<span class="label label-success">Paid</span>';
															}else{
																$status = '<span class="label label-danger">Pending</span>';
															}
															$d = strtotime($val['entry_date']);
															$year = date("Y", $d);
															echo '
															<tr>
																<td>'.$i++.'</td>
																<td>'.$val['entry_date'].'</td>
																<td>'.$val['o_card_fee'].'</td>
																<td>'.$val['fiscal_year'].'</td>
																<td>'.$status.'</td>
																<td>'.$val['payment_date'].'</td>
																<td>';
																if ($val['status'] != 1){
																	// echo '<span class="label label-success">Pay </span>';
																	echo '<a href="OwnerBillPosting.php?user='. $val['ocbl_code'] .'" target="_blank" class="btn btn-success">Pay</a>';
																}																
																// echo '<span class="label label-warning"> Print</span>';
																echo "<button data-toggle=\"modal\" data-target=\"#OwnerCardInvoiceModal\" onclick=\"InvoiceOwnerCard('".$val['ocbl_code']."')\" type=\"button\" class=\"btn btn-warning\"> Print <i class=\"fa fa-plus-edit\"></i></button>";
															
															echo '</td>
															</tr>';
														}	
													?>
												</table>
											</div>	
										</div>
									</div>
								</div>
									
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="car">
												<div><b>মালিকানা পরিবর্তনের তথ্য</b></div>	
												<table class="table table-striped table-bordered">
													<tr>
														<th>SL # </th>
														<th>মালিকানা পরিবর্তনের তারিখ</th>
														<th>From</th>
														<th>To</th>
														<th>Comments</th>
													</tr>
													<?php 
													$i=1;
													foreach ($OwnerTransferList as $key => $val) 
													{
														echo '
														<tr>
															<td>'.$i++.'</td>
															<td>'.$val['o_transfer_date'].'</td>
															<td>'.GetOwnerByOwnerID($val['current_owner']).'</td>
															<td>'.GetOwnerByOwnerID($val['previous_owner']).'</td>
															<td>
															</td>
														</tr>';
													}	
														?>
												</table>
											</div>
										</div>
									</div>
								</div>		
								<div class="modal-footer">
									<!-- <button type="Submit" class="btn btn-primary pull-right">Edit</button> -->
									<a href="VehicleEdit.php?user=<?php echo $_GET['user']?>" target="_blank" class="btn btn-primary"> Edit <i class="fa fa-plus-edit"></i></a>
									<button type="Submit" class="btn btn-danger pull-right">Inactive</button>
								</div>
							</div>	
                        </div>			
                </div>

            </div> 

        </div> 

    </div>            