
 
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
												<div class="col-sm-5" style="padding-left:0px;">
</a>
																	</div>
													<?php if(isset($data))	{
						 											if(count($data) != 0) 
						  											{  ?>
						  										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   											
						   											<?php $excelData = json_decode(json_encode($data), true);?>-->
						  										</div>
						 										<?php  } 
				         											 else
						 											   {?>
						   										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   											<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($data)) {echo count($data);}else {echo 0;} ?>&nbsp;&nbsp;<a>
						   											<i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>-->
																</div>
																<?php     }     
			           									} 
														else
														{ ?>
					       										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   											
																</div>
														<?php }   ?>
																	
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
																	</div>
				   													<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				   											
																	</div>
																	<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
																		<!--<lable style="margin-left:8px;">Filter : </lable>-->
				   													</div>
																	<div class="col-sm-2" >
																	
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
																					
																					<th>Loan Amount</th>
																				
																						<th>Status</th>
																						<th>Last Updated On</th>
																						<th>Sanction Letter</th>
																					    <th>MITC</th>
																						<th>Loan Agreement</th>
																						<th>Action</th>
																						<th>Processing Fees Amount</th>
																						<th>Processing Fees</th>
																						<th>Processing Fee Payment Status</th>
																						<th>Disbursement Cheque</th>
																						<th>Documents</th>
																			
																				</tr>
																			</thead>
																			
																	</table>
																</div>
															</div>
	    												</div>
													</div>
                                                </body>
												<!-- Modal -->
												 <div class="modal" id="myModal">
		    										
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body.. 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<script type="text/javascript">
    function select_dropdown_filters_HR_admin() {
   var select_dropdown_filters_HR_admin = document.getElementById('select_dropdown_filters_HR_admin').value;
       // alert(select_dropdown_filters_HR_admin);
	       if(select_dropdown_filters_HR_admin == 'all')
		   {
	         window.location.replace("/dsa/dsa/index.php/admin/HR?s=all");
		   }
		   else if(select_dropdown_filters_HR_admin == 'Complete')
		   {
			       window.location.replace("/dsa/dsa/index.php/admin/HR?s=Complete");
		   }
		   else if((select_dropdown_filters_HR_admin == 'Incomplete'))
		   {
			       window.location.replace("/dsa/dsa/index.php/admin/HR?s=Incomplete");
	 
		   }
				     
    }
</script>
<script >


         
         $(document).ready(function(){
             $('#empTable').DataTable({
                 'processing': true,
                 'serverSide': true,
                 'serverMethod': 'post',
                 'ajax': {
                  
                     'url':
					window.location.origin+"/finserv_test/dsa/dsa/index.php/Admin/Sanction_letters_PG"
                 },
                 'columns': [
                     {data: 'Name'},
                 
					 {data: 'loan_amount'},
				     {data: 'Status'},
					 {data: 'last_updated'},
					 { data: 'Sanction_letter' },
                    { data: 'MITC' },
					 { data: 'Loan_agreement' },
					 {data: 'edit'},
					 {data: 'ProcessingFeeAmount'},
					 	 {data: 'ProcessingFee'},
					 	  {data: 'payment_status'},
						   {data: 'Cheque'},
						    {data: 'documents'}
						   
					 
			
					
					
                 ]
             });
          //   $('#empTable').DataTable().column(0).visible(false);
         });
         </script>
     

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>


   
	
       

       

</body>
</html>
