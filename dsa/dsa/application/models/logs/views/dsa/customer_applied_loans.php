	<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title">
                    	<small class="screen-title-txt">CUSTOMER Applied Loans</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>

<div class="font-railway w3-container margin-top-10 black-color">
  
  <div class="w3-bar w3-custom-header-color-one">
    <button class="w3-bar-item w3-button tablink"><a class="black-color" href="<?php echo base_url()?>index.php/dsa/customer_profile?id=<?php echo $id;?>">PROFILE INFO</a></button>
    <button class="w3-bar-item w3-button tablink"><a class="black-color" href="<?php echo base_url()?>index.php/dsa/customer_moreinfo?id=<?php echo $id;?>">MORE INFO</a></button>
    <button class="w3-bar-item w3-button tablink w3-light-red"><a class="black-color" href="<?php echo base_url()?>index.php/dsa/customer_applied_loans?id=<?php echo $id;?>">Applied Loans</a></button>
  </div>
  
  <div id="London" class="w3-container w3-border city white-color">
	    <div class="w3-panel">
	    	   <?php if(count($loans) == 0) { ?>
					<div >
					        <div class="container">
					            <div class="row">
					            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					                    <div class="screen-title" style="margin:100px;">
					                    	<small class="full-black-color">Customer haven't applied for any loan yet.</small>
					                    </div>
					                </div>            	
					            </div>
					        </div>
					</div>
				<?php } ?>

				<?php foreach($loans as $row){?>
					
					<div class="row justify-content-center">
						
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
							
							<div class="card mb-3">
							  <div class="row no-gutters">			    
							    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8">
							      <div class="card-body">
							        <h3 class="card-title"><b>Loan Type: <?php echo $row->LOAN_TYPE;  ?></b></h3>
							        <p class="card-text">Loan Amount : <?php echo $row->LOAN_AMOUNT;  ?></p>		        
							        <?php if($row->DSA_COMISSION > 0) {?> <p class="card-text full-black-color">DSA Comission : <?php echo $row->DSA_COMISSION;  ?> Rupees</p> <?php } ?>
							        <p class="card-text">Status : <?php echo $row->LOAN_STATUS;  ?></p>
							        <p class="card-text"><small class="text-muted">Loan Duration : <?php echo $row->DURATION;  ?> Years</small></p>
							        <p class="card-text"><small class="text-muted">Applied On : <?php $date=date_create($row->CREATED_AT); echo date_format($date,"d-m-Y h:i:s");;  ?></small></p>
							      </div>
							    </div>
							    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
							    	<i class="fa fa-chevron-right"></i>
							    </div>
							  </div>
							</div>		
						</div>	
						
					</div>
				<?php } ?>
	    </div>
  </div>
</div>











