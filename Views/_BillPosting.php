<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="BillPostingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="postBill" id="postBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Post Bill</h4>
				</div>

				<div class="modal-body">

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

				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="Submit" class="btn btn-primary" >Post</button>
				</div>
			
			</div>
		</form>
	</div>
</div>


