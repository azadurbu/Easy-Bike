<?php

include('Authorization.php');
include('API_IssueLicense.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_issue = new API_IssueLicense();
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
			if($_REQUEST["action"] == 'GetAllIssueLicense') // GET ALL Issue License
			{
				$response =  $api_issue->GetAllIssueLicense();
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