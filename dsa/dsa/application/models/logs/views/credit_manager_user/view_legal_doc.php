
<?php
    $message = $this->session->userdata('result');
  
    ?>
<style>
.doc {
width: 167px;
height: 167px;
border-radius: 10px ;
 border: 2px solid #d8dbe0;

background-color: white;
display: inline-block;
margin:5px;
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
											<div class="container">
												<div class="text-center">
												<h3>Legal Document For <?php echo $Applicant_data->FN.' '.$Applicant_data->LN; ?></h3>
												</div>
												
												<br>
												</br>
												
												
												
											</div>
										</div>
									</div>
								</div>
							    <div class="container">
								    <div class="row">
									  <div class="col-md-12">
										<div class="text-center">		
												
											
												

													<?php  if(count($fileList)!=0) { ?>
														
														
														
																<?php  $i=1;foreach($fileList as $filename){?>
																
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 doc text-center">
																		<span style="font-size:20px;">Legal Document <?php echo $i; ?></span> <br>
																		   <a href="<?php echo base_url().$filename->path?>"  class="btn btn-lg" target="_blank" style="margin: 50px"><i class=" fa fa-file-o text-right" style="color:blue; font-size: 30px;"></i></a>
																	</div>
                                                                
																	<?php $i++;}?>
																
															
													
														<?php } else{ ?>
														<div>
															<div class="shadow" style="padding: 50px; margin: 30px;">
																<small class="full-black-color">
																No Documents are uploaded from Legal
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
				 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
										<div>
											<div class="container">
												<div class="text-center">
												<h3>Technical Document For <?php echo $Applicant_data->FN.' '.$Applicant_data->LN; ?></h3>
												</div>
												
												<br>
												</br>
												
												
												
											</div>
										</div>
									</div>
								</div>
							    <div class="container">
								    <div class="row">
									<div class="col-md-12">
										<div class="text-center">		
											
												

													<?php  if(count($TechnicalList)!=0) { ?>
														
														
														
																<?php  $i=1;foreach($TechnicalList as $filename){?>
																
																	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 doc text-center">
																		<span style="font-size:20px;">Technical Document <?php echo $i; ?></span> <br>
																		   <a href="<?php echo base_url().$filename->path?>"  class="btn btn-lg" target="_blank" style="margin: 50px"><i class=" fa fa-file-o text-right" style="color:blue; font-size: 30px;"></i></a>
																	</div>
                                                                
																	<?php $i++;}?>
																
															
													
														<?php } else{ ?>
														<div>
															<div class="shadow" style="padding: 50px; margin: 30px;">
																<small class="full-black-color">
																No Documents are uploaded from Legal
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
		