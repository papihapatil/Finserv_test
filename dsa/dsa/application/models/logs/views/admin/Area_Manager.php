<style>
	@media only screen and (max-width:768px){
		.add{
			padding-left: 144px;
    margin-left: -5%;
    margin-top: -23px;
    margin-bottom: 28px
		}
	}
	@media only screen and (max-width:768px){
		.filt{		
    margin-right: 243px;
		}
	}
	</style>

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
																<?php if(isset($data))
				      											{
						 										 if(count($data) != 0) 
						  											{  ?>
						  											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($data); ?>&nbsp;&nbsp;<a href="">
						  												 <i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
						   												<?php $excelData = json_decode(json_encode($data), true);?>
						  											</div>
						 									 		<?php  } 
				         											 else
						 											 {?>
						   											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($data)) {echo count($data);}else {echo 0;}?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																	</div>
																	<?php     } 
			           												} 
																	else
																	{ ?>
					       											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($data)) {echo count($data);}else {echo 0;} ?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:20px; color:green;'></i></a></lable>
																	</div>
																	<?php   }   ?>
																	<div class="col-sm-3" style="padding-left:0px;margin-left:-5%;">
																	<div class="add">
																		<lable style=" padding: 7px;border:1px solid #ccc;font-weight:bold;">  Add Area Manager&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/dsa/new_customer?type=Area_Manager">
						   												<i class="fa fa-plus "style='font-size:20px; color:green;'></i></a></lable>
																	</div>
																	</div>
																	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
																	</div>
				   													<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				   														
																	</div>
																	
																	<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;"><div class="filt"><lable style="margin-left:8px;">Filter : </lable>
				   													</div>
																	</div>
																	<div class="col-sm-2" >
																		<select class="form-control" aria-label="Default select example" name="select_filters" id="select_dropdown_filters_HR_admin" onchange="select_dropdown_filters_HR_admin();">
																			<option>Select Filter</option>
																			<option value="all">All </option> 
																			<option value="Complete">Completed Profile</option>
																			<option value="Incomplete">Incomplete Profile</option>
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
																		<table id="example" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															<th>Sr</th>
																					<th>Name</th>
																					<th>Email</th>
																					<th>Mobile</th>
																					<th>Profile Status</th>
																					<th>Date</th>
																					
																					<th>Actions</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php  $i= 1 ; if(!empty($data)){foreach($data as $row){  ?>
																				<tr>
					    															<td><?php echo $i;?></td>
																					<td><?php echo $row->FN." ".$row->LN;?></td>
																					<td><?php echo $row->EMAIL; ?></td>
																					<td><?php echo $row->MOBILE; ?></td>
																					<?php if($row->Profile_Status!="Complete") { ?><td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>
					   																<?php }else { ?><td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>
																					<?php } ?>
																					<td><?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y');?></td>
																					
																					<td><a href="<?php echo base_url()?>index.php/dsa/profile?id=<?php echo $row->UNIQUE_CODE;?>" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a>&nbsp;&nbsp;
																				
																					<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel" class="btn modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																				
																					</td>
																				</tr>
																			<?php  $i++; } } ?> 
																		</tbody>
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_Cluster_Manager" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Cluster Manager?</label>	                         
	                    <input name="id" type="number" class="idform" hidden  />
							 						
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
	         window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Area_Manager?s=all");
		   }
		   else if(select_dropdown_filters_HR_admin == 'Complete')
		   {
			       window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Area_Manager?s=Complete");
		   }
		   else if((select_dropdown_filters_HR_admin == 'Incomplete'))
		   {
			       window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Area_Manager?s=Incomplete");
	 
		   }
				     
    }
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
