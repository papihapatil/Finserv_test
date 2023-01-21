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
?>
<?php 
$this->session->set_userdata("CM_ID",$CM_ID);
$Existing_loan_JSON = json_decode($data_row_PD_details->Existing_loan_JSON);
$invesment_and_assets_JSON = json_decode($data_row_PD_details->invesment_and_assets_JSON);
$business_cash_flow_income_JSON = json_decode($data_row_PD_details->business_cash_flow_income_JSON);
$business_cash_flow_expences_JSON = json_decode($data_row_PD_details->business_cash_flow_expences_JSON);
$additional_income_JSON = json_decode($data_row_PD_details->additional_income_JSON);
$geo_tagging_JSON = json_decode($data_row_PD_details->geo_tagging_JSON);
$decode = json_decode($data_row_PD_details->all_coapp_business_cash_flow_data_JSON);
					
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
				<div class="wizard-header"  style="padding:20px;">
				</div>
				<form class="form-register"  id="form_1" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
		          <input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					  <input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($credit_manager_data)) { echo $credit_manager_data->UNIQUE_CODE;}else {echo $CM_ID; }?>">
								
				<div id="form-total"  style="padding:40px;">
		        
			            <section id="section2">
							<b><span id='tag'></span><br><span id='tag2'></span></b>
                                    
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<form class="form-register" id="form_2" action="<?php echo base_url()?>index.php/credit_manager_user/PD_section_one" method="post">
			                   	<!-- ----------------------------------------------- for salaried----------------------------------------------------------- -->

								<?php 
								                        if(!empty($data_row_PD_details->Edited_obligation_details_JSON))
														 {
															 ?>
															   <div class="row shadow bg-white rounded margin-10 padding-15">
																<div class="col-sm-12">
																	<h4><b>OBLIGATIONS DETAILS </b></h4><hr>
			    												</div>
																	<div style="padding-left:50px;">
																		<table class="table table-responsive justify-content-center">
																			<thead>
																			  <tr>
																				<td><b>SR NO</b></td>
																				<td><b>Active Loans</b></td>
																				<td><b>Type of Loan</b></td>
																				<td><b>Loan Amount</b></td>
																				<td><b>Balance Amount</b></td>
																				<td><b>EMI</b></td>
																					<td><b>Consider EMI</b></td> 
																				 <!--<td><input type="checkbox" id="select_all" onclick="Function_three()"><b> &nbsp;&nbsp;ALL</b></td> -->
																			  </tr>
																			</thead>
																			<tbody>
																				 <?php
																				$reference_array=json_decode($data_row_PD_details->Edited_obligation_details_JSON,true);
															
																				if(!empty($reference_array))
																				{
																					$i=1;
																				foreach($reference_array as $value) 
																				{
																					
																				  // echo $value['Reference_type'];
																				   if(!empty($value['ActiveLoans']))
																				  {
																					?>
																						<tr>
																						    <td><?php echo $i;?></td>
																							<td><input readonly required  class="form-control" type="text" name="ActiveLoans[]"  value="<?php echo $value['ActiveLoans'];?>"></td>
																					        <td><input readonly required  class="form-control" type="text" name="TypeofLoan[]"  value="<?php echo $value['TypeofLoan']; ?>"></td>
																							<td><input readonly required  class="form-control" type="text" name="LoanAmount[]"  value="<?php echo $value['LoanAmount']; ?>"></td>
																							<td><input readonly required  class="form-control" type="text" name="BalanceAmount[]"  value="<?php echo $value['BalanceAmount']; ?>"></td>
																							<td><input  required  class="form-control" type="text" name="EMI[]"  value="<?php echo $value['EMI']; ?>"></td>
																						   <!--<td><input type="checkbox" name="check_box[]" class="mycheck"  value="<?php echo $i;?>" <?php  if( $value['check_box']!=null){ echo 'checked'; }; ?>  ></td> -->
																						       <td>
																					  <select   name="check_box[]" class="form-control" id="consider_EMI">
																						  <option value="1" <?php if ( $value['check_box'] == 1) echo ' selected="selected"'; ?> selected>Yes</option>
																						  <option value="0" <?php if ( $value['check_box'] == 0) echo ' selected="selected"'; ?>>No</option>
																						</select>
																					</td>
																						</tr>
																					<?php
																				  }
																				  $i++;
																				}
																				}
																			  ?>
																			  </tbody>
																		</table>
																	</div>
																</div>
															<?php
															 }
							else if(isset($data_obligations)){ ?>
								<!-- ------------------------------------ obligation details start --------------------------------------------------- -->
									   <div class="row shadow bg-white rounded margin-10 padding-15">
											
											<div class="col-sm-12">
												<h4><b>OBLIGATIONS DETAILS </b></h4><hr>
			    							</div>
										
												<div style="padding-left:50px;">
													<table class="table table-responsive justify-content-center">
														<thead>
														  <tr>
															<td><b>SR NO</b></td>
															<td><b>Lender Name</b></td>
															<td><b>Type of Loan</b></td>
															<td><b>Loan Amount</b></td>
															<td><b>Balance Amount</b></td>
															<td><b>EMI</b></td>
															<!--<td><input type="checkbox" id="select_all" onclick="Function_three()"><b> &nbsp;&nbsp;ALL</b></td> -->
															<td><b>Consider EMI</b></td> 
														  </tr>
														</thead>
															<tbody>
															<?php
																 $i=1;
																	foreach($data_obligations as $data_obligation)
																	{
									
																		if($data_obligation['Open']=='Yes')
																		{
																			// if(isset($data_obligation['InstallmentAmount']))
																		//	 { 
																				 ?>
																				 <tr>
																					<td><b><?php echo $i;?></b></td>
																					<td><input readonly required  class="form-control" type="text" name="ActiveLoans[]"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?>"></td>
																					<td><input readonly required  class="form-control" type="text" name="TypeofLoan[]"  value="<?php if(!empty($data_obligation)){echo $data_obligation['AccountType'];}?>"></td>
																					<?php if(isset($data_obligation)) 
																					{
																						if($data_obligation['AccountType']=='Credit Card' || $data_obligation['AccountType']=="Secured Credit Card")
																						{
																							if(isset($data_obligation['CreditLimit']))
																							{
																					?>
																						<td><input readonly required  class="form-control" type="text" name="LoanAmount[]"  value="<?php if(!empty($data_obligation)){echo $data_obligation['CreditLimit'];}?>"></td>
																						<?php
																							}
																							else
																							{
																						?>
																							<td><input readonly required  class="form-control" type="text" name="LoanAmount[]"  value="<?php if(!empty($data_obligation)){echo "0";}?>"></td>
																					 <?php
																							}
																					?>
																					 <?php
																						}else
																						{ 
																							if(isset($data_obligation['SanctionAmount']))
																							{
																					  ?>
												  										<td><input readonly required  class="form-control" type="text" name="LoanAmount[]"  value="<?php if(!empty($data_obligation['SanctionAmount'])){echo $data_obligation['SanctionAmount'];}?>"></td>
												
																					  <?php
																							}
																							else
																							{
																						?>
																							<td><input readonly required  class="form-control" type="text" name="LoanAmount[]"  value="<?php if(!empty($data_obligation)) { echo "0";}?>"></td>
												
																						<?php

																							}
																					?>
																				<?php
																						}
																					}
																					?>
																					<td><input readonly required  class="form-control" type="text" name="BalanceAmount[]"  value="<?php if(!empty($data_obligation['Balance'])){echo $data_obligation['Balance'];}?>"></td>
																					<?php if(isset($data_obligation['InstallmentAmount']))
																					{
																					?>
																					 <td><input  required  class="form-control" type="text" name="EMI[]"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['InstallmentAmount'];}?>"></td>
																					<?php
																					}
																					else
																					{
																						if(isset($data_obligation['SanctionAmount']))
																						{
																					?>
																					<!-- <td><input disabled required name="installment_"<?php  echo $i; ?> class="input-cust-name" type="text" name="dob"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['SanctionAmount']*0.03;}?>"></td> -->
												             								<td><input  required class="form-control" type="text" name="EMI[]"  value="<?php if(!empty($data_obligation)){ echo 0;}?>"></td>
												
																					<?php
																						}
																						elseif(isset($data_obligation['CreditLimit']))
																						{
																					?>
																					 <td><input  required  class="form-control" type="text" name="EMI[]"  value="<?php if(!empty($data_obligation)){ echo 0;}?>"></td>
												
																					<?php
																						}
																						else
																						{
																					?>
																					 <td><input  required  class="form-control" type="text" name="EMI[]"  value="<?php if(!empty($data_obligation)){ echo "0";}?>"></td>
												
																					<?php		
																						}
     																				}
																					?>
																				    <td>
																					  <select   name="check_box[]" class="form-control">
																						  <option value="1" selected>Yes</option>
																						  <option value="0">No</option>
																						</select>
																					</td>
																					<!--<input type="checkbox" name="check_box[]" class="mycheck"  value="<?php echo $i;?>" <?php  if( $value['check_box']!=null){ echo 'checked'; }; ?>  ></td> -->
																						
												                                 </tr>
																			<?php  $i++;
																			// }
										
																		}
									
																	}
																	/* ---------- added by nnnn ----------- */
																	if(!empty($data_obligations_micro))
																	{
																	foreach($data_obligations_micro as $data_obligation)
																	{
									
																		if($data_obligation['Open']=='Yes')
																		{
																			// if(isset($data_obligation['InstallmentAmount']))
																		//	 { 
																				 ?>
																				 <tr>
																					<td><b><?php echo $i;?></b></td>
																					<td><input readonly required  class="form-control" type="text" name="ActiveLoans[]"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['Institution'];}?>"></td>
																					<td><input readonly required  class="form-control" type="text" name="TypeofLoan[]"  value="<?php if(!empty($data_obligation)){echo $data_obligation['LoanCategory'];}?>"></td>
																					<?php if(isset($data_obligation)) 
																					{
																					
																							if(isset($data_obligation['SanctionAmount']))
																							{
																					  ?>
												  										<td><input readonly required  class="form-control" type="text" name="LoanAmount[]"  value="<?php if(!empty($data_obligation['SanctionAmount'])){echo $data_obligation['SanctionAmount'];}?>"></td>
																						<td><input readonly required  class="form-control" type="text" name="BalanceAmount[]"  value="<?php if(!empty($data_obligation['CurrentBalance'])){echo $data_obligation['CurrentBalance'];}?>"></td>
												
																					  <?php
																							}
																							else
																							{
																						?>
																							<td><input readonly required  class="form-control" type="text" name="LoanAmount[]"  value="<?php if(!empty($data_obligation)) { echo "0";}?>"></td>
												                                            <td><input readonly required  class="form-control" type="text" name="BalanceAmount[]"  value="<?php if(!empty($data_obligation['CurrentBalance'])){echo $data_obligation['CurrentBalance'];}?>"></td>
												
																						<?php

																							}
																					?>
																				<?php
																						}
																					
																					?>
																					
																					<?php if(isset($data_obligation['InstallmentAmount']))
																					{
																					?>
																					 <td><input  required  class="form-control" type="text" name="EMI[]"  value="<?php if(!empty($data_obligation)){ echo $data_obligation['InstallmentAmount'];}?>"></td>
																					<?php
																					}
																					?>
																				    <td>
																					  <select   name="check_box[]" class="form-control">
																						  <option value="1" selected>Yes</option>
																						  <option value="0">No</option>
																						</select>
																					</td>
																					<!--<input type="checkbox" name="check_box[]" class="mycheck"  value="<?php echo $i;?>" <?php  if( $value['check_box']!=null){ echo 'checked'; }; ?>  ></td> -->
																						
												                                 </tr>
																			<?php  $i++;
																			// }
										
																		}
																	}
																}
															?>
																				  </tbody>
														</table>
													</div>
												</div>
									   
							   <!-- ------------------------------------ obligation details end --------------------------------------------------- -->
								<?php }?>
								   
								   
								   			<div class="col-sm-12">
											<h4 style="font-weight:800"><b>ADDITIONAL EMI DETAILS</b></h4><hr>
			    					</div>

                   <div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
                                                <table class="table table-bordered" id="data_table_additional_EMI">
													<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
													<tr>
														<th>Lender Name</th>
														<th>Type of Loan</th>
														<th>Loan Amount</th>
														<th>Balance Amount</th>
														<th>EMI</th>
														<th>Consider EMI</th>
													</tr>
											<?php 
														 if(!empty($data_row_PD_details->Additional_obligation_array_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->Additional_obligation_array_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['Children_name_']))
															  {
															  ?>
															 
															 <tr>
															    <td><input class = "form-control" type="text" id="Children_name_" name="Children_name_[]" value="<?php echo $value['Children_name_']?>"></td>
																<td><input  class = "form-control"type="text" id="Children_age_" name="Children_age_[]" value="<?php echo $value['Children_age_']?>"></td>
																<td><input   class = "form-control" type="number" id="Children_study_" name="Children_study_[]" value="<?php echo $value['Children_study_']?>"></td>
																<td><input   class = "form-control" type="number" id="Children_amount_" name="Children_amount_[]" value="<?php echo $value['Children_amount_']?>"></td>
																<td><input   class = "form-control" type="number" id="Children_medical_"name="Children_medical_[]" value="<?php echo $value['Children_medical_']?>"></td>
																	<td><input   class = "form-control" type="text" id="Consider_EMI"name="Consider_EMI[]" value="<?php echo $value['Consider_EMI']?>"></td>
															
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
													<tr>
														<td><input   class = "form-control" type="text" id="Children_name_" name="Children_name_[]"></td>
														<td><input   class = "form-control"type="text" id="Children_age_" name="Children_age_[]"></td>
														<td><input   class = "form-control" type="number" id="Children_study_" name="Children_study_[]"></td>
														<td><input   class = "form-control" type="number" id="Children_amount_" name="Children_amount_[]"></td>
														<td><input   class = "form-control" type="number" id="Children_medical_"name="Children_medical_[]"></td>
													  <td>
															  <select  id="Consider_EMI"name="Consider_EMI[]" class="form-control">
																  <option value="Yes" selected>Yes</option>
																  <option value="No">No</option>
																</select>													  	
													  </td>
														<td><input class = "form-control"type="button" class="add" onclick="add_row_additional_EMI();" value="Add Row" ></td>
													</tr>
												</table>
											</div>
										</div>
								 </div>
								   
								   
								   
								   <?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'salaried')
									  {
								?>
								<div class="col-sm-12">
									<h4><b>EXISTING LOAN / CREDIT DETAILS</b></h4><hr>
			    				</div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold" >NO OF ACTIVE LOANS</label>
    									<input type="number" class="form-control" name="number_of_loans" id="number_of_loans" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->number_of_loans; }?>">
  									</div>
                                </div>
							
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">TOTAL AMOUNT OF EMI</label>
    									<input type="number" class="form-control" name="amount_of_emi" id="amount_of_emi" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->amount_of_emi; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">DEFAULTS AND BOUNCES</label>
    									<input type="number" class="form-control" name="defaults_and_bounces" id="defaults_and_bounces" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->defaults_and_bounces; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">TOTAL AMOUNT OF LOAN OUTSTANDING</label>
    									<input type="number" class="form-control" name="loan_outstanding_amount" id="loan_outstanding_amount" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->loan_outstanding_amount; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">NO OF CREDIT CARDS</label>
    									<input type="number" class="form-control" name="no_of_credit_cards" id="no_of_credit_cards" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->no_of_credit_cards; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">TOTAL AMOUNT OF OUTSTANDING CREDIT CARD</label>
    									<input type="number" class="form-control" name="outstanding_credit_cards_amount" id="outstanding_credit_cards_amount" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->outstanding_credit_cards_amount; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">ANY HANDHELD LOAN (FRIENDS/FAMILY)</label>
    									<input type="number" class="form-control" name="handheld_loan" id="handheld_loan" value="<?php if(!empty($data_row_PD_details)) { if(!empty($Existing_loan_JSON)) echo $Existing_loan_JSON->handheld_loan; }?>">
  									</div>
                                </div>
							
								<!-- ----------------------------------- invesment and assets details ---------------------------------------- -->
								<div class="col-sm-12">
									<h4><b>INVESMENT AND ASSETS DETAILS</b></h4><hr>
			    				</div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">OWNERSHIP OF ASSETS</label>
    									<input type="text" class="form-control" name="ownership_assets" id="ownership_assets" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->ownership_assets; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">TYPE OF ASSETS</label>
    									<input type="text" class="form-control" name="type_of_assets" id="type_of_assets" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->ownership_assets; }?>">
  									</div>
                                </div>
						
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">VALUE OF ASSETS</label>
    									<input type="text" class="form-control" id="value_of_assets" name="value_of_assets" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->value_of_assets; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">NO OF BANK ACCOUNTS</label>
    									<input type="number" class="form-control" id="no_of_banks" name="no_of_banks" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->no_of_banks; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">SAVING HABITS</label>
    									<input type="text" class="form-control" id="saving_habits" name="saving_habits" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->saving_habits; }?>">
  									</div>
                                </div>
								<div class="col-sm-3">
								    <div class="form-group">
										<label class="class_bold">NO OF PROPERTY</label>
    									<input type="number" class="form-control" name="property" id="property" value="<?php if(!empty($data_row_PD_details)) { if(!empty($invesment_and_assets_JSON)) echo $invesment_and_assets_JSON->property; }?>">
  									</div>
                                </div>
							    <?php
									  }
								  }?>
							
								<!-- ----------------------------------------------- for self employeed------------------------------------------------------------ -->
									<?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'self employeed') // salaried
									  {
							?>
								<div class="col-sm-12">
									<h4><b>BUSINESS CASH FLOW</b></h4><hr>
			    				</div>
								<div class="col-sm-6">
									<table class="table table-bordered">
    									<thead>
						   					<tr>
												<th><label class="class_bold">INCOME</label></th>		
			  								</tr>
							 				<tr>
       					 						<th></th>
        										<th><label class="class_bold">ICUSTOMER DECLARED</label></th>
        										<th><label class="class_bold">IASSESSED</label></th>
      										</tr>
     									</thead>
   										<tbody>
											<tr>
        										<td><label class="class_bold">NO OF UNITS OR SERVICES SOLD/ HIGHEST INVOICE RECORDED/AVERAGE FOOTFALL PER DAY</label></td>
        										<td><input type="number" class="form-control" id="No_of_Units_CD" name="No_of_Units_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->No_of_Units_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="No_of_Units_Ass" name="No_of_Units_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->No_of_Units_Ass; }?>" required></td>
      										</tr>
     										<tr>
        										<td><label class="class_bold">AVERAGE SALE PRICE/LOWEST INVOICE RECORDED/AVERAGE BILLING PER CUSTOMER</label></td>
												<td><input type="number" class="form-control" id="Average_Sale_price_CD" name="Average_Sale_price_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Average_Sale_price_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Average_Sale_price_Ass" name="Average_Sale_price_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Average_Sale_price_CD; }?>" required></td>
      										</tr>
      										<tr>
       											<td><label class="class_bold">DAILY SALES / AVERAGE INVOICE RECORDED/TOTAL BILLING PER DAY</label></td>
       											<td><input type="number" class="form-control" id="Daily_Sales_CD" name="Daily_Sales_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Daily_Sales_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Daily_Sales_Ass" name="Daily_Sales_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Daily_Sales_Ass; }?>" required></td>
      										</tr>
											<tr>
       											<td><label class="class_bold">DAYS OPERATION</label></td>
       											<td><input type="number" class="form-control" id="Days_Operation_CD" name="Days_Operation_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Days_Operation_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Days_Operation_Ass" name="Days_Operation_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Days_Operation_Ass; }?>"required> </td>
      										</tr>
											<tr>
       											<td><label class="class_bold">MONTHLY SALES</label></td>
       											<td><input type="number" class="form-control" id="Monthly_Sales_CD" name="Monthly_Sales_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Monthly_Sales_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Monthly_Sales_Ass" name="Monthly_Sales_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_income_JSON)) echo $business_cash_flow_income_JSON->Monthly_Sales_Ass; }?>" required></td>
      										</tr>
										</tbody>
  									</table>
			   					</div>
								<div class="col-sm-6">
					  				<table class="table table-bordered">
    									<thead>
						    				<tr>
												<th><label class="class_bold">EXPENSES</label></th>		
			  								</tr>
							 				<tr>
       					 						<th></th>
        										<th><label class="class_bold">CUSTOMER DECLARED</label></th>
        										<th><label class="class_bold">ASSESSED</label></th>
      										</tr>
     									</thead>
										<tbody>
											<tr>
       											<td><label class="class_bold">PURCHASE OF RAW MATERIAL</label></td>
       											<td><input type="number" class="form-control" id="Purchase_of_Raw_Material_CD" name="Purchase_of_Raw_Material_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Purchase_of_Raw_Material_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Purchase_of_Raw_Material_Ass" name="Purchase_of_Raw_Material_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Purchase_of_Raw_Material_Ass; }?>" required></td>
      										</tr>
											<tr>
       											<td><label class="class_bold">WAGES</label></td>
       											<td><input type="number" class="form-control" id="Wages_CD" name="Wages_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Wages_CD; }?>"required></td>
												<td><input type="number" class="form-control" id="Wages_Ass" name="Wages_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Wages_Ass; }?>"required></td>
      										</tr>
											<tr>
       											<td><label class="class_bold">ELECTRICITY</label></td>
       											<td><input type="number" class="form-control" id="Electricity_CD" name="Electricity_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Electricity_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Electricity_Ass" name="Electricity_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Electricity_Ass; }?>" required></td>
      										</tr>
											<tr>
       											<td><label class="class_bold">RENT</label></td>
       											<td><input type="number" class="form-control" id="Rent_CD" name="Rent_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Rent_CD; }?>" required ></td>
												<td><input type="number" class="form-control" id="Rent_Ass" name="Rent_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Rent_Ass; }?>"required></td>
      										</tr>
											<tr>
       											<td><label class="class_bold">OTHER EXP.</label></td>
       											<td><input type="number" class="form-control" id="OtherExp_1" name="Other_EXp_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Other_EXp_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Other_EXp_Ass" name="Other_EXp_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Other_EXp_Ass; }?>" required ></td>
      										</tr>
											<tr>
       											<td><label class="class_bold">MONTHLY EXP.</label></td>
       											<td><input type="number" class="form-control" id="Monthly_Exp_CD" name="Monthly_Exp_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Monthly_Exp_CD; }?>" required ></td>
												<td><input type="number" class="form-control" id="Monthly_Exp_Ass" name="Monthly_Exp_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Monthly_Exp_Ass; }?>" required></td>
      										</tr>
											<tr>
       											<td><label class="class_bold">NET PROFIT</label></td>
       											<td><input type="number" class="form-control" id="Net_Profit_CD" name="Net_Profit_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Net_Profit_CD; }?>"required></td>
												<td><input type="number" class="form-control" id="Net_Profit_Ass" name="Net_Profit_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Net_Profit_Ass; }?>" required> </td>
      										</tr>
											<tr>
       											<td><label class="class_bold">MARGIN %</label></td>
       											<td><input type="number" class="form-control" id="Margin_CD" name="Margin_CD" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Margin_CD; }?>" required></td>
												<td><input type="number" class="form-control" id="Margin_Ass" name="Margin_Ass" value="<?php if(!empty($data_row_PD_details)) { if(!empty($business_cash_flow_expences_JSON)) echo $business_cash_flow_expences_JSON->Margin_Ass; }?>" required></td>
      										</tr>
   										</tbody>
  									</table>
								</div>
								 <?php
									  }
								  }?>
                            </div>
							<br>


           
									<?php 

									$count =0;
                 if(!empty( $decode))
                 {
									foreach( $decode  as $a)
									{
										foreach($a as $b)
										{
											 if(!empty($b->coapp_ID_))
                       $count= $count+1; 


											 
										}
									}
								}
								//	echo $count;
									if( $count>0)
									{
										$flag=1;
									}
									else
									{
										$flag=0;
									}
								
									if($flag==1)
						 			  {
						 			  		foreach( $decode  as $a)
														{
															foreach($a as $b)
															{
																 if(!empty($b->coapp_ID_))
																 {
																 	?>

					 												<div class="col-sm-12">
																			<h4><b><?php echo $coapplicant->FN." ".$coapplicant->LN; ?> BUSINESS CASH FLOW</b></h4><hr>
			    												</div>
			    												<div class="col-sm-6">
																			<table class="table table-bordered">
    																		<thead>
															   					<tr>
																						<th><label class="class_bold">INCOME</label></th>		
												  								</tr>
							 														<tr>
       					 														<th></th>
        																		<th><label class="class_bold">ICUSTOMER DECLARED</label></th>
        																		<th><label class="class_bold">IASSESSED</label></th>
      																		</tr>
     																		</thead>
   																			<tbody>
																				<tr>
        																	<td><label class="class_bold">NO OF UNITS OR SERVICES SOLD/ HIGHEST INVOICE RECORDED/AVERAGE FOOTFALL PER DAY</label></td>
        																	<td><input type="number" class="form-control" id="No_of_Units_CD" name="No_of_Units_CD_<?php echo $i;?>"  required value="<?php echo $b->No_of_Units_CD_ ; ?>"></td>
																					<td><input type="number" class="form-control" id="No_of_Units_Ass" name="No_of_Units_Ass_<?php echo $i;?>"  required value="<?php echo $b->No_of_Units_Ass_ ; ?>"></td>
      																	</tr>
     																		<tr>
        																	<td><label class="class_bold">AVERAGE SALE PRICE/LOWEST INVOICE RECORDED/AVERAGE BILLING PER CUSTOMER</label></td>
																					<td><input type="number" class="form-control" id="Average_Sale_price_CD" name="Average_Sale_price_CD_<?php echo $i;?>" required value="<?php echo $b->Average_Sale_price_CD_ ; ?>"></td>
																					<td><input type="number" class="form-control" id="Average_Sale_price_Ass" name="Average_Sale_price_Ass_<?php echo $i;?>"  required value="<?php echo $b->Average_Sale_price_Ass_ ; ?>"></td>
      																	</tr>
      																	<tr>
       																		<td><label class="class_bold">DAILY SALES / AVERAGE INVOICE RECORDED/TOTAL BILLING PER DAY</label></td>
       																		<td><input type="number" class="form-control" id="Daily_Sales_CD" name="Daily_Sales_CD_<?php echo $i;?>"  required value="<?php echo $b->Daily_Sales_CD_ ; ?>"></td>
																					<td><input type="number" class="form-control" id="Daily_Sales_Ass" name="Daily_Sales_Ass_<?php echo $i;?>" required value="<?php echo $b->Daily_Sales_Ass_ ; ?>"></td>
      																	</tr>
																				<tr>
       																		<td><label class="class_bold">DAYS OPERATION</label></td>
       																		<td><input type="number" class="form-control" id="Days_Operation_CD" name="Days_Operation_CD_<?php echo $i;?>"  required value="<?php echo $b->Days_Operation_CD_ ; ?>"></td>
																					<td><input type="number" class="form-control" id="Days_Operation_Ass" name="Days_Operation_Ass_<?php echo $i;?>" required value="<?php echo $b->Days_Operation_Ass_ ; ?>"> </td>
      																	</tr>
																				<tr>
       																		<td><label class="class_bold">MONTHLY SALES</label></td>
       																		<td><input type="number" class="form-control" id="Monthly_Sales_CD" name="Monthly_Sales_CD_<?php echo $i;?>"  required value="<?php echo $b->Monthly_Sales_CD_ ; ?>"></td>
																					<td><input type="number" class="form-control" id="Monthly_Sales_Ass" name="Monthly_Sales_Ass_<?php echo $i;?>" required value="<?php echo $b->Monthly_Sales_Ass_ ; ?>"></td>
      																	</tr>
																			</tbody>
  																	</table>
			   													</div>
																	<div class="col-sm-6">
					  											<table class="table table-bordered">
    																<thead>
													    				<tr>
																				<th><label class="class_bold">EXPENSES</label></th>		
										  								</tr>
							 												<tr>
       					 												<th></th>
        																<th><label class="class_bold">CUSTOMER DECLARED</label></th>
        																<th><label class="class_bold">ASSESSED</label></th>
      																</tr>
     																</thead>
																		<tbody>
																		<tr>
       																<td><label class="class_bold">PURCHASE OF RAW MATERIAL</label></td>
       																<td><input type="number" class="form-control" id="Purchase_of_Raw_Material_CD" name="Purchase_of_Raw_Material_CD_<?php echo $i;?>" required value="<?php echo $b->Purchase_of_Raw_Material_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Purchase_of_Raw_Material_Ass" name="Purchase_of_Raw_Material_Ass_<?php echo $i;?>"  required value="<?php echo $b->Purchase_of_Raw_Material_Ass_ ; ?>"></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">WAGES</label></td>
       																<td><input type="number" class="form-control" id="Wages_CD" name="Wages_CD_<?php echo $i;?>" required value="<?php echo $b->Wages_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Wages_Ass" name="Wages_Ass_<?php echo $i;?>" required value="<?php echo $b->Wages_Ass_ ; ?>"></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">ELECTRICITY</label></td>
       																<td><input type="number" class="form-control" id="Electricity_CD" name="Electricity_CD_<?php echo $i;?>"  required value="<?php echo $b->Electricity_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Electricity_Ass" name="Electricity_Ass_<?php echo $i;?>"  required value="<?php echo $b->Electricity_Ass_ ; ?>"></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">RENT</label></td>
       																<td><input type="number" class="form-control" id="Rent_CD" name="Rent_CD_<?php echo $i;?>" required value="<?php echo $b->Rent_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Rent_Ass" name="Rent_Ass_<?php echo $i;?>" required value="<?php echo $b->Rent_Ass_ ; ?>"></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">OTHER EXP.</label></td>
       																<td><input type="number" class="form-control" id="OtherExp_1" name="Other_EXp_CD_<?php echo $i;?>"  required value="<?php echo $b->Other_EXp_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Other_EXp_Ass" name="Other_EXp_Ass_<?php echo $i;?>"  required value="<?php echo $b->Other_EXp_Ass_ ; ?>"></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">MONTHLY EXP.</label></td>
       																<td><input type="number" class="form-control" id="Monthly_Exp_CD" name="Monthly_Exp_CD_<?php echo $i;?>"  required value="<?php echo $b->Monthly_Exp_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Monthly_Exp_Ass" name="Monthly_Exp_Ass_<?php echo $i;?>" required value="<?php echo $b->Monthly_Exp_Ass_ ; ?>"></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">NET PROFIT</label></td>
       																<td><input type="number" class="form-control" id="Net_Profit_CD" name="Net_Profit_CD_<?php echo $i;?>" required value="<?php echo $b->Net_Profit_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Net_Profit_Ass" name="Net_Profit_Ass_<?php echo $i;?>"  required value="<?php echo $b->Net_Profit_Ass_ ; ?>"> </td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">MARGIN %</label></td>
       																<td><input type="number" class="form-control" id="Margin_CD" name="Margin_CD_<?php echo $i;?>"  required value="<?php echo $b->Margin_CD_ ; ?>"></td>
																			<td><input type="number" class="form-control" id="Margin_Ass" name="Margin_Ass_<?php echo $i;?>"  required value="<?php echo $b->Margin_Ass_ ; ?>"></td>
																				<input hidden type="text" class="form-control" id="coapp_ID" name="coapp_ID_<?php echo $i;?>"  value="<?php echo $coapplicant->UNIQUE_CODE; ?>">
																						<input hidden type="text" class="form-control" id="coapp_name" name="coapp_name_<?php echo $i;?>"  value="<?php echo $coapplicant->FN." ".$coapplicant->LN; ?>">
      															</tr>
   																</tbody>
  															</table>
															</div>
																 	<?php
																 }
					                      															 
															}
									}
						 			  }
						 			  else
						 			  {
											$i=1; 
											foreach ($coapplicants as $coapplicant) 
											{
												 if(!empty($coapplicant))
				 									{ 
														 if($coapplicant->COAPP_TYPE=='self employeed')
					 										{
					 											if($coapplicant->ITR_status=="no")
						 											{
						 												

					 											?>
					 												<div class="col-sm-12">
																			<h4><b><?php echo $coapplicant->FN." ".$coapplicant->LN; ?> BUSINESS CASH FLOW</b></h4><hr>
			    												</div>
			    												<div class="col-sm-6">
																			<table class="table table-bordered">
    																		<thead>
															   					<tr>
																						<th><label class="class_bold">INCOME</label></th>		
												  								</tr>
							 														<tr>
       					 														<th></th>
        																		<th><label class="class_bold">ICUSTOMER DECLARED</label></th>
        																		<th><label class="class_bold">IASSESSED</label></th>
      																		</tr>
     																		</thead>
   																			<tbody>
																				<tr>
        																	<td><label class="class_bold">NO OF UNITS OR SERVICES SOLD/ HIGHEST INVOICE RECORDED/AVERAGE FOOTFALL PER DAY</label></td>
        																	<td><input type="number" class="form-control" id="No_of_Units_CD" name="No_of_Units_CD_<?php echo $i;?>"  required></td>
																					<td><input type="number" class="form-control" id="No_of_Units_Ass" name="No_of_Units_Ass_<?php echo $i;?>"  required></td>
      																	</tr>
     																		<tr>
        																	<td><label class="class_bold">AVERAGE SALE PRICE/LOWEST INVOICE RECORDED/AVERAGE BILLING PER CUSTOMER</label></td>
																					<td><input type="number" class="form-control" id="Average_Sale_price_CD" name="Average_Sale_price_CD_<?php echo $i;?>" required></td>
																					<td><input type="number" class="form-control" id="Average_Sale_price_Ass" name="Average_Sale_price_Ass_<?php echo $i;?>"  required></td>
      																	</tr>
      																	<tr>
       																		<td><label class="class_bold">DAILY SALES / AVERAGE INVOICE RECORDED/TOTAL BILLING PER DAY</label></td>
       																		<td><input type="number" class="form-control" id="Daily_Sales_CD" name="Daily_Sales_CD_<?php echo $i;?>"  required></td>
																					<td><input type="number" class="form-control" id="Daily_Sales_Ass" name="Daily_Sales_Ass_<?php echo $i;?>" required></td>
      																	</tr>
																				<tr>
       																		<td><label class="class_bold">DAYS OPERATION</label></td>
       																		<td><input type="number" class="form-control" id="Days_Operation_CD" name="Days_Operation_CD_<?php echo $i;?>"  required></td>
																					<td><input type="number" class="form-control" id="Days_Operation_Ass" name="Days_Operation_Ass_<?php echo $i;?>" required> </td>
      																	</tr>
																				<tr>
       																		<td><label class="class_bold">MONTHLY SALES</label></td>
       																		<td><input type="number" class="form-control" id="Monthly_Sales_CD" name="Monthly_Sales_CD_<?php echo $i;?>"  required></td>
																					<td><input type="number" class="form-control" id="Monthly_Sales_Ass" name="Monthly_Sales_Ass_<?php echo $i;?>" required></td>
      																	</tr>
																			</tbody>
  																	</table>
			   													</div>
																	<div class="col-sm-6">
					  											<table class="table table-bordered">
    																<thead>
													    				<tr>
																				<th><label class="class_bold">EXPENSES</label></th>		
										  								</tr>
							 												<tr>
       					 												<th></th>
        																<th><label class="class_bold">CUSTOMER DECLARED</label></th>
        																<th><label class="class_bold">ASSESSED</label></th>
      																</tr>
     																</thead>
																		<tbody>
																		<tr>
       																<td><label class="class_bold">PURCHASE OF RAW MATERIAL</label></td>
       																<td><input type="number" class="form-control" id="Purchase_of_Raw_Material_CD" name="Purchase_of_Raw_Material_CD_<?php echo $i;?>" required></td>
																			<td><input type="number" class="form-control" id="Purchase_of_Raw_Material_Ass" name="Purchase_of_Raw_Material_Ass_<?php echo $i;?>"  required></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">WAGES</label></td>
       																<td><input type="number" class="form-control" id="Wages_CD" name="Wages_CD_<?php echo $i;?>" required></td>
																			<td><input type="number" class="form-control" id="Wages_Ass" name="Wages_Ass_<?php echo $i;?>" required></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">ELECTRICITY</label></td>
       																<td><input type="number" class="form-control" id="Electricity_CD" name="Electricity_CD_<?php echo $i;?>"  required></td>
																			<td><input type="number" class="form-control" id="Electricity_Ass" name="Electricity_Ass_<?php echo $i;?>"  required></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">RENT</label></td>
       																<td><input type="number" class="form-control" id="Rent_CD" name="Rent_CD_<?php echo $i;?>" required ></td>
																			<td><input type="number" class="form-control" id="Rent_Ass" name="Rent_Ass_<?php echo $i;?>" required></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">OTHER EXP.</label></td>
       																<td><input type="number" class="form-control" id="OtherExp_1" name="Other_EXp_CD_<?php echo $i;?>"  required></td>
																			<td><input type="number" class="form-control" id="Other_EXp_Ass" name="Other_EXp_Ass_<?php echo $i;?>"  required ></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">MONTHLY EXP.</label></td>
       																<td><input type="number" class="form-control" id="Monthly_Exp_CD" name="Monthly_Exp_CD_<?php echo $i;?>"  required ></td>
																			<td><input type="number" class="form-control" id="Monthly_Exp_Ass" name="Monthly_Exp_Ass_<?php echo $i;?>" required></td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">NET PROFIT</label></td>
       																<td><input type="number" class="form-control" id="Net_Profit_CD" name="Net_Profit_CD_<?php echo $i;?>" required></td>
																			<td><input type="number" class="form-control" id="Net_Profit_Ass" name="Net_Profit_Ass_<?php echo $i;?>"  required> </td>
      															</tr>
																		<tr>
       																<td><label class="class_bold">MARGIN %</label></td>
       																<td><input type="number" class="form-control" id="Margin_CD" name="Margin_CD_<?php echo $i;?>"  required></td>
																			<td><input type="number" class="form-control" id="Margin_Ass" name="Margin_Ass_<?php echo $i;?>"  required></td>
																				<input hidden type="text" class="form-control" id="coapp_ID" name="coapp_ID_<?php echo $i;?>"  value="<?php echo $coapplicant->UNIQUE_CODE; ?>">
																						<input hidden type="text" class="form-control" id="coapp_name" name="coapp_name_<?php echo $i;?>"  value="<?php echo $coapplicant->FN." ".$coapplicant->LN; ?>">
      															</tr>
   																</tbody>
  															</table>
															</div>
														<?php
																		}

					 												}
					 										}
					 								}
											}
									?>









































								<?php if(isset($data_row_income))
								  {
									  if($data_row_income->CUST_TYPE == 'self employeed')
									  {
							?>
								<div class="col-sm-12">
									<h4><b>SUPPLIERS DETAILS</b></h4><hr>
			    				</div>
							 <div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
                                                <table class="table table-bordered" id="data_table">
													<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
														<tr>
															<th><label class="class_bold">NAME OF THE SUPPLIERS</label></th>
															<th><label class="class_bold">CONTACT NO</label></th>
															<th><label class="class_bold">ADDRESS</label></th>
															<th><label class="class_bold">TYPE OF MATERIAL</label></th>
													    </tr>
											
													   <?php 
														 if(!empty($data_row_PD_details->suppliers_JSON))
														 {
															$reference_array=json_decode($data_row_PD_details->suppliers_JSON,true);
															
															if(!empty($reference_array))
															{
															foreach($reference_array as $value) 
															{
															  // echo $value['Reference_type'];
															   if(!empty($value['supplier_name']))
															  {
															  ?>
															 
															 <tr>
															    <td><input class = "form-control" type="text" id="supplier_name" name="supplier_name[]" value="<?php echo $value['supplier_name']?>"></td>
																<td><input   class = "form-control" type="number" id="supplier_contact" name="supplier_contact[]" value="<?php echo $value['supplier_contact']?>"></td>
																<td><input   class = "form-control" type="text" id="supplier_address" name="supplier_address[]"value="<?php echo $value['supplier_address']?>"></td>
																<td><input   class = "form-control" type="text" id="supplier_type_of_material"name="supplier_type_of_material[]" value="<?php echo $value['supplier_type_of_material']?>"></td>
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
													<tr>
														<td><input class = "form-control" type="text" id="supplier_name" name="supplier_name[]" ></td>
														<td><input  class = "form-control"type="number" id="supplier_contact" name="supplier_contact[]"></td>
														<td><input   class = "form-control" type="text" id="supplier_address" name="supplier_address[]"></td>
														<td><input   class = "form-control" type="text" id="supplier_type_of_material" name="supplier_type_of_material[]"></td>
														<td><input   class = "form-control"type="button" class="add" onclick="add_row();" value="Add Row" ></td>
													</tr>

														
												</table>
											</div>
										</div>
								 </div>
									 <?php
									  }
								  }?>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4><b>ADDITIONAL DETAILS</b></h4><hr>
			    				</div>
								 <div class="col-sm-12">
										<div id="wrapper">
											<div style="overflow-x:auto;">
                                                <table class="table table-bordered" id="data_table2">
													<!--<table align='center' cellspacing=2 cellpadding=5  border=1>-->
														<tr>
														<th><label class="class_bold">ADDITIONAL INCOME TYPE</label></th>
														<th><label class="class_bold">INCOME AMOUNT </label></th>
														<th><label class="class_bold">INCOME CONSIDERED</label></th>
														<th><label class="class_bold">COMMENTS</label></th>
														
													</tr>
											
													   <?php 
													      														   
													     
														 if(!empty($data_row_PD_details->reference_check_JSON))
														 {
															$reference_array_2=json_decode($data_row_PD_details->additional_income_JSON,true);
														
																$reference_array_2=json_decode($reference_array_2['AdditionalIncomeType']);
															if(!empty($reference_array_2))
															{
																
															foreach($reference_array_2 as $value) 
															{
																
															 if(!empty($value->Reference_type))
															  {
															  ?>
															 
															 <tr>
															   <td>
																	<select class="form-control" aria-label="Default select example" id="Reference_type" name="Reference_type[]">
  																		<option value="">select</option>
																		<option value="Coapplicant income"  <?php if(!empty($data_row_PD_details)) if(!empty($value->Reference_type)) if($value->Reference_type == 'Coapplicant income') echo ' selected="selected"'; ?>>Coapplicant income</option>
  																		<option value="Paintion"   <?php if(!empty($data_row_PD_details)) if(!empty($value->Reference_type)) if($value->Reference_type == 'Paintion') echo ' selected="selected"'; ?>>Pention</option>
  																		<option value="Rental income"    <?php if(!empty($data_row_PD_details)) if(!empty($value->Reference_type)) if($value->Reference_type == 'Rental income') echo ' selected="selected"'; ?>>Rental income</option>
 																		<option value="Other business income"    <?php if(!empty($data_row_PD_details)) if(!empty($value->Reference_type)) if($value->Reference_type == 'Other business income') echo ' selected="selected"'; ?>>Other business income</option>
 																		<option value="Other"    <?php if(!empty($data_row_PD_details)) if(!empty($value->Reference_type)) if($value->Reference_type == 'Other') echo ' selected="selected"'; ?>>Other</option>
 											  					    </select>
																
																</td>
																<td><input  class = "form-control"type="number" id="Name" name="Name[]" value="<?php echo $value->Name?>"></td>
																<td><input   class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo $value->Contact_No?>"></td>
																	<td><input   class = "form-control" type="text" id="additional_emi_comments" name="additional_emi_comments[]" value="<?php if(isset($value->additional_emi_comments)) echo $value->additional_emi_comments ;?>"></td>
																
															</tr>
															  <?php
															  }
															}
														  }
														 }
														 ?>
													<tr>
														<td>
															<select class="form-control" aria-label="Default select example" id="Reference_type" name="Reference_type[]">
  																<option value="">select</option>
																<option value="Coapplicant income" >Coapplicant income</option>
  																<option value="Paintion"   >Paintion</option>
  																<option value="Rental income" >Rental income</option>
 																<option value="Other business income">Other business income</option>
 																<option value="Other">Other</option>
 											   			    </select>
														</td>
														<td><input class = "form-control" type="number" id="Name" name="Name[]"></td>
														<td><input class = "form-control" type="number" id="Contact_No" name="Contact_No[]"></td>
														<td><input class = "form-control" type="text" id="additional_emi_comments" name="additional_emi_comments[]"></td>
														<td><input class = "form-control" type="button" class="add" onclick="add_row2();" value="Add Row" ></td>
													</tr>

														
												</table>
											</div>
										</div>
								 </div>
						
                            </div>
							<br>
							<div class="row  shadow bg-white rounded margin-10 padding-15 " style="padding:25px;">
								<div class="col-sm-12">
									<h4><b>GEO TAGGING & PHOTOS</b></h4><hr>
			    				</div>
								<div class="col-sm-6">
							     	<div class="form-group">
									    <label class="class_bold">LOACTION TO BE TAGGED</label>
    									<input type="text" class="form-control" id="LocationToBeTagged" name="LocationToBeTagged" value="<?php if(!empty($data_row_PD_details)) { if(!empty($geo_tagging_JSON)) echo $geo_tagging_JSON->LocationToBeTagged; }?>" required>
  									</div>
								</div>
								<div class="col-sm-6">
							     	<div class="form-group">
										<label class="class_bold">LOCATION ADDRESS</label>
    									<input type="text" class="form-control" id="LocationAddress" name="LocationAddress" value="<?php if(!empty($data_row_PD_details)) { if(!empty($geo_tagging_JSON)) echo $geo_tagging_JSON->LocationAddress; }?>" required>
  									</div>
								</div>
								<div class="col-sm-12">
								<div class="row" id="lode_div">
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top: 3px; margin-left: 10px;">
																						
										</div>
									<div>
									<br/>
								
              					</div>
							</div>								
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
								  		<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_2" value="submit" type="submit">VIEW</button>
								  	<?php
								  }
								  else if($row_more->STATUS =='Loan Recommendation Approved')
									{
										?>
											<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_2" value="submit" type="submit">VIEW</button>
								  	<?php
									}
									else
									{
										?>
											<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_2" value="submit" type="submit" id="save_and_continue">SAVE AND CONTINUE</button>
								  	<?php
									}

								?>
							
     		               <?php }
							 else
							 {
                             ?>
							 	<button class="login100-form-btn" style="font-weight:700;background-color:#3760e5;color:white;padding:15px;padding-left:55px;padding-right:55px;border-radius:25px;border:none;" name="submit_form_2" value="submit" type="submit">VIEW</button>
     		              							  <?php
							 }?>
								</form>
			            </section>
			            <!-- SECTION 3  ---- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
			        
		        	</div>
		       <!-- </form>-->
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
<!--	<script src="<?php echo base_url()?>adminn/PD_CSS/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url()?>adminn/PD_CSS/js/jquery.steps.js"></script>
	<script src="<?php echo base_url()?>adminn/PD_CSS/js/main.js"></script>-->
	<script>
function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var supplier_name=document.getElementById("supplier_name_row"+no);
 var supplier_contact=document.getElementById("supplier_contact_row"+no);
 var supplier_address=document.getElementById("supplier_address_row"+no);
 var supplier_type_of_material=document.getElementById("supplier_type_of_material_row"+no);


	
 var supplier_name_data=name.innerHTML;
 var supplier_contact_data=supplier_contact.innerHTML;
 var supplier_address_data=supplier_address.innerHTML;
 var supplier_type_of_material_data=supplier_type_of_material.innerHTML;


 name.innerHTML="<input type='text' name='supplier_name[]' id='supplier_name_text"+no+"' value='"+name_data+"'>";
 supplier_contact.innerHTML="<input type='text' name='supplier_contact[]' id='supplier_contact_text"+no+"' value='"+supplier_contact_data+"'>";
 supplier_address.innerHTML="<input type='text' id='supplier_address_text"+no+"' name='supplier_address[]' value='"+supplier_address_data+"'>";
 supplier_type_of_material.innerHTML="<input type='text' id='supplier_type_of_material_text"+no+"' name='supplier_type_of_material[]' value='"+supplier_type_of_material_data+"'>";
}

function save_row(no)
{
 var supplier_name_val=document.getElementById("supplier_name_text"+no).value;
 var supplier_contact_val=document.getElementById("supplier_contact_text"+no).value;
 var supplier_address_val=document.getElementById("supplier_address_text"+no).value;
 var supplier_type_of_material_val=document.getElementById("supplier_type_of_material"+no).value;






 document.getElementById("supplier_name_row"+no).innerHTML=supplier_name_row_val;
 document.getElementById("supplier_contact_row"+no).innerHTML=supplier_contact_val;
 document.getElementById("supplier_address_row"+no).innerHTML=supplier_address_val;
 document.getElementById("supplier_type_of_material_row"+no).innerHTML=supplier_type_of_material_val;

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_supplier_name=document.getElementById("supplier_name").value;
 var new_supplier_contact=document.getElementById("supplier_contact").value;
 var new_supplier_address=document.getElementById("supplier_address").value;
 var new_supplier_type_of_material=document.getElementById("supplier_type_of_material").value;

	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
// var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td name=''Name[]' id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td id='relation_row"+table_len+"'>"+new_relation+"</td><td id='KnownSince_row"+table_len+"'>"+new_KnownSince+"</td><td id='Verification_Status_row"+table_len+"'>"+new_Verification_Status+"</td><td id='Brief_on_Reference_row"+table_len+"'>"+new_Brief_on_Reference+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='supplier_name[]' id='supplier_name_row"+table_len+"' value='"+new_supplier_name+"'></td><td><input type='text' class = 'form-control' name='supplier_contact[]' id='supplier_contact_row"+table_len+"' value='"+new_supplier_contact+"'></td><td><input class = 'form-control' name='supplier_address[]' type='text' id='supplier_address_row"+table_len+"' value='"+new_supplier_address+"'></td><td><input class = 'form-control' name='supplier_type_of_material[]' type='text' id='supplier_type_of_material_row"+table_len+"' value='"+new_supplier_type_of_material+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("supplier_name").value="";
 document.getElementById("supplier_contact").value="";
 document.getElementById("supplier_address").value="";
 document.getElementById("supplier_type_of_material").value="";


}
</script>

<script>
function edit_row2(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var country=document.getElementById("country_row"+no);
 var age=document.getElementById("age_row"+no);
 var additional_emi_comments=document.getElementById("additional_emi_comments_row"+no);
 
	
 var name_data=name.innerHTML;
 var country_data=country.innerHTML;
 var age_data=age.innerHTML;
 var additional_emi_comments_data=additional_emi_comments.innerHTML;

 name.innerHTML="<input type='text' name='Reference_type[]' id='name_text"+no+"' value='"+name_data+"'>";
 country.innerHTML="<input type='text' name='Name[]' id='country_text"+no+"' value='"+country_data+"'>";
 age.innerHTML="<input type='text' id='age_text"+no+"' name='Contact_No[]' value='"+age_data+"'>";
 additional_emi_comments.innerHTML="<input type='text' id='additional_emi_comments_text"+no+"' name='additional_emi_comments[]' value='"+additional_emi_comments_data+"'>";
}

function save_row2(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;
 var additional_emi_comments_val=document.getElementById("additional_emi_comments_text"+no).value;




 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 document.getElementById("age_row"+no).innerHTML=age_val;
 document.getElementById("additional_emi_comments_row"+no).innerHTML=additional_emi_comments_val;
 

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row2(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row2()
{
 var new_name=document.getElementById("Reference_type").value;
 var new_country=document.getElementById("Name").value;
 var new_age=document.getElementById("Contact_No").value;
 var new_additional_emi_comments=document.getElementById("additional_emi_comments").value;




	
 var table=document.getElementById("data_table2");
 var table_len=(table.rows.length)-1;
// var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td name=''Name[]' id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td id='relation_row"+table_len+"'>"+new_relation+"</td><td id='KnownSince_row"+table_len+"'>"+new_KnownSince+"</td><td id='Verification_Status_row"+table_len+"'>"+new_Verification_Status+"</td><td id='Brief_on_Reference_row"+table_len+"'>"+new_Brief_on_Reference+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='Reference_type[]' id='name_row"+table_len+"' value='"+new_name+"'></td><td><input type='text' class = 'form-control' name='Name[]' id='country_row"+table_len+"' value='"+new_country+"'></td><td><input class = 'form-control' name='Contact_No[]' type='text' id='age_row"+table_len+"' value='"+new_age+"'></td><td><input class = 'form-control' name='additional_emi_comments[]' type='text' id='additional_emi_comments_row"+table_len+"' value='"+new_additional_emi_comments+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row2("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row2("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row2("+table_len+")'></td></tr>";

 document.getElementById("Reference_type").value="";
 document.getElementById("Name").value="";
 document.getElementById("Contact_No").value="";
  document.getElementById("additional_emi_comments").value="";


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
	  $('#Comments').attr('readonly',true); 
	  $('#Reference_type').attr('readonly',true);   
	  	  $('#Name').attr('readonly',true);
			$('#Contact_No').attr('readonly',true);

 }
 }

}
</script>
<script>

function Function_three() 
   {
	
		if ($('#select_all').is(':checked')) 
		{
			$(".mycheck").prop( "checked", true );
		}
		else
		{
			$(".mycheck").prop( "checked", false );
		}
	}
</script>
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
						 var holdReason ="Application is on HOLD in PD From Two because : "+ document.getElementById('holdReason').value;
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
							var rejectReason = "Application is rejected in PD From Two because : " +document.getElementById('rejectReason').value;
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
											
												var word = "Two";
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
												var word = "Two";
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
function edit_row_additional_EMI(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
 var Children_name=document.getElementById("Children_name_row"+no);
 var Children_age=document.getElementById("Children_age_row"+no);
 var Children_study=document.getElementById("Children_study_row"+no);
 var Children_amount=document.getElementById("Children_amount_row"+no);
 var Children_medical=document.getElementById("Children_medical_row"+no);
  var Children_EMI=document.getElementById("Consider_EMI_row"+no);

 var Children_name_data=Children_name.innerHTML;
 var Children_age_data=Children_age.innerHTML;
 var Children_study_data=Children_study.innerHTML;
 var Children_amount_data=Children_amount.innerHTML;
 var Children_medical_data=Children_medical.innerHTML;	
  var Consider_EMI_data=Children_EMI.innerHTML;	
 Children_name.innerHTML="<input type='text' name='Children_name_[]' id='Children_name_text"+no+"' value='"+Children_name_data+"'>";
 Children_age.innerHTML="<input type='text' name='Children_age_[]' id='Children_age_text"+no+"' value='"+Children_age_data+"'>";
 Children_study.innerHTML="<input type='text' id='Children_study_text"+no+"' name='Children_study_[]' value='"+Children_study_data+"'>";
 Children_amount.innerHTML="<input type='text' id='Children_amount_text"+no+"' name='Children_amount_[]' value='"+Children_amount_data+"'>";
 Children_medical.innerHTML="<input type='text' id='Children_medical_text"+no+"' name='Children_medical_[]' value='"+Children_medical_data+"'>";
 Consider_EMI.innerHTML="<input type='text' id='Consider_EMI_text"+no+"' name='Consider_EMI_[]' value='"+Consider_EMI_data+"'>";
}

function save_row_additional_EMI(no)
{
 var Children_name_val=document.getElementById("Children_name_text"+no).value;
 var Children_age_val=document.getElementById("Children_age_text"+no).value;
 var Children_study_val=document.getElementById("Children_study_text"+no).value;
 var Children_amount_val=document.getElementById("Children_amount_text"+no).value;
 var Children_medical_val=document.getElementById("Children_medical_text"+no).value;
  var Consider_EMI_val=document.getElementById("Consider_EMI_text"+no).value;
 document.getElementById("Children_name_row"+no).innerHTML=Children_name_val;
 document.getElementById("Children_age_row"+no).innerHTML=country_val;
 document.getElementById("Children_study_row"+no).innerHTML=Children_study_val;
 document.getElementById("Children_amount_row"+no).innerHTML=Children_amount_val;
 document.getElementById("Children_medical_row"+no).innerHTML=Children_medical_val;
  document.getElementById("Consider_EMI_row"+no).innerHTML=Consider_EMI_val;
 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row_additional_EMI(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row_additional_EMI()
{
 var new_Children_name=document.getElementById("Children_name_").value;
 var new_Children_age=document.getElementById("Children_age_").value;
 var new_Children_study=document.getElementById("Children_study_").value;
 var new_Children_amount=document.getElementById("Children_amount_").value;
 var new_Children_medical=document.getElementById("Children_medical_").value;
 var new_Consider_EMI=document.getElementById("Consider_EMI").value;
 var table=document.getElementById("data_table_additional_EMI");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='Children_name_[]' id='Children_name_row"+table_len+"' value=''></td><td><input type='text' class = 'form-control' name='Children_age_[]' id='Children_age_row"+table_len+"' value=''></td><td><input class = 'form-control' name='Children_study_[]' type='number' id='Children_study_row"+table_len+"' value=''></td><td><input class = 'form-control' name='Children_amount_[]' type='number' id='Children_amount_row"+table_len+"' value=''></td><td><input class = 'form-control' name='Children_medical_[]' type='number' id='Children_medical_row"+table_len+"' value=''></td><td><select  id='Consider_EMI_row"+table_len+"' value='' name='Consider_EMI[]' class='form-control'><option value='Yes' selected>Yes</option><option value='No'>No</option></select></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row_additional_EMI("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row_additional_EMI("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row_additional_EMI("+table_len+")'></td></tr>";
 document.getElementById("Children_name_type_").value="";
 document.getElementById("Children_age_").value="";
 document.getElementById("Children_study_").value="";
 document.getElementById("Children_amount_").value="";
 document.getElementById("Children_medical_").value="";
  document.getElementById("Consider_EMI").value="";
 }
</script>
</body>
</html>
	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
							<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
