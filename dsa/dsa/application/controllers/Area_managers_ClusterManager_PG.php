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
														<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Add Cluster Manager&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=Cluster_Manager">
						   								<i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
													</div>
				   									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				   									</div>
													<div class="col-sm-2" >
                                                          <input type="text" hidden value="<?php echo $s;?>" id="filter">
																	<select class="form-control" aria-label="Default select example" name="select_filters" id="select_dropdown_filters_branchManaer_admin">
																			<option>Select Filter</option>
																			<option value="all">All Branch Managers</option> 
																			<option value="Complete">Completed Profile</option>
																			<option value="Incomplete">Incomplete Profile</option>
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
					    															<th>Name</th>
																					<th>Email</th>
																					<th>Mobile</th>
																					<th>Profile Status</th>
																					<th>Date</th>
																					<th>Action</th>
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
													         <div class="modal-header">
																<h4 class="modal-title" id="myModalLabel">DELETE </h4>
																	<button type="button" class="close" 
																	   data-dismiss="modal">
																		   <span aria-hidden="true">&times;</span>
																		   <span class="sr-only">Close</span>
																	</button>                
															</div>
															<div class="modal-body">
																<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_Cluster_Manager" method="POST" id="change_contact_status">
																	<div class="form-group">
																		<label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Branch Manager?</label>	                         
																		<input name="id" type="number" class="idform" hidden  />
																	</div>                  
																	<div class="modal-footer">
																		<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
																		<button type="submit" class="btn btn-primary">
																			DELETE IT
																		</button>
																	</div>
																</form>                
															</div>            
														</div>
													</div>
												</div>
												<script>
													$(".modal_test ").on("click", function(){
													var dataId = $(this).attr("data-id");
													$(".idform").val(dataId);
													});
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
						'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/admin/Area_managers_ClusterManager_PG",
						'data':{filter:filter},
					},
                    'columns': [
					{ data: 'FN' },
					{ data: 'Email' },
					{ data: 'mobile' },
                   
					{ data: 'Profile_Status' },
				
					{ data: 'Created_on' },
					{ data: 'Action' },
                ]
	          });
			});
			  var value=$("#Admin_CM_filter").val();
      // alert(value);

		if(value=='Current_Month')

		{
				 var el_down = document.getElementById("Start_Date");
				 var date = new Date();
				// document.write("Current Date: " + date );
				 var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);

				var dd = firstDay.getDate();
				var mm = firstDay.getMonth() + 1;

				var yyyy = firstDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var firstDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#CM_Start_Date_filter').val(firstDay);
				$('#CM_Start_Date_filter').prop('readonly', true);
				var lastDay =
				new Date(date.getFullYear(), date.getMonth() + 1, 0);
				var dd = lastDay.getDate();
				var mm = lastDay.getMonth() + 1;

				var yyyy = lastDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var lastDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#CM_End_Date_filter').val(lastDay);
				$('#CM_End_Date_filter').prop('readonly', true);
		}
		if(value=='Previous_Month')

		{
				 var el_down = document.getElementById("Start_Date");
				 var date = new Date();
				// document.write("Current Date: " + date );
				 var firstDay = new Date(date.getFullYear(), date.getMonth()- 1, 1);

				var dd = firstDay.getDate();
				var mm = firstDay.getMonth() + 1;

				var yyyy = firstDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var firstDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#CM_Start_Date_filter').val(firstDay);
				$('#CM_Start_Date_filter').prop('readonly', true);
				var lastDay =
				new Date(date.getFullYear(), date.getMonth() , 0);
				var dd = lastDay.getDate();
				var mm = lastDay.getMonth() + 1;

				var yyyy = lastDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var lastDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#CM_End_Date_filter').val(lastDay);
				$('#CM_End_Date_filter').prop('readonly', true);
		}
		if(value=='Select_Range')
		{
			/*if ( $('#Start_Date').is('[readonly]') ) { $('#Start_Date').prop('readonly', false); }
			if ( $('#End_Date').is('[readonly]') ) { $('#End_Date').prop('readonly', false); }
			$('#Start_Date').val('');
			$('#End_Date').val('');*/
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);
			const Start_Date = urlParams.get('Start_Date');
			

			const End_Date = urlParams.get('End_Date');
			$('#CM_Start_Date_filter').val(Start_Date);
			$('#CM_End_Date_filter').val(End_Date);



		}







         });
			</script>
		</body>
</html>