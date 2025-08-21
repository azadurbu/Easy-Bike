<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="AddOwnerTransferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="addOwnerTransfer" id="addOwnerTransfer" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
				<input type="hidden" name="DocType" id="DocType" value="OWNT">
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Add New Record</h4>
				</div>

				<div class="modal-body">
					
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


				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="Submit" class="btn btn-primary">Add Record</button>
			<!-- 		<button type="Submit" class="btn btn-primary" onclick="AddOwner()">Add Record</button> -->
				</div>
			
			</div>
		</form>
	</div>
</div>


