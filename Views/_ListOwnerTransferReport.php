<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>মালিকের তথ্যসমূহ</h3>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="get" target="_blank" action="Views/ReportView/rptOwnerTransfer.php" name="frmOwnerRPT" id="frmOwnerRPT" data-parsley-validate class="form-horizontal form-label-left">

                            <input type="hidden" name="DocType" id="DocType" value="OWNRRPT">

                            <div class="container">
								<!-- <div class="row">
									<div class="col-sm-3" >
                                        <tr>
                                            <td>Name English:</td>
                                            <td><input class="form-group" type="text" id="OwnerName1" name="OwnerName"></td>
                                        </tr> 
                                    </div>
                                    <div class="col-sm-3" >
                                        <tr> 
                                            <td>এনআইডি নম্বর</td>
                                            <td><input class="form-group" type="number" id="NID" name="NID" ></td>
                                        </tr>
                                    </div>
                                    <div class="col-sm-3" >
                                        <tr> 
                                            <td>রেজিস্ট্রেশন নং</td>
                                            <td><input class="form-group" type="number" id="RegNo" name="RegNo" ></td>
                                        </tr>
                                    </div>
                                    <div class="col-sm-3" >
                                        <tr>
                                            <td>মোবাইল নং</td>
                                            <td><input class="form-group" type="number" id="Mobile" name="Mobile" ></td>
                                        </tr> 
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div> -->

                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport">মালিকের তথ্যসমূহ<span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" name="cDivision" id="cDivision" class="form-control" >
                                        <option value="">---- উপজেলা ----</option>
                                    </select>
                                </div>
                                <br>                              
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport"> <span class="required"></span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="cSubDivision" id="cSubDivision" class="form-control" >
                                    <option value="">---- পৌরসভা ----</option>
                                </select>
                                </div>
                                <br>                              
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport"><span class="required"></span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" class="form-control" name="WardNo" id="WardNo" class="form-control" >
                                        <option value="">---- ওয়ার্ড নং ----</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DriverReport"> <span class="required"></span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" name="Area" id="Area" class="form-control" >
                                        <option value="">---- গ্রাম/মহল্লা ----</option>
                                    </select>
                                </div>
                                <br>                              
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Status">স্ট্যাটাস<span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" class="form-control" name="Status" id="Status" class="form-control">
                                        <option name="AllPaid" id="AllPaid" value="2">---- সকল বিল----</option>
                                        <option name="Paid" id="Paid" value="1">----পরিশোধিত----</option>
                                        <option name="UnPaid" id="UnPaid"value="0">----অপরিশোধিত----</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Start_date">Date<span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input class="form-control" type="date" name="Start_date" id="Start_date" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End_date">To<span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input class="form-control" type="date" name="End_date" id="End_date" required="required">
                                    </div>
                                </div>
                                <br>
                                <br>
                            <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">View</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
