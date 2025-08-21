<div class="modal-dialog" style=" width: 1000px; margin: 30px auto;" role="document">
        <form  method="post" name="ownerInvoiceView" id="ownerInvoiceView" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

            <div class="modal-content">
                <input type="hidden" name="ActionType" id="ActionType" value="View">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="OwnerCardBillReceivedCopyModal">Card</h4>
                </div>

                <div class="modal-body">
                    <div id="printableArea">
                        <div class="container">
                            <div class="row" style="padding-left:35px; padding-right:35px; ">
                                <div>
                                    <div style="padding-top:20px; float: left; width: 13%; margin-right:50px">
                                        <img src="images/logo.jpg" style="width:100%">
                                    </div>
                                    <div>
                                        <div style="padding-top:27px;">
                                            <p style="font-size:25px; color:black;"><b>খাগড়াছড়ি পৌরসভা কার্যালয়</b></p>
                                            <p style="font-size:18px; color:black;">খাগড়াছড়ি পার্বত্য জেলা। </p>
                                        </div>
                                    </div>
                                    <div>
                                        <p style="font-size:20px; padding-left:105px; padding-top: 60px; color:black;"><b>ইজিবাইক মালিকের পরিচয় পত্রের স্মার্ট কার্ড ও স্টিকার প্রাপ্তি স্বীকার:</b></p>
                                    </div>
                                    <div>
                                        <p style="font-size:20px; padding-left:10px; padding-top: 30px; color:black;"><b>ইস্যুর তারিখ:</b></p>
                                    </div>
                                    <div>
                                        <table style="width:100%; color:black;">
                                        <tr>
                                            <th style="width:45%; padding: 10px; font-size:16px; text-align: center; border: 1px solid black;"><b>মালিক ও ইজিবাইকের তথ্য</b></th>
                                            <th style="width:25%; padding: 10px; font-size:16px; text-align: center; border: 1px solid black;"><b>বিবরণ</b></th>
                                            <th style="width:10%; padding: 10px; font-size:16px; text-align: center; border: 1px solid black;"><b>সংখ্যা</b></th>
                                            <th style="width:20%; padding: 10px; font-size:16px; text-align: center; border: 1px solid black;"><b>প্রাপ্তি স্বীকার স্বাক্ষর ও তারিখ</b></th>
                                        </tr>
                                        <tr style="color:black; border: 1px solid black; line-height:220%">
                                            <td rowspan="2">
                                                <table style="width:100%">
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">রেজিস্ট্রেশন নম্বর:</th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">ইঞ্জিন নম্বর/চেচিস নম্বর:</th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">মালিকের আইডি:</th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">মালিকের নাম:</th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">পিতা:</th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">মাতা:</th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">ঠিকানা:</th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;"><br></th></tr>
                                                    <tr style="font-size:15px; color:black"><th style="padding-left: 5px;">মোবাইল নম্বর:</th></tr>
                                                </table>
                                            </td>
                                            <td style="border: 1px solid black; font-size:16px; text-align: center;"><b>ইজিবাইক স্টিকার</b></td>
                                            <td style="border: 1px solid black; font-size:16px; text-align: center;"><b>১</b></td>
                                            <td rowspan="2"></td>
                                        </tr>
                                        <tr style="color:black; border: 1px solid black;">
                                            
                                            <td style="border: 1px solid black; font-size:16px; text-align: center;"><b>মালিকের স্মার্ট কার্ড</b></td>
                                            <td style="border: 1px solid black; font-size:16px; text-align: center;"><b>১</b></td>
                                        </tr>
                                        </table>
                                    </div>
                                    <div style="padding-top: 60px; color:black;">
                                        <table>
                                            <tr>
                                                <th style="font-size:15px; padding-left:5px;">...............................</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:15px; padding-left:5px; padding-top:5px;">সংশ্লিষ্ট কর্মকর্তা/কর্মচারীর স্বাক্ষর</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size:15px; padding-left:5px;">খাগড়াছড়ি পৌরসভা।</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                        
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
