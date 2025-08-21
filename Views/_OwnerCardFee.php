<?php
require_once "Action/aOwner.php";
$aOwner = new ActionOwner();

$result = $aOwner->GetOwnerCardFee();
$OwnerFee = "";
$msg = "";

if($result)
{
    $OwnerFee = $result[0]["owner_card_fee"];
}


if(isset($_REQUEST["OwnerFee"]))
{
    $OwnerFee = $_REQUEST["OwnerFee"];

    $msg = $aOwner->UpdateOwnerCardFee($OwnerFee);
}

$Add = $ChildModuleAccessList[13]->Add;

?>



<!-- page content -->
<div role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>মালিকের কার্ড ফি</h3>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action=""  method="post" name="frmOwnerFee" id="frmOwnerFee" data-parsley-validate class="form-horizontal form-label-left">
                            <?php
                            if($msg !="")
                            {
                                ?>
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong><?php echo $msg; ?></strong>
                                </div>
                                <?php
                            }
                            ?>
                            <input type="hidden" name="ActionType" id="ActionType" required="required" class="form-control col-md-7 col-xs-12" value="Insert">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="RegFee">কার্ড ফি<span class="required">*</span>
                                </label>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="text" name="OwnerFee" id="OwnerFee" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $OwnerFee; ?>">
                                </div>

                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <?php
                                    if($Add)
                                    {
                                        ?>
                                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
