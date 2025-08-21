<?php 
require_once "Action/aVehicle.php";
$aVehicle = new ActionVehicle();
$VehicleList = $aVehicle->GetAllVehicle();

// global $msg;

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
									<button data-toggle="modal" data-target="#AddVehicleModal" type="button" class="btn btn-info"> নতুন গাড়ী যোগ করুন <i class="fa fa-plus-square"></i></button>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>

						
				
						<div class="x_content">
							<p class="text-muted font-13 m-b-30"></p>
								
							<!-- <div class="VehicleData"></div> -->

							<table id="datatable-buttons" id ="VehicleTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

								<thead>
									<tr>
										<th>#</th>
										<!-- <th>কোড</th> -->
										<th>মালিকের নাম</th>
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
									echo "<td>".$res['v_model']."</td>"; 
									echo "<td>".$res['v_color']."</td>";
									echo "<td>".$res['v_reg_no']."</td>";
									echo "<td>".$res['v_reg_date']."</td>";
		
									echo "<td>
									<button data-toggle=\"modal\" data-target=\"#EditVehicleModal\" onclick=\"VehicleEdit('".$res['v_code']."')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>

									<button data-toggle=\"modal\" data-target=\"#ViewVehicleModal\" onclick=\"VehicleView('".$res['v_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>

									<button data-toggle=\"modal\" data-target=\"#DeleteVehicleModal\" onclick=\"VehicleDelete('".$res['v_code']."')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>

									<button data-toggle=\"modal\" data-target=\"#QRModal\" onclick=\"GenerateQR('".$res['v_code']."')\" type=\"button\" class=\"btn btn-info\"> QR Code <i class=\"fa fa-plus-edit\"></i></button>

									<button data-toggle=\"modal\" data-target=\"#CardModal\" onclick=\"CardInfo('".$res['v_code']."')\" type=\"button\" class=\"btn btn-success\"> Card <i class=\"fa fa-plus-edit\"></i></button>

										  </td>";

									echo "</tr>";     
								}
						?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
	    	</div>
		</div>
	</div>
<!-- /page content -->

