
<?php
    $message = $this->session->flashdata('sucess');   if (isset($message)) {
		echo $message;
			exit;
		if($message=='sucess'){ 
			
		echo '<script> swal("success!", "Loan details status save successfully", "success");</script>';
		$this->session->unset_userdata('sucess');
	
       }
	}

    ?>
	<?php
    $message = $this->session->flashdata('error');
    if (isset($message)) {
        echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
         $this->session->unset_userdata('error');	
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
									
										<div class="container align_center"  >
											<center>
												<div class="btn-group-vertical">
												  <button type="button" class="btn btn-primary  btn-lg" onclick="new_login()">Add New Loan Details</button>
												  <button type="button" class="btn btn-primary  btn-lg" onclick="veiw_loan()">View Loan Details</button>
												  
												</div>
												</center>
											</div>
										
											<div class="container" id="new_loan" style="display:none; padding-top:10px;">
											
											<div class="row " >
												<div class="col-sm-12 text-center">
													<h3 class="text-center">Loan Disbursement Form  for<span style="color:green;"> <?php echo $row1->FN.' '.$row1->LN; ?> </h3>
												</div>
												
												
												</div>
												
												<Form action="<?php echo base_url('index.php/BranchManager/Save_Loan_Disbursed_deatils');?>" method="post"   enctype="multipart/form-data" >
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														

													</div>  
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Application No:</label>
															<input type="text" class="form-control" id="Loan_Application_No" name="Loan_Application_No" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Loan_Application_No;} ?>" required>
															
														</div>  

													</div>  
												
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														  
													</div> 	
                                                  												
											
												</div>
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Amount Sanction (in Rupees):</label>
															<input type="number" step="any" class="form-control" id="Loan_Amount_Saction" name="Loan_Amount_Saction" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Loan_Amount_Saction;} ?>">
															<input type="text" name="cust_name" value="<?php echo $row1->FN.' '.$row1->LN; ?>"  hidden>
															<input type="text" name="operational_name" value="<?php echo $row->FN.' '.$row->LN; ?>"  hidden>
														</div>  

													</div>  
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Amount Disbursed (in Rupees):</label>
															<input type="number" step="any" class="form-control" id="Loan_Amount_Disbursed" name="Loan_Amount_Disbursed" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Loan_Amount_Disbursed;} ?>">
															
														</div>  

													</div>  
												
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Tenure (In Years):</label>
															<input type="number" step="any" class="form-control"  id="Tenure" name="Tenure" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Tenure;} ?>">
														</div>  
													</div> 	
                                                  												
											
												</div>
												<div class="row">
												  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Total Processing Fees (In Percentage):</label>
															<input type="number" step="any" class="form-control" name="Processing_Fees" id="Processing_Fees" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Processing_Fees;} ?>" >
														</div>  
													</div> 	
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Rate of Interest(In Percentage):</label>
															<input type="number"  step="any" class="form-control" name="Rate_Of_Intrest" id="Rate_Of_Intrest" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Rate_Of_Intrest;} ?>">
														</div>  

													</div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Name Of Bank:</label>
														
															<select class="form-control" id="Bank_name" name="Bank_name">
															        <option value="">Select Bank Name</option>
																	
																	<?php foreach($Bank_names as $Bank_name)
																	{ ?>
																	<option value="<?php  echo $Bank_name->id;?>"   <?php if(!empty($Loan_disburst_data)){if(!empty ($Loan_disburst_data->Name_Of_Bank==$Bank_name->id)){echo 'selected'; }} ?>  ><?php echo $Bank_name->Bank_name; ?></option>
																<?php 	}
																	 ?>
															</select>
														</div>  
													</div> 	
	                                                													
													
																
											
												</div>
												<div class="row">
												 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Type:</label>
															<select class="form-control" id="Loan_Type" name="Loan_Type">
															        <option value="">Select Loan Type</option>
																	<?php if(!empty($Loan_disburst_data)){?> <option  selected value="<?php echo $Loan_disburst_data->Loan_Type?>">  <?php echo $Loan_disburst_data->Loan_Type; ?></option><?php } ?>
															</select>
																<input type="text"  class="form-control" id="lontype" name="lontype" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Loan_Type;} ?>" hidden>
														</div>  
													</div> 
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">EMI (In Rupees):</label>
															<input type="number"  step="any" class="form-control" id="EMI" name="EMI" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->EMI;} ?>">
														</div>  

													</div>  
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">EMI Start Date:</label>
															<input  class="form-control"  type="date" name="EMI_Start_Date" id="EMI_Start_Date" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->EMI_Start_Date;} ?>" >
														</div>  
													</div> 
													 				
											
												</div>
												<div class="row">
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Insurance Amount (In Rupees):</label>
															<input type="number" step="any" class="form-control" id="Insuranve_Amount" name="Insurance_Amount" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Insurance_Amount;} ?>" >
															<input type="text"  class="form-control" id="Cust_Id" name="Cust_Id" value="<?php echo $unique_code; ?>" hidden>
														</div>  
													</div>
												    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Disbursement Date:</label>
															<input  class="form-control"  type="date" name="Disbursement_date" id="Disbursement_date" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Disbursement_date;} ?>" >
														</div>  
													</div> 
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Sanction Letter:</label>
															<input  class="form-control"  type="file" name="Sanction_Letter" id="Sanction_Letter"  >
														</div>  
													</div> 
													
												</div>
												</br>
												<div class="text-center">
													<center>
													   <button type="submit" class="btn btn-primary">Submit</button>
													</center>
												</div>
											</form>
												
												
											</div>
											
										<div class="container" id="veiw_loan" style="display:none"; padding-top:10px;">
											<?php  $i=1; foreach ($Loan_disburst_datas as  $Loan_disburst_data){?>
											   
												 <button type="button" class="btn btn-success   btn-lg"  id=<?php echo $i; ?> onclick="veiw_loan_details(this)">Veiw Loan details <?php echo $i; ?></button>
											<?php $i++; } ?>
											<?php  $i=1; foreach ($Loan_disburst_datas as  $Loan_disburst_data){?>
											<div id="Loan_details_<?php echo $i; ?>" style="display:none">	
											<div class="row " >
												<div class="col-sm-12 text-center">
													<h3 class="text-center">Loan Disbursement Form  for<span style="color:green;"> <?php echo $row1->FN.' '.$row1->LN; ?> </h3>
												</div>
												
												
												</div>
												
												<Form action="<?php echo base_url('index.php/BranchManager/Save_Loan_Disbursed_deatils_update');?>" method="post">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														

													</div>  
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Application No:</label>
															<input type="text" class="form-control" id="Loan_Application_No" name="Loan_Application_No" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Loan_Application_No'];} ?>" required>
															
														</div>  

													</div>  
												
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														  
													</div> 	
                                                  												
											
												</div>
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Amount Sanction (in Rupees):</label>
															<input type="number" step="any" class="form-control" id="Loan_Amount_Saction" name="Loan_Amount_Saction" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Loan_Amount_Saction'];} ?>">
															<input type="text" name="cust_name" value="<?php echo $row1->FN.' '.$row1->LN; ?>"  hidden>
														</div>  

													</div>  
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Amount Disbursed (in Rupees):</label>
															<input type="number" step="any" class="form-control" id="Loan_Amount_Disbursed" name="Loan_Amount_Disbursed" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Loan_Amount_Disbursed'];} ?>">
															
														</div>  

													</div>  
												
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Tenure (In Years):</label>
															<input type="number" step="any" class="form-control"  id="Tenure" name="Tenure" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Tenure'];} ?>">
														</div>  
													</div> 	
                                                  												
											
												</div>
												<div class="row">
												  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Total Processing Fees (In Percentage):</label>
															<input type="number" step="any" class="form-control" name="Processing_Fees" id="Processing_Fees" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Processing_Fees'];} ?>" >
														</div>  
													</div> 	
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Rate of Interest(In Percentage):</label>
															<input type="number"  step="any" class="form-control" name="Rate_Of_Intrest" id="Rate_Of_Intrest" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Rate_Of_Intrest'];} ?>">
														</div>  

													</div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Name Of Bank:</label>
														
															<select class="form-control" id="Bank_name" name="Bank_name">
															        <option value="">Select Bank Name</option>
																	
																	<?php foreach($Bank_names as $Bank_name)
																	{ ?>
																	<option value="<?php  echo $Bank_name->id;?>"   <?php if(!empty($Loan_disburst_data)){if(!empty ($Loan_disburst_data['Name_Of_Bank']==$Bank_name->id)){echo 'selected'; }} ?>  ><?php echo $Bank_name->Bank_name; ?></option>
																<?php 	}
																	 ?>
															</select>
														</div>  
													</div> 	
	                                                													
													
																
											
												</div>
												<div class="row">
												 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Type:</label>
															<select class="form-control" id="Loan_Type" name="Loan_Type">
															        <option value="">Select Loan Type</option>
																	<?php if(!empty($Loan_disburst_data)){?> <option  selected value="<?php echo $Loan_disburst_data['Loan_Type']?>">  <?php echo $Loan_disburst_data['Loan_Type']; ?></option><?php } ?>
															</select>
																<input type="text"  class="form-control" id="lontype" name="lontype" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Loan_Type'];} ?>" hidden>
														</div>  
													</div> 
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">EMI (In Rupees):</label>
															<input type="number"  step="any" class="form-control" id="EMI" name="EMI" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['EMI'];} ?>">
														</div>  

													</div>  
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">EMI Start Date:</label>
															<input  class="form-control"  type="date" name="EMI_Start_Date" id="EMI_Start_Date" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['EMI_Start_Date'];} ?>" >
														</div>  
													</div> 
													 				
											
												</div>
												<div class="row">
												<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Insurance Amount (In Rupees):</label>
															<input type="number" step="any" class="form-control" id="Insuranve_Amount" name="Insurance_Amount" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Insurance_Amount'];} ?>" >
															<input type="text"  class="form-control" id="Cust_Id" name="Cust_Id" value="<?php echo $unique_code; ?>" hidden>
															<input type="text"  class="form-control" id="Cust_Id" name="Id" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['id'];} ?>" hidden>
														</div>  
													</div>
												    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Disbursement Date:</label>
															<input  class="form-control"  type="date" name="Disbursement_date" id="Disbursement_date" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Disbursement_date'];} ?>" >
														</div>  
													</div> 
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Sanction Letter:</label>
															<?php if($Loan_disburst_data['doc_cloud_name'] != '') { ?>  <button type="button" class="btn btn-success   btn-lg"  ><a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $Loan_disburst_data['doc_cloud_name']; ?>" target='_blank' >View</a> <?php } ?> </button>
															
														</div>  
													</div> 
													
													
												</div>
												<div class="row">
												 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Comment</label>
															<input  class="form-control"  type="text"  id="comment" name="comment" >
                                                            <input type="text" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['status'];} ?>" name="status" hidden>
														    <input type="text" name="submited_id" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data['Submitted_id'];} ?>" hidden >
														</div>  
													</div> 
												</div>
												
												</br>
												<div class="row">
												<table class="table table-bordered" id="data_table2">
													
														<tr>
														<th><label class="class_bold">Past Disbursement Amount</label></th>
														<th><label class="class_bold">Past Disbursement Date</label></th>
														<th><label class="class_bold">Action</label></th>
														
													</tr>
													</tr>
											
													   <?php 
													      	$reference_array_2=array();													   
													     
														 if(!empty($Loan_disburst_data['past_disbursment_details']))
														 {
															  
															$reference_array_2=json_decode($Loan_disburst_data['past_disbursment_details']);
														     
																
															if(!empty($reference_array_2))
															{
																
															foreach($reference_array_2 as $value) 
															{
																
															
															  ?>
															 
															 <tr>
															               <td><input class = "form-control" type="text" id="Name" name="Name[]" value="<?php if(isset($value->past_disbursment)) {echo $value->past_disbursment;}?>"></td>
														                   <td><input class = "form-control" type="date" id="Contact_No" name="Contact_No[]" value="<?php if(isset($value->past_disbursment_date)) {echo $value->past_disbursment_date;}?>"></td>
																
															</tr>
															  <?php
															  
															}
														  }
														 }
														 ?>
											       	<tr>
														<td><input class = "form-control" type="text" id="Name" name="Name[]"></td>
														<td><input class = "form-control" type="date" id="Contact_No" name="Contact_No[]"></td>
														<td><input class = "form-control" type="button" class="add" onclick="add_row2();" value="Add Row" ></td>
														
													</tr>


														
												</table>
												</div>
												</br>
												<?php 
                                               
												if($row->ROLE==5)
												{ ?>
													 <div class="text-center">
															<center>
															<?php 
															 if(!empty($Loan_disburst_data['status']))
													            {
														               if($Loan_disburst_data['status']=="Approved")
																	   { 
																          ?>
																		<button type="button" class="btn btn-primary disabled">Approve  Application</button>
																	   <?php
																	   }
																	   
																	   else if($Loan_disburst_data['status']=="Revert")
																	   { 
																	   ?>
																		   <button type="button" class="btn btn-primary disabled">Revert Application</button>
                                                                           <button type="submit" class="btn btn-primary" name="Approve">Approve</button>
                                                                           <button type="submit" class="btn btn-primary" name="Reject" id="Reject">Reject</button>
																	   <?php } 
																	   else if($Loan_disburst_data['status']=="Rejected")
																	   {  
																       ?>
																		<button type="button" class="btn btn-primary disabled">Reject Application</button>
																	   <?php }
																			else
																				{?>
                                                                       
                                                                           <button type="submit" class="btn btn-primary" name="Approve">Approve</button>
                                                                           <button type="submit" class="btn btn-primary " name="Revert" id ="Revert">Revert </button>
                                                                           <button type="submit" class="btn btn-primary" name="Reject" id="Reject">Reject</button>
																	  
																	   <?php  
																	   }
																	   
																}
																	   ?>
															   
															</center>
														</div>
												<?php }
												else
												{
													
													
														 if($Loan_disburst_data['status']=="Approved")
														 {
														 ?>
															<div class="text-center">
																<center>
																   <button type="button" class="btn btn-primary disabled">Approved</button>
																   <?php if($Loan_disburst_data['Submitted_id']==$this->session->userdata('ID')) { ?>
																   <button type="submit" class="btn btn-primary" name="update">Update</button>
																   <?php } ?>
																</center>
															</div>
													 <?php } else if($Loan_disburst_data['status']=="Revert")
																{ ?>
                                                                <center>
																   <button type="button" class="btn btn-primary disabled">Revert</button>
																   <?php if($Loan_disburst_data['Submitted_id']==$this->session->userdata('ID')) { ?>
																   <button type="submit" class="btn btn-primary" name="submit">submit</button>
																   <?php } ?>
																</center>
                                                                    
                                                        <?php
                                                             } 
                                                            else if($Loan_disburst_data['status']=="Rejected")
                                                            {
                                                             ?> 
                                                                 <center>
																   <button type="button" class="btn btn-primary disabled">Reject Application</button>
																  
																</center>

															<?php }	
															  else if($Loan_disburst_data['status']=="Send For Approval")
															  {?>
																<div class="text-center">
																<center>
																   <button type="button " class="btn btn-primary disabled">Waiting For Approval </button>
																</center>
															</div> 
															 <?php  }
                                                           else
													      {
														 ?>
														 <div class="text-center">
																<center>
																   <button type="button " class="btn btn-primary disabled">Waiting For Approval </button>
																</center>
															</div>
													 <?php }
													 
												}
												 ?>
											</form>
											</div>
											<?php  $i++; } ?>
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
<script  type="text/javascript">

 $(document).ready(function () {
                
                $('#EMI_Start_Date').datepicker({
				autoclose: true,
				endDate: new Date(new Date().setDate(new Date().getDate())),
				constrainInput: true,
				format: 'yyyy-mm-dd'  
				
});  

            
            });
			$( "#Revert" ).click(function() {
				 var commnet=$('#comment').val();
				 var commentlength=commnet.trim().length;
				if(commentlength==0)
				{
					
				swal("warning!", " Please Enter Comment for Revert", "warning");
				 return false;
				}
			 });
			 $( "#Reject" ).click(function() {
				 var commnet=$('#comment').val();
				 var commentlength=commnet.trim().length;
				if(commentlength==0)
				{
					
				swal("warning!", " Please Enter Comment for Revert", "warning");
				 return false;
				}
			 });
			
			
</script>
<script>
function delete_row2(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row2()
{
 
 var new_country=document.getElementById("Name").value;
 var new_age=document.getElementById("Contact_No").value;
 




	
 var table=document.getElementById("data_table2");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='Name[]' id='country_row"+table_len+"' value='"+new_country+"'></td><td><input class = 'form-control' name='Contact_No[]' type='text' id='age_row"+table_len+"' value='"+new_age+"'></td><td><input type='button' value='Delete' class='delete' onclick='delete_row2("+table_len+")'></td></tr>";

 
 document.getElementById("Name").value="";
 document.getElementById("Contact_No").value="";
  


}
function new_login() {
$("#new_loan").css("display", "block");

	$("#veiw_loan").css("display", "none");
}
function veiw_loan()
{
	$("#veiw_loan").css("display", "block");
	$("#new_loan").css("display", "none");
}
function veiw_loan_details(e)
{
	
	$('div[id^="Loan_details_"]').hide();
	$('#Loan_details_'+e.id).css("display","block");
}
</script>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
  

</body>
</html>
		