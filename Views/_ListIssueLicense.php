<?php 
require_once "Action/aIssueLicense.php";
$aIssueLicense = new ActionIssueLicense();
$IssueLicenseList = $aIssueLicense->GetAllIssueLicense();

// echo "<br><br><br><br><br><br><br><br>-------------------------------------------------------------".$IssueLicenseList["issue_code"];
// var_dump($IssueLicenseList);
// echo "<br><br><br><br><br><br><br><br>-------------------------------------------------------------";

global $msg;

?>


<!-- page content -->

<?php require_once '_AddIssueLicense.php'; ?>


	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>সকল লাইসেন্স নবায়ন লিস্ট</h3>
				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">		
							<ul class="nav navbar-left panel_toolbox">
								<ul class="nav navbar-left panel_toolbox">
									<button data-toggle="modal" data-target="#AddIssueLicenseModal" type="button" class="btn btn-info"> লাইসেন্স নবায়ন করুন <i class="fa fa-plus-square"></i></button>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>

						
				
						<div class="x_content">
							<p class="text-muted font-13 m-b-30"></p>
								
							<!-- <div class="DriverData"></div> -->

							<table id="datatable-buttons" id ="DriverTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

								<thead>
									<tr>
										<th>#</th>
										<th>কোড</th>
										<th>লাইসেন্স নং</th>
										<th>মালিকের নাম</th>
										<th>নবায়নের তারিখ</th>
										<th>অর্থ বছর</th>
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 

								$i = 0;
								foreach ($IssueLicenseList as $key => $res) 
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>"; 
						 
									echo "<td>".$res['issue_code']."</td>"; 
									echo "<td>".$res['issue_licenseNo']."</td>"; 
									echo "<td>".$res['o_id']."</td>";
									echo "<td>".$res['issue_date']."</td>";
									echo "<td>".$res['issue_start_year']."-".$res['issue_end_year']."</td>";
									echo "<td>".
											"<button data-toggle=\"modal\" data-target=\"#EditIssueLicenseModal\" onclick=\"IssueLicenseEdit(".$res['issue_code']."'')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>".

											"<button data-toggle=\"modal\" data-target=\"#ViewIssueLicenseModal\" onclick=\"IssueLicenseView(".$res['issue_code']."'')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>".

											"<button data-toggle=\"modal\" data-target=\"#DeleteIssueLicenseModal\" onclick=\"IssueLicenseDelete(".$res['issue_code']."'')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>".
										 "</td>";
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

