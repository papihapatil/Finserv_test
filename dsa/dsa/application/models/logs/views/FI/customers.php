
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
												   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
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
																	  <th >Application id</td>
																	   <th>Name</th>
																	   <th>Email</th>
																	   <th>Mobile</th>
																	   <th>Loan Type</th>
																	   <th>Status</th>
																	   <th>FI Remark</th>
																	   <th>View Details</th>
																	   <?php if($this->session->userdata("USER_TYPE")=='FI'){?>
																	   <th>Upload Legal Document</th>
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
   <script>
        $(document).ready(function(){
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    //'url':'ajaxfile.php'
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/FI/customers_PG"
                },
             
                
                'columns': [

                    {data: 'ID'},
                    { data: 'FN' },
                    { data: 'Customer_status' },
                    { data: 'Application_Status' },
                    { data: 'Loan_Type' },
                    { data: 'Referred_by' },
                    { data: 'Created_on' },
                    { data: 'Last_updated_on' },
                    { data: 'UNIQUE_CODE'},
                    { data: 'Bureau_reports'},
                  

                ],
            });
            
            $('#empTable').DataTable().column(0).visible(false);
        });
        </script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
	<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
