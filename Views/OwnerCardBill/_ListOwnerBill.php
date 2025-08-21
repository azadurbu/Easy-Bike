<?php
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerBillList = $aOwner->GetAllOwnerBill();

//global $msg;
$List = $ChildModuleAccessList[5]->List;
$Add = $ChildModuleAccessList[5]->Add;
$View = $ChildModuleAccessList[5]->View;
$BillPosting = $ChildModuleAccessList[5]->BillPosting;
$Invoice = $ChildModuleAccessList[5]->Invoice;

?>


<!-- page content -->

<?php require_once '_AddOwnerBill.php'; ?>
<?php require_once '_ViewOwnerBill.php'; ?>
<?php require_once '_OwnerBillPosting.php'; ?>
<?php require_once '_ViewOwnerCardInvoice.php' ?>
<?php require_once '_OwnerCardBillReceivedCopy.php' ?>


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> গাড়ীর বিল লিস্ট </h3>
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
                                <!-- <button data-toggle="modal" data-target="#AddOwnerCardBillModal" type="button" class="btn btn-info">কার্ড বিল যোগ করুন <i class="fa fa-plus-square"></i></button> -->
                                <a href="AddOwnerBillNew.php" target="_blank" class="btn btn-info"> গাড়ীর বিল যোগ করুন <i class="fa fa-plus-square"></i></a>

                        <?php 
						   }
						?>
                            </ul>
                        </ul>
                        <a href="OwnerBillPrint.php?user=1" target="_blank" class="btn btn-info"> গাড়ীর পরিশোধিত বিল <i class="fa fa-plus-square"></i></a>
                        <a href="OwnerBillPrint.php?user=2" target="_blank" class="btn btn-info"> গাড়ীর অপরিশোধিত বিল <i class="fa fa-plus-square"></i></a>
                        <a href="OwnerBillPrint.php?user=3" target="_blank" class="btn btn-info"> গাড়ীর সকল বিল <i class="fa fa-plus-square"></i></a>
                        <a href="OwnerGeneratedBill.php" target="_blank" class="btn btn-info"> জেনারেটেড বিল <i class="fa fa-plus-square"></i></a>
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
                                <th>Vehicle Code</th>
                                <th>মালিকের নাম</th>
                                <th>বিলের খাত</th>
                                <th>ফি</th>
                                <th>বিল পরিশোধের তারিখ</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            $i = 0;
                            foreach ($OwnerBillList as $key => $res)
                            {
                                echo "<tr>";
                                echo "<td>".++$i."</td>";
                                echo "<td>".$res['ocbl_code']."</td>";
                                if($res['status']=='1')
                                {
                                    echo "<td><span class=\"label label-success\">Paid</span></td>";
                                }
                                else
                                {
                                    echo "<td><span class=\"label label-danger\">Pending</span></td>";
                                }
                                echo "<td>".$res['v_code']."</td>";
                                echo "<td>".$res['o_name']."</td>";
                                echo "<td>";
                                
                                if($res['bill_type'] == '0'){
                                    echo 'Reg. / Re Reg.';
                                }elseif($res['bill_type'] == '1'){
                                    echo "সারচার্জ";
                                }elseif($res['bill_type'] == '2'){
                                    echo 'জরিমানা';
                                }

                                echo "</td>";
                                echo "<td>".$res['o_card_fee']."</td>";
                                echo "<td>".$res['payment_date']."</td>";


                                if($res['status']=='1')
                                {
                                    echo 	"<td>";

                                    if($View)
                                    {
                                        // echo 	"<button data-toggle=\"modal\" data-target=\"#ViewOwnerCardBillModal\" onclick=\"OwnerCardBillView('".$res['ocbl_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
                                        echo '<a href="ViewOwnerBill.php?user='.$res['ocbl_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
                                    }

                                    if($Invoice)
                                    {
                                        echo	"<button data-toggle=\"modal\" data-target=\"#OwnerCardInvoiceModal\" onclick=\"InvoiceOwnerCard('".$res['ocbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
                                    }
                                    // echo	"<button data-toggle=\"modal\" data-target=\"#OwnerCardBillReceivedCopyModal\" onclick=\"OwnerCardBillReceivedCopy('".$res['ocbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Bill Received Copy <i class=\"fa fa-plus-edit\"></i></button>";

                                    echo 	"</td>";
                                }
                                else
                                {
                                    echo 	"<td>";

                                    if($View)
                                    {
                                        // echo 	"<button data-toggle=\"modal\" data-target=\"#ViewOwnerCardBillModal\" onclick=\"OwnerCardBillView('".$res['ocbl_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
                                        echo '<a href="ViewOwnerBill.php?user='.$res['ocbl_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
                                    }
                                    if($BillPosting)
                                    {
                                        // echo	"<button data-toggle=\"modal\" data-target=\"#OwnerBillPostingModal\" onclick=\"OwnerBillPosting('".$res['ocbl_code']."')\" type=\"button\" class=\"btn btn-info\"> Bill Posting <i class=\"fa fa-plus-edit\"></i></button>";
                                        echo '<a href="OwnerBillPosting.php?user='.$res['ocbl_code'].'" target="_blank" class="btn btn-info"> Bill Posting <i class="fa fa-plus-edit"></i></a>';

                                    }

                                    if($Invoice)
                                    {
                                        echo	"<button data-toggle=\"modal\" data-target=\"#OwnerCardInvoiceModal\" onclick=\"InvoiceOwnerCard('".$res['ocbl_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
                                    }

                                    echo	"</td>";
                                }
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

