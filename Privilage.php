<?php 
ob_start();
session_start();
require_once "Action/aBase.php";
global $BaseURL;
global $UserID;
global $ParentModuleList;

$aBase = new ActionBase();
$BaseURL = $aBase->BaseURL();

//echo "Access : ".$UserID = $_SESSION['UserID'];


if(!$_SESSION['UserID']) 
{
	header('location: '.$BaseURL.'index.php');	
} 
else
{

	require_once './User/UserAction/aUser.php';
	$aUser = new ActionUser();
	$AccessParentModule = $aUser->GetParentModuleAccessByID($_SESSION['UserID']);
	$ParentModuleList = json_decode($AccessParentModule["ParentModuleAccess"]);
	
	
	$AccessChildModule = $aUser->GetChildModuleAccessByID($_SESSION['UserID']);
	$ChildModuleAccessList = json_decode($AccessChildModule["ChildModuleAccess"]);

    require_once "Action/aCommon.php";
    $aCommon = new ActionCommon();
    $Municipality = $aCommon->GetMunicipality();
	

}



?>