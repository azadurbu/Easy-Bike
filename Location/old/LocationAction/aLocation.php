<?php

class ActionLocation
{


	function GetAllDivision() // Get All User Type
	{
		$message = "";

		//Server url
		$url = "http://localhost/EasyBike/Location/LocationAPI/ApiHendlar_Location.php?action=GetAllDivision";
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

	// function GetUserTypeNameByID($UserTypeID) // Get User Type Name By User Type ID 
	// {

	// 	//Server url
	// 	$url = "http://localhost/EasyBike/UserAPI/ApiHendlar_User.php?action=GetUserTypeNameByID";
	// 	$apiKey = '123456789'; // should match with Server key
	// 	$headers = array(
	// 	     'App_Key: '.$apiKey
	// 	);
	// 	// Request BODY
	// 	$data = array( "UserTypeID" => $UserTypeID );                                                                    
	// 	$data_string = json_encode($data); 
	// 	// Send request to Server
	// 	$ch = curl_init($url);
	// 	// To save response in a variable from server, set headers;
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
	// 	// Get response
	// 	$response = curl_exec($ch);
	// 	//echo "<br/><br/>";
	// 	$result = json_decode($response, TRUE);
	// 	return $result;
	// }

	// function GetUserAccessByUserID($UserID) // Get User Access By User ID 
	// {

	// 	//Server url
	// 	$url = "http://localhost/EasyBike/UserAPI/ApiHendlar_User.php?action=GetUserAccessByUserID";
	// 	$apiKey = '123456789'; // should match with Server key
	// 	$headers = array(
	// 	     'App_Key: '.$apiKey
	// 	);
	// 	// Request BODY
	// 	$data = array( "UserID" => $UserID );                                                                    
	// 	$data_string = json_encode($data); 
	// 	// Send request to Server
	// 	$ch = curl_init($url);
	// 	// To save response in a variable from server, set headers;
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
	// 	// Get response
	// 	$response = curl_exec($ch);
	// 	//echo "<br/><br/>";
	// 	$result = json_decode($response, TRUE);
	// 	return $result;
	// }

	// function GetAllUser() // Get All User Type
	// {
	// 	$message = "";

	// 	//Server url
	// 	$url = "http://localhost/EasyBike/UserAPI/ApiHendlar_User.php?action=GetAllUser";
	// 	$apiKey = '123456789'; // should match with Server key
	// 	$headers = array(
	// 	     'App_Key: '.$apiKey
	// 	);
	                                                                 
	// 	// Send request to Server
	// 	$ch = curl_init($url);
	// 	// To save response in a variable from server, set headers;
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
                                                                   
	// 	// Get response
	// 	$response = curl_exec($ch);

	// 	$result = json_decode($response, TRUE);

	// 	return $result; 
	// }

	// function InsertUser($Name, $UserID, $Password, $UserTypeID, $Active) // Insert User
	// {

	// 	//Server url
	// 	$url = "http://localhost/EasyBike/UserAPI/ApiHendlar_User.php?action=InsertUser";
	// 	$apiKey = '123456789'; // should match with Server key
	// 	$headers = array(
	// 	     'App_Key: '.$apiKey
	// 	);
	// 	// Request BODY
	// 	$data = array(
	// 					"Name" => $Name,
	// 					"UserID" => $UserID,
	// 					"Password" => $Password,
	// 					"UserTypeID" => $UserTypeID,
	// 					"Active" => $Active 
	// 				);                                                                    
	// 	$data_string = json_encode($data); 
	// 	// Send request to Server
	// 	$ch = curl_init($url);
	// 	// To save response in a variable from server, set headers;
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
	// 	// Get response
	// 	$response = curl_exec($ch);
	// 	//echo "<br/><br/>";
	// 	$result = json_decode($response, TRUE);

	// 	return $result;
	// }

	// function InsertUserType($UserTypeName) // Insert User Type
	// {
	// 	//Server url
	// 	$url = "http://localhost/EasyBike/UserAPI/ApiHendlar_User.php?action=InsertUserType";
	// 	$apiKey = '123456789'; // should match with Server key
	// 	$headers = array(
	// 	     'App_Key: '.$apiKey
	// 	);
	// 	// Request BODY
	// 	$data = array(
	// 					"UserTypeName" => $UserTypeName,
	// 				);                                                                    
	// 	$data_string = json_encode($data); 
	// 	// Send request to Server
	// 	$ch = curl_init($url);
	// 	// To save response in a variable from server, set headers;
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
	// 	// Get response
	// 	$response = curl_exec($ch);
	// 	//echo "<br/><br/>";
	// 	$result = json_decode($response, TRUE);

	// 	return $result;
	// }

	// function EditUserType($UserTypeID,$UserTypeName) // Insert User Type
	// {
	// 	//Server url
	// 	$url = "http://localhost/EasyBike/UserAPI/ApiHendlar_User.php?action=UpdateUserType";
	// 	$apiKey = '123456789'; // should match with Server key
	// 	$headers = array(
	// 	     'App_Key: '.$apiKey
	// 	);
	// 	// Request BODY
	// 	$data = array(
	// 					"UserTypeID" => $UserTypeID,
	// 					"UserTypeName" => $UserTypeName,
	// 				);                                                                    
	// 	$data_string = json_encode($data); 
	// 	// Send request to Server
	// 	$ch = curl_init($url);
	// 	// To save response in a variable from server, set headers;
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		                                                             
		
	// 	// Get response
	// 	$response = curl_exec($ch);
	// 	//echo "<br/><br/>";
	// 	$result = json_decode($response, TRUE);

	// 	return $result;
	// }


}



?>