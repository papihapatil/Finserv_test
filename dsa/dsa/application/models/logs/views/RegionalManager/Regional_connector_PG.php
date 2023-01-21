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
													
												
				        							<div class="col-sm-3" >
														<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Add Connector&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=connector" >
						   								<i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
													</div>
	 											   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
													</div>
													<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
														<label style="margin-left:8px;">Filter : </lable>
				   									</div>
													  <div class="col-lg-2 col-md-2 col-lg-2 col-xs-2" >
													    
														<input type="text" hidden value="<?php echo $s;?>" id="filter">
														<select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_connector_all">
																<option value="">Select category</option>
																<option value="all">All</option>
																<option value="Complete">Complete</option>
																<option value="Incomplete">Incomplete</option>
															
														    </select>
										                   <input type="text" id="User_id" value=<?php echo $this->session->userdata('ID'); ?> hidden>
														</form>
												   </div>
												    <div class="col-lg-2 col-md-2 col-lg-2 col-xs-2">
													
														</form>
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
																<th hidden>ID</th>
																	<th>Name</th>
																	<th>Email</th>
																	<th>Mobile</th>
																	<th>Profile Status</th>
																	<th>Refered By</th>
																	<th>Creted at</th>
																	<th>View Profile</th>
																   
																
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
									<!-- Modal -->
									<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    									<div class="modal-dialog">
       										<div class="modal-content">
           										 <!-- Modal Header -->
           									    <div class="modal-header">
            										<h4 class="modal-title" id="myModalLabel"> FILTER BY BANK </h4>
                									<button type="button" class="close"  data-dismiss="modal">
                       									<span aria-hidden="true">&times;</span>
                      							     	<span class="sr-only">Close</span>
                									</button>                
           										</div>
            						            <!-- Modal Body -->
           										<div class="modal-body">
           							                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/dsa" method="GET" id="dsa_bnk_filter">
                									    <div class="form-group">                    
															<div class="wrap-select validate-input ">
																<label class="input100"> Select Bank Name </label> 
																<span class="focus-input100"></span>
																<input type="text" name="s" value="bnk" hidden>
																<select name="bnk_name" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						 											<option value="">None</option>
						 											<?php foreach($banks as $bank) {
																			echo "<option value='$bank->BANK_NAME'>$bank->BANK_NAME</option>";
																	}?>							  
																</select>
															</div>
                 										</div>                  
							                            <!-- Modal Footer -->
		           										<div class="modal-footer">
		                									<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL </button>
		               										<button type="submit" class="btn btn-primary">FILTER </button>
		            									</div>
                									</form>                
          										</div>            
       										</div>
    									</div>
									</div>
									<script type="text/javascript">
										$('#deleteModel').on('show.bs.modal', function (event) {
	  									var button = $(event.relatedTarget) 
	  									var recipient = button.data('id') 
	  									var modal = $(this)
	  									modal.find('.modal-body .dsa_bnk_filter').val(recipient)
										})		
									</script>
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="<?php echo base_url(); ?>js/Cluster_Manager.js"></script>

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
                   
                    'url': window.location.origin+"/dsa/dsa/index.php/RegionalManager/RM_connector_PG",
					'data':{filter:filter},
                },
             
                
                'columns': [

					
                   
                    { data: 'FN' },
					{ data: 'Email' },
					{ data: 'mobile' },
                  
					{ data: 'Profile_Status' },
					{ data: 'Refered_by' },
					{ data: 'Created_on' },
					{ data: 'profile' },


                ]
				
            });
            
        
        });
        </script>


</body>
</html>