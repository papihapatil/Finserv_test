

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
<!--<div class="col-sm-12"><h4>ALL USERS</h4><hr></div>-->
<div class="row">
	<div class="col-sm-6 col-lg-4">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						     
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:red;"></i>
    						   		 <th scope="col">Files for Disbursement</th>
									
								</th>
   								<th scope="col"><?php echo $total_files;?></th>
								<th><a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Disbursement_OPS/Files_For_Disbursement" class="btn modal_test"><i class="fa fa-edit text-right" style="color:blue;"></i></a></th>

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


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>
