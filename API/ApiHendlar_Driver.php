<?php

include('Authorization.php');
include('API_Driver.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_Driver = new API_Driver();
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
            if($_REQUEST["action"] == 'GetAllDriver') // GET ALL Driver
            {
                $response =  $api_Driver->GetAllDriver();
            }
            else if($_REQUEST["action"] == 'GetDriverByCode') // GET Driver BY Driver CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'Driver' => $api_Driver->GetDriverByCode($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetDriverByOwnerAndVehicle') // GET Driver By Owner and Vehicle
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $OwnerID = $data["OwnerID"];
                $VehicleID = $data["VehicleID"];

                if($OwnerID!="" && $VehicleID!="")
                {
                    $response =  $api_Driver->GetDriverByOwnerAndVehicle($OwnerID,$VehicleID);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'InsertDriver') // INSERT USER
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data['Code'];
                $FatherName = $data['FatherName'];
                $MotherName = $data['MotherName'];
                $DriverBGroup = $data['DriverBGroup'];
                $DOB = explode('-',$data['DOB']);
                $DOB = $DOB[2].'-'.$DOB[1].'-'.$DOB[0];
                $NID = $data['NID'];
                $Mobile = $data['Mobile'];
                $LicenseNo = $data['LicenseNo'];
                $approvealDate = $data['approvealDate'];
                $DriverName = $data['DriverName'];
                $DriverNameEng = $data['DriverNameEng'];
                $cDivision = $data['cDivision'];
                $cSubDivision = $data['cSubDivision'];
                $cWardNo = $data['cWardNo'];
                $cVill = $data['cVill'];
                $cHoldingNo = $data['cHoldingNo'];
                $PhotoPath = $data['PhotoPath'];
                $chkAddress = $data['chkAddress'];
                $PermanentAddress = $data['PermanentAddress'];

                if($Code != "")
                {
                    $response = array(
                        'Driver' => $api_Driver->InsertDriver
                        (
                            $Code,$FatherName,$MotherName,$DriverBGroup,$DOB,$NID,$Mobile,$LicenseNo,$approvealDate,$DriverName,$DriverNameEng,$cDivision,$cSubDivision,$cWardNo,$cVill,$cHoldingNo,$PhotoPath,$chkAddress,$PermanentAddress
                        )
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'UpdateDriver') // UPDATE Driver
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data['Code'];
                $LicenseNo = $data['LicenseNo'];
                $approvealDate = $data['approvealDate'];
                $DriverName = $data['DriverName'];
                $DriverNameEng = $data['DriverNameEng'];
                $Mobile = $data['Mobile'];
                $FathersName = $data['FathersName'];
                $MotherName = $data['MotherName'];
                $DOB = explode('-',$data['DOB']);
                $DOB = $DOB[2].'-'.$DOB[1].'-'.$DOB[0];
                $NID = $data['NID'];
                $DriverBGroup = $data['DriverBGroup'];
                $cDivision = $data['cDivision'];
                $cSubDivision = $data['cSubDivision'];
                $cWardNo = $data['cWardNo'];
                $cArea = $data['cArea'];
                $cHoldingNo = $data['cHoldingNo'];
                $chkAddress = $data['chkAddress'];
                $Parmanent_address = $data['Parmanent_address'];
                $PhotoPath = $data['PhotoPath'];

                if($Code != "")
                {
                    $response = array(
                        'Driver' => $api_Driver->UpdateDriver
                        (
                            $Code, $LicenseNo, $approvealDate, $DriverName, $DriverNameEng, $Mobile, $FathersName, $MotherName, $DOB, $NID, $DriverBGroup, $cDivision, $cSubDivision, $cWardNo, $cArea, $cHoldingNo, $chkAddress, $Parmanent_address, $PhotoPath
                        )
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'DeleteDriver') // Delete Driver
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                if($Code!="" )
                {
                    $response = array(
                        'Driver' => $api_Driver->DeleteDriver($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetDriverCardFee')
            {
                $response = $api_Driver->GetDriverCardFee();
            }
            else if($_REQUEST["action"] == 'UpdateDriverCardFee') // Driver Card Fee Update
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $DriverFee = $data["DriverFee"];

                if($DriverFee!="")
                {
                    $response = $api_Driver->UpdateDriverCardFee($DriverFee);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetAllDriverBill') // GET ALL Driver Bill
            {
                $response =  $api_Driver->GetAllDriverBill();
            }
            else if($_REQUEST["action"] == 'GetDriverBillByDBillID') // GET Driver BY Driver Bill ID
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $DBillID = $data["DBillID"];

                if($DBillID!="" )
                {
                    $response = array(
                        'DriverBill' => $api_Driver->GetDriverBillByDBillID($DBillID)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetAllDriverBillPrint') // GET Driver BY Driver Bill ID
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $id = $data["id"];

                if($id!="" )
                {
                    $response = array(
                        'DriverBill' => $api_Driver->GetAllDriverBillPrint($id)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'InsertDriverBill') // INSERT Driver Bill
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );


                $Driver = $data["Driver"];
                $Code = $data["Code"];
                $CardFee = $data["CardFee"];
                $EntryDate = $data["EntryDate"];

                if($Driver != "" && $Code != "" && $CardFee != "" && $EntryDate != "" )
                {
                    $response = array(
                        'DriverBill' => $api_Driver->InsertDriverBill($Driver,$Code, $CardFee, $EntryDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'UpdateDriverBill') // UPDATE Driver Bill
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Driver = $data["Driver"];
                $Code = $data["Code"];
                $CardFee = $data["CardFee"];
                $EntryDate = $data["EntryDate"];

                if($Code != "" && $Driver != "" && $CardFee != "" && $EntryDate != "" )
                {
                    $response = array(
                        'DriverBill' => $api_Driver->UpdateDriverBill($Driver,$Code, $CardFee, $EntryDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'DeleteDriverBill') // DELETE Driver Bill
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $DBillID = $data["DBillID"];

                if($DBillID!="" )
                {
                    $response = array(
                        'DriverBill' => $api_Driver->DeleteDriverBill($DBillID)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetCardInvoiceInfoByCode') // GET Card Fee BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'InvoiceCard' => $api_Driver->GetCardInvoiceInfoByCode($Code)
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