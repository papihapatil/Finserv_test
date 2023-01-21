<!DOCTYPE html>
<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
 $id = $_GET['ID']; // shows id of customer
 $this->session->set_userdata("id",$id);
 $this->session->set_userdata("id1",$id1);

if(!empty($row_sanction))
	{
		if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
		{
			?>
			<input hidden type="text" id="Recommendation_status" value="yes"> 
			<?php
		}
		else
		{
				?>
			<input hidden type="text" id="Recommendation_status" value="no"> 
			<?php
		}
		
	}
?>
<style>
textarea {
  resize: none;
}
</style>
<input hidden type="text" value="<?php  echo $userType;?> " id="userType">
<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
		   <div class="row" >
				<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; margin-left:0px;">
					<div class="row justify-content-center col-6">
						<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px; margin-left:-43%;">Credit Loan Sanction Recommendation</span>
          </div>
		   <div class="row justify-content-center col-3"></div>
          <div class="row justify-content-center col-3">
           		<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_Documents?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>" target="_blank">
           			<button type="button" class="btn btn-success">View Documents </button> 
           		</a>
         	</div>
        
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-6"><span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Name of the customer : <?php echo $row->FN." ".$row->MN." ".$row->LN;?></span></div>
					<div class="col-sm-6"><span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px; ">Application ID : <?php echo $data_row_applied_loan->Application_id;?></span></div>
				</div>
				<div class="col-sm-12" >
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<input hidden style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
						<input hidden  style="margin-top: 8px;" name="customer_ID" id="customer_ID" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->UNIQUE_CODE;?>">
						<input hidden  style="margin-top: 8px;" name="CM_ID" id="CM_ID" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $CM_ID;?>">
						<input hidden  style="margin-top: 8px;" name="application_number"  class="form-control" type="text" value="<?php echo $data_row_applied_loan->Application_id;?>">
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Loan Type</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Loan Amount</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
							<input readonly style="margin-top: 8px;" name="loan_amount"  class="form-control" type="text" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_loan_amount;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Tenure</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
								<input readonly  name="tenure" class="form-control" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_tenure;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">ROI</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_amount"   class="form-control" type="text" value="<?php  if(!empty($credit_analysis_data->final_roi)) echo $credit_analysis_data->final_roi;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Final Loan Amount *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
							<input required placeholder="Final Loan Amount" name="final_loan_amount" id="final_loan_amount" class="form-control" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
		  				   </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Final Tenure *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
								<input required style="margin-top: 8px;"  name="final_tenure" id="final_tenure" placeholder="Final Tenure" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>" type="number" >
		  				   </div>
		  				</div>
						<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Final ROI in % *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
									<input  required placeholder="ROI" name="final_roi" class="form-control" id="final_roi"  step="any"  value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>" type="number"  onchange="Calculate()">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Final EMI </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
									<input  name="EMI" class="form-control"  id="EMI" step="any" type="number" value="<?php if(isset($row_sanction)) echo round($row_sanction->EMI);?>" >
		  				   </div>
		  				</div>
						
		  				
							
								<input hidden readonly style="margin-top: 8px;" name="income_assessed"  class="form-control"  value="	
								  <?php if(isset($credit_analysis_data))
									    {
											if(isset($credit_analysis_data->avg_net_salary))
											{
											   echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($credit_analysis_data->avg_net_salary));
											}
											else if(isset($credit_analysis_data->PAT_3))
											{
												echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round((($credit_analysis_data->PAT_3)/12+($credit_analysis_data->PAT_2)/12+($credit_analysis_data->PAT_1)/12)/3));
											}
									    	else if(isset($credit_analysis_data->gross_profit))
											{
												echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round((($data_income_details->gross_profit)/12)));
											}
											else
											{
												echo "0";
											}

										}
									?>" type="number" maxlength="11" oninput="maxLengthCheck(this)"  onchange="Calculate()">
		  				    
		  				
		  			
<!----------------------------------------------------------------------------------------- -->

		  					<div class="col-sm-12">
		  							<div style=" margin-top: 20px;margin-left:-10px; " class="col">
		  								<h4>Collateral Details</h4>
		  						</div>
		  				</div>
		  				
		  		
		  	
               <?php 


                 if($data_row_applied_loan->LOAN_TYPE != 'lap')
                 {
                 	?>
                 	<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Agreement/ Land Value </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
								<input  class="form-control" type="number" name="Agreement_value"  value="<?php if(isset($row_sanction)) echo $row_sanction->Agreement_value; else if(!empty($row_more)){echo $row_more->Agreement_value;}?>">
		  				    </div>
		  				</div>

                 	<?php
                 }


              ?>

		  					  			<div class="col-sm-12"></div>
						  <div class="col-sm-12" style="padding:10px;">
						  	  <table class="table table-bordered" id="data_table">
									<tr>
										<th><label class="class_bold">Address Of Property</label></th>
										<th><label class="class_bold">Total Value Of The Property</label></th>
										<th><label class="class_bold">LTV %</label></th>
									</tr>

									<tr>
										<td><label >	<input style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="PROP_ADD_LINE"  id="PROP_ADD_LINE_1" value="<?php if(isset($row_sanction)) echo $row_sanction->PROP_ADD_LINE; else if(!empty($data_row_applied_loan)) {echo $data_row_applied_loan->PROP_ADD_LINE_1;echo $data_row_applied_loan->PROP_ADD_LINE_2; echo $data_row_applied_loan->PROP_ADD_LINE_3;}?>"></label></td>
										<td><label >		<input  class="form-control" type="number" name="Total_Value_of_property" id="Total_Value_of_property"  value="<?php  if(isset($row_sanction)) echo $row_sanction->Total_Value_of_property; else if(!empty($row_more)){echo $row_more->Total_Value;}?>"></label></td>
										<td><label ><input   class="form-control" type="number" name="LTV" id="LTV"   value="<?php if(!empty($row_sanction)){echo $row_sanction->LTV;}?>"></label></td>
									</tr>

						  	<?php
						  	if(isset($row_sanction)) 
						  	{
						  		if(!empty($row_sanction->more_property_details))
						  		{
						  			?>
						  					   <?php 
													    $reference_array=json_decode($row_sanction->more_property_details,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['Reference_type']))
															  {
															  ?>
															 
															 <tr>
															    <td><input class = "form-control" type="text" id="Reference_type" name="Reference_type[]" value="<?php echo $value['Reference_type']?>"></td>
																<td><input  class = "form-control"type="text" id="Name" name="Name[]" value="<?php echo $value['Name']?>"></td>
																<td><input   class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo $value['Contact_No']?>"></td>
																
															
															</tr>
															  <?php
															  }
															}
														  }
														
														 ?>
						  			<?php
						  		}
						  	}

						  	?>
							
									<tr>
										<td><input class = "form-control" type="text" id="Reference_type" name="Reference_type[]"></td>
										<td><input class = "form-control" type="number" id="Name" name="Name[]"></td>
										<td><input class = "form-control" type="number" id="Contact_No" step="any" name="Contact_No[]"></td>
										<td><input class = "form-control add" type="button" onclick="add_row();" value="Add Row"></td>
									</tr>
								</table>
							</div>

		  			<!--------------------------------------------------------------------------------- -->
		  			
		  				
		  			<div class="col-sm-12">
		  							<div style=" margin-left:-10px; " class="col">
		  								<h4>Other Details</h4><hr>
		  						</div>
		  				</div>

		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Product *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
									<input required placeholder="Product" class="form-control" type="text" name="product" id="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Program *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
									<input required placeholder="Program" name="program" class="form-control" type="text"  id="program" value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
		  				    </div>
		  				</div>
		  			
		  				
			  		
			  				<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Recommendation Status <span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: -14px;  margin-top: 8px;" class="col">
							<select class="form-control" name="loan_status" id="loan_status" required style=" margin-top: 9px;" readonly >
							    <option value="">Select</option>
								<option value="Recommended" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Recommended') echo ' selected="selected"'; ?>>Recommend</option>
								<option value="Rejected" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Rejected') echo ' selected="selected"'; ?>>Reject</option>
						    </select>
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Recommended By</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left:-14px;  margin-top: 8px;" class="col">
								<input readonly class="form-control"  value="<?php if(isset($row_2)) echo $row_2->FN." ".$row_2->LN;?>" type="text" >
			  		    </div>
			  		</div>
					<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Eligibility *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: -14px;  margin-top: 8px;" class="col">
							<input required placeholder="Eligibility" class="form-control"  name="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
			  		    </div>
			  		</div>
					<div class="col-sm-9">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:-8px;  font-weight: bold; ">Approval Remark *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: -14px;  margin-top: 8px;" class="col">
							<input type="text" name="approval_remark" id="Approval_Remark"  class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->approval_remark;?>">
			  		    </div>
			  		</div>
					<div class="col-sm-12">
		  							<div style=" margin-top: 18px;" class="col">
		  								<h4>Case Details</h4><hr>
		  						</div>
		  			</div>
					<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px;  font-weight: bold; ">Case Details</span>
						</div>
						<div class="w-100"></div>
						<div style=" margin-top: 8px;" class="col">
							<textarea required  row="50" class="form-control"  name="case_details" id="case_details"><?php if(isset($row_sanction)) echo $row_sanction->case_details;?></textarea>
			  		    </div>
			  		</div>
					<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
							<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px;   font-weight: bold; ">Deviation Details</span>
						</div>
						<div class="w-100"></div>
						<div style=" margin-top: 8px;" class="col">
							<textarea required  row="6" class="form-control"  name="Deviation_details" id="Deviation_details"><?php if(!empty($row_sanction->Deviation_details)) echo $row_sanction->Deviation_details;?></textarea>
			  		    </div>
			  		</div>
					<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px;  font-weight: bold; ">End Use Of Loan</span>
						</div>
						<div class="w-100"></div>
						<div style=" margin-top: 8px;" class="col">
							<textarea required  row="6" class="form-control"  name="End_use_of_loan"  id="End_use_of_loan"><?php if(!empty($row_sanction->End_use_of_loan)) echo $row_sanction->End_use_of_loan;?></textarea>
						</div>
			  		</div>
					<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px;  font-weight: bold; ">Sanction Conditions</span>
						</div>
						<div class="w-100"></div>
						<div style=" margin-top: 8px;" class="col">
								<textarea  class="form-control"  name="sanction_conditions" id="sanction_conditions" type="text"row="100"  style="height:200px;"><?php if(isset($row_sanction)) echo $row_sanction->sanction_conditions;?></textarea>
				  		 </div>
			  		</div>
					<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px;  font-weight: bold; ">Legal Conditions</span>
						</div>
						<div class="w-100"></div>
						<div style=" margin-top: 8px;" class="col">
								<textarea  class="form-control"  name="legal_conditions" id="legal_conditions" type="text"row="100" style="height:200px;"><?php if(isset($row_sanction)) echo $row_sanction->legal_conditions;?></textarea>
				  		 </div>
			  		</div>
					<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px;  font-weight: bold; ">Chief Risk Officer Comments</span>
						</div>
						<div class="w-100"></div>
						<div style=" margin-top: 8px;" class="col">
								<textarea  class="form-control"  name="admin_comments" id="admin_comments" type="text"row="5" ><?php if(isset($row_sanction)) echo $row_sanction->admin_comments;?></textarea>
				  		 </div>
			  		</div>
					
		  			<br><br>
                    <?php
						if(!empty($row_sanction))
						{
							if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Credit Manager')
								{
      		        ?>
									<div class="col-sm-12" style="margin-left: 51px;color:orange;">
										<h5>Recommendation Sent to Cluster Credit Manager For Approval</h5> 
									</div>
					<?php
								}
								else if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
								{
													
											if($userType!= 'Disbursement_OPS' && $userType!= 'Business_Head')
											{
												
    			    ?>
									<div class="col-sm-4">
										<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="Approve" id="Approve"  onclick="Approve()">Approve</button>
									</div>
									<div class="col-sm-4">
										<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="revert" id="revert" onclick="revert()">Revert</button>
									</div>
									<div class="col-sm-4">
										<button class="login100-form-btn"   style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="reject" id="reject" onclick="reject()">Reject</button>
									</div>
						<?php
											}
    					}
    					else if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
    					{
    				    ?>
						
								<div class="col-sm-12" style="margin-left: 51px;color:green;">
									<h5>Recommendation Approved</h5> 
					 			</div>
						<?php
    					}
    					else if($row_sanction->Recommendation_status == 'approved')
							{
						?>
								<div class="col-sm-12" style="margin-left: 51px;color:green;">
									<h5>Recommendation Approved</h5> 
					 			</div>
					 	<?php
							}
						else if($row_sanction->Recommendation_status == 'Reverted' && $row_sanction->Recommendation_status_added_by == 'Admin')
							{
						?>
								<div class="col-sm-12" style="margin-left: 51px;color:orange;">
									<h5>Application Reverted to the Cluster Credit Manager</h5> 
					 			</div>
							</div>
						<?php
							}
						else if($row_sanction->Recommendation_status == 'Rejected')
							{
				?>
							<div class="col-sm-12" style="margin-left: 51px;color:red;">
									<h5>Application Reverted to the Cluster Credit Manager</h5> 
					 			</div>
						</div>
						<?php
							}
						}
    

?>


					
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			
		
	</form>


</main>
</div>

</div>
</div>
<script>
   

		  $("#final_loan_amount").keyup(function(){
    
		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#final_loan_amount").val() !== "")
			       P = parseFloat($("#final_loan_amount").val());
			                
			                        
			    if ($("#final_roi").val() !== "") 
			      r = parseFloat(parseFloat($("#final_roi").val()) / 100);
 
			    if ($("#final_tenure").val() !== "")
			        n = parseFloat($("#final_tenure").val());

			                    
			                  
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    			$("#emi").val(emi.toFixed(2));
     	   	document.getElementById('EMI').value= emi.toFixed(2);
     		

              });

		   $("#final_roi").keyup(function(){
    
		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#final_loan_amount").val() !== "")
			       P = parseFloat($("#final_loan_amount").val());
			                   
			                        
			    if ($("#final_roi").val() !== "") 
			      r = parseFloat(parseFloat($("#final_roi").val()) / 100);

			    if ($("#final_tenure").val() !== "")
			        n = parseFloat($("#final_tenure").val());
			         	
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
		
              
    			$("#emi").val(emi.toFixed(2));
     	   	document.getElementById('EMI').value= emi.toFixed(2);
     		
           });

 $("#final_tenure").keyup(function(){
    
		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#final_loan_amount").val() !== "")
			       P = parseFloat($("#final_loan_amount").val());
			                   
			                        
			    if ($("#final_roi").val() !== "") 
			      r = parseFloat(parseFloat($("#final_roi").val()) / 100);

			    if ($("#final_tenure").val() !== "")
			        n = parseFloat($("#final_tenure").val());
			                   
			                  
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    			$("#emi").val(emi.toFixed(2));
     	   	document.getElementById('EMI').value= emi.toFixed(2);
  

              });


$("#Total_Value_of_property").keyup(function(){
            var P = 0;
              var n = 0;
                var LTV = 0;
			    if($("#final_loan_amount").val() !== "")
			    P = parseFloat($("#final_loan_amount").val());
			    if ($("#Total_Value_of_property").val() !== "")
			     n = parseFloat($("#Total_Value_of_property").val());
			    LTV =  P / (n/100);
	        $("#LTV").val(LTV.toFixed(2));
     	   	document.getElementById('LTV').value= LTV.toFixed(2);
  

              });



		   
		    
</script>
<script>
	function Approve() 
						{
						
							 var Customer_ID = document.getElementById('customer_ID').value;
							 var CM_ID = document.getElementById('CM_ID').value;
						 	 var Cluster_manager_Comments = document.getElementById('admin_comments').value;
							 
							 var final_loan_amount = document.getElementById('final_loan_amount').value;
							 var final_roi = document.getElementById('final_roi').value;
							 var final_tenure = document.getElementById('final_tenure').value;
							 var EMI = document.getElementById('EMI').value;
	                        var sanction_conditions = document.getElementById('sanction_conditions').value;
					 var legal_conditions = document.getElementById('legal_conditions').value;
							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Admin/Admin_Sanction_recommendation_status"); ?>',
									    data:{
										'Customer_ID':Customer_ID,
										'CM_ID':CM_ID,
										'Recommendation_status':"Loan Recommendation Approved",
										'Cluster_manager_Comments':Cluster_manager_Comments,
										'final_loan_amount':final_loan_amount,
										'final_roi':final_roi,
										
										'final_tenure':final_tenure,
										
										'EMI':EMI,
										'sanction_conditions':sanction_conditions,
										'legal_conditions':legal_conditions
										
										

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finaleap_finserv/dsa/dsa/index.php/Admin/Sanction_recommendations_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}

						function revert() 
						{
						
							 var Customer_ID = document.getElementById('customer_ID').value;
							 var CM_ID = document.getElementById('CM_ID').value;
						 	 var admin_comments = document.getElementById('admin_comments').value;
							 var final_loan_amount = document.getElementById('final_loan_amount').value;
							 var final_tenure = document.getElementById('final_tenure').value;
							 var final_roi = document.getElementById('final_roi').value;
						
							
							 var EMI = document.getElementById('EMI').value;
	                        var sanction_conditions = document.getElementById('sanction_conditions').value;
					 var legal_conditions = document.getElementById('legal_conditions').value;
	
						 	   if(admin_comments == '')
					     {
					     	swal("warning!", "Please add comments", "warning");
										    return false;
					     }
					
							 $.ajax({
										type:'POST',
											url:'<?php echo base_url("index.php/Admin/Admin_Sanction_recommendation_status"); ?>',
									    data:{
										'Customer_ID':Customer_ID,
										'CM_ID':CM_ID,
										'Recommendation_status':"Reverted",
										'admin_comments':admin_comments,
										'final_loan_amount':final_loan_amount,
										'final_roi':final_roi,
										
										'final_tenure':final_tenure,
										
										'EMI':EMI,
										'sanction_conditions':sanction_conditions,
										'legal_conditions':legal_conditions
										

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finaleap_finserv/dsa/dsa/index.php/Admin/Sanction_recommendations_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}
						function reject() 
						{
						
							 var Customer_ID = document.getElementById('customer_ID').value;
							 var CM_ID = document.getElementById('CM_ID').value;
						 	 var admin_comments = document.getElementById('admin_comments').value;
							  var final_loan_amount = document.getElementById('final_loan_amount').value;
							 var final_roi = document.getElementById('final_roi').value;
							 var final_tenure = document.getElementById('final_tenure').value;
							 var EMI = document.getElementById('EMI').value;
	                        var sanction_conditions = document.getElementById('sanction_conditions').value;
					 var legal_conditions = document.getElementById('legal_conditions').value;
	
						 	   if(admin_comments == '')
					     {
					     	swal("warning!", "Please add comments", "warning");
										    return false;
					     }
					
							 $.ajax({
										type:'POST',
											url:'<?php echo base_url("index.php/Admin/Admin_Sanction_recommendation_status"); ?>',
									    data:{
										'Customer_ID':Customer_ID,
										'CM_ID':CM_ID,
										'Recommendation_status':"Rejected",
										'admin_comments':admin_comments,
										'final_loan_amount':final_loan_amount,
										'final_roi':final_roi,
										
										'final_tenure':final_tenure,
										
										'EMI':EMI,
										'sanction_conditions':sanction_conditions,
										'legal_conditions':legal_conditions

										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/finaleap_finserv/dsa/dsa/index.php/Admin/Sanction_recommendations_admin?ID="+obj.customer_id+"&CM="+obj.CM_ID); });
									
												
											}
						                }
                                    });
						}
</script>
<script>
function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var country=document.getElementById("country_row"+no);
 var age=document.getElementById("age_row"+no);
	
 var name_data=name.innerHTML;
 var country_data=country.innerHTML;
 var age_data=age.innerHTML;


 name.innerHTML="<input type='text' name='Reference_type[]' id='name_text"+no+"' value='"+name_data+"'>";
 country.innerHTML="<input type='text' name='Name[]' id='country_text"+no+"' value='"+country_data+"'>";
 age.innerHTML="<input type='number' id='age_text"+no+"' name='age[]' value='"+age_data+"'>";
 
}

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;
 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 document.getElementById("age_row"+no).innerHTML=age_val;
 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_name=document.getElementById("Reference_type").value;
 var new_country=document.getElementById("Name").value;
 var new_age=document.getElementById("Contact_No").value;
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='Reference_type[]' id='name_row"+table_len+"' value='"+new_name+"'></td><td><input type='number' class = 'form-control' name='Name[]' id='country_row"+table_len+"' value='"+new_country+"'></td><td><input class = 'form-control' name='Contact_No[]' step='any' type='number' id='age_row"+table_len+"' value='"+new_age+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 document.getElementById("Reference_type").value="";
 document.getElementById("Name").value="";
 document.getElementById("Contact_No").value="";


}
</script>

<script>
	   $(document).ready(function(){
	      var userType = document.getElementById('userType').value;
		if(userType == "Business_Head ")
		   {
		   $('input[type="text"]').prop('readonly',true);
		 $('input[type="number"]').prop('readonly',true);
		 $('input[type="date"]').prop('readonly',true);
		  $('input[type="email"]').prop('readonly',true);
		    $('#case_details').attr('readonly',true);
			 $('#Deviation_details').attr('readonly',true);
			
			 $('#End_use_of_loan').attr('readonly',true);
			
			 $('#sanction_conditions').attr('readonly',true);
			
			 $('#legal_conditions').attr('readonly',true);
			
			 $('#admin_comments').attr('readonly',true);
			
			
		   }
	   }
	   );
</script>
<script>
	   $(document).ready(function(){
	      var Recommendation_status = document.getElementById('Recommendation_status').value;
		if(Recommendation_status == "yes")
		   {
		   $('input[type="text"]').prop('readonly',true);
		 $('input[type="number"]').prop('readonly',true);
		 $('input[type="date"]').prop('readonly',true);
		  $('input[type="email"]').prop('readonly',true);
		    $('#sanction_conditions').attr('readonly',true);
			  $('#admin_comments').attr('readonly',true);  //
		   $('#additional_legal_conditions').attr('readonly',true); // ,  ,
		    $('#legal_conditions').attr('readonly',true);
			 $('#additional_sanction_conditions').attr('readonly',true); //case_details ,Deviation_details ,End_use_of_loan
			    $('#case_details').attr('readonly',true);
				   $('#Deviation_details').attr('readonly',true);
				      $('#End_use_of_loan').attr('readonly',true);
		   }
	   }
	   );
</script>
