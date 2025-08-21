<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");
include_once("API_Common.php");


class Api_Owner
{

	// ------------------ USER BLOCK ----------------------------------------
	
	public function IsExistOwner($NID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM owner WHERE o_nid='$NID'";
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

	public function NIDMatched($Code,$NID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM owner WHERE o_code = '$Code' AND o_nid='$NID'";
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

	public function GetAllOwner()
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT * FROM owner ORDER BY o_id ASC";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetOwnerByCode($Code)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT owner.*, DATE(owner.entry_date) as my_entry_date, owner_card_bill.status 
					FROM owner 
					left join owner_card_bill
					on owner_card_bill.o_id = owner.o_id
					WHERE o_code = '$Code'
					ORDER BY owner_card_bill.entry_date DESC
					limit 1";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetOwnerByOwnerID($OwnerID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT o_code, o_name, o_photo_path FROM owner WHERE o_id = '$OwnerID'";
		$result = $crud->getData($query);
			
		$result = $result[0]["o_code"] . "||--||" . $result[0]["o_name"] . "||--||" . $result[0]["o_photo_path"] ;
			
		return $result;
	}

	public function GetOwnerInfoByOwnerID($OwnerID)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		$query = "SELECT * FROM owner WHERE o_id = '$OwnerID'";
		$result = $crud->getData($query);
						
		return $result;
	}

	public function InsertOwner($Code,$OwnerName,$OwnerNameEng,$Mobile,$FatherName,$MotherName,$DOB,$NID,$OwnerBGroup,$cDivision,$cSubDivision,$cWardNo,$cArea,$cHoldingNo,$chkAddress,$Parmanent_address,$PhotoPath)
	{
		$crud = new Crud();
		$aOwner = new Api_Owner();
		$validation = new Validation();	

		$apiCommon = new Api_Common();
			
		if($aOwner->IsExistOwner($NID))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO owner (o_code,o_name,owner_name_eng,o_mobile,o_father_name,o_mother_name,o_dob,
			o_nid,o_blood_group,c_division,c_sub_division,c_ward_no,c_vill,
			o_holding_no,same_adderss,PermanentAddress,o_photo_path,entry_date) 
			VALUES ('$Code', '$OwnerName', '$OwnerNameEng', '$Mobile', '$FatherName', '$MotherName', '$DOB', 
			'$NID', '$OwnerBGroup', '$cDivision', '$cSubDivision', '$cWardNo', '$cArea', 
			'$cHoldingNo', '$chkAddress', '$Parmanent_address', '$PhotoPath', NOW())";

			$result = $crud->execute($query);

			if($result)
			{	$apiCommon->UpdateDocNoByDocType("OWN");
					return "Owner created successfully!!";
			}
			else
			{
				return "Operation Failed!!";
			}
		}			
	}


	public function UpdateOwner($Code, $OwnerName, $OwnerNameEng, $Mobile, $FatherName, $MotherName, $DOB, $NID, $OwnerBGroup, $cDivision, $cSubDivision, $cWardNo, $cArea, $cHoldingNo, $chkAddress, $Parmanent_address, $PhotoPath)
	{
		$crud = new Crud();
		$aOwner = new Api_Owner();

		$DoUpdate = true;

		if($aOwner->NIDMatched($Code,$NID))
		{

			$DoUpdate = true;
		}
		else if($aOwner->IsExistOwner($NID))
		{
			$DoUpdate = false;
			return "Already Exist!!";
		}
	

		
		if($DoUpdate)
		{
			//update data to database

			$dataset = "o_name = '$OwnerName',
						owner_name_eng = '$OwnerNameEng',
						o_mobile = '$Mobile',
						o_father_name = '$FatherName',
						o_mother_name = '$MotherName',
						o_dob = '$DOB',
						o_nid = '$NID',
						o_blood_group = '$OwnerBGroup',
						c_division = '$cDivision',
						c_sub_division = '$cSubDivision',
						c_ward_no = '$cWardNo',
						c_vill = '$cArea',
						o_holding_no = '$cHoldingNo',
						same_adderss = '$chkAddress',
						PermanentAddress = '$Parmanent_address'";

				if($PhotoPath!="")
				{
					$dataset .= ",o_photo_path = '$PhotoPath'";
				}
	
				$query = "UPDATE  owner SET  $dataset WHERE o_code = '$Code'";

	
			$result = $crud->execute($query);


			if($result)
			{
				return "Owner updated successfully!!";
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


	public function DeleteOwner($Code)
	{
		$crud = new Crud();

		$query = "DELETE FROM owner WHERE o_code='$Code'";

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


    //---------------------------------- Owner Card Fee---------------------------------

    public function GetOwnerCardFee()
    {
        $crud = new Crud();
        $query =    "SELECT * FROM reg_fee";
        $result = $crud->getData($query);
        return $result;
    }

    public function UpdateOwnerCardFee($OwnerFee)
    {
        $crud = new Crud();
        $aOwner = new Api_Owner();

        $result = $aOwner->GetOwnerCardFee();
        if($result)
        {
           $query = "UPDATE owner_card_fee SET owner_card_fee = '$OwnerFee' ";
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
            $query = "INSERT owner_card_fee (owner_card_fee) VALUES ('$OwnerFee') ";
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

    //----------------------------------- Owner Card Bill-------------------------------------------
    public function IsExistOwnerBill($Owner)
    {
        $crud = new Crud();


        $query = "SELECT * FROM owner_card_bill WHERE o_id ='$Owner' AND entry_date=DATE(NOW())";
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
	
	public function GetOwnerBill($Owner_oid)
    {	
        $crud = new Crud();

        $query = "SELECT *,(select CONCAT(start_year,' - ',end_year) from  fiscal_year) fiscal_year FROM owner_card_bill WHERE o_id ='$Owner_oid'";
        $result = $crud->getData($query);
		return $result;
    }

    public function GetAllOwnerBill()
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT owner_card_bill.o_cbill_id,owner_card_bill.ocbl_code,owner.o_name,owner_card_bill.o_id, owner_card_bill.bill_type,"
                ."owner_card_bill.o_card_fee,owner_card_bill.status,owner_card_bill.entry_date,owner_card_bill.b_id, "
                ."owner_card_bill.ac_id,owner_card_bill.payment_date,owner_card_bill.v_code FROM owner_card_bill "
                ."INNER JOIN owner on owner.o_id = owner_card_bill.o_id ORDER BY o_cbill_id ASC";
        $result = $crud->getData($query);

        return $result;
	}

    public function GetGeneratedBill()
    {
        $crud = new Crud();
        $query = 
				"SELECT bill.bill_id,bill.bill_code,bill.fiscal_year,bill.v_reg_no,owner.o_id,owner.o_name, ".
				"owner.c_ward_no,owner.c_vill,settings_ward_no.ward_no,settings_area.area,bill.reg_date, ".
				"bill.expired_date,bill.reg_fee,bill.arrear,bill.sur_charge,bill.total,bill.due,bill.status, ".
				"bill.payment_date,bill.entry_date,bill.b_id,bill.ac_id,account.ac_name,bank.b_name ".
				"FROM bill ".
				"LEFT JOIN account on bill.ac_id = account.ac_id ".
				"LEFT JOIN bank on bill.b_id = bank.b_id ".
				"LEFT JOIN vehicle on vehicle.v_reg_no = bill.v_reg_no ".
				"LEFT JOIN owner on owner.o_id = vehicle.o_id ".
				"LEFT JOIN settings_ward_no on settings_ward_no.ward_no_id = owner.c_ward_no ".
				"LEFT JOIN settings_area on settings_area.area_id = owner.c_vill ORDER BY bill.v_reg_no ASC";
        $result = $crud->getData($query);
        return $result;
	}

	public function GetAllOwnerBillPrint($id)
    {
        $crud = new Crud();

		if( $id == 1 ) {$type = " payment_date is not null and ";}
		elseif( $id == 2 ) {$type = " payment_date is null and ";}
		elseif( $id == 3 ) {$type = "";}

		if( $id == 101 ) {$type = " status = 1 and ";}
		elseif( $id == 102 ) {$type = " status = 0 and ";}
		elseif( $id == 103 ) {$type = "";}

		if($id < 100) $query = $this->GetAllOwerBill($type);
		if($id > 100) $query = $this->GetAllGeneratedOwerBill($type);
        $result = $crud->getData($query);

        return $result;
	}
	
	protected function GetAllOwerBill($type)
	{
		return "SELECT owner_card_bill.o_cbill_id,owner_card_bill.ocbl_code,owner.o_name,owner_card_bill.o_id, owner_card_bill.bill_type, owner_card_bill.o_card_fee,owner_card_bill.status,owner_card_bill.entry_date,owner_card_bill.b_id, owner_card_bill.ac_id,owner_card_bill.payment_date,owner_card_bill.v_code, (select CONCAT(start_year,' - ',end_year
        ) from  fiscal_year) fiscal_year,(SELECT issue_date FROM bill_issue_date order by entry_date DESC LIMIT 1)as issue_date,owner.o_code, (SELECT b_name FROM bank LIMIT 1) b_name, (SELECT ac_branch FROM account LIMIT 1) ac_branch, (SELECT ac_no FROM account LIMIT 1) ac_no
		FROM owner_card_bill 
		INNER JOIN owner on owner.o_id = owner_card_bill.o_id
		where $type 1=1 ORDER BY o_cbill_id ASC";
	}

	protected function GetAllGeneratedOwerBill($type)
	{
		return "SELECT  bill.bill_code, owner.o_name, vehicle.v_reg_no, bill.reg_fee, owner.o_code, bill.entry_date,  bill.payment_date, fiscal_year, (SELECT  issue_date FROM bill_issue_date ORDER BY entry_date DESC LIMIT 1) AS issue_date, (SELECT b_name FROM bank LIMIT 1) b_name, (SELECT ac_branch FROM account LIMIT 1) ac_branch, (SELECT ac_no FROM account LIMIT 1) ac_no
		FROM bill INNER JOIN vehicle ON vehicle.v_reg_no = bill.v_reg_no
		INNER JOIN owner ON owner.o_id = vehicle.o_id
		where $type 1=1 ORDER BY bill_code ASC";
	}

    public function GetOwnerBillByCBillID($Code)
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT owner_card_bill.o_cbill_id,owner_card_bill.ocbl_code,owner.o_name,owner_card_bill.o_id,owner_card_bill.v_code, owner_card_bill.o_card_fee,owner_card_bill.status,owner_card_bill.entry_date,owner_card_bill.b_id, owner_card_bill.ac_id,owner_card_bill.payment_date FROM owner_card_bill INNER JOIN owner on owner.o_id = owner_card_bill.o_id WHERE owner_card_bill.ocbl_code ='$Code'";
        $result = $crud->getData($query);

        return $result;
	}
	
    public function GetOwnerInfoByCBillID($Code)
    {
        $crud = new Crud();
        $validation = new Validation();

		$query = "SELECT 
		owner.*,chassis_no, issue_date, v_reg_no
						FROM owner_card_bill 
						INNER JOIN owner on owner.o_id = owner_card_bill.o_id
						inner join vehicle on vehicle.o_id = owner.o_id
						left join vehicle_card_issue on owner_card_bill.v_code = vehicle_card_issue.v_code
						WHERE owner_card_bill.ocbl_code = 'OCBL00001'
						ORDER by issue_date DESC
						LIMIT 1";
        $result = $crud->getData($query);

        return $result;
	}
	
    public function InsertOwnerBill($Owner,$Code, $OwnerCardFee, $EntryDate)
    {
        $crud = new Crud();
        $aOwner = new Api_Owner();

        $apiCommon = new Api_Common();

        if($aOwner->IsExistOwnerBill($Owner))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO owner_card_bill (o_id,ocbl_code,o_card_fee,entry_date) VALUES ('$Owner','$Code', '$OwnerCardFee', '$EntryDate')";


            $result = $crud->execute($query);

            if($result)
            {
                if($apiCommon->UpdateDocNoByDocType("OCBL"))
                {
                    return "Owner Bill created successfully!!";
                }
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function GetOwnerCardInvoiceInfoByCode($Code)
    {
        $crud = new Crud();

		$query = "SELECT owner_card_bill.ocbl_code,owner.o_name,vehicle.v_reg_no,owner_card_bill.o_card_fee,  owner.o_code, owner_card_bill.entry_date, owner_card_bill.payment_date, (select CONCAT(start_year,' - ',end_year
        ) from  fiscal_year) fiscal_year,(SELECT issue_date FROM bill_issue_date order by entry_date DESC LIMIT 1)as issue_date, bill_type,  (SELECT b_name FROM bank LIMIT 1) b_name, (SELECT ac_branch FROM account LIMIT 1) ac_branch, (SELECT ac_no FROM account LIMIT 1) ac_no
		FROM owner_card_bill 
		INNER JOIN owner on owner.o_id = owner_card_bill.o_id 
		INNER JOIN vehicle ON vehicle.v_code = owner_card_bill.v_code
		left join bank on bank.b_id = owner_card_bill.b_id
        left join account on account.ac_id = owner_card_bill.ac_id
		WHERE ocbl_code = '$Code'";
        $result = $crud->getData($query);

        return $result;
    }
    public function GetOwnerGeneratedInvoiceData($Code)
    {
        $crud = new Crud();

		$query = "SELECT  bill.bill_code, owner.o_name, vehicle.v_reg_no, bill.reg_fee, owner.o_code, bill.entry_date,  bill.payment_date, fiscal_year, (SELECT  issue_date FROM bill_issue_date ORDER BY entry_date DESC LIMIT 1) AS issue_date,  (SELECT b_name FROM bank LIMIT 1) b_name, (SELECT ac_branch FROM account LIMIT 1) ac_branch, (SELECT ac_no FROM account LIMIT 1) ac_no
		FROM bill INNER JOIN vehicle ON vehicle.v_reg_no = bill.v_reg_no
				INNER JOIN owner ON owner.o_id = vehicle.o_id
				LEFT JOIN bank ON bank.b_id = bill.b_id
				LEFT JOIN account ON account.ac_id = bill.ac_id
		WHERE bill_code = '$Code'";
        $result = $crud->getData($query);

        return $result;
    }
}



?>