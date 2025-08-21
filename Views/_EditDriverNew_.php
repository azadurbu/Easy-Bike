<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();

global $msg;

?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> চালক এডিট ফর্ম </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">


                    <div class="clearfix"></div>
            
                    <div class="x_content">

                    <form  method="post" name="editDriver" id="editDriver" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                        
                        <input type="hidden" name="DocType" id="DocType" value="DRV">
                        <input type="hidden" name="ActionType" id="ActionType" value="Insert">
                
                        <div id="errorMessageEdit"></div>
                

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
                            <input class="form-control" type="date" name="DOB" id="DOB" required="required">
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

                    

                        <!--
                                            <div class="form-group">
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

                        <!--
                                            <div class="form-group">
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
                            <label for="Address">স্থায়ী ঠিকানা <span class="required">* <input type="checkbox" name="chkAddress" id="chkAddressEdit" onclick="CheckAddressEditDriver()"> একই</span></label>
                            <textarea class="form-control" type="text" name="PermanentAddressEdit" id="PermanentAddressEdit" required="required"></textarea>
                        </div>


                        <div class="form-group" align="center">
                            <label class="btn btn-warning" onclick="AddressChange()">Change Address</label>
                        </div>

                        <div class="form-group">
                            <label  for="file">আপলোড  ছবি <span class="required">*</span></label>
                            <input class="form-control"  type="file" name="EditFile" id="EditFile" accept="image/x-png,image/gif,image/jpg,image/jpeg" class="form-control col-md-7 col-xs-12" >(MAX: 50KB)
                        </div>

                

                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                        <button type="Submit" class="btn btn-primary pull-right">OK</button>
                        <!-- 		<button type="Submit" class="btn btn-primary" onclick="AddDriver()">Add Record</button> -->
                    
                    </form>

                </div>

            </div>                               

        </div>

    </div>

</div>


