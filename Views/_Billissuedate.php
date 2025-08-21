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
					<h3> বিল ইস্যু তারিখ  </h3>

				</div>
	    	</div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<h4> </h4>
							<div class="clearfix"></div>
						</div>

						<form id="billIssueDate">
							<div class="container" style="font-size:17px; padding-top:30px">
								<div style="padding-left:170px">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">বর্তমান বিল ইস্যুর তারিখ<span class="required">*</span>
									</label>
								</div>

								<div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" id="nowIssueDate" required="required" class="form-control col-md-7 col-xs-12" readonly>
									</div>							
								</div>
							</div>

							<div class="container" style="font-size:17px; padding-top:30px">
								
								<div style="padding-left:170px">
									<label class="control-label col-md-2 col-sm-2 col-xs-12">বিল ইস্যুর তারিখ<span class="required">*</span>
									</label>
								</div>

								<div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="date" name="issueDate" id="issueDate" required="required" class="form-control col-md-7 col-xs-12" autocomplete="off">
									</div>							
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="padding-top:20px; padding-left:265px;">
								<button type="submit" name="submit" class="btn btn-success"> Submit </button>
							</div>
						</form>											
	    	    	</div>
		   	 	</div>
	   		</div>
		</div>
	</div>		
<!-- /page content -->

