<style>
	.vertical-menu {
  width: 180px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #04AA6D; /* Add a green color to the "active/current" link */
  color: white;
}
</style>
<?php
  $total_types=  count($disbursement_property_type_documents);

//echo  $total_types;
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
									    <body class="wide comments example">
									    		  <input hidden type="text" value="<?php echo $userID;?>" id="login_user_unique_code">
														<input hidden type="text" value="<?php echo $row->UNIQUE_CODE;?>" id="applicant_unique_code">
														<input hidden type="text" value="<?php echo base64_encode($row->UNIQUE_CODE);?>" id="applicant_encoded_unique_code">
														<input hidden type="number" value="" id="selected_document_number">	
														<input hidden type="text" value="" id="selected_document_name">
											<div class="fw-body">
												<div class="content">
													<div class="row" style="padding:20px;margin-top: -20px;">
														
														<div class="col-sm-12"> 
															<h5>Applicant Name : <?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?></h5>
															<hr>
														</div>
														<br>

														<div class="col-sm-4"> 
															<h6>Type of loan: <?php if($loan_details->LOAN_TYPE == 'lap') { echo "Loan Against Property" ;} else {echo  $loan_details->LOAN_TYPE ; }?></h6>
														</div>
														<div class="col-sm-3"> 
															<h6>Sanctioned loan Amount : <?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?></h6>
														</div>
														<div class="col-sm-3"> 
															<h6>Tenure: <?php echo  $sanction_details->tenure ; ?></h6>
														</div>
														<div class="col-sm-2"> 
															<h6>ROI:  <?php echo  $sanction_details->rate_of_interest ; ?></h6>
														
														</div>
														<br>
														<br>
														<div class="col-sm-12"> 
															<h5>Add Approval Comments:</h5>
															<textarea id="approval_remarks" name="approval_remarks" class="form-control" type="text" ><?php  if(!empty($find_Disbursement_document_approval_data)){   echo $find_Disbursement_document_approval_data->Approval_remarks; }?></textarea>
															<hr>
														</div>
														<div class="col-sm-12"> 
															<h5>Add Disbursement Date</h5>
															<input id="disbursement_date" name="disbursement_date" class="form-control" type="date" >
															<hr>
														</div>
														<br>
														<?php 
														   if(!empty($find_Disbursement_document_approval_data))
														   {
															   ?>
															   <div class="col-sm-12">
																	<button type="button" class="btn btn-success" onclick="Approve_disbursement_application();" id="final_approve_btn">Approved</button>
																	<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Disbursement_OPS/cheque_details?I=<?php echo base64_encode($row->UNIQUE_CODE);?>" class="btn modal_test">
																	<button type="button" class="btn btn-primary"  id="cheque_details">Disbursement Cheque Details</button>
																	</a>
															  
															   </div>
															   <?php
														   }
														   else
														   {
															  ?>
															  <div class="col-sm-12">
																<button type="button" class="btn btn-primary" onclick="Approve_disbursement_application();" id="final_approve_btn">Approve</button>
																<a id="cheque_details" style="display:none" style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Disbursement_OPS/cheque_details?I=<?php echo base64_encode($row->UNIQUE_CODE);?>" class="btn modal_test">
																	<button type="button" class="btn btn-primary"  >Disbursement Cheque Details</button>
																</a>
														      </div>
															  <?php
														   }
														   
														?>
														
														<br>
														<hr>
													</div>
													<br>
													<div class="row">
														<div class="col-sm-2">
															<div class="vertical-menu">
															  <a href="#" class="active"> Disbursement documents</a>
															  <a href="#" id=""  onclick="section_loan_documents();">Loan Application Documents</a>
															  <a href="#" id=""  onclick="system_generated_documents();">System Generated Documents</a>
															  <?php 
															        $i=1;
															  		foreach ($disbursement_property_type_documents as  $value)
															  		{
															  			?>
															  				 <a href="#" id="<?php echo $value->id;?>" onclick="section<?php echo $value->id;?>();"><?php echo $value->Main_Document_Type ;?></a>
															  				 <input hidden type="number" value="<?php echo $value->id;?>" id="master_doc_id<?php echo $value->id;?>">
															  				 <input hidden type="text" value="<?php echo $value->Main_Document_Type;?>" id="master_doc_name<?php echo $value->id;?>">
															  			<?php
															  			$i++;
															  		}
															  ?>
															</div>
														</div>
														<div class="col-sm-10" style="border:1px solid gray;">
															<div id="default">Plese select document menu for further process
																<div id="pending_documents" style="display:none">
																<h4>Pending Document List</h4>
																<div style="overflow-x:auto;">
																	 <table class="table table-bordered">
																	 
																			<thead>
																			  <tr>
																				<th>Document Name</th>
																				<th>Available</th>
																				<th>Not Available </th>
																				<th>Not Applicable </th>
																				<th>PDD</th>
																				<th>Action</th>
																			  </tr>
																			</thead>
																			<tbody id="data_pending">
																			  
																			</tbody>
																			
																		  </table>
																</div>
																</div>
															</div>
															<div id="section_loan_documents_" style="display:none">
																		<br>
																		<h4 id="">Applicant Documents</h4>
																		<div style="overflow-x:auto;">
																		 <table class="table table-bordered">
																			<thead>
																			  <tr>
																				<th>Document Type</th>
																				<th>Document Name</th>
																				<th>View</th>
																				<th>Action</th>
																				<th>Comments</th>
																				<th>Waiver Attachement</th>
																			  </tr>
																			</thead>
																			<tbody id="section_loan_documents_data">
																			  <?php
																			    foreach($loan_application_documents as $L)
																				  {
																					 if( $L->DOC_MASTER_TYPE != "DISBURSEMENT AMOUNT ATTACHMENTS"  && $L->DOC_MASTER_TYPE != "Sanction Recommendation"  && $L->DOC_MASTER_TYPE != "Disbursement Documents" && $L->DOC_MASTER_TYPE != "DISBURSEMENT CHEQUE")
																					 {
																					  ?>
																					  <tr>
																					    <td><?php echo $L->DOC_MASTER_TYPE; ?></td>
																						<td><?php echo $L->DOC_TYPE; ?></td>
																						
																						<td><a href="<?php echo base_url();?>index.php/customer/view_waiver_file/<?php echo $L->ID; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;
</td>																					<td>
																							<select class="form-control"  id="status_for_document_<?php echo $L->ID; ?>"  onChange="function_disbursement_status(<?php echo $L->ID; ?>);" >
																							  <option value="" <?php if(!empty($L))if ($L->Disbursement_ststus == '') echo ' selected="selected"'; ?>>select</option>
																							  <option value="Approve" <?php if(!empty($L))if ($L->Disbursement_ststus == 'Approve') echo ' selected="selected"'; ?>>Approve</option>
																							  <option value="Reject" <?php if(!empty($L))if ($L->Disbursement_ststus == 'Reject') echo ' selected="selected"'; ?>>Reject</option>
																							  <option value="Waiver" <?php if(!empty($L))if ($L->Disbursement_ststus == 'Waiver') echo ' selected="selected"'; ?>>Waiver</option>
																							</select>
																						</td>
																						<td><lable id="show_comment_<?php echo $L->ID; ?>"></lable><?php if($L->Disbursement_ststus == 'Reject' ) {echo $L->Disbursement_ststus_comments;} else if($L->Disbursement_ststus == 'Waiver' ){ echo $L->Waiver_loan_document_comment; } ?></td>
																						<?php
																							if(!empty($L->Waiver_doc_cloud_name))
																							{
																								
																							
																						?>
																						<td><a href="<?php echo base_url();?>index.php/customer/view_waiver_file/<?php echo $L->ID; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;</td>
																							<?php }
																							else 
																							{
																								?>
																								<td id="display_wiver_doc_<?php echo $L->ID; ?>"  style="display:none;"><a href="<?php echo base_url();?>index.php/customer/view_waiver_file/<?php echo $L->ID; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;</td>
																							
																						
																								<?php
																							}
																							?>
																						</tr>
																					
																					  <?php
																					  }
																				  }
																			  ?>
																			</tbody>
																			
																		  </table>
																		  </div>
																		  <h4>Co-Applicant Documents</h4>
																		  <?php $i=1; 
																		  Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																		  { 
																		     ?>
																			 <?php echo "Documnet Of Co-Applicant ".$i." : ".$Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']; ?>
																			 <div style="overflow-x:auto;">
																			 <table class="table table-bordered">
																				<thead>
																				  <tr>
																					<th>Document Type</th>
																					<th>Document Name</th>
																					<th>View</th>
																					<th>Action</th>
																					<th>Comments</th>
																					<th>Waiver Attachement</th>
																				  </tr>
																				</thead>
																				<tbody id="section_loan_documents_data">
																				<?php 
																					Foreach($Coapplicant_docs[1] AS $Master)
																					{ 
																					
																					   Foreach($Coapplicant_docs[0] AS $document)
																						{ 
																						
																							if($document->DOC_MASTER_TYPE== $Master->DOC_MASTER_TYPE)
																							{
																								if($document->doc_cloud_name == '') 
																								{ 
																								?>
																								 <tr>
																									<td><?php echo $document->DOC_MASTER_TYPE; ?></td>
																									<td><?php echo $document->DOC_TYPE; ?></td>
																									
																									<td><a style="margin-left: 8px; " href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo strtoupper($document->DOC_TYPE); ?>&nbsp;&nbsp;
																									</td><td>
																							<select class="form-control"  id="status_for_document_<?php echo $document->ID; ?>"   onChange="function_disbursement_status(<?php echo $document->ID; ?>);">
																							  <option value="" <?php if(!empty($document))if ($document->Disbursement_ststus == '') echo ' selected="selected"'; ?>>select</option>
																							  <option value="Approve" <?php if(!empty($document))if ($document->Disbursement_ststus == 'Approve') echo ' selected="selected"'; ?>>Approve</option>
																							  <option value="Reject" <?php if(!empty($document))if ($document->Disbursement_ststus == 'Reject') echo ' selected="selected"'; ?>>Reject</option>
																							  <option value="Waiver" <?php if(!empty($document))if ($document->Disbursement_ststus == 'Waiver') echo ' selected="selected"'; ?>>Waiver</option>
																							
																							</select>
																						</td>
																								  </tr>
																								<?php
																								}
																								else
																								{
																								?>
																								 <tr>
																									<td><?php echo $document->DOC_MASTER_TYPE; ?></td>
																									<td><?php echo $document->DOC_TYPE; ?></td>
																									
																									<td><a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $L->ID; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;
			</td>																					<td>
																							<select class="form-control"  id="status_for_document_<?php echo $document->ID; ?>" onChange="function_disbursement_status(<?php echo $document->ID; ?>);">
																					        <option value="" <?php if(!empty($document))if ($document->Disbursement_ststus == '') echo ' selected="selected"'; ?>>select</option>
																							  <option value="Approve" <?php if(!empty($document))if ($document->Disbursement_ststus == 'Approve') echo ' selected="selected"'; ?>>Approve</option>
																							  <option value="Reject" <?php if(!empty($document))if ($document->Disbursement_ststus == 'Reject') echo ' selected="selected"'; ?>>Reject</option>
																							  <option value="Waiver" <?php if(!empty($document))if ($document->Disbursement_ststus == 'Waiver') echo ' selected="selected"'; ?>>Waiver</option>
																							
																							</select>
																						</td>
																						
																						<td><?php if($document->Disbursement_ststus == 'Reject' ) {echo $document->Disbursement_ststus_comments;} else if($document->Disbursement_ststus == 'Waiver' ){ echo $document->Waiver_loan_document_comment; } ?></td>
																						<?php
																							if(!empty($document->Waiver_doc_cloud_name))
																							{
																								
																							
																						?>
																						<td><a href="<?php echo base_url();?>index.php/customer/view_waiver_file/<?php echo $document->ID; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;</td>
																							<?php }
																							else
																							{
																								?>
																								<td id="display_wiver_doc_<?php echo $document->ID; ?>" style="display:none;"><a href="<?php echo base_url();?>index.php/customer/view_waiver_file/<?php echo $document->ID; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;</td>
																							
																						
																								<?php
																							}?>
																								  </tr>
																								<?php
																								}
																							}
																							
																						}
																					 $i++; }
																					?>
																				</tbody>
																				
																			  </table>
																			  </div>
																			 <?php
																		  }
																		  ?>
																		  
																		  
																	</div>
															<?php
															   
															   for($j=1; $j<=$total_types;$j++)
															   {
																   ?>
																   <div id="section<?php echo $j;?>" style="display:none">
																		<br>
																		<h4 id="heading<?php echo $j;?>"></h4>
																		<div style="overflow-x:auto;">
																		 <table class="table table-bordered">
																			<thead>
																			  <tr>
																				<th>Document Name</th>
																				<th>Available</th>
																				<th>Not Available </th>
																				 <th>Not Applicable </th>
																				 <th>PDD</th>
																				  <th>Action</th>
																				   
																			  </tr>
																			</thead>
																			<tbody id="section<?php echo $j;?>_data">
																			  
																			</tbody>
																			 <tbody id="section<?php echo $j;?>_data<?php echo $j;?>">
																			  
																			</tbody>
																		  </table>
																		  </div>
																	</div>
																   <?php
															   }
															   
															?>
															<div id="system_generated_documents_" style="display:none">
																					<br>
																					<h4 >System Generated Documents</h4>
																					<div style="overflow-x:auto;">
																					 <table class="table table-bordered">
																						<thead>
																						  <tr>
																							<th>Document Name</th>
																							<th>View</th>
																							<th>Action</th>
																					      </tr>
																						  
																						</thead>
																						<tbody>
																							  <tr>
																								<td>CAM</td>
																								<td><a href="<?php echo base_url();?>index.php/Operations_user/genrate_pdf?ID=<?php echo $row->UNIQUE_CODE; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a></td>
																								<td></td>
																							  </tr>
																							   <tr>
																								<td>PD</td>
																								<td><a href="<?php echo base_url();?>index.php/credit_manager_user/pdf?ID=<?php echo $row->UNIQUE_CODE; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a></td>
																								<td></td>
																							  </tr>
																							   <tr>
																								<td>Sanction Letter</td>
																								<td><a href="<?php echo base_url();?>index.php/credit_manager_user/Sanction_Letter?ID=<?php echo $row->UNIQUE_CODE; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a></td>
																								<td></td>
																							  </tr>
																							   <tr>
																								<td>MITC Letter</td>
																								<td><a href="<?php echo base_url();?>index.php/credit_manager_user/MITAC_pdf?ID=<?php echo $row->UNIQUE_CODE; ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a></td>
																								<td></td>
																							  </tr>
																							   <tr>
																								<td>Loan Agreement </td>
																								<td><a href="<?php echo base_url();?>index.php/Disbursement_OPS/Loan_Aggrement_AUTO?I=<?php echo base64_encode($row->UNIQUE_CODE); ?>" target='_blank' style="margin-left: 8px;"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a></td>
																								
																								<td></td>
																							  </tr>
																						</tbody>
																						
																					  </table>
																					  </div>
																				</div>
															
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
			</div>
		</div>
	</main>
	<div class="modal fade" id="Mymodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
						<h4 class="modal-title">Revert For Document </h4> 
					<!--<button type="button" class="close" data-dismiss="modal">×</button> -->
				                                                            
				</div> 
				<div class="modal-body">
					<h6 class="modal-title">Document Name : <lable id="selected_document_name_model_lable"></lable></h6> <br>
					<h6>Add Comments</h6>
					<textarea name="not_availabale_document_comments" id="not_availabale_document_comments" row="3" class="form-control"></textarea><br>
					<input hidden type="text" id="not_availabale_document_id">
					<input hidden type="text" id="not_availabale_document_name">
					<button type="button" class="btn btn-outline-success" onclick="submit_not_available_data();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="submit_cancel_data();">Cancel</button>
				</div>   
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	
	
	<div class="modal fade" id="Mymodal2">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
						<h4 class="modal-title">Details Needed For PDD </h4> 
					<!--<button type="button" class="close" data-dismiss="modal">×</button> -->
				                                                            
				</div> 
				<div class="modal-body">
					<h6 class="modal-title">Document Name : <lable id="selected_document_name_model_lable2"></lable></h6> <br>
			        <h6>Add Comments</h6>
			        <textarea name="pdd_comments" id="pdd_comments" row="3" class="form-control"></textarea><br>
					 <h6>Add PDD Date</h6>
					<input type="date" class="form-control" name="pdd_date" id="pdd_date" class="form-control"></input><br>
					<input hidden type="text" id="not_availabale_document_id2">
					<input hidden type="text" id="not_availabale_document_name2">
					<button type="button" class="btn btn-outline-success" onclick="submit_pdd_data();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="submit_pdd_cancel_data();">Cancel</button>
				</div>   
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model2">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	
	
	
	
	<div class="modal fade" id="Mymodal3">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Remarks</h4> 
				</div> 
				<div class="modal-body">
					<h6>Type Here,</h6>
					<textarea name="reject_loan_document_comment" id="reject_loan_document_comment" row="3" class="form-control"></textarea><br>
					<input hidden type="text" id="reject_loan_document_comment_id">
					<button type="button" class="btn btn-outline-success" onclick="reject_loan_document_comment();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="submit_cancel_status();">Cancel</button>
				</div>  
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model3">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	
	<div class="modal fade" id="Mymodal4">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Remarks</h4> 
				</div> 
				<div class="modal-body">
					<h6>Type Here,</h6>
					<textarea name="Waiver_loan_document_comment" id="Waiver_loan_document_comment" row="3" class="form-control"></textarea><br>
					<input  type="file" id="Waiver_loan_document_file" name="Waiver_loan_document_file">
					<input  type="text" id="Waiver_loan_document_comment_id">
					<button type="button" class="btn btn-outline-success" onclick="Waiver_loan_document_status();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="cancel_Waiver();">Cancel</button>
				</div>  
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model4">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	<footer class="c-footer">
		<div>Copyright © 2020 Finaleap.</div>
		<div class="mfs-auto">Powered by Finaleap</div>
	</footer>
</div>
<script>
function submit_cancel_status()
{
	$('#close_model3').prop('disabled', false); 
}

function cancel_Waiver()
{
	$('#close_model4').prop('disabled', false); 
}
function reject_loan_document_comment()
{
	var reject_loan_document_comment=document.getElementById('reject_loan_document_comment').value;
	var reject_loan_document_comment_id=document.getElementById('reject_loan_document_comment_id').value;
	let formData = new FormData(); 
	 formData.append("reject_loan_document_comment",reject_loan_document_comment);
	 formData.append("reject_loan_document_comment_id",reject_loan_document_comment_id);
	 
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_comments_for_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								//show_comment_
								 $('#show_comment_'+reject_loan_document_comment_id+'').html(''+reject_loan_document_comment+'');
								  $('#Mymodal3').modal('hide'); 
                     		}
                     	
                     }
              });  
}

function Waiver_loan_document_status()
{
	var Waiver_loan_document_comment=document.getElementById('Waiver_loan_document_comment').value;
	var Waiver_loan_document_comment_id=document.getElementById('Waiver_loan_document_comment_id').value;
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	var Waiver_doc=  $('#Waiver_loan_document_file').val();
	var fileSelect = document.getElementById('Waiver_loan_document_file');
	var Waiver_doc_ = fileSelect.files[0];
	
	let formData = new FormData(); 
	formData.append("Waiver_loan_document_comment",Waiver_loan_document_comment);
	formData.append("Waiver_loan_document_comment_id",Waiver_loan_document_comment_id);
	formData.append("file",Waiver_doc_);
	formData.append("login_user_unique_code",login_user_unique_code);
    formData.append("applicant_unique_code",applicant_unique_code);
		
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_Waiver_comments_for_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								 $('#show_comment_'+Waiver_loan_document_comment_id+'').html(''+Waiver_loan_document_comment+'');
								  $('#Mymodal4').modal('hide');
								  
								  //window.location.reload(true);
								 document.getElementById('display_wiver_doc_'+Waiver_loan_document_comment_id+'').style.display = 'block';
                     		}
                     	
                     }
              });  
}

function function_disbursement_status(id)
{
	 var doc_id = id;
	 var status_for_document=document.getElementById('status_for_document_'+id+'').value;
     if(status_for_document == 'Reject')
	 {
		document.getElementById('reject_loan_document_comment_id').value = id;
		    $('#Mymodal3').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal3').modal('show');
	 }
	 else if(status_for_document == 'Waiver')
	 {
		document.getElementById('Waiver_loan_document_comment_id').value = id;
		    $('#Mymodal4').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal4').modal('show');
	 }
	 else
	 {
	 let formData = new FormData(); 
	 formData.append("doc_id",doc_id);
	 formData.append("status_for_document",status_for_document);
	 
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_status_for_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								//$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              });  
	 }
			  
}

function Approve_disbursement_application()
{
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	let formData = new FormData(); 
	 formData.append("login_user_unique_code",login_user_unique_code);
     formData.append("applicant_unique_code",applicant_unique_code);

	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/Approve_disbursement_application"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
				    	var obj =JSON.parse(response);
					    var data2=obj.show_array;
						if(obj.result == "pending")
						{
							   swal( "Warning!","Please check pending documents","warning");
		 				
								$("#pending_documents").show();
								var tr = '';
								$.each(data2, function(key, value)
								{
									tr += '<tr><td><lable id="document_name_' + value.ID + '">' + value.sub_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.ID+'"><option value="">Select</option><option value="original" >Original</option><option value="photocopy">Photocopy</option><option value="certifiedcopy">Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.ID+'" onclick="function_not_available('+value.ID+',\'' + value.sub_name + '\');" ></td><td><input type="checkbox" id="not_applicable_'+value.ID+'" ></td><td><input type="checkbox"  id="is_pdd_'+value.ID+'"  onclick="is_pdd_action('+value.ID+',\'' + value.sub_name + '\');"></td><td><table class="table table-bordered"><tr><td><button id="save-button_'+value.ID+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.ID+',\'' + value.sub_name + '\'); " title="Save Details" > <i class="fa fa-save"></i> </button></td><td> <input type="file" id="document_for_uploading_'+value.ID+'" id="document_for_uploading_'+value.ID+'" onclick="upload_doc('+value.ID+',\'' + value.sub_name + '\');"></td><td>	 <button id="upload-button_'+value.ID+'" onclick="uploadFile();"  class="btn btn-outline-primary" title="Upload Document"> <i class="fa fa-upload" ></i> </button><button id="approve-button_'+value.ID+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.ID+',\'' + value.sub_name + '\'); " disabled="true"> Approve </button></td><td><lable id="lable_not_applicable_'+value.ID+'"</lable></td></tr></table></td></tr>';
									$('#data_pending').html(tr);
								}); 
						}
						else
						{
							//alert("hii");
							var login_user_unique_code = document.getElementById('login_user_unique_code').value;
							var applicant_unique_code = document.getElementById('applicant_unique_code').value;
							var approval_remarks = document.getElementById('approval_remarks').value;
							var disbursement_date = document.getElementById('disbursement_date').value;
							if(approval_remarks == '')
							{
								 swal( "Warning!","Please add approval remarks","warning");
							}
							else if(disbursement_date == '')
							{
								 swal( "Warning!","Please add disbursement date","warning");
							}
							
							else
							{
								let formData2 = new FormData(); 
								formData2.append("login_user_unique_code",login_user_unique_code);
								formData2.append("applicant_unique_code",applicant_unique_code);
								formData2.append("approval_remarks",approval_remarks);
								formData2.append("disbursement_date",disbursement_date);
								$.ajax({
										 type: "POST",
										 url:'<?php echo base_url("index.php/Disbursement_OPS/save_disbursement_approval"); ?>',
										 data:formData2,
										 processData: false,
										 contentType: false,
										 success: function(response) 
										 {
											var obj =JSON.parse(response);
											//var data2=obj.show_array;
											if(obj.status == 'inserted')
											{
												 swal( "Success!","Approved","success");
												 $('#final_approve_btn').html("Approved");
												 $('#cheque_details').show();
											}
											else if(obj.status == 'updated') 
											{
												 swal( "Warning!","Status Updated","warning");
												 $('#final_approve_btn').html("Approved");
												  $('#cheque_details').show();
												// $('#cheque_details').prop('disabled', false);
											}
											
											
											
											
											
										 }
								});
							}
						 
	 							
		 				
						}
						
                   	    
                     	
                     }
              }); 
}
</script>
<script>
function submit_pdd_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id2').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name2').value;
		 var pdd_date = document.getElementById('pdd_date').value;
		  var pdd_comments = document.getElementById('pdd_comments').value;
		 if(pdd_date== '')
		 {
		 		swal( "Warning!","Please add date","warning");
		 		exit();
		 }
		 		 else if(pdd_comments== '')
		 {
		 		swal( "Warning!","Please add comments","warning");
		 		exit();
		 }
		 else
		 {

          var selected_document_type_id = not_availabale_document_id;
		  var selected_document_type_name = not_availabale_document_name;
		  var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		  var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		    if ($('#is_pdd_'+not_availabale_document_id+'').is(':checked')) 
					{
				        var is_pdd_ = "yes";
					}
					else
					{
						var is_pdd_ = "no";
					}
   
		  let formData = new FormData();  
          formData.append("not_availabale_document_id", not_availabale_document_id);
          formData.append("not_availabale_document_comments", not_availabale_document_comments);
          formData.append("selected_document_type_id", selected_document_type_id);
		  formData.append("selected_document_type_name", selected_document_type_name);
		  formData.append("login_user_unique_code", login_user_unique_code);
		  formData.append("applicant_unique_code", applicant_unique_code);
		  formData.append("is_pdd_", is_pdd_);
		   formData.append("pdd_date", pdd_date);
		     formData.append("pdd_comments", pdd_comments);
		  
	 	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_pdd_date"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{

                     			      // $("#is_pdd_"+selected_document_type_id).hide();
									 // $(“#is_pdd_”). removeAttr(“disabled”);
									  // $('#is_pdd_').attr('readonly',true);
									    // ("#is_pdd_"+selected_document_type_id).attr('readonly',true);
                     		           $("#available_type_"+selected_document_type_id).hide();
                     		           $("#not_applicable_"+selected_document_type_id).hide();
                     		           $("#document_for_uploading_"+selected_document_type_id).hide();
                     		           $("#upload-button_"+selected_document_type_id).hide();
                     		           $("#approve-button_"+selected_document_type_id).hide();//'
                     		           //$('#lable_not_applicable_'+selected_document_type_id+'').html("Waiting For Revert");
                       		
                      			swal( "Success!","Details saved Successfully","success");
								$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              });  
		 }

		

	}
	
function submit_pdd_cancel_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id2').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name2').value;
		 //var not_availabale_document_comments = document.getElementById('not_availabale_document_comments').value;
		 var selected_document_type_id = not_availabale_document_id;
		// alert(selected_document_type_id);
		 var selected_document_type_name = not_availabale_document_name;
		 var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		 var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	     // $("#is_pdd_"+selected_document_type_id).show();
         $("#available_type_"+selected_document_type_id).show();
         $("#not_applicable_"+selected_document_type_id).show();
		 $("#is_pdd_"+selected_document_type_id).prop('checked', false); 
		 $("#document_for_uploading_"+selected_document_type_id).show();
         $("#upload-button_"+selected_document_type_id).show();
         $("#approve-button_"+selected_document_type_id).show();
		 $('#lable_not_applicable_'+not_availabale_document_id+'').html("");
		 swal( "Success!","PDD Process Cancelled","success");
         $('#close_model2').prop('disabled', false);    

		

	}
function submit_cancel_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name').value;
		 var not_availabale_document_comments = document.getElementById('not_availabale_document_comments').value;
		 var selected_document_type_id = not_availabale_document_id;
		 var selected_document_type_name = not_availabale_document_name;
		
		 var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		 var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	     $("#is_pdd_"+selected_document_type_id).show();
         $("#available_type_"+selected_document_type_id).show();
         $("#not_applicable_"+selected_document_type_id).show();
		 $("#not_available_"+selected_document_type_id).prop('checked', false); // Unchecks it
		 $("#document_for_uploading_"+selected_document_type_id).show();
         $("#upload-button_"+selected_document_type_id).show();
         $("#approve-button_"+selected_document_type_id).show();
		 $('#lable_not_applicable_'+not_availabale_document_id+'').html("");
		 swal( "Success!","Process Cancelled","success");
         $('#close_model').prop('disabled', false);    

		

	}
	function DeleteFile(value,name)
	{
		
		 var Delete_Document_number = value;
		 var Delete_document_name = name;

		// alert()
		 let formData = new FormData(); 
     formData.append("Delete_Document_number",Delete_Document_number);
     formData.append("Delete_document_name",Delete_document_name);

		 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/delete_disbursement_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{

                     			         $("#is_pdd_"+Delete_Document_number).hide();
                     		           $("#available_type_"+Delete_Document_number).hide();
                     		           $("#not_available_"+Delete_Document_number).hide();
                     		           $("#not_applicable_"+Delete_Document_number).hide();
                     		           $("#document_for_uploading_"+Delete_Document_number).hide();// id="document_name_' + value.id + '"
                     		           $("#document_name_"+Delete_Document_number).hide();
                     		           $("#save-button_"+Delete_Document_number).hide();//'
                     		           $("#approve-button_"+Delete_Document_number).hide();//'
                     		           $("#delete-button_"+Delete_Document_number).hide();//'
									   $("#pdf_icon_"+Delete_Document_number).hide();
									     $("#delete_link_"+Delete_Document_number).hide();
                     		           $('#lable_not_applicable_'+Delete_Document_number+'').html("File Deleted"); //    
                       		
                      			swal( "Success!","Document Deleted Successfully","success");
                     		}
                     	
                     }
              }); 
	}
	function submit_not_available_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name').value;
		 var not_availabale_document_comments = document.getElementById('not_availabale_document_comments').value;
		 if(not_availabale_document_comments== '')
		 {
		 		swal( "Warning!","Please add comment","warning");
		 		exit();
		 }
		 else
		 {

           var selected_document_type_id = not_availabale_document_id;
		  var selected_document_type_name = not_availabale_document_name;
		  var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		  var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		    if ($('#not_available_'+not_availabale_document_id+'').is(':checked')) 
					{
				     var not_available_ = "yes";
					}
					else
					{
						 var not_available_ = "no";
					}
   

		  let formData = new FormData();  
      formData.append("not_availabale_document_id", not_availabale_document_id);
      formData.append("not_availabale_document_comments", not_availabale_document_comments);
      formData.append("selected_document_type_id", selected_document_type_id);
		  formData.append("selected_document_type_name", selected_document_type_name);
		  formData.append("login_user_unique_code", login_user_unique_code);
		  formData.append("applicant_unique_code", applicant_unique_code);
		  formData.append("not_available_", not_available_);


		 	$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_not_available_document_data"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{

                     			         $("#is_pdd_"+selected_document_type_id).hide();
                     		           $("#available_type_"+selected_document_type_id).hide();
                     		           $("#not_applicable_"+selected_document_type_id).hide();
                     		           $("#document_for_uploading_"+selected_document_type_id).hide();
                     		           $("#upload-button_"+selected_document_type_id).hide();
                     		           $("#approve-button_"+selected_document_type_id).hide();//'
                     		           	$('#lable_not_applicable_'+selected_document_type_id+'').html("Waiting For Revert");
                       		
                      			swal( "Success!","Document Reverted Successfully","success");
								$('#close_model').prop('disabled', false);   
                     		}
                     	
                     }
              });  
		 }

		

	}
	function upload_doc(value,name)
	{
		  $('#selected_document_number').val(value);
		  $('#selected_document_name').val(name);
  }

  function function_not_available(value,name)
  {
	   $("#is_pdd_"+value).hide();
       $("#available_type_"+value).hide();
       //$("#not_available_"+value).hide();
	   $("#not_applicable_"+value).hide();
	   $("#save-button_"+value).hide();
       $("#document_for_uploading_"+value).hide();
       $("#upload-button_"+value).hide();
       $("#approve-button_"+value).hide();//'
       $('#lable_not_applicable_'+value+'').html("Not Available");

  	  $('#not_availabale_document_id').val(value);
	  $('#not_availabale_document_name').val(name);
      $('#selected_document_name_model_lable').html(name);
      document.getElementById('not_availabale_document_comments').value='';
	  		  $('#Mymodal').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal').modal('show');

  }
  function is_pdd_action(value,name)
  {
	   //alert(value);
       $("#available_type_"+value).hide();
	   $("#not_applicable_"+value).hide();
	   $("#not_available_"+value).hide();
	   $("#document_for_uploading_"+value).hide();
       $("#upload-button_"+value).hide();
       $("#approve-button_"+value).hide();//'
       $('#lable_not_applicable_'+value+'').html("Post Disbursement Document");
	   $('#not_availabale_document_id2').val(value);
	  $('#not_availabale_document_name2').val(name);
	    $('#selected_document_name_model_lable2').html(name);
	    $('#Mymodal2').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal2').modal('show');
  }
	  
 function uploadFile() {

   var selected_document_number = document.getElementById('selected_document_number').value;
    if(selected_document_number == '')
   		{
  			swal( "Warning!","Please select document for Uploading","warning");
            exit();        			
   		}
  
   var selected_document_name = document.getElementById('selected_document_name').value;
   var document_for_uploadingID= 'document_for_uploading_'+selected_document_number;
   var available_type_ = document.getElementById('available_type_'+selected_document_number+'').value;
 
  
   if(available_type_ == '')
   		{
  			swal( "Warning!","Please select document available type","warning");
              exit();        			
   		}
   else {
			swal("Please wait document is uploading");
			let formData = new FormData();  
			if(selected_document_number == 1) 
			{       
				formData.append("file",document_for_uploading_1.files[0]);
			}
			if(selected_document_number == 2) 
			{       
				formData.append("file",document_for_uploading_2.files[0]);
			}
			if(selected_document_number == 3) 
			{       
				formData.append("file",document_for_uploading_3.files[0]);
			}
			if(selected_document_number == 4) 
			{       
				formData.append("file",document_for_uploading_4.files[0]);
			}
			if(selected_document_number == 5) 
			{       
				formData.append("file",document_for_uploading_5.files[0]);
			}
			if(selected_document_number == 6) 
			{       
				formData.append("file",document_for_uploading_6.files[0]);
			}
			if(selected_document_number == 7) 
			{       
				formData.append("file",document_for_uploading_7.files[0]);
			}
			if(selected_document_number == 8) 
			{       
				formData.append("file",document_for_uploading_8.files[0]);
			}
			if(selected_document_number == 9) 
			{       
				formData.append("file",document_for_uploading_9.files[0]);
			}
			if(selected_document_number == 10) 
			{       
				formData.append("file",document_for_uploading_10.files[0]);
			}
			if(selected_document_number == 11) 
			{       
				formData.append("file",document_for_uploading_11.files[0]);
			}
			if(selected_document_number == 12) 
			{       
				formData.append("file",document_for_uploading_12.files[0]);
			}
			if(selected_document_number == 13) 
			{       
				formData.append("file",document_for_uploading_13.files[0]);
			}
			if(selected_document_number == 14) 
			{       
				formData.append("file",document_for_uploading_14.files[0]);
			}
			if(selected_document_number == 15) 
			{       
				formData.append("file",document_for_uploading_15.files[0]);
			}
			if(selected_document_number == 16) 
			{       
				formData.append("file",document_for_uploading_16.files[0]);
			}
			if(selected_document_number == 17) 
			{       
				formData.append("file",document_for_uploading_17.files[0]);
			}
			if(selected_document_number == 18) 
			{       
				formData.append("file",document_for_uploading_18.files[0]);
			}
			if(selected_document_number == 19) 
			{       
				formData.append("file",document_for_uploading_19.files[0]);
			}
			if(selected_document_number == 20) 
			{       
				formData.append("file",document_for_uploading_20.files[0]);
			}
			if(selected_document_number == 21) 
			{       
				formData.append("file",document_for_uploading_21.files[0]);
			}
			if(selected_document_number == 22) 
			{       
				formData.append("file",document_for_uploading_22.files[0]);
			}
			if(selected_document_number == 23) 
			{       
				formData.append("file",document_for_uploading_23.files[0]);
			}
			if(selected_document_number == 24) 
			{       
				formData.append("file",document_for_uploading_24.files[0]);
			}
			if(selected_document_number == 25) 
			{       
				formData.append("file",document_for_uploading_25.files[0]);
			}
			if(selected_document_number == 26) 
			{       
				formData.append("file",document_for_uploading_26.files[0]);
			}
			if(selected_document_number == 27) 
			{       
				formData.append("file",document_for_uploading_27.files[0]);
			}
			if(selected_document_number == 28) 
			{       
				formData.append("file",document_for_uploading_28.files[0]);
			}
			if(selected_document_number == 29) 
			{       
				formData.append("file",document_for_uploading_29.files[0]);
			}
			if(selected_document_number == 30) 
			{       
				formData.append("file",document_for_uploading_30.files[0]);
			}
			if(selected_document_number == 31) 
			{       
				formData.append("file",document_for_uploading_31.files[0]);
			}
			if(selected_document_number == 32) 
			{       
				formData.append("file",document_for_uploading_32.files[0]);
			}
			if(selected_document_number == 33) 
			{       
				formData.append("file",document_for_uploading_33.files[0]);
			}
			if(selected_document_number == 34) 
			{       
				formData.append("file",document_for_uploading_34.files[0]);
			}
			if(selected_document_number == 35) 
			{       
				formData.append("file",document_for_uploading_35.files[0]);
			}
			if(selected_document_number == 36) 
			{       
				formData.append("file",document_for_uploading_36.files[0]);
			}
			if(selected_document_number == 37) 
			{       
				formData.append("file",document_for_uploading_37.files[0]);
			}
			if(selected_document_number == 38) 
			{       
				formData.append("file",document_for_uploading_38.files[0]);
			}
			if(selected_document_number == 39) 
			{       
				formData.append("file",document_for_uploading_39.files[0]);
			}
			if(selected_document_number == 40) 
			{       
				formData.append("file",document_for_uploading_40.files[0]);
			}
			if(selected_document_number == 41) 
			{       
				formData.append("file",document_for_uploading_41.files[0]);
			}
			if(selected_document_number == 42) 
			{       
				formData.append("file",document_for_uploading_42.files[0]);
			}
			if(selected_document_number == 43) 
			{       
				formData.append("file",document_for_uploading_43.files[0]);
			}
			if(selected_document_number == 44) 
			{       
				formData.append("file",document_for_uploading_44.files[0]);
			}
			if(selected_document_number == 45) 
			{       
				formData.append("file",document_for_uploading_45.files[0]);
			}
			if(selected_document_number == 46) 
			{       
				formData.append("file",document_for_uploading_46.files[0]);
			}
			if(selected_document_number == 47) 
			{       
				formData.append("file",document_for_uploading_47.files[0]);
			}
			if(selected_document_number == 48) 
			{       
				formData.append("file",document_for_uploading_48.files[0]);
			}
			if(selected_document_number == 49) 
			{       
				formData.append("file",document_for_uploading_49.files[0]);
			}
			if(selected_document_number == 50) 
			{       
				formData.append("file",document_for_uploading_50.files[0]);
			}
			if(selected_document_number == 51) 
			{       
				formData.append("file",document_for_uploading_51.files[0]);
			}
			if(selected_document_number == 52) 
			{       
				formData.append("file",document_for_uploading_52.files[0]);
			}
			if(selected_document_number == 53) 
			{       
				formData.append("file",document_for_uploading_53.files[0]);
			}
			if(selected_document_number == 54) 
			{       
				formData.append("file",document_for_uploading_54.files[0]);
			}
			if(selected_document_number == 55) 
			{       
				formData.append("file",document_for_uploading_55.files[0]);
			}
			if(selected_document_number == 56) 
			{       
				formData.append("file",document_for_uploading_56.files[0]);
			}
			if(selected_document_number == 57) 
			{       
				formData.append("file",document_for_uploading_57.files[0]);
			}
			if(selected_document_number == 58) 
			{       
				formData.append("file",document_for_uploading_58.files[0]);
			}
			if(selected_document_number == 59) 
			{       
				formData.append("file",document_for_uploading_59.files[0]);
			}
			if(selected_document_number == 60) 
			{       
				formData.append("file",document_for_uploading_60.files[0]);
			}
			if(selected_document_number == 61) 
			{       
				formData.append("file",document_for_uploading_61.files[0]);
			}
			if(selected_document_number == 62) 
			{       
				formData.append("file",document_for_uploading_62.files[0]);
			}
			if(selected_document_number == 63) 
			{       
				formData.append("file",document_for_uploading_63.files[0]);
			}
			if(selected_document_number == 64) 
			{       
				formData.append("file",document_for_uploading_64.files[0]);
			}
			if(selected_document_number == 65) 
			{       
				formData.append("file",document_for_uploading_65.files[0]);
			}
			if(selected_document_number == 66) 
			{       
				formData.append("file",document_for_uploading_66.files[0]);
			}
			if(selected_document_number == 67) 
			{       
				formData.append("file",document_for_uploading_67.files[0]);
			}
			if(selected_document_number == 68) 
			{       
				formData.append("file",document_for_uploading_68.files[0]);
			}
			if(selected_document_number == 69) 
			{       
				formData.append("file",document_for_uploading_69.files[0]);
			}
			if(selected_document_number == 70) 
			{       
				formData.append("file",document_for_uploading_70.files[0]);
			}
			
        var selected_document_type_id = selected_document_number;
		var selected_document_type_name = selected_document_name;
		var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;

   if ($('#not_available_'+selected_document_number+'').is(':checked')) 
		{
	        var not_available_ = "yes";
		}
		else
		{
			var not_available_ = "no";
		}
   
    if ($('#is_pdd_'+selected_document_number+'').is(':checked')) 
		{
	     var is_pdd_ = "yes";
		}
		else
		{
			 var is_pdd_ = "no";
		}//not_applicable_

		 if ($('#not_applicable_'+selected_document_number+'').is(':checked')) 
		{
	     var not_applicable_ = "yes";
		}
		else
		{
			 var not_applicable_ = "no";
		}
    
    if(not_available_ == "yes" && not_applicable_ == "yes")
    {
    	$('#not_available_'+selected_document_number+'').prop('checked', false);
    			$('#not_applicable_'+selected_document_number+'').prop('checked', false);
    			swal( "Warning!","Please select any one from Not applicable or Not Available","warning");
    			exit();

    }
		formData.append("available_type_", available_type_);
       formData.append("not_available_", not_available_);
	  formData.append("is_pdd_", is_pdd_);
	  formData.append("not_applicable_", not_applicable_);

		formData.append("selected_document_type_id", selected_document_type_id);
		formData.append("selected_document_type_name", selected_document_type_name);
		formData.append("login_user_unique_code", login_user_unique_code);
		formData.append("applicant_unique_code", applicant_unique_code);

    //alert(formData);
      $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/upload_one_by_one_documents"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       			$('#upload-button_'+selected_document_type_id+'').hide();
								$('#approve-button_'+selected_document_type_id+'').prop('disabled', false);
                       	 		$('#pdf_icon_'+selected_document_type_id+'').css({color:"red"	});
                      			swal( "Success!","Document Uploded Successfully","success");
                     		}
                     		else if(obj.status == 'blank')
                     		{
                     		
                      			swal( "Warning!","Please select document","warning");
                      			
                     		}
                     		else 
                     		{
                     		
                      			swal( "Warning!","Document Already Exists","warning");
                      			
                     		}
                     }
              }); 
   }			  
    
}
</script>
<script>
 function ApproveFile(value,name) 
 {
   var selected_document_number =value;
   var selected_document_name =name;
   let formData = new FormData();   
   var selected_document_type_id = selected_document_number;
   var selected_document_type_name = selected_document_name;
   var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;


		var available_type_ = document.getElementById('available_type_'+selected_document_number+'').value;
	
	
   if ($('#not_available_'+selected_document_number+'').is(':checked')) 
		{
	     var not_available_ = "yes";
		}
		else
		{
			 var not_available_ = "no";
		}
   
    if ($('#is_pdd_'+selected_document_number+'').is(':checked')) 
		{
	     var is_pdd_ = "yes";
		}
		else
		{
			 var is_pdd_ = "no";
		}

		 if ($('#not_applicable_'+selected_document_number+'').is(':checked')) 
		{
	       var not_applicable_ = "yes";
		}
		else
		{
			 var not_applicable_ = "no";
		}
		
		if(not_applicable_ == 'no' && is_pdd_ == 'no' && not_available_ == 'no')
		{
			swal( "Warning!","Please select document For uploading","warning");
		}
		
		formData.append("selected_document_type_id", selected_document_type_id);
		formData.append("selected_document_type_name", selected_document_type_name);
		formData.append("login_user_unique_code", login_user_unique_code);
		formData.append("applicant_unique_code", applicant_unique_code);
		formData.append("available_type_", available_type_);
        formData.append("not_available_", not_available_);
	    formData.append("is_pdd_", is_pdd_);
	    formData.append("not_applicable_", not_applicable_);

      $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/Approval_of_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       			$('#approve-button_'+selected_document_type_id+'').html("Approved");
                       	 	
                      			swal( "Success!","Document Approved","success");
                     		}
                     		else if(obj.status == 'blank')
                     		{
                     		
                      			swal( "Warning!","Please select document available type","warning");
                      			
                     		}
                     		else if(obj.status == 'saved')
                     		{
                     		 
                        			swal( "Success!","Details saved successfully","success");
                      			
                     		}
                     		else if(obj.status == 'not_applicable_saved')
                     		{
                     		   
                     		           $("#is_pdd_"+selected_document_type_id).hide();
                     		           $("#available_type_"+selected_document_type_id).hide();
                     		           $("#not_available_"+selected_document_type_id).hide();
                     		           $("#document_for_uploading_"+selected_document_type_id).hide();
                     		           $("#upload-button_"+selected_document_type_id).hide();
                     		           $("#approve-button_"+selected_document_type_id).hide();//'
                     		           	$('#lable_not_applicable_'+selected_document_type_id+'').html("Not Applicable");

                      			swal( "Success!","Details saved successfully","success");
                      			
                     		}
                     		else 
                     		{
                     		
                      			swal( "Warning!","Something went wrong","warning");
                      			
                     		}
                     }
              });   
    
}

	
</script>
<?php

 
 for($k=1;$k<=$total_types; $k++)
 {
	
	?> 
	<script type="text/javascript">
	
		
	function section<?php echo $k;?>()
	{
		//alert("hii");
		 $("#pending_documents").hide();
		var common = <?php echo $k;?>;
	   var total_types = <?php echo $total_types;?>;
		var master_doc_id = document.getElementById('master_doc_id'+common+'').value;
		var master_doc_name = document.getElementById('master_doc_name'+common+'').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_join_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						'applicant_unique_code':applicant_unique_code
						},
					success:function(data)
						{
						var obj =JSON.parse(data);

						 var tr1 = '';
						 $.each(obj.subtypes, function(key, value){
				     	 	var not_available_,not_applicable_,condition3 = "" ;
						    var condition1,condition2,is_pdd_ = "" ;
							if(value.available_type_ == "original")
							{
						  	    condition1 = "selected";
							}
							else
							{
							    condition1 = "";
							}
		 				    if(value.available_type_ == "certifiedcopy")
						    {
							   condition2 = "selected";
							}
							else
							{
							   condition2 = "";
							}
							if(value.available_type_ == "photocopy")
							{
								condition3 = "selected";
							}
							else
							{
								condition3 = "";
							}
    	 					if(value.not_available_ == "yes")
		 					{
								 not_available_ = " checked=checked";
		 					}
	     					else
		 					{
							   not_available_ = "";
		 					}
							if(value.not_applicable_ == "yes")
					    	{
							   not_applicable_ = " checked=checked";
							}
							else
							{
						        not_applicable_ = "";
							}
							if(value.is_pdd_ == "yes")
							{
								is_pdd_ = " checked=checked";
							}
							else
							{
								is_pdd_ = "";
							}
							if(value.Approved_status == 'Approved')
					 		{
                       		   var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;
     							if(value.is_pdd_ == 'yes')
						 			{
						                			tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'" disabled="disabled"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled" ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+' disabled="disabled"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled"></td></td><td><lable>Post Disbursement Document</lable></td></tr>';
    							        $('#section'+common+'_data').html(tr1);
    						            $('#heading'+common+'').html(master_doc_name);
						 			}
					 			else
   					 			    {
			                       
			                          tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control" style="border:2px solid green" id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" disabled="disabled"  ></td><td><input type="checkbox"  disabled="disabled" id="not_applicable_'+value.id+'"  ></td><td><input type="checkbox" id="is_pdd_'+value.id+'"   ></td></td><td><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); "> Approved </button><a  style="margin-left: 8px; color:red " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank" id="delete_link_'+value.id+'"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a><button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Delete File </button><lable id="lable_not_applicable_'+value.id+'"</lable></td></tr>';
    							      $('#section'+common+'_data').html(tr1);
    							      $('#heading'+common+'').html(master_doc_name);
					     			}
					 		}
							else if(value.not_applicable_ == 'yes')
							{
							    tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control" id="available_type_'+value.id+'" disabled="disabled" ><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled" ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+' checked="checked"  disabled="disabled" ></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled" ></td></td><td><lable id="lable_not_applicable_'+value.id+'">Not Applicable</lable></td></tr>';
    					        $('#section'+common+'_data').html(tr1);
    					        $('#heading'+common+'').html(master_doc_name);
							}
						   else if(value.not_available_ == 'yes' && value.not_available_status == 'Reverted')
							{
							    tr1 += '<tr><td><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control" id="available_type_'+value.id+'" disabled="disabled" ><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled"  checked="checked"></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+'  disabled="disabled" ></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled" ></td></td><td><lable id="lable_not_applicable_'+value.id+'">Waiting for Revert</lable></td></tr>';
    					        $('#section'+common+'_data').html(tr1);
    						    $('#heading'+common+'').html(master_doc_name);
							}
							else
							{
								if(value.DOC_TYPE == '')
							 				{
							 					if(value.is_pdd_ == 'yes')
										 			{
										 				tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'" disabled="disabled"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled" ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+' disabled="disabled"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled"></td></td><td><lable>Post Disbursement Document</lable></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);
										 			}
										 			else
										 			{
										 				tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" ></td><td><input type="checkbox"  disabled="disabled" id="not_applicable_'+value.id+'"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" ></td></td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary" title="Upload Document"> <i class="fa fa-upload" ></i><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " disabled="true"> Approve </button><lable id="lable_not_applicable_'+value.id+'"</lable></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);

										 			}
							 				}
							 				else
							 				{
							 					if(value.is_pdd_ == 'yes')
										 			{
										 				tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+'></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+'></td></td><td>										 					<table class="table table-bordered"><tr><td><button id="save-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " title="Save Details"> <i class="fa fa-save"></i> </button></td><td><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Approve </button></td><td><button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Delete File </button></td><td><lable id="lable_not_applicable_'+value.id+'"</lable></td>										 					</tr>	</table></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);
										 			}
										 			else
										 			{
										 				tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" ></td><td><input type="checkbox"  disabled="disabled" id="not_applicable_'+value.id+'"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" ></td></td><td>										 					<table class="table table-bordered"><tr><td><button id="save-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " title="Save Details"> <i class="fa fa-save"></i> </button></td><td><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Approve </button></td><td><button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Delete File </button></td><td><lable id="lable_not_applicable_'+value.id+'"</lable></td>										 					</tr>	</table></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);

										 			}
							 				}
  
							 		}
    					});


							  var tr = '';
							 $.each(obj.not_present_subtypes, function(key, value)
							 {
										 	 
							 	  tr += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" >Original</option><option value="photocopy">Photocopy</option><option value="certifiedcopy">Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" onclick="function_not_available('+value.id+',\'' + value.subtype_document_name + '\');" ></td><td><input type="checkbox" id="not_applicable_'+value.id+'" ></td><td><input type="checkbox"  id="is_pdd_'+value.id+'"  onclick="is_pdd_action('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><table class="table table-bordered"><tr><td><button id="save-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " title="Save Details" > <i class="fa fa-save"></i> </button></td><td> <input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td>	 <button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary" title="Upload Document"> <i class="fa fa-upload" ></i> </button><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " disabled="true"> Approve </button></td><td><lable id="lable_not_applicable_'+value.id+'"</lable></td></tr></table></td></tr>';
    							  $('#section'+common+'_data'+common+'').html(tr);
    							    $('#heading'+common+'').html(master_doc_name);
             

            					});
							 
											
				        }
                });
    
       
		document.getElementById('section'+common+'').style.display = 'block';
	
	      
		  
	  
	
		
		//document.getElementById('section2').style.display = 'none';
		//document.getElementById('section3').style.display = 'none';
		//document.getElementById('section4').style.display = 'none';
		//document.getElementById('section5').style.display = 'none';
		//document.getElementById('section6').style.display = 'none';
		//document.getElementById('section7').style.display = 'none';
		//document.getElementById('section8').style.display = 'none';
		//document.getElementById('section9').style.display = 'none';
		//document.getElementById('section10').style.display = 'none';
		//document.getElementById('section11').style.display = 'none';
		//document.getElementById('section12').style.display = 'none';
		//document.getElementById('default').style.display = 'none';


         



	}
	function section_loan_documents()
	{
		document.getElementById('section_loan_documents_').style.display = 'block';
	}
		
	function system_generated_documents()
	{
		document.getElementById('system_generated_documents_').style.display = 'block';
	}
	</script>
    <?php	
 }

?>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
