<?php
 
$s = "";

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
													   <lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Add Product&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/distributor/addproduct?type=product">
														  <i class="fa fa-plus "style='font-size:24px; color:green;'></i></a></lable>
												   </div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
												   </div>
												   <div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;">
													   <lable style="margin-left:8px;">Filter : </lable>
													  </div>
												   <div class="col-sm-2" >
                                                   <input type="text" hidden value="<?php echo $s;?>" id="filter">

													   <select class="form-control" aria-label="Default select example" name="select_filters" id="select_dropdown_filters_products">
														   <option   value="">Select Filter</option>
														   <option value="all">All Products</option>
														   <option <?php if(isset($_REQUEST['s']) && $_REQUEST['s'] == 'fixed') { echo " selected "; }?> value="fixed">Fixed Products</option>
														   <option  <?php if(isset($_REQUEST['s']) && $_REQUEST['s'] == 'percentage') { echo " selected "; } ?>  value="percentage">Percentage Products</option>
														   <option <?php if(isset($_REQUEST['s']) && $_REQUEST['s'] == 'Interest_Subvent_Yes') { echo " selected "; } ?>  value="Interest_Subvent_Yes">Interest Subvent Yes</option>
														   <option <?php if(isset($_REQUEST['s']) && $_REQUEST['s'] == 'Interest_Subvent_No') { echo " selected "; } ?>  value="Interest_Subvent_No">Interest Subvent No</option>
														   
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
						       <th hidden >ID</th>
							   <!--<th>Invoice Issued By</th>-->
							   <th>product name</th>
							   <th>interest rate</th>
							   <th>processing fee type</th>
							   <th>processing fee</th>
							   <th>tenure</th>
							   <th>interest subvention</th>
							   <th>Actions</th>
						   
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/distributor/delete_product" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Product?</label>	                         
	                    <input name="delteid" type="number" class="idform" hidden  />
							 						
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

<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
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
   $('#deleteModel').on('show.bs.modal', function (event) {
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
function demo()
	{
		var $var=document.getElementById("filter_name");
		alert($var);
	}
	</script>

	   <script>
        $(document).ready(function(){
			
			<?php if(isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
			
			swal({
  title: "<?php echo $_SESSION['title']; ?>",
  text: "<?php echo $_SESSION['message']; ?>",
  icon: "success",
});
			
			<?php  unset($_SESSION['message']); }  ?>
			
//$("#select_dropdown_filters_products2").change(function(){
  
			var filter = document.getElementById("select_dropdown_filters_products").value;
			
			//alert(filter);
  
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
				  dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                'ajax': {
                    //'url':'ajaxfile.php'
                    'url': window.location.origin+"/finserv_test/dsa/dsa/index.php/distributor/listproduct",
					'data':{filter:filter},
                },
             
                
                'columns': [

					
                    
                    //{ data: 'invoiceissuedby' },
					{ data: 'name' },
					{ data: 'interestrate' },
                    { data: 'processingfeetype' },
					{ data: 'processingfee' },
					{ data: 'tenure' },
				
					{ data: 'interestsubvention' },
					{ data: 'Action' },


                ]
				
            });
            
          // $('#empTable').DataTable().column(0).visible(false);
        });
		//alert("The text has been changed.");
// });
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