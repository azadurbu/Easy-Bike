<?php
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();
$OwnerBillList = $aOwner->GetGeneratedBill();

//global $msg;
$List = $ChildModuleAccessList[5]->List;
$Add = $ChildModuleAccessList[5]->Add;
$View = $ChildModuleAccessList[5]->View;
$BillPosting = $ChildModuleAccessList[5]->BillPosting;
$Invoice = $ChildModuleAccessList[5]->Invoice;
require_once '_ViewOwnerCardInvoice.php';
// echo '<pre>'; var_dump($OwnerBillList); echo 'azad';die;
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> জেনারেটেড বিল লিস্ট </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                <a href="OwnerGeneratedBillPrint.php?user=101" target="_blank" class="btn btn-info"> পরিশোধিত জেনারেটেড বিল <i class="fa fa-plus-square"></i></a>
                <a href="OwnerGeneratedBillPrint.php?user=102" target="_blank" class="btn btn-info"> অপরিশোধিত জেনারেটেড বিল <i class="fa fa-plus-square"></i></a>
                <a href="OwnerGeneratedBillPrint.php?user=103" target="_blank" class="btn btn-info"> সকল জেনারেটেড বিল <i class="fa fa-plus-square"></i></a>
                <div class="clearfix"></div>

                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30"></p>

                        <!-- <div class="OwnerData"></div> -->
                        <?php 
                                if(1)
                                {
                        ?>
                        
                        <table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>কোড</th>
                                <th>Status</th>
                                <th>fiscal_year</th>
                                <th>Vehicle Code</th>
                                <th>মালিকের নাম</th>
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
                                echo "<td>".$res['v_reg_no']."</td>";
                                echo "<td>".$res['o_name']."</td>";
                                echo "<td>".$res['total']."</td>";
                                echo "<td>".$res['payment_date']."</td>";


                                if($res['status']=='1')
                                {
                                    echo 	"<td>";

                                    if($View)
                                    {
                                        // echo 	"<button data-toggle=\"modal\" data-target=\"#ViewOwnerCardBillModal\" onclick=\"OwnerCardBillView('".$res['ocbl_code']."')\" type=\"button\" class=\"btn btn-warning\"> View <i class=\"fa fa-plus-edit\"></i></button>";
                                        echo '<a href="ViewOwnerGeneratedBill.php?user='.$res['bill_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
                                    }

                                    if($Invoice)
                                    {
                                        echo	"<button data-toggle=\"modal\" data-target=\"#OwnerCardInvoiceModal\" onclick=\"InvoiceOwnerGeneratedCard('".$res['bill_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
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
                                        echo '<a href="ViewOwnerGeneratedBill.php?user='.$res['bill_code'].'" target="_blank" class="btn btn-warning"> View <i class="fa fa-plus-edit"></i></a>';
                                    }
                                    if($BillPosting)
                                    {
                                        echo '<a href="OwnerGeneratedBillPosting.php?user='.$res['bill_code'].'" target="_blank" class="btn btn-info"> Bill Posting <i class="fa fa-plus-edit"></i></a>';

                                    }

                                    if($Invoice)
                                    {
                                        echo	"<button data-toggle=\"modal\" data-target=\"#OwnerCardInvoiceModal\" onclick=\"InvoiceOwnerGeneratedCard('".$res['bill_code']."')\" type=\"button\" class=\"btn btn-success\"> Invoice <i class=\"fa fa-plus-edit\"></i></button>";
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