
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
												 
													 <div class="col-sm-3" style="padding-left:-1px;">
													   <label style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">Customer With Consent&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer_consent">
														  <i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
												   </div>
												  
			                                       <div class="col-sm-2" >
                                                   <input type="text" hidden value="<?php echo $s;?>" id="filter">

													   <select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_customers_all_BM">
														   <option value="">Select Filter</option>
														   <option value="all">All Customers</option>
														   <option value="Application_Completed">Aadhar E-sign Completed</option>
														   <option value="Application_InCompleted">Aadhar E-sign not Completed</option>
														   <option value="Cam_Completed">Cam Completed</option>
														   <option value="PD_Completed">PD Completed</option>
														   <option value="income_details_complete">income details complete</option>
														   <option value="Created">Created</option>
                                                           <option value="reject">reject</option>
														  
													   </select> 
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
															<table id="empTable" class="display" style="width:100%">
																<thead>
																	<tr>
																	  <th  hidden> id </th>
																	   
																	   <th>Name</th>
																	  <!-- <th>Email Id</th>
																	   <th>Mobile No</th> -->
																	   <th>Customer Status</th>
																	    <th>Application Status</th>
																	   <th>Loan Type</th>
																	 
																	   <th>Referred By</th>
																	   <th>Created On</th>
																	   <th>Last Updated On </th>
																	  <!-- <th>Edit</th>-->
																	   <th>Start Process</th>
																	   <!-- <th>GONOGO</th> -->
																	   <th>Bureau & Documents</th>
																	   <th>Pre CAM</th>
																	   <th>CAM</th>
																	   <th>PD</th>
																	  <!--  <th>loan</th>-->
																		<!--<th>Calculate eligibilty</th> -->
																		
																		<?php if($userType=='branch_manager') { ?>
																		<th> Loan Disburst Form </th>
																		<th>Amortization Schedule</th>
																		<?php } ?>
																	 </tr>
																</thead>
																
															</table>
														</div>
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
                    //'url':'ajaxfile.php'
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/Admin/Branch_customers_PG",
					'data':{filter:filter},
                },
             
                
                'columns': [

                   
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
                    { data: 'loan_form'},
                    { data: 'Amortisation'},
                     


                ]
				
            });
            
           // $('#empTable').DataTable().column(0).visible(false);
        });
        </script>
	<script >
		$(".modal_test ").on("click", function(){
		  var dataId = $(this).attr("data-id");
		  $(".idform").val(dataId);
	  
   });
   </script>
</body>
</html>
