
<?php
 $s=$this->input->get('s');
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
													  </div>
												   <div class="col-sm-2" >
                                                   <input type="text" hidden value="<?php echo $s;?>" id="filter">

												   </div>
											   </div>
											   <form method="post" action="" >
											   
											 
											   <div class="row">
											   
											                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                    <div style=" margin-top: 8px;" class="col">
																		<label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
																		<select class="form-control"  name="Bank_name" id="Billing_type">
																					<option value="">Select</option>
																					<option value="Current_Month" <?php if(!empty($_REQUEST['Bank_name'])){if($_REQUEST['Bank_name'] == 'Current_Month') { ?> selected <?php }} ?>  >Current Month</option>
																					<option value="Previous_Month" <?php if(!empty($_REQUEST['Bank_name'])){ if($_REQUEST['Bank_name'] == 'Previous_Month') { ?> selected <?php } } ?> >Previous Month</option>
																					<option value="Select_Range" <?php if(!empty($_REQUEST['Bank_name'])){ if($_REQUEST['Bank_name'] == 'Select_Range') { ?> selected <?php } }?> >Select Range</option>
																		</select>
                                                                   </div>
                                                               </div>
                                                               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
                                                                     <input  class="form-control Start_Date"  type="date" value="<?php if(!empty($_REQUEST['Start_Date'])){echo $_REQUEST['Start_Date'];} ?>" name="Start_Date" id="Start_Date"  >
                                                                  </div>  
                                                               </div> 
                                                               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
                                                                     <input  class="form-control"  type="date" name="End_Date" value="<?php if(!empty($_REQUEST['Start_Date'])){echo $_REQUEST['End_Date'];} ?>" id="End_Date"  >
                                                                  </div>  
                                                               </div>
															   <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
																<div style=" margin-top: 8px;" class="col">
																	<label for="email" style="font-size: 16px; color: black; font-weight: bold;">select Retailer</label>
																	<select class="form-control"  name="retailer_name" id="Billing_type">
																					<option value="">Select</option>
																				<?php foreach($retailer_list as $retailer)
																					{
																						?>
																					<option value="<?php echo $retailer->UNIQUE_CODE; ?>" <?php if(!empty($_REQUEST['retailer_name'])){if($_REQUEST['retailer_name'] == $retailer->UNIQUE_CODE) { ?> selected <?php }} ?>  ><?php echo $retailer->dsa_firm_name; ?></option>
																				<?php } ?>
																	</select>
																</div> 
																</div>
																<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                    <div style=" margin-top: 8px;" class="col">
																		<label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Status</label>
																		<select class="form-control"  name="status" id="status">
																					<option value="">Select</option>
																					
																					<option value="Created" <?php if(!empty($_REQUEST['status'])){if($_REQUEST['status'] == 'Created') { ?> selected <?php } }?>  >Created</option>
																					<option value="Approved By Distributor" <?php   if(!empty($_REQUEST['status'])){ if($_REQUEST['status'] == 'Approved By Distributor') { ?> selected <?php }} ?> >Approved by distributor</option>
																					<option value="Approved By SCFO" <?php  if(!empty($_REQUEST['status'])){ if($_REQUEST['status'] == 'Approved By SCFO') { ?> selected <?php }} ?> >Approved by scfo</option>
																					<option value="Revert By SCFO" <?php  if(!empty($_REQUEST['status'])){ if($_REQUEST['status'] == 'Revert By SCFO') { ?> selected <?php } }?> >Revert by scfo</option>
																					<option value="Revert By Distributor" <?php  if(!empty($_REQUEST['status'])){ if($_REQUEST['status'] == 'Revert By Distributor') { ?> selected <?php } }?> >Revert by distributor</option>
																		</select>
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
						      
							   
							   <th>Invoice number</th>
							   <th>Invoice date</th>
							   <th>Invoice Amount</th>
							   <!-- <th>Product</th> -->
							   <th>Additional Deduction</th>
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
   
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
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
				dom: 'Bfrtip',
				buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                  
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/distributor/listreport",
					
					'data':{ Start_Date:"<?php if(!empty($_REQUEST['Start_Date'])){echo $_REQUEST['Start_Date']; } ?>", End_Date : "<?php if(!empty($_REQUEST['End_Date'])){ echo $_REQUEST['End_Date']; } ?>", Bank_name : "<?php if(!empty($_REQUEST['Bank_name'])){echo $_REQUEST['Bank_name']; } ?>", convinincecharges : " <?php if(!empty($_REQUEST['convinincecharges'])){echo $_REQUEST['convinincecharges'];} ?>", netdisbursed : "<?php if(!empty($_REQUEST['netdisbursed'])){echo $_REQUEST['netdisbursed']; }?>", retailername : "<?php if(!empty($_REQUEST['retailer_name'])){echo $_REQUEST['retailer_name'];} ?>",status : "<?php if(!empty($_REQUEST['status'])){echo $_REQUEST['status'];} ?>"},
                },
             
                
                'columns': [

					
                    
                    
					{ data: 'invoicenumber' },
					{ data: 'invoicedate' },
                    { data: 'invoiceamount' },
					//{ data: 'product' },
				     {data: 'deduction'},
					{ data: 'totalcharges' },
					
					{ data: 'disbursedamount' },
					{ data: 'name' },
					{ data: 'status' },


                ]
				
            });
			
			
            
          // $('#empTable').DataTable().column(0).visible(false);
        });
        </script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"> </script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"> </script>
</body>
</html>