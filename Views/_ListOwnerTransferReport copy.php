<?php 
require_once "Action/aOwnerTransfer.php";
require_once "Action/aOwner.php";

$aOwnerTransfer = new ActionOwnerTransfer();
$OwnerTransferList = $aOwnerTransfer->GetOwnerTransferList();

function GetOwnerByOwnerID($OwnerID)
{
	$aOwner = new ActionOwner();
	$Owner = $aOwner->GetOwnerInfoByOwnerID($OwnerID);
	//var_dump($Owner);
	$OwnerName = "";
	if($Owner["Owner"])
	{
		$OwnerName = $Owner["Owner"][0]["o_name"];
	}

	return $OwnerName;
}
//global $msg;
$List = $ChildModuleAccessList[7]->List;
$Add = $ChildModuleAccessList[7]->Add;
$View = $ChildModuleAccessList[7]->View;
$BillPosting = $ChildModuleAccessList[7]->BillPosting;
$Invoice = $ChildModuleAccessList[7]->Invoice;

?>


<!-- page content -->

<?php require_once '_AddOwnerTransfer.php'; ?>

<?php //require_once '_EditOwnerTransfer.php'; ?>

<?php require_once '_ViewOwnerTransfer.php'; ?>

<?php //require_once '_DeleteOwnerTransfer.php'; ?>

<?php require_once '_OwnerTrnsBillPosting.php'; ?>
<?php require_once '_ViewOwnerTrnsInvoice.php' ?>


	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>মালিকানা পরিবর্তনের তালিকা</h3>
				</div>
	    	</div>

	    	<div class="clearfix"></div>

	   		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">

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
                                        <th>কোড</th>
                                        <th>Status</th>
										<th>রেজিস্ট্রেশন নং</th>
										<th>বর্তমান মালিক</th>
										<th>পূর্বের মালিক</th>
										<th>পরিবর্তনের তারিখ</th>
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 

								$i = 0;
								foreach ($OwnerTransferList as $key => $res) 
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>";
                                    echo "<td>".$res['otbl_code']."</td>";
                                    if($res['status']=='1')
                                    {
                                        echo "<td><span class=\"label label-success\">Paid</span></td>";
                                    }
                                    else
                                    {
                                        echo "<td><span class=\"label label-danger\">Pending</span></td>";
                                    }
									echo "<td>".$res['reg_no']."</td>";
									echo "<td>".GetOwnerByOwnerID($res['current_owner'])."</td>";
									echo "<td>".GetOwnerByOwnerID($res['previous_owner'])."</td>";
									echo "<td>".$res['payment_date']."</td>";
                                    if($res['status']=='1')
                                    {
                                        echo 	"<td>";

                                        if($View)
                                        {
                                        //     echo 	"<button data-toggle=\"modal\" data-target=\"#ViewOwnerTransferModal\" 

										// onclick=\"OwnerTransferView('".$res['status']."','".$res['reg_no']."','".$res['current_owner']."','".$res['previous_owner']."','".$res['o_transfer_date']."')\" 

										// type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
										echo '<a href="ViewOwnerTransfer.php?stt='.$res['status'].'&userreg='.$res['reg_no'].'&newowner='.$res['current_owner'].'&oldowner'.$res['previous_owner'].'&date'.$res['o_transfer_date'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';

                                        }

                                        if($Invoice)
                                        {
                                            echo	"<button data-toggle=\"modal\" data-target=\"#OwnerTrnsInvoiceModal\" onclick=\"InvoiceOwnerTrns('".$res['otbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
                                        }

                                        echo 	"</td>";
                                    }

                                    else
                                    {
                                        echo 	"<td>";

                                        if($View)
                                        {
                                        //     echo 	"<button data-toggle=\"modal\" data-target=\"#ViewOwnerTransferModal\" 

										// onclick=\"OwnerTransferView('".$res['status']."','".$res['reg_no']."','".$res['current_owner']."','".$res['previous_owner']."','".$res['o_transfer_date']."')\" 

										// type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";

										echo '<a href="ViewOwnerTransfer.php?stt='.$res['status'].'&userreg='.$res['reg_no'].'&newowner='.$res['current_owner'].'&oldowner'.$res['previous_owner'].'&date'.$res['o_transfer_date'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
										

                                        }
                                        if($BillPosting)
                                        {
											// echo	"<button data-toggle=\"modal\" data-target=\"#OwnerTrnsBillPostingModal\" onclick=\"OwnerTnsBillPosting('".$res['otbl_code']."')\" type=\"button\" class=\"btn btn-info\"> Bill Posting <i class=\"fa fa-plus-edit\"></i></button>";
											
											echo '<a href="OwnerTrnsBillPosting.php?user='.$res['otbl_code'].'" target="_blank" class="btn btn-info"> Bill Posting <i class="fa fa-plus-edit"></i></a>';

                                        }

                                        if($Invoice)
                                        {
                                            echo	"<button data-toggle=\"modal\" data-target=\"#OwnerTrnsInvoiceModal\" onclick=\"InvoiceOwnerTrns('".$res['otbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
                                        }

                                        echo	"</td>";
                                    }
                                        /*									echo "<td>

									
										<button data-toggle=\"modal\" data-target=\"#ViewOwnerTransferModal\" 

										onclick=\"OwnerTransferView('".$res['reg_no']."','".$res['current_owner']."','".$res['previous_owner']."','".$res['o_transfer_date']."')\" 

										type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>

								


										  </td>";

									echo "</tr>";*/
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

