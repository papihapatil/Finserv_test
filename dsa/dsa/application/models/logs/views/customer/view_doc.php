<?php
    $message = $this->session->flashdata('warning');
    if (isset($message)) {
        echo '<script> swal("warning!", "Name of customer not match with aadhar card", "warning");</script>';
         $this->session->unset_userdata('warning');	
    }
	$Mobile_verification=$this->session->userdata('Mobile_verification');
	if (isset($Mobile_verification)) {
        echo '<script> swal("success!", "Mobile Verification Sucessfull", "success");</script>';
         $this->session->unset_userdata('Mobile_verification');	
    }

    ?>
<div >

        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">View Document</small>
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
									<h2 class="text-center" style="color:#d62122;">E-Sign With Aadhaar</h2>
							</div>
							<div class="row justify-content-center " style="margin-top:20px;">
							    <?php if(isset($link))
								     {?>
									   <a href="<?php echo base_url().$link;?>" target="_blank"><button type="button" class="btn btn-primary">View Document</button></a>
								<?php }
								   else
								   {?>
								         <a href="#" target="_blank"><button type="button" class="btn btn-primary disabled" id="view_doc">View Document</button></a>
								   <?php }?>
								   
							  
							</div>
						
							<form action="<?php echo base_url();?>index.php/Customer/Store_consent" method="post">
								<div class="row justify-content-center " style="margin-top:20px;">
									<div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
										<label> Your Name(as on aadhar Card)</label>
									</div>
									
								</div>
								<div class="row justify-content-center " >
									<div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
										 <input class="form-control w-50" type="text" placeholder="Enter Name" name="name" id="name" value="<?php if(!empty($cust_info)){echo $cust_info->FN;if($cust_info->MN!=" "){echo " ".$cust_info->MN;} echo " ".$cust_info->LN; } ?>" required readonly >
										 <input type="text" hidden value="<?php if(isset($link)){ echo $link;}?>" name="link" id="link">
										  <input type="text" hidden value="<?php if(isset($id)){ echo $id;}?>" name="UID" id="UID">
									</div>
								</div>
								<div class="row justify-content-center " style="margin-top:20px;">
									<div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
										 <?php if(isset($link))
											 {
												  if ( isset($_GET['success']) && $_GET['success'] == 1 )
												  {?>
												 <button type="submit" class="btn btn-primary disabled" >Submit</button>
											 <?php }
											       else{?>
													    <button type="submit" class="btn btn-primary " id="submit1">Submit</button>
											 <?php }
											 }

											 else
											 {?>
											  <button type="submit" class="btn btn-primary disabled"  id="submit">Submit</button>
											 <?php }?>
									</div>
								</div>
								
							</form>
							<div style="margin-top: 20px;" class="row col-12 justify-content-center">
									<div>			
									 If Your Mobile Number Not Link With Aadhaar do<a style="color: #007bff"  href="<?php echo base_url()?>index.php/Customer_mobile_otp"> Mobile OTP Verification</a>
									</div>
								</div>
						</div>
					</div>
			    </div>
		    </div>
		</div>
	</div>
		<script>
		    $('#view_doc').on('click',function(e)
                        {
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Upload Your Documents", "warning");
								
							}
						}
					 );
		    $('#submit').on('click',function(e)
                        {
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Upload Your Documents", "warning");
								
							}
						}
					 );
					  $('#submit1').on('click',function(e)
                        {
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Your Aadhaar E-Sign is Done.", "warning");
								
							}
						}
					 );
		</script>