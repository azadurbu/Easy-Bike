<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="SingleBillModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="addSingleBill" id="addSingleBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
				<input type="hidden" name="DocType" id="DocType" value="SBL">
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Add New Single Bill</h4>
				</div>

				<div class="modal-body">
					
					<div id="errorMessage"></div>
					<!--<div class="form-group">-->
					<!--	<label for="Code">কোড <span class="required">*</span></label>-->
						<input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>
					<!--</div>-->
			 
					<div class="form-group">
						<label  for="FiscalYear">অর্থ বছর <span class="required">*</span></label>
						<input class="form-control" type="text" name="FiscalYear" id="FiscalYear" required="required" value="" readonly="readonly">
					</div>
		
					<div class="form-group">
						<label for="RegNo">রেজিস্ট্রেশন নং<span class="required">*</span></label>
						<br>
						<select class="selectpicker" data-live-search="true" name="RegNo" id="RegNo" required="required">
							<option value="">---- রেজিস্ট্রেশন নং ----</option>
						</select>
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
						<input class="form-control" type="number"  min="0" value="0" step=".01" name="RegFee" id="RegFee" required="required" readonly="readonly">
					</div>
		
					<div class="form-group">
						<label for="Arrear">এরিয়ার<span class="required">*</span></label>
						<input class="form-control" type="number"  min="0" value="0" step=".01" name="Arrear" id="Arrear" required="required">
					</div>

						<div class="form-group">
						<label for="SurCharge">সারচার্জ<span class="required">*</span></label>
						<input class="form-control" type="number"  min="0" value="0" step=".01" name="SurCharge" id="SurCharge" required="required" readonly="readonly">
					</div>

					<div class="form-group">
						<label for="Total">সর্বমোট<span class="required">*</span></label>
						<input class="form-control" type="number"  min="0" value="0" step=".01" name="Total" id="Total" required="required" readonly="readonly">
					</div>

					<div class="form-group">
						<label for="Due">পরিশোধযোগ্য<span class="required">*</span></label>
						<input class="form-control" type="number"  min="0" value="0" step=".01" name="Due" id="Due" required="required" readonly="readonly">
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


