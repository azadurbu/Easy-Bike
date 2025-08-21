<?php 

require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerList = $aOwner->GetAllOwner();

global $msg;

?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3> মালিকানা পরিবর্তন করার ফর্ম  </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">

						<div class="clearfix"></div>

						<form  method="post" name="addOwnerTransfer" id="addOwnerTransfer" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
				
							<input type="hidden" name="DocType" id="DocType" value="OWNT">
							<input type="hidden" name="ActionType" id="ActionType" value="Insert">

							
							<div id="errorMessage"></div>
							<div class="form-group">
								<input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
							</div>
				
							<div class="form-group">
								<label for="otRegNo">রেজিস্ট্রেশন নং<span class="required">*</span></label>
								<br>
								<select class="selectpicker" data-live-search="true" name="otRegNo" id="otRegNo" required="required">
									<option value="">---- রেজিস্ট্রেশন নং ----</option>
								</select>
							</div>

							<div class="form-group">
								<label for="CurrentOwner"> বর্তমান মালিক <span class="required">*</span></label>
								<select class="form-control" name="CurrentOwner" id="CurrentOwner" class="form-control" required="required" readonly="readonly">
									<option value="">---- বর্তমান মালিক ----</option>
								</select>
							</div>

							<div class="form-group">
								<label for="Owner"> নতুন মালিক <span class="required">*</span></label><br>
								<select name="Owner" id="Owner" class="form-control" required="required">
									<option value="">---- নতুন মালিক ----</option>
								</select>
							</div>


							<div class="form-group">
								<label  for="OwnerTrnsFee">মালিকানা পরিবর্তনের ফি <span class="required">*</span></label>
								<input class="form-control" type="text" name="OwnerTrnsFee" id="OwnerTrnsFee" required="required" readonly="readonly">
							</div>



							<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
							<button type="Submit" class="btn btn-primary pull-right">Add Record</button>
							<!-- 		<button type="Submit" class="btn btn-primary" onclick="AddOwner()">Add Record</button> -->

						</form>

					</div>
			
				</div>

	    	</div>

    	</div>

	</div>	


