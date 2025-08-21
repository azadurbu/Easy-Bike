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
					<h3> রেকর্ড  দেখুন  </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
								<h4> রেকর্ড দেখার ফর্ম  </h4>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>
				
						<div class="x_content">

							<form  method="post" name="detailBill" id="detailBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">	

								<div id="errorMessage"></div>
										
								<input type="hidden" name="DocType" id="DocType" value="DBL">
								<input type="hidden" name="ActionType" id="ActionType" value="View">

							
								<div id="status"></div>

								<div class="form-group">
									<label for="Code">কোড <span class="required">*</span></label>
									<input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
								</div>
						
								<div class="form-group">
									<label  for="FiscalYear">অর্থ বছর <span class="required">*</span></label>
									<input class="form-control" type="text" name="FiscalYear" id="FiscalYear" required="required" value="2018-2019" readonly="readonly">
								</div>

								<div class="form-group">
									<label for="RegNo">রেজিস্ট্রেশন নং<span class="required">*</span></label>
									<input class="form-control" type="text" name="RegNo" id="RegNo" required="required" value="" readonly="readonly">
								</div>
						
								<div class="form-group">
									<label for="RegDate">রেজিস্ট্রেশনের তারিখ <span class="required">*</span></label>
									<input class="form-control" type="text" name="RegDate" id="RegDate" required="required" readonly="readonly">
								</div>

								<div class="form-group">
									<label for="ExpiredDate">মেয়াদ উত্তীর্ণের তারিখ <span class="required">*</span></label>
									<input class="form-control" type="text" name="ExpiredDate" id="ExpiredDate" required="required" readonly="readonly">
								</div>
								<div class="form-group">
									<label for="RegFee">রেজিস্ট্রেশন ফি<span class="required">*</span></label>
									<input class="form-control" type="text"   name="RegFee" id="RegFee" required="required" readonly="readonly">
								</div>
					
								<div class="form-group">
									<label for="Arrear">এরিয়ার<span class="required">*</span></label>
									<input class="form-control" type="text"   name="Arrear" id="Arrear" required="required" readonly="readonly">
								</div>

									<div class="form-group">
									<label for="SurCharge">সারচার্জ<span class="required">*</span></label>
									<input class="form-control" type="text"   name="SurCharge" id="SurCharge" required="required" readonly="readonly">
								</div>

								<div class="form-group">
									<label for="Total">সর্বমোট<span class="required">*</span></label>
									<input class="form-control" type="text"   name="Total" id="Total" required="required" readonly="readonly">
								</div>

								<div class="form-group">
									<label for="Due">পরিশোধযোগ্য<span class="required">*</span></label>
									<input class="form-control" type="text"   name="Due" id="Due" required="required" readonly="readonly">
								</div>

								<div class="form-group">
									<label for="Fine">জরিমানা<span></span></label>
									<input class="form-control" type="text"   name="Fine" id="Fine">
								</div>
					
							
								<button type="Submit" class="btn btn-default pull-right" >Udpate Fine</button>
								<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
							</form>	

				        </div>
			
			        </div>
	
	            </div>

            </div>

        </div>

	</div>	


