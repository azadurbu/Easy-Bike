<?php 
require_once "Action/aBill.php";
$aBill = new ActionBill();
$BillList = $aBill->GetAllBill();

// global $msg;
    $List = $ChildModuleAccessList[4]->List;
    $Add = $ChildModuleAccessList[4]->Add;
    $View = $ChildModuleAccessList[4]->View;
    $BillPosting = $ChildModuleAccessList[4]->BillPosting;
    $Invoice = $ChildModuleAccessList[4]->Invoice; 

?>


<!-- page content -->

<?php require_once '_AddSingleBill.php'; ?>

<?php require_once '_ViewDetailBill.php'; ?>

<?php require_once '_BillPosting.php'; ?>

<?php require_once '_ViewInvoice.php' ?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>সকল বিল</h3>
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
									<!-- <button data-toggle="modal" data-target="#SingleBillModal" type="button" class="btn btn-info"> Add Single Bill <i class="fa fa-plus-square"></i></button> -->
									<a href="AllBillSingleNew.php" target="_blank" class="btn btn-info"> Add Single Bill <i class="fa fa-plus-square"></i></a>
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
										<th>বিল নং</th>
										<th>Status</th>
										<th>অর্থ বছর</th>
										<th>মালিকের নাম</th>
										<th>রেজি নং</th>
										<th>রেজি তারিখ</th>
										<!-- <th>মেয়াদ উত্তীর্ণের তারিখ</th> -->
										<!-- <th>রেজিস্ট্রেশান ফি</th> -->
										<th>এরিয়ার</th>
										<th>সারচার্জ</th>
										<th>সর্বমোট</th>
										<!-- <th>পরিশোধযোগ্য</th> -->
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 
		//var_dump($BillList);
								$i = 0;
								foreach ($BillList as $key => $res) 
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>"; 
									echo "<td>".$res['bill_code']."</td>";
									if($res['status']=='1')
									{
										echo "<td><span class=\"label label-success\">Paid</span></td>";
									}
									else
									{
										echo "<td><span class=\"label label-danger\">Pending</span></td>";
									}

									echo "<td>".$res['fiscal_year']."</td>"; 
									echo "<td>".$res['o_name']."</td>"; 
									echo "<td>".$res['v_reg_no']."</td>"; 
									echo "<td>".date("Y-m-d", strtotime($res['reg_date']))."</td>";
									// echo "<td>".date("Y-m-d", strtotime($res['expired_date']))."</td>";
									// echo "<td>".$res['reg_fee']."</td>";
									echo "<td>".$res['arrear']."</td>";
									echo "<td>".$res['sur_charge']."</td>";
									echo "<td>".$res['total']."</td>";
									// echo "<td>".$res['due']."</td>";
									
									
									
									if($res['status']=='1')
									{
										echo 	"<td>";
								        
								        if($View)
								        {
											// echo 	"<button data-toggle=\"modal\" data-target=\"#DetailBillModal\" onclick=\"DetailBill('".$res['bill_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
											echo '<a href="ViewDetailBillNew.php?user='.$res['bill_code'].'" target="_blank" class="btn btn-info"> Bill Posting <i class="fa fa-plus-edit"></i></a>';
											
								        }
								        
								        if($Invoice)
								        {
										    echo	"<button data-toggle=\"modal\" data-target=\"#InvoiceModal\" onclick=\"Invoice('".$res['bill_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
								        }    
								        
										echo 	"</td>";
									}
									else
									{
										echo 	"<td>";
								        
								        if($View)
								        {
											// echo	"<button data-toggle=\"modal\" data-target=\"#DetailBillModal\" onclick=\"DetailBill('".$res['bill_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
											
											echo '<a href="ViewDetailBillNew.php?user='.$res['bill_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
										
										}
								        
								        if($BillPosting)
								        {
											// echo	"<button data-toggle=\"modal\" data-target=\"#BillPostingModal\" onclick=\"BillPosting('".$res['bill_code']."')\" type=\"button\" class=\"btn btn-info\"> Bill Posting <i class=\"fa fa-plus-edit\"></i></button>";
											echo '<a href="BillPostingNew.php?user='.$res['bill_code'].'" target="_blank" class="btn btn-info"> Bill Posting <i class="fa fa-plus-edit"></i></a>';
								        }
								        
								        if($Invoice)
								        {
										    echo	"<button data-toggle=\"modal\" data-target=\"#InvoiceModal\" onclick=\"Invoice('".$res['bill_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
								        }
                            
										echo	"</td>";
									}



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


