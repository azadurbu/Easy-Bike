<?php
require_once "aBase.php";

class ActionOwner
{

	public $URL;

    function __construct() 
    {
    	$aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

       $this->URL = $BaseURL."API/ApiHendlar_Owner.php?";
    }

	function GetAllOwner() // Check User Id and Password
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllOwner";
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

	function GetOwnerInfoByOwnerID($OwnerID)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetOwnerInfoByOwnerID";
	
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
		$response = curl_exec($ch);
		//echo "<br/><br/>";
		$result = json_decode($response, TRUE);
		return $result;

	}

    function GetOwnerCardFee()
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetOwnerCardFee";

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

    function GetOwnerByCode($Code)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetOwnerByCode";
	
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
		// $result = json_decode($response, TRUE);
		// return $result;
	}

    function UpdateOwnerCardFee($OwnerFee)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=UpdateOwnerCardFee";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "OwnerFee" => $OwnerFee);
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

    function GetAllOwnerBill() // Get All Owner Bill List
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllOwnerBill";
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
    
    function GetGeneratedBill() // Get All Owner Bill List
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetGeneratedBill";
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

    function GetAllOwnerBillPrint($i) // Get All Owner Bill List
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllOwnerBillPrint";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        $data = array( "id" => $i);
        $data_string = json_encode($data);
        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Get response
        $response = curl_exec($ch);

        $result = json_decode($response, TRUE);

        return $result;
    }
    function GetOwnerBill($Owner_oid) // Get All Owner Bill List
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetOwnerBill";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "Owner_oid" => $Owner_oid);
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