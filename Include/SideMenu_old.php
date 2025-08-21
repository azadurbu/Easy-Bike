
<body class="nav-md">
	<div class="container body">
	  	<div class="main_container">
			<div class="col-md-3 left_col">
		  		<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
			  			<a href="./Dashboard.php" class="site_title"><img style="height: 40px; width: 40px;"  src="images/favicon.ico"><span> Easy Bike</span></a>
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
							<h3>Resource</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-user-secret"></i> মালিকের তথ্য <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
												<li><a href="./Owner.php">সকল মালিকের তালিকা</a></li>
									</ul>
								</li>
					
								<li><a><i class="fa fa-automobile"></i> গাড়ির তথ্য <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./Vehicle.php">সকল গাড়ির তালিকা</a></li>
									</ul>
								</li>
					
								<li><a><i class="fa fa-user-plus"></i> চালকের তথ্য <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./Driver.php">সকল চালকের তালিকা</a></li>
									</ul>
								</li>
	
							</ul>
			  			</div>

			  			<div class="menu_section">
							<h3>Operation</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-usd"></i> বিল <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./GenerateBill.php">জেনারেট বিল</a></li>

										<li><a href="./AllBill.php">সকল বিল</a></li>
										<li><a href="./DriverCardBill.php">কার্ড বিল</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-exchange"></i> মালিকানা পরিবর্তন <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./OwnerTransfer.php"> মালিকানা পরিবর্তনের তালিকা </a></li>
									</ul>
								</li>
							</ul>

			  			</div>

			  	 		<div class="menu_section">
							<h3>SETTINGS</h3>

							<ul class="nav side-menu">

								<li><a><i class="fa fa-gear"></i> প্রাথমিক সেটআপ <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./SetMunicipality.php"> পৌরসভা </a></li>
										<li><a href="./FiscalYear.php">অর্থ বছর</a></li>
										<li><a href="./RegistrationFee.php"> রেজিস্ট্রেশন ফি </a></li>
										<li><a href="./DriverCardFee.php"> কার্ড ফি </a></li>
										<li><a href="./SurCharge.php"> সারচার্জ </a></li>
									</ul>
								</li>

								<li><a ><i class="fa fa-university"></i> ব্যাংক <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./SetBank.php">ব্যাংক তালিকা </a></li>
										<li><a href="./SetAccount.php">একাউন্ট তালিকা </a></li>
									</ul>
								</li>

								<li><a ><i class="fa fa-map-marker"></i> লোকেশন <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./SetDivision.php">জেলা</a></li>
										<li><a href="./SetSubDivision.php">পৌরসভা</a></li>
										<li><a href="./SetWardNo.php">ওয়ার্ড নং</a></li>
										<li><a href="./SetArea.php">এলাকা/মহল্লা</a></li>
									</ul>
								</li>

								<li><a><i class="fa fa-users"></i> ইউজার <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./SetUserType.php">ইউজার টাইপ তালিকা</a></li>
										<li><a href="./SetUser.php"> সকল ইউজারের তালিকা </a></li>
										<li><a href="./SetUserAccessParent.php"> ইউজার পারমিশন - Parent Module </a></li>
										<li><a href="./SetUserAccessChild.php"> ইউজার পারমিশন - Child Module </a></li>
									</ul>
								</li>

							</ul>
			  			</div>

			  			<div class="menu_section">
                            <h3>REPORTS</h3>

                            <ul class="nav side-menu">

                                <li><a><i class="fa fa-book"></i>রিপোর্ট <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="./RptOwner.php">সকল মালিকের তথ্যসমূহ</a></li>
                                        <li><a href="./RptDriver.php">সকল ড্রাইভারের তথ্যসমূহ</a></li>
                                        <li><a href="./RptVehicle.php">সকল গাড়ির তথ্যসমূহ</a></li>
                                        <li><a href="./RptBill.php">বিলের তথ্যসমূহ</a></li>
                                        <!--<li><a href="./RptAnnualDemand.php">লাইসেন্সের বাৎসরিক ডিমান্ড</a></li>
                                        <li><a href="./RptDemandAndCollection.php">লাইসেন্সের ডিমান্ড এবং আদায়</a></li>
                                        <li><a href="./RptRenewedLicenses.php">নবায়নকৃত লাইসেন্সের রিপোর্ট</a></li>
                                        <li><a href="./RptDefaulterLicenses.php">খেলাপি লাইসেন্সের রিপোর্ট</a></li>-->
                                        <li><a href="./RptTotalLicensesNo.php">মোট লাইসেন্সের সংখ্যা</a></li>
                                    </ul>
                                </li>
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

					 	<ul class="nav navbar-nav navbar-right">
							<li class="">
							  	<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="" alt=""><?php echo $_SESSION['UserID']; ?>
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
									<li><a href="Logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
							  	</ul>
							</li>
					 	</ul>
					</nav>
			  	</div>
			</div>
		<!-- /top navigation -->