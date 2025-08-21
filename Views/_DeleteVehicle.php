



<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="DeleteVehicleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="deleteVehicle" id="deleteVehicle" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
			<!-- 	<input type="hidden" name="DocType" id="DocType" value="EditOWN"> -->
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Record</h4>
				</div>

				<div class="modal-body">
					<input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>

					<div id="errorMessageDelete">
                    </div>
                    <div class="form-group" id = "ConfirmMSG">
                        <label> Do you really want to delete this record? </label>
                    </div>

				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="Submit" class="btn btn-danger">OK</button>
			<!-- 		<button type="Submit" class="btn btn-primary" onclick="AddOwner()">Add Record</button> -->
				</div>
			
			</div>
		</form>
	</div>
</div>


