<!DOCTYPE html>
<?php 
$CM_ID=$this->session->userdata('ID');
//echo $credit_manager_id;
//exit();
?>
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
										<div class="row">
												
												    <div class="col-sm-3" style="padding-right:0px;">
													  <label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($customers); ?>&nbsp;&nbsp;
														  <?php if(isset($customers))
															  {
																if(count($customers) != 0) 
																	{  ?> 
																		
															<?php   }
																else{
														    ?>
														<i class="fa fa-download "style='font-size:24px; color:green;'></i>
															<?php   	
																	}
															  }?>
													   </label>
														<?php $excelData = json_decode(json_encode($customers), true);?>
													  </div>
													<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
													</div>
													<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:13%;">
													   <!--<label style="margin-left:8px;">Filter : </label>-->
													</div>
													<div class="col-sm-2" >
													 
												   </div>
											    </div>
										    </div>
											<hr>
									   </div>
									   <?php if(count($customers) == 0) { ?>
									   <div>
											<div class="container">
												<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            									<small style="border-radius: 10px; padding: 15px; background-color: white; margin-top: 50px;" class="full-black-color">Unable to find any customers.
													</small>							
												</div>
											</div>
									   </div>
									   <?php } ?>
									   <body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="example" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															<th hidden >id</th>
																					<th>Name</th>
																					<th>Email</th>
																					<th>Mobile</th>
																					<th>Refered By</th>
																					<th>Journey Status</th>
																					<!-- <th>Profile</th> -->
																					<th>Date</th>
																					<th>Bureau</th>
																					<th>Pre-Cam</th>
																					<th>PD</th>
																			    	<!--<th>Action</th>-->
																					<th>Sanction Status</th>
																					<!--<th>Send To Legal</th>-->
																					<!-- <th>Rule Engine</th> -->
																				</tr>
																			</thead>
																			<tbody>
																				<?php  $i= 1 ; if(!empty($customers)){foreach($customers as $row){  ?>
																				<tr>
					    															<td hidden><?php echo $row->ID;?></td>
																					<td><?php echo $row->FN." ".$row->LN;?></td>
																					<td><?php echo $row->EMAIL; ?></td>
																					<td><?php echo $row->MOBILE; ?></td>
																					<td><?php if($row->Refer_By_Name!=''){echo $row->Refer_By_Name.'['.$row->Refer_By_Category.']';} ?></td>
																					 <?php
																					if($row->STATUS == 'PD Completed')
																					{
																					?>
																					<td style="color:green;"><?php if( $row->STATUS=='Rule Engine Process'){echo 'Rule Engine Step one';}else{echo  $row->STATUS;} ?></td>
																					<?php
																					}
																					else if($row->STATUS == 'Aadhar E-sign complete')
																					{
																					?>
																					<td style="color:green;"><?php if( $row->STATUS=='Rule Engine Process'){echo 'Rule Engine Step one';}else{echo  $row->STATUS;} ?></td>
																					<?php
																					}
																					else
																					{
																					?>
																					<td style="color:red;"><?php if( $row->STATUS=='Rule Engine Process'){echo 'Rule Engine Step one';}else{echo  $row->STATUS;} ?></td>
																					<?php
																					}
																					?>
																					
																					<td><?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y');?></td>
																					<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/show_coapplicants?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>
																		            <td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/admin/Generate_pre_cam?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																				     <?php
																					if($row->STATUS == 'PD Completed')
																					{
																					?>
																					 <td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/credit_manager_user/pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																				    
																					<?php
																					}
																					else
																					{
                                                                                    ?>
																					 <td><a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a></td>
																				    	
																					<?php
																					}
																					?>
																					
																					<?php
																					if($row->STATUS == 'PD Completed')
																					{
                                                                                    ?>
																					
																					<?php
																					}
																					else if($row->STATUS == 'Aadhar E-sign complete') {?>
																						
																				
																					<?php }
																					else 
																					{
		                                                                            ?>
																					
																					<?php
																					}
																					?>
																					<td>
																					<?php
																					if( $row->cam_status=='Cam details complete')
																						{
																						  if($row->credit_sanction_status =='success')
					                                                                       {
		                                                                            ?>
						                                                            <button type="submit" class="btn btn-success" style="margin-top:9px;margin-left:10px;">Done</button>
		                                                                            <?php
					                                                                       }
					                                                                       else
					                                                                       {
                                                                                     ?>
			        				                                                 <button type="submit" class="btn btn-primary" style="margin-top:9px; margin-left:10px;">Pending</button> 
		   	                                                                         <?php
					                                                                       }
			                                                                         ?>
		                                                                            <?php
		                                                                                }
	                                                                                 ?>
     																				</td>
																					</tr>
																			<?php  $i++; } } ?> 
																		</tbody>
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
<!--[if IE]><!--><!--<![endif]-->
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>
