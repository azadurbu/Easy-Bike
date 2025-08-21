<?php

include('Authorization.php');
include('Api_Location.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_location = new Api_Location();
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
				if($_REQUEST["action"] == 'GetAllDivision') // GET ALL Division
				{
					$response =  $api_location->GetAllDivision();
				}
				else if($_REQUEST["action"] == 'GetDivisionByDivID') // GET DIVISION BY DIVID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$DivID = $data["DivID"];

					if($DivID!="")
					{
						$response = $api_location->GetDivisionByDivID($DivID);			
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetAllSubDivision') // GET ALL SUB Division
				{
					$response =  $api_location->GetAllSubDivision();
				}
				else if($_REQUEST["action"] == 'GetSubDivisionBySubDivID') // GET SUB DIVISION BY SUBDIVID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$SubDivID = $data["SubDivID"];

					if($SubDivID!="")
					{
						$response = $api_location->GetSubDivisionBySubDivID($SubDivID);			
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetSubDivisionByDivisionID') // GET SUB DIVISION BY DIVISION ID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$DivisionID = $data["DivisionID"];

					if($DivisionID!="")
					{
						$response = $api_location->GetSubDivisionByDivisionID($DivisionID);			
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetAllWardNo') // GET ALL WARD NO
				{
					$response =  $api_location->GetAllWardNo();
				}
				else if($_REQUEST["action"] == 'GetWardByWardID') // GET WARD BY WARD ID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$WardID = $data["WardID"];

					if($WardID!="")
					{
						$response = $api_location->GetWardByWardID($WardID);			
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetWardNoByDivAndSubDivID') // GET WARD NO BY DIVISION AND SUB DIVISION ID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$DivID = $data["DivID"];
					$SubDivID = $data["SubDivID"];

					if($DivID!="" && $SubDivID!="")
					{
						$response =  $api_location->GetWardNoByDivAndSubDivID($DivID,$SubDivID);		
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetAllArea') // GET ALL AREA
				{
					$response = $api_location->GetAllArea();
				}
				else if($_REQUEST["action"] == 'GetAreaByAreaID') // GET AREA BY AREA ID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$AreaID = $data["AreaID"];

					if($AreaID!="")
					{
						$response = $api_location->GetAreaByAreaID($AreaID);			
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetAreaByDivAndSubDivAndWard') // GET WARD NO BY DIVISION AND SUB DIVISION ID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$DivID = $data["DivID"];
					$SubDivID = $data["SubDivID"];
					$WardID = $data["WardID"];

					if($DivID!="" && $SubDivID!="" && $WardID != "")
					{
						$response =  $api_location->GetAreaByDivAndSubDivAndWard($DivID,$SubDivID,$WardID);		
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetAreaByWardNoID') // GET Area BY WardNoID
                {

                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $WardNoID = $data["WardNoID"];

                    if($WardNoID!="")
                    {
                        $response = $api_location->GetAreaByWardNoID($WardNoID);
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