<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerList = $aOwner->GetAllOwner();

global $msg;
$Add = $ChildModuleAccessList[0]->Add;

require_once '_ViewOwnerTrnsInvoice.php' 
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> মালিক হস্তান্তর বিল পোস্টিং </h3>
            </div>
        </div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">

					<div class="x_panel">

                        <form  method="post" name="OwnerTrnsPostBill" id="OwnerTrnsPostBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                
                            <div id="errorMessage"></div>

                            <input type="hidden" name="DocType" id="DocType" value="OWNT">
                            <input type="hidden" name="ActionType" id="ActionType" value="View">
                            <div class="form-group">
                                <label for="Code">কোড <span class="required">*</span></label>
                                <input class="form-control" type="text" name="Code" id="Code" value="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Code">বিলের পরিমান <span class="required">*</span></label>
                                <input class="form-control" type="text" name="OwnerTrnsFee" id="OwnerTrnsFee" value="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Bank">ব্যাংক <span class="required">*</span></label>
                                <select class="form-control" name="Bank" id="Bank" required="required">
                                    <option value="">---- ব্যাংক ----</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Account">একাউন্ট নাম্বার <span class="required">*</span></label>
                                <select class="form-control" name="Account" id="Account" required="required">
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

</div>