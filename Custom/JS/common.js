
var IP = "http://localhost/EasyBike/";
var URLCommon = IP+"API/ApiHendlar_Common.php?";
var URLCommonQR = IP+"API/ApiHendlar_Common.php?";
var URLLocation = IP+"Location/LocationAPI/ApiHendlar_Location.php?";
var UploadURL = IP+"Upload/FileUpload.php";
var URLOwner = IP+"API/ApiHendlar_Owner.php?";
var URLOwnerTransfer = IP+"API/ApiHendlar_OwnerTransfer.php?";
var URLVehicle = IP+"API/ApiHendlar_Vehicle.php?";
var URLDriver = IP+"API/ApiHendlar_Driver.php?";
var URLBank = IP+"API/ApiHendlar_Bank.php?";
var URLBill = IP+"API/ApiHendlar_Bill.php?";
var URLUserType = IP+"User/UserAPI/ApiHendlar_User.php?";
var URLOwnerCard = IP+"CheckOwner.php?";
var URLCheck = IP+"Check.php?";
var URLDriverCard= IP+"CheckDriver.php?";
var URLReport= IP+"ReportAPI/ApiHendlar_Report.php?";

var spinner="";


// ---------------------------------------- DOCUMENT  LOADER START ------------------------------------------------

$(document).ready(function ()
{
    jQuery('#DOB').datetimepicker({
        
        	timepicker:false,
	        format:'d-m-Y',
    });
    
    var DocType =  GetDocType();
    //alert(DocType);

	if(DocType!="" && DocType!="DASH" && DocType!="GNB" && DocType!="SDIV" && DocType!="WRD" && DocType != "ARA" && DocType!="BANK" && DocType!="UserType"  && DocType != "OWNRRPT" && DocType != "DRVRPT" && DocType != "VCLRPT"&& DocType != "BILLRRPT"&& DocType != "LICRPT")
    {
        GetDocNo(DocType);
    }

    // alert(DocType);
    if(DocType=="DASH") //--------------------------------------- DASHBOARD
    {
        LoadDashBoard();
    }
    else if(DocType=="OWN") //----------------------------------- OWNER
    {
        LoadLocation();

    }
    else if(DocType=="VCL") //----------------------------------- VEHICLE
    {   
        GetAllOwner();
        var RegNo = GetAutoCode();
        $('#RegNo').val(RegNo);
    }
    else if(DocType=="DRV") //----------------------------------- DRIVER
    {
        LoadLocation();
        var LicenseNo = GetAutoCode();
        $('input[name=LicenseNo]').val(LicenseNo);
    }
    else if(DocType=="GNB") //----------------------------------- GENERATE BILL
    {
        var Color = "#205C5A";
        var opts = SpinStyle(Color);
        var target = document.getElementById('spin');
        spinner = new Spinner(opts).spin(target);
        GetYear();
    }
    else if(DocType=="SBL") //------------------------------------ SINGLE BILL
    {
        var FiscalYear = GetFiscalYear();
        var ExpiredDate = GetExpiredDate(FiscalYear);
        GetAllRegNo();
        CalculateDemand(0);

        //alert(FiscalYear);
        $('#FiscalYear').val(FiscalYear);
        $('#ExpiredDate').val(ExpiredDate);
    }
    else if (DocType=="SDIV") //---------------------------------- SETTINGS DIVISION
    {
        GetAllDivision();
    }
    else if (DocType=="WRD") //----------------------------------- SETTINGS WARD NO
    {
        //GetAllSubDivision();
        GetAllDivision();

        $( "select[name='Division']" ).change(function ()
        {

            DivID = $(this).val();

            //alert(DivID);

            $('select[name="SubDivision"]').empty();
            $('select[name="SubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

            if(DivID)
            {
                GetSubDivisionByDivID(DivID);
            }



            // $( "select[name='SubDivision']" ).change(function ()
            // {

            //     SubDivID = $(this).val();

            //     alert(SubDivID);

            //     $('select[name="WardNo"]').empty();
            //     $('select[name="WardNo"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

            //     if(SubDivID)
            //     {
            //         GetSubDivisionByDivID(DivID);
            //     }
            // });


        });
    }
    else if (DocType=="ARA") //----------------------------------- SETTINGS AREA
    {

        GetAllDivision();
        $( "select[name='Division']" ).change(function ()
        {

            DivID = $(this).val();


            $('select[name="SubDivision"]').empty();
            $('select[name="SubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

            $('select[name="WardNo"]').empty();
            $('select[name="WardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');


            if(DivID)
            {
                GetSubDivisionByDivID(DivID);
            }
        });


        $( "select[name='SubDivision']" ).change(function ()
        {
            SubDivID = $(this).val();



            $('select[name="WardNo"]').empty();
            $('select[name="WardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');


            if(DivID > 0 && SubDivID> 0)
            {
                GetWardNoByDivAndSubDivID(DivID,SubDivID);
            }
        });
    }
    else if (DocType=="BANK")
    {
        GetAllBank();
    }
    else if (DocType=="User")
    {
        GetAllUserType();

    }
    else if(DocType == "OWNT")
    {
        GetAllRegNoWithOwnerID();
        GetAllOwner();
        var OwnerTrnsFee = LoadOwnerTrnsFee();
        $('input[name=OwnerTrnsFee]').val(OwnerTrnsFee);
    }
    else if (DocType == "OCBL")
    {
        GetAllOwner();GetAllDriver();GetAllVehicleList();
        var OwnerCardFee = LoadOwnerCardFee();
        $('input[name=OwnerCardFee]').val(OwnerCardFee);
    }
    else if (DocType == "CBL")
    {
        GetAllDriver();
        var CardFee = LoadCardFee();
        $('input[name=CardFee]').val(CardFee);
    }
	else if (DocType == "OWNRRPT")
    {
        GetAllWardNo();
    }
	else if (DocType == "DRVRPT")
	{
        GetAllWardNo();

	}
	else if (DocType == "VCLRPT")
	{
        GetAllWardNo();
        GetAllVehicle();

	}
	else if (DocType == "BILLRRPT")
	{
        GetAllWardNo();
        // GetAllFiscalYearRpt();

	}
	else if (DocType == "LICRPT")
	{
        GetAllWardNo();

	}
});


function FormateDate(aDate) // DD-MM-YYYY
{
    var NewDate = aDate.split("-");
    var FinalDate = NewDate[2]+"-"+NewDate[1]+"-"+NewDate[0];

    return FinalDate;
}

// ---------------------------------------- DOCUMENT  LOADER END ------------------------------------------------

// ---------------------------------------- FUNCTION : LOCATION START -------------------------------------------
function LoadDashBoard()
{
    var FiscalYear = GetFiscalYear();
    var TotalOwner = GetTotalOwner();
    var TotalVehicle = GetTotalVehicle();
    var TotalDriver = GetTotalDriver();
    var TotalDemand = GetTotalDemand();
    var TotalDue = GetTotalDue();

    //alert(FiscalYear + " " +TotalOwner + " " + TotalVehicle+ " " +  TotalDriver + " " +TotalDemand + " " + TotalDue  );

    if(FiscalYear=="")
    {
        FiscalYear = EnglishToBanglaNumber(0);
    }
    else
    {
        FiscalYear = EnglishToBanglaNumber(FiscalYear);
    }

    if(TotalOwner == "")
    {
        TotalOwner = EnglishToBanglaNumber(0);
    }
    else
    {
        TotalOwner = EnglishToBanglaNumber(TotalOwner);
    }

    if(TotalVehicle == "")
    {
        TotalVehicle = EnglishToBanglaNumber(0);
    }
    else
    {
        TotalVehicle = EnglishToBanglaNumber(TotalVehicle);
    }

    if(TotalDriver == "")
    {
        TotalDriver = EnglishToBanglaNumber(0);
    }
    else
    {
        TotalDriver = EnglishToBanglaNumber(TotalDriver);
    }


    if(TotalDemand == null)
    {
        TotalDemand = EnglishToBanglaNumber("0");
    }
    else
    {
        TotalDemand = EnglishToBanglaNumber(TotalDemand);
    }

    if(TotalDue == null)
    {
        TotalDue = EnglishToBanglaNumber("0");
    }
    else
    {
        TotalDue = EnglishToBanglaNumber(TotalDue);
    }



    document.getElementById("TotalOwner").innerHTML = TotalOwner;
    document.getElementById("TotalVehicle").innerHTML = TotalVehicle;
    document.getElementById("TotalDriver").innerHTML = TotalDriver;
    document.getElementById("TotalDemand").innerHTML = TotalDemand;
    document.getElementById("TotalDue").innerHTML = TotalDue;
    document.getElementById("FiscalYearD").innerHTML = FiscalYear; // d- dashboard
}

function GetAutoCode()
{
    var Code = $('input[name=Code]').val();
    Code = Code.substring(3);
    Code = EnglishToBanglaNumber(Code);
    return Code;
}

function EnglishToBanglaNumber(input)
{
    var NumberMap = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};

    var output = [];

    for (var i = 0; i < input.length; ++i)
    {
        if (NumberMap.hasOwnProperty(input[i]))
        {
            output.push(NumberMap[input[i]]);
        }
        else
        {
            output.push(input[i]);
        }
    }

    return output.join('');
}

function LoadLocation()
{
    // ------------------------------------ PERMANENT LOCATION -----------------------------------------------------
    pGetDivision();

    var pDivID = "";
    var pSubDivID = "";
    var pWordID = "";

    var cDivID = "";
    var cSubDivID = "";
    var cWordID = "";

    $( "select[name='pDivision']" ).change(function ()
    {

        pDivID = $(this).val();

        // alert(pDivID);

        $('select[name="pSubDivision"]').empty();
        $('select[name="pSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

        $('select[name="pWardNo"]').empty();
        $('select[name="pWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

        $('select[name="pArea"]').empty();
        $('select[name="pArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

        if(pDivID)
        {
            pGetSubDivisionByDivID(pDivID);
        }
    });


    $( "select[name='pSubDivision']" ).change(function ()
    {
        pSubDivID = $(this).val();

        // alert(pDivID +" , "+pSubDivID);

        $('select[name="pWardNo"]').empty();
        $('select[name="pWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

        $('select[name="pArea"]').empty();
        $('select[name="pArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

        if(pDivID > 0 && pSubDivID> 0)
        {
            pGetWardNoByDivAndSubDiv(pDivID,pSubDivID);
        }
    });


    $( "select[name='pWardNo']" ).change(function ()
    {
        pWordID = $(this).val();

        // alert(pDivID  + " , "+pSubDivID + " , " + pWordID);

        $('select[name="pArea"]').empty();
        $('select[name="pArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

        if(	pDivID > 0 && pSubDivID> 0 && pWordID > 0)
        {
            pGetAreaByDivAndSubDivAndWard(pDivID,pSubDivID,pWordID);
        }
    });

    // --------------------------------- CURRENT LOCATION ------------------------------------------------------------

    cGetDivision();

    $( "select[name='cDivision']" ).change(function ()
    {

        cDivID = $(this).val();

        // alert(cDivID);

        $('select[name="cSubDivision"]').empty();
        $('select[name="cSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

        $('select[name="cWardNo"]').empty();
        $('select[name="cWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

        $('select[name="cArea"]').empty();
        $('select[name="cArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

        if(cDivID)
        {
            cGetSubDivisionByDivID(cDivID);
        }
    });


    $( "select[name='cSubDivision']" ).change(function ()
    {
        cSubDivID = $(this).val();

        // alert(cDivID +" , "+cSubDivID);

        $('select[name="cWardNo"]').empty();
        $('select[name="cWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

        $('select[name="cArea"]').empty();
        $('select[name="cArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

        if(cDivID > 0 && cSubDivID> 0)
        {
            cGetWardNoByDivAndSubDiv(cDivID,cSubDivID);
        }
    });


    $( "select[name='cWardNo']" ).change(function ()
    {
        cWordID = $(this).val();

        // alert(cDivID  + " , "+cSubDivID + " , " + cWordID);

        $('select[name="cArea"]').empty();
        $('select[name="cArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

        if(	cDivID > 0 && cSubDivID> 0 && cWordID > 0)
        {
            cGetAreaByDivAndSubDivAndWard(cDivID,cSubDivID,cWordID);
        }
    });
}

function pGetDivision()
{
    $.ajax({

        url : URLLocation+'action=GetAllDivision',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="pDivision"]').empty();
            $('select[name="pDivision"]').append('<option value="">'+ "---- উপজেলা ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="pDivision"]').append('<option value="'+ value["division_id"] +'">'+ value["division"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("pGetDivision - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
}

function pGetSubDivisionByDivID(DivisionID)
{
    $.ajax({

        url : URLLocation+'action=GetSubDivisionByDivisionID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivisionID: DivisionID}),
        success: function(data)
        {
            $('select[name="pSubDivision"]').empty();
            $('select[name="pSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="pSubDivision"]').append('<option value="'+ value["sub_division_id"] +'">'+ value["sub_division"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("pGetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function pGetWardNoByDivAndSubDiv(DivID,SubDivID)
{
    $.ajax({

        url : URLLocation+'action=GetWardNoByDivAndSubDivID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivID: DivID, SubDivID:SubDivID}),
        success: function(data)
        {
            $('select[name="pWardNo"]').empty();
            $('select[name="pWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="pWardNo"]').append('<option value="'+ value["ward_no_id"] +'">'+ value["ward_no"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("pGetWardNoByDivAndSubDiv - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function pGetAreaByDivAndSubDivAndWard(DivID,SubDivID,WardID)
{
    $.ajax({

        url : URLLocation+'action=GetAreaByDivAndSubDivAndWard',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivID: DivID, SubDivID:SubDivID, WardID:WardID}),
        success: function(data)
        {
            $('select[name="pArea"]').empty();
            $('select[name="pArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="pArea"]').append('<option value="'+ value["area_id"] +'">'+ value["area"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("pGetAreaByDivAndSubDivAndWard - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function cGetDivision()
{

    $.ajax({

        url : URLLocation+'action=GetAllDivision',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="cDivision"]').empty();
            $('select[name="cDivision"]').append('<option value="">'+ "---- উপজেলা ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="cDivision"]').append('<option value="'+ value["division_id"] +'">'+ value["division"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*    alert("cGetDivision - Status: " + textStatus); alert("Error: " + errorThrown); */
        }
    });
}

function cGetSubDivisionByDivID(DivisionID)
{
    $('select[name="cSubDivision"]').empty();
    $('select[name="cSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');


    $.ajax({

        url : URLLocation+'action=GetSubDivisionByDivisionID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivisionID: DivisionID}),
        success: function(data)
        {

            $.each(data, function(key, value)
            {

                $('select[name="cSubDivision"]').append('<option value="'+ value["sub_division_id"] +'">'+ value["sub_division"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*    alert("cGetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function cGetWardNoByDivAndSubDiv(DivID,SubDivID)
{
    $('select[name="cWardNo"]').empty();
    $('select[name="cWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

    $.ajax({

        url : URLLocation+'action=GetWardNoByDivAndSubDivID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivID: DivID, SubDivID:SubDivID}),
        success: function(data)
        {

            $.each(data, function(key, value)
            {

                $('select[name="cWardNo"]').append('<option value="'+ value["ward_no_id"] +'">'+ value["ward_no"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("cGetWardNoByDivAndSubDiv - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function cGetAreaByDivAndSubDivAndWard(DivID,SubDivID,WardID)
{
    $('select[name="cArea"]').empty();
    $('select[name="cArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');
    $.ajax({

        url : URLLocation+'action=GetAreaByDivAndSubDivAndWard',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivID: DivID, SubDivID:SubDivID, WardID:WardID}),
        success: function(data)
        {

            $.each(data, function(key, value)
            {

                $('select[name="cArea"]').append('<option value="'+ value["area_id"] +'">'+ value["area"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("cGetAreaByDivAndSubDivAndWard - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}


// ---------------------------------------- FUNCTION : LOCATION END ---------------------------------------------



// ---------------------------------------- FUNCTION : COMMON START ---------------------------------------------

function GetDocType()
{
    var DocType = "";
    if( $("#DocType").val())
    {
        DocType =  $("#DocType").val();
    }
    return DocType;
}

function GetDocNoBill(DocType)
{
    var Code = "";
    $.ajax({

        url : URLCommon+'action=GetDocNoByDocType',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DocType: DocType}),
        async : false,
        success: function(data)
        {
            Code = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*     alert("GetDocNoBill : Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });

    return Code;
}

function GetDocNo(DocType)
{
    //alert(DocType);
    $.ajax({

        url : URLCommon+'action=GetDocNoByDocType',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DocType: DocType}),
        async : false,
        success: function(data)
        {
            var DocNo = data;

            $('input[name=Code]').val(DocNo);
            
            //alert(DocNo);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*    alert("GetDocNo : Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function UpdateCode(DocType)
{
    var IsDone = false;
    $.ajax({

        url : URLCommon+'action=UpdateDocNoByDocType',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DocType: DocType}),
        async: false,
        success: function(data)
        {
           IsDone = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("UpdateCode : Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
    return IsDone;
}

function UploadPhoto(formData)
{

    //alert("Upload Photo Block:  " + formData);
    var  result = "";
    $.ajax({
        url : UploadURL,
        type : 'POST',
        data :   formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        async: false,
        success : function(data)
        {
            result = data;
            //alert("result--:"+result);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
               alert("UploadPhoto - Status: " + textStatus); alert("Error: " + errorThrown); 
        }

    });
    return result;
}

function ErrorMessage(msg,mode)
{
    var Message = "";

    if(msg.includes("successfully"))
    {
        Message = 	'<div class="alert alert-success alert-dismissible fade in" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
            '<strong>'+msg+'</strong>'+
            '</div>';
        // window.location.hash = '#errorMessage';
        Refresh();
    }
    else if(msg.includes("Exist"))
    {
        Message = 	'<div class="alert alert-warning alert-dismissible fade in" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
            '<strong>'+msg+'</strong>'+
            '</div>';
        // window.location.hash = '#errorMessage';
    }
    else if(msg.includes("Failed"))
    {
        Message = 	'<div class="alert alert-danger alert-dismissible fade in" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
            '<strong>'+msg+'</strong>'+
            '</div>';
        // window.location.hash = '#errorMessage';
    }
    else
    {
        Message = 	'<div class="alert alert-danger alert-dismissible fade in" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
            '<strong>'+msg+'</strong>'+
            '</div>';

    }

    if(mode=="Add")
    {
        //alert("Hello");
        document.getElementById("errorMessage").innerHTML = Message;
        window.location.hash = '#errorMessage';
    }
    else if(mode=="Edit")
    {

        document.getElementById("errorMessageEdit").innerHTML = Message;
        window.location.hash = '#errorMessageEdit';
    }
    else if(mode == "Delete")
    {
        document.getElementById("errorMessageDelete").innerHTML = Message;
        window.location.hash = '#errorMessageDelete';
    }
}

function GetFileName(FileName)
{
    var d = new Date();
    var n = d.getTime();
    var name = n+'-'+FileName;

    return name;
}

function Refresh()
{

    $("#Code").val('');

    var DocType =  GetDocType();

    if(DocType!="" && DocType!="DASH" && DocType!="GNB" && DocType!="SDIV" && DocType!="WRD" && DocType != "ARA" && DocType!="BANK" && DocType!="UserType" && DocType != "OWNT" && DocType != "CARDBILL")
    {
        GetDocNo(DocType);

    }
    
    if(DocType=="OWN" || DocType=="DRV")
    {
        document.getElementById("PermanentAddress").readOnly = false;
    }

    $("#OwnerName").val('');
    $("#FathersName").val('');
    $("#MothersName").val('');

    $("#OwnerBGroup").val('');
    $("#DOB").val('');
    $("#NID").val('');
    $("#HoldingNo").val('');
    $("#Mobile").val('');
    $("#chkAddress" ).prop( "checked", false );
    $("#PermanentAddress").val('');



    $("#file").val('');

    $("#Model").val('');
    $("#Color").val('');
    $("#RegNo").val('');
    $("#RegDate").val('');
    $("#ExpireDate").val('');
    $("#Detail").val('');

    $("#DriverName").val('');
    $("#LicenseNo").val('');

    $("#MotherName").val('');
    $("#DriverBGroup").val('');

    $("#Arrear").val(0);

    $("#Bank").val('');
    $("#BankAddress").val('');

    $("#AcBranch").val('');
    $("#AcName").val('');
    $("#AcNo").val('');

    $("#Division").val('');
    $("#SubDivision").val('');
    $("#WardNo").val('');
    $("#Area").val('');

    $("#UserTypeName").val('');
    $("#UserName").val('');
    $("#UserID").val('');
    $("#Password").val('');

    cGetDivision();
    cGetSubDivisionByDivID("");
    cGetWardNoByDivAndSubDiv("","");
    cGetAreaByDivAndSubDivAndWard("","","");
    GetAllOwner();

    if(DocType == "VCL")
    {
        var RegNo = GetAutoCode();
        $('input[name=RegNo]').val(RegNo);
    }
}

// ---------------------------------------- FUNCTION : COMMON END ---------------------------------------------



// ---------------------------------------- FUNCTION : OWNER START --------------------------------------------



function GetAllOwner()
{
    var text = "";
    var DocType =  GetDocType();

    if(DocType == "OWNT")
    {

        text = "---- নতুন মালিক ----";
    }
    else
    {
        text = "---- গাড়ীর মালিক ----";
    }

    $('select[name="Owner"]').empty();
    $('select[name="Owner"]').append('<option value="">'+ text +'</option>');


    $.ajax({

        url : URLOwner+'action=GetAllOwner',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {

            $.each(data, function(key, value)
            {

                $('select[name="Owner"]').append('<option value="'+ value["o_id"] +'">'+ value["o_code"]+"-"+value["o_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*    alert("GetAllOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
        }
    });
}

function GetOwnerByOwnerID(OwnerID)
{
    var Owner = "";

    /*alert(OwnerID);*/

    $.ajax({

        url : URLOwner+'action=GetOwnerByOwnerID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({OwnerID: OwnerID}),
        async: false,
        success: function(data)
        {

            Owner = data["Owner"];
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("GetOwnerByOwnerID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });

    return Owner;
}

function OwnerEdit(Code) // Load Data For EDIT
{
    // alert(Code);
    // var data = $('#editOwner').serialize();

    document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editOwner input[name=Code]").val(Code);

    $.ajax({

        url : URLOwner+'action=GetOwnerByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            var imgPath = data['Owner'][0]['o_photo_path'];
            var img = '<img id="output" src="'+imgPath+'" height="350" width="350" onclick="imageOutput()"/>';

            $("#image").html(img);
            $("#OwnerName").val(data['Owner'][0]['o_name']);
            $("#OwnerNameEng").val(data['Owner'][0]['owner_name_eng']);
            $("#Mobile").val(data['Owner'][0]['o_mobile']);
            $("#FatherName").val(data['Owner'][0]['o_father_name']);
            $("#MotherName").val(data['Owner'][0]['o_mother_name']);
            var dob = (data['Owner'][0]['o_dob']).split('-');
            $("#DOB").val(dob[2]+'-'+dob[1]+'-'+dob[0]);
            $("#NID").val(data['Owner'][0]['o_nid']);
            $("#OwnerBGroup").val(data['Owner'][0]['o_blood_group']);
            $("#cHoldingNo").val(data['Owner'][0]['o_holding_no']);


            var cDivID = data["Owner"][0]["c_division"];
            var cDivision = GetDivisionByDivID(cDivID);

            $('#editOwner select[name="cDivision"]').empty();
            $('#editOwner select[name="cDivision"]').append('<option value="'+cDivID+'">'+ cDivision +'</option>');

            var cSubDivID = data["Owner"][0]["c_sub_division"];
            var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);

            $('#editOwner select[name="cSubDivision"]').empty();
            $('#editOwner select[name="cSubDivision"]').append('<option value="'+cSubDivID+'">'+ cSubDivision +'</option>');

            var cWardID = data["Owner"][0]["c_ward_no"];
            var cWard = GetWardByWardID(cWardID);

            $('#editOwner select[name="cWardNo"]').empty();
            $('#editOwner select[name="cWardNo"]').append('<option value="'+cWardID+'">'+ cWard +'</option>');

            var cAreaID = data["Owner"][0]["c_vill"];
            var cArea = GetAreaByAreaID(cAreaID);

            $('#editOwner select[name="cArea"]').empty();
            $('#editOwner select[name="cArea"]').append('<option value="'+cAreaID+'">'+ cArea +'</option>');

            
            if(data['Owner'][0]['same_adderss'] == 1){
                $( "#chkAddress" ).prop( "checked", true );
                CheckAddress();
            }else{
                $("#Parmanent_address").val(data['Owner'][0]['PermanentAddress']);
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //  alert("GetWonerByCode - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
}

function OwnerView(Code) // Load Data For View
{

    $("#viewOwner input[name=Code]").val(Code);


    $.ajax({

        url : URLOwner+'action=GetOwnerByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            var PhotoPath = '<img style="height:150px; width:150px;" src="'+data["Owner"][0]["o_photo_path"]+'">';
            
            document.getElementById("photo").innerHTML = PhotoPath;

            $("#OwnerName1").html(data["Owner"][0]["o_name"]);
            $("#OwnerName2").html(data["Owner"][0]["o_name"]);
            $("#OwnerNameEng").html(data["Owner"][0]["owner_name_eng"]);
            $("#FathersName").html(data["Owner"][0]["o_father_name"]);
            $("#MothersName").html(data["Owner"][0]["o_mother_name"]);
            $("#OwnerBGroup").html(data["Owner"][0]["o_blood_group"]);

            if(data["Owner"][0]["status"] == 1){
                var status = 'Issued';
            }else{
                var status = 'Not Issued';
            }
            $("#CardIssueStatus").html(status);

            $("#EntryDate").html(data["Owner"][0]["my_entry_date"]);
        
            
            $("#DOB").html(FormateDate(data["Owner"][0]["o_dob"]));
            
            $("#NID").html(data["Owner"][0]["o_nid"]);
            $("#viewOwner input[name=HoldingNo]").val(data["Owner"][0]["o_holding_no"]);
            $("#Mobile1").html(data["Owner"][0]["o_mobile"]);
            $("#Mobile2").html(data["Owner"][0]["o_mobile"]);

            var cDivID = data["Owner"][0]["c_division"];
            var cDivision = GetDivisionByDivID(cDivID);


            var cSubDivID = data["Owner"][0]["c_sub_division"];
            var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


            var cWardID = data["Owner"][0]["c_ward_no"];
            var cWard = GetWardByWardID(cWardID);



            var cAreaID = data["Owner"][0]["c_vill"];
            var cArea = GetAreaByAreaID(cAreaID);

            var PresentAddress = "হোল্ডিং নং : "+data["Owner"][0]["o_holding_no"] + ", গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", উপজেলা : " + cDivision;
            $("#PresentAddress").html(PresentAddress);
            // $("#editOwner input[name=OwnerName]").val(data["Owner"][0]["o_name"]);

            var PermanentAddress = data["Owner"][0]["PermanentAddress"]
            var same_adderss = data["Owner"][0]["same_adderss"]
            if(same_adderss == 1 ){
                $("#PermanentAddress").html(PresentAddress);
            }else{
                $("#PermanentAddress").html(PermanentAddress);
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*    alert("GetWonerByCode - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function OwnerDelete(Code) // Load Data For Delete
{
    document.getElementById('errorMessageDelete').innerHTML = "";
    document.getElementById("ConfirmMSG").style.display = "inline";
    $("#deleteOwner input[name=Code]").val(Code);
}

// ---------------------------------------- FUNCTION : OWNER END ----------------------------------------------


// ---------------------------------- ----- FORM SUBMIT : OWNER START------------------------------------------

$('#addOwner').submit(function(e)
{   
    // var data = $('#addOwner').serialize();
    // console.log(data);
    e.preventDefault();



var file = $('#file').val();
var DocType = $('#DocType').val();
var ActionType = $('#ActionType').val();
var Code = $('#Code').val();
var OwnerName = $('#OwnerName').val();
var OwnerNameEng = $('#OwnerNameEng').val();
var Mobile = $('#Mobile').val();
var FatherName = $('#FatherName').val();
var MotherName = $('#MotherName').val();
var DOB = $('#DOB').val();
var NID = $('#NID').val();
var OwnerBGroup = $('#OwnerBGroup').val();
var cDivision = $('#cDivision').val();
var cSubDivision = $('#cSubDivision').val();
var cWardNo = $('#cWardNo').val();
var cArea = $('#cArea').val();
var cHoldingNo = $('#cHoldingNo').val();
var chkAddress = document.getElementById('chkAddress').checked ? 1 : 0;
var Parmanent_address = $('#Parmanent_address').val();

// var mydata = file+'||__||'+DocType+'||__||'+ActionType+'||__||'+Code+'||__||'+OwnerName+'||__||'+OwnerNameEng+'||__||'+Mobile+'||__||'+FatherName+'||__||'+MotherName+'||__||'+DOB+'||__||'+NID+'||__||'+OwnerBGroup+'||__||'+cDivision+'||__||'+cSubDivision+'||__||'+cWardNo+'||__||'+cArea+'||__||'+cHoldingNo+'||__||'+chkAddress+'||__||'+Parmanent_address;

    document.getElementById('errorMessage').innerHTML = "";

    if(document.getElementById("file").files[0] != undefined){
        var file = document.getElementById("file").files[0].name;
        var filename  = GetFileName(file);
        var filePath = 'Content/Owner/'+filename;
    
        var formData  = new FormData(this);
        formData.append('FilePath', filePath);
            
        var msg = UploadPhoto(formData);  
    }else{
        alert("Please Upload A photo");
    }      
        if(msg == '	"Photo Uploaded Successfully"')
        {
            var param = JSON.stringify({
                Code : Code,
                OwnerName : OwnerName,
                OwnerNameEng : OwnerNameEng,
                Mobile : Mobile,
                FatherName : FatherName,
                MotherName : MotherName,
                DOB : DOB,
                NID : NID,
                OwnerBGroup : OwnerBGroup,
                cDivision : cDivision,
                cSubDivision : cSubDivision,
                cWardNo : cWardNo,
                cArea : cArea,
                cHoldingNo : cHoldingNo,
                chkAddress : chkAddress,
                Parmanent_address : Parmanent_address,
                PhotoPath : filePath,
            });
            $.ajax({
                url : URLOwner+'action=InsertOwner',
                type: 'POST',
                dataType : "json",
                headers: {"App_Key":"123456789"},
                data: param,
                success: function(data)
                {
                    var msg = data["Owner"];
    
                    if(msg == "Owner created successfully!!")
                    {   
                        var mycode = Code.split('OWN');
                        alert('Owner Name : '+OwnerName+'\nOwner Code : '+mycode[1]);
                        // alert(msg);
                        window.location.href = 'Owner.php';
                    }
                    ErrorMessage(msg, "Add");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    ErrorMessage("addDriver : "+textStatus, "Add");
                }
            });
        }
});

$('#editOwner').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();

    var DocType = $('#DocType').val();
    var ActionType = $('#ActionType').val();
    var Code = $('#Code').val();
    var OwnerName = $('#OwnerName').val();
    var OwnerNameEng = $('#OwnerNameEng').val();
    var Mobile = $('#Mobile').val();
    var FatherName = $('#FatherName').val();
    var MotherName = $('#MotherName').val();
    var DOB = $('#DOB').val();
    var NID = $('#NID').val();
    var OwnerBGroup = $('#OwnerBGroup').val();
    var cDivision = $('#cDivision').val();
    var cSubDivision = $('#cSubDivision').val();
    var cWardNo = $('#cWardNo').val();
    var cArea = $('#cArea').val();
    var cHoldingNo = $('#cHoldingNo').val();
    var chkAddress = document.getElementById('chkAddress').checked ? 1 : 0;
    var Parmanent_address = $('#Parmanent_address').val();

    var filePath = "";

    if(document.getElementById("file").files[0] != undefined){
        var file = document.getElementById("file").files[0].name;
        var filename  = GetFileName(file);
        var filePath = 'Content/Owner/'+filename;
    
        var formData  = new FormData(this);
        formData.append('FilePath', filePath);
            
        var msg = UploadPhoto(formData);
    }


    var param = JSON.stringify({
        Code                : Code,
        OwnerName           : OwnerName,
        OwnerNameEng        : OwnerNameEng,
        Mobile              : Mobile,
        FatherName          : FatherName,
        MotherName          : MotherName,
        DOB                 : DOB,
        NID                 : NID,
        OwnerBGroup         : OwnerBGroup,
        cDivision           : cDivision,
        cSubDivision        : cSubDivision,
        cWardNo             : cWardNo,
        cArea               : cArea,
        cHoldingNo          : cHoldingNo,
        chkAddress          : chkAddress,
        Parmanent_address   : Parmanent_address,
        PhotoPath           : filePath,
    });

    // alert(OwnerCode + " | " + OwnerName + " | " + FathersName + " | " + MothersName + " | " + DOB + " | " + NID + " | " + HoldingNo +
    // 	" | " + Mobile + " | " + pDivision + " | " + pSubDivision + " | " + pWardNo + " | " + pArea + " | " + cDivision + " | " + cSubDivision
    // 	+ " | " + cWardNo + " | " +cArea + " | " + cArea + " | " + filePath + " | " + PermanentAddressEdit
    // 	);

    $.ajax({

        url : URLOwner+'action=UpdateOwner',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Owner"];
            // ErrorMessage(msg, "Edit");
            alert(msg);
            window.location.href = 'Owner.php';

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("editOwner : "+textStatus, "Edit");
        }
    });
});

$('#deleteOwner').submit(function(e)
{
    //e.preventDefault();

    var Code =  $("#deleteOwner input[name=Code]").val();

    //alert(Code);

    $.ajax({

        url : URLOwner+'action=DeleteOwner',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            var msg = data["Owner"];
            alert(msg);
            // if(msg == "Record deleted successfully!!")
            // {
            //       document.getElementById("ConfirmMSG").style.display = "none";
            // }
            //ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("deleteOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
            ErrorMessage(msg, "Delete");
        }

    });
});

// --------------------------------------- FORM SUBMIT : OWNER END -------------------------------------------




// ---------------------------------------- FUNCTION : VEHICLE START ------------------------------------------
function GetAllVehicleList()
{
    $.ajax({

        url : URLVehicle+'action=GetAllVehicle',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async: false,
        success: function(data)
        {
            $('select[name="Gari"]').empty();
            $('select[name="Gari"]').append('<option value="">'+ "---- গাড়ীর লিস্ট ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="Gari"]').append('<option value="'+ value["v_id"] +'">'+ value["v_reg_no"]+"-"+value["o_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*     alert("GetAllVehicle - Status: " + textStatus); alert("Error: " + errorThrown); */
        }
    });
}

function GetAllVehicle()
{
    var VehicleInfo = "";

    $.ajax({

        url : URLVehicle+'action=GetAllVehicle',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async: false,
        success: function(data)
        {
            VehicleInfo = data;

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*     alert("GetAllVehicle - Status: " + textStatus); alert("Error: " + errorThrown); */
        }
    });

    return VehicleInfo;
}

function GenerateQR(Code)
{
    var url = URLCheck+"code="+Code;
    //var url = "hello";
    //alert(url);

    jQuery('#QRCode').html('');

    jQuery('#QRCode').qrcode({

        render	: "canvas",
        width: 280,
        height: 250,
        text	: url
    });


    var canvas = $('#QRCode canvas');
    var img = $(canvas)[0].toDataURL("image/png");
    var qrCodeImg = '<img src="'+img+'"/>';
    document.getElementById("QRCode").innerHTML = qrCodeImg;



    $.ajax({

        url : URLCommon+'action=GetCardInfoByVehicleCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
            document.getElementById("gOwnerName").innerHTML = data[0]["o_name"];
            document.getElementById("gRegNo").innerHTML = data[0]["v_reg_no"];
            document.getElementById("gMobileNo").innerHTML = data[0]["o_mobile"];


            var cDivID = data[0]["c_division"];
            var cDivision = GetDivisionByDivID(cDivID);


            var cSubDivID = data[0]["c_sub_division"];
            var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


            var cWardID = data[0]["c_ward_no"];
            var cWard = GetWardByWardID(cWardID);



            var cAreaID = data[0]["c_vill"];
            var cArea = GetAreaByAreaID(cAreaID);

            var PresentAddress = ":&nbsp&nbspহোল্ডিং নং : "+data[0]["o_holding_no"] + ", গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", উপজেলা : " + cDivision;
            $("#viewOwner textarea[name=gPresentAddress]").val(PresentAddress);

            document.getElementById("gPresentAddress").innerHTML = PresentAddress;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
}

function GenerateVehicleIndividualQR(Code)
{ 
    var url = URLCheck+"code="+Code;
    // //var url = "hello";
    // alert(url);

    jQuery('#QRCode').html('');

    jQuery('#QRCode').qrcode({

        render	: "canvas",
        width: 500,
        height: 500,
        text	: url
    });


    // var canvas = $('#QRCode canvas');
    // var img = $(canvas)[0].toDataURL("image/png");
    // var qrCodeImg = '<img src="'+img+'"/>';
    // document.getElementById("QRCode").innerHTML = qrCodeImg;



    // $.ajax({

    //     url : URLCommon+'action=GetCardInfoByVehicleCode',
    //     type: 'POST',
    //     dataType : "json",
    //     headers: {"App_Key":"123456789"},
    //     data: JSON.stringify({Code:Code}),
    //     async:false,
    //     success: function(data)
    //     {
    //         document.getElementById("gOwnerName").innerHTML = data[0]["o_name"];
    //         document.getElementById("gRegNo").innerHTML = data[0]["v_reg_no"];
    //         document.getElementById("gMobileNo").innerHTML = data[0]["o_mobile"];


    //         var cDivID = data[0]["c_division"];
    //         var cDivision = GetDivisionByDivID(cDivID);


    //         var cSubDivID = data[0]["c_sub_division"];
    //         var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


    //         var cWardID = data[0]["c_ward_no"];
    //         var cWard = GetWardByWardID(cWardID);



    //         var cAreaID = data[0]["c_vill"];
    //         var cArea = GetAreaByAreaID(cAreaID);

    //         var PresentAddress = ":&nbsp&nbspহোল্ডিং নং : "+data[0]["o_holding_no"] + ", গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", জেলা : " + cDivision;
    //         $("#viewOwner textarea[name=gPresentAddress]").val(PresentAddress);

    //         document.getElementById("gPresentAddress").innerHTML = PresentAddress;
    //     },
    //     error: function(XMLHttpRequest, textStatus, errorThrown) {
    //         //alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);
    //     }
    // });
}

function CardInfo(Code)
{


    var url = URLOwnerCard+"code="+Code;
    //var url = "hello";
    //alert(url);

    jQuery('#CardQRCode').html('');

    jQuery('#CardQRCode').qrcode({

        render	: "canvas",
        width: 140,
        height: 140,
        text	: url
    });


    var canvas = $('#CardQRCode canvas');
    var img = $(canvas)[0].toDataURL("image/png");
    var qrCodeImg = '<img src="'+img+'"/>';
    document.getElementById("CardQRCode").innerHTML = qrCodeImg;



    $.ajax({

        url : URLCommon+'action=GetCardInfoByVehicleCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
            
            document.getElementById("cOwnerName").innerHTML = data[0]["o_name"] != undefined ? data[0]["o_name"] : "&nbsp;";
            document.getElementById("cRegNo").innerHTML = data[0]["v_reg_no"] != undefined ? data[0]["v_reg_no"] : "&nbsp;";
            document.getElementById("cFathersName").innerHTML = data[0]["o_father_name"] != undefined ? data[0]["o_father_name"] : "&nbsp;";
            document.getElementById("OwnerId").innerHTML = data[0]["o_code"] != undefined ? data[0]["o_code"] : "&nbsp;";
            document.getElementById("cardissuedate").innerHTML = data[0]["issue_date"] != undefined ? data[0]["issue_date"] : "&nbsp;";
            document.getElementById("color").innerHTML = data[0]["v_color"] != undefined ? data[0]["v_color"] : "&nbsp;";
            document.getElementById("chassisno").innerHTML = data[0]["chassis_no"] != undefined ? data[0]["chassis_no"] : "&nbsp;";

            

            if(data[0]["v_reg_date"] != undefined)
            {
                var array = data[0]["v_reg_date"].split("-",2);
                var StartYear = "";
                var EndYear = "";
                if( parseInt(array[1])>6)
                {
                    StartYear = parseInt(array[0]);
                    EndYear = parseInt(StartYear) + 1;
                }
                else
                {
                    EndYear =  parseInt(array[0]);
                    StartYear = parseInt(EndYear) - 1;
                }
            var FiscalYear = EnglishToBanglaNumber(StartYear+" - "+EndYear);
            }
           // document.getElementById("cRegDate").innerHTML = FiscalYear;
            // document.getElementById("cRegDate").innerHTML = EnglishToBanglaNumber( GetFiscalYear());
            document.getElementById("cNID").innerHTML = data[0]["o_nid"] != undefined ? EnglishToBanglaNumber( data[0]["o_nid"]) : "&nbsp;";
            /*document.getElementById("cModel").innerHTML = data[0]["v_model"];*/
            document.getElementById("cVregDate").innerHTML = data[0]["v_reg_date"] != undefined ? EnglishToBanglaNumber( FormateDate(data[0]["v_reg_date"])) : "";
            document.getElementById("cBMobile").innerHTML = data[0]["o_mobile"] != undefined ? EnglishToBanglaNumber(data[0]["o_mobile"]) : "&nbsp;";
            //document.getElementById("pErmanentAddress").innerHTML =data[0]["PermanentAddress"];


            if(data[0]["c_division"] != undefined)
            {
                var cDivID = data[0]["c_division"];
                var cDivision = GetDivisionByDivID(cDivID);
            }else 
            {
                var cDivision = '&nbsp;';
            }
            
            if(data[0]["c_sub_division"] != undefined)
            {
                var cSubDivID = data[0]["c_sub_division"];
                var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);
            }else{
                var cSubDivision = '&nbsp;';
            }
            
            if(data[0]["c_ward_no"] != undefined){
                var cWardID = data[0]["c_ward_no"];
                var cWard = GetWardByWardID(cWardID);
            }else{
                var cWard = "&nbsp;";
            }

            if(data[0]["c_vill"] != undefined){
                var cAreaID = data[0]["c_vill"];
                var cArea = GetAreaByAreaID(cAreaID);
            }else{
                var cArea = '&nbsp;';
            }

            var PresentAddress = "হোল্ডিং নং : "+data[0]["o_holding_no"] + ", গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", উপজেলা : " + cDivision;
            $("#pAddress textarea[name=gPresentAddress]").val(PresentAddress);

            document.getElementById("pErmanentAddress").innerHTML =data[0]["PermanentAddress"] !=undefined ? data[0]["PermanentAddress"] : "&nbsp;";

            document.getElementById("abcPresentAddress").innerHTML = PresentAddress;

            //alert(PresentAddress);

            var PhotoPath = '<img class="card-photo" src="'+data[0]["o_photo_path"]+'">';

            document.getElementById("photo").innerHTML = PhotoPath;


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
}

function GetVehicleByOwnerIDOwnerView(OwnerID){
    var vehicleListOwner = "";
    $.ajax({

        url : URLVehicle+'action=GetVehicleByOwnerID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({OwnerID: OwnerID}),
        success: function(data)
        {
            vehicleListOwner = data;alert(vehicleListOwner);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*   alert("GetVehicleByOwnerID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function GetVehicleByOwnerID(OwnerID)
{

    $.ajax({

        url : URLVehicle+'action=GetVehicleByOwnerID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({OwnerID: OwnerID}),
        success: function(data)
        {
            $('select[name="Vehicle"]').empty();
            $('select[name="Vehicle"]').append('<option value="">'+ "---- গাড়ী ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="Vehicle"]').append('<option value="'+ value["v_id"] +'">'+ value["v_code"] + "-" + value["v_model"]+ "-"+value["v_reg_no"]+'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*   alert("GetVehicleByOwnerID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function GetVehicleByVehicleID(VehicleID)
{
    var Vehicle = "";

    /*alert(VehicleID);*/

    $.ajax({

        url : URLVehicle+'action=GetVehicleByVehicleID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({VehicleID: VehicleID}),
        async: false,
        success: function(data)
        {

            Vehicle = data[0]["v_model"];
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("GetVehicleByVehicleID - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
    /*alert(Vehicle);*/
    return Vehicle;
}

function VehicleEdit(Code) // Load Data For EDIT
{
    document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editVehicle input[name=Code]").val(Code);


    $.ajax({

        url : URLVehicle+'action=GetVehicleByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            var OwnerID = data["Vehicle"][0]["o_id"];
            var Owner = GetOwnerByOwnerID(OwnerID);

            Owner = Owner.split("||--||");
            
            $("#editVehicle input[name=RegNo]").val(data["Vehicle"][0]["v_reg_no"]);
            $("#editVehicle input[name=RegDate]").val(data["Vehicle"][0]["v_reg_date"]);
            $("#editVehicle textarea[name=Detail]").val(data["Vehicle"][0]["v_detail"]);
            $("#editVehicle input[name=ChassisNo]").val(data["Vehicle"][0]["chassis_no"]);
            document.getElementById("Owner").value = OwnerID;
            document.getElementById("Color").value = data["Vehicle"][0]["v_color"];
            document.getElementById("Model").value = data["Vehicle"][0]["v_model"];



        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("VehicleEdit - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
}

function VehicleView(Code) // Load Data For EDIT
{

    $("#ViewVehicle input[name=Code]").val(Code);


    $.ajax({

        url : URLVehicle+'action=GetVehicleByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            var OwnerID = data["Vehicle"][0]["o_id"];
            var Owner = GetOwnerByOwnerID(OwnerID);
            Owner = Owner.split('||--||');
            // alert (Owner);
            var ownerPhoto = '<img src="'+Owner[2]+'" alt="" srcset="">';
            $("#OwnerCode").html(Owner[0]);
            $("#OwnerPhoto").html(ownerPhoto);
            $("#Owner1").html(Owner[1]);
            $("#Owner2").html(Owner[1]);
            $("#Model").html(data["Vehicle"][0]["v_model"]);
            $("#Color").html(data["Vehicle"][0]["v_color"]);
            $("#RegNo1").html(data["Vehicle"][0]["v_reg_no"]);
            $("#RegNo2").html(data["Vehicle"][0]["v_reg_no"]);
            $("#RegDate").html(data["Vehicle"][0]["v_reg_date"]);
            $("#Detail").html(data["Vehicle"][0]["v_detail"]);
            $("#chassis_no").html(data["Vehicle"][0]["chassis_no"]);


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
}

function VehicleDelete(Code) // Load Data For DELETE
{
    document.getElementById('errorMessageDelete').innerHTML = "";
    document.getElementById("ConfirmMSG").style.display = "inline";
    $("#deleteVehicle input[name=Code]").val(Code);

}


// ---------------------------------------- FUNCTION : VEHICLE END ------------------------------------------


// --------------------------------------- FORM SUBMIT : VEHICLE START --------------------------------------

$('#addVehicle').submit(function(e)
{
    e.preventDefault();

    var mydata = $('#addVehicle').serialize();


    document.getElementById('errorMessage').innerHTML = "";
    var Code = $("#Code").val();
    var OwnerID = $("select[name='Owner']" ).val();
    var Model = $("#Model").val();
    var Color = $("#Color").val();
    var RegNo = $("#RegNo").val();
    var RegDate = $("#RegDate").val();
    var Detail = $("#Detail").val();
    var ChassisNo = $("#ChassisNo").val();
    

    // var EditButton = '<button data-toggle="modal" data-target="#EditVehicleModal" onclick="VehicleEdit('+Code+')" type="button" class="btn btn-primary"> Edit <i class="fa fa-plus-edit"></i></button>';
    // var ViewButton = '<button data-toggle="modal" data-target="#ViewVehicleModal" onclick="VehicleView('+Code+')" type="button" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></button>';
    // var DeleteButton = '<button data-toggle="modal" data-target="#DeleteVehicleModal" onclick="VehicleDelete('+Code+')" type="button" class="btn btn-danger"> Delete <i class="fa fa-plus-edit"></i></button>';
    // var Action = EditButton+ViewButton+DeleteButton;
    // alert(Code + " | " + OwnerID + " | " + Model + " | " + Color + " | " + RegNo + " | " + Detail );

    var param = JSON.stringify({

        Code : Code ,
        OwnerID : OwnerID,
        Model : Model,
        Color : Color,
        RegNo : RegNo,
        ChassisNo : ChassisNo,
        RegDate : RegDate,
        Detail : Detail
    });

    $.ajax({
        url : URLVehicle+'action=InsertVehicle',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Vehicle"];

            if(msg == "Vehicle created successfully!!")
            {
                var Owner = GetOwnerByOwnerID(OwnerID);
                Owner = Owner.split('||--||');
                alert('Registration No. : '+RegNo+'\nOwner Code : '+Owner[0]+'\nOwner Name : '+Owner[1]);
                window.location.href = 'Vehicle.php';
            }
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /* alert("addVehicle - Status: " + textStatus); alert("Error: " + errorThrown); */
            ErrorMessage("addVehicle : "+textStatus, "Add");
        }
    });
});

$('#editVehicle').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();


    var OwnerID = $("#Owner").val();
    var Code = $("#editVehicle input[name=Code]").val();
    //  var Model = $("#editVehicle input[name=Model]").val();
    //  var Color = $("#editVehicle input[name=Color]").val();
    var Model = $("#Model").val();
    var Color = $("#Color").val();
     var RegNo = $("#editVehicle input[name=RegNo]").val();
     var RegDate = $("#editVehicle input[name=RegDate]").val();
     var Detail = $("#editVehicle textarea[name=Detail]").val();
     var ChassisNo = $("#ChassisNo").val(); 

     //$("#editVehicle textarea[name=ChassisNo]").val();
    



    //    alert(Code + " | " + Model + " | " + Color + " | " + RegNo + " | " + RegDate + " | " + Detail + " | " + ChassisNo );

    var param = JSON.stringify({

        OwnerID : OwnerID,
        Code : Code ,
        Model : Model,
        Color : Color,
        RegNo : RegNo,
        RegDate : RegDate,
        Detail : Detail,
        ChassisNo : ChassisNo
    });


    //  alert(param);

     $.ajax({

        url : URLVehicle+'action=UpdateVehicle',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Vehicle"];
            ErrorMessage(msg, "Edit");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*  alert("editVehicle - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("editVehicle : "+textStatus, "Edit");
        }
    });


});

$('#deleteVehicle').submit(function(e)
{
    e.preventDefault();

    var Code =  $("#deleteVehicle input[name=Code]").val();

    //alert(Code);

    $.ajax({

        url : URLVehicle+'action=DeleteVehicle',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            var msg = data["Vehicle"];
            
            if(msg == "Record deleted successfully!!")
            {
                  document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("deleteVehicle - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage(msg, "Delete");
        }

    });
});
// --------------------------------------- FORM SUBMIT : VEHICLE END ----------------------------------------



// ---------------------------------------- FUNCTION : DRIVER START -----------------------------------------

function GetAllDriver()
{

    $.ajax({

        url : URLDriver+'action=GetAllDriver',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="Driver"]').empty();
            $('select[name="Driver"]').append('<option value="">'+ "---- গাড়ীর ড্রাইভার ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="Driver"]').append('<option value="'+ value["d_id"] +'">'+ value["d_code"]+"-"+value["d_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*    alert("GetAllOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
        }
    });
}

function GetDriverByOwnerAndVehicle(OwnerID, VehicleID)
{
    $.ajax({

        url : URLDriver+'action=GetDriverByOwnerAndVehicle',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({OwnerID: OwnerID, VehicleID : VehicleID}),
        success: function(data)
        {
            $('select[name="Driver"]').empty();
            $('select[name="Driver"]').append('<option value="">'+ "---- চালক  ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="Driver"]').append('<option value="'+ value["d_id"] +'">'+ value["d_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("GetVehicleByOwnerID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function justQRCode(Code){
    var url = URLCheck+"code="+Code;
    jQuery('#QRCode').html('');
    jQuery('#QRCode').qrcode({
        render	: "canvas",
        width: 500,
        height: 500,
        text	: url
    });

    var canvas = $('#QRCode canvas');
    var img = $(canvas)[0].toDataURL("image/png");
    var qrCodeImg = '<img src="'+img+'"/>';
    document.getElementById("QRCode").innerHTML = qrCodeImg;
}

function GenerateDriverQR(Code)
{


    var url = URLDriverCard+"code="+Code;

//     var url = "hello";
   // alert(url);

    jQuery('#qrcodeDriverCanvas').html('');

    $('#qrcodeDriverCanvas').qrcode(url);

    var canvas = $('#qrcodeDriverCanvas canvas');
    var img = $(canvas)[0].toDataURL("image/png").replace("image/png", "image/octet-stream");

    $("#Html2Image").attr("download", Code+".png").attr("href", img);
}

function DriverCardInfo(Code)
{
    var url = URLDriverCard+"code="+Code;
// 	console.log(url);

// 	var url = "hello";
// 	alert(url);

    jQuery('#CardQRCode').html('');

    jQuery('#CardQRCode').qrcode({

        render	: "canvas",
        width: 200,
        height: 200,
        text	: url
    });


    var canvas = $('#CardQRCode canvas');
    var img = $(canvas)[0].toDataURL("image/png");
    var qrCodeImg = '<img src="'+img+'"/>';
    document.getElementById("CardQRCode").innerHTML = qrCodeImg;



    $.ajax({

        url : URLDriver+'action=GetDriverByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
            document.getElementById("cDriverName").innerHTML = data["Driver"][0]["d_name"];
            document.getElementById("cFatherName").innerHTML = data["Driver"][0]["d_father_name"];
            document.getElementById("cMotherName").innerHTML = data["Driver"][0]["d_mother_name"];
            document.getElementById("cDriverLicNo").innerHTML = data["Driver"][0]["d_license_no"];
            document.getElementById("cDriverNID").innerHTML = data["Driver"][0]["d_nid"];
            var DOB = data["Driver"][0]["d_dob"].split("-");
            var DOB = DOB[2]+"/"+DOB[1]+"/"+DOB[0];
            
            document.getElementById("cDriverDOB").innerHTML = EnglishToBanglaNumber(DOB);
            document.getElementById("cDriverBloodG").innerHTML = data["Driver"][0]["d_blood_group"];

            var PhotoPath = '<img class="card-photo" src="'+data["Driver"][0]["d_photo_path"]+'">';

            document.getElementById("photo").innerHTML = PhotoPath;

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
           // alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);
        }

    });
}

function DriverEdit(Code) // Load Data For EDIT
{
    document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editDriver input[name=Code]").val(Code);


    $.ajax({

    url : URLDriver+'action=GetDriverByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            // console.log(data['Driver']);
            // , , , , , , , , , , , c_division, c_sub_division, c_ward_no, c_vill, d_holding_no, d_photo_path, same_adderss, PermanentAddress

            var imgPath = data['Driver'][0]['d_photo_path'];
            var img = '<img id="output" src="'+imgPath+'" height="350" width="350" onclick="imageOutput()"/>';

            $("#image").html(img);
            $("#Code").val(data['Driver'][0]['d_code']);
            $("#LicenseNo").val(data['Driver'][0]['d_license_no']);
            // var appdate = (data['Driver'][0]['approve_date']);
            $("#approvealDate").val(data['Driver'][0]['approve_date']);
            $("#DriverName").val(data['Driver'][0]['d_name']);
            $("#DriverNameEng").val(data['Driver'][0]['d_name_eng']);
            $("#Mobile").val(data['Driver'][0]['d_mobile']);
            $("#FathersName").val(data['Driver'][0]['d_father_name']);
            $("#MotherName").val(data['Driver'][0]['d_mother_name']);
            var dob = (data['Driver'][0]['d_dob']).split('-');
            $("#DOB").val(dob[2]+'-'+dob[1]+'-'+dob[0]);
            $("#NID").val(data['Driver'][0]['d_nid']);
            $("#DriverBGroup").val(data['Driver'][0]['d_blood_group']);
            $("#cHoldingNo").val(data['Driver'][0]['d_holding_no']);

            var cDivID = data["Driver"][0]["c_division"];
            var cDivision = GetDivisionByDivID(cDivID);

            $('#editDriver select[name="cDivision"]').empty();
            $('#editDriver select[name="cDivision"]').append('<option value="'+cDivID+'">'+ cDivision +'</option>');

            var cSubDivID = data["Driver"][0]["c_sub_division"];
            var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);

            $('#editDriver select[name="cSubDivision"]').empty();
            $('#editDriver select[name="cSubDivision"]').append('<option value="'+cSubDivID+'">'+ cSubDivision +'</option>');

            var cWardID = data["Driver"][0]["c_ward_no"];
            var cWard = GetWardByWardID(cWardID);

            $('#editDriver select[name="cWardNo"]').empty();
            $('#editDriver select[name="cWardNo"]').append('<option value="'+cWardID+'">'+ cWard +'</option>');

            var cAreaID = data["Driver"][0]["c_vill"];
            var cArea = GetAreaByAreaID(cAreaID);

            $('#editDriver select[name="cArea"]').empty();
            $('#editDriver select[name="cArea"]').append('<option value="'+cAreaID+'">'+ cArea +'</option>');

            if(data['Driver'][0]['same_adderss'] == 1){
                $( "#chkAddress" ).prop( "checked", true );
                CheckAddress();
            }else{
                $("#Parmanent_address").val(data['Driver'][0]['PermanentAddress']);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("DriverEdit - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
}

function DriverView(Code) // Load Data For View
{

    $("#viewDriver input[name=Code]").val(Code);


    $.ajax({

        url : URLDriver+'action=GetDriverByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            var PhotoPath = '<img style="height:150px; width:150px;" src="'+data["Driver"][0]["d_photo_path"]+'">';

            document.getElementById("viewfile").innerHTML = PhotoPath;

            $("#DriverName1").html(data["Driver"][0]["d_name"]);
            $("#DriverName2").html(data["Driver"][0]["d_name"]);
            $("#DriverNameEng").html(data["Driver"][0]["d_name_eng"]);
        
            $("#FathersName").html(data["Driver"][0]["d_father_name"]);
            $("#MotherName").html(data["Driver"][0]["d_mother_name"]);
            $("#DriverBGroup").html(data["Driver"][0]["d_blood_group"]);
            $("#DOB").html(data["Driver"][0]["d_dob"]);
            $("#NID").html(data["Driver"][0]["d_nid"]);
            $("#HoldingNo").html(data["Driver"][0]["d_holding_no"]);
            $("#DriverRegNo").html(data["Driver"][0]["d_code"]);
            $("#DriverRegDate").html(data["Driver"][0]["entry_date"]);

            $("#Mobile1").html(data["Driver"][0]["d_mobile"]);
            $("#Mobile2").html(data["Driver"][0]["d_mobile"]);

            if(data["Driver"][0]["status"] == 1){
                var status ='Issued' ;
            }else{
                var status = 'Not Issued';
            }
            $("#CardIssueStatus").html(status);

            $("#viewDriver input[name=LicenseNo]").val(data["Driver"][0]["d_license_no"]);

            var OwnerID = data["Driver"][0]["o_id"];
            var Owner = GetOwnerByOwnerID(OwnerID);
            $("#viewDriver input[name=Owner]").val(Owner);


            var VehicleID = data["Driver"][0]["v_id"];
            var Vehicle = GetVehicleByVehicleID(VehicleID);
            $("#viewDriver input[name=Vehicle]").val(Vehicle);

            // var pDivID = data["Driver"][0]["p_division"];
            // var pDivision = GetDivisionByDivID(pDivID);

            // var pSubDivID = data["Driver"][0]["p_sub_division"];
            // var pSubDivision = GetSubDivisionBySubDivID(pSubDivID);

            // var pWardID = data["Driver"][0]["p_ward_no"];
            // var pWard = GetWardByWardID(pWardID);

            // var pAreaID = data["Driver"][0]["p_vill"];
            // var pArea = GetAreaByAreaID(pAreaID);

            // var PermanentAddress = "গ্রাম/মহল্লা : "+pArea + ", ওয়ার্ড নং : " + pWard +", পৌরসভা :"+pSubDivision + ", জেলা : " + pDivision;

            var HoldingNo = data["Driver"][0]["d_holding_no"];
            var cDivID = data["Driver"][0]["c_division"];
            var cDivision = GetDivisionByDivID(cDivID);


            var cSubDivID = data["Driver"][0]["c_sub_division"];
            var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


            var cWardID = data["Driver"][0]["c_ward_no"];
            var cWard = GetWardByWardID(cWardID);

            var cAreaID = data["Driver"][0]["c_vill"];
            var cArea = GetAreaByAreaID(cAreaID);

            var PresentAddress =  "হোল্ডিং নম্বর : "+HoldingNo+", গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা :"+cSubDivision + ", উপজেলা : " + cDivision;
            $("#PresentAddress").html(PresentAddress);


            var PermanentAddress = data["Driver"][0]["PermanentAddress"]
            $("#PermanentAddress").html(PermanentAddress);
            // $("#editOwner input[name=OwnerName]").val(data["Owner"][0]["o_name"]);






        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("DriverView - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
}

function DriverDelete(Code) // Load Data For Delete
{
    document.getElementById('errorMessageDelete').innerHTML = "";
    document.getElementById("ConfirmMSG").style.display = "inline";
    $("#deleteDriver input[name=Code]").val(Code);
}
// ---------------------------------------- FUNCTION : DRIVER END -------------------------------------------


// --------------------------------------- FORM SUBMIT : DRIVER START ---------------------------------------

$('#addDriver').submit(function(e)
{
    // var data = $('#addDriver').serialize();
    
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";

    var DocType = $("#DocType").val();
    var ActionType = $("#ActionType").val();
    var Code = $("#Code").val();
    var LicenseNo = $("#LicenseNo").val();
    var approvealDate = $("#approvealDate").val();
    var DriverName = $("#DriverName").val();
    var DriverNameEng = $("#DriverNameEng").val();
    var Mobile = $("#Mobile").val();
    var FathersName = $("#FathersName").val();
    var MotherName = $("#MotherName").val();
    var DOB = $("#DOB").val();
    var NID = $("#NID").val();
    var DriverBGroup = $("#DriverBGroup").val();
    var cDivision = $("#cDivision").val();
    var cSubDivision = $("#cSubDivision").val();
    var cWardNo = $("#cWardNo").val();
    var cArea = $("#cArea").val();
    var cHoldingNo = $("#cHoldingNo").val();
    var chkAddress = document.getElementById('chkAddress').checked ? 1 : 0;
    var Parmanent_address = $("#Parmanent_address").val();

    if(document.getElementById("file").files[0] != undefined){
        var file = document.getElementById("file").files[0].name;
        var filename  = GetFileName(file);
        var filePath = 'Content/Driver/'+filename;
    
        var formData  = new FormData(this);
        formData.append('FilePath', filePath);
            
        var msg = UploadPhoto(formData);  
    }else{
        alert("Please Upload A photo");
    }      
        if(msg == '	"Photo Uploaded Successfully"')
        {
            var param = JSON.stringify({
                Code : Code ,
                FatherName : FathersName,
                MotherName : MotherName,
                DriverBGroup : DriverBGroup,
                DOB : DOB,
                NID : NID,
                Mobile : Mobile,
                LicenseNo : LicenseNo,
                approvealDate : approvealDate,
                DriverName : DriverName,
                DriverNameEng : DriverNameEng,
                cDivision : cDivision,
                cSubDivision : cSubDivision,
                cWardNo : cWardNo,
                cVill : cArea,
                cHoldingNo: cHoldingNo,
                PhotoPath : filePath,
                chkAddress : chkAddress,
                PermanentAddress : Parmanent_address
            });
            $.ajax({
    
                url : URLDriver+'action=InsertDriver',
                type: 'POST',
                dataType : "json",
                headers: {"App_Key":"123456789"},
                data: param,
                success: function(data)
                {
                    var msg = data["Driver"];
    
                    if(msg == "Driver created successfully!!")
                    {
                        alert('Registration No. : '+LicenseNo+'\nDriver Name : '+DriverName);
                        // alert(msg);
                        window.location.href = 'Driver.php';
                    }
                    ErrorMessage(msg, "Add");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    ErrorMessage("addDriver : "+textStatus, "Add");
                }
            });
        }
});

$('#editDriver').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();
    // var data = $('#editDriver').serialize();
    // console.log(data);
    
    var DocType = $('#DocType').val();
    var ActionType = $('#ActionType').val();
    var Code = $('#Code').val();
    var LicenseNo = $('#LicenseNo').val();
    var approvealDate = $('#approvealDate').val();
    var DriverName = $('#DriverName').val();
    var DriverNameEng = $('#DriverNameEng').val();
    var Mobile = $('#Mobile').val();
    var FathersName = $('#FathersName').val();
    var MotherName = $('#MotherName').val();
    var DOB = $('#DOB').val();
    var NID = $('#NID').val();
    var DriverBGroup = $('#DriverBGroup').val();
    var cDivision = $('#cDivision').val();
    var cSubDivision = $('#cSubDivision').val();
    var cWardNo = $('#cWardNo').val();
    var cArea = $('#cArea').val();
    var cHoldingNo = $('#cHoldingNo').val();
    var chkAddress = document.getElementById('chkAddress').checked ? 1 : 0;
    var Parmanent_address = $('#Parmanent_address').val();

    // var mydata = DocType+'||___||'+ActionType+'||___||'+Code+'||___||'+LicenseNo+'||___||'+approvealDate+'||___||'+DriverName+'||___||'+DriverNameEng+'||___||'+Mobile+'||___||'+FathersName+'||___||'+MotherName+'||___||'+DOB+'||___||'+NID+'||___||'+DriverBGroup+'||___||'+cDivision+'||___||'+cSubDivision+'||___||'+cWardNo+'||___||'+cArea+'||___||'+cHoldingNo+'||___||'+chkAddress+'||___||'+Parmanent_address; console.log(mydata);

    var filePath = "";
    if(document.getElementById("file").files[0] != undefined){
        var file = document.getElementById("file").files[0].name;
        var filename  = GetFileName(file);
        var filePath = 'Content/Driver/'+filename;
    
        var formData  = new FormData(this);
        formData.append('FilePath', filePath);
            
        var msg = UploadPhoto(formData);
    }

    var param = JSON.stringify({
        Code                : Code,
        LicenseNo           : LicenseNo,
        approvealDate       : approvealDate,
        DriverName          : DriverName,
        DriverNameEng       : DriverNameEng,
        Mobile              : Mobile,
        FathersName         : FathersName,
        MotherName          : MotherName,
        DOB                 : DOB,
        NID                 : NID,
        DriverBGroup        : DriverBGroup,
        cDivision           : cDivision,
        cSubDivision        : cSubDivision,
        cWardNo             : cWardNo,
        cArea               : cArea,
        cHoldingNo          : cHoldingNo,
        chkAddress          : chkAddress,
        Parmanent_address   : Parmanent_address,
        PhotoPath           : filePath,
    });


//    console.log(param);
        $.ajax({

            url : URLDriver+'action=UpdateDriver',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: param,
            success: function(data)
            {
                var msg = data["Driver"];
                // ErrorMessage(msg, "Edit");
                alert(msg);
                window.location.href = 'Driver.php';

            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                ErrorMessage("editDriver : "+textStatus, "Edit");
            }
        });
});

$('#deleteDriver').submit(function(e)
{
    e.preventDefault();

    var Code =  $("#deleteDriver input[name=Code]").val();

    //alert(Code);

    $.ajax({

        url : URLDriver+'action=DeleteDriver',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            // alert(data["Driver"]);
            var msg = data["Driver"];
            if(msg == "Record deleted successfully!!")
            {
                  document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("deleteDriver - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage(msg, "Delete");
        }

    });
});

// --------------------------------------- FORM SUBMIT : DRIVER END------------------------------------------

// --------------------------------------- FORM SUBMIT : Division END------------------------------------------

// ---------------------------------------- FUNCTION : Owner  Bill START -----------------------------------------


function GetOwnerBillByCBillID(CBillID)
{

    $.ajax({

        url : URLDriver+'action=GetOwnerBillByCBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({CBillID: CBillID}),
        async: false,
        success: function(data)
        {
            $("#editDriverCardBill input[name=DBillID]").val(data["DriverBill"][0]["d_card_id"]);
            $("#editDriverCardBill select[name= DriverEdit]").empty();
            $("#editDriverCardBill select[name=DriverEdit]").append('<option value="'+ data["DriverBill"][0]["d_id"] +'">'+ data["DriverBill"][0]["d_name"] +'</option>');
            $("#editDriverCardBill input[name=CardFee]").val(data["DriverBill"][0]["card_fee"]);
            $("#editDriverCardBill input[name=EntryDate]").val(data["DriverBill"][0]["payment_date"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }

    });
}

function OwnerCardBillEdit(Code)
{
    // alert(Code);
    $("#editDriverCardBill input[name=Code]").val(Code);
    GetDriverBillByDBillID(Code);
}

function OwnerCardBillDelete(CBillID) // Load Data For Delete
{
    $("#deleteDriverCardBill input[name=DBillID]").val(DBillID);
}
// ---------------------------------------- FUNCTION : Owner Bill  END -------------------------------------------


// --------------------------------------- FORM SUBMIT : Owner  Bill START ---------------------------------------

$('#addOwnerCardBill').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Owner = $("#Owner").val();
    var Code = $("#Code").val();
    var OwnerCardFee = $("#OwnerCardFee").val();
    var EntryDate = $("#EntryDate").val();

    var param = JSON.stringify({

        Owner : Owner ,
        Code :Code,
        OwnerCardFee : OwnerCardFee,
        EntryDate : EntryDate,
    });

    //alert(param);
    $.ajax({

        url : URLOwner+'action=InsertOwnerBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            //  alert(data["DriverBill"]);
            var msg = data["OwnerBill"];
            if(msg == "Owner Bill created successfully!!")
            {
               // UpdateCode("OCBL");
            }
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addOwnerCardBill : "+textStatus, "Add");
        }
    });
});

// --------------------------------------- FORM SUBMIT : Owner Bill  END------------------------------------------

// ---------------------------------------- FUNCTION : DRIVER  Bill START -----------------------------------------


function GetOwnerBillByCBillID(CBillID)
{

    $.ajax({

        url : URLOwner+'action=GetOwnerBillByCBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({CBillID: CBillID}),
        async: false,
        success: function(data)
        {
            $("#editDriverCardBill input[name=DBillID]").val(data["DriverBill"][0]["d_card_id"]);
            $("#editDriverCardBill select[name= DriverEdit]").empty();
            $("#editDriverCardBill select[name=DriverEdit]").append('<option value="'+ data["DriverBill"][0]["d_id"] +'">'+ data["DriverBill"][0]["d_name"] +'</option>');
            $("#editDriverCardBill input[name=CardFee]").val(data["DriverBill"][0]["card_fee"]);
            $("#editDriverCardBill input[name=EntryDate]").val(data["DriverBill"][0]["payment_date"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }

    });
}

// ---------------------------------------- FUNCTION : DRIVER Bill  END -------------------------------------------


// --------------------------------------- FORM SUBMIT : DRIVER  Bill START ---------------------------------------

$('#addDriverCardBill').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Driver = $("#Driver").val();
    var Code = $("#Code").val();
    var CardFee = $("#CardFee").val();
    var EntryDate = $("#EntryDate").val();

    var param = JSON.stringify({

        Driver : Driver ,
        Code :Code,
        CardFee : CardFee,
        EntryDate : EntryDate,
    });

//alert(param);
    $.ajax({

        url : URLDriver+'action=InsertDriverBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            //  alert(data["DriverBill"]);
            var msg = data["DriverBill"];
            if(msg == "Driver Bill created successfully!!")
            {
                   // UpdateCode("CBL");
            }
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addDriverCardBill : "+textStatus, "Add");
        }
    });
});


$('#editDriverCardBill').submit(function(e)
{
    e.preventDefault();

    var Code = $("#editDriverCardBill input[name='Code']").val();
    var Driver = $( "#editDriverCardBill select[name='DriverEdit']" ).val();
    var CardFee = $("#editDriverCardBill input[name='CardFee']").val();
    var EntryDate = $("#editDriverCardBill input[name='EntryDate']").val();

    var param = JSON.stringify({Code : Code,Driver : Driver, CardFee : CardFee,EntryDate : EntryDate,});

   // alert(param);
    $.ajax({

        url : URLDriver+'action=UpdateDriverBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            //alert(data["DriverBill"]);
            var msg = data["DriverBill"];
            ErrorMessage(msg, "Edit");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("editDriverCardBill : "+textStatus, "Edit");
        }
    });
});


$('#deleteDriverCardBill').submit(function(e)
{
    e.preventDefault();

    var DBillID = $("#deleteDriverCardBill input[name=DBillID]").val();

    // alert(DBillID);

    var param = JSON.stringify({

        DBillID : DBillID
    });

    $.ajax({

        url : URLDriver+'action=DeleteDriverBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["DriverBill"];
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("deleteDriverCardBill : "+textStatus, "Delete");
        }
    });
});
// --------------------------------------- FORM SUBMIT : DRIVER Bill  END------------------------------------------




// --------------------------------------- FUNCTION : TOKEN START ------------------------------------------

function AddToken()
{


    var Code = $("#addToken input[name=Code]").val();

    var Token = $("#addToken input[name=NewToken]").val();

    var param = JSON.stringify({

        Code : Code ,
        Token : Token

    });
//	alert(param);
    $.ajax({

        url : URLCommonQR+'action=InsertToken',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data;

            if(msg.includes("successfully"))
            {
                Message = 	'<div class="alert alert-success alert-dismissible fade in" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                    '<strong>'+msg+'</strong>'+
                    '</div>';

            }
            else if(msg.includes("Exist"))
            {
                Message = 	'<div class="alert alert-warning alert-dismissible fade in" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                    '<strong>'+msg+'</strong>'+
                    '</div>';
                // window.location.hash = '#errorMessage';
            }
            else
            {
                Message = 	'<div class="alert alert-danger alert-dismissible fade in" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                    '<strong>'+msg+'</strong>'+
                    '</div>';

            }

            document.getElementById("error").innerHTML = Message;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            //alert("AddToken - Status: " + textStatus); alert("Error: " + errorThrown);
            //ErrorMessage("addVehicle : "+textStatus, "Add");
        }
    });
}


// --------------------------------------- FUNCTION : TOKEN END ------------------------------------------



//---------------------------------------- FUNCTION : DASHBOARD START -------------------------------------



function GetTotalOwner()
{
    var TotalOwner = "";

    $.ajax({

        url : URLCommon+'action=GetTotalOwner',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            TotalOwner = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("GetTotalOwner - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });

    return TotalOwner;
}

function GetTotalVehicle()
{
    var TotalVehicle = "";

    $.ajax({

        url : URLCommon+'action=GetTotalVehicle',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            TotalVehicle = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("GetTotalVehicle - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });

    return TotalVehicle;
}

function GetTotalDriver()
{
    var TotalDiver = "";

    $.ajax({

        url : URLCommon+'action=GetTotalDriver',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            TotalDiver = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("GetTotalDriver - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });

    return TotalDiver;
}

function GetTotalDemand()
{
    var TotalDemand = "";

    $.ajax({

        url : URLCommon+'action=GetTotalDemandByFiscalYear',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            TotalDemand = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("GetTotalDriver - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });

    return TotalDemand;
}

function GetTotalDue()
{
    var TotalDue = "";

    $.ajax({

        url : URLCommon+'action=GetTotalDueByFiscalYear',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            TotalDue = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("GetTotalDriver - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });

    return TotalDue;
}


//---------------------------------------- FUNCTION : DASHBOARD END -------------------------------------


//---------------------------------------- FUNCTION : PRINT START ---------------------------------------

function printQR() {


    var printContents = document.getElementById('printableAreaQR').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    setTimeout(function() { location.reload(); }, 1000);
}

function printFront() {


    var printContents = document.getElementById('printableAreaFront').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    setTimeout(function() { location.reload(); }, 1000);
}

function printBack() {


    // var printContents = document.getElementById('printableAreaBack').innerHTML;
    // var originalContents = document.body.innerHTML;

    // document.body.innerHTML = printContents;

    // window.print();

    // document.body.innerHTML = originalContents;

    var tmp = document.createDocumentFragment(),
        printme = document.getElementById('printableAreaBack').cloneNode(true);
    while(document.body.firstChild) {
        // move elements into the temporary space
        tmp.appendChild(document.body.firstChild);
    }
    // put the cloned printable thing back, and print
    document.body.appendChild(printme);
    window.print();

    while(document.body.firstChild) {
        // empty the body again (remove the clone)
        document.body.removeChild(document.body.firstChild);
    }
    // re-add the temporary fragment back into the page, restoring initial state
    document.body.appendChild(tmp);
    
    setTimeout(function() {
        location.reload();
    }, 100);
}

function printInvoice() {

    var printContents = document.getElementById('printableAreaInvoice').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    setTimeout(function() { location.reload(); }, 1000);
}

function printOwnerCardBillReceivedCopy() {

$("#myTable").css({"margin-top": "-335px", "line-height": "140%"});

    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    location.reload();
    setTimeout(function() { location.reload(); }, 1000);
}

//---------------------------------------- FUNCTION : PRINT END ---------------------------------------
function SpinStyle(Color)
{

    var opts = {
        lines: 12, // The number of lines to draw
        length: 44, // The length of each line
        width: 17, // The line thickness
        radius: 45, // The radius of the inner circle
        scale: 1, // Scales overall size of the spinner
        corners: 1, // Corner roundness (0..1)
        color: Color,//'#C9302C', // CSS color or array of colors
        fadeColor: 'transparent', // CSS color or array of colors
        speed: 1, // Rounds per second
        rotate: 0, // The rotation offset
        animation: 'spinner-line-fade-more', // The CSS animation name for the lines
        direction: 1, // 1: clockwise, -1: counterclockwise
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        className: 'spinner', // The CSS class to assign to the spinner
        top: '50%', // Top position relative to parent
        left: '50%', // Left position relative to parent
        shadow: '0 0 1px transparent', // Box-shadow for the lines
        position: 'absolute' // Element positioning
    };

    return opts;
}


function AddressChange()
{
    //alert("Hello");
    cGetDivision();

    $('#editOwner select[name="cSubDivision"]').empty();
    $('#editOwner select[name="cSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

    $('#editOwner select[name="cWardNo"]').empty();
    $('#editOwner select[name="cWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

    $('#editOwner select[name="cArea"]').empty();
    $('#editOwner select[name="cArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');


    $('#editDriver select[name="cSubDivision"]').empty();
    $('#editDriver select[name="cSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

    $('#editDriver select[name="cWardNo"]').empty();
    $('#editDriver select[name="cWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

    $('#editDriver select[name="cArea"]').empty();
    $('#editDriver select[name="cArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

    document.getElementById("PermanentAddressEdit").readOnly = false;

}

function CheckAddress()
{
    if(document.getElementById('chkAddress').checked)
    {   
        var cDivision = $("#cDivision option:selected").text();
        var cSubDivision = $("#cSubDivision option:selected").text();
        var cWardNo = $("#cWardNo option:selected").text();
        var cArea = $("#cArea option:selected").text();
        var cHoldingNo = $("#cHoldingNo").val();

        $("#pDivision").val(cDivision);
        $("#pSubDivision").val(cSubDivision);
        $("#pWardNo").val(cWardNo);
        $("#pArea").val(cArea);
        $("#pHoldingNo").val(cHoldingNo);

        $('#different_present_address').hide();
        $('#same_as_present').show();
    }
    else
    {
        $('#same_as_present').hide();
        $('#different_present_address').show();
    }
}

function CheckAddressEdit()
{

    if(document.getElementById('chkAddressEdit').checked)
    {

        var HoldingNo = $( "#editOwner input[name='HoldingNo']" ).val();
        var cDivision = $( "#editOwner select[name='cDivision']" ).val();
        var cSubDivision = $( "#editOwner select[name='cSubDivision']" ).val();
        var cWardNo = $( "#editOwner select[name='cWardNo']" ).val();
        var cArea = $( "#editOwner select[name='cArea']" ).val();


        if( cDivision != "" && cSubDivision != "" && cWardNo != "" && cArea != "" )
        {

            var Division = GetDivisionByDivID(cDivision);
            var SubDivision = GetSubDivisionBySubDivID(cSubDivision);
            var Ward = GetWardByWardID(cWardNo);
            var Area = GetAreaByAreaID(cArea);

            var PermanentAddressEdit = "হোল্ডিং নম্বর : "+HoldingNo+", গ্রাম/মহল্লা : "+Area + ", ওয়ার্ড নং : " + Ward +", পৌরসভা : "+SubDivision + ", উপজেলা : " + Division;
            document.getElementById("PermanentAddressEdit").readOnly = true;
            $("#editOwner textarea[name=PermanentAddressEdit]").val(PermanentAddressEdit);

        }

    }
    else
    {
        document.getElementById("PermanentAddressEdit").readOnly = false;
        $("#addOwner textarea[name=PermanentAddressEdit]").val('');
    }
}

function CheckAddressEditDriver()
{

    if(document.getElementById('chkAddressEdit').checked)
    {
        var HoldingNo = $( "#editDriver input[name='HoldingNo']" ).val();
        var cDivision = $( "#editDriver select[name='cDivision']" ).val();
        var cSubDivision = $( "#editDriver select[name='cSubDivision']" ).val();
        var cWardNo = $( "#editDriver select[name='cWardNo']" ).val();
        var cArea = $( "#editDriver select[name='cArea']" ).val();


        if(cDivision != "" && cSubDivision != "" && cWardNo != "" && cArea != "" )
        {

            var Division = GetDivisionByDivID(cDivision);
            var SubDivision = GetSubDivisionBySubDivID(cSubDivision);
            var Ward = GetWardByWardID(cWardNo);
            var Area = GetAreaByAreaID(cArea);

            var PermanentAddressEdit = "হোল্ডিং নম্বর : "+HoldingNo+", গ্রাম/মহল্লা : "+Area + ", ওয়ার্ড নং : " + Ward +", পৌরসভা : "+SubDivision + ", উপজেলা : " + Division;
            document.getElementById("PermanentAddressEdit").readOnly = true;
            $("#editDriver textarea[name=PermanentAddressEdit]").val(PermanentAddressEdit);

        }

    }
    else
    {
        document.getElementById("PermanentAddressEdit").readOnly = false;
        $("#editDriver textarea[name=PermanentAddressEdit]").val('');
    }
}

function GetAllRegNoWithOwnerID()
{


    $.ajax({

        url : URLVehicle+'action=GetAllVehicle',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            RegInfo = data;

            $('select[name="otRegNo"]').empty();
            $('select[name="otRegNo"]').append('<option value="">'+ "---- রেজিস্ট্রেশন নং ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="otRegNo"]').append('<option value="'+ value["o_id"] +'">'+ value["v_reg_no"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            // alert("GetAllRegNoWithOwnerID - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
}

$( "select[name='otRegNo']" ).change(function ()
{
    var OwnerID =  $(this).val();

    if(OwnerID>0)
    {
        GetOwnerInfoByOwnerID(OwnerID);
    }
});

function GetOwnerInfoByOwnerID(OwnerID)
{

    $.ajax({

        url : URLOwner+'action=GetOwnerInfoByOwnerID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({OwnerID: OwnerID}),
        success: function(data)
        {
            $('select[name="CurrentOwner"]').empty();
            //$('select[name="pSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

            $.each(data["Owner"], function(key, value)
            {

                $('select[name="CurrentOwner"]').append('<option value="'+ value["o_id"] +'">'+ value["o_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("pGetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

$('#addOwnerTransfer').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";

    var Code = $("#Code").val();
    var RegNo = $("#otRegNo option:selected").text();
    var CurrentOwner = $("select[name='CurrentOwner']" ).val();
    var NewOwner = $("select[name='Owner']" ).val();
    var OwnerTrnsFee = $("#OwnerTrnsFee").val();

    var param = JSON.stringify({

        Code : Code ,
        RegNo : RegNo ,
        CurrentOwner : CurrentOwner,
        NewOwner : NewOwner,
        OwnerTrnsFee : OwnerTrnsFee
    });
    //alert(param);


    $.ajax({

        url : URLOwnerTransfer+'action=InsertOwnerTransfer',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Transfer"];
            if (msg = "Owner Transfer Request Add successfully!!")
            {
                //UpdateCode("OWNT");
            }
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /* alert("addVehicle - Status: " + textStatus); alert("Error: " + errorThrown); */
            ErrorMessage("addOwnerTransfer : "+textStatus, "Add");
        }
    });
});

$('#OwnerTransferNoBill').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";

    var RegNo = $("#otRegNo option:selected").text();
    var NewOwner = $("select[name='Owner']" ).val();

    var param = JSON.stringify({

        RegNo : RegNo ,
        NewOwner : NewOwner
    });
    alert(param);

    $.ajax({

        url : URLOwnerTransfer+'action=OwnerTransferNoBill',
        type: 'POST',
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Transfer"];
            if (msg = "Owner Transfer Request Add successfully!!")
            {
                //UpdateCode("OWNT");
            }
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /* alert("addVehicle - Status: " + textStatus); alert("Error: " + errorThrown); */
            ErrorMessage("addOwnerTransfer : "+textStatus, "Add");
        }
    });

});


function OwnerTransferView(Status,RegNo,CurrentOwner,PreviousOwner,TransferDate)
{
    //alert("CurID-"+CurrentOwner+" -PrvID-"+PreviousOwner);
    var StatusHTML = "";

    if(Status == "0")
    {
       // alert(Status);
        StatusHTML = 	'<div class="alert alert-danger alert-dismissible fade in" role="alert" align="center">'+
            '<strong>Bill Pending</strong>'+
            '</div>';
    }
    else if(Status == "1")
    {
        StatusHTML  = 	'<div class="alert alert-success alert-dismissible fade in" role="alert" align="center">'+
            '<strong>Bill Posted</strong>'+
            '</div>';
    }

    document.getElementById("status").innerHTML = StatusHTML;
    $("#RegNo").val(RegNo);
    $("#TransferDate").val(TransferDate);

    var CurOwner = GetInfoByID(CurrentOwner);
    var PrvOwner = GetInfoByID(PreviousOwner);

    var curPhotoPath = '<img style="height:150px; width:150px;" src="'+CurOwner["Owner"][0]["o_photo_path"]+'">';

    document.getElementById("curPhoto").innerHTML = curPhotoPath;

    $('input[name="curOwnerName"]').val(CurOwner["Owner"][0]["o_name"]);
    $('input[name="curNID"]').val(CurOwner["Owner"][0]["o_nid"]);
    $('input[name="curOwnerBGroup"]').val(CurOwner["Owner"][0]["o_blood_group"]);
    $('input[name="curHoldingNo"]').val(CurOwner["Owner"][0]["o_holding_no"]);
    $('input[name="curMobile"]').val(CurOwner["Owner"][0]["o_mobile"]);

    var cDivID = CurOwner["Owner"][0]["c_division"];
    var cDivision = GetDivisionByDivID(cDivID);


    var cSubDivID = CurOwner["Owner"][0]["c_sub_division"];
    var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


    var cWardID = CurOwner["Owner"][0]["c_ward_no"];
    var cWard = GetWardByWardID(cWardID);

    var cAreaID = CurOwner["Owner"][0]["c_vill"];
    var cArea = GetAreaByAreaID(cAreaID);

    var CurAddress = "গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", উপজেলা : " + cDivision;
    $('textarea[name="curAddress"]').val(CurAddress);



    var prvPhotoPath = '<img style="height:150px; width:150px;" src="'+PrvOwner["Owner"][0]["o_photo_path"]+'">';

    document.getElementById("prvPhoto").innerHTML = prvPhotoPath;

    $('input[name="prvOwnerName"]').val(PrvOwner["Owner"][0]["o_name"]);
    $('input[name="prvNID"]').val(PrvOwner["Owner"][0]["o_nid"]);
    $('input[name="prvOwnerBGroup"]').val(PrvOwner["Owner"][0]["o_blood_group"]);
    $('input[name="prvHoldingNo"]').val(PrvOwner["Owner"][0]["o_holding_no"]);
    $('input[name="prvMobile"]').val(PrvOwner["Owner"][0]["o_mobile"]);

    var cDivID = PrvOwner["Owner"][0]["c_division"];
    var cDivision = GetDivisionByDivID(cDivID);


    var cSubDivID = PrvOwner["Owner"][0]["c_sub_division"];
    var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


    var cWardID = PrvOwner["Owner"][0]["c_ward_no"];
    var cWard = GetWardByWardID(cWardID);

    var cAreaID = PrvOwner["Owner"][0]["c_vill"];
    var cArea = GetAreaByAreaID(cAreaID);

    var PrvAddress = "গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", উপজেলা : " + cDivision;
    $('textarea[name="prvAddress"]').val(PrvAddress);
}


function OwnerTnsBillPosting(Code)
{
   // alert(Code);
    $("#OwnerTrnsPostBill input[name=Code]").val(Code);

    var OwnerTrnsFee = LoadOwnerTrnsFee();
    $('input[name=OwnerTrnsFee]').val(OwnerTrnsFee);
    
    GetAllBank();

    $( "select[name='Bank']" ).change(function ()
    {

        BankID = $(this).val();



        $('select[name="Account"]').empty();
        $('select[name="Account"]').append('<option value="">'+ "---- একাউন্ট নাম্বার ----" +'</option>');

        if(BankID)
        {
            GetAccountByBank(BankID);
        }


    });
}

// --------------------------------------- FORM SUBMIT : Owner Transfer Bill------------------------------------------

$('#OwnerTrnsPostBill').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Code = 	$("#OwnerTrnsPostBill input[name=Code]").val();
    var BankID = $("#OwnerTrnsPostBill select[name=Bank]").val();
    var AccountID = $("#OwnerTrnsPostBill select[name=Account]").val();
    var PaymentDate = $("#OwnerTrnsPostBill input[name=PaymentDate]").val();

    //alert(Code + " | " + RegNo + " | " + PaymentDate );

    var param = JSON.stringify({

        Code : Code,
        BankID : BankID,
        AccountID : AccountID,
        PaymentDate : PaymentDate
    });

    // alert(param);

    $.ajax({

        url : URLOwnerTransfer+'action=OwnerTrnsBillPost',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        async: false,
        success: function(data)
        {
            var msg = data["OwnerTrnsBillPost"];
            alert(msg);
            window.opener.location.reload()
            window.close();
            InvoiceOwnerTrns(Code);
            ErrorMessage(msg,"Add");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
        }
    });

});

function GetInfoByID(OwnerID)
{
    var Owner = "";
    $.ajax({

        url : URLOwner+'action=GetOwnerInfoByOwnerID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({OwnerID: OwnerID}),
        async:false,
        success: function(data)
        {
            Owner = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("pGetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });

    return Owner;
}

function LoadOwnerCardFee() {
    var OwnerCardFee = 0;

    $.ajax({

        url : URLOwner+'action=GetOwnerCardFee',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            OwnerCardFee = data[0]["reg_fee"];
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //  alert("GetRegistrationFee - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
    //alert(RegFee);
    return OwnerCardFee;
}

function LoadCardFee() {
    var CardFee = 0;

    $.ajax({

        url : URLDriver+'action=GetDriverCardFee',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            CardFee = data[0]["driver_reg_fee"];
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //  alert("GetRegistrationFee - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
    //alert(RegFee);
    return CardFee;
}

function LoadOwnerTrnsFee() {
    var OwnerTrnsFee = 0;

    $.ajax({

        url : URLOwnerTransfer+'action=GetOwnerTransferFee',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        async : false,
        success: function(data)
        {
            OwnerTrnsFee = data[0]["owner_transfer_fee"];
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //  alert("GetRegistrationFee - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
    //alert(RegFee);
    return OwnerTrnsFee;
}


//------------------------------------------Report----------------------------

function GetAllWardNo()
{
    $.ajax({

        url : URLLocation+'action=GetAllWardNo',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="WardNo"]').empty();
            $('select[name="WardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="WardNo"]').append('<option value="'+ value["ward_no_id"] +'">'+ value["ward_no"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("GetAllDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}

function GetAreaByWardNoID(WardNoID)
{
	//alert(WardNoID);
    var AreaList = "";
    $.ajax({

        url : URLLocation+'action=GetAreaByWardNoID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({WardNoID: WardNoID}),
        async:false,
        success: function(data)
        {
            AreaList = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*   alert("GetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });

    return AreaList;
}

function GetAllFiscalYearRpt()
{

    $.ajax({

        url : URLReport+'action=GetAllFiscalYearRpt',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="FiscalYear"]').empty();
            $('select[name="FiscalYear"]').append('<option value="">'+ "----অর্থ-বছর----" +'</option>');

            $.each(data["FiscalYear"], function(key, value)
            {
                $('select[name="FiscalYear"]').append('<option value="'+ value["fiscal_year"] +'">'+ value["fiscal_year"] +'</option>');
            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("GetAllDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}

//------------------------------Owner Report Form------------------------------
$( "#frmOwnerRPT select[name='WardNo']" ).change(function ()
{
    WordID = $(this).val();

    //alert(WordID);

    $('#frmOwnerRPT select[name="Area"]').empty();
    $('#frmOwnerRPT select[name="Area"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

    if(	WordID > 0)
    {
        AreaList = GetAreaByWardNoID(WordID);

        $.each(AreaList, function(key, value)
        {


            $('#frmOwnerRPT select[name="Area"]').append('<option value="'+ value["area_id"] +'">'+ value["area"] +'</option>');

        });

    }
});

//------------------------------Driver Report Form------------------------------
$( "#frmDriverRPT select[name='WardNo']" ).change(function ()
{
    WordID = $(this).val();

    //alert(WordID);

    $('#frmDriverRPT select[name="Area"]').empty();
    $('#frmDriverRPT select[name="Area"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

    if(	WordID > 0)
    {
        AreaList = GetAreaByWardNoID(WordID);

        $.each(AreaList, function(key, value)
        {


            $('#frmDriverRPT select[name="Area"]').append('<option value="'+ value["area_id"] +'">'+ value["area"] +'</option>');

        });

    }
});

//------------------------------Bill Report Form------------------------------
$( "#frmBillRPT select[name='WardNo']" ).change(function ()
{
    WordID = $(this).val();

    //alert(WordID);

    $('#frmBillRPT select[name="Area"]').empty();
    $('#frmBillRPT select[name="Area"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

    if(	WordID > 0)
    {
        AreaList = GetAreaByWardNoID(WordID);

        $.each(AreaList, function(key, value)
        {


            $('#frmBillRPT select[name="Area"]').append('<option value="'+ value["area_id"] +'">'+ value["area"] +'</option>');

        });

    }
});


//------------------------------Licenses Report Form------------------------------
$( "#frmTotalLicensesRPT select[name='WardNo']" ).change(function ()
{
    WordID = $(this).val();

    //alert(WordID);

    $('#frmTotalLicensesRPT select[name="Area"]').empty();
    $('#frmTotalLicensesRPT select[name="Area"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

    if(	WordID > 0)
    {
        AreaList = GetAreaByWardNoID(WordID);

        $.each(AreaList, function(key, value)
        {


            $('#frmTotalLicensesRPT select[name="Area"]').append('<option value="'+ value["area_id"] +'">'+ value["area"] +'</option>');

        });

    }
});

$('#billType').change(function(){
    if($(this).val() == 1){
        $('#ownerList').show();
        $('#driverList').hide();
        $('#Gari').attr("disabled", false);
        $('#Driver').attr("disabled", true);
        GetDocNo('OCBL');
    }else if ($(this).val() == 2){
        $('#ownerList').hide();
        $('#driverList').show();
        $('#Gari').attr("disabled", true);
        $('#Driver').attr("disabled", false);
        GetDocNo('CBL');
    }else{
        $('#ownerList').hide();
        $('#driverList').hide();
        $('#Gari').attr("disabled", false);
        $('#Driver').attr("disabled", false);
        $('#Code').val('');
    }
});

$('#otherBillAdd').submit(function(e){
    e.preventDefault();
    var Code = $('#Code').val();
    var billType = $('#billType').val();
    var Driver = $('#Driver').val() != undefined ? $('#Driver').val() : '';
    var Gari = $('#Gari').val() != undefined ? $('#Gari').val() : '';
    var Account = $('#Account').val();
    var billAmount = $('#billAmount').val();
    var details = $('#details').val();
    
    var param = JSON.stringify({
        Code : Code,
        billType : billType,
        Gari : Gari,
        Driver : Driver,
        Account : Account,
        billAmount : billAmount,
        details : details,
    });
    $.ajax({
        url : URLBill+'action=InsertOtherBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["OtherBill"];
            // if(msg == "Bill Add Successfully!!")
            {
                alert(msg);
                if(billType == 1)
                    window.location.href = 'OwnerCardBill.php';
                else if (billType == 2)
                    window.location.href = 'DriverCardBill.php';
                else
                    window.location.href = '';
            }
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addDriver : "+textStatus, "Add");
        }
    });
});

$('#vehicleCardIssue').click(function(){
    var issueDate = $('#issueDate').val();
    var Code = $('#vehicleCode').val();
    var param = JSON.stringify({
        Code : Code,
        issueDate : issueDate,
    });
    $.ajax({
        url : URLVehicle+'action=InsertCardIssueDate',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Vehicle"];
            if(msg == "Done.")
            {
                alert(msg);
                window.location.href = 'ViewCardIssue.php?user='+Code;
            }
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addDriver : "+textStatus, "Add");
        }
    });
});

$('#vehicleCardIssueReIssue').click(function(){
    $('#issueDate').show();
    $('#vehicleCardIssue').show();
    $('.issue_date_show').hide();
});

$('#billIssueDate').submit(function(e)
{   
    e.preventDefault();

    var issueDate = $('#issueDate').val();
    //  alert(issueDate);

     var param = JSON.stringify({
        issueDate : issueDate,

    });
    $.ajax({
        url : URLBill+'action=InsertIssueDate',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["iDate"];

            if(msg == "Issue Date Add created successfully!!")
            {
                alert(msg);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("issueDate : "+textStatus, "Add");
        }
    });

});

function nowBillIssueDate(){
    $.ajax({
        url : URLBill+'action=nowBillIssueDate',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        success: function(data)
        {
            var nowIssueDate = data["iDate"];
            $('#nowIssueDate').val(nowIssueDate[0]['issue_date']);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("issueDate : "+textStatus, "Add");
        }
    });
}

function OwnerGeneratedBillView(user){
    $.ajax({
        url : URLBill+'action=OwnerGeneratedBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({ user : user}),
        success: function(data)
        {
            var datas = data["iDate"][0];
            $('#Code').val(datas['bill_code']);
            $('#Owner').val(datas['o_name']);
            $('#OwnerFee').val(datas['total']);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("issueDate : "+textStatus, "Add");
        }
    });
}

function OwnerGeneratedBillPosting(user){
    $.ajax({
        url : URLBill+'action=OwnerGeneratedBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({ user : user}),
        success: function(data)
        {
            var datas = data["iDate"][0];
            $('#Code').val(datas['bill_code']);
            $('#Owner').val(datas['o_name']);
            $('#OwnerFee').val(datas['total']);
            $('#v_code').val(datas['v_code']);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("issueDate : "+textStatus, "Add");
        }
    });

    GetAllBank();

    $( "select[name='Bank']" ).change(function ()
    {
        BankID = $(this).val();
        $('select[name="Account"]').empty();
        $('select[name="Account"]').append('<option value="">'+ "---- একাউন্ট নাম্বার ----" +'</option>');

        if(BankID)
        {
            GetAccountByBank(BankID);
        }
    });
}

$('#OwnerGeneratedPostBill').submit(function(e){
    e.preventDefault();

    $.ajax({
        url : URLBill+'action=OwnerGeneratedPostBill',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({ 
            Code : $('#Code').val(),
            Bank : $('#Bank').val(),
            Account : $('#Account').val(),
            PaymentDate : $('#PaymentDate').val(),
        }),
        success: function(data)
        {
            window.close()
            if(data['iData'] = 'Data Update successfully!!'){
             alert(data['iData']);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            window.close()
            ErrorMessage("issueDate : "+textStatus, "Add");
            
        }
    });
});

function GetOwnerGeneratedInvoiceData(Code)
{
    var OwnerCardInvData = "";

    $.ajax({

        url : URLOwner+'action=GetOwnerGeneratedInvoiceData',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
            OwnerCardInvData = data;

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {

        }
    });
    //alert(CardInvData);

    return OwnerCardInvData;
}

function InvoiceOwnerGeneratedCard(Code){
    // alert(Code);
    var OwnerCardInvData = GetOwnerGeneratedInvoiceData(Code);
    // var Account = GetAllAccount();

	// console.log(OwnerCardInvData);

	$(".invCardBillNo").html(OwnerCardInvData["OwnerData"][0]["bill_code"]);
	$(".invOwnerTrnsRegNoC").html(OwnerCardInvData["OwnerData"][0]["v_reg_no"]);
	$(".invTrnsOwnerNameC").html(OwnerCardInvData["OwnerData"][0]["o_name"]);
	$(".invOwnerIdNoC").html(OwnerCardInvData["OwnerData"][0]["o_code"]);
	$('.fiscalYear').html(OwnerCardInvData["OwnerData"][0]["fiscal_year"]);
	$('.idate').html(OwnerCardInvData["OwnerData"][0]["issue_date"]);
	$('.invBillPayDateC').html(OwnerCardInvData["OwnerData"][0]["payment_date"]);

	$('.bank_info1').html(OwnerCardInvData["OwnerData"][0]["b_name"]);
	$('.bank_info2').html(OwnerCardInvData["OwnerData"][0]["ac_branch"]);
	$('.bank_info3').html(OwnerCardInvData["OwnerData"][0]["ac_no"]);

    $('.bill1').html(OwnerCardInvData["OwnerData"][0]["reg_fee"]+"/-");
    $('.bill2').html("");
    $('.bill3').html("");
	
	$('.billtotal').html(OwnerCardInvData["OwnerData"][0]["reg_fee"]+"/-");
}