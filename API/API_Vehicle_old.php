<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");


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
		
		$query = "SELECT * FROM vehicle ORDER BY v_id ASC";
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

	public function InsertVehicle($Code,$OwnerID,$Model,$Color,$RegNo,$Detail)
	{
		$crud = new Crud();
		$aVehicle = new Api_Vehicle();
		$validation = new Validation();	
			
		if($aVehicle->IsExistVehicle($RegNo))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO vehicle (	v_code, o_id, v_model,v_color,v_reg_no,v_detail, entry_date) VALUES ( '$Code', $OwnerID,'$Model', '$Color', '$RegNo' , '$Detail' , NOW())";
		
	
			$result = $crud->execute($query);

			if($result)
			{
				return "Vehicle created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}			
	}


    public function UpdateVehicle($Code, $Model, $Color, $RegNo, $Detail )
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

            $query = "UPDATE  vehicle SET v_model= '$Model',v_color = '$Color',v_reg_no = '$RegNo',v_detail=  '$Detail',entry_date= NOW() WHERE v_code = '$Code'";


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

}



?>