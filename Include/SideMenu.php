<?php
	//var_dump($ParentModuleList);
	$OwnerInfo = $ParentModuleList[0]->Status;
	$VehicleInfo = $ParentModuleList[1]->Status;
	$DriverInfo = $ParentModuleList[2]->Status;
	$Bill = $ParentModuleList[3]->Status;
	$OwnerTransfer = $ParentModuleList[4]->Status;
	$Setup = $ParentModuleList[5]->Status;
	$Bank = $ParentModuleList[6]->Status;
	$Location = $ParentModuleList[7]->Status;
	$User = $ParentModuleList[8]->Status;
	$Report = $ParentModuleList[9]->Status;
?>
<body class="nav-md">
	<div class="container body">
	  	<div class="main_container">
			<div class="col-md-3 left_col">
		  		<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
			  			<a href="./Dashboard.php" class="site_title"><img style="height: 40px; width: 53px;"  src="images/favicon.ico"><span> Easy Bike</span></a>
					</div>
					<div class="clearfix"></div>
			<!-- menu profile quick info -->
					<!--<div class="profile clearfix">-->

				 <!-- 		<div class="profile_info">-->
					<!--		<span>Welcome,</span>-->
					<!--		<h2><?php //echo $_SESSION['UserID']; ?></h2>-->
				 <!-- 		</div>-->
					<!--</div>-->
			<!-- /menu profile quick info -->

					<br />

			<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			  			<div class="menu_section">
							<!-- <h3>Resource</h3> -->
							<ul class="nav side-menu">
				<?php 
					if($OwnerInfo)
					{
				?>
							
					<li>
					<a href="./Owner.php" ><i class="fa fa-user-secret"></i> মালিকের তথ্য </a>
					</li>
				<?php
					}
					
					if($VehicleInfo)
					{
				?>
					
								<li>
									<a href="./Vehicle.php" ><i class="fa fa-automobile"></i> গাড়ির তথ্য </a>
								</li>

				<?php
					}
					
					if($DriverInfo)
					{
				?>	
								
								<li>
									<a href="./Driver.php" ><i class="fa fa-user-plus"></i> চালকের তথ্য </a>
								</li>

				<?php
					}
				?>	
							</ul>
			  			</div>

			  			<div class="menu_section">
							<!-- <h3>Operation</h3> -->
							<ul class="nav side-menu">
				<?php 
					if($Bill)
					{
				?>
					
					<li><a><i class="fa fa-usd"></i> বিল <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
                                        <li><a href="./OwnerCardBill.php">গাড়ীর বিল</a></li>
										<li><a href="./DriverCardBill.php">চালকের বিল</a></li>
									</ul>
								</li>
				<?php
					}
					
					if($OwnerTransfer)
					{
				?>
								<li>
									<a href="./OwnerTransfer.php" ><i class="fa fa-exchange"></i> মালিকানা পরিবর্তন </a>
								</li>
				<?php
					}
				?>	
							</ul>

			  			</div>

						  <div class="menu_section">
                            <!-- <h3>REPORTS</h3> -->

                            <ul class="nav side-menu">
				<?php 
					if($Report)
					{
				?>
                                <li><a><i class="fa fa-book"></i>রিপোর্ট <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="./RptOwner.php">মালিকের তথ্য</a></li>
										<li><a href="./RptVehicle.php">গাড়ির তথ্য</a></li>
                                        <li><a href="./RptDriver.php">চালকের তথ্য</a></li> 
										<!-- <li><a href="#"> ভেরিফিকেশন তালিকা </a></li> -->
										<li><a href="./RptBill.php">সকল বিল</a></li>
										<li><a href="./OwnerTransferReport.php"> মালিকানা পরিবর্তনের তালিকা </a></li>
										
									
                                    </ul>
                                </li>
        		<?php
					}
				?>	
                            </ul>
                        </div>

			  	 		<div class="menu_section">
							<!-- <h3>SETTINGS</h3> -->
							<ul class="nav side-menu">

				<?php 
					if($Bank)
					{
				?>
								<li><a><i class="fa fa-gear"></i> সেটিংস<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
	
				<?php
					
					if($Bank)
					{
				?>	
								<li>
									<a href="./SetAccount.php" ><i class="fa fa-file-text"></i> একাউন্টস সেটিংস </a>
								</li>
				<?php
					}

					if($Bank)
					{
				?>	
								
								<li>
									<a href="./SetBank.php" ><i class="fa fa-university"></i> ব্যাংক একাউন্টস </a>
								</li>


				<?php 
					}
					if($Setup)
					{
				?>
								<li>
								  <a href="HishaberKhaat.php" target="_blank"><i class="fa fa-gear"></i> হিসাবের খাত </a>
								</li>
									
								<li>
								  <a href="Billissuedate.php" target="_blank"><i class="fa fa-calendar"></i> বিল ইস্যু তারিখ </a>
								</li>			
								
				<?php
					}
					
					if($Location)
					{
				?>	
								<li><a ><i class="fa fa-map-marker"></i> লোকেশন সেটিংস <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./SetDivision.php">উপজেলা</a></li>
										<li><a href="./SetSubDivision.php">পৌরসভা</a></li>
										<li><a href="./SetWardNo.php">ওয়ার্ড নং</a></li>
										<li><a href="./SetArea.php">এলাকা/মহল্লা</a></li>
									</ul>
								</li>
				<?php
					}

				?>
				<li>
					<a href="database-backup.php"><i class="fa fa-gear"></i>ডাটাবেস ব্যাকআপ</a>
				</li>
							</ul>
			  			</div>

						  <?php
					}
				?>	
                         	  

						  <div class="menu_section">
							<!-- <h3>User</h3> -->
							<ul class="nav side-menu">

				<?php		
					if($User)
					{
				?>	
									<li><a><i class="fa fa-users"></i> ইউজার <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./SetUserType.php">ইউজার টাইপ</a></li>
										<li><a href="./SetUser.php"> ইউজার </a></li>
										<li><a href="./SetUserAccessParent.php"> ইউজার পারমিশন - Parent Module </a></li>
										<li><a href="./SetUserAccessChild.php"> ইউজার পারমিশন - Child Module </a></li>
									</ul>
								    </li>
				<?php
					}
				?>	
							</ul>
			  			</div>

						  

			  			

					</div>
			<!-- /sidebar menu -->
		  		</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
			  	<div class="nav_menu">
					<nav>
					  	<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					
	           
					 	</div>
					 	
	         
	                        
	               
					 	<ul class="nav navbar-nav navbar-right" style="width:20%;">
					 	    
							<li class="">
							  	<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<?php echo $_SESSION['UserID']; ?>
									<span class=" fa fa-angle-down"></span>
							  	</a>
							  	<ul class="dropdown-menu dropdown-usermenu pull-right">
									<!--<li><a href="javascript:;"> Profile</a></li>-->
									<!--<li>-->
								 <!--	 	<a href="javascript:;">-->
									<!--	<span class="badge bg-red pull-right">50%</span>-->
									<!--	<span>Settings</span>-->
								 <!-- 		</a>-->
									<!--</li>-->
									<!--<li><a href="javascript:;">Help</a></li>-->
									<li><a href="./UserManual.pdf" target="_blank"><i class="fa fa-book pull-right"></i> User Manual</a></li>
									<li><a href="Logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
							  	</ul>
							</li>
					 	</ul>
				
					</nav>
					<div class="container">
                        <div class="row pouro-name" style="padding:5px;">
                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12" align="right" >
                                <img style="height:50px; width:50px;" src="Content/Other/khagrachari-logo.gif">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12" style="padding:5px;">
                                <label style="font-size:30px; color:white;" ><?php echo $Municipality[0]["m_name"]; ?><label>
                            </div>
                        </div>
						<div class="quick-access">
							<ul>
								<li><a href="OwnerAdd.php">মালিকের তথ্য <i class="fa fa-plus-square"></i></a></li>
								<li><a href="VehicleAdd.php">গাড়ীর তথ্য <i class="fa fa-plus-square"></i></a></li>
								<li><a href="DriverAdd.php">চালকের তথ্য <i class="fa fa-plus-square"></i></a></li>
								<!-- <li><a href="#about">ভেরিফিকেশন <i class="fa fa-plus-square"></i></a></li> -->
								<li><a href="GenerateBill.php">জেনারেট বিল <i class="fa fa-plus-square"></i></a></li>
								<li><a href="AddOwnerTransfer.php">মালিকানা পরিবর্তন করুন <i class="fa fa-plus-square"></i></a></li>
								<li><a href="AddAnyBill.php">বিল যুক্ত করুন <i class="fa fa-plus-square"></i></a></li>
							</ul>
						</div>
                    </div>
			
			  	</div>
			  	
			</div>
		<!-- /top navigation -->
<style>
.quick-access ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #feb61b;
}

.quick-access li {
  float: left;
}

.quick-access li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.quick-access li a:hover {
  background-color: #333333;
}
</style>