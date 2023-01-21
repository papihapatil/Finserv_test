<!DOCTYPE html>
<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
 $id = $_GET['ID']; // shows id of customer
 // $id = $this->session->userdata("id");
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);
//echo $id1;
 //echo $id;
 //exit();
?>
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row" >
		            <div class="col-sm-12" >
                        <div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-12 text-center">
									<?php echo "Applicant ".$Get_Doc_Master_Type['FN'].' '.$Get_Doc_Master_Type['LN']; ?>
									</div>
							<?php Foreach($Get_Doc_Master_Type[1] AS $Master)
									{?>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="border: 1px solid #969696;">
											<b><?php echo strtoupper($Master->DOC_MASTER_TYPE).'<br>'; ?></b>
                                            <?php
                                                  Foreach($Get_Doc_Master_Type[0] AS $document)
                                                  { 
                                                    if($document->DOC_MASTER_TYPE==$Master->DOC_MASTER_TYPE)
                                                    {?>
                                                      <a href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" target="_blank"><?php echo strtoupper($document->DOC_TYPE).'<br>'; ?></a>
                                                    <?php 
                                                     }
                                                   } 
                                            ?>
										</div>
							<?php   } ?>
							
                        </div>
                    </div>
                </div>
				<?php $i=1; Foreach($Coapplicant_Doacuments AS $Coapplicant_docs){ ?>
							 <div class="row" >
								<div class="col-sm-12" >
									<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
									<div class="col-sm-12 text-center">
									<?php echo "coapplicant ".$i." ".$Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']; ?>
									</div>
										<?php Foreach($Coapplicant_docs[1] AS $Master)
												{ ?>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="border: 1px solid #969696;">
														<b><?php echo strtoupper($Master->DOC_MASTER_TYPE).'<br>'; ?></b>
														<?php
															  Foreach($Coapplicant_docs[0] AS $document)
															  { 
																if($document->DOC_MASTER_TYPE==$Master->DOC_MASTER_TYPE)
																{?>
																  <a href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" target="_blank"><?php echo strtoupper($document->DOC_TYPE).'<br>'; ?></a>
																<?php 
																 }
															   } 
														?>
													</div>
										<?php   } ?>
										
									</div>
								</div>
							</div>			
							
							
				<?php			$i++; }?>
            </div>
        </div>
    </main>
</div>