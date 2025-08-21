<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="CardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog " role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Card</h4>
			</div>

		    <div class="modal-body cardFonts">
				<div id="printableAreaFront">
					<img class="card-bg" src="Content/Other/final222.png">
						<div class="card-body-front">
							<table class="cardTable" border="0">
								<tbody>

                                    <tr>
                                        <td   align="left"> <div id="photo" class="card-photo"></div></td>
                                    </tr>
                                </tbody>
							</table>
							<table class="cardTable" border="0">
								<tbody>
                                    <tr>
                                        <td align="center"> <label style=" margin-top: 105px; margin-left: 28px;width: 180px;" name="cRegNo" id="cRegNo"></label> </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="width: 180px;"><label style="margin-top: 10px; margin-left: 101px;width: 180px;" name="cOwnerName" id="cOwnerName" > </label></td>
                                    </tr>
                                    <tr>
                                        <td align="center"> <label style="margin-top: 14px; margin-left: 70px;width: 180px;" name="cRegDate" id="cRegDate"></label> </td>
                                    </tr>
                                    <tr>
                                        <td align="center"> <label style="margin-top: 13px;margin-left: 59px;width: 180px;" name="cNID" id="cNID"></label> </td>
                                    </tr>
                                    <tr>
                                        <td align="center"><label style="margin-top: 13px;margin-left: 63px;width: 180px;" name="cVregDate" id="cVregDate"></label> </td>
                                    </tr>
                                    <tr>
                                        <td>  <label for="Color">&nbsp&nbsp</label> </td>
                                        <td>  &nbsp&nbsp</td>
                                    </tr>
                                </tbody>
							</table>
				    	</div>
			    </div>	
			</div>

			<br>
			
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>-->
				<label class="btn btn-primary" onclick="printFront()" value="Print Card">Print Front</label>
			</div>

			<div class="modal-body cardFonts">
			    <div id="printableAreaBack">
				<!-- 	<img class="card-bg" src="Content/Other/bg2.png"> -->
					<div class="card-body-back">
							<div class="cardQR">
								<div class="card-qr" align="left">
									<div style="margin-left: 40px;" id="CardQRCode"></div>
								</div>
								<div class="card-qr" align="center">
                                    <div style="margin-top: -240px;margin-left: 65px;font-size: 10px;"><b>বর্তমান ঠিকানা :</b></div><br>
									<div style="margin-left: 188px;margin-top: -18px;width: 204px;font-size: 10px;" name="abcPresentAddress" id="abcPresentAddress"></div>
								</div>
								<div class="card-qr" align="center">
                                    <div style="margin-top: -228px;margin-left: 55px;font-size: 10px;"><b>স্থায়ী ঠিকানা :</b></div><br>
									<div style="margin-left: 188px;margin-top: -18px;width: 204px;font-size: 10px;" id="pErmanentAddress"></div>
								</div>
								<div class="card-qr" align="center">
                                    <div style="margin-top: -219px;margin-left: 55px;font-size: 10px;"><b>মোবাইল নং :</b></div><br>
									<div style="margin-left: 70px;margin-top: -18px;width: 204px;font-size: 10px;" id="cBMobile"></div>
								</div>
			            	</div>

			    	</div>
			    </div>
			</div>



			<br>
			<div class="modal-footer">
				<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>-->
				<label class="btn btn-primary" onclick="printBack()">Print Back</label>
			</div>
		</div>
	</div>
</div>


