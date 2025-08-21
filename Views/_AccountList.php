<?php
require_once "Action/aBank.php";
$aBank = new ActionBank();
$AccountList = $aBank->GetAllAccount();

//global $msg;
$List = $ChildModuleAccessList[16]->List;
$Add = $ChildModuleAccessList[16]->Add;
$Edit = $ChildModuleAccessList[16]->Edit;
$Delete = $ChildModuleAccessList[16]->Delete;

?>


<!-- page content -->

<?php require_once '_AddAccount.php'; ?>
<?php require_once '_EditAccount.php'; ?>
<?php require_once '_DeleteAccount.php'; ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>সকল একাউন্টের তালিকা </h3>
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
                                <button data-toggle="modal" data-target="#AddAccountModal" type="button" class="btn btn-info"> নতুন একাউন্ট যোগ করুন <i class="fa fa-plus-square"></i></button>
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

                                <th>একাউন্টের নাম</th>
								<th>ব্রাঞ্চ</th>
                                <th>হিসাব নং</th>
                                <th>ব্যাংকের নাম</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                                $i = 0;
                                foreach ($AccountList as $key => $res)
                                {
                                    echo "<tr>";
                                    echo "<td>".++$i."</td>";
                                    echo "<td>".$res['ac_name']."</td>";
                                    echo "<td>".$res['ac_branch']."</td>";
                                    echo "<td>".$res['ac_no']."</td>";
                                    echo "<td>".$res['b_name']."</td>";
                                    echo "<td>";
                                    if($Edit) {
                                        echo "<button data-toggle=\"modal\" data-target=\"#EditAccountModal\" onclick=\"AccountEdit('" . $res['ac_id'] . "')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
                                    }

                                    if($Delete) {
                                        echo "<button data-toggle=\"modal\" data-target=\"#DeleteAccountModal\" onclick=\"AccountDelete('" . $res['ac_id'] . "')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
                                    }
                                    echo  "</td>";
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

