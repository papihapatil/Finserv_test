
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
												<h3>Monthly One Time Billing </h3>
												</div>
												<Form  id="calculation_1" action="<?php echo base_url('index.php/Accountant/get_insurance_amount');?>" method="post">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
													 <div style=" margin-top: 8px;" class="col">
													    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Billing For</label>
														<select class="form-control"  name="Bank_name" id="Billing_type">
																			<option value="">Select Billing Range</option>
																			<option value="Current_Month">Current Month</option>
																			<option value="Previous_Month">Previous Month</option>
																			<option value="Select_Range">Select Range</option>
														</select>
													</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date:</label>
															<input  class="form-control Start_Date"  type="date" name="Start_Date" id="Start_Date"  >
														</div>  
													</div> 
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date:</label>
															<input  class="form-control"  type="date" name="End_Date" id="End_Date"  >
														</div>  
													</div> 
													</div>
												
												<div class="row">
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Select Bank Name:</label>
															<select class="form-control" id="Bank_name" name="Bank_name">
															        <option value="">Select Bank Name</option>
																	
																	<?php foreach($Bank_names as $Bank_name)
																	{ ?>
																	<option value="<?php  echo $Bank_name->id;?>" ><?php echo $Bank_name->Bank_name; ?></option>
																<?php 	}
																	 ?>
															</select>
															
														</div>  
													</div> 
														<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														 <div style=" margin-top: 8px;" class="col">
														  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Select Loan Type:</label>
															<select class="form-control" id="Loan_Type" name="Loan_Type">
															        <option value="" >Select Loan Type</option>
																	
																	
															</select>
															
														</div>  
													</div> 
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                                        <div style=" margin-top: 35px;" class="col">													
														<center>
														   <button type="submit" id="calaculate" class="btn btn-primary">Submit</button>
														</center>
													</div>
                                                    </div>													
											
												</div>
												
												
												</br>
												<div class="text-center">
													
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
  

</body>
</html>
		