<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");


class Api_Common
{

	// ------------------ USER BLOCK ----------------------------------------
	// public function IsExistUser($UserID)
	// {
	// 	$crud = new Crud();
	// 	$validation = new Validation();	
		
		
	// 	$query = "SELECT * FROM user WHERE user_id='$UserID'";
	// 	$result = $crud->getData($query);
		
	// 	if(empty($result))
	// 	{
	// 		return false;
	// 	}
	// 	else
	// 	{
	// 		return true;
	// 	}
	// }

	public function GetTotalOwner()
	{
		$crud = new Crud();	
		$query = 	"SELECT Count(*) FROM owner";		 	
		$result = $crud->getData($query);	

		$TotalOwner = $result[0]["Count(*)"];

		return $TotalOwner;
	}

	public function GetTotalVehicle()
	{
		$crud = new Crud();	
		$query = 	"SELECT Count(*) FROM vehicle";		 	
		$result = $crud->getData($query);	

		$TotalVehicle = $result[0]["Count(*)"];
		return $TotalVehicle;
	}

	public function GetTotalDriver()
	{
		$crud = new Crud();	
		$query = 	"SELECT Count(*) FROM driver";		 	
		$result = $crud->getData($query);

		$TotalDriver = $result[0]["Count(*)"];

		return $TotalDriver;
	}

	public function GetTotalDemandByFiscalYear()
	{
		$crud = new Crud();	

		$aCommon = new Api_Common();
		$result = $aCommon->GetFiscalYear();
		$FiscalYear = $result[0]["start_year"]."-".$result[0]["end_year"];

		$query = "SELECT SUM(total) FROM bill WHERE status = 1 AND fiscal_year = '$FiscalYear'";	

		$result = $crud->getData($query);

		$TotalDemand = $result[0]["SUM(total)"];

		return $TotalDemand;
	}

	public function GetTotalDueByFiscalYear()
	{
		$crud = new Crud();	
		$aCommon = new Api_Common();
		$result = $aCommon->GetFiscalYear();
		$FiscalYear = $result[0]["start_year"]."-".$result[0]["end_year"];

		$query = 	"SELECT SUM(total) FROM bill WHERE status = 0 AND fiscal_year = '$FiscalYear'";		 	
		$result = $crud->getData($query);

		$TotalDue = $result[0]["SUM(total)"];
		return $TotalDue;
	}

    public function GetCardInfoByVehicleCode($Code)
	{
		$crud = new Crud();	
		// $query = "SELECT vehicle.v_id, vehicle.v_code, vehicle.o_id, vehicle.v_model, vehicle.v_color, vehicle.v_reg_no, vehicle.v_reg_date, vehicle.v_detail, vehicle.entry_date, owner.o_name, owner.o_nid,owner.o_mobile, owner.o_holding_no, owner.c_division, owner.c_sub_division, owner.c_ward_no,owner.PermanentAddress, owner.c_vill, owner.o_photo_path FROM vehicle INNER JOIN owner ON vehicle.o_id = owner.o_id WHERE vehicle.v_code = '$Code' ";
		$query = "SELECT vehicle.v_id, vehicle.v_code, vehicle.o_id, vehicle.v_model, vehicle.v_color, vehicle.v_reg_no, vehicle.v_reg_date, vehicle.v_detail, vehicle.entry_date, vehicle.chassis_no, owner.o_name, owner.o_nid,owner.o_mobile, owner.o_holding_no,owner.c_division, owner.c_sub_division, owner.c_ward_no,owner.PermanentAddress,  owner.c_vill, owner.o_photo_path,owner.o_father_name, ocb.payment_date, owner.o_code, issue_date FROM vehicle  INNER JOIN owner ON vehicle.o_id = owner.o_id  LEFT JOIN owner_card_bill ocb on ocb.v_code = vehicle.v_code left join vehicle_card_issue on vehicle_card_issue.v_code = vehicle.v_code WHERE vehicle.v_code = '$Code' ORDER BY ocb.payment_date DESC limit 1";

		$result = $crud->getData($query);	
		return $result;
	}

	public function GetFiscalYear()
	{
		$crud = new Crud();	
		$query = 	"SELECT * FROM fiscal_year";		 	
		$result = $crud->getData($query);	
		return $result;
	}

	public function UpdateFiscalYear($StartYear,$EndYear)
	{
		$crud = new Crud();
		$aCommon = new Api_Common();

		$result = $aCommon->GetFiscalYear();
		if($result)
		{
			$query = "UPDATE fiscal_year SET start_year = '$StartYear' , end_year = '$EndYear' ";
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
		else
		{
			$query = "INSERT fiscal_year (start_year, end_year) VALUES ('$StartYear','$EndYear') ";
			$result = $crud->execute($query);

			if($result)
			{
				return "Created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
			
		}		
	}

	public function GetRegistrationFee()
	{
		$crud = new Crud();	
		$query = 	"SELECT * FROM reg_fee";		 	
		$result = $crud->getData($query);	
		return $result;
	}

	public function UpdateRegistrationFee($RegFee)
	{
		$crud = new Crud();
		$aCommon = new Api_Common();

		$result = $aCommon->GetRegistrationFee();
		if($result)
		{
			$query = "UPDATE reg_fee SET reg_fee = '$RegFee' ";
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
		else
		{
			$query = "INSERT reg_fee (reg_fee) VALUES ('$RegFee') ";
			$result = $crud->execute($query);

			if($result)
			{
				return "Created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
			
		}		
	}

	public function GetSurCharge()
	{
		$crud = new Crud();	
		$query = "SELECT * FROM sur_charge";		 	
		$result = $crud->getData($query);	
		return $result;
	}

	public function UpdateSurCharge($SurCharge)
	{
		$crud = new Crud();
		$aCommon = new Api_Common();

		$result = $aCommon->GetSurCharge();
		if($result)
		{
			$query = "UPDATE sur_charge SET sur_charge = '$SurCharge' ";
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
		else
		{
			$query = "INSERT sur_charge (sur_charge) VALUES ('$SurCharge') ";
			$result = $crud->execute($query);

			if($result)
			{
				return "Created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
			
		}		
	}

	public function GetDriverRegFee()
	{
		$crud = new Crud();	
		$query = "SELECT * FROM driver_reg_fee";		 	
		$result = $crud->getData($query);	
		return $result;
	}

	public function UpdateDriverRegFee($DriverRegFee)
	{
		$crud = new Crud();
		$aCommon = new Api_Common();

		$result = $aCommon->GetDriverRegFee();
		if($result)
		{
			$query = "UPDATE driver_reg_fee SET driver_reg_fee = '$DriverRegFee' ";
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
		else
		{
			$query = "INSERT driver_reg_fee (driver_reg_fee) VALUES ('$DriverRegFee') ";
			$result = $crud->execute($query);

			if($result)
			{
				return "Created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
			
		}		
	}


	public function GetRegistrationInfo($Code)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = 	"SELECT owner.o_name, owner.o_nid, owner.o_holding_no, owner.o_mobile, owner.o_photo_path, ". 
				 	"vehicle.v_model, vehicle.v_color, vehicle.v_detail, vehicle.v_reg_no FROM vehicle ".
				 	"INNER JOIN owner ON vehicle.o_id = owner.o_id ".
				 	"WHERE vehicle.v_code = '$Code'";
				 	
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetDriverInfo($Code)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = 	"SELECT driver.d_id, driver.d_name,driver.d_father_name,driver.d_nid,driver.d_license_no,driver.d_mobile,driver.d_blood_group,driver.d_photo_path, ". 
				 	"settings_division.division,settings_sub_division.sub_division,settings_ward_no.ward_no,settings_area.area FROM driver ".
				 	"INNER JOIN settings_division on driver.c_division = settings_division.division_id ".
				 	"INNER JOIN settings_sub_division on driver.c_sub_division = settings_sub_division.sub_division_id ".
				 	"INNER JOIN settings_ward_no on driver.c_ward_no = settings_ward_no.ward_no_id ".
				 	"INNER JOIN settings_area on driver.c_vill = settings_area.area_id ".
				 	"WHERE driver.d_code = '$Code'";
				 	
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetTokenByCodeAndDate($Code, $Date)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT token FROM reg_check WHERE v_code = '$Code' AND date like '%$Date%'";
		$result = $crud->getData($query);
		
		if($result)
		{
			return $result[0]["token"];
		}
		else
		{
			return "";
		}
	}

	public function IsExistToken($Token)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM reg_check WHERE token='$Token'";
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

	public function InsertToken($Code, $Token)
	{
		$crud = new Crud();
		$validation = new Validation();	
		$aCommon = new Api_Common();


		if($aCommon->IsExistToken($Token))
		{
			return "Already Exist!!";
		}
		else
		{
			$query = "INSERT INTO reg_check (v_code,token,date) VALUES ('$Code','$Token', NOW() )";
			$result = $crud->execute($query);

			if($result)
			{
				return "Token created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}		
	}

	public function PinExist($Pin)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM user WHERE user_password='$Pin' AND active=1 AND user_type_id=2";
		$result = $crud->getData($query);
		
		if(empty($result))
		{
			return "Invalid Pin!! Try again!!";
		}
		else
		{
			return "Pin Matched!!";
		}
	}

	public function InsertPin($Pin)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "INSERT INTO checker (pin) VALUES ('$Pin')";
		$result = $crud->execute($query);
				
		if($result)
		{
			return "Pin created successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}
	}

	public function GetDocNoByDocType($DocType)
	{
		$crud = new Crud();
		$validation = new Validation();	
		$DocType = trim($DocType);
		$query = "SELECT DOC_NO FROM sys_code WHERE DOC_TYPE = '$DocType'";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function UpdateDocNoByDocType($DocType)
	{
		$crud = new Crud();
		$validation = new Validation();
		
		$DocType = trim($DocType);
		
		$query = "UPDATE sys_code SET DOC_NO = DOC_NO+1 WHERE DOC_TYPE = '$DocType'";
		if($crud->execute($query)) return 1; else return 0;
	}
	
	public function GetMunicipality()
    {
        $crud = new Crud();
        $query = "SELECT * FROM municipality";
        $result = $crud->getData($query);
        return $result;
    }
    
	public function UpdateMunicipality($Municipality)
    {
        $crud = new Crud();
        $aCommon = new Api_Common();

        $result = $aCommon->GetMunicipality();
        if($result)
        {
            $query = "UPDATE municipality SET m_name = '$Municipality' ";
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
        else
        {
            $query = "INSERT sur_charge (sur_charge) VALUES ('$SurCharge') ";
            $result = $crud->execute($query);

            if($result)
            {
                return "Created successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }

        }
    }


}



?>