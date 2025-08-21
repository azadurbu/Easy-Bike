<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="EditDriverCardBillModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="editDriverCardBill" id="editDriverCardBill" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <input type="hidden" name="DocType" id="DocType" value="CBL">
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit DriverBill</h4>
                </div>

                <div class="modal-body">


                    <div id="errorMessageEdit"></div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>
                    </div>

                    <div class="form-group">
                        <label for="DriverEdit">গাড়ীর ড্রাইভার <span class="required">*</span></label><br>
                        <select  name="DriverEdit" id="DriverEdit" class="form-control" required="required">
                            <option value="">---- গাড়ীর ড্রাইভার ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label  for="CardFee">কার্ড ফি <span class="required">*</span></label>
                        <input class="form-control" type="text" name="CardFee" id="CardFee" required="required" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="EntryDate">বিল তৈরির তারিখ<span class="required">*</span></label>
                        <input class="form-control" type="date" name="EntryDate" id="EntryDate" required="required">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">OK</button>
                </div>

            </div>
        </form>
    </div>
</div>


