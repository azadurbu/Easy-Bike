<?php

include('Authorization.php');
include('API_Owner.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_owner = new API_Owner();
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
			if($_REQUEST["action"] == 'GetAllOwner') // GET ALL Owner
			{
				$response =  $api_owner->GetAllOwner();
			}
			else if($_REQUEST["action"] == 'GetOwnerByCode') // GET OWNER BY OWNER CODE
			{

				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];

				if($Code!="" )
				{
					$response = array(
										'Owner' => $api_owner->GetOwnerByCode($Code)			
									 );
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetOwnerByOwnerID') // GET OWNER BY OWNER CODE
			{

				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$OwnerID = $data["OwnerID"];

				if($OwnerID!="" )
				{
					$response = array(
										'Owner' => $api_owner->GetOwnerByOwnerID($OwnerID)			
									 );
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'GetOwnerInfoByOwnerID') // GET OWNER BY OWNER CODE
			{

				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$OwnerID = $data["OwnerID"];

				if($OwnerID!="" )
				{
					$response = array(
										'Owner' => $api_owner->GetOwnerInfoByOwnerID($OwnerID)			
									 );
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'InsertOwner') // INSERT USER
            {
				$data = json_decode( file_get_contents( 'php://input' ), true );

				$Code = $data['Code'];
				$OwnerName = $data['OwnerName'];
				$OwnerNameEng = $data['OwnerNameEng'];
				$Mobile = $data['Mobile'];
				$FatherName = $data['FatherName'];
				$MotherName = $data['MotherName'];
				$DOB = explode('-',$data['DOB']);
				$DOB = $DOB[2].'-'.$DOB[1].'-'.$DOB[0];
				$NID = $data['NID'];
				$OwnerBGroup = $data['OwnerBGroup'];
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
                        'Owner' => $api_owner->InsertOwner
                        (
							$Code,$OwnerName,$OwnerNameEng,$Mobile,$FatherName,$MotherName,$DOB,$NID,$OwnerBGroup,$cDivision,$cSubDivision,$cWardNo,$cArea,$cHoldingNo,$chkAddress,$Parmanent_address,$PhotoPath
                        )
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
			else if($_REQUEST["action"] == 'UpdateOwner') // UPDATE OWNER
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );


				$Code = $data['Code'];
                $OwnerName = $data['OwnerName'];
                $OwnerNameEng = $data['OwnerNameEng'];
                $Mobile = $data['Mobile'];
                $FatherName = $data['FatherName'];
                $MotherName = $data['MotherName'];
                $DOB = explode('-',$data['DOB']);
                $DOB = $DOB[2].'-'.$DOB[1].'-'.$DOB[0];
                $NID = $data['NID'];
                $OwnerBGroup = $data['OwnerBGroup'];
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
										'Owner' => $api_owner->UpdateOwner
											(
												$Code, $OwnerName, $OwnerNameEng, $Mobile, $FatherName, $MotherName, $DOB, $NID, $OwnerBGroup, $cDivision, $cSubDivision, $cWardNo, $cArea, $cHoldingNo, $chkAddress, $Parmanent_address, $PhotoPath
																						
				 							)			
									);
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			else if($_REQUEST["action"] == 'DeleteOwner') // GET OWNER BY OWNER CODE
			{

				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Code = $data["Code"];

				if($Code!="" )
				{
					$response = array(
										'Owner' => $api_owner->DeleteOwner($Code)			
									 );
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
            else if($_REQUEST["action"] == 'GetOwnerCardFee')
            {
                $response = $api_owner->GetOwnerCardFee();
            }
            else if($_REQUEST["action"] == 'UpdateOwnerCardFee') // Owner Card Fee Update
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $OwnerFee = $data["OwnerFee"];

                if($OwnerFee!="")
                {
                    $response = $api_owner->UpdateOwnerCardFee($OwnerFee);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetAllOwnerBill') // GET ALL Owner Bill
            {
                $response =  $api_owner->GetAllOwnerBill();
			}
            else if($_REQUEST["action"] == 'GetGeneratedBill') // GET ALL Owner Bill
            {
                $response =  $api_owner->GetGeneratedBill();
			}
			else if($_REQUEST["action"] == 'GetAllOwnerBillPrint') // GET SPECFIC Owner Bill
            {	$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$id = $data["id"];

				if($id!="" )
				{
					$response =  $api_owner->GetAllOwnerBillPrint($id);
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
            else if($_REQUEST["action"] == 'GetOwnerBill') // GET SPECFIC Owner Bill
            {

				$data = json_decode( file_get_contents( 'php://input' ), true );
				
				$Owner_oid = $data["Owner_oid"];

				if($Owner_oid!="" )
				{
					$response =  $api_owner->GetOwnerBill($Owner_oid);
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
			}
			
            else if($_REQUEST["action"] == 'GetOwnerBillByCBillID') // GET Owner BY Owner Bill ID
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'OwnerBill' => $api_owner->GetOwnerBillByCBillID($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetOwnerInfoByCBillID') // GET Owner BY Owner Bill ID
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $CBillID = $data["CBillID"];

                if($CBillID!="" )
                {
                    $response = array(
                        'OwnerBill' => $api_owner->GetOwnerInfoByCBillID($CBillID)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'InsertOwnerBill') // INSERT Owner Bill
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );


                $Owner = $data["Owner"];
                $Code = $data["Code"];
                $OwnerCardFee = $data["OwnerCardFee"];
                $EntryDate = $data["EntryDate"];

                if($Owner != "" && $Code != "" && $OwnerCardFee != "" && $EntryDate != "" )
                {
                    $response = array(
                        'OwnerBill' => $api_owner->InsertOwnerBill($Owner,$Code, $OwnerCardFee, $EntryDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetOwnerCardInvoiceInfoByCode') // GET Card Fee BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'OwnerInvoiceCard' => $api_owner->GetOwnerCardInvoiceInfoByCode($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetOwnerGeneratedInvoiceData') // GET Card Fee BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'OwnerData' => $api_owner->GetOwnerGeneratedInvoiceData($Code)
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