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
				
    					
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
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
<script type="text/javascript">
            function showMessage() {
                alert("Opps! Your profile is incomplete.Please complete your profile for more features.");
            }
        </script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>