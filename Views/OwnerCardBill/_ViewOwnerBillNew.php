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
					<h3> গাড়ির বিল দেখুন  </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">

						<div class="clearfix"></div>
                        <form  method="post" name="viewOwnerCardBill" id="viewOwnerCardBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">  

                                <input type="hidden" name="DocType" id="DocType" value="OCBL">
                                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
        

                            <div id="status"></div>
                            <div class="form-group">
                                <label for="Code">কোড <span class="required">*</span></label>
                                <input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Owner">গাড়ীর মালিক <span class="required">*</span></label><br>
                                <input type="text" name="Owner" id="Owner" class="form-control" required="required" readonly>
                            </div>

                            <div class="form-group">
                                <label  for="OwnerCardFee">বিলের পরিমান <span class="required">*</span></label>
                                <input class="form-control" type="text" name="OwnerCardFee" id="OwnerCardFee" required="required" readonly="readonly">
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




