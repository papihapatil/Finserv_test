
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
                                       
										<body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="example" class="display" style="width:100%">
																			<thead>
																				<tr>
					    															<th>Sr</th>
																					<th>Risk Dimentions</th>
																					<th>parameters</th>
																					<th>Criteria</th>
																					
																					
																				</tr>
																			</thead>
																			<tbody>
																				<?php  $i= 1 ; if(!empty($data)){foreach($data as $row){  ?>
																				<tr>
					    															<td><?php echo $i;?></td>
																					<td><?php echo $row->Risk_Dimention;?></td>
																					<td>
																					<table>
																						<?php  $j= 1 ; if(!empty($parameters)){foreach($parameters as $parameter){if($parameter->RD_ID==$row->RD_ID){ ?>
																						<tr Style=" border: 1px solid #ddd; border-collapse: collapse;">
																						<td Style=" border: 1px solid #ddd; border-collapse: collapse;" data-parameter="<?php echo $parameter->parameters; ?>" data-id="<?php echo $i; ?>" id="<?php echo $parameter->P_ID; ?>" onclick="display_criteria(this);" ><?php echo $parameter->parameters; }?></td>
																						<?php if($parameter->RD_ID==$row->RD_ID){ ?><td Style=" border: 1px solid #ddd; border-collapse: collapse;"><i class="fa fa-plus add_criteria"style='font-size:24px; color:green;'  data-toggle="modal" data-target="#Add_Criteria" data-id=<?php echo $parameter->P_ID;?> data-risk_dimention="<?php echo $parameter->parameters; ?>"  title="Add Criteria"></i><?php } ?></td>
																						</tr>
																						<?php $j++; }}?>
																						</table>
																					</td>
																					<td id="Criteria_<?php echo $i;?>" >
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
								        <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">
															Add Risk Dimentions
														</h4>
														<button type="button" class="close" 
														   data-dismiss="modal">
															   <span aria-hidden="true">&times;</span>
															   <span class="sr-only">Close</span>
														</button>                
													</div>
													
													<!-- Modal Body -->
													<div class="modal-body">
														
														<form class="form-horizontal" role="form"  method="POST" id="Add_Risk_Dimentions">
														  <div class="form-group">
																		<label  class="col-12 control-label padding-10">Add new risk dimention </label>	                         
															<input required name="risk_dimention" type="text" class="form-control" id="risk_dimention"  />
																						
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
                                        <div class="modal fade" id="Add_Criteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">
															Add Criteria
														</h4>
														<button type="button" class="close" 
														   data-dismiss="modal">
															   <span aria-hidden="true">&times;</span>
															   <span class="sr-only">Close</span>
														</button>                
													</div>
													
													<!-- Modal Body -->
													<div class="modal-body">
														
														<form class="form-horizontal" role="form"  method="POST" id="Add_Criteria_Form">
														  <div class="form-group">
														   
															<label  class="col-12 control-label padding-10">Add new Criteria for <span id="risk_name"></label>	                         
														    <div style="margin-top:10px;" >
																    <label  class="col-12 control-label padding-10">Select type for criteria<span id="risk_name"></label>
																    <select class="form-control" id="criteria_type" name="criteria_type" required>
																		
																			<option value="">Select Type</option>
																			<option value="Numeric">Numeric</option>
																			<option value="Text">Text</option>
																	</select>
																	  
															</div>
															
																<div id="numeric_criteria" style="display:none; margin-top:10px;" >
																	<label  class="col-12 control-label padding-10">Add range <span id="risk_name"></label>
																	<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
																				<label  class="col-12control-label padding-10">From <span id="risk_name"></label>
																				<input  name="criteria_from" id="criteria_from" type="text" class="form-control"  />
																		</div>
																		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
																				<label  class="col-12control-label padding-10">To <span id="risk_name"></label>
																				<input  name="criteria_to" id="criteria_to" type="text" class="form-control"  />
																		</div>
																	</div>
																</div>
																<div id="text_criteria" style="display:none; margin-top:10px;" >
																    <label  class="col-12 control-label padding-10">Add criteria <span id="risk_name"></label>
																	<input  name="text_criteria" id="criteria" type="text" class="form-control" />
																</div>
																<div style="margin-top:10px;" >
																    <label  class="col-12 control-label padding-10">Add score <span id="risk_name"></label>
																	<input required  name="score" id="score" type="text" class="form-control" />
																</div>
                                                            </div>
                                                         														
															<input  name="parameter_id" type="text" class="form-control" id="parameter_id" hidden />
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
										<div class="modal fade" id="Remove_Criteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">
														Remove Criteria
														</h4>
														<button type="button" class="close" 
														   data-dismiss="modal">
															   <span aria-hidden="true">&times;</span>
															   <span class="sr-only">Close</span>
														</button>                
													</div>
													
													<!-- Modal Body -->
													<div class="modal-body">
														
														<form class="form-horizontal" role="form"  method="POST" id="remove_criteria_form">
														  <div class="form-group">
															<label  class="col-12 control-label padding-10">Are You Sure You Want To Remove Criteria ?</label>
                                                            
															<input  name="Criteria_remove_id" type="text" class="form-control" id="Criteria_remove_id" hidden />
														  </div>                  

														  <!-- Modal Footer -->
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																		data-dismiss="modal">
																			CANCEL
																</button>
																<button type="submit" class="btn btn-primary">
																	Delete
																</button>
															</div>
														</form>                
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="<?php echo base_url(); ?>js/Rule_Engine.js"></script>
</body>
</html>