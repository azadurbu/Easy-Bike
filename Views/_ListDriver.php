<?php 
require_once "Action/aDriver.php";
$aDriver = new ActionDriver();
$DriverList = $aDriver->GetAllDriver();

global $msg;


$List = $ChildModuleAccessList[2]->List;
$Add = $ChildModuleAccessList[2]->Add;
$Edit = $ChildModuleAccessList[2]->Edit;
$View = $ChildModuleAccessList[2]->View;
$Delete = $ChildModuleAccessList[2]->Delete;
$Card = $ChildModuleAccessList[2]->Card;



?>


<!-- page content -->

<?php require_once '_AddDriver.php'; ?>

<?php require_once '_EditDriver.php'; ?>

<?php require_once '_ViewDriver.php'; ?>

<?php require_once '_DeleteDriver.php'; ?>

<?php require_once '_GenerateDriverQR.php'; ?>

<?php require_once '_DriverCard.php'; ?>


	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>সকল চালকের তালিকা</h3>
				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
								    <?php
								        if($Add)
								        {
								    ?>
									 <!-- <button data-toggle="modal" data-target="#AddDriverModal" type="button" class="btn btn-info"> নতুন চালক যোগ করুন <i class="fa fa-plus-square"></i></button>  -->

									 <a href="DriverAdd.php" target="_blank" class="btn btn-info"> নতুন চালক যোগ করুন <i class="fa fa-plus-square"></i></a>


									<?php
								        }
									?>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>

						
				
						<div class="x_content">
							<p class="text-muted font-13 m-b-30"></p>
								
							<!-- <div class="DriverData"></div> -->
                        <?php 
                                if($List)
                                {
                        ?>
							<table id="datatable-buttons" id ="DriverTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

								<thead>
									<tr>
										<th>#</th>
										<th>ছবি</th>
										<th>কোড</th>
										<th>নাম</th>
										<th>এনআইডি নম্বর</th>
										<th>মোবাইল নং</th>
										<th>লাইসেন্স নং</th>
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 

								$i = 0;
								foreach ($DriverList as $key => $res) 
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>"; 
									echo '<td><img style="height:50px; width:50px;" src="'.$res['d_photo_path'].'"></td>'; 
									echo "<td>".$res['d_code']."</td>"; 
									echo "<td>".$res['d_name']."</td>"; 
									echo "<td>".$res['d_nid']."</td>";
									echo "<td>".$res['d_mobile']."</td>";
									echo "<td>".$res['d_license_no']."</td>";
									echo "<td>";
								if($Edit)
								{
									// echo "<button data-toggle=\"modal\" data-target=\"#EditDriverModal\" onclick=\"DriverEdit('".$res['d_code']."')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
									echo '<a href="DriverEdit.php?user='.$res['d_code'].'" target="_blank" class="btn btn-primary"> Edit <i class="fa fa-plus-edit"></i></a>';
								}	
                                
                                if($View)
                                {
									// echo "<button data-toggle=\"modal\" data-target=\"#ViewDriverModal\" onclick=\"DriverView('".$res['d_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";

								    echo '<a href="DriverView.php?user='.$res['d_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
								}
                                
                                if($Delete)
                                {
									echo "<button data-toggle=\"modal\" data-target=\"#DeleteDriverModal\" onclick=\"DriverDelete('".$res['d_code']."')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
                                }
                                
								// echo "<button data-toggle=\"modal\" data-target=\"#DriverQRModal\" onclick=\"GenerateDriverQR('".$res['d_code']."')\" type=\"button\" class=\"btn btn-info\"> QR Code <i class=\"fa fa-plus-edit\"></i></button>";
								
								if($Card)
								{
									echo "<button data-toggle=\"modal\" data-target=\"#DriverCardModal\" onclick=\"DriverCardInfo('".$res['d_code']."')\" type=\"button\" class=\"btn btn-success\"> Card <i class=\"fa fa-plus-edit\"></i></button>";
								}
									echo "</td>";
									echo "</tr>";     
								}
						?>
								</tbody>
							</table>
							
						<?php   }
						?>
						</div>
					</div>
				</div>
	    	</div>
		</div>
	</div>
<!-- /page content -->

