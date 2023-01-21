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
		<div >
    		<div class="container">
			<div class="row">
			    <div class="col-sm-3">
				<a style="margin-left: 9px; background-color: #25a6c6;margin :2px;padding:6px;"  href="<?php echo base_url()?>index.php/dsa/new_customer?type=manager" class="btn btn-info" style="background-color: #25a6c6;">Add Manager </a>
                </div>
  				<div class="col-sm-4">
					<div class="screen-title" style="margin-bottom:40px;">                    	
					<form id="credit_saction_form" action="<?= base_url('index.php/dsa/managers')?>" method="post">
	     			<input type="text" class="form-control" name="filter_name" id="filter_name"  placeholder="Search by first or last name"/>
	        		</div> 
            </div>
             <div class="col-sm-1">
              <button class="btn btn-info" style="background-color: #25a6c6;" name="submit" value="submit">Search</button>
			  
	         </form>	
          </div>

          <div class="col-sm-3">
<form id="credit_saction_form" action="<?= base_url('index.php/dsa/managers')?>" method="post">
<select class="form-control" aria-label="Default select example" name="select_filters">
		<option value="">Select</option>
		<option value="all">All Managers</option>
		<option value="Complete">Completed Profile</option>
		<option value="Incomplete">Incomplete Profile</option>
		</select>
</div>
<div class="col-sm-1">     
	<button class="btn btn-info" style="background-color: #25a6c6;" name="submit" value="submit">
		Filter
	</button>
		
</div>
</form>	
</div>

</div>
<hr>
</div>











<div class="row">
<div class="col-sm-12">
<?php if(count($managers) != 0) {?>
	<div class="row justify-content-center">
		<div class="screen-title" style="margin-bottom:1%;">
			<h5 style="border-radius: 10px; padding: 15px; background-color: #dcdcdc;"><?php echo count($managers); ?> Record Found </h5>
    	</div>
		<div class="screen-title" style="margin-left:5%; margin-top:1%;">
			<a href="<?=base_url('index.php/admin/download_Excel')?>"><button class="btn btn-info" style="background-color: #25a6c6;" >Download Excel</button></a>
		    <?php $excelData = json_decode(json_encode($managers), true);?>
        </div>	
    </div>   
<?php } else{?>
<div class="row justify-content-center">
	<div class="screen-title" style="margin-top:10%;">
		<h5 style="border-radius: 10px; padding: 15px; background-color: #ccc;"><?php echo count($managers); ?> Record Found </h5> 
	</div>                    
</div> 
<div class="row justify-content-center">
	<div class="screen-title" style="margin-top:2%;">
		<small style="border-radius: 10px; padding: 15px; background-color: white;">Managers not available in selected filter, please change filter value.</small> 
	</div>                    
</div>            	
<?php }
?>


<?php foreach($managers as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<a href="<?php echo base_url()?>index.php/dsa/manger_profile_dsa?id=<?php echo $row->UNIQUE_CODE;?>">
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    <?php if($row->PHOTO !='') { ?>	
				      <img  style="margin-left: 10px;" src="<?php base_url()?>/dsa/dsa/images/<?php echo $row->PHOTO;  ?>" class="rounded float-left card-img manager-img">
				    <?php } else {?>
				    	<img  style="width:50px; height: 50px; margin-left: 10px; margin-top: 4px; margin-bottom: 4px; margin-left: 14px;" src="<?php base_url()?>/dsa/dsa/images/user.png" class="rounded float-left card-img manager-img">
				    <?php } ?>
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8" style="margin-left:10px;">
				      <div class="card-bg" style="padding:10px;">
					      	<div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<b style="font-size: 14px;"><?php echo $row->FN." ".$row->LN;  ?></b>			     </div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top:10px;">
					        		<?php if($row->EXPERIENCE == '' || $row->EXPERIENCE == 0) { ?><p class="card-text" 	 	style="font-size: 10px; color: red">INCOMPLETE PROFILE</p>
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

					        <div class="row">
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		<p class="card-text"><small class="text-muted">Join Date : <?php $date = date_create($row->CREATED_AT); echo date_format($date, 'd-m-Y h:i'); ?></small></p>
					        	</div>
					        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					        		
					        	</div>
					        </div>				       				        				        				      
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


<div class="row">
		
		<div class="col-5">
			
		</div>			
		<div class="col-7">
			<p><?php echo $links; ?></p>				
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
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>