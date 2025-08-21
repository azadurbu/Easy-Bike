<?php
require_once "Action/aBank.php";
$aBank = new ActionBank();
$BankList = $aBank->GetAllBank();

//global $msg;
$List = $ChildModuleAccessList[15]->List;
$Add = $ChildModuleAccessList[15]->Add;
$Edit = $ChildModuleAccessList[15]->Edit;
$Delete = $ChildModuleAccessList[15]->Delete;
?>


<!-- page content -->

<?php require_once '_AddBank.php'; ?>
<?php require_once '_EditBank.php'; ?>
<?php require_once '_DeleteBank.php'; ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>সকল ব্যাংকের তালিকা </h3>
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
                                <button data-toggle="modal" data-target="#AddBankModal" type="button" class="btn btn-info"> নতুন ব্যাংক যোগ করুন <i class="fa fa-plus-square"></i></button>
                        <?php
                              }
                        ?>
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
                                <th>নাম</th>
<!--                                <th>শাখা</th>-->
                                <th>ঠিকানা</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                                $i = 0;
                                foreach ($BankList as $key => $res)
                                {
                                    echo "<tr>";
                                    echo "<td>".++$i."</td>";
                                    echo "<td>".$res['b_name']."</td>";
                                    echo "<td>".$res['b_address']."</td>";
                                    echo "<td>";
        
                                    if($Edit)
                                    {
                                        echo "<button data-toggle=\"modal\" data-target=\"#EditBankModal\" onclick=\"BankEdit('".$res['b_id']."')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
                                    }

                                    if($Delete)
                                    {
                                        echo "<button data-toggle=\"modal\" data-target=\"#DeleteBankModal\" onclick=\"BankDelete('".$res['b_id']."')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
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

