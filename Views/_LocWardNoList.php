<?php
require_once "Location/LocationAction/aLocation.php";
$aLocation = new ActionLocation();
$WardList = $aLocation->GetAllWardNo();
//global $msg;
$List = $ChildModuleAccessList[19]->List;
$Add = $ChildModuleAccessList[19]->Add;
$Edit = $ChildModuleAccessList[19]->Edit;
$Delete = $ChildModuleAccessList[19]->Delete;
?>


<!-- page content -->

<?php require_once '_LocWardNoAdd.php'; ?>
<?php require_once '_LocWardNoEdit.php'; ?>
<?php require_once '_LocWardNoDelete.php'; ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>ওয়ার্ড নং</h3>
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
                                <button data-toggle="modal" data-target="#LocWardNOAdd" type="button" class="btn btn-info"> নতুন ওয়ার্ড নং যোগ করুন <i class="fa fa-plus-square"></i></button>
                            <?php
                                }
                            ?>
                            </ul>
                        </ul>

                        <div class="clearfix"></div>
                    </div>



                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30"></p>

                        <!-- <div class="DriverData"></div> -->
                    <?php
                    if ($List) {
                        ?>
                        <table id="datatable-buttons" id="DriverTable"
                               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>উপজেলার নাম</th>
                                <th>পৌরসভার নাম</th>
                                <th>ওয়ার্ড নং</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            $i = 0;
                            foreach ($WardList as $key => $res) {
                                echo "<tr>";
                                echo "<td>" . ++$i . "</td>";
                                echo "<td>" . $aLocation->GetDivisionByDivID($res['division_id']) . "</td>";
                                echo "<td>" . $aLocation->GetSubDivisionBySubDivID($res['sub_division_id']) . "</td>";
                                echo "<td>" . $res['ward_no'] . "</td>";
                                echo "<td>";
                                if ($Add){
                                    echo "<button data-toggle=\"modal\" data-target=\"#EditWardNoModal\" onclick=\"WardNoEdit('" . $res['ward_no_id'] . "')\" type=\"button\" class=\"btn btn-primary\"> Edit <i class=\"fa fa-plus-edit\"></i></button>";
                                }
                                if ($Delete) {
                                    echo "<button data-toggle=\"modal\" data-target=\"#DeleteWardNoModal\" onclick=\"WardNoDelete('" . $res['ward_no_id'] . "')\" type=\"button\" class=\"btn btn-danger\"> Delete <i class=\"fa fa-plus-edit\"></i></button>";
                                }
							  	   echo " </td>";
                                // echo "</tr>";
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

