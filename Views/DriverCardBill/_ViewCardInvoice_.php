<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="CardInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style=" width: 1100px; margin: 30px auto;" role="document">
        <form  method="post" name="invoiceView" id="invoiceView" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">
                <!--<input type="hidden" name="DocType" id="DocType" value="PBL">-->
                <input type="hidden" name="ActionType" id="ActionType" value="View">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Invoice</h4>
                </div>

                <div class="modal-body">
                    <div id="errorMessage"></div>
                    <div id="printableAreaInvoice">
                        <img src="images/vehicleRegInvoice.png" style="width:100%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4" >
                                    <table class="cardTable" id="myTable" border="0" style="margin-top: -526px; line-height:180%; width: 339px; color:black; font-weight: normal;">
                                        <tbody>
                                            <tr>
                                                <td><div style="margin-left:50px" name="invCardBillNo" class="invCardBillNo">1</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:138px"  name="invTrnsOwnerNameC" class="invTrnsOwnerNameC">2</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:76px" name="invOwnerTrnsRegNoC" class="invOwnerTrnsRegNoC">3</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:80px" name="invOwnerIdNoC" class="invOwnerIdNoC">4</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:120px" name="invblank" class="invblank">5</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:90px" name="invBillIssueDateC" class="invBillIssueDateC">6</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:115px" name="invBillPayDateC" class="invBillPayDateC">7</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:260px; margin-top:102px">8</div></td>
                                            </tr>
                                            <tr style="height:50px; border-color:red">
                                                <td >
                                                    <img class="card-sig" align="right" src="Views/sig.png" style=" width: 48px; height: 38px">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                </div>

                                <div class="col-md-4" >
                                    <table class="cardTable" id="myTable" border="0" style="margin-top: -526px; line-height:180%; width: 339px; color:black; font-weight: normal;">
                                        <tbody>
                                            <tr>
                                                <td><div style="margin-left:50px" name="invCardBillNo" class="invCardBillNo">1</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:138px"  name="invTrnsOwnerNameC" class="invTrnsOwnerNameC">2</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:76px" name="invOwnerTrnsRegNoC" class="invOwnerTrnsRegNoC">3</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:80px" name="invOwnerIdNoC" class="invOwnerIdNoC">4</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:120px" name="invblank" class="invblank">5</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:90px" name="invBillIssueDateC" class="invBillIssueDateC">6</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:115px" name="invBillPayDateC" class="invBillPayDateC">7</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:260px; margin-top:102px">8</div></td>
                                            </tr>
                                            <tr style="height:50px; border-color:red">
                                                <td >
                                                    <img class="card-sig" align="right" src="Views/sig.png" style=" width: 48px; height: 38px">
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="col-md-4" >
                                    <table class="cardTable" id="myTable" border="0" style="margin-top: -526px; line-height:180%; width: 339px; color:black; font-weight: normal;">
                                        <tbody>
                                            <tr>
                                                <td><div style="margin-left:50px" name="invCardBillNo" class="invCardBillNo">1</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:138px"  name="invTrnsOwnerNameC" class="invTrnsOwnerNameC">2</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:76px" name="invOwnerTrnsRegNoC" class="invOwnerTrnsRegNoC">3</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:80px" name="invOwnerIdNoC" class="invOwnerIdNoC">4</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:120px" name="invblank" class="invblank">5</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:90px" name="invBillIssueDateC" class="invBillIssueDateC">6</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:115px" name="invBillPayDateC" class="invBillPayDateC">7</div></td>
                                            </tr>
                                            <tr>
                                                <td><div style="margin-left:260px; margin-top:102px">8</div></td>
                                            </tr>
                                            <tr style="height:50px; border-color:red">
                                                <td >
                                                    <img class="card-sig" align="right" src="Views/sig.png" style=" width: 48px; height: 38px">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>           
                    </div>   
                </div>

            	<br>
            	<br>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
       				<label class="btn btn-primary" onclick="printInvoice()" value="Print Card" />Print Front</label>
                </div>
            </div>
        </form>
    </div>
</div>