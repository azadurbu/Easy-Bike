<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="GenerateTokenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="addToken" id="addToken" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
				<!--<input type="hidden" name="DocType" id="DocType" value="VCL">-->
				<input type="hidden" name="ActionType" id="ActionType" value="TokenInsert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Generate Token</h4>
				</div>

				<div class="modal-body">
					
					<div id="error"></div>
					<div class="form-group">
						<label for="Code">Code <span class="required">*</span></label>
						<input class="form-control" type="text" name="Code" id="Code" value="<?php echo $Code; ?>" required="required"  readonly>
						<label for="NewToken">Token <span class="required">*</span></label>
						<input class="form-control" type="text" name="NewToken" id="NewToken" value="<?php echo $NewToken; ?>" required="required"  readonly>
					</div>

				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
					<!-- <button type="Submit" class="btn btn-primary">Save</button> -->
					<button onclick="AddToken()" type="button" class="btn btn-primary"> Save </button>
					<!-- <button type="Submit" class="btn btn-primary" onclick="AddVehicle()">Add Record</button> -->
				</div>
			
			</div>
		</form>
	</div>
</div>


