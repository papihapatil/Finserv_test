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

																	</div>
													<?php if(isset($data))	{
						 											if(count($data) != 0) 
						  											{  ?>
						  										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   											
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
																					<th>Email ID</th>
																					<th>Phone number</th>
																					<th>account type</th>
																					<th>Edit</th>
																					
																			
																				</tr>
																			</thead>
																			
																	</table>
																</div>
															</div>
	    												</div>
													</div>
                                                </body>
												<!-- Modal -->

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
<!--[if IE]><!--><!--<![endif]-->

<!-- <script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>
<!--------------added by sonal on 29-4-2022------------------------------------->
<script>


         
         $(document).ready(function(){
             $('#empTable').DataTable({
                 'processing': true,
                 'serverSide': true,
                 'serverMethod': 'post',
                 'ajax': {
                 
                     'url':
					window.location.origin+"/finaleap_finserv/dsa/dsa/index.php/Payments/listpayments"
                 },
                 'columns': [

                     {data: 'fullname'},
                       {data: 'emailid'},
                       {data: 'phonenumber'},
					   {data: 'accounttype'},
                       {data: 'Action'},
					
					
					
                 ]
             });
         
         });
         </script>
     

   
	
       

       

</body>
</html>
