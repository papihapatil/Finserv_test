

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
													<h3>Login Fees Details for<span style="color:green;"> <?php echo $Customer_data->FN.' '.$Customer_data->LN; ?> </h3>
												</div>
												<?php if($login_fees['Login_fees_required']=='yes'){ ?>
												<div class="col-sm-12">
												
												<label style="font-size:20px;">Payment Mode : <?php if(!empty($get_payment_deteils)){ echo "Online";} else
													{ echo "Offline";} ?></label></br>
													<label style="font-size:20px;">Bank Name: <?php if(!empty($corporate_bank_details)){ echo $corporate_bank_details->Bank_name; } ?></label>
													 <?php if(!empty($get_payment_deteils)){?>
													 </br>
													 <label style="font-size:20px;">Razorpay Payment Id: <?php if(!empty($get_payment_deteils)){ echo $get_payment_deteils->razorpay_payment_id; } ?></label>
													 </br><label style="font-size:20px;">Razorpay Order Id: <?php if(!empty($get_payment_deteils)){ echo $get_payment_deteils->razorpay_order_id; } ?></label>
													  </br><label style="font-size:20px;">Razorpay Signature: <?php if(!empty($get_payment_deteils)){ echo $get_payment_deteils->razorpay_signature; } ?></label>
													   </br><label style="font-size:20px;">Payment Status: <?php if(!empty($get_payment_deteils)){ echo $get_payment_deteils->payment_status; } ?></label>
													   </br><label style="font-size:20px;">Payment Date: <?php if(!empty($get_payment_deteils)){ echo $get_payment_deteils->payment_date; } ?></label>
													 <?php } ?>
													 <?php if(!empty($get_payment_deteils_offline)){?>
													 <?php if(!empty($get_payment_deteils_offline->Acc_holder_name)){?> </br><label style="font-size:20px;">Account Holder Name: <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->Acc_holder_name; } ?></label>
													 <?php } ?>
													  <?php if(!empty($get_payment_deteils_offline->Bank_name)){?> </br><label style="font-size:20px;">Bank Name: <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->Bank_name; } ?></label>
													 <?php } ?>
													  <?php if(!empty($get_payment_deteils_offline->Branch_name)){?> </br><label style="font-size:20px;">Branch Name: <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->Branch_name; } ?></label>
													 <?php } ?>
													 <?php if(!empty($get_payment_deteils_offline->Check_no)){?> </br><label style="font-size:20px;">Cheque No: <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->Check_no; } ?></label>
													 <?php } ?>
													 <?php if(!empty($get_payment_deteils_offline->IFSC_code)){?> </br><label style="font-size:20px;">IFSC Code: <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->IFSC_code; } ?></label>
													 <?php } ?>
													 <?php if(!empty($get_payment_deteils_offline->Acc_type)){?> </br><label style="font-size:20px;">Account Type: <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->Acc_type; } ?></label>
													 <?php } ?>
													  <?php if(!empty($get_payment_deteils_offline->Recived_date)){?> </br><label style="font-size:20px;">Received Date: <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->Recived_date; } ?></label>
													 <?php } ?>
													   <?php if(!empty($get_payment_deteils_offline->Amount)){?> </br><label style="font-size:20px;">Amount : <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->Amount; } ?></label>
													 <?php } ?>
													  <?php if(!empty($get_payment_deteils_offline->cheque_handover_to)){?> </br><label style="font-size:20px;">Handed Over To : <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->clector_name; } ?></label>
													 <?php } ?>
													  <?php if(!empty($get_payment_deteils_offline->save_date)){?> </br><label style="font-size:20px;">Save Date : <?php if(!empty($get_payment_deteils_offline)){ echo $get_payment_deteils_offline->save_date; } ?></label>
													 <?php } ?>
													 
													 
													 
													 
													 
													 
												</div>
												<?php } ?>
												<?php } ?>
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
		