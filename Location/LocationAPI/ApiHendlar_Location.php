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
				else if($_REQUEST["action"] == 'InsertDivision') // INSERT Division
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );

					
					$Division = $data["Division"];


					if($Division != "" )
					{
						$response = array(
											'Division' => $api_location->InsertDivision($Division)			
										);
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'UpdateDivision') // Update Division
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );

					$DivisionID = $data["DivisionID"];
					$Division = $data["Division"];


					if($DivisionID != "" && $Division != "" )
					{
						$response = array(
											'Division' => $api_location->UpdateDivision($DivisionID, $Division)			
										);
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'DeleteDivision') // Delete Division
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );

					$DivisionID = $data["DivisionID"];


					if($DivisionID != "" )
					{
						$response = array(
											'Division' => $api_location->DeleteDivision($DivisionID)			
										);
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
                else if($_REQUEST["action"] == 'InsertSubDivision') // INSERT SubDivision
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );


                    $DivisionID = $data["DivisionID"];
                    $SubDivision = $data["SubDivision"];


                    if($SubDivision != "" && $DivisionID != "")
                    {
                        $response = array(
                            'SubDivision' => $api_location->InsertSubDivision($DivisionID, $SubDivision)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
                else if($_REQUEST["action"] == 'UpdateSubDivision') // Update SubDivision
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $DivisionID = $data["DivisionID"];
                    $SubDivisionID = $data["SubDivisionID"];
                    $SubDivision = $data["SubDivision"];


                    if($DivisionID != "" && $SubDivisionID != "" && $SubDivision != "")
                    {
                        $response = array(
                            'SubDivision' => $api_location->UpdateSubDivision($DivisionID,$SubDivisionID, $SubDivision)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
                else if($_REQUEST["action"] == 'DeleteSubDivision') // Delete SubDivision
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $SubDivisionID = $data["SubDivisionID"];


                    if($SubDivisionID != "" )
                    {
                        $response = array(
                            'SubDivision' => $api_location->DeleteSubDivision($SubDivisionID)
                        );
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
                else if($_REQUEST["action"] == 'InsertWardNo') // INSERT WardNo
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );


                    $DivisionID = $data["DivisionID"];
                    $SubDivisionID = $data["SubDivisionID"];
                    $WardNo = $data["WardNo"];


                    if($SubDivisionID != "" && $DivisionID != "" && $WardNo != "")
                    {
                        $response = array(
                            'WardNo' => $api_location->InsertWardNo($DivisionID, $SubDivisionID,$WardNo)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
                else if($_REQUEST["action"] == 'UpdateWardNo') // Update WardNo
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $DivisionID = $data["DivisionID"];
                    $SubDivisionID = $data["SubDivisionID"];
                    $WardNoID = $data["WardNoID"];
                    $WardNo = $data["WardNo"];


                    if($DivisionID != "" && $SubDivisionID != "" && $WardNoID != "" && $WardNo != "")
                    {
                        $response = array(
                            'WardNo' => $api_location->UpdateWardNo($DivisionID,$SubDivisionID, $WardNoID,$WardNo)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
                else if($_REQUEST["action"] == 'DeleteWardNo') // Delete WardNO
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $WardNoID = $data["WardNoID"];


                    if($WardNoID != "" )
                    {
                        $response = array(
                            'WardNo' => $api_location->DeleteWardNo($WardNoID)
                        );
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
                else if($_REQUEST["action"] == 'InsertArea') // INSERT Area
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );


                    $DivisionID = $data["DivisionID"];
                    $SubDivisionID = $data["SubDivisionID"];
                    $WardNoID = $data["WardNoID"];
                    $Area = $data["Area"];


                    if($SubDivisionID != "" && $DivisionID != "" && $WardNoID != "" && $Area != "")
                    {
                        $response = array(
                            'Area' => $api_location->InsertArea($DivisionID, $SubDivisionID,$WardNoID,$Area)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
                else if($_REQUEST["action"] == 'UpdateArea') // Update Area
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $DivisionID = $data["DivisionID"];
                    $SubDivisionID = $data["SubDivisionID"];
                    $WardNoID = $data["WardNoID"];
                    $AreaID = $data["AreaID"];
                    $Area = $data["Area"];


                    if($DivisionID != "" && $SubDivisionID != "" && $WardNoID != "" && $AreaID != "" && $Area != "")
                    {
                        $response = array(
                            'Area' => $api_location->UpdateArea($DivisionID,$SubDivisionID, $WardNoID,$AreaID,$Area)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
                else if($_REQUEST["action"] == 'DeleteArea') // Delete Area
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $AreaID = $data["AreaID"];


                    if($AreaID != "" )
                    {
                        $response = array(
                            'Area' => $api_location->DeleteArea($AreaID)
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