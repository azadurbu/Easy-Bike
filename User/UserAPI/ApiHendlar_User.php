<?php

include('Authorization.php');
include('Api_User.php');
include('HTTP_Response_Code.php');

$authorized = new Authorization();
$api_user = new Api_User();
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
				if($_REQUEST["action"] == 'GetAllUser') // GET ALL USER
				{
					$response = array( 
										'UserList' => $api_user->GetAllUser()
									 );
				}
				else if($_REQUEST["action"] == 'GetUserByUserID') // GET USER BY USERID and PASSWORD
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserID = $data["UserID"];

					if($UserID!="" )
					{
						$response = array(
											'User' => $api_user->GetUserByUserID($UserID)
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetUserByUserIDAndPass') // GET USER BY USERID and PASSWORD
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );

					$UserID = $data["UserID"];
					$Password = $data["Password"];

					if($UserID!="" && $Password!="")
					{
						$response = array(
											'User' => $api_user->GetUserByUserIDAndPass($UserID,$Password)
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'InsertUser') // INSERT USER
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserName = $data["Name"];
					$UserID = $data["UserID"];
					$Password = $data["Password"];
					$UserTypeID = $data["UserTypeID"];
					$Active = $data["Active"];

					if($UserID!="" && $Password!="")
					{
						$response = array(
											'User' => $api_user->InsertUser($UserName,$UserID,$Password,$UserTypeID,$Active)			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'UpdateUser') // UPDATE USER
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserName = $data["UserName"];
					$UserID = $data["UserID"];
					$Password = $data["Password"];
					$UserTypeID = $data["UserTypeID"];
					$Active = $data["Active"];

					if($UserID!="" && $Password!="")
					{
						$response = array(
											'User' => $api_user->UpdateUser($UserName,$UserID,$Password,$UserTypeID,$Active )			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'DeleteUser') // Delete User
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $UserID = $data["UserID"];


                    if($UserID != "" )
                    {
                        $response = array(
                            'User' => $api_user->DeleteUser($UserID)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
				else if($_REQUEST["action"] == 'GetAllUserType') // GET ALL USER TYPE
				{
					$response = array( 
										'UserTypeList' => $api_user->GetAllUserType()
									 );
				}
				else if($_REQUEST["action"] == 'GetUserTypeNameByID') // GET ALL USER TYPE
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserTypeID = $data["UserTypeID"];

					if($UserTypeID != "")
					{
						$response = array(
											'UserTypeName' => $api_user->GetUserTypeNameByID($UserTypeID)			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'InsertUserType') // INSERT USER TYPE
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserTypeName = $data["UserTypeName"];

					if($UserTypeName != "")
					{
						$response = array(
											'UserType' => $api_user->InsertUserType($UserTypeName)			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'UpdateUserType') // UPDATE USER TYPE
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
									
					$UserTypeID = $data["UserTypeID"];
					$UserTypeName = $data["UserTypeName"];

					if($UserTypeID!="" && $UserTypeName!="")
					{
						$response = array(
											'UserType' => $api_user->UpdateUserType($UserTypeID,$UserTypeName)			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'DeleteUserType') // Delete UserType
                {
                    $data = json_decode( file_get_contents( 'php://input' ), true );

                    $UserTypeID = $data["UserTypeID"];


                    if($UserTypeID != "" )
                    {
                        $response = array(
                            'UserType' => $api_user->DeleteUserType($UserTypeID)
                        );
                    }
                    else // INVALID PARAMETER
                    {
                        Error(601);
                    }
                }
				else if($_REQUEST["action"] == 'GetAllUserTypeAccess') // GET ALL USER TYPE ACCESS
				{
					$response = array( 
										'UserTypeAccessList' => $api_user->GetAllUserTypeAccess()
									 );
				}
				else if($_REQUEST["action"] == 'GetUserAccessByUserID') // GET USER ACCESS BY USER ID 
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserID = $data["UserID"];

					if($UserID!="")
					{
						$response = array(
											'UserAccess' => $api_user->GetUserAccessByUserID($UserID)	
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetUserTypeAccessByUserTypeID') // GET USER BY USERID and PASSWORD
				{

					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserTypeID = $data["UserTypeID"];

					if($UserTypeID!="")
					{
						$response = array(
											'UserTypeAccess' => $api_user->GetUserTypeAccessByUserTypeID($UserTypeID)	
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'InsertUserTypeAccess') // INSERT USER TYPE ACCESS
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserTypeID = $data["UserTypeID"];
					$ModuleName = $data["ModuleName"];
					$Save = $data["Save"];
					$Edit = $data["Edit"];
					$Remove = $data["Remove"];
					$View = $data["View"];

					if($UserTypeID!="" && $ModuleName!="")
					{
						$response = array(
											'UserAccess' => $api_user->InsertUserTypeAccess($UserTypeID,$ModuleName,$Save,$Edit,$Remove,$View)			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'UpdateUserTypeAccess') // UPDATE USER TYPE ACCESS
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserTypeID = $data["UserTypeID"];
					$ModuleName = $data["ModuleName"];
					$Save = $data["Save"];
					$Edit = $data["Edit"];
					$Remove = $data["Remove"];
					$View = $data["View"];

					if($UserTypeID!="" && $ModuleName!="")
					{
						$response = array(
											'UserAccess' => $api_user->UpdateUserTypeAccess($UserTypeID,$ModuleName,$Save,$Edit,$Remove,$View)			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetAllModule') // GET ALL USER
				{
					$response = array( 
										'ModuleList' => $api_user->GetAllModule()
									 );
				}
				else if($_REQUEST["action"] == 'GetAllParentModule') // GET ALL Parent Module
				{
					$response = array( 
										'ParentModuleList' => $api_user->GetAllParentModule()
									 );
				}
				else if($_REQUEST["action"] == 'GetParentModuleAccessByID') // Get Parent Module Access By User ID 
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserID = $data["UserID"];

					if($UserID!="")
					{
						$response = $api_user->GetParentModuleAccessByID($UserID);			
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'UpdateParentModuleAccess') // UPDATE Parent Module Access By User ID 
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserID = $data["UserID"];

					$ParentModuleAccess = $data["ParentModuleAccess"];

					if($UserID!="" && $ParentModuleAccess != "")
					{
						$response = array(
											'AccessParent' => $api_user->UpdateParentModuleAccess($UserID, $ParentModuleAccess)			
										 );
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'GetAllChildModule') // GET ALL Child Module
				{
					$response = array( 
										'ChildModuleList' => $api_user->GetAllChildModule()
									 );
				}
				else if($_REQUEST["action"] == 'GetChildModuleAccessByID') // Get Child Module Access By User ID 
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserID = $data["UserID"];

					if($UserID!="")
					{
						$response = $api_user->GetChildModuleAccessByID($UserID);			
					}
					else // INVALID PARAMETER
					{
						Error(601);
					}
				}
				else if($_REQUEST["action"] == 'UpdateChildModuleAccess') // UPDATE Child Module Access By User ID 
				{
					$data = json_decode( file_get_contents( 'php://input' ), true );
					
					$UserID = $data["UserID"];

					$ChildModuleAccess = $data["ChildModuleAccess"];

					if($UserID!="" && $ChildModuleAccess != "")
					{
						$response = array(
											'AccessChild' => $api_user->UpdateChildModuleAccess($UserID, $ChildModuleAccess)			
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