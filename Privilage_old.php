<?php 
ob_start();
session_start();
require_once "Action/aBase.php";
$aBase = new ActionBase();
global $BaseURL;
$BaseURL = $aBase->BaseURL();

//echo "Access : ";
$_SESSION['UserID'];


if(!$_SESSION['UserID']) 
{
	header('location: '.$BaseURL.'index.php');	
} 



?>