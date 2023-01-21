<style>
	@media only screen and (max-width:768px){
		.add{
			padding-left: 155px;
    margin-left: -5%;
    margin-top: -24px;
    margin-bottom: 28px
		}
	}
	</style>

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
        												<div class="">
															<div class="row">
																<?php if(isset($customers))
				      											{
						 										 if(count($customers) != 0) 
						  											{  ?>
						  											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($customers); ?>&nbsp;&nbsp;<a href="<?=base_url('index.php/admin/download_Excel')?>">
						  												 <i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
						   												<?php $excelData = json_decode(json_encode($customers), true);?>
						  											</div>
						 									 		<?php  } 
				         											 else
						 											 {?>
						   											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($customers)) {echo count($customers);}else {echo 0;} ?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																	</div>
																	<?php     } 
			           												} 
																	else
																	{ ?>
					       											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding:7px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($customers)) {echo count($customers);}else {echo 0;}?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																	</div>
																	<?php   }   ?>
																	<div class="col-sm-3" style="padding-left:0px;margin-left:-5%;">
																	<div class="add">
																		<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Add Customer&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer">
						   												<i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
																	</div>
																	</div>
																	
				   													<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				   														<!--<input type="date" name="filter_date" onchange="filterDateSelected(event);"/> -->
																	</div>
																	<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
																		<!--<lable style="margin-left:8px;">Filter : </lable>-->
				   													</div>
																	<div class="col-sm-2" >
																	
																	</div>
															</div>
          							      				</div>
														<hr>
													</div>
													<form method="post" name="search" id="searchform" action = "">
													<div class="row">
														<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                        <div style=" margin-top: 8px;" class="col">
					                                         <label for="DateRange" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
					                                          <select class="form-control"  name="Bank_name" id="Billing_type" onchange="submitform();" >
					                                                         <option value="">Select</option>
					                                                         <option value="Current_Month" <?php  if(isset($_REQUEST['Bank_name'])){if($_REQUEST['Bank_name'] == 'Current_Month') { ?> selected <?php } }?> >Current Month</option>
					                                                         <option value="Previous_Month"  <?php if(isset($_REQUEST['Bank_name'])){if($_REQUEST['Bank_name'] == 'Previous_Month') { ?> selected <?php } }?> >Previous Month</option>
					                                                         <option value="Select_Range"  <?php if(isset($_REQUEST['Bank_name'])){ if($_REQUEST['Bank_name'] == 'Select_Range') { ?> selected <?php } }?> >Select Range</option>
					                                          </select>
					                                       </div>
					                                       </div>
					                                       <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
					                                             <input  class="form-control Start_Date"  type="date" name="Start_Date" id="Start_Date" value="<?php if(isset($_REQUEST['Start_Date'])){echo $_REQUEST['Start_Date'];} ?>"  >
					                                          </div>  
					                                       </div> 
					                                       <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="End_Date" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
					                                             <input  class="form-control"  type="date" name="End_Date" id="End_Date"  value="<?php if(isset($_REQUEST['End_Date'])){ echo $_REQUEST['End_Date'];} ?>"    >
					                                          </div>  
					                                       </div> 
					                                           <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="Bank_name" style="font-size: 16px; color: black; font-weight: bold;">Filter</label>
					                                             	<select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_customers_admin"  >
																			<option value="">Select Filter</option>
																			<option value="Created"  <?php if(isset($_REQUEST['select_filters'])){if($_REQUEST['select_filters'] == 'Created') { ?> selected <?php } }?>  >Created </option> 
																			<option value="Personal details complete"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Personal details complete') { ?> selected <?php }} ?> >Personal Details Completed</option>
																			<option value="Aadhar E-sign complete"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Aadhar E-sign complete') { ?> selected <?php } }?> >Aadhar E-Sign Completed</option>
																			<option value="Income details complete"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Income details complete') { ?> selected <?php } } ?> >Income details complete</option>

																			<option value="Go No Go"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Go No Go') { ?> selected <?php } }?> >Go No Go</option>

																			<option value="PD Complete"  <?php   if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'PD Complete') { ?> selected <?php } }?> >PD Complete</option>

																			<option value="Document 
																			Upload Complete"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Document 
																			Upload Complete') { ?> selected <?php } }?> >Document 
																			Upload Complete</option>

																			<option value="Cam Details Complete"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Cam Details Complete') { ?> selected <?php } }?> >Cam Details Complete</option>

																			<option value="Loan application complete"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Loan application complete') { ?> selected <?php } }?> >Loan application complete</option>

																			<option value="Hold"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Hold') { ?> selected <?php } }?> >Hold</option>

																			<option value="Reject"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Reject') { ?> selected <?php } }?> >Reject</option>

																			<option value="Continue"  <?php  if(isset($_REQUEST['select_filters'])){ if($_REQUEST['select_filters'] == 'Continue') { ?> selected <?php } }?> >Continue</option>


																		</select>
					                                          </div>  
					                                       </div> 

														    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
															   <br><br>
																<input type="submit" name="search" value="Search">
					                                             	
					                                          </div>  
					                                       </div> 

					                                       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
																	
																	</div>
																	</form>
													</div>
													<hr>
													<body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="example" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															<th>Sr</th>
																					
																					<th>Name</th>
																					<!--<th>Email</th>
																					<th>Mobile</th> -->
																					<th>Customer Status</th>
																				    <th>Application Status</th>
																					<th>Source Name</th>
																					<th>Created On</th>
																					<th>Last Updated  On</th>
																					
																					<th>Pre CAM</th>
																					<th>CAM</th>
																					<th>PD</th>
																					<th>Actions</th>
                                                                                    <th>Sanction Form</th>
																					<th>Amortization</th>
																					<th>Calculate eligibilty</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php  $i= 1 ; if(!empty($customers)){foreach($customers as $row){  ?>
																				<tr>
					    															<td><?php echo $i;?></td>
																					<td><?php echo $row->FN." ".$row->LN;?></td>
																					<!--<td><?php echo $row->EMAIL; ?></td>
																					<td><?php echo $row->MOBILE; ?></td>-->
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
																				<!----------------------------------------------- application status ------------------>

																				 <?php
																					if($row->credit_sanction_status == 'REJECT')
																					{
																						?>
																						<td style="color:red;"><?php echo "REJECTED";?></td>
																						<?php
																					}
																					else if($row->credit_sanction_status == 'HOLD')
																					{
																						?>
																						<td style="color:Yellow;"><?php echo "HOLD";?></td>
																						<?php
																					}
																					else
																					{
																						if($row->STATUS == 'PD Completed')
																						{
																							?>
																								<td style="color:green;"><?php echo $row->STATUS; ?></td>
																							<?php
																						}
																						else if($row->STATUS == 'Aadhar E-sign complete')
																						{
																							if($row->cam_status == 'Cam details complete')
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

																						}
																						else if($row->cam_status == 'Cam details complete')
																		        			{
																								?>
																								<td style="color:green;"><?php echo "Submitted to Credit"; ?></td>
																		
																								<?php
																							}
																						else
																						{
																							?>
																						 <td style="color:green;"><?php echo "In Progress";?></td>
																						 <?php
																						}
																						
																					}
																					?>
																			


																					<td>	
																						<?php
																						foreach($customer_created_by as $row1)
																						{ 
									     													if($row->DSA_ID!=NULL && $row->DSA_ID!='0' )
																							{
																								if($row1->UNIQUE_CODE==$row->DSA_ID)
																								{
																									echo $row1->FN.' '.$row1->LN.' [DSA]<br>';
																								}
																							}
																							else if($row->RO_ID!=NULL && $row->RO_ID!='0' )
																							{
																								if($row1->UNIQUE_CODE==$row->RO_ID)
																								{
																									echo $row1->FN.' '.$row1->LN.' [RO]<br>';
																								}
																							}
																							else if($row->BM_ID!=NULL && $row->BM_ID!='0' )
																							{
																								if($row1->UNIQUE_CODE==$row->BM_ID)
																								{
																									echo $row1->FN.' '.$row1->LN.' [BM]<br>';
																								}
																							}
																						}?>
																					</td>
																					<td><?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y');?></td>
																					<td><?php if($row->last_updated_date!= '') {$date1 = date_create($row->last_updated_date); echo date_format($date1, 'd-m-Y'); }else {echo "";}?></td>
																					
																					<?php
																					if($row->STATUS == 'PD Completed')
																					{
																						?>
																						<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/admin/Generate_pre_cam?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		            
																						<?php
																					}
																					else if( $row->STATUS=='Aadhar E-sign complete')
																					{
																						?>
																							<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/admin/Generate_pre_cam?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		            
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
																					<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/admin/genrate_pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		           
																					<?php
																					}
																					else if( $row->STATUS =='Cam details complete')
																					{?>
																					<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/admin/genrate_pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		            <?php }
																					else
																					{
                                                                                     ?>
																					 <td><a style="margin-left: 8px; " class="btn" ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a></td>
																		           
																					 <?php
																					}?>
																					
																					<?php if($row->STATUS == 'PD Completed')
																						{
																					?>
																					<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/credit_manager_user/pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:red;"></i></a></td>
																		            <?php }
																					     else
																						 {
                                                                                     ?>
																					 <td><a style="margin-left: 8px; " class="btn"><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a></td>
																		            
																					 <?php
																						 }?>
																					<td>
																					<a href="<?php echo base_url()?>index.php/customer/profile_view_p_o?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>
																					
																					<a style="margin-left: 0px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																				</td>
																					<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/BranchManager/Loan_sanction_form?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a></td>
																		            <td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url()?>index.php/BranchManager/Amortization_Schedule?ID=<?php echo $row->UNIQUE_CODE;?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a></td>
																		            <td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Rule_Engine/Calculate_eligibility?ID=<?php echo $row->UNIQUE_CODE;?>"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a></td>
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
	                											<button type="button" class="close" data-dismiss="modal">
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
			               												<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL </button>
			                											<button type="submit" class="btn btn-primary">DELETE IT </button>
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

		function submitform()
		{
			

		}
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