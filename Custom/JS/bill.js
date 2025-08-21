// var IP = "http://localhost/EasyBike/";
// var URLOwner = IP+"API/ApiHendlar_Owner.php?";

var RegInfo = "";


// --------------------------------------- FUNCTION : BILL START------------------------------------------

function RefreshBill()
{
	
	$("#Code").val('');

	var DocType =  GetDocType();

	if(DocType!="")
	{
		GetDocNo(DocType);
	}

	//$('#FiscalYear').val();
	$("#RegNo").val('');
	$("#RegDate").val('');
	//$("#ExpiredDate").val('');
	GetFiscalYear();
	GetAllRegNo();
	CalculateDemand(0);	
}

function GetYear()
{
	var StartYear = ""; 
	var EndYear = "";

	$.ajax({

		url : URLCommon+'action=GetFiscalYear',
		type: 'GET',
		dataType : "json",
		headers: {"App_Key":"123456789"},
		contentType: "application/json; charset=utf-8",
		async : false,
		success: function(data) 
		{ 
	     	StartYear = data[0]["start_year"];
	     	EndYear = data[0]["end_year"];

			$('#StartYear').val(StartYear);
			$('#EndYear').val(EndYear);
		},
	    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        //    alert("GetRegistrationFee - Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
	});
}

function GetFiscalYear()
{

	var StartYear = ""; 
	var EndYear = "";

	$.ajax({

			url : URLCommon+'action=GetFiscalYear',
			type: 'GET',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			contentType: "application/json; charset=utf-8",
			async : false,
			success: function(data) 
			{ 
		     	StartYear = data[0]["start_year"];
		     	EndYear = data[0]["end_year"];
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	            //alert("GetRegistrationFee - Status: " + textStatus); alert("Error: " + errorThrown); 
	        } 
		});

	var FiscalYear = StartYear+"-"+EndYear;

	return FiscalYear;
}

function GetExpiredDate(FiscalYear)
{
	var ExpiredDate = FiscalYear.substr(FiscalYear.length - 4);
	return ExpiredDate+"-6-30";
}

function GetAllRegNo()
{
	var FiscalYear = GetFiscalYear();

	$.ajax({

			url : URLBill+'action=GetAllRegNo',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			contentType: "application/json; charset=utf-8",
			data: JSON.stringify({FiscalYear:FiscalYear}),
			async : false,
			success: function(data) 
			{ 
				RegInfo = data;

		        $('select[name="RegNo"]').empty();
	          	$('select[name="RegNo"]').append('<option value="">'+ "---- রেজিস্ট্রেশন নং ----" +'</option>');

	          	$.each(data["Bill"], function(key, value) 
	          	{
			
					$('select[name="RegNo"]').append('<option value="'+ value["v_reg_no"] +'">'+ value["v_reg_no"] +'</option>');
			
				});

			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	            //alert("GetAllRegNo - Status: " + textStatus); alert("Error: " + errorThrown); 
	        } 
		});
}

function GetRegDateByRegNo(RegNo)
{
	var RegDate = "";

	$.each(RegInfo["Bill"], function(key, value)
	{
		if(value["v_reg_no"] == RegNo)
		{
			RegDate = value["v_reg_date"];
			//alert(value["v_reg_date"]);
		}
	}); 
	          	
	return RegDate;       		
}

function GetRegistrationFee()
{
	var RegFee = 0;

		$.ajax({

			url : URLCommon+'action=GetRegistrationFee',
			type: 'GET',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			contentType: "application/json; charset=utf-8",
			async : false,
			success: function(data) 
			{ 
		     	RegFee = data[0]["reg_fee"];
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	            //alert("GetRegistrationFee - Status: " + textStatus); alert("Error: " + errorThrown); 
	        } 
		});
		//alert(RegFee);
	return RegFee;
}

function GetSurChargeValue()
{
	var SurCharge = 0;
		$.ajax({

			url : URLCommon+'action=GetSurCharge',
			type: 'GET',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			contentType: "application/json; charset=utf-8",
			async : false,
			success: function(data) 
			{ 
		     	SurCharge = data[0]["sur_charge"];
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	            //alert("GetSurChargeValue - Status: " + textStatus); alert("Error: " + errorThrown); 
	        } 
		});
		//alert(SurCharge);

	return parseInt(SurCharge);
}

function GetSurCharge(Arrear)
{
	var SurChargeVal = parseInt(GetSurChargeValue());

	var Arr = parseInt(Arrear);

	var SurCharge = (SurChargeVal*Arr)/100;

	return SurCharge;
}

function CalculateDemand(Arrear)
{
	
	var RegFee = GetRegistrationFee();
	var SurCharge =  GetSurCharge(Arrear);
	var Total = GetTotal(RegFee,Arrear,SurCharge);

	// alert("SurCharge : "+SurCharge);
	// alert("Total : "+Total);

	
	$("#RegFee").val(RegFee);

	$("#SurCharge").val(SurCharge);

	$("#Total").val(Total);

	$("#Due").val(Total);
}

function GetTotal(RegFee, Arrear, SurCharge)
{
	console.log(RegFee+"-"+Arrear+"-"+SurCharge);

	return Math.ceil(RegFee)+Math.ceil(Arrear)+Math.ceil(SurCharge);
}

function DetailBill(Code)
{
	//alert(Code);
	$("#detailBill input[name=Code]").val(Code);


    $.ajax({

        url : URLBill+'action=GetBillByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            $("#detailBill input[name=FiscalYear]").val(data["Bill"][0]["fiscal_year"]);
            $("#detailBill input[name=RegNo]").val(data["Bill"][0]["v_reg_no"]);
            $("#detailBill input[name=RegDate]").val(data["Bill"][0]["reg_date"]);
            $("#detailBill input[name=ExpiredDate]").val(data["Bill"][0]["expired_date"]);
            $("#detailBill input[name=RegFee]").val(data["Bill"][0]["reg_fee"]);
            $("#detailBill input[name=Arrear]").val(data["Bill"][0]["arrear"]);
            $("#detailBill input[name=SurCharge]").val(data["Bill"][0]["sur_charge"]);
            $("#detailBill input[name=Total]").val(data["Bill"][0]["total"]);
            $("#detailBill input[name=Due]").val(data["Bill"][0]["due"]);
            $("#detailBill input[name=Fine]").val(data["Bill"][0]["fine"]);

            Status = "";

            if(data["Bill"][0]["status"] == "0")
            {
				Status = 	'<div class="alert alert-danger alert-dismissible fade in" role="alert" align="center">'+
								'<strong>Bill Pending</strong>'+
							'</div>';
            }
            else if(data["Bill"][0]["status"] == "1")
            {
				Status = 	'<div class="alert alert-success alert-dismissible fade in" role="alert" align="center">'+
								'<strong>Bill Posted</strong>'+
							'</div>';
            }

            document.getElementById("status").innerHTML = Status;


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
           // alert("DetailBill - Status: " + textStatus); alert("Error: " + errorThrown);
        }

    });
}


// Bills Fine Update

$('#detailBill').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();

    var OwnerCode = $("#detailBill input[name=Code]").val();
    var FineBill = $("#detailBill input[name=Fine]").val();


    var param = JSON.stringify({

        Code : OwnerCode,
        Fine : FineBill,

    });
    
    alert('Fine Successfully Update');


    console.log(param);

            $.ajax({
                url : URLBill+'action=UpdateFineBill',
                type: 'POST',
                dataType : "json",
                headers: {"App_Key":"123456789"},
                data: param,
                success: function(data)
                {
                    var msg = data["Bill"];
                    ErrorMessage(msg, "Edit");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    /* alert("editOwner - Status: " + textStatus); alert("Error: " + errorThrown); */
                    ErrorMessage("editBill : "+textStatus, "Edit");
                }
            });
});

function BillPosting(Code)
{
	//alert(Code);
	$("#postBill input[name=Code]").val(Code);


    $.ajax({

        url : URLBill+'action=GetBillByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
      
            $("#postBill input[name=RegNo]").val(data["Bill"][0]["v_reg_no"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("DetailBill - Status: " + textStatus); alert("Error: " + errorThrown);
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


// --------------------------------------- FUNCTION : BILL END------------------------------------------


// --------------------------------------- FUNCTION : Owner Bill ------------------------------------------

function OwnerCardBillView(Code)
{
    // alert(Code);
    $("#OwnerCardBillView input[name=Code]").val(Code);


    $.ajax({

        url : URLOwner+'action=GetOwnerBillByCBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            //alert(data["DriverBill"][0]["d_name"]);
            $("#viewOwnerCardBill input[name=Owner]").val(data["OwnerBill"][0]["o_name"]);
            $("#viewOwnerCardBill input[name=OwnerCardFee]").val(data["OwnerBill"][0]["o_card_fee"]);
            // $("#viewOwnerCardBill input[name=EntryDate]").val(data["DriverBill"][0]["entry_date"]);

            Status = "";

            if(data["OwnerBill"][0]["status"] == "0")
            {
                Status = 	'<div class="alert alert-danger alert-dismissible fade in" role="alert" align="center">'+
                    '<strong>Bill Pending</strong>'+
                    '</div>';
            }
            else if(data["OwnerBill"][0]["status"] == "1")
            {
                Status = 	'<div class="alert alert-success alert-dismissible fade in" role="alert" align="center">'+
                    '<strong>Bill Posted</strong>'+
                    '</div>';
            }

            document.getElementById("status").innerHTML = Status;


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("DetailBill - Status: " + textStatus); alert("Error: " + errorThrown);
        }

    });
}

function OwnerBillPosting(Code)
{
    //alert(Code);
    $("#OwnerPostBill input[name=Code]").val(Code);


    $.ajax({

        url : URLOwner+'action=GetOwnerBillByCBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        success: function(data)
        {
            $("#OwnerPostBill input[name=owner_name]").val(data["OwnerBill"][0]["o_name"]);
            $("#OwnerPostBill input[name=card_fee]").val(data["OwnerBill"][0]["o_card_fee"]);
            $("#OwnerPostBill input[name=v_code]").val(data["OwnerBill"][0]["v_code"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("DetailBill - Status: " + textStatus); alert("Error: " + errorThrown);
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

// --------------------------------------- FORM SUBMIT : Owner Bill------------------------------------------

$('#OwnerPostBill').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Code = 	$("#OwnerPostBill input[name=Code]").val();
    var BankID = $("#OwnerPostBill select[name=Bank]").val();
    var AccountID = $("#OwnerPostBill select[name=Account]").val();
    var PaymentDate = $("#OwnerPostBill input[name=PaymentDate]").val();

    //alert(Code + " | " + RegNo + " | " + PaymentDate );

    var param = JSON.stringify({

        Code : Code,
        BankID : BankID,
        AccountID : AccountID,
        PaymentDate : PaymentDate
    });

   // alert(param);

    $.ajax({

        url : URLBill+'action=OwnerBillPost',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        async: false,
        success: function(data)
        {
            var msg = data["OwnerBillPost"];
            alert(msg);

            ErrorMessage(msg,"Add");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            //alert("postBill - Status: " + textStatus); alert("Error: " + errorThrown);
            //ErrorMessage("postBill : "+textStatus, "Add");
        }
    });

});

// --------------------------------------- FUNCTION : Driver Bill ------------------------------------------

function DriverCardBillView(Code)
{
   // alert(Code);
    $("#viewDriverCardBill input[name=Code]").val(Code);


    $.ajax({

        url : URLDriver+'action=GetDriverBillByDBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DBillID:Code}),
        success: function(data)
        {
        	//alert(data["DriverBill"][0]["d_name"]);
            $("#viewDriverCardBill input[name=DriverEdit]").val(data["DriverBill"][0]["d_name"]);
            $("#viewDriverCardBill input[name=CardFee]").val(data["DriverBill"][0]["card_fee"]);
            $("#viewDriverCardBill input[name=EntryDate]").val(data["DriverBill"][0]["entry_date"]);
			$("#viewDriverCardBill input[name=CardYear]").val(data["DriverBill"][0]["card_year"]);
            Status = "";

            if(data["DriverBill"][0]["status"] == "0")
            {
                Status = 	'<div class="alert alert-danger alert-dismissible fade in" role="alert" align="center">'+
                    '<strong>Bill Pending</strong>'+
                    '</div>';
            }
            else if(data["DriverBill"][0]["status"] == "1")
            {
                Status = 	'<div class="alert alert-success alert-dismissible fade in" role="alert" align="center">'+
                    '<strong>Bill Posted</strong>'+
                    '</div>';
            }

            document.getElementById("status").innerHTML = Status;


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
           alert("DetailBill - Status: " + textStatus); alert("Error: " + errorThrown);
        }

    });
}

function DriverBillPosting(Code)
{
    //alert(Code);
    $("#driverPostBill input[name=Code]").val(Code);


    $.ajax({

        url : URLDriver+'action=GetDriverBillByDBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DBillID:Code}),
        success: function(data)
        {
            $("#driverPostBill input[name=owner_name]").val(data["DriverBill"][0]["d_name"]);
			$("#driverPostBill input[name=card_fee]").val(data["DriverBill"][0]["d_name"]);
			
            $("#driverPostBill input[name=owner_name]").val(data["DriverBill"][0]["d_name"]);
            $("#driverPostBill input[name=card_fee]").val(data["DriverBill"][0]["card_fee"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("DetailBill - Status: " + textStatus); alert("Error: " + errorThrown);
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

// --------------------------------------- FORM SUBMIT : Driver Bill------------------------------------------

$('#driverPostBill').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Code = 	$("#driverPostBill input[name=Code]").val();
    var BankID = $("#driverPostBill select[name=Bank]").val();
    var AccountID = $("#driverPostBill select[name=Account]").val();
    var PaymentDate = $("#driverPostBill input[name=PaymentDate]").val();

    //alert(Code + " | " + RegNo + " | " + PaymentDate );

    var param = JSON.stringify({

        Code : Code,
        BankID : BankID,
        AccountID : AccountID,
        PaymentDate : PaymentDate
    });

    //alert();

    $.ajax({

        url : URLBill+'action=DriverBillPost',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        async: false,
        success: function(data)
        {
            var msg = data["DriverBillPost"];
            alert(msg);

            ErrorMessage(msg,"Add");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            //alert("postBill - Status: " + textStatus); alert("Error: " + errorThrown);
            //ErrorMessage("postBill : "+textStatus, "Add");
        }
    });

});


// --------------------------------------- ON CHANGE EVENT START------------------------------------------


$('#StartYear').on('input',function(e){
			
	var StartYear = parseInt($("#StartYear").val());

	$("#EndYear").val(StartYear + 1);
});
		

$( "select[name='RegNo']").change(function () 
{
		var RegNo = $( "select[name='RegNo']" ).val();
		var RegDate = GetRegDateByRegNo(RegNo);	

		$('#RegDate').val(RegDate);
});


$('#Arrear').on('input',function(e){
	
	var Arrear = parseInt($("#Arrear").val());

	CalculateDemand(Arrear);
});
// --------------------------------------- ON CHANGE EVENT END ------------------------------------------



// --------------------------------------- FORM SUBMIT : BILL START------------------------------------------

$('#postBill').submit(function(e) 
{
	e.preventDefault();

	document.getElementById('errorMessage').innerHTML = "";
	var Code = 	$("#postBill input[name=Code]").val();
	var RegNo = $("#postBill input[name=RegNo]").val();
	var BankID = $("#postBill select[name=Bank]").val();
	var AccountID = $("#postBill select[name=Account]").val();
	var PaymentDate = $("#postBill input[name=PaymentDate]").val();

	//alert(Code + " | " + RegNo + " | " + PaymentDate );

	var param = JSON.stringify({

					Code : Code, 
					RegNo : RegNo, 
					BankID : BankID,
					AccountID : AccountID,
					PaymentDate : PaymentDate
				});


	$.ajax({

			url : URLBill+'action=BillPost',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			data: param,
			async: false,
			success: function(data) 
			{ 
				var msg = data["Bill"];
				alert(msg);
			
				ErrorMessage(msg,"Add");
				
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) 
		    { 
	            //alert("postBill - Status: " + textStatus); alert("Error: " + errorThrown); 
	            //ErrorMessage("postBill : "+textStatus, "Add");
	        } 
	});

});


$('#addSingleBill').submit(function(e) 
{
	e.preventDefault();

	document.getElementById('errorMessage').innerHTML = "";
	var Code = $("#Code").val();
	var FiscalYear = $('#FiscalYear').val();
	var RegNo = $("select[name='RegNo']" ).val();
	var RegDate = $("#RegDate").val();
	var ExpiredDate = $("#ExpiredDate").val();
	var RegFee = $("#RegFee").val();
	var Arrear = $("#Arrear").val();
	var SurCharge = $("#SurCharge").val();
	var Total = $("#Total").val();
	var Due = $("#Due").val();
	var Status = "0";
	var PaymentDate = "";

	var param = JSON.stringify({

					Code : Code, 
					FiscalYear : FiscalYear, 
					RegNo : RegNo,
					RegDate : RegDate, 
					ExpiredDate : ExpiredDate, 
					RegFee : RegFee,
					Arrear : Arrear,
					SurCharge : SurCharge, 
					Total : Total, 
					Due : Due,
					Status : Status,
					PaymentDate : ""

				});


	//alert(param);
	console.log(param);

	$.ajax({

			url : URLBill+'action=InsertSingleBill',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			data: param,
			success: function(data) 
			{ 
				var msg = data["Bill"];

				if(msg == "Bill created successfully!!")
				{
					//UpdateCode("SBL");
					RefreshBill();
				}
				ErrorMessage(msg, "Add");			
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) 
		    { 
	           // alert("addSingleBill - Status: " + textStatus); alert("Error: " + errorThrown); 
	            ErrorMessage("addSingleBill : "+textStatus, "Add");
	        } 
	});
});


$('#frmGNB').submit(function(e) 
{
	e.preventDefault();


	//document.getElementById('errorMessage').innerHTML = "";
	var StartYear = $("#frmGNB input[name=StartYear]").val();
	var EndYear = $("#frmGNB input[name=EndYear]").val();
	var FiscalYear = StartYear + "-" + EndYear;
	//alert(FiscalYear);

	var PrvStartYear = parseInt(StartYear)-1;
	var PrvEndYear = StartYear;
	var PrvFiscalYear = PrvStartYear + "-" + PrvEndYear;
	var PreviousBill = GetPreviousBill(PrvFiscalYear);

	//alert("Previous Bill: "+PreviousBill.length);
	
	if(PreviousBill.length>0)
	{
		UpdatePreviousBill(PreviousBill,FiscalYear);
	}
	else
	{
		GenerateNewBill();
	}

	spinner.stop();	
	$("#preview").hide();
});




// --------------------------------------- FORM SUBMIT : BILL END------------------------------------------


function GetPreviousBill(FiscalYear)
{
	var PrvBill = "";

    $.ajax({

	    url : URLBill+'action=GetAllBillByFiscalYear',
	    type: 'POST',
	    dataType : "json",
	    headers: {"App_Key":"123456789"},
	    data: JSON.stringify({FiscalYear:FiscalYear}),
	    async: false,
	    success: function(data)
	    {
	       PrvBill =  data["Bill"];
	    },
	    error: function(XMLHttpRequest, textStatus, errorThrown) {
	       // alert("DetailBill - Status: " + textStatus); alert("Error: " + errorThrown);
	    }

    });

    return PrvBill;
}

function GenerateNewBill()
{
		var RegInfo = GetAllVehicle();

		var Code ="";
		var FiscalYear ="";
		var RegNo = "";
		var RegDate = "";
		var ExpiredDate = "";
		var RegFee = "";
		var Arrear = 0;
		var SurCharge = "";
		var Total = "";
		var Due = "";
		var Status = "0";
		var PaymentDate ="";

		var Count = RegInfo.length;

		//alert(Count);

		var NewEntry = 0;
		var AlreadyExist = 0;
		var Failed = 0;
		var Result = "";
	

		$.each(RegInfo, function(key, value) 
		{
			Code = GetDocNoBill("SBL");
			// alert("Code: "+Code);
			FiscalYear = GetFiscalYear();
			RegNo = value["v_reg_no"];
			RegDate = value["v_reg_date"];
			ExpiredDate = GetExpiredDate(FiscalYear);
			RegFee = GetRegistrationFee();
			SurCharge = GetSurCharge(Arrear);
			Total = GetTotal(RegFee,Arrear,SurCharge); //parseInt(RegFee)+parseInt(Arrear)+parseInt(SurCharge);
			Due = Total;

			var msg = InsertBill(Code,FiscalYear,RegNo,RegDate,ExpiredDate,RegFee,Arrear,SurCharge,Total,Due,Status,PaymentDate);



			if(msg == "Already Exist!!")
			{
				AlreadyExist++;
			}
			else if(msg == "Bill created successfully!!")
			{
				UpdateCode("SBL");
				NewEntry++;
			}
			else
			{
				Failed++;
			}
	

		});

		Result = 'Total Registration No Found : '+Count+
				 '<br>Newly Generated Bill : '+NewEntry+
				 '<br>Already Exist Bill : '+AlreadyExist+
				 '<br>Failed Oparetion : '+Failed;


		var Total = 	'<div class="alert alert-info alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong> Total Registration No. of Found : '+Count+'</strong>'+
						'</div>';

		var Sucess = 	'<div class="alert alert-success alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong> Newly Generated Bill : '+NewEntry+'</strong>'+
						'</div>';

		var Exist = 	'<div class="alert alert-warning alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong> Already Exist Bill : '+AlreadyExist+'</strong>'+
						'</div>';

		var O_Failed =	'<div class="alert alert-danger alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong>Oparetion Failed : '+Failed+'</strong>'+
						'</div>';



		document.getElementById("GNBMessageTotal").innerHTML = Total;
		document.getElementById("GNBMessageSuccess").innerHTML = Sucess;
		document.getElementById("GNBMessageExist").innerHTML = Exist;
		document.getElementById("GNBMessageFailed").innerHTML = O_Failed;
}

function UpdatePreviousBill(PreviousBill,FiscalYear)
{
		var Code ="";
		var FiscalYear = FiscalYear;
		var RegNo = "";
		var RegDate = "";
		var ExpiredDate = "";
		var RegFee = "";
		var Arrear = 0;
		var SurCharge = "";
		var Total = "";
		var Due = "";
		var Status = "0";
		var PaymentDate ="";

		var Count = PreviousBill.length;

		//alert(Count);

		var NewEntry = 0;
		var AlreadyExist = 0;
		var Failed = 0;
		var Result = "";


		var width = 0;
		var widthPercent = 100/Count; 
	
		$.each(PreviousBill, function(key, value) 
		{
			Code = GetDocNoBill("SBL");
			RegNo = value["v_reg_no"];
			RegDate = value["reg_date"];
			ExpiredDate = value["expired_date"];
			RegFee = GetRegistrationFee();
			Arrear = value["due"];
			SurCharge = GetSurCharge(Arrear);
			Total = GetTotal(RegFee,Arrear,SurCharge); //parseInt(RegFee)+parseInt(Arrear)+parseInt(SurCharge);
			Due = Total;

			//alert(Arrear+"-"+SurCharge + "-" + Total + "-" + Due);

		

			var msg = InsertBill(Code,FiscalYear,RegNo,RegDate,ExpiredDate,RegFee,Arrear,SurCharge,Total,Due,Status,PaymentDate);



			if(msg == "Already Exist!!")
			{
				AlreadyExist++;
			}
			else if(msg == "Bill created successfully!!")
			{
				UpdateCode("SBL");
				NewEntry++;
			}
			else
			{
				Failed++;
			}

			// width = Math.ceil(width + widthPercent); 
			// PrograssBar(width);

			
		    //alert(width);
		});


		// Result = 'Total Registration No Found : '+Count+
		// 		 '<br>Newly Generated Bill : '+NewEntry+
		// 		 '<br>Already Exist Bill : '+AlreadyExist+
		// 		 '<br>Failed Oparetion : '+Failed;

		//alert(Result);

		var Total = 	'<div class="alert alert-info alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong> Total Registration No. of Found : '+Count+'</strong>'+
						'</div>';

		var Sucess = 	'<div class="alert alert-success alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong> Newly Generated Bill : '+NewEntry+'</strong>'+
						'</div>';

		var Exist = 	'<div class="alert alert-warning alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong> Already Exist Bill : '+AlreadyExist+'</strong>'+
						'</div>';

		var O_Failed =	'<div class="alert alert-danger alert-dismissible fade in" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
							'<strong>Oparetion Failed : '+Failed+'</strong>'+
						'</div>';



		document.getElementById("GNBMessageTotal").innerHTML = Total;
		document.getElementById("GNBMessageSuccess").innerHTML = Sucess;
		document.getElementById("GNBMessageExist").innerHTML = Exist;
		document.getElementById("GNBMessageFailed").innerHTML = O_Failed;
}

function InsertBill(Code,FiscalYear,RegNo,RegDate,ExpiredDate,RegFee,Arrear,SurCharge,Total,Due,Status,PaymentDate)
{
	//e.preventDefault();
	var msg = "";
	var param = JSON.stringify({

				Code : Code, 
				FiscalYear : FiscalYear, 
				RegNo : RegNo,
				RegDate : RegDate, 
				ExpiredDate : ExpiredDate, 
				RegFee : RegFee,
				Arrear : Arrear,
				SurCharge : SurCharge, 
				Total : Total, 
				Due : Due,
				Status : Status,
				PaymentDate : PaymentDate

	});


	//alert(param);
	console.log(param);

	$.ajax({

			url : URLBill+'action=InsertSingleBill',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			data: param,
			async : false,
			success: function(data) 
			{ 
				msg = data["Bill"];

				if(msg == "Bill created successfully!!")
				{
					UpdateCode("SBL");

				}
		
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) 
		    { 
	          //  alert("InsertBill - Status: " + textStatus); alert("Error: " + errorThrown); 
	            ErrorMessage("InsertBill : "+textStatus, "Add");
	        } 
	});



	return msg;
}

function InsertSingleBill(Code,FiscalYear,RegNo,RegDate,ExpiredDate,RegFee,Arrear,SurCharge,Total,Due,Status,PaymentDate)
{
	//e.preventDefault();
	var msg = "";
	var param = JSON.stringify({

				Code : Code, 
				FiscalYear : FiscalYear, 
				RegNo : RegNo,
				RegDate : RegDate, 
				ExpiredDate : ExpiredDate, 
				RegFee : RegFee,
				Arrear : Arrear,
				SurCharge : SurCharge, 
				Total : Total, 
				Due : Due,
				Status : Status,
				PaymentDate : PaymentDate

	});


	//alert(param);
	console.log(param);

	$.ajax({

			url : URLBill+'action=InsertSingleBill',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			data: param,
			async : false,
			success: function(data) 
			{ 
				msg = data["Bill"];

				if(msg == "Bill created successfully!!")
				{
					UpdateCode("SBL");
					RefreshBill();
				}
				ErrorMessage(msg, "Add");			
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) 
		    { 
	           // alert("InsertSingleBill - Status: " + textStatus); alert("Error: " + errorThrown); 
	            ErrorMessage("InsertSingleBill : "+textStatus, "Add");
	        } 
	});
	return msg;
}

function Invoice(Code)
{
	var InvData = GetInvoiceData(Code);
	var Account = GetAllAccount();
	
	var ExpiredDate = InvData["Invoice"][0]["expired_date"].split("-");
    var ExpiredDate = ExpiredDate[2]+"/"+ExpiredDate[1]+"/"+ExpiredDate[0];
    
    
    var RegFee = parseFloat(InvData["Invoice"][0]["reg_fee"]);
    var OwnerCardFee = parseFloat(LoadOwnerCardFee());
    var Arrear = parseFloat(InvData["Invoice"][0]["arrear"]);
    var SurCharge = parseFloat(InvData["Invoice"][0]["sur_charge"]);
    var Fine = parseFloat("0");
    var Total = RegFee+OwnerCardFee+Arrear+SurCharge+Fine;

	//------------------ FOR Municipality Copy
	document.getElementById("invBillNo").innerHTML = Code;
	document.getElementById("invOwnerName").innerHTML = InvData["Invoice"][0]["o_name"];
	document.getElementById("invRegNo").innerHTML = InvData["Invoice"][0]["v_reg_no"];
	document.getElementById("invFiscalYear").innerHTML = EnglishToBanglaNumber(InvData["Invoice"][0]["fiscal_year"]);
	document.getElementById("invExpiredDate").innerHTML = EnglishToBanglaNumber(ExpiredDate);
	
	document.getElementById("invRegFee").innerHTML = RegFee+"/-";
	document.getElementById("invCardFee").innerHTML  = OwnerCardFee+"/-";
	document.getElementById("invArrear").innerHTML = Arrear+"/-";
	document.getElementById("invSurCharge").innerHTML = SurCharge+"/-";	
	document.getElementById("invFine").innerHTML = Fine+"/-";
	document.getElementById("invTotal").innerHTML = Total+"/-";
	
	//------------------ FOR Bank Copy
	document.getElementById("invBillNoB").innerHTML = Code;
	document.getElementById("invOwnerNameB").innerHTML = InvData["Invoice"][0]["o_name"];
	document.getElementById("invRegNoB").innerHTML = InvData["Invoice"][0]["v_reg_no"];
	document.getElementById("invFiscalYearB").innerHTML = EnglishToBanglaNumber(InvData["Invoice"][0]["fiscal_year"]);
	document.getElementById("invExpiredDateB").innerHTML = EnglishToBanglaNumber(ExpiredDate);
	
	document.getElementById("invRegFeeB").innerHTML = RegFee+"/-";
	document.getElementById("invCardFeeB").innerHTML  = OwnerCardFee+"/-";
	document.getElementById("invArrearB").innerHTML = Arrear+"/-";
	document.getElementById("invSurChargeB").innerHTML = SurCharge+"/-";	
	document.getElementById("invFineB").innerHTML = Fine+"/-";
	document.getElementById("invTotalB").innerHTML = Total+"/-";

	//------------------ FOR Consumer Copy
	document.getElementById("invBillNoC").innerHTML = Code;
	document.getElementById("invOwnerNameC").innerHTML = InvData["Invoice"][0]["o_name"];
	document.getElementById("invRegNoC").innerHTML = InvData["Invoice"][0]["v_reg_no"];
	document.getElementById("invFiscalYearC").innerHTML = EnglishToBanglaNumber(InvData["Invoice"][0]["fiscal_year"]);
	document.getElementById("invExpiredDateC").innerHTML = EnglishToBanglaNumber(ExpiredDate);
	
	document.getElementById("invRegFeeC").innerHTML = RegFee+"/-";
	document.getElementById("invCardFeeC").innerHTML  = OwnerCardFee+"/-";
	document.getElementById("invArrearC").innerHTML = Arrear+"/-";
	document.getElementById("invSurChargeC").innerHTML = SurCharge+"/-";	
	document.getElementById("invFineC").innerHTML = Fine+"/-";
	document.getElementById("invTotalC").innerHTML = Total+"/-";


	
	var BankTableHeader = 	'<table border="1" class="invBankInfo">'+
								'<theader>'+
								'<th style="text-align: center !important;width: 45%;"> ব্যাংকের নাম </th>'+
		                        '<th style="text-align: center !important;width: 25%;"> শাখা </th>'+
		                        '<th style="text-align: center !important;width: 30%;"> হিসাব নং </th>'+
		                        '</theader>'+
		                    '<tbody>';
	var BankRow = "";

    $.each(Account, function(key, value)
	{
	    //alert(value["b_id"] +"-"+value["b_name"]);

	    BankRow += '<tr><td> '+value["b_name"]+'</td><td> '+value["ac_branch"]+'</td><td> '+value["ac_no"]+'</td></tr>';
	});

   var BankFooter = '</tbody></table>';

   var InvBank = BankTableHeader+BankRow+BankFooter;


   document.getElementById('invBankInfo').innerHTML = InvBank;
   document.getElementById('invBankInfoC').innerHTML = InvBank;
   document.getElementById('invBankInfoB').innerHTML = InvBank;

	
}

function GetInvoiceData(Code)
{
	var InvData = "";

	$.ajax({

        url : URLBill+'action=GetInvoiceInfoByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
        	InvData = data;

     	},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });

    return InvData;
}

function GetAllAccount()
{
	var Account = "";

	$.ajax({

        url : URLBank+'action=GetAllAccount',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        async:false,
        success: function(data)
        {
        	Account = data;

     	},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //alert("VehicleView - Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });

    return Account;
}

function GetOwnerInfoByCBillID(CBillID)
{
    var myData = '';
    $.ajax({
        url : URLVehicle+'action=GetOwnerInfoByCBillID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code: CBillID}),
        async: false,
        success: function(data)
        {
            myData = data;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }
    });
    return myData;
}

function OwnerCardBillReceivedCopy(Code)
{

    var OwnerCardInvData = GetOwnerInfoByCBillID(Code); 
    // console.log(OwnerCardInvData);

    if(OwnerCardInvData["OwnerBill"][0]["c_division"] != ''){
        var cDivID = OwnerCardInvData["OwnerBill"][0]["c_division"];
        var cDivision = GetDivisionByDivID(cDivID);
    }
    


    var cSubDivID = OwnerCardInvData["OwnerBill"][0]["c_sub_division"];
    var cSubDivision = GetSubDivisionBySubDivID(cSubDivID);


    var cWardID = OwnerCardInvData["OwnerBill"][0]["c_ward_no"];
    var cWard = GetWardByWardID(cWardID);

    var cAreaID = OwnerCardInvData["OwnerBill"][0]["c_vill"];
    var cArea = GetAreaByAreaID(cAreaID);
    
    var Address = OwnerCardInvData["OwnerBill"][0]["o_holding_no"]+', '+cArea+', '+cWard+', '+cSubDivision+', '+cDivision;
	document.getElementById("issuedate").innerHTML = OwnerCardInvData['OwnerBill'][0]['issue_date'];
	document.getElementById("code").innerHTML = OwnerCardInvData['OwnerBill'][0]['v_reg_no'];
    document.getElementById("code1").innerHTML = OwnerCardInvData['OwnerBill'][0]['chassis_no'];
    document.getElementById("code2").innerHTML = OwnerCardInvData['OwnerBill'][0]['o_code'];
    document.getElementById("code3").innerHTML = OwnerCardInvData['OwnerBill'][0]['o_name'];
    document.getElementById("code4").innerHTML = OwnerCardInvData['OwnerBill'][0]['o_father_name'];
    document.getElementById("code5").innerHTML = OwnerCardInvData['OwnerBill'][0]['o_mother_name'];
    document.getElementById("code6").innerHTML = Address;
    document.getElementById("code7").innerHTML = OwnerCardInvData['OwnerBill'][0]['o_mobile'];


    // //------------------ FOR Municipality Copy
    // document.getElementById("invOwnerCardBillNo").innerHTML = Code;
    // document.getElementById("invCardOwnerName").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"];
    // document.getElementById("invOwnerCardRegNo").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"];
    // document.getElementById("cardInvOwnerRegFee").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";
    // document.getElementById("invOwnerTotal").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";

    // //------------------ FOR Consumer Copy
    // document.getElementById("invOwnerCardBillNoC").innerHTML = Code;
    // document.getElementById("invCardOwnerNameC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"];
    // document.getElementById("invOwnerCardRegNoC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"];
    // document.getElementById("cardInvOwnerRegFeeC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";
    // document.getElementById("invOwnerTotalC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";

    // //------------------ FOR Bank Copy
    // document.getElementById("invOwnerCardBillNoB").innerHTML = Code;
    // document.getElementById("invCardOwnerNameB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"];
    // document.getElementById("invOwnerCardRegNoB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"];
    // document.getElementById("cardInvOwnerRegFeeB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";
    // document.getElementById("invOwnerTotalB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";

    // var BankTableHeader = 	'<table border="1" class="invBankInfo">'+
    //     '<theader>'+
    //     '<th style="text-align: center !important;width: 45%;"> ব্যাংকের নাম </th>'+
    //     '<th style="text-align: center !important;width: 25%;"> শাখা </th>'+
    //     '<th style="text-align: center !important;width: 30%;"> হিসাব নং </th>'+
    //     '</theader>'+
    //     '<tbody>';
    // var BankRow = "";

    // $.each(Account, function(key, value)
    // {
    //     //alert(value["b_id"] +"-"+value["b_name"]);

    //     BankRow += '<tr><td> '+value["b_name"]+'</td><td> '+value["ac_branch"]+'</td><td> '+value["ac_no"]+'</td></tr>';
    // });

    // var BankFooter = '</tbody></table>';

    // var InvBank = BankTableHeader+BankRow+BankFooter;


    // document.getElementById('invBankInfo').innerHTML = InvBank;
    // document.getElementById('invBankInfoC').innerHTML = InvBank;
    // document.getElementById('invBankInfoB').innerHTML = InvBank;


}

//---------------------------------Owner Card Invoice -------------------------------------------------


function InvoiceOwnerCard(Code)
{

    var OwnerCardInvData = GetOwnerCardInvoiceData(Code);
    // var Account = GetAllAccount();

	// console.log(OwnerCardInvData);

	$(".invCardBillNo").html(OwnerCardInvData["OwnerInvoiceCard"][0]["ocbl_code"]);
	$(".invOwnerTrnsRegNoC").html(OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"]);
	$(".invTrnsOwnerNameC").html(OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"]);
	$(".invOwnerIdNoC").html(OwnerCardInvData["OwnerInvoiceCard"][0]["o_code"]);
	$('.fiscalYear').html(OwnerCardInvData["OwnerInvoiceCard"][0]["fiscal_year"]);
	$('.idate').html(OwnerCardInvData["OwnerInvoiceCard"][0]["issue_date"]);
	$('.invBillPayDateC').html(OwnerCardInvData["OwnerInvoiceCard"][0]["payment_date"]);

	$('.bank_info1').html(OwnerCardInvData["OwnerInvoiceCard"][0]["b_name"]);
	$('.bank_info2').html(OwnerCardInvData["OwnerInvoiceCard"][0]["ac_branch"]);
	$('.bank_info3').html(OwnerCardInvData["OwnerInvoiceCard"][0]["ac_no"]);

	if(OwnerCardInvData["OwnerInvoiceCard"][0]["bill_type"] == '0')
	{
		$('.bill1').html(OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-");
		$('.bill2').html("");
		$('.bill3').html("");
	}else if(OwnerCardInvData["OwnerInvoiceCard"][0]["bill_type"] == '1')
	{
		$('.bill2').html(OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-");
		$('.bill3').html("");
		$('.bill1').html("");
	}else if(OwnerCardInvData["OwnerInvoiceCard"][0]["bill_type"] == '2')
	{
		$('.bill3').html(OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-");
		$('.bill1').html("");
		$('.bill2').html("");
	}
	$('.billtotal').html(OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-");

	// OwnerCardInvData["OwnerInvoiceCard"][0]["ocbl_code"]
	// OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"]
	// OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"]
	// OwnerCardInvData["OwnerInvoiceCard"][0]["o_id"]
	// &nbsp;
	// OwnerCardInvData["OwnerInvoiceCard"][0]["entry_date"]
	// OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"]
	// OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]

    // //------------------ FOR Municipality Copy
    // document.getElementById("invOwnerCardBillNo").innerHTML = Code;
    // document.getElementById("invCardOwnerName").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"];
    // document.getElementById("invOwnerCardRegNo").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"];
    // document.getElementById("cardInvOwnerRegFee").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";
    // document.getElementById("invOwnerTotal").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";

    // //------------------ FOR Consumer Copy
    // document.getElementById("invOwnerCardBillNoC").innerHTML = Code;
    // document.getElementById("invCardOwnerNameC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"];
    // document.getElementById("invOwnerCardRegNoC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"];
    // document.getElementById("cardInvOwnerRegFeeC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";
    // document.getElementById("invOwnerTotalC").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";

    // //------------------ FOR Bank Copy
    // document.getElementById("invOwnerCardBillNoB").innerHTML = Code;
    // document.getElementById("invCardOwnerNameB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_name"];
    // document.getElementById("invOwnerCardRegNoB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["v_reg_no"];
    // document.getElementById("cardInvOwnerRegFeeB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";
    // document.getElementById("invOwnerTotalB").innerHTML = OwnerCardInvData["OwnerInvoiceCard"][0]["o_card_fee"]+"/-";

    // var BankTableHeader = 	'<table border="1" class="invBankInfo">'+
    //     '<theader>'+
    //     '<th style="text-align: center !important;width: 45%;"> ব্যাংকের নাম </th>'+
    //     '<th style="text-align: center !important;width: 25%;"> শাখা </th>'+
    //     '<th style="text-align: center !important;width: 30%;"> হিসাব নং </th>'+
    //     '</theader>'+
    //     '<tbody>';
    // var BankRow = "";

    // $.each(Account, function(key, value)
    // {
    //     //alert(value["b_id"] +"-"+value["b_name"]);

    //     BankRow += '<tr><td> '+value["b_name"]+'</td><td> '+value["ac_branch"]+'</td><td> '+value["ac_no"]+'</td></tr>';
    // });

    // var BankFooter = '</tbody></table>';

    // var InvBank = BankTableHeader+BankRow+BankFooter;


    // document.getElementById('invBankInfo').innerHTML = InvBank;
    // document.getElementById('invBankInfoC').innerHTML = InvBank;
    // document.getElementById('invBankInfoB').innerHTML = InvBank;


}


function GetOwnerCardInvoiceData(Code)
{
    var OwnerCardInvData = "";

    $.ajax({

        url : URLOwner+'action=GetOwnerCardInvoiceInfoByCode',
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


//---------------------------------Driver Card Invoice -------------------------------------------------


function InvoiceCard(Code)
{
    
	var CardInvData = GetCardInvoiceData(Code);
	var datas = CardInvData["InvoiceCard"];
	var datas = datas[0];
    var Account = GetAllAccount();
	console.log(CardInvData);

	$('.invCardBillNo').html(datas['cbl_code']);
	$('.driverName').html(datas['d_name']);
	$('.driverId').html(datas['d_code']);
	$('.driverLicenseNo').html(datas['d_license_no']);
	$('.fiscalYear').html(datas['fiscal_year']);
	$('.idate').html(datas['issue_date']);
	$('.invBillPayDateC').html(datas['payment_date']);

	$('.bank_info1').html(datas["b_name"]);
	$('.bank_info2').html(datas["ac_branch"]);
	$('.bank_info3').html(datas["ac_no"]);


	if(datas['bill_type'] == '0')
	{
		$('.bill1').html(datas['card_fee']+"/-");
		$('.bill2').html("");
		$('.bill3').html("");
	}else if(datas['bill_type'] == '1')
	{
		$('.bill2').html(datas['card_fee']+"/-");
		$('.bill3').html("");
		$('.bill1').html("");
	}else if(datas['bill_type'] == '2')
	{
		$('.bill3').html(datas['card_fee']+"/-");
		$('.bill1').html("");
		$('.bill2').html("");
	}
	$('.billtotal').html(datas['card_fee']+"/-");

	// document.getElementById("invCardDriverName").innerHTML = CardInvData["InvoiceCard"][0]["d_name"];
	// document.getElementById("invCardRegNo").innerHTML = CardInvData["InvoiceCard"][0]["d_license_no"];
	// /*document.getElementById("invFiscalYear").innerHTML = CardInvData["InvoiceCard"][0]["fiscal_year"];*/
	// document.getElementById("cardInvRegFee").innerHTML = CardInvData["InvoiceCard"][0]["card_fee"]+"/-";
	// document.getElementById("invTotal").innerHTML = CardInvData["InvoiceCard"][0]["card_fee"]+"/-";

	// //------------------ FOR Consumer Copy
	// document.getElementById("invCardBillNoC").innerHTML = Code;
	// document.getElementById("invCardDriverNameC").innerHTML = CardInvData["InvoiceCard"][0]["d_name"];
	// document.getElementById("invCardRegNoC").innerHTML = CardInvData["InvoiceCard"][0]["d_license_no"];
	// /*document.getElementById("invFiscalYear").innerHTML = CardInvData["InvoiceCard"][0]["fiscal_year"];*/
	// document.getElementById("cardInvRegFeeC").innerHTML = CardInvData["InvoiceCard"][0]["card_fee"]+"/-";
	// document.getElementById("invTotalC").innerHTML = CardInvData["InvoiceCard"][0]["card_fee"]+"/-";

    // //------------------ FOR Bank Copy
    // document.getElementById("invCardBillNoB").innerHTML = Code;
    // document.getElementById("invCardDriverNameB").innerHTML = CardInvData["InvoiceCard"][0]["d_name"];
    // document.getElementById("invCardRegNoB").innerHTML = CardInvData["InvoiceCard"][0]["d_license_no"];
    // /*document.getElementById("invFiscalYear").innerHTML = CardInvData["InvoiceCard"][0]["fiscal_year"];*/
    // document.getElementById("cardInvRegFeeB").innerHTML = CardInvData["InvoiceCard"][0]["card_fee"]+"/-";
    // document.getElementById("invTotalB").innerHTML = CardInvData["InvoiceCard"][0]["card_fee"]+"/-";

    // var BankTableHeader = 	'<table border="1" class="invBankInfo">'+
    //     '<theader>'+
    //     '<th style="text-align: center !important;width: 45%;"> ব্যাংকের নাম </th>'+
    //     '<th style="text-align: center !important;width: 25%;"> শাখা </th>'+
    //     '<th style="text-align: center !important;width: 30%;"> হিসাব নং </th>'+
    //     '</theader>'+
    //     '<tbody>';
    // var BankRow = "";

    // $.each(Account, function(key, value)
    // {
    //     //alert(value["b_id"] +"-"+value["b_name"]);

    //     BankRow += '<tr><td> '+value["b_name"]+'</td><td> '+value["ac_branch"]+'</td><td> '+value["ac_no"]+'</td></tr>';
    // });

    // var BankFooter = '</tbody></table>';

    // var InvBank = BankTableHeader+BankRow+BankFooter;


    // document.getElementById('invBankInfo').innerHTML = InvBank;
    // document.getElementById('invBankInfoC').innerHTML = InvBank;
    // document.getElementById('invBankInfoB').innerHTML = InvBank;

	
}

                                
function GetCardInvoiceData(Code)
{
	var CardInvData = "";

	$.ajax({

        url : URLDriver+'action=GetCardInvoiceInfoByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
        	CardInvData = data;

     	},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        }
    });
    //alert(CardInvData);

    return CardInvData;
}

//---------------------------------Owner Transfer Invoice -------------------------------------------------


function InvoiceOwnerTrns(Code)
{

    var OwnerTrnsInvData = GetOwnerTrnsInvoiceData(Code);
    var Account = GetAllAccount();
    // alert(Code);
    //------------------ FOR Municipality Copy
	console.log(OwnerTrnsInvData["OwnerTrnsInvoice"][0]);
	var datas = OwnerTrnsInvData["OwnerTrnsInvoice"][0];


	$('.invOwnerTrnsBillNoC').html(datas["otbl_code"]);
	$('.invOwnerTrnsRegNoC').html(datas["reg_no"]);
    $('.invTrnsOwnerNameC').html(datas["o_name"]);
    $('.fiscalYear').html(datas["fiscal_year"]);
	$('.ownerid').html(datas["o_code"]);
	$('.billporisodhtarikh').html(datas["payment_date"]);
	$('.ownertransfee').html(datas["owner_transfer_fee"]+'/-');
	$('.bankname').html(datas["b_name"]);
	$('.branchname').html(datas["ac_branch"]);
	$('.accnumber').html(datas["ac_no"]);
	$('.idate').html(datas["issue_date"]);


    // document.getElementById("invOwnerTrnsBillNo").innerHTML = Code;
    // document.getElementById("invTrnsOwnerName").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["o_name"];
    // document.getElementById("invOwnerTrnsRegNo").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["reg_no"];
    // document.getElementById("TrnsInvOwnerRegFee").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["owner_transfer_fee"]+"/-";
    // document.getElementById("invOwnerTotal").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["owner_transfer_fee"]+"/-";

    // //------------------ FOR Consumer Copy
    // document.getElementById("invOwnerTrnsBillNoC").innerHTML = Code;
    // document.getElementById("invTrnsOwnerNameC").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["o_name"];
    // document.getElementById("invOwnerTrnsRegNoC").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["reg_no"];
    // document.getElementById("TrnsInvOwnerRegFeeC").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["owner_transfer_fee"]+"/-";
    // document.getElementById("invOwnerTotalC").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["owner_transfer_fee"]+"/-";

    // //------------------ FOR Bank Copy
    // document.getElementById("invOwnerTrnsBillNoB").innerHTML = Code;
    // document.getElementById("invTrnsOwnerNameB").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["o_name"];
    // document.getElementById("invOwnerTrnsRegNoB").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["reg_no"];
    // document.getElementById("TrnsInvOwnerRegFeeB").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["owner_transfer_fee"]+"/-";
    // document.getElementById("invOwnerTotalB").innerHTML = OwnerTrnsInvData["OwnerTrnsInvoice"][0]["owner_transfer_fee"]+"/-";

    // var BankTableHeader = 	'<table border="1" class="invBankInfo">'+
    //     '<theader>'+
    //     '<th style="text-align: center !important;width: 45%;"> ব্যাংকের নাম </th>'+
    //     '<th style="text-align: center !important;width: 25%;"> শাখা </th>'+
    //     '<th style="text-align: center !important;width: 30%;"> হিসাব নং </th>'+
    //     '</theader>'+
    //     '<tbody>';
    // var BankRow = "";

    // $.each(Account, function(key, value)
    // {
    //     //alert(value["b_id"] +"-"+value["b_name"]);

    //     BankRow += '<tr><td> '+value["b_name"]+'</td><td> '+value["ac_branch"]+'</td><td> '+value["ac_no"]+'</td></tr>';
    // });

    // var BankFooter = '</tbody></table>';

    // var InvBank = BankTableHeader+BankRow+BankFooter;


    // document.getElementById('invBankInfo').innerHTML = InvBank;
    // document.getElementById('invBankInfoC').innerHTML = InvBank;
    // document.getElementById('invBankInfoB').innerHTML = InvBank;


}


function GetOwnerTrnsInvoiceData(Code)
{
    var OwnerTrnsInvData = "";

    $.ajax({

        url : URLOwnerTransfer+'action=GetOwnerTrnsInvoiceInfoByCode',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({Code:Code}),
        async:false,
        success: function(data)
        {
            OwnerTrnsInvData = data;

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {

        }
    });
    //alert(TrnsInvData);

    return OwnerTrnsInvData;
}
