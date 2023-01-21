
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
<?php }
else
{
?>
<div class="col-sm-6 col-lg-2">
	<a href="<?php echo base_url();?>index.php/admin/dsa_allusers?s=all">
		<div class="card text-white bg-gradient-danger">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg"><?php echo $dashboard_data['dsa_count']?></div>
					<div style="margin-bottom: 10px;">Dsa</div>
				</div>
			</div>
		</div>
	</a>
	</div>
	<div class="col-sm-6 col-lg-2">
	<a href="<?php echo base_url();?>index.php/admin/Relationship_Officer">
		<div class="card text-white bg-gradient-info">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg"><?php echo $dashboard_data['RO_count']?></div>
					<div style="margin-bottom: 10px;">Relationship Officer</div>
				</div>
			</div>
		</div>
	</a>
	</div>


	<div class="col-sm-6 col-lg-2">
	<a href="<?php echo base_url();?>index.php/admin/Connector_alluser">
		<div class="card text-white bg-gradient-warning">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg"><?php echo $dashboard_data['conn_count']?></div>
					<div style="margin-bottom: 10px;">Connector</div>
				</div>
			</div>
		</div>
	</a>
	</div>
	<div class="col-sm-6 col-lg-2">
	<a href="<?php echo base_url();?>index.php/admin/customers_allusers">
		<div class="card text-white bg-gradient-info">
			<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
				<div>
					<div class="text-value-lg"><?php echo $dashboard_data['cust_count']?></div>
					<div style="margin-bottom: 10px;">Customer</div>
				</div>
			</div>
		</div>
	</a>
	</div>
			

<?php
}





}?>

<div class="col-sm-6 col-lg-3">
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
	</div>

	

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