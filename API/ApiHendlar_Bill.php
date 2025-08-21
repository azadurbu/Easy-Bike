<?php

include('Authorization.php');
include('API_Bill.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_Bill = new API_Bill();
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
      			if($_REQUEST["action"] == 'GetAllBill') // GET ALL Bill
      			{
      				$response =  $api_Bill->GetAllBill();
      			}
      		
            else if($_REQUEST["action"] == 'UpdateFineBill') // Update Fine Bills BY OWNER CODE
                {

                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $Code = $data["Code"];
                    $Fine = $data["Fine"];


                    if($Code!="" && $Fine != "")
                    {
                        $response = array(
                            'Bill' => $api_Bill->UpdateFineBill($Code,$Fine)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
            else if($_REQUEST["action"] == 'GetAllBillByFiscalYear') // GET ALL BILL BY FISCAL YEAR
            {
                $data = json_decode( file_get_contents( 'php://input' ), true );

                $FiscalYear = $data["FiscalYear"];


                if($FiscalYear!="" )
                {
                    $response = array(
                        'Bill' => $api_Bill->GetAllBillByFiscalYear($FiscalYear)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
      			else if($_REQUEST["action"] == 'GetAllRegNo') // GET ALL Registration No By Fiscal Year
      			{
				        $data = json_decode( file_get_contents( 'php://input' ), true );

                $FiscalYear = $data["FiscalYear"];


                if($FiscalYear!="" )
                {
                    $response = array(
                        'Bill' => $api_Bill->GetAllRegNo($FiscalYear)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
			      }
            else if($_REQUEST["action"] == 'GetBillByCode') // GET Bill BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'Bill' => $api_Bill->GetBillByCode($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetDriverBillByCode') // GET Bill BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'DriverBill' => $api_Bill->GetDriverBillByCode($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'InsertSingleBill') // GET OWNER BY OWNER CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                $FiscalYear = $data["FiscalYear"];
                $RegNo = $data["RegNo"];
                $RegDate = $data["RegDate"];
         				$ExpiredDate = $data["ExpiredDate"];
         				$RegFee = $data["RegFee"];
         				$Arrear = $data["Arrear"];
         				$SurCharge = $data["SurCharge"];
         				$Total = $data["Total"];
         				$Due = $data["Due"];
         				$Status = $data["Status"];
                $PaymentDate = $data["PaymentDate"];
               

                if($Code!="" && $FiscalYear !="" && $RegNo != "" && $RegDate != "" && $ExpiredDate != "" && $RegFee != "" && $Total != "" && $Due != "" && $Status != "")
                {
                    $response = array(
                        'Bill' => $api_Bill->InsertSingleBill($Code,$FiscalYear,$RegNo,$RegDate,$ExpiredDate,$RegFee,$Arrear,$SurCharge,$Total,$Due,$Status,$PaymentDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'BillPost') // GET OWNER BY OWNER CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                $RegNo = $data["RegNo"];
                $BankID = $data["BankID"];
                $AccountID = $data["AccountID"];
                $PaymentDate = $data["PaymentDate"];

                if($Code!="" && $RegNo != "" && $BankID != "" && $AccountID != "" && $PaymentDate != "")
                {
                    $response = array(
                        'Bill' => $api_Bill->BillPost($Code,$RegNo,$BankID,$AccountID,$PaymentDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'DriverBillPost') // Driver Bill Post
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                $BankID = $data["BankID"];
                $AccountID = $data["AccountID"];
                $PaymentDate = $data["PaymentDate"];

                if($Code!="" && $BankID != "" && $AccountID != "" && $PaymentDate != "")
                {
                    $response = array(
                        'DriverBillPost' => $api_Bill->DriverBillPost($Code,$BankID,$AccountID,$PaymentDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'OwnerBillPost') // OWNER Bill Post
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                $BankID = $data["BankID"];
                $AccountID = $data["AccountID"];
                $PaymentDate = $data["PaymentDate"];

                if($Code!="" && $BankID != "" && $AccountID != "" && $PaymentDate != "")
                {
                    $response = array(
                        'OwnerBillPost' => $api_Bill->OwnerBillPost($Code,$BankID,$AccountID,$PaymentDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'GetInvoiceInfoByCode') // GET Bill BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];

                if($Code!="" )
                {
                    $response = array(
                        'Invoice' => $api_Bill->GetInvoiceInfoByCode($Code)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'InsertIssueDate') // GET Bill BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $issueDate = $data["issueDate"];

                if($issueDate !="" )
                {
                    $response = array(
                        'iDate' => $api_Bill->InsertIssueDate($issueDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'OwnerGeneratedBill') // GET Bill BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $user = $data["user"];

                if($user !="" )
                {
                    $response = array(
                        'iDate' => $api_Bill->OwnerGeneratedBill($user)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'OwnerGeneratedPostBill') // GET Bill BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                $Bank = $data["Bank"];
                $Account = $data["Account"];
                $PaymentDate = $data["PaymentDate"];
                
                if($Code != "" && $Bank != "" && $Account != "" && $PaymentDate != "" )
                {
                    $response = array(
                        'iDate' => $api_Bill->OwnerGeneratedPostBill($Code, $Bank, $Account, $PaymentDate)
                    );
                }
                else // INVALID PARAMETER
                {
                    Error(601);
                }
            }
            else if($_REQUEST["action"] == 'nowBillIssueDate') // GET Bill BY  CODE
            {
                $response = array(
                    'iDate' => $api_Bill->nowBillIssueDate()
                );
            }
            else if($_REQUEST["action"] == 'InsertOtherBill') // GET Bill BY  CODE
            {

                $data = json_decode( file_get_contents( 'php://input' ), true );

                $Code = $data["Code"];
                $billType = $data['billType'];
                $Gari = $data['Gari'];
                $Driver = $data['Driver'];
                $Account = $data['Account'];
                $billAmount = $data['billAmount'];
                $details = $data['details'];
                
                if($Code!="" )
                {
                    $response = array(
                        'OtherBill' => $api_Bill->InsertOtherBill($Code, $billType, $Gari, $Driver, $Account, $billAmount, $details)
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