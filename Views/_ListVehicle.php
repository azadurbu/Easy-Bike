<?php 
require_once "Action/aVehicle.php";
$aVehicle = new ActionVehicle();
$VehicleList = $aVehicle->GetAllVehicle();
$Count = Count($VehicleList);

$List = $ChildModuleAccessList[1]->List;
$Add = $ChildModuleAccessList[1]->Add;
$Edit = $ChildModuleAccessList[1]->Edit;
$View = $ChildModuleAccessList[1]->View;
$Delete = $ChildModuleAccessList[1]->Delete;
$QRCode = $ChildModuleAccessList[1]->QRCode;
$Card = $ChildModuleAccessList[1]->Card;
$BulkPrint = $ChildModuleAccessList[1]->BulkPrint;

?>


<!-- page content -->

<?php require_once '_AddVehicle.php'; ?>

<?php require_once '_EditVehicle.php'; ?>

<?php require_once '_ViewVehicle.php'; ?>

<?php require_once '_DeleteVehicle.php'; ?>

<?php require_once '_GenerateQR.php'; ?>

<?php require_once '_Card.php'; ?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>সকল গাড়ীর তালিকা</h3>
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
										<!-- <button data-toggle="modal" data-target="#AddVehicleModal" type="button" class="btn btn-info"> নতুন গাড়ী যোগ করুন <i class="fa fa-plus-square"></i></button> -->
										<a href="VehicleAdd.php" target="_blank" class="btn btn-info"> নতুন গাড়ী যোগ করুন <i class="fa fa-plus-square"></i></a>

							<?php
									}
							?>

								</ul>
							</ul>
							<ul class="nav navbar-right panel_toolbox">
								<ul class="nav navbar-right panel_toolbox">
							<?php 
									if($BulkPrint)
									{
							?>
									<button type="button" class="btn btn-warning"> 
										<a style="color: white;" target="_blank" href="./Views/_BulkPrint.php?count=<?php echo $Count; ?>">Bulk Print</a>
									</button>
							<?php  
									} 

							?>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>

						
				
						<div class="x_content">
							<p class="text-muted font-13 m-b-30"></p>
								
							<!-- <div class="VehicleData"></div> -->
                        <?php 
                                if($List)
                                {
                        ?>
							<table id="datatable-buttons" id ="VehicleTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

								<thead>
									<tr>
										<th>#</th>
										<!-- <th>কোড</th> -->
										<th>মালিকের নাম</th>
										<th>মোবাইল নাম্বার</th>
										<th>মডেল</th>
										<th>রঙ</th>
										<th>রেজিস্ট্রেশন নং</th>
										<th>রেজিস্ট্রেশনের তারিখ</th>
			<!-- 							<th>বিবরণ</th> -->
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 

								$i = 0;
								foreach ($VehicleList as $key => $res) 
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>"; 
									// echo "<td>".$res['v_code']."</td>";
									echo "<td>".$res['o_name']."</td>"; 
									// echo "<td>".$res['o_id']."</td>"; 
									echo "<td>".$res['o_mobile']."</td>";
									echo "<td>".$res['v_model']."</td>"; 
									echo "<td>".$res['v_color']."</td>";
									echo "<td>".$res['v_reg_no']."</td>";
									echo "<td>".$res['v_reg_date']."</td>";
								    echo "<td>";
				                
				                if($Edit)
								{ 
									// echo "<button data-toggle=\"modal\" data-target=\"#EditVehicleModal\" onclick=\"VehicleEdit('".$res['v_code']."')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
									echo '<a href="VehicleEdit.php?user='.$res['v_code'].'" target="_blank" class="btn btn-primary"> Edit <i class="fa fa-plus-edit"></i></a>';
								}
									
								if($View)
								{
									// echo "<button data-toggle=\"modal\" data-target=\"#ViewVehicleModal\" onclick=\"VehicleView('".$res['v_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
									echo '<a href="VehicleView.php?user='.$res['v_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
								}

								if($Delete)
								{	
									echo "<button data-toggle=\"modal\" data-target=\"#DeleteVehicleModal\" onclick=\"VehicleDelete('".$res['v_code']."')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
								}

								// if($QRCode)
								// {
								// 	echo "<button data-toggle=\"modal\" data-target=\"#QRModal\" onclick=\"GenerateQR('".$res['v_code']."')\" type=\"button\" class=\"btn btn-info\"> QR Code <i class=\"fa fa-plus-edit\"></i></button>";
								// }

								// if($Card)
								// {

								// 	echo "<button data-toggle=\"modal\" data-target=\"#CardModal\" onclick=\"CardInfo('".$res['v_code']."')\" type=\"button\" class=\"btn btn-success\"> ID Card <i class=\"fa fa-plus-edit\"></i></button>";

								// }	
									echo  "</td>";
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

