<?php
	
?>       


<!-- page content -->
        <div class="right_col" role="main">
			<div class="">
		  
            <div class="page-title">
				<div class="title_left">
					<h3>Area - এলাকা/মহল্লা</h3>
				</div>
            </div>
            
			<div class="clearfix"></div>
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
						<h2>নতুন এলাকা/মহল্লা যোগ করুন</h2> 
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
                    <br />
                    <form action=""  method="post" name="" id="" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
						
						<input type="hidden" name="ActionType" id="ActionType" required="required" class="form-control col-md-7 col-xs-12" value="Insert">

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Address">জেলার নাম<span class="required"> *</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="pArea" id="pArea" class="form-control" required="required">
									<option value="">Choose Option</option>
									<?php	
										// foreach ($SupplierList as $key => $row) 
										// {
										// 	echo "<option value=".$row['SupID'].">";
										// 	echo $row['Company'];
										// 	echo "</option>";
										// }
									?>
								</select>
							</div>
						</div>



						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Address">উপজেলার নাম<span class="required"> *</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="pArea" id="pArea" class="form-control" required="required">
									<option value="">Choose Option</option>
									<?php	
										// foreach ($SupplierList as $key => $row) 
										// {
										// 	echo "<option value=".$row['SupID'].">";
										// 	echo $row['Company'];
										// 	echo "</option>";
										// }
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Address">ওয়ার্ড নং <span class="required"> *</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="pArea" id="pArea" class="form-control" required="required">
									<option value="">Choose Option</option>
									<?php	
										// foreach ($SupplierList as $key => $row) 
										// {
										// 	echo "<option value=".$row['SupID'].">";
										// 	echo $row['Company'];
										// 	echo "</option>";
										// }
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Division">এলাকা/মহল্লার নাম <span class="required"> *</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="Division" id="Division" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						
						
						<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button class="btn btn-primary" type="reset">Reset</button>
								<button type="submit" name="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
                    </form>
					</div>
					</div>
				</div>
            </div>
			</div>
        </div>
<!-- /page content -->
