<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-3 col-3">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">DSA</small> 
                    </div>                    
                </div>            	
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-9 col-9 margin-top-15">
                	Filter By :
                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/dsa?s=all" class="btn-dsa-new-customer">ALL </a>
                	<a <?php if($s == 'city'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/dsa?s=city" class="btn-dsa-new-customer">CITY </a>                	
                	<button <?php if($s == 'bnk'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> data-toggle="modal" data-id = "bank" data-target="#deleteModel">BANK</button>
                	<a style="margin-left: 10px;" href="<?php echo base_url()?>index.php/dsa/new_customer?type=dsa" class="btn-dsa-new-customer">Add New DSA</a>
            	</div>
            </div>
        </div>
</div>

<?php if(count($data) == 0) {?>
	<div class="row justify-content-center">
        <div class="screen-title" style="margin-top: 10%;">
        	<small style="border-radius: 10px; padding: 15px; background-color: white;">Dsa not available in selected filter, please change filter value.</small> 
        </div>                    
    </div>            	
<?php }?>

<?php foreach($data as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			<a href="<?php echo base_url()?>index.php/dsa/profile?id=<?php echo $row->UNIQUE_CODE;?>">
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    <?php if($row->PHOTO !='') { ?>	
				      <img  style="margin-left: 10px;" src="<?php base_url()?>/dsa/dsa/images/<?php echo $row->PHOTO;  ?>" class="rounded float-left card-img manager-img">
				    <?php } else {?>
				    	<img  style="width:80px; height: 80px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 4px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				    <?php } ?>
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8">
				      <div class="card-bg">
				      	<div class="row">
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        		<b style="font-size: 14px;"><?php echo $row->FN." ".$row->LN;  ?></b> 
						        <?php if($row->IS_STRATEGIC_PARTNER == 1){?>
						        	<i style="margin-left: 4px; color: #27a4ba" class="fa fa-handshake"></i>
						        <?php } ?>	
				        	</div>
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        		<?php if($row->EXPERIENCE == '' || $row->EXPERIENCE == 0) { ?>
				        			<p class="card-text" 	 	style="font-size: 10px; color: red">INCOMPLETE PROFILE</p>
						        <?php }else { ?>
						        	<p class="card-text" style="color: green; font-size: 10px;">COMPLETED PROFILE</p>
						        <?php } ?>
				        	</div>
				        </div>				        
				        <div class="row">
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        		<p class="card-text"><small class="text-muted">Email : <?php echo $row->EMAIL;  ?></small></p>
				        	</div>
				        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        		<p class="card-text"><small class="text-muted">Mobile : <?php echo $row->MOBILE;  ?></small></p>
				        	</div>
				        </div>
				       				        				        
				        <?php if($row->IS_STRATEGIC_PARTNER == 0){?>	
				        	<form action="<?php echo base_url().'index.php/admin/strategic_partner?partner=1&id=';echo $row->UNIQUE_CODE?>" method="GET" id="strategic_partner_add">
				     			<button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Convert To Strategic Parter</button>			
				     		</form>					        
					     <?php }?>
					     <?php if($row->IS_STRATEGIC_PARTNER == 1){?>
					     	
					     		<form action="<?php echo base_url().'index.php/admin/strategic_partner?partner=0&id=';echo $row->UNIQUE_CODE?>" method="GET"  id="strategic_partner_remove">
					     			<button style="border-radius: 30px; text-align: center; display: inline; background-color: #e3eaed; color: black; font-size: 11px; padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Remove From Strategic Parter</button>			
					     		</form>					        			        							        
					     <?php } ?>   
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	
				    	<i class="fa fa-chevron-right"></i>
				    </div>
				  </div>
				</div>	
			</a>		
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