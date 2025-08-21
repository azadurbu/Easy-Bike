<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();

global $msg;
$Add = $ChildModuleAccessList[0]->Add;

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
	.owner-pic-info{
		padding-left:20px;
		font-size:15px;
		color:black;
	}
	/* #photo img {
		height:250px !important;
		width:250px !important;
	} */
</style>

<script>
var loadFile = function(event) {
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
	URL.revokeObjectURL(output.src) // free memory
}
};
function imageOutput(){
	document.getElementById("file").click();
}
</script>

<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3> ইজিবাইক মালিকের এডিট ফর্ম </h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">

					<div class="clearfix"></div>
			
					<form  method="post" name="editOwner" id="editOwner" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
							
			
						<input type="hidden" name="DocType" id="DocType" value="EditOWN"> 
						<input type="hidden" name="ActionType" id="ActionType" value="Insert">
						<div id="errorMessageEdit"></div>
						<input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>


						<div class="container">
							<div class="row">
								<!-- <div class="col-sm-4">
									<div class="owner-pic-info">
										<div id="photo"> </div>
									</div>
								</div> -->
								<div class="col-sm-4">
								    <div class="owner-pic-info">
                                        <div class="myQRFrame">
                                            <input id="file" name="file" type="file" accept="image/*" onchange="loadFile(event)"  style="display:none">
                                            <div id="image"><img id="output" src="images/white.png" height="350" width="350" onclick="imageOutput()"/></div>
                                        </div>    
                                    </div>
                                </div>
								<div class="col-sm-8">
									<table class="info-tab-cust">
										<tr>
											<td>মালিকের নাম	 <span> *</span></td>
											<td><input class="form-group" type="text" id="OwnerName" name="OwnerName"></td>
										</tr> 
										<tr>
											<td>Owner Name (English)</td>
											<td><input class="form-group" type="text" id="OwnerNameEng" name="OwnerNameEng" ></td>
										</tr> 
										<tr>
											<td>মোবাইল নং<span> *</span></td>
											<td><input class="form-group" type="number" id="Mobile" name="Mobile" ></td>
										</tr> 
										<tr>
											<td>পিতা/স্বামীর নাম<span> *</span></td>
											<td><input class="form-group" type="text" id="FatherName" name="FatherName" ></td>
										</tr> 
										<tr>
											<td>মাতার নাম<span> *</span></td>
											<td><input class="form-group" type="text" id="MotherName" name="MotherName" ></td>
										</tr>	
										<tr> 
											<td>জন্ম তারিখ<span> *</span></td>
											<td><input class="form-group"  type="text" id="DOB" autocomplete="off" name="DOB"></td>
										</tr>
										<tr> 
											<td>এনআইডি নম্বর<span> *</span></td>
											<td><input class="form-group" type="number" id="NID" name="NID"></td>
										</tr>
										<tr> 
											<td>রক্তের গ্রূপ</td>
											<td>
												<select class="form-group" id="OwnerBGroup" >
													<option value="">Select Blood Group</option>
													<option value="A+">A+</option>
													<option value="A-">A-</option>
													<option value="B+">B+</option>
													<option value="B-">B-</option>
													<option value="AB+">AB+</option>
													<option value="AB-">AB-</option>
													<option value="O+">O+</option>
													<option value="O-">O-</option>
												</select>
											</td>										
										</tr> 
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="card">
										<div class="cont">
											<div><h4><b>বর্তমান ঠিকানা</b></h4></div>
											<table class="info-tab-cust">
												<tr>
													<td>উপজেলা<span> *</span></td>
													<td>
														<div class="form-group">
															<label for="Address"><span class="required"></span></label>
															<select class="form-control" name="cDivision" id="cDivision" class="form-control" required="required">
																<option value="">---- উপজেলা ----</option>
															</select>
														</div>
													</td>
												</tr> 
												<tr>
													<td>পৌরসভা / ইউনিয়ন<span> *</span></td>
													<td>
														<div class="form-group">
															<label for="cSubDivision"><span class=""></span></label>
															<select class="form-control" name="cSubDivision" id="cSubDivision" >
																<option value="">---- পৌরসভা ----</option>
															</select>
														</div>
													</td>
												</tr> 
												<tr>
													<td>ওয়ার্ড<span> *</span></td>
													<td>
														<div class="form-group">
															<label for=""><span class=""></span></label>
															<select class="form-control" name="cWardNo" id="cWardNo" >
																<option value="">---- ওয়ার্ড নং ----</option>
															</select>
														</div>
													</td>
												</tr> 
												<tr>
													<td>এলাকা/মহল্লা/গ্রাম<span> *</span></td>
													<td>
														<div class="form-group">
															<label  for=""><span class=""></span></label>
															<select class="form-control" name="cArea" id="cArea" >
																<option value="">---- গ্রাম/মহল্লা ----</option>
															</select>
														</div>	
													</td>
												</tr> 
												<tr>
													<td>হোল্ডিং নং</td>
													<td>
														<div class="form-group">
															<label for="cHoldingNo"><span class="required"></span></label>
															<input class="form-control" type="text" name="cHoldingNo" id="cHoldingNo">
														</div>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>	

								<div class="col-sm-6">
									<div class="card">
										<div class="cont">
											<div><h4><b>স্থায়ী ঠিকানা	&nbsp;	&nbsp;</b><label for="PermanentAddress"><span class="required"><input type="checkbox" name="chkAddress" id="chkAddress" onclick="CheckAddress()"> </span><span>একই</span> </label>
											</h4>
											</div>
											<div id="same_as_present" style="display: none;">
												<table class="info-tab-cust">
													<tr>
														<td>উপজেলা<span> </span></td>
														<td>
															<div class="form-group">
																<label for=""><span class="required"></span></label>
																<input class="form-control" name="pDivision" id="pDivision" disabled>
															</div>
														</td>
													</tr>
													<tr>
														<td>পৌরসভা / ইউনিয়ন<span> </span></td>
														<td>
															<div class="form-group">
																<label for=""><span class="required"></span></label>
																<input class="form-control" name="pSubDivision" id="pSubDivision" disabled>
																</select>
															</div>
														</td>
													</tr> 
													<tr>
														<td>ওয়ার্ড<span> *</span></td>
														<td>
															<div class="form-group">
																<label for=""><span class="required"></span></label>
																<input class="form-control" name="pWardNo" id="pWardNo" disabled>
															</div>
														</td>
													</tr> 
													<tr>
														<td>এলাকা/মহল্লা/গ্রাম<span> *</span></td>
														<td>
															<div class="form-group">
																<label for=""><span class="required"></span></label>
																<input class="form-control" name="pArea" id="pArea" disabled>
															</div>
														</td>
													</tr> 
													<tr>
														<td>হোল্ডিং নং</td>
														<td>
															<div class="form-group">
																<label for=""><span class="required"></span></label>
																<input class="form-control" type="text" name="pHoldingNo" id="pHoldingNo" disabled>
															</div>
														</td>
													</tr> 
												</table>
											</div>	
										</div>
											<div id="different_present_address">
												<div class="">
													<textarea class="form-group" id="Parmanent_address" name="Parmanent_address" style="width:98%;"  rows="16"></textarea>
												</div>
											</div>
										</div>	
									</div>	
								</div>
							</div>
							<div class="modal-footer">								
								<button type="Submit" class="btn btn-primary pull-right">Save</button>
								<a onclick="document.getElementById('addOwner').reset();" class="btn btn-danger pull-right">Cancel</a>
							</div>
						</div>		
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

