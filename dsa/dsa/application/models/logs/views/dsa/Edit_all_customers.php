
<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">

<div class="row">
<div class="col-md-12">
<div class="card">

<div class="card-body">
<div class="row">
<div class="col-sm-12">

<div >
        <div class="">
			
			<div class="row">
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;"></div>
		
					
				   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						</div>
						
				<div class="col-sm-2" >
			    <input type="text" hidden value="<?php echo $s;?>" id="filter">
				
							
				</div>
		
		   
	
            </div>
						
        </div>
		<hr>
</div>


<body class="wide comments example">

	
<div class="fw-body">
	<div class="content">
	<div style="overflow-x:auto;">
		<div class="demo-html">
			<table id="empTable" class="table-responsive display" style="width:100%;">
				<thead>
					<tr>
						
					    
					
						<th>Customer Name</th>
						<th>Application Status</th>
						<th>Referred by</th>
						<th>Login Date</th>
						<th>Edit</th>
						<th>CAM</th>
						<th>PD</th>
						<th>BUREAU</th>
			

						
					
						
					</tr>
				</thead>
				
			
			</table>
		</div>
	</div>
			
	</div>
</div>
</div>

</body>



</div>
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
<script>
	function demo()
	{
		var $var=document.getElementById("filter_name");
		alert($var);
	}
</script>
<script>
        $(document).ready(function(){
        	var filter = document.getElementById("filter").value;
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    
					'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/Operations_user/edit_all_customers_with_pagination",
					'data':{filter:filter},
                },
                'columns': [
                  
				    
              
					{ data: 'Cust_name' },
					{ data: 'Application_Status' },
					{ data: 'Referred_by' },
					{ data: 'Login_date' },
					{ data: 'Edit' },
					{ data: 'CAM' },
					{ data: 'PD' },
					{ data: 'BUREAU' },
		
                ],
				

            });
			
        });
        </script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>