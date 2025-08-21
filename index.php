<?php
ob_start();
session_start();

require_once "Action/aBase.php";
$aBase = new ActionBase();
$BaseURL = $aBase->BaseURL();

include 'User/UserAction/aUser.php';
$aUser = new ActionUser();
$errors = array();

if($_POST) 
{		

	$UserID = $_POST['UserID'];
	$Password = $_POST['Password'];


	if(empty($UserID) || empty($Password))
	{
		if($UserID == "") {
			$errors[] = "User ID is required";
		} 

		if($Password == "") {
			$errors[] = "Password is required";
		}
	} 
	else 
	{
		$message = $aUser->UserLogin($UserID, $Password);

		if ($message=="Active") 
		{
                
				$_SESSION['UserID'] = $UserID;

				header('location: '.$BaseURL.'Dashboard.php');	
		}
		else
		{
			$errors[] = $message;
		}		
	} 
	
}




?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Easy Bike! | </title>

        <!-- Bootstrap -->
        <link href="Theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="Theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="Theme/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="Theme/vendors/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="Theme/build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="login">
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
              	    <div class="messages">
    					<?php 

    						if($errors) 
    						{
    							foreach ($errors as $key => $value) 
                                {
    								echo    '<div class="alert alert-warning" role="alert">
    									       <i class="glyphicon glyphicon-exclamation-sign"></i>
    									    '.$value.'</div>';										
    							}
    						} 
    					?>
    			    </div>
					<h1 style="font-size: 60px;padding: 40px;font-weight: 700;">EasyBike</h1>
                    <form class="form-horizontal" action="" method="post" id="loginForm">
                        <h1>Login Form</h1>
                      	<div>
                        	<input type="text" id="UserID" name="UserID" class="form-control" placeholder="User ID" required="" />
                      	</div>
                      	<div>
                        	<input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required="" />
                      	</div>
                      	<div>
                       	 	<button type="submit" class="btn btn-default submit" ><i class="glyphicon glyphicon-log-in"></i> Log in</button>
                      	</div>
                    </form>
              </section>
            </div>
        </div>
    </body>
</html>
