<?php


if(isset($loanlist))
{
$tenure = explode(",",$loanlist->tenure);
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



<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/retailers/saverequest" enctype='multipart/form-data' >
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
						<span class="shadow align-middle dot"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></span>				
					</div>
					
					<div >
						<span class="shadow align-middle dot-hr"></span>
					</div>			
								
					<div>
						<span class="align-middle dot-white"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></span>
					</div>			
				</div>	
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
<input type="file" name="file" class="form-control">
			</div>
			 
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;"></span>
               
			</div>
			<div class="w-100"></div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">Request number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter invoice number *" class="input-cust-name" type="text" name="invoicenumber" value="<?php if(isset($row->invoicenumber)) { echo $row->invoicenumber; } ?>" minlength="6" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Request Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				
  					<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="number"  title="Please enter invoice amount" name="invoiceamount" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if(isset($row->invoiceamount)) { echo $row->invoiceamount; } ?>">
  				</div> 
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Upload file *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  type='file' name='invoicefile' style="display: block;" id="invoicefile"  required   /> 
  				</div> 
				
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Interest rate *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="interestrate" id="interestrate" oninput="maxLengthCheck(this)" maxlength="10" readonly value="<?php if(isset($loanlist->interestrate)) {  echo $loanlist->interestrate; } ?>">

  				</div> 
				
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Interest Subvention *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="interestsubvention" id="interestsubvention" oninput="maxLengthCheck(this)" maxlength="10" readonly value="<?php  if(isset($loanlist->interestsubvention)) { echo $loanlist->interestsubvention; } ?>">

  				</div> 
 
 
  			</div>		
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Product *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter Product *" class="input-cust-name" type="hidden" name="product" value="<?php  if(isset($row->product)) { echo $row->product; } ?>" minlength="8" maxlength="75">
					<input  required placeholder="Enter Product *" class="input-cust-name" type="text" readonly name="loanproduct" value="<?php  if(isset($loanlist->name)) { echo $loanlist->name; } ?>" minlength="8" maxlength="75">
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Funding / Disb. Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input type="number" required placeholder="Enter Funding/ Disb. Amount *" class="input-cust-name"  title="Please enter invoice issued by name" name="funding" id="funding" value="<?php  if(isset($row->funding)) { echo $row->funding; } ?>">
  				</div> 
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Charges *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input  required placeholder="Total charges *" type="text" readonly class="input-cust-name"  title="Please enter invoice issued by name" name="totalcharges" id="totalcharges" value="">
				
				</div> 
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter invoice issued by *" type="hidden" class="input-cust-name"  title="Please enter invoice issued by name" name="invoiceissuedby" value="test<?php if(isset($row->invoiceissuedby)) { echo $row->invoiceissuedby; } ?>">
  				<input  required placeholder="Total amount *" type="text" readonly class="input-cust-name"  title="Please enter invoice issued by name" name="totalamount" id="totalamount" value="">
				
				</div> 
				
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing fee type *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="processingfeetype"  id="processingfeetype" oninput="maxLengthCheck(this)" maxlength="10" readonly value="<?php  if(isset($loanlist)) { echo $loanlist->processingfeetype; } ?>">

  				</div> 
 
 
  					
 
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Request Date *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="invoicedate" id="invoicedate" value="<?php  if(isset($row->invoicedate)) { echo $row->invoicedate; }  ?>" >
				</div>
			  	<div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select Tenure *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				<select  required class="input-cust-name" name="loantenure" id="loantenure" >
				<option value="">Select </option>
				<?php foreach($tenure as $row) { ?>
				
				<option value="<?php echo $row; ?>"><?php echo $row; ?> Days</option>
				
				<?php } ?>
				
				</select>
					 
				
				
				
				</div>

				

<div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select Distributors *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select  required class="input-cust-name" name="DistributorList" > 
					<option value="">Select Distributors *</option>
					<?php foreach($DistributorList as $Distributor) { ?><option value="<?php echo $Distributor->ID; ?>" ><?php echo $Distributor->FN." ".$Distributor->LN; ?></option> <?php } ?>
					
				</select>
				</div>

<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Processing fee *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="processingfee" id="processingfee" oninput="maxLengthCheck(this)" maxlength="10" readonly value="<?php if(isset($loanlist->processingfee)) { echo $loanlist->processingfee; } ?>">

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
		<!-- identity details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			
		</div>

		
		<?php if(!empty($row))	{if(isset($row->ROLE) && ($row->ROLE==2 || $row->ROLE==4 ) )  {  ?>
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

<script >

$( "#funding" ).change(function() {
  
  
 var fundingval = $( "#funding" ).val();
 
 var loantenure = $( "#loantenure" ).val();
 
 var interestrate = $( "#interestrate" ).val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfeetype = $("#processingfeetype").val();
 
 var interestsubvention = $("#interestsubvention").val();
 
  
  
 
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
 
});



$( "#loantenure" ).change(function() {
 
 var fundingval = $( "#funding" ).val();
 
 var loantenure = $( "#loantenure" ).val();
 
 var interestrate = $( "#interestrate" ).val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfee = $("#processingfee").val();
 
 var processingfeetype = $("#processingfeetype").val();

 var interestsubvention = $("#interestsubvention").val();
 
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