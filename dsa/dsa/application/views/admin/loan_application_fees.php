

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

		
	<div class="row justify-content-center">
		<div >
			<div >
				<form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/admin/loan_application_fees_action" method="POST" id="credt_buerau">
					<span class="signup100-form-title p-b-43">						
						Existing Fees
					</span>					 
								
					<br><br>														
					
					<div class="wrap-edit validate-input" >
						<input class="input100" type="text" name="bank_name"  readonly value=<?php if(isset($loan_application_fees)){echo $loan_application_fees;}else{echo 0;}?>>
						<span class="focus-input100"></span>
					</div>						
							<br>
                    <span class="signup100-form-title p-b-43">						
						New Fees
					</span>					 
								
					<br><br>														
					
					<div class="wrap-edit validate-input" >
						<input class="input100" type="number" step="any" name="price"  required >
						<span class="focus-input100"></span>
					</div>						
							<br>							
					<div class="container-login100-form-btn">
					<button  class="btn btn-info" style="background-color: #25a6c6;">
							SAVE
						</button>
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
<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>	
