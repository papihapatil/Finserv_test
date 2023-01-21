
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
								
														<hr>
												 	<body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="empTable" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															<Sr.No.>
																					<th>Page Name</th>
																					<th>Status</th>
																					<th>Date</th>
																				    <th>Action</th>
																																			
																				</tr>
																			
																				<?php
  																					$find_pages_for_revrt_decode = json_decode($find_pages_for_revrt_encode);
  																					if($find_pages_for_revrt_decode != '')
  																						{ $i=1;
																							foreach($find_pages_for_revrt_decode as $f)
   																							{
                                                                                ?>
                                                                                	<tr>
                                                                                		<td><?php echo $i;?></td>
                                                                                		<td><?php

                                                                                		 echo $f->Revert_ON_page; ?></td>
                                                                                		<td><?php echo $f->Page_revert_status; ?></td>
                                                                                		
                                                                                		<td>
                                                                                			<?php 
                                                                                				if($f->Revert_ON_page == 'Applicant Personal Details')
                                                                                				{
                                                                                			?>
                                                                                			<a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/admin/Revert_Personal_Details?ID=<?php echo $f->Customer_ID; ?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a>
                                                                                			<?php
                                                                                				}
                                                                                				else if($f->Revert_ON_page == 'Applicant Income Details')
                                                                                				{
                                                                                			?>
                                                                                			<a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/admin/Revert_Income_Details?ID=<?php echo $f->Customer_ID; ?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a>
                                                                                			<?php
                                                                                				}
                                                                                				else if($f->Revert_ON_page == 'Applicant Document Details')
                                                                                				{
                                                                                			 ?>
                                                                                			 <a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/admin/Revert_ProfileDocument_Details?ID=<?php echo $f->Customer_ID; ?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a>
                                                                                			 <?php
                                                                                				}
                                                                                				else if($f->Revert_ON_page == 'Loan Application Form')
                                                                                				{
                                                                                				?>
                                                                                				<a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/admin/Revert_LoanForm_Details?ID=<?php echo $f->Customer_ID; ?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a>
                                                                                				<?php
                                                                                				}
                                                                                				else if($f->Revert_ON_page == 'Loan Applicant Documents')
                                                                                				{
                                                                                				?>
                                                                                				<a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/admin/Revert_LoanDOcument_Details?ID=<?php echo $f->Customer_ID; ?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a>
                                                                                				<?php
                                                                                				}

                                                                                			?>
                                                                                			

                                                                                		</td>
                                                                                	</tr>
                                                                                <?php
   
  																							$i++;
  																						     }
  																						}
																				?>
																				</tr>
																			</thead>
																		</table>
																	</div>
																</div>
	    													</div>
														</div>
                                                	</body>
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>
<!--------------added by sonal on 29-4-2022------------------------------------->
</body>
</html>
