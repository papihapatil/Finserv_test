
<?php
  $result = $this->session->flashdata('result');   if (isset($result)) {
	   if($result=='1'){
		   
			   $res = $this->session->flashdata('message');
			   if($res=='Customer Deleted Sucessfully')
			   {
			   echo '<script> swal("success!", "Customer Deleted Sucessfully", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
						   
			}
			else if($result=='2')
			{
				$res = $this->session->flashdata('message');
			   if($res=='Something get Wrong')
			   {
			   echo '<script> swal("warning!", "Something get Wrong", "warning");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
 }?>
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
									   <div>
										   <div class="">
											   <div class="row">
												 
													 <div class="col-sm-3" style="padding-left:0px;">
													   <label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">Customer With Consent&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer_consent">
														  <i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
												   </div>
												   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;margin-left:-8%;">
														  <label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($customers); ?>&nbsp;&nbsp;
														  <?php if(isset($customers))
															  {
																if(count($customers) != 0) 
																 {  ?> 
														 <a href="<?=base_url('index.php/admin/download_Excel')?>"> 
														<i class="fa fa-download "style='font-size:24px; color:green;'></i>
													   </a><?php }
															   else{
														   ?>
														<i class="fa fa-download "style='font-size:24px; color:green;'></i>
													   <?php   	} }?>
													   </label>
														 <?php $excelData = json_decode(json_encode($customers), true);?>
													  </div>
												   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
															   </div>
												   <div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:13%;">
													   <label style="margin-left:8px;">Filter : </label>
				                                   </div>
			                                       <div class="col-sm-2" >
													   <select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_customers_all">
														   <option value="">Select Filter</option>
														   <option value="all">All Customers</option>
														   <option value="Complete">Completed Profile</option>
														   <option value="Incomplete">Incomplete Profile</option>
													   </select>
												   </div>
											    </div>
										    </div>
											<hr>
									   </div>
									   <div class="row">
											<div class="col-sm-12">
												<div >
													<div class="container">
														<div class="row" style="margin-bottom:10px">
															<div class="col-sm-6">
														    </div>
														    <div class="col-sm-3">
																<form id="credit_saction_form" method="post">
																	<select class="form-control" aria-label="Default select example" name="" id="select_category_user"  >
																		<option value="">Select category</option>
																		<option value="self">Self</option>
																		<?php if($userType=='Cluster_Manager') { ?>
																		<option value="branch_manager">Branch Manager</option>
																		<option value="Relationship_officer">Relationship Officer</option>
																		<option value="DSA">DSA</option>
																		<?php } ?>
																		<?php if($userType=='branch_manager') { ?>
																		<option value="Relationship_officer">Relationship Officer</option>
																		<option value="DSA">DSA</option>
																		<?php } ?>
																		<?php if($userType=='Relationship_Officer') { ?>
																		<option value="DSA">DSA</option>
																		<?php } ?>
																		
																	 </select>
																	  <input type="text" id="User_id" value=<?php echo $this->session->userdata('ID'); ?> hidden>
																	  <input type="text" id="User_Type" value=<?php echo $userType; ?> hidden>
																</form>
															</div>
															<div class="col-sm-3">
																<form id="credit_saction_form" method="post">
																	   <select class="form-control" aria-label="Default select example"  id="options_display_user">
																			<option value="">Select Value</option>
																	    </select>
																 </form>
															</div>
														</div>
													</div>
												</div>
										    </div>
									   </div>
									   <body class="wide comments example">
											<div class="fw-body">
												<div class="content">
													<div style="overflow-x:auto;">
														<div class="demo-html">
															<table id="example" class="display" style="width:100%">
																<thead>
																	<tr>
																	  <th  hidden> id </th>
																	   
																	   <th>Name</th>
																	  <!-- <th>Email Id</th>
																	   <th>Mobile No</th> -->
																	   <th>Customer Status</th>
																	    <th>Application Status</th>
																	   <th>Loan Type</th>
																	 
																	   <th>Referred By</th>
																	   <th>Created On</th>
																	   <th>Last Updated On </th>
																	  <!-- <th>Edit</th>-->
																	   <th>Start Process</th>
																	   <!-- <th>GONOGO</th> -->
																	   <th>Bureau & Documents</th>
																	   <th>Pre CAM</th>
																	   <th>CAM</th>
																	   <th>PD</th>
																	  <!--  <th>loan</th>-->
																		<!--<th>Calculate eligibilty</th> -->
																		
																		<?php if($userType=='branch_manager') { ?>
																		<th> Loan Disburst Form </th>
																		<th>Amortization Schedule</th>
																		<?php } ?>
																	 </tr>
																</thead>
																<tbody id="display_customer">
																	<?php  $i= 1 ; if(!empty($customers)){foreach($customers as $row){  ?>
																	<tr>
																	   <td hidden ><?php echo $row['ID']; ?></td>
																	    
																	   <td><?php echo $row['FN']." ".$row['LN'];?></td>
																	   
																	   <?php
																		if($row['STATUS'] == 'PD Completed')
																		{
																		?>
																		<td style="color:green;"><?php echo $row['STATUS']; ?></td>
																		<?php
																		}
																		else if($row['STATUS'] == 'Aadhar E-sign complete')
																		{
																		?>
																		<td style="color:green;"><?php echo $row['STATUS']; ?></td>
																		<?php
																		}
																		else
																		{
																		?>
																		<td style="color:red;"><?php echo $row['STATUS']; ?></td>
																		<?php
																		}
																		?>
																	   <!--------------- application status --------------------------- -->
																	    <?php
																		if($row['credit_sanction_status'] == 'REJECT')
																		{
																		?>
																			<td style="color:red;"><?php echo "Rejected" ; ?></td>
																		<?php
																		}
																		else if($row['credit_sanction_status'] == 'HOLD')
																		{
																		?>
																			<td style="color:red;"><?php echo "HOLD" ; ?></td>
																		<?php
																		}
																		else
																		{
																	
																		if($row['STATUS'] == 'PD Completed')
																		{
																		?>
																		<td style="color:green;"><?php echo $row['STATUS']; ?></td>
																		<?php
																		}
																		else if($row['STATUS'] == 'Aadhar E-sign complete')
																		{
																			if($row['cam_status'] == 'Cam details complete')
																			{
																				?>
																		<td style="color:green;"><?php echo "Submitted to Credit"; ?></td>
																		<?php
																			}
																			else
																			{
																				?>
																					<td style="color:green;"><?php echo "Submitted to CPA"; ?></td>
																				<?php
																			}
																		?>
																	
																		<?php
																		}
																		else
																		{
																		?>
																		<td style="color:green;"><?php echo "In Progress"; ?></td>
																		<?php
																		}
																		
																		}
																		?>
																		
																		<!--------------------------------------------------------------------- -->

																	   <td><?php echo $row['loan_type']; ?></td>
																	  
					   												 <td><?php if($row['Refer_By_Name']!=''){echo $row['Refer_By_Name'] .'['.$row['Refer_By_Category'].']';} ?></td>
																		    <!--  <td>comment</td>-->
																	   <td><?php $date = date_create($row['CREATED_AT']); echo date_format($date, 'd-m-Y');?></td>
																	 	 <td><?php if($row['last_updated_date']!= '') {$date1 = date_create($row['last_updated_date']); echo date_format($date1, 'd-m-Y'); }else {echo "";}?></td>
																	 	
																	   <td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/Go_No_GO_?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a></br><a  style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></td>
						
																	   <td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/show_coapplicants?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>
																	   <?php
																					if($row['STATUS'] == 'PD Completed')
																					{
																						?>
																						<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/admin/Generate_pre_cam?ID=<?php echo $row['UNIQUE_CODE'];?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		            
																						<?php
																					}
																					else if( $row['STATUS']=='Aadhar E-sign complete')
																					{
																						?>
																							<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/admin/Generate_pre_cam?ID=<?php echo $row['UNIQUE_CODE'];?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		            
																						<?php
																					}
																					else
																					{
                                                                                    ?>
																						<td><a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a></td>
																		            
																					<?php
																					}
																					?>
																	                   
																	   
																	   
																	   
																	   <?php if( $row['cam_status']=='Cam details complete')	{?>
																	   <td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Operations_user/genrate_pdf?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>
																	    <?php }
																		else
																			{
																	   ?>
																		<td><a style="margin-left: 8px; " class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a></td>
																		 
																	   <?php
																			}
																		?>

																		<?php if($row['STATUS'] == 'PD Completed')
																						{
																					?>
																					<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/credit_manager_user/pdf?ID=<?php echo $row['UNIQUE_CODE'];?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		            <?php }
																					     else
																						 {
                                                                                     ?>
																					 <td><a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a></td>
																		            
																					 <?php
																						 }?>


																		<?php if($userType=='branch_manager' || $userType=='Operations_user' ) { ?>
																		<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/BranchManager/Loan_sanction_form?ID=<?php echo $row['UNIQUE_CODE'];?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a></td>
																		<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/BranchManager/Amortization_Schedule?ID=<?php echo $row['UNIQUE_CODE'];?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a></td>
																		<?php } ?>
																		
																	 </tr>
																	<?php  $i++; } } ?> 
																 </tbody> 
															</table>
														</div>
													</div>
												</div>
											</div>
									   </body>
									   <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													 <!-- Modal Header -->
													 <div class="modal-header">
														<h4 class="modal-title" id="myModalLabel"> DELETE </h4>
														<button type="button" class="close"  data-dismiss="modal">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Close</span>
														</button>                
													  </div>
													  <!-- Modal Body -->
													  <div class="modal-body">
														   <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_customer" method="POST" id="change_contact_status">
																<div class="form-group">
																	<label  class="col-12 control-label padding-10">Are you sure you want to DELETE this customer ?</label>	                         
																	<input name="id" type="number" class="idform"  hidden />
																 </div>                  
																 <!-- Modal Footer -->
																 <div class="modal-footer">
																	<button type="button" class="btn btn-default"   data-dismiss="modal">  CANCEL  </button>
																	<button type="submit" class="btn btn-primary">   DELETE IT  </button>
																 </div>
															</form>                
													   </div>            
												</div>
											</div>
										</div>
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
	<script >
		$(".modal_test ").on("click", function(){
		  var dataId = $(this).attr("data-id");
		  $(".idform").val(dataId);
	  
   });
   </script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
