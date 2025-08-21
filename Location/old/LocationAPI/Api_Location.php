<?php

include_once("../../Config/Crud.php");
include_once("../../Config/Validation.php");


class Api_Location
{

	// ------------------ DIVISION BLOCK START ----------------------------------------

	public function GetAllDivision() // GET ALL DIVISION
	{
		$crud = new Crud();
		
		$query = "SELECT * FROM settings_division";
		$result = $crud->getData($query);
		return $result;
	}
	
	public function GetDivisionByDivID($DivisionID) // GET DIVISION BY DIVISION ID
	{
		$crud = new Crud();
		$result = "";

		$query = "SELECT division FROM settings_division WHERE division_id=".$DivisionID;
		$result = $crud->getData($query);
			
		return $result;
	}

	public function IsExistDivision($Division)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM settings_division WHERE division='$Division'";
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

	public function InsertDivision($Division)
	{
		$crud = new Crud();
		$aLocation = new Api_Location();
		$validation = new Validation();	
			
		if($aLocation->IsExistDivision($Division))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO settings_division (division) VALUES ('$Division')";
			
			
			$result = $crud->execute($query);

			if($result)
			{
				return "Division created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}			
	}

    public function UpdateDivision($DivisionID, $Division )
    {

        $crud = new Crud();
        $aLocation = new Api_Location();


		if($aLocation->IsExistDivision($Division))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "UPDATE settings_division SET  division = '$Division' WHERE division_id = '$DivisionID'";
			
			
			$result = $crud->execute($query);

			if($result)
			{
				return "Division updated successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}
    }

    public function DeleteDivision($DivisionID)
    {
        $crud = new Crud();

        $query = "DELETE FROM settings_division WHERE  division_id = '$DivisionID'";

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


	// ------------------ DIVISION BLOCK END ----------------------------------------

// 	// ------------------ SUB DIVISION BLOCK  ----------------------------------------

	public function GetAllSubDivision() // GET ALL SUB-DIVISION
	{
		$crud = new Crud();
		
		$query = "SELECT * FROM settings_sub_division";
		$result = $crud->getData($query);
			
		return $result;
	}
	
	public function GetSubDivisionBySubDivID($SubDivID) // GET SUB-DIVISION BY SUB-DIVISION ID 
	{
		$crud = new Crud();
		$result = "";

		$query = "SELECT sub_division FROM settings_sub_division WHERE sub_division_id=".$SubDivID;
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetSubDivisionByDivisionID($DivisionID) // GET SUB-DIVISION BY DIVISION ID 
	{
		$crud = new Crud();
		$result = "";

		$query = "SELECT sub_division_id, sub_division FROM settings_sub_division WHERE division_id=".$DivisionID;
		$result = $crud->getData($query);
			
		return $result;
	}

// // ------------------ WARD NO BLOCK  ----------------------------------------

	public function GetAllWardNo() // GET ALL WARD NO
	{
		$crud = new Crud();
		
		$query = "SELECT * FROM settings_ward_no";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetWardByWardID($WardID) // GET ALL WARD NO BY WARD ID
	{
		$crud = new Crud();
		
		$query = "SELECT ward_no FROM settings_ward_no WHERE ward_no_id=".$WardID;
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetWardNoByDivAndSubDivID($DivID, $SubDivID) // GET ALL WARD NO BY DIV ID AND SUB DIV ID 
	{
		$crud = new Crud();
		
		$query = "SELECT ward_no_id, ward_no FROM settings_ward_no WHERE division_id=".$DivID." and sub_division_id=".$SubDivID;
		$result = $crud->getData($query);
			
		return $result;
	}
	
// 	// ------------------ AREA BLOCK  ----------------------------------------

	public function GetAllArea() // GET ALL AREA 
	{
		$crud = new Crud();
		
		$query = "SELECT * FROM settings_area";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetAreaByAreaID($AreaID) // GET ALL AREA BY AREA ID 
	{
		$crud = new Crud();
		
		$query = "SELECT area FROM settings_area WHERE area_id=".$AreaID;
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetAreaByDivAndSubDivAndWard($DivID, $SubDivID, $WardID) // GET ALL AREA BY DIV ID AND SUB DIV ID AND WARD ID
	{
		$crud = new Crud();
		
		$query = "SELECT area_id, area FROM settings_area WHERE division_id=".$DivID." and sub_division_id=".$SubDivID." and ward_no_id=".$WardID;
		$result = $crud->getData($query);
			
		return $result;
	}

	
}



?>