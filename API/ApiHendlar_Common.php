<?php

include('Authorization.php');
include('API_Common.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_common = new API_Common();
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

function GenerateDocCode($DocType,$DocNo)
{
	$Zeros = "00000";
	$Zeros = substr($Zeros, 0, -1*strlen($DocNo));
	$Code = $DocType.$Zeros.$DocNo;
	return $Code;
}

if(isset($_REQUEST))
{

	if($authorized->API_KEY()) // Check Authorization
	{
		if(isset($_REQUEST["action"]))
		{

			if($_REQUEST["action"] == 'GetRegistrationInfo')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];

				if($Code!="")
				{
					$response = $api_common->GetRegistrationInfo($Code);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
	        else if($_REQUEST["action"] == 'GetDriverInfo')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];

				if($Code!="")
				{
					$response = $api_common->GetDriverInfo($Code);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetCardInfoByVehicleCode') // GET ALL Vehicle BY Owner ID 
			{

				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];

				if($Code!="")
				{
					$response = $api_common->GetCardInfoByVehicleCode($Code);			
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetTokenByCodeAndDate')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];
				$Date = $data["Date"];

				if($Code!="" && $Date != "")
				{
					$response = $api_common->GetTokenByCodeAndDate($Code,$Date);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'InsertToken')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];
				$Token = $data["Token"];

				if($Code!="" && $Token != "")
				{
					$response = $api_common->InsertToken($Code,$Token);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'InsertPin')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Pin = $data["Pin"];

				if($Pin!="")
				{
					$response = $api_common->InsertPin($Pin);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'PinExist')
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Pin = $data["Pin"];

				if($Pin!="")
				{
					$response = $api_common->PinExist($Pin);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetDocNoByDocType') // GET ALL USER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$DocType = $data["DocType"];

				if($DocType!="")
				{
					$result = $api_common->GetDocNoByDocType($DocType);
					$response = GenerateDocCode($DocType,$result[0]["DOC_NO"]);			
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'UpdateDocNoByDocType') // GET ALL USER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$DocType = $data["DocType"];

				if($DocType!="")
				{
					$response = $api_common->UpdateDocNoByDocType($DocType);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetFiscalYear')
			{
				$response = $api_common->GetFiscalYear();		
			}
			else if($_REQUEST["action"] == 'UpdateFiscalYear') // GET ALL USER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$StartYear = $data["StartYear"];
				$EndYear = $data["EndYear"];

				if($StartYear!="" && $EndYear != "")
				{
					$response = $api_common->UpdateFiscalYear($StartYear,$EndYear);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetRegistrationFee')
			{
				$response = $api_common->GetRegistrationFee();		
			}
			else if($_REQUEST["action"] == 'UpdateRegistrationFee') // GET ALL USER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$RegFee = $data["RegFee"];

				if($RegFee!="")
				{
					$response = $api_common->UpdateRegistrationFee($RegFee);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetSurCharge')
			{
				$response = $api_common->GetSurCharge();		
			}
			else if($_REQUEST["action"] == 'UpdateSurCharge') // GET ALL USER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$SurCharge = $data["SurCharge"];

				if($SurCharge!="")
				{
					$response = $api_common->UpdateSurCharge($SurCharge);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
		

			else if($_REQUEST["action"] == 'GetDriverRegFee')
			{
				$response = $api_common->GetDriverRegFee();		
			}
			else if($_REQUEST["action"] == 'UpdateDriverRegFee') // GET ALL USER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$DriverRegFee = $data["DriverRegFee"];

				if($DriverRegFee!="")
				{
					$response = $api_common->UpdateDriverRegFee($DriverRegFee);		
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			//------------------------- Municipality---------------------
            else if($_REQUEST["action"] == 'GetMunicipality')
            {
                $response = $api_common->GetMunicipality();
            }
            else if($_REQUEST["action"] == 'UpdateMunicipality') // Update Municipality
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Municipality = $data["Municipality"];

                if($Municipality!="")
                {
                    $response = $api_common->UpdateMunicipality($Municipality);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
			//------------------------ DASHBOARD START -------------------------
			else if($_REQUEST["action"] == 'GetTotalOwner')
			{
				$response = $api_common->GetTotalOwner();		
			}
			else if($_REQUEST["action"] == 'GetTotalVehicle')
			{
				$response = $api_common->GetTotalVehicle();		
			}
			else if($_REQUEST["action"] == 'GetTotalDriver')
			{
				$response = $api_common->GetTotalDriver();		
			}
			else if($_REQUEST["action"] == 'GetTotalDemandByFiscalYear')
			{
				$response = $api_common->GetTotalDemandByFiscalYear();		
			}
			else if($_REQUEST["action"] == 'GetTotalDueByFiscalYear')
			{
				$response = $api_common->GetTotalDueByFiscalYear();		
			}
			//------------------------ DASHBOARD END -------------------------
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