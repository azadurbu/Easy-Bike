



<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="ViewVehicleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="ViewVehicle" id="ViewVehicle" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <input type="hidden" name="DocType" id="DocType" value="VCL">
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">View Record</h4>
                </div>

                <div class="modal-body">

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

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <!-- 		<button type="Submit" class="btn btn-primary" onclick="AddVehicle()">Add Record</button> -->
                </div>

            </div>
        </form>
    </div>
</div>


