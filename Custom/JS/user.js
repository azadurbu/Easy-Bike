function GetAllUserType()
{
    $.ajax({

        url : URLUserType+'action=GetAllUserType',
        type: 'GET',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        contentType: "application/json; charset=utf-8",
        success: function(data)
        {
            $('select[name="UserTypeName"]').empty();
            $('select[name="UserTypeName"]').append('<option value="">'+ "---- ইউজারের টাইপ ----" +'</option>');

            $.each(data["UserTypeList"], function(key, value)
            {

                $('select[name="UserTypeName"]').append('<option value="'+ value["user_type_id"] +'">'+ value["user_type_name"] +'</option>');

            });

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            /* alert("GetAllDivision - Status: " + textStatus); alert("Error: " + errorThrown);*/
        }
    });
}

function GetUserByUserID(UserID)
{
    var UserType = "";

    $.ajax({

        url : URLUserType+'action=GetUserByUserID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({UserID: UserID}),
        async: false,
        success: function(data)
        {

            $("#editUser input[name=UserName]").val(data["User"][0]["user_name"]);
            $("#editUser input[name=UserID]").val(data["User"][0]["user_id"]);
            $("#editUser input[name=Password]").val(data["User"][0]["user_password"]);
            $("#editUser select[name= UserTypeName]").empty();
            $("#editUser select[name=UserTypeName]").append('<option value="'+ data["User"][0]["user_type_id"] +'">'+ data["User"][0]["user_type_name"] +'</option>');

            var Active=data["User"][0]["active"];

            if (Active == 1)
            {
               // alert(Active);
                $( "#activeEdit" ).prop( "checked", true );
                //document.getElementById("active").checked=true;
            }
            else{
               // alert(Active);
                $( "#activeEdit" ).prop( "checked", false );
                document.getElementById("active").checked=false;
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }

    });

    return UserType;
}

//------------------------------------------ Function: User Start-------------------------------
function UserEdit(UserID)
{
   // alert(UserID);
   
   document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editUser input[name=UserID]").val(UserID);
    GetUserByUserID(UserID);
}


function UserDelete(UserID) // Load Data For Delete
{
    document.getElementById("ConfirmMSG").style.display = "inline";
    document.getElementById('errorMessageDelete').innerHTML = "";
    $("#deleteUser input[name=UserID]").val(UserID);
}

//------------------------------------------ Function: User End-------------------------------



//------------------------------------------ Submit: User Start-------------------------------

$('#addUser').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var Name = $("#UserName").val();
    var UserID = $("#UserID").val();
    var Password = $("#Password").val();
    var UserTypeID = $( "select[name='UserTypeName']" ).val();
    var Active =  1;

    if(document.getElementById("active").checked)
    {
        Active = 1;
    }
    else
    {
        Active = 0;
    }
   // alert(UserTypeName);

    var param = JSON.stringify({Name : Name,UserID : UserID, Password : Password,UserTypeID : UserTypeID, Active : Active,});

   // alert(param);
    $.ajax({

        url : URLUserType+'action=InsertUser',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
          //  alert(data["User"]);
            var msg = data["User"];
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addUser : "+textStatus, "Add");
        }
    });
});


$('#editUser').submit(function(e)
    {
        e.preventDefault();

        var UserName = $("#editUser input[name='UserName']").val();
        var UserID = $("#editUser input[name='UserID']").val();
        var Password = $("#editUser input[name='Password']").val();
        var UserTypeID = $( "#editUser select[name='UserTypeName']" ).val();
        var Active =  1;

        if(document.getElementById("activeEdit").checked)
        {
            Active = 1;
        }
        else
        {
            Active = 0;
        }

        var param = JSON.stringify({UserName : UserName,UserID : UserID, Password : Password,UserTypeID : UserTypeID, Active : Active,});

       // alert(param);
        $.ajax({

            url : URLUserType+'action=UpdateUser',
            type: 'POST',
            dataType : "json",
            headers: {"App_Key":"123456789"},
            data: param,
            success: function(data)
            {
               // alert(data["User"]);
                var msg = data["User"];
                ErrorMessage(msg, "Edit");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                ErrorMessage("addUser : "+textStatus, "Add");
            }
        });

    });


$('#deleteUser').submit(function(e)
{
    e.preventDefault();

    var UserID = $("#deleteUser input[name=UserID]").val();

    /*  alert(UserID);*/

    var param = JSON.stringify({

        UserID : UserID
    });


    $.ajax({

        url : URLUserType+'action=DeleteUser',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["User"];
            if(msg == "Record deleted successfully!!")
            {
                document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("deleteUserType : "+textStatus, "Edit");
        }
    });
});

//------------------------------------------ Submit: User End-------------------------------



//------------------------------------------ Function: UserType Start-------------------------------


function GetUserTypeNameByID(UserTypeID)
{
    var UserType = "";

    $.ajax({

        url : URLUserType+'action=GetUserTypeNameByID',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: JSON.stringify({UserTypeID: UserTypeID}),
        async: false,
        success: function(data)
        {

            $("#editUserType input[name=UserTypeName]").val(data["UserTypeName"][0]["user_type_name"]);

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }

    });

    return UserType;
}

function UserTypeEdit(UserTypeID)
{
   // alert(UserTypeID);
   document.getElementById('errorMessageEdit').innerHTML = "";
    $("#editUserType input[name=UserTypeID]").val(UserTypeID);
    GetUserTypeNameByID(UserTypeID);
}

function UserTypeDelete(UserTypeID) // Load Data For Delete
{

    document.getElementById('errorMessageDelete').innerHTML = "";
    document.getElementById("ConfirmMSG").style.display = "inline";
    $("#deleteUserType input[name=UserTypeID]").val(UserTypeID);
}


//------------------------------------------ Function: UserType End-------------------------------




//------------------------------------------ Submit: UserType Start-------------------------------
$('#addUserType').submit(function(e)
{
    e.preventDefault();

    document.getElementById('errorMessage').innerHTML = "";
    var UserTypeName = $("#UserTypeName").val();
   // alert(UserTypeName);

    var param = JSON.stringify({UserTypeName : UserTypeName,});

    //alert(param);
    $.ajax({

        url : URLUserType+'action=InsertUserType',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["UserType"];
            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("addBank : "+textStatus, "Add");
        }
    });
});

$('#editUserType').submit(function(e)
{
    // LoadLocation();
    e.preventDefault();



    var UserTypeID = $("#editUserType input[name=UserTypeID]").val();
    var UserTypeName = $("#editUserType input[name=UserTypeName]").val();




   // alert(UserTypeID + " | " + UserTypeName );

    var param = JSON.stringify({

        UserTypeID : UserTypeID,
        UserTypeName : UserTypeName,


    });


    $.ajax({

        url : URLUserType+'action=UpdateUserType',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["UserType"];
            ErrorMessage(msg, "Edit");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            /*   alert("editBank - Status: " + textStatus); alert("Error: " + errorThrown);*/
            ErrorMessage("editUserType : "+textStatus, "Edit");
        }
    });
});

$('#deleteUserType').submit(function(e)
{
    e.preventDefault();

    var UserTypeID = $("#deleteUserType input[name=UserTypeID]").val();

    /*  alert(BankID);*/

    var param = JSON.stringify({

        UserTypeID : UserTypeID
    });


    $.ajax({

        url : URLUserType+'action=DeleteUserType',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["UserType"];
            if(msg == "Record deleted successfully!!")
            {
                document.getElementById("ConfirmMSG").style.display = "none";
            }
            ErrorMessage(msg, "Delete");

        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("deleteUserType : "+textStatus, "Edit");
        }
    });
});


//------------------------------------------ Submit: UserType End-------------------------------

function ChangeUserType()
{
    GetAllUserType();
}


//------------------------------------------ Submit: Parent Module Access Start-------------------------------
$('#addParentModuleAccess').submit(function(e)
{
    e.preventDefault();

    var UserID = $("#parentUserID").val();

    var $table = $("#ParentModuleTable")
        rows = [],
        header = [];

        $table.find("thead th").each(function () {
        header.push($(this).html());
    });

    $table.find("tbody tr").each(function () 
    {
        var row = {};
        
        $(this).find("td").each(function (i) 
        {
            var key = header[i];
            var value = 0;

            if(header[i]=="Module")
            {
                value = $(this).html().trim();
            }
            else
            {
                if($(this).find('input[type="checkbox"]').is(':checked'))
                {
                    value = 1; 
                }
            }
            
            row[key] = value;
        });
        
        rows.push(row);
    });
        
    var param =  JSON.stringify({UserID : UserID, ParentModuleAccess : rows});


      $.ajax({

        url : URLUserType+'action=UpdateParentModuleAccess',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["AccessParent"];

            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("UpdateParentModuleAccess : "+textStatus, "Add");
        }
    });
});


//------------------------------------------ Submit: Child Module Access Start-------------------------------
$('#addChildModuleAccess').submit(function(e)
{
    e.preventDefault();

    var UserID = $("#ChildUserID").val();

    var $table = $("#ChildModuleTable")
        rows = [],
        header = [];

        $table.find("thead th").each(function () {
        header.push($(this).html());
    });

    $table.find("tbody tr").each(function () 
    {
        var row = {};
        
        $(this).find("td").each(function (i) 
        {
            var key = header[i];
            var value = 0;

            if(header[i]=="Module")
            {
                value = $(this).html().trim();
            }
            else
            {
                if($(this).find('input[type="checkbox"]').is(':checked'))
                {
                    value = 1; 
                }
            }
            
            row[key] = value;
        });
        
        rows.push(row);
    });
        
    var param =  JSON.stringify({UserID : UserID, ChildModuleAccess : rows});
    
    console.log(param);
   // alert(param);

      $.ajax({

        url : URLUserType+'action=UpdateChildModuleAccess',
        type: 'POST',
        dataType : "json",
        headers: {"App_Key":"123456789"},
        data: param,
        success: function(data)
        {
            var msg = data["AccessChild"];

            ErrorMessage(msg, "Add");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            ErrorMessage("UpdateChildModuleAccess : "+textStatus, "Add");
        }
    });
});