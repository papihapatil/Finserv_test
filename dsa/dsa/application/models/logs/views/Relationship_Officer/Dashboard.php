<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">
<div class="row">
<?php if(!empty($row)){  if($row->Profile_Status!="Complete")  
							{
?>	
<div class="col-sm-6 col-lg-3">
		<div class="" style="background-color:white;border: 0;border-radius:3px 3px 3px 3px; box-shadow: 0 1px 1px 0 rgb(60 75 100 / 14%), 0 2px 1px -1px rgb(60 75 100 / 12%), 0 1px 3px 0 rgb(60 75 100 / 20%);">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<label>Your Profile seems to be incomplete . For accessing more features please complete your profile.</label>
			    	<div style="margin-bottom: 10px;"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile"><button type="button" class="btn btn-info">Lets do it !!</button></a></div>
				</div>				
			</div>
			
		</div>
	</div>
<?php 
		}
		else
		{
        ?>
		
	
	<div class="col-sm-6 col-lg-2">
	<a href="<?php echo base_url();?>index.php/admin/customers_allusers">
		<div class="card text-white bg-gradient-info">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg"><?php echo $dashboard_data['cust_count']?></div>
					<div style="margin-bottom: 10px;">Customers</div>
				</div>
			</div>
		</div>
	</a>
	</div>
	
	<!--	<div class="col-sm-6 col-lg-2">
	
		<div class="card text-white bg-gradient-info">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
		<a href="<?=base_url('index.php/Relationship_Officer/alldownload_excel')?>">
					<i class="fa fa-download "style='font-size:20px; color:green;'></i></a>
					<div style="margin-bottom: 10px;">Download</div>
						
				</div>
			</div>
		</div>
	
	</div>-->
	
	

<div class="row">
<!--------------------added by pooja--------------------------------->
<div class="col-sm-4 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Loan Mitra</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Loan Mitra Meetings(Month)
	 							</th>
	   							<th scope="col"><?php echo $current;?></th>
	   								<th><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Relationship_Officer/RO_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Today's Meetings
								</th>
   								<th scope="col"><?php echo $today;?></th>
   										<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Relationship_Officer/Today_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>
								
							</tr>
							
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	
	
	<div class="col-sm-4 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">NTB Customer</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								NTB Meetings in  month
	 							</th>
	   							<th scope="col"><?php  echo $ntbcurrent;?></th>
	   								<th><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Relationship_Officer/Ntb_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							<!--<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									INTERNAL BUREAU
 								</th>
   								<th scope="col"><?php echo ntbtoday;?></th>
   								<th><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/admin/internal_bureau_count" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
   
    						</tr>-->
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Today's Meetings
								</th>
   								<th scope="col"><?php echo $ntbtoday;?></th>
   										<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Relationship_Officer/Todayntb_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>
						    </tr>
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	
	<div class="col-sm-4 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Existing Customer</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Existing Meetings in  month
	 							</th>
	   							<th scope="col"><?php echo $existing;?></th>
	   								<th><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Relationship_Officer/Existing_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Today's Meetings
								</th>
   								<th scope="col"><?php echo $existingtoday;?></th>
   										<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Relationship_Officer/Todayexisting_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>
						    </tr>
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	
	<div class="col-sm-4 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Lead Assigned</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Lead Meetings in  month
	 							</th>
	   							<th scope="col"><?php echo $leadcurrent;?></th>
	   								<th><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Relationship_Officer/Lead_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Today's Meetings
								</th>
   								<th scope="col"><?php echo $leadtoday;?></th>
   										<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Relationship_Officer/Todaylead_souring" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>
						    </tr>
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	<div class="col-sm-4 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">BUREAU PULL</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								BUREAU Pull in  month
	 							</th>
	   							<th scope="col"><?php echo $bureau_pull;?></th>
	   								<th><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Relationship_Officer/Bureaupull" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							<!--<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									INTERNAL BUREAU
 								</th>
   								<th scope="col"><?php echo ($dashboard_data['internal_bureau_count']);?></th>
   								<th><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/admin/internal_bureau_count" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
   
    						</tr>-->
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Today's Pull
								</th>
   								<th scope="col"><?php echo $bureautoday;?></th>
   										<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Relationship_Officer/Todaypull" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></th>
						    </tr>
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	
		<?php
		}







}?>

</div>


<!--<div class="col-sm-6 col-lg-3">
		<div class="" style="background-color:white;border: 0;border-radius:3px 3px 3px 3px; box-shadow: 0 1px 1px 0 rgb(60 75 100 / 14%), 0 2px 1px -1px rgb(60 75 100 / 12%), 0 1px 3px 0 rgb(60 75 100 / 20%);">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<label>Want to know credit bureau score ?</label>
					<h4>Credit Bureau</h4>
					<br>
					<div style="margin-bottom: 24px;"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/Front/credit_bureau" target="_blank"><button type="button" class="btn btn-info">Click here</button></a></div>
				
				</div>				
			</div>
		
		</div>
	</div>-->
	
	
	
</div>
</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>
<script type="text/javascript">
            function showMessage() {
                alert("Opps! Your profile is incomplete.Please complete your profile for more features.");
            }
        </script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>