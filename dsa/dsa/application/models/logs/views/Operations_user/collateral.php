
<?php ini_set('short_open_tag', 'On'); 
$userID=$this->session->userdata("userID");
$this->session->set_userdata("userID" ,$userID );
?>
<?php
    $message = $this->session->flashdata('success');
    if (isset($message)) {
        echo '<script> swal("success!", "CAM generated successfully", "success");</script>';
         $this->session->unset_userdata('success');	
    }

    ?>
	<?php
    $message = $this->session->flashdata('error');
    if (isset($message)) {
        echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
         $this->session->unset_userdata('error');	
    }

    ?>
	<style>
	span.msg,
span.choose {  color: #555;   padding: 5px 0 10px;  display: inherit }
.dropdown   {  width: 300px;  display: inline-block;  background-color: #fff;  border-radius: 13px; border:1px solid;  box-shadow: 0 0 2px rgb(204, 204, 204); transition: all .5s ease;  position: relative;  font-size: 14px;  color: #474747;  margin-left:-140px;  text-align: left  }
.dropdown .select {    cursor: pointer;    display: block;    padding: 2px ; padding-left:10px;padding-right:10px; }
.dropdown .select > i {    font-size: 13px;    color: #888;    cursor: pointer;    transition: all .3s ease-in-out;    float: right;    line-height: 20px}
.dropdown:hover {    box-shadow: 0 0 4px rgb(204, 204, 204)}
.dropdown:active {    background-color: #f8f8f8 }
.dropdown.active:hover,
.dropdown.active {    box-shadow: 0 0 4px rgb(204, 204, 204);    border-radius: 2px 2px 0 0;    background-color: #f8f8f8}
.dropdown.active .select > i {    transform: rotate(-90deg)}
.dropdown .dropdown-menu {    position: absolute;    background-color: #fff;    width: 100%;    left: 0;    margin-top: 1px;    box-shadow: 0 1px 2px rgb(204, 204, 204);    border-radius: 0 1px 2px 2px;    overflow: hidden;    display: none;    max-height: 144px;    overflow-y: auto;  z-index: 9}
.dropdown .dropdown-menu li {    padding: 5px;    transition: all .2s ease-in-out;    cursor: pointer} 
.dropdown .dropdown-menu {    padding: 0;    list-style: none}
.dropdown .dropdown-menu li:hover {    background-color: #f2f2f2}
.dropdown .dropdown-menu li:active {    background-color: #e2e2e2}
.msg{	margin-top:-49px;	margin-left:100px;}
.download{	margin-top:-38px;	margin-left:130px;}



.stepper-wrapper {
  margin-top: auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

  @media (max-width: 768px) {
    font-size: 12px;
  }
}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -81%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: white;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #25a6c6;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}

@media only screen and (max-width:768px){
.source{
	padding-left: 117px
}
}

@media only screen and (max-width:768px){
.dis{
	padding-left: 88px;
    margin-top: -18px;
}
}
</style>
<br>
<div class="stepper-wrapper">

  <div class="stepper-item active">
    <a href="<?php echo base_url()?>index.php/Operations_user/CAM_Applicant_Details?ID=<?php echo $row->UNIQUE_CODE;?>"><div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o" aria-hidden="true"></i></div>
    <div class="step-name">Applicant Details</div></a>
  </div>

 	<div class="stepper-item active">
    	 <a href="<?php echo base_url()?>index.php/Operations_user/Document_verification">
  <div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>
    	<div class="step-name">Document Verification</div> </a>
  	</div>
 


  	<div class="stepper-item active">
    	 <a href="<?php echo base_url()?>index.php/Operations_user/Credit_Analysis"><div class="step-counter"><i style="font-size:18px;color: #25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div>
      	<div class="step-name">Credit & Analysis</div></a>
  	</div>


  <div class="stepper-item active">
    <a href="<?php echo base_url()?>index.php/Operations_user/Other_attributes"><div class="step-counter"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div> 
    <div class="step-name">Other Attributes</div></a>
  </div>
  <?php if($appliedloan->LOAN_TYPE=='home'|| $appliedloan->LOAN_TYPE=='lap')
			             {	?>
   <div class="stepper-item completed">
    <a href="<?php echo base_url()?>index.php/Operations_user/collateral"><div class="step-counter"><i style="font-size:18px;color:#ffffff; text-align: center; width: 100%;" class="fa fa-file-image-o"></i></div> 
    <div class="step-name">Collateral and Recommendations</div></a>
  </div>
  <?php } ?>
</div>
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id == $this->session->userdata("Cust_id")) {?>
					<?php 
						if(isset($row_more))
						{ 
              				if($row_more->CPA_ID == $userID )
              				{
                		?>
						<div class="row" style="margin-left: 10px;">
							Edit

							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
								<div style="padding-bottom:10px;">
									<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/edit_collateral"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
								</div>	
							</div>				
						</div>
						<?php
              		}
              			else if($row_more->CPA_ID == '' )
              			{
              		?>
              			<div class="row" style="margin-left: 10px;">
							Edit

							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
								<div>
									<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/edit_collateral"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
								</div>	
							</div>				
						</div>
						<?php
              			}
             			 else
              			{
              		 ?>
               				 <h5>CAM Processed BY <?php echo $cam_processed_userData->FN." ".$cam_processed_userData->LN; ?></h5>
               		<?php
             			 }
					}
					else
					{
             		?>
             			<div class="row" style="margin-left: 10px;">
							Edit

							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
								<div>
									<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/Operations_user/edit_collateral"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
								</div>	
							</div>				
						</div>
					  <?php
					}
					?>
				<?php } ?>				
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"></div>
            
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
			<div class="source" style="padding-bottom:15px;">
		   <span class="dropdown" style="margin-left:-70%;margin-top:-10%;margin-bottom:5%;padding-left:10px;height:56px;">Source [<?php if(isset($Sourcing_Type)){echo $Sourcing_Type;}?>]:&nbsp;<?php if(isset($Sourcing_name)){echo $Sourcing_name;}?></span>
					
				<!------------------------------ added by priyanka ---------------------------------------------- -->
				<div class="dropdown">
       				<div class="select">
          				<span>Select Document</span>
          				<i class="fa fa-chevron-down"></i>
       				</div>
       				<input type="hidden" name="gender">
        			<ul class="dropdown-menu">
						<?php $i=1; foreach($documents as $doc)	{  ?>
							<li id="<?php echo $doc->ID;?>"><?php echo $doc->DOC_TYPE;?></li>
	   					<?php $i++;} ?> 
        			</ul>
     			</div>
                <label class="msg"></label>
                <label class="download"></label>
				<!-------------------------------------------------------------------------------------------------->
			</div>
		</div>
						</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			
		</div><br><br>
		<form method="POST" action="<?php echo base_url(); ?>index.php/Operations_user/update_Collateral_attributes" id="">
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Collateral and Recommendations of <?php if(!empty($row)) echo " - ".$row->FN." ".$row->LN." ( Applicant )"?></span>

			</div>
			
			<div class="w-100"></div>
			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				
					
	  				
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
	  			     <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Address Of Property</span>
					</div>
					
	  					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						
							<input style="margin-top: 1px;" disabled placeholder="Address Line 1 *" class="input-cust-name" type="text" name="PROP_ADD_LINE_1"  id="PROP_ADD_LINE_1" value="<?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_1;} ?>">
							<input style="margin-top: 8px;" disabled placeholder="Address Line 2 *" class="input-cust-name" type="text" name="PROP_ADD_LINE_2"  id="PROP_ADD_LINE_2" value="<?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_2;} ?>" >
							<input style="margin-top: 8px;" disabled placeholder="Address Line 3 *" class="input-cust-name" type="text" name="PROP_ADD_LINE_3"  id="PROP_ADD_LINE_3" value="<?php if(!empty($appliedloan)) {echo $appliedloan->PROP_ADD_LINE_3;} ?>">
					
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Registered Agreement To Sale/ Sale Deed</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
						
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input  type="radio" disabled name="Sale_Deed" value="yes" <?php if(!empty($row_more))if ($row_more->Sale_Deed == 'yes') echo ' checked="true"'; ?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="dis">
									<input   type="radio" disabled name="Sale_Deed" value="no" <?php if(!empty($row_more))if ($row_more->Sale_Deed == 'no') {echo ' checked="true"';}?> > no
								</div>
						 </div>
							</div>	
						</div>  
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Land value </span>
					</div>
				
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" id="Land_value" name="Land_value"  value="<?php if(!empty($row_more)){echo $row_more->Land_value;}?>" onkeyup="Cal_Total_Value()">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Construction value</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" id="Construction_value" name="Construction_value"  value="<?php if(!empty($row_more)){echo $row_more->Construction_value;}?>" onkeyup="Cal_Total_Value()">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Total Value Of The Property</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input readonly class="input-cust-name" type="number" name="Total_Value" id="Total_Value"  value="<?php if(!empty($row_more)){echo $row_more->Total_Value;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Agreement Value Of The Property</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" name="Agreement_value"  value="<?php if(!empty($row_more)){echo $row_more->Agreement_value;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Agreement If Any</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="date" name="Date_of_Agreement"  value="<?php if(!empty($row_more)){ if($row_more->Date_of_Agreement){ echo $row_more->Date_of_Agreement;}}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">LTV %</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input  disabled class="input-cust-name" type="number" name="LTV"  value="<?php if(!empty($row_more)){echo $row_more->LTV;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">LTV In Case Of New Purchase</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="number" name="LTV_new"  value="<?php if(!empty($row_more)){echo $row_more->LTV_new;}?>">
						</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
				      <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Legal Report</span>
					</div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
	  					<div class="input-cust-name" style=" margin-top: 8px;">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<input disabled type="radio" name="Legal_report" value="yes" <?php if(!empty($row_more))if ($row_more->Legal_report == 'yes') echo ' checked="true"'; ?> > yes
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="dis">
									<input  disabled type="radio" name="Legal_report" value="no"  <?php if(!empty($row_more))if ($row_more->Legal_report == 'no') echo ' checked="true"'; ?>> no
								</div>
						 </div>
							</div>	
						</div>  
	  				</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					     <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-clock-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">FOIR</span>
					</div>		
						<div class="w-100"></div>
						<div style="margin-left: 35px;  margin-top: 8px;" class="col">
							<input disabled  class="input-cust-name" type="text" name="FOIR"  value="<?php if(!empty($data_credit_analysis)){ if($data_credit_analysis->foir){ echo $data_credit_analysis->foir;}}?>">
						</div>
				</div>
				
				
				
					
											  				
			</div>	
			
  				
		</div>
		
<!------------Personal Details----------------------->
		



       
	</div>
	
	
	</form>
	<script>
	
	function Cal_Total_Value()
	{
		
		var Land_value=parseFloat(document.getElementById('Land_value').value);
		var Construction_value=parseFloat(document.getElementById('Construction_value').value);
		var Total_Value =Land_value+Construction_value;
		document.getElementById('Total_Value').value= Total_Value;
		
	}
	</script>
	<!-------------------------added by priyanka------------------------------------------------------>
<script>
	/*Dropdown Menu*/
$('.dropdown').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu').slideToggle(300);
    });
    $('.dropdown').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropdown-menu').slideUp(300);
    });
    $('.dropdown .dropdown-menu li').click(function () {
        $(this).parents('.dropdown').find('span').text($(this).text());
        $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
    });
/*End Dropdown Menu*/


$('.dropdown-menu li').click(function () {
  var input = $(this).parents('.dropdown').find('input').val();

  $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/Operations_user/get_document_details"); ?>',
									    data:{
										'ID':input
										},
										success:function(data)
										{
											var view="view";
											var obj =JSON.parse(data);
											
											msg = '<label class="msg">';
											var download="download";
                                            $('.msg').html(  msg + '<a href="'+ obj.view +'" target="_blank" >'+ view +'</a></label>'); 
											msg2 = '<label class="download">';
                                            $('.download').html(  msg2 + '<a href="'+ obj.download +'" target="_blank" download>'+ download +'</a></label>'); 
											
						                }
                                    });
  
}); 
</script>