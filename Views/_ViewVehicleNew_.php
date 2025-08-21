<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();

global $msg;

?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3> রেকর্ড দেখুন </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
								<h4> রেকর্ড দেখার  ফর্ম  </h4>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>
				
						<div class="x_content">
								
                            <form  method="post" name="ViewVehicle" id="ViewVehicle" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                                <input type="hidden" name="DocType" id="DocType" value="VCL">
                                <input type="hidden" name="ActionType" id="ActionType" value="Insert">

                                <!--                    <div class="form-group">
                                    <label for=""></label>
                                    <div id="errorMessage"></div>
                                </div>

                                <div class="form-group">
                                    <label for="Code">কোড <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
                                </div>-->

                                <div class="form-group">
                                    <label for="Owner">গাড়ীর মালিক <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="Owner" id="Owner" class="form-control" required="required" readonly="readonly">

                                </div>

                                <div class="form-group">
                                    <label  for="Model">গাড়ীর মডেল <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="Model" id="Model" required="required" readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label for="Color">গাড়ীর রঙ <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="Color" id="Color" required="required" readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label for="RegNo">রেজিস্ট্রেশন নং <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="RegNo" id="RegNo" required="required" readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label for="RegDate">রেজিস্ট্রেশনের তারিখ<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="RegDate" id="RegDate" required="required" readonly="readonly">
                                </div>

                                <div class="form-group">
                                    <label for="Detail">ইজিবাইক ক্রয়ের ডিলারের নাম/ শো
                                        -রুমের নাম ও ঠিকানা <span class="required">*</span></label>
                                    <textarea class="form-control" type="text" name="Detail" id="Detail" required="required" required="required" readonly="readonly"></textarea>
                                </div>

                            
                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                                <!-- 		<button type="Submit" class="btn btn-primary" onclick="AddVehicle()">Add Record</button> -->

                            </form>

                        </div>

                    </div>
			
                </div>

            </div> 

        </div> 

    </div>            