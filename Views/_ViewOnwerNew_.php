<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
global $msg;

?>



	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>View Record</h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
								<h4> রেকর্ড দেখুন </h4>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>
				
						<div class="x_content">
								
						<form  method="post" name="viewOwner" id="viewOwner" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			
		
			       <!-- 	<input type="hidden" name="DocType" id="DocType" value="EditOWN"> -->
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">


				<div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <div class="form-group">
                                <label  for="OwnerName">নাম <span class="required">*</span></label>
                                <input class="form-control" type="text" name="OwnerName" id="OwnerName" required="required" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="FathersName">পিতা/স্বামীর নাম <span class="required">*</span></label>
                                <input class="form-control" type="text" name="FathersName" id="FathersName" required="required" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <div id="photo">  </div>
                        </div><!--/col-->
                    </div><!--/row-->

					<div class="form-group">
						<label for="MothersName">মাতার নাম <span class="required">*</span></label>
						<input class="form-control" type="text" name="MothersName" id="MothersName" required="required" readonly="readonly">
					</div>

                    <div class="form-group">
                        <label for="OwnerBGroup">রক্তের গ্রূপ <span class="required">*</span></label>
                        <input class="form-control" type="text" name="OwnerBGroup" id="OwnerBGroup" required="required" readonly="readonly">
                    </div>
					<div class="form-group">
						<label for="DOB">জন্ম তারিখ <span class="required">*</span></label>
						<input class="form-control" type="text" name="DOB" id="DOB" required="required" readonly="readonly" disabled>
					</div>
					<div class="form-group">
						<label for="NID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
						<input class="form-control" type="text" name="NID" id="NID" required="required" required="required" readonly="readonly">
					</div>
					<div class="form-group">
						<label for="HoldingNo">হোল্ডিং নম্বর <span class="required">*</span></label>
						<input class="form-control" type="text" name="HoldingNo" id="HoldingNo" required="required" required="required" readonly="readonly">
					</div>
					<div class="form-group">
						<label for="Mobile">মোবাইল নং <span class="required">*</span></label>
						<input class="form-control" type="text" name="Mobile" id="Mobile" required="required" required="required" readonly="readonly">
					</div>
			
					<div class="form-group">
						<label for="Address">বর্তমান ঠিকানা <span class="required">*</span></label>
						<textarea class="form-control" type="text" name="PresentAddress" id="PresentAddress" required="required" required="required" readonly="readonly"></textarea>
	                    <!-- 					<select class="form-control" name="cDivision" id="cDivision" class="form-control" required="required">
							<option value="">---- জেলা ----</option>
						</select> -->
					</div>

					<div class="form-group">
						<label for="Address">স্থায়ী ঠিকানা <span class="required">*</span></label>
						<textarea class="form-control" type="text" name="PermanentAddress" id="PermanentAddress" required="required" required="required" readonly="readonly"></textarea>
                          <!-- 						<select class="form-control" name="pDivision" id="pDivision" class="form-control" required="required">
							<option value="">---- জেলা ----</option>
						</select> -->
					</div>

				
		
			
					<!-- <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button> -->
		         <!-- 			<button type="Submit" class="btn btn-primary">Edit Record</button> -->
			      <!-- 		<button type="Submit" class="btn btn-primary" onclick="AddOwner()">Add Record</button> -->
				
			
				</div>
		
			
			</div>
			
		</div>
		
	</div>
