<?php
require_once "aBase.php";

class ActionVehicle
{


	public $URL;

    function __construct() 
    {
    	$aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

       $this->URL = $BaseURL."API/ApiHendlar_Vehicle.php?";
    }

	function GetAllVehicle() 
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

	function GetVehicleByOwnerID($OwnerID)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetVehicleByOwnerID";
	
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "OwnerID" => $OwnerID );                                                                    
		$data_string = json_encode($data); 
		// Send request to Server
		$ch = curl_init($url);
		// To save response in a variable from server, set headers;
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
		// Get response
		return $response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}

	function GetVehicleByCode($Code)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetVehicleByCode";
	
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
		return $response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}

	function GetVehicleCardIsset($Code)
	{	
		$message = "";

		//Server url
		$url = $this->URL."action=GetVehicleCardIsset";
	
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
		return $response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}

	function GetVehicleOcblByVcl($Code)
	{	
		$message = "";

		//Server url
		$url = $this->URL."action=GetVehicleOcblByVcl";
	
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
		return $response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;
	}
}



?>