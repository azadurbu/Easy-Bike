
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="editUser" id="editUser" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                </div>

                <div class="modal-body">

                    <div id="errorMessageEdit"></div>


                    <input class="form-control" type="hidden" name="ID" id="ID" required="required">

                    <div class="form-group">
                        <label for="UserTypeName">ইউজারের টাইপ <span class="required">*</span></label><br>
                        <select class="form-control" name="UserTypeName" id="UserTypeName"  required="required">
                            <option value="">----ইউজারের টাইপ----</option>
                        </select>
                    </div>


                    <div class="form-group" align="center">
                        <label class="btn btn-warning" onclick="ChangeUserType()">Change User Type</label>
                    </div>


                    <div class="form-group">
                        <label  for="UserName">ইউজারের নাম<span class="required">*</span></label>
                        <input class="form-control" type="text" name="UserName" id="UserName" required="required">
                    </div>

                    <div class="form-group">
                        <label  for="UserID">ইউজারের আইডি<span class="required">*</span></label>
                        <input class="form-control" type="text" name="UserID" id="UserID" required="required" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label  for="Password">ইউজারের পাসওয়ার্ড <span class="required">*</span></label>
                        <input class="form-control" type="text" name="Password" id="Password" required="required">
                    </div>

                 


                    <div class="form-group">
                        <label for="UserTypeName">Active<span class="required">*</span></label>
                        <input type="checkbox"  name="activeEdit" id="activeEdit"  >

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


