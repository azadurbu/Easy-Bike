<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");
include_once("API_Common.php");

class Api_Vehicle
{

	// ------------------ USER BLOCK ----------------------------------------
	
	public function IsExistVehicle($RegNo)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM vehicle WHERE v_reg_no='$RegNo'";
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


	public function RegMatched($Code,$RegNo)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM vehicle WHERE v_code = '$Code' AND v_reg_no ='$RegNo'";
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

	public function GetAllVehicle()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = 	"SELECT vehicle.v_id, vehicle.v_code, vehicle.o_id, vehicle.v_model, vehicle.v_color, vehicle.v_reg_no, ".
				 	"vehicle.v_reg_date, vehicle.v_detail, vehicle.entry_date, owner.o_name, owner.o_nid,owner.o_mobile, ".
				 	"owner.o_holding_no, owner.c_division, owner.c_sub_division, owner.c_ward_no, owner.c_vill, owner.o_photo_path, ".
				 	// "settings_division.division, ".
				 	"settings_sub_division.sub_division, ".
				 	"settings_ward_no.ward_no, ".
				 	"settings_area.area ".
					"FROM vehicle ".
					"INNER JOIN owner ON vehicle.o_id = owner.o_id ".
					// "INNER JOIN settings_division ON owner.c_division = settings_division.division_id ".
					"INNER JOIN settings_sub_division ON owner.c_sub_division = settings_sub_division.sub_division_id ".
					"INNER JOIN settings_ward_no ON owner.c_ward_no = settings_ward_no.ward_no_id ".
					"INNER JOIN settings_area ON owner.c_vill = settings_area.area_id ".
					"ORDER BY vehicle.v_id ASC";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetVehicleByCode($Code)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT * FROM vehicle WHERE v_code = '$Code'";
		$result = $crud->getData($query);
			
		return $result;
	}
	
	public function GetVehicleCardIsset($Code)
	{	
		$crud = new Crud();
		
		$query = "SELECT * FROM vehicle_card_issue WHERE v_code = '$Code' order by issue_date desc limit 1";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetVehicleOcblByVcl($Code)
	{	
		$crud = new Crud();
		
		$query = "SELECT 
		owner.*,chassis_no, issue_date, v_reg_no
		FROM vehicle_card_issue left JOIN vehicle ON vehicle.v_code = vehicle_card_issue.v_code LEFT JOIN owner ON owner.o_id = vehicle.o_id
		WHERE vehicle_card_issue.v_code = '$Code'
						ORDER by issue_date DESC
						LIMIT 1";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetVehicleByOwnerID($OwnerID)
	{
		$crud = new Crud();
		$validation = new Validation();	

        $query = "SELECT * FROM vehicle WHERE o_id = '$OwnerID'";
		$result = $crud->getData($query);

		return $result;
	}

	public function GetVehicleByVehicleID($VehicleID)
	{
		$crud = new Crud();
		$validation = new Validation();

        $query = "SELECT * FROM vehicle WHERE v_id = '$VehicleID'";
		$result = $crud->getData($query);

		return $result;
	}

	public function InsertVehicle($v_code,$OwnerID,$Model,$Color,$RegNo,$RegDate,$Detail,$ChassisNo)
	{
		$crud = new Crud();
		$aVehicle = new Api_Vehicle();
		$validation = new Validation();	
		$apiCommon = new Api_Common();

		if($aVehicle->IsExistVehicle($RegNo))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO vehicle (	v_code, o_id, v_model,v_color,v_reg_no,v_reg_date,v_detail,chassis_no, entry_date)  VALUES ( '$v_code', $OwnerID,'$Model', '$Color', '$RegNo' , '$RegDate' , '$Detail' , '$ChassisNo' , NOW())";
		
	
			$result = $crud->execute($query);

			if($result)
			{
				if($apiCommon->UpdateDocNoByDocType("VCL"))
				{
					$query = "SELECT DOC_NO FROM sys_code WHERE DOC_TYPE = 'OCBL'";
					$Code = $crud->getData($query);
					$Code =$this->GenerateDocCode('OCBL', $Code[0]['DOC_NO']);
					
					//vehicle reg fee
					$query =    "SELECT * FROM reg_fee";
					$OwnerRegFee = $crud->getData($query);
					$OwnerRegFee = $OwnerRegFee[0]['reg_fee'];

					$EntryDate = date('Y-m-d');
					
					$query = "INSERT INTO owner_card_bill (o_id,ocbl_code,o_card_fee,entry_date,v_code) 
					VALUES ('$OwnerID','$Code', '$OwnerRegFee', '$EntryDate','$v_code')";

					if($crud->execute($query)){
						if($apiCommon->UpdateDocNoByDocType("OCBL")){
							return "Vehicle created successfully!!";
						}
					}
				}
			}
			else
			{
				return "Operation Failed!!";
			}
		}			
	}

	function GenerateDocCode($DocType,$DocNo)
	{
		$Zeros = "00000";
		$Zeros = substr($Zeros, 0, -1*strlen($DocNo));
		$Code = $DocType.$Zeros.$DocNo;
		return $Code;
	}

    public function UpdateVehicle($Code, $Model, $Color, $RegNo, $RegDate, $Detail, $ChassisNo,$OwnerID)
    {
        $crud = new Crud();
        $aVehicle = new Api_Vehicle();

        $DoUpdate = true;

		if($aVehicle->RegMatched($Code,$RegNo))
		{

			$DoUpdate = true;
		}
		else if($aVehicle->IsExistVehicle($RegNo))
		{
			$DoUpdate = false;
			return "Already Exist!!";
		}
	
        if($DoUpdate)
        {

	        //update data to database

            $query = "UPDATE  vehicle SET v_model= '$Model',v_color = '$Color',v_reg_no = '$RegNo',v_reg_date = '$RegDate',v_detail=  '$Detail',entry_date= NOW(),chassis_no = '$ChassisNo',o_id = '$OwnerID' WHERE v_code = '$Code' ";


			$result = $crud->execute($query);

            if($result)
            {
                return "Vehicle updated successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
        else
        {
            return "Operation Failed!!";
        }
    }


    public function DeleteVehicle($Code)
    {
        $crud = new Crud();

        $query = "DELETE FROM vehicle WHERE v_code='$Code'";

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
	
	public function InsertCardIssueDate($v_code,$issueDate)
	{
		$crud = new Crud();

		//insert data to database    
		$query = "INSERT INTO vehicle_card_issue (v_code, issue_date)  VALUES ( '$v_code', '$issueDate')";
	
		$result = $crud->execute($query);

		if($result)
		{
			return "Done.";
		}
		else
		{
			return "Operation Failed!!";
		}
	}

}



?>