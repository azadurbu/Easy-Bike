<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="OwnerCardBillReceivedCopyModal"  role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form  method="post" name="ownerInvoiceView" id="ownerInvoiceView" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">
                <!--<input type="hidden" name="DocType" id="DocType" value="PBL">-->
                <input type="hidden" name="ActionType" id="ActionType" value="View">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Invoice</h4>
                </div>
                <div class="modal-body">
                    <div id="printableArea">
                        <img class="card-bg" src="images/OwnerCardBillReceivedCopy.png" > 
                        <!-- style="width:80%;height:auto;" -->
                            <div class="card-body-front">
                                <table class="cardTable" border="0" style="line-height:45%">
                                    <tbody>
                                        <tr>
                                            <td><label style="margin-top: 125px;"></label></td>
                                        </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 65px;">০০০০১</label></td> </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 65px;"></label></td> </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 50px;">OWN00001</label></td> </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 40px;">মো. এমাদুল তালুকদার</label></td> </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 40px;">মো. সালাম তালুকদার</label></td> </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 40px;">শাহিদা বেগম</label></td> </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 20px;">গ্রাম/মহল্লা : শালবন, ওয়ার্ড নং : ০৬, পৌরসভা :খাগড়াছড়ি পৌরসভা, জেলা : খাগড়াছড়ি পার্বত্য জেলা</label></td> </tr>
                                        <tr> <td><label style="font-size: 10px; margin-left: 65px;">01860101010</label></td> </tr>


                                    </tbody>
                                </table>
                            </div>
                    </div>	
                </div>
                <br><br><br><br><br><br><br><br><br>
                <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <label class="btn btn-primary" onclick="printOwnerCardBillReceivedCopy()" value="Print Card" />Print Front</label>
                </div>
            </div>
        </form>
    </div>
</div>