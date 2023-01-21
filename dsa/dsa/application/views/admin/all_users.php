
<style>
		@media only screen and (max-width:768px){
		.add{
			padding-left: 156px;
    margin-left: -5%;
    margin-top: -22px;
    margin-bottom: 28px
		}
	}
	
	</style>
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
										<div class="row">
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                        </div>
					                                       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                            
					                                       </div> 
														     <input type="text" hidden value="<?php if(isset($_GET['Start_Date'])){echo $_GET['Start_Date'];}?>" id="start_date1">
					                                       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           
					                                       </div> 
														    <input type="text" hidden value="<?php  if(isset($_GET['End_Date'])){echo $_GET['End_Date'];}?>" id="end_date1">
					                                           <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                          
                                                             <input type="text" hidden value="<?php if(isset($filter_by)){echo $filter_by;}?>" id="filter">															  
					                                       </div> 
					                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12" style="display:none;">
		  	 <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Referred By</label>
				 
				</div> 
				 <input type="text" hidden value="<?php if(isset($RB)){echo $RB;}?>" id="RB">
			</div>
			 <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12" style="display:none;">
			   	 <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Location</label>
				    <select class="form-control" aria-label="Default select example" name="select_location" id="filters_by_location_admin_customers">
				   	  
						<option value="" >Select </option> 
						    <?php
       							foreach($filter_location as $u)
						       {
						       	if($u->Location!='')
						       	{
						        echo '<option value="'.$u->Location.'" >'.$u->Location.'</option>';
						        }
						       }
						      ?>
					</select>
				</div> 
				 <input type="text" hidden value="<?php if(isset($location)){echo $location;}?>" id="location">
			 </div>
													</div>
													<hr>
													<body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="empTable" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															
																					<th>ID</th>
																					<th>Name</th>
																				<th>Delete</th>
																				</tr>
																			</thead>
																			
																	</table>
																</div>
															</div>
	    												</div>
													</div>
                                                </body>
												
												<!-- Sample code -->
												<!-- Button trigger modal -->

												
												<!-- Sample code end -->
												
												
												<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    											<div class="modal-dialog">
	        											<div class="modal-content">
	            										<!-- Modal Header -->
	            											<div class="modal-header">
	            												<h4 class="modal-title" id="myModalLabel"> DELETE </h4>
	                											<button type="button" class="close" data-dismiss="modal">
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
			               												<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL </button>
			                											<button type="submit" class="btn btn-primary">DELETE IT </button>
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
       $(document).ready(function(){
			var End_Date=document.getElementById("end_date1").value;
			var Start_Date=document.getElementById("start_date1").value;
			var filter = document.getElementById("filter").value;
			var Reffered_by = document.getElementById("RB").value;
			var location = document.getElementById("location").value;
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    //'url':'ajaxfile.php'
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/admin/All_users_PG",
					'data':{filter:filter,Start_Date:Start_Date,End_Date:End_Date,Reffered_by:Reffered_by,location:location},
                },
     
                'columns': [

                    { data: 'ID' },
                    { data: 'FN' },
                { data: 'Delete' },
                   
                     


                ]
				
            });
            
            $('#empTable').DataTable().column(0).visible(false);
		
       var value=$("#Billing_month").val();
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
				$('#Start_Date_filter').val(firstDay);
				$('#Start_Date_filter').prop('readonly', true);
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
				$('#End_Date_filter').val(lastDay);
				$('#End_Date_filter').prop('readonly', true);
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
				$('#Start_Date_filter').val(firstDay);
				$('#Start_Date_filter').prop('readonly', true);
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
				$('#End_Date_filter').val(lastDay);
				$('#End_Date_filter').prop('readonly', true);
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
			$('#Start_Date_filter').val(Start_Date);
			$('#End_Date_filter').val(End_Date);



		}

	
        });
		
        </script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
		
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
		<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>js/main.js"></script>
	</body>
</html>