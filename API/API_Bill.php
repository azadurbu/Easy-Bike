<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");
include_once("API_Common.php");

class Api_Bill
{

	// ------------------ USER BLOCK ----------------------------------------
	
	public function IsExistBill($RegNo,$FiscalYear)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM bill WHERE v_reg_no='$RegNo' AND fiscal_year = '$FiscalYear'";
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

	public function GetAllBill()
	{
		$crud = new Crud();
		$aCommon = new Api_Common();

		$Year = $aCommon->GetFiscalYear();

		$FiscalYear = $Year[0]["start_year"]."-".$Year[0]["end_year"];

		$query = 	"SELECT bill.bill_id, bill.bill_code, bill.fiscal_year, bill.v_reg_no, bill.reg_date, bill.expired_date, bill.reg_fee, bill.arrear, ".
					"bill.sur_charge, bill.total, bill.due, bill.fine, bill.status, bill.payment_date, vehicle.o_id, owner.o_name ".
					"FROM bill ".
					"INNER JOIN vehicle ON bill.v_reg_no = vehicle.v_reg_no ". 
					"INNER JOIN owner ON vehicle.o_id = owner.o_id ".
					"WHERE fiscal_year like '%".$FiscalYear."%'" .
					"ORDER BY bill_id DESC";
					
		$result = $crud->getData($query);
			
		return $result;
	}

    public function UpdateFineBill($Code,$Fine)
    {
        $crud = new Crud();

        $query = "UPDATE bill SET fine= '$Fine' WHERE bill_code = '$Code' ";
        $result = $crud->getData($query);

        return $result;
    }
    
	public function GetAllBillByFiscalYear($FiscalYear)
	{
		$crud = new Crud();
		$aCommon = new Api_Common();

		$query = "SELECT * FROM bill WHERE fiscal_year = '$FiscalYear' ORDER BY bill_id ASC";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetAllRegNo($FiscalYear)
	{
		$crud = new Crud();
		
		$query = "SELECT vehicle.v_reg_no , vehicle.v_reg_date FROM vehicle WHERE vehicle.v_reg_no NOT IN ".
				 "(SELECT bill.v_reg_no FROM bill WHERE bill.fiscal_year = '$FiscalYear') ORDER BY vehicle.v_id ASC";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetBillByCode($Code)
	{
		$crud = new Crud();

		$query = "SELECT * FROM bill WHERE bill_code = '$Code' ";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetStatusByCode($Code)
	{
		$crud = new Crud();
		
		$query = "SELECT status FROM bill WHERE bill_code = '$Code' ";
		$result = $crud->getData($query);
		return $result[0]["status"];	
	}

    public function GetDBillStatusByCode($Code)
    {
        $crud = new Crud();

        $query = "SELECT status FROM driver_card WHERE cbl_code = '$Code' ";
        $result = $crud->getData($query);
        return $result[0]["status"];
    }

    public function GetOBillStatusByCode($Code)
    {
        $crud = new Crud();

        $query = "SELECT status FROM owner_card_bill WHERE ocbl_code = '$Code' ";
        $result = $crud->getData($query);
        return $result[0]["status"];
    }

	public function InsertSingleBill($Code,$FiscalYear,$RegNo,$RegDate,$ExpiredDate,$RegFee,$Arrear,$SurCharge,$Total,$Due,$Status,$PaymentDate)
	{

		$crud = new Crud();
		$aBill = new Api_Bill();

        $apiCommon = new Api_Common();

			
		if($aBill->IsExistBill($RegNo,$FiscalYear))
		{
			return "Already Exist!!";
		}
		else
		{
			//insert data to database    
			$query = "INSERT INTO bill (bill_code,fiscal_year,v_reg_no,reg_date,expired_date,reg_fee,arrear,sur_charge,total,due,status,	payment_date, entry_date) VALUES ( '$Code', '$FiscalYear','$RegNo', '$RegDate', '$ExpiredDate' , '$RegFee' , '$Arrear', '$SurCharge','$Total','$Due','$Status','$PaymentDate',NOW())";
		
	
			$result = $crud->execute($query);

			if($result)
			{

                if($apiCommon->UpdateDocNoByDocType("SBL"))
                {
                    return "Bill created successfully!!";
                }
			}
			else
			{
				return "Operation Failed!!";
			}
		}
	}

	public function BillPost($Code,$RegNo,$BankID,$AccountID,$PaymentDate)
	{
		$crud = new Crud();
        $aBill = new Api_Bill();

        if($aBill->GetStatusByCode($Code))
        {
        	return "Bill Already Posted!!";
        }
        else
        {
        	
        	$query = "UPDATE  bill SET arrear=0,sur_charge=0, due = 0,  status = 1, b_id = '$BankID' , ac_id = '$AccountID' ,payment_date= '$PaymentDate' WHERE bill_code = '$Code' AND v_reg_no = '$RegNo' ";


            $result = $crud->execute($query);

            if($result)
            {
                return "Bill posted successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
	}

	public function GetInvoiceInfoByCode($Code)
	{
		$crud = new Crud();

		$query =	"SELECT owner.o_name, bill.v_reg_no, bill.fiscal_year, bill.expired_date, bill.reg_fee, bill.arrear, bill.sur_charge, bill.total ".
				
					"FROM `bill` ".
					"INNER JOIN vehicle ON bill.v_reg_no = vehicle.v_reg_no ".
					"INNER JOIN owner ON vehicle.o_id = owner.o_id ".
					"WHERE bill.bill_code = '$Code' ";
		$result = $crud->getData($query);
			
		return $result;
	}

    public function DriverBillPost($Code,$BankID,$AccountID,$PaymentDate)
    {
        $crud = new Crud();
        $aBill = new Api_Bill();

        if($aBill->GetDBillStatusByCode($Code))
        {
            return "Bill Already Posted!!";
        }
        else
        {

            $query = "UPDATE driver_card SET status = 1, b_id = '$BankID' , ac_id = '$AccountID' ,payment_date= '$PaymentDate' WHERE cbl_code = '$Code'";


            $result = $crud->execute($query);

            if($result)
            {
                return "Bill posted successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function OwnerBillPost($Code,$BankID,$AccountID,$PaymentDate)
    {
        $crud = new Crud();
        $aBill = new Api_Bill();

        if($aBill->GetOBillStatusByCode($Code))
        {
            return "Bill Already Posted!!";
        }
        else
        {

            $query = "UPDATE owner_card_bill SET status = 1, b_id = '$BankID' , ac_id = '$AccountID' ,payment_date= '$PaymentDate' WHERE ocbl_code = '$Code'";


            $result = $crud->execute($query);

            if($result)
            {
                return "Bill posted successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
	}
	
	public function InsertOtherBill($Code, $billType, $Gari, $Driver, $Account, $billAmount, $details)
	{
		$data['Code'] = $Code;
		$data['billType'] = $billType;
		$data['Gari'] = $Gari;
		$data['Driver'] = $Driver;
		$data['Account'] = $Account;
		$data['billAmount'] = $billAmount;
		$data['details'] = $details;

		$crud = new Crud();
		$apiCommon = new Api_Common();

		if($billType == '1'){
			$query =	"SELECT v_code, o_id FROM vehicle where v_id = '$Gari'";
			$result = $crud->getData($query);

			$v_code = $result[0]['v_code'];
			$o_id = $result[0]['o_id'];
			
			if(!empty($v_code) &&  !empty($o_id)){
				$query = "INSERT INTO owner_card_bill ( v_code, ocbl_code, o_id, o_card_fee, bill_type, entry_date) VALUES ('$v_code', '$Code', '$o_id', '$billAmount', '$Account', NOW() )";	
				$result = $crud->execute($query);

				if($result){
					if($apiCommon->UpdateDocNoByDocType("OCBL")){
						return "Bill created successfully!!";
					}
				}else{
					return "Operation Failed!!";
				}
			}
		}elseif($billType == '2'){
			$query = "INSERT INTO driver_card ( cbl_code, d_id, card_fee, bill_type, entry_date) VALUES ('$Code', '$Driver', '$billAmount', '$Account', NOW() )";	
				$result = $crud->execute($query);

				if($result){
					if($apiCommon->UpdateDocNoByDocType("CBL")){
						return "Bill created successfully!!";
					}
				}else{
					return "Operation Failed!!";
				}
			die('hello 2');
		}
	}

	public function InsertIssueDate($issueDate)
	{

		$crud = new Crud();

		//insert data to database    
		$query = "INSERT INTO bill_issue_date (issue_date, entry_date) VALUES ( '$issueDate', NOW())";
	
		$result = $crud->execute($query);

		if($result)
		{
			return "Issue Date Add created successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}
	}

	public function nowBillIssueDate()
	{

		$crud = new Crud();   
		$query = "Select issue_date from bill_issue_date order by entry_date desc limit 1";
		
		$result = $crud->getData($query);
		return $result;
	}

	public function OwnerGeneratedBill($Code){
		$crud = new Crud();
		$query = "	SELECT *
					FROM bill
					LEFT JOIN vehicle ON vehicle.v_reg_no = bill.v_reg_no
					LEFT JOIN owner ON owner.o_id = vehicle.o_id where bill_code = '$Code'";
		
		$result = $crud->getData($query);
		return $result;
	}

	public function OwnerGeneratedPostBill($Code, $Bank, $Account, $PaymentDate){

		$crud = new Crud(); 
		$query = "UPDATE bill SET  b_id = '$Bank', ac_id = '$Account', payment_date = '$PaymentDate', status = '1' WHERE bill_code = '$Code'";
	
		return $result = $crud->getData($query);

		if($result)
		{
			return "Data Update successfully!!";
		}
		else
		{
			return "Operation Failed!!";
		}
	}
}



?>