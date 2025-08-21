<?php
require_once "User/UserAction/aUser.php";
$aUser = new ActionUser();
$UserTypeList = $aUser->GetAllUserType();

//global $msg;
$List = $ChildModuleAccessList[21]->List;
$Add = $ChildModuleAccessList[21]->Add;
$Edit = $ChildModuleAccessList[21]->Edit;
$Delete = $ChildModuleAccessList[21]->Delete;
?>


<!-- page content -->

<?php require_once '_AddUserType.php'; ?>
<?php require_once '_EditUserType.php'; ?>
<?php require_once '_DeleteUserType.php'; ?>


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>ইউজার টাইপ লিস্ট </h3>
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
                                if ($Add){
                                ?>
                                <button data-toggle="modal" data-target="#AddUserTypeModal" type="button" class="btn btn-info"> নতুন ইউজার টাইপ যোগ করুন  <i class="fa fa-plus-square"></i></button>
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
                    if ($List) {
                        ?>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ইউজার টাইপ</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            $i = 0;
                            foreach ($UserTypeList["UserTypeList"] as $key => $res) {
                                echo "<tr>";
                                echo "<td>" . ++$i . "</td>";
                                echo "<td>" . $res['user_type_name'] . "</td>";

                                echo "<td>";
                                if ($Edit) {
                                    echo "<button data-toggle=\"modal\" data-target=\"#EditUserTypeModal\" onclick=\"UserTypeEdit('" . $res['user_type_id'] . "')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
                                }
                                if ($Delete) {
                                    echo "<button data-toggle=\"modal\" data-target=\"#DeleteUserTypeModal\" onclick=\"UserTypeDelete('" . $res['user_type_id'] . "')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
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


