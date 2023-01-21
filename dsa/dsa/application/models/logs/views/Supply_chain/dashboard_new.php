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
			    	<div style="margin-bottom: 10px;"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/dsa/profile"><button type="button" class="btn btn-info">Lets do it !!</button></a></div>
				</div>				
			</div>
		
		</div>
	</div>
<?php }
else
{
?>

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
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/addretailerall" class="btn modal_test"><b><?php echo $dashboard_data['retailer_count']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:green;"></i>
									Approved Retailers
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/addretailerall?s=Approved" class="btn modal_test"><b><?php echo $dashboard_data['retailer_Approved']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
								Pending Retailers
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/addretailerall?s=pending" class="btn modal_test"><b><?php echo $dashboard_data['retailer_incomplet']?></a></th>

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
 						      <th scope="col">Distributors</th>
							   <th scope="col"></th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:orange;"></i>
									Total Distributors 
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managedistributor?s=all" class="btn modal_test"><b><?php echo $dashboard_data['distributor_count']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:green;"></i>
									Approved Distributors
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managedistributor?s=Approved" class="btn modal_test"><b><?php echo $dashboard_data['distributors_Approved']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
								Pending Distributors
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/distributor/managedistributor?s=pending" class="btn modal_test"><b><?php echo $dashboard_data['distributor_incomplet']?></a></th>

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
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Supply_chain/managerequestall?s=all" class="btn modal_test"><b><?php echo $dashboard_data['All_request']?></b></a></th>

						    </tr>
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:orange;"></i>
									SCFO Pending For Approval 
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Supply_chain/managerequestall?s=SCFO Pendig for approval" class="btn modal_test"><b><?php echo $dashboard_data['scfo_pending_for_approval']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:green;"></i>
									Approved request
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Supply_chain/managerequestall?s=SCFO Approved" class="btn modal_test"><b><?php echo $dashboard_data['scfo_approval_request']?></b></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
								rejected request
								</th>
   								
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Supply_chain/managerequestall?s=SCFO Rejected" class="btn modal_test"><b><?php echo $dashboard_data['scfo_reject_request']?></a></th>

						    </tr>
    						
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
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


<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>