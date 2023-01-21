<body style="background-color: #f2f2f2; width: 100%;">
		
	<div class="row justify-content-center">
		<div >
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<form id="verify_cus_otp" action="<?php echo base_url(); ?>index.php/Customer_mobile_otp/mobile_otp_verify" method="POST">
					
						<span class="signup100-form-title p-b-43">
							<?php if($error !=' ') {?>
								<div class="alert alert-danger" role="alert">
							    	<?php echo validation_errors(); ?>
							    	 <p style="font-size: 14px;"> <?php echo $error;?></p>
							    </div>
							<?php } ?>	
							<br><br><span style="padding: 10px;">Verify OTP, sent on this <?php if($type=='on'){echo 'NUMBER';}else{ echo 'Email';} ?></span>
						</span>					 															
					

					<span class="signup100-form-title p-b-43">
						<b><?php echo $mobile?></b>
					
					</span>					 															

					<span class="signup100-form-title p-b-43">
						<p style="font-size: 12px;">DON'T GO BACK OR DON'T REFRESH SCREEN</p> 					
					</span>					 															
					
					<div class="wrap-edit validate-input" data-validate="OTP is required">
						<input placeholder="ENTER-OTP" class="input100" type="text" name="otp">
						<span class="focus-input100"></span>
					</div>					
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							VERIFY
						</button>
					</div>
                    </br>
					<div class="text-center">
						<p id="demo" style="color:green; font-size:20px;"></p>	
					</div>
                  		<input type="number" name="count_resend" id="count_resend" value="<?php if(isset($_SESSION['Resend_count'])){echo $_SESSION['Resend_count'];}else{echo '0';}?>" hidden>
					</form>
										
			</div>
		</div>
		
	</div>
	<div style="margin-top: 10px; " class="container-login100-form-btn" >
		<form  action="<?php echo base_url(); ?>index.php/Customer_mobile_otp/resendOtp" method="POST" id="resend" style="display:none">
			<button style="background-color: #e8f2f1; color: teal" class="login100-form-btn" id="resend_otp">
				RESEND OTP
			</button>
		</form>
	</div>	
	

	<!-- Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
<script>
$(document).ready(function () 
{
	 Date.prototype.add20minutes = function(){
		 return this.setMinutes(this.getMinutes() + 3);
		 //return this.setSeconds(this.getMinutes() + 1);
     // return this.setSeconds( this.getSeconds() + 10 );
		}
	 var d = new Date();
     var a=d.add20minutes(); 
	 var countDownDate = new Date(a);
	 //alert(countDownDate.getHours() + " hrs"+' '+countDownDate.getMinutes() + " min"+' '+countDownDate.getSeconds() + " sec");
	var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s "+ " To Resend OTP";
    
  // If the count down is over, write some text 
  if (distance <= 0) {
    clearInterval(x);
    document.getElementById("resend").style = "display:block";
	document.getElementById("demo").style = "display:none";
  }
}, 1000);
});
 $("#resend_otp").click(function () {
	 var count_resend=$('#count_resend').val();
	 if(count_resend >= 3)
	 {
		 document.getElementById("resend").style = "display:none"; 
		 document.getElementById("demo").style = "display:block";
		 document.getElementById("demo").innerHTML = " You Have Already Resend OTP 3 Times Please Log Out And Try Again";
		  var url = window.location.origin+"/dsa/dsa/index.php/Customer_mobile_otp/unset_count";      
	
		 $.ajax({
						 type: "POST",
						 url: url
						
						 
						
				  });
				  return false;
	 }
	 else{
		
	 var url = window.location.origin+"/dsa/dsa/index.php/Customer_mobile_otp/set_count";      
	
	 $.ajax({
                     type: "POST",
                     url: url,
					 data:{count_resend:count_resend}
					 
                    
              });
	 }
	  
 });
</script>