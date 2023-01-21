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
															<h6>Type of loan: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>Sanctioned loan Amount: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>Tenure: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>ROI: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															<hr>
														</div>
														<div class="col-sm-4"> 
															<h6>Source Name: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															<hr>
														</div>
														<div class="col-sm-4"> 
															<h6>Sourcing Branch Name: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															<hr>
														</div>

													</div>
													<div class="row">
														<div class="col-sm-2">
															<div class="vertical-menu">
															  <a href="#" class="active">Disbursement documents</a>
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
														<div class="col-sm-10" style="border:1px solid gray;" >
															<div id="default">Plese select document menu for further process
															</div>
															<?php
															   
															   for($j=1; $j<=$total_types;$j++)
															   {
																   ?>
																   
																   <div id="section<?php echo $j;?>" style="display:none">
																		<br>
																		<h4 id="heading<?php echo $j;?>"></h4>
																		 <table class="table table-bordered">
																			<thead>
																			  <tr>
																				<th>Document Name</th>
																			
																				<th>Not Available </th>
																				<th>Comments Form OPS</th>
																				 <th>Add Comments</th>
																				
																				  <th>Action</th>
																			  </tr>
																			</thead>
																			<tbody id="section<?php echo $j;?>_data">
																			  
																			</tbody>
																			 <tbody id="section<?php echo $j;?>_data<?php echo $j;?>">
																			  
																			</tbody>
																		  </table>
																	</div>
																   <?php
															   }
															   
															
															?>
														
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
					<button type="button" class="close" data-dismiss="modal">×</button> 
				                                                            
				</div> 
				<div class="modal-body">
					<h6 class="modal-title">Document Name : <lable id="selected_document_name_model_lable"></lable></h6> <br>
					<h6>Add Comments</h6>
					<textarea name="not_availabale_document_comments" id="not_availabale_document_comments" row="3" class="form-control"></textarea><br>
					<input hidden type="text" id="not_availabale_document_id">
					<input hidden type="text" id="not_availabale_document_name">
					<button type="button" class="btn btn-outline-success" onclick="submit_not_available_data();">Submit</button>
				</div>   
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                               
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
 function RevertBack(value,name) {

  

   var selected_document_number =value;
   var selected_document_name =name;

    let formData = new FormData();   
    var selected_document_type_id = selected_document_number;
    var selected_document_type_name = selected_document_name;
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
	var applicant_unique_code = document.getElementById('applicant_unique_code').value;
    var comments_from_cm = document.getElementById('comments_from_cm'+selected_document_number+'').value;
	 if(comments_from_cm== '')
		 {
		 		swal( "Warning!","Please add comment","warning");
		 		exit();
		 }
	
		formData.append("selected_document_type_id", selected_document_type_id);
		formData.append("selected_document_type_name", selected_document_type_name);
		formData.append("login_user_unique_code", login_user_unique_code);
		formData.append("applicant_unique_code", applicant_unique_code);
		formData.append("comments_from_cm", comments_from_cm);

      $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/Revert_for_not_available_file"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       			$('#RevertBackbutton_'+selected_document_type_id+'').html("Changes Saved");
                       	 	   //  document.getElementById('comments_from_cm'+selected_document_number+'').value= '';
                      			swal( "Success!","Changes saved Successfully","success");
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
		//$('#full_div').html('');
		var common = <?php echo $k;?>;
	   
		//document.getElementById('section'+common+'').style.display = 'block';
		
		var master_doc_id = document.getElementById('master_doc_id'+common+'').value;
		var master_doc_name = document.getElementById('master_doc_name'+common+'').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Credit_manager_user/credit_show_join_subtypes"); ?>',
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
						
						if(value.not_available_ == 'yes')
							{
							    tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled"  checked="checked"></td><td><textarea class="form-control">'+value.not_availabale_document_comments+'</textarea></td><td><input type="text" class="form-control" id="comments_from_cm'+value.id+'" ></td></td><td><button id="RevertBackbutton_'+value.id+'"  class="btn btn-outline-primary" onclick="RevertBack('+value.id+',\'' + value.subtype_document_name + '\'); "> Submit </button></td></tr>';
    					        $('#section'+common+'_data').html(tr1);
    						    $('#heading'+common+'').html(master_doc_name);
							}
						
    					});


							
							 
											
				        }
                });

		document.getElementById('section'+common+'').style.display = 'block';
		     



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
