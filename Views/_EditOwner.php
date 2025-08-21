<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="EditOwnerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="editOwner" id="editOwner" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
			<!-- 	<input type="hidden" name="DocType" id="DocType" value="EditOWN"> -->
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Owner</h4>
				</div>

				<div class="modal-body">
					<div id="errorMessageEdit"></div>
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
						<input class="form-control" type="text" name="DOB" id="DOB" required="required">
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


					
		
		<!-- 			<div class="form-group">
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
						<label for="Address">স্থায়ী ঠিকানা <span class="required">* <input type="checkbox" name="chkAddress" id="chkAddressEdit" onclick="CheckAddressEdit()"> একই</span></label>
						<textarea class="form-control" type="text" name="PermanentAddressEdit" id="PermanentAddressEdit" required="required"></textarea>
					</div>				
							
				
					<div class="form-group" align="center">
						<label class="btn btn-warning" onclick="AddressChange()">Change Address</label>
					</div>

					<div class="form-group">
						<label  for="file">আপলোড  ছবি <span class="required">*</span></label>
						<input class="form-control"  type="file" name="EditFile" id="EditFile" accept="image/x-png,image/gif,image/jpg,image/jpeg" class="form-control col-md-7 col-xs-12" >(MAX: 50KB)
					</div>
				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="Submit" class="btn btn-primary">OK</button>
			<!-- 		<button type="Submit" class="btn btn-primary" onclick="AddOwner()">Add Record</button> -->
				</div>
			
			</div>
		</form>
	</div>
</div>


