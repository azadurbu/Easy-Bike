

function GetAllDivision()
{
    $.ajax({

        url : URLLocation+'action=GetAllDivision',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="Division"]').empty();
            $('select[name="Division"]').append('<option value="">'+ "---- উপজেলা ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="Division"]').append('<option value="'+ value["division_id"] +'">'+ value["division"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
           /* alert("GetAllDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}

function GetAllDivisionEdit()
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
           /* alert("GetAllDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}

function GetAllSubDivision()
{
    $.ajax({

        url : URLLocation+'action=GetAllSubDivision',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="SubDivision"]').empty();
            $('select[name="SubDivision"]').append('<option value="">'+ "---- পৌরসভার ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="SubDivision"]').append('<option value="'+ value["sub_division_id"] +'">'+ value["sub_division"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          /*  alert("GetAllSubDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}

function GetDivisionByDivID(DivID)
{
	var division = "";

	$.ajax({

			url : URLLocation+'action=GetDivisionByDivID',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			data: JSON.stringify({DivID: DivID}),
			async: false,
			success: function(data) 
			{ 
				division =  data[0]["division"];

			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	        /*    alert("GetDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown); */
	        } 

		});

	return division;
}

function GetSubDivisionByDivID(DivID){


	//alert("Helooooo= "+DivID);
    $.ajax({

        url : URLLocation+'action=GetSubDivisionByDivisionID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivisionID: DivID}),
        success: function(data)
        {
            $('select[name="SubDivision"]').empty();
            $('select[name="SubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

            $.each(data, function(key, value)
            {


                $('select[name="SubDivision"]').append('<option value="'+ value["sub_division_id"] +'">'+ value["sub_division"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
         /*   alert("GetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
}

function GetSubDivisionBySubDivID(SubDivID)
{
    var SubDivision = "";

    $.ajax({

            url : URLLocation+'action=GetSubDivisionBySubDivID',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: JSON.stringify({SubDivID: SubDivID}),
            async: false,
            success: function(data) 
            { 
                SubDivision =  data[0]["sub_division"];

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
               // alert("GetSubDivisionBySubDivID - Status: " + textStatus); alert("Error: " + errorThrown); 
            } 

        });

    return SubDivision;
}

function GetWardNoByDivAndSubDivID(DivID,SubDivID){


    //alert("Helooooo= "+DivID);
    $.ajax({

        url : URLLocation+'action=GetWardNoByDivAndSubDivID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({DivID: DivID, SubDivID:SubDivID}),
        success: function(data)
        {
            $('select[name="WardNo"]').empty();
            $('select[name="WardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং----" +'</option>');

            $.each(data, function(key, value)
            {
                //alert(value["WardNo"]);
                $('select[name="WardNo"]').append('<option value="'+ value["ward_no_id"] +'">'+ value["ward_no"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
         /*   alert("GetWardNoByDivAndSubDivID - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
}

function GetSubDivisionBySubDivID(SubDivID)
{
	var SubDivision = "";

	$.ajax({

			url : URLLocation+'action=GetSubDivisionBySubDivID',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			data: JSON.stringify({SubDivID: SubDivID}),
			async: false,
			success: function(data) 
			{ 
				SubDivision =  data[0]["sub_division"];
                $("#editSubDivision input[name=SubDivision]").val(SubDivision);

                $("#editSubDivision select[name=Division]").empty();
                $("#editSubDivision select[name=Division]").append('<option value="'+ data[0]["division_id"] +'">'+ data[0]["division"] +'</option>');




			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	         /*   alert("GetSubDivisionBySubDivID - Status: " + textStatus); alert("Error: " + errorThrown); */
	        } 

		});

	return SubDivision;
}

function GetWardByWardID(WardID)
{
    var Ward = "";

    $.ajax({

            url : URLLocation+'action=GetWardByWardID',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: JSON.stringify({WardID: WardID}),
            async: false,
            success: function(data) 
            { 
                Ward =  data[0]["ward_no"];

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
               // alert("GetWardByWardID - Status: " + textStatus); alert("Error: " + errorThrown); 
            } 

        });
//alert(Ward);
    return Ward;
}

function GetWardDetailByWardID(WardID)
{
    var Ward = "";

    $.ajax({

        url : URLLocation+'action=GetWardByWardID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({WardID: WardID}),
        async: false,
        success: function(data)
        {
            Ward =  data;

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            // alert("GetWardByWardID - Status: " + textStatus); alert("Error: " + errorThrown);
        }

    });
    //alert(Ward);
    return Ward;
}

function GetAreaByAreaID(AreaID)
{
    var Area = "";

    $.ajax({

            url : URLLocation+'action=GetAreaByAreaID',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: JSON.stringify({AreaID: AreaID}),
            async: false,
            success: function(data) 
            { 
                Area =  data[0]["area"];

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
               // alert("GetAreaByAreaID - Status: " + textStatus); alert("Error: " + errorThrown); 
            } 

        });

    return Area;
}

function GetAreaDetailByAreaID(AreaID)
{
    var Area = "";

    $.ajax({

            url : URLLocation+'action=GetAreaByAreaID',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: JSON.stringify({AreaID: AreaID}),
            async: false,
            success: function(data)
            {
                Area =  data;

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
               // alert("GetAreaByAreaID - Status: " + textStatus); alert("Error: " + errorThrown);
            }

        });
    //alert(Area);

    return Area;
}

//------------------------------------------ Function: Division Start----------------------------
function DivisionEdit(DivisionID) // Load Data For EDIT 
{
	//alert(DivisionID);
	document.getElementById('errorMessageEdit').innerHTML = "";
	$("#editDivision input[name=DivisionID]").val(DivisionID);
	$("#editDivision input[name=Division]").val(GetDivisionByDivID(DivisionID));	
}


function DivisionDelete(DivisionID) // Load Data For Delete
{
    document.getElementById("ConfirmMSG").style.display = "inline";
    document.getElementById('errorMessageDelete').innerHTML = "";
    $("#deleteDivision input[name=DivisionID]").val(DivisionID);
}
//------------------------------------------ Function: Division End-------------------------------

//------------------------------------------ Submit: Division Start-------------------------------
$('#addDivision').submit(function(e) 
{
	e.preventDefault();
	
	document.getElementById('errorMessage').innerHTML = "";

	
	var Division = $("#Division").val();
	/*alert(Division);*/


	var param = JSON.stringify({Division : Division});


	$.ajax({

			url : URLLocation+'action=InsertDivision',
			type: 'POST',
			dataType : "json",
			headers: {"App_Key":"123456789"},
			data: param,
			success: function(data) 
			{ 
                //alert("Division");
				var msg = data["Division"];
				ErrorMessage(msg, "Add");			
			},
		    error: function(XMLHttpRequest, textStatus, errorThrown) 
		    { 
	           /* alert("addVehicle - Status: " + textStatus); alert("Error: " + errorThrown); */
	            ErrorMessage("addDivision : "+textStatus, "Add");
	        } 
	});
});


$('#editDivision').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();



	var DivisionID = $("#editDivision input[name=DivisionID]").val();
	var Division = $("#editDivision input[name=Division]").val();




    //alert(DivisionID + " | " + Division );

    var param = JSON.stringify({

        DivisionID : DivisionID,
        Division : Division,


    });


	 $.ajax({

            url : URLLocation+'action=UpdateDivision',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: param,
            success: function(data)
            {
                var msg = data["Division"];
                ErrorMessage(msg, "Edit");

            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
             /*   alert("editDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
                ErrorMessage("editDivision : "+textStatus, "Edit");
            }
        });
});


$('#deleteDivision').submit(function(e)
{
    e.preventDefault();

	var DivisionID = $("#deleteDivision input[name=DivisionID]").val();

  /*  alert(DivisionID);*/

    var param = JSON.stringify({

        DivisionID : DivisionID
    });


	 $.ajax({

            url : URLLocation+'action=DeleteDivision',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: param,
            success: function(data)
            {
                var msg = data["Division"];
                if(msg == "Record deleted successfully!!")
                {
                  document.getElementById("ConfirmMSG").style.display = "none";
                }
                ErrorMessage(msg, "Delete");

            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
            /*    alert("deleteDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
                ErrorMessage("deleteDivision : "+textStatus, "Edit");
            }
        });
});
//------------------------------------------ Submit: Division End----------------------------


//------------------------------------------ Function: SubDivision Start----------------------------

function SubDivisionEdit(SubDivisionID) // Load Data For EDIT
{
    //alert(DivisionID);
    
    document.getElementById('errorMessageEdit').innerHTML = "";
    
    $("#editSubDivision input[name=SubDivisionID]").val(SubDivisionID);

    GetSubDivisionBySubDivID(SubDivisionID);
}

function DeleteSubDivision(SubDivisionID) // Load Data For Delete
{
    document.getElementById("ConfirmMSG").style.display = "inline";
    document.getElementById('errorMessageDelete').innerHTML = "";
    $("#deleteSubDivision input[name=SubDivisionID]").val(SubDivisionID);
}


//------------------------------------------ Function: SubDivision End------------------------------

//------------------------------------------ Submit: SubDivision Start------------------------------

$('#addSubDivision').submit(function(e)
{
    e.preventDefault();
    
    document.getElementById('errorMessage').innerHTML = "";


    var DivisionID = $( "select[name='Division']" ).val();
    var SubDivision = $("#SubDivision").val();
   /* alert(SubDivision);*/


    var param = JSON.stringify({DivisionID : DivisionID, SubDivision:SubDivision});


    $.ajax({

        url : URLLocation+'action=InsertSubDivision',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["SubDivision"];
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
         /*   alert("addSubDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("addSubDivision : "+textStatus, "Add");
        }
    });
});

$('#editSubDivision').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();



    var SubDivisionID = $("#editSubDivision input[name=SubDivisionID]").val();
    var DivisionID = $("#editSubDivision select[name=Division]").val();
    var SubDivision = $("#editSubDivision input[name=SubDivision]").val();




    //alert(SubDivisionID + " | " + DivisionID +" | " + SubDivision );

    var param = JSON.stringify({

        SubDivisionID : SubDivisionID,
        DivisionID : DivisionID,
        SubDivision : SubDivision,


    });


    $.ajax({

        url : URLLocation+'action=UpdateSubDivision',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["SubDivision"];

            ErrorMessage(msg, "Edit");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*   alert("editDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("editDivision : "+textStatus, "Edit");
        }
    });
});

$('#deleteSubDivision').submit(function(e)
{
    e.preventDefault();

    var SubDivisionID = $("#deleteSubDivision input[name=SubDivisionID]").val();

    var param = JSON.stringify({

        SubDivisionID : SubDivisionID
    });


    $.ajax({

        url : URLLocation+'action=DeleteSubDivision',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["SubDivision"];
            if(msg == "Record deleted successfully!!")
            {
                document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
          /*  alert("deleteSubDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("deleteSubDivision : "+textStatus, "Delete");
        }
    });

});
//------------------------------------------ Submit: SubDivision End--------------------------------


//------------------------------------------ Function: WardNo Start--------------------------------
function WardNoEdit(WardNoID) // Load Data For EDIT
{
   // alert(WardNoID);
    
    document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editWardNo input[name=WardNoID]").val(WardNoID);

    var Ward = GetWardDetailByWardID(WardNoID);


    $('#editWardNo select[name="Division"]').empty();
    $('#editWardNo select[name="Division"]').append('<option value="'+Ward[0]["division_id"]+'">'+ Ward[0]["division"] +'</option>');

    $('#editWardNo select[name="SubDivision"]').empty();
    $('#editWardNo select[name="SubDivision"]').append('<option value="'+Ward[0]["sub_division_id"]+'">'+ Ward[0]["sub_division"] +'</option>');

    $('#editWardNo input[name="WardNo"]').empty();
    $('#editWardNo input[name="WardNo"]').val(Ward[0]["ward_no"]);
}

function WardNoDelete(WardNoID) // Load Data For Delete
{

    document.getElementById('errorMessageDelete').innerHTML = "";
    document.getElementById("ConfirmMSG").style.display = "inline";
    $("#deleteWardNo input[name=WardNoID]").val(WardNoID);
}

//------------------------------------------ Function: WardNo End----------------------------------


//------------------------------------------ Submit: WardNo Start------------------------------------

$('#addWardNo').submit(function(e)
{
    e.preventDefault();
    
    document.getElementById('errorMessage').innerHTML = "";


    var DivisionID = $( "select[name='Division']" ).val();
    var SubDivisionID = $( "select[name='SubDivision']" ).val();
    var WardNo = $("#WardNo").val();


    var param = JSON.stringify({DivisionID : DivisionID,SubDivisionID:SubDivisionID, WardNo:WardNo});


    $.ajax({

        url : URLLocation+'action=InsertWardNo',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["WardNo"];
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
          /*  alert("addWardNo - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("addWardNo : "+textStatus, "Add");
        }
    });
});

$('#editWardNo').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();



    var DivisionID = $("#editWardNo select[name=Division]").val();
    var SubDivisionID = $("#editWardNo select[name=SubDivision]").val();
    var WardNoID = $("#editWardNo input[name=WardNoID]").val();
    var WardNo = $("#editWardNo input[name=WardNo]").val();




    //alert(SubDivisionID + " | " + DivisionID +" | " + SubDivision );

    var param = JSON.stringify({

        DivisionID : DivisionID,
        SubDivisionID : SubDivisionID,
        WardNoID : WardNoID,
        WardNo : WardNo,


    });


    $.ajax({

        url : URLLocation+'action=UpdateWardNo',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["WardNo"];
            ErrorMessage(msg, "Edit");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*   alert("editDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("editDivision : "+textStatus, "Edit");
        }
    });
});

$('#deleteWardNo').submit(function(e)
{
    e.preventDefault();

    var WardNoID = $("#deleteWardNo input[name=WardNoID]").val();



    var param = JSON.stringify({

        WardNoID : WardNoID
    });


    $.ajax({

        url : URLLocation+'action=DeleteWardNo',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["WardNo"];
            if(msg == "Record deleted successfully!!")
            {
                document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
          /*  alert("deleteWardNo - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("deleteWardNo : "+textStatus, "Delete");
        }
    });

});
//------------------------------------------ Submit: WardNo End------------------------------------



//------------------------------------------ Function: Area Start-----------------------------------

function AreaEdit(AreaID) // Load Data For EDIT
{
   // alert(AreaID);
   
   document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editArea input[name=AreaID]").val(AreaID);

    var Area = GetAreaDetailByAreaID(AreaID);

    $('#editArea select[name="Division"]').empty();
    $('#editArea select[name="Division"]').append('<option value="'+Area[0]["division_id"]+'">'+ Area[0]["division"] +'</option>');

    $('#editArea select[name="SubDivision"]').empty();
    $('#editArea select[name="SubDivision"]').append('<option value="'+Area[0]["sub_division_id"]+'">'+ Area[0]["sub_division"] +'</option>');

    $('#editArea select[name="WardNo"]').empty();
    $('#editArea select[name="WardNo"]').append('<option value="'+Area[0]["ward_no_id"]+'">'+ Area[0]["ward_no"] +'</option>');;

    $('#editArea input[name="Area"]').empty();
    $('#editArea input[name="Area"]').val(Area[0]["area"]);
}

function AreaDelete(AreaID) // Load Data For Delete
{
    document.getElementById("ConfirmMSG").style.display = "inline";
    document.getElementById('errorMessageDelete').innerHTML = "";
    $("#deleteArea input[name=AreaID]").val(AreaID);
}
//------------------------------------------ Function: Area End-------------------------------------

//------------------------------------------ Submit: Area Start--------------------------------------

$('#addArea').submit(function(e)
{
    e.preventDefault();


    document.getElementById('errorMessage').innerHTML = "";
    var DivisionID = $( "select[name='Division']" ).val();
    var SubDivisionID = $( "select[name='SubDivision']" ).val();
    var WardNoID = $("#WardNo").val();
    var Area = $("#Area").val();



    var param = JSON.stringify({DivisionID : DivisionID,SubDivisionID:SubDivisionID, WardNoID:WardNoID,Area:Area});
   /* alert(param);*/

    $.ajax({

        url : URLLocation+'action=InsertArea',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Area"];
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
         /*   alert("addArea - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("addArea : "+textStatus, "Add");
        }
    });
});

$('#editArea').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();



    var Division = $("#editArea select[name=Division]").val();
    var SubDivision = $("#editArea select[name=SubDivision]").val();
    var WardNo = $("#editArea select[name=WardNo]").val();
    var AreaID = $("#editArea input[name=AreaID]").val();
    var Area = $("#editArea input[name=Area]").val();




   // alert(Division + " | " + SubDivision +" | " + SubDivision +" | " + WardNo  +" | " + AreaID  +" | " + Area );

    var param = JSON.stringify({

        DivisionID : Division,
        SubDivisionID : SubDivision,
        WardNoID : WardNo,
        AreaID : AreaID,
        Area : Area,


    });

   // alert(param);
    $.ajax({

        url : URLLocation+'action=UpdateArea',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Area"];
            ErrorMessage(msg, "Edit");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*   alert("editDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("editDivision : "+textStatus, "Edit");
        }
    });
});

$('#deleteArea').submit(function(e)
{
    e.preventDefault();

    var AreaID = $("#deleteArea input[name=AreaID]").val();

    var param = JSON.stringify({

        AreaID : AreaID
    });

    $.ajax({

        url : URLLocation+'action=DeleteArea',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Area"];
            if(msg == "Record deleted successfully!!")
            {
                document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
          /*  alert("deleteArea - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("deleteArea : "+textStatus, "Delete");
        }
    });
});
//------------------------------------------ Submit: Area End---------------------------------------