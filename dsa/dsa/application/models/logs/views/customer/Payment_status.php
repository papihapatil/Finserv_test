<style>
 .steps  li {
    margin: 0px;
    list-style-type: circle;
}
</style>
<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">Payment Status</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>



	
	<div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			
			<div class="card mb-3">
			  <div class="row no-gutters">			    
			    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
			      <div class="card-body">
				    <div class="row justify-content-center">
					      <?php if(isset($payment_details)){ if($payment_details->payment_status=='Successful'){?>  <h2 class="text-center" style="color:#28a745;"> Payment is Done Successfully</h2><?php }else{ ?>
						  <h2 class="text-center" style="color:#d62122;">Your Payment is Fail</h2><?php } }?>
					</div>
					<div class="row justify-content-center">
					      <?php if(isset($result)){ if($result==2){?>  <h2 class="text-center" style="color:#28a745;"> Cheque details are save successfully</h2><?php }else{  if($result==3){ ?>
						  <h2 class="text-center" style="color:#d62122;">Something get Wrong in saving data</h2><?php } } }?>
					</div>
					<div class="row justify-content-center">
					      <?php if(isset($result)){ if($result==4){?>  <h2 class="text-center" style="color:#28a745;"> payment details are save successfully</h2><?php }else {if($result==5){ ?>
						  <h2 class="text-center" style="color:#d62122;">Something get Wrong in saving data</h2><?php } } }?>
					</div>
					
					<div class="row ">
					    <div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
						</div>
					    <div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
					    
					     </div>
					</div>
				   <?php if(isset($result)){ if($result==1 || $result==0){?>
					<div class="row">
					 <div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
						</div>
					    <div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
					     <h4>Details</h4>
						 </div>
						   
						 
					</div>
					<div class="row">
					     <div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
						</div>
					    <div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
						      <ul class="steps">
								<li>
									 Payment id : <?php echo $payment_details->razorpay_payment_id; ?>
								</li>
								<li>
									Order id : <?php echo $payment_details->razorpay_order_id; ?>
								</li>
							 </ul>
					    </div>
					</div>
				   <?php } }?>
					<div class="row" style="margin-top:50px;">
					 <div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
						</div>
					    <div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
					     		   
						</div> 
					</div>
					<?php if(isset($payment_details)){if($payment_details->payment_status=='Successful'){?>
					<div class="row justify-content-center" style="margin-top:20px;">
					    <a href="<?php echo base_url()?>index.php/customer/applied_loans_list?UID=<?php if(!empty($payment_details)){echo $payment_details->Cust_id; } ?>">
					        <button type="button" class="btn btn-success" style=" border-radius: 40px;">Proceed <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button>
						</a>
					</div>
					<?php }}?>
					<?php if(isset($result)){ if($result==2){?>
					<div class="row justify-content-center" style="margin-top:20px;">
					    <a href="<?php echo base_url()?>index.php/customer/applied_loans_list?UID=<?php if(!empty($payment_details_offline)){echo $payment_details_offline->Cust_id; } ?>">
					        <button type="button" class="btn btn-success" style=" border-radius: 40px;">Proceed <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button>
						</a>
					</div>
					<?php }}?>
					<?php if(isset($result)){ if($result==4){?>
					<div class="row justify-content-center" style="margin-top:20px;">
					    <a href="<?php echo base_url()?>index.php/customer/applied_loans_list?UID=<?php if(!empty($payment_details_offline)){echo $payment_details_offline->Cust_id; } ?>">
					        <button type="button" class="btn btn-success" style=" border-radius: 40px;">Proceed <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></button>
						</a>
					</div>
					<?php }}?>
			        
			        
			      </div>
			    </div>
			  
			  </div>
			</div>		
		</div>	
		
	</div>
