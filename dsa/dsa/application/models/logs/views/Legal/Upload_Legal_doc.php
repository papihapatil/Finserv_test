
<?php
    $message = $this->session->userdata('result');
  
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
										<div>
											<div class="container">
												<div class="text-center">
												<h3>Send Legal Document To Credit Manager</h3>
												</div>
												
												<br>
												</br>
												
												<Form action="<?php echo base_url('index.php/Legal/Do_upload_Legal_Doc');?>" method="post" enctype="multipart/form-data">
												<div class="row">
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
												  
														<div style=" margin-top: 8px;" class="col">
														  <label style="font-size: 12px;" for='file-upload' class='custom-file-upload'>
																			<i class='fa fa-cloud-upload'></i> Select Document
																		</label>
																		<input id='file-upload' type='file' name='userfile[]'  multiple="multiple" required  onchange="Filevalidation()" />
														                <input type="text" id="id" name="id" value="<?php echo $_GET['ID']; ?>" hidden >
																		<input type="text" id="Credit_id" name="Credit_id" value="<?php if(isset($Applicant_data)){echo $Applicant_data->Credit_id;} ?>" hidden >
																		<input type="text" id="UNIQUE_CODE" name="UNIQUE_CODE" value="<?php echo $_GET['UID']; ?>" hidden >
														</div>  
           
													</div>
														
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
														<div style=" margin-top: 8px;" class="col">
																 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Remark </label>
																 <br>
																 <input type="radio" id="html" name="remark" value="Positive " required>
		                                                         <label for="html">Positive </label>
		                                                         <input type="radio" id="html" name="remark" value="Negative" required>
		                                                         <label for="html">Negative</label>
		                                                         <input type="radio" id="html" name="remark" value="Referred" required>
		                                                         <label for="html">Referred</label>
														</div>
													</div>													
												
													
                                                   
												</div>
												 
                                                <div class="row col-12 justify-content-center">
													<div class="text-center ">
														<center>
														   <button type="submit" class="btn btn-primary">Submit</button>
														 
														</center>
													</div>
												</div>
												
											</form>
												
												
											</div>
										</div>
									</div>
								</div>
								<div class="row col-12 justify-content-center">
											<div>
												

													<?php  if (isset($message)) { ?>
														<div >
															<div class="shadow" style="padding: 50px; margin: 30px;">
																<?php print_r($message); $this->session->unset_userdata('result');?>
																
																</div>
															</div>
														<?php } else{ ?>
														<div >
															<div class="shadow" style="padding: 50px; margin: 30px;">
																<small class="full-black-color">
																</div>
															</div>
														<?php } ?>

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
<script  type="text/javascript">

 $(document).ready(function () {
                
                $('#EMI_Start_Date').datepicker({
				autoclose: true,
				endDate: new Date(new Date().setDate(new Date().getDate())),
				constrainInput: true,
				format: 'yyyy-mm-dd'  
				
});  
            
            });
	$( "#Legal" ).change(function() 
	{
		 var value=$("#Legal option:selected").text();
		
	$('#Legal_name').val(value);
	});
</script>
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
		html+='<div style=" margin-top: 8px;" class="col">';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="Legal_doc[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
		html += '<input type="checkbox" class="form-check-input"  name="Legal_doc_status[]" disabled >';
        html += '</div>';
		
		html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>
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
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
  

</body>
</html>
		