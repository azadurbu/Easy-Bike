<?php
require_once "aBase.php";


class ActionBank
{

    public $URL;
    function __construct() 
    {
        $aBase = new ActionBase();
        $BaseURL = $aBase->BaseURL();

        $this->URL = $BaseURL."API/ApiHendlar_Bank.php?";
    }

    function GetAllBank() // Get All Bank
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllBank";
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

    function GetAllAccount() // Get All Account
    {
        $message = "";

        //Server url
        $url = $this->URL."action=GetAllAccount";
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
}



?>