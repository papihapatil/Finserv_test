<div class="c-body bg-white " >
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<?php ini_set('short_open_tag', 'On'); ?>
					
				<?php 
						if(isset($form_data))
						{
							if($form_data->HR_ID == $HR_ID)
							{
						?>
					<div>
						<h4 style="margin-top:2px;"><b>New Engagement Form</b></h4>
						<p style="color:#ccc">We need following details for new engagement</p>
						 <div class="row  rounded"  style="border-top:1px solid #ccc">
					     <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Client details</u></b></h5>
						     
						 </div>
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client Name</label>
    								<input type="text" class="form-control" id="Client_name" name="Client_name"  required value="<?php if(isset($form_data)) echo $form_data->Client_name;?>">
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client contact Number</label>
    								<input type="text" class="form-control" id="client_contact" name="client_contact" pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" required value="<?php if(isset($form_data)) echo $form_data->client_contact;?>">
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Address</label>
    								<input type="text" class="form-control" id="client_address" name="client_address"  required value="<?php if(isset($form_data)) echo $form_data->client_address;?>">
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    		    <label style="font-weight:bold;">Is GST applicable to client </label>
   									<select class="form-control" id="GST_applicable" required name="GST_applicable">
										 <option>select</option>
										 <option value="Yes" <?php if(isset($form_data)) if ($form_data->GST_applicable == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
										 <option value="No" <?php if(isset($form_data)) if ($form_data->GST_applicable == 'No') echo ' selected="selected"'; ?>>No</option>
									</select>
  							    </div>
							 </div>
						     <div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client GST number</label>
    								<input type="text" class="form-control" id="client_gst_number" name="client_gst_number"  required value="<?php if(isset($form_data)) echo $form_data->client_gst_number;?>">
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client Email For invoice</label>
    								<input type="text" class="form-control" id="client_email_for_invoice" name="client_email_for_invoice"  required value="<?php if(isset($form_data)) echo $form_data->client_email_for_invoice;?>">
  								</div>
							</div>	
						 </div>
						 <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Resource details</u></b></h5>
						 </div>
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Name</label>
   									<input type="text" class="form-control" id="resource_name" name="resource_name" required  value="<?php if(isset($form_data)) echo $form_data->resource_name;?>">
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Role</label>
   									<input type="text" class="form-control" id="resource_role" name="resource_role" required value="<?php if(isset($form_data)) echo $form_data->resource_role;?>"> 
							    </div>
						    </div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Resource Email </label>
    								<input type="text" class="form-control" id="ResourceEmail" name="ResourceEmail"placeholder="Enter resource email" required value="<?php if(isset($form_data)) echo $form_data->ResourceEmail;?>">
  								</div>
							</div>		
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Phone ..</label>
   									<input type="text" class="form-control" id="resourcPhone" name="resourcPhone" pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" required value="<?php if(isset($form_data)) echo $form_data->resourcPhone;?>">
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Type</label>
   									<select class="form-control" id="resourceType" required name="resourceType">
										 <option>select</option>
										 <option value="Employee" <?php if(isset($form_data)) if ($form_data->resourceType == 'Employee') echo ' selected="selected"'; ?>>Employee</option>
										 <option value="Contractor" <?php if(isset($form_data)) if ($form_data->resourceType == 'Contractor') echo ' selected="selected"'; ?>>Contractor</option>
										 <option value="Not Applicable" <?php if(isset($form_data)) if ($form_data->resourceType == 'Not Applicable') echo ' selected="selected"'; ?>>Not Applicable</option>
									
										 </select>
  								</div>
							</div>
						</div>
					
						     <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Other details</u></b></h5>
						     
						 </div>
			
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Engagement start date</label>
    									<input type="date" class="form-control" id="Engagement_start_date" name="Engagement_start_date" value="<?php if(isset($form_data)) echo $form_data->Engagement_start_date;?>">
  									</div>
								</div>		
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    				<label style="font-weight:bold;">Engagement end date </label>
   										<input type="date" class="form-control" id="Engagement_end_date" name="Engagement_end_date" required value="<?php if(isset($form_data)) echo $form_data->Engagement_end_date;?>">
  									</div>
								</div>
									<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Billing start date</label>
    									<input type="date" class="form-control" id="Billing_start_date" name="Billing_start_date" required value="<?php if(isset($form_data)) echo $form_data->Billing_start_date;?>">
  									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    				<label style="font-weight:bold;">Monthly Consultant Compensation in Rs</label>
   										<input type="number" class="form-control" id="monthly_compensation" name="monthly_compensation" required value="<?php if(isset($form_data)) echo $form_data->monthly_compensation;?>"> 
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Monthly Billing to Client Rs</label>
    									<input type="number" class="form-control" id="monthly_billing" name="monthly_billing" required value="<?php if(isset($form_data)) echo $form_data->monthly_billing;?>" >
  									</div>
							    </div>		
								
						<div class="col-sm-4">
							<div class="form-group">
								<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    		<label style="font-weight:bold;">Travel & any other Expenses to be billed to client</label>
   								   <select class="form-control" id="travel_expenses" name="travel_expenses" required >
									   <option>select</option>
									  <option value="Yes" <?php if(isset($form_data)) if ($form_data->travel_expenses == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
									  <option value="No" <?php if(isset($form_data)) if ($form_data->travel_expenses == 'No') echo ' selected="selected"'; ?>>No</option>
									</select>
									</select>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="form-group">
								<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
								<label style="font-weight:bold;">Notes if any </label>
								<textarea class = "form-control" rows = "1" placeholder = ""  id="notes" name="notes"><?php if(isset($form_data)) echo $form_data->notes;?></textarea>
			  						
							</div>
						</div>
					
						<div class="col-sm-4">
							<div class="form-group">
										
    									<input hidden type="text" class="form-control" id="Engagement_submitter" name="Engagement_submitter" value=<?php  if(isset($form_data)) {echo $form_data->Engagement_submitter;} else if(isset($HR_name)){ echo $HR_name; }?>  >
										<input hidden type="text" class="form-control" id="HR_ID" name="HR_ID" value=<?php if(isset($form_data)) {echo $form_data->HR_ID;} else if(isset($HR_ID)) {echo $HR_ID;}?> >
  										<input hidden type="text" class="form-control" id="active_HR_ID" name="active_HR_ID" value=<?php if(isset($HR_ID)) {echo $HR_ID;}?> >
  									<input hidden type="text" class="form-control" id="Form_id" name="Form_id" value=<?php  if(isset($form_data)) {echo $form_data->Form_id;} ?> >
  									
  									
  									</div>
					   </div>
						
					   <?php }
					         else
							 {
						?>
						<!----------------------------------------------------------------------------------------------------------- -->
						<div>
						<h4 style="margin-top:2px;"><b>New Engagement Form</b></h4>
						<p style="color:#ccc">We need following details for new engagement</p>
						 <div class="row  rounded"  style="border-top:1px solid #ccc">
					     <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Client details</u></b></h5>
						     
						 </div>
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client Name</label>
    								<input type="text" class="form-control" id="Client_name" name="Client_name"  required value="<?php if(isset($form_data)) echo $form_data->Client_name;?>" readonly>
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client contact Number</label>
    								<input type="text" class="form-control" id="client_contact" name="client_contact" pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" required value="<?php if(isset($form_data)) echo $form_data->client_contact;?>" readonly>
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Address</label>
    								<input type="text" class="form-control" id="client_address" name="client_address"  required value="<?php if(isset($form_data)) echo $form_data->client_address;?>" readonly>
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    		    <label style="font-weight:bold;">Is GST applicable to client </label>
   									<select class="form-control" id="GST_applicable" required name="GST_applicable" readonly>
										 <option>select</option>
										 <option value="Yes" <?php if(isset($form_data)) if ($form_data->GST_applicable == 'Yes') echo ' selected="selected"'; ?> >Yes</option>
										 <option value="No" <?php if(isset($form_data)) if ($form_data->GST_applicable == 'No') echo ' selected="selected"'; ?> >No</option>
									</select>
  							    </div>
							 </div>
						     <div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client GST number</label>
    								<input type="text" class="form-control" id="client_gst_number" name="client_gst_number"  required value="<?php if(isset($form_data)) echo $form_data->client_gst_number;?>" readonly>
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client Email For invoice</label>
    								<input type="text" class="form-control" id="client_email_for_invoice" name="client_email_for_invoice"  required value="<?php if(isset($form_data)) echo $form_data->client_email_for_invoice;?>" readonly>
  								</div>
							</div>	
						 </div>
						 <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Resource details</u></b></h5>
						 </div>
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Name</label>
   									<input type="text" class="form-control" id="resource_name" name="resource_name" required  value="<?php if(isset($form_data)) echo $form_data->resource_name;?>" readonly>
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Role</label>
   									<input type="text" class="form-control" id="resource_role" name="resource_role" required value="<?php if(isset($form_data)) echo $form_data->resource_role;?>" readonly> 
							    </div>
						    </div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Resource Email </label>
    								<input type="text" class="form-control" id="ResourceEmail" name="ResourceEmail"placeholder="Enter resource email" required value="<?php if(isset($form_data)) echo $form_data->ResourceEmail;?>" readonly>
  								</div>
							</div>		
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Phone</label>
   									<input type="text" class="form-control" id="resourcPhone" name="resourcPhone" pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" required value="<?php if(isset($form_data)) echo $form_data->resourcPhone;?>" readonly>
  								</div>
							</div>
								<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Type</label>
   									<select class="form-control" id="resourceType" required name="resourceType" readonly>
										 <option>select</option>
										 <option value="Employee" <?php if(isset($form_data)) if ($form_data->resourceType == 'Employee') echo ' selected="selected"'; ?>>Employee</option>
										 <option value="Contractor" <?php if(isset($form_data)) if ($form_data->resourceType == 'Contractor') echo ' selected="selected"'; ?>>Contractor</option>
									 <option value="Not Applicable" <?php if(isset($form_data)) if ($form_data->resourceType == 'Not Applicable') echo ' selected="selected"'; ?>>Not Applicable</option>
									
										 </select>
  								</div>
							</div>
						</div>
					
						     <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Other details</u></b></h5>
						     
						 </div>
			
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Engagement start date</label>
    									<input type="date" class="form-control" id="Engagement_start_date" name="Engagement_start_date" value="<?php if(isset($form_data)) echo $form_data->Engagement_start_date;?>" readonly>
  									</div>
								</div>		
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    				<label style="font-weight:bold;">Engagement end date </label>
   										<input type="date" class="form-control" id="Engagement_end_date" name="Engagement_end_date" required value="<?php if(isset($form_data)) echo $form_data->Engagement_end_date;?>" readonly>
  									</div>
								</div>
									<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Billing start date</label>
    									<input type="date" class="form-control" id="Billing_start_date" name="Billing_start_date" required value="<?php if(isset($form_data)) echo $form_data->Billing_start_date;?>" readonly>
  									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    				<label style="font-weight:bold;">Monthly Consultant Compensation in Rs</label>
   										<input type="number" class="form-control" id="monthly_compensation" name="monthly_compensation" required value="<?php if(isset($form_data)) echo $form_data->monthly_compensation;?>" readonly> 
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Monthly Billing to Client Rs</label>
    									<input type="number" class="form-control" id="monthly_billing" name="monthly_billing" required value="<?php if(isset($form_data)) echo $form_data->monthly_billing;?>" readonly>
  									</div>
							    </div>		
								
						<div class="col-sm-4">
							<div class="form-group">
								<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    		<label style="font-weight:bold;">Travel & any other Expenses to be billed to client</label>
   								   <select class="form-control" id="travel_expenses" name="travel_expenses" required readonly>
									   <option>select</option>
									  <option value="Yes" <?php if(isset($form_data)) if ($form_data->travel_expenses == 'Yes') echo ' selected="selected"'; ?> >Yes</option>
									  <option value="No" <?php if(isset($form_data)) if ($form_data->travel_expenses == 'No') echo ' selected="selected"'; ?> >No</option>
									</select>
									</select>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="form-group">
								<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
								<label style="font-weight:bold;">Notes if any </label>
								<textarea class = "form-control" rows = "1" placeholder = ""  id="notes" name="notes" readonly><?php if(isset($form_data)) echo $form_data->notes; ?></textarea>
			  						
							</div>
						</div>
					
						<div class="col-sm-4">
							<div class="form-group">
										
    										<input hidden type="text" class="form-control" id="Engagement_submitter" name="Engagement_submitter" value=<?php  if(isset($form_data)) {echo $form_data->Engagement_submitter;} else if(isset($HR_name)){ echo $HR_name; }?>  >
										<input hidden type="text" class="form-control" id="HR_ID" name="HR_ID" value=<?php if(isset($form_data)) {echo $form_data->HR_ID;} else if(isset($HR_ID)) {echo $HR_ID;}?> >
  										<input hidden type="text" class="form-control" id="active_HR_ID" name="active_HR_ID" value=<?php if(isset($HR_ID)) {echo $HR_ID;}?> >
  									<input hidden type="text" class="form-control" id="Form_id" name="Form_id" value=<?php  if(isset($form_data)) {echo $form_data->Form_id;} ?> >
  									
  									
  									</div>
					   </div>
						<!---------------------------------------------------------------------------------------------------------- -->
						<?php
							 }
					   
						}
						else
						{
						?>
						<div>
						<h4 style="margin-top:2px;"><b>New Engagement Form</b></h4>
						<p style="color:#ccc">We need following details for new engagement</p>
						 <div class="row  rounded"  style="border-top:1px solid #ccc">
					     <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Client details</u></b></h5>
						     
						 </div>
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client Name</label>
    								<input type="text" class="form-control" id="Client_name" name="Client_name"  required value="<?php if(isset($form_data)) echo $form_data->Client_name;?>">
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client contact Number</label>
    								<input type="text" class="form-control" id="client_contact" name="client_contact" pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" required value="<?php if(isset($form_data)) echo $form_data->client_contact;?>">
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Address</label>
    								<input type="text" class="form-control" id="client_address" name="client_address"  required value="<?php if(isset($form_data)) echo $form_data->client_address;?>">
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    		    <label style="font-weight:bold;">Is GST applicable to client </label>
   									<select class="form-control" id="GST_applicable" required name="GST_applicable">
										 <option>select</option>
										 <option value="Yes" <?php if(isset($form_data)) if ($form_data->GST_applicable == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
										 <option value="No" <?php if(isset($form_data)) if ($form_data->GST_applicable == 'No') echo ' selected="selected"'; ?>>No</option>
									</select>
  							    </div>
							 </div>
						     <div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client GST number</label>
    								<input type="text" class="form-control" id="client_gst_number" name="client_gst_number"  required value="<?php if(isset($form_data)) echo $form_data->client_gst_number;?>">
  								</div>
							</div>	
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Client Email For invoice</label>
    								<input type="text" class="form-control" id="client_email_for_invoice" name="client_email_for_invoice"  required value="<?php if(isset($form_data)) echo $form_data->client_email_for_invoice;?>">
  								</div>
							</div>	
						 </div>
						 <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Resource details</u></b></h5>
						 </div>
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Name</label>
   									<input type="text" class="form-control" id="resource_name" name="resource_name" required  value="<?php if(isset($form_data)) echo $form_data->resource_name;?>">
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Role</label>
   									<input type="text" class="form-control" id="resource_role" name="resource_role" required value="<?php if(isset($form_data)) echo $form_data->resource_role;?>"> 
							    </div>
						    </div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   				<label style="font-weight:bold;">Resource Email </label>
    								<input type="text" class="form-control" id="ResourceEmail" name="ResourceEmail"placeholder="Enter resource email" required value="<?php if(isset($form_data)) echo $form_data->ResourceEmail;?>">
  								</div>
							</div>		
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Phone</label>
   									<input type="text" class="form-control" id="resourcPhone" name="resourcPhone" pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" required value="<?php if(isset($form_data)) echo $form_data->resourcPhone;?>">
  								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    			<label style="font-weight:bold;">Resource Type</label>
   									<select class="form-control" id="resourceType" required name="resourceType" >
										 <option>select</option>
										 <option value="Employee" <?php if(isset($form_data)) if ($form_data->resourceType == 'Employee') echo ' selected="selected"'; ?>>Employee</option>
										 <option value="Contractor" <?php if(isset($form_data)) if ($form_data->resourceType == 'Contractor') echo ' selected="selected"'; ?>>Contractor</option>
								 <option value="Not Applicable" <?php if(isset($form_data)) if ($form_data->resourceType == 'Not Applicable') echo ' selected="selected"'; ?>>Not Applicable</option>
									
										 </select>
  								</div>
							</div>
						</div>
					
						     <div class="row  col-12 " style="margin:10px;">
							 <h5 style="margin-top:2px;color:#ccc"><b><u>Other details</u></b></h5>
						     
						 </div>
			
						  <div class="row  col-12 " style="margin:10px;border:1px solid #ccc ;padding :10px;">
							
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Engagement start date</label>
    									<input type="date" class="form-control" id="Engagement_start_date" name="Engagement_start_date" value="<?php if(isset($form_data)) echo $form_data->Engagement_start_date;?>">
  									</div>
								</div>		
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    				<label style="font-weight:bold;">Engagement end date </label>
   										<input type="date" class="form-control" id="Engagement_end_date" name="Engagement_end_date" required value="<?php if(isset($form_data)) echo $form_data->Engagement_end_date;?>">
  									</div>
								</div>
									<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Billing start date</label>
    									<input type="date" class="form-control" id="Billing_start_date" name="Billing_start_date" required value="<?php if(isset($form_data)) echo $form_data->Billing_start_date;?>">
  									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    				<label style="font-weight:bold;">Monthly Consultant Compensation in Rs</label>
   										<input type="number" class="form-control" id="monthly_compensation" name="monthly_compensation" required value="<?php if(isset($form_data)) echo $form_data->monthly_compensation;?>"> 
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					   					<label style="font-weight:bold;">Monthly Billing to Client Rs</label>
    									<input type="number" class="form-control" id="monthly_billing" name="monthly_billing" required value="<?php if(isset($form_data)) echo $form_data->monthly_billing;?>" >
  									</div>
							    </div>		
								
						<div class="col-sm-4">
							<div class="form-group">
								<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
					    		<label style="font-weight:bold;">Travel & any other Expenses to be billed to client</label>
   								   <select class="form-control" id="travel_expenses" name="travel_expenses" required >
									   <option>select</option>
									  <option value="Yes" <?php if(isset($form_data)) if ($form_data->travel_expenses == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
									  <option value="No" <?php if(isset($form_data)) if ($form_data->travel_expenses == 'No') echo ' selected="selected"'; ?>>No</option>
									</select>
									</select>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="form-group">
								<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
								<label style="font-weight:bold;">Notes if any </label>
								<textarea class = "form-control" rows = "1" placeholder = ""  id="notes" name="notes"><?php if(isset($form_data)) echo $form_data->notes;?></textarea>
			  						
							</div>
						</div>
					
						<div class="col-sm-4">
							<div class="form-group">
										
    									<input hidden type="text" class="form-control" id="Engagement_submitter" name="Engagement_submitter" value=<?php  if(isset($form_data)) {echo $form_data->Engagement_submitter;} else if(isset($HR_name)){ echo $HR_name; }?>  >
										<input hidden type="text" class="form-control" id="HR_ID" name="HR_ID" value=<?php if(isset($form_data)) {echo $form_data->HR_ID;} else if(isset($HR_ID)) {echo $HR_ID;}?> >
  										<input hidden type="text" class="form-control" id="active_HR_ID" name="active_HR_ID" value=<?php if(isset($HR_ID)) {echo $HR_ID;}?> >
  									<input hidden type="text" class="form-control" id="Form_id" name="Form_id" value=<?php  if(isset($form_data)) {echo $form_data->Form_id;} ?> >
  									
  									
  									</div>
					   </div>
						<?php
						}
						?>

						<!-- ---------------------------bottom buttons ----------------------------------- -->
						<?php 
						if(isset($form_data))
						{
							if($form_data->HR_ID == $HR_ID)
							{
						?>
								
								<?php 
								if($form_data->Status=='Approved')
								{
								?>
									<div class="col-sm-2">
									 <a class="btn btn-success " id="save_to_draft" style="color:white;  padding: 19px;">Save to Draft &nbsp;&nbsp;</a>
									</div>
									<div class="col-sm-2">
										 <a class="btn btn-success " id="Submit_engagement_form" style="color:white;  padding: 19px;">Submit &nbsp;&nbsp;</a>
									</div>
									<div class="col-sm-4">
									   <a class="btn btn-success disabled" id="" style="color:white;  padding: 19px;">Submitted by  <?php echo $form_data->Engagement_submitter;?>  &nbsp;&nbsp;</a>
								    </div>
									<div class="col-sm-4">
						                <a class="btn btn-success disabled" id="" style="color:white;  padding: 19px;">Approve by <?php echo $approved_by;?></a>
									</div>
						        <?php
						        }
								else if($form_data->Status=='Rework')
								{
								?>
								<div class="col-sm-6">
									<div class="form-group">
								<i style=" font-size:11px;color:#25a6c6;" class="fa fa-user-plus"></i>&nbsp;&nbsp;
								<label style="font-weight:bold;">Rework Notes</label>
								<textarea readonly class = "form-control" rows = "1" placeholder = ""  id="status_notes" name="status_notes"><?php if(isset($form_data)) echo $form_data->status_notes;?></textarea>
			  						
							</div>
							
						         </div>
									<div class="col-sm-2">
										<a class="btn btn-success " id="Submit_rework_form" style="color:white;  padding: 19px;">Update &nbsp;&nbsp;</a>
									
									</div>
									<div class="col-sm-4">
						                <a class="btn btn-success disabled" id="" style="color:white;  padding: 19px;"> Rework assign by <?php echo $approved_by;?></a>
									</div>
								<?php
								}
								else if($form_data->Status=='Submitted')
						        {
								?>
									<div class="col-sm-6">
										<a class="btn btn-success disabled" id="" style="color:white;  padding: 19px;">Waiting for Approval &nbsp;&nbsp;</a>
									</div>
								<?php
								}
								else if($form_data->Status='In Draft')
								{
                                ?>
									<div class="col-sm-2">
									 <a class="btn btn-success " id="save_to_draft" style="color:white;  padding: 19px;">Save to Draft &nbsp;&nbsp;</a>
									</div>
									<div class="col-sm-2">
									 <a class="btn btn-success " id="Submit_engagement_form" style="color:white;  padding: 19px;">Submit &nbsp;&nbsp;</a>
									</div>
								<?php
								}
								?>
							<?php
							}
							else
							{
							 ?>

							
								<?php 
								if($form_data->Status =='Approved')
								{
								?>
								 <div class="col-sm-4">
								 <a class="btn btn-success disabled"  style="color:white;  padding: 19px;">Submit by <?php echo $form_data->Engagement_submitter;?>&nbsp;&nbsp;</a>
							     </div>
								<div class="col-sm-4">
									 <a class="btn btn-success disabled" id="btn_approve" style="color:white;  padding: 19px;">Approve by <?php echo $approved_by;?></a>
								</div>
								<?php
								}
								else if($form_data->Status=='Rework')
								{
								?>
								
								<div class="col-sm-4">
									<textarea class = "form-control" rows = "2" placeholder = ""  id="status_notes" name="status_notes"><?php if(isset($form_data)) echo $form_data->status_notes;?></textarea>
			  					
								</div>
								<div class="col-sm-2">
									<a class="btn btn-success " id="btn_approve" style="color:white;  padding: 19px;">Approve</a>
								</div>
								<div class="col-sm-5">
						                <a class="btn btn-success disabled" id="" style="color:white;  padding: 19px;">Under in Rework. Assign to <?php echo $form_data->Engagement_submitter;?></a>
								</div>
								<?php
								}
								else  if($form_data->Status=='Submitted')
								{
								?>
									<div class="col-sm-4">
										<textarea class = "form-control" rows = "2" placeholder = ""  id="status_notes" name="status_notes"><?php if(isset($form_data)) echo $form_data->status_notes;?></textarea>
			  					
								</div>
									<div class="col-sm-2">
									<a class="btn btn-success " id="btn_approve" style="color:white;  padding: 19px;">Approve</a>
								</div>
								<div class="col-sm-2">
								<a class="btn btn-success " id="btn_rework" style="color:white;  padding: 19px;">Rework</a>
								</div>
								 <div class="col-sm-4">
								 <a class="btn btn-success disabled"  style="color:white;  padding: 19px;">Submit by <?php echo $form_data->Engagement_submitter;?>&nbsp;&nbsp;</a>
							     </div>
							
								<?php
								}
								?>
						
						<?php
							}
						}
						else
						{
						?>
						<div class="col-sm-2">
							 <a class="btn btn-success " id="save_to_draft" style="color:white;  padding: 19px;">Save to Draft &nbsp;&nbsp;</a>
						</div>
						<div class="col-sm-2">
							 <a class="btn btn-success " id="Submit_engagement_form" style="color:white;  padding: 19px;">Submit &nbsp;&nbsp;</a>
						</div>
						
						<?php
						}?>
					
						
						<!-- -------------------------------------------------------------- -->


							
				</div>
		  </div>
	</div>
	
 </div>
 
 <script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

	   <script type="text/javascript">
						   $( "#Submit_engagement_form" ).click(function() {
							  // alert("hii");
							         var Client_name=document.getElementById("Client_name").value; 
									 var client_contact =document.getElementById("client_contact").value; 
									 var client_address =document.getElementById("client_address").value; 
									 var client_gst_number =document.getElementById("client_gst_number").value; 
									 var GST_applicable =document.getElementById("GST_applicable").value;
									 var resource_role =document.getElementById("resource_role").value; 
									 var resource_name =document.getElementById("resource_name").value; 
								   	 var ResourceEmail=document.getElementById("ResourceEmail").value; 
									 var client_email_for_invoice=document.getElementById("client_email_for_invoice").value; 
									 var resourcPhone =document.getElementById("resourcPhone").value; 
									 var Engagement_start_date =document.getElementById("Engagement_start_date").value; 
									 var Engagement_end_date =document.getElementById("Engagement_end_date").value; 
									 var Billing_start_date =document.getElementById("Billing_start_date").value; 
									 var monthly_compensation =document.getElementById("monthly_compensation").value; 
									 var monthly_billing =document.getElementById("monthly_billing").value; 
									 var travel_expenses =document.getElementById("travel_expenses").value; 
									 var notes =document.getElementById("notes").value; 
								     var HR_ID =document.getElementById("HR_ID").value; 
									 var resourceType =document.getElementById("resourceType").value; 
									  var Form_id =document.getElementById("Form_id").value; 
							
									 var Engagement_submitter =document.getElementById("Engagement_submitter").value; 
								
									 
									 if(Client_name=='')
										{
											swal("warning!", "Please enter client name", "warning");
										    return false;
										}
									else if(client_contact=='')
										{
											swal("warning!", "Please enter client contact number", "warning");
										    return false;
										}
									else if(client_address=='')
										{
											swal("warning!", "Please enter client address", "warning");
										    return false;
										}
									else if(client_gst_number=='')
										{
											swal("warning!", "Please enter client Gst number", "warning");
										    return false;
										}
									else if(client_email_for_invoice=='')
										{
											swal("warning!", "Please enter email for invoice ", "warning");
										    return false;
										}
									 
									 else if(resource_name=='')
										{
											swal("warning!", "Please enter resource name", "warning");
										    return false;
										}
									else if(resourcPhone=='')
										{
											swal("warning!", " Please enter phone number", "warning");
										    return false;
										}
									 else if(ResourceEmail=='')
										{
											swal("warning!", "Please enter resource email", "warning");
										    return false;
										}
								
									  else if(resource_role =='')
										{
											swal("warning!", " Please enter role", "warning");
										    return false;
										}
										else if(resourceType== '')
									 {
										 swal("warning!", " Please select resource type ", "warning");
										    return false;
									 }
								      else if(Engagement_start_date == '')
										{
											swal("warning!", " Please enter engagement start date", "warning");
										    return false;
										}
									  else if(Engagement_end_date == '')
										{
											swal("warning!", " Please enter engagement end date", "warning");
										    return false;
										}
										 else if(Engagement_end_date < Engagement_start_date)
									 {
										 swal("warning!", " Engagement end date can not be before Engagement start date", "warning");
										    return false;
									 }
									   else if(Billing_start_date == '')
										{
											swal("warning!", " Please enter billing start date", "warning");
										    return false;
										}
									 else if(Billing_start_date < Engagement_start_date)
									 {
										 swal("warning!", " Billing start date can not be before Engagement start date", "warning");
										    return false;
									 }
									  else if(monthly_compensation == '')
										{
											swal("warning!", " Please enter monthly compensation ", "warning");
										    return false;
										}
									  else if(monthly_billing == '')
										{
											swal("warning!", " Please enter monthly billing ", "warning");
										    return false;
										}
									  else if(GST_applicable == '')
										{
											swal("warning!", " Please select GST applicable ", "warning");
										    return false;
										}
									  else if(travel_expenses == '')
										{ 
											swal("warning!", " Please Enter Tenure ", "warning");
										    return false;
										}
						 
									  


									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/HR/save_engagement_form"); ?>',
											    data:{
													'Client_name':Client_name,
													'client_contact':client_contact,
													'client_address':client_address,
													'client_gst_number':client_gst_number,
													'client_email_for_invoice':client_email_for_invoice,
													'resource_name':resource_name,
													'resourcPhone':resourcPhone,
													'resource_role':resource_role,
													'ResourceEmail':ResourceEmail,
													'Engagement_start_date':Engagement_start_date,
													'Engagement_end_date':Engagement_end_date,
													'Billing_start_date':Billing_start_date,
													'monthly_compensation':monthly_compensation,
													'monthly_billing':monthly_billing,
													'GST_applicable':GST_applicable,
													'travel_expenses':travel_expenses,
													'notes':notes,
													'Engagement_submitter':Engagement_submitter,
													'HR_ID':HR_ID,
													'resourceType':resourceType,
													'Status':'Submitted',
													'Form_id':Form_id
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
													if(obj.msg=='inserted')
													{
														 
														 $('#btn_approve').removeClass('disabled');
														  $('#btn_reject').removeClass('disabled');
														swal("success!","Details Submitted successfully", "success").then(function (){  window.location.replace("/dsa/dsa/index.php/HR/New_Engagement_Dashbord");  });
														
					              					}
												    if(obj.msg=='updated')
													{ 
														   $('#btn_approve').removeClass('disabled');
														    $('#btn_reject').removeClass('disabled');
														   swal("success!","Details updated successfully", "success").then(function (){  window.location.replace("/dsa/dsa/index.php/HR/New_Engagement_Dashbord");  });
														 											
													}
												   
				                                }
                                    });

									 

									
									
                           });

						   $( "#btn_approve" ).click(function() {
							  // alert("hii");
							         var Client_name=document.getElementById("Client_name").value; 
									 var client_contact =document.getElementById("client_contact").value; 
									 var client_address =document.getElementById("client_address").value; 
									 var client_gst_number =document.getElementById("client_gst_number").value; 
									 var GST_applicable =document.getElementById("GST_applicable").value;
									 var resource_role =document.getElementById("resource_role").value; 
									 var resource_name =document.getElementById("resource_name").value; 
								   	 var ResourceEmail=document.getElementById("ResourceEmail").value; 
									 var client_email_for_invoice=document.getElementById("client_email_for_invoice").value; 
									 var resourcPhone =document.getElementById("resourcPhone").value; 
									 var Engagement_start_date =document.getElementById("Engagement_start_date").value; 
									 var Engagement_end_date =document.getElementById("Engagement_end_date").value; 
									 var Billing_start_date =document.getElementById("Billing_start_date").value; 
									 var monthly_compensation =document.getElementById("monthly_compensation").value; 
									 var monthly_billing =document.getElementById("monthly_billing").value; 
									 var travel_expenses =document.getElementById("travel_expenses").value; 
									 var notes =document.getElementById("notes").value; 
								     var HR_ID =document.getElementById("HR_ID").value; 
									 var Engagement_submitter =document.getElementById("Engagement_submitter").value; 
								     var Approved_by=document.getElementById("active_HR_ID").value;
								     var resourceType =document.getElementById("resourceType").value; 
									 var Form_id =document.getElementById("Form_id").value; 
							
							
									

									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/HR/save_engagement_form"); ?>',
											    data:{
													'Client_name':Client_name,
													'client_contact':client_contact,
													'client_address':client_address,
													'client_gst_number':client_gst_number,
													'client_email_for_invoice':client_email_for_invoice,
													'resource_name':resource_name,
													'resourcPhone':resourcPhone,
													'resource_role':resource_role,
													'ResourceEmail':ResourceEmail,
													'Engagement_start_date':Engagement_start_date,
													'Engagement_end_date':Engagement_end_date,
													'Billing_start_date':Billing_start_date,
													'monthly_compensation':monthly_compensation,
													'monthly_billing':monthly_billing,
													'GST_applicable':GST_applicable,
													'travel_expenses':travel_expenses,
													'notes':notes,
													'Engagement_submitter':Engagement_submitter,
													'HR_ID':HR_ID,
													'Status':'Approved',
													'Approved_by':Approved_by,
													'resourceType':resourceType,
													'Form_id':Form_id
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
													if(obj.msg=='Approved')
													{
														    swal("success!","Successfully Approved", "success").then(function (){  window.location.replace("/dsa/dsa/index.php/HR/New_Engagement_Dashbord");  });
															
					              					}
												  
												   
				                                }
                                    });

									 

									
									
                           });

						    $( "#btn_rework" ).click(function() {
							  // alert("hii");
							         var Client_name=document.getElementById("Client_name").value; 
									 var client_contact =document.getElementById("client_contact").value; 
									 var client_address =document.getElementById("client_address").value; 
									 var client_gst_number =document.getElementById("client_gst_number").value; 
									 var GST_applicable =document.getElementById("GST_applicable").value;
									 var resource_role =document.getElementById("resource_role").value; 
									 var resource_name =document.getElementById("resource_name").value; 
								   	 var ResourceEmail=document.getElementById("ResourceEmail").value; 
									 var client_email_for_invoice=document.getElementById("client_email_for_invoice").value; 
									 var resourcPhone =document.getElementById("resourcPhone").value; 
									 var Engagement_start_date =document.getElementById("Engagement_start_date").value; 
									 var Engagement_end_date =document.getElementById("Engagement_end_date").value; 
									 var Billing_start_date =document.getElementById("Billing_start_date").value; 
									 var monthly_compensation =document.getElementById("monthly_compensation").value; 
									 var monthly_billing =document.getElementById("monthly_billing").value; 
									 var travel_expenses =document.getElementById("travel_expenses").value; 
									 var notes =document.getElementById("notes").value; 
								     var HR_ID =document.getElementById("HR_ID").value; 
							         var Approved_by=document.getElementById("active_HR_ID").value;
									 var Engagement_submitter =document.getElementById("Engagement_submitter").value; 
									 var resourceType =document.getElementById("resourceType").value; 
							         var Form_id =document.getElementById("Form_id").value; 
							
									  var status_notes=document.getElementById("status_notes").value;
									  if(status_notes == '')
										{ 
											swal("warning!", " Please Enter Notes for rework", "warning");
										    return false;
										}
						


									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/HR/save_engagement_form"); ?>',
											    data:{
													'Client_name':Client_name,
													'client_contact':client_contact,
													'client_address':client_address,
													'client_gst_number':client_gst_number,
													'client_email_for_invoice':client_email_for_invoice,
													'resource_name':resource_name,
													'resourcPhone':resourcPhone,
													'resource_role':resource_role,
													'ResourceEmail':ResourceEmail,
													'Engagement_start_date':Engagement_start_date,
													'Engagement_end_date':Engagement_end_date,
													'Billing_start_date':Billing_start_date,
													'monthly_compensation':monthly_compensation,
													'monthly_billing':monthly_billing,
													'GST_applicable':GST_applicable,
													'travel_expenses':travel_expenses,
													'notes':notes,
													'Engagement_submitter':Engagement_submitter,
													'HR_ID':HR_ID,
													'Status':'Rework',
													'Approved_by':Approved_by,
													'status_notes':status_notes,
													'resourceType':resourceType,
													'Form_id':Form_id
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
												
												    if(obj.msg=='Rework')
													{ 
														 swal("success!","Status changed successfully", "success").then(function (){  window.location.replace("/dsa/dsa/index.php/HR/New_Engagement_Dashbord");  });
																									
													}
												   
				                                }
                                    });

									 

									
									
                           });

						     $( "#save_to_draft" ).click(function() {
							  // alert("hii");
							         var Client_name=document.getElementById("Client_name").value; 
									 var client_contact =document.getElementById("client_contact").value; 
									 var client_address =document.getElementById("client_address").value; 
									 var client_gst_number =document.getElementById("client_gst_number").value; 
									 var GST_applicable =document.getElementById("GST_applicable").value;
									 var resource_role =document.getElementById("resource_role").value; 
									 var resource_name =document.getElementById("resource_name").value; 
								   	 var ResourceEmail=document.getElementById("ResourceEmail").value; 
								     var resourceType=document.getElementById("resourceType").value; 
									 var client_email_for_invoice=document.getElementById("client_email_for_invoice").value; 
									 var resourcPhone =document.getElementById("resourcPhone").value; 
									 var Engagement_start_date =document.getElementById("Engagement_start_date").value; 
									 var Engagement_end_date =document.getElementById("Engagement_end_date").value; 
									 var Billing_start_date =document.getElementById("Billing_start_date").value; 
									 var monthly_compensation =document.getElementById("monthly_compensation").value; 
									 var monthly_billing =document.getElementById("monthly_billing").value; 
									 var travel_expenses =document.getElementById("travel_expenses").value; 
									 var notes =document.getElementById("notes").value; 
								     var HR_ID =document.getElementById("HR_ID").value; 
									 var Engagement_submitter =document.getElementById("Engagement_submitter").value; 
									 var resourceType =document.getElementById("resourceType").value; 
									   var Form_id =document.getElementById("Form_id").value; 
							
							
									 if(Client_name=='')
										{
											swal("warning!", "Please enter client name", "warning");
										    return false;
										}
									else if(client_contact=='')
										{
											swal("warning!", "Please enter client contact number", "warning");
										    return false;
										}
									


									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/HR/save_engagement_form"); ?>',
											    data:{
													'Client_name':Client_name,
													'client_contact':client_contact,
													'client_address':client_address,
													'client_gst_number':client_gst_number,
													'client_email_for_invoice':client_email_for_invoice,
													'resource_name':resource_name,
													'resourcPhone':resourcPhone,
													'resource_role':resource_role,
													'ResourceEmail':ResourceEmail,
													'resourceType':resourceType,
													'Engagement_start_date':Engagement_start_date,
													'Engagement_end_date':Engagement_end_date,
													'Billing_start_date':Billing_start_date,
													'monthly_compensation':monthly_compensation,
													'monthly_billing':monthly_billing,
													'GST_applicable':GST_applicable,
													'travel_expenses':travel_expenses,
													'notes':notes,
													'Engagement_submitter':Engagement_submitter,
													'HR_ID':HR_ID,
													'Status':'In Draft',
													'resourceType':resourceType,
													'Form_id':Form_id

													},
												success:function(data)
												{
													var obj =JSON.parse(data);
													if(obj.msg=='in_draft')
													{
														 
														swal("success!","Details saved in draft successfully", "success").then(function (){  window.location.replace("/dsa/dsa/index.php/HR/New_Engagement_Dashbord");  });
														 
					              					}
												 
												   
				                                }
                                    });

									 

									
									
                           });


						   $( "#Submit_rework_form" ).click(function() {
							  // alert("hii");
							         var Client_name=document.getElementById("Client_name").value; 
									 var client_contact =document.getElementById("client_contact").value; 
									 var client_address =document.getElementById("client_address").value; 
									 var client_gst_number =document.getElementById("client_gst_number").value; 
									 var GST_applicable =document.getElementById("GST_applicable").value;
									 var resource_role =document.getElementById("resource_role").value; 
									 var resource_name =document.getElementById("resource_name").value; 
								   	 var ResourceEmail=document.getElementById("ResourceEmail").value; 
									 var client_email_for_invoice=document.getElementById("client_email_for_invoice").value; 
									 var resourcPhone =document.getElementById("resourcPhone").value; 
									 var Engagement_start_date =document.getElementById("Engagement_start_date").value; 
									 var Engagement_end_date =document.getElementById("Engagement_end_date").value; 
									 var Billing_start_date =document.getElementById("Billing_start_date").value; 
									 var monthly_compensation =document.getElementById("monthly_compensation").value; 
									 var monthly_billing =document.getElementById("monthly_billing").value; 
									 var travel_expenses =document.getElementById("travel_expenses").value; 
									 var notes =document.getElementById("notes").value; 
								     var HR_ID =document.getElementById("HR_ID").value; 
									 var resourceType =document.getElementById("resourceType").value; 
							  var Form_id =document.getElementById("Form_id").value; 
							
									 var Engagement_submitter =document.getElementById("Engagement_submitter").value; 
								
									 
									 if(Client_name=='')
										{
											swal("warning!", "Please enter client name", "warning");
										    return false;
										}
									else if(client_contact=='')
										{
											swal("warning!", "Please enter client contact number", "warning");
										    return false;
										}
									else if(client_address=='')
										{
											swal("warning!", "Please enter client address", "warning");
										    return false;
										}
									else if(client_gst_number=='')
										{
											swal("warning!", "Please enter client Gst number", "warning");
										    return false;
										}
									else if(client_email_for_invoice=='')
										{
											swal("warning!", "Please enter email for invoice ", "warning");
										    return false;
										}
									 
									 else if(resource_name=='')
										{
											swal("warning!", "Please enter resource name", "warning");
										    return false;
										}
									else if(resourcPhone=='')
										{
											swal("warning!", " Please enter phone number", "warning");
										    return false;
										}
									 else if(ResourceEmail=='')
										{
											swal("warning!", "Please enter resource email", "warning");
										    return false;
										}
								
									  else if(resource_role =='')
										{
											swal("warning!", " Please enter role", "warning");
										    return false;
										}
										else if(resourceType== '')
									 {
										 swal("warning!", " Please select resource type ", "warning");
										    return false;
									 }
								      else if(Engagement_start_date == '')
										{
											swal("warning!", " Please enter engagement start date", "warning");
										    return false;
										}
									  else if(Engagement_end_date == '')
										{
											swal("warning!", " Please enter engagement end date", "warning");
										    return false;
										}
										 else if(Engagement_end_date < Engagement_start_date)
									 {
										 swal("warning!", " Engagement end date can not be before Engagement start date", "warning");
										    return false;
									 }
									   else if(Billing_start_date == '')
										{
											swal("warning!", " Please enter billing start date", "warning");
										    return false;
										}
									 else if(Billing_start_date < Engagement_start_date)
									 {
										 swal("warning!", " Billing start date can not be before Engagement start date", "warning");
										    return false;
									 }
									  else if(monthly_compensation == '')
										{
											swal("warning!", " Please enter monthly compensation ", "warning");
										    return false;
										}
									  else if(monthly_billing == '')
										{
											swal("warning!", " Please enter monthly billing ", "warning");
										    return false;
										}
									  else if(GST_applicable == '')
										{
											swal("warning!", " Please select GST applicable ", "warning");
										    return false;
										}
									  else if(travel_expenses == '')
										{ 
											swal("warning!", " Please Enter Tenure ", "warning");
										    return false;
										}
						 
									  


									$.ajax({
												type:'POST',
												url:'<?php echo base_url("index.php/HR/save_engagement_form"); ?>',
											    data:{
													'Client_name':Client_name,
													'client_contact':client_contact,
													'client_address':client_address,
													'client_gst_number':client_gst_number,
													'client_email_for_invoice':client_email_for_invoice,
													'resource_name':resource_name,
													'resourcPhone':resourcPhone,
													'resource_role':resource_role,
													'ResourceEmail':ResourceEmail,
													'Engagement_start_date':Engagement_start_date,
													'Engagement_end_date':Engagement_end_date,
													'Billing_start_date':Billing_start_date,
													'monthly_compensation':monthly_compensation,
													'monthly_billing':monthly_billing,
													'GST_applicable':GST_applicable,
													'travel_expenses':travel_expenses,
													'notes':notes,
													'Engagement_submitter':Engagement_submitter,
													'HR_ID':HR_ID,
													'resourceType':resourceType,
													'Status':'Submit_rework_form',
													'Form_id':Form_id
													},
												success:function(data)
												{
													var obj =JSON.parse(data);
												
												    if(obj.msg=='updated')
													{ 
														   $('#btn_approve').removeClass('disabled');
														    $('#btn_reject').removeClass('disabled');
														   swal("success!","Details updated successfully", "success").then(function (){  window.location.replace("/dsa/dsa/index.php/HR/New_Engagement_Dashbord");  });
														 // swal("warning!",obj.response, "warning").then(function() { window.location.reload(); });
																									
													}
												   
				                                }
                                    });

									 

									
									
                           });
						   </script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>
