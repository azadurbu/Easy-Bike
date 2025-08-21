<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerList = $aOwner->GetAllOwner();

global $msg;
$Add = $ChildModuleAccessList[0]->Add;


?>


<!-- page content -->

 

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3> হিসাবের খাত  </h3>

				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
								<h4> </h4>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>

						<div class="container">

							<ul class="nav nav-pills">
								<li class="active"><a data-toggle="pill" href="#SurCharge"> সারচার্জ </a></li>
								<li><a data-toggle="pill" href="#OwnerRegistrationFee">মালিকের রেজিস্ট্রেশন/নবায়ন ফি </a></li>
								<li><a data-toggle="pill" href="#DriverRegistrationFee">চালকের রেজিস্ট্রেশন/নবায়ন ফি </a></li>
								<li><a data-toggle="pill" href="#OwnerTransferFee"> মালিকানা পরিবর্তনের ফি </a></li>
								<!-- <li><a data-toggle="pill" href="#OwnerCardFee"> মালিকের কার্ড ফি </a></li> -->
								<!-- <li><a data-toggle="pill" href="#DriverCardFee"> চালকের কার্ড ফি </a></li> -->
							</ul>
														
							<div class="tab-content">
								<div id="SurCharge" action="#SurCharge" class="tab-pane active">
								    
									<?php 
									 include 'Views/_SurCharge.php';
									 echo '<a href="#SurCharge"></a>';
									?>
									
								</div>

								<div id="OwnerRegistrationFee" class="tab-pane fade">
									<?php 
									 include 'Views/_OwnerRegistrationFee.php';
									 echo '<a href="#OwnerRegistrationFee"></a>';
									?>
								</div> 

								<div id="DriverRegistrationFee" class="tab-pane fade">
									<?php 
									 include 'Views/_DriverRegistrationFee.php';
									 echo '<a href="#DriverRegistrationFee"></a>';
									?>
								</div> 

								<div id="OwnerTransferFee" class="tab-pane fade">
									<?php 
									 include 'Views/_OwnerTransferFee.php';
									 echo '<a href="#OwnerTransferFee"></a>';
									?>
								</div>

							</div>

						</div>	
								
	    	    	</div>
		   	 	</div>
	   		</div>
		</div>
	</div>		
<!-- /page content -->

