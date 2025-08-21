
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="EditUserTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="editUserType" id="editUserType" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit UserType</h4>
                </div>

                <div class="modal-body">

                    <div id="errorMessageEdit"></div>


                    <input class="form-control" type="hidden" name="UserTypeID" id="UserTypeID" required="required">



                    <div class="form-group">
                        <label  for="UserTypeName">ইউজার টাইপ<span class="required">*</span></label>
                        <input class="form-control" type="text" name="UserTypeName" id="UserTypeName" required="required">
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


