
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="DriverCardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Card</h4>
            </div>

            <div class="modal-body">
                <div id="printableAreaFront">
                    <img class="card-bg" src="Content/Other/Driverbg.png">
                    <div class="card-body-front">
                        <table class="cardTable" border="0">
                            <tbody>
                            <tr>
                                <td  rowspan="3"><img class="card-logo" src="Content/Other/khagrachari-logo.gif"></td>
    							<td></td>
    							<td></td>
                            </tr>
    						<tr >
    							<td colspan="2"><h4 style="margin-left: 14px !important; margin-bottom:-20px !important;">&nbsp<?php echo $Municipality[0]["m_name"]; ?> <h4></td>
    						</tr>
                            <tr>
                                <td colspan="2" style ="padding-left: 55px;">&nbspখাগড়াছড়ি পার্বত্য জেলা </td>
                            </tr>
                            
                            <tr>
                                <td colspan="3" style="padding-left: 140px !important; "><label style="text-decoration:underline;">ইজিবাইক চালকের পরিচয়পত্র</label></td>
                            </tr>
                           
                            <tr>
                                <td >  <label for="cDriverLicNo">পরিচিতি নং</label> </td>
                                <td>  :&nbsp&nbsp<label name="cDriverLicNo" id="cDriverLicNo"></label> </td>
                              
                                <td rowspan="4" align="center"> <div id="photo" class="card-photo"></div></td>
                            </tr>
                            <tr>
                                <td>  <label for="driverName">নাম </label></td>
                                <td>  :&nbsp&nbsp<label name="cDriverName" id="cDriverName" > </label></td>
                               
                            </tr>
                            <tr>
                                <td>  <label for="FatherName">পিতার নাম</label> </td>
                                <td>  :&nbsp&nbsp<label name="cFatherName" id="cFatherName"></label> </td>
                            </tr>
                            <tr>
                                <td>  <label for="FatherName">মাতার নাম</label> </td>
                                <td>  :&nbsp&nbsp<label name="cMotherName" id="cMotherName"></label> </td>
                            </tr>
                            <tr>
                                <td>  <label for="cDriverNID">এনআইডি</label> </td>
                                <td>  :&nbsp&nbsp<label name="cDriverNID" id="cDriverNID"></label> </td>
                                 <td rowspan="3" align="center">  <img class="card-sig" src="Content/Other/sig.png"><br>-------------------</td>
                            </tr>
                            <tr>
                                <td>  <label for="cDriverDOB">জন্মতারিখ</label> </td>
                                <td>  :&nbsp&nbsp<label name="cDriverDOB" id="cDriverDOB"></label> </td>
                               
                            </tr>
                            <tr>
                                <td>  <label for="cDriverBloodG">রক্তের গ্রূপ</label> </td>
                                <td>  :&nbsp&nbsp<label name="cDriverBloodG" id="cDriverBloodG"></label> </td>
                            </tr><!--
                            <tr>
                                <td>  &nbsp</td>
                                <td>  &nbsp </td>
                                <td align="center" >  ------------------- </td>

                            </tr>-->
                            <tr style="margin-top:-20px;">
                                <td>  &nbsp</td>
                                <td>  &nbsp </td>
                                <td align="center">মেয়র</td>
                            </tr>
                            <tr>
                                <td>  &nbsp</td>
                                <td>  &nbsp </td>
                                <td align="center" ><?php echo $Municipality[0]["m_name"]; ?></td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <label class="btn btn-primary" onclick="printFront()" value="Print Card" />Print Front</label>
            </div>

            <div class="modal-body">
                <div id="printableAreaBack">
                    <!-- 	<img class="card-bg" src="Content/Other/bg2.png"> -->
                    <div class="card-body-back">
                        <div class="cardQR">
                            <div class="card-qr" align="center">
                                <div id="CardQRCode"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <label class="btn btn-primary" onclick="printBack()">Print Back</label>
            </div>
        </div>
    </div>
</div>


