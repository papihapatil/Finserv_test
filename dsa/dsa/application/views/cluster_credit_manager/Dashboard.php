
<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">
<div class="row">
		
	<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">ALL CUSTOMERS STATUS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Active
	 							</th>
	   							<th scope="col"><?php echo $dashboard_data['in_progress']+$dashboard_data['in_progress2'];?></th>

  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									Hold
 								</th>
   								<th scope="col"><?php echo $dashboard_data['hold'];?></th>
   				
   									<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/hold_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
   
    						</tr>
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Reject
								</th>
   								<th scope="col"><?php echo $dashboard_data['rejected'];?></th>
   								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Rejected_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
						    </tr>
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-4 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start" >
					<table class="table" >
  						<thead>
    						<tr>
 						      <th scope="col">CUSTOMERS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Total Customers
	 							</th>
	   							<th scope="col"><?php echo ($dashboard_data['cust_count_all']);?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/credit_manager_user/customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									Total Customers For PD
 								</th>
   								<th scope="col"><?php echo ($dashboard_data['cust_count_PD']);?></th>
       							<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/credit_manager_user/customers_pd" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
    						</tr>
    						
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-4 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
    							<th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									
								</th>
 						      <th scope="col">SANCTION RECOMMENDATION</th>
  								
   								<th scope="col"><?php echo $dashboard_data['recommendations'];?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Cluster_credit_manager/sanction_recommendations" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
  						    </tr>
  						     <tr>
    							<th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
							    </th>
 						      <th scope="col">SANCTION LETTERS</th>
  								
   								<th scope="col"><?php //echo $dashboard_data['recommendations'];?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Sanction_letters" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>







</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: ""
	},
	subtitles: [{
		text: "Customers Status"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->
<script src="<?php echo base_url(); ?>js/canvasjs.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>