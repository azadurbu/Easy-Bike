<?php 
require_once "Action/aDriver.php";
$aDriver = new ActionDriver();
$DriverBillList = $aDriver->GetAllDriverBill();

//global $msg;
    $List = $ChildModuleAccessList[6]->List;
    $Add = $ChildModuleAccessList[6]->Add;
    $View = $ChildModuleAccessList[6]->View;
    $BillPosting = $ChildModuleAccessList[6]->BillPosting;
    $Invoice = $ChildModuleAccessList[6]->Invoice;

?>


<!-- page content -->

<?php require_once '_AddDriverBill.php'; ?>
<?php require_once '_EditDriverBill.php'; ?>
<?php require_once '_ViewDriverBill.php'; ?>
<?php require_once '_DeleteDriverBill.php'; ?>
<?php require_once '_DriverBillPosting.php'; ?>
<?php require_once '_ViewDriverCardInvoice.php' ?>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>চালকের বিল লিস্ট</h3>
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
                                    <!-- <button data-toggle="modal" data-target="#AddDriverCardBillModal" type="button" class="btn btn-info">কার্ড বিল যোগ করুন <i class="fa fa-plus-square"></i></button> -->
                                    <a href="AddDriverBillNew.php" target="_blank" class="btn btn-info"> চালকের বিল যোগ করুন <i class="fa fa-plus-square"></i></a>
                            <?php
                                 }
                            ?>
								</ul>
							</ul>
                            <a href="DriverBillPrint.php?user=1" target="_blank" class="btn btn-info"> চালকের পরিশোধিত বিল <i class="fa fa-plus-square"></i></a>
                            <a href="DriverBillPrint.php?user=2" target="_blank" class="btn btn-info"> চালকের অপরিশোধিত বিল <i class="fa fa-plus-square"></i></a>
                            <a href="DriverBillPrint.php?user=3" target="_blank" class="btn btn-info"> চালকের সকল বিল <i class="fa fa-plus-square"></i></a>
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
										<th>কোড</th>
                                        <th>Status</th>
                                        <th>ড্রাইভারের কোড</th>
                                        <th>ড্রাইভারের নাম</th>
                                        <th>বিলের খাত</th>
										<th>ফি</th>
										<th>বিল পরিশোধের তারিখ</th>
										<th>Action</th>
									</tr>
								</thead>
						  
								<tbody>
							<?php 
                            
								$i = 0;
								foreach ($DriverBillList as $key => $res)
								{       
									echo "<tr>";
									echo "<td>".++$i."</td>";
									echo "<td>".$res['cbl_code']."</td>";
                                    if($res['status']=='1')
                                    {
                                        echo "<td><span class=\"label label-success\">Paid</span></td>";
                                    }
                                    else
                                    {
                                        echo "<td><span class=\"label label-danger\">Pending</span></td>";
                                    }
                                    echo "<td>".$res['d_code']."</td>";
                                    echo "<td>".$res['d_name']."</td>";
                                    echo "<td>";
                                
                                    if($res['bill_type'] == '0'){
                                        echo 'Reg. / Re Reg.';
                                    }elseif($res['bill_type'] == '1'){
                                        echo "সারচার্জ";
                                    }elseif($res['bill_type'] == '2'){
                                        echo 'জরিমানা';
                                    }

                                    echo "</td>";
									echo "<td>".$res['card_fee']."</td>";
									echo "<td>".$res['payment_date']."</td>";


                                    if($res['status']=='1')
                                    {
                                        echo 	"<td>";

                                        if($View)
                                        {
                                            // echo 	"<button data-toggle=\"modal\" data-target=\"#ViewDriverCardBillModal\" onclick=\"DriverCardBillView('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
                                            echo '<a href="ViewDriverBill.php?user='.$res['cbl_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
                                        }

                                        if($Invoice)
                                        {
                                            echo	"<button data-toggle=\"modal\" data-target=\"#CardInvoiceModal\" onclick=\"InvoiceCard('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
                                        }

                                        echo 	"</td>";
                                    }
                                    else
                                    {
                                        echo 	"<td>";

                                        if($View)
                                        {
                                            // echo 	"<button data-toggle=\"modal\" data-target=\"#ViewDriverCardBillModal\" onclick=\"DriverCardBillView('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
                                            echo '<a href="ViewDriverBill.php?user='.$res['cbl_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
                                        }

                                       /* if($Edit)
                                        {
                                            echo	"<button data-toggle=\"modal\" data-target=\"#EditDriverCardBillModal\" onclick=\"DriverCardBillEdit('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
                                        }

                                        if($Delete)
                                        {
                                            echo 	"<button data-toggle=\"modal\" data-target=\"#DeleteDriverCardBillModal\" onclick=\"DriverCardBillDelete('".$res['d_card_id']."')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
                                        }*/
                                        if($BillPosting)
                                        {
                                            // echo	"<button data-toggle=\"modal\" data-target=\"#DriverBillPostingModal\" onclick=\"DriverBillPosting('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-info\"> Bill Posting <i class=\"fa fa-plus-edit\"></i></button>";
                                            echo '<a href="DriverBillPosting.php?user='.$res['cbl_code'].'" target="_blank" class="btn btn-info"> Bill Posting <i class="fa fa-plus-edit"></i></a>';
                                        }

                                        if($Invoice)
                                        {
                                            echo	"<button data-toggle=\"modal\" data-target=\"#CardInvoiceModal\" onclick=\"InvoiceCard('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
                                        }

                                        echo	"</td>";
                                    }
/*
									echo "<td>
									<button data-toggle=\"modal\" data-target=\"#EditDriverCardBillModal\" onclick=\"DriverCardBillEdit('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>

									<button data-toggle=\"modal\" data-target=\"#DeleteDriverCardBillModal\" onclick=\"DriverCardBillDelete('".$res['d_card_id']."')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>

												<button data-toggle=\"modal\" data-target=\"#CardInvoiceModal\" onclick=\"InvoiceCard('".$res['cbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>
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

