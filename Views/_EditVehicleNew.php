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
	input[type=text] {
		width: 100%;
		padding: 5px 5px;
		margin: 2px 0;
		box-sizing: border-box;		
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
	textarea {
    width: 100%;
}
</style>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3> গাড়ির এডিট ফর্ম  </h3>

			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">

					<div class="clearfix"></div>
			
					<div class="x_content">
							
					
					<form  method="post" name="editVehicle" id="editVehicle" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

						<input type="hidden" name="ActionType" id="ActionType" value="Insert">

						<div id="errorMessageEdit"></div>

						<input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>

						<div class="container">
							<div class="row">
								<div class="col-sm-10">
									<table class="info-tab-cust">
										<tr>
											<td>রেজিস্ট্রেশন নং<span> *</span></td>
											<td><input class="form-group" type="text" id="RegNo"  name="RegNo" readonly></td>
										</tr> 
										<tr>
											<td>রেজিস্ট্রেশনের তারিখ<span> *</span></td>
											<!-- <td><input class="form-group" type="text" id="RegDate"> </td> -->
											<td><input class="form-group"  type="date" id="RegDate" name="RegDate" autocomplete="off"></td>
										</tr> 
										<tr>
											<td>গাড়ীর মডেল<span> *</span></td>
											<td>
												<select class="form-group" id="Model" name="Model" required>
													<option value="">Select Model</option>
													<option value="easybike">Easy Bike</option>
													<option value="tomtom">Tom Tom</option>
												</select>
											</td>
										</tr> 
										<tr>
											<td>গাড়ীর রঙ<span> *</span></td>
											<!-- <td><input class="form-group" type="text" id="Color"></td> -->
											<td>
												<select class="form-group" id="Color" name="Color">
												    <option value="">Select Color</option>
													<option value="blue">Blue</option>
													<option value="green">Green</option>
													<option value="red">Red</option>
													<option value="yellow">Yellow</option>
												</select>
											</td>
										</tr> 
										<tr>
											<td>গাড়ির ইঞ্জিন নং/চেচিস নং<span> *</span></td>
											<td><input class="form-group" type="number" id="ChassisNo" name="ChassisNo"></td>
										</tr>
										<tr>
											<td>মালিকের নাম<span> *</span></td>
											<td> 
												<select class="form-control select2" searchable="Search here.." id="Owner" name="Owner" required="required">
													<option value="">---- গাড়ির মালিক ----</option>
												</select>
											</td>
										</tr>
									</table>
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="cont">
											<div><h4><b>ইজিবাইক ক্রয়ের ডিলারের নাম/ শো -রুমের নাম ও ঠিকানা<span> *</span></b></h4></div>
											<h4><textarea class="form-group" rows="5" id="Detail" name="Detail"></textarea></h4>
										</div>
									</div>
								</div>	                          
							</div>

							<div class="modal-footer">
								<button type="Submit" class="btn btn-primary pull-right">Save</button>
							</div>
						</div>
					</form>	
				</div>

			</div>	
	
		</div>  

	</div>	

</div>	
