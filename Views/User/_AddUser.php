
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="addUser" id="addUser" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <input type="hidden" name="DocType" id="DocType" value="User">
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                </div>

                <div class="modal-body">

                    
                    <div id="errorMessage"></div>

                    <div class="form-group">
                        <label for="UserTypeName">ইউজারের টাইপ <span class="required">*</span></label>
                        <select class="form-control" name="UserTypeName" id="UserTypeName" class="form-control" required="required">
                            <option value="">----ইউজারের টাইপ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label  for="UserName">ইউজারের নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="UserName" id="UserName" required="required">
                    </div>

                    <div class="form-group">
                        <label  for="UserID">ইউজারের আইডি <span class="required">*</span></label>
                        <input class="form-control" type="text" name="UserID" id="UserID" required="required">
                    </div>

                    <div class="form-group">
                        <label  for="Password">ইউজারের পাসওয়ার্ড <span class="required">*</span></label>
                        <input class="form-control" type="text" name="Password" id="Password" required="required">
                    </div>

 


                    <div class="form-group">
                        <label for="active">Active<span class="required">*</span></label>
                        <input type="checkbox"  name="active" id="active"  checked="checked" required="required">

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


