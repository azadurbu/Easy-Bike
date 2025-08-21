<?php 
// 	include 'User/UserAction/aUser.php';

	$errors = array();
	
// 	$aUser = new ActionUser();
	$UserList = $aUser->GetAllUser();
	//$UserTypeList = $aUser->GetAllUserType();

	$AccessType = "";
	$UserID = "";
	$AccessChildList ="";

	if(isset($_REQUEST["AccessType"]))
	{
		$AccessType = $_REQUEST["AccessType"];

	}

	if(isset($_REQUEST["UserID"]))
	{
		$UserID = $_REQUEST["UserID"];
		$AccessChildList = $aUser->GetChildModuleAccessByID($UserID);
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
                    <h2><i class="fa fa-bars"></i> Child Module <small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

								<form action=""  method="post" name="" id="AddUserAccess" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
									
						    		<input type="hidden" name="AccessType" id="AccessType" value="Child" required="required" class="form-control col-md-7 col-xs-12">

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
			            	if($AccessType=="Child")
			            	{
			        ?>
								<form action=""  method="post" name="" id="addChildModuleAccess" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
									<input type="hidden" name="ChildUserID" id="ChildUserID" value="<?php echo $UserID; ?>">
					<?php
			            		if($AccessChildList != null)
			            		{
			        ?>
			        			
									<table id="ChildModuleTable" class="table table-striped table-bordered datatable-simple nowrap" cellspacing="0" width="100%">
										<thead >
											<tr>
												<th>Module</th>
												<th>List</th>
												<th>Add</th>
												<th>Edit</th>
												<th>View</th>
												<th>Delete</th>
												<th>QRCode</th>
												<th>Card</th>
												<th>BillPosting</th>
												<th>Invoice</th>
												<th>BulkPrint</th>
											</tr>
										</thead>
								  
										<tbody >
										<?php

											if($AccessChildList)
											{
										
												$ModuleList = json_decode($AccessChildList["ChildModuleAccess"]);

											
												foreach ($ModuleList as $value) 
												{  
													  
													echo "<tr>";
														//---------- Column Child Module Name   
														echo "<td>";
																echo "  ".$value->Module;
														echo "</td>";
														//---------- Column List  
												   if  (   $value->Module != 'জেনারেট বিল' &&
                                                    	   $value->Module != 'পৌরসভার নাম' &&
                                                    	   $value->Module != 'অর্থ বছর' &&
                                                    	   $value->Module != 'সারচার্জ' &&
                                                    	   $value->Module != 'রেজিস্ট্রেশন ফি' &&
                                                    	   $value->Module != 'মালিকানা পরিবর্তনের ফি' &&
                                                    	   $value->Module != 'মালিকের কার্ড ফি' &&
                                                    	   $value->Module != 'চালকের কার্ড ফি' 
                                                        ) 
														{
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->List). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
														}
														else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}
														//---------- Column Add

    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->Add). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";


														//---------- Column Edit
												    if  (   $value->Module == 'সকল মালিকের তালিকা' ||
                                                    		$value->Module == 'সকল গাড়ীর তালিকা' ||
                                                    		$value->Module == 'সকল চালকের তালিকা' ||
                                                    		$value->Module == 'সকল ব্যাংকের তালিকা'||
                                                    		$value->Module == 'সকল একাউন্টের তালিকা' ||
                                                    		$value->Module == 'জেলা'||
                                                    		$value->Module == 'পৌরসভা' ||
                                                    		$value->Module == 'ওয়ার্ড নং'||
                                                    		$value->Module == 'গ্রাম/মহল্লা' ||
                                                    		$value->Module == 'ইউজার টাইপ' ||
                                                    		$value->Module == 'ইউজার' 
                                                        ) 
                                                        {
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->Edit). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
                                                        }
                                                        else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}
                                                        

														//---------- Column View
    												if  (   $value->Module == 'সকল মালিকের তালিকা' ||
                                                    		$value->Module == 'সকল গাড়ীর তালিকা' ||
                                                    		$value->Module == 'সকল চালকের তালিকা' ||
                                                    		$value->Module == 'সকল বিল' ||
                                                    		$value->Module == 'মালিকের কার্ড বিল' ||
                                                    		$value->Module == 'চালকের কার্ড বিল' ||
                                                    		$value->Module == 'মালিকানা পরিবর্তনের তালিকা' 
    
                                                        )
                                                        {
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->View). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
                                                        }
                                                        else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}

														//---------- Column Delete
												    if  (   $value->Module == 'সকল মালিকের তালিকা' ||
                                                    		$value->Module == 'সকল গাড়ীর তালিকা' ||
                                                    		$value->Module == 'সকল চালকের তালিকা' ||
                                                    		$value->Module == 'সকল ব্যাংকের তালিকা'||
                                                    		$value->Module == 'সকল একাউন্টের তালিকা' ||
                                                    		$value->Module == 'জেলা'||
                                                    		$value->Module == 'পৌরসভা' ||
                                                    		$value->Module == 'ওয়ার্ড নং'||
                                                    		$value->Module == 'গ্রাম/মহল্লা' ||
                                                    		$value->Module == 'ইউজার টাইপ' ||
                                                    		$value->Module == 'ইউজার' 
                                                        ) 
                                                        {
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->Delete). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
                                                        }
                                                        else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}

														//---------- Column QR Code 
														if($value->Module == 'সকল গাড়ীর তালিকা' )
														{
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->QRCode). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
														}
														else
														{
                                                            echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}

														//---------- Column Card
										
														if($value->Module == 'সকল গাড়ীর তালিকা' || $value->Module == 'সকল চালকের তালিকা ')		
														{
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->Card). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
														}
														else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}

														//---------- Column Bill Posting 
												    if  (   $value->Module  == 'সকল বিল' || 
														    $value->Module == 'মালিকের কার্ড বিল' ||
														    $value->Module == 'চালকের কার্ড বিল'||
														    $value->Module == 'মালিকানা পরিবর্তনের তালিকা' 
														)	
													    {
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->BillPosting). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
													    }
													    else
													    {
													        echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
													    }

														//---------- Column Invoice 
													if  (   $value->Module  == 'সকল বিল' || 
														    $value->Module == 'মালিকের কার্ড বিল' ||
														    $value->Module == 'চালকের কার্ড বিল'||
														    $value->Module == 'মালিকানা পরিবর্তনের তালিকা' 
														)
														{
    														echo "<td>";
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->Invoice). " style=\"position: absolute; opacity: 0;\">";
    																echo "</div>";
    														echo "</td>";
														}
														else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}


														//---------- Column Bulk Print  
													if($value->Module == 'সকল গাড়ীর তালিকা' )
													{
														echo "<td>";
																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\"" .Check($value->BulkPrint). " style=\"position: absolute; opacity: 0;\">";
																echo "</div>";
														echo "</td>";
													}
													else
													{
													    echo "<td align=\"center\">";
											            echo "-";
														echo "</td>";
													}

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
									<table id="ChildModuleTable" class="table table-striped table-bordered datatable-simple nowrap" cellspacing="0" width="100%">
										<thead >
											<tr>
												<th>Module</th>
												<th>List</th>
												<th>Add</th>
												<th>Edit</th>
												<th>View</th>
												<th>Delete</th>
												<th>QRCode</th>
												<th>Card</th>
												<th>BillPosting</th>
												<th>Invoice</th>
												<th>BulkPrint</th>
											</tr>
										</thead>
										<tbody >
										
										<?php

											$ChildModuleList = $aUser->GetAllChildModule();
					
											if($ChildModuleList)
											{
						
												foreach ($ChildModuleList["ChildModuleList"] as $key => $res) 
												{  
													  
													echo "<tr>";
														//---------- Column Child Module Name   
														echo "<td>";
																echo $res['child_module'];
														echo "</td>";
																	

														//---------- Column List 
												    if  (  $res['child_module'] != 'জেনারেট বিল' &&
                                                    	   $res['child_module'] != 'পৌরসভার নাম' &&
                                                    	   $res['child_module'] != 'অর্থ বছর' &&
                                                    	   $res['child_module'] != 'সারচার্জ' &&
                                                    	   $res['child_module'] != 'রেজিস্ট্রেশন ফি' &&
                                                    	   $res['child_module'] != 'মালিকানা পরিবর্তনের ফি' &&
                                                    	   $res['child_module'] != 'মালিকের কার্ড ফি' &&
                                                    	   $res['child_module'] != 'চালকের কার্ড ফি' 
                                                        )  
                                                        {
    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    																echo "</div>";
    									
    														echo "</td>";
														}
														else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}
														//---------- Column Add   

    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    														echo "</div>";
    									

														//---------- Column Edit 
												    if  (   $res['child_module'] == 'সকল মালিকের তালিকা' ||
                                                    		$res['child_module'] == 'সকল গাড়ীর তালিকা' ||
                                                    		$res['child_module'] == 'সকল চালকের তালিকা' ||
                                                    		$res['child_module'] == 'সকল ব্যাংকের তালিকা' ||
                                                    		$res['child_module'] == 'সকল একাউন্টের তালিকা' ||
                                                    		$res['child_module'] == 'জেলা' ||
                                                    		$res['child_module'] == 'পৌরসভা' ||
                                                    		$res['child_module'] == 'ওয়ার্ড নং' ||
                                                    		$res['child_module'] == 'গ্রাম/মহল্লা'||
                                                    		$res['child_module'] == 'ইউজার টাইপ' ||
                                                    		$res['child_module'] == 'ইউজার' 
                                                        )   
                                                        {
    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    																echo "</div>";
    									
    														echo "</td>";
                                                        }
														else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}

														//---------- Column View
														if  (   $res['child_module'] == 'সকল মালিকের তালিকা' ||
                                                        		$res['child_module'] == 'সকল গাড়ীর তালিকা' ||
                                                        		$res['child_module'] == 'সকল চালকের তালিকা' ||
                                                        		$res['child_module'] == 'সকল বিল' ||
                                                        		$res['child_module'] == 'মালিকের কার্ড বিল' ||
                                                        		$res['child_module'] == 'চালকের কার্ড বিল' ||
                                                        		$res['child_module'] == 'মালিকানা পরিবর্তনের তালিকা' 

                                                            )
                                                            {
        														echo "<td align=\"center\">";
        											
        																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
        																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
        														
        																echo "</div>";
        									
        														echo "</td>";
                                                            }
                                                           	else
    														{
    														    echo "<td align=\"center\">";
    											                echo "-";
    														    echo "</td>";
    														}

														//---------- Column Delete 
												    if  (   $res['child_module'] == 'সকল মালিকের তালিকা' ||
                                                    		$res['child_module'] == 'সকল গাড়ীর তালিকা' ||
                                                    		$res['child_module'] == 'সকল চালকের তালিকা' ||
                                                    		$res['child_module'] == 'সকল ব্যাংকের তালিকা' ||
                                                    		$res['child_module'] == 'সকল একাউন্টের তালিকা' ||
                                                    		$res['child_module'] == 'জেলা' ||
                                                    		$res['child_module'] == 'পৌরসভা' ||
                                                    		$res['child_module'] == 'ওয়ার্ড নং' ||
                                                    		$res['child_module'] == 'গ্রাম/মহল্লা'||
                                                    		$res['child_module'] == 'ইউজার টাইপ' ||
                                                    		$res['child_module'] == 'ইউজার' 
                                                        )   
                                                        {
    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    																echo "</div>";
    									
    														echo "</td>";
                                                        }
                                                     	else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}

														//---------- Column QR Code
														
														if($res['child_module'] == 'সকল গাড়ীর তালিকা' )
														{
    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    																echo "</div>";
    									
    														echo "</td>";
														}
														else
														{
														    echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
														}
														//---------- Column Card 
													    if($res['child_module']  == 'সকল গাড়ীর তালিকা' || $res['child_module'] == 'সকল চালকের তালিকা' )	
													    {
    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    																echo "</div>";
    									
    														echo "</td>";
													    }
													    else
													    {
													        echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
													    }
													    
														//---------- Column Bill Posting 
													if  (   $res['child_module']  == 'সকল বিল' || 
														    $res['child_module'] == 'মালিকের কার্ড বিল' ||
														    $res['child_module'] == 'চালকের কার্ড বিল'||
														    $res['child_module'] == 'মালিকানা পরিবর্তনের তালিকা' 
														)	
													    {
    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    																echo "</div>";
    									
    														echo "</td>";
													    }
													    else
													    {
													        echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
													    }

														//---------- Column Invoice
														
													if  (   $res['child_module']  == 'সকল বিল' || 
														    $res['child_module'] == 'মালিকের কার্ড বিল' ||
														    $res['child_module'] == 'চালকের কার্ড বিল'||
														    $res['child_module'] == 'মালিকানা পরিবর্তনের তালিকা' 
														)	
													    {
    														echo "<td align=\"center\">";
    											
    																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
    																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
    														
    																echo "</div>";
    									
    														echo "</td>";
													    }
													    else
													    {
													        echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
													    }

														//---------- Column Bulk Print 
													if($res['child_module'] == 'সকল গাড়ীর তালিকা' )
													{
														echo "<td>";
																echo "<div class=\"icheckbox_flat-green checked\" style=\"position: relative;\">";
																	echo "<input type=\"checkbox\" class=\"flat\" id=\"Status\" name=\"Status\" style=\"position: absolute; opacity: 0;\">";
																echo "</div>";
														echo "</td>";
													}
													else
													{
													        echo "<td align=\"center\">";
											                echo "-";
														    echo "</td>";
													}

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