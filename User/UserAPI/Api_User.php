<?php

include_once("../../Config/Crud.php");
include_once("../../Config/Validation.php");


class Api_User
{


	// ------------------ USER BLOCK ----------------------------------------
	public function IsExistUser($UserID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM user WHERE user_id='$UserID'";
		$result = $crud->getData($query);
		
		if(empty($result))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function GetAllUser()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT user.id ,user.user_name, user.user_id, user.user_password,user.user_type_id,user_type.user_type_id,user_type.user_type_name FROM user INNER JOIN user_type on user.user_type_id = user_type.user_type_id";
		$result = $crud->getData($query);
			
		return $result;
	}
	
	public function GetUserByUserIDAndPass($UserID,$UserPassword)
	{
		$crud = new Crud();
		$validation = new Validation();
		$aUser = new Api_User();

		$UserID = $crud->escape_string($UserID);
		$result = "";
		
		if($aUser->IsExistUser($UserID))
		{
		    $query = "SELECT * FROM user WHERE user_id='$UserID' and user_password='$UserPassword' AND user_type_id!=2";
			
			$result = $crud->getData($query);
			
			if(empty($result))
			{
				return "Not Matched";
			}
			else
			{
			    $query = "SELECT * FROM user WHERE user_id='$UserID' and user_password='$UserPassword' AND active=1 AND user_type_id!=2";
			
    			$result = $crud->getData($query);
    			
    			if(empty($result))
    			{
    				return "Deactivated";
    			}
			}

		}
		
			
		return $result;
	}

	public function GetUserByUserID($UserID)
	{
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT user.id ,user.user_name, user.user_id, user.user_password,user.user_type_id,user_type.user_type_id,user_type.user_type_name,user.active FROM user INNER JOIN user_type on user.user_type_id = user_type.user_type_id where user.user_id='$UserID' ";
        $result = $crud->getData($query);

        return $result;
	}
	
	public function InsertUser($UserName, $UserID, $UserPassword, $UserTypeID,$Active)
	{
		$crud = new Crud();
		$aUser = new Api_User();
		$validation = new Validation();	
			
		$UserID = $crud->escape_string($UserID); 
		
		
		if($aUser->IsExistUser($UserID))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO user (user_name,user_id,user_password,user_type_id,active) VALUES ('$UserName', '$UserID', '$UserPassword', $UserTypeID,$Active)";
			$result = $crud->execute($query);

			if($result)
			{
				return "User created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}			
	}
	
	public function UpdateUser($UserName, $UserID, $UserPassword, $UserTypeID, $Active)
	{
		$crud = new Crud();
		$aUser = new Api_User();
		$validation = new Validation();	
			
		$UserName = $crud->escape_string($UserName); 
		$UserID = $crud->escape_string($UserID); 
		$UserPassword = $crud->escape_string($UserPassword); 
		$UserTypeID = $crud->escape_string($UserTypeID); 
	
			//update data to database  
		$query = "UPDATE user SET user_name = '$UserName', user_password = '$UserPassword' , user_type_id = $UserTypeID, active = $Active WHERE user_id='$UserID'";

		$result = $crud->execute($query);

				//$result = "";
		if($result)
		{
			return "User updated successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}
	}

    public function DeleteUser($UserID)
    {
        $crud = new Crud();

        $query = "DELETE FROM user WHERE  user_id = '$UserID'";

        $result = $crud->delete($query);

        if($result)
        {
            return "Record deleted successfully!!";
        }
        else
        {
            return "Oparetion Failed!!";
        }

    }
	
	// ------------------ USER TYPE BLOCK ----------------------------------------	
	
	public function IsExistUserType($UserTypeName)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM user_type WHERE user_type_name='$UserTypeName'";
		$result = $crud->getData($query);
		
		if(empty($result))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function GetAllUserType()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT * FROM `user_type` ORDER BY user_type_id ASC";
		$result = $crud->getData($query);
			
		return $result;
	}
	
	public function GetUserTypeNameByID($UserTypeID)
	{
		$crud = new Crud();
		$validation = new Validation();
		
		$query = "SELECT user_type_name FROM user_type WHERE user_type_id=".$UserTypeID;
		$result = $crud->getData($query);
		
		return $result;
	}
	
	public function InsertUserType($UserTypeName)
	{
		$crud = new Crud();
		$aUser = new Api_User();
		$validation = new Validation();	
			
		$UserTypeName = $crud->escape_string($UserTypeName); 
		
		
		if($aUser->IsExistUserType($UserTypeName))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO user_type (user_type_name) VALUES ('$UserTypeName')";
			$result = $crud->execute($query);

			if($result)
			{
				return "User type created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}			
	}
	
	public function UpdateUserType($UserTypeID, $UserTypeName)
	{
		$crud = new Crud();
		$validation = new Validation();	
			
		$UserTypeName = $crud->escape_string($UserTypeName); 
		

		//update data to database  
		$query = "UPDATE user_type SET user_type_name = '$UserTypeName' WHERE user_type_id=".$UserTypeID;

		$result = $crud->execute($query);

				//$result = "";
		if($result)
		{
			return "User Type updated successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}	
	}

	public function DeleteUserType($UserTypeID)
	{
        $crud = new Crud();

        $query = "DELETE FROM user_type WHERE  user_type_id = '$UserTypeID'";

        $result = $crud->delete($query);

        if($result)
        {
            return "Record deleted successfully!!";
        }
        else
        {
            return "Oparetion Failed!!";
        }
	}

	// ------------------ USER ACCESS BLOCK ----------------------------------------

	public function IsExistUserTypeAccess($UserTypeID,$ModuleName)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM user_access WHERE user_type_id=$UserTypeID and module_name='$ModuleName'";
		$result = $crud->getData($query);
		
		if(empty($result))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function GetAllUserTypeAccess()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT user_type.user_type_name,user_access.module_name, user_access.save, user_access.edit, user_access.remove, user_access.view ".
				 "FROM user_type INNER JOIN user_access ON user_type.user_type_id = user_access.user_type_id ORDER BY user_type.user_type_id ASC";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetUserAccessByUserID($UserID)
	{

		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT module.module_name, user_access.save , user_access.edit, user_access.remove , user_access.view FROM user_access ".
				 "RIGHT JOIN module ON user_access.module_name = module.module_name WHERE '".$UserID."' IN (SELECT user_id FROM user)";
		
		$result = $crud->getData($query);
			
		return $result;
	}
	
	public function GetUserTypeAccessByUserTypeID($UserTypeID)
	{
		$crud = new Crud();
		$validation = new Validation();
		
		$UserTypeID = $crud->escape_string($UserTypeID);
		
		$query = "SELECT user_access.module_name, user_access.save, user_access.edit, user_access.remove, user_access.view ".
				 "FROM user_type INNER JOIN user_access ON user_type.user_type_id = user_access.user_type_id WHERE user_type.user_type_id = ".$UserTypeID;
		$result = $crud->getData($query);
			
		return $result;
	}
	
	public function InsertUserTypeAccess($UserTypeID,$ModuleName,$Save,$Edit,$Remove,$View)
	{
		$crud = new Crud();
		$aUser = new Api_User();
		$validation = new Validation();	
			
		//$UserTypeName = $crud->escape_string($UserTypeName); 
		
		
		if($aUser->IsExistUserTypeAccess($UserTypeID,$ModuleName))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO user_access (user_type_id, module_name, save, edit, remove, view) VALUES ($UserTypeID,'$ModuleName',$Save,$Edit,$Remove,$View)";
			$result = $crud->execute($query);

			if($result)
			{
				return "User access created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}			
	}
	
	public function UpdateUserTypeAccess($UserTypeID,$ModuleName,$Save,$Edit,$Remove,$View)
	{
		$crud = new Crud();
		$aUser = new Api_User();
		$validation = new Validation();	
		
		//update data to database  
		$query = "UPDATE user_access SET save = $Save , edit = $Edit , remove = $Remove , view = $View WHERE user_type_id=$UserTypeID and module_name = '$ModuleName'";

		$result = $crud->execute($query);

		//$result = "";
		if($result)
		{
			return "User access updated successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}
	}




	//------------------------------------ Application Module -----------------------------

	public function IsExistParentUserAccess($UserID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM user_access_parent WHERE user_id = '$UserID'";
		$result = $crud->getData($query);
		
		if(empty($result))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function GetAllModule()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT * FROM module";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetAllParentModule()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT parent_module FROM parent_module ORDER BY parent_module_id";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetParentModuleAccessByID($UserID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT access_parent AS ParentModuleAccess FROM user_access_parent WHERE user_id='$UserID'";
		
		$result = $crud->getData($query);
		
		return $result;
	}

	public function UpdateParentModuleAccess($UserID, $ParentModuleAccess)
	{
		$crud = new Crud();
		$aUser = new Api_User();
		

		$ParentModuleAccess = json_encode($ParentModuleAccess,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

		$query = "";

		if($aUser->IsExistParentUserAccess($UserID))
		{
			$query = "UPDATE user_access_parent SET  access_parent = '$ParentModuleAccess' WHERE user_id = '$UserID' ";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO user_access_parent (user_id , access_parent) VALUES ( '$UserID','$ParentModuleAccess')";
		
		}	

		$result = $crud->execute($query);

		if($result)
		{
			return "Updated successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}		
	}

	public function IsExistChildUserAccess($UserID)
	{
		$crud = new Crud();		
		
		$query = "SELECT * FROM user_access_child WHERE user_id = '$UserID'";
		$result = $crud->getData($query);
		
		if(empty($result))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function GetAllChildModule()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT child_module FROM module ORDER BY child_module_id";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetChildModuleAccessByID($UserID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT access_child AS ChildModuleAccess FROM user_access_child WHERE user_id='$UserID'";
		
		$result = $crud->getData($query);
		
		return $result;
	}

	public function UpdateChildModuleAccess($UserID, $ChildModuleAccess)
	{
		$crud = new Crud();
		$aUser = new Api_User();
		

		$ChildModuleAccess = json_encode($ChildModuleAccess,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

		$query = "";

		if($aUser->IsExistChildUserAccess($UserID))
		{
			$query = "UPDATE user_access_child SET  access_child = '$ChildModuleAccess' WHERE user_id = '$UserID' ";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO user_access_child (user_id , access_child) VALUES ( '$UserID','$ChildModuleAccess')";
		
		}	

		$result = $crud->execute($query);

		if($result)
		{
			return "Updated successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}		
	}
	


}



?>