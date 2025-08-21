<?php

include('Authorization.php');
include('API_OwnerTransfer.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_OwnerTransfer = new API_OwnerTransfer();
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
			if($_REQUEST["action"] == 'GetOwnerTransferList') // Get Owner Transfer List
			{
				$response =  $api_OwnerTransfer->GetOwnerTransferList();
			}
			elseif($_REQUEST["action"] == 'GetOwnerTransferListBillPrint') // Get Owner Transfer List
			{
                $data = json_decode( file_get_contents( 'php://input' ), true );
                $id = $data["id"];
				$response =  $api_OwnerTransfer->GetOwnerTransferListBillPrint($id);
			}
			else if($_REQUEST["action"] == 'InsertOwnerTransfer') // INSERT Owner Transfer
			{
				$data = json_decode( file_get_contents( 'php://input' ), true );


                $Code = $data["Code"];
				$RegNo = $data["RegNo"];
				$CurrentOwner = $data["CurrentOwner"];
				$NewOwner = $data["NewOwner"];
				$OwnerTrnsFee = $data["OwnerTrnsFee"];


				if($Code != "" && $RegNo != "" && $CurrentOwner != "" && $NewOwner != "" && $OwnerTrnsFee != "" )
				{
					$response = array(
										'Transfer' => $api_OwnerTransfer->InsertOwnerTransfer
											(
                                            $Code, $RegNo, $CurrentOwner, $NewOwner, $OwnerTrnsFee
				 							)			
									);
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
            }

			else if($_REQUEST["action"] == 'OwnerTransferNoBill') // UPDATE Owner Transfer No Bill
			{
                $data = json_decode( file_get_contents( 'php://input' ), true );
                
				$RegNo = $data["RegNo"];
				$NewOwner = $data["NewOwner"];

				if($RegNo != "" && $NewOwner != "" )
				{
					$response = array(
										'Transfer' => $api_OwnerTransfer->OwnerTransferNoBill
											(
                                            $RegNo, $NewOwner
				 							)			
									);
				}
				else // INVALID PARAMETER
				{
					Error(601);
				}
            }

            else if($_REQUEST["action"] == 'GetOwnerTransferFee')
            {
                $response = $api_OwnerTransfer->GetOwnerTransferFee();
            }
            else if($_REQUEST["action"] == 'UpdateOwnerTransferFee') // Owner Transfer Fee Update
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $OwnerTransferFee = $data["OwnerTransferFee"];

                if($OwnerTransferFee!="")
                {
                    $response = $api_OwnerTransfer->UpdateOwnerTransferFee($OwnerTransferFee);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetVehicleOwnerTransferVRegNo') // Owner Transfer Fee Update
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $vRegNo = $data["vRegNo"];

                if($vRegNo!="")
                {
                    $response = $api_OwnerTransfer->GetVehicleOwnerTransferVRegNo($vRegNo);
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'OwnerTrnsBillPost') // OWNER Transfer Bill Post
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                $BankID = $data["BankID"];
                $AccountID = $data["AccountID"];
                $PaymentDate = $data["PaymentDate"];

                if($Code!="" && $BankID != "" && $AccountID != "" && $PaymentDate != "")
                {
                    $response = array(
                        'OwnerTrnsBillPost' => $api_OwnerTransfer->OwnerTrnsBillPost($Code,$BankID,$AccountID,$PaymentDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetOwnerTrnsInvoiceInfoByCode') // GET Transfer Fee BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'OwnerTrnsInvoice' => $api_OwnerTransfer->GetOwnerTrnsInvoiceInfoByCode($Code)
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