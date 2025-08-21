<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");
include_once("API_Common.php");


class API_OwnerTransfer
{

	// ------------------ UNDER TRANSFER BLOCK BLOCK ----------------------------------------
	
	public function IsExistTransfer($Code, $RegNo, $CurrentOwner, $NewOwner)
	{
		$crud = new Crud();
		$validation = new Validation();	
		
		
		$query = "SELECT * FROM owner_transfer WHERE otbl_code='$Code' AND reg_no='$RegNo' AND c_owner = '$CurrentOwner' AND p_owner = '$NewOwner' ";
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

	public function GetOwnerTransferList()
	{
		$crud = new Crud();
		
		$query = "SELECT * FROM owner_transfer ORDER BY id DESC";
		$result = $crud->getData($query);
			
		return $result;
	}

	public function GetVehicleOwnerTransferVRegNo($vRegNo)
	{
		$crud = new Crud();
		
		$query = "SELECT * FROM owner_transfer where reg_no = '$vRegNo'";
		$result = $crud->getData($query);
			
		return $result;
	}
	public function InsertOwnerTransfer($Code, $RegNo, $CurrentOwner, $NewOwner, $OwnerTrnsFee)
	{
		$crud = new Crud();
		$aOwnerTransfer = new API_OwnerTransfer();

        $apiCommon = new Api_Common();
		
			
		if($aOwnerTransfer->IsExistTransfer($Code, $RegNo, $CurrentOwner, $NewOwner))
		{
			return "Already Exist!!";
		}
		else
		{
           	$query = "INSERT INTO owner_transfer (otbl_code, reg_no, current_owner, previous_owner, o_transfer_date, owner_transfer_fee, entry_date) VALUES ( '$Code', '$RegNo', '$NewOwner', '$CurrentOwner', NOW() ,'$OwnerTrnsFee' ,  NOW())";
		
	
			$result = $crud->execute($query);

			if($result)
			{
                if($apiCommon->UpdateDocNoByDocType("OWNT"))
                {
                    return "Created Owner transferred Request successfully!!";
                }
			}
			else
			{
				return "Operation Failed!!";
			}

		}			

	}
    public function OwnerTransferNoBill($RegNo, $NewOwner)
	{
		$crud = new Crud();
		$aOwnerTransfer = new API_OwnerTransfer();
         
        $query = "UPDATE vehicle SET o_id = '$NewOwner'   WHERE v_reg_no = '$RegNo'";

        $result = $crud->execute($query);

        if($result)
        {
            return "Owner transferred Request successfully!!";
        }
        else
        {
            return "Operation Failed!!";
        }		

	}

    public function GetOwnerTranBillStatusByCode($Code)
    {
        $crud = new Crud();

        $query = "SELECT status FROM owner_transfer WHERE otbl_code = '$Code' ";
        $result = $crud->getData($query);
        return $result[0]["status"];
    }

    public function OwnerTrnsBillPost($Code,$BankID,$AccountID,$PaymentDate)
    {
        $crud = new Crud();
        $aOwnerTransfer = new API_OwnerTransfer();

        if($aOwnerTransfer->GetOwnerTranBillStatusByCode($Code))
        {
            return "Bill Already Posted!!";
        }
        else
        {

            $query = "UPDATE owner_transfer SET status = 1, b_id = '$BankID' , ac_id = '$AccountID' ,payment_date= '$PaymentDate'  WHERE otbl_code = '$Code'";

            $result = $crud->execute($query);

            if($result)
            {
                if($aOwnerTransfer->UpdateOwner($Code))
                {
                    return "Bill posted successfully!!";
                }
                else
                {
                    return "Vehicle Owner update failed!!";
                }
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }
    public function UpdateOwner($Code)
    {
        $crud = new Crud();

        $query = "SELECT reg_no , current_owner FROM owner_transfer WHERE otbl_code = '$Code'";
        $result = $crud->getData($query);
        $CurrentOwner = $result[0]["current_owner"];
        $RegNo = $result[0]["reg_no"];

        $query = "UPDATE vehicle SET o_id = '$CurrentOwner' WHERE v_reg_no = '$RegNo '";
        $result = $crud->execute($query);

        if($result)
        {
           return true;
        }
        else
        {
            return false;
        }
    }

    //---------------------------------- Owner Owner Transfer Fee---------------------------------

    public function GetOwnerTransferFee()
    {
        $crud = new Crud();
        $query =    "SELECT * FROM owner_transfer_fee";
        $result = $crud->getData($query);
        return $result;
    }

    public function UpdateOwnerTransferFee($OwnerTransferFee)
    {
        $crud = new Crud();
        $aOwnerTransfer = new API_OwnerTransfer();

        $result = $aOwnerTransfer->GetOwnerTransferFee();
        if($result)
        {
            $query = "UPDATE owner_transfer_fee SET owner_transfer_fee = '$OwnerTransferFee' ";
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
            $query = "INSERT owner_transfer_fee (owner_transfer_fee) VALUES ('$OwnerTransferFee') ";
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

    public function GetOwnerTrnsInvoiceInfoByCode($Code)
    {
        $crud = new Crud();

        $query = "SELECT 
        owner_transfer.otbl_code,owner.o_name,owner_transfer.reg_no,owner_transfer.owner_transfer_fee,owner.o_code, owner_transfer.payment_date, (select CONCAT(start_year,' - ',end_year
        ) from  fiscal_year) fiscal_year,owner_transfer.owner_transfer_fee, (SELECT b_name FROM bank LIMIT 1) b_name, (SELECT ac_branch FROM account LIMIT 1) ac_branch, (SELECT ac_no FROM account LIMIT 1) ac_no,(SELECT issue_date FROM bill_issue_date order by entry_date DESC LIMIT 1)as issue_date,reg_no
        FROM owner_transfer 
        INNER JOIN owner on owner.o_id = owner_transfer.current_owner 
        left JOIN bank on bank.b_id = owner_transfer.b_id 
        left JOIN account on account.ac_id = owner_transfer.ac_id 
        WHERE otbl_code = '$Code' ";
        $result = $crud->getData($query);

        return $result;
    }
    
    public function GetOwnerTransferListBillPrint($id)
    {
        $crud = new Crud();
		if( $id == 1 ) {$type = " payment_date is not null and ";}
		elseif( $id == 2 ) {$type = " payment_date is null and ";}
		elseif( $id == 3 ) {$type = "";}
        $query = "SELECT 
        owner_transfer.otbl_code,owner.o_name,owner_transfer.reg_no,owner_transfer.owner_transfer_fee,owner.o_code, owner_transfer.payment_date, (select CONCAT(start_year,' - ',end_year
        ) from  fiscal_year) fiscal_year,owner_transfer.owner_transfer_fee, (SELECT b_name FROM bank LIMIT 1) b_name, (SELECT ac_branch FROM account LIMIT 1) ac_branch, (SELECT ac_no FROM account LIMIT 1) ac_no,(SELECT issue_date FROM bill_issue_date order by entry_date DESC LIMIT 1)as issue_date,reg_no
        FROM owner_transfer 
        INNER JOIN owner on owner.o_id = owner_transfer.current_owner 
        left JOIN bank on bank.b_id = owner_transfer.b_id 
        left JOIN account on account.ac_id = owner_transfer.ac_id where $type 1=1";
        $result = $crud->getData($query);

        return $result;
    }

}



?>