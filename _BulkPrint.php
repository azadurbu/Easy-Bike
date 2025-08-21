<?php
	$Count = $_REQUEST["count"];
?>
<style>

	body {
	    -webkit-print-color-adjust: exact !important;
	}

	@page { 

	 	size: a4;
	 	size: landscape;
	    margin: none; 

	}

	@media print
	{
	    .card.highlighted
	    {
	        background-color: seashell !important;
	    }
	}


	/*
	table{
	    border-collapse:collapse;
	}*/

	.rowBorder{
	border: 1px solid black;
	}

	/*td{
		width: 4in; 
	}	*/


	.QR-Frame{
		
		height: 320px;
		padding-top: 5px;
	}


	.QR-BODY {
	  
	/*    padding-left: 10px;
	    padding-top: 5px;
	    padding-right: 20px;
	    padding-bottom: 20px;*/
	    height: 5.5in;
	    width: 4in;
	    color: black;
	    padding-left: 4px;
	    padding-bottom: 5px;
	}

	.QRTable {
		margin-top : -50px;
	    position: absolute;
	    z-index: 3;
	    width: 380px;
	}

	.QRTable tbody tr td:first-child{
	    vertical-align: text-top;
	    padding-left: 10px;
	    padding-right: 10px;
	    width: 110px;
	}

	.QRTable tbody tr td:second-child{
	    
	    width: 300px;
	}
</style>

<button type="submit" name="submit" class="btn btn-success " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 12px !important;font-family: serif;" onclick="printPVC()" >Print
</button>
<button type="submit" name="submit" class="btn btn-info " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 12px !important;font-family: serif;" onclick="LoadData()" >Load
</button>


<div id="printableAreaPVC">

	<table style="border-collapse:collapse;" border="1">
	<?php 
		for($i = 0; $i < $Count; $i++)
		{
			if($i==0)
			{
				echo '<tr style="height: 7in;page-break-inside: avoid; white-space: nowrap;">';
				echo '<td style="width:4in; background: #ffff00;" class="qr"'.$i.' align="center">';
		?>
					<div class="QR-BODY">
							<table class="QRTable" style="border-collapse: collapse;color: #ff0000;">
								<tbody>
									
									<tr >
										<td colspan="2" style="border: dashed;"> 
											
												<div class="QR-Frame" align="center">
													<div id="<?php echo "QrCode-".$i; ?>"></div>
												</div>
								            
								        </td>
									</tr>
									<tr >
										<td colspan="2" > &nbsp&nbsp </td>
									</tr>
								
									<tr style="border: solid;">
										<td>  <label for="<?php echo "gOwnerName-".$i; ?>"> মালিকের নাম </label></td>
										<td>  :&nbsp&nbsp<label name="<?php echo "gOwnerName-".$i; ?>" id="<?php echo "gOwnerName-".$i; ?>" > </label></td>
									</tr>
									<tr style="border: solid;">
										<td>  <label for="<?php echo "gRegNo-".$i; ?>"> পৌর রেজি নং</label> </td>
										<td>  :&nbsp&nbsp<label name="<?php echo "gRegNo-".$i; ?>" id="<?php echo "gRegNo-".$i; ?>"></label> </td>
									</tr>
					
									<tr style="border: solid;">
										<td>  <label for="<?php echo "gMobileNo-".$i; ?>"> মোবাইল নং </label> </td>
										<td>  :&nbsp&nbsp<label name="<?php echo "gMobileNo-".$i; ?>" id="<?php echo "gMobileNo-".$i; ?>"></label> </td>
									</tr>

									<tr style="border: solid;">
										<td>  <label for="<?php echo "gPresentAddress-".$i; ?>"> বর্তমান ঠিকানা </label> </td>
										<td>  <label name="<?php echo "gPresentAddress-".$i; ?>" id="<?php echo "gPresentAddress-".$i; ?>"></label> </td>
									</tr>
							

									<tr style="height: 50px;">
										<td colspan="2" > 
										    <img class="card-sig" align="right" src="sig.png" style=" width: 30px; height: 53px"> 
										</td>
									</tr>
									<tr>
										<td colspan="2" align="right">  ------------------------------------- </td>
									</tr>
									<tr>
										<td colspan="2" align="right"><label> মেয়র </label></td>
									</tr>
									<tr>
										<td colspan="2" align="right"><label> খাগড়াছড়ি পৌরসভা </label></td>
									</tr>
								</tbody>							
							</table>
				    </div>
		<?php
				echo'</td>';
			}
			else if($i%3==0)
			{
				echo '</tr>';
				echo '<tr style="height: 7in;page-break-inside: avoid; white-space: nowrap;">';
				echo '<td style="width:4in; background: #ffff00;" class="qr"'.$i.'  align="center" >';
		?>
					<div class="QR-BODY">
						<table class="QRTable" style="border-collapse: collapse;color: #ff0000;">
							<tbody>
								
								<tr >
									<td colspan="2" style="border: dashed; "> 
										
											<div class="QR-Frame" align="center">
												<div id="<?php echo "QrCode-".$i; ?>"></div>
											</div>
							            
							        </td>
								</tr>
								<tr >
									<td colspan="2" > &nbsp&nbsp </td>
								</tr>
							
								<tr style="border: solid;">
									<td>  <label for="<?php echo "gOwnerName-".$i; ?>">মালিকের নাম </label></td>
									<td>  :&nbsp&nbsp<label name="<?php echo "gOwnerName-".$i; ?>" id="<?php echo "gOwnerName-".$i; ?>" > </label></td>
								</tr>
								<tr style="border: solid;">
									<td>  <label for="<?php echo "gRegNo-".$i; ?>">পৌর রেজি নং</label> </td>
									<td>  :&nbsp&nbsp<label name="<?php echo "gRegNo-".$i; ?>" id="<?php echo "gRegNo-".$i; ?>"></label> </td>
								</tr>
				
								<tr style="border: solid;">
									<td>  <label for="<?php echo "gMobileNo-".$i; ?>"> মোবাইল নং </label> </td>
									<td>  :&nbsp&nbsp<label name="<?php echo "gMobileNo-".$i; ?>" id="<?php echo "gMobileNo-".$i; ?>"></label> </td>
								</tr>

								<tr style="border: solid;">
									<td>  <label for="<?php echo "gPresentAddress-".$i; ?>"> বর্তমান ঠিকানা </label> </td>
									<td>  <label name="<?php echo "gPresentAddress-".$i; ?>" id="<?php echo "gPresentAddress-".$i; ?>"></label> </td>
								</tr>

						
                                <tr style="height: 50px;">
									<td colspan="2" > 
									    <img class="card-sig" align="right" src="sig.png" style=" width: 30px; height: 53px"> 
									</td>
								</tr>
								<tr>
									<td colspan="2" align="right">  ------------------------------------- </td>
								</tr>
								<tr>
									<td colspan="2" align="right"><label> মেয়র </label></td>
								</tr>
								<tr>
									<td colspan="2" align="right"><label> খাগড়াছড়ি পৌরসভা </label></td>
								</tr>
							</tbody>							
						</table>
				    </div>
		<?php
				echo '</td>';
			}
			else
			{
				echo '<td style="width:4in; background: #ffff00;" class="qr"'.$i.'  align="center">';
		?>
					<div class="QR-BODY">
						<table class="QRTable" style="border-collapse: collapse;color: #ff0000;">
							<tbody>
								
								<tr >
									<td colspan="2" style="border: dashed;"> 
										
											<div class="QR-Frame" align="center">
												<div id="<?php echo "QrCode-".$i; ?>"></div>
											</div>
							            
							        </td>
								</tr>
								<tr >
									<td colspan="2" > &nbsp&nbsp </td>
								</tr>
							
								<tr style="border: solid;">
									<td>  <label for="<?php echo "gOwnerName-".$i; ?>">মালিকের নাম </label></td>
									<td>  :&nbsp&nbsp<label name="<?php echo "gOwnerName-".$i; ?>" id="<?php echo "gOwnerName-".$i; ?>" > </label></td>
								</tr>
								<tr style="border: solid;">
									<td>  <label for="<?php echo "gRegNo-".$i; ?>">পৌর রেজি নং</label> </td>
									<td>  :&nbsp&nbsp<label name="<?php echo "gRegNo-".$i; ?>" id="<?php echo "gRegNo-".$i; ?>"></label> </td>
								</tr>
				
								<tr style="border: solid;">
									<td>  <label for="<?php echo "gMobileNo-".$i; ?>"> মোবাইল নং </label> </td>
									<td>  :&nbsp&nbsp<label name="<?php echo "gMobileNo-".$i; ?>" id="<?php echo "gMobileNo-".$i; ?>"></label> </td>
								</tr>

								<tr style="border: solid;">
									<td>  <label for="<?php echo "gPresentAddress-".$i; ?>"> বর্তমান ঠিকানা </label> </td>
									<td>  <label name="<?php echo "gPresentAddress-".$i; ?>" id="<?php echo "gPresentAddress-".$i; ?>"></label> </td>
								</tr>

						
                                <tr style="height: 50px;">
									<td colspan="2" > 
									    <img class="card-sig" align="right" src="sig.png" style=" width: 30px; height: 53px"> 
									</td>
								</tr>
								<tr>
									<td colspan="2" align="right">  ------------------------------------- </td>
								</tr>
								<tr>
									<td colspan="2" align="right"><label> মেয়র </label></td>
								</tr>
								<tr>
									<td colspan="2" align="right"><label> খাগড়াছড়ি পৌরসভা </label></td>
								</tr>
							</tbody>							
						</table>
				    </div>
		<?php
				echo '</td>';
			}

		}
	?>

	</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="jquery.qrcode.min.js"></script>

<script>



function printPVC() {


    var printContents = document.getElementById('printableAreaPVC').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}


function LoadData()
{

	var IP = "http://localhost/EasyBike/";
	var URLCheck = IP+"Check.php?";
	var URLVehicle = IP+"API/ApiHendlar_Vehicle.php?";




    $.ajax({

        url : URLVehicle+'action=GetAllVehicle',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        async:false,
        success: function(data)
        {
        	var i = 0;
        	$.each(data, function(key, value)
	        {
	        	    var url = URLCheck+"code="+value["v_code"];
				    //var url = "hello";
				    //alert(url);

				    jQuery('#QrCode-'+i).html('');

				    jQuery('#QrCode-'+i).qrcode({

				        render	: "canvas",
				        width: 350,
				        height: 310,
				        text	: url
				    });


				    var canvas = $('#QrCode-'+i+' canvas');
				    var img = $(canvas)[0].toDataURL("image/png");
				    var qrCodeImg = '<img src="'+img+'"/>';
				    document.getElementById("QrCode-"+i).innerHTML = qrCodeImg;


	            document.getElementById("gOwnerName-"+i).innerHTML = value["o_name"];
	            document.getElementById("gRegNo-"+i).innerHTML = value["v_reg_no"];
	            document.getElementById("gMobileNo-"+i).innerHTML = value["o_mobile"];


	            var PresentAddress = ":&nbsp&nbspহোল্ডিং নং : "+value["o_holding_no"] + ", গ্রাম/মহল্লা : "+value["area"] + ", ওয়ার্ড নং : " + value["ward_no"] +", পৌরসভা  :"+value["sub_division"] + ", জেলা : " + value["division"];

	            document.getElementById("gPresentAddress-"+i).innerHTML = PresentAddress;
	            i++;
	        });

        	
          	// 

           //  document.getElementById("gRegNo").innerHTML = data[0]["v_reg_no"];
           //  document.getElementById("gMobileNo").innerHTML = data[0]["o_mobile"];


           //  var cDivID = data[0]["c_division"];
           //  var cDivision = GetDivisionByDivID(cDivID);


           //  var cSubDivID = data[0]["c_sub_division"];
           //  var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


           //  var cWardID = data[0]["c_ward_no"];
           //  var cWard = GetWardByWardID(cWardID);



           //  var cAreaID = data[0]["c_vill"];
           //  var cArea = GetAreaByAreaID(cAreaID);

           //  var PresentAddress = ":&nbsp&nbspহোল্ডিং নং : "+data[0]["o_holding_no"] + ", গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", জেলা : " + cDivision;
           //  $("#viewOwner textarea[name=gPresentAddress]").val(PresentAddress);

           //  document.getElementById("gPresentAddress").innerHTML = PresentAddress;

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("LoadData - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
}

</script>