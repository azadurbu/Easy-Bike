<?php 
// 	include 'User/UserAction/aUser.php';

	$errors = array();
	
// 	$aUser = new ActionUser();
	$UserList = $aUser->GetAllUser();
	//$UserTypeList = $aUser->GetAllUserType();

	$AccessType = "";
	$UserID = "";
	$AccessParentList ="";

	if(isset($_REQUEST["AccessType"]))
	{
		$AccessType = $_REQUEST["AccessType"];

	}

	if(isset($_REQUEST["UserID"]))
	{
		$UserID = $_REQUEST["UserID"];
		$AccessParentList = $aUser->GetParentModuleAccessByID($UserID);
	}



	// function GetUserAccessByUserID($user_id)
	// {
	// 	$UserID = $user_id;
	// 	$UserAccessList = $aUser->GetUserAccessByUserID($UserID);
	// 	return $UserAccessList;
	// }
	


	function Check($Value)
	{
		if($Value=="")
		{
			return "";
		}
		else if($Value==0)
		{
			return "";
		}
		else if($Value==1)
		{
			return "checked=\"checked\"";
		}
	}
?>

<!------------------------------------------------------ USER ACCESS ------------------------------------------------ -->
<div class="right_col" role="main">
 
	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Parent Module <small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

								<form action=""  method="post" name="" id="AddUserAcess" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
									
						    		<input type="hidden" name="AccessType" id="AccessType" value="Parent" required="required" class="form-control col-md-7 col-xs-12">

									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-3">User ID<span class="required">*</span></label>

										<div class="col-md-6 col-sm-6 col-xs-6">
											<select name="UserID" id="UserID" class="form-control" required="required">
												<option value="">Choose option</option>
												<?php	
													foreach ($UserList["UserList"] as $key => $row) 
													{
														echo "<option value=".$row['user_id'].">";
														echo $row['user_id'];
														echo "</option>";
													}
												?>
											</select>
										</div>
										<button type="submit" name="submit" class="btn btn-primary">Load</button>
									</div>
					            </form>

					            <div class="ln_solid"></div>
					            <div id="errorMessage"></div>


			        <?php 
			            	if($AccessType=="Parent")
			            	{
			        ?>
								<form action=""  method="post" name="" id="addParentModuleAccess" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
									<input type="hidden" name="parentUserID" id="parentUserID" value="<?php echo $UserID; ?>">
					<?php
			            		if($AccessParentList != null)
			            		{
			        ?>
			        			
									<table id="ParentModuleTable" class="table table-striped table-bordered datatable-simple nowrap" cellspacing="0" width="100%">
										<thead >
											<tr>
												<th>Module</th>
												<th>Status</th>
											</tr>
										</thead>
								  
										<tbody >
										<?php

											if($AccessParentList)
											{
										
												$ModuleList = json_decode($AccessParentList["ParentModuleAccess"]);

												$i=0;
												foreach ($ModuleList as $value) 
												{  
													  
													echo "<tr>";
														//---------- Column Parent Module Name   
														echo "<td>";
																echo "  ".$value->Module;
														echo "</td>";
														//---------- Column Status   
														echo "<td>";
																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->Status). " style=\"position: absolute; opacity: 0;\">";
																echo "</div>";
														echo "</td>";

													echo "</tr>";     
												}
											}

										?>	
										</tbody>
									</table>
					<?php
								}
								else
								{
					?>
									<table id="ParentModuleTable" class="table table-striped table-bordered datatable-simple nowrap" cellspacing="0" width="100%">
										<thead >
											<tr>
												<th>Module</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody >
										
										<?php

											$ParentModuleList = $aUser->GetAllParentModule();
					
											if($ParentModuleList)
											{
												$i=0;
												foreach ($ParentModuleList["ParentModuleList"] as $key => $res) 
												{  
													  
													echo "<tr>";
														//---------- Column Parent Module Name   
														echo "<td>";
																echo $res['parent_module'];
														echo "</td>";
														//---------- Column Status   
														echo "<td align=\"center\">";
											
																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
														
																echo "</div>";
									
														echo "</td>";

													echo "</tr>";     
												}
											}
										?>	
										</tbody>
									</table>
					<?php	
								}
					?>
								<button type="submit" name="submit" class="btn btn-success">Save</button>
							</form>
								
					<?php 
							}
					?>
                </div>
            </div>
        </div>			
	</div>
</div>

       
<!-- /page content -->