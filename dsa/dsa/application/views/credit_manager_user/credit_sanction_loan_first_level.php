<!DOCTYPE html>
<?php 

  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
 $id = $_GET['ID']; // shows id of customer
 // $id = $this->session->userdata("id");
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);

?>
<style>
.designe{
	border:1px solid ;
	
}
.block:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -1px;
}
.block1:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -82px;
}

.block1:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block1 {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}

.block:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active {
  background-color: #25a6c6;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active:after {
  color: #25a6c6;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_Active:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block_completed {
  background-color: #83dcf0;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  margin:16px;
}
.block_completed:after {
  color: #83dcf0;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_completed:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}


.block_hold {
  background-color: yellow;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_reject {
  background-color: red;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_font{
	margin-left:7%;
	font-size:12px;
	color:gray;
}
.block_font_active{
	margin-left:7%;
	font-size:12px;
	color:White;
}
</style>
<link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<?php ini_set('short_open_tag', 'On'); ?>
				<div class="margin-10 padding-5">
		  <div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
		
<!--<a href="'.base_url().'index.php/credit_manager_user/credit_sanction_loan_first_level?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'"  class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:blue;"></i></a> -->
								<?php if(isset($row_more))
									{
							   	 if($row_more->STATUS =='PD Completed')
										{
											?>
												<div class="col-sm-3 block_completed" >
														<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
															<span class="block_font_active">1. &nbsp;PD Process</span>
														</a>
												</div> 
												<div class="col-sm-3 block_Active" ><a  href="<?php echo base_url()?>index.php/credit_manager_user/credit_sanction_loan_first_level?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>"><span class="block_font_active">2. &nbsp;Sanction Recommendation</span> 		</a></div>
											
												<div class="col-sm-3 block" ><span class="block_font">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
										else if($row_more->STATUS =='Loan Recommendation Approved')
										{
											?>
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
													<span class="block_font_active">1. &nbsp;PD Generated</span>
												</a>
												</div> 
											<div class="col-sm-3 block_completed" >
													<a  href="<?php echo base_url()?>index.php/credit_manager_user/credit_sanction_loan_first_level?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
														<span class="block_font_active">2. &nbsp;Sanction Recommendation Approved</span>
													</a></div> 
											<div class="col-sm-3 block_Active" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>"><span class="block_font_active">
												<span class="block_font_active">3. &nbsp;Sanction Letter</span>
												</a>
											</div> 
											<?php
										}
										else
										{
											?>
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
													<span class="block_font_active">1. &nbsp;PD Process</span>
												</a>
												</div> 
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
												<span class="block_font_active">2. &nbsp;Sanction Recommendation</span>
													</a>
											</div> 
											<div class="col-sm-3 block_completed" ><span class="block_font_active">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
									}
									?>
					
						
				
				
				
							
		</div>
</div>
				<div class="margin-10 padding-5">
					<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
	</span>	

		
	</div>

	<?php

 if(!empty($row_sanction))
   {
   	 if(!empty($row_sanction->credit_manager_id))
   	 {
   	 	   if($CM_ID == $row_sanction->credit_manager_id) // recommended by me echo "yes"; ----------------------------------------------------------
   	 	   {
           ?>
            <div class="row" >
	<form id="credit_saction_form" action="<?= base_url('index.php/credit_manager_user/credit_manager_first_level_form')?>" method="post">
		<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
			<div class="row justify-content-center col-6">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Credit Loan Application Recommendation </span>
           	</div>
           	<div class="row justify-content-center col-3">
           		<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_Documents?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           			<button type="button" class="btn btn-success">Upload Documents </button> 
           		</a>
           	</div>
           	<?php

           		if(!empty($row_sanction))
           		{
           			 if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
    	{
										?>

										<div class="row justify-content-center col-3">
           						<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           							<button type="button" class="btn btn-success">Generate Sanction Letter</button> 
           						</a>
           					</div>
           					<?php
									}

           		}
           	?>
       
				
 						
			<div class="row">
				<div class="col-sm-12" >
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Name of the customer </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 0px;" class="col">
								<input readonly style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
									<input hidden  style="margin-top: 8px;" name="customer_ID" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->UNIQUE_CODE;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Application ID</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  		<input readonly style="margin-top: 8px;" name="application_number"  class="form-control" type="text" value="<?php echo $data_row_applied_loan->Application_id;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Type</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Amount</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly style="margin-top: 8px;" name="loan_amount"  class="form-control" type="text" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_loan_amount;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Tenure</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly  name="tenure" class="form-control" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_tenure;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">ROI</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_amount"  step="any" class="form-control" type="text" value="<?php  if(!empty($credit_analysis_data->final_roi)) echo $credit_analysis_data->final_roi;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Income Assessed</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  style="margin-top: 8px;" name="income_assessed"  class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->income_assessed; 	?>" type="number" oninput="maxLengthCheck(this)"  onchange="Calculate()" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommended by</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" placeholder="Recommended by" name="recommended_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
		  				    </div>
		  				</div>
		  	<hr>
		  		
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Loan Amount *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required placeholder="Final Loan Amount" name="final_loan_amount" id="final_loan_amount" class="form-control" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
		  				    </div>
		  				</div>
		  						<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Tenure *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required style="margin-top: 8px;"id="months"  name="final_tenure" id="final_tenure" placeholder="Final Tenure" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)" onchange="Calculate()">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final ROI in % *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  required placeholder="ROI" name="roi" class="form-control" id="final_roi"  step="any" id="rate" value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>" type="number"  onchange="Calculate()">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final EMI </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  name="EMI" class="form-control"  id="EMI" step="any" type="number" value="<?php if(isset($row_sanction)) echo $row_sanction->EMI;?>" >
		  				    </div>
		  				</div>

	<!----------------------------------------------------------------------------------------- -->

		  					<div class="col-sm-12">
		  							<div style=" margin-top: 20px;margin-left:54px; " class="col">
		  								<h4>Collateral Details</h4><hr>
		  						</div>
		  				</div>
		  
               <?php 


                 if($data_row_applied_loan->LOAN_TYPE != 'lap')
                 {
                 	?>
                 	<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Agreement/ Land Value </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  class="form-control" type="number" name="Agreement_value"  value="<?php if(isset($row_sanction)) echo $row_sanction->Agreement_value; else if(!empty($row_more)){echo $row_more->Agreement_value;}?>">
		  				    </div>
		  				</div>

                 	<?php
                 }


              ?>
		  				
		  			

		  					  			<div class="col-sm-12"><br></div>
						  <div class="col-sm-12" style="padding:10px;">
						  	  <table class="table table-bordered" id="data_table">
									<tr>
										<th><label class="class_bold">Address Of Property</label></th>
										<th><label class="class_bold">Total Value Of The Property</label></th>
										<th><label class="class_bold">LTV %</label></th>
									</tr>
									<tr>
										<td>
											<label class="class_bold">
												<input style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="PROP_ADD_LINE"  id="PROP_ADD_LINE_1" value="<?php if(isset($row_sanction)) echo $row_sanction->PROP_ADD_LINE; else if(!empty($data_row_applied_loan)) {echo $data_row_applied_loan->PROP_ADD_LINE_1;echo $data_row_applied_loan->PROP_ADD_LINE_2; echo $data_row_applied_loan->PROP_ADD_LINE_3;}?>">
											</label>
										</td>
										<td>
											<label class="class_bold">	
												<input  class="form-control" type="number" name="Total_Value_of_property" id="Total_Value_of_property"  value="<?php  if(isset($row_sanction)) echo $row_sanction->Total_Value_of_property; else if(!empty($row_more)){echo $row_more->Total_Value;}?>">
											</label>
										</td>
										<td>
											<label class="class_bold">
													<input   class="form-control" type="number" name="LTV" id="LTV"  step="any" value="<?php if(!empty($row_sanction)){echo $row_sanction->LTV;}?>">
											</label>
										</td>
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

							<!------------------------------------------------------------------------------------------ -->


							<!------------------------------------------------------------------------------------------ -->
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Product *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Product" class="form-control" type="text" name="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Program *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Program" name="program" class="form-control" type="text"  value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
		  				    </div>
		  				</div>
		  				
						
		  				</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" >
				<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Eligibility *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input required placeholder="Eligibility" class="form-control"  name="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Approval Remark *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input type="text" name="approval_remark" id="Approval_Remark" style="font-family:sans-serif;font-size:1.2em;" class="form-control" maxlength = "500" value="<?php if(isset($row_sanction)) echo $row_sanction->approval_remark;?>">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Application Status *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="loan_status" id="loan_status" required style=" margin-top: 9px;" >
							    <option value="">Select</option>
								<option value="Recommended" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Recommended') echo ' selected="selected"'; ?>>Recommend</option>
								<option value="Rejected" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Rejected') echo ' selected="selected"'; ?>>Reject</option>
						    </select>
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Send Recommendation To </span>
						</div>
						
					
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="recommended_to" id="recommended_to" required style=" margin-top: 9px;" >
								<?php
									foreach ($get_cluster_manager_name_list as $value) {
										?>
										<option value="<?php echo $value->UNIQUE_CODE;?>"><?php echo $value->FN." ".$value->LN;?></option>
										<?php
									}
								?>
						    </select>
			  		    </div>
			  		</div>

		  				<div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Case Details</h4><hr>
		  						</div>
		  				</div>

		  				<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Add Case Details</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<textarea required  row="50" class="form-control"  name="case_details" ><?php if(isset($row_sanction)) echo $row_sanction->case_details;?></textarea>
			  		    </div>
			  		</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Deviation Details</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="Deviation_details" ><?php if(!empty($row_sanction->Deviation_details)) echo $row_sanction->Deviation_details;?></textarea>
			  		    </div>
			  			</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">End Use Of Loan</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="End_use_of_loan" ><?php if(!empty($row_sanction->End_use_of_loan)) echo $row_sanction->End_use_of_loan;?></textarea>
			  		    </div>
			  			</div>
			  
			  	<?php



							if(!empty($row_sanction))
								{
									if($row_sanction->Recommendation_status == 'Reverted')
									{
										?>
											<div class="col-sm-6">
									  			<div style=" margin-top: 8px;" class="col">
									  				<span class="align-middle dot-light-theme"></span> 
														<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Cluster Credit Manager Comments</span>
													</div>
													<div class="w-100"></div>
														<div style="margin-left: 35px;  margin-top: 8px;" class="col">
															<input  class="form-control"  name="Cluster_manager_Comments" id="Cluster_manager_Comments"  value="<?php if(isset($row_sanction)) echo $row_sanction->Cluster_manager_Comments;?>" type="text" >
										  		  </div>
									  		</div>
										<?php
									}
								}
						?>
			</div>
				</div>
		</div>
				<?php

					if(!empty($row_sanction))
					{
						if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Credit Manager')
						{
			      ?>
     
				    	<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Sent to <?php echo $row_sanction->Recommendation_status_added_by;?> For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    	<?php
				     
				    	}
				    	else if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Approved by <?php echo $row_sanction->Recommendation_status_added_by;?> And Sent To Admin For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    		<?php
				    	}
				    	else if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div>
							   <h5>Recommendation Approved by Admin</h5> 
									 
								</div>		
							</div>
							<br><br><br>
					    		<?php
					    	}
					    	else if($row_sanction->Recommendation_status == 'approved')
								{
									?>
								<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div >
							   <h5>Recommendation Approved </h5>
									 
								</div>		
							</div>
							<br><br><br>
									<?php
								}
									else if($row_sanction->Recommendation_status == 'Reverted' &&  $row_sanction->Recommendation_status_added_by == 'Admin')
								{
									?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div>
								   <h5>Reverted by Admin to Cluster Credit Manager</h5> 
										 
									</div>		
								</div>
								<br><br><br>
									<?php
								}
								else if($row_sanction->Recommendation_status == 'Reverted' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
								{
									?>
									<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
										<?php
									}

										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
									{
										?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div >
								   <h5>	Rejected By <?php echo $row_sanction->Recommendation_status_added_by;?></h5>
									</div>		
								</div>
								<br><br><br>
										<?php
									}
										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Admin')
									{
									?>
										<div style="margin-top: 20px;color:red;" class="row col-12 justify-content-center">
										<div >
									   <h5>	Rejected By Admin</h5>
										</div>		
									</div>
									<br><br><br>
									<?php
								}
					    	else
					    	{
					    		?>
					    	<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
					    	<?php
					    	}

							}
					    else
					    {
					    	?>
					    	<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;"  name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
					    	<?php
					    }

					?>
				</h4>
			</form>
		</div>
	</main>
</div>

</div>
</div>
           <?php
   	 	   }
   	 	   else //  //recommended by someone else echo "no";------------------------------------------------------------------------------------------
   	 	   {
   	 	   	 ?>
   	 	   	  <div class="row" >
	<form id="credit_saction_form" action="<?= base_url('index.php/credit_manager_user/credit_manager_first_level_form')?>" method="post">
		<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
			<div class="row justify-content-center col-8">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Credit Loan Application Recommendation Submitted By <?php echo  $row_sanction->recommended_by; ?></span>
           	</div>
           	<div class="row justify-content-center col-3">
           		<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_Documents?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           			<button type="button" class="btn btn-success">View Documents </button> 
           		</a>
           	</div>
           	<?php

           		if(!empty($row_sanction))
           		{
           			 if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
    	{
										?>

										<div class="row justify-content-center col-3">
           						<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           							<button type="button" class="btn btn-success">Generate Sanction Letter</button> 
           						</a>
           					</div>
           					<?php
									}

           		}
           	?>
       
				
 						
			<div class="row">
				<div class="col-sm-12" >
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Name of the customer </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 0px;" class="col">
								<input  style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
									<input hidden  style="margin-top: 8px;" name="customer_ID" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->UNIQUE_CODE;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Application ID</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  		<input readonly style="margin-top: 8px;" name="application_number"  class="form-control" type="text" value="<?php echo $data_row_applied_loan->Application_id;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Type</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Amount</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly style="margin-top: 8px;" name="loan_amount"  class="form-control" type="text" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_loan_amount;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Tenure</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly  name="tenure" class="form-control" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_tenure;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">ROI</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_amount"   class="form-control" step="any" type="number" value="<?php  if(!empty($credit_analysis_data->final_roi)) echo $credit_analysis_data->final_roi;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Income Assessed</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  style="margin-top: 8px;" name="income_assessed"  class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->income_assessed; 
									?>" type="number" oninput="maxLengthCheck(this)"  onchange="Calculate()" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommended by</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" placeholder="Recommended by" name="recommended_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
		  				    </div>
		  				</div>
		  	<hr>
		  					
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Loan Amount *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required placeholder="Final Loan Amount" name="final_loan_amount" id="final_loan_amount" class="form-control" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Tenure *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required style="margin-top: 8px;"  name="final_tenure" id="final_tenure" placeholder="Final Tenure" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>" type="number">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final ROI *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  required placeholder="ROI" name="roi" class="form-control"  id="roi" value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)" onchange="Calculate()">
		  				    </div>
		  				</div>
		  					<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final EMI </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  name="EMI" class="form-control"  id="EMI" step="any"  type="number" value="<?php if(isset($row_sanction)) echo $row_sanction->EMI;?>" >
		  				    </div>
		  				</div>
<!----------------------------------------------------------------------------------------- -->

		  					<div class="col-sm-12">
		  							<div style=" margin-top: 20px;margin-left:54px; " class="col">
		  								<h4>Collateral Details</h4><hr>
		  						</div>
		  				</div>
		 				
               <?php 


                 if($data_row_applied_loan->LOAN_TYPE != 'lap')
                 {
                 	?>
                 	<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Agreement/ Land Value </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  class="form-control" type="number" name="Agreement_value"  value="<?php if(isset($row_sanction)) echo $row_sanction->Agreement_value; else if(!empty($row_more)){echo $row_more->Agreement_value;}?>">
		  				    </div>
		  				</div>

                 	<?php
                 }


              ?>
		  				
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">LTV %</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						</div>
		  				</div>



		  					  			<div class="col-sm-12"><br></div>
						  <div class="col-sm-12" style="padding:10px;">
						  	  <table class="table table-bordered" id="data_table">
									<tr>
										<th><label class="class_bold">Address Of Property</label></th>
										<th><label class="class_bold">Total Value Of The Property</label></th>
										<th><label class="class_bold">LTV %</label></th>
									</tr>
										<tr>
										<td><label>	<input style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="PROP_ADD_LINE"  id="PROP_ADD_LINE_1" value="<?php if(isset($row_sanction)) echo $row_sanction->PROP_ADD_LINE; else if(!empty($data_row_applied_loan)) {echo $data_row_applied_loan->PROP_ADD_LINE_1;echo $data_row_applied_loan->PROP_ADD_LINE_2; echo $data_row_applied_loan->PROP_ADD_LINE_3;}?>"></label></td>
										<td><label><input  class="form-control" type="number" name="Total_Value_of_property" id="Total_Value_of_property"  value="<?php  if(isset($row_sanction)) echo $row_sanction->Total_Value_of_property; else if(!empty($row_more)){echo $row_more->Total_Value;}?>"></label></td>
										<td><label>		<input   class="form-control" type="number" name="LTV" id="LTV" step="any"  value="<?php if(!empty($row_sanction)){echo $row_sanction->LTV;}?>"></label></td>
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
						
								</table>
							</div>
		  			<!--------------------------------------------------------------------------------- -->
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Product *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  required placeholder="Product" class="form-control" type="text" name="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Program *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  required placeholder="Program" name="program" class="form-control" type="text"  value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
		  				    </div>
		  				</div>
		  				
						
		  				</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" >
				<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Eligibility *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  required placeholder="Eligibility" class="form-control"  name="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Approval Remark *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  type="text" name="approval_remark" id="Approval_Remark" style="font-family:sans-serif;font-size:1.2em;" class="form-control" maxlength = "500" value="<?php if(isset($row_sanction)) echo $row_sanction->approval_remark;?>">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Application Status *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="loan_status" id="loan_status" required style=" margin-top: 9px;" >
							    <option value="">Select</option>
								<option value="Recommended" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Recommended') echo ' selected="selected"'; ?>>Recommend</option>
								<!--<option value="hold" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'hold') echo ' selected="selected"'; ?>>On Hold</option>
						   		<option value="in_progress" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'in_progress') echo ' selected="selected"'; ?>>In Progress</option>-->
								<option value="Rejected" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Rejected') echo ' selected="selected"'; ?>>Reject</option>
						    </select>
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Send Recommendation To </span>
						</div>
						
					
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="recommended_to" id="recommended_to" required style=" margin-top: 9px;" >
								<?php
									foreach ($get_cluster_manager_name_list as $value) {
										?>
										<option value="<?php echo $value->UNIQUE_CODE;?>"><?php echo $value->FN." ".$value->LN;?></option>
										<?php
									}
								?>
						    </select>
			  		    </div>
			  		</div>
			  			<div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Case Details</h4><hr>
		  						</div>
		  				</div>

		  						<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Add Case Details</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<textarea required  row="50" class="form-control"  name="case_details" ><?php if(isset($row_sanction)) echo $row_sanction->case_details;?></textarea>
			  		    </div>
			  		</div>


			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Deviation Details</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="Deviation_details" ><?php if(!empty($row_sanction->Deviation_details)) echo $row_sanction->Deviation_details;?></textarea>
			  		    </div>
			  			</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">End Use Of Loan</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="End_use_of_loan" ><?php if(!empty($row_sanction->End_use_of_loan)) echo $row_sanction->End_use_of_loan;?></textarea>
			  		    </div>
			  			</div>
			  
			  	<?php



							if(!empty($row_sanction))
								{
									if($row_sanction->Recommendation_status == 'Reverted')
									{
										?>
											<div class="col-sm-6">
									  			<div style=" margin-top: 8px;" class="col">
									  				<span class="align-middle dot-light-theme"></span> 
														<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Cluster Credit Manager Comments</span>
													</div>
													<div class="w-100"></div>
														<div style="margin-left: 35px;  margin-top: 8px;" class="col">
															<input  class="form-control"  name="Cluster_manager_Comments" id="Cluster_manager_Comments"  value="<?php if(isset($row_sanction)) echo $row_sanction->Cluster_manager_Comments;?>" type="text" readonly >
										  		  </div>
									  		</div>
										<?php
									}
								}
						?>
			</div>
				</div>
		</div>
				<?php

					if(!empty($row_sanction))
					{
						if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Credit Manager')
						{
			      ?>
     
				    	<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Sent to <?php echo $row_sanction->Recommendation_status_added_by;?> For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    	<?php
				     
				    	}
				    	else if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Approved by <?php echo $row_sanction->Recommendation_status_added_by;?> And Sent To Admin For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    		<?php
				    	}
				    	else if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div>
							   <h5>Recommendation Approved by Admin</h5> 
									 
								</div>		
							</div>
							<br><br><br>
					    		<?php
					    	}
					    	else if($row_sanction->Recommendation_status == 'approved')
								{
									?>
								<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div >
							   <h5>Recommendation Approved </h5>
									 
								</div>		
							</div>
							<br><br><br>
									<?php
								}
									else if($row_sanction->Recommendation_status == 'Reverted' &&  $row_sanction->Recommendation_status_added_by == 'Admin')
								{
									?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div>
								   <h5>Reverted by Admin to Cluster Credit Manager</h5> 
										 
									</div>		
								</div>
								<br><br><br>
									<?php
								}
								else if($row_sanction->Recommendation_status == 'Reverted' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
								{
									?>
									<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
									
										<?php
									}

										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
									{
										?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div >
								   <h5>	Rejected By <?php echo $row_sanction->Recommendation_status_added_by;?></h5>
									</div>		
								</div>
								<br><br><br>
										<?php
									}
										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Admin')
									{
									?>
										<div style="margin-top: 20px;color:red;" class="row col-12 justify-content-center">
										<div >
									   <h5>	Rejected By Admin</h5>
										</div>		
									</div>
									<br><br><br>
									<?php
								}
					    	else
					    	{
					    		?>
					    	
					    	<?php
					    	}

							}
					    else
					    {
					    	?>
					    	
					    	<?php
					    }

					?>
				</h4>
			</form>
		</div>
	</main>
</div>

</div>
</div>
   	 	   	 <?php
   	 	   }
   	 }
   	 else // no one has recommended yet echo "no"; ------------------------------------------------------------------------------------------------
   	 {
   	 	?>
   	 	 <div class="row" >
	<form id="credit_saction_form" action="<?= base_url('index.php/credit_manager_user/credit_manager_first_level_form')?>" method="post">
		<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
			<div class="row justify-content-center col-6">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Credit Loan Application Recommendation </span>
           	</div>
           	<div class="row justify-content-center col-3">
           		<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_Documents?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           			<button type="button" class="btn btn-success">Upload Documents </button> 
           		</a>
           	</div>
           	<?php

           		if(!empty($row_sanction))
           		{
           			 if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
    	{
										?>

										<div class="row justify-content-center col-3">
           						<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           							<button type="button" class="btn btn-success">Generate Sanction Letter</button> 
           						</a>
           					</div>
           					<?php
									}

           		}
           	?>
       
				
 						
			<div class="row">
				<div class="col-sm-12" >
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Name of the customer</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 0px;" class="col">
								<input readonly style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
									<input hidden  style="margin-top: 8px;" name="customer_ID" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->UNIQUE_CODE;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Application ID</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  		<input readonly style="margin-top: 8px;" name="application_number"  class="form-control" type="text" value="<?php echo $data_row_applied_loan->Application_id;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Type</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Amount</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly style="margin-top: 8px;" name="loan_amount"  class="form-control" type="text" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_loan_amount;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Tenure</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly  name="tenure" class="form-control" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_tenure;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">ROI</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_amount"   class="form-control" step="any" type="number" value="<?php  if(!empty($credit_analysis_data->final_roi)) echo $credit_analysis_data->final_roi;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Income Assessed</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input  style="margin-top: 8px;" name="income_assessed"  class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->income_assessed; 	?>" type="number" oninput="maxLengthCheck(this)"  onchange="Calculate()" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommended by</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" placeholder="Recommended by" name="recommended_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
		  				    </div>
		  				</div>
		  			 	<hr>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Tenure *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required style="margin-top: 8px;"id="months"  name="final_tenure" placeholder="Final Tenure" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)" onchange="Calculate()">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Loan Amount *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required placeholder="Final Loan Amount" name="final_loan_amount" id="amount" class="form-control" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final ROI *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  required placeholder="ROI" name="roi" class="form-control"  id="rate" value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>" type="number" step="any" onchange="Calculate()">
		  				    </div>
		  				</div>

		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Product *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Product" class="form-control" type="text" name="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Program *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Program" name="program" class="form-control" type="text"  value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
		  				    </div>
		  				</div>
		  				
						
		  				</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" >
				<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Eligibility *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input required placeholder="Eligibility" class="form-control"  name="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Approval Remark *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input type="text" name="approval_remark" id="Approval_Remark" style="font-family:sans-serif;font-size:1.2em;" class="form-control" maxlength = "500" value="<?php if(isset($row_sanction)) echo $row_sanction->approval_remark;?>">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Application Status *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="loan_status" id="loan_status" required style=" margin-top: 9px;" >
							    <option value="">Select</option>
								<option value="Recommended" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Recommended') echo ' selected="selected"'; ?>>Recommend</option>
								<option value="Rejected" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Rejected') echo ' selected="selected"'; ?>>Reject</option>
						    </select>
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Send Recommendation To </span>
						</div>
						
					
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="recommended_to" id="recommended_to" required style=" margin-top: 9px;" >
								<?php
									foreach ($get_cluster_manager_name_list as $value) {
										?>
										<option value="<?php echo $value->UNIQUE_CODE;?>"><?php echo $value->FN." ".$value->LN;?></option>
										<?php
									}
								?>
						    </select>
			  		    </div>
			  		</div>
			  <div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Case Details</h4><hr>
		  						</div>
		  				</div>

		  				<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Add Case Details</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<textarea required  row="50" class="form-control"  name="case_details" ><?php if(isset($row_sanction)) echo $row_sanction->case_details;?></textarea>
			  		    </div>
			  		</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Deviation Details</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="Deviation_details" ><?php if(!empty($row_sanction->Deviation_details)) echo $row_sanction->Deviation_details;?></textarea>
			  		    </div>
			  			</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">End Use Of Loan</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="End_use_of_loan" ><?php if(!empty($row_sanction->End_use_of_loan)) echo $row_sanction->End_use_of_loan;?></textarea>
			  		    </div>
			  			</div>
			  	<?php



							if(!empty($row_sanction))
								{
									if($row_sanction->Recommendation_status == 'Reverted')
									{
										?>
											<div class="col-sm-6">
									  			<div style=" margin-top: 8px;" class="col">
									  				<span class="align-middle dot-light-theme"></span> 
														<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Cluster Credit Manager Comments</span>
													</div>
													<div class="w-100"></div>
														<div style="margin-left: 35px;  margin-top: 8px;" class="col">
															<input  class="form-control"  name="Cluster_manager_Comments" id="Cluster_manager_Comments"  value="<?php if(isset($row_sanction)) echo $row_sanction->Cluster_manager_Comments;?>" type="text" >
										  		  </div>
									  		</div>
										<?php
									}
								}
						?>
			</div>
				</div>
		</div>
				<?php

					if(!empty($row_sanction))
					{
						if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Credit Manager')
						{
			      ?>
     
				    	<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Sent to <?php echo $row_sanction->Recommendation_status_added_by;?> For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    	<?php
				     
				    	}
				    	else if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Approved by <?php echo $row_sanction->Recommendation_status_added_by;?> And Sent To Admin For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    		<?php
				    	}
				    	else if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div>
							   <h5>Recommendation Approved by Admin</h5> 
									 
								</div>		
							</div>
							<br><br><br>
					    		<?php
					    	}
					    	else if($row_sanction->Recommendation_status == 'approved')
								{
									?>
								<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div >
							   <h5>Recommendation Approved </h5>
									 
								</div>		
							</div>
							<br><br><br>
									<?php
								}
									else if($row_sanction->Recommendation_status == 'Reverted' &&  $row_sanction->Recommendation_status_added_by == 'Admin')
								{
									?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div>
								   <h5>Reverted by Admin to Cluster Credit Manager</h5> 
										 
									</div>		
								</div>
								<br><br><br>
									<?php
								}
								else if($row_sanction->Recommendation_status == 'Reverted' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
								{
									?>
									<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
										<?php
									}

										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
									{
										?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div >
								   <h5>	Rejected By <?php echo $row_sanction->Recommendation_status_added_by;?></h5>
									</div>		
								</div>
								<br><br><br>
										<?php
									}
										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Admin')
									{
									?>
										<div style="margin-top: 20px;color:red;" class="row col-12 justify-content-center">
										<div >
									   <h5>	Rejected By Admin</h5>
										</div>		
									</div>
									<br><br><br>
									<?php
								}
					    	else
					    	{
					    		?>
					    	<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
					    	<?php
					    	}

							}
					    else
					    {
					    	?>
					    	<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;"  name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
					    	<?php
					    }

					?>
				</h4>
			</form>
		</div>
	</main>
</div>

</div>
</div>
   	 	<?php
   	 	
   	 }
   }
   else
   {
   	?>
   	 <div class="row" >
	<form id="credit_saction_form" action="<?= base_url('index.php/credit_manager_user/credit_manager_first_level_form')?>" method="post">
		<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
			<div class="row justify-content-center col-6">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Credit Loan Application Recommendation </span>
           	</div>
           	<div class="row justify-content-center col-3">
           		<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_Documents?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           			<button type="button" class="btn btn-success">Upload Documents </button> 
           		</a>
           	</div>
           	<?php

           		if(!empty($row_sanction))
           		{
           			 if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
    	{
										?>

										<div class="row justify-content-center col-3">
           						<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
           							<button type="button" class="btn btn-success">Generate Sanction Letter</button> 
           						</a>
           					</div>
           					<?php
									}

           		}
           	?>
       
				
 						
			<div class="row">
				<div class="col-sm-12" >
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Name of the customer</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px; margin-top: 0px;" class="col">
								<input readonly style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
									<input hidden  style="margin-top: 8px;" name="customer_ID" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->UNIQUE_CODE;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Application ID</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  		<input readonly style="margin-top: 8px;" name="application_number"  class="form-control" type="text" value="<?php echo $data_row_applied_loan->Application_id;?>">
		  					</div>
						</div>
						<div class="col-sm-3">
							<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Type</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Required Loan Amount</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly style="margin-top: 8px;" name="loan_amount"  class="form-control" type="text" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_loan_amount;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
								<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Tenure</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly  name="tenure" class="form-control" value="<?php if(!empty($credit_analysis_data->final_tenure))echo $credit_analysis_data->final_tenure;?>">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">ROI</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" name="loan_amount"   class="form-control" step="any" type="number" value="<?php  if(!empty($credit_analysis_data->final_roi)) echo $credit_analysis_data->final_roi;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Income Assessed</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  style="margin-top: 8px;" name="income_assessed"  class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->income_assessed; ?>" type="number" oninput="maxLengthCheck(this)"  onchange="Calculate()" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommended by</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input readonly style="margin-top: 8px;" placeholder="Recommended by" name="recommended_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
		  				    </div>
		  				</div>
		  		 		<div class="col-sm-12" style="margin-top:8px;"></div>
               
		  			
                  
		  				<div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Final Loan Details</h4><hr>
		  						</div>
		  				</div>

	           <div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Loan Amount *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required placeholder="Final Loan Amount" name="final_loan_amount" id="final_loan_amount" class="form-control" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Tenure In Months*</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input required style="margin-top: 8px;"id="final_tenure"  name="final_tenure" placeholder="Final Tenure" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)" onchange="Calculate()">
		  				    </div>
		  				</div>
		  			<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final ROI *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  required placeholder="ROI" name="roi" class="form-control"  id="final_roi" value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>" type="number" step="any" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final EMI </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input  name="EMI" class="form-control"  id="EMI"  step="any" type="number" value="<?php if(isset($row_sanction)) echo $row_sanction->EMI;?>" >
		  				    </div>
		  				</div>
		  				
		        
		         
		  					<div class="col-sm-12">
		  							<div style=" margin-top: 20px;margin-left:54px; " class="col">
		  								<h4>Collateral Details</h4><hr>
		  						</div>
		  				</div>
		  		
		  	
               <?php 


                 if($data_row_applied_loan->LOAN_TYPE != 'lap')
                 {
                 	?>
                 	<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Agreement/ Land Value </span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
								<input  class="form-control" type="number" name="Agreement_value"  value="<?php if(isset($row_sanction)) echo $row_sanction->Agreement_value; else if(!empty($row_more)){echo $row_more->Agreement_value;}?>">
		  				    </div>
		  				</div>

                 	<?php
                 }


              ?>
		  	

		  					  			<div class="col-sm-12"><br></div>
						  <div class="col-sm-12" style="padding:10px;">
						  	  <table class="table table-bordered" id="data_table">
									<tr>
										<th><label class="class_bold">Address Of Property</label></th>
										<th><label class="class_bold">Total Value Of The Property</label></th>
										<th><label class="class_bold">LTV %</label></th>
									</tr>
									<tr>
										<th><label class="class_bold">		<input style="margin-top: 1px;" placeholder="Address Line 1 *" class="form-control" type="text" name="PROP_ADD_LINE"  id="PROP_ADD_LINE_1" value="<?php if(isset($row_sanction)) echo $row_sanction->PROP_ADD_LINE; else if(!empty($data_row_applied_loan)) {echo $data_row_applied_loan->PROP_ADD_LINE_1;echo $data_row_applied_loan->PROP_ADD_LINE_2; echo $data_row_applied_loan->PROP_ADD_LINE_3;}?>"></label></th>
										<th><label class="class_bold">	<input  class="form-control" type="number" name="Total_Value_of_property" id="Total_Value_of_property"  value="<?php  if(isset($row_sanction)) echo $row_sanction->Total_Value_of_property; else if(!empty($row_more)){echo $row_more->Total_Value;}?>"></label></th>
										<th><label class="class_bold">	<input   class="form-control" type="number" name="LTV" id="LTV" step="any"  value="<?php if(!empty($row_sanction)){echo $row_sanction->LTV;}?>"></label></th>
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
							
					
								</table>
							</div>

		  			<div class="col-sm-3"></div>


							<!------------------------------------------------------------------------------------------ -->

		  				<div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Other Details</h4><hr>
		  						</div>
		  				</div>

		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Product *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Product" class="form-control" type="text" name="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?>" >
		  				    </div>
		  				</div>
		  				<div class="col-sm-3">
		  					<div style=" margin-top: 8px;" class="col">
		  						<span class="align-middle dot-light-theme"></span> 
								<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Program *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<input required placeholder="Program" name="program" class="form-control" type="text"  value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
		  				    </div>
		  				</div>
		  					<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Eligibility *</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input required placeholder="Eligibility" class="form-control"  name="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
			  		    </div>
			  		</div>
						<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Approval Remark *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input type="text" name="approval_remark" id="Approval_Remark" style="font-family:sans-serif;font-size:1.2em;" class="form-control" maxlength = "500" value="<?php if(isset($row_sanction)) echo $row_sanction->approval_remark;?>">
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Application Status *</span>
						</div>
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="loan_status" id="loan_status" required style=" margin-top: 9px;" >
							    <option value="">Select</option>
								<option value="Recommended" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Recommended') echo ' selected="selected"'; ?>>Recommend</option>
								<option value="Rejected" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'Rejected') echo ' selected="selected"'; ?>>Reject</option>
						    </select>
			  		    </div>
			  		</div>
			  		<div class="col-sm-3">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Send Recommendation To </span>
						</div>
						
					
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<select class="form-control" name="recommended_to" id="recommended_to" required style=" margin-top: 9px;" >
								<?php
									foreach ($get_cluster_manager_name_list as $value) {
										?>
										<option value="<?php echo $value->UNIQUE_CODE;?>"><?php echo $value->FN." ".$value->LN;?></option>
										<?php
									}
								?>
						    </select>
			  		    </div>
			  		</div>


		  				<div class="col-sm-12">
		  							<div style=" margin-top: 18px;margin-left:54px; " class="col">
		  								<h4>Case Details</h4><hr>
		  						</div>
		  				</div>

		  				<div class="col-sm-12">
			  			<div style=" margin-top: 8px;" class="col">
			  				<span class="align-middle dot-light-theme"></span> 
							<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Add Case Details</span>
							</div>
							<div class="w-100"></div>
							<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<textarea required  row="50" class="form-control"  name="case_details" ><?php if(isset($row_sanction)) echo $row_sanction->case_details;?></textarea>
			  		    </div>
			  		</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Deviation Details</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="Deviation_details" ><?php if(!empty($row_sanction->Deviation_details)) echo $row_sanction->Deviation_details;?></textarea>
			  		    </div>
			  			</div>

			  			<div class="col-sm-12">
			  				<div style=" margin-top: 8px;" class="col">
			  					<span class="align-middle dot-light-theme"></span> 
									<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">End Use Of Loan</span>
								</div>
								<div class="w-100"></div>
								<div style="margin-left: 35px;  margin-top: 8px;" class="col">
									<textarea required  row="6" class="form-control"  name="End_use_of_loan" ><?php if(!empty($row_sanction->End_use_of_loan)) echo $row_sanction->End_use_of_loan;?></textarea>
			  		    </div>
			  			</div>

		  				</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" >
				<div class="row " style="margin:15px;margin-top: 0px;padding:9px; ">
					<?php
              if(!empty($row_sanction))
								{
									if($row_sanction->Recommendation_status == 'Reverted')
									{
										?>
											<div class="col-sm-6">
									  			<div style=" margin-top: 8px;" class="col">
									  				<span class="align-middle dot-light-theme"></span> 
														<span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Cluster Credit Manager Comments</span>
													</div>
													<div class="w-100"></div>
														<div style="margin-left: 35px;  margin-top: 8px;" class="col">
															<input  class="form-control"  name="Cluster_manager_Comments" id="Cluster_manager_Comments"  value="<?php if(isset($row_sanction)) echo $row_sanction->Cluster_manager_Comments;?>" type="text" >
										  		  </div>
									  		</div>
										<?php
									}
								}
						?>
			</div>
				</div>
		</div>
				<?php

					if(!empty($row_sanction))
					{
						if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Credit Manager')
						{
			      ?>
     
				    	<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Sent to <?php echo $row_sanction->Recommendation_status_added_by;?> For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    	<?php
				     
				    	}
				    	else if($row_sanction->Recommendation_status == 'Recommended' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center" >
								<div>
							   <h5>Recommendation Approved by <?php echo $row_sanction->Recommendation_status_added_by;?> And Sent To Admin For Approval</h5> 
									 
								</div>		
							</div>
							<br><br><br>
				    		<?php
				    	}
				    	else if($row_sanction->Recommendation_status == 'Loan Recommendation Approved' && $row_sanction->Recommendation_status_added_by == 'Admin')
				    	{
				    		?>
				    		<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div>
							   <h5>Recommendation Approved by Admin</h5> 
									 
								</div>		
							</div>
							<br><br><br>
					    		<?php
					    	}
					    	else if($row_sanction->Recommendation_status == 'approved')
								{
									?>
								<div style="margin-top: 20px;color:green;" class="row col-12 justify-content-center">
								<div >
							   <h5>Recommendation Approved </h5>
									 
								</div>		
							</div>
							<br><br><br>
									<?php
								}
									else if($row_sanction->Recommendation_status == 'Reverted' &&  $row_sanction->Recommendation_status_added_by == 'Admin')
								{
									?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div>
								   <h5>Reverted by Admin to Cluster Credit Manager</h5> 
										 
									</div>		
								</div>
								<br><br><br>
									<?php
								}
								else if($row_sanction->Recommendation_status == 'Reverted' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
								{
									?>
									<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
										<?php
									}

										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Cluster Credit Manager')
									{
										?>
									<div style="margin-top: 20px;color:orange;" class="row col-12 justify-content-center">
									<div >
								   <h5>	Rejected By <?php echo $row_sanction->Recommendation_status_added_by;?></h5>
									</div>		
								</div>
								<br><br><br>
										<?php
									}
										else if($row_sanction->Recommendation_status == 'Rejected' && $row_sanction->Recommendation_status_added_by == 'Admin')
									{
									?>
										<div style="margin-top: 20px;color:red;" class="row col-12 justify-content-center">
										<div >
									   <h5>	Rejected By Admin</h5>
										</div>		
									</div>
									<br><br><br>
									<?php
								}
					    	else
					    	{
					    		?>
					    	<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;" name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
					    	<?php
					    	}

							}
					    else
					    {
					    	?>
					    	<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div >
								   	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:5px;border:none;margin-left: 51px;"  name="submit" value="submit">
											Submit
										</button></a> 
									</div>		
								</div>
								<br><br><br>
					    	<?php
					    }

					?>
				</h4>
			</form>
		</div>
	</main>
</div>

</div>
</div>
   	<?php
   }



	?>
   
<script>
    function onlyNumberKey(evt) {
         
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
		{
            alert("Please enter numeric value"); return false;
		}
		else{
        return true;
		}
    }
</script>
<script>
  function maxLengthCheck(object){
      if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
  }
</script>
 



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