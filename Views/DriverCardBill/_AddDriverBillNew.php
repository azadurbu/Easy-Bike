

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
					<h3> নতুন ড্রাইভার বিল যোগ করার ফর্ম </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">

						<div class="clearfix"></div>
                        
                        <form  method="post" name="addDriverCardBill" id="addDriverCardBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                                <input type="hidden" name="DocType" id="DocType" value="CBL">
                                <input type="hidden" name="ActionType" id="ActionType" value="Insert">


                            <div id="errorMessage"></div>
                            
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Driver">গাড়ীর ড্রাইভার <span class="required">*</span></label><br>
                                <select  name="Driver" id="Driver" class="form-control" required="required">
                                    <option value="">---- গাড়ীর ড্রাইভার ----</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label  for="CardFee">রেজিস্ট্রেশন/নবায়ন ফি <span class="required">*</span></label>
                                <input class="form-control" type="text" name="CardFee" id="CardFee" required="required" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="EntryDate">বিল তৈরির তারিখ<span class="required">*</span></label>
                                <input class="form-control" type="date" name="EntryDate" id="EntryDate" required="required">
                            </div>
                    
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                            <button type="Submit" class="btn btn-primary pull-right">Ok</button>

                        </form>

                    </div>
        
                </div>

            </div>

        </div>

    </div>        


