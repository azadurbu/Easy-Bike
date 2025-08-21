<?php

class ActionUser
{
	public $URL;

   	function __construct() 
   	{

        $aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."User/UserAPI/ApiHendlar_User.php?";
    }

	function UserLogin($UserID, $Password) // Check User Id and Password
	{
		$message = "";
		//Server url
		$url = $this->URL."action=GetUserByUserIDAndPass";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array("UserID" => $UserID, "Password" => $Password);
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

        if($errno = curl_errno($ch)) {
            $error_message = curl_strerror($errno);
            //echo "cURL error ({$errno}):\n {$error_message}";
        }
// 		var_dump($response);
// 		echo "<br/><br/>";
		$result = json_decode($response, TRUE);
//		var_dump($result);
// 		 echo $result["User"];
// 		 echo "<br/><br/>";
		if($result["User"] == "Not Matched")
		{
			return "Wrong User ID or Password!!";
		}
		else if($result["User"] == "Deactivated")
		{
			return "Your ID has been Deactivated!!";
		}
		else
		{
			if($result["User"][0]["user_id"]==$UserID && $result["User"][0]["user_name"])
			{
				return "Active";
			}
		}
// 		echo "<br/><br/>";
// 		var_dump($result);
// 		echo "<br/><br/>";
// 		echo $result["User"][0]["user_id"];
// 		echo "<br/><br/>";
// 		echo $result["User"][0]["user_name"];
// 		die();
	}

	function GetAllUserType() // Get All User Type
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllUserType";
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

	function GetUserTypeNameByID($UserTypeID) // Get User Type Name By User Type ID 
	{

		//Server url
		$url = $this->URL."action=GetUserTypeNameByID";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "UserTypeID" => $UserTypeID );                                                                    
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

	function GetUserAccessByUserID($UserID) // Get User Access By User ID 
	{

		//Server url
		$url = $this->URL."action=GetUserAccessByUserID";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "UserID" => $UserID );                                                                    
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

	function GetAllUser() // Get All User Type
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllUser";
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

	function InsertUser($Name, $UserID, $Password, $UserTypeID, $Active) // Insert User
	{

		//Server url
		$url = $this->URL."action=InsertUser";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array(
						"Name" => $Name,
						"UserID" => $UserID,
						"Password" => $Password,
						"UserTypeID" => $UserTypeID,
						"Active" => $Active 
					);                                                                    
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

	function InsertUserType($UserTypeName) // Insert User Type
	{
		//Server url
		$url = $this->URL."action=InsertUserType";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array(
						"UserTypeName" => $UserTypeName,
					);                                                                    
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

	function EditUserType($UserTypeID,$UserTypeName) // Insert User Type
	{
		//Server url
		$url = $this->URL."action=UpdateUserType";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array(
						"UserTypeID" => $UserTypeID,
						"UserTypeName" => $UserTypeName,
					);                                                                    
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

	function GetAllParentModule() // Get All Parent Module
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllParentModule";
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

	function GetAllChildModule() // Get All Child Module
	{
		$message = "";

		//Server url
		$url = $this->URL."action=GetAllChildModule";
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

	function GetParentModuleAccessByID($UserID) // Get Parent Module Access By User ID 
	{

		//Server url
		$url = $this->URL."action=GetParentModuleAccessByID";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "UserID" => $UserID );                                                                    
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

		if($result)
		{
			return $result[0];
		}
		else
		{
			return $result;
		}
	}

	function GetChildModuleAccessByID($UserID) // Get Child Module Access By User ID 
	{

		//Server url
		$url = $this->URL."action=GetChildModuleAccessByID";
		$apiKey = '123456789'; // should match with Server key
		$headers = array(
		     'App_Key: '.$apiKey
		);
		// Request BODY
		$data = array( "UserID" => $UserID );                                                                    
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

		if($result)
		{
			return $result[0];
		}
		else
		{
			return $result;
		}
		
	}


}



?>
