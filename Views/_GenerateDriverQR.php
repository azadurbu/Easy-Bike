<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="DriverQRModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="qrDriver" id="qrDriver" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">QR Code</h4>
                </div>

                <div class="modal-body">
                    <div align="center" id="qrcodeDriverCanvas"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <label  class="btn btn-primary"><a  style="color: white;" id="Html2Image" href="Content/QRCode/">Download</a></label>

                </div>

            </div>
        </form>
    </div>
</div>


