<?php
    $message = $this->session->userdata('branch');
	
    if (isset($message)) {
		if($message==1)
		{
        echo '<script> swal("success!", "New Branch Added successfully", "success");</script>';
         $this->session->unset_userdata('branch');	
		}
		else if($message==2)
		{
        echo '<script> swal("success!", "branch deleted successfully", "success");</script>';
         $this->session->unset_userdata('branch');	
		}
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             $this->session->unset_userdata('branch');	
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
            	          	
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center" style="margin-bottom: 12px;">
					<button  class="btn" data-toggle="modal"  data-target="#edit_model"><i class="fa fa-plus" style="color:Green"></i> <b>Add New Branch</b></button>
				</div>
			  
            </div>
        </div>
		
</div>


<?php  foreach($Branches as $row){ ?>
	
					
					<div class="row justify-content-center">
						
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
								<div class="card mb-3">
								  <div class="row no-gutters" style="padding: 10px;">
									<div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
									<i class="fa fa-university" style="margin: 15px; font-size: 16px;"></i>	
									</div>
									<div class="col-xl-9 col$row-lg-8.5 col-md-8.5 col-sm-8.5 col-8 align-self-center" style="margin-left: 10px;">
									 <b>  City :<?php echo $row->city;  ?></b>	</br>
									  <b> Location :<?php echo $row->Branch_Location;  ?></b> 	</br>
									</div>
									<div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
										<button data-toggle="modal" data-id = "<?php echo $row->Branch_id;?>" data-target="#deleteModel"><i class="fa fa-trash"></i></button>
									</div>
								  </div>
								</div>	
								
						</div>	
						
					</div>
				<?php } ?>
<!-- Modal -->
	<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    ALERT
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_city_master" method="POST" id="delete_city_master">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this City ?</label>	                    
	                    <input name="id" type="number" class="idform"  hidden/>	                        
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
	<!---------------------------------------------------model close------------------------------------------------>
	<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                   Add Branch Location
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
				
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/Save_Branch_Location" method="POST" id="Save_Branch_Location">
	                  <div class="form-group">
					   <label  class="col-12 control-label padding-10">Select City</label>	
					  <select class="form-control" aria-label="Default select example" name="city_name" id="city_name"  >
																	<option value="">Select city</option>
																	<?php if (isset($Cities)){ foreach($Cities as $City){ ?>
																	<option value="<?php  echo $City->City; ?>"><?php  echo $City->City; ?></option>
																	<?php }  }?>
																																	
															</select>
					  <label  class="col-12 control-label padding-10">Branch Location</label>	
                        <input name="branch_location" type="text" class="form-control" >
	                    <input name="id" type="number" class="idform"  hidden />	                        
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
							Add
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>	
	<!--Display Modal -->
	<div class="modal fade" id="display" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    Branch Location
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                <div id="dropdown1">
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

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
		 $('#edit_model').on('hidden', function() {
			clear()
		  });
		$('#deleteModel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)		  
		});
	});
	$(document).ready(function(){
		$('#edit_model').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)		  
		});
	});
</script>
</body>
</html>
	