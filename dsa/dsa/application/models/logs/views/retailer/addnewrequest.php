<?php

//print_r($product_details);
$tenure = explode(",",$product_details->tenure);

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


<?php



 if($product_details->interestsubvention == 'No') {  ?>
<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/retailers/saverequest" enctype='multipart/form-data' >

	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		
			
			
			</div>
			
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				
			</div>
		</div>
	
		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Upload request</span>

			</div>
			 
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;"></span>
               
			</div>
			<div class="w-100"></div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter invoice number *" class="input-cust-name" type="text" name="invoicenumber"  minlength="4" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Funding / Disb. Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter Funding/ Disb. Amount *" class="input-cust-name"  title="Please enter invoice issued by name" name="funding" id="funding" >
  				</div> 
				
				<div class="w-100"></div>

  				
				
				<div class="w-100"></div>

  				
				  <div class="w-100"></div>
				
				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing fee <?php if($product_details->processingfeetype == 'percentage') { echo "%";  } else { echo "INR"; } ?>
 *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="processingfee" id="processingfee" value="0.5" oninput="maxLengthCheck(this)" maxlength="10" readonly > 
  				</div> 
				  <div class="w-100"></div>

					<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Payable Amount *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input  required placeholder="Enter invoice issued by *" type="hidden" class="input-cust-name"  title="Please enter invoice issued by name" name="invoiceissuedby" >
					<input  required placeholder="Total amount *" type="text" readonly class="input-cust-name"  title="Please enter invoice issued by name" name="totalamount" id="totalamount" value="">

					</div>
				
 
  			</div>		
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice Date *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input  required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="invoicedate" id="invoicedate"  >
					</div>
					<div class="w-100"></div>
				<div style="margin-top: 0px; display:none;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Product *</span>
				</div>	
				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select Tenure *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				<select  required class="input-cust-name" name="loantenure" id="loantenure" >
				<option value=" ">Select </option>
				<?php foreach($tenure as $row) { ?>
				
				<option value="<?php echo $row; ?>"><?php echo $row; ?> Days</option>
				
				<?php } ?>
				
				</select>
					 
				
				
				
				</div>

						
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;  display:none;" class="col">
  					<input  required placeholder="Enter Product *" class="input-cust-name" type="hidden" name="product"  >
					<input  required placeholder="Enter Product *" class="input-cust-name" type="text" readonly name="loanproduct" value="<?php echo $product_details->name;?>" >
  				</div> 

  				
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Charges *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input  required placeholder="Total charges *" type="text" readonly class="input-cust-name"  title="Please enter invoice issued by name" name="totalcharges" id="totalcharges" >
				
				</div> 
				
				<div class="w-100"></div>

  				
				
				
				<div class="w-100"></div>
				<div style="margin-top: 20px; display:none;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing fee type *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;display:none;" class="col">
  				<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="processingfeetype"  id="processingfeetype" oninput="maxLengthCheck(this)" maxlength="10" readonly value="<?php echo $product_details->processingfeetype;?>">

  				</div> 
				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Remark *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  required placeholder="Enter Remarks*" class="input-cust-name" type="text"  title="Please enter remarks" name="remarks"  id="remarks" oninput="maxLengthCheck(this)" maxlength="160"  >

  				</div>

  					
				

  			
 
 
  					
 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				
  					<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="invoiceamount" oninput="maxLengthCheck(this)" maxlength="10" value="">
  				</div> 
			  	<div class="w-100"></div>

				  

					<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Interest rate *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="interestrate" id="interestrate" oninput="maxLengthCheck(this)" maxlength="10" readonly value="<?php echo $product_details->interestrate;?>">

					</div> 

                 <div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Distributors Name *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select  required class="input-cust-name" name="DistributorList" > 
					
					<option value="<?php echo $distributor_info->UNIQUE_CODE; ?>" ><?php echo $distributor_info->FN." ".$distributor_info->LN; ?></option> 
					
				</select>
				</div>
				
				 
			
  			</div> 
			  
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			 
			</div>

			
  			</div> 
			
			

 			
		</div>
		
		
		
		    <div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
					
					<input type="submit"  name="Submit" class="login100-form-btn" style="background-color: #25a6c6;">
					
				</div>		
			</div>
        </form>
	

		
		

		
		
<?php } else { ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/retailers/saverequestnew" enctype='multipart/form-data' >

	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			
			</div>
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				
			</div>
		</div>
	
		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Upload request</span>
			</div>
			 
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;"></span>
               
			</div>
			<div class="w-100"></div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			    <div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice Number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter invoice number *" class="input-cust-name" type="text" name="invoicenumber" minlength="6" maxlength="75">
  				</div> 
  				<div class="w-100"></div>
                <div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Funding / Disb. Amount *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  required placeholder="Enter Funding/ Disb. Amount *" class="input-cust-name"  title="Please enter invoice issued by name" name="funding" id="funding" >
				</div> 
 
  			</div>		
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px; display:none;" class="col" >
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Product *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px; display:none;" class="col">
  					<input  required placeholder="Enter Product *" class="input-cust-name" type="hidden" name="product">
					<input  required placeholder="Enter Product *" class="input-cust-name" type="text" readonly name="loanproduct" >
  				</div> 
				  <div class="w-100"></div>
               
			   <div style="margin-top: 0px;" class="col">
			   <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice Date *</span>
			   </div>			
			   <div class="w-100"></div>
			   <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				   <input  required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="invoicedate" id="invoicedate"  >
			   </div>
  				
  				
				
				<div class="w-100"></div>

  			
				
				<div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select Tenure *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				<select  required class="input-cust-name" name="loantenure" id="loantenure" >
				<option value=" ">Select </option>
				<?php foreach($tenure as $row) { ?>
				
				<option value="<?php echo $row; ?>"><?php echo $row; ?> Days</option>
				
				<?php } ?>
				
				</select>
					 
				
				
				
				</div>
				
				
				<div class="w-100"></div>
				
				
				  

  					
				

  			
 
 
  					
 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			  <div class="w-100"></div>
			  <div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				
  					<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="invoiceamount" oninput="maxLengthCheck(this)" maxlength="10" >
  				</div> 
				
			  	<div class="w-100"></div>

				  <div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Distributors Name *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select  required class="input-cust-name" name="DistributorList" > 
					
					<option value="<?php echo $distributor_info->UNIQUE_CODE; ?>" ><?php echo $distributor_info->FN." ".$distributor_info->LN; ?></option> 
					
				</select>
				</div>

				



				
				<div class="w-100"></div>
			
			
  			</div> 
			  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Remark *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  required placeholder="Enter Remarks*" class="input-cust-name" type="text"  title="Please enter remarks" name="remarks"  id="remarks" oninput="maxLengthCheck(this)" maxlength="160"  >

				</div>
				</div>



			
  			</div> 
			
			

			
		</div>
		
				
		
		
		    <div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
					
					<input type="submit"  name="Submit" class="login100-form-btn" style="background-color: #25a6c6;">
				
				</div>		
			</div>
        </form>
	

<?php  } ?>

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

var flag = true;
$( "#funding" ).change(function() {

  
  var totalpaid;
  
 var fundingval = $( "#funding" ).val();
 
 
 
 var loantenure = $( "#loantenure" ).val();
 
 var interestrate = $( "#interestrate" ).val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfeetype = $("#processingfeetype").val();
 
 var interestsubvention = $("#interestsubvention").val();
 

  
  if(interestsubvention == 'Yes')
  {
	  if(loantenure != '')
 {
	 
	 var yearlyinterst = fundingval*interestrate/100;
	 
	
	 
	 dailyinterest = yearlyinterst/365;
	 
	
	 
	 var totalinterest = loantenure*dailyinterest;
	 

	 if(processingfeetype == 'fixed')
	 {
		 var totalcharges = totalinterest+processingfee;
		 
	
	 }
	 else{
		 
		 		 var calfee = parseFloat(fundingval)*parseFloat(processingfee)/100;
				 
				 var totalcharges = totalinterest+calfee;
		 
	

		 
	 }
	 
	 totalcharges = totalcharges.toFixed(2);
	 
	 $("#totalcharges").val(totalcharges);
	 
	 $("#totalamount").val(fundingval);
	 
	 fundingval = fundingval-totalcharges;
	 
	 $( "#funding" ).val(fundingval);
	 
 }
	  
  }
  else 
	  
	  {
 
 if(loantenure != '')
 {
	 var yearlyinterst = fundingval*interestrate/100;
	 
	
	 
	 dailyinterest = yearlyinterst/365;
	 
	
	 var totalinterest = loantenure*dailyinterest;
	 
	
	 
	 if(processingfeetype == 'fixed')
	 {
		 
		 if(interestsubvention == 'Yes')
		 {
			 
			 var totalpay = parseFloat(fundingval)+parseFloat(totalinterest);
		 
	
		 
		 var grandtotal = parseFloat(totalpay) + parseFloat(processingfee);
		 
		 var totalcharges = parseFloat(totalinterest) + parseFloat(processingfee);
		 
		 
		 }
		 
		 else {
		 
		 var totalpay = parseFloat(fundingval)+parseFloat(totalinterest);
		 
		
		 
		 var grandtotal = parseFloat(totalpay) + parseFloat(processingfee);
		 
		 var totalcharges = parseFloat(totalinterest) + parseFloat(processingfee);
		 
		 }
		 
		 totalcharges = totalcharges.toFixed(2);
		 
		 grandtotal = grandtotal.toFixed(2);
		 
		 $("#totalcharges").val(totalcharges);
		 
		 $("#totalamount").val(grandtotal);
	 }
	 else
	 {
		
		  var totalpay = parseFloat(fundingval)+parseFloat(totalinterest);
		 
	
		 var calfee = parseFloat(fundingval)*parseFloat(processingfee)/100;
		 
		 var grandtotal = parseFloat(totalpay) + parseFloat(calfee);
		 
		 var totalcharges = parseFloat(calfee) + parseFloat(totalinterest);
		 
		 
		 totalcharges = totalcharges.toFixed(2);
		 
		 grandtotal = grandtotal.toFixed(2);
		 
		 $("#totalcharges").val(totalcharges);
		 
		 $("#totalamount").val(grandtotal);
		 
	 }
	 
	 
	 
 }
 
	  }
 
});



$( "#loantenure" ).change(function() {

  if(flag)
  {  
  
 var fundingval = $( "#funding" ).val();
 
 flag = false;
 
  }
  else{
	  
	  var fundingval = $( "#totalamount" ).val();
  }
 
 var loantenure = $( "#loantenure" ).val();
 
 var interestrate = $( "#interestrate" ).val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfeetype = $("#processingfeetype").val();

 var interestsubvention = $("#interestsubvention").val();
 
 if(interestsubvention == 'Yes')
  {
	  if(fundingval != '')
 {
	 
	 var yearlyinterst = fundingval*interestrate/100;
	 
	
	 
	 dailyinterest = yearlyinterst/365;
	 
	
	 
	 var totalinterest = loantenure*dailyinterest;

	 if(processingfeetype == 'fixed')
	 {
		 var totalcharges = totalinterest+processingfee;
		
	 }
	 else{
		 
		 		 var calfee = parseFloat(fundingval)*parseFloat(processingfee)/100;
				 
				 var totalcharges = totalinterest+calfee;
		 
		
		 
	 }
	 
	 totalcharges = totalcharges.toFixed(2);
	 
	 $("#totalcharges").val(totalcharges);
	 
	 $("#totalamount").val(fundingval);
	 
	 fundingval = fundingval-totalcharges;
	 
	 $( "#funding" ).val(fundingval);
	 
 }
	  
  }
  else 
	  
	  {
 
 if(fundingval != '')
 {
	 var yearlyinterst = fundingval*interestrate/100;
	 
	
	 
	 dailyinterest = yearlyinterst/365;
	 
	
	 
	 var totalinterest = loantenure*dailyinterest;
	 

	 
	 if(processingfeetype == 'fixed')
	 {
		 
		 
		 var totalpay = parseFloat(fundingval)+parseFloat(totalinterest);
		 
	
		 
		 var grandtotal = parseFloat(totalpay) + parseFloat(processingfee);
		 
		  grandtotal = grandtotal.toFixed(2);
		  
		   var totalcharges = parseFloat(totalinterest) + parseFloat(processingfee);
		   
		   totalcharges = totalcharges.toFixed(2);
		 
		 $("#totalcharges").val(totalcharges);
		 
		 $("#totalamount").val(grandtotal);
	 }
	 else
	 {
		  var totalpay = parseFloat(fundingval)+parseFloat(totalinterest);
		 
	
		 var calfee = parseFloat(fundingval)*parseFloat(processingfee)/100;
		 
		 var grandtotal = parseFloat(totalpay) + parseFloat(calfee);
		 
		  grandtotal = grandtotal.toFixed(2);
		  
		  var totalcharges = parseFloat(calfee) + parseFloat(totalinterest);
		  
		  totalcharges = totalcharges.toFixed(2);
		 
		 $("#totalcharges").val(totalcharges);
		 
		 $("#totalamount").val(grandtotal);
		 
	 }
	 
 }
 
	  }
 });

</script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>

</body>
</html>