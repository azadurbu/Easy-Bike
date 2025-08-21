<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");


class Api_Bank
{

    // ------------------ Bank BLOCK ----------------------------------------

    public function IsExistbank($Bank)
    {
        $crud = new Crud();
        $validation = new Validation();


        $query = "SELECT * FROM bank WHERE b_name='$Bank'";
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

    public function GetAllBank() // GET ALL Bank
    {
        $crud = new Crud();

        $query = "SELECT * FROM bank";
        $result = $crud->getData($query);
        return $result;
    }

    public function GetAllBankName() // GET ALL Bank
    {
        $crud = new Crud();

        $query = "SELECT b_name  FROM bank";
        $result = $crud->getData($query);
        return $result;
    }


    public function GetBankByBankID($BankID) // GET Bank BY Bank ID
    {
        $crud = new Crud();
        $result = "";

        $query = "SELECT * FROM bank WHERE b_id=".$BankID;
        $result = $crud->getData($query);

        return $result;
    }

    public function InsertBank($Bank,$BankAddress)
    {
        $crud = new Crud();
        $aBank = new Api_Bank();


        if($aBank->IsExistbank($Bank))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO bank (b_name,b_address) VALUES ('$Bank','$BankAddress')";


            $result = $crud->execute($query);

            if($result)
            {
                return "Bank created successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function UpdateBank($BankID,$Bank,$BankAddress )
    {

        $crud = new Crud();
        $aBank = new Api_Bank();

            //insert data to database
            $query = "UPDATE bank SET  b_name = '$Bank', b_address = '$BankAddress' WHERE b_id = '$BankID'";

            $result = $crud->execute($query);

            if($result)
            {
                return "Bank updated successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
    }

    public function DeleteBank($BankID)
    {
        $crud = new Crud();

        $query = "DELETE FROM bank WHERE  b_id = '$BankID'";

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

    // ------------------ ACCOUNT BLOCK ----------------------------------------

    public function IsExistAccount($AcName ,$AcNo)
    {
        $crud = new Crud();
        $validation = new Validation();

        $query = "SELECT * FROM account WHERE ac_name='$AcName' AND ac_no ='$AcNo'";
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

    public function GetAllAccount() // GET ALL Account
    {
        $crud = new Crud();

        $query = "SELECT bank.b_id, bank.b_name, bank.b_address, account.ac_id, account.ac_name,account.ac_branch, account.ac_no FROM account INNER JOIN bank on account.b_id = bank.b_id ORDER BY bank.b_id ASC";
        $result = $crud->getData($query);

        return $result;
    }

    public function GetAccountByAcID($AcID) // GET Account BY Account ID
    {
        $crud = new Crud();
        $result = "";

        $query = "SELECT account.ac_name, account.ac_branch,account.ac_no, bank.b_id, bank.b_name,bank.b_address FROM account INNER JOIN bank on account.b_id = bank.b_id where account.ac_id =".$AcID;
        $result = $crud->getData($query);

        return $result;
    }

    public function GetAccountByBank($BankID) // GET Account BY Bank ID
    {
        $crud = new Crud();
        $result = "";

        $query = "SELECT * FROM account WHERE b_id=".$BankID;
        $result = $crud->getData($query);

        return $result;
    }


    public function InsertAccount($BankID,$AcBranch, $AcName,  $AcNo)
    {
        $crud = new Crud();
        $aBank = new Api_Bank();

        if($aBank->IsExistAccount($AcName, $AcNo))
        {
            return "Already Exist!!";
        }
        else
        {
            //insert data to database
            $query = "INSERT INTO account (b_id,ac_branch,ac_name,ac_no) VALUES ('$BankID','$AcBranch','$AcName' , '$AcNo')";


            $result = $crud->execute($query);

            if($result)
            {
                return "Account created successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
        }
    }

    public function UpdateAccount($AcID,$BankID,$AcBranch,$AcName,$AcNo )
    {

        $crud = new Crud();
        $aBank = new Api_Bank();

            //insert data to database
            $query = "UPDATE account SET  b_id = '$BankID' , ac_branch = '$AcBranch' , ac_name = '$AcName' , ac_no = '$AcNo'  WHERE ac_id = '$AcID'";


            $result = $crud->execute($query);

            if($result)
            {
                return "Account updated successfully!!";
            }
            else
            {
                return "Operation Failed!!";
            }
    }

    public function DeleteAccount($AcID)
    {
        $crud = new Crud();

        $query = "DELETE FROM account WHERE  ac_id = '$AcID'";

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