<?php 
$id= "";
//print_r($products);

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



<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/distributor/saveproduct" enctype='multipart/form-data' >
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				
			</div>
		</div>
	
		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Add Product</span>

	
			</div>
			 
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;"></span>
               
			</div>
			<div class="w-100"></div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			    <div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan product code *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter product code *" class="input-cust-name" type="text" name="product_code" value="<?php echo $products->product_code; ?>" >
  				</div> 
				 

  				

  				
 
  			</div>		
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			

				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan product name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter product name *" class="input-cust-name" type="text" name="name" value="<?php echo $products->name; ?>" minlength="6" maxlength="75">
  				</div>
				
  				
				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				

  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Interest rate per annum *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				
  					<input  required placeholder="Enter interst rate per annum *" class="input-cust-name" type="text"  title="Please enter interest rate" name="interestrate" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $products->interestrate; ?>">
  				</div> 
				
				<div class="w-100"></div>
			  			
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				<div style="margin-top: 8px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select Tenure (Comma separated) *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  required  max="" class="input-cust-name" type="text" name="tenure" id="tenure" value="<?php echo $products->tenure; ?>" >
				</div>
        </div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		        
				<div style="margin-top: 8px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select interest subvention *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select  required class="input-cust-name" name="interstsubvention" > 
					<option value="Yes" <?php if($products->interestsubvention == 'Yes') { echo " selected "; } ?>  >Yes *</option>
					<option value="No"  <?php if($products->interestsubvention == 'No') { echo " selected "; } ?> >No *</option>
					
				</select>
				</div>	
       </div>
	   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  
			<div style="margin-top: 8px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing Fees *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select  required class="input-cust-name" name="processing_fees" id="processing_fees" > 
					<option value="">select option</option>
					<option value="Yes" <?php if($products->processingfee_yes_no == 'Yes') { echo " selected "; } ?>  >Yes *</option>
					<option value="No"  <?php if($products->processingfee_yes_no == 'No') { echo " selected "; } ?> >No *</option>
					
				</select>
				</div>	

					
  			</div>  
			  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="processing_fees_Type" style="display:none;">
	  
					<div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing Fee type *</span>
						</div>		
							
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						
						<select   class="input-cust-name" name="processinfeetype" id="processinfeetype" > 
							<option value="">Processing Fee type *</option>
							
							<option value="fixed" >Amount *</option>
							<option value="percentage" >Percentage *</option>
						</select>	
					</div>
				</div>	
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="processing_fees_amt" style="display:none;">
	  
					<div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing Fee in RS</span>
						</div>		
							
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input   min="1" class="input-cust-name" type="number" name="proceesing_fees_in_amt" id="proceesing_fees_in_amt" value="" >
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="processing_fees_per" style="display:none;">
	  
					<div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing Fee in %</span>
						</div>		
							
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input   min="1" max="100" class="input-cust-name" type="number" name="proceesing_fees_in_per" id="proceesing_fees_in_per" value="" >
					</div>
				</div>	
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="processing_fees_start_date" style="display:none;">
	  
					<div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Start Date</span>
						</div>		
							
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  class="input-cust-name" type="date" name="start_date" id="start_date" >
					</div>
				</div>	
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="processing_fees_End_date" style="display:none;">
	  
					<div style="margin-top: 8px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">End Date</span>
						</div>		
							
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  class="input-cust-name" type="date" name="End_date" id="End_date" >
					</div>
				</div>	
            </div>
	  
		
		<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
					
					<input type="submit"  name="Confirm" value="Confirm" class="login100-form-btn" style="background-color: #25a6c6;">
					<!--	<button type="submit"  name="Submit" value="submit">Submit</button> -->
				</div>		
			</div>
</form>
		<!-- identity details ------------------------------- -->

		

		
		<?php if(!empty($row))	{if($row->ROLE==2 || $row->ROLE==4 )  {  ?>
		<div class="row shadow bg-white rounded margin-10 padding-15">
		    <div class="w-100"></div>  
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				         
							<?php if(!empty($dsa_banks))
							{ 
									 foreach($dsa_banks as $dsa_bank)
									 { if($dsa_bank->BANK_NAME==''){break;}
							?>
							 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">  
								<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Bank Details *</span>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">  
								<input style="margin-top: 8px;" placeholder="" class="input-cust-name" type="text" name="bank[]" id="" value="<?php echo $dsa_bank->BANK_NAME; ?>" >
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
								<input style="margin-top: 8px;" placeholder="DSA Code" class="input-cust-name" type="text" name="dsa_code[]" id="" value="<?php echo $dsa_bank->DSA_CODE; ?>" >
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
							&nbsp;
							</div>
							<?php } } ?>
							
							
				
						
					
			</div>
		</div>
			<?php }} ?>	
		

		 </div>
			</form>


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
<script type="text/javascript">
	$(document).ready(function () {
                
                $('#start_date').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
			$(document).ready(function () {
                
                $('#End_date').datepicker({
					autoclose: true,
					endDate: new Date(new Date().setDate(new Date().getDate())),
					constrainInput: true,
					format: 'yyyy-mm-dd'  
				
                });  
            
            });
 $( "#processing_fees" ).change(function() 
 {
	 var result=$("#processing_fees").val();
	
	 if(result=='Yes')
	 {
     $('#processing_fees_Type').css({display:"block"});
	 $('#processing_fees_start_date').css({display:"block"});
	 $('#processing_fees_End_date').css({display:"block"});
	 }
	 else if(result=='No') {
		$('#processing_fees_Type').css({display:"none"});
		$('#processing_fees_start_date').css({display:"none"});
	    $('#processing_fees_End_date').css({display:"none"});
	 }
 });
 $( "#processing_fees_Type" ).change(function() 
 {
	$("input").prop('required',true);
	 var result=$("#processinfeetype").val();
	
	 if(result=='fixed')
	 {
     $('#processing_fees_amt').css({display:"block"});
	 $('#proceesing_fees_in_amt').prop('required',true);
	 $('#processing_fees_per').css({display:"none"});
	 $('#proceesing_fees_in_per').prop('required',false);
	 }
	 else if(result=='percentage'){
		$('#processing_fees_amt').css({display:"none"});
		$('#proceesing_fees_in_amt').prop('required',false);
		$('#processing_fees_per').css({display:"block"});
		$('#proceesing_fees_in_per').prop('required',true);
		
	 }
 });
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url(); ?>/adminn/css/style.css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>/css/style1.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>/adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>

</body>
</html>