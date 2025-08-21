<?php

include('Authorization.php');
include('API_Bank.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_bank = new API_Bank();
$response= "";


function Error($Code)
{
    $StatusCode = new StatusCodes();
    $response = array(
        'ErrorCode' =>  $Code,
        'ErrorMessage' => $StatusCode->getMessageForCode($Code)
    );
    echo json_encode($response);
}


if(isset($_REQUEST))
{

    if($authorized->API_KEY()) // Check Authorization
    {
        if(isset($_REQUEST["action"]))
        {
            if($_REQUEST["action"] == 'GetAllBank') // GET ALL Bank
            {
                $response =  $api_bank->GetAllBank();
            }
            else if($_REQUEST["action"] == 'GetAllBankName') // GET ALL Bank Name
            {
                $response =  $api_bank->GetAllBankName();
            }
            else if($_REQUEST["action"] == 'GetAllBranch') // GET ALL Branch
            {
                $response =  $api_bank->GetAllBranch();
            }
            else if($_REQUEST["action"] == 'GetBankByBankID') // GET Bank BY Bank ID
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $BankID = $data["BankID"];

                if($BankID!="")
                {
                    $response = $api_bank->GetBankByBankID($BankID);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'InsertBank') // INSERT Bank
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );


                $Bank = $data["Bank"];
                $BankAddress = $data["BankAddress"];

                if($Bank != "" && $BankAddress !="" )
                {
                    $response = array(
                        'Bank' => $api_bank->InsertBank($Bank,$BankAddress)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'UpdateBank') // Update Bank
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $BankID = $data["BankID"];
                $Bank = $data["Bank"];
                $BankAddress = $data["BankAddress"];

                if($BankID != "" && $Bank != "" && $BankAddress != "")
                {
                    $response = array(
                        'Bank' => $api_bank->UpdateBank($BankID, $Bank, $BankAddress)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'DeleteBank') // Delete Bank
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $BankID = $data["BankID"];


                if($BankID != "" )
                {
                    $response = array(
                        'Bank' => $api_bank->DeleteBank($BankID)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }

            else if($_REQUEST["action"] == 'GetAllAccount') // GET ALL Account
            {
                $response =  $api_bank->GetAllAccount();
            }
            else if($_REQUEST["action"] == 'GetAccountByAcID') // GET Account BY Account ID
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $AcID = $data["AcID"];

                if($AcID!="")
                {
                    $response = array(
                        'Account' =>$api_bank->GetAccountByAcID($AcID)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetAccountByBank') // GET Bank BY Bank ID
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $BankID = $data["BankID"];

                if($BankID!="")
                {
                    $response = $api_bank->GetAccountByBank($BankID);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'InsertAccount') // INSERT Account
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $BankID = $data["BankID"];
                $AcBranch = $data["AcBranch"];
                $AcName = $data["AcName"];
                $AcNo = $data["AcNo"];

                


                if($AcName != "" && $AcNo != "" && $BankID != "" )
                {
                    $response = array(
                        'Account' => $api_bank->InsertAccount($BankID, $AcBranch, $AcName,  $AcNo )
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'UpdateAccount') // Update Account
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $AcID = $data["AcID"];
                $BankID = $data["BankID"];
                $AcBranch = $data["AcBranch"];
                $AcName = $data["AcName"];
                $AcNo = $data["AcNo"];



                if($AcID != "" && $AcName != "" && $AcNo != "" && $BankID != "")
                {
                    $response = array(
                        'Account' => $api_bank->UpdateAccount($AcID, $BankID, $AcBranch, $AcName, $AcNo )
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'DeleteAccount') // Delete Account
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

               $AcID = $data["AcID"];


                if($AcID != "" )
                {
                    $response = array(
                        'Account' => $api_bank->DeleteAccount($AcID)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }

            else // BAD REQUEST
            {
                Error(400);
            }
        }
        else // INVALID PARAMETER
        {
            Error(601);
        }

    }
    else // UNATHORIZED REQUEST
    {
        Error(401);
    }
}
else // BAD REQUEST
{
    Error(400);
}


echo json_encode($response);

?>