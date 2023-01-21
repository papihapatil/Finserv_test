
<?php
  $result = $this->session->flashdata('result');   if (isset($result)) {
	   if($result=='1'){
		   
			   $res = $this->session->flashdata('message');
			   if($res=='Customer Deleted Sucessfully')
			   {
			   echo '<script> swal("success!", "Customer Deleted Sucessfully", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
						   
			}
			else if($result=='2')
			{
				$res = $this->session->flashdata('message');
			   if($res=='Something get Wrong')
			   {
			   echo '<script> swal("warning!", "Something get Wrong", "warning");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
 }?>
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
									   <div>
										   <div class="">
											   <div class="row">
												  
													 <div class="col-sm-3" style="padding-left:0px;">
													   <label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">Customer With Consent&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer_consent">
														  <i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
												   </div>
												   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;margin-left:-8%;">
														  <label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo $customers; ?>&nbsp;&nbsp;
														  <?php if(isset($customers))
															  {
																if($customers != 0) 
																 {  ?> 
														<?php }
															   else{
														   ?>
														
													   <?php   	} }?>
													   </label>
														 <?php?>
													  </div>
												   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
															   </div>
												   <div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:13%;">
													
				                                   </div>
			                                       <div class="col-sm-2" >
												   <input type="text" hidden value="<?php echo $s;?>" id="filter">

													   <select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_customers_all">
														   <option value="">Select Filter</option>
														   <option value="all">All Customers</option>
														   <option value="Application_Completed">Aadhar E-sign Completed</option>
														   <option value="Cam_Completed">Cam Completed</option>
														   <option value="PD_Completed">PD Completed</option>
														   <option value="income_details_complete">income details complete</option>
														   <option value="Created">Created</option>
														   <option value="reject">Rejected</option>
														   <option value="Hold">Hold</option>
														 
													   </select> 
												   </div>
											    </div>
										    </div>
											<hr>
									   </div>
									   <div class="row">
											<div class="col-sm-12">
												<div >
													<div class="container">
														<div class="row" style="margin-bottom:10px">
															<div class="col-sm-6">
														    </div>
														    <div class="col-sm-3">
																<form id="credit_saction_form" method="post">
																	
																</form>
															</div>
															<div class="col-sm-3">
																<form id="credit_saction_form" method="post">
																	
																 </form>
															</div>
														</div>
													</div>
												</div>
										    </div>
									   </div>
									   <body class="wide comments example">
								
		
											<div class="content">
													<div style="overflow-x:auto;">
													    <div class="demo-html">
													        <table id="empTable" class="display" style="width:100%">
													            <thead>
													                <tr>
													                   <th>ID</th>
													                   <th>Name</th>
													                   <th>Status</th>
													                   <th>Application Status</th>
													                   <th>Loan_Type</th>
													                   <th>Referred By</th>
													                   <th>Created On</th>
													                   <th>Last Updated On</th>
													                   <th>Start Process</th>
													                   <th>Bureau</th>
													                   <th>Pre Cam</th>
													                   <th>Cam</th>
													                   <th>PD</th>
													                   
													                </tr>
													            </thead>

													        </table>
													    </div>
													</div>
											</div>
									
		

									   </body>
									   <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													 <!-- Modal Header -->
													 <div class="modal-header">
														<h4 class="modal-title" id="myModalLabel"> DELETE </h4>
														<button type="button" class="close"  data-dismiss="modal">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Close</span>
														</button>                
													  </div>
													  <!-- Modal Body -->
													  <div class="modal-body">
														   <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_customer" method="POST" id="change_contact_status">
																<div class="form-group">
																	<label  class="col-12 control-label padding-10">Are you sure you want to DELETE this customer ?</label>	                         
																	<input name="id" type="number" class="idform"  hidden />
																 </div>                  
																 <!-- Modal Footer -->
																 <div class="modal-footer">
																	<button type="button" class="btn btn-default"   data-dismiss="modal">  CANCEL  </button>
																	<button type="submit" class="btn btn-primary">   DELETE IT  </button>
																 </div>
															</form>                
													   </div>            
												</div>
											</div>
										</div>
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
                  
                    'url': window.location.origin+"/finaleap_finserv/dsa/dsa/index.php/RegionalManager/Cluster_customers_PG",
					'data':{filter:filter},
                },
             
                
                'columns': [

                    { data: 'ID'},
                    { data: 'FN' },
                    { data: 'Customer_status' },
                    { data: 'Application_Status' },
                    { data: 'Loan_Type' },
                    { data: 'Referred_by' },
                    { data: 'Created_on' },
                    { data: 'Last_updated_on' },
                    { data: 'UNIQUE_CODE'},
                    { data: 'Bureau_reports'},
                    { data: 'Pre_cam'},
                    { data: 'CAM'},
                    { data: 'PD'},
                     


                ]
				
            });
            
            $('#empTable').DataTable().column(0).visible(false);
        });
        </script>
	<script >
		$(".modal_test ").on("click", function(){
		  var dataId = $(this).attr("data-id");
		  $(".idform").val(dataId);
	  
   });
   </script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
