<?php
 
  $result = $this->session->flashdata('result');   if (isset($result)) {
		if($result=='1'){
			
			    $res = $this->session->flashdata('message');
				if($res=='Mobile number already in use')
				{
				echo '<script> swal("warning!", "Mobile number already in use", "warning");</script>';
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
        </div>
</div>

<?php if(count($customers) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            	Unable to find any customers.
	               						
	            </div>
	        </div>
	</div>
<?php } ?>

<?php foreach($customers as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
			
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				   
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px; color: #000000"><?php echo $row->first_name." ".$row->last_name;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		
					        	</div>
					        </div>				        
					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small >Email : <?php echo $row->email;  ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $row->mobile;  ?></small></p>
					        	</div>
					        </div>

					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<small class="text-muted">Address : <?php  echo $row->address; ?></small>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<!--<p class="card-text"><small class="text-muted">Loan Type : <?php echo $row->loan_type;  ?></small></p>--->
					        	</div>
					        </div>			       				        				        				      
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    	<i class="fa fa-chevron-right"></i>
				    </div>
					
				
				  </div>
				  
				</div>	
				
		
			
		</div>	
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 align-self-center">
		
		<?php if( $row->status==''|| $row->status==NULL)
		{?>
	
		    
				<a style="margin-left: 8px; margin-top:-10px;"class="btn btn-info modal_test">Status [ not checked ]</a>
            
		 
		<?php } else if( $row->status=='Convert to Customer'){?>
		              <a style="margin-left: 8px; margin-top:-10px;" class="btn btn-info modal_test disabled"> Converted to Customer</a>
		<?php }  else if( $row->status=='Reject'){?>
		              <a style="margin-left: 8px; margin-top:-10px;"  class="btn btn-info modal_test disabled">Reject</a> 
		<?php }  else if( $row->status=='Hold'){?>
		              <a style="margin-left: 8px; margin-top:-10px;"  class="btn btn-info modal_test disabled">Hold</a> 
		<?php } ?>
		
		</div>
		
	</div>
	<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    Change Status
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/dsa/Change_Contact_Status" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Select Status  </label>	                    
	                    <input name="id" type="number" class="idform" hidden />
							  <input type="radio" id="vehicle1" name="status" value="Convert to Customer" checked >
							  <label for="vehicle1"> Convert to Customer </label><br>
							  <input type="radio" id="vehicle2" name="status" value="Reject">
							  <label for="vehicle2"> Reject </label><br>
							  <input type="radio" id="vehicle3" name="status" value="Hold">
							  <label for="vehicle3"> Hold </label><br><br>						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                   Change Status
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>


<?php } ?>


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
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>