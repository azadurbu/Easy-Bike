<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> বিল যুক্ত করুন </h3>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">

                    <div class="clearfix"></div>
                    <div id="errorMessage"></div>
                    <form  method="post" name="otherBillAdd" id="otherBillAdd" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
                        <input type="hidden" name="DocType" id="DocType" value="OCBL">
                        <input type="hidden" name="ActionType" id="ActionType" value="View">

                        <div class="form-group">
                            <label for="billType">বিলের রকম <span class="required">*</span></label>
                            <select class="form-control" name="billType" id="billType" class="form-control" required>
                                <option value="">---- বিলের রকম  ----</option>
                                <option value="1">গাড়ির বিল </option>
                                <option value="2">চালকের বিল </option>
                            </select>
                        </div>                
                        <div class="form-group">
                            <label for="Code">কোড <span class="required">*</span></label>
                            <input class="form-control" type="text" name="Code" id="Code" value="" required readonly>
                        </div>

                        <div class="form-group" id="ownerList" style="display: none;">
                            <label for="Gari">গাড়ীর লিস্ট <span class="required">*</span></label><br>
                            <select  name="Gari" id="Gari" class="form-control" required disabled>
                                <option value="">---- গাড়ীর লিস্ট ----</option>
                            </select>
                        </div>
                        <div class="form-group" id="driverList" style="display: none;">
                            <label for="Driver">গাড়ীর ড্রাইভার <span class="required">*</span></label><br>
                            <select  name="Driver" id="Driver" class="form-control" required disabled>
                                <option value="">---- গাড়ীর ড্রাইভার ----</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Account"> বিলের খাত  <span class="required">*</span></label>
                            <select class="form-control" name="Account" id="Account" class="form-control" required>
                                <option value="">---- বিলের খাত ----</option>
                                <option value="1">সারচার্জ</option>
                                <option value="2">জরিমানা </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="billAmount">বিলের পরিমান <span class="required">*</span></label>
                            <input class="form-control" type="number" name="billAmount" id="billAmount" required>
                        </div>

                        <div class="form-group">
                            <label for="billAmount">বিবরণ</label>
                            <textarea class="form-control" name="details" id="details"></textarea>
                        </div>

                        <button type="Submit" class="btn btn-primary pull-right" >Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>