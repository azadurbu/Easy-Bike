<?php 

require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerList = $aOwner->GetAllOwner();

global $msg;

?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3> চালকের বিল দেখার ফর্ম </h3>
				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">

						<div class="clearfix"></div>

                        <form  method="post" name="viewDriverCardBill" id="viewDriverCardBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                                <input type="hidden" name="DocType" id="DocType" value="CBL">
                                <input type="hidden" name="ActionType" id="ActionType" value="Insert">

                            <div id="status"></div>
                            <div class="form-group">
                                <label for="Code">কোড <span class="required">*</span></label>
                                <input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
                            </div>

                            <div class="form-group">
                                <label for="DriverEdit">গাড়ীর চালক<span class="required">*</span></label><br>
                                <input type="text" name="DriverEdit" id="DriverEdit" class="form-control" required="required" readonly>
                            </div>

                            <div class="form-group">
                                <label  for="CardFee">কার্ড ফি <span class="required">*</span></label>
                                <input class="form-control" type="text" name="CardFee" id="CardFee" required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label  for="CardYear">চালকের রেজিস্ট্রেশন ইয়ার <span class="required">*</span></label>
                                <input class="form-control" type="number" name="CardYear" id="CardYear" required="required" readonly="readonly">
                            </div>

                            <!--<div class="form-group">
                                <label for="EntryDate">বিল পরিশোধের তারিখ <span class="required">*</span></label>
                                <input class="form-control" type="date" name="EntryDate" id="EntryDate" required="required">
                            </div>-->
                    
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                            <button type="Submit" class="btn btn-primary pull-right">OK</button>

                        </form>

                    </div>

                </div>

            </div>

        </div> 

    </div>       



