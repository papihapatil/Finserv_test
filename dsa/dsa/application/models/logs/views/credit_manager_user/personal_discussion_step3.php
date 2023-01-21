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
  /*echo "<pre>";
  print_r($data_row_PD_details);
  echo "</pre>";*/
  $this->session->set_userdata("CM_ID",$CM_ID);
  $property_details_JSON = json_decode($data_row_PD_details->property_details_JSON);
  $invesment_details_JSON = json_decode($data_row_PD_details->invesment_details_JSON);
  $reference_check_JSON = json_decode($data_row_PD_details->reference_check_JSON);
  /*
  echo "<pre>";
  print_r($property_details_JSON);
  echo "</pre>";
  echo "<pre>";
  print_r($invesment_details_JSON);
  echo "</pre>";
  echo "<pre>";
  print_r($reference_check_JSON);
  echo "</pre>";*/
?>
<style>
     .floating-btn
	 {
		width :50px;
		height :50px;
		background : #3949ab;
		display :flex;
		align-items:center;
		justify-content:center;
		text-decoration:none;
		
		color : #ffffff;
		font-size:15px;
		box-shadow:2px 2px 5px rgba(0,0,0,0.25);
		position:fixed;
		right:40px;
		z-index:1;
		bottom:60px;
		transition:background 0.25s;
		border-radius:10%;
		outline:blue;
		border:none;
		cursor:pointer;
	 }
	 .floating-btn:active{
		 background:#007D63;
	 }
.chat-popup {
  display: none;
  position: fixed;
  bottom: 100px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 1;
}
.form-container {
  max-width: 200px;
  padding: 10px;
  background-color: white;
}
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

.form-container .btn {

  color: Black;
  padding: 12px 16px;
 
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

.form-container .cancel {
  background-color: red;
}

.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
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

<button class="material-icons floating-btn" onclick="openForm()" id="menu_button"><i class="fa fa-align-justify"></i></button>

<div class="chat-popup" id="myForm">
  <form class="form-container">
	<button type="button" class="close" aria-label="Close" onclick="closeForm()" style="color:red;margin-top:-5px;">
	 <span aria-hidden="true">&times;</span>
	<br>	</button>

	<ul class="c-sidebar-nav">
	<button type="button" class="btn btn-outline-info" onClick="continue_();"id="btn_continue">CONTINUE</button>
	<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#holdModal" id="btn_hold">HOLD</button>
	<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#rejectionModal" id="btn_reject">REJECT</button>
	</ul>
  </form>
</div>
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
<body onload="myFunction();Check_status() ;">
	<div class="" style="">
	    <div class="row  shadow bg-white rounded margin-10 padding-15" id="border_style">
			<div class="wizard-form">
				<div class="wizard-header" style="padding:20px;"> 
				</div>
				<!--<form class="form-register" id="myform" action="<?= base_url('index.php/credit_manager_user/personal_discussion')?>" method="post">-->
				 	<form class="form-register"  id="form_1" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
		        	  <input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					  <input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE;}else {echo $CM_ID; }?>">
						
					 <div id="form-total" style="padding:40px;">
		        		<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
			  			
			            <section id="section3">
							<b><span id='tag'></span><br><span id='tag2'></span></b>
					    	 <div class="row shadow bg-white rounded margin-10 padding-15  " style="padding:25px;">
                                 <form class="form-register" id="form_3" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
								<!-- ----------------------------------------- for salaried-------------------------------------------- -->
								<div class="col-sm-12">
									<h4><b>COLLATERAL DETAILS</b></h4><hr>
			    				</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">RESIDENCE OWNERSHIP(RENTED/OWNED)</label>
   										<input type="text" class="form-control" id="residence_ownership" name="residence_ownership" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->residence_ownership; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">STAYING IN CITY(YEARS)</label>
   										<input type="number" class="form-control" id="staying_in_city" name="staying_in_city" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->staying_in_city; }?>" required>
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">AGE OF PROPERTY(approx)</label>
   										<input type="number" class="form-control" id="age_of_property" name="age_of_property" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->age_of_property; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NO OF YEARS STAY</label>
   										<input type="number" class="form-control" id="customer_no_of_years_stay" name="customer_no_of_years_stay" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->customer_no_of_years_stay; }?>">
  									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">DOCUMENT VERIFIED TO VALIDATE</label>
   										<input type="text" class="form-control" id="document_varified_to_validate" name="document_varified_to_validate" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->document_varified_to_validate; }?>">
  									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">TYPE OF PROPERTY (Flat, bunglow, chawl, Independent House)</label>
   										<input type="text" class="form-control" id="type_of_property" name="type_of_property" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->type_of_property; }?>">
  									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">GOVT SCHEME/STAND ALONE BUILDING</label>
   										<input type="text" class="form-control" id="govt_scheme" name="govt_scheme" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->govt_scheme; }?>">
  									</div>
								</div>
							    <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NO OF ROOMS</label>
   										<input type="number" class="form-control"id="no_of_rooms" name="no_of_rooms" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->no_of_rooms; }?>">
  									</div>
								</div>
							    <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">AREA OF HOUSE</label>
   										<input type="text" class="form-control" id="area_of_house" name="area_of_house" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->area_of_house; }?>">
  									</div>
								</div>
							    <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">ANCESTRAL PROPERTY</label>
   										<input type="text" class="form-control" name="Ancestral_property"id="Ancestral_property" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->Ancestral_property; }?>">
  									</div>
								</div>
							    <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NO OF PEOPLE STAYING IN HOUSE</label>
   										<input type="text" class="form-control" name="no_of_people_staying_in_house" id="no_of_people_staying_in_house" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->no_of_people_staying_in_house; }?>">
  									</div>
								</div>
							    <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">NAME PLATE NAME</label>
   										<input type="text" class="form-control" name="name_plate_name" id="name_plate_name" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->name_plate_name; }?>">
  									</div>
								</div>
							    <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">CHECKED WITH SECURITY</label>
   										<input type="text" class="form-control" name="checked_with_security" id="checked_with_security" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->checked_with_security; }?>">
  									</div>
								</div>
							 
							    <div class="col-sm-3">
									<div class="form-group">
										<label class="class_bold">REMARK ON UPKEEP</label>
   										<input type="text" class="form-control" id="remark_on_upkeep" name="remark_on_upkeep" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->remark_on_upkeep; }?>">
  									</div>
								</div>
							
								   <div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">UPKEEP OF HOUSE-FURNITURE SEEN DURING VISIT</label>
   										<input type="text" class="form-control" name="upkeep_of_house" id="upkeep_of_house" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->upkeep_of_house; }?>">
  									</div>
								</div>
							    <div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">NEIGHBOURS CHECK</label>
   										<input type="text" class="form-control" name="neighbours_check" id="neighbours_check" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->neighbours_check; }?>">
  									</div>
								</div>
							    <div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">NAME OF NEIGHBOUR</label>
   										<input type="text" class="form-control" id="name_of_neighbour" name="name_of_neighbour" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->name_of_neighbour; }?>">
  									</div>
								</div>
							    <div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">RELATIVE CHECK(IN CITY)</label>
   										<input type="text" class="form-control"id="relative_check" name="relative_check" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->relative_check; }?>">
  									</div>
								</div>
							    <div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">NAME OF RELATIVE</label>
   										<input type="text" class="form-control" id="name_of_relative" name="name_of_relative" value="<?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->name_of_relative; }?>">
  									</div>
								</div>
							
								
								<div class="col-sm-12">
									<div class="form-group">
										<label class="class_bold">DETAILED REMARKS ON ASSEMENT OF STANDARD OF LIVING OF CUSTOMER</label>
   										<textarea class = "form-control" rows = "2" placeholder = ""  id="assement_remark" name="assement_remark"><?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->assement_remark; }?></textarea>
			  						</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="class_bold">DETAIL INFORMATION ABOUT THE COLLATERAL PROPERTY</label>
   										<textarea class = "form-control" rows = "2" placeholder = ""  id="collateral_info" name="collateral_info" ><?php if(!empty($data_row_PD_details)) { if(!empty($property_details_JSON)) echo $property_details_JSON->collateral_info; }?></textarea>
			  						</div>
								</div>

                           
							<br>
							  	<div class="col-sm-12">
											<h4><b>MORE COLLATERAL DETAILS</b></h4><hr>
			    					</div>
			    		    	<div class="col-sm-3">
											<div class="form-group">
												<label class="class_bold">Land value </label>
   													<input class="form-control" type="number" id="Land_value" name="Land_value"  value="<?php if(!empty($data_row_PD_details)) echo $data_row_PD_details->Land_value; ?>" >
			  							</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label class="class_bold">Construction Value</label>
   													<input class="form-control" type="number" id="Construction_value" name="Construction_value"  value="<?php if(!empty($data_row_PD_details)) echo $data_row_PD_details->Construction_value; ?>">
			  							</div>
										</div>
											<div class="col-sm-3">
											<div class="form-group">
												<label class="class_bold">Agreement value of the property</label>
   													<input  class="form-control" type="number" name="Agreement_value"  id="Agreement_value"  value="<?php if(!empty($data_row_PD_details)) echo $data_row_PD_details->Agreement_value; ?>">
			  							</div>
										</div>
											<div class="col-sm-3">
										
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label class="class_bold">Total Value Of The Property</label>
   													<input  class="form-control" type="number" name="Total_Value" id="Total_Value" value="<?php if(!empty($data_row_PD_details)) echo $data_row_PD_details->Total_Value; ?>">
			  							</div>
										</div>
									
										<div class="col-sm-3">
											<div class="form-group">
												<label class="class_bold">LTV %</label>
   													<input  class="form-control"  type="number" name="LTV"  id="LTV" step="any" value="<?php if(!empty($data_row_PD_details)) echo $data_row_PD_details->LTV; ?>" >
			  							</div>
										</div>

										<input  hidden class="form-control"  type="number" name="final_loan_amount"  id="final_loan_amount" value="<?php if(!empty($data_row_PD_details)) echo $data_row_PD_details->final_loan_amount; ?>">
			  				

							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4><b>INVESTMENT DETAILS</b></h4><hr>
			    				</div>
								<div class="col-sm-12">
									<table class="table table-bordered">
    									<thead>
											<tr>
						    					<th><label class="class_bold">INSURANCE</label></th>
        										<th><label class="class_bold">MUTUAL FUNDS</label></th>
        										<th><label class="class_bold">FD</label></th>
												<th><label class="class_bold">JEWELLERY</label></th>
												<th><label class="class_bold">PROPERTY VALUE</label></th>
												<th><label class="class_bold">SHARES EQUITY</label></th>
												<th><label class="class_bold">CHIT FUND</label></th>
												<th><label class="class_bold">RD</label></th>
      										</tr>
     									</thead>
										<tbody>
											<tr>
												<td><input type="number" class="form-control" id="Insurance" name="Insurance" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Insurance; }?>"></td>
												<td><input type="number" class="form-control" id="MutualFunds" name="MutualFunds" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->MutualFunds; }?>"></td>
												<td><input type="number" class="form-control" id="FD" name="FD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->FD; }?>"></td>
												<td><input type="number" class="form-control" id="Jewellery" name="Jewellery" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Jewellery; }?>"></td>
												<td><input type="number" class="form-control" id="Property_value" name="Property_value" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Property_value; }?>"> </td>
												<td><input type="number" class="form-control" id="Property" name="Property" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->Property; }?>"> </td>
												<td><input type="number" class="form-control" id="ChitFund" name="ChitFund" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->ChitFund; }?>"></td>
												<td><input type="number" class="form-control" id="RD" name="RD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_details_JSON)) echo $invesment_details_JSON->RD; }?>"></td>
                                            </tr>
										</tbody>
                                    </table>
								</div>
							</div>
							<br>
						
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4><b>REFERENCE CHECK</b></h4><hr>
			    				</div>
								
								 <!--------------------------------------------------------------------------------------------------------------------- -->
								

								 <!--------------------------------------------------------------------------------------------------------------------- -->
								
									 <div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
                                                <table class="table table-bordered" id="data_table">
													<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
														<tr>
														<th><label class="class_bold">REFERENCE TYPE</label></th>
														<th><label class="class_bold">NAME</label></th>
														<th><label class="class_bold">CONTACT NO</label></th>
														<th><label class="class_bold">RELATION</label></th>
														<th><label class="class_bold">KNOWN SINCE(YEARS)</label></th>
														<th><label class="class_bold">VERIFICATION STATUS</label></th>
														<th><label class="class_bold">ADDRESS</label></th>
														
													</tr>
											
													   <?php 
														 if(!empty($data_row_PD_details->reference_check_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->reference_check_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['Reference_type']))
															  {
															  ?>
															 
															 <tr>
															    <td><input class = "form-control" type="text" id="Reference_type" name="Reference_type[]" value="<?php echo $value['Reference_type']?>"></td>
																<td><input  class = "form-control"type="text" id="Name" name="Name[]" value="<?php echo $value['Name']?>"></td>
																<td><input   class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo $value['Contact_No']?>"></td>
																<td><input   class = "form-control" type="text" id="Relation" name="Relation[]" value="<?php echo $value['Relation']?>"></td>
																<td><input   class = "form-control" type="number" id="KnownSince"name="KnownSince[]" value="<?php echo $value['KnownSince']?>"></td>
																<td><input   class = "form-control" type="text" id="Verification_Status" name="Verification_Status[]" value="<?php echo $value['Verification_Status']?>"></td>
																<td><input   class = "form-control" type="text" id="Brief_on_Reference" name="Brief_on_Reference[]" value="<?php echo $value['Brief_on_Reference']?>"></td>
															
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
													<tr>
														<td><input class = "form-control" type="text" id="Reference_type" name="Reference_type[]"></td>
														<td><input  class = "form-control"type="text" id="Name" name="Name[]"></td>
														<td><input   class = "form-control" type="number" id="Contact_No" name="Contact_No[]"></td>
														<td><input   class = "form-control" type="text" id="Relation" name="Relation[]"></td>
														<td><input   class = "form-control" type="number" id="KnownSince"name="KnownSince[]"></td>
														<td><input   class = "form-control" type="text" id="Verification_Status" name="Verification_Status[]"></td>
														<td><input   class = "form-control" type="text" id="Brief_on_Reference" name="Brief_on_Reference[]"></td>
															<td><input   class = "form-control"type="button" class="add" onclick="add_row();" value="Add Row" ></td>
													</tr>

														
												</table>
											</div>
										</div>
								 </div>
							
								<div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">PD STATUS OF</label>	
										<textarea class = "form-control" rows = "3" placeholder = "" name="PDStatusOf" id="PDStatusOf" required><?php if(!empty($data_row_PD_details)){ if(!empty($data_row_PD_details->PD_Status_of)) echo $data_row_PD_details->PD_Status_of; }?></textarea>
        	    					</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="class_bold">OVERALL PD STATUS</label>	
										<textarea class = "form-control" rows = "3" placeholder = "" name="OverallPDStatus" id="OverallPDStatus" required><?php if(!empty($data_row_PD_details)){ if(!empty($data_row_PD_details->Overall_PD_Status)) echo $data_row_PD_details->Overall_PD_Status; }?></textarea>
									</div>
			    				</div>
									<!-------------------------------------------------- end use of the loan --------------------------------------------------- -->
								<div class="col-sm-12">
									<h4><b>END USE OF THE LOAN</b></h4><hr>
			    				</div>
								<div class="col-sm-12">
									<div class="form-group">
										<textarea class = "form-control" rows = "3" id="end_use_of_loan" name="end_use_of_loan" required><?php if(!empty($data_row_PD_details)) if(!empty($data_row_PD_details->end_use_of_loan)) echo $data_row_PD_details->end_use_of_loan;  ?></textarea>
			  						</div> 
			    				</div>

						 	</div>
							 	<input hidden type="text"  id="FORM_GENERATED_MANAGER_ID"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE; }?>">
  								<input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">
  									

							 <?php if(!empty($credit_manager_data->UNIQUE_CODE == $CM_ID))
							{
								  if($row_more->STATUS =='PD Completed')
								  {
								  	?>
								  					<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_3" value="submit" type="submit">VIEW</button>
								  	<?php
								  }
								  else if($row_more->STATUS =='Loan Recommendation Approved')
									{
										?>
														<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_3" value="submit" type="submit">VIEW</button>
										<?php
									}
									else
									{
										?>
														<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_3" value="submit" type="submit" id="save_and_continue">Submit and Continue</button>
										<?php
									}

								  	?>
			
     		            	
							  <?php }
							 else
							 {
                             ?>
							<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_3" value="submit" type="submit">VIEW</button>
     		            	<?php
							 }?>
							</form>
						 </section>
		        	</div>
		       <!--  </form>-->
			</div>
		</div>
	</div>
	
								<div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for rejection</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
											<textarea class = "form-control" rows = "3" name="rejectReason" id="rejectReason" placeholder="Write something.."></textarea>
        	    					
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="reject()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>

								<div class="modal fade" id="holdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add reason for holding application</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									    	<textarea class = "form-control" rows = "3" name="holdReason" id="holdReason" placeholder="Write something.." ></textarea>
        	    					
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="hold()">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>
</body>
<script>
								function openForm() {
								  document.getElementById("myForm").style.display = "block";
								}

								function closeForm() {
								  document.getElementById("myForm").style.display = "none";
								}

						function hold() 
						{
					
						 var User_ID = document.getElementById('customer_id').value;
						 var holdReason ="Application is on HOLD in PD From Three because : "+ document.getElementById('holdReason').value;
						 var dsa_id = document.getElementById('dsa_id').value;
						 if(holdReason=='')
										{
											swal("warning!", "Please Enter Reason for holding application", "warning");
										    return false;
										}
								$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/HOLD_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"HOLD",
										'Reason':holdReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
								
											if(obj.msg=='success')
											{
												//alert("got it");
											     swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
											}
						                }
                                    });
		
						}

						function reject() 
						{
							var User_ID = document.getElementById('customer_id').value;
							var rejectReason = "Application is rejected in PD From Three because : " +document.getElementById('rejectReason').value;
							var dsa_id = document.getElementById('dsa_id').value;
					    	if(rejectReason=='')
										{
											swal("warning!", "Please Enter Reason for rejecting application", "warning");
										    return false;
										}
						 	$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/REJECT_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"REJECT",
										'Reason':rejectReason,
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it too");
												  swal("success!", "Status added successfully", "success").then( function() {   window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
											}
						                }
                                    });
						}

						function continue_()
						{
							 var User_ID = document.getElementById('customer_id').value;
						 	 var dsa_id = document.getElementById('dsa_id').value;

							 $.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/CONTINUE_CUSTOMER_APPLICATION"); ?>',
									    data:{
										'User_ID':User_ID,
										'Action':"CONTINUE",
										'dsa_id':dsa_id,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);
											if(obj.msg=='success')
											{
												//alert("got it");
											     swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/credit_manager_user/View_Personal_Disussion_details?ID="+obj.User_ID+"&CM="+obj.DSA_ID); });
									
												
											}
						                }
                                    });

						}

						</script>
						<script>
						function Check_status()
						{
							//alert("hiii");
							var User_ID = document.getElementById('customer_id').value;
							$.ajax({
										type:'POST',
										url:'<?php echo base_url("index.php/dsa/onload_check_status"); ?>',
									    data:{
										'User_ID':User_ID,
										},
										success:function(data)
										{
											var obj =JSON.parse(data);

									
											if(obj.msg=='HOLD')
											{
												//alert("HOLD");
												$('#border_style').css("border","2px solid yellow");
													document.getElementById('tag').innerHTML = "Status added by : "+obj.action_by;
													document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
											
												var word = "Three";
												var mystring =obj.reason;
 
											// Test if string contains the word 
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
														$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});

													$('#save_and_continue').hide();
													
												} 
											

											}
											else if(obj.msg=='REJECT')
											{
												//alert("REJECT");
												$('#border_style').css("border","2px solid red");
												document.getElementById('tag').innerHTML = "Status added by  : "+obj.action_by;
												document.getElementById('tag2').innerHTML = " Reason : "+obj.reason;
												var word = "Three";
												var mystring =obj.reason;
 
											// Test if string contains the word 
												 var incStr = mystring.includes(word);
											      if(incStr!= false)
												{
													$('input[type="text"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="email"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="number"]').each(function(){
												   $(this).attr('readonly','readonly');
												});
												$('input[type="date"]').each(function(){
												   $(this).attr('readonly','readonly');
												});

													$('#save_and_continue').hide();
												
													
												} 
											
														
												  $('#btn_hold').hide();
												  $('#btn_continue').hide();
												
												 // $('#btn_hold').hide();
												 // $('#btn_continue').hide();
											
												// swal("success!", "Status added successfully", "success").then( function() {  window.location.replace("/dsa/dsa/index.php/dsa/Go_No_GO_?ID="+obj.User_ID); });
									
											}
											else if(obj.msg=='CONTINUE')
											{
													$('#border_style').css("border","2px solid blue");
													
											}
						                }
                                    });

						}
						</script>
<script>
function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var country=document.getElementById("country_row"+no);
 var age=document.getElementById("age_row"+no);
 var relation=document.getElementById("relation_row"+no);
 var KnownSince=document.getElementById("KnownSince_row"+no);
 var Verification_Status=document.getElementById("Verification_Status_row"+no);
 var Brief_on_Reference=document.getElementById("Brief_on_Reference_row"+no);


	
 var name_data=name.innerHTML;
 var country_data=country.innerHTML;
 var age_data=age.innerHTML;
 var relation_data=relation.innerHTML;
 var KnownSince_data=KnownSince.innerHTML;	
 var Verification_Status_data=Verification_Status.innerHTML;	
 var Brief_on_Reference_data=Brief_on_Reference.innerHTML;



 name.innerHTML="<input type='text' name='Reference_type[]' id='name_text"+no+"' value='"+name_data+"'>";
 country.innerHTML="<input type='text' name='Name[]' id='country_text"+no+"' value='"+country_data+"'>";
 age.innerHTML="<input type='number' id='age_text"+no+"' name='age[]' value='"+age_data+"'>";
 relation.innerHTML="<input type='text' id='relation_text"+no+"' name='Relation[]' value='"+relation_data+"'>";
 KnownSince.innerHTML="<input type='text' id='KnownSince_text"+no+"' name='KnownSince[]' value='"+KnownSince_data+"'>";
 Verification_Status.innerHTML="<input type='text' id='Verification_Status_text"+no+"' name='Verification_Status[]' value='"+Verification_Status_data+"'>";
 Brief_on_Reference.innerHTML="<input type='text' id='Brief_on_Reference_text"+no+"' name='Brief_on_Reference[]' value='"+Brief_on_Reference_data+"'>";
}

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;
 var relation_val=document.getElementById("relation_text"+no).value;
 var KnownSince_val=document.getElementById("KnownSince_text"+no).value;
 var Verification_Status_val=document.getElementById("Verification_Status_text"+no).value;
 var Brief_on_Reference_val=document.getElementById("Brief_on_Reference_text"+no).value;





 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 document.getElementById("age_row"+no).innerHTML=age_val;
 document.getElementById("relation_row"+no).innerHTML=relation_val;
 document.getElementById("KnownSince_row"+no).innerHTML=KnownSince_val;
 document.getElementById("Verification_Status_row"+no).innerHTML=Verification_Status_val;
  document.getElementById("Brief_on_Reference_row"+no).innerHTML=Brief_on_Reference_val;



 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_name=document.getElementById("Reference_type").value;
 var new_country=document.getElementById("Name").value;
 var new_age=document.getElementById("Contact_No").value;
 var new_relation=document.getElementById("Relation").value;
 var new_KnownSince=document.getElementById("KnownSince").value;
 var new_Verification_Status=document.getElementById("Verification_Status").value;
 var new_Brief_on_Reference=document.getElementById("Brief_on_Reference").value;

 	 if(new_name=='')
	 {
		swal("warning!", "Please Enter reference type", "warning");
		return false;
	 }
	 



	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
// var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td name=''Name[]' id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td id='relation_row"+table_len+"'>"+new_relation+"</td><td id='KnownSince_row"+table_len+"'>"+new_KnownSince+"</td><td id='Verification_Status_row"+table_len+"'>"+new_Verification_Status+"</td><td id='Brief_on_Reference_row"+table_len+"'>"+new_Brief_on_Reference+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='Reference_type[]' id='name_row"+table_len+"' value='"+new_name+"'></td><td><input type='text' class = 'form-control' name='Name[]' id='country_row"+table_len+"' value='"+new_country+"'></td><td><input class = 'form-control' name='Contact_No[]' type='number' id='age_row"+table_len+"' value='"+new_age+"'></td><td><input class = 'form-control' name='Relation[]' type='text' id='relation_row"+table_len+"' value='"+new_relation+"'></td><td><input class = 'form-control' name='KnownSince[]' type='text' id='KnownSince_row"+table_len+"' value='"+new_KnownSince+"'></td><td><input class = 'form-control' name='Verification_Status[]' type='text' id='Verification_Status_row"+table_len+"' value='"+new_Verification_Status+"'></td><td><input class = 'form-control'  type='text' name='Brief_on_Reference[]' id='Brief_on_Reference_row"+table_len+"'value='"+new_Brief_on_Reference+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("Reference_type").value="";
 document.getElementById("Name").value="";
 document.getElementById("Contact_No").value="";
 document.getElementById("Relation").value="";
 document.getElementById("KnownSince").value="";
 document.getElementById("Verification_Status").value="";
 document.getElementById("Brief_on_Reference").value="";

}
</script>
<script>
function myFunction() {
  //alert("Page is loaded");
   var FORM_GENERATED_MANAGER_ID=document.getElementById("FORM_GENERATED_MANAGER_ID").value;
 var LOGIN_CREDIT_MANAGER_ID=document.getElementById("LOGIN_CREDIT_MANAGER_ID").value;
 //alert(FORM_GENERATED_MANAGER_ID);
 // alert(LOGIN_CREDIT_MANAGER_ID);
  if(FORM_GENERATED_MANAGER_ID!= '')
 {
 if(FORM_GENERATED_MANAGER_ID != LOGIN_CREDIT_MANAGER_ID)
 {
 	 $('input[type="text"]').prop('readonly',true);
	 $('input[type="number"]').prop('readonly',true);
	 $('input[type="date"]').prop('readonly',true); 
	 $('#assement_remark').attr('readonly',true);
	 $('#collateral_info').attr('readonly',true);   
	  $('#PDStatusOf').attr('readonly',true);
	   $('#OverallPDStatus').attr('readonly',true);
	   $('#end_use_of_loan').attr('readonly',true);

 }
 }

 $("#Total_Value").keyup(function(){

            var P = 0;
              var n = 0;
                var LTV = 0;
			    if($("#final_loan_amount").val() !== "")
			    P = parseFloat($("#final_loan_amount").val());

			    if ($("#Total_Value").val() !== "")
			     n = parseFloat($("#Total_Value").val());
			    LTV =  P / (n/100);
	        $("#LTV").val(LTV.toFixed(2));
     	   	document.getElementById('LTV').value= LTV.toFixed(2);
  

              });
}
</script>
	<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</html>
