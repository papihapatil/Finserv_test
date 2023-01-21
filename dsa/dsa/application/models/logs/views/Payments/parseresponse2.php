

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
			
			
		</div>
		

		

		

		<!-- work details ------------------------------- -->

		
		
		<!-- work details ------------------------------- -->

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Mandate Information </span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;"></span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-bottom: 20px; color: black; font-size: 14px;">
				

			</div>

			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				
  				<table class="table table-bordered">
  
  <tbody>
  
  <tr>
      <th scope="row">response code</th>
      <td><?php if(isset($responsecode)) { echo $responsecode; } ?></td>
      
    </tr>
  <tr>
      <th scope="row">message</th>
      <td><?php if(isset($message)) { echo $message; } ?></td>
      
    </tr>
  
	
	<tr>
      <th scope="row">Amount</th>
      <td><?php if(isset($txn_amt)) { echo $txn_amt; } ?></td>
      
    </tr>
	
	<tr>
      
      <td colspan="2"><?php if(isset($message)) { echo $message; } ?> 
	  <?php  if(isset($responsecode) && $responsecode == '0300') 
	  { 
  
		echo " Mandate Registration completed successfully";  
		
	} elseif(isset($responsecode) && $responsecode == '0392' )
	{
		echo " Mandate Registration aborted by user";
	}
	elseif(isset($responsecode) && $responsecode == '0398')
	{
		echo " Mandate Registration initiated";
	}
	

	  ?></td>
      
    </tr>
	
	
	
		
	
	
    
  </tbody>
</table>
  				

			</div>
			
			

			
		</div>		


		

		

					
		


	</div>
</form>