
<div class="modal fade" id="AddUserTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="addUserType" id="addUserType" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <!--<input type="hidden" name="DocType" id="DocType" value="VCL">-->
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New UserType</h4>
                </div>

                <div class="modal-body">

                    <div id="errorMessage"></div>
              
                    <div class="form-group">
                        <label  for="UserTypeName">ইউজার টাইপ <span class="required">*</span></label>
                        <input class="form-control" type="text" name="UserTypeName" id="UserTypeName" required="required">
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


