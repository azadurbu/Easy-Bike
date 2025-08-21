<?php 
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerList = $aOwner->GetAllOwner();

global $msg;

$List = $ChildModuleAccessList[0]->List;
$Add = $ChildModuleAccessList[0]->Add;
$Edit =  $ChildModuleAccessList[0]->Edit;
$View = $ChildModuleAccessList[0]->View;
$Delete = $ChildModuleAccessList[0]->Delete;


?>


<!-- page content -->

<?php require_once '_AddOwner.php'; ?>
<?php require_once '_EditOwner.php'; ?>
<?php require_once '_ViewOwner.php'; ?>
<?php require_once '_DeleteOwner.php'; ?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>সকল মালিকের তালিকা</h3>

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
										<!-- <a href="OwnerNew.php" target="_blank" ><button data-toggle="modal"  type="button" class="btn btn-info"> নতুন মালিক যোগ করুন <i class="fa fa-plus-square"></i>
										</button></a> -->
										<a href="OwnerAdd.php" target="_blank" class="btn btn-info"> নতুন মালিক যোগ করুন <i class="fa fa-plus-square"></i></a>

									<?php 	}	?>
								</ul>
							</ul>

							<div class="clearfix"></div>
						</div>
				
						<div class="x_content">
							<p class="text-muted font-13 m-b-30"></p>
								
							<!-- <div class="OwnerData"></div> -->
					<?php
						if($List)
						{
					?>

							<table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

								<thead>
									<tr>
										<th>#</th>
										<th>ছবি</th>
										<th>কোড</th>
										<th>নাম</th>
										<th>এনআইডি নম্বর</th>
										<th>মোবাইল নং</th>
										<!--<th>হোল্ডিং নং</th>-->
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 

								$i = 0;
								foreach ($OwnerList as $key => $res) 
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>"; 
									echo '<td><img style="height:50px; width:50px;" src="'.$res['o_photo_path'].'"></td>'; 
									echo "<td>".$res['o_code']."</td>"; 
									echo "<td>".$res['o_name']."</td>"; 
									echo "<td>".$res['o_nid']."</td>";
									echo "<td>".$res['o_mobile']."</td>";
								// 	echo "<td>".$res['o_holding_no']."</td>";
									echo "<td>";
									if($Edit)
									{
										// echo "<button data-toggle=\"modal\" data-target=\"#EditOwnerModal\" onclick=\"OwnerEdit('".$res['o_code']."')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
										echo '<a href="OwnerEdit.php?user='.$res['o_code'].'" target="_blank" class="btn btn-primary"> Edit <i class="fa fa-plus-edit"></i></a>';
									}
								
									if($View)
									{
										// echo "<button data-toggle=\"modal\" data-target=\"#ViewOwnerModal\" onclick=\"OwnerView('".$res['o_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
										echo '<a href="OwnerView.php?user='.$res['o_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
									}

									if($Delete)
									{
										echo "<button data-toggle=\"modal\" data-target=\"#DeleteOwnerModal\" onclick=\"OwnerDelete('".$res['o_code']."')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
									}

									

									echo "</td>";
									echo "</tr>";     
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

