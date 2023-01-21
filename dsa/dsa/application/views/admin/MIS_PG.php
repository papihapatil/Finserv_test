<style>
	@media only screen and (max-width:768px){
		.filt{		
    margin-right: 243px;
		}
	}
	</style>
<?php
 
  $result = $this->session->flashdata('result');   if (isset($result)) {
		if($result=='1'){
			
			    $res = $this->session->flashdata('message');
				if($res=='Customer Deleted Sucessfully')
				{
				echo '<script> swal("success!", "Customer Deleted Sucessfully", "success");</script>';
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


<div >
        <div class="">
			<div class="row">

				
				
				
							<div class="col-sm-2" style="margin-bottom:30px;" >
							<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Add MIS User &nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=MIS">
						   <i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
							</div>
			
					
				   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						</div>
						<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;"><div class="filt"><lable style="margin-left:8px;">Filter : </lable>
				   </div>
						</div>
				<div class="col-sm-2" >
			
		
						</select>
							
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
					    <th hidden>id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Profile Status</th>
						
						<th>Creted at</th>
						<th>Actions</th>
					</tr>
				</thead>
				
			
			</table>
		</div>
	</div>
			
	</div>
</div>
</div>

</body>
	
	<div class="modal fade" id="deleteModel_delete" tabindex="-1" role="dialog" 
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_dsa" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this DSA ?</label>	                         
	                    <input name="id" type="number" class="idform"  hidden />
							 						
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

<!-- Modal -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            	<h4 class="modal-title" id="myModalLabel">
                    FILTER BY BANK 
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/dsa" method="GET" id="dsa_bnk_filter">
                  <div class="form-group">                    
					<div class="wrap-select validate-input ">
						<label class="input100"> Select Bank Name </label> 
						<span class="focus-input100"></span>
						<input type="text" name="s" value="bnk" hidden>
						<select name="bnk_name" style="border: 0.3px solid #e2dede;background-color: #f7f7f7; margin-left: 40px; margin-bottom: 8px; padding: 3px;" required> 
						  <option value="">None</option>
						  <?php foreach($banks as $bank) {
								echo "<option value='$bank->BANK_NAME'>$bank->BANK_NAME</option>";
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
                
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/dsa" method="GET" id="dsa_city_filter">
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


         
         $(document).ready(function(){
             $('#empTable').DataTable({
                 'processing': true,
                 'serverSide': true,
                 'serverMethod': 'post',
                 'ajax': {
                     //'url':'ajaxfile.php'
                     'url':
                     window.location.origin+"/finserv_test/dsa/dsa/index.php/Admin/MIS_PG"
                 },
                 'columns': [

					{data: 'FN'},
					 {data: 'Email'},
					 {data: 'MOBILE'},
					
					 {data: 'Profile_Status'},

					 {data: 'date'},
					 {data: 'Actions'},
					

                 ]
             });
          //   $('#empTable').DataTable().column(0).visible(false);
         });
         </script>
     

   
	
       

</body>
</html>