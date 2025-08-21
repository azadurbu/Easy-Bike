<?php

include_once("../Config/Crud.php");
include_once("../Config/Validation.php");
include_once("API_Report.php");

class API_Report
{
    public function GetAllOwner($WardNo,$Area,$OwnerName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision) // GET ALL Owner
    {

		//$WardNo = "%".$WardNo."%";   
		//$Area = "%".$Area."%";	

        $crud = new Crud();
        
        $query = "";
    
        $WardNo = !empty($WardNo) ? "owner.c_ward_no = '$WardNo' and " : "";
        $Area = !empty($Area) ? "owner.c_vill = '$Area' and " : "";
        $OwnerName = !empty($OwnerName) ? "owner.owner_name_eng like '%$OwnerName%' and " : "";
        $NID =  !empty($NID) ? "owner.o_nid like '%$NID%' and " : "";
        $RegNo = !empty($RegNo) ? "owner.o_code like '%$RegNo%' and " : "";
        $Mobile = !empty($Mobile) ? "owner.o_mobile like '%$Mobile%' and " : "";
        $cDivision = !empty($cDivision) ? "owner.c_division = '$cDivision' and " : "";
        $cSubDivision = !empty($cSubDivision) ? "owner.c_sub_division = '$cSubDivision' and " : "";
        
        $query = "SELECT owner.o_id, owner.owner_name_eng, owner.o_code, owner.o_name, owner.o_father_name, owner.o_mother_name, owner.o_dob, 
                    owner.o_nid, owner.o_holding_no, owner.o_blood_group, owner.o_mobile, owner.p_division, owner.p_sub_division, 
                    owner.p_ward_no, owner.p_vill, owner.c_division, owner.c_sub_division, owner.c_ward_no, owner.c_vill, 
                    owner.o_photo_path, owner.entry_date, owner.PermanentAddress,	settings_ward_no.ward_no, settings_area.area 
                    FROM `owner` 
                    INNER JOIN settings_ward_no ON settings_ward_no.ward_no_id = owner.c_ward_no 
                    INNER JOIN settings_area ON settings_area.area_id = owner.c_vill 
                    WHERE $WardNo $Area $OwnerName $NID $RegNo $Mobile $cDivision $cSubDivision 1 = 1 ORDER BY owner.o_id ASC";
        
        $result = $crud->getData($query);
        return $result;
    }

    public function GetAllOwnerTransfer($WardNo,$Area,$cDivision,$cSubDivision,$Status,$Start_date,$End_date) // GET ALL Owner
    {

		//$WardNo = "%".$WardNo."%";   
		//$Area = "%".$Area."%";	

        $crud = new Crud();
        
        $query = "";
    
        $WardNo = !empty($WardNo) ? "owner.c_ward_no = '$WardNo' and " : "";
        $Area = !empty($Area) ? "owner.c_vill = '$Area' and " : "";
        $cDivision = !empty($cDivision) ? "owner.c_division = '$cDivision' and " : "";
        $cSubDivision = !empty($cSubDivision) ? "owner.c_sub_division = '$cSubDivision' and " : "";
        $Status0 = ($Status == 0 ) ? "payment_date is null and " : "";
        $Status1 = ($Status == 1 ) ? "payment_date is not null and " : "";
        $Status2 = ($Status == 2 ) ? "" : "";
        $date = !empty($Start_date) && !empty($End_date)? "o_transfer_date between '$Start_date'  and '$End_date' and " : "";

        $query = "SELECT owner_transfer.otbl_code, owner_transfer.reg_no, 
                (select owner.o_name from owner where o_id=current_owner) current_owner_name, 
                (select owner.o_name from owner where o_id=previous_owner) previous_owner_name,
                (select owner.o_code from owner where o_id=current_owner) current_owner_code, 
                (select owner.o_code from owner where o_id=previous_owner) previous_owner_code,
                o_transfer_date, payment_date, owner_transfer_fee  FROM owner_transfer
                left join owner on owner.o_id = owner_transfer.current_owner
                left JOIN settings_area ON settings_area.area_id = owner.c_vill
                WHERE $WardNo $Area $cDivision $cSubDivision $Status0 $Status1 $Status2 $date 1 = 1 ORDER BY owner.o_id ASC";
        
        $result = $crud->getData($query);
        return $result;
    }

    public function GetALLDivAndSubDiv(){
        $crud  = new Crud();
        $query = "SELECT settings_division.division_id, settings_division.division, settings_sub_division.sub_division_id, ".
                "settings_sub_division.sub_division FROM settings_division ".
                "INNER JOIN settings_sub_division on settings_division.division_id = settings_sub_division.division_id ORDER BY settings_division.division_id ASC";
        $result = $crud->getData($query);
        return $result;
    }

    public function GetAllDriver($WardNo,$Area,$DriverName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision) // GET ALL Driver
    {
        $crud = new Crud();
        $WardNo = !empty($WardNo) ? "driver.c_ward_no = '$WardNo' and " : "";
        $Area = !empty($Area) ? "driver.c_vill = '$Area' and " : "";
        $DriverName = !empty($DriverName) ? "driver.d_name_eng like '%$DriverName%' and " : "";
        $NID =  !empty($NID) ? "driver.d_nid like '%$NID%' and " : "";
        $RegNo = !empty($RegNo) ? "driver.d_code like '%$RegNo%' and " : "";
        $Mobile = !empty($Mobile) ? "driver.d_mobile like '%$Mobile%' and " : "";
        $cDivision = !empty($cDivision) ? "driver.c_division = '$cDivision' and " : "";
        $cSubDivision = !empty($cSubDivision) ? "driver.c_sub_division = '$cSubDivision' and " : "";
        
        $query = "SELECT driver.d_id,driver.d_code,driver.d_name,driver.d_father_name,driver.d_mother_name,
                    driver.d_blood_group,driver.d_dob,driver.d_nid,driver.d_holding_no,driver.d_mobile,driver.d_license_no,driver.p_division,
                    driver.p_sub_division,driver.p_ward_no,driver.p_vill,driver.c_division,driver.c_sub_division,
                    driver.c_sub_division,driver.c_ward_no,driver.c_vill,driver.PermanentAddress,driver.d_photo_path,
                    driver.entry_date,settings_ward_no.ward_no,settings_area.area
                    FROM driver
                    INNER JOIN settings_ward_no on driver.c_ward_no = settings_ward_no.ward_no_id
                    INNER JOIN settings_area on driver.c_vill = settings_area.area_id
                    WHERE $WardNo $Area $DriverName $NID $RegNo $Mobile $cDivision $cSubDivision 1=1 ORDER BY driver.c_ward_no ASC";
    
        $result = $crud->getData($query);
        return $result;
    }

    public function GetAllVehicleRpt($ownerName, $NID, $RegNo, $Mobile, $cDivision, $cSubDivision, $WardNo, $Area,$Status){
        $crud  = new Crud();

        $ownerName = !empty($ownerName) ? "owner.owner_name_eng like '%$ownerName%' and " : "";
        $NID =  !empty($NID) ? "owner.o_nid like '%$NID%' and " : "";
        $RegNo = !empty($RegNo) ? "owner.o_code like '%$RegNo%' and " : "";
        $Mobile = !empty($Mobile) ? "owner.o_mobile like '%$Mobile%' and " : "";
        $cDivision = !empty($cDivision) ? "owner.c_division = '$cDivision' and " : "";
        $cSubDivision = !empty($cSubDivision) ? "owner.c_sub_division = '$cSubDivision' and " : "";
        $WardNo = !empty($WardNo) ? "owner.c_ward_no = '$WardNo' and " : "";
        $Area = !empty($Area) ? "owner.c_vill = '$Area' and " : "";
        $Status0 = $Status == 0 ? " issue_date is null and " : "";
        $Status1 = $Status == 1 ? " issue_date is not null and " : "";
        $Status2 = $Status == 2 ? "  " : "  ";

        $query = "select * from ( SELECT vehicle.v_id,vehicle.v_code,vehicle.o_id,owner.o_code,owner.o_father_name,owner.o_mother_name,owner.o_nid, owner.o_name,owner.PermanentAddress,owner.o_mobile,vehicle.v_model,vehicle.v_color,vehicle.v_reg_no,vehicle.v_reg_date,vehicle.v_detail,vehicle.entry_date, owner.owner_name_eng,(SELECT issue_date FROM vehicle_card_issue where vehicle_card_issue.v_code = vehicle.v_code order by issue_date desc limit 1) issue_date
                FROM vehicle INNER JOIN owner 
                on vehicle.o_id = owner.o_id 
                where $ownerName $NID $RegNo $Mobile $cDivision $cSubDivision $WardNo $Area 1=1
                ORDER BY vehicle.v_reg_no ASC ) a where $Status0 $Status1 $Status2 1=1";

        $result = $crud->getData($query);
        return $result;
    }
    public function GetAllFiscalYearRpt(){
        $crud  = new Crud();
        $query = "SELECT DISTINCT(fiscal_year) from bill";
        $result = $crud->getData($query);
        return $result;
    }

    public function GetAllBillRpt($WardNo,$Area,$Status, $Start_date, $End_date) // GET Get All Bill BY WardNo , Area ,Status AND Date
    {
        $WardNo = "%".$WardNo."%";
        $Area = "%".$Area."%";
        $crud = new Crud();

        if( $Status == 0 ){ $billStatus = "AND bill.status = 0"; }
        else if($Status == 1) { $billStatus = "AND bill.status = 1"; }
        else {$billStatus = "";}

            $query = 
                    "SELECT bill.bill_id,bill.bill_code,bill.fiscal_year,bill.v_reg_no,owner.o_id,owner.o_name, ".
                    "owner.c_ward_no,owner.c_vill,settings_ward_no.ward_no,settings_area.area,bill.reg_date, ".
                    "bill.expired_date,bill.reg_fee,bill.arrear,bill.sur_charge,bill.total,bill.due,bill.status, ".
                    "bill.payment_date,bill.entry_date,bill.b_id,bill.ac_id,account.ac_name,bank.b_name ".
                    "FROM bill ".
                    "LEFT JOIN account on bill.ac_id = account.ac_id ".
                    "LEFT JOIN bank on bill.b_id = bank.b_id ".
                    "INNER JOIN vehicle on vehicle.v_reg_no = bill.v_reg_no ".
                    "INNER JOIN owner on owner.o_id = vehicle.o_id ".
                    "INNER JOIN settings_ward_no on settings_ward_no.ward_no_id = owner.c_ward_no ".
                    "INNER JOIN settings_area on settings_area.area_id = owner.c_vill ".
                    "WHERE owner.c_ward_no LIKE '" . $WardNo . "' AND owner.c_vill LIKE '" . $Area . "' AND ".
                    "bill.entry_date BETWEEN '$Start_date' AND '$End_date' $billStatus ORDER BY bill.v_reg_no ASC";
        $result = $crud->getData($query);
        return $result;
    }

    public function GetTotalLicences($WardNo,$Area){
        $WardNo = "%".$WardNo."%";
        $Area = "%".$Area."%";

        $crud = new Crud();
        $query = "SELECT vehicle.v_id,vehicle.v_code,vehicle.v_reg_no,vehicle.v_model,vehicle.v_color,vehicle.v_reg_date,".
                 "vehicle.v_detail,vehicle.entry_date,vehicle.update_date, vehicle.o_id, owner.o_name, ".
                 "settings_ward_no.ward_no,settings_area.area ".
                 "FROM vehicle ".
                 "INNER JOIN owner on owner.o_id = vehicle.o_id ".
                 "LEFT JOIN settings_ward_no on settings_ward_no.ward_no_id =owner.c_ward_no ".
                 "LEFT JOIN settings_area on settings_area.area_id = owner.c_vill ".
                 "WHERE owner.c_ward_no like '" . $WardNo . "' AND owner.c_vill like '" . $Area . "'  ORDER BY owner.c_ward_no ASC";

        $result = $crud->getData($query);
        return $result;
    }
}