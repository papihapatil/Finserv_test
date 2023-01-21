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
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding-right:0px;margin-right:0px;" >
						   								<label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Add Risk Dimention&nbsp;&nbsp;
						   									<i class="fa fa-plus"style='font-size:24px; color:green;'  data-toggle="modal" data-target="#deleteModel"></i></lable>
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
																					<th>Risk Dimentions</th>
																					<th>parameters</th>
																					<th>Add Parameter</th>
																					<th>Remove Risk Dimention</th>
																					
																				</tr>
																			</thead>
																			<tbody>
																				<?php  $i= 1 ; if(!empty($data)){foreach($data as $row){  ?>
																				<tr>
					    															<td><?php echo $i;?></td>
																					<td><?php echo $row->Risk_Dimention;?></td>
																				
																					<td>
																						<table>
																						<tr Style="border: 1px solid #ddd; border-collapse: collapse;">
																						   
																						    <td Style="border: 1px solid #ddd; border-collapse: collapse;"><b>Parameters</b></td>
																							<td Style="border: 1px solid #ddd; border-collapse: collapse;"><b>Weights in %</b></td>
                                                                                            <td Style="border: 1px solid #ddd; border-collapse: collapse;"><b>Update Parameter</b></td>
																							<td Style="border: 1px solid #ddd; border-collapse: collapse;"><b>Remove Parameter</b></td>
                                                                                            
																						</tr>
																						<?php  $j= 1 ; if(!empty($parameters)){foreach($parameters as $parameter){if($parameter->RD_ID==$row->RD_ID){ ?>
																						<tr Style=" border: 1px solid #ddd; border-collapse: collapse;">
																						
																						<td  Style=" border: 1px solid #ddd; border-collapse: collapse;" id="<?php echo $parameter->P_ID; ?>" ><?php echo $parameter->parameters; ?> </td>
																						<td  Style=" border: 1px solid #ddd; border-collapse: collapse;" id="<?php echo $parameter->P_ID; ?>" ><?php echo $parameter->Weights; ?> </td>
																						<td Style=" border: 1px solid #ddd; border-collapse: collapse;"><i class="fa fa-pencil-square-o edit_weight "style='font-size:20px; color:green;'  data-toggle="modal" data-target="#edit_weight" data-id="<?php echo $parameter->P_ID;?>" data-paramete_weight="<?php echo $parameter->parameters ?>" data-risk_dimention="<?php echo $row->Risk_Dimention; ?>" data-Weights="<?php echo $parameter->Weights; ?>"  title="Update"></i></td>
																						<td Style=" border: 1px solid #ddd; border-collapse: collapse;"><i class="fa fa-trash-o remove_parameter" style='font-size:20px; color:red;'  data-toggle="modal" data-target="#remove_parameter" data-id="<?php echo $parameter->P_ID;?>" data-paramete="<?php echo $parameter->parameters ?>" title="Remove"></i></td>
																						<?php } ?>
																						</tr>
																						<?php $j++; }}?>
																						</table>
																					</td>
																					
																					<td><i class="fa fa-plus add_parameter"style='font-size:24px; color:green;'  data-toggle="modal" data-target="#Add_parameter" data-id=<?php echo $row->RD_ID;?> data-risk_dimention=<?php echo $row->Risk_Dimention; ?>  title="Add Parameters"></i></td>
																					<td><i class="fa fa-trash-o remove_risk"style='font-size:24px; color:red;'  data-toggle="modal" data-target="#remove_risk" data-id=<?php echo $row->RD_ID;?> data-risk_dimention=<?php echo $row->Risk_Dimention; ?>  title="Remove Risk Dimention"></i></td>
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
                                        <div class="modal fade" id="Add_parameter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">
															Add Parameters
														</h4>
														<button type="button" class="close" 
														   data-dismiss="modal">
															   <span aria-hidden="true">&times;</span>
															   <span class="sr-only">Close</span>
														</button>                
													</div>
													
													<!-- Modal Body -->
													<div class="modal-body">
														
														<form class="form-horizontal" role="form"  method="POST" id="Add_Parameters">
														  <div class="form-group">
															<label  class="col-12 control-label padding-10">Add new parameters for <span id="risk_name"></label>	                         
															<input required name="parameter" type="text" class="form-control" id="parameter" />
															<label  class="col-12 control-label padding-10">Add Weights in Percentage (%)</label>	                         
															<input required name="Weights" type="text" class="form-control" id="Weights" />
															<input  name="id" type="text" class="form-control" id="risk_id" hidden />
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
										 <div class="modal fade" id="edit_weight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">
														Update Parameters
														</h4>
														<button type="button" class="close" 
														   data-dismiss="modal">
															   <span aria-hidden="true">&times;</span>
															   <span class="sr-only">Close</span>
														</button>                
													</div>
													
													<!-- Modal Body -->
													<div class="modal-body">
														
														<form class="form-horizontal" role="form"  method="POST" id="edit_weight_form">
														  <div class="form-group">
															<label  class="col-12 control-label padding-10"><b>Risk Dimention </b>: <span id="risk_name_weight"></label>
                                                            <label  class="col-12 control-label padding-10"><b>parameter </b>: <span id="parameter_weight"> </label>
															<label  class="col-12 control-label padding-10"><b>update Weight in Percentage (%)</b></label>	                         
															<input required name="Weights_save" type="text" class="form-control" id="Weights_save" style="margin-left:10px;" />
															<input  name="P_ID" type="text" class="form-control" id="P_ID" hidden />
														  </div>                  

														  <!-- Modal Footer -->
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																		data-dismiss="modal">
																			CANCEL
																</button>
																<button type="submit" class="btn btn-primary">
																	Update
																</button>
															</div>
														</form>                
													</div>            
												</div>
											</div>
										</div>
										<div class="modal fade" id="remove_parameter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">
														Remove Parameters
														</h4>
														<button type="button" class="close" 
														   data-dismiss="modal">
															   <span aria-hidden="true">&times;</span>
															   <span class="sr-only">Close</span>
														</button>                
													</div>
													
													<!-- Modal Body -->
													<div class="modal-body">
														
														<form class="form-horizontal" role="form"  method="POST" id="remove_parameter_form">
														  <div class="form-group">
															<label  class="col-12 control-label padding-10">Are You Sure You Want To Remove Parameter <span id="parameter_remove"></span>?</label>
                                                            
															<input  name="P_ID" type="text" class="form-control" id="P_ID" hidden />
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
										<div class="modal fade" id="remove_risk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel">
														Remove Risk Dimention
														</h4>
														<button type="button" class="close" 
														   data-dismiss="modal">
															   <span aria-hidden="true">&times;</span>
															   <span class="sr-only">Close</span>
														</button>                
													</div>
													
													<!-- Modal Body -->
													<div class="modal-body">
														
														<form class="form-horizontal" role="form"  method="POST" id="remove_risk_dimention_form">
														  <div class="form-group">
															<label  class="col-12 control-label padding-10">Are You Sure You Want To Remove Risk Dimention <span id="risk_dimention_remove"></span>?</label>
                                                            
															<input  name="risk_dimention_remove_id" type="text" class="form-control" id="risk_dimention_remove_id" hidden />
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