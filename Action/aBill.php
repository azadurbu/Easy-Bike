<?php
require_once "aBase.php";
require_once 'aCommon.php';

class ActionBill
{

	public $URL;
    function __construct() 
    {
    	$aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

       $this->URL = $BaseURL."API/ApiHendlar_Bill.php?";
    }

	function GetAllBill() // GET ALL BILL
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllBill";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
	                                                                 
		// Send request to Server
		$ch = curl_init($url);
		// To save response in a variable from server, set headers;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
                                                                   
		// Get response
		$response = curl_exec($ch);

		$result = json_decode($response, TRUE);

		return $result; 
	}

	function GetAllRegNo()
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllRegNo";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
	                                                                 
		// Send request to Server
		$ch = curl_init($url);
		// To save response in a variable from server, set headers;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
                                                                   
		// Get response
		$response = curl_exec($ch);

		$result = json_decode($response, TRUE);

		return $result; 
	}

	function GetAllRegistrationInfo() 
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllVehicle";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
	                                                                 
		// Send request to Server
		$ch = curl_init($url);
		// To save response in a variable from server, set headers;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
                                                                   
		// Get response
		$response = curl_exec($ch);

		$result = json_decode($response, TRUE);

		return $result; 
	}

	function GetDocNoByDocType($DocType)
	{
	//Server url
		$url = $this->URL."action=GetDocNoByDocType";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "DocType" => $DocType);  

		$data_string = json_encode($data); 

		// Send request to Server
		$ch = curl_init($url);
		// To save response in a variable from server, set headers;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
		// Get response
		$response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);

		return $result;
	}

	function UpdateDocNoByDocType($DocType)
	{
	//Server url
		$url = $this->URL."action=UpdateDocNoByDocType";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "DocType" => $DocType);  

		$data_string = json_encode($data); 

		// Send request to Server
		$ch = curl_init($url);
		// To save response in a variable from server, set headers;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
		// Get response
		$response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);

		return $result;
	}

	function GetRegistrationFee()
	{
		$aCommon = new ActionCommon();

		$RegFee = $aCommon->GetRegistrationFee();
		//echo "<br><br><br><br><br><gr><br><br>----------------------------------------------------RegFee : ".$RegFee[0]["reg_fee"];
	
		return $RegFee[0]["reg_fee"];
	} 

	function GetSurCharge()
	{
		$aCommon = new ActionCommon();
		$SurCharge = $aCommon->GetSurCharge();
		return $SurCharge[0]["sur_charge"];
	}

	function GetSurChargeAmount($Arrear)
	{
		$aBill = new ActionBill();	

		$SurCharge = intval($aBill->GetSurCharge());

		$SurChargeAmount = intval($Arrear) * $SurCharge;
		$SurChargeAmount = $SurChargeAmount/100;

		return $SurChargeAmount;
	}

	function GetArrearByRegNo($RegNo)
	{
		$Arrear = "0";
		return $Arrear;
	}

	function InsertSingleBill($RegNo,$RegDate,$ExpiredDate,$FiscalYear)
	{
		// echo "<br>---------------------------------------------------------------RegNo : ".$RegNo;
		// echo "<br>---------------------------------------------------------------RegDate : ".$RegDate;
		// echo "<br>---------------------------------------------------------------ExpiredDate : ".$ExpiredDate;
		$aBill = new ActionBill();


		$Code = $aBill->GetDocNoByDocType("SBL");
		$RegFee = $aBill->GetRegistrationFee();
		$Arrear = $aBill->GetArrearByRegNo($RegNo);
		$SurCharge = $aBill->GetSurChargeAmount($Arrear);
		$Total = intval($RegFee) + intval($Arrear) + intval($SurCharge);
		$Due = $Total;
		$Status = "0";
		$PaymentDate ="";

		//Server url
		$url = $this->URL."action=InsertSingleBill";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( 

			"Code" => $Code, 
			"FiscalYear" => $FiscalYear,
			"RegNo" => $RegNo, 
			"RegDate" => $RegDate, 
			"ExpiredDate" => $ExpiredDate, 
			"RegFee" => $RegFee, 
			"Arrear" => $Arrear, 
			"SurCharge" => $SurCharge, 
			"Total" => $Total, 
			"Due" => $Due, 
			"Status" => $Status , 
			"PaymentDate" => $PaymentDate

		);  

		$data_string = json_encode($data); 
		//echo  "<br>---------------------------------------------------------------------------".$data_string; 
		// Send request to Server
		$ch = curl_init($url);
		// To save response in a variable from server, set headers;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
		// Get response
		$response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);

		return $result;
	}

	function GenerateBill($StartYear, $EndYear)
	{

		$aBill = new ActionBill();


		$FiscalYear = $StartYear."-".$EndYear;
		$RegInfo  = $aBill->GetAllRegistrationInfo();
		$RegDate = "2018-09-09";
		$ExpiredDate = $EndYear."-06-30";


		$NewEntry = 0;
		$AlreadyExist = 0;
		$Failed = 0;
		foreach ($RegInfo as $key => $res) 
		{
			$result = $aBill->InsertSingleBill($res['v_reg_no'],$RegDate,$ExpiredDate,$FiscalYear);
			//var_dump($result);

			if($result["Bill"] == "Already Exist!!")
			{
				$AlreadyExist++;
			}
			else if($result["Bill"] == "Bill created successfully!!")
			{
				$aBill->UpdateDocNoByDocType("SBL");
				$NewEntry++;
			}
			else
			{
				$Failed++;
			}
		}


		$Count = count($RegInfo);

		$msg = "Total Registration No Found : ".$Count.
			   "<br>Newly Generated Bill : ".$NewEntry.
			   "<br>Already Exist Bill : ".$AlreadyExist.
			   "<br>Failed Oparetion : ".$Failed;


		return $msg;
	}	
}



?>