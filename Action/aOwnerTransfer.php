<?php
require_once "aBase.php";

class ActionOwnerTransfer
{


	public $URL;

    function __construct() 
    {
    	$aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

       $this->URL = $BaseURL."API/ApiHendlar_OwnerTransfer.php?";
    }

	function GetOwnerTransferList() 
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetOwnerTransferList";
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
    function GetOwnerTransferListBillPrint($i)
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetOwnerTransferListBillPrint";
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
	function GetOwnerTransferFee()
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetOwnerTransferFee";

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

    function UpdateOwnerTransferFee($OwnerTransferFee)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=UpdateOwnerTransferFee";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "OwnerTransferFee" => $OwnerTransferFee);
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

    function GetVehicleOwnerTransferVRegNo($vRegNo)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetVehicleOwnerTransferVRegNo";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "vRegNo" => $vRegNo);
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