<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerList = $aOwner->GetAllOwner();

global $msg;
$Add = $ChildModuleAccessList[0]->Add;


?>


<!-- page content -->

 

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3> নতুন মালিক যুক্ত </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
								<h4>নতুন মালিক যুক্তের ফর্ম </h4>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>
				
						<div class="x_content">
								
				    <form  method="post" name="addOwner" id="addOwner" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
							
				
						<input type="hidden" name="DocType" id="DocType" value="OWN">
						<input type="hidden" name="ActionType" id="ActionType" value="Insert">					
						<div id="errorMessage"></div>
				
						<!--<div class="form-group">-->
						<!--	<label for="Code">কোড <span class="required">*</span></label>-->
							<input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>
						<!--</div>-->
				
						<div class="form-group">
							<label  for="OwnerName">নাম <span class="required">*</span></label>
							<input class="form-control" type="text" name="OwnerName" id="OwnerName" required="required">
						</div>
				
						<div class="form-group">
							<label for="FathersName">পিতা/স্বামীর নাম <span class="required">*</span></label>
							<input class="form-control" type="text" name="FathersName" id="FathersName" required="required" >
						</div>

						<div class="form-group">
							<label for="MothersName">মাতার নাম <span class="required">*</span></label>
							<input class="form-control" type="text" name="MothersName" id="MothersName" required="required">
						</div>


						<div class="form-group">
							<label for="OwnerBGroup">রক্তের গ্রূপ <span class="required">*</span></label>
							<input class="form-control" type="text" name="OwnerBGroup" id="OwnerBGroup" required="required">
						</div>

						<div class="form-group">
							<label for="DOB">জন্ম তারিখ <span class="required">*</span></label>
				
							<input class="form-control" name="DOB" id="DOB" type="text" required="required">
						</div>
						
						
						<div class="form-group">
							<label for="NID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
							<input class="form-control" type="text" name="NID" id="NID" required="required" required="required">
						</div>
						<div class="form-group">
							<label for="HoldingNo">হোল্ডিং নম্বর <span class="required">*</span></label>
							<input class="form-control" type="text" name="HoldingNo" id="HoldingNo" required="required" required="required">
						</div>
						<div class="form-group">
							<label for="Mobile">মোবাইল নং <span class="required">*</span></label>
							<input class="form-control" type="text" name="Mobile" id="Mobile" required="required" required="required">
						</div>
						<!-- 					<div class="form-group">
							<label for="Address">স্থায়ী ঠিকানা <span class="required">*</span></label>
							<select class="form-control" name="pDivision" id="pDivision" class="form-control" required="required">	
								<option value="">---- জেলা ----</option>
							</select>
						</div>				
					
						<div class="form-group">
							<label for="pSubDivision"><span class="required"></span></label>
							<select class="form-control" name="pSubDivision" id="pSubDivision" class="form-control" required="required">
								<option value="">---- পৌরসভা ----</option>
							</select>
						</div>
							
						<div class="form-group">
							<label for="pWardNo"><span class="required"></span></label>
							<select class="form-control" name="pWardNo" id="pWardNo" class="form-control" required="required">
								<option value="">---- ওয়ার্ড নং ----</option>
							</select>
						</div>
				
						<div class="form-group">
							<label for="pArea"><span class="required"></span></label>
							<select class="form-control" name="pArea" id="pArea" class="form-control" required="required">
								<option value="">---- গ্রাম/মহল্লা ----</option>
							</select>
						</div> -->

						<div class="form-group">
							<label for="Address">বর্তমান ঠিকানা <span class="required">*</span></label>
							<select class="form-control" name="cDivision" id="cDivision" class="form-control" required="required">
								<option value="">---- জেলা ----</option>
							</select>
						</div>

						<div class="form-group">
							<label for="cSubDivision"><span class="required"></span></label>
							<select class="form-control" name="cSubDivision" id="cSubDivision" class="form-control" required="required">
								<option value="">---- পৌরসভা ----</option>
							</select>
						</div>
							
						<div class="form-group">
							<label for=""><span class="required"></span></label>
							<select class="form-control" class="form-control" name="cWardNo" id="cWardNo" class="form-control" required="required">
								<option value="">---- ওয়ার্ড নং ----</option>
							</select>
						</div>

						<div class="form-group">
							<label  for=""><span class="required"></span></label>
							<select class="form-control" name="cArea" id="cArea" class="form-control" required="required">
								<option value="">---- গ্রাম/মহল্লা ----</option>
							</select>
						</div>	

						<div class="form-group">
							<label for="Address">স্থায়ী ঠিকানা <span class="required">* <input type="checkbox" name="chkAddress" id="chkAddress" onclick="CheckAddress()"> একই</span></label>
							<textarea class="form-control" type="text" name="PermanentAddress" id="PermanentAddress" required="required"></textarea>
						</div>				
								
						<div class="form-group">
							<label  for="file">আপলোড  ছবি <span class="required">*</span></label>
							<input class="form-control"  type="file" name="file" id="file" required="required" accept="image/x-png,image/gif,image/jpg,image/jpeg" class="form-control col-md-7 col-xs-12">(MAX: 50KB)
						</div>
						<button type="Submit" class="btn btn-primary pull-right">OK</button>
				    </form>
					
	    	    </div>
		    </div>
	    </div>
	</div>	
<!-- /page content -->

