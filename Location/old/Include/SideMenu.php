
<body class="nav-md">
	<div class="container body">
	  	<div class="main_container">
			<div class="col-md-3 left_col">
		  		<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
			  			<a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Easy Bike Solution</span></a>
					</div>
					<div class="clearfix"></div>
			<!-- menu profile quick info -->
					<div class="profile clearfix">
			  			<!-- <div class="profile_pic">
							<img src="images/img.jpg" alt="..." class="img-circle profile_img">
			  			</div> -->
				  		<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php echo $_SESSION['UserID']; ?></h2>
				  		</div>
					</div>
			<!-- /menu profile quick info -->

					<br />

			<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			  			<div class="menu_section">
							<h3>Resource</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-edit"></i> মালিকের তথ্য <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
								<!-- 		<li><a href="./AddOwner.php">নতুন মালিক যোগ করুন</a></li> -->
										<li><a href="./Owner.php">সকল মালিকের লিস্ট</a></li>
									</ul>
								</li>
					
								<li><a><i class="fa fa-edit"></i> গাড়ির তথ্য <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./Vehicle.php">সকল গাড়ির লিস্ট</a></li>
									</ul>
								</li>
					
								<li><a><i class="fa fa-edit"></i> চালকের তথ্য <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./Driver.php">সকল চালকের লিস্ট</a></li>
									</ul>
								</li>
							<!--
								<li><a><i class="fa fa-edit"></i> Product <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./CreateProduct.php">Create Product</a></li>
										<li><a href="./ProductList.php">Product List</a></li>
									</ul>
								</li>
								
								<li><a><i class="fa fa-edit"></i> Supplier <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./CreateSupplier.php">Create Supplier</a></li>
										<li><a href="./SupplierList.php">Suppplier List</a></li>
									</ul>
								</li>
								
								<li><a><i class="fa fa-edit"></i> Customer <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./CreateCustomer.php">Create Customer</a></li>
										<li><a href="./CustomerList.php">Customer List</a></li>
									</ul>
								</li>
							--> 
							</ul>
			  			</div>

			  			<div class="menu_section">
							<h3>Operation</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-edit"></i> বিল <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="./GenerateBill.php">জেনারেট বিল</a></li>
											<li><a href="./BillPosting.php">বিল পোস্টিং</a></li>
											<li><a href="./BillPosting.php">সকল বিল</a></li>
										</ul>
								</li>
							</ul>
						<!-- 	<ul class="nav side-menu">
								<li><a><i class="fa fa-desktop"></i> লাইসেন্স নবায়ন <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./IssueLicense.php">সকল লাইসেন্স নবায়ন</a></li>
									</ul>  
								</li> 				
							</ul> -->
			  			</div>
<!-- 			  
			  			<div class="menu_section">
							<h3>Reports</h3>
							
							<ul class="nav side-menu">
								<li><a><i class="fa fa-desktop"></i> Stock <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./AllStockList.php">All Stock List</a></li>
									</ul>  
								</li> 				
							</ul>
							
			  			</div> -->

			  	 		<div class="menu_section">
							<h3>Settings</h3>

							<ul class="nav side-menu">
<!--								<li><a ><i class="fa fa-group"></i> User <span class="fa fa-chevron-down"></span></a>-->
<!--									<ul class="nav child_menu">-->
<!--										<li><a href="./AllUserType.php">User Type</a></li>-->
<!--										<li><a href="./AllUser.php">All User</a></li>-->
<!--										<li><a href="./AllUserAccess.php">User Access</a></li>-->
<!--									</ul>-->
<!--								</li>-->
								<li><a ><i class="fa fa-map-marker"></i> Location <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="./Location/SetDivision.php">জেলা</a></li>
										<li><a href="./Location/SetSubDivision.php">Sub-Division</a></li>
										<li><a href="./Location/SetWardNo.php">Ward No</a></li>
										<li><a href="./Locayion/SetArea.php">Area</a></li>
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
									<li><a href="javascript:;"> Profile</a></li>
									<li>
								 	 	<a href="javascript:;">
										<span class="badge bg-red pull-right">50%</span>
										<span>Settings</span>
								  		</a>
									</li>
									<li><a href="javascript:;">Help</a></li>
									<li><a href="Logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
							  	</ul>
							</li>
					 	</ul>
					</nav>
			  	</div>
			</div>
		<!-- /top navigation -->