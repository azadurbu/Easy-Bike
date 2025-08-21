<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="InvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style=" width: 1200px; margin: 30px auto;" role="document">
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
                </div>
                <div id="printableAreaInvoice" >
	                <div class="container">
                        <div class="invBodyMain">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="col-sm-4">
                                        <div class="invContainer">
                                            <div style="border-left: 6px dotted green; height: 610px; position: absolute; left: 320px; top: 0;"></div>
                                            <div class="invHeader">
                                                <tr><img src="Content/Other/logo.png" alt="LOGO" width="55" height="55" align="left"></tr>
                                                <h3 style="margin-left: 30px!important;"> <?php echo $Municipality[0]["m_name"]; ?></h3>
                                                <p> খাগড়াছড়ি পার্বত্য জেলা </p>
                                                <h2 style="margin-left: 53px;"> ইজিবাইক রেজিস্ট্রেশন ফি</h2>
                                                <h2 style="margin-left: 60px!important;"> পৌরসভা কপি</h2>
                                            </div>

                                            <table class="invTableInfo">
                                                <tbody>

                                                <tr>
                                                    <td>বিল নং</td>
                                                    <td>:&nbsp&nbsp<label name="invBillNo" id="invBillNo"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>মালিকের নাম</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerName" id="invOwnerName"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>রেজিস্ট্রেশন নং</td>
                                                    <td>:&nbsp&nbsp<label name="invRegNo" id="invRegNo"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>অর্থ বছর</td>
                                                    <td>:&nbsp&nbsp<label name="invFiscalYear" id="invFiscalYear"></label></td>

                                                </tr>

                                                <tr>
                                                    <td>পরিশোধের শেষ তারিখ</td>
                                                    <td>:&nbsp&nbsp<label name="invExpiredDate" id="invExpiredDate"></label></td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <br>

                                            <table class="invTableBill" border="1">
                                                <tbody>
                                                <tr>
                                                    <td>রেজিস্ট্রেশন ফি</td>
                                                    <td id="invRegFee"></td>
                                                </tr>
                                                <tr>
                                                    <td>কার্ড ফি</td>
                                                    <td id="invCardFee"></td>
                                                </tr>
                                                <tr>
                                                    <td>বকেয়া</td>
                                                    <td id="invArrear"></td>
                                                </tr>
                                                <tr>
                                                    <td>সারচার্জ</td>
                                                    <td id="invSurCharge"></td>
                                                </tr>
                                                <tr>
                                                    <td>জরিমানা</td>
                                                    <td id="invFine"></td>
                                                </tr>
                                                <tr></tr>
                                                <tr style="border-style:hidden;">
                                                    <td style="border-style:hidden;">সর্বমোট বিল</td>
                                                    <td style="border-style:hidden;" id="invTotal"></td>
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
                                                <td><label name="Minister" id="Minister">সংশ্লিষ্ট কর্মকর্তা/কর্মচারী </label> 
                                                </td>
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
                                    
                                    <div class="col-sm-4">
                                        <div class="invContainer">
                                            <div style="border-left: 6px dotted green; height: 610px; position: absolute; left: 320px; top: 0;"></div>
                                            <div class="invHeader">
                                                <tr><img src="Content/Other/logo.png" alt="LOGO" width="55" height="55" align="left"></tr>
                                                <h3 style="margin-left: 30px!important;"> <?php echo $Municipality[0]["m_name"]; ?></h3>
                                                <p> খাগড়াছড়ি পার্বত্য জেলা </p>
                                                <h2 style="margin-left: 53px;"> ইজিবাইক রেজিস্ট্রেশন ফি</h2>
                                                <h2 style="margin-left: 60px !important;"> ব্যাংক কপি</h2>
                                            </div>

                                            <table class="invTableInfo">
                                                <tbody>

                                                <tr>
                                                    <td>বিল নং</td>
                                                    <td>:&nbsp&nbsp<label name="invBillNoB" id="invBillNoB"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>মালিকের নাম</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerNameB" id="invOwnerNameB"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>রেজিস্ট্রেশন নং</td>
                                                    <td>:&nbsp&nbsp<label name="invRegNoB" id="invRegNoB"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>অর্থ বছর</td>
                                                    <td>:&nbsp&nbsp<label name="invFiscalYearB" id="invFiscalYearB"></label></td>

                                                </tr>

                                                <tr>
                                                    <td>পরিশোধের শেষ তারিখ</td>
                                                    <td>:&nbsp&nbsp<label name="invExpiredDateB" id="invExpiredDateB"></label></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <br>

                                            <table class="invTableBill" border="1">
                                                <tbody>
                                                <tr>
                                                    <td>রেজিস্ট্রেশন ফি</td>
                                                    <td id="invRegFeeB"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>কার্ড ফি</td>
                                                    <td id="invCardFeeB"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>বকেয়া</td>
                                                    <td id="invArrearB"></td>
                                                </tr>
                                                <tr>
                                                    <td>সারচার্জ</td>
                                                    <td id="invSurChargeB"></td>
                                                </tr>
                                                <tr>
                                                    <td>জরিমানা</td>
                                                    <td id="invFineB"></td>
                                                </tr>
                                                <tr></tr>
                                                <tr style="border-style:hidden;">
                                                    <td style="border-style:hidden;">সর্বমোট বিল</td>
                                                    <td style="border-style:hidden;" id="invTotalB"></td>
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
                                                    <td><label name="Minister" id="Minister">সংশ্লিষ্ট কর্মকর্তা/কর্মচারী </label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" >মেয়র </label> </td>
                                                </tr>

                                                <tr>
                                                    <td><label name="Minister" id="Minister"> <?php echo $Municipality[0]["m_name"]; ?></label> </td>

                                                    <td align="right"><label name="Mayor" id="Mayor" ><?php echo $Municipality[0]["m_name"]; ?></label> </td>
                                                </tr>
                                            </table>


                                            <br>

                                            <div id="invBankInfoB"></div>
                                        </div>
                                    </div>
                     
                                    <div class="col-sm-4" >
                                        <div class="invContainer">

                                            <div class="invHeader">
                                                <tr><img src="Content/Other/logo.png" alt="LOGO" width="55" height="55" align="left"></tr>
                                                <h3 style="margin-left: 30px!important;"><?php echo $Municipality[0]["m_name"]; ?></h3>
                                                <p> খাগড়াছড়ি পার্বত্য জেলা </p>
                                                <h2 style="margin-left: 53px;"> ইজিবাইক রেজিস্ট্রেশন ফি</h2>
                                                <h2 style="margin-left: 60px !important;"> গ্রাহক কপি</h2>
                                            </div>

                                            <table class="invTableInfo">
                                                <tbody>

                                                <tr>
                                                    <td>বিল নং</td>
                                                    <td>:&nbsp&nbsp<label name="invBillNoC" id="invBillNoC"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>মালিকের নাম</td>
                                                    <td>:&nbsp&nbsp<label name="invOwnerNameC" id="invOwnerNameC"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>রেজিস্ট্রেশন নং</td>
                                                    <td>:&nbsp&nbsp<label name="invRegNoC" id="invRegNoC"></label></td>
                                                </tr>

                                                <tr>
                                                    <td>অর্থ বছর</td>
                                                    <td>:&nbsp&nbsp<label name="invFiscalYearC" id="invFiscalYearC"></label></td>

                                                </tr>

                                                <tr>
                                                    <td>পরিশোধের শেষ তারিখ</td>
                                                    <td>:&nbsp&nbsp<label name="invExpiredDateC" id="invExpiredDateC"></label></td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <br>

                                            <table class="invTableBill" border="1">
                                                <tbody>
                                                <tr>
                                                    <td>রেজিস্ট্রেশন ফি</td>
                                                    <td id="invRegFeeC"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>কার্ড ফি</td>
                                                    <td id="invCardFeeC"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>বকেয়া</td>
                                                    <td id="invArrearC"></td>
                                                </tr>
                                                <tr>
                                                    <td>সারচার্জ</td>
                                                    <td id="invSurChargeC"></td>
                                                </tr>
                                                <tr>
                                                    <td>জরিমানা</td>
                                                    <td id="invFineC"></td>
                                                </tr>
                                                <tr></tr>
                                                <tr style="border-style:hidden;">
                                                    <td style="border-style:hidden;">সর্বমোট বিল</td>
                                                    <td style="border-style:hidden;" id="invTotalC"></td>
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
                                                    <td><label name="Minister" id="Minister">সংশ্লিষ্ট কর্মকর্তা/কর্মচারী </label> 
                                                    </td>
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