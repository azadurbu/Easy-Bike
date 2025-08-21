


function GetAllBank()
{
    $.ajax({

        url : URLBank+'action=GetAllBank',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="Bank"]').empty();
            $('select[name="Bank"]').append('<option value="">'+ "---- ব্যাংক ----" +'</option>');

            $.each(data, function(key, value)
            {
                //alert(value["b_id"] +"-"+value["b_name"]);
                $('select[name="Bank"]').append('<option value="'+ value["b_id"] +'">'+ value["b_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("GetAllDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}

/*
function GetAllBankName()
{
    $.ajax({

        url : URLBank+'action=GetAllBankName',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="Bank"]').empty();
            $('select[name="Bank"]').append('<option value="">'+ "---- ব্যাংক ----" +'</option>');

            $.each(data, function(key, value)
            {

                $('select[name="Bank"]').append('<option value="'+ value["b_id"] +'">'+ value["b_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /!* alert("GetAllDivision - Status: " + textStatus); alert("Error: " + errorThrown);*!/
        }
    });
}
*/


function GetBankByBankID(BankID)
{
    var bank = "";

    $.ajax({

        url : URLBank+'action=GetBankByBankID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({BankID: BankID}),
        async: false,
        success: function(data)
        {


            $("#editBank input[name=Bank]").val(data[0]["b_name"]);
            $("#editBank textarea[name=BankAddress]").val(data[0]["b_address"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }

    });

    return bank;
}

function GetAllAccoount()
{
    $.ajax({

        url : URLBank+'action=GetAllAccount',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {

            $.each(data, function(key, value)
            {

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*  alert("GetAllAccoount - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}


function GetAccountByAcID(AcID){


    $.ajax({

        url : URLBank+'action=GetAccountByAcID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({AcID: AcID}),
        success: function(data)
        {

            $("#editAccount select[name= Bank]").empty();
            $("#editAccount select[name=Bank]").append('<option value="'+ data["Account"][0]["b_id"] +'">'+ data["Account"][0]["b_name"] +'</option>');
            $("#editAccount input[name=AcName]").val(data["Account"][0]["ac_name"]);
            $("#editAccount textarea[name=AcBranch]").val(data["Account"][0]["ac_branch"]);
            $("#editAccount input[name=AcNo]").val(data["Account"][0]["ac_no"]);


            $.each(data, function(key, value)
            {

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /*   alert("GetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }

    });
}

function GetAccountByBank(BankID)
{

        $.ajax({

            url : URLBank+'action=GetAccountByBank',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: JSON.stringify({BankID: BankID}),
            success: function(data) 
            { 
                
                $('select[name="Account"]').empty();
                $('select[name="Account"]').append('<option value="">'+ "---- একাউন্ট নাম্বার ----" +'</option>');

                $.each(data, function(key, value) 
                {
            
                    $('select[name="Account"]').append('<option value="'+ value["ac_id"] +'">'+ value["ac_no"] +'</option>');
            
                });

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
               /* alert("pGetSubDivisionByDivID - Status: " + textStatus); alert("Error: " + errorThrown); */
            }

        });

}


//------------------------------------------ Function: Bank Start----------------------------
function BankEdit(BankID) // Load Data For EDIT
{
    //alert(BankID);
    document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editBank input[name=BankID]").val(BankID);
    GetBankByBankID(BankID);
}


function BankDelete(BankID) // Load Data For Delete
{
    document.getElementById('errorMessageDelete').innerHTML = "";
    document.getElementById("ConfirmMSG").style.display = "inline";
    $("#deleteBank input[name=BankID]").val(BankID);
}
//------------------------------------------ Function: Bank End-------------------------------

//------------------------------------------ Submit: Bank Start-------------------------------
$('#addBank').submit(function(e)
{
    e.preventDefault();
    
    document.getElementById('errorMessage').innerHTML = "";
    var Bank = $("#Bank").val();
    var BankAddress = $("#BankAddress").val();

    var param = JSON.stringify({Bank : Bank,BankAddress : BankAddress,});

    //alert(param);
    $.ajax({

        url : URLBank+'action=InsertBank',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Bank"];
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addBank : "+textStatus, "Add");
        }
    });

});


$('#editBank').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();



    var BankID = $("#editBank input[name=BankID]").val();
    var Bank = $("#editBank input[name=Bank]").val();
    var BankAddress = $("#editBank textarea[name=BankAddress]").val();




    //alert(DivisionID + " | " + Division );

    var param = JSON.stringify({

        BankID : BankID,
        Bank : Bank,
        BankAddress : BankAddress,


    });


    $.ajax({

        url : URLBank+'action=UpdateBank',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Bank"];
            ErrorMessage(msg, "Edit");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*   alert("editBank - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("editBank : "+textStatus, "Edit");
        }
    });
});


$('#deleteBank').submit(function(e)
{
    e.preventDefault();

    var BankID = $("#deleteBank input[name=BankID]").val();

    /*  alert(BankID);*/

    var param = JSON.stringify({

        BankID : BankID
    });


    $.ajax({

        url : URLBank+'action=DeleteBank',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Bank"];
            
            if(msg == "Record deleted successfully!!")
            {
                  document.getElementById("ConfirmMSG").style.display = "none";
            }

            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*    alert("deleteBank - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("deleteBank : "+textStatus, "Edit");
        }
    });
});
//------------------------------------------ Submit: Bank End----------------------------





//------------------------------------------ Function: Account Start----------------------------

function AccountEdit(AcID) // Load Data For EDIT
{
   // alert(AcID);
   
   document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editAccount input[name=AcID]").val(AcID);
    GetAccountByAcID(AcID);
}

function AccountDelete(AcID) // Load Data For Delete
{
    document.getElementById('errorMessageDelete').innerHTML = "";
    $("#deleteAccount input[name=AcID]").val(AcID);
}

//------------------------------------------ Function: Account End------------------------------

//------------------------------------------ Submit: Account Start------------------------------

$('#addAccount').submit(function(e)
{
    e.preventDefault();
    
    document.getElementById('errorMessage').innerHTML = "";
    var BankID = $( "select[name='Bank']" ).val();
    var AcBranch = $("#AcBranch").val();
    var AcName = $("#AcName").val();
    var AcNo = $("#AcNo").val();

    var param = JSON.stringify({BankID : BankID, AcBranch : AcBranch,  AcName : AcName, AcNo : AcNo});

  //  alert(param);

    $.ajax({

        url : URLBank+'action=InsertAccount',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Account"];
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addAccount : "+textStatus, "Add");
        }
    });
});

$('#editAccount').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();

    var AcID = $("#editAccount input[name=AcID]").val();
    var BankID = $("#editAccount select[name=Bank]").val();
    var AcBranch = $("#editAccount textarea[name=AcBranch]").val();
    var AcName = $("#editAccount input[name=AcName]").val();
    var AcNo = $("#editAccount input[name=AcNo]").val();


    //alert(DivisionID + " | " + Division );

    var param = JSON.stringify({

        AcID : AcID,
        BankID : BankID,
        AcBranch : AcBranch,
        AcName : AcName,        
        AcNo : AcNo,
    });

// alert(param);
    $.ajax({

        url : URLBank+'action=UpdateAccount',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Account"];
            ErrorMessage(msg, "Edit");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*   alert("editBank - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("editAccount : "+textStatus, "Edit");
        }
    });
});

$('#deleteAccount').submit(function(e)
{
    e.preventDefault();

    var AcID = $("#deleteAccount input[name=AcID]").val();

    /*  alert(BankID);*/

    var param = JSON.stringify({

        AcID : AcID
    });


    $.ajax({

        url : URLBank+'action=DeleteAccount',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["Account"];
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*    alert("deleteBank - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("deleteAccount : "+textStatus, "Edit");
        }
    });
});
//------------------------------------------ Submit: Account End--------------------------------