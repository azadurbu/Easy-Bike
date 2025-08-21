<?php 
require_once "Action/aOwner.php";
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
    #viewfile img {
		height:250px !important;
		width:250px !important;
	}
	.myQRFrame{
		padding-left:50px;
	}
	.reg-own{
		padding-top:20px;
		padding-left:50px;
		font-size:15px;
		color:black;
	}
	.btn-group-cust {
        margin-left:930px;
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
		padding-left:20px;
		font-size:15px;
		color:black;
	}
	.modal-footer{
		 margin-top:20px;
	}     
</style>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3> চালকের তথ্য </h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">

				<div class="x_panel">

					<div class="clearfix"></div>

					<form  method="post" name="viewDriver" id="viewDriver" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">     
					
						<input type="hidden" name="DocType" id="DocType" value="DRV">
						<input type="hidden" name="ActionType" id="ActionType" value="Insert">

						<div id="errorMessage"></div>
						<div class="container">
							<div class="row">
								<div class="col-sm-4">
									<div class="owner-pic-info">
										<div class="myQRFrame">
											<div id="viewfile"> </div>
										</div>    
										<div class=reg-own>
											<div><span><b>	নাম: </b></span> <span id="DriverName1" ></span> </div>
											<div><span><b>মোবাইল নং:</b></span> <span id="Mobile1"></span> </div>
										</div>
									</div>
								</div>	
								<div class="col-sm-8">
									<table class="info-tab-cust">
										<tr>
											<td>চালকের নাম</td>
											<td><span id="DriverName2"></span> </td>
										</tr> 
										<tr>
											<td>Driver Name</td>
											<td><span id="DriverNameEng"></span> </td>
										</tr>
										<tr>
											<td>Driver Reg No</td>
											<td><span id="DriverRegNo"></span> </td>
										</tr>
										<tr>
											<td>Driver Reg Date</td>
											<td><span id="DriverRegDate"></span> </td>
										</tr> 
										<tr>
											<td>পিতা/স্বামীর নাম</td>
											<td><span id="FathersName"></span> </td>
										</tr> 
										<tr>
											<td>মাতার নাম</td>
											<td><span id="MotherName"></span> </td>
										</tr> 
										<tr>
											<td>জন্ম তারিখ</td>
											<td><span id="DOB"></span> </td>
										</tr> 
										<tr>
											<td>এনআইডি নম্বর</td>
											<td><span id="NID"></span> </td>
										</tr> 
										<tr>
											<td>মোবাইল নং</td>
											<td><span id="Mobile2"></span> </td>
										</tr> 
										<tr>
											<td>রক্তের গ্রূপ</td>
											<td><span id="DriverBGroup"></span> </td>
										</tr> 
									</table>
								</div>                  
							</div>

							<div class="btn-group-cust">
								<div class="col-sm-6">
									<!-- <button type="Submit" class="btn btn-success">Print ID Card</button> -->
								</div>
								<a href="DriverCardBill.php?user='.$res['ocbl_code'].'" target="_blank" class="btn btn-info"> Bill Payment <i class="fa fa-plus-edit"></i></a>
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
												<div><b>বিল স্টেটমেন্ট</b></div>	
												<table class="table table-striped table-bordered">
													<tr>
														<th>SL # </th>
														<th>বিল জেনারেটের তারিখ</th>
														<th>বিল #</th>
														<th>Bill Type</th>
														<th>অর্থ বছর</th>
														<th>Payment Status</th>
														<th>Payment Date</th>
														<th>Action</th>
													</tr>
													<!-- <?php 
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
																<td>'.$val['payment_date'].'</td>
																<td>'.$val['o_card_fee'].'</td>
																<td></td>
																<td>'.$year.'</td>
																// <td></td>
																<td>'.$status.'</td>
																<td>
																<a href="ViewOwnerBill.php?user='.$val['ocbl_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>
																</td>
															</tr>';
														}	
													?> -->
													<tr>
														<td>1 </td>
														<td>2020-07-22</td>
														<td>500</td>
														<td>Bill Type</td>
														<td>2019</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</table>
											</div>	
										</div>
									</div>
								</div>

							<div class="modal-footer">
								<!-- <button type="Submit" class="btn btn-primary pull-right">Edit</button> -->
								<button type="Submit" class="btn btn-danger pull-right">Inactive</button>
								<a href="DriverEdit.php?user=<?php echo $_GET['user'];?>" target="_blank" class="btn btn-primary"> Edit <i class="fa fa-plus-edit"></i></a>
							</div>

						</div>

					</form>	

				</div>

			</div>

		</div>
	
	</div>

</div>



