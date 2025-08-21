<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="CardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog " role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Card</h4>
			</div>

		    <div class="modal-body">
				<div id="printableAreaFront">
					<img class="card-bg" src="Content/Other/final222.png">
						<div class="card-body-front">
							<table class="cardTable" border="0">
								<tbody>
                                    <tr>
                                        <td   align="right"> <div id="photo" class="card-photo" style="	margin-top: 33px; margin-right: 21px;"></div></td>
                                    </tr>
                                </tbody>
							</table>
							<table class="cardTable" border="0" style="line-height:40%; width:70%" >
								<tr>
									<th> <p style=" padding-top:80px; padding-left:5px; font-size: 11px "> ইজিবাইক রেজিস্ট্রেশন নং:</p></th>
									<td> <label style=" font-weight: normal;  font-size: 10px; padding-top:72px" name="cRegNo" id="cRegNo"></label> </td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px"> মালিকের নাম:</p></th>
									<td><label style=" font-weight: normal;  font-size: 10px" name="cOwnerName" id="cOwnerName" > </label></td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px">  পিতার নাম:</p></th>
									<td><label style=" font-weight: normal;  font-size: 10px" name="cFathersName" id="cFathersName" > </label></td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px"> মালিকের আইডি:</p></th>
									<td><label style=" font-weight: normal;  font-size: 10px" name="OwnerId" id="OwnerId" > </label></td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px"> রেজিস্ট্রেশন তারিখ:</p></th>
									<td><label style="  font-weight: normal; font-size: 10px" name="cVregDate" id="cVregDate"></label> </td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px"> কার্ড ইস্যুর তারিখ:</p></th>
									<td><label style="  font-weight: normal; font-size: 10px" name="cardissuedate" id="cardissuedate"></label> </td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px"> রং:</p></th>
									<td><label style="  font-weight: normal; font-size: 10px " name="color" id="color"></label> </td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px"> ইঞ্জিন নম্বর/চেচিস নম্বর:</p></th>
									<td><label style="  font-weight: normal; font-size: 10px" name="chassisno" id="chassisno"></label> </td>
								</tr>
								<tr>
									<th> <p style="padding-left:10px; font-size: 11px"> মালিকের এনআইডি নং:</p></th>
									<td> <label style=" font-weight: normal;  font-size: 10px" name="cNID" id="cNID"></label> </td>
								</tr>
								<tr>
									<td>  <label for="Color">&nbsp&nbsp</label> </td>
									<td>  &nbsp&nbsp</td>
								</tr>
							</table>
				    	</div>
			    </div>	
			</div>

			<br>
			
			<div class="modal-footer">
				<label class="btn btn-primary" onclick="printFront()" value="Print Card">Print Front</label>
			</div>

			<div class="modal-body cardFonts">
			    <div id="printableAreaBack">
				<img class="card-bg" src="Content/Other/backphoto.png">
					<div class="card-body-back">
							<div class="cardQR">
								<div class="card-qr" align="left">
									<div style="margin-left: 40px;" id="CardQRCode"></div>
								</div>
								<div class="card-qr" align="center">
                                    <div style="margin-top: -170px;margin-left: 65px;font-size: 14px;"><b>মালিকের ঠিকানা:</b></div><br>
									<div style="margin-left: 95px;margin-top: -18px;width: 204px;font-size: 10px;" name="abcPresentAddress" id="abcPresentAddress"></div>
								</div>
								<div class="card-qr" align="center" style="display:none">
                                    <div style="margin-top: -228px;margin-left: 55px;font-size: 10px;"><b>স্থায়ী ঠিকানা :</b></div><br>
									<div style="margin-left: 188px;margin-top: -18px;width: 204px;font-size: 10px;" id="pErmanentAddress"></div>
								</div>
								<div class="card-qr">
                                    <div style="margin-top: -140px;margin-left: 200px;font-size: 12px;"><b>মোবাইল নম্বর:</b></div><br>
									<div style="margin-left: 290px;margin-top: -34px;width: 204px;font-size: 10px;" id="cBMobile"></div>
								</div>
								<div style="text-align:center; margin-top: -105px;margin-left: 70px;font-size: 12px;"><p><b>কার্ডটি হারিয়ে গেলে বা খুঁজে পাওয়া গেলে ০৩৭১-৬১৯২৭ নম্বরে বা খাগড়াছড়ি পৌরসভায় যোগাযোগ করুন।</b></p></div>
			            	</div>

			    	</div>
			    </div>
			</div>

			<br>
			<div class="modal-footer">
				<label class="btn btn-primary" onclick="printBack()">Print Back</label>
			</div>
		</div>
	</div>
</div>


