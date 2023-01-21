
<?php
 
 $result = $this->session->userdata('result');   if (isset($result)) {
	 
	   if($result=='1'){
		   
			   $res = $this->session->userdata('message');
			   if($res=='Lead Assign Sucessfully')
			   {
			   echo '<script> swal("success!", "Lead Assign Sucessfully", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
						   
			}
			else if($result=='2')
			{
				$res = $this->session->flashdata('message');
			   if($res=='Email id already in use')
			   {
			   echo '<script> swal("warning!", "Email id already in use", "warning");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
		   else if($result=='3')
			{
				$res = $this->session->flashdata('message');
			   if($res=="Customer entry created successfully and credentials has beed sent to customers email-id and mobile number")
			   {
			   echo '<script> swal("success!", "Customer entry created successfully and credentials has beed sent to customers email-id and mobile number", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
			else if($result=='4')
			{
				$res = $this->session->flashdata('message');
			   if($res=="Error in Save Customer Details")
			   {
			   echo '<script> swal("warning!", "Error in Save Customer Details", "warning");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
			else if($result=='5')
			{
				$res = $this->session->flashdata('message');
			   if($res=="Status Updated Sucessfully")
			   {
			   echo '<script> swal("success!", "Status Updated Sucessfully", "success");</script>';
			   $this->session->unset_userdata('result');	
			   }
			   
			}
			
	   }	
	 
	  
	   
   
   
   ?>
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
	   <div class="container">
		   <div class="row">
			   <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
				   <div class="screen-title" style="margin-bottom:40px;">                    	
					   Customers 
				   </div>                    
			   </div>     
			   <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 margin-top-15">
				   Filter By : 
				   <i style="font-size: 12px; margin-right: 4px; margin-left: 4px;"> DATE </i>
				   <input type="date" name="filter_date" onchange="filterDateSelected(event);"/>
				   <?php if($userType != 'NONE') { ?>
					   <?php if($userType != 'DSA_CSR') { ?>
						   
						   <a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/View_Lead?s=all" class="btn-dsa-new-customer">ALL </a>
						   <!--<?php if($userType != 'ADMIN') { ?>
							   <a <?php if($s == 'self'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/customers?s=self" class="btn-dsa-new-customer">SELF </a>                	
						   <?php } ?>-->		                	
					   <?php } ?>	
					   <?php if($userType != 'ADMIN') { ?>
						   <a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/dsa/View_Lead?s=Converted" class="btn-dsa-new-customer">Converted</a>
					   <?php } ?>	
					   <?php if($userType != 'ADMIN') { ?>
						   <a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/dsa/View_Lead?s=Hold" class="btn-dsa-new-customer">Hold</a>
					   <?php } ?>			
					   <?php if($userType != 'ADMIN') { ?>
						   <a style="margin-left: 8px;" href="<?php echo base_url()?>index.php/dsa/View_Lead?s=Reject" class="btn-dsa-new-customer">Reject</a>
					   <?php } ?>
				   <?php } ?>	
			   </div>       	                
		   </div>
		   <div class="row">
					   </div>
	   </div>
</div>
<body class="wide comments example">

   
<div class="fw-body">
   <div class="content">
   <div style="overflow-x:auto;">
	   <div class="demo-html">
	    <input type="text" id="User_id" value=<?php echo $this->session->userdata('ID'); ?> hidden>
		<input type="text" id="User_Type" value=<?php echo $userType; ?> hidden>
		   <table id="example" class="display" style="width:100%">
					<tr id="select_all_tr">
					  <td></td>
					  <td><span id="select_all"><td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
				   </tr>
			   <thead>
			   
				   
				   <tr>
			   
					   <th>SR No</th>
					   
					   <th>Name</th>
					   <th>Address</th>
					   <th>Email</th>
					   <th>Mobile</th>
					   <th>Refer By</th>
					   <th>Lead Already Assign To</th>
					   <th>Lead Status</th>
					   <th>Assign Lead</th>
				   </tr>
				   
			   </thead>
			   
			  <tbody id="user_lead">
				<?php  $i= 1 ; if(isset($customers) && count($customers)!= 0){foreach($customers as $row){  ?>
					<tr>
					    <td><?php echo $i; ?></td>
						
					    <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
						<td><?php echo $row['address'] ?></td>
						<td><?php echo $row['email']; ?></td>
						<td> <?php echo $row['mobile'];  ?></td>
						<td><?php if($row['Refer_By_Name']!=''){echo $row['Refer_By_Name'] .'['.$row['Refer_By_Category'].']';} ?></td>
						<td> <?php echo $row['Lead_Assign_To_Name'];  ?></td>
						<td><?php if( $row['status']==''|| $row['status']==NULL)
							{?>
						
								
									<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#deleteModel" class="btn btn-info modal_test">Change Contact Status</a>
								 
							<?php } else if( $row['status']=='Convert to Customer'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer</a>
							<?php }
							else if( $row['status']=='Convert to customer with consent')
							{
							?>
									<a style="margin-left: 8px;" data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer with Consent</a>
							<?php
							}
							else if( $row['status']=='Reject'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Reject</a> 
							<?php }  else if( $row['status']=='Hold'){?>
										  <a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#deleteModel" class="btn btn-info modal_test disabled">Hold</a> 
										   <a style="margin-left: 8px;" data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#deleteModel" class="btn btn-info modal_test "> Convert to Customer</a>
							<?php } ?>
						</td>
						<td><?php if( $row['status']==''|| $row['status']==NULL){ ?>
						 <button style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#Assign_Lead_Modal" class="btn btn-info Assign_Lead_Modal location"  id="<?php echo $row['Location'];?>">Hold</button> 
						<?php } else {?>
						
						 <button style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row['id'];?>" data-target="#Assign_Lead_Modal" class="btn btn-info Assign_Lead_Modal location disabled"  id="<?php echo $row['Location'];?>">Hold</button> 
				        <?php } ?>
						</td>
					</tr>
				<?php $i++; }} ?>
					
				
					
				</tbody>
		   
		   </table>
	   </div>
   </div>
		   
   </div>
</div>
</div>

</body>
<!------------------------Modal--------------------------------->
<div class="modal fade" id="Assign_Lead_Modal" tabindex="-1" role="dialog" 
		aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
		   <div class="modal-content">
			   <!-- Modal Header -->
			   <div class="modal-header">
				   <h4 class="modal-title" id="myModalLabel">
					  Assign Lead
				   </h4>
				   <button type="button" class="close" 
					  data-dismiss="modal">
						  <span aria-hidden="true">&times;</span>
						  <span class="sr-only">Close</span>
				   </button>                
			   </div>
			   
			   <!-- Modal Body -->
			   <div class="modal-body">
				   
				   <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/BranchManager/Lead_assign_To_Function" method="POST" >
					 <div class="form-group" id="Content_To_display">
						<select class="form-control" aria-label="Default select example" name="Relatyionship_Off" id="Relatyionship_Off">
							<option value="">Select Value</option>
						</select>	   
					    <input name="id" type="number" class="idform" id='idform' hidden />
													
					 </div>                  
			   </div>
					 <!-- Modal Footer -->
					   <div class="modal-footer">
						   <button type="button" class="btn btn-default"
								   data-dismiss="modal">
									   CANCEL
						   </button>
						   <button type="submit" class="btn btn-primary">
							   Assign Lead
						   </button>
					   </div>
				   </form>                
						
		   </div>
	   </div>
   </div>
<!-------------------------------------------------------------------------------------------------------->


   
   
	   




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
		$(".Assign_Lead_Modal ").on("click", function(){
		  var dataId = $(this).attr("data-id");
		 
		  
	  
   });
   </script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>

</body>
</html>