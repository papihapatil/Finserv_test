
<style>
	
	@media only screen and (max-width:768px){
		.filt{		
    margin-right: 243px;
		}
	}
	</style>
	
	<style>

#empTable  th, td {
  border: 1px solid black;

}
	
</style>

<?php
 
 $result = $this->session->flashdata('result');   if (isset($result)) {
	   if($result=='1'){
		   
			   $res = $this->session->flashdata('message');
			   if($res=='Operational User Deleted Sucessfully')
			   {
			   echo '<script> swal("success!", "Operational User Deleted Sucessfully", "success");</script>';
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
												 
												
											   </div>
										   </div>
										   <div class="row">

	<div class="col-sm-3 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Loan Mitra</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								 Meeting Month
	 							</th>
	   							<th scope="col">
	   								<a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Cluster_Manager/CL_RO_souring"><?php echo $current;?></a></th>

  						    </tr>
   							
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:blue;"></i>
									Today's Meetings
								</th>
   								<th scope="col">
   							<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Cluster_Manager/Today_souring"><?php echo $today;?></a></th>
								
							</tr>
							
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	
		<div class="col-sm-3 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">NTB Customer</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Meetings Month
	 							</th>
	   							<th scope="col">
	   								<a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Cluster_Manager/CL_NTB_souring"><?php  echo $ntbcurrent;?></a></th>

  						    </tr>
   							
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:blue;"></i>
									Today's Meetings
								</th>
   								<th scope="col">
								<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Cluster_Manager/CL_NTB_Today_souring" ><?php echo $ntbtoday;?></a></th>
						    </tr>
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	<div class="col-sm-3 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Existing Customer</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Existing Meetings in  month
	 							</th>
	   							<th scope="col">
								<a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Cluster_Manager/CL_Existing_souring"><?php  echo $existing;?></a></th>

  						    </tr>
   							
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:blue;"></i>
									Today's Meetings
								</th>
   								<th scope="col">
								<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Cluster_Manager/CL_Existing_Today_souring" ><?php echo $existingtoday;?></a></th>
						    </tr>
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
		<div class="col-sm-3 col-lg-3">
		<a >
			<div class="card">
				<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
					<table class="table">
  						<thead>
    						<tr>
 						      <th scope="col">Lead Customer</th>
  						    </tr>
  						</thead>
 						<tbody>
 					
    						<tr>
	     			           	<th scope="col"> 
	     			           		<i class="fa fa-star fa-lg" style="color:green;"></i>
	 								Lead Assigned Month
	 							</th>
	   							<th scope="col">
								<a style="margin-left: 8px; "  href="<?php echo base_url();?>index.php/Cluster_Manager/BM_Lead_souring"><?php  echo $leadcurrent;?></a></th>

  						    </tr>
   							
    						<tr>
    						    <th scope="col"> 
    						   		<i class="fa fa-star fa-lg" style="color:blue;"></i>
									Today's Assigned
								</th>
   								<th scope="col">
								<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Cluster_Manager/BM_Lead_Today_souring"><?php echo $leadtoday;?></a></th>
						    </tr>
						  
  						</tbody>
					</table>
					
				</div>
			</div>
		</a>
	</div>
	
	</div>
										   <hr>
									   </div>
									<div class="row">
														<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                        <div style=" margin-top: 8px;" class="col">
					                                         <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
					                                          <select class="form-control"  name="Billing_month" id="Billing_months">
					                                                         <option value="">Select</option>
																			<!-- <option value="all" <?php if(isset($range)){if($range=='all'){echo 'selected';}} ?>>All Customers</option>-->
																		    
					                                                         <option value="Current_Month" <?php if(isset($range)){if($range=='Current_Month'){echo 'selected';}} ?>>Current Month</option>
					                                                         <option value="Previous_Month"  <?php if(isset($range)){if($range=='Previous_Month'){echo 'selected';}} ?>>Previous Month</option>
					                                                         <option value="Select_Range"  <?php if(isset($range)){if($range=='Select_Range'){echo 'selected';}} ?>> select Range</option>
					                                          </select>
					                                       </div>
					                                       </div>
					                                       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
					                                             <input  class="form-control Start_Date"  type="date" name="Start_Date" id="Start_Date_filters"   value="<?php if(isset($_GET['Start_Date'])){echo $_GET['Start_Date'];}else{echo  date('Y-m-d');}?>" >
					                                          </div>  
					                                       </div> 
														     <input type="text" hidden value="<?php if(isset($_GET['Start_Date'])){echo $_GET['Start_Date'];}?>" id="start_date1">
					                                       <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
					                                             <input  class="form-control"  type="date" name="End_Date" id="End_Date_filters"  value="<?php  if(isset($_GET['End_Date'])){echo $_GET['End_Date'];}else{echo  date('Y-m-d');}?>" >
					                                          </div>  
					                                       </div> 
														      <input type="text"  hidden value="<?php  if(isset($_GET['End_Date'])){echo $_GET['End_Date'];}?>" id="end_date1">
															  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
					                                           <div style=" margin-top: 8px;" class="col">
					                                            <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Branch</label>
					                                           
																 <select class="form-control " name="lead_area" id="lead_area"   onchange="myFunction1()" required >
																	<option selected="selected" value="">Choose Bank Name</option>
																	<?php
																
																		
																	foreach($lead_area as $res) {
																		  ?>
																	  <option value="<?php echo $res->Branch_Location;?>"><?php echo $res->Branch_Location;?></option>
																	<?php
																	  } ?>
																</select>
					                                          </div>  
					                                       </div> 
														        <input type="text"  hidden value="<?php  if(isset($_GET['branch'])){echo $_GET['branch'];}?>" id="lead_area1">

									</div> 
									<br>
	   <div class="row">
								   <div class="col-sm-8">						 
<body class="wide comments example">
   <div class="fw-body">
	   <div class="content">
		   <div style="overflow-x:auto;">
			   <div class="demo-html">
			   <div class="tab">
				   <table id="empTable" class="display" style="width:100%">
					   <thead>
						   <tr>
						       <th hidden >ID</th>
							   <th>Employee Name</th>
							   <th colspan="2">Loan Mitra Meeting</th>
							   <th colspan="2">Customer Meeting</th>
							  
							   
						   
						   </tr>
						     <tr >

							   <th></th>
							  <th >Existing</a></th>
							   <th >New</th>
							   <th>Existing</th>
							<th>NTB</th>
						  </tr>
					   </thead>
					  
				   </table>
				   </div>
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_RO" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Relationship Officer?</label>	                         
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
			//var filter = document.getElementById("filter").value;
			var Start_Date=document.getElementById("start_date1").value;
			var End_Date=document.getElementById("end_date1").value;
				var branch = document.getElementById("lead_area1").value;
				
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    //'url':'ajaxfile.php'
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/Cluster_Manager/Branch_BM_ro",
					'data':{Start_Date:Start_Date,End_Date:End_Date,branch:branch},
                },
             
                
                'columns': [

                    { data: 'FN' },
					{ data: 'Existing' },
					{ data: 'New' },
					{ data: 'Customer_existing' },
					{ data: 'Customer_ntb' },
                ]
				
            });
            
		var value=$("#Billing_months").val();

		if(value=='Current_Month')

		{
			
				 var el_down = document.getElementById("Start_Date");
				  var lead_area = document.getElementById("lead_area");
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

		{ 		 var lead_area = document.getElementById("lead_area");
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
			$('#lead_area').val(lead_area);


		}

	
        });
		
        </script>
		<script>
		 
    
    $( "#Billing_months" ).change(function()
      {
  
         var value=$("#Billing_months").val();
      
         var Start_Date = $('#Start_Date_filters').val();
       var End_Date=$('#End_Date_filters').val();
      
       var range=$('#Billing_months').val();
	  
	     var branch=$('#lead_area').val();
		
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
          $('#Start_Date').val(firstDay);
          $('#Start_Date').prop('readonly', true);
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
          $('#End_Date').val(lastDay);
		  $('#Start_Date_filters').val(firstDay);
		  $('#start_date1').val(firstDay);
		  $('#end_date1').val(lastDay);
		  $('#End_Date_filters').val(lastDay);
         $('#End_Date').prop('readonly', true);
		 if(branch=='')
		 {
			 window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range+"&branch="+branch);
		 }
		 else
		 {
		 var Start_Date=document.getElementById("start_date1").value;
		 var End_Date=document.getElementById("end_date1").value;
		    var items="";
                  //window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range+"&branch="+branch);
				  $.ajax({
							type: "POST",
							url: window.location.origin+"/finserv_test/dsa/dsa/index.php/Cluster_Manager/get_branch_lead",
							data:{branch:branch ,Start_Date:Start_Date,End_Date:End_Date},
							//contentType: "application/json; charset=UTF-8",
							success: function (response) 
							{
								            var data = JSON.parse(response);
											
											var newdata =data;
											
											$.each(newdata,function(index,item)
											{
												//alert(JSON.stringify(item));

												//items +="<tr><td'"+item.UNIQUE_CODE+"'>" +item.FN +" "+item.LN +"</td></tr>";
												
												   items+= "<tr><td>" + item.FN +" "+item.LN + "</td><td>" + item.link.Existing + "</td><td>" + item.link.New + "</td><td>" + item.link.Customer_existing + "</td><td>" + item.link.Customer_ntb + "</td></tr>";
												   
											});
										$('#empTable').find('td').remove().end();
										
											$('#empTable').append(items);
											
										}
							
				});
		 }
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
          $('#Start_Date').val(firstDay);
          $('#Start_Date').prop('readonly', true);
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
          $('#End_Date').val(lastDay);
		  $('#Start_Date_filters').val(firstDay);
		  $('#start_date1').val(firstDay);
		  $('#end_date1').val(lastDay);
		  $('#End_Date_filters').val(lastDay);
         $('#End_Date').prop('readonly', true);
		  if(branch=='')
		 {
			window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range+"&branch="+branch);
		 }
		 else
		 {
		 var Start_Date=document.getElementById("start_date1").value;
		 var End_Date=document.getElementById("end_date1").value;
		    var items="";
                  //window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range+"&branch="+branch);
				  $.ajax({
							type: "POST",
							url: window.location.origin+"/finserv_test/dsa/dsa/index.php/Cluster_Manager/get_branch_lead",
							data:{branch:branch ,Start_Date:Start_Date,End_Date:End_Date},
							//contentType: "application/json; charset=UTF-8",
							success: function (response) 
							{
								            var data = JSON.parse(response);
											
											var newdata =data;
											
											$.each(newdata,function(index,item)
											{
												//alert(JSON.stringify(item));

												//items +="<tr><td'"+item.UNIQUE_CODE+"'>" +item.FN +" "+item.LN +"</td></tr>";
												
												   items+= "<tr><td>" + item.FN +" "+item.LN + "</td><td>" + item.link.Existing + "</td><td>" + item.link.New + "</td><td>" + item.link.Customer_existing + "</td><td>" + item.link.Customer_ntb + "</td></tr>";
												   
											});
										$('#empTable').find('td').remove().end();
										
											$('#empTable').append(items);
											
										}
							
				});
		 }
          //window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range+"&branch="+branch);
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
	   $( "#Start_Date_filters" ).change(function()
      {
		   var branch=$('#lead_area').val();
         var Start_Date = $('#Start_Date_filters').val();
       var End_Date=$('#End_Date_filters').val();
       var range=$('#Billing_months').val();
        var branch=$('#lead_area').val();
		  if(branch=='')
		 {
		window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+Start_Date+"&End_Date="+End_Date+"&range="+range+"&branch="+branch);
		 }
		 else
		 {
		 var Start_Date=document.getElementById("start_date1").value;
		 var End_Date=document.getElementById("end_date1").value;
		    var items="";
                  //window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range+"&branch="+branch);
				  $.ajax({
							type: "POST",
							url: window.location.origin+"/finserv_test/dsa/dsa/index.php/Cluster_Manager/get_branch_lead",
							data:{branch:branch ,Start_Date:Start_Date,End_Date:End_Date},
							//contentType: "application/json; charset=UTF-8",
							success: function (response) 
							{
								            var data = JSON.parse(response);
											
											var newdata =data;
											
											$.each(newdata,function(index,item)
											{
												//alert(JSON.stringify(item));

												//items +="<tr><td'"+item.UNIQUE_CODE+"'>" +item.FN +" "+item.LN +"</td></tr>";
												
												   items+= "<tr><td>" + item.FN +" "+item.LN + "</td><td>" + item.link.Existing + "</td><td>" + item.link.New + "</td><td>" + item.link.Customer_existing + "</td><td>" + item.link.Customer_ntb + "</td></tr>";
												   
											});
										$('#empTable').find('td').remove().end();
										
											$('#empTable').append(items);
											
										}
							
				});
		 }
        // window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+Start_Date+"&End_Date="+End_Date+"&range="+range+"&branch="+branch);
  
        
      });
    
    $( "#End_Date_filters" ).change(function()
      {
     var branch=$('#lead_area').val();
         var Start_Date = $('#Start_Date_filters').val();
		// alert(Start_Date);
       var End_Date=$('#End_Date_filters').val();
       var range=$('#Billing_months').val();
        var branch=$('#lead_area').val();
		  if(branch=='')
		 {
		window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+Start_Date+"&End_Date="+End_Date+"&range="+range+"&branch="+branch);
  
		 }
		 else
		 {
		 var Start_Date=document.getElementById("start_date1").value;
		 var End_Date=document.getElementById("end_date1").value;
		    var items="";
                  //window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+firstDay+"&End_Date="+lastDay+"&range="+range+"&branch="+branch);
				  $.ajax({
							type: "POST",
							url: window.location.origin+"/finserv_test/dsa/dsa/index.php/Cluster_Manager/get_branch_lead",
							data:{branch:branch ,Start_Date:Start_Date,End_Date:End_Date},
							//contentType: "application/json; charset=UTF-8",
							success: function (response) 
							{
								            var data = JSON.parse(response);
											
											var newdata =data;
											
											$.each(newdata,function(index,item)
											{
												//alert(JSON.stringify(item));

												//items +="<tr><td'"+item.UNIQUE_CODE+"'>" +item.FN +" "+item.LN +"</td></tr>";
												
												   items+= "<tr><td>" + item.FN +" "+item.LN + "</td><td>" + item.link.Existing + "</td><td>" + item.link.New + "</td><td>" + item.link.Customer_existing + "</td><td>" + item.link.Customer_ntb + "</td></tr>";
												   
											});
										$('#empTable').find('td').remove().end();
										
											$('#empTable').append(items);
											
										}
							
				});
		 }
         // window.location.replace("/finserv_test/dsa/dsa/index.php/Cluster_Manager/Salestracker?Start_Date="+Start_Date+"&End_Date="+End_Date+"&range="+range+"&branch="+branch);
  
        
      });
    
   
   
   
   //================================================================================//
   

   

		</script>
	
<script>
function myFunction1() {
	var branch = document.getElementById("lead_area").value;
	var Start_Date=document.getElementById("start_date1").value;
			var End_Date=document.getElementById("end_date1").value;
            
            var items="";     
                $.ajax({
							type: "POST",
							url: window.location.origin+"/finserv_test/dsa/dsa/index.php/Cluster_Manager/get_branch_lead",
							data:{branch:branch ,Start_Date:Start_Date,End_Date:End_Date},
							//contentType: "application/json; charset=UTF-8",
							success: function (response) 
							{
								            var data = JSON.parse(response);
											
											var newdata =data;
											
											$.each(newdata,function(index,item)
											{
												//alert(JSON.stringify(item));

												//items +="<tr><td'"+item.UNIQUE_CODE+"'>" +item.FN +" "+item.LN +"</td></tr>";
												
												   items+= "<tr><td>" + item.FN +" "+item.LN + "</td><td>" + item.link.Existing + "</td><td>" + item.link.New + "</td><td>" + item.link.Customer_existing + "</td><td>" + item.link.Customer_ntb + "</td></tr>";
												   
											});
										$('#empTable').find('td').remove().end();
										
											$('#empTable').append(items);
											
										}
							
				});
	
 
}
</script>       	



</body>
</html>