<?php 

//print_r($Request);

$id = '';

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
<form method="POST" action="<?php echo base_url(); ?>index.php/distributor/saveloanproduct" enctype='multipart/form-data' >
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
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Assign loan</span>

			</div>
			 
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;"></span>
               
			</div>
				
			
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>

				
			  	<div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Assign Loan *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<select  required class="input-cust-name" name="loanid" > 
					<option value="">Select Loan Product *</option>
					<?php foreach($productlist as $product) { ?><option  value="<?php echo $product->id; ?>" ><?php echo $product->name; ?></option> <?php } ?>
					
				</select>
				</div>		
  			</div>  			
		</div>
		
		<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
					<input type="hidden" name="userid" id="userid" value="<?php echo $_REQUEST['id']; ?>" >
					<input type="submit"  name="Confirm" value="Confirm" class="login100-form-btn" style="background-color: #25a6c6;">
						</div>		
			</div>
</form>
		<!-- identity details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			
		</div>

		
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php  echo base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url()?>/adminn/css/style.css" rel="stylesheet">
            <link href="<?php  echo base_url()?>/css/style1.css" rel="stylesheet">
			<link href="<?php  echo base_url()?>/adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>

</body>
</html>