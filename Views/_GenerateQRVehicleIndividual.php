<link rel="icon" href="images/favicon.ico" type="image/ico" />

<title>Easy Bike | </title>

<link href="./Custom/CSS/myStyle.css" rel="stylesheet">

    <script src="./Theme/vendors/jquery/dist/jquery.min.js"></script>
	<script src="./Custom/jquery.qrcode.min.js"></script>
    <script src="./Custom/JS/common.js"></script>

<style>
    body {
        -webkit-print-color-adjust: exact !important;
    }
</style>
<br><br><br><br><br><br>
<div class="QR-Frame" align="center">
	<div id="QRCode"></div>
</div>

<div class="modal fade" id="QRModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form  method="post" name="qr" id="qr" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			<div class="modal-content">
		
			<!-- 	<input type="hidden" name="DocType" id="DocType" value="EditOWN"> -->
				<input type="hidden" name="ActionType" id="ActionType" value="Insert">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">QR Code</h4>
				</div>

				<div class="modal-body">
					<div id="printableAreaQR">
					<img class="QR-BG" src="Content/Other/PvcBg.png">
						<div class="QR-BODY">
							<table class="QRTable" border="0" style="background: #ffff00;">
								<tbody>
									
									<tr >
										<td colspan="2" style="border: dashed;border-color:red">
											
												<div class="QR-Frame" align="center">
													<div id="QRCode"></div>
												</div>
								            
								        </td>
									</tr>
									<tr >
										<td colspan="2" > &nbsp&nbsp </td>
									</tr>
								
									<tr style="border: solid;border-color:red">
										<td>  <label for="gOwnerName"> নাম </label></td>
										<td>  :&nbsp&nbsp<label name="gOwnerName" id="gOwnerName" > </label></td>
									</tr>
									<tr style="border: solid;border-color:red">
										<td>  <label for="gRegNo"> পৌর রেজি নং</label> </td>
										<td>  :&nbsp&nbsp<label name="gRegNo" id="gRegNo"></label> </td>
									</tr>
					
									<tr style="border: solid;border-color:red">
										<td>  <label for="gMobileNo"> মোবাইল নং </label> </td>
										<td>  :&nbsp&nbsp<label name="gMobileNo" id="gMobileNo"></label> </td>
									</tr>

									<tr style="border: solid;border-color:red">
										<td>  <label for="gPresentAddress"> বর্তমান ঠিকানা </label> </td>
										<td>  <label name="gPresentAddress" id="gPresentAddress"></label> </td>
									</tr>


                                    <tr style="height: 50px; border-color:red">
                                        <td > <img class="card-logo" align="left" src="Content/Other/logo.png" style=" height: 50px; width: 55px;margin-top: 6px;"> </td>
                                        <td >
                                            <img class="card-sig" align="right" src="Views/sig.png" style=" width: 50px; height: 40px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"> --------------</td>
                                    </tr>
                                    <tr>
                                        <td style="width:150px"><label> খাগড়াছড়ি পৌরসভা </label></td>
                                        <td  align="right"><label> মেয়র </label></td>
                                    </tr>
								</tbody>							
							</table>
				    	</div>
			    </div>	
				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<label class="btn btn-primary" onclick="printQR()" value="Print Card" />Print</label>
		<!-- 			<label  class="btn btn-primary"><a  style="color: white;" id="Html2Image" href="Content/QRCode/">Download</a></label> -->
				</div>
			
			</div>
		</form>
	</div>
</div>