
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
var URLCard = IP+"Check.php?";
var URLDriverCard= IP+"CheckDriver.php?";
var URLReport= IP+"ReportAPI/ApiHendlar_Report.php?";

var spinner="";


// ---------------------------------------- DOCUMENT  LOADER START ------------------------------------------------

$(document).ready(function ()
{
    var DocType =  GetDocType();
    //alert(DocType);

	if(DocType!="" && DocType!="DASH" && DocType!="GNB" && DocType!="SDIV" && DocType!="WRD" && DocType != "ARA" && DocType!="BANK" && DocType!="UserType" && DocType != "OWNT" && DocType != "CARDBILL"  && DocType != "OWNRRPT" && DocType != "DRVRPT" && DocType != "VCLRPT"&& DocType != "BILLRRPT"&& DocType != "LICRPT")
    {
        GetDocNo(DocType);
    }

    //alert(DocType);
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
        GetRegNo();
    }
    else if(DocType=="DRV") //----------------------------------- DRIVER
    {
        LoadLocation();
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
    }
    else if (DocType == "CARDBILL")
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

function GetRegNo()
{
    var Code = $('input[name=Code]').val();
    Code = Code.substring(3);
    var bCode = EnglishToBanglaNumber(Code);
    var RegNo = "খাঃপৌঃ "+bCode;
    $('input[name=RegNo]').val(RegNo);
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

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*    alert("GetDocNo : Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function UpdateCode(DocType)
{
    $.ajax({

        url : URLCommon+'action=UpdateDocNoByDocType',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DocType: DocType}),
        async: false,
        success: function(data)
        {
            var DocNo = data;

            $('input[name=Code]').val(DocNo);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("UpdateCode : Status: " + textStatus); alert("Error: " + errorThrown); */
        }

    });
}

function UploadPhoto(formData)
{

    //alert("Upload Photo Block");
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
            //alert(result);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*   alert("UploadPhoto - Status: " + textStatus); alert("Error: " + errorThrown); */
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
        GetRegNo();
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


            $("#editOwner input[name=OwnerName]").val(data["Owner"][0]["o_name"]);
            $("#editOwner input[name=FathersName]").val(data["Owner"][0]["o_father_name"]);
            $("#editOwner input[name=MothersName]").val(data["Owner"][0]["o_mother_name"]);
            $("#editOwner input[name=OwnerBGroup]").val(data["Owner"][0]["o_blood_group"]);
            $("#editOwner input[name=DOB]").val(data["Owner"][0]["o_dob"]);
            $("#editOwner input[name=NID]").val(data["Owner"][0]["o_nid"]);
            $("#editOwner input[name=HoldingNo]").val(data["Owner"][0]["o_holding_no"]);
            $("#editOwner input[name=Mobile]").val(data["Owner"][0]["o_mobile"]);

            // var pDivID = data["Owner"][0]["p_division"];
            // var pDivision = GetDivisionByDivID(pDivID);

            // $('#editOwner select[name="pDivision"]').empty();
            //        	$('#editOwner select[name="pDivision"]').append('<option value="'+pDivID+'">'+ pDivision +'</option>');

            // var pSubDivID = data["Owner"][0]["p_sub_division"];
            // var pSubDivision = GetSubDivisionBySubDivID(pSubDivID);

            // $('#editOwner select[name="pSubDivision"]').empty();
            //        	$('#editOwner select[name="pSubDivision"]').append('<option value="'+pSubDivID+'">'+ pSubDivision +'</option>');

            //        	var pWardID = data["Owner"][0]["p_ward_no"];
            // var pWard = GetWardByWardID(pWardID);

            // $('#editOwner select[name="pWardNo"]').empty();
            //        	$('#editOwner select[name="pWardNo"]').append('<option value="'+pWardID+'">'+ pWard +'</option>');

            //          var pAreaID = data["Owner"][0]["p_vill"];
            // var pArea = GetAreaByAreaID(pAreaID);

            // $('#editOwner select[name="pArea"]').empty();
            //        	$('#editOwner select[name="pArea"]').append('<option value="'+pAreaID+'">'+ pArea +'</option>');



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


            $('#editOwner textarea[name="PermanentAddressEdit"]').val(data["Owner"][0]["PermanentAddress"]);

            document.getElementById("PermanentAddressEdit").readOnly = true;
            // $("#editOwner input[name=OwnerName]").val(data["Owner"][0]["o_name"]);




        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("GetWonerByCode - Status: " + textStatus); alert("Error: " + errorThrown); */
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

            $("#viewOwner input[name=OwnerName]").val(data["Owner"][0]["o_name"]);
            $("#viewOwner input[name=FathersName]").val(data["Owner"][0]["o_father_name"]);
            $("#viewOwner input[name=MothersName]").val(data["Owner"][0]["o_mother_name"]);
            $("#viewOwner input[name=OwnerBGroup]").val(data["Owner"][0]["o_blood_group"]);
            $("#viewOwner input[name=DOB]").val(data["Owner"][0]["o_dob"]);
            $("#viewOwner input[name=NID]").val(data["Owner"][0]["o_nid"]);
            $("#viewOwner input[name=HoldingNo]").val(data["Owner"][0]["o_holding_no"]);
            $("#viewOwner input[name=Mobile]").val(data["Owner"][0]["o_mobile"]);

            var PermanentAddress = data["Owner"][0]["PermanentAddress"]
            $("#viewOwner textarea[name=PermanentAddress]").val(PermanentAddress);

            var cDivID = data["Owner"][0]["c_division"];
            var cDivision = GetDivisionByDivID(cDivID);


            var cSubDivID = data["Owner"][0]["c_sub_division"];
            var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


            var cWardID = data["Owner"][0]["c_ward_no"];
            var cWard = GetWardByWardID(cWardID);



            var cAreaID = data["Owner"][0]["c_vill"];
            var cArea = GetAreaByAreaID(cAreaID);

            var PresentAddress = "হোল্ডিং নং : "+data["Owner"][0]["o_holding_no"] + ", গ্রাম/মহল্লা : "+cArea + ", ওয়ার্ড নং : " + cWard +", পৌরসভা  :"+cSubDivision + ", উপজেলা : " + cDivision;
            $("#viewOwner textarea[name=PresentAddress]").val(PresentAddress);
            // $("#editOwner input[name=OwnerName]").val(data["Owner"][0]["o_name"]);






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
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";

    var OwnerCode = $("#Code").val();
    var OwnerName = $("#OwnerName").val();
    var FathersName = $("#FathersName").val();
    var MothersName = $("#MothersName").val();
    var OwnerBGroup = $("#OwnerBGroup").val();
    var DOB = $("#DOB").val();
    var NID = $("#NID").val();
    var HoldingNo = $("#HoldingNo").val();
    var Mobile = $("#Mobile").val();

    var pDivision =  0;
    var pSubDivision = 0;
    var pWardNo = 0;
    var pArea = 0;

    var cDivision = $( "select[name='cDivision']" ).val();
    var cSubDivision = $( "select[name='cSubDivision']" ).val();
    var cWardNo = $( "select[name='cWardNo']" ).val();
    var cArea = $( "select[name='cArea']" ).val();
    var PermanentAddress = $("#PermanentAddress").val();

    var file = document.getElementById("file").files[0].name;
    var filename  = GetFileName(file);
    var filePath = 'Content/Owner/'+filename;
    var formData  = new FormData(this);
    formData.append('FilePath', filePath);


    // alert(OwnerCode + " | " + OwnerName + " | " + FathersName + " | " + MothersName + " | " + DOB + " | " + NID + " | " + HoldingNo +
    // 	" | " + Mobile + " | " + pDivision + " | " + pSubDivision + " | " + pWardNo + " | " + pArea + " | " + cDivision + " | " + cSubDivision
    // 	+ " | " + cWardNo + " | " +cArea + " | " + cArea + " | "+ filePath
    // 	);


    var msg = UploadPhoto(formData);

    //alert("MSG: " + msg);
    if(msg.includes("Successfully"))
    {
        var param = JSON.stringify({

            Code : OwnerCode,
            Name : OwnerName,
            FatherName : FathersName,
            MotherName : MothersName,
            OwnerBGroup : OwnerBGroup,
            DOB : DOB,
            NID : NID,
            HoldingNo : HoldingNo,
            Mobile : Mobile,
            pDivision : pDivision,
            pSubDivision : pSubDivision,
            pWardNo : pWardNo,
            pVill : pArea,
            cDivision : cDivision,
            cSubDivision : cSubDivision,
            cWardNo : cWardNo,
            cVill : cArea,
            PhotoPath : filePath,
            PermanentAddress : PermanentAddress
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
                    UpdateCode("OWN");
                }
                ErrorMessage(msg, "Add");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                /*      alert("addOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
                ErrorMessage("addOwner : "+textStatus , "Add");
            }
        });


    }
    else
    {
        ErrorMessage(msg, "Add");
    }
});

$('#editOwner').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();

    var OwnerCode = $("#editOwner input[name=Code]").val();
    var OwnerName = $("#editOwner input[name=OwnerName]").val();
    var FathersName = $("#editOwner input[name=FathersName]").val();
    var MothersName = $("#editOwner input[name=MothersName]").val();
    var OwnerBGroup = $("#editOwner input[name=OwnerBGroup]").val();
    var DOB = $("#editOwner input[name=DOB]").val();
    var NID = $("#editOwner input[name=NID]").val();
    var HoldingNo = $("#editOwner input[name=HoldingNo]").val();
    var Mobile = $("#editOwner input[name=Mobile]").val();

    var pDivision =  0;
    var pSubDivision = 0;
    var pWardNo = 0;
    var pArea = 0;

    var cDivision = $( "#editOwner select[name='cDivision']" ).val();
    var cSubDivision = $( "#editOwner select[name='cSubDivision']" ).val();
    var cWardNo = $( "#editOwner select[name='cWardNo']" ).val();
    var cArea = $( "#editOwner select[name='cArea']" ).val();

    var PermanentAddressEdit = $("#editOwner textarea[name='PermanentAddressEdit'").val();

    //alert(PermanentAddressEdit);

    var file = "";
    var FileName = "";
    var filePath = "";

    if($("#editOwner input[name=EditFile]").val())
    {
        file = document.getElementById("EditFile").files[0].name;
        filename  = GetFileName(file);
        filePath = 'Content/Owner/'+filename;
    }



    //formData  = document.getElementById("EditFile").files[0].name;
    var formData = new FormData();
    formData.append( 'file', $( '#EditFile' )[0].files[0] );
    formData.append('FilePath', filePath);


    // alert(OwnerCode + " | " + OwnerName + " | " + FathersName + " | " + MothersName + " | " + DOB + " | " + NID + " | " + HoldingNo +
    // 	" | " + Mobile + " | " + pDivision + " | " + pSubDivision + " | " + pWardNo + " | " + pArea + " | " + cDivision + " | " + cSubDivision
    // 	+ " | " + cWardNo + " | " +cArea + " | " + cArea + " | " + filePath + " | " + PermanentAddressEdit
    // 	);

    var param = JSON.stringify({

        Code : OwnerCode,
        Name : OwnerName,
        FatherName : FathersName,
        MotherName : MothersName,
        OwnerBGroup : OwnerBGroup,
        DOB : DOB,
        NID : NID,
        HoldingNo : HoldingNo,
        Mobile : Mobile,
        pDivision : pDivision,
        pSubDivision : pSubDivision,
        pWardNo : pWardNo,
        pVill : pArea,
        cDivision : cDivision,
        cSubDivision : cSubDivision,
        cWardNo : cWardNo,
        cVill : cArea,
        PhotoPath : filePath,
        PermanentAddress : PermanentAddressEdit

    });


    console.log(param);

    if(filePath == "")
    {
        $.ajax({

            url : URLOwner+'action=UpdateOwner',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: param,
            success: function(data)
            {
                var msg = data["Owner"];

                ErrorMessage(msg, "Edit");

            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                /*   alert("editOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
                ErrorMessage("editOwner : "+textStatus, "Edit");
            }
        });
    }
    else
    {
        var msg = UploadPhoto(formData);

        if(msg.includes("Successfully"))
        {

            $.ajax({
                url : URLOwner+'action=UpdateOwner',
                type: 'POST',
                dataType : "json",
                headers: {"App_Key":"123456789"},
                data: param,
                success: function(data)
                {
                    var msg = data["Owner"];
                    ErrorMessage(msg, "Edit");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    /* alert("editOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
                    ErrorMessage("editOwner : "+textStatus, "Edit");
                }
            });
        }
        else
        {
            ErrorMessage(msg, "Edit");
        }
    }
});

$('#deleteOwner').submit(function(e)
{
    e.preventDefault();

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
            //alert(msg);
            if(msg == "Record deleted successfully!!")
            {
                  document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("deleteOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
            ErrorMessage(msg, "Delete");
        }

    });
});

// --------------------------------------- FORM SUBMIT : OWNER END -------------------------------------------




// ---------------------------------------- FUNCTION : VEHICLE START ------------------------------------------

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
    var url = URLCard+"code="+Code;
    //var url = "hello";
    //alert(url);

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

function CardInfo(Code)
{


    var url = URLCard+"code="+Code;
    //var url = "hello";
    //alert(url);

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

        url : URLCommon+'action=GetCardInfoByVehicleCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
            document.getElementById("cOwnerName").innerHTML = data[0]["o_name"];
            document.getElementById("cRegNo").innerHTML = data[0]["v_reg_no"];
            document.getElementById("cRegDate").innerHTML = data[0]["v_reg_date"];
            document.getElementById("cNID").innerHTML = data[0]["o_nid"]
            document.getElementById("cModel").innerHTML = data[0]["v_model"];
            document.getElementById("cColor").innerHTML = data[0]["v_color"];

            var PhotoPath = '<img class="card-photo" src="'+data[0]["o_photo_path"]+'">';

            document.getElementById("photo").innerHTML = PhotoPath;

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);
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

            $('#editVehicle select[name="Owner"]').empty();
            $('#editVehicle select[name="Owner"]').append('<option value="'+OwnerID+'">'+ Owner +'</option>');

            $("#editVehicle input[name=Owner]").val(Owner);
            $("#editVehicle input[name=Model]").val(data["Vehicle"][0]["v_model"]);
            $("#editVehicle input[name=Color]").val(data["Vehicle"][0]["v_color"]);
            $("#editVehicle input[name=RegNo]").val(data["Vehicle"][0]["v_reg_no"]);
            $("#editVehicle input[name=RegDate]").val(data["Vehicle"][0]["v_reg_date"]);
            $("#editVehicle textarea[name=Detail]").val(data["Vehicle"][0]["v_detail"]);


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

            $("#ViewVehicle input[name=Owner]").val(Owner);
            $("#ViewVehicle input[name=Model]").val(data["Vehicle"][0]["v_model"]);
            $("#ViewVehicle input[name=Color]").val(data["Vehicle"][0]["v_color"]);
            $("#ViewVehicle input[name=RegNo]").val(data["Vehicle"][0]["v_reg_no"]);
            $("#ViewVehicle input[name=RegDate]").val(data["Vehicle"][0]["v_reg_date"]);
            $("#ViewVehicle textarea[name=Detail]").val(data["Vehicle"][0]["v_detail"]);


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

    document.getElementById('errorMessage').innerHTML = "";
    var Code = $("#Code").val();
    var OwnerID = $("select[name='Owner']" ).val();
    var Model = $("#Model").val();
    var Color = $("#Color").val();
    var RegNo = $("#RegNo").val();
    var RegDate = $("#RegDate").val();
    var Detail = $("#Detail").val();

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
        RegDate : RegDate,
        Detail : Detail
    });


    //alert(param);

    //var table = $('#datatable-buttons').DataTable();

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
                UpdateCode("VCL");

                // var counter = table.rows().count();

                // table.row.add( [
                //     counter + 1,
                //     Code,
                //     Model,
                //     Color ,
                //     RegNo,
                //     RegDate,
                //     Action

                // ] ).draw( false );
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



    var Code = $("#editVehicle input[name=Code]").val();
    var Model = $("#editVehicle input[name=Model]").val();
    var Color = $("#editVehicle input[name=Color]").val();
    var RegNo = $("#editVehicle input[name=RegNo]").val();
    var RegDate = $("#editVehicle input[name=RegDate]").val();
    var Detail = $("#editVehicle textarea[name=Detail]").val();



    /*   alert(Code + " | " + Model + " | " + Color + " | " + RegNo + " | " + RegDate + " | " + Detail );*/

    var param = JSON.stringify({

        Code : Code ,
        Model : Model,
        Color : Color,
        RegNo : RegNo,
        RegDate : RegDate,
        Detail : Detail
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
            document.getElementById("cDriverLicNo").innerHTML = data["Driver"][0]["d_license_no"];
            document.getElementById("cDriverNID").innerHTML = data["Driver"][0]["d_nid"]
            document.getElementById("cDriverDOB").innerHTML = data["Driver"][0]["d_dob"];
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


            $("#editDriver input[name=DriverName]").val(data["Driver"][0]["d_name"]);
            $("#editDriver input[name=FathersName]").val(data["Driver"][0]["d_father_name"]);
            $("#editDriver input[name=MotherName]").val(data["Driver"][0]["d_mother_name"]);
            $("#editDriver input[name=DriverBGroup]").val(data["Driver"][0]["d_blood_group"]);
            $("#editDriver input[name=DOB]").val(data["Driver"][0]["d_dob"]);
            $("#editDriver input[name=NID]").val(data["Driver"][0]["d_nid"]);
            $("#editDriver input[name=HoldingNo]").val(data["Driver"][0]["d_holding_no"]);
          //  alert(HoldingNo);
            $("#editDriver input[name=Mobile]").val(data["Driver"][0]["d_mobile"]);
            $("#editDriver input[name=LicenseNo]").val(data["Driver"][0]["d_license_no"]);



            var OwnerID = data["Driver"][0]["o_id"];
            var Owner = GetOwnerByOwnerID(OwnerID);

            $('#editDriver select[name="Owner"]').empty();
            $('#editDriver select[name="Owner"]').append('<option value="'+OwnerID+'">'+ Owner +'</option>');

            var VehicleID = data["Driver"][0]["v_id"];
            var Vehicle = GetVehicleByVehicleID(VehicleID);

            $('#editDriver select[name="Vehicle"]').empty();
            $('#editDriver select[name="Vehicle"]').append('<option value="'+VehicleID+'">'+ Vehicle +'</option>');



            // var pDivID = data["Driver"][0]["p_division"];
            // var pDivision = GetDivisionByDivID(pDivID);

            // alert(pDivision);

            // $('#editDriver select[name="pDivision"]').empty();
            // $('#editDriver select[name="pDivision"]').append('<option value="'+pDivID+'">'+ pDivision +'</option>');

            // var pSubDivID = data["Driver"][0]["p_sub_division"];
            // var pSubDivision = GetSubDivisionBySubDivID(pSubDivID);

            // alert(pSubDivID);

            // $('#editDriver select[name="pSubDivision"]').empty();
            // $('#editDriver select[name="pSubDivision"]').append('<option value="'+pSubDivID+'">'+ pSubDivision +'</option>');

            // var pWardID = data["Driver"][0]["p_ward_no"];
            // var pWard = GetWardByWardID(pWardID);

            // alert(pWard);

            // $('#editDriver select[name="pWardNo"]').empty();
            // $('#editDriver select[name="pWardNo"]').append('<option value="'+pWardID+'">'+ pWard +'</option>');

            // var pAreaID = data["Driver"][0]["p_vill"];
            // var pArea = GetAreaByAreaID(pAreaID);

            // alert(pArea);

            // $('#editDriver select[name="pArea"]').empty();
            // $('#editDriver select[name="pArea"]').append('<option value="'+pAreaID+'">'+ pArea +'</option>');



            var cDivID = data["Driver"][0]["c_division"];
            var cDivision = GetDivisionByDivID(cDivID);

            //alert(cDivision);

            $('#editDriver select[name="cDivision"]').empty();
            $('#editDriver select[name="cDivision"]').append('<option value="'+cDivID+'">'+ cDivision +'</option>');

            var cSubDivID = data["Driver"][0]["c_sub_division"];
            var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);

            //alert(cSubDivision);

            $('#editDriver select[name="cSubDivision"]').empty();
            $('#editDriver select[name="cSubDivision"]').append('<option value="'+cSubDivID+'">'+ cSubDivision +'</option>');

            var cWardID = data["Driver"][0]["c_ward_no"];
            var cWard = GetWardByWardID(cWardID);

            //alert(cWard);

            $('#editDriver select[name="cWardNo"]').empty();
            $('#editDriver select[name="cWardNo"]').append('<option value="'+cWardID+'">'+ cWard +'</option>');

            var cAreaID = data["Driver"][0]["c_vill"];
            var cArea = GetAreaByAreaID(cAreaID);

            //alert(cArea);

            $('#editDriver select[name="cArea"]').empty();
            $('#editDriver select[name="cArea"]').append('<option value="'+cAreaID+'">'+ cArea +'</option>');

            $('#editDriver textarea[name="PermanentAddressEdit"]').val(data["Driver"][0]["PermanentAddress"]);

            document.getElementById("PermanentAddressEdit").readOnly = true;

            // $("#editOwner input[name=OwnerName]").val(data["Owner"][0]["o_name"]);




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

            $("#viewDriver input[name=DriverName]").val(data["Driver"][0]["d_name"]);
            $("#viewDriver input[name=FathersName]").val(data["Driver"][0]["d_father_name"]);
            $("#viewDriver input[name=MotherName]").val(data["Driver"][0]["d_mother_name"]);
            $("#viewDriver input[name=DriverBGroup]").val(data["Driver"][0]["d_blood_group"]);
            $("#viewDriver input[name=DOB]").val(data["Driver"][0]["d_dob"]);
            $("#viewDriver input[name=NID]").val(data["Driver"][0]["d_nid"]);
            $("#viewDriver input[name=HoldingNo]").val(data["Driver"][0]["d_holding_no"]);
            $("#viewDriver input[name=Mobile]").val(data["Driver"][0]["d_mobile"]);
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
            $("#viewDriver textarea[name=PresentAddress]").val(PresentAddress);


            var PermanentAddress = data["Driver"][0]["PermanentAddress"]
            $("#viewDriver textarea[name=PermanentAddress]").val(PermanentAddress);
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
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Code = $("#Code").val();
    var Name = $("#DriverName").val();
    var FathersName = $("#FathersName").val();
    var MotherName = $("#MotherName").val();
    var DriverBGroup = $("#DriverBGroup").val();
    var DOB = $("#DOB").val();
    var NID = $("#NID").val();
    var HoldingNo = $("#HoldingNo").val();
    var Mobile = $("#Mobile").val();
    var LicenseNo = $("#LicenseNo").val();
    var OwnerID = $( "select[name='Owner']" ).val();
    var VehicleID = $( "select[name='Vehicle']" ).val();

    var pDivision = 0;
    var pSubDivision = 0;
    var pWardNo = 0;
    var pArea = 0;

    var cDivision = $( "select[name='cDivision']" ).val();
    var cSubDivision = $( "select[name='cSubDivision']" ).val();
    var cWardNo = $( "select[name='cWardNo']" ).val();
    var cArea = $( "select[name='cArea']" ).val();

    var PermanentAddress = $("#PermanentAddress").val();

    var file = document.getElementById("file").files[0].name;

    var filename  = GetFileName(file);
    var filePath = 'Content/Driver/'+filename;

    var formData  = new FormData(this);
    formData.append('FilePath', filePath);


    // alert(Code + " | " + Name + " | " + FathersName + " | " + MotherName + " | " + DOB + " | " + NID + " | " +  Mobile + " | " + LicenseNo +
    // 	" | " + OwnerID +" | "+VehicleID + " | " +pDivision + " | " + pSubDivision + " | " + pWardNo + " | " + pArea + " | " + cDivision + " | " + cSubDivision
    // 	+ " | " + cWardNo + " | " +cArea + " | " + cArea + " | "+ filePath
    // 	);

    var msg = UploadPhoto(formData);

    //alert("MSG: " + msg);
    if(msg.includes("Successfully"))
    {
        var param = JSON.stringify({

            Code : Code ,
            Name : Name,
            FatherName : FathersName,
            MotherName : MotherName,
            DriverBGroup : DriverBGroup,
            DOB : DOB,
            NID : NID,
            HoldingNo : HoldingNo,
            Mobile : Mobile,
            LicenseNo : LicenseNo,
            OwnerID : OwnerID,
            VehicleID : VehicleID,
            pDivision : pDivision,
            pSubDivision : pSubDivision,
            pWardNo : pWardNo,
            pVill : pArea,
            cDivision : cDivision,
            cSubDivision : cSubDivision,
            cWardNo : cWardNo,
            cVill : cArea,
            PhotoPath : filePath,
            PermanentAddress : PermanentAddress

        });

        console.log(param);
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
                    UpdateCode("DRV");
                }
                ErrorMessage(msg, "Add");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                /*   alert("addDriver -Status: " + textStatus); alert("Error: " + errorThrown);*/
                ErrorMessage("addDriver : "+textStatus, "Add");
            }
        });


    }
    else
    {
        ErrorMessage(ms, "Add");
    }
});

$('#editDriver').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();



    var DriverCode = $("#editDriver input[name=Code]").val();
    var DriverName = $("#editDriver input[name=DriverName]").val();
    var FathersName = $("#editDriver input[name=FathersName]").val();
    var MotherName = $("#editDriver input[name=MotherName]").val();
    var DriverBGroup = $("#editDriver input[name=DriverBGroup]").val();
    var DOB = $("#editDriver input[name=DOB]").val();
    var NID = $("#editDriver input[name=NID]").val();
    var HoldingNo = $("#editDriver input[name=HoldingNo]").val();
    var Mobile = $("#editDriver input[name=Mobile]").val();
    var LicenseNo = $("#editDriver input[name=LicenseNo]").val();

    var Owner = $("#editDriver select[name='Owner']").val();
    var Vehicle = $("#editDriver select[name='Vehicle']").val();

    var pDivision =  0;
    var pSubDivision = 0;
    var pWardNo = 0;
    var pArea = 0;

    var cDivision = $( "#editDriver select[name='cDivision']" ).val();
    var cSubDivision = $( "#editDriver select[name='cSubDivision']" ).val();
    var cWardNo = $( "#editDriver select[name='cWardNo']" ).val();
    var cArea = $( "#editDriver select[name='cArea']" ).val();


    var PermanentAddressEdit = $("#editDriver textarea[name='PermanentAddressEdit'").val();

    var file = "";
    var FileName = "";
    var filePath = "";

    if($("#editDriver input[name=EditFile]").val())
    {
        file = document.getElementById("EditFile").files[0].name;
        filename  = GetFileName(file);
        filePath = 'Content/Driver/'+filename;
    }



    //formData  = document.getElementById("EditFile").files[0].name;
    var formData = new FormData();
    formData.append( 'file', $( '#EditFile' )[0].files[0] );
    formData.append('FilePath', filePath);


    //  alert(DriverCode + " | " + DriverName + " | " + FathersName + " | " + MotherName + " | " + DriverBGroup + " | " + DOB + " | " + NID + " | " + Mobile + " | " + LicenseNo +
    // " | " + Owner + " | "+ Vehicle + " | "+ pDivision + " | " + pSubDivision + " | " + pWardNo + " | " + pArea + " | " + cDivision + " | " + cSubDivision
    //       + " | " + cWardNo + " | " +cArea + " | " + cArea + " | " + filePath
    //   );

    var param = JSON.stringify({

        Code : DriverCode,
        Name : DriverName,
        FatherName : FathersName,
        MotherName : MotherName,
        DriverBGroup : DriverBGroup,
        DOB : DOB,
        NID : NID,
        HoldingNo : HoldingNo,
        Mobile : Mobile,
        LicenseNo : LicenseNo,
        Owner : Owner,
        Vehicle : Vehicle,
        pDivision : pDivision,
        pSubDivision : pSubDivision,
        pWardNo : pWardNo,
        pVill : pArea,
        cDivision : cDivision,
        cSubDivision : cSubDivision,
        cWardNo : cWardNo,
        cVill : cArea,
        PhotoPath : filePath,
        PermanentAddress : PermanentAddressEdit
    });


  //  alert(param);

    if(filePath == "")
    {
        $.ajax({

            url : URLDriver+'action=UpdateDriver',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: param,
            success: function(data)
            {
                var msg = data["Driver"];
                ErrorMessage(msg, "Edit");

            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                // alert("editDriver - Status: " + textStatus); alert("Error: " + errorThrown);
                ErrorMessage("editDriver : "+textStatus, "Edit");
            }
        });
    }
    else
    {
        var msg = UploadPhoto(formData);
        //alert(msg);

        if(msg.includes("Successfully"))
        {

            $.ajax({
                url : URLDriver+'action=UpdateDriver',
                type: 'POST',
                dataType : "json",
                headers: {"App_Key":"123456789"},
                data: param,
                success: function(data)
                {
                    var msg = data["Driver"];

                    ErrorMessage(msg, "Edit");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    /*  alert("editDriver - Status: " + textStatus); alert("Error: " + errorThrown);*/
                    ErrorMessage("editDriver : "+textStatus, "Edit");
                }
            });
        }
        else
        {
            ErrorMessage(msg, "Edit");
        }
    }
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


// ---------------------------------------- FUNCTION : DRIVER  Bill START -----------------------------------------


function GetDriverBillByDBillID(DBillID)
{

    $.ajax({

        url : URLDriver+'action=GetDriverBillByDBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DBillID: DBillID}),
        async: false,
        success: function(data)
        {
            $("#editDriverCardBill input[name=DBillID]").val(data["DriverBill"][0]["d_card_id"]);
            $("#editDriverCardBill select[name= DriverEdit]").empty();
            $("#editDriverCardBill select[name=DriverEdit]").append('<option value="'+ data["DriverBill"][0]["d_id"] +'">'+ data["DriverBill"][0]["d_name"] +'</option>');
            $("#editDriverCardBill input[name=CardFee]").val(data["DriverBill"][0]["card_fee"]);
            $("#editDriverCardBill input[name=EntryDate]").val(data["DriverBill"][0]["entry_date"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }

    });
}

function DriverCardBillEdit(DBillID)
{
    // alert(UserID);
    $("#editDriverCardBill input[name=DBillID]").val(DBillID);
    GetDriverBillByDBillID(DBillID);
}

function DriverCardBillDelete(DBillID) // Load Data For Delete
{
    $("#deleteDriverCardBill input[name=DBillID]").val(DBillID);
}
// ---------------------------------------- FUNCTION : DRIVER Bill  END -------------------------------------------


// --------------------------------------- FORM SUBMIT : DRIVER  Bill START ---------------------------------------

$('#addDriverCardBill').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Driver = $("#Driver").val();
    var CardFee = $("#CardFee").val();
    var EntryDate = $("#EntryDate").val();

    var param = JSON.stringify({

        Driver : Driver ,
        CardFee : CardFee,
        EntryDate : EntryDate,
    });

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

    var DBillID = $("#editDriverCardBill input[name='DBillID']").val();
    var Driver = $( "#editDriverCardBill select[name='DriverEdit']" ).val();
    var CardFee = $("#editDriverCardBill input[name='CardFee']").val();
    var EntryDate = $("#editDriverCardBill input[name='EntryDate']").val();

    var param = JSON.stringify({DBillID : DBillID,Driver : Driver, CardFee : CardFee,EntryDate : EntryDate,});

    //alert(param);
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
    setTimeout(function() { location.reload(); }, 1000);
}

function printInvoice() {


    var printContents = document.getElementById('printableAreaInvoice').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
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
        var HoldingNo = $( "input[name='HoldingNo']" ).val();
        var cDivision = $( "select[name='cDivision']" ).val();
        var cSubDivision = $( "select[name='cSubDivision']" ).val();
        var cWardNo = $( "select[name='cWardNo']" ).val();
        var cArea = $( "select[name='cArea']" ).val();

        if(cDivision != "" && cSubDivision != "" && cWardNo != "" && cArea != "" )
        {
            var Division = GetDivisionByDivID(cDivision);
            var SubDivision = GetSubDivisionBySubDivID(cSubDivision);
            var Ward = GetWardByWardID(cWardNo);
            var Area = GetAreaByAreaID(cArea);

            var PermanentAddress = "হোল্ডিং নম্বর : "+HoldingNo+", গ্রাম/মহল্লা : "+Area + ", ওয়ার্ড নং : " + Ward +", পৌরসভা : "+SubDivision + ", উপজেলা : " + Division;

            document.getElementById("PermanentAddress").readOnly = true;
            $("textarea[name=PermanentAddress]").val(PermanentAddress);

        }

    }
    else
    {
        document.getElementById("PermanentAddress").readOnly = false;
        $("#addOwner textarea[name=PermanentAddress]").val('');
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
    var RegNo = $("#otRegNo option:selected").text();
    var CurrentOwner = $("select[name='CurrentOwner']" ).val();
    var NewOwner = $("select[name='Owner']" ).val();

    var param = JSON.stringify({

        RegNo : RegNo ,
        CurrentOwner : CurrentOwner,
        NewOwner : NewOwner
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

            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /* alert("addVehicle - Status: " + textStatus); alert("Error: " + errorThrown); */
            ErrorMessage("addOwnerTransfer : "+textStatus, "Add");
        }
    });
});


function OwnerTransferView(RegNo,CurrentOwner,PreviousOwner,TransferDate)
{
    //alert("CurID-"+CurrentOwner+" -PrvID-"+PreviousOwner);

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
            CardFee = data[0]["card_fee"];
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //  alert("GetRegistrationFee - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
    //alert(RegFee);
    return CardFee;
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
//, CurrentOwner, PreviousOwner, TransferDate