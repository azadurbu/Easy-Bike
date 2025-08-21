<?php
$Count = $_REQUEST["count"];
?>
<style>

    body {
        -webkit-print-color-adjust: exact !important;
    }

    @page {

        size: 12in 12in;
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

        height: 300px;
        margin-top: 10px;
    }


    .QR-BODY {

        /*    padding-left: 10px;
            padding-top: 5px;
            padding-right: 20px;
            padding-bottom: 20px;*/
        height: 6in;
        width: 6in;
        color: black;
        padding-left: 4px;
        padding-bottom: 5px;
    }

    .QRTable {
        margin-top : 317px;
        position: absolute;
        z-index: 3;
        width: 570px;
    }

    .QRTableDot {
        margin-top : -10px;
        margin-left: 94px;
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

<button type="submit" name="submit" class="btn btn-success " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 12px !important; font-family: sans-serif !important;" onclick="printPVC()" >Print
</button>
<button type="submit" name="submit" class="btn btn-info " id="rptbtn" style="float: right !important;height: 39px !important;width: 73px !important; font-size: 12px !important; font-family: sans-serif !important;" onclick="LoadData()" >Load
</button>


<div id="printableAreaPVC">

    <table style="border-collapse:collapse;" border="1">
        <?php
        for($i = 0; $i < $Count; $i++)
        {
            if($i==0)
            {
                echo '<tr style="height: 9in;page-break-inside: avoid; white-space: nowrap;">';
                echo '<td style="width:6in; background: #ffff00;" class="qr"'.$i.' align="center">';
                ?>

                <h1 style="margin-top: -111px; font-size: 46px;color: red;">ইজিবাইক / টমটম </h1>
                <div class="QR-BODY">
                    <table class="QRTableDot" style="border-collapse: collapse;">
                        <tbody>
                        <tr >
                            <td colspan="2" style="border: dashed;border-color:red; ">

                                <div class="QR-Frame" align="center">
                                    <div id="<?php echo "QrCode-".$i; ?>"></div>
                                </div>

                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="QRTable" style="border-collapse: collapse;">

                        <tbody>
                        <tr >
                            <td colspan="2" > &nbsp&nbsp </td>
                        </tr>

                        <tr style="border: solid; border-color:red;">
                            <td style="font-size: 25px;width:150px;">  <label for="<?php echo "gOwnerName-".$i; ?>"> মালিকের নাম </label></td>
                            <td style="font-size: 25px;width:150px;">  :&nbsp&nbsp<label name="<?php echo "gOwnerName-".$i; ?>" id="<?php echo "gOwnerName-".$i; ?>" > </label></td>
                        </tr>
                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:150px;"> <label for="<?php echo "gRegNo-".$i; ?>"> পৌর রেজি নং</label> </td>
                            <td style="font-size: 25px;width:150px;">  :&nbsp&nbsp<label name="<?php echo "gRegNo-".$i; ?>" id="<?php echo "gRegNo-".$i; ?>"></label> </td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:150px;">  <label for="<?php echo "gMobileNo-".$i; ?>"> মোবাইল নং </label> </td>
                            <td style="font-size: 25px;width:150px;"> :&nbsp&nbsp<label name="<?php echo "gMobileNo-".$i; ?>" id="<?php echo "gMobileNo-".$i; ?>"></label> </td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:180px;"> <label for="<?php echo "gPresentAddress-".$i; ?>"> বর্তমান ঠিকানা </label> </td>
                            <td>:&nbsp&nbsp</td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td colspan="2" style="font-size: 25px;width:150px;"> <label name="<?php echo "gPresentAddress-".$i; ?>" id="<?php echo "gPresentAddress-".$i; ?>"></label> </td>
                        </tr>


                        <tr style="height: 50px; border-color:red">
                            <td > <img class="card-logo" align="left" src="logo.png" style=" height: 94px; width: 94px;margin-top: 20px; margin-left: 20px;"> </td>
                            <td style="font-size: 34px;color: #110dea;" align="right"><label> খাগড়াছড়ি পৌরসভা <br><label style="font-size: 25px;color: #110dea;margin-right: 15px;">খাগড়াছড়ি পার্বত্য জেলা</label></label></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                echo'</td>';
            }
            else if($i%2==0)
            {
                echo '</tr>';
                echo '<tr style="height: 9in;page-break-inside: avoid; white-space: nowrap;">';
                echo '<td style="width:6in; background: #ffff00;" class="qr"'.$i.'  align="center" >';
                ?>

                <h1 style="margin-top: -111px; font-size: 46px;color: red;">ইজিবাইক / টমটম </h1>
                <div class="QR-BODY">
                    <table class="QRTableDot" style="border-collapse: collapse;">
                        <tbody>
                        <tr >
                            <td colspan="2" style="border: dashed;border-color:red; ">

                                <div class="QR-Frame" align="center">
                                    <div id="<?php echo "QrCode-".$i; ?>"></div>
                                </div>

                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="QRTable" style="border-collapse: collapse;">

                        <tbody>
                        <tr >
                            <td colspan="2" > &nbsp&nbsp </td>
                        </tr>

                        <tr style="border: solid; border-color:red;">
                            <td style="font-size: 25px;width:150px;">  <label for="<?php echo "gOwnerName-".$i; ?>"> মালিকের নাম </label></td>
                            <td style="font-size: 25px;width:150px;">  :&nbsp&nbsp<label name="<?php echo "gOwnerName-".$i; ?>" id="<?php echo "gOwnerName-".$i; ?>" > </label></td>
                        </tr>
                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:150px;"> <label for="<?php echo "gRegNo-".$i; ?>"> পৌর রেজি নং</label> </td>
                            <td style="font-size: 25px;width:150px;">  :&nbsp&nbsp<label name="<?php echo "gRegNo-".$i; ?>" id="<?php echo "gRegNo-".$i; ?>"></label> </td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:150px;">  <label for="<?php echo "gMobileNo-".$i; ?>"> মোবাইল নং </label> </td>
                            <td style="font-size: 25px;width:150px;"> :&nbsp&nbsp<label name="<?php echo "gMobileNo-".$i; ?>" id="<?php echo "gMobileNo-".$i; ?>"></label> </td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:180px;"> <label for="<?php echo "gPresentAddress-".$i; ?>"> বর্তমান ঠিকানা </label> </td>
                            <td>:&nbsp&nbsp</td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td colspan="2" style="font-size: 25px;width:150px;"> <label name="<?php echo "gPresentAddress-".$i; ?>" id="<?php echo "gPresentAddress-".$i; ?>"></label> </td>
                        </tr>


                        <tr style="height: 50px; border-color:red">
                            <td > <img class="card-logo" align="left" src="logo.png" style=" height: 94px; width: 94px;margin-top: 20px; margin-left: 20px;"> </td>
                            <td style="font-size: 34px;color: #110dea;" align="right"><label> খাগড়াছড়ি পৌরসভা <br><label style="font-size: 25px;color: #110dea;margin-right: 15px;">খাগড়াছড়ি পার্বত্য জেলা</label></label></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                echo '</td>';
            }
            else
            {
                echo '<td style="width:6in; background: #ffff00;" class="qr"'.$i.'  align="center">';
                ?>

                <h1 style="margin-top: -111px; font-size: 46px;color: red;">ইজিবাইক / টমটম </h1>
                <div class="QR-BODY">
                    <table class="QRTableDot" style="border-collapse: collapse;">
                        <tbody>
                        <tr >
                            <td colspan="2" style="border: dashed;border-color:red; ">

                                <div class="QR-Frame" align="center">
                                    <div id="<?php echo "QrCode-".$i; ?>"></div>
                                </div>

                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="QRTable" style="border-collapse: collapse;">

                        <tbody>
                        <tr >
                            <td colspan="2" > &nbsp&nbsp </td>
                        </tr>

                        <tr style="border: solid; border-color:red;">
                            <td style="font-size: 25px;width:150px;">  <label for="<?php echo "gOwnerName-".$i; ?>"> মালিকের নাম </label></td>
                            <td style="font-size: 25px;width:150px;">  :&nbsp&nbsp<label name="<?php echo "gOwnerName-".$i; ?>" id="<?php echo "gOwnerName-".$i; ?>" > </label></td>
                        </tr>
                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:150px;"> <label for="<?php echo "gRegNo-".$i; ?>"> পৌর রেজি নং</label> </td>
                            <td style="font-size: 25px;width:150px;">  :&nbsp&nbsp<label name="<?php echo "gRegNo-".$i; ?>" id="<?php echo "gRegNo-".$i; ?>"></label> </td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:150px;">  <label for="<?php echo "gMobileNo-".$i; ?>"> মোবাইল নং </label> </td>
                            <td style="font-size: 25px;width:150px;"> :&nbsp&nbsp<label name="<?php echo "gMobileNo-".$i; ?>" id="<?php echo "gMobileNo-".$i; ?>"></label> </td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td style="font-size: 25px;width:180px;"> <label for="<?php echo "gPresentAddress-".$i; ?>"> বর্তমান ঠিকানা </label> </td>
                            <td>:&nbsp&nbsp</td>
                        </tr>

                        <tr style="border: solid; border-color:red">
                            <td colspan="2" style="font-size: 25px;width:150px;"> <label name="<?php echo "gPresentAddress-".$i; ?>" id="<?php echo "gPresentAddress-".$i; ?>"></label> </td>
                        </tr>


                        <tr style="height: 50px; border-color:red">
                            <td > <img class="card-logo" align="left" src="logo.png" style=" height: 94px; width: 94px;margin-top: 20px; margin-left: 20px;"> </td>
                            <td style="font-size: 34px;color: #110dea;" align="right"><label> খাগড়াছড়ি পৌরসভা <br><label style="font-size: 25px;color: #110dea;margin-right: 15px;">খাগড়াছড়ি পার্বত্য জেলা</label></label></td>
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
                        height: 290,
                        text	: url
                    });


                    var canvas = $('#QrCode-'+i+' canvas');
                    var img = $(canvas)[0].toDataURL("image/png");
                    var qrCodeImg = '<img src="'+img+'"/>';
                    document.getElementById("QrCode-"+i).innerHTML = qrCodeImg;


                    document.getElementById("gOwnerName-"+i).innerHTML = value["o_name"];
                    document.getElementById("gRegNo-"+i).innerHTML = value["v_reg_no"];
                    document.getElementById("gMobileNo-"+i).innerHTML = value["o_mobile"];


                    var PresentAddress = "&nbsp&nbspহোল্ডিং নং : "+value["o_holding_no"] + ", গ্রাম/মহল্লা : "+value["area"] + ", ওয়ার্ড নং : " + value["ward_no"] +", পৌরসভা  :"+value["sub_division"] + ", জেলা : " + value["division"];

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