
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
<!--<div class="col-sm-12"><h4>ALL USERS</h4><hr></div>-->
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
								<!--<th><a style="margin-left: 8px; "  href="" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>-->


  						    </tr>
   							<tr>
       						    <th scope="col"> 
       						    	<i class="fa fa-star fa-lg" style="color:orange;"></i>
 									Hold
 								</th>
   								<th scope="col"><?php echo count($dashboard_data['hold']);?></th>
								<!--<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/hold_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>-->

   
    						</tr>
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Reject
								</th>
   								<th scope="col"><?php echo count($dashboard_data['rejected']);?></th>
								<!--<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Rejected_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>-->

						    </tr>
						      <!-- <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									REVERT
								</th>
   								<th scope="col"><?php //echo count($dashboard_data['rejected']);?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/REVERT_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

						    </tr>-->
						    
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
 						      <th scope="col">BUREAU COUNTS</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Sanction Letters 
								</th>
   								<th scope="col"><?php //echo $dashboard_data['sanction_letter_values'];?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Sanction_letters" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Sanction Recommendations
								</th>
   								<th scope="col"><?php //echo $dashboard_data['sanction_recommendations'];?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Sanction_recommendations" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

						    </tr>
						    <tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
									Manage Sanction Letter And MITC Values 
								</th>
   								<th scope="col"></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/MSLV" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

						    </tr>
    						
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>



	<div class="col-sm-12 col-lg-12">
      	<div  class="card ">
      		<div  style="margin:2%;">
	    	<table id="example" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	            <tr>
	            
	                <th>ROLE</th>
	                <th>TOTAL</th>
	                <th>MORE INFO</th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td>CUSTOMERS</td>
	                <td><?php echo $dashboard_data['cust_count']?></td>
	             <!--   <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>-->
				 <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Admin_customers" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
				</tr>
	            <tr>
	                <td>HR</td>
	                <td><?php echo $dashboard_data['HR_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Hr?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	           <!-- <tr>
	                <td>DSA</td>
	                <td><?php echo $dashboard_data['dsa_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/dsa?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>-->
	            <tr>
	                <td>CREDIT MANAGERS</td>
	                <td><?php echo $dashboard_data['credit_user_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/credit_manager_user?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	            <!--<tr>
	                <td>CONNECTORS</td>
	                <td><?php echo $dashboard_data['connector_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Connector?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>-->
	            <tr>
	                <td>CLUSTER MANAGERS</td>
	                <td><?php echo $dashboard_data['cluster_manager_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Cluster_Manager?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	             <tr>
	                <td>BRANCH MANAGERS</td>
	                <td><?php echo $dashboard_data['branch_manager_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/branch_manager?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	            <tr>
	                <td>RELATIONSHIP OFFICERS</td>
	                <td><?php echo $dashboard_data['RO_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Relationship_Officer?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	             <!--<tr>
	                <td>DSA MANAGERS</td>
	                <td><?php echo $dashboard_data['manager_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/manager?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>-->
	            <!--<tr>
	                <td>DSA CSR'S</td>
	                <td><?php echo $dashboard_data['csr_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/csr?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>-->
	            <tr>
	                <td>CPA/Operations User</td>
	                <td><?php echo $dashboard_data['operations_user']?></td>
	                <td><a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/admin/Operations_user?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	            <tr>
	                <td>AREA MANAGERS</td>
	                <td><?php echo $dashboard_data['area_manager_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Area_Manager?s=all" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	            <tr>
	                <td>LEGAL USERS</td>
	                <td><?php echo $dashboard_data['legal_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Legal" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	          <!--  <tr>
	                <td>IDCCR USERS</td>
	                <td><?php echo $dashboard_data['Idccr_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/IDCCR_USERS" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr> -->
    			<!--<tr>
	                <td>LEADS</td>
	                <td><?php echo $dashboard_data['lead_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/View_Lead" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>-->
	           <!-- <tr>
	                <td>LEGAL</td>
	                <td><?php echo $dashboard_data['legal_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Legal" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>-->
	            <tr>
	                <td>TECHNICAL USERS</td>
	                <td><?php echo $dashboard_data['technical_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/Technical" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
				<tr>
	                <td>FI USERS</td>
	                <td><?php echo $dashboard_data['FI_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/FI" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
                 <tr>
	                <td>RCU USERS</td>
	                <td><?php echo $dashboard_data['RCU_count']?></td>
	                <td><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/RCU" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></td>
	            </tr>
	  
	  
	          
	        </tbody>
	     
	    	</table>
	    </div>
		</div>
    </div>
<!--<div class="col-sm-12"><h4>OTHER</h4><hr></div>
<div class="row">
  
	<div class="col-sm-6 col-lg-2">
	<a href="<?php echo base_url();?>index.php/admin/customer_applied_loan?s=all">
		<div class="card text-white bg-gradient-danger">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg"><?php echo $dashboard_data['applied_loan_count']?></div>
					<div style="margin-bottom: 10px;">Applied for Loans</div>
				</div>				
			</div>
		</div>
	</a>
	</div>

	<div class="col-sm-6 col-lg-2">
		<div class="card text-white bg-gradient-success">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg">0</div>
					<div style="margin-bottom: 10px;">Approved Loans</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-2">
		<div class="card text-white bg-gradient-primary">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg">0</div>
					<div style="margin-bottom: 10px;">Pending DSA Payment</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-2">
	<a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/loan_application_status?s=all">
		<div class="card text-white bg-gradient-primary">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div style="margin-bottom: 0px;">Total Loan Application Status</div>	<br>	
				</div>
			
			</div>
		</div>
    </a>
	</div>
		<div class="col-sm-6 col-lg-2">
	   <a class="c-header-nav-link" href="<?php echo base_url();?>index.php/Help/view_issue">
	   <div class="card text-white bg-gradient-danger">
			   <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				  <div>
				       <div class="text-value-lg"><?php echo $dashboard_data['issue_count']?></div>
					       <div style="margin-bottom: 0px;">View Issue</div> <br>	
				       </div>
		          </div>
		       </div>
        </div>
       </a>
	</div>
</div>-->
<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Delete User DATA from System</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								All Users
	 							</th>
	   							<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/admin/All_users" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

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
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>
