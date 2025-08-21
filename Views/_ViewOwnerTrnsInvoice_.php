<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="OwnerTrnsInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style=" width: 1100px; margin: 30px auto;" role="document">
        <form  method="post" name="OwnerTrnsInvoiceView" id="OwnerTrnsInvoiceView" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">
                <!--<input type="hidden" name="DocType" id="DocType" value="PBL">-->
                <input type="hidden" name="ActionType" id="ActionType" value="View">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Invoice</h4>
                </div>
                <div class="modal-body">
                    <div id="errorMessage"></div>
                </div>
                <div id="printableAreaInvoice" >
                    <div class="container">
                        <div class="invBodyMain">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-4" >
                                        <div class="invContainer">

                                            <div class="invHeader">
                                                <tr><img src="Content/Other/logo.png" alt="LOGO" width="55" height="55" align="left"></tr>
                                                <h3 style="margin-right: 29px;"> <?php echo $Municipality[0]["m_name"]; ?></h3>
                                                <p style="margin-right: 70px;"> খাগড়াছড়ি পার্বত্য জেলা </p>
                                                <h2 style="margin-right: 16px;"> ইজিবাইক মালিকানা পরিবর্তনের ফি</h2>
                                                <h2 style="margin-right: 25px;"> পৌরসভা কপি</h2>
                                            </div>

                                            <table class="invTableInfo">
                                                <tbody>

                                                <tr>
                                                    <td>বিল নং</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerTrnsBillNo" id="invOwnerTrnsBillNo"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>মালিকের নাম</td>
                                                    <td>:&nbsp&nbsp<label name="invTrnsOwnerName" id="invTrnsOwnerName"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>রেজি নং</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerTrnsRegNo" id="invOwnerTrnsRegNo"></label></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <br>

                                            <table class="invTableBill" border="1">
                                                <tbody>
                                                <tr>
                                                    <td>মালিকানা পরিবর্তনের ফি</td>
                                                    <td id="TrnsInvOwnerRegFee"></td>
                                                </tr>
                                                <tr></tr>
                                                <tr style="border-style:hidden;">
                                                    <td style="border-style:hidden;">সর্বমোট বিল</td>
                                                    <td style="border-style:hidden;" id="invOwnerTotal"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <br>
                                            <br>
                                            <br>
                                            <table class="invTableSig">

                                                <tr>
                                                    <td>---------------------------</td>
                                                    <td align="right">---------------------------</td>
                                                </tr>

                                                <tr>
                                                    <td><label name="Minister" id="Minister">সচিব </label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" >মেয়র </label> </td>
                                                </tr>

                                                <tr>
                                                    <td><label name="Minister" id="Minister"> <?php echo $Municipality[0]["m_name"]; ?></label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" ><?php echo $Municipality[0]["m_name"]; ?></label></td>
                                                </tr>

                                            </table>

                                            <br>

                                            <div id="invBankInfo"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="margin-left: -20px" >
                                        <div class="invContainer">

                                            <div class="invHeader">
                                                <tr><img src="Content/Other/logo.png" alt="LOGO" width="55" height="55" align="left"></tr>
                                                <h3 style="margin-right: 29px;"> <?php echo $Municipality[0]["m_name"]; ?> </h3>
                                                <p style="margin-right: 70px;"> খাগড়াছড়ি পার্বত্য জেলা </p>
                                                <h2 style="margin-right: 16px;"> ইজিবাইক মালিকানা পরিবর্তনের ফি</h2>
                                                <h2 style="margin-right: 25px;"> গ্রাহক কপি</h2>
                                            </div>

                                            <table class="invTableInfo">
                                                <tbody>

                                                <tr>
                                                    <td>বিল নং</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerTrnsBillNoC" id="invOwnerTrnsBillNoC"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>মালিকের নাম</td>
                                                    <td>:&nbsp&nbsp<label name="invTrnsOwnerNameC" id="invTrnsOwnerNameC"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>রেজি নং</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerTrnsRegNoC" id="invOwnerTrnsRegNoC"></label></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <br>

                                            <table class="invTableBill" border="1">
                                                <tbody>
                                                <tr>
                                                    <td>মালিকানা পরিবর্তনের ফি</td>
                                                    <td id="TrnsInvOwnerRegFeeC"></td>
                                                </tr>
                                                <tr></tr>
                                                <tr style="border-style:hidden;">
                                                    <td style="border-style:hidden;">সর্বমোট বিল</td>
                                                    <td style="border-style:hidden;" id="invOwnerTotalC"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <br>
                                            <br>
                                            <br>

                                            <table class="invTableSig">
                                                <tr>
                                                    <td>---------------------------</td>
                                                    <td align="right">---------------------------</td>
                                                </tr>

                                                <tr>
                                                    <td><label name="Minister" id="Minister">সচিব </label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" >মেয়র </label> </td>
                                                </tr>

                                                <tr>
                                                    <td><label name="Minister" id="Minister"> <?php echo $Municipality[0]["m_name"]; ?></label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" ><?php echo $Municipality[0]["m_name"]; ?></label> </td>
                                                </tr>
                                            </table>


                                            <br>

                                            <div id="invBankInfoC"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-4" style="margin-left: -20px" >
                                        <div class="invContainer">

                                            <div class="invHeader">
                                                <tr><img src="Content/Other/logo.png" alt="LOGO" width="55" height="55" align="left"></tr>
                                                <h3 style="margin-right: 29px;"> <?php echo $Municipality[0]["m_name"]; ?> </h3>
                                                <p style="margin-right: 70px;"> খাগড়াছড়ি পার্বত্য জেলা </p>
                                                <h2 style="margin-right: 16px;"> ইজিবাইক মালিকানা পরিবর্তনের ফি</h2>
                                                <h2 style="margin-right: 25px;"> ব্যাংক কপি</h2>
                                            </div>

                                            <table class="invTableInfo">
                                                <tbody>

                                                <tr>
                                                    <td>বিল নং</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerTrnsBillNoB" id="invOwnerTrnsBillNoB"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>মালিকের নাম</td>
                                                    <td>:&nbsp&nbsp<label name="invTrnsOwnerNameB" id="invTrnsOwnerNameB"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>রেজি নং</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerTrnsRegNoB" id="invOwnerTrnsRegNoB"></label></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <br>

                                            <table class="invTableBill" border="1">
                                                <tbody>
                                                <tr>
                                                    <td>মালিকানা পরিবর্তনের ফি</td>
                                                    <td id="TrnsInvOwnerRegFeeB"></td>
                                                </tr>
                                                <tr></tr>
                                                <tr style="border-style:hidden;">
                                                    <td style="border-style:hidden;">সর্বমোট বিল</td>
                                                    <td style="border-style:hidden;" id="invOwnerTotalB"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <br>
                                            <br>
                                            <br>

                                            <table class="invTableSig">
                                                <tr>
                                                    <td>---------------------------</td>
                                                    <td align="right">---------------------------</td>
                                                </tr>

                                                <tr>
                                                    <td><label name="Minister" id="Minister">সচিব </label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" >মেয়র </label> </td>
                                                </tr>

                                                <tr>
                                                    <td><label name="Minister" id="Minister"><?php echo $Municipality[0]["m_name"]; ?></label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" ><?php echo $Municipality[0]["m_name"]; ?></label> </td>
                                                </tr>
                                            </table>


                                            <br>

                                            <div id="invBankInfoB"></div>

                                        </div>
                                    </div>
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