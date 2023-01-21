
<?php
 $Active= $dashboard_data['in_progress']+$dashboard_data['in_progress2'];
 $HOLD=$dashboard_data['hold'];
 $rejected=$dashboard_data['rejected'];
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
			<!--div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
				<canvas class="chart" id="card-chart1" height="70"></canvas>
			</div-->
		</div>
	</div>
<?php 
		}
		else
		{
        ?>
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
	    <div class="col-sm-6 col-md-4">
    <div id="chartContainer" style="height: 250px; width: 100%;"></div>
	
    </div>
		

<div class="col-sm-6 col-lg-4">
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
	<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						    <th scope="col">Vendors</th>
							
							<th scope="col">Completed</th>
							<th scope="col">Under Processing</th>
  						    </tr>
							  
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           	
	 								Legal
	 							</th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/Legal_completed" class="btn modal_test"><b><?php echo $getDashboardData_5 ; ?></b></a></th>
	   							<th scope="col"><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/Legal_incompleted" class="btn modal_test"><b><?php echo $dashboard_data_4;?></b></a></th>
							


  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	
 									Technical
 								</th>
								 <th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/Technical_completed" class="btn modal_test"><b><?php echo $getDashboardData_7 ; ?></b></a></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/Technical_incompleted" class="btn modal_test"><b><?php echo $getDashboardData_6; ?></b></i></a></th>

   
    						</tr>
    						<tr>
    						    <th scope="col"> 
    						   	
									FI
								</th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/FI_completed" class="btn modal_test"><b><?php echo $getDashboardData_8 ; ?></b></a></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/FI_incompleted" class="btn modal_test"><b><?php echo $getDashboardData_10; ?></b></i></a></th>

						    </tr>
							<tr>
    						    <th scope="col"> 
    						   		
									RCU
								</th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/RCU_completed" class="btn modal_test"><b><?php echo $getDashboardData_9 ; ?></b></a></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/RCU_incompleted" class="btn modal_test"><b><?php echo $getDashboardData_11; ?></b></i></a></th>

						    </tr>
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start" >
					<table class="table" >
  						<thead>
    						<tr>
 						      <th scope="col">DISBURSEMENT PENDING DOCUMENTS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								All Documents
	 							</th>
	   							<th scope="col"><?php //echo ($dashboard_data['cust_count_all']);?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/credit_manager_user/Disbursement_Pending_Documents" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							
    						
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	<!--------------- added by priya 14-11-2022 --------------------------------------- -->
	<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">CREDIT OPS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
										Customers In System
	 							</th>
	   							<th scope="col"><?php echo ($dashboard_data_credit_ops['cust_count']);?></th>
	   								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Operations_user/Edit_all_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
									   Incomplete Loan Application
 								</th>
   								<th scope="col"><?php echo $dashboard_data_3;?></th>
   							
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
	//-------------------------------------------------------------------------------

   
	<?php
		}
}?>


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