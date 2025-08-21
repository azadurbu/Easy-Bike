<?php

include('Authorization.php');
include('API_Vehicle.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_Vehicle = new API_Vehicle();
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
			if($_REQUEST["action"] == 'GetAllVehicle') // GET ALL Vehicle
			{
				$response =  $api_Vehicle->GetAllVehicle();
			}
            else if($_REQUEST["action"] == 'GetVehicleByCode') // GET OWNER BY OWNER CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'Vehicle' => $api_Vehicle->GetVehicleByCode($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
			else if($_REQUEST["action"] == 'GetVehicleByOwnerID') // GET ALL Vehicle BY Owner ID 
			{

				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$OwnerID = $data["OwnerID"];

				if($OwnerID!="")
				{
					$response = $api_Vehicle->GetVehicleByOwnerID($OwnerID);			
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}else if($_REQUEST["action"] == 'GetVehicleByCode') // GET ALL Vehicle BY Owner ID 
			{
 
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];

				if($Code!="")
				{
					$response = $api_Vehicle->GetVehicleByCode($Code);			
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetVehicleByVehicleID') // GET Vehicle BY Vehicle ID
			{

				$data = json_decode( file_get_contents( 'php://input' ), true );

				$VehicleID= $data["VehicleID"];

				if($VehicleID!="")
				{
					$response = $api_Vehicle->GetVehicleByVehicleID($VehicleID);
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'InsertVehicle') // INSERT USER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );


				$Code = $data["Code"];
				$OwnerID = $data["OwnerID"];
				$Model = $data["Model"]; 
				$Color = $data["Color"];
				$RegNo = $data["RegNo"];
                $RegDate = $data["RegDate"];
				$Detail = $data["Detail"];
				$ChassisNo = $data["ChassisNo"];


				if($Code != "")
				{
					$response = array(
										'Vehicle' => $api_Vehicle->InsertVehicle
											(											
												$Code, $OwnerID, $Model, $Color, $RegNo, $RegDate, $Detail,$ChassisNo
				 							)			
									);
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'UpdateVehicle') // UPDATE Vehicle
            {
				$data = json_decode( file_get_contents( 'php://input' ), true );
				

                $Code = $data["Code"];
                $Model = $data["Model"];
                $Color = $data["Color"];
                $RegNo = $data["RegNo"];
                $RegDate = $data["RegDate"];
                $Detail = $data["Detail"];
				$ChassisNo = $data["ChassisNo"];
				$OwnerID = $data["OwnerID"];

				$response = array(
					'Vehicle' => $api_Vehicle->UpdateVehicle($Code,$Model,$Color,$RegNo,$RegDate,$Detail,$ChassisNo,$OwnerID)
				);
            }
            else if($_REQUEST["action"] == 'DeleteVehicle') // GET OWNER BY OWNER CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'Vehicle' => $api_Vehicle->DeleteVehicle($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
			}else if($_REQUEST["action"] == 'InsertCardIssueDate')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
                $Code = $data["Code"];
				$issueDate = $data["issueDate"];
				if($Code!="" )
                {
                    $response = array(
                        'Vehicle' => $api_Vehicle->InsertCardIssueDate($Code, $issueDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
			}else if($_REQUEST["action"] == 'GetVehicleCardIsset')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
                $Code = $data["Code"];
				if($Code!="" )
                {
                    $response = array(
                        'Vehicle' => $api_Vehicle->GetVehicleCardIsset($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
			}else if($_REQUEST["action"] == 'GetVehicleOcblByVcl')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
                $Code = $data["Code"];
				if($Code!="" )
                {
                    $response = array(
                        'ocbl' => $api_Vehicle->GetVehicleOcblByVcl($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
			}else if($_REQUEST["action"] == 'GetOwnerInfoByCBillID')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
                $Code = $data["Code"];
				if($Code!="" )
                {
                    $response = array(
                        'OwnerBill' => $api_Vehicle->GetVehicleOcblByVcl($Code)
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