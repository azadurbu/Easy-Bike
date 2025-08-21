<div class="modal fade" id="OwnerTrnsInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style=" width: 1100px; margin: 30px auto" role="document">
        <form  method="post" name="OwnerTrnsInvoiceView" id="OwnerTrnsInvoiceView" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="modal-content">
                <input type="hidden" name="ActionType" id="ActionType" value="View">
        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Invoice</h4>
                </div>

                <div class="modal-body">
                    <div id="errorMessage"></div>
                    <div id="printableAreaInvoice">
                        <div class="container">
                            <div class="row" style="padding:30px">
                                <?php for($i=1; $i<=3; $i++){?>
                                    <div class="col-sm-4">
                                        <div>
                                            <div style="float: left; width: 20%; padding: 2px;">
                                                <img src="images/logo.jpg" style="width:100%">
                                            </div>
                                            <div>
                                                <div>
                                                    <p style="font-size:18px; color:black;">খাগড়াছড়ি পৌরসভা কার্যালয়</p>
                                                    <p style="font-size:15px; text-align: center; color:black;">খাগড়াছড়ি পার্বত্য জেলা। </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p style="font-size:15px; text-align: center; padding-top: 25px; color:black;">ইজিবাইক মালিকানা পরিবর্তন ফি:</p>
                                            <?php 
                                            if($i == 1) {echo '<p style="font-size:15px; text-align: center; color:black;">ব্যাংক কপি</p>';}
                                            else if($i == 2) {echo '<p style="font-size:15px; text-align: center; color:black;">পৌরসভা কপি</p>';}
                                            else if($i == 3) {echo '<p style="font-size:15px; text-align: center; color:black;">গ্রাহক কপি</p>';}
                                            ?>
                                        </div>
                                        <div style="padding-top: 25px; color:black; line-height:180%;">
                                            <table>
                                                <tr>
                                                    <th style="width:60%"> বিল নম্বর:</th>
                                                    <td><div class="invOwnerTrnsBillNoC"></div></td>
                                                </tr>
                                                <tr>
                                                    <th>রেজিস্ট্রেশন নম্বর:</th>
                                                    <td><div class="invOwnerTrnsRegNoC"></div></td>
                                                </tr>
                                                <tr>
                                                    <th>মালিকের  নাম:</th>
                                                    <td><div class="invTrnsOwnerNameC"></div></td>
                                                </tr>
                                                <tr>
                                                    <th>মালিকের  আইডি:</th>
                                                    <td><div class="ownerid"></div></td>
                                                </tr>
                                                <tr>
                                                    <th>অর্থ বছর:</th>
                                                    <td><div class="fiscalYear"></div></td>
                                                </tr>
                                                <tr>
                                                    <th>বিল ইস্যুর তারিখ:</th>
                                                    <td><div class="idate"></div></td>
                                                </tr>
                                                <tr>
                                                    <th>বিল পরিশোধের তারিখ:</th>
                                                    <td><div class="billporisodhtarikh"></div></td>
                                                </tr>                                          
                                            </table>
                                        </div>
                                        <div style="padding-top: 8px; color:black;">
                                            <table id="t02" style="width:100%">
                                                <tr>
                                                    <th style="border: 1px solid black; border-collapse: collapse;">মালিকানা পরিবর্তন ফি</th>
                                                    <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse; padding-right:3px"><div class="ownertransfee"></div></td>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid black; border-collapse: collapse;">জরিমানা</th>
                                                    <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse"></td>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid black; border-collapse: collapse;">সারচার্জ</th>
                                                    <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse"></td>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid black; border-collapse: collapse;">বিবিধ</th>
                                                    <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse"></td>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid black; border-collapse: collapse;"><br></th>
                                                    <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse;"></td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: right; border: 1px solid black; border-collapse: collapse">  সর্বমোট বিল=</th>
                                                    <td style="width:40%; text-align: right; border: 1px solid black; border-collapse: collapse; padding-right:3px"><div class="ownertransfee"></div></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div style="padding-top: 60px; color:black;">
                                                    <table>
                                                        <tr>
                                                            <th>...............................</th>
                                                        </tr>
                                                        <tr>
                                                            <th>সংশ্লিষ্ট কর্মকর্তা/কর্মচারীর স্বাক্ষর</th>
                                                        </tr>
                                                        <tr>
                                                            <th>খাগড়াছড়ি পৌরসভা।</th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-sm-3" style="padding-top: 30px; color:black;">
                                                <table style="width:100%">
                                                    <tr>
                                                        <th style="height:-100px; float:right; padding-bottom: 5px; padding-right:1px">                                
                                                            <img class="card-sig" src="Views/sig.png" style=" width: 50px; height: 41px">              
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="float:left;">মেয়র</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="float:left;">খাগড়াছড়ি পৌরসভা</th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div style="padding-top: 30px; color:black;">
                                            <table id="t03" style="width:100%">
                                                <tr>
                                                    <th style="text-align: center; border: 1px solid black; border-collapse: collapse;">ব্যাংকের নাম</th>
                                        
                                                    <th style="text-align: center; border: 1px solid black; border-collapse: collapse;">শাখার নাম</th>
                            
                                                    <th style="text-align: center; border: 1px solid black; border-collapse: collapse;">হিসাব নম্বর</th>
                                                </tr>
                                                <tr>
                                                    <td style="width:45%; padding: 8px; text-align: center; border: 1px solid black; border-collapse: collapse;"> <div class="bankname"></div></td>
                                                    <td style="width:35%; padding: 8px; text-align: center; border: 1px solid black; border-collapse: collapse;"> <div class="branchname"></div></td>
                                                    <td style="width:20%; padding: 8px; text-align: center; border: 1px solid black; border-collapse: collapse;"> <div class="accnumber"></div></td>
                                                </tr>
                                            </table>
                                        </div>
                                
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>   
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <label class="btn btn-primary" onclick="printInvoice()" value="Print Card" />Print</label>
                </div>
            </div>
        </form>
    </div> 
</div>    