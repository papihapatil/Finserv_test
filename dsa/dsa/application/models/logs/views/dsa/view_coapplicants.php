<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div >
        									<div class="container">
           										<div class="row">
            										<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    									<div class="screen-title" style="margin-bottom:40px;">                    	
															Applicant Name : <?php echo $Applicant_row->FN." ".$Applicant_row->LN;  ?>
                    									</div>                    
                									</div>     
 												</div>


											   <div class="row" >
		            							<div class="col-sm-12">
                        							<div class="row shadow bg-white rounded" style="margin:15px;padding:9px;margin-top:3%; ">										
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="border: 1px solid #969696;">
																<div style="margin:3%;">
																	<b>BUREAU REPORT</b><hr>
																	<?php if($Applicant_row->GENDER==NULL || $Applicant_row->GENDER=='') { ?>
																		<a style="margin-left: 8px; "  class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>&nbsp;&nbsp;<br>
															        <?php }else { ?>
											        				<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Applicant_row->UNIQUE_CODE;?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<br>
															        <?php } ?>
																</div>

															</div>
													
														<hr>
														<?php Foreach($Get_Doc_Master_Type[1] AS $Master)
														{?>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="border: 1px solid #969696;">
																<div style="margin:3%;">
																<b><?php echo strtoupper($Master->DOC_MASTER_TYPE).'<br>'; ?></b><hr>
                                            					<?php
                                                 				 Foreach($Get_Doc_Master_Type[0] AS $document)
                                                  				{ 
                                                    				if($document->DOC_MASTER_TYPE==$Master->DOC_MASTER_TYPE)
                                                   				 { 
																		 if($document->doc_cloud_name == '') {  
																		?>
                                                      				
                                                      				<a style="margin-left: 8px; " href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo strtoupper($document->DOC_TYPE); ?><br>
																	<?php } else { ?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo strtoupper($document->DOC_TYPE); ?><br>

																		<?php } ?>
                                                   				 <?php 
                                                     			 }
                                                   				} 
                                            					?>
                                            				</div>
															</div>
														<?php   } ?>
							                        </div>
                    							</div>
                							</div>
											<hr>
											<div>
        									<div class="container">
            									<div class="row">
            										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    									<div class="screen-title" style="margin-bottom:40px;">                    	
															Total Co-Applicants :&nbsp;&nbsp;<?php echo count($coapplicants);?>
                    									</div>                    
                									</div>     
     										</div>
											<?php if(count($coapplicants) == 0) { ?>
												<div>
	        										<div class="container">
	            										<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            										Unable to find any Co-Applicants.
	              							            </div>
	        										</div>
												</div>
											<?php } ?>
											
							             
											<?php $i=1; Foreach($Coapplicant_Doacuments AS $Coapplicant_docs){ ?>
							 					<div class="row" >
													<div class="col-sm-12" >
														<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; margin-top: 3%;">
															<div class="col-sm-12 ">
															<?php echo "Documnet Of Co-Applicant ".$i." : ".$Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']; ?>
															</div>


															<hr>
																<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="border: 1px solid #969696;">
																<div style="margin:3%;">
																	<b>BUREAU REPORT</b><hr>
															 	
															 			<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php
																	 echo 	$Coapplicant_docs['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>
																														</div>
															</div>
															<?php Foreach($Coapplicant_docs[1] AS $Master)
															{ ?>
															<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="border: 1px solid #969696;">
																<div style="margin:3%;">
																<b><?php echo strtoupper($Master->DOC_MASTER_TYPE).'<br>'; ?></b> <hr>
																<?php
															  Foreach($Coapplicant_docs[0] AS $document)
															  { 
																if($document->DOC_MASTER_TYPE==$Master->DOC_MASTER_TYPE)
																{
																	if($document->doc_cloud_name == '') {  
																		
																	?>
																	  <a style="margin-left: 8px; " href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo strtoupper($document->DOC_TYPE); ?><br>
																<?php 

																	 } else { ?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a> >&nbsp;&nbsp;<?php echo strtoupper($document->DOC_TYPE); ?><br>

																		<?php } 

																 }
															   } 
															?>
																</div>
															</div>
															<?php   } ?>
														</div>
													</div>
												</div>			
												<?php $i++; }?>
   											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</main>
				</div>
				<footer class="c-footer">
					<div>Copyright © 2020 Finaleap.</div>
					<div class="mfs-auto">Powered by Finaleap</div>
				</footer>
			</div>
			<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
			<!--[if IE]><!--><!--<![endif]-->

			<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
			<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
			<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
			<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		</body>
</html>