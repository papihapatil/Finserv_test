<!DOCTYPE html>
<?php 
$CM_ID=$this->session->userdata('ID');
//echo $credit_manager_id;
//exit();

?>
  
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
        <div class="container">
            <div class="row">
            	<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:40px;">                    	
						<!--<small class="screen-title-txt">Customers </small> -->
                    </div>                    
                </div>     
             
            </div>
        </div>
</div>

<body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="empTable" class="display" style="width:100%">
																			<thead>
																				<tr>
					    														
																					<th>Application Id</th>
																					<th>Name</th>
																					<th>Date</th>
																					<!--<th>Application Status</th>-->
																					<th>Refered By</th>
																					<th>Bureau</th>
																					<th>Pre-Cam</th>
																					<th>Cam</th>
																					<th>Vendors</th>
																					<th>PD</th>
																					<th>Sanction Letter</th>
																					<th>MITC</th>
																			    	<th>Action</th>
																				
																					
																					
																					<!-- <th>Rule Engine</th> -->
																				</tr>
																			</thead>
																			
																	</table>
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
        $(document).ready(function(){
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                  
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/Credit_manager_user/Credit_user_customers_PG"
                },
             
                
                'columns': [

                    { data: 'ID'},
                    { data: 'FN' },
                    { data: 'Created_on' },
                    //{ data: 'Application_Status' },
                    { data: 'Referred_by' },
                    { data: 'Bureau_reports' },
                    { data: 'Pre_cam' },
                   
					{ data: 'CAM' },
					{ data: 'SendToVendors' },
                    { data: 'PD' },
                    { data: 'Sanction_letter' },
                    { data: 'MITC' },
                    { data: 'Action'}
                   


                ],
            });
            
            //$('#empTable').DataTable().column(0).visible(false);
        });
        </script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->


<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>
