<div >

        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">View  Esign Document</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>
<div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			<div class="card mb-3">
			    <div class="row no-gutters">			    
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
						<div class="card-body">
							<div class="row justify-content-center">
									<h2 class="text-center" style="color:#d62122;">E-Sign With Aadhaar</h2>
							</div>
							<div class="row justify-content-center " style="margin-top:20px;">
							    <?php if(isset($link))
								     {?>
									   <a href="<?php echo base_url().$link;?>" target="_blank"><button type="button" class="btn btn-primary">View E-Sign Document</button></a>
								<?php }
								   else
								   {?>
								         <a href="#" target="_blank"><button type="button" class="btn btn-primary disabled" id="view_doc">View  E-Sign Document</button></a>
								   <?php }?>
								   
							  
							</div>
						
						</div>
					</div>
			    </div>
		    </div>
		</div>
		<script>
		    $('#view_doc').on('click',function(e)
                        {
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Upload Your Documents", "warning");
								
							}
						}
					 );
		    $('#submit').on('click',function(e)
                        {
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Upload Your Documents", "warning");
								
							}
						}
					 );
					  $('#submit1').on('click',function(e)
                        {
							if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Your Aadhaar E-Sign is Done.", "warning");
								
							}
						}
					 );
		</script>