 



<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="AddIssueLicenseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="addIssueLicense" id="addIssueLicense" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
				<input type="hidden" name="DocType" id="DocType" value="ISU">
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Add New Record</h4>
				</div>

				<div class="modal-body">
					
									<div class="form-group">
						<label for=""></label>
						<div id="errorMessage"></div>
					</div>

					<div class="form-group">
						<label for="Code">কোড <span class="required">*</span></label>
						<input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
					</div>
			 
					<div class="form-group">
						<label  for="LicenseNo">লাইসেন্স নং <span class="required">*</span></label>
						<input class="form-control" type="text" name="LicenseNo" id="LicenseNo" required="required">
					</div>
			 
					<div class="form-group">
						<label for="">নবায়নের তারিখ <span class="required">*</span></label>
						<input class="form-control" type="date" name="IssueDate" id="IssueDate" required="required" >
					</div>

					<div class="form-group">
						<label for="StartYear">অর্থ বছর <span class="required">*</span></label>
						<select class="form-control" name="StartYear" id="StartYear" class="form-control" required="required">	
							<option value="">--- বছর ---</option>
							<option value="1">2010</option>
							<option value="2">2011</option>
							<option value="3">2012</option>
							<option value="4">2013</option>
							<option value="5">2014</option>
							<option value="6">2015</option>
							<option value="7">2016</option>
							<option value="8">2017</option>
							<option value="9">2018</option>
							<option value="10">2019</option>
							<option value="11">2020</option>
							<option value="12">2021</option>
							<option value="13">2022</option>
							<option value="14">2023</option>
							<option value="15">2024</option>
							<option value="16">2025</option>
							<option value="17">2026</option>
							<option value="18">2027</option>
							<option value="19">2028</option>
							<option value="20">2029</option>
							<option value="21">2030</option>
							<option value="22">2031</option>
							<option value="23">2032</option>
							<option value="24">2033</option>
							<option value="25">2034</option>
							<option value="26">2035</option>
							<option value="27">2036</option>
							<option value="28">2037</option>
							<option value="29">2038</option>
							<option value="30">2039</option>
							<option value="31">2040</option>
						</select>
						<input class="form-control" type="text" name="EndYear" id="EndYear" value="" required="required" readonly>
					</div>

					<div class="form-group">
						<label for="Owner">গাড়ীর মালিক <span class="required">*</span></label>
						<select class="form-control" name="Owner" id="Owner" class="form-control" required="required">	
							<option value="">---- গাড়ীর মালিক ----</option>
						</select>
					</div>

					<div class="form-group">
						<label for="Vehicle">গাড়ী <span class="required">*</span></label>
						<select class="form-control" name="Vehicle" id="Vehicle" class="form-control" required="required">	
							<option value="">---- গাড়ী ----</option>
						</select>
					</div>


					<div class="form-group">
						<label for="Driver">চালক <span class="required">*</span></label>
						<select class="form-control" name="Driver" id="Driver" class="form-control" required="required">	
							<option value="">---- চালক ----</option>
						</select>
					</div>
				</div>
				

				<div id="demo"></div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="Submit" class="btn btn-primary">Add Record</button>
			<!-- 		<button type="Submit" class="btn btn-primary" onclick="AddIssueLicense()">Add Record</button> -->
				</div>
			
			</div>
		</form>
	</div>
</div>


