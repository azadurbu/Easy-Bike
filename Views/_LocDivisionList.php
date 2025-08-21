<?php 
require_once "Location/LocationAction/aLocation.php";
$aLocation = new ActionLocation();
$DivisionList = $aLocation->GetAllDivision();
//global $msg;
$List = $ChildModuleAccessList[17]->List;
$Add = $ChildModuleAccessList[17]->Add;
$Edit = $ChildModuleAccessList[17]->Edit;
$Delete = $ChildModuleAccessList[17]->Delete;
?>


<!-- page content -->

<?php require_once '_LocDivisionAdd.php'; ?>
<?php require_once '_LocDivisionEdit.php'; ?>
<?php require_once '_LocDivisionDelete.php'; ?>
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>উপজেলা</h3>
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
									<button data-toggle="modal" data-target="#LocDivisionAdd" type="button" class="btn btn-info"> নতুন উপজেলা যোগ করুন <i class="fa fa-plus-square"></i></button>
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
										<th>নাম</th>
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 

								$i = 0;
								foreach ($DivisionList as $key => $res) 
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>"; 
									echo "<td>".$res['division']."</td>"; 
									echo "<td>";
                                    if($Edit) {
                                        echo "<button data-toggle=\"modal\" data-target=\"#EditDivisionModal\" onclick=\"DivisionEdit('" . $res['division_id'] . "')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
                                    }

                                     if($Delete) {
                                         echo "<button data-toggle=\"modal\" data-target=\"#DeleteDivisionModal\" onclick=\"DivisionDelete('" . $res['division_id'] . "')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
                                     }
							  	    echo "</td>";
									// echo "</tr>";     
								}
						?>
								</tbody>
							</table>
						<?php
                            }
                        ?>
                        </div>
					</div>
				</div>
	    	</div>
		</div>
	</div>
<!-- /page content -->

