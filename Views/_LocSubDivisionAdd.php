 



<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="LocSubDivisionAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="addSubDivision" id="addSubDivision" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
			 	<input type="hidden" name="DocType" id="DocType" value="SDIV">
	<!-- 			<input type="hidden" name="ActionType" id="ActionType" value="Insert"> -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Add New Municipality</h4>
				</div>

				<div class="modal-body">
				
			 		<div id="errorMessage"></div>
                    <div class="form-group">
                        <label for="Division">উপজেলার নাম <span class="required">*</span></label>
                        <select class="form-control" name="Division" id="Division" class="form-control" required="required">
                            <option value="">---- উপজেলা ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label  for="SubDivision">পৌরসভার নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="SubDivision" id="SubDivision" required="required">
                    </div>



                </div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="Submit" class="btn btn-primary">OK</button>
			<!-- 		<button type="Submit" class="btn btn-primary" onclick="AddVehicle()">Add Record</button> -->
				</div>
			
			</div>
		</form>
	</div>
</div>


