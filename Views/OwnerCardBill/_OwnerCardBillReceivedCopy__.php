<div class="modal fade" id="OwnerCardBillReceivedCopyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg">
        <form  method="post" name="ownerInvoiceView" id="ownerInvoiceView" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

            <div class="modal-content">
                <input type="hidden" name="ActionType" id="ActionType" value="View">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="OwnerCardBillReceivedCopyModal">Card</h4>
                </div>

                <div class="modal-body">
                    <div id="printableArea">
                        <img src="images/OwnerCardBillReceivedCopy.png" style="width:100%">
                        <table id="myTable" class="cardTable" border="0" style="margin-top: -375px;line-height:160%; color:black;font-weight: normal;">
                            <tbody>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 14px; margin-left: 115px; " id="code"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 14px; margin-left: 164px;" id="code1"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 14px; margin-left: 119px; margin-top:1px;" id="code2"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 14px; margin-left: 103px; margin-top:1px;" id="code3"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 14px; margin-left: 42px;" id="code4"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 14px; margin-left: 42px;" id="code5"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 12px; margin-left: 55px;" id="code6"></label> </td>
                                </tr>
                                <tr>
                                    <td> <label style="font-weight: normal; font-size: 14px; margin-left: 101px; " id="code7"></label> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <label class="btn btn-primary" onclick="printOwnerCardBillReceivedCopy()" value="Print Card" >Print Front</label>
                </div>
            </div> 
        </form>    
    </div>
</div>         
