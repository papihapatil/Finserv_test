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
																	<?php if(isset($data))
				      											{
						 										 if(count($data) != 0) 
						  											{  ?>
						  											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												
						  											</div>
						 									 		<?php  } 
				         											 else
						 											 {?>
						   											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   												
																	</div>
																	<?php     } 
			           												} 
																	else
																	{ ?>
					       											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												
																	</div>
																	<?php   }   ?>
																
																	
				   													<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				   														
																	</div>
																	<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
				   													</div>
																	
															</div>
          							      				</div>
														<hr>
													</div>

<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
		    <div style=" margin-top: 8px;" class="col">
				  <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
					  <select class="form-control"  name="Admin_CM_filter" id="Admin_CM_filter">
					    <option value="">Select</option>
					    
					    <option value="Current_Month" <?php if(isset($range)){if($range=='Current_Month'){echo 'selected';}} ?>>Current Month</option>
					    <option value="Previous_Month"  <?php if(isset($range)){if($range=='Previous_Month'){echo 'selected';}} ?>>Previous Month</option>
					    <option value="Select_Range"  <?php if(isset($range)){if($range=='Select_Range'){echo 'selected';}} ?>> select Range</option>
					  </select>
				</div>
		  </div>
		  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			  <div style=" margin-top: 8px;" class="col">
			    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
					<input  class="form-control Start_Date"  type="date" name="Start_Date" id="CM_Start_Date_filter">
				</div>  
		  </div> 
		  <input type="text" hidden value="<?php if(isset($_GET['Start_Date'])){echo $_GET['Start_Date'];}?>" id="start_date1">
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			  <div style=" margin-top: 8px;" class="col">
			    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
				<input  class="form-control"  type="date" name="End_Date" id="CM_End_Date_filter"  >
			  </div>  
			</div> 
			<input type="text" hidden value="<?php  if(isset($_GET['End_Date'])){echo $_GET['End_Date'];}?>" id="end_date1">
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			  <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Filter</label>
				    <select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_admin_CM">
				   	    <option>Select Filter</option>
						<option value="all" <?php if(isset($filter_by)){if($filter_by=='all'){echo 'selected';}} ?>>All </option> 
						<option value="Complete" <?php if(isset($filter_by)){if($filter_by=='Complete'){echo 'selected';}} ?>>Completed Profile</option>
						<option value="Incomplete" <?php if(isset($filter_by)){if($filter_by=='Incomplete'){echo 'selected';}} ?>>Incomplete Profile</option>
						
					</select>
				</div> 
               <input type="text" hidden value="<?php if(isset($filter_by)){echo $filter_by;}?>" id="filter">															  
	    </div> 
	    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			   	 <div style=" margin-top: 8px;" class="col">
			        <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Location</label>
				    <select class="form-control" aria-label="Default select example" name="select_location" id="filters_by_location_admin_CM">
				   	  
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
					    														
																					<th>Name</th>
																					<th>Email</th>
																					<th>Mobile</th>
																					<th>Location</th>
																					<th>Profile Status</th>
																					<th>Date</th>
																					
																					<th>Actions</th>
																				</tr>
																			</thead>
																			
																	</table>
																</div>
															</div>
	    												</div>
													</div>
                                                </body>
												<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    DELETE
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_Cluster_Manager" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Cluster Manager?</label>	                         
	                    <input name="id" type="number" class="idform" hidden  />
							 						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    DELETE IT
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>



<script >
		 $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>
<script type="text/javascript">
    function select_dropdown_filters_admin() {
   var select_dropdown_filters_admin = document.getElementById('select_dropdown_filters_admin').value;
       // alert(select_dropdown_filters_HR_admin);
	       if(select_dropdown_filters_admin == 'all')
		   {
	         window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Cluster_Manager?s=all");
		   }
		   else if(select_dropdown_filters_admin == 'Complete')
		   {
			       window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Cluster_Manager?s=Complete");
		   }
		   else if((select_dropdown_filters_admin == 'Incomplete'))
		   {
			       window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Cluster_Manager?s=Incomplete");
	 
		   }
				     
    }
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
		    var End_Date=document.getElementById("end_date1").value;
			var Start_Date=document.getElementById("start_date1").value;
			var location = document.getElementById("location").value;

             $('#empTable').DataTable({
                 'processing': true,
                 'serverSide': true,
                 'serverMethod': 'post',
                 'ajax': {
                     //'url':'ajaxfile.php'
                     'url':window.location.origin+"/finserv_test/dsa/dsa/index.php/Admin/customer_with_paginations_Cluster",
					 'data':{filter:filter,Start_Date:Start_Date,End_Date:End_Date,location:location},

                 },
                 'columns': [

					{data: 'FN'},
					 {data: 'Email'},
					 {data: 'MOBILE'},
					   {data: 'LOCATION'},
					 {data: 'Profile_Status'},
					 {data: 'date'},
					 {data: 'Action'},
	                ]
             });
          //   $('#empTable').DataTable().column(0).visible(false);


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