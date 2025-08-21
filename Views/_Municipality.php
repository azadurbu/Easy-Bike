<?php
require_once "Action/aCommon.php";
$aCommon = new ActionCommon();

$result = $aCommon->GetMunicipality();
$Municipality = "";
$msg = "";

if($result)
{
    $Municipality = $result[0]["m_name"];
}


if(isset($_REQUEST["Municipality"]))
{
    $Municipality = $_REQUEST["Municipality"];

    $msg = $aCommon->UpdateMunicipality($Municipality);
}


$Add = $ChildModuleAccessList[8]->Add;


?>



<!-- page content -->
<div class="right_col" role="main">
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
                        <h3>পৌরসভা </h3>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action=""  method="post" name="frmMunicipality" id="frmMunicipality" data-parsley-validate class="form-horizontal form-label-left">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MuniciName">পৌরসভা <span class="required">*</span>
                                </label>
                                
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="text" name="Municipality" id="Municipality" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Municipality; ?>">
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
