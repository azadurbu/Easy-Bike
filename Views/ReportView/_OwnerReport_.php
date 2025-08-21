
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
                        <form target="_blank" action="Views/ReportView/rptOwner.php"  method="post" name="frmOwnerRPT" id="frmOwnerRPT" data-parsley-validate class="form-horizontal form-label-left">

                            <input type="hidden" name="DocType" id="DocType" value="OWNRRPT">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="OwnerReport">মালিকের তথ্যসমূহ <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" class="form-control" name="WardNo" id="WardNo" class="form-control">
                                        <option value="">---- ওয়ার্ড নং ----</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="OwnerReport"> <span class="required"></span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" name="Area" id="Area" class="form-control" >
                                        <option value="">---- গ্রাম/মহল্লা ----</option>
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success">View</button>
                                    </div>
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
