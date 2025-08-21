
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
					<h3> বিল পোস্ট </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
								<h4> বিল পোস্ট ফর্ম  </h4>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>
				
						<div class="x_content">

						<form  method="post" name="postBill" id="postBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">		
								<div id="errorMessage"></div>
					
								<input type="hidden" name="DocType" id="DocType" value="PBL">
								<input type="hidden" name="ActionType" id="ActionType" value="View">
								<div class="form-group">
								<label for="Code">কোড <span class="required">*</span></label>
								<input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
							</div>

							<div class="form-group">
								<label for="RegNo">রেজিস্ট্রেশান নং<span class="required">*</span></label>
								<input class="form-control" type="text" name="RegNo" id="RegNo" required="required" value="" readonly="readonly">
							</div>

							<div class="form-group">
								<label for="Bank">ব্যাংক <span class="required">*</span></label>
								<select class="form-control" name="Bank" id="Bank" class="form-control" required="required">
									<option value="">---- ব্যাংক ----</option>
								</select>
							</div>

							<div class="form-group">
								<label for="Account">একাউন্ট নাম্বার <span class="required">*</span></label>
								<select class="form-control" name="Account" id="Account" class="form-control" required="required">
									<option value="">---- একাউন্ট নাম্বার ----</option>
								</select>
							</div>
					
							<div class="form-group">
								<label for="PaymentDate">বিল পরিশোধের তারিখ <span class="required">*</span></label>
								<input class="form-control" type="date" name="PaymentDate" id="PaymentDate" required="required">
							</div>

						
				
					
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="Submit" class="btn btn-primary" >Post</button>
						
						</form>

				    </div>
			
			    </div>

	        </div>

		</div>
		
	</div>	


