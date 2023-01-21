<div class="c-body">
				<main class="c-main">
					<div class="container-fluid">
						<div class="fade-in">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
			  							<div class="card-body">
			  											<div class="row" style="padding:20px;margin-top: -20px;">
														<input hidden type="text" value="<?php echo $userID;?>" id="login_user_unique_code">
														<input hidden type="text" value="<?php echo $row->UNIQUE_CODE;?>" id="applicant_unique_code">
														<input hidden type="text" value="<?php echo base64_encode($row->UNIQUE_CODE);?>" id="applicant_encoded_unique_code">
												   				
														<div class="col-sm-12"> 
															<h5>Applicant Name : <?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?></h5>
															<hr>
														</div>
														<br>

														<div class="col-sm-4"> 
															<h6>Type of loan: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>Sanctioned loan Amount: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>Tenure: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>ROI: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														
														</div>
														<div class="col-sm-4"> 
															<h6>Source Name: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															
														</div>
														<div class="col-sm-4"> 
															<h6>Sourcing Branch Name: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															
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
					    														
																					<th>Document Name</th>
																					<th>Uploded Date</th>
																					<th>Uploded By</th>
																					<th>View</th>
																				<th>Waiver</th>
																				</tr>
																			</thead>
																			
																	</table>
																</div>
															</div>
	    												</div>
													</div>
                                                </body>



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


         
         $(document).ready(function(){
	
			
      var applicant_unique_code = document.getElementById("applicant_unique_code").value;
             $('#empTable').DataTable({
                 'processing': true,
                 'serverSide': true,
                 'serverMethod': 'post',
                 'ajax': {
                    
                     'url':window.location.origin+"/finserv_test/dsa/dsa/index.php/Disbursement_OPS/Disbursement_OPS_Pagination",
					'data':{applicant_unique_code:applicant_unique_code},
                 },
                 'columns': [

					{data: 'Doc_name'},
					{data: 'Uploded_on'},
					{data: 'Uploded_by'},
					{data: 'view'},
					{data: 'Waiver'},
					

                 ]
             });
          //   $('#empTable').DataTable().column(0).visible(false);

          
var value=$("#Admin_operations_user_filter").val();
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
				$('#operations_Start_Date_filter').val(firstDay);
				$('#operations_Start_Date_filter').prop('readonly', true);
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
				$('#operations_End_Date_filter').val(lastDay);
				$('#operations_End_Date_filter').prop('readonly', true);
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
				$('#operations_Start_Date_filter').val(firstDay);
				$('#operations_Start_Date_filter').prop('readonly', true);
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
				$('#operations_End_Date_filter').val(lastDay);
				$('#operations_End_Date_filter').prop('readonly', true);
		}
	












          
         });
         </script>
     

   
</body>
</html>