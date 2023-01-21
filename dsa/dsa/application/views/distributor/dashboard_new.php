<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">
<div class="row">
<?php if(!empty($row)){ if($row->Profile_Status!="Complete") { ?>	
<div class="col-sm-6 col-lg-3">
		<div class="" style="background-color:white;border: 0;border-radius:3px 3px 3px 3px; box-shadow: 0 1px 1px 0 rgb(60 75 100 / 14%), 0 2px 1px -1px rgb(60 75 100 / 12%), 0 1px 3px 0 rgb(60 75 100 / 20%);">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<label>Your Profile seems to be incomplete . For accessing more features please complete your profile.</label>
			    	<div style="margin-bottom: 10px;"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/update_basic_profile_2?id="<?php if(!empty($row)){ echo $row->UNIQUE_CODE;}?>><button type="button" class="btn btn-info">Lets do it !!</button></a></div>
					<!--<div style="margin-bottom: 10px;"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile"><button type="button" class="btn btn-info">Lets do it !!</button></a></div>-->
				</div>				
			</div>
			
		</div>
	</div>
<?php }
else
{
?>
<?php if ($status=='Approved'){?>

	<div class="col-sm-6 col-lg-4">
        
		<a>
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Retailers</th>
							   <th scope="col"></th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:orange;"></i>
									Total Retailers 
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/viewretailer?s=all" class="btn modal_test"><b><?php echo $dashboard_data['retailer_count']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:green;"></i>
									Approved Retailers
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/viewretailer?s=Approved" class="btn modal_test"><b><?php echo $dashboard_data['retailer_Approved']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
								Pending Retailers
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/viewretailer?s=pending" class="btn modal_test"><b><?php echo $dashboard_data['retailer_incomplet']?></a></th>

						    </tr>
    					
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	<div class="col-sm-6 col-lg-4">
        
		<a>
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Manage Request at Distributor</th>
							   <th scope="col"></th>
  						    </tr>
  						</thead>
 						<tbody>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:orange;"></i>
								All request
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managerequest?s=all" class="btn modal_test"><b><?php echo $dashboard_data['All_request']?></b></a></th>

						    </tr>
    					
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:green;"></i>
									Approved request by Distributor
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managerequest?s=Approved By Distributor" class="btn modal_test"><b><?php echo $dashboard_data['request_approved_by_distributor']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
								rejected request Distributor
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managerequest?s=Reject by distributor" class="btn modal_test"><b><?php echo $dashboard_data['request_reject_by_distributor']?></a></th>

						    </tr>
    						
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	<div class="col-sm-6 col-lg-4">
        
		<a>
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Manage Request at SCFO</th>
							   <th scope="col"></th>
  						    </tr>
  						</thead>
 						<tbody>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:orange;"></i>
								All request
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managerequest?s=all" class="btn modal_test"><b><?php echo $dashboard_data['All_request']?></b></a></th>

						    </tr>
    					
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:green;"></i>
									Approved request by SCFO
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managerequest?s=SCFO Approved" class="btn modal_test"><b><?php echo $dashboard_data['request_approved']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
								rejected request SCFO
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managerequest?s=SCFO Rejected" class="btn modal_test"><b><?php echo $dashboard_data['reject_request']?></a></th>

						    </tr>
    						
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	<?php } ?>
	
	</div>


<div class="row">
	


	
<?php

}  }?>





</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>