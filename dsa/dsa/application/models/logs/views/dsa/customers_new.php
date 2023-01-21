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

				
							<div class="col-sm-3" style="padding-left:0px;;">
							<label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">Customer with Consent&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=customer_consent">
						   <i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></label>
							</div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;margin-left:-8%;">
						   <label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($customers); ?>&nbsp;&nbsp;
						   <?php if(isset($customers))
				       {
						  if(count($customers) != 0) 
						  {  ?> 
						  <a href="<?=base_url('index.php/admin/download_Excel')?>"> 
                        
						   <i class="fa fa-download "style='font-size:24px; color:green;'></i>
						
						</a> <?php }
					else{
						?>
						  <i class="fa fa-download "style='font-size:24px; color:green;'></i>
						
						<?php
					} }?>
						</label>
						   
						   <?php $excelData = json_decode(json_encode($customers), true);?>
						   </div>
			
				   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
				   <input type="date" name="filter_date" onchange="filterDateSelected(event);"/>
						</div>
						<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:13%;"><label style="margin-left:8px;">Filter : </label>
				   </div>
				<div class="col-sm-2" >
			
				<select class="form-control" aria-label="Default select example" name="select_filters" id="select_filters_customers">
						<option value="">Select Filter</option>
						<option value="all">All Customers</option>
						<option value="Complete">Completed Profile</option>
						<option value="Incomplete">Incomplete Profile</option>
				</select>
							
				</div>
		
		   
	
            </div>
          
        </div>
		<hr>
</div>

























<div class="row">
<div class="col-sm-12">
<body class="wide comments example">
    <div class="fw-body">
	    <div class="content">
	        <div style="overflow-x:auto;">
				<div class="demo-html">
					<table id="example" class="display" style="width:100% ;font-size:12px">
						<thead>
							<tr>
								<th>Customer</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Profile Status</th>
								<th>Refered By</th>
								<th>Creted at</th>
								<!--<th>Edit</th>
								-->
								<th>Step 1</th>
								<th>GONOGO</th>
								<th>Bureau</th>
								<th>Cam</th>
								<th>Calculate eligibilty</th>	
								<th>loan Details</th>
								

						

					        </tr>
				        </thead>
				<tbody>
				<?php  $i= 1 ; if(!empty($customers)){foreach($customers as $row){  ?>
					<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $row['FN']." ".$row['LN'];?></td>
								<td><?php echo $row['EMAIL']; ?></td>
								<td><?php echo $row['MOBILE']; ?></td>
								<?php if($row['PROFILE_PERCENTAGE']=='' || $row['PROFILE_PERCENTAGE']!='100') { ?><td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>
								<?php }else if($row['PROFILE_PERCENTAGE']=='100') { ?><td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>
								<?php } ?>
								<td><?php if($row['Refer_By_Name']!=''){echo $row['Refer_By_Name'] .'['.$row['Refer_By_Category'].']';} ?></td>
						<td><?php $date = date_create($row['CREATED_AT']); echo date_format($date, 'd-m-Y');?></td>
						<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/Go_No_GO_?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-question text-right" style="color:green;"></i></a></td>
						
						<!--<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/customer/profile_view_p_o_dsa?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a></td>
						
						<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/view_loan_details?ID=<?php echo $row->UNIQUE_CODE;?>"  class="btn modal_test"><i class="fa fa-inr text-right"></i> </a></td>
						-->
						<!--<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/check_bureau_score?ID=<?php echo $row->UNIQUE_CODE;?>" class="btn modal_test"><i class="fa fa-line-chart text-right" style="color:green;"></i></a></td>
						-->
						<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/GO_No_GO?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-line-chart text-right" style="color:green;"></i></a></td>
						
						<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/show_coapplicants?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>
						<?php if( $row['cam_status']=='Cam details complete')	{?>
						<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Operations_user/genrate_pdf?ID=<?php echo $row['UNIQUE_CODE'];?>" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>
						<?php }
						else
						{
							?>
							<td></td>
							<?php
						}
						
						?>
						<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Rule_Engine/Calculate_eligibility?ID=<?php echo $row['UNIQUE_CODE'];?>"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a></td>
							
						<td><a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/dsa/view_loan_details?ID=<?php echo $row['UNIQUE_CODE'];?>"  class="btn modal_test"><i class="fa fa-inr text-right"></i> </a></td>
					
						</tr>
					<?php  $i++; } } ?> 
				
					
				</tbody>
			
			</table>
		</div>
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

</body>
</html>