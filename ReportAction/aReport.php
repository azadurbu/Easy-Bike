<?php
require_once "../../Action/aBase.php";

class ActionReport
{
	public $URL;

    function GetAllOwner($WardNo, $Area,$OwnerName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision) // GET ALL Owner
    {
        $aBase =new ActionBase();
        $BaseURL = $aBase->BaseURL();
        
        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";

        $message = "";

        //Server url
        $url = $this->URL."action=GetAllOwner";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
             'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( 
                        "WardNo" => $WardNo , 
                        "Area" => $Area,
                        "OwnerName" => $OwnerName,
                        "NID" => $NID,
                        "RegNo" => $RegNo,
                        "Mobile" => $Mobile,
                        "cDivision" => $cDivision,
                        "cSubDivision" => $cSubDivision 
                    );
        $data_string = json_encode($data); 
        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                                     
        
        // Get response
        $response = curl_exec($ch);
        //echo "<br/><br/>";
        $result = json_decode($response, TRUE);

        return $result;
    }

    function GetAllOwnerTransfer($WardNo,$Area,$cDivision,$cSubDivision,$Status,$Start_date,$End_date) // GET ALL Owner
    {
        $aBase =new ActionBase();
        $BaseURL = $aBase->BaseURL();
        
        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";

        $message = "";

        //Server url
        $url = $this->URL."action=GetAllOwnerTransfer";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
             'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( 
                        "WardNo" => $WardNo , 
                        "Area" => $Area,
                        "cDivision" => $cDivision,
                        "cSubDivision" => $cSubDivision,
                        "Status" => $Status, 
                        "Start_date" => $Start_date,
                        "End_date" => $End_date,
                    );
        $data_string = json_encode($data); 
        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                                     
        
        // Get response
        $response = curl_exec($ch);
        //echo "<br/><br/>";
        $result = json_decode($response, TRUE);

        return $result;
    }


    function GetALLDivAndSubDiv() // Get All Bank
    {
        $aBase =new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";
        $message = "";

        //Server url
        $url = $this->URL."action=GetALLDivAndSubDiv";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );

        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Get response
        $response = curl_exec($ch);

        $result = json_decode($response, TRUE);

        return $result;
    }

    function GetAllDriver($WardNo, $Area, $DriverName,$NID,$RegNo,$Mobile,$cDivision,$cSubDivision) // GET ALL Driver
    {
        $aBase =new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";

        $message = "";

        //Server url
        $url = $this->URL."action=GetAllDriver";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( 
            "WardNo" => $WardNo , 
            "Area" => $Area,
            "DriverName" => $DriverName,
            "NID" => $NID,
            "RegNo" => $RegNo,
            "Mobile" => $Mobile,
            "cDivision" => $cDivision,
            "cSubDivision" => $cSubDivision
        );
        $data_string = json_encode($data);
        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Get response
        $response = curl_exec($ch);
        //echo "<br/><br/>";
        $result = json_decode($response, TRUE);

        return $result;
    }

    function GetAllVehicleRpt($ownerName, $NID, $RegNo, $Mobile, $cDivision, $cSubDivision, $WardNo, $Area, $Status) // Get All Vehicle
    {
        $aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllVehicleRpt";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        $data = array( 
            "ownerName" => $ownerName , 
            "NID" => $NID,
            "RegNo" => $RegNo,
            "Mobile" => $Mobile,
            "cDivision" => $cDivision,
            "cSubDivision" => $cSubDivision,
            "WardNo" => $WardNo,
            "Area" => $Area,
            "Status" => $Status
        );
        $data_string = json_encode($data); 
        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Get response
        $response = curl_exec($ch);

        $result = json_decode($response, TRUE);
        
        return $result;
    }

    function GetAllFiscalYearRpt() // Get All FiscalYear
    {
        $aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllFiscalYearRpt";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );

        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Get response
        $response = curl_exec($ch);

        $result = json_decode($response, TRUE);

        return $result;
    }

    function GetAllBillRpt($WardNo, $Area,$Status,$Start_date,$End_date) // GET Get All Bill BY Status AND Date
    {
        $aBase =new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";

        $message = "";

        //Server url
        $url = $this->URL."action=GetAllBillRpt";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "WardNo" => $WardNo , "Area" => $Area, "Status" => $Status , "Start_date" => $Start_date, "End_date" => $End_date );
        $data_string = json_encode($data);
        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Get response
        $response = curl_exec($ch);
        //echo "<br/><br/>";
        $result = json_decode($response, TRUE);
        return $result;
    }

    function GetTotalLicences($WardNo, $Area) // GET ALL Owner
    {
        $aBase =new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."ReportAPI/ApiHendlar_Report.php?";

        $message = "";

        //Server url
        $url = $this->URL."action=GetTotalLicences";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "WardNo" => $WardNo , "Area" => $Area );
        $data_string = json_encode($data);
        // Send request to Server
        $ch = curl_init($url);
        // To save response in a variable from server, set headers;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Get response
        $response = curl_exec($ch);
        //echo "<br/><br/>";
        $result = json_decode($response, TRUE);

        return $result;
    }
}
?>