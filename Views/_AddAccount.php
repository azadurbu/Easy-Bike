
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="AddAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="addAccount" id="addAccount" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <input type="hidden" name="DocType" id="DocType" value="BANK">
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Account</h4>
                </div>

                <div class="modal-body">

       
                    <div id="errorMessage"></div>  
               
                    <div class="form-group">
                        <label for="Bank">ব্যাংক <span class="required">*</span></label><br>
                        <select  class="form-control" name="Bank" id="Bank"  required="required">
                            <option value="">---- ব্যাংক ----</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="AcBranch">ব্রাঞ্চ<span class="required">*</span></label>
                        <textarea class="form-control" type="text" name="AcBranch" id="AcBranch" required="required"></textarea>
                    </div>

                    <div class="form-group">
                        <label  for="AcName">একাউন্ট নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="AcName" id="AcName" required="required">
                    </div>

                    <div class="form-group">
                        <label for="AcNo">একাউন্ট নাম্বার<span class="required">*</span></label>
                        <input class="form-control" type="text" name="AcNo" id="AcNo" required="required" >
                    </div>
<!--
                    <div class="form-group">
                        <label for="BankID">শাখা <span class="required">*</span></label>
                        <input class="form-control" type="text" name="BankID" id="BankID" required="required">
                    </div>-->




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


