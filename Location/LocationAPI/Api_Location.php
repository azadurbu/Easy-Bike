<?php

include_once("../../Config/Crud.php");
include_once("../../Config/Validation.php");


class Api_Location
{

	// ------------------ DIVISION BLOCK START ----------------------------------------

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

	// ------------------ SUB DIVISION BLOCK  ----------------------------------------

    public function IsExistSubDivision($DivisionID ,$SubDivision)
    {
        $crud = new Crud();
        $validation = new Validation();


        $query = "SELECT * FROM settings_sub_division WHERE division_id = '$DivisionID' AND sub_division='$SubDivision'";
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

		$query =	"SELECT settings_sub_division.division_id, settings_division.division , settings_sub_division.sub_division ".
				  	"FROM settings_sub_division INNER JOIN settings_division ON settings_sub_division.division_id = settings_division.division_id ".
				  	"WHERE settings_sub_division.sub_division_id =".$SubDivID;
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

    public function InsertSubDivision($DivisionID,$SubDivision)
    {
        $crud = new Crud();
        $aLocation = new Api_Location();
        $validation = new Validation();

        if($aLocation->IsExistSubDivision($DivisionID, $SubDivision))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO settings_sub_division (division_id, sub_division) VALUES ('$DivisionID' , '$SubDivision')";


            $result = $crud->execute($query);

            if($result)
            {
                return "SubDivision created successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function UpdateSubDivision($DivisionID,$SubDivisionID, $SubDivision )
    {

        $crud = new Crud();
        $aLocation = new Api_Location();


        if($aLocation->IsExistSubDivision($DivisionID,$SubDivision))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "UPDATE settings_sub_division SET  division_id = '$DivisionID' , sub_division = '$SubDivision' WHERE sub_division_id = '$SubDivisionID'";


            $result = $crud->execute($query);

            if($result)
            {
                return "SubDivision updated successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function DeleteSubDivision($SubDivisionID)
    {
        $crud = new Crud();

        $query = "DELETE FROM settings_sub_division WHERE  sub_division_id = '$SubDivisionID'";

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

    // ------------------ WARD NO BLOCK  ----------------------------------------

    public function IsExistWardNo($DivisionID , $SubDivisionID, $WardNo)
    {
        $crud = new Crud();
        $validation = new Validation();


        $query = "SELECT * FROM settings_ward_no WHERE division_id = '$DivisionID' AND sub_division_id='$SubDivisionID' AND ward_no='$WardNo'";
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
		
		$query = "SELECT settings_ward_no.ward_no, settings_division.division_id, settings_division.division ,settings_sub_division.sub_division_id, ".
				 "settings_sub_division.sub_division FROM settings_ward_no ".
				 "INNER JOIN settings_division ON settings_ward_no.division_id = settings_division.division_id ".
				 "INNER JOIN settings_sub_division ON settings_ward_no.sub_division_id = settings_sub_division.sub_division_id ".
				 "WHERE settings_ward_no.ward_no_id =".$WardID;

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

    public function InsertWardNo($DivisionID,$SubDivisionID,$WardNo)
    {
        $crud = new Crud();
        $aLocation = new Api_Location();


        if($aLocation->IsExistWardNo($DivisionID, $SubDivisionID,$WardNo))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO settings_ward_no (division_id, sub_division_id,ward_no) VALUES ('$DivisionID' , '$SubDivisionID', '$WardNo')";


            $result = $crud->execute($query);

            if($result)
            {
                return "WardNo created successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function UpdateWardNo($DivisionID,$SubDivisionID, $WardNoID,$WardNo )
    {

        $crud = new Crud();
        $aLocation = new Api_Location();


        if($aLocation->IsExistWardNo($DivisionID,$SubDivisionID,$WardNo))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "UPDATE settings_ward_no SET  division_id = '$DivisionID' , sub_division_id = '$SubDivisionID', ward_no ='$WardNo' WHERE ward_no_id = '$WardNoID'";


            $result = $crud->execute($query);

            if($result)
            {
                return "WardNo updated successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function DeleteWardNo($WardNoID)
    {
        $crud = new Crud();

        $query = "DELETE FROM settings_ward_no WHERE  ward_no_id = '$WardNoID'";

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
	
 	// ------------------ AREA BLOCK  ----------------------------------------

    public function IsExistArea($DivisionID , $SubDivisionID, $WardNoID, $Area)
    {
        $crud = new Crud();
        $validation = new Validation();


        $query = "SELECT * FROM settings_area WHERE division_id = '$DivisionID' AND sub_division_id='$SubDivisionID' AND ward_no_id='$WardNoID' AND area='$Area'";
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
		
		$query = "SELECT settings_area.area, settings_division.division_id,settings_division.division,settings_sub_division.sub_division_id, ".
				 "settings_sub_division.sub_division,settings_ward_no.ward_no_id,settings_ward_no.ward_no ".
				 "FROM settings_area ".
				 "INNER JOIN settings_division ON settings_area.division_id = settings_division.division_id ".
				 "INNER JOIN settings_sub_division ON settings_area.sub_division_id = settings_sub_division.sub_division_id ".
				 "INNER JOIN settings_ward_no ON settings_area.ward_no_id = settings_ward_no.ward_no_id ".
				 "WHERE settings_area.area_id=".$AreaID;

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

    public function InsertArea($DivisionID,$SubDivisionID,$WardNoID,$Area)
    {
        $crud = new Crud();
        $aLocation = new Api_Location();


        if($aLocation->IsExistArea($DivisionID, $SubDivisionID,$WardNoID,$Area))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO settings_area (division_id, sub_division_id,ward_no_id,area) VALUES ('$DivisionID' , '$SubDivisionID', '$WardNoID', '$Area')";


            $result = $crud->execute($query);

            if($result)
            {
                return "Area created successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function UpdateArea($DivisionID,$SubDivisionID, $WardNoID,$AreaID,$Area )
    {

        $crud = new Crud();
        $aLocation = new Api_Location();


        if($aLocation->IsExistArea($DivisionID,$SubDivisionID,$WardNoID,$Area))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "UPDATE settings_area SET  division_id = '$DivisionID' , sub_division_id = '$SubDivisionID', ward_no_id ='$WardNoID' , area='$Area' WHERE area_id = '$AreaID'";


            $result = $crud->execute($query);

            if($result)
            {
                return "Area updated successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function DeleteArea($AreaID)
    {
        $crud = new Crud();

        $query = "DELETE FROM settings_area WHERE  area_id = '$AreaID'";

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

    public function GetAreaByWardNoID($WardNoID) // GET AREA BY WardNoID
    {
        $crud = new Crud();
        $result = "";

        $query = "SELECT area_id, area FROM settings_area WHERE ward_no_id =".$WardNoID;
        $result = $crud->getData($query);

        return $result;
    }
}



?>