<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");
include_once("API_Common.php");


class Api_Driver
{

    // ------------------ USER BLOCK ----------------------------------------

    public function IsExistDriver($NID)
    {
        $crud = new Crud();
        $validation = new Validation();


        $query = "SELECT * FROM driver WHERE d_nid='$NID'";
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


        $query = "SELECT * FROM driver WHERE d_code = '$Code' AND d_nid='$NID'";
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

    public function GetAllDriver()
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT * FROM driver ORDER BY d_id ASC";
        $result = $crud->getData($query);

        return $result;
    }

    public function GetDriverByCode($Code)
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT driver.d_id,driver.d_code, driver.d_name, driver.d_father_name, driver.d_mother_name,driver.d_blood_group,driver.d_dob,driver.d_nid,d_holding_no,driver.d_mobile,driver.d_license_no,driver.c_division,driver.c_sub_division,driver.c_ward_no,driver.c_vill,driver.p_division,driver.p_sub_division,driver.p_ward_no,driver.p_vill,driver.d_photo_path, driver.PermanentAddress, settings_division.division,settings_sub_division.sub_division,settings_ward_no.ward_no,settings_area.area, driver_card.status,driver.d_name_eng,driver.approve_date,driver.same_adderss, driver.entry_date
        FROM driver 
        INNER JOIN settings_division on driver.c_division = settings_division.division_id 
        INNER JOIN settings_sub_division on driver.c_sub_division = settings_sub_division.sub_division_id 
        INNER JOIN settings_ward_no on driver.c_ward_no = settings_ward_no.ward_no_id 
        INNER JOIN settings_area on driver.c_vill = settings_area.area_id 
        
        left join driver_card
            on driver_card.d_id = driver.d_id
            WHERE d_code = '$Code'
            ORDER BY driver_card.entry_date DESC
            limit 1";
        $result = $crud->getData($query);

        return $result;
    }

    public function GetDriverByOwnerAndVehicle($OwnerID, $VehicleID)
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT * FROM driver WHERE o_id = '$OwnerID' AND v_id = '$VehicleID'";
        $result = $crud->getData($query);

        return $result;
    }

    public function InsertDriver($Code,$FatherName,$MotherName,$DriverBGroup,$DOB,$NID,$Mobile,$LicenseNo,$approvealDate,$DriverName,$DriverNameEng,$cDivision,$cSubDivision,$cWardNo,$cVill,$cHoldingNo,$PhotoPath,$chkAddress,$PermanentAddress)
    {
        $crud = new Crud();
        $aDriver = new Api_Driver();
        $validation = new Validation();

        $apiCommon = new Api_Common();

        if($aDriver->IsExistDriver($NID))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO driver (d_code, d_father_name, d_mother_name, d_blood_group, d_dob, d_nid, d_mobile, d_license_no, approve_date, d_name, d_name_eng, c_division, c_sub_division, c_ward_no, c_vill, d_holding_no, d_photo_path, same_adderss, PermanentAddress, entry_date ) VALUES ('$Code', '$FatherName', '$MotherName', '$DriverBGroup', '$DOB', '$NID', '$Mobile', '$LicenseNo', '$approvealDate', '$DriverName', '$DriverNameEng', '$cDivision', '$cSubDivision', '$cWardNo', '$cVill', '$cHoldingNo', '$PhotoPath', '$chkAddress', '$PermanentAddress', NOW())";


            $result = $crud->execute($query);

            if($result)
            {

                if($apiCommon->UpdateDocNoByDocType("DRV"))
                {
                    return "Driver created successfully!!";
                }
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function UpdateDriver($Code, $LicenseNo, $approvealDate, $DriverName, $DriverNameEng, $Mobile, $FathersName, $MotherName, $DOB, $NID, $DriverBGroup, $cDivision, $cSubDivision, $cWardNo, $cArea, $cHoldingNo, $chkAddress, $Parmanent_address, $PhotoPath)
    {

        $crud = new Crud();
        $aDriver = new Api_Driver();

        $DoUpdate = true;


        if($aDriver->NIDMatched($Code,$NID))
        {

            $DoUpdate = true;
        }
        else if($aDriver->IsExistDriver($NID))
        {
            $DoUpdate = false;
            return "Already Exist!!";
        }

        if($DoUpdate)
        {
            //update data to database
            $dataset = "d_license_no = '$LicenseNo',
                        approve_date = '$approvealDate',
                        d_name = '$DriverName',
                        d_name_eng = '$DriverNameEng',
                        d_mobile = '$Mobile',
                        d_father_name = '$FathersName',
                        d_mother_name = '$MotherName',
                        d_dob = '$DOB',
                        d_nid = '$NID',
                        d_blood_group = '$DriverBGroup',
                        c_division = '$cDivision',
                        c_sub_division = '$cSubDivision',
                        c_ward_no = '$cWardNo',
                        c_vill = '$cArea',
                        d_holding_no = '$cHoldingNo',
                        same_adderss = '$chkAddress',
                        PermanentAddress = '$Parmanent_address'";

            if($PhotoPath!="")
            {
                $dataset .= ",d_photo_path = '$PhotoPath'";
            }

            $query = "UPDATE  driver SET  $dataset WHERE d_code = '$Code'";

            $result = $crud->execute($query);

            if($result)
            {
                return "Driver updated successfully!!";
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

    public function DeleteDriver($Code)
    {
        $crud = new Crud();

        $query = "DELETE FROM driver WHERE d_code='$Code'";

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

    //---------------------------------- Driver Card Fee---------------------------------

    public function GetDriverCardFee()
    {
        $crud = new Crud();
        $query =    "SELECT * FROM driver_reg_fee";
        $result = $crud->getData($query);
        return $result;
    }

    public function UpdateDriverCardFee($DriverFee)
    {
        $crud = new Crud();
        $aDriver = new Api_Driver();

        $result = $aDriver->GetDriverCardFee();
        if($result)
        {
            $query = "UPDATE card_fee SET card_fee = '$DriverFee' ";
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
            $query = "INSERT card_fee (card_fee) VALUES ('$DriverFee') ";
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

    //----------------------------------- Driver Card Bill-------------------------------------------
    public function IsExistDriverBill($Driver)
    {
        $crud = new Crud();


        $query = "SELECT * FROM driver_card WHERE d_id ='$Driver' AND entry_date=DATE(NOW())";
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

    public function GetAllDriverBill()
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT driver_card.d_card_id,driver_card.cbl_code,driver_card.status,driver.d_name, driver_card.card_fee, driver.d_id, driver_card.entry_date, driver_card.payment_date, driver.d_code, driver_card.bill_type FROM driver_card INNER JOIN driver on driver_card.d_id = driver.d_id ORDER BY d_card_id ASC";
        $result = $crud->getData($query);

        return $result;
    }

    public function GetAllDriverBillPrint($id)
    {
        $crud = new Crud();
		if( $id == 1 ) {$type = " payment_date is not null and ";}
		elseif( $id == 2 ) {$type = " payment_date is null and ";}
		elseif( $id == 3 ) {$type = "";}
        $query = "SELECT driver_card.d_card_id,driver_card.cbl_code,driver_card.status,driver.d_name, driver_card.card_fee, driver.d_id, driver_card.entry_date, driver_card.payment_date, driver.d_code, driver_card.bill_type,(SELECT CONCAT(start_year, ' - ', end_year) FROM fiscal_year) fiscal_year, (SELECT  issue_date FROM bill_issue_date ORDER BY entry_date DESC LIMIT 1) AS issue_date,d_license_no, b_name, ac_branch, ac_no FROM driver_card INNER JOIN driver on driver_card.d_id = driver.d_id  left join bank on bank.b_id = driver_card.b_id left join account on account.ac_id = driver_card.ac_id where $type 1 = 1 ORDER BY d_card_id ASC";
        $result = $crud->getData($query);

        return $result;
    }

    public function GetDriverBillByDBillID($Code)
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT driver_card.d_card_id,driver_card.cbl_code,driver_card.status, driver.d_name, driver_card.card_fee, driver.d_id, driver_card.entry_date, driver_card.payment_date, driver_card.card_year FROM driver_card INNER JOIN driver on driver_card.d_id = driver.d_id WHERE driver_card.cbl_code='$Code'";
        $result = $crud->getData($query);

        return $result;
    }

    public function InsertDriverBill($Driver,$Code, $CardFee, $EntryDate)
    {
        $crud = new Crud();
        $aDriver = new Api_Driver();

        $apiCommon = new Api_Common();

        if($aDriver->IsExistDriverBill($Driver))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO driver_card (d_id,cbl_code,card_fee,entry_date) VALUES ('$Driver','$Code', '$CardFee', '$EntryDate')";


            $result = $crud->execute($query);

            if($result)
            {
                if($apiCommon->UpdateDocNoByDocType("CBL"))
                {
                    return "Driver Bill created successfully!!";
                }
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function UpdateDriverBill($Driver,$Code,$CardFee,$EntryDate)
    {

        $crud = new Crud();
        $aDriver = new Api_Driver();

        //insert data to database
        $query = "UPDATE driver_card SET d_id = '$Driver' ,card_fee = '$CardFee' , entry_date = '$EntryDate'  WHERE cbl_code = '$Code'";


        $result = $crud->execute($query);

        if($result)
        {
            return "Driver Bill updated successfully!!";
        }
        else
        {
            return "Operation Failed!!";
        }
    }

    public function DeleteDriverBill($DBillID)
    {
        $crud = new Crud();

        $query = "DELETE FROM driver_card WHERE  d_card_id = '$DBillID'";

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

	public function GetCardInvoiceInfoByCode($Code)
	{
		$crud = new Crud();

		$query = " SELECT driver_card.cbl_code,driver.d_name,driver.d_license_no,driver_card.card_fee,bill_type, (select CONCAT(start_year,' - ',end_year
        ) from  fiscal_year) fiscal_year,(SELECT issue_date FROM bill_issue_date order by entry_date DESC LIMIT 1)as issue_date, payment_date,d_code, bill_type, bill_type, (SELECT b_name FROM bank LIMIT 1) b_name, (SELECT ac_branch FROM account LIMIT 1) ac_branch, (SELECT ac_no FROM account LIMIT 1) ac_no
                    FROM driver_card
                    INNER JOIN driver on driver.d_id = driver_card.d_id
                    WHERE cbl_code = '$Code' ";
		$result = $crud->getData($query);
			
		return $result;
	}


}



?>