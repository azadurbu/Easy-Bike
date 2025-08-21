<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="ViewDriverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="viewDriver" id="viewDriver" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <input type="hidden" name="DocType" id="DocType" value="DRV">
                <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">View Record</h4>
                </div>

                <div class="modal-body">

                    <div id="errorMessage"></div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <div class="form-group">
                                <label for="LicenseNo">পরিচিতি নং <span class="required">*</span></label>
                                <input class="form-control" type="text" name="LicenseNo" id="LicenseNo" required="required" required="required" readonly="readonly">
                            </div>
                            
                            <div class="form-group">
                                <label  for="DriverName">নাম <span class="required">*</span></label>
                                <input class="form-control" type="text" name="DriverName" id="DriverName" required="required" readonly="readonly">
                            </div>
                            
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <div id="viewfile">  </div>
                        </div><!--/col-->
                    </div><!--/row-->
                    
                    <div class="form-group">
                        <label for="FathersName">পিতা/স্বামীর নাম  <span class="required">*</span></label>
                        <input class="form-control" type="text" name="FathersName" id="FathersName" required="required" readonly="readonly">
                    </div>
                    
                    <div class="form-group">
                        <label for="MotherName">মাতার নাম <span class="required">*</span></label>
                        <input class="form-control" type="text" name="MotherName" id="MotherName" required="required" readonly="readonly">
                    </div>


                    <div class="form-group">
                        <label for="DriverBGroup">রক্তের গ্রূপ <span class="required">*</span></label>
                        <input class="form-control" type="text" name="DriverBGroup" id="DriverBGroup" required="required" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="DOB">জন্ম তারিখ <span class="required">*</span></label>
                        <input class="form-control" type="date" name="DOB" id="DOB" required="required" readonly>
                    </div>
                    <div class="form-group">
                        <label for="NID">ভোটার আইডি/জন্ম নিবন্ধন নং <span class="required">*</span></label>
                        <input class="form-control" type="text" name="NID" id="NID" required="required" required="required" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="HoldingNo">হোল্ডিং নং <span class="required">*</span></label>
                        <input class="form-control" type="text" name="HoldingNo" id="HoldingNo" required="required" required="required" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="Mobile">মোবাইল নং <span class="required">*</span></label>
                        <input class="form-control" type="text" name="Mobile" id="Mobile" required="required" required="required" readonly>
                    </div>

                   

                    <!--
                                        <div class="form-group">
                                            <label for="Owner">গাড়ীর মালিক <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="Owner" id="Owner" class="form-control" required="required" readonly="readonly">
                                        </div>

                                        <div class="form-group">
                                            <label for="Vehicle">গাড়ী <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="Vehicle" id="Vehicle" class="form-control" required="required" readonly="readonly">
                                        </div>-->

                    <div class="form-group">
                        <label for="Address">স্থায়ী ঠিকানা <span class="required">*</span></label>
                        <textarea class="form-control" type="text" name="PermanentAddress" id="PermanentAddress" required="required" required="required" readonly="readonly"></textarea>

                    </div>


                    <div class="form-group">
                        <label for="Address">বর্তমান ঠিকানা <span class="required">*</span></label>
                        <textarea class="form-control" type="text" name="PresentAddress" id="PresentAddress" required="required" required="required" readonly="readonly"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <!-- 		<button type="Submit" class="btn btn-primary" onclick="AddDriver()">Add Record</button> -->
                </div>

            </div>
        </form>
    </div>
</div>


