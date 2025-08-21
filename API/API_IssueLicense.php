<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");


class Api_IssueLicense
{

	// ------------------ USER BLOCK ----------------------------------------
	
	public function IsExistIssueLicense($LicenseNo)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM issue_license WHERE issue_licenseNo='$LicenseNo'";
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

	public function GetAllIssueLicense()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT * FROM issue_license ORDER BY issue_id ASC";
		$result = $crud->getData($query);
			
		return $result;
	}



	// public function InsertIssueLicense($Code, $Name, $FatherName, $MotherName, $DOB , $NID , 
	// 		 $Mobile ,$LicenseNo , $OwnerID, $VehicleID, $pDivision , $pSubDivision, $pWardNo, $pVill, $cDivision, $cSubDivision, $cWardNo, $cVill, $PhotoPath )
	// {
	// 	$crud = new Crud();
	// 	$aDriver = new Api_Driver();
	// 	$validation = new Validation();	
			
	// 	if($aDriver->IsExistDriver($NID))
	// 	{
	// 		return "Already Exist!!";
	// 	}
	// 	else
	// 	{
	// 		//insert data to database    
	// 		$query = "INSERT INTO driver (d_code,d_name,d_father_name,d_mother_name,d_dob,d_nid,d_mobile,d_license_no,o_id, v_id, p_division,p_sub_division,p_ward_no,p_vill,c_division,c_sub_division,c_ward_no,c_vill,d_photo_path,entry_date) VALUES ('$Code', '$Name', '$FatherName', '$MotherName', '$DOB' , '$NID' , 
	// 		 '$Mobile' ,'$LicenseNo' ,$OwnerID, $VehicleID, $pDivision , $pSubDivision, $pWardNo, $pVill, $cDivision, $cSubDivision, $cWardNo, $cVill, '$PhotoPath', NOW())";
			
			
	// 		$result = $crud->execute($query);

	// 		if($result)
	// 		{
	// 			return "Driver created successfully!!";
	// 		}
	// 		else
	// 		{
	// 			return "Operation Failed!!";
	// 		}
	// 	}			
	// }

}



?>