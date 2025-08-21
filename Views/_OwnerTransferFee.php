<?php
require_once "Action/aOwnerTransfer.php";
$aOwnerTransfer = new ActionOwnerTransfer();

$result = $aOwnerTransfer->GetOwnerTransferFee();
$OwnerTransferFee = "";
$msg = "";

if($result)
{
    $OwnerTransferFee = $result[0]["owner_transfer_fee"];
}


if(isset($_REQUEST["OwnerTransferFee"]))
{
    $OwnerTransferFee = $_REQUEST["OwnerTransferFee"];

    $msg = $aOwnerTransfer->UpdateOwnerTransferFee($OwnerTransferFee);
}

$Add = $ChildModuleAccessList[12]->Add;

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
                        <h3>মালিকানা পরিবর্তনের ফি</h3>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action=""  method="post" name="frmOwnerTransferFee" id="frmOwnerTransferFee" data-parsley-validate class="form-horizontal form-label-left">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="RegFee">মালিকানা পরিবর্তনের ফি<span class="required">*</span>
                                </label>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="text" name="OwnerTransferFee" id="OwnerTransferFee" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $OwnerTransferFee; ?>">
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
