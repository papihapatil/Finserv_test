<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">Applied Loans</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>

<?php if(count($loans) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row">
	            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="screen-title" style="margin:100px;">
	                    	<small style="border-radius: 10px; padding: 15px; background-color: white;" class="full-black-color">You haven't applied for any loan yet.</small>
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
			        <h3 class="card-title"><b>Loan Type: <?php 
			        if($row->LOAN_TYPE == 'home')echo 'Home Loan';  
			        else if($row->LOAN_TYPE == 'personal')echo 'Personal Loan';
			        else if($row->LOAN_TYPE == 'business')echo 'Business Loan';
			        else if($row->LOAN_TYPE == 'credit')echo 'Credit Card';
			        else if($row->LOAN_TYPE == 'lap')echo 'Loan Against Property';
			        ?></b></h3>

			        <?php if($row->LOAN_TYPE != 'credit') { ?><p class="card-text">Desired Loan Amount : <?php echo $row->DESIRED_LOAN_AMOUNT;  ?></p>
			        <?php } ?>

			        <?php if($row->LOAN_TYPE == 'home') {?>			        			        
				        <p class="card-text full-black-color">Sub Loan Type : <?php echo $row->HOME_LOAN_TYPE;  ?></p>
				        <p class="card-text">Tenure : <?php echo $row->TENURE;?> Year(s)</p>
				        
			        <?php }?>

			        <?php if($row->LOAN_TYPE == 'credit') {?>			        			        				        
				        <p class="card-text">Applied Bank : <?php echo $row->CC_BANK;?></p>
				        
			        <?php }?>

			        <?php if($row->LOAN_TYPE == 'personal' || $row->LOAN_TYPE == 'business') {?>			        	
			        	<p class="card-text">Tenure : <?php echo $row->TENURE;?> Year(s)</p>		       	
				        <p class="card-text">Reason for Loan : <?php echo $row->REASON_FOR_VISIT;?></p>
				        
			        <?php }?>

			        <?php if($row->LOAN_TYPE == 'lap') {?>			        	
			        	<p class="card-text">Tenure : <?php echo $row->TENURE;?> Year(s)</p>		       	
				        <p class="card-text">Sub loan type : <?php echo $row->HOME_LOAN_TYPE;?></p>
				        
			        <?php }?>
			        
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