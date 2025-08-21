<?php
require_once "aBase.php";

class ActionDriver
{
    public $URL;

    function __construct()
    {
        $aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."API/ApiHendlar_Driver.php?";
    }


    function GetAllDriver() // Check User Id and Password
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllDriver";
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

    function GetDriverCardFee()
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetDriverCardFee";

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
        //echo "<br/><br/>";
        $result = json_decode($response, TRUE);
        return $result;
    }

    function UpdateDriverCardFee($DriverFee)
    {
        $message = "";

        //Server url
        $url = $this->URL."action=UpdateDriverCardFee";

        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        // Request BODY
        $data = array( "DriverFee" => $DriverFee);
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

    function GetAllDriverBill() // Get All Driver Bill List
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllDriverBill";
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

    function GetAllDriverBillPrint($i) // Get All Driver Bill List
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllDriverBillPrint";
        $apiKey = '123456789'; // should match with Server key
        $headers = array(
            'App_Key: '.$apiKey
        );
        $data = array( "id" => $i);
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

}



?>