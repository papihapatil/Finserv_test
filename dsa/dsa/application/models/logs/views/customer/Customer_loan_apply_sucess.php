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
                    	<small class="screen-title-txt">Loan Application</small>
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
									<h2 class="text-center" style="color:green;">You have successfully applied for loan</h2>
							</div>
						</div>
					</div>
			    </div>
		    </div>
		</div>
	</div>