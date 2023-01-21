

	<div >
		
		


		<!-- Salaried ------------------------------- -->
		<?php if($type == 'home') { ?>	

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 5px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">
						<?php if(!empty($coapplicant))if($coapplicant == 'true') { ?> Co-Applicants 
						<?php } else {?>
						About Co-Applicants 
						<?php } ?>
					</span>
					<div class="w-100"></div>
					
				</div>					

				<div class="w-100"></div>

				<?php if(!empty($coapplicant))if($coapplicant == 'true') { ?>					
					<div class="row justify-content-center col-12">
						<div class="row shadow" style="text-align: center; border-radius: 10px; margin-top: 15px; background-color: white; padding-top: 10px; padding-bottom: 10px; padding-left: 5px; padding-right: 5px;">
							
							<?php for ($i=0; $i < count($co_app); $i++) { ?>
									<div  style="text-align: center; border-radius: 10px; margin: 4px;">									
									<span style="font-size: 12px; background-color: #77cdf4; padding: 10px; border-radius: 10px; color: white;">
										<?php echo $co_app[$i]->FN." ".$co_app[$i]->LN ?>
										
										<a href="<?php echo base_url()?>index.php/credit_manager_user/coapplicant_new_screen_one?COAPPID=<?php echo $co_app[$i]->UNIQUE_CODE;?>&UID=<?php echo $id; ?>"><i style=" margin-left: 15px; font-size:15px;color:white;" class="fas fa-pen"></i></a>
									</span>
								</div>

							<?php } ?>
																					
							
						</div>						
					</div>	

					<?php if($isProfileFull == 'false')return;?>
				<?php } else { ?>
					<div class="row justify-content-center col-12">
						<div class="shadow" style="text-align: center; width: 250px; border-radius: 10px; padding: 10px; background-color: white; margin-top: 20px;">
							<span style="font-size: 12px;">No co-applicant found</span>							
						</div>
						<div class="w-100"></div>
						
					</div>	
				<?php return;} ?>
			</div>	

			<form method="POST" action="<?php echo base_url(); ?>index.php/customer/apply_loan_screen_home_loan_action?UID=<?php echo $id; ?>" id="apply_loan_screen_1">
				

			
			

			
			

			
			
			</form>
		<?php } ?>	
<script>
$('#ifsc_code').on('input', function(e) {
   this.setCustomValidity('')
     // e.target.checkValidity()
     this.reportValidity();
   })
 function Loan_amount()
{
   var Loan_amount = document.getElementById('desired_loan_amount').value;
   document.getElementById('requested_fund').value=Loan_amount;
}
function savings()
{
   var savings_in_bank = document.getElementById('savings_in_bank').value;
   document.getElementById('bank_saving').value=savings_in_bank;
}
function immovable()
{
   var immovable_prop = document.getElementById('immovable_prop').value;
   document.getElementById('disposal_invest').value=immovable_prop;
}
function other()
{
   var other_invest = document.getElementById('other_invest').value;
   document.getElementById('sale_of_property').value=other_invest;
}

function insurance()
{
   var insurance_poli = document.getElementById('insurance_poli').value;
   document.getElementById('family_amount').value=insurance_poli;
}
</script>
		</div>		
	</div>
	
	
