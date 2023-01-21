<?php
    $message = $this->session->userdata('result');
	
    if (isset($message)) {
		if($message==1)
		{
        echo '<script> swal("success!", "Send To FI Successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['result']);
		}
		else if($message==2)
		{
        echo '<script> swal("warning!", "Please Upload Required Documents", "warning");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['result']);
		}
		
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             $this->session->unset_userdata('result');	
		}
    }

    ?>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>adminn/PD_CSS/css/montserrat-font.css">
        <link rel="stylesheet" href="<?php echo base_url()?>adminn/PD_CSS/css/style.css"/>
		<link href="sweetalert.css" type="text/css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
						<div class="card tabcontent"  id="FI1">    
							<div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
										
											
												<div class="text-center">
												<h3>Reports</h3>
												<input type="text" hidden value="<?php echo  base64_decode($_GET['x']); ?>" id="loan_application_id">
						                        <input type="text" hidden value="<?php echo  $cust_info->UNIQUE_CODE ; ?>" id="customer_id">
											</div>
											<div class="table-responsive">
												<table class="table table-bordered ">
											
													<tbody>
													<tr>
															<th>Types Of Reports</th>
															<th>Initiate Reports</th>
															<th>Initiated Date</th>
															<th>Reports</th>
														</tr>
														<tr>
															<td><i class="fa fa-upload" aria-hidden="true" data-toggle="modal"  data-target="#myModal" data-id='Legal' role='button' onClick="ShowModal(this)"></i>&nbsp;Legal</br></td>
															<td><?php echo'<a href="'.base_url().'index.php/credit_manager_user/Vendors_Legal?x='.$_GET['x'].'" class="btn btn-primary modal_test"> Initiate Legal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>'; ?></td>
															
															<td><?php if(!empty($Legal_docs)){ echo $Legal_docs->send_to_Legal_date; } ?></td>
															
															<td>
																
																	<?php
																	if(!empty($find_my_legal_documents))
																			{
																					foreach($find_my_legal_documents as $d)
																						{
																				?>
																					
																				
																						<h5><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>&nbsp;&nbsp;<?php echo $d->uploded_doc; ?></h5>
																					
																						
																					
																				<?php
																						}
																			}
																			else
																			{
																					?>
																				    
																				          <h5><a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;&nbsp;Legal document </h5><span style="color:red;font-size:9px;">(pending)</span>
																			            
																					
																					
																				<?php
																			}
																			?>
																
															</td>
														</tr>
														<tr>
															<td><i class="fa fa-upload" aria-hidden="true" data-toggle="modal"  data-target="#myModal" data-id='Technical' role='button' onClick="ShowModal(this)"></i>&nbsp;Technical</td>
															<td><?php echo '<a href="'.base_url().'index.php/credit_manager_user/Vendors_Technical?x='.$_GET['x'].'" class="btn  btn-primary modal_test"> Initiate Technical</a>';?></td>
															
															<td><?php if(!empty($Technical_docs)){ echo $Technical_docs->send_to_Technical_date; } ?></td>
														
															<td>
															   
																	<?php
																		if(!empty($find_my_technical_documents))
																		{
																				foreach($find_my_technical_documents as $d)
																					{
																			?>
																				        
																					            <h5><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>&nbsp; &nbsp;  <?php echo $d->uploded_doc; ?></h5>
																					            
																							
																						
																			<?php
																					}
																		}
																		else
																		{
																				?>
																			        
																					      <h5><a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Technical document <span style="color:red;font-size:9px;">(pending)</span></h5>
																		                
																					
																			<?php
																		}
																		?>
																
															</td>
														</tr>
														<tr>
															<td><i class="fa fa-upload" aria-hidden="true" data-toggle="modal" data-target="#myModal" data-id="FI" role='button' onClick="ShowModal(this)"></i>&nbsp;FI</td>
															<td><?php echo '<a href="'.base_url().'index.php/credit_manager_user/Vendors?x='.$_GET['x'].'" class="btn  btn-primary modal_test"> Initiate FI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </i></a>' ;?></td>
															
															<td><?php if(!empty($FI_docs)){ echo $FI_docs->send_to_fi_date; } ?></td>
															
															<td>
															        
																		<?php
																		if(!empty($find_my_FI_documents))
																		{
																				foreach($find_my_FI_documents as $d)
																					{
																			?>
																				       
																					   <h5><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>	&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>&nbsp; &nbsp;<?php echo $d->uploded_doc; ?></h5>
																					        
																								
																							
																				 <?php
																					}
																		}
																		else
																		{
																				?>
																				
																				
																				        <a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;FI document<span style="color:red;font-size:9px;">(pending)</span>
																		           
																			
																			<?php
																		}
																		?>
																	
															</td>
														</tr>
														<tr>
															<td><i class="fa fa-upload" aria-hidden="true" data-toggle="modal" data-target="#myModal" data-id="RCU" data-id="FI" role='button' onClick="ShowModal(this)"></i>&nbsp;RCU</td>
															<td><?php echo'<a href="'.base_url().'index.php/credit_manager_user/Vendors_RCU?x='.$_GET['x'].'" class="btn btn-primary modal_test"> Initiate RCU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>'; ?></td>
															
															<td><?php if(!empty($RCU_docs)){ echo $RCU_docs->send_to_RCU_date; } ?></td>
															
															<td>
															        
																		<?php
																			if(!empty($find_my_RCU_documents))
																			{
																					foreach($find_my_RCU_documents as $d)
																						{
																				?>
																					   
																						     <h5><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>&nbsp; &nbsp; <?php echo $d->uploded_doc; ?></h5>
																						    
																								
																							
																				<?php
																						}
																			}
																			else
																			{
																					?>
																						
																					
																		                	<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;&nbsp;RCU document <span style="color:red;font-size:9px;">(pending)</span>
																			            
																					
																				<?php
																			}
																		?>
																	
															</td>
														</tr>
														<tr>
															<td><i class="fa fa-upload" aria-hidden="true" data-toggle="modal" data-target="#myModal" data-id="Court case document" data-id="FI" role='button' onClick="ShowModal(this)"></i>&nbsp;Background verification Report</td>
															<td>--</td>
														
															<td>--</td>
															
															<td>
															        
																		<?php
																			if(!empty($find_my_Court_case_documents))
																			{
																					foreach($find_my_Court_case_documents as $d)
																						{
																				?> 
																						    <h5><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords("Court case /Background Verification documents"); ?>&nbsp; &nbsp; <?php echo $d->uploded_doc; ?></h5>
																					   
																							
																						
																					<?php
																						}
																			}
																			else
																			{
																					?>
																					
																					
																					         <a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Court case /Background Verification documents <span style="color:red;font-size:9px;">(pending)</span>
																					   
																				
																				<?php
																			}
																			?>
																	
															</td>
														</tr>
														<tr>
															<td><i class="fa fa-upload" aria-hidden="true" data-toggle="modal" data-target="#myModal" data-id="Legal Vetting Report" data-id="FI" role='button' onClick="ShowModal(this)"></i>&nbsp;Legal Vetting Report</td>
															<td>--</td>
															
															<td>--</td>
															
															<td>
															        
																		<?php
																			if(!empty($find_my_legal_vetting_documents))
																			{
																					foreach($find_my_legal_vetting_documents as $d)
																						{

																				?>
																					   <h5> <a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords("Legal Vetting Report"); ?>&nbsp; &nbsp; <?php echo $d->uploded_doc; ?></h5>
																					    
																							
																						
																					<?php
																						}
																			}
																			else
																			{
																					?>
																					
																					       <a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Legal Vetting Report<span style="color:red;font-size:9px;">(pending)</span>
																			            
																				<?php
																			}
																			?>
																	
																	</td>
														</tr>
													</tbody>
												</table>
                                            </div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </main>
	<!--------------------------------- Modal ---------------------------------------------->
	        <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload REPORTS</h4>
							</div>
							<div class="modal-body">
								<p>Select Document Type</p>
								<select class="form-control"  onChange="function_disbursement_status" id="select_repot_name">
								    <option value="">--Select--</option>
									
								</select>
								<br>
							     <p>Select File</p>
								<input type="file"name="report_document" id="report_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_Reports();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
</div>
<script>
	function ShowModal(elem)
	{
		
    var dataId = $(elem).data("id");
	
		if(dataId=="Legal")
		{
			optText = 'Legal Report';
			optValue = 'Legal document';
			$('#select_repot_name').empty();
			$('#select_repot_name').append(`<option value="${optValue}">${optText}</option>`);
		}
		else if(dataId=="Technical")
		{
		    optText = 'Technical Report';
			optValue = 'Technical document';
			$('#select_repot_name').empty();
			$('#select_repot_name').append(`<option value="${optValue}">${optText}</option>`);
		}
		else if(dataId=="FI")
		{
			optText = 'FI Report';
			optValue = 'FI document';
			$('#select_repot_name').empty();
			$('#select_repot_name').append(`<option value="${optValue}">${optText}</option>`);
		}
		else if(dataId=="RCU")
		{
			optText = 'RCU Report';
			optValue = 'RCU document';
			$('#select_repot_name').empty();
			$('#select_repot_name').append(`<option value="${optValue}">${optText}</option>`);
		}
		else if(dataId=="Court case document")
		{
			optText = 'Court case document / Background Verification';
			optValue = 'Court case document';
			$('#select_repot_name').empty();
			$('#select_repot_name').append(`<option value="${optValue}">${optText}</option>`);
		}
		else if(dataId=="Legal Vetting Report")
		{
			optText = 'Legal Vetting Report';
			optValue = 'Legal Vetting Report';
			$('#select_repot_name').empty();
			$('#select_repot_name').append(`<option value="${optValue}">${optText}</option>`);
		}
		
     }
	function uplod_Reports()
    {
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var customer_id =document.getElementById('customer_id').value;
     var select_repot_name =document.getElementById('select_repot_name').value;
	 var report_document=  $('#report_document').val();
	 var fileSelect = document.getElementById('report_document');
	 var report_document_ = fileSelect.files[0];
	 
	 let formData = new FormData(); 
	 formData.append("loan_application_id",loan_application_id);
     formData.append("customer_id",customer_id);
	 formData.append("file",report_document_);
	 formData.append("select_repot_name",select_repot_name);
	 
	 if(select_repot_name == '')
	 {
		 swal("Warning!", "Please Select Document Name", "warning");
	 }
	 else if(report_document == '')
	 {
		 swal("Warning!", "Please Select Document", "warning");
	 }
	 else
	 {
		   $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_Report_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Document Uploded Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 }
	
    }
</script>
 


