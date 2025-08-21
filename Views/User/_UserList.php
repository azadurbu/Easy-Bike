<?php
require_once "User/UserAction/aUser.php";
$aUser = new ActionUser();
$UserList = $aUser->GetAllUser();

//global $msg;
$List = $ChildModuleAccessList[22]->List;
$Add = $ChildModuleAccessList[22]->Add;
$Edit = $ChildModuleAccessList[22]->Edit;
$Delete = $ChildModuleAccessList[22]->Delete;
?>


<!-- page content -->

<?php require_once '_AddUser.php'; ?>
<?php require_once '_EditUser.php'; ?>
<?php require_once '_DeleteUser.php'; ?>


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>ইউজার লিস্ট </h3>
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
                                <button data-toggle="modal" data-target="#AddUserModal" type="button" class="btn btn-info"> নতুন ইউজার যোগ করুন  <i class="fa fa-plus-square"></i></button>
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
                                <th>ইউজারের নাম</th>
                                <th>ইউজারের আইডি</th>
                                <!--<th>ইউজারের পাসওয়ার্ড</th-->>
                                <th>ইউজারের টাইপ</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            $i = 0;
                            foreach ($UserList["UserList"] as $key => $res) {
                                echo "<tr>";
                                echo "<td>" . ++$i . "</td>";
                                echo "<td>" . $res['user_name'] . "</td>";
                                echo "<td>" . $res['user_id'] . "</td>";
                                /*echo "<td>" . $res['user_password'] . "</td>";*/
                                echo "<td>" . $res['user_type_name'] . "</td>";

                                echo "<td>";
                                if ($Edit) {
                                    echo "<button data-toggle=\"modal\" data-target=\"#EditUserModal\" onclick=\"UserEdit('" . $res['user_id'] . "')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
                                }
                                if ($Delete) {
                                    echo "<button data-toggle=\"modal\" data-target=\"#DeleteUserModal\" onclick=\"UserDelete('" . $res['user_id'] . "')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
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


