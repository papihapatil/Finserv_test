
<?php
    $message = $this->session->flashdata('success');
    if (isset($message)) {
        echo '<script> swal("success!", "Profile updated successfully", "success");</script>';
         $this->session->unset_userdata('success');	
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
										<div>
											<div class="container">
												<div class="text-center">
													<h3>Loan Disbursement Form  for<span style="color:green;"> <?php echo $row1->FN.' '.$row1->LN; ?> </h3>
												</div>
												<Form action="<?php echo base_url('index.php/BranchManager/Save_Loan_Disbursed_deatils');?>" method="post">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Loan Amount Sanction (in Rupees):</label>
															<input type="number" step="any" class="form-control" id="Loan_Amount_Saction" name="Loan_Amount_Saction" value="<?php if(!empty($Loan_disburst_data)){ echo $Loan_disburst_data->Loan_Amount_Saction;} ?>">
															<input type="text" name="cust_name" value="<?php echo $row1->FN.' '.$row1->LN; ?>"  hidden>
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
												</div>
												</br>
												<div class="text-center">
													<center>
													   <button type="submit" class="btn btn-primary">Submit</button>
													</center>
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
<script  type="text/javascript">

 $(document).ready(function () {
                
                $('#EMI_Start_Date').datepicker({
				autoclose: true,
				endDate: new Date(new Date().setDate(new Date().getDate())),
				constrainInput: true,
				format: 'yyyy-mm-dd'  
				
});  
            
            });
</script>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
  

</body>
</html>
		