<?php

include('Authorization.php');
include('API_Report.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_Report = new API_Report();
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
            if($_REQUEST["action"] == 'GetAllOwner') // GET Get All Owner By WardNo
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $WardNo = $data["WardNo"];
                $Area = $data["Area"];
                $OwnerName = $data['OwnerName'];
                $NID = $data['NID'];
                $RegNo = $data['RegNo'];
                $Mobile = $data['Mobile'];
                $cDivision = $data['cDivision'];
                $cSubDivision = $data['cSubDivision'];

                $response = array(
                    'Owner' => $api_Report->GetAllOwner($WardNo,$Area,$OwnerName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision)
                );
            }
            else if($_REQUEST["action"] == 'GetAllOwnerTransfer') // GET Get All Owner By WardNo
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $WardNo = $data["WardNo"];
                $Area = $data["Area"];
                $cDivision = $data['cDivision'];
                $cSubDivision = $data['cSubDivision'];
                $Status = $data['Status'];
                $Start_date = $data['Start_date'];
                $End_date = $data['End_date'];

                $response = array(
                    'Owner' => $api_Report->GetAllOwnerTransfer($WardNo,$Area,$cDivision,$cSubDivision,$Status,$Start_date,$End_date)
                );
            }
            else if($_REQUEST["action"] == 'GetALLDivAndSubDiv') //GET All Div And SubDiv
            {
                $response =  $api_Report->GetALLDivAndSubDiv();
            }
            else if($_REQUEST["action"] == 'GetAllDriver') // GET Get All Driver By WardNo
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $WardNo = $data["WardNo"];
                $Area = $data["Area"];
                $DriverName = $data['DriverName'];
                $NID = $data['NID'];
                $RegNo = $data['RegNo'];
                $Mobile = $data['Mobile'];
                $cDivision = $data['cDivision'];
                $cSubDivision = $data['cSubDivision'];

                $response = array(
                    'Driver' => $api_Report->GetAllDriver($WardNo,$Area,$DriverName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision)
                );
            }
            else if($_REQUEST["action"] == 'GetAllVehicleRpt') // GET Get All Vehicle
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $ownerName = $data["ownerName"];
                $NID = $data["NID"];
                $RegNo = $data['RegNo'];
                $Mobile = $data['Mobile'];
                $cDivision = $data['cDivision'];
                $cSubDivision = $data['cSubDivision'];
                $WardNo = $data['WardNo'];
                $Area = $data['Area'];
                $Status = $data['Status'];

                $response = array(
                    'Vehicle' => $api_Report->GetAllVehicleRpt($ownerName, $NID, $RegNo, $Mobile, $cDivision, $cSubDivision, $WardNo, $Area, $Status)
                );
            }
            else if($_REQUEST["action"] == 'GetAllFiscalYearRpt') // GET Get All Fiscal Year
            {
                $response = array(
                    'FiscalYear' => $api_Report->GetAllFiscalYearRpt()
                );
            }
            else if($_REQUEST["action"] == 'GetAllBillRpt') // GET Get All Bill BY WardNo, Area, Status AND Date
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $WardNo = $data["WardNo"];
                $Area = $data["Area"];
                $Status = $data["Status"];
                $Start_date = $data["Start_date"];
                $End_date = $data["End_date"];

                $response = array(
                    'BillRpt' => $api_Report->GetAllBillRpt($WardNo,$Area,$Status,$Start_date,$End_date)
                );
            }
            else if($_REQUEST["action"] == 'GetTotalLicences') // GET Get Total Licences By WardNo
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $WardNo = $data["WardNo"];
                $Area = $data["Area"];

                $response = array(
                    'TotalLicences' => $api_Report->GetTotalLicences($WardNo,$Area)
                );
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