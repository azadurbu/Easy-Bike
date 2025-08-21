<?php 

require_once 'Privilage.php';
require_once "Action/aBase.php";
$aBase = new ActionBase();
$BaseURL = $aBase->BaseURL();
// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

header('location: '.$BaseURL.'index.php');

?>