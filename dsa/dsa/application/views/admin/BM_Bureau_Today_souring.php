
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
													<div >
        												<div class="">
														<div class="row">
																<?php if(isset($customers))
				      											{
						 										 if($customers != 0) 
						  											{  ?>
						  										<!--	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo $customers; ?>&nbsp;&nbsp;<a href="<?=base_url('index.php/admin/download_Excel')?>">
						  												 <i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
						   												<?php $excelData = json_decode(json_encode($customers), true);?>
						  											</div>-->
						 									 		<?php  } 
				         											 else
						 											 {?>
						   											<!--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($customers)) {echo $customers;}else {echo 0;} ?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																	</div>-->
																	<?php     } 
			           												} 
																	else
																	{ ?>
					       											<!--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($customers)) {echo $customers;}else {echo 0;}?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																	</div>-->
																	<?php   }   ?>
																	<!--<div class="col-sm-3" style="padding-left:0px;margin-left:-5%;">
																	<div class="add">
																		<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Add Customer&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer">
						   												<i class="fa fa-plus "style='font-size:20px; color:green;'></i></a></lable>
																	</div>
																	</div>-->
																	
				   													<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				   														<!--<input type="date" name="filter_date" onchange="filterDateSelected(event);"/> -->
																	</div>
																	<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
																		<!--<lable style="margin-left:8px;">Filter : </lable>-->
				   													</div>
																	<div class="col-sm-2" >
																	<!--	<select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_customers_admins">
																			<option>Select Filter</option>
																			<option value="all">All Customers</option> 
																			<option value="Complete">Completed Profile</option>
																			<option value="Incomplete">Incomplete Profile</option>
																		</select>-->
																	</div>
															</div>
          							      				</div>
														<hr>
													</div>
													<div class="row">
														<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                      <!--  <div style=" margin-top: 8px;" class="col">
					                                         <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
					                                          <select class="form-control"  name="Billing_month" id="Billing_months">
					                                                         <option value="">Select</option>
																			<!-- <option value="all" <?php if(isset($range)){if($range=='all'){echo 'selected';}} ?>>All Customers</option>-->
					                                                        <!-- <option value="Current_Month" <?php if(isset($range)){if($range=='Current_Month'){echo 'selected';}} ?>selected>Current Month</option>
					                                                         <option value="Previous_Month"  <?php if(isset($range)){if($range=='Previous_Month'){echo 'selected';}} ?>>Previous Month</option>
					                                                         <option value="Select_Range"  <?php if(isset($range)){if($range=='Select_Range'){echo 'selected';}} ?>> select Range</option>
					                                          </select>
					                                       </div>-->
					                                       </div>
					                                      <!-- <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
					                                             <input  class="form-control Start_Date"  type="date" name="Start_Date" id="Start_Date_filters"   value="<?php if(isset($_GET['Start_Date'])){echo $_GET['Start_Date'];}else{echo  date('d-m-Y');}?>" >
					                                          </div>  
					                                       </div> -->
														     <input type="text" hidden value="<?php if(isset($_GET['Start_Date'])){echo $_GET['Start_Date'];}?>" id="start_date1">
					                                       <!--<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
					                                             <input  class="form-control"  type="date" name="End_Date" id="End_Date_filters"  value="<?php  if(isset($_GET['End_Date'])){echo $_GET['End_Date'];}else{echo  date('d-m-Y');}?>" >
					                                          </div>  
					                                       </div>--> 
														    <input type="text"  hidden value="<?php  if(isset($_GET['End_Date'])){echo $_GET['End_Date'];}?>" id="end_date1">
					                                           <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                          <!-- <div style=" margin-top: 8px;" class="col">
					                                            <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Filter</label>
					                                             	<select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_customers_admin">
																			<option>Select Filter</option>
																			<option value="all" <?php if(isset($filter_by)){if($filter_by=='all'){echo 'selected';}} ?>>All Customers</option> 
																			<option value="Created" <?php if(isset($filter_by)){if($filter_by=='Created'){echo 'selected';}} ?>>Created</option>
																			<option value="GO NO GO in progress" <?php if(isset($filter_by)){if($filter_by=='GO NO GO in progress'){echo 'selected';}} ?>>GO NO GO in progress</option>
																			<option value="Rule Engine Process" <?php if(isset($filter_by)){if($filter_by=='Rule Engine Process'){echo 'selected';}} ?>>Rule Engine Process</option>
																			<option value="Income details complete" <?php if(isset($filter_by)){if($filter_by=='Income details complete'){echo 'selected';}} ?>>Income details complete</option>
																			<option value="Document upload complete" <?php if(isset($filter_by)){if($filter_by=='Document upload complete'){echo 'selected';}} ?>>Document upload complete</option>
																			<option value="Aadhar E-sign complete" <?php if(isset($filter_by)){if($filter_by=='Aadhar E-sign complete'){echo 'selected';}} ?>>Aadhar E-sign complete</option>
																			<option value="Cam details complete" <?php if(isset($filter_by)){if($filter_by=='Cam details complete'){echo 'selected';}} ?>>Cam details complete</option>

																			<option value="PD Completed" <?php if(isset($filter_by)){if($filter_by=='PD Completed'){echo 'selected';}} ?>>PD Completed</option>
																			
																			
																			
																		
																			<option value="REJECT" <?php if(isset($filter_by)){if($filter_by=='REJECT'){echo 'selected';}} ?>>REJECT</option>
																			<option value="HOLD" <?php if(isset($filter_by)){if($filter_by=='HOLD'){echo 'selected';}} ?>>HOLD</option>
																			
																		</select>
					                                          </div> -->
                                                             <input type="text" hidden value="<?php if(isset($filter_by)){echo $filter_by;}?>" id="filter">															  
					                                       </div> 
					                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12" style="display:none;">
		  	 <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Referred By</label>
				    <select class="form-control" aria-label="Default select example" name="select_RO_Name" id="filters_by_ro_admins_customers">
				   	  
						<option value="" >Select </option> 
						    <?php
       							foreach($Reffered_by as $u)
						       {
						       	if($u->Refer_By_Name!='')
						       	{
						        echo '<option value="'.$u->Refer_By_Name.'" >'.$u->Refer_By_Name.'</option>';
						        }
						       }
						      ?>
					</select>
				</div> 
				 <input type="text" hidden value="<?php if(isset($RB)){echo $RB;}?>" id="RB">
			</div>
			 <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12" style="display:none;">
			   	 <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Location</label>
				    <select class="form-control" aria-label="Default select example" name="select_location" id="filters_by_location_admins_customers">
				   	  
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
					    															<th>Sr.no</th>
																					<th>Employee Name</th>
																					<th>Bureau Date</th>
																					<th>FirstName</th>
																					<th>LastName</th>
																					<th>BureauReports</th>
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
		   var Start_Date=document.getElementById("start_date1").value;
			var End_Date=document.getElementById("end_date1").value;
			//alert(End_Date);
			
			//alert(Start_Date);
			var filter = document.getElementById("filter").value;
			var Reffered_by = document.getElementById("RB").value;
			var location = document.getElementById("location").value;
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    //'url':'ajaxfile.php'
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/BranchManager/Bureaupull_today",
					'data':{filter:filter,Start_Date:Start_Date,End_Date:End_Date,Reffered_by:Reffered_by,location:location},
                },
     
                'columns': [

                    { data: 'ID' },
					{ data: 'Employee_name' },
					{ data: 'Last_updated_on' },
                    { data: 'FirstName' },
					{ data: 'LastName' },
					{ data: 'Bureau_reports' },
                ]
				
            });
            
            $('#empTable').DataTable().column(0).visible(false);
		
       var value=$("#Billing_months").val();
		if(value=='Current_Month')

		{
				 var el_down = document.getElementById("Start_Date");
				//alert(el_down);
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
				$('#Start_Date_filters').val(firstDay);
				$('#Start_Date_filters').prop('readonly', true);
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
				$('#End_Date_filters').val(lastDay);
				$('#End_Date_filters').prop('readonly', true);
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
				$('#Start_Date_filters').val(firstDay);
				$('#Start_Date_filters').prop('readonly', true);
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
				$('#End_Date_filters').val(lastDay);
				$('#End_Date_filters').prop('readonly', true);
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
			$('#Start_Date_filters').val(Start_Date);
			$('#End_Date_filters').val(End_Date);



		}

	
        });
		
        </script>
		<script>
		  $( "#Start_Date_filters" ).change(function()
      {
  
         var Start_Date = $('#Start_Date_filters').val();
       var End_Date=$('#End_Date_filters').val();
       var filter=$('#select_filters_customers_admins').val();
       var range=$('#Billing_months').val();
       
         window.location.replace("/finserv_test/dsa/dsa/index.php/BranchManager/BM_Bureau_Today_souring?Start_Date="+Start_Date+"&End_Date="+End_Date+"&range="+range);
  
        
      });
    
    $( "#Billing_months" ).change(function()
      {
  
         var value=$("#Billing_months").val();
      
         var Start_Date = $('#Start_Date_filters').val();
       var End_Date=$('#End_Date_filters').val();
       var filter=$('#select_filters_customers_admins').val();
       var range=$('#Billing_months').val();
         if(value=='Current_Month' )
  
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
          //$('#Start_Date').val(firstDay);
          //$('#Start_Date').prop('readonly', true);
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
          //$('#End_Date').val(lastDay);
          //$('#End_Date').prop('readonly', true);
                  window.location.replace("/finserv_test/dsa/dsa/index.php/BranchManager/BM_Bureau_Today_souring?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range);
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
         // $('#Start_Date').val(firstDay);
         // $('#Start_Date').prop('readonly', true);
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
          //$('#End_Date').val(lastDay);
         // $('#End_Date').prop('readonly', true);
          window.location.replace("/finserv_test/dsa/dsa/index.php/BranchManager/BM_Bureau_Today_souring?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range);
      }
      if(value=='Select_Range')
      {
        //alert("hello");
        if ( $('#Start_Date_filters').is('[readonly]') ) { $('#Start_Date_filters').prop('readonly', false); }
        if ( $('#End_Date_filters').is('[readonly]') ) { $('#End_Date_filters').prop('readonly', false); }
        $('#Start_Date_filters').val('');
        $('#End_Date_filters').val('');
         
      }
        
      });
    
    $( "#End_Date_filters" ).change(function()
      {
  
         var Start_Date = $('#Start_Date_filters').val();
		// alert(Start_Date);
       var End_Date=$('#End_Date_filters').val();
       var filter=$('#select_filters_customers_admins').val();
       var range=$('#Billing_months').val();
       
          window.location.replace("/finserv_test/dsa/dsa/index.php/BranchManager/BM_Bureau_Today_souring?Start_Date="+Start_Date+"&End_Date="+End_Date+"&range="+range);
  
        
      });
    
    $( "#select_filters_customers_admins" ).change(function()
      {
  
         var Start_Date = $('#Start_Date_filters').val();
       var End_Date=$('#End_Date_filters').val();
       var filter=$('#select_filters_customers_admins').val();
       var range=$('#Billing_months').val();
       
          window.location.replace("/finserv_test/dsa/dsa/index.php/BranchManager/BM_Bureau_Today_souring?Start_Date="+Start_Date+"&End_Date="+End_Date+"&range="+range);
  
        
      });



      

      
		</script>
			
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
		
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
		<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>js/main.js"></script>
		
		
	</body>
</html>