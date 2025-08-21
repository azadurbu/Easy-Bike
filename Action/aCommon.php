<?php
require_once "aBase.php";

class ActionCommon
{

	
	public $URL;
    function __construct() 
    {
    	$aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

       $this->URL = $BaseURL."API/ApiHendlar_Common.php?";
    }


	function GetDocCode($DocType) // Check User Id and Password
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetDocNoByDocType";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array("DocType" => $DocType);                                                                    
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


		$DocNo = $result;

		$Zeros = "00000";
		$Zeros = substr($Zeros, 0, -1*strlen($DocNo));
		$Code = $DocType.$Zeros.$DocNo;

		return $Code;
	}

	function GetRegistrationInfo($Code)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetRegistrationInfo";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "Code" => $Code );                                                                    
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

	function GetDriverInfo($Code)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetDriverInfo";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "Code" => $Code );                                                                    
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

	function GetFiscalYear()
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetFiscalYear";
	
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
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}

	function UpdateFiscalYear($StartYear, $EndYear)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=UpdateFiscalYear";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "StartYear" => $StartYear, "EndYear" => $EndYear );                                                                    
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
		$message = "";

		//Server url
		$url = $this->URL."action=GetRegistrationFee";
	
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
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}

	function UpdateRegistrationFee($RegFee)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=UpdateRegistrationFee";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "RegFee" => $RegFee);                                                                    
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

	function GetSurCharge()
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetSurCharge";
	
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
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}

	function UpdateSurCharge($SurCharge)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=UpdateSurCharge";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "SurCharge" => $SurCharge);                                                                    
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

	function GetDriverRegFee()
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetDriverRegFee";
	
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
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}

	function UpdateDriverRegFee($DriverRegFee)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=UpdateDriverRegFee";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "DriverRegFee" => $DriverRegFee);                                                                    
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


	function InsertToken($Code, $Token)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=InsertToken";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "Code" => $Code, "Token" => $Token );                                                                    
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

	function GetTokenByCodeAndDate($Code,$Date)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetTokenByCodeAndDate";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "Code" => $Code , "Date" => $Date );                                                                    
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

	function PinExist($Pin)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=PinExist";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "Pin" => $Pin );                                                                    
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

	function GenerateToken()
	{
		return date("Ymdhis");
	}


    function GetMunicipality()
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetMunicipality";

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
        //echo "<br/><br/>";
        $result = json_decode($response, TRUE);
        return $result;
    }

    function UpdateMunicipality($Municipality)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=UpdateMunicipality";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "Municipality" => $Municipality);
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




}



?>