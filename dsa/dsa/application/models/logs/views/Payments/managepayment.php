
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
												
												   <div class="col-sm-3">
													  
												   </div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
												   </div>
												   <div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
													   <lable style="margin-left:8px;">Filter : </lable>
													  </div>
												   <div class="col-sm-2" >
                                                   <input type="text" hidden value="<?php echo $s;?>" id="filter">

													   <select class="form-control" aria-label="Default select example" name="select_filters" id="select_dropdown_filters_relationship">
														   <option value="">Select Filter</option>
														   <option value="all">All Relationship Officer</option>
														   <option value="Complete">Completed Profile</option>
														   <option value="Incomplete">Incomplete Profile</option>
														   
													   </select>
												   </div>
											   </div>
											   <form method="post" action="" >
											   
											   
											   <div class="row">
											   
											  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                <div style=" margin-top: 8px;" class="col">
                                                                 <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
                                                                  <select class="form-control"  name="Bank_name" id="Billing_type">
                                                                                 <option value="">Select</option>
																			 <option value="Current_Month" <?php if($_REQUEST['Bank_name'] == 'Current_Month') { ?> selected <?php } ?>  >Current Month</option>
                                                                                 <option value="Previous_Month" <?php if($_REQUEST['Bank_name'] == 'Previous_Month') { ?> selected <?php } ?> >Previous Month</option>
                                                                                 <option value="Select_Range" <?php if($_REQUEST['Bank_name'] == 'Select_Range') { ?> selected <?php } ?> >Select Range</option>
                                                                  </select>
                                                               </div>
                                                               </div>
                                                               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
                                                                     <input  class="form-control Start_Date"  type="date" value="<?php echo $_REQUEST['Start_Date']; ?>" name="Start_Date" id="Start_Date"  >
                                                                  </div>  
                                                               </div> 
                                                               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
                                                                     <input  class="form-control"  type="date" name="End_Date" value="<?php echo $_REQUEST['End_Date']; ?>" id="End_Date"  >
                                                                  </div>  
                                                               </div> 
															   
															   
                                                              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                     <br>
                                                                         <button class="btn btn-info" style="background-color: #25a6c6;" id="get_idccr_DateFilter_Counts" onclick="get_idccr_DateFilter_Counts();">
                                                                           Search
                                                                     </button>
                                                                  </div>  
                                                               </div> 
											   
											   </div>
											   
											   
											   
											  
											   
											   </form>
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
						       <th hidden >ID</th>
							   
							   <th>Invoice number</th>
							   <th>Invoice date</th>
							   <th>Invoice Amount</th>
							   <!-- <th>Product</th> -->
							   <th>Convenience Charges</th>
							   <th>Disbursed Amount </th>
							   
							   <th>Retailer name </th>
							   
							   <th>Status</th>
						   
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



<script type="text/javascript">
   $('#deleteModel').on('show.bs.modal', function (event) {
	 var button = $(event.relatedTarget) 
	 var recipient = button.data('id') 
	 var modal = $(this)
	 modal.find('.modal-body .dsa_bnk_filter').val(recipient)
   })		
</script>

<div class="modal fade" id="deleteModel_city" tabindex="-1" role="dialog" 
	aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
	   <div class="modal-content">
		   <!-- Modal Header -->
		   <div class="modal-header">
			   <h4 class="modal-title" id="myModalLabel">
				   FILTER BY City
			   </h4>
			   <button type="button" class="close" 
				  data-dismiss="modal">
					  <span aria-hidden="true">&times;</span>
					  <span class="sr-only">Close</span>
			   </button>                
		   </div>
		   
		   <!-- Modal Body -->
		   <div class="modal-body">
			   
			   <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/dsa_allusers" method="GET" id="dsa_city_filter">
				 <div class="form-group">                    
				   <div class="wrap-select validate-input ">
					   <label class="input100"> Select City Name </label> 
					   <span class="focus-input100"></span>
					   <input type="text" name="s" value="city" hidden>
					   <select name="city_name" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						 <option value="">None</option>
						 <?php foreach($cities as $city) {
							   echo "<option value='$city->CITY'>$city->CITY</option>";
						 }?>							  
					   </select>
				   </div>
				 </div>                  

				 <!-- Modal Footer -->
				   <div class="modal-footer">
					   <button type="button" class="btn btn-default"
							   data-dismiss="modal">
								   CANCEL
					   </button>
					   <button type="submit" class="btn btn-primary">
						   FILTER
					   </button>
				   </div>
			   </form>                
		   </div>            
	   </div>
   </div>
</div>

<script type="text/javascript">
   $('#deleteModel_city').on('show.bs.modal', function (event) {
	 var button = $(event.relatedTarget) 
	 var recipient = button.data('id') 
	 var modal = $(this)
	 modal.find('.modal-body .dsa_city_filter').val(recipient)
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
                  
                    'url': window.location.origin+"/dsa/dsa/index.php/Payments/listpayments",
				
					'data':{ Start_Date: "<?php echo $_REQUEST['Start_Date']; ?>", End_Date : "<?php echo $_REQUEST['End_Date']; ?>", Bank_name : "<?php echo $_REQUEST['Bank_name']; ?>", convinincecharges : "<?php echo $_REQUEST['convinincecharges']; ?>", netdisbursed : "<?php echo $_REQUEST['netdisbursed']; ?>", retailername : "<?php echo $_REQUEST['retailername']; ?>"},
                },
             
                
                'columns': [

					
                    
                    
					{ data: 'merchantid' },
					{ data: 'fullname' },
                    { data: 'emailid' },
				
					{ data: 'phonenumber' },
					
					{ data: 'accounttype' },
					{ data: 'collectionamount' },
					{ data: 'status' },


                ]
				
            });
			
			
        });
        </script>


</body>
</html>