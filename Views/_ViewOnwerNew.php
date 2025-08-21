<?php 
require_once "Action/aOwner.php";
require_once "Action/aVehicle.php";
$aOwner = new ActionOwner();
global $msg;

// ownaer code to id
$owner_info = $aOwner->GetOwnerByCode($_GET['user']);
$owner_info = json_decode($owner_info); 
$o_id = $owner_info->Owner[0]->o_id;

// Owner vehicle info
$aVehicle = new ActionVehicle();
$owner_vehicles = json_decode($aVehicle->GetVehicleByOwnerID($o_id));

// Owner bill
$owner_bill_info = $aOwner->GetOwnerBill($o_id);
// var_dump($owner_vehicles); die();
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
	tr:nth-child(even) {
		background-color: #dddddd;
	}
	.btn-group-cust {
		 margin-top:30px;
		
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
	.owner-pic-info{
		padding-left:50px;
		font-size:15px;
		color:black;
	}
	#photo img {
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
				<h3> ইজিবাইক / টমটমের  মালিকের তথ্য </h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="x_panel">


				<div class="clearfix"></div>
		
				<div class="x_content">
						
				<form  method="post" name="viewOwner" id="viewOwner" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			
		
					<!-- 	<input type="hidden" name="DocType" id="DocType" value="EditOWN"> -->
					<input type="hidden" name="ActionType" id="ActionType" value="Insert">


					<div class="container">
						<div class="row">
							<div class="col-sm-4">
								<div class="owner-pic-info">
									<div id="photo"> </div>
									<div><span><b>	নাম: </b></span> <span id="OwnerName1" ></span> </div>
									<div><span><b>মোবাইল নং:</b></span> <span id="Mobile1"></span> </div>
								</div>
							</div>	
							<div class="col-sm-8">
								<table class="info-tab-cust">
									<tr>
										<td>মালিকের নাম</td>
										<td><span id="OwnerName2"></span> </td>
									</tr>

									<tr>
										<td>Owner Name</td>
										<td><span id="OwnerNameEng">&nbsp</span></td>
									</tr>
									
									<tr>
										<td>পিতা/স্বামীর নাম</td>
										<td><span id="FathersName"> </span> </td>
									</tr>
									
									<tr>
										<td>মাতার নাম </td>
										<td><span id="MothersName"> </span> </td>
									</tr>
									<tr>
										<td>জন্ম তারিখ</td>
										<td><span id="DOB"> </span></td>
									</tr>
									<tr>
										<td>এনআইডি নং:</td>
										<td><span id="NID"> </span></td>
									</tr>
									<tr>
										<td>মোবাইল নং:</td>
										<td><span id="Mobile2"> </span></td>
									</tr>
									<tr>
										<td>রক্তের গ্রূপ</td>
										<td><span id="OwnerBGroup"> </span></td>
									</tr>
								</table>
							</div>

							<div class="btn-group-cust pull-right">
								<div class="col-sm-12">
									<a href="OwnerCardBill.php?user='.$res['ocbl_code'].'" target="_blank" class="btn btn-info"> Bill Payment <i class="fa fa-plus-edit"></i></a>
								</div>
								<!-- <div class="col-sm-6">
									<?php
									// echo "<button data-toggle=\"modal\" data-target=\"#CardModal\" onclick=\"CardInfo('".$_REQUEST['user']."')\" type=\"button\" class=\"btn btn-success\"> Print ID Card <i class=\"fa fa-plus-edit\"></i></button>";
									?>
								</div> -->
							</div>
						</div>

						
						<div class="row">

							<div class="col-sm-6">
								<div class="card">
									<div class="cont">
										<div><h4><b>বর্তমান ঠিকানা</b></h4></div>
										<h2><span id="PresentAddress"> </span>, জেলা : খাগড়াছড়ি পার্বত্য জেলা</h2>
									</div>
								</div>
							</div>	

							<div class="col-sm-6">
								<div class="card">
									<div class="cont">
										<div><h4><b>স্থায়ী ঠিকানা</b></h4></div>
										<h2><span id="PermanentAddress"> </span></h2>
									</div>
								</div>	
							</div>
							
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="card">
									<div class="car">
										<div><b>গাড়ীর তথ্য</b></div>
										<table class="table table-striped table-bordered">
											<tr>
												<th>SL # </th>
												<th>রেজিস্ট্রেশন নং </th>
												<th>রেজিস্ট্রেশনের তারিখ </th>
												<th>গাড়ীর মডেল </th>
												<th>গাড়ীর রঙ </th>
												<th>Action </th>
											</tr>
											<?php 
											$i=1;
											foreach ($owner_vehicles as $key => $val) 
											{
												echo '
													<tr>
														<td>'. $i++ .'</td>
														<td>'. $val->v_id .'</td>
														<td>'. $val->v_reg_date .'</td>
														<td>'. $val->v_model.' </td>
														<td>'. $val->v_color.' </td>
														<td> 
														<a href="VehicleView.php?user='. $val->v_code.'" target="_blank" class="btn btn-warning">গাড়ীর তথ্য <i class="fa fa-plus-edit"></i></a>
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
							<button type="Submit" class="btn btn-danger pull-right">Inactive</button>
							<a href="OwnerEdit.php?user=<?php echo $_GET['user'];?>" target="_blank" class="btn btn-primary"> Edit <i class="fa fa-plus-edit"></i></a>
						</div>

					</div>
					
				</form>
			
			</div>

		</div>
		
	</div>
	
</div>
