<div class="c-body bg-white " >
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<?php ini_set('short_open_tag', 'On'); ?>
				     <div class="row  bg-white rounded">
						<div class="row justify-content-center col-12">
							<h4 style="margin-top: 15px;  color: black; font-weight: bold; margin-bottom: 10px;"> </h4>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   	<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(!empty($all_engagements)) echo count($all_engagements); else echo "0";?>&nbsp;&nbsp;<a>
						   	<a href="<?=base_url('index.php/HR/download_all_engagement_Excel_')?>"><i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding-right:0px;margin-right:0px;">
						   	<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">Add new Engagement &nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/HR/Add_Engagement">
							<i class="fa fa-plus "style='font-size:24px; color:green;'></i>	</a></lable>
						</div>
				     </div>

					 <div class="row">
						<div class="col-sm-12">
						<hr>
						</div>
					 </div>
					 <div class="row">
						<div class="col-sm-12">
						<body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="example" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															<th>Sr</th>
																					<th>Client Name</th>
																					<th>Resource Name</th>
																					<th>Monthly Consultant Compensation</th>
																					<th>Monthly Billing to Client </th>
																					<th>Engagement start date</th>
																					<th>Engagement end date</th>
																					<th>Billing start date</th>
																					<th>Status</th>
																				    <th>Edit</th>
																					
																				
																				</tr>
																			</thead>
																			<tbody>
																				<?php  $i= 1 ; if(!empty($all_engagements)){ foreach($all_engagements as $row){  
																					
																				?>
																				<tr>
					    															<td><?php echo $i;?></td>
																					<td><?php echo $row->Client_name;?></td>
																					<td><?php echo $row->resource_name;?></td>
																				    <td><?php echo $row->monthly_compensation;?></td>
																			    	<td><?php echo $row->monthly_billing;?></td>
																					<td><?php echo $row->Engagement_start_date	;?></td>
																					<td><?php echo $row->Engagement_end_date;?></td>
																					<td><?php echo $row->Billing_start_date;?></td>
																					<td><?php echo $row->Status;?></td>
																					<?php if($row->HR_ID == $HR_ID)
																					{
																					?>
																					<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/HR/Add_Engagement?form_id=<?php echo base64_encode($row->id);?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a></td>
																					
																					<?php
																					}
																					else if($row->Status !='In Draft')
																					{
                                                                                    ?>
																					<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/HR/Add_Engagement?form_id=<?php echo base64_encode($row->id);?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a></td>
																					
																					<?php
																					}
																					else if($row->Status =='In Draft')
																					{
																					?>
																					<td><a style="margin-left: 8px; " class="btn modal_test"><i class="fa fa-edit text-right" style="color:#ccc;"></i></a></td>
																					
																					<?php
																					}
																					?>


																				    	
																				</tr>
																			<?php  $i++; } } ?> 
																		</tbody>
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
 
 <script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->
	
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>
