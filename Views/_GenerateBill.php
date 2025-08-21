<?php
require_once "Action/aBill.php";
$aBill = new ActionBill();


//   $StartYear = "";
//   $EndYear = "";
//   $msg = "";

//   if(isset($_REQUEST["StartYear"]) && isset($_REQUEST["EndYear"]))
//   {
// 	  var_dump($_REQUEST);die;
//       $StartYear = $_REQUEST["StartYear"];
//       $EndYear = $_REQUEST["EndYear"];

//       $msg = $aBill->GenerateBill( $StartYear,$EndYear);
//   }
    
 $Add = $ChildModuleAccessList[3]->Add;
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
                    <h3>জেনারেট বিল</h3>
                    <?php
                        // echo "<br>StartYear : ".$StartYear;
                        // echo "<br>EndYear : ".$EndYear;
                    ?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action=""  method="post" name="frmGNB" id="frmGNB" data-parsley-validate class="form-horizontal form-label-left">

                     <!--  <?php
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
 -->                    
            						<input type="hidden" name="DocType" id="DocType" required="required" class="form-control col-md-7 col-xs-12" value="GNB">
            						<input type="hidden" name="ActionType" id="ActionType" required="required" class="form-control col-md-7 col-xs-12" value="Insert">

            					<!-- 	<div id="myProgress">
									  <div id="myBar">0%</div>
									</div> -->
							

                        			<br>

            						<div class="form-group">
            							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="StartYear">অর্থ বছর <span class="required">*</span>
            							</label>

            							<div class="col-md-3 col-sm-3 col-xs-12">
            								<input type="text" name="StartYear" id="StartYear" required="required" class="form-control col-md-7 col-xs-12">
            							</div>

            							<div class="col-md-3 col-sm-3 col-xs-12">
            								<input type="text" name="EndYear" id="EndYear" required="required" class="form-control col-md-7 col-xs-12" readonly="readonly">
            							</div>
            						</div>
            						
            						<div class="ln_solid"></div>
            						<div class="form-group">
            							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="center">
            				    <?php 
            				            if($Add)
            				            {
            				    ?>
            							  <button type="submit" name="submit" onclick="" class="btn btn-success">জেনারেট বিল</button>
            					<?php   }
            					?>
            							</div>
            						</div>
            						<br>




            						<!-- <div align="center">
										<div id="preview" >
	            							<div id="spin"></div>
										</div>
									</div> -->

									<div align="center">
										<div style="width: 300px;">
											<div id="GNBMessageTotal"></div>
										</div>
									</div>
								
									<div align="center">
										<div style="width: 300px;">
											<div id="GNBMessageSuccess"></div>
										</div>
									</div>	
									
									<div align="center">
										<div style="width: 300px;">
            								<div id="GNBMessageExist"></div>
										</div>
									</div>

									<div align="center">
										<div style="width: 300px;">
											<div id="GNBMessageFailed"></div>
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
