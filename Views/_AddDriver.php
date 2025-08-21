<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="AddDriverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="addDriver" id="addDriver" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <input type="hidden" name="DocType" id="DocType" value="DRV">
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Driver</h4>
                </div>

                <div class="modal-body">


                    <div id="errorMessage"></div>

                    <!--<div class="form-group">-->
                    <!--    <label for="Code">কোড <span class="required">*</span></label>-->
                        <input class="form-control" type="hidden" name="Code" id="Code" value="" required="required" readonly>
                    <!--</div>-->
                    <div class="form-group">
                        <label for="LicenseNo">পরিচিতি নং <span class="required">*</span></label>
                        <input class="form-control" type="text" name="LicenseNo" id="LicenseNo" required="required" required="required" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label  for="DriverName">নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="DriverName" id="DriverName" required="required">
                    </div>

                    <div class="form-group">
                        <label for="FathersName">পিতা/স্বামীর নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="FathersName" id="FathersName" required="required" >
                    </div>

                    <div class="form-group">
                        <label for="MotherName">মাতার নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="MotherName" id="MotherName" required="required">
                    </div>

                    <div class="form-group">
                        <label for="DriverBGroup">রক্তের গ্রূপ <span class="required">*</span></label>
                        <input class="form-control" type="text" name="DriverBGroup" id="DriverBGroup" required="required">
                    </div>

                    <div class="form-group">
                        <label for="DOB">জন্ম তারিখ <span class="required">*</span></label>

                        <input class="form-control" name="DOB" id="DOB" type="text" required="required">
                    </div>
                    <div class="form-group">
                        <label for="NID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
                        <input class="form-control" type="text" name="NID" id="NID" required="required" required="required">
                    </div>
                    <div class="form-group">
                        <label for="HoldingNo">হোল্ডিং নং <span class="required">*</span></label>
                        <input class="form-control" type="text" name="HoldingNo" id="HoldingNo" required="required" required="required">
                    </div>

                    <div class="form-group">
                        <label for="Mobile">মোবাইল নং <span class="required">*</span></label>
                        <input class="form-control" type="text" name="Mobile" id="Mobile" required="required" required="required">
                    </div>

                  


                    <!--					<div class="form-group">
                                            <label for="Owner">গাড়ীর মালিক <span class="required">*</span></label>
                                            <select class="form-control" name="Owner" id="Owner" class="form-control" required="required">
                                                <option value="">---- গাড়ীর মালিক ----</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Vehicle">গাড়ী <span class="required">*</span></label>
                                            <select class="form-control" name="Vehicle" id="Vehicle" class="form-control" required="required">
                                                <option value="">---- গাড়ী ----</option>
                                            </select>
                                        </div>-->


                    <!-- <div class="form-group">
                        <label for="pDivision">স্থায়ী ঠিকানা <span class="required">*</span></label>
                        <select class="form-control" name="pDivision" id="pDivision" class="form-control" required="required">
                            <option value="">---- জেলা ----</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="pSubDivision"><span class="required"></span></label>
                        <select class="form-control" name="pSubDivision" id="pSubDivision" class="form-control" required="required">
                            <option value="">---- পৌরসভা ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pWardNo"><span class="required"></span></label>
                        <select class="form-control" name="pWardNo" id="pWardNo" class="form-control" required="required">
                            <option value="">---- ওয়ার্ড নং ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pArea"><span class="required"></span></label>
                        <select class="form-control" name="pArea" id="pArea" class="form-control" required="required">
                            <option value="">---- গ্রাম/মহল্লা ----</option>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label for="Address">বর্তমান ঠিকানা <span class="required">*</span></label>
                        <select class="form-control" name="cDivision" id="cDivision" class="form-control" required="required">
                            <option value="">---- জেলা ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cSubDivision"><span class="required"></span></label>
                        <select class="form-control" name="cSubDivision" id="cSubDivision" class="form-control" required="required">
                            <option value="">---- পৌরসভা ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for=""><span class="required"></span></label>
                        <select class="form-control" class="form-control" name="cWardNo" id="cWardNo" class="form-control" required="required">
                            <option value="">---- ওয়ার্ড নং ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label  for=""><span class="required"></span></label>
                        <select class="form-control" name="cArea" id="cArea" class="form-control" required="required">
                            <option value="">---- গ্রাম/মহল্লা ----</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Address">স্থায়ী ঠিকানা <span class="required">* <input type="checkbox" name="chkAddress" id="chkAddress" onclick="CheckAddress()"> একই</span></label>
                        <textarea class="form-control" type="text" name="PermanentAddress" id="PermanentAddress" required="required"></textarea>
                    </div>

                    <div class="form-group">
                        <label  for="file">আপলোড  ছবি <span class="required">*</span></label>
                        <input class="form-control"  type="file" name="file" id="file" required="required" accept="image/x-png,image/gif,image/jpg,image/jpeg" class="form-control col-md-7 col-xs-12" >(MAX: 50KB)
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">OK</button>
                    <!-- 		<button type="Submit" class="btn btn-primary" onclick="AddDriver()">Add Record</button> -->
                </div>

            </div>
        </form>
    </div>
</div>


