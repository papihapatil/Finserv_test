<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
  $this->session->set_userdata("id1",$id1);
  $month = date('m');
  $day = date('d');
  $year = date('Y');
  $today = $year . '-' . $month . '-' . $day;
  //echo $id1;
  //echo $id;
  //exit();
  $this->session->set_userdata("CM_ID",$CM_ID);
?>
<style>
.designe{
	border:1px solid ;
	
}
.block:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -1px;
}
.block1:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -82px;
}

.block1:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block1 {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}

.block:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active {
  background-color: #25a6c6;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active:after {
  color: #25a6c6;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_Active:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block_completed {
  background-color: #83dcf0;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  margin:16px;
}
.block_completed:after {
  color: #83dcf0;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_completed:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}


.block_hold {
  background-color: yellow;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_reject {
  background-color: red;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_font{
	margin-left:7%;
	font-size:12px;
	color:gray;
}
.block_font_active{
	margin-left:7%;
	font-size:12px;
	color:White;
}

</style>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wizard-v10</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>adminn/PD_CSS/css/montserrat-font.css">
    <link rel="stylesheet" href="<?php echo base_url()?>adminn/PD_CSS/css/style.css"/>
	<link href="sweetalert.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php 

$file_srror=$this->session->userdata("file_error");
if($file_srror =='file type not allowed')
{
		echo '<script> swal("warning!", "Selected file type is not allowed.", "warning");</script>';
		$this->session->unset_userdata('file_error');	
          
}
else if($file_srror =='allowed')
{
	echo '<script> swal("success!", "Image uploded successfully", "success");</script>';
		$this->session->unset_userdata('file_error');
}
?>
<div class="margin-10 padding-5">
		  <div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
		
<!--<a href="'.base_url().'index.php/credit_manager_user/credit_sanction_loan_first_level?ID='.$row->UNIQUE_CODE.'&CM='.$CM_ID.'"  class="btn modal_test" target="_blank"><i class="fa fa-edit text-right" style="color:blue;"></i></a> -->
							<?php if(isset($row_more))
									{
							   	 if($row_more->STATUS =='PD Completed')
										{
											?>
												<div class="col-sm-3 block_completed" >
														<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
															<span class="block_font_active">1. &nbsp;PD Process</span>
														</a>
												</div> 
												<div class="col-sm-3 block_Active" ><a  href="<?php echo base_url()?>index.php/credit_manager_user/credit_sanction_loan_first_level?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>"><span class="block_font_active">2. &nbsp;Sanction Recommendation</span> 		</a></div>
											
												<div class="col-sm-3 block" ><span class="block_font">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
										else if($row_more->STATUS =='Loan Recommendation Approved')
										{
											?>
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
													<span class="block_font_active">1. &nbsp;PD Generated</span>
												</a>
												</div> 
											<div class="col-sm-3 block_completed" >
													<a  href="<?php echo base_url()?>index.php/credit_manager_user/credit_sanction_loan_first_level?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
														<span class="block_font_active">2. &nbsp;Sanction Recommendation Approved</span>
													</a></div> 
											<div class="col-sm-3 block_Active" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>"><span class="block_font_active">
												<span class="block_font_active">3. &nbsp;Sanction Letter</span>
												</a>
											</div> 
											<?php
										}
										else if($row_more->STATUS =='Cam details complete')
										{
											?>
												<div class="col-sm-3 block_Active" >
																										<span class="block_font_active">1. &nbsp;PD Process</span>

												</div> 
												<div class="col-sm-3 block" ><span class="block_font_active">2. &nbsp;Sanction Recommendation</span> </div>
											
												<div class="col-sm-3 block" ><span class="block_font">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
										else
										{
											?>
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/View_Personal_Disussion_details?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
													<span class="block_font_active">1. &nbsp;PD Process</span>
												</a>
												</div> 
											<div class="col-sm-3 block_completed" >
												<a  href="<?php echo base_url()?>index.php/credit_manager_user/Sanction_cum_acceptance_letter?ID=<?php echo $id;?>&CM=<?php echo $CM_ID;?>">
												<span class="block_font_active">2. &nbsp;Sanction Recommendation</span>
													</a>
											</div> 
											<div class="col-sm-3 block_completed" ><span class="block_font_active">3. &nbsp;Sanction Letter</span></div> 
											<?php
										}
									}
									?>
					
						
				
				
				
							
		</div>
</div>
<body onload="myFunction()">
	<div class="" style="">
	    <div class="row  shadow bg-white rounded margin-10 padding-15">
			<div class="wizard-form">
				<div class="wizard-header" style="padding:20px;"></div>
					<div id="form-total" style="padding:40px;padding-top:0px">
					<div class="row">
						<?php if(isset($data_row_pd_table))
								{

								    if($data_row_pd_table->PD_STATUS =='Completed')
									{
									?>
										 <div class="col-sm-2">
					        				<a target='_blank' href="<?php echo base_url()?>index.php/Credit_manager_user/pdf?ID=<?php echo $row->UNIQUE_CODE;?>"><button type="button" class="btn btn-success">GENERATE PD</button></a>
					            		 </div>
									<?php
									}
									else 
									{
										?>
											 <div class="col-sm-2">
					        		        </div>
										<?php

									}

								}
								else
								{
								?>
									 <div class="col-sm-2">
					        		 </div>
								<?php

								}?>
					</div>
		        		<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			  	         <div class="row" >
						   <div class="col-sm-3 panel panel-primary" style="margin:3%;padding:3px;">
						   <div class="panel-heading"><b>1)UPLOAD PHOTOS FOR BASIC DETAIL</b></div>
									<form action="<?php echo base_url()?>index.php/credit_manager_user/upload_documents" method="post" enctype="multipart/form-data">
												<br>
												<div class="row">
													<div class="col-sm-8">
														<input type="text" value="step_one_images" name="step_one_images" hidden>
												        <input type="file" name="file" accept="image/*" id="section_one_images">
													</div>
													<div class="col-sm-4">
														<input type="submit" name="submit" value="UPLOAD" id="first_button">
													</div>
												</div>
												<input hidden type="text"  id="FORM_GENERATED_MANAGER_ID"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE; }?>">
  								                <input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">
  									

									</form>
						   </div>
						   <div class="col-sm-3 panel panel-primary"	style="margin:3%;padding:3px;">
						   <div class="panel-heading"><b>2) UPLOAD PHOTOS FOR BUSINESS DETAIL</b></div>
										<form action="<?php echo base_url()?>index.php/credit_manager_user/upload_documents" method="post" enctype="multipart/form-data">
												<br>
												<div class="row">
														<div class="col-sm-8">
															<input type="text" value="step_two_images" name="step_one_images" hidden>
															<input type="file" name="file" accept="image/*" id="section_two_images">
														</div>
														<div class="col-sm-4">
														<input type="submit" name="submit" value="UPLOAD" id="second_button">
														</div>
												</div>
										</form>
						   </div>
						   <div class="col-sm-3 panel panel-primary" style="margin:3%;padding:3px;">
						   <div class="panel-heading"><b>3)UPLOAD PHOTOS FOR PROPERTY DETAIL</b></div>
										 <form action="<?php echo base_url()?>index.php/credit_manager_user/upload_documents" method="post" enctype="multipart/form-data">
											<br>
												<div class="row">
														<div class="col-sm-8">
															<input type="text" value="step_three_images" name="step_one_images" hidden>
															<input type="file" name="file" accept="image/*" id="section_three_images">
														</div>
														<div class="col-sm-4">
															<input type="submit" name="submit" value="UPLOAD" id="third_button">
														</div>
												</div>
										</form>
						   </div>
						 </div>
						<div class="row" >
						<div class="col-sm-4"></div>
							<div class="col-sm-4">
						   <center><h4>BASIC DETAILS PHOTOS</h4></center>
						<hr>
						</div>
							<div class="col-sm-4"></div>
						</div>
						<div class="row" id="basic_details_photos">
					
						    <?php 
							if(!empty($get_pd_images))
							{
                               
							foreach ($get_pd_images as $data)

							{
								 if($data->DOC_TYPE == 'step_one_images')
							  {
								?> 
								<div class="col-sm-2" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-left:2%;margin-top:2%;" >
								   <div class="row">
									<img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>" style="width:100%">
								   </div>
								   <div class="row" style="margin:4px;">
								     <center>
								     <a href="<?php echo base_url()?><?php echo $data->DOC_FILE_PATH;?>" target='_blank' download><button type="button"  class="btn btn-default"><i class="fa fa-download" aria-hidden="true" style="color:green"></i></button></a>&nbsp;&nbsp;&nbsp;
								     <a href="<?php echo base_url()?><?php echo $data->DOC_FILE_PATH;?>" target="_blank"><button type="button"  class="btn btn-default"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i></button></a>&nbsp;&nbsp;&nbsp;
									 	<?php 
											if(!empty($credit_manager_data))
											{
												if($credit_manager_data->UNIQUE_CODE == $CM_ID)
												{
										?>
									 <a href="<?php echo base_url()?>index.php/Credit_manager_user/delete_documents?id=<?php echo$data->id; ?>"><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:red"></i></button></a>
									  <?php		
										}
									 else
										{
										?>
										 <button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:grey"></i></button></a>
									 
										<?php
										}
								}
								else
								{
                                ?>
								 <a ><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:grey"></i></button></a>
									 
								<?php
								}
								?>
									 </center></div>
								</div>
								<?php
							  }
							}

							}
							?>
						</div>
						<br>
							<div class="row" >
						<div class="col-sm-4"></div>
							<div class="col-sm-4">
						   <center><h4>BUSINESS DETAILS PHOTOS</h4></center>
						<hr>
						</div>
							<div class="col-sm-4"></div>
						</div>
							<div class="row" id="business_details_photos">
						
						    <?php 
							if(!empty($get_pd_images))
							{
                               
							foreach ($get_pd_images as $data)

							{
								
							  if($data->DOC_TYPE == 'step_two_images')
							  {
							?> 

								<div class="col-sm-2" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-left:2%;margin-top:2%;" >
								   <div class="row">
									<img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>" style="width:100%">
								   </div>
								   <div class="row" style="margin:4px;">
								   <center>
								     <a href="<?php echo base_url()?><?php echo $data->DOC_FILE_PATH;?>" target='_blank' download><button type="button"  class="btn btn-default"><i class="fa fa-download" aria-hidden="true" style="color:green"></i></button></a>&nbsp;&nbsp;&nbsp;
								     <a href="<?php echo base_url()?><?php echo $data->DOC_FILE_PATH;?>" target="_blank"><button type="button"  class="btn btn-default"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i></button></a>&nbsp;&nbsp;&nbsp;
									 
									 <!-- <a href="<?php echo base_url()?>index.php/Credit_manager_user/delete_documents?id=<?php echo$data->id; ?>"><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:red"></i></button></a> -->
									 	<?php 
											if(!empty($credit_manager_data))
											{
												if($credit_manager_data->UNIQUE_CODE == $CM_ID)
												{
										?>
									 <a href="<?php echo base_url()?>index.php/Credit_manager_user/delete_documents?id=<?php echo$data->id; ?>"><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:red"></i></button></a>
									  <?php		
										}
									 else
										{
										?>
										 <a ><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:grey"></i></button></a>
									 
										<?php
										}
								}
								else
								{
                                ?>
								 <a ><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:grey"></i></button></a>
									 
								<?php
								}
								?>
									</center></div>
								</div>
								<?php
							  }
							}

							}
							?>
						</div>
						<br>
							<div class="row" >
						<div class="col-sm-4"></div>
							<div class="col-sm-4">
						   <center><h4>PROPERTY DETAILS PHOTOS</h4></center>
						<hr>
						</div>
							<div class="col-sm-4"></div>
						</div>
							<div class="row" id="property_details_photos">
						
						    <?php 
							if(!empty($get_pd_images))
							{
                               
							foreach ($get_pd_images as $data)

							{
								 if($data->DOC_TYPE == 'step_three_images')
							  {
								?> 
								<div class="col-sm-2" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-left:2%;margin-top:2%;" >
								   <div class="row">
									<img src="<?php echo base_url();?><?php echo $data->DOC_FILE_PATH; ?>" style="width:100%">
								   </div>
								   <div class="row" style="margin:4px;">
								      <center>
								     <a href="<?php echo base_url()?><?php echo $data->DOC_FILE_PATH;?>" target='_blank' download><button type="button"  class="btn btn-default"><i class="fa fa-download" aria-hidden="true" style="color:green"></i></button></a>&nbsp;&nbsp;&nbsp;
								     <a href="<?php echo base_url()?><?php echo $data->DOC_FILE_PATH;?>" target="_blank"><button type="button"  class="btn btn-default"><i class="fa fa-eye" aria-hidden="true" style="color:green"></i></button></a>&nbsp;&nbsp;&nbsp;
									 <!-- <a href="<?php echo base_url()?>index.php/Credit_manager_user/delete_documents?id=<?php echo$data->id; ?>"><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:red"></i></button></a>-->
									 	<?php 
											if(!empty($credit_manager_data))
											{
												if($credit_manager_data->UNIQUE_CODE == $CM_ID)
												{
										?>
									 <a href="<?php echo base_url()?>index.php/Credit_manager_user/delete_documents?id=<?php echo$data->id; ?>"><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:red"></i></button></a>
									  <?php		
										}
									 else
										{
										?>
										 <a ><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:grey"></i></button></a>
									 
										<?php
										}
								}
								else
								{
                                ?>
								 <a ><button type="button"  class="btn btn-default"><i class="fa fa-trash " aria-hidden="true" style="color:grey"></i></button></a>
									 
								<?php
								}
								?>
									</center></div>
								</div>
								<?php
							  }
							}

							}
							?>
						</div>


						<section id="section3">
			    			<div class="container">
					
						 </section>

						   <section id="section3">
			    			<div class="container">
						
							
						 </section>

						 
						   <section id="section3">
			    			<div class="container">
							
						 </section>
		        	</div>
		       <!-- </form>-->
			</div>
		</div>
	</div>

</body>
</html>
<script>
function myFunction() {
 // alert("Page is loaded");
   var FORM_GENERATED_MANAGER_ID=document.getElementById("FORM_GENERATED_MANAGER_ID").value;
   var LOGIN_CREDIT_MANAGER_ID=document.getElementById("LOGIN_CREDIT_MANAGER_ID").value;
    if(FORM_GENERATED_MANAGER_ID!= '')
 {
 if(FORM_GENERATED_MANAGER_ID != LOGIN_CREDIT_MANAGER_ID)
 {
	document.getElementById("first_button").disabled = true;
	document.getElementById("second_button").disabled = true;
	document.getElementById("third_button").disabled = true;
 }
 }

}
</script>
