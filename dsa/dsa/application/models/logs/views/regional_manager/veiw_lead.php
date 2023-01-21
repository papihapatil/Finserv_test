
<?php
 
 $result = $this->session->flashdata('result');   if (isset($result)) {
	   if($result=='1'){
		   
			   $res = $this->session->flashdata('message');
			   if($res=='Lead Assign Sucessfully')
			   {
			   echo '<script> swal("success!", "Lead Assign Sucessfully", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
						   
			}
			else if($result=='2')
			{
				$res = $this->session->flashdata('message');
			   if($res=='Email id already in use')
			   {
			   echo '<script> swal("warning!", "Email id already in use", "warning");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
		   else if($result=='3')
			{
				$res = $this->session->flashdata('message');
			   if($res=="Customer entry created successfully and credentials has beed sent to customers email-id and mobile number")
			   {
			   echo '<script> swal("success!", "Customer entry created successfully and credentials has beed sent to customers email-id and mobile number", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
			else if($result=='4')
			{
				$res = $this->session->flashdata('message');
			   if($res=="Error in Save Customer Details")
			   {
			   echo '<script> swal("warning!", "Error in Save Customer Details", "warning");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
			else if($result=='5')
			{
				$res = $this->session->flashdata('message');
			   if($res=="Status Updated Sucessfully")
			   {
			   echo '<script> swal("success!", "Status Updated Sucessfully", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
			
	   }	
	 
	  
	   
   
   
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
														<div class="col-sm-12">
															<div >
																<div class="container">
																	<div class="row" style="margin-bottom:10px">
																	<div class="col-sm-6">
																	</div>
																		<div class="col-sm-3">
																			<form id="credit_saction_form" method="post">
																						<select class="form-control" aria-label="Default select example" name="" id="select_category_lead"  >
																							<option value="">Select category</option>
																							<option value="self">Self</option>
																							<option value="DSA">DSA</option>
																							<option value="Relationship_officer">Relationship Officer</option>
																							
																						</select>
																						<input type="text" id="User_id" value=<?php echo $this->session->userdata('ID'); ?> hidden>
																			</form>
																		</div>
																		<div class="col-sm-3">
																			<form id="credit_saction_form" method="post">
																					  
																						<select class="form-control" aria-label="Default select example"  id="options_display_lead">
																							<option value="">Select Value</option>
																							
																						</select>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>


<body class="wide comments example" >

	
<div class="fw-body">
	<div class="content">
	<div style="overflow-x:auto;">
		<div class="demo-html">
			<table id="example" class="display" style="width:100%">
				<thead>
				<tr>
			   
					   <th>SR No</th>
					   <th>Name</th>
					   <th>Address</th>
					   <th>Email</th>
					   <th>Mobile</th>
					   <th>Refer By</th>
					   <th>Satus</th>
					   
				</tr>
				</thead>
				<tbody id="user_lead">
				<?php  $i= 1 ; if(count($customers)!= 0){foreach($customers as $row){  ?>
					<tr>
					    <td><?php echo $i; ?></td>
					    <td><?php echo $row->first_name." ".$row->last_name;?></td>
						<td><?php echo $row->address; ?></td>
						<td><?php echo $row->email; ?></td>
						<td> <?php echo $row->mobile;  ?></td>
						<td><?php if($row->Refer_By_Name!=''){echo $row->Refer_By_Name .'['.$row->Refer_By_Category.']';} ?></td>
						<td><?php if( $row->status==''|| $row->status==NULL)
							{?>
						
								
									<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test">Change Contact Status</a>
								 
							<?php } else if( $row->status=='Convert to Customer'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer</a>
							<?php }
							else if( $row->status=='consent')
							{
							?>
									<a style="margin-left: 8px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer with Consent</a>
							<?php
							}
							else if( $row->status=='Reject'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Reject</a> 
							<?php }  else if( $row->status=='Hold'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Hold</a> 
										   <a style="margin-left: 8px;" data-toggle="modal" data-id = "<?php echo $row->id;?>" data-target="#deleteModel" class="btn btn-info modal_test "> Convert to Customer</a>
							<?php } ?>
						</td>
					</tr>
				<?php $i++; }} ?>
					
				
					
				</tbody>
				<tbody id="user_lead_assign">
				
				
					
				</tbody>
			
			</table>
		</div>
	</div>
			
	</div>
</div>
</div>

</body>



		<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    Change Status
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Cluster_Manager/Change_Contact_Status" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Select Status  </label>	                    
	                    <input name="id" type="number" class="idform" hidden />
							  <input type="radio" id="vehicle1" name="status" value="Convert to Customer" checked >
							  <label for="vehicle1"> Convert to Customer </label><br>
							  <input type="radio" id="vehicle4" name="status" value="Convert to customer with consent">
							  <label for="vehicle4">Convert to customer with consent</label><br>
							  <input type="radio" id="vehicle2" name="status" value="Reject">
							  <label for="vehicle2"> Reject </label><br>
							  <input type="radio" id="vehicle3" name="status" value="Hold">
							  <label for="vehicle3"> Hold </label><br><br>						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                   Change Status
			                </button>
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