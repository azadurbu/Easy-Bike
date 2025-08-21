<style>
.modal-body {
    max-height: 500px; 
    overflow-y: auto;

}

</style>

<!-- <style>
    body {
        -webkit-print-color-adjust: exact !important;
    }
</style> -->

<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="QRModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" style=" width: 470px; height:700px; " role="document">
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
					<img class="QR-BG" src="Content/Other/PvcBg_.png" style="height: 600px; width: 420px;">
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
										<td colspan="2">  <label for="gPresentAddress"> বর্তমান ঠিকানা </label> </td>
										<!-- <td>  <label name="gPresentAddress" id="gPresentAddress"></label> </td> -->
									</tr>
									<tr style="border: solid;border-color:red">
										<td colspan="2">  <label name="gPresentAddress" id="gPresentAddress"></label> </td>								
									</tr>

                                    <tr  style="border-color:red">
                                        <td style="float: left; width: 100%; margin-top:5px"> <img src="images/logo.png" style="width:100%"> </td>
										<td style="font-size: 25px;color: #110dea; " align="right"><label style="margin-right:10px"> খাগড়াছড়ি পৌরসভা <br>
										<label style="font-size: 18px;color: #110dea; margin-right:10px">খাগড়াছড়ি পার্বত্য জেলা।</label></label></td>
                                    </tr>
									    <!-- <td >
                                            <img class="card-sig" align="right" src="Views/sig.png" style=" width: 50px; height: 40px">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td colspan="2" align="right"> --------------</td>
                                    </tr>
                                    <tr>
                                        <td style="width:150px"><label> খাগড়াছড়ি পৌরসভা </label></td>
                                        <td  align="right"><label> মেয়র </label></td>
                                    </tr> -->
								</tbody>							
							</table>
				    	</div>
			    	</div>	
				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<label class="btn btn-primary" onclick="printQR()" value="Print Card" />Print</label>
					<!--<label  class="btn btn-primary"><a  style="color: white;" id="Html2Image" href="Content/QRCode/">Download</a></label> -->
				</div>			
			</div>
		</form>
	</div>
</div>


