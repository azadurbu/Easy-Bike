<?php

class ActionLocation
{
	public $URL;
    function __construct() 
    {
        $this->URL = $this->URL."http://localhost/EasyBike/Location/LocationAPI/ApiHendlar_Location.php?";
    }

	function GetAllDivision() // Get All Division
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllDivision";
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

	function GetAllSubDivision() // Get All SubDivision
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllSubDivision";
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

	function GetAllWardNo() // Get All WardNo
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllWardNo";
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

	function GetAllArea() // Get All WardNo
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllArea";
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

	function GetDivisionByDivID($DivID)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetDivisionByDivID";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );


        // Request BODY
        $data = array( "DivID" => $DivID );
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
        return $result[0]["division"];


    }

    function GetSubDivisionBySubDivID($SubDivID)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetSubDivisionBySubDivID";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );


        // Request BODY
        $data = array( "SubDivID" => $SubDivID );
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
		if(count($result)>0)
		return $result[0]["sub_division"];
		else
		return "";


    }

	function GetWardByWardID($WardID)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetWardByWardID";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );


        // Request BODY
        $data = array( "WardID" => $WardID );
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
        return $result[0]["ward_no"];


    }
}



?>