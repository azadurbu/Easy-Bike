
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="AddBankModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="addBank" id="addBank" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <!--<input type="hidden" name="DocType" id="DocType" value="VCL">-->
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
                </div>

                <div class="modal-body">

      
                    <div id="errorMessage"></div>

                    <div class="form-group">
                        <label  for="Bank">ব্যাংকের নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="Bank" id="Bank" required="required">
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label for="BankBranch">ব্যাংকের শাখা <span class="required">*</span></label>-->
<!--                        <input class="form-control" type="text" name="BankBranch" id="BankBranch" required="required" >-->
<!--                    </div>-->

                    <div class="form-group">
                        <label for="BankAddress">ব্যাংকের ঠিকানা <span class="required">*</span></label>
                        <textarea class="form-control" type="text" name="BankAddress" id="BankAddress" required="required"></textarea> 
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">OK</button>
                    <!-- 		<button type="Submit" class="btn btn-primary" onclick="AddVehicle()">Add Record</button> -->
                </div>

            </div>
        </form>
    </div>
</div>


