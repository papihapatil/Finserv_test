

<!--dashboard changes on 5-5-2022 -->
<?php
 $Active= count($dashboard_data['in_progress'])+count($dashboard_data['in_progress2']);
 $HOLD=count($dashboard_data['hold']);
 $rejected=count($dashboard_data['rejected']);
 $dataPoints = array( 
	array("label"=>"ACTIVE", "y"=>$Active),
	array("label"=>"HOLD", "y"=>$HOLD),
	array("label"=>"REJECTED", "y"=>$rejected),

)
 
?>
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
	   							<th scope="col"><?php echo count($dashboard_data['in_progress'])+count($dashboard_data['in_progress2']);?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>



  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									Hold
 								</th>
   								<th scope="col"><?php echo count($dashboard_data['hold']);?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/hold_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

   
    						</tr>
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Reject
								</th>
   								<th scope="col"><?php echo count($dashboard_data['rejected']);?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Rejected_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

						    </tr>
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-6 col-lg-4">
    <div id="chartContainer" style="height: 220px; width: 100%;"></div>
    </div>


	<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">COUNTS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
										Customers In System
	 							</th>
	   							<th scope="col"><?php echo ($dashboard_data['cust_count']);?></th>
	   								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/Edit_all_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
									   Incomplete Loan Application
 								</th>
   								<th scope="col"><?php echo $dashboard_data_3;?></th>
   							<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
    						</tr>
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									   Loan Application For CAM
								</th>
   								<th scope="col"><?php echo $dashboard_data_2;?></th>
   										<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>
						    </tr>
						
							
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>
