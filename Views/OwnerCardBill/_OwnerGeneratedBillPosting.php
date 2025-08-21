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
					<h3> জেনারেটেড বিল পোস্টিং </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">

						<div class="clearfix"></div>
                        
                        <div id="errorMessage"></div>

                        <form  method="post" name="OwnerGeneratedPostBill" id="OwnerGeneratedPostBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                
                            <input type="hidden" name="DocType" id="DocType" value="OCBL">
                            <input type="hidden" name="ActionType" id="ActionType" value="View">
                    
                            <div class="form-group">
                                <label for="Code">কোড <span class="required">*</span></label>
                                <input class="form-control" type="text" name="Code" id="Code" value="" required="required" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="Code">মালিকের নাম <span class="required">*</span></label>
                                <input class="form-control" type="text" name="Owner" id="Owner" value="" required="required" readonly>
                            </div>

                            <div class="form-group">
                                <label for="v_code">গাড়ির রেজিস্ট্রেশন নম্বর <span class="required">*</span></label>
                                <input class="form-control" type="text" name="v_code" id="v_code" value="" required="required" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="Code">বিলের পরিমান <span class="required">*</span></label>
                                <input class="form-control" type="text" name="OwnerFee" id="OwnerFee" value="" required="required" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Bank">ব্যাংক <span class="required">*</span></label>
                                <select class="form-control" name="Bank" id="Bank" class="form-control" required="required">
                                    <option value="">---- ব্যাংক ----</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Account">একাউন্ট নাম্বার <span class="required">*</span></label>
                                <select class="form-control" name="Account" id="Account" class="form-control" required="required">
                                    <option value="">---- একাউন্ট নাম্বার ----</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="PaymentDate">বিল পরিশোধের তারিখ <span class="required">*</span></label>
                                <input class="form-control" type="date" name="PaymentDate" id="PaymentDate" required="required">
                            </div>

                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                            <button type="Submit" class="btn btn-primary pull-right" >Post</button>
                            
                        </form>

                    </div>
        
                </div>

            </div>

        </div>

    </div>


