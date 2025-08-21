 



<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="ViewOwnerTransferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="ViewOwnerTransferModal" id="ViewOwnerTransferModal" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">

                <input type="hidden" name="DocType" id="DocType" value="OWNT">
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">View Record</h4>
				</div>

				<div class="modal-body">

                    <div id="status"></div>
					<div class="form-group">
						<label for="RegNo"> রেজিস্ট্রেশন নং <span class="required">*</span></label>
						<input class="form-control" type="text" name="RegNo" id="RegNo" required="required" required="required" readonly="readonly">
					</div>

					<div class="form-group">
						<label for="TransferDate"> মালিকানা পরিবর্তনের তারিখ <span class="required">*</span></label>
						<input class="form-control" type="text" name="TransferDate" id="TransferDate" required="required" required="required" readonly="readonly">
					</div>

                	<div class="alert alert-success alert-dismissible fade in" role="alert" align="center">
                    		<strong>বর্তমান মালিক</strong>
                    </div>

                    <div class="row">
				
                        <div class="col-xs-12 col-sm-8">

                            <div class="form-group">
                                <label  for="curOwnerName">নাম <span class="required">*</span></label>
                                <input class="form-control" type="text" name="curOwnerName" id="curOwnerName" required="required" readonly="readonly">
                            </div>
                      
							<div class="form-group">
								<label for="curNID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
								<input class="form-control" type="text" name="curNID" id="curNID" required="required" required="required" readonly="readonly">
							</div>

                        </div>

                        <div class="col-xs-12 col-sm-4 text-center">
                            <div id="curPhoto">  </div>
                        </div><!--/col-->
                    </div><!--/row-->


                    <div class="form-group">
                        <label for="curOwnerBGroup">রক্তের গ্রূপ <span class="required">*</span></label>
                        <input class="form-control" type="text" name="curOwnerBGroup" id="curOwnerBGroup" required="required" readonly="readonly">
                    </div>

					<div class="form-group">
						<label for="curHoldingNo">হোল্ডিং নম্বর <span class="required">*</span></label>
						<input class="form-control" type="text" name="curHoldingNo" id="curHoldingNo" required="required" required="required" readonly="readonly">
					</div>

					<div class="form-group">
						<label for="curMobile">মোবাইল নং <span class="required">*</span></label>
						<input class="form-control" type="text" name="curMobile" id="curMobile" required="required" required="required" readonly="readonly">
					</div>
			
					<div class="form-group">
						<label for="curAddress">বর্তমান ঠিকানা <span class="required">*</span></label>
						<textarea class="form-control" type="text" name="curAddress" id="curAddress" required="required" required="required" readonly="readonly"></textarea>
					</div>
					
					<div class="alert alert-warning alert-dismissible fade in" role="alert" align="center">
                        <strong>পূর্বের মালিক</strong>
                    </div>

					<div class="row">
                    	
                        <div class="col-xs-12 col-sm-8">

                            <div class="form-group">
                                <label  for="prvOwnerName">নাম <span class="required">*</span></label>
                                <input class="form-control" type="text" name="prvOwnerName" id="prvOwnerName" required="required" readonly="readonly">
                            </div>
                      
							<div class="form-group">
								<label for="prvNID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
								<input class="form-control" type="text" name="prvNID" id="prvNID" required="required" required="required" readonly="readonly">
							</div>

                        </div>

                        <div class="col-xs-12 col-sm-4 text-center">
                            <div id="prvPhoto">  </div>
                        </div><!--/col-->

                    </div><!--/row-->


                    <div class="form-group">
                        <label for="prvOwnerBGroup">রক্তের গ্রূপ <span class="required">*</span></label>
                        <input class="form-control" type="text" name="prvOwnerBGroup" id="prvOwnerBGroup" required="required" readonly="readonly">
                    </div>

					<div class="form-group">
						<label for="prvHoldingNo">হোল্ডিং নম্বর <span class="required">*</span></label>
						<input class="form-control" type="text" name="prvHoldingNo" id="prvHoldingNo" required="required" required="required" readonly="readonly">
					</div>

					<div class="form-group">
						<label for="prvMobile">মোবাইল নং <span class="required">*</span></label>
						<input class="form-control" type="text" name="prvMobile" id="prvMobile" required="required" required="required" readonly="readonly">
					</div>
			
					<div class="form-group">
						<label for="prvAddress">বর্তমান ঠিকানা <span class="required">*</span></label>
						<textarea class="form-control" type="text" name="prvAddress" id="prvAddress" required="required" required="required" readonly="readonly"></textarea>
					</div>

				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			
			</div>
		</form>
	</div>
</div>


