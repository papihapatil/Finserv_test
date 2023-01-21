<style>
	.vertical-menu {
  width: 180px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #04AA6D; /* Add a green color to the "active/current" link */
  color: white;
}
</style>
<?php
					if(($data_row_more->STATUS == 'Loan Recommendation Approved'))
					{
					   $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$Applicant_row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                       $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                       $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                    
					}
		          else if($data_row_more->STATUS == 'Loan Sanctioned')
                     {
                 
                       $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$Applicant_row->UNIQUE_CODE.'"   class="btn Calculate_eligibility"><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                       $Login_fees_details ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                       $Sanction_form ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Amortaization ='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                       $Pre_cam='<a style="margin-left: 8px; " class="btn" href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     
                     else if($data_row_more->STATUS == 'PD Completed')
                     {
                 
                 
                        $edit ='      
                       <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'"  target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                       $PD='<a  href="'. base_url().'index.php/credit_manager_user/pdf?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
                       $Eligibility ='<a style="margin-left: 8px; " href="'.base_url().'index.php/Rule_Engine/Calculate_eligibility?ID='.$Applicant_row->UNIQUE_CODE.'"  ><i class="fa fa-calculator text-right" style="color:green;"></i></a';
                      $Login_fees_details ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                      $Sanction_form ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/BranchManager/Loan_sanction_form?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                      $Amortaization ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/BranchManager/Amortization_Schedule?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:green;"></i></a>';
                      $Pre_cam='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     else if( $data_row_more->STATUS=='Aadhar E-sign complete')
                     {
                         
                        $edit ='    <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'"  target="_blank"><i class="fa fa-eye text-right" style="color:blue;"></i></a>';
                        $PD='<a  ><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                        $Eligibility ='<a style="margin-left: 8px; "  href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                        $Login_fees_details ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                        $Sanction_form ='<a style="margin-left: 8px;"  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                        $Amortaization ='<a style="margin-left: 8px;"  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                        $Pre_cam='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                   }    
                     else if($data_row_more->STATUS == 'Cam details complete')
                     {
                        
                         $edit =' <a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                         $PD='<a  ><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                         $Eligibility ='<a style="margin-left: 8px; "  href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                         $Login_fees_details ='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Login_fees_details?ID='.$Applicant_row->UNIQUE_CODE .'"><i class="fa fa-money" aria-hidden="true" style="color:green;"></i></a>';
                         $Sanction_form ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                         $Amortaization ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                         $Pre_cam='<a style="margin-left: 8px; "  href="'.base_url().'index.php/admin/Generate_pre_cam?ID='.$Applicant_row->UNIQUE_CODE.'"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a>';
                     }
                     else {

                           
                          $edit ='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'" target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
                          $PD='<a  ><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a>';
                          $Eligibility ='<a style="margin-left: 8px; "  href=""><i class="fa fa-calculator text-right" aria-hidden="true" style="color:gray;"></i></a>';
                          $Login_fees_details ='<a style="margin-left: 8px; "  href=""><i class="fa fa-money" aria-hidden="true" style="color:gray;"></i></a>';
                          $Sanction_form ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:grey;"></i></a>';
                           $Amortaization ='<a style="margin-left: 8px; "  href=""><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                          $Pre_cam='<a style="margin-left: 8px; " ><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
                     }
					 ?>
					 <?php
					if( $Applicant_row->cam_status=='Cam details complete')
					{
					 $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$Applicant_row->UNIQUE_CODE.'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
					}
					else
					{
					 $Cam_pdf='<a><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
															 }	 
  $total_types=  count($disbursement_property_type_documents);
  
  $a = $getCustomerSanction_recommendation_details->sanction_conditions;
 $employee_arr = explode(PHP_EOL, $a);
 $i=1;
 $sanction_conditions= array();
  $sanction_conditions_done= array();
 foreach ($employee_arr as $employee)
{
 //echo $employee ; 
   array_push($sanction_conditions, $employee);
$i++;
}
foreach($find_my_uploded_sanction_conditions as $SC)
{

	array_push($sanction_conditions_done, $SC->SanctionCondition);
}
	

//========================== added by priya 03-01-2023================
$a = $getCustomerSanction_recommendation_details->legal_conditions;
 $employee_arr = explode(PHP_EOL, $a);
 $i=1;
 $legal_conditions= array();
  $legal_conditions_done= array();
 foreach ($employee_arr as $employee)
{
 //echo $employee ; 
   array_push($legal_conditions, $employee);
$i++;
}
																		
foreach($find_my_uploded_legal_conditions as $SC)
{

	array_push($legal_conditions_done, $SC->LegalCondition);
}

?>
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
									    <body class="wide comments example">
									    		        <input hidden type="text"    value="<?php echo $userID;?>" id="login_user_unique_code">
														<input hidden type="text"    value="<?php echo $row->UNIQUE_CODE;?>" id="applicant_unique_code">
														<input hidden type="text"    value="<?php echo base64_encode($row->UNIQUE_CODE);?>" id="applicant_encoded_unique_code">
														<input hidden type="text"    value="<?php echo  $data_row_applied_loan->Application_id ; ?>" id="loan_application_id">
														<input hidden type="number"  value="" id="selected_document_number">	
														<input hidden type="text"    value="" id="selected_document_name">
														<div class="fw-body">
															<div class="content">
															<div class="row" style="padding:20px;margin-top: -20px;">
														
														<div class="col-sm-12"> 
															<h5>Applicant Name : <?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?></h5>
															<hr>
														</div>
														<br>

														<div class="col-sm-4"> 
															<h6>Type of loan: <?php if($loan_details->LOAN_TYPE == 'lap') { echo "Loan Against Property" ;} else {echo  $loan_details->LOAN_TYPE ; }?></h6>
														</div>
														<div class="col-sm-3"> 
															<h6>Sanctioned loan Amount : <?php echo "Rs. ".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $sanction_details->total_loan_amount) ; ?></h6>
														</div>
														<div class="col-sm-3"> 
															<h6>Tenure: <?php echo  $sanction_details->tenure ; ?></h6>
														</div>
														<div class="col-sm-2"> 
															<h6>ROI:  <?php echo  $sanction_details->rate_of_interest ; ?></h6>
														
														</div>
														
													
														<hr>
													</div>
													<br>
																<div class="row">
																	<div class="col-sm-2">
																		<div class="vertical-menu">
																			<a href="#" class="active"> Document List</a>
																			<div class="dropdown">
																				<a href="#" id=""  data-toggle="dropdown">Documents</a>
																				<div class="dropdown-menu">
																				<a class="dropdown-item" onclick="loan_application_form();">POST SANCTIONED DOCUMENTS</a>
																				<a class="dropdown-item" onclick="KYC();">KYC</a>
																				<a class="dropdown-item" onclick="Bureau();" >BUREAU REPORTS</a>
																				<a class="dropdown-item" onclick="Reports();">REPORTS</a>
																				<a class="dropdown-item" onclick="PD()">PD</a>
																				<a class="dropdown-item" onclick="CAM()">CAM</a>
																				<a class="dropdown-item" onclick="sanction();" >SANCTIONED DOCUMENTS </a>
																				<a class="dropdown-item" onclick="Income()">INCOME DOCUMENTS</a>
																				<a class="dropdown-item" onclick="Income_analysys()">INCOME ANALYSIS BANK STATEMENT</a>
																				<a class="dropdown-item" onclick="Bank_pass()">BANK PASS BOOK/ STATEMENT</a>
																				<a class="dropdown-item" onclick="Property_doc()">PROPERTY DOCUMEENT</a>
																				<a class="dropdown-item" onclick="Post_sanctioned_documents()">PRE DISBURSEMENT DOCUMENT</a>
																				<a class="dropdown-item" onclick="Sanction_Conditions()">SANCTION CONDITIONS</a>
																				<a class="dropdown-item" onclick="Legal_Conditions()">LEGAL CONDITIONS</a>
																				<!--<a class="dropdown-item" onclick="Other()">OTHER DOCUMENTS</a>-->
																			</div>
																		</div>
																		<!--
																		<?php 
																			$i=1;
																			foreach ($disbursement_property_type_documents as  $value)
																			{
															  			?>
															  				 <a href="#" id="<?php echo $value->id;?>" onclick="section<?php echo $value->id;?>();"><?php echo $value->Main_Document_Type ;?></a>
															  				 <input hidden type="number" value="<?php echo $value->id;?>" id="master_doc_id<?php echo $value->id;?>">
															  				 <input hidden type="text" value="<?php echo $value->Main_Document_Type;?>" id="master_doc_name<?php echo $value->id;?>">
															  			<?php
																				$i++;
																			}
																		?>-->
																	</div>
																</div>
																<div class="col-sm-10" style="border:1px solid gray;">
																	<div id="default">Plese select document menu for further process
																		<div id="pending_documents" style="display:none">
																			<h4>Pending Document List</h4>
																			<div style="overflow-x:auto;">
																				<table class="table table-bordered">
																					<thead>
																						<tr>
																							<th>Document Name</th>
																							<th>Available</th>
																							<th>Not Available </th>
																							<th>Not Applicable </th>
																							<th>PDD</th>
																							<th>Action</th>
																						</tr>
																					</thead>
																					<tbody id="data_pending">
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																	<div id="loan_application_form_" style="display:none">
																		<br>
																		<h4 id="">POST SANCTIONED DOCUMENTS</h4>
																		<div style="overflow-x:auto;">
																			<table class="table table-bordered" >
																				<thead>
																					<td>DOCUMENT TYPE</td>
																					<td></td>
																				<thead> 
																				<tbody>
																					<tr>
																						<td><lable id="lable_loan_application_form"></lable>
																						<?php
																							if(!empty($find_my_loan_application_form))
																							{
																								foreach($find_my_loan_application_form as $d)
																								{
																						?>
																								
																								
																									<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																					   <?php
																								}
																							}
																							else
																							{
																						?>
																							<div id="div_loan_loan_application_form">
																									<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Loan Application Form 
																							</div>
																					   <?php
																							}
																						?>
																						</td>
																					</tr>
																					<tr>
																						<td><lable id="lable_loan_agreement"></lable>
																						<?php
																							//print_r($find_my_loan_agreement);
																							if(!empty($find_my_loan_agreement))
																							{
																								foreach($find_my_loan_agreement as $d)
																								{
																						?>
																									<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																					   <?php
																								}
																							}
																							else
																							{
																						?>
																							<div id="div_loan_agreement">
																									<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Signed Loan Agreement
																							</div>
																					  <?php
																							}
																						?>
																						</td>
																				</tr>
																				<tr>
																					<td><lable id="lable_loan_signed_sanction_letter"></lable>
																					<?php
																						//print_r($find_my_loan_agreement);
																						if(!empty($find_my_sanction_letter))
																						{
																							foreach($find_my_sanction_letter as $d)
																							{
																					?>
																								  <a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																				   <?php
																							}
																						}
																						else
																						{
																					?>
																					<div id="div_loan_signed_sanction_letter">
																			   					  <a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Signed Sanction Letter 
																				   </div>
																				   <?php
																						}
																					?>
																					</td>
																				</tr>
																				<tr>
																					<td><lable id="lable_signed_MITC_letter"></lable>
																					<?php
																						//print_r($find_my_loan_agreement);
																						if(!empty($find_my_MITC_letter))
																						{
																							foreach($find_my_MITC_letter as $d)
																							{
																					?>
																								<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																				   <?php
																							}
																						}
																						else
																						{
																					?>
																					<div id="div_signed_MITC_letter">
																								<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Signed MITC Letter 
																				   </div>
																				   <?php
																						}
																					?>
																					</td>
																				</tr>
																				<tr>
																					<td><lable id="lable_signature_varification"></lable>
																					<?php
																						//print_r($find_my_loan_agreement);
																						if(!empty($find_my_Bank_signature_verification))
																						{
																							foreach($find_my_Bank_signature_verification as $d)
																							{
																					?>
																								<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																				   <?php
																							}
																						}
																						else
																						{
																					?>
																					<div id="div_signature_varification">
																								<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Bank signature verification
																				   </div>
																				   <?php
																						}
																					?>
																					</td>
																				</tr>
																					<tr>
																					<td><lable id="lable_vernacular_declaration"></lable>
																					<?php
																						//print_r($find_my_loan_agreement);
																						if(!empty($find_my_Vernacular_Declaration))
																						{
																							foreach($find_my_Vernacular_Declaration as $d)
																							{
																					?>
																								<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																				   <?php
																							}
																						}
																						else
																						{
																					?>
																						<div id="div_vernacular_declaration">
																								<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Vernacular Declaration
																						</div>
																				  <?php
																						}
																					?>
																					</td>
																				</tr>
																				<tr>
																					<td><lable id="lable_dual_name"></lable>
																					<?php
																						//print_r($find_my_loan_agreement);
																						if(!empty($find_my_Dual_name_declatarion))
																						{
																							foreach($find_my_Dual_name_declatarion as $d)
																							{
																					?>
																								<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																				   <?php
																							}
																						}
																						else
																						{
																					?>
																					<div id="div_dual_name">
																								<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Dual name declatarion
																				   </div>
																				   <?php
																						}
																					?>
																					</td>
																				</tr>
																				<tr>
																					<td><lable id="lable_end_use"></lable>
																					<?php
																						//print_r($find_my_loan_agreement);
																						if(!empty($find_my_End_use_letter))
																						{
																							foreach($find_my_End_use_letter as $d)
																							{
																					?>
																								<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																				   <?php
																							}
																						}
																						else
																						{
																					?>
																					<div id="div_end_use">
																								<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;End use letter
																					</div>
																				  <?php
																						}
																					?>
																					</td>
																				</tr>
																				<tr>
																					<td><lable id="lable_pre_emi"></lable>
																					<?php
																						//print_r($find_my_loan_agreement);
																						if(!empty($find_my_Pre_EMI_letter))
																						{
																							foreach($find_my_Pre_EMI_letter as $d)
																							{
																					?>
																								<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo $d->Doc_name; ?>
																				   <?php
																							}
																						}
																						else
																						{
																					?>
																								<div id="div_pre_emi">
																								<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;Pre EMI letter
																								</div>
																				  <?php
																						}
																					?>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
																<div id="KYC_" style="display:none">
																	<br>
																	<h4 id="">KYC Documents</h4>
																	<div style="overflow-x:auto;">
																		<table class="table table-bordered">
																			<thead>
																				<td>DOCUMENT TYPE</td>
																				<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																				<?php $i=1; 
																					Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																					{ 
																				?>
																				<td><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
																				<?php 
																					}
																				?>
																			<thead> 
																			<tbody>
																			   <tr>
																				<td>KYC	</td>
																				<td> 
																				<?php
																					foreach($get_documents  as $value)
																					{
																						if(!empty($value->DOC_MASTER_TYPE))	
																						{		
																							if($value->DOC_MASTER_TYPE == "KYC")	
																							{																			
																				?>
																				                <input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																								<input  hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																								<div id="div_existing_<?php echo $value->ID; ?>">
																											<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' title="Approved"><i class="fa fa-file-pdf-o text-right" style="color:blue;" ></i></a>&nbsp;&nbsp;<lable style="color:green;"><?php echo ucwords($value->DOC_TYPE);?></lable>	<br>	
																				
																								</div>
																								<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>
																								<?php
																							}
																							if($value->DOC_MASTER_TYPE == "RESIDENCE PROOF")	
																							{
																								
																				?>	
																				 <input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																				 <input hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																					<div id="div_existing_<?php echo $value->ID; ?>">
																						<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' title="Approved"><i class="fa fa-file-pdf-o text-right" style="color:blue;" ></i></a>&nbsp;&nbsp;<lable style="color:green;"><?php echo ucwords($value->DOC_TYPE);?></lable>	<br>
																				
																									</div>
																								<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>
																								<?php
																							}
																									if($value->DOC_TYPE == "PAN CARD")	
																							{
																								
																				?>	
																				 <input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																				 <input hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																					<div id="div_existing_<?php echo $value->ID; ?>">
																						<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' title="Approved"><i class="fa fa-file-pdf-o text-right" style="color:blue;" ></i></a>&nbsp;&nbsp;<lable style="color:green;"><?php echo ucwords($value->DOC_TYPE);?></lable>	<br>
																				
																									</div>
																								<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>
																								<?php
																							}
																						}
																					} 
																				?>
																				</td>
																				<?php $i=1; 
																					Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																					{ 
																				?>
																				<td>
																				<?php
																					Foreach($Coapplicant_docs[1] AS $Master)
																						{ 
																						   Foreach($Coapplicant_docs[0] AS $document)
																							{ 
																								if($document->DOC_MASTER_TYPE== $Master->DOC_MASTER_TYPE)
																								{
																									if($document->doc_cloud_name == '') 
																									{ 
																				?>
																										<i class="fa fa-edit text-right" style="color:blue;" data-toggle="modal" data-target="#existing_documents_model" onclick="assigne_values(<?php echo $document->ID; ?>);" ></i>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE)." ".$value->Disbursement_ststus;?><br>
																				<?php
																									}
																									else
																									{			
																				?>
																				<?php
																										if($document->DOC_MASTER_TYPE == "KYC")	
																										{	
																				?>
																							                <input hidden  type="text" value="<?php echo $document->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $document->ID; ?>">
																											<input hidden type="text" value="<?php echo $document->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $document->ID; ?>">
																										<div id="div_existing_<?php echo $document->ID; ?>">
																						<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords($document->DOC_TYPE); ?></lable><br>
																												

																				                 	</div>
																								<lable id="lable_existing_<?php echo $document->ID; ?>"></lable>
																								
																										
																				<?php
																										}
																										if($document->DOC_MASTER_TYPE == "RESIDENCE PROOF")	
																										{
																				?>
																									    <input hidden type="text" value="<?php echo $document->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $document->ID; ?>">
																										<input hidden type="text" value="<?php echo $document->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $document->ID; ?>">
																										<div id="div_existing_<?php echo $document->ID; ?>">
																						<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords($document->DOC_TYPE); ?></lable><br>
																									
																				</div>
																								<lable id="lable_existing_<?php echo $document->ID; ?>"></lable>
																				<?php
																										}
																										if($document->DOC_TYPE == "PAN CARD")	
																										{
																				?>
																									    <input hidden type="text" value="<?php echo $document->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $document->ID; ?>">
																										<input hidden type="text" value="<?php echo $document->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $document->ID; ?>">
																										<div id="div_existing_<?php echo $document->ID; ?>">
																						<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords($document->DOC_TYPE); ?></lable><br>
																									
																				</div>
																								<lable id="lable_existing_<?php echo $document->ID; ?>"></lable>
																				<?php
																										}
																				?>
																				<?php
																									}
																						
																								}
																							}
																						}	
																				?>
																				</td>
																				<?php	
																		  		    }
																				?>
																			</tr>
																			<tr>
																		</tbody>
																	</table>
																</div>
															</div>
															<div id="Bureau_" style="display:none">
																<br>
																<h4 id="">Bureau Documents</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		<thead>
																			<td>DOCUMENT TYPE</td>
																			<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																			<?php $i=1; 
																				Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																				{ 
																			?>
																			<td><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
																			<?php 
																				}
																			?>
																		<thead> 
																		<tbody>
																		<tr>
																			<td>BUREAU REPORTS</td>
																			<td> 
																			<a  href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Applicant_row->UNIQUE_CODE;?>" target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;EQUIFAX<br>
																			
																			<?php
																					   if(!empty($find_my_CRIF_documents))
																					   {
																							foreach($find_my_CRIF_documents as $d)
																								{
																						   ?>
																							
																							
																							<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>
																							
																						   <?php
																								}
																					   }
																					   else
																					   {
																							?>
																						
																						<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;CRIF 
																						
																							
																						   <?php
																					   }
																					?>
																			</td>
																			<?php $i=1; 
																				Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																				{ 
																			?>
																			<td>
																					<a href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Coapplicant_docs['UNIQUE_CODE'];?>"  target="_blank"><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;EQUIFAX<br>
																			<?php 
																					if(!empty($coapplicant_CRIF))
																					{
																						foreach($coapplicant_CRIF as $d)
																						{
																						  foreach($d as $v)
																							{
																								if($v->Cust_Id == $Coapplicant_docs['UNIQUE_CODE'])
																								{
																			 ?>
																					<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $v->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($v->Doc_name); ?><br>
																			<?php
																								}
																								else
																								{
																			?>
																			<?php
																								}
																							}
																						}
																					}
																					else
																					{
																			?>
																					<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;CRIF 
																			<?php
																					}
																				}
																			?>
																		</tr>
																	</tbody>
																</table>
															 </div>
														  </div>
													   	  <div id="Reports_" style="display:none">
															<br>
															<h4 id="">Reports</h4>
															<div style="overflow-x:auto;">
																<table class="table table-bordered">
																	<thead>
																		<td>DOCUMENT TYPE</td>
																		<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																	<thead> 
																	<tbody>
															    		<tr>
																			<td>REPORTS</td>
																			<td>
																   		    <?php
																		      if(!empty($find_my_legal_documents))
																		      {
																				foreach($find_my_legal_documents as $d)
																					{
																			   ?>
																			   
																				    <input hidden type="text" value="<?php echo $d->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $d->id; ?>">
																					<input hidden type="text" value="<?php echo $d->Doc_name; ?>" name="report_name" id="report_name_<?php echo $d->id; ?>">
																					<div id="div_reports_<?php echo $d->id; ?>">
																					
																							<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords($d->Doc_name); ?></lable>
																			  			
																					</div>
																					<lable id="lable_reports_<?php echo $d->id; ?>"></lable>	
																			   <?php
																					}
																		      }
																		      else
																		      {
																				?>
																					<a><i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;&nbsp;Legal document 
																			   <?php
																		      }
																		     ?>
																		     <br>
																		     <?php
																	           if(!empty($find_my_technical_documents))
																	           {
																			     foreach($find_my_technical_documents as $d)
																					{
																			 ?>
																			  <input hidden type="text" value="<?php echo $d->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $d->id; ?>">
																					<input hidden type="text" value="<?php echo $d->Doc_name; ?>" name="report_name" id="report_name_<?php echo $d->id; ?>">
																				<div id="div_reports_<?php echo $d->id; ?>">
																					
																				
																							<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords($d->Doc_name); ?></lable>
																			  
																					
																						</div>
																					<lable id="lable_reports_<?php echo $d->id; ?>"></lable>																					
																		  	<?php
																					}
																				}
																				else
																				{
																			?>
																						<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Technical document 
																			<?php
																				}
																			?>
																			<br>
																			<?php
																				if(!empty($find_my_RCU_documents))
																				{
																					foreach($find_my_RCU_documents as $d)
																					{
																		    ?>
																			 <input hidden type="text" value="<?php echo $d->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $d->id; ?>">
																					<input hidden type="text" value="<?php echo $d->Doc_name; ?>" name="report_name" id="report_name_<?php echo $d->id; ?>">
																				<div id="div_reports_<?php echo $d->id; ?>">
																				
																				
																							<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords($d->Doc_name); ?></lable>
																			  
																					
																							</div>
																					<lable id="lable_reports_<?php echo $d->id; ?>"></lable>																					
																			<?php
																					}
																				}
																				else
																				{
																			?>
																						<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;&nbsp;RCU document 
																		   <?php
																				}			
																			?>
																			<br>
																			<?php
																				if(!empty($find_my_FI_documents))
																				{
																					foreach($find_my_FI_documents as $d)
																					{
																		    ?>
																			 <input hidden type="text" value="<?php echo $d->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $d->id; ?>">
																					<input hidden type="text" value="<?php echo $d->Doc_name; ?>" name="report_name" id="report_name_<?php echo $d->id; ?>">
																			<div id="div_reports_<?php echo $d->id; ?>">
																				

																							<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords($d->Doc_name); ?></lable>
																			  
																					
																					</div>
																					<lable id="lable_reports_<?php echo $d->id; ?>"></lable>																						
																			<?php
																					}
																				}
																				else
																				{	
																			?>
																						<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;FI document
																			<?php
																				}
																			?>
																			<br>
																			<?php
																				if(!empty($find_my_Court_case_documents))
																				{
																					foreach($find_my_Court_case_documents as $d)
																					{
																		    ?>
																			       <input hidden type="text" value="<?php echo $d->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $d->id; ?>">
																					<input hidden type="text" value="Court case /Background Verification documents" name="report_name" id="report_name_<?php echo $d->id; ?>">
																						<div id="div_reports_<?php echo $d->id; ?>">
																				
																			
																							<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords("Court case /Background Verification documents"); ?></lable>
																			  
																																									
																					</div>
																					<lable id="lable_reports_<?php echo $d->id; ?>"></lable>	
																			
																			<?php
																					}
																				}
																				else
																				{
																			?>
																						<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Court case /Background Verification documents
																			<?php
																				}
																			?>
																			<br>
																			<?php
																				if(!empty($find_my_Legal_Document_Search_documents))
																				{
																					foreach($find_my_Legal_Document_Search_documents as $d)
																					{
																		   ?>
																					<input hidden type="text" value="<?php echo $d->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $d->id; ?>">
																					<input hidden type="text" value="Legal Document Search" name="report_name" id="report_name_<?php echo $d->id; ?>">
																						<div id="div_reports_<?php echo $d->id; ?>">
																				
																					
																							<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green"><?php echo ucwords("Legal Document Search"); ?></lable>
																			  
																						
																						</div>
																					<lable id="lable_reports_<?php echo $d->id; ?>"></lable>	
																			        <?php
																				    }
																				}
																				else
																				{
																			?>
																						<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Legal Document Search
																			<?php
																				}
																			?>
																			</td>
																		</tr>
																	</tbody>
																</table>
															 </div>
														  </div>
														  <div id="PD_" style="display:none">
															<br>
															<h4 id="">PD</h4>
															<div style="overflow-x:auto;">
																<table class="table table-bordered">
																	<thead>
																		<td>DOCUMENT TYPE</td>
																		<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																	<thead> 
																	<tbody>
																		<tr>
																			<td>PD REPORT</td>
																			<td><?php echo $PD;?></td>
																		</tr>
																	</tbody>
																</table>
															 </div>
														  </div>
														  <div id="sanction_" style="display:none">
															<br>
															<h4 id="">Sanctioned Documents</h4>
															<div style="overflow-x:auto;">
																<table class="table table-bordered">
																	<thead>
																		<td>DOCUMENT TYPE</td>
																		<td></td>
																	<thead> 
																	<tbody>
																		<tr>
																			<td>Sanction Letter</td>
																			<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url();?>index.php/Credit_manager_user/Sanction_Letter?ID=<?php echo $row->UNIQUE_CODE ;?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a></td>
																		</tr>
																		<tr>
																			<td>MITC Letter</td>
																			<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url();?>index.php/Credit_manager_user/MITAC_pdf?ID=<?php echo $row->UNIQUE_CODE ;?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a></td>
																		</tr>
																		<tr>
																			<td>Loan Agreement</td>
																			<td><a style="margin-left: 8px; " class="btn" href="<?php echo base_url();?>index.php/Disbursement_OPS/Loan_Aggrement_AUTO?I=<?php echo base64_encode($row->UNIQUE_CODE); ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true" style="color:blue;"></i></a></td>
																		</tr>
																	</tbody>
																</table>
															 </div>
														  </div>
														  <div id="CAM_" style="display:none">
																<br>
																<h4 id="">CAM</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		<thead>
																			<td>DOCUMENT TYPE</td>
																			<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																			
																		<thead> 
																		<tbody>
																		<tr>
																			<td>CAM REPORT</td>
																			<td>
																				<?php echo $Cam_pdf;?> &nbsp;System Generated <br>
																				<?php //echo "<pre>";
																				$flag="false";
																				foreach($get_documents  as $value)
																				{
																					
																					if($value->DOC_TYPE == 'CAM Excel')	
																					{	
																						$flag="true";
																					}
																				}
																				if($flag == "true")
																				{
																				?>
																					<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;CAM Excel
																	
																				<?php
																				}	
																				else
																				{
																				?>
																					<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;CAM Excel
																				<?php
																				}
																				?>	
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
															
															<div id="Income_" style="display:none">
																<br>
																<h4 id="">Income Documents</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		<thead>
																			<td>DOCUMENT TYPE</td>
																			<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																			<?php $i=1; 
																				Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																				{ 
																			?>
																			<td><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
																			<?php 
																				}
																			?>
																		<thead> 
																		<tbody>
																		<tr>
																			<td>Income Documents</td>
																			<td> 
																			<?php
																				foreach($get_documents  as $value)
																				{
																					if(!empty($value->DOC_MASTER_TYPE))	
																					{		
																						if($value->DOC_MASTER_TYPE == "INCOME PROOF")	
																						{																			
																			?>
																						<input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																						<input hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																				<div id="div_existing_<?php echo $value->ID; ?>">
	
																				
																							<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<lable style="color:green"><?php echo ucwords($value->DOC_TYPE);?></lable>  <br>
																			
																					
																				</div>
																				<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>																						
																			<?php 
																						}
																					}
																				} 
																			?>
																			</td>
																			<?php $i=1; 
																				Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																				{ 
																			?>
																			<td>
																				<?php
																					Foreach($Coapplicant_docs[1] AS $Master)
																					{ 
																						Foreach($Coapplicant_docs[0] AS $document)
																						{ 
																							if($document->DOC_MASTER_TYPE== $Master->DOC_MASTER_TYPE)
																							{
																								if($document->doc_cloud_name == '') 
																								{ 
																				?>
																									<input hidden type="text" value="<?php echo $document->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $document->ID; ?>">
																									<input hidden type="text" value="<?php echo $document->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $document->ID; ?>">
																								
																								
																											<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?>&nbsp;&nbsp;<lable style="color:green;"><?php echo ucwords($document->DOC_TYPE);?></lable> <br>
																				             
																																														
																				<?php
																								}
																								else
																								{
																									if($document->DOC_MASTER_TYPE == "INCOME PROOF")	
																									{
																				?>
																										<input hidden type="text" value="<?php echo $document->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $document->ID; ?>">
																										<input hidden type="text" value="<?php echo $document->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $document->ID; ?>">
																										<div id="div_existing_<?php echo $document->ID; ?>">
																									
																											<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?>&nbsp;&nbsp;<lable style="color:green;"><?php echo ucwords($document->DOC_TYPE);?></lable> <br>
																				                 
																									 	</div>
																					<lable id="lable_existing_<?php echo $document->ID; ?>"></lable>
																				<?php
																									}
																								}
																							}
																						}
																					}
																			   ?>
																		 </td>
																		  <?php
																				}
																		  ?>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
																
															<div id="Income_analysys_" style="display:none">
																<br>
																<h4 id="">Income Analysis Documents</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		<thead>
																			<td>DOCUMENT TYPE</td>
																			<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																			<?php $i=1; 
																				Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																				{ 
																			?>
																			<td><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
																			<?php 
																				}
																			?>
																		<thead> 
																		<tbody>
																		<tr>
																			<td>Income Documents</td>
																			
																			<td><?php
																	   if(!empty($find_my_IncomeAnalysisbankstatement))
																	   {  $i=1;
																			foreach($find_my_IncomeAnalysisbankstatement as $d)
																				{
																		   ?>
																			        <input hidden type="text" value="<?php echo $d->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $d->id; ?>">
																					<input hidden type="text" value="<?php echo $d->Doc_name; ?>" name="report_name" id="report_name_<?php echo $d->id; ?>">
																					<?php
																									
																										?>
																										<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i></a>&nbsp;&nbsp; <lable style="color:green;"><?php echo ucwords($d->Doc_name); ?></lable><br>
																			
																										<?php
																								
																									
																									?>	
																			<?php
																			$i++;	}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Income Analysis bank statement<br>
																			
																		
																		   <?php
																	   }
																	?>
																</td>
																<?php $i=1; 
														
															Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
															{ 

															?>
															<td>
															<?php 
															
																          if(!empty($coapplicant_bank_statement))
																		   {
																			   //if(!empty($coapplicant_CRIF[0]))
																						//{
																						
																				foreach($coapplicant_bank_statement as $d)
																					{
																						 $i=1;
																							foreach($d as $v)
																							{
																								
																								if($v->Cust_Id == $Coapplicant_docs['UNIQUE_CODE'] && $v->Doc_name == "Income Analysis bank statement" )
																								{
																									
																			   ?>
																				    <input hidden  type="text" value="<?php echo $v->id; ?>" name="reports_document_ID" id="reports_document_ID_<?php echo $v->id; ?>">
																					<input hidden type="text" value="<?php echo $v->Doc_name; ?>" name="report_name" id="report_name_<?php echo $v->id; ?>">
																								<?php
																									if($v->Disbursement_ststus== "Approve")
																									{
																										?>
																										<i class="fa fa-edit text-right" style="color:blue;" data-toggle="modal" data-target="#Reports_model" onclick="assigne_report_values(<?php echo $v->id; ?>);" ></i></i>&nbsp;&nbsp; <lable style="color:green;"> <?php echo ucwords($v->Doc_name)." ".$i; ?></lable><br>
																			                     <?php
																									}
																									else if($v->Disbursement_ststus== "Reject")
																									{
																										?>
																											<i class="fa fa-edit text-right" style="color:gray;" ></i>&nbsp;&nbsp; <lable style="color:red;"><?php echo ucwords($v->Doc_name); ?></lable><br>
																			                        <?php
																									}
																									else
																									{
																										?>
																											<i class="fa fa-edit text-right" style="color:blue;" data-toggle="modal" data-target="#Reports_model" onclick="assigne_report_values(<?php echo $v->id; ?>);" ></i></i>&nbsp;&nbsp; <?php echo ucwords($v->Doc_name); ?><br>
																			
																										<?php
																									}
																									
																									?>	
																				
																				
																			   <?php 
																								}
																								else
																								{
																							?>
																			
																			   <?php
																								}
																								$i++;
																									
																							}
																						}
																					//}
																						//else
																						//{
																									?>
																			
																			   
																			   <?php
																						//}
																					
																		   }
																		   else
																		   {
																				?>
																			
																				
																			
																			   <?php
																		   }
															?>
															<?php 
															}?>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
																			
															<div id="Bank_pass_" style="display:none">
																<br>
																<h4 id="">BANK PASS BOOK/ STATEMENT</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		<thead>
																			<td>DOCUMENT TYPE</td>
																			<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																			<?php $i=1; 
																				Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																				{ 
																			?>
																			<td><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
																			<?php 
																				}
																			?>
																		<thead> 
																		<tbody>
																		<tr>
																			<td>BANK PASS BOOK/ STATEMENT</td>
																			<td> 
																	<?php
																		foreach($get_documents  as $value)
																		{
																			if(!empty($value->DOC_MASTER_TYPE))	
																			{		
																				if($value->DOC_MASTER_TYPE == "BANK PASS BOOK/BANK STATEMENT")	
																				{																			
																	?>
																				<input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																				<input hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																				<div id="div_existing_<?php echo $value->ID; ?>">
																			
																									<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<lable style="color:green;"><?php echo ucwords($value->DOC_TYPE);?></lable>  <br>
																	
																									</div>
																									<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>																									
																	<?php 
																				}
																				
																				
																			}
																		} 
																	?>
																</td>
																 <?php $i=1; 
																		  Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
																		  { 
																		  	?>
																							  <td>
																							<?php
																			Foreach($Coapplicant_docs[1] AS $Master)
																			{ 
																			   Foreach($Coapplicant_docs[0] AS $document)
																				{ 
																					if($document->DOC_MASTER_TYPE== $Master->DOC_MASTER_TYPE)
																					{
																					   if($document->doc_cloud_name == '') 
																						{ 
																						?>
																						
																						<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?>
																						
																						<?php
																						}
																						else
																						{
																						
																							if($document->DOC_MASTER_TYPE == "BANK PASS BOOK/BANK STATEMENT")	
																							{
																						?>
																						<input hidden type="text" value="<?php echo $document->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $document->ID; ?>">
																						<input hidden type="text" value="<?php echo $document->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $document->ID; ?>">
																							<div id="div_existing_<?php echo $document->ID; ?>">
																					
																										<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <lable style="color:green;"><?php echo ucwords($document->DOC_TYPE); ?></lable><br>
																					  
																							</div>
																							<lable id="lable_existing_<?php echo $document->ID; ?>"></lable>																									
																					 
																					    																
																					   <?php
																							}
																							
																							
																							
																						}
																					}
																							
																				}
																		   }
																		   	?>
																							  </td>
																							<?php
																	    }
																		  ?>
																		   
														   </td>
																			
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
																			
														    <div id="Property_doc_" style="display:none">
																<br>
																<h4 id="">PROPERTY DOCUMENTS</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		<thead>
																			<td>DOCUMENT TYPE</td>
																			<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																			
																		<thead> 
																		<tbody>
																		<tr>
																			<td>PROPERTY DOCUMEENTS</td>
																		<td>
																			<?php 
																				foreach($get_documents  as $value)
																				{
																						if($value->DOC_MASTER_TYPE == 'Home Improvement Loans' || $value->DOC_MASTER_TYPE == 'House Construction On Self Own Plot' || $value->DOC_MASTER_TYPE == 'Balance Transfer' ||$value->DOC_MASTER_TYPE == 'Re-Finance' ||$value->DOC_MASTER_TYPE == 'LAP' || $value->DOC_MASTER_TYPE == 'Home Loans' ||$value->DOC_MASTER_TYPE == 'Home Improvement Loans')	
																						{		?>
																					<input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																						<input hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																						<div id="div_existing_<?php echo $value->ID; ?>">
																								      <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<lable style="color:green"><?php echo ucwords($value->DOC_TYPE);?> </lable><br>
																						
																						</div>
																						<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>	
																									
																						<?php
																						}
																						if($value->DOC_MASTER_TYPE == 'Property Document' )
																						{
																							?>
																						<input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																						<input hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																						<div id="div_existing_<?php echo $value->ID; ?>">
																						
																								      <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<lable style="color:green"><?php echo ucwords($value->DOC_TYPE);?> </lable><br>
																						
																									</div>
																								<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>	
																									
																					
																								<?php
																						}
																						
																																									
																				}
																			?>
																		
																             </td> 
																	    	
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
																	
													 <div id="Post_sanctioned_documents_" style="display:none">
																<br>
																<h4 id="">PRE DISBURSEMENT DOCUMENTS</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		<thead>
																			<td>DOCUMENT TYPE</td>
																			<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
																			
																		<thead> 
																		<tbody>
																		<tr>
																			<td>PRE DISBURSEMENT DOCUMENTS</td>
																		<td>
																			<?php 
																				foreach($get_documents  as $value)
																				{
																						
																						if($value->DOC_MASTER_TYPE == 'Post Sanctioned Documents' )
																						{
																							?>
																						<input hidden type="text" value="<?php echo $value->ID; ?>" name="existing_document_ID" id="existing_document_ID_<?php echo $value->ID; ?>">
																						<input hidden type="text" value="<?php echo $value->DOC_TYPE; ?>" name="DOC_TYPE" id="DOC_TYPE_<?php echo $value->ID; ?>">
																						<div id="div_existing_<?php echo $value->ID; ?>">
																						
																								      <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<lable style="color:green"><?php echo ucwords($value->DOC_TYPE);?> </lable><br>
																						
																									</div>
																								<lable id="lable_existing_<?php echo $value->ID; ?>"></lable>	
																									
																					
																								<?php
																						}
																						
																																									
																				}
																			?>
																		
																             </td> 
																	    	
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
															
															
															 <div id="sanction_conditions_" style="display:none">
																<br>
																<h4 id="">SANCTION CONDITIONS</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		
																		<tbody>
																		<tr>
																						<td><span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal7" ></span>&nbsp;&nbsp;
																						SANCTION CONDITION DOCUMENTS</td>
																						<td>
																						<?php $i=1;
																							foreach($sanction_conditions_done  as $SD)
																							{
																							?>
																									<i class="fa fa-info-circle" aria-hidden="true" style="color:blue;"   onclick="show_sanction_condition_info(<?php echo $i;?>)"></i>&nbsp;&nbsp;<?php echo ucwords($SD);?>&nbsp;&nbsp; <span class="glyphicon glyphicon-ok" style="color:green;"></span><br>
																									<input hidden type="text" id="sanction_condition_for_info_<?php echo $i;?>" value="<?php echo $SD ;?>">
																							<?php
																							$i++;
																							}
																						
																							
																						?>
																						</td>
																		   </tr>
																				</tbody>
																		</table>
																</div>
															</div>
															<div id="legal_conditions_" style="display:none">
																<br>
																<h4 id="">LEGAL CONDITIONS</h4>
																<div style="overflow-x:auto;">
																	<table class="table table-bordered">
																		
																		<tbody>
																		<tr>
																						<td><span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal7_" ></span>&nbsp;&nbsp;
																						LEGAL CONDITION DOCUMENTS</td>
																						<td>
																						<?php $i=1;
																							foreach($legal_conditions_done  as $SD)
																							{
																							?>
																									<i class="fa fa-info-circle" aria-hidden="true" style="color:blue;"   onclick="show_legal_condition_info(<?php echo $i;?>)"></i>&nbsp;&nbsp;<?php echo ucwords($SD);?>&nbsp;&nbsp; <span class="glyphicon glyphicon-ok" style="color:green;"></span><br>
																									<input hidden type="text" id="legal_condition_for_info_<?php echo $i;?>" value="<?php echo $SD ;?>">
																							<?php
																							$i++;
																							}
																						
																							
																						?>
																						</td>
																		   </tr>
																				</tbody>
																		</table>
																</div>
															</div>
															
														</div>
														<hr>
														<br><br>		
														<div class="col-sm-8"> 
															<br><br>		<br><br>
															<h5>Remarks / Queries </h5>
															<textarea id="approval_remarks" name="approval_remarks" class="form-control" type="text" ></textarea>
															<hr>
														</div>
														<div class="col-sm-4"> 
															<br><br>		<br><br>
															<h5>Revert to credit</h5><br>
															<button type="button" class="btn btn-primary"  id="send_queries" onclick="send_queries();">Send Queries</button><hr>
														</div>
														<div class="col-sm-12">
														
														  
															<?php
															//echo "<pre>";
															// print_r(json_decode($getCustomerSanction_letter_details->disbursement_queries));
															// echo "</pre>";
															$a=json_decode($getCustomerSanction_letter_details->disbursement_queries);
															//arsort($array);
															
															if(!empty($a))
															{
															?>
															 <h5>Previous Remarks</h5> 
															<?php
															 for( $i=count($a)-1; $i>=0; $i-- )
															 {
																 
																 if($a[$i]->role == 'Disbursement OPS')
																 {
																	 ?>
																<div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#b5e2ff;">
																	<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																	<lable><?php echo $a[$i]->Query; ?></lable>
																</div>
																	 <?php
																 }
																 else
																 {
																 ?>
																 <div style="border:1px solid gray ;margin:20px;padding:10px;background-color:#daf0ff">
																	<span style="color:black"><?php echo $a[$i]->role." ".$a[$i]->added_by; ?> wrote on <?php echo $a[$i]->added_on;  ?></span><br>
																	<lable><?php echo $a[$i]->Query; ?></lable>
																</div>
																 <?php
																 }
																
															 }
															 }
															?>
														</div>
														<div class="col-sm-12"> 
															<h5>Date Of Disbursement </h5>
															<input id="disbursement_date" name="disbursement_date" class="form-control" type="date" value="<?php  if(!empty($find_Disbursement_document_approval_data)){   echo $find_Disbursement_document_approval_data->disbursement_date; }?>">
															<hr>
														</div>
														<br>
														<?php 
														   if(!empty($find_Disbursement_document_approval_data))
														   {
															   ?>
															   <div class="col-sm-12">
																	<button type="button" class="btn btn-primary" onclick="Approve_disbursement_application();" id="final_approve_btn">Update And Continue</button>
																	<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Disbursement_OPS/cheque_details?I=<?php echo base64_encode($row->UNIQUE_CODE);?>" class="btn modal_test">
																	<button type="button" class="btn btn-primary"  id="cheque_details">Disbursement Cheque Details</button>
																	</a>
															  
															   </div>
															   <?php
														   }
														   else
														   {
															  ?>
															  <div class="col-sm-12">
																<button type="button" class="btn btn-primary" onclick="Approve_disbursement_application();" id="final_approve_btn">Save And Continue</button>
																<a id="cheque_details" style="display:none" style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Disbursement_OPS/cheque_details?I=<?php echo base64_encode($row->UNIQUE_CODE);?>" class="btn modal_test">
																	<button type="button" class="btn btn-primary"  >Disbursement Cheque Details</button>
																</a>
														      </div>
															  <?php
														   }
														   
														?>
														
														<br>
													</div>
												</div>
	    									</div>
										</body>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div class="modal fade" id="Mymodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
						<h4 class="modal-title">Revert For Document </h4> 
					<!--<button type="button" class="close" data-dismiss="modal">×</button> -->
				                                                            
				</div> 
				<div class="modal-body">
					<h6 class="modal-title">Document Name : <lable id="selected_document_name_model_lable"></lable></h6> <br>
					<h6>Add Comments</h6>
					<textarea name="not_availabale_document_comments" id="not_availabale_document_comments" row="3" class="form-control"></textarea><br>
					<input hidden type="text" id="not_availabale_document_id">
					<input hidden type="text" id="not_availabale_document_name">
					<button type="button" class="btn btn-outline-success" onclick="submit_not_available_data();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="submit_cancel_data();">Cancel</button>
				</div>   
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	
	
	<div class="modal fade" id="Mymodal2">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
						<h4 class="modal-title">Details Needed For PDD </h4> 
					<!--<button type="button" class="close" data-dismiss="modal">×</button> -->
				                                                            
				</div> 
				<div class="modal-body">
					<h6 class="modal-title">Document Name : <lable id="selected_document_name_model_lable2"></lable></h6> <br>
			        <h6>Add Comments</h6>
			        <textarea name="pdd_comments" id="pdd_comments" row="3" class="form-control"></textarea><br>
					 <h6>Add PDD Date</h6>
					<input type="date" class="form-control" name="pdd_date" id="pdd_date" class="form-control"></input><br>
					<input hidden type="text" id="not_availabale_document_id2">
					<input hidden type="text" id="not_availabale_document_name2">
					<button type="button" class="btn btn-outline-success" onclick="submit_pdd_data();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="submit_pdd_cancel_data();">Cancel</button>
				</div>   
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model2">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	
	<div class="modal fade" id="Mymodal_waiver">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
						<h4 class="modal-title">Details Needed For Waiver </h4> 
					<!--<button type="button" class="close" data-dismiss="modal">×</button> -->
				                                                            
				</div> 
				<div class="modal-body">
						<p>Upload File</p>
						<input type="file" id="waiver_file" name="waiver_file" class="form-control">
						<br>
						<p>Add Comments</p>
						<textarea class="form-control" id="comments_for_waiver" name="comments_for_waiver"></textarea>
					<button type="button" class="btn btn-outline-success" onclick="reject_loan_document_comment();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="submit_cancel_();">Cancel</button>
								
				</div>   
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model2">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	
	
	
	
	<div class="modal fade" id="Mymodal3">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Remarks</h4> 
				</div> 
				<div class="modal-body">
					<h6>Type Here,</h6>
					<textarea name="reject_loan_document_comment" id="reject_loan_document_comment" row="3" class="form-control"></textarea><br>
					<input hidden type="text" id="reject_loan_document_comment_id">
					<button type="button" class="btn btn-outline-success" onclick="reject_loan_document_comment();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="submit_cancel_status();">Cancel</button>
				</div>  
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model3">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	
	
	<!--==============================================================================================================-->
		
		<div class="modal fade" id="loan_application_form_model" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload Document</h4>
							</div>
							<div class="modal-body">
							 
								<p>Select Document Type</p>
								<select class="form-control"  id="select_document_name">
								    <option value="">--Select--</option> 
									<option value="Loan Application Form">Loan Application Form</option> 
   								    <option value="Signed Loan Agreement">Signed Loan Agreement</option>
									<option value="Signed Sanction Letter">Signed Sanction Letter</option> 
									<option value="Signed MITC Letter">Signed MITC Letter</option> 
									<option value="Bank signature verification">Bank signature verification</option> 
									<option value="Vernacular Declaration">Vernacular Declaration</option> 
									<option value="Dual name declatarion">Dual name declatarion</option> 
									<option value="End use letter">End use letter</option> 
									<option value="Pre EMI letter">Pre EMI letter</option> 
								</select>
								<br>
							     <p>Select File</p>
								<input type="file"name="selected_document" id="selected_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_all_type();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		
		<div class="modal fade" id="existing_documents_model" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4> Document </h4>
							</div>
							<div class="modal-body">
							    
								<p>Document Name :<lable id="lable_DOC_TYPE"></lable></p>
								<p>View Document: <lable id="view_doc"></lable></p>
								<input hidden type="text" value="" name="DOC_TYPE" id="DOC_TYPE">
								<input hidden type="text" value="" name="existing_doc_ID" id="existing_doc_ID">
								<br>
								Select Status :
								<select class="form-control" onChange="div_waiver();" id="existing_doc_status">
									<option value="">--Select--</option>
									<option value="Approve">Approve</option>
									<option value="Reject">Reject</option>
									<option value="Waiver" >Waiver</option>
								</select>
								<br>
								<div id="waiver_div_content" style="display:none;">
									<p>Select File</p>
									<input type="file"name="selected_waiver_document" id="selected_waiver_document">
								</div>
								<div id="div_comment" style="display:none;">
									<br>
									<p>Add Comments</p>
									<textarea class="form-control" id="comments" name="comments"></textarea>
								</div>
								<br>
								<button type="button" class="btn btn-primary" onclick="submit_existing_document_status();">Submit</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		
		
		
				<div class="modal fade" id="Reports_model" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4> Document </h4>
							</div>
							<div class="modal-body">
							    
								<p>Document Name : <lable id="lable_report_name"></lable></p>
								<p>View Document: <lable id="view_report"></lable></p>
								<input hidden type="text" value="" name="report_doc_type" id="report_doc_type">
								<input hidden type="text" value="" name="report_doc_id" id="report_doc_id">
								<br>
								Select Status :
								<select class="form-control" onChange="div_report();" id="report_doc_status">
									<option value="">--Select--</option>
									<option value="Approve">Approve</option>
									<option value="Reject">Reject</option>
									<!--<option value="Waiver" >Waiver</option>-->
								</select>
								<br>
							
								<div id="div_report_comment" style="display:none;">
									<br>
									<p>Add Comments</p>
									<textarea class="form-control" id="comments_for_report" name="comments_for_report"></textarea>
								</div>
								<br>
								<button type="button" class="btn btn-primary" onclick="submit_report_document_status();">Submit</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
	<!--==============================================================================================================  -->
	<footer class="c-footer">
		<div>Copyright © 2020 Finaleap.</div>
		<div class="mfs-auto">Powered by Finaleap</div>
	</footer>
</div>

<div class="modal fade" id="Mymodal4">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Remarks</h4> 
				</div> 
				<div class="modal-body">
					<h6>Type Here,</h6>
					<textarea name="Waiver_loan_document_comment" id="Waiver_loan_document_comment" row="3" class="form-control"></textarea><br>
					<input  type="file" id="Waiver_loan_document_file" name="Waiver_loan_document_file">
					<input  type="text" id="Waiver_loan_document_id">
					<input  type="text" id="Waiver_loan_document_name">
					<button type="button" class="btn btn-outline-success" onclick="submit_waiver_data();">Submit</button>
					<button type="button" class="btn btn-outline-success" onclick="cancel_Waiver();">Cancel</button>
				</div>  
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" disabled="true" id="close_model4">Close</button>                             
				</div>
			</div>                                                                       
		</div>                                          
	</div>
	<div class="modal fade" id="existing_documents_info" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4> Document Information</h4>
							</div>
							<div class="modal-body">
							 <table class="table">
							    <thead>
								 <th>PARAMETERS</th>
								 <th>INFO</th>
								</thead>
								<tbody>
									<tr>
										<td>DOCUMENT NAME</td>
										<td><lable id="info_doc_name"></lable></td>
									</tr>
									<tr>
										<td>STATUS</td>
										<td><lable id="info_doc_status"></lable></td>
									</tr>
									
									<tr>
										<td>COMMENTS</td>
										<td><lable id="info_doc_comments"></lable></td>
									</tr>
										
								</tbody>
							 </table>
									<lable id="info_waiver"></lable>
									
							
								
							  
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div> //
		
		
		<div class="modal fade" id="report_documents_info" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4> Document Information</h4>
							</div>
							<div class="modal-body">
							 <table class="table">
							    <thead>
								 <th>PARAMETERS</th>
								 <th>INFO</th>
								</thead>
								<tbody>
									<tr>
										<td>DOCUMENT NAME</td>
										<td><lable id="info_report_doc_name"></lable></td>
									</tr>
									<tr>
										<td>STATUS</td>
										<td><lable id="info_report_doc_status"></lable></td>
									</tr>
									
									<tr>
										<td>COMMENTS</td>
										<td><lable id="info_report_doc_comments"></lable></td>
									</tr>
										
								</tbody>
							 </table>
						</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
<script>
//================================ added by priya 24-11-2022=====================================================
function send_queries()
{
	
	var customer_id =document.getElementById('applicant_unique_code').value;
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
	var remarks_queries = document.getElementById('approval_remarks').value;
	if(remarks_queries == '')
	{
				swal( "Warning!","Please add Remarks","warning");
		 		exit();
	}
	let formData = new FormData(); 
	formData.append("customer_id",customer_id);
	formData.append("dsa_id",login_user_unique_code);
	formData.append("remarks_queries",remarks_queries);
	
	$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_remarks_queries"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Details Sent!","Queries sent to credit ","success");
								 window.location.reload(true);
					
                     		}
                     	else
							if(obj.status == 'fail')
                     		{
                     			 swal( "Warning!","Somthing is wrong","warning");
								
					
                     		}
                     }
              });
		
}
function show_sanction_condition_info(id)
	{
		//alert("hii");
		var sanction_condition_for_info =document.getElementById('sanction_condition_for_info_'+id).value;
	    var customer_id =document.getElementById('applicant_unique_code').value;
		let formData = new FormData(); 
	    formData.append("customer_id",customer_id);
		formData.append("sanction_condition_for_info",sanction_condition_for_info);
		$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/show_info_for_sanction_condition"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
								 var form = document.createElement("div");
							 if(obj.Not_applicable  == 'yes')
								 {
								
										 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Condition Not Applicable</td></tr></tbody></table>';
									 
								
								 }
								 else
								 {
								 if(obj.OTC == 'yes')
								 {
									 if(obj.OTC_PDD_document != '')
									 {
										 if(obj.Documnt_name != '')
										{
											form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
										else
										{
											 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Document Not Found</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
									 }
									 else
									 {
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td>Document Not Found</td></tr></tbody></table>';
									 }
								 }
								 else  if(obj.PDD == 'yes')
								 {
									 if(obj.OTC_PDD_document != '')
									 {
										  if(obj.Documnt_name != '')
										{
									   form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
										else
										{
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Document Not Found</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
									 }
									 else
									 {
									   form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td>Document Not Found</td></tr></tbody></table>';
									 }
								 }
								  else
								 {
									 if(obj.Documnt_name != '')
									 {
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr></tbody></table>';
									 }
									 else
									 {
										 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Document Not Found</td></tr></tbody></table>';
									 
									 }
								 }
							}
								  swal({
									title:'',
									text: 'Details:'+obj.SanctionCondition,
									content: form,
									buttons: {
									  cancel: "OK",
									 
									}
								  }).then((value) => {
									//console.log(slider.value);
								  });
	  
                     		//	 swal( "Success!","Details Saved !!","success");
								//  $('#Mymodal18').modal('show');
				       		}
                     	else
							if(obj.status == 'fail')
                     		{
                     			 swal( "Warning!","Somthing is wrong","warning");
							}
                     }
              });
		
		
	}
//================================ added by priya ================================================================= Find_report

 function Find_report_info(ID)
{

    let formData = new FormData();  
      formData.append("ID", ID);
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/Find_report_INFO"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                		      	var obj =JSON.parse(response);
								var INFO_ARRAY_data=obj.INFO_ARRAY;
								//alert(INFO_ARRAY_data['ID']);
								$("#info_report_doc_name").html(INFO_ARRAY_data['Doc_name']);
								$("#info_report_doc_status").html(INFO_ARRAY_data['Disbursement_ststus']);
								$("#info_report_doc_comments").html(INFO_ARRAY_data['Disbursement_ststus_comments']);
								
                     		}
                     	
                     }
              }); 
	
}
  function Find_Info(ID)
{
    let formData = new FormData();  
      formData.append("ID", ID);
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/Find_INFO"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                		      	var obj =JSON.parse(response);
								var INFO_ARRAY_data=obj.INFO_ARRAY;
								//alert(INFO_ARRAY_data['ID']);
								$("#info_doc_name").html(INFO_ARRAY_data['DOC_TYPE']);
								$("#info_doc_status").html(INFO_ARRAY_data['Disbursement_ststus']);
								$("#info_doc_comments").html(INFO_ARRAY_data['Disbursement_ststus_comments']);
								if(INFO_ARRAY_data['Disbursement_ststus'] == "Waiver")
								{
								var waiver_info='<table class="table"><tbody><tr><td>WAIVER DOCUMENT</td><td><a style="margin-left:-221%;" href="<?php echo base_url();?>index.php/customer/view_waiver_file/'+INFO_ARRAY_data['ID']+'" target="_blank" title="Waiver Document"><i class="fa fa-file-pdf-o text-right" style="color:blue;" ></i></a></td></tr></tbody></table>';
								$("#info_waiver").html(waiver_info);
								}
								//$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              }); 
	
}
  
  function submit_waiver_data()
	{
		 var Waiver_loan_document_id = document.getElementById('Waiver_loan_document_id').value;
		 var Waiver_loan_document_name = document.getElementById('Waiver_loan_document_name').value;
		 var Waiver_loan_document_comment = document.getElementById('Waiver_loan_document_comment').value;
		 var Waiver_loan_document_file = document.getElementById('Waiver_loan_document_file').value;
		 var fileSelect = document.getElementById('Waiver_loan_document_file');
	var selected_document_ = fileSelect.files[0];
		 if(Waiver_loan_document_comment== '')
		 {
		 		swal( "Warning!","Please add Comment","warning");
		 		exit();
		 }
		 		 else if(Waiver_loan_document_file== '')
		 {
		 		swal( "Warning!","Please select document","warning");
		 		exit();
		 }
		 else
		 {

          var selected_document_type_id = Waiver_loan_document_id;
		  var selected_document_type_name = Waiver_loan_document_name;
		  var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		  var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		    if ($('#is_waiver_'+Waiver_loan_document_id+'').is(':checked')) 
					{
				        var is_waiver_ = "yes";
					}
					else
					{
						var is_waiver_ = "no";
					}
   
		  let formData = new FormData();  
          formData.append("not_availabale_document_id", not_availabale_document_id);
          formData.append("not_availabale_document_comments", not_availabale_document_comments);
          formData.append("selected_document_type_id", selected_document_type_id);
		  formData.append("selected_document_type_name", selected_document_type_name);
		  formData.append("login_user_unique_code", login_user_unique_code);
		  formData.append("applicant_unique_code", applicant_unique_code);
		  formData.append("is_waiver_",is_waiver_);
		  formData.append("Waiver_loan_document_comment", Waiver_loan_document_comment);
		  formData.append("file",selected_document_);

	
		  
	 	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_waiver_data"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{

                     		    
                      			swal( "Success!","Details saved Successfully","success");
								$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              });  
		 }

		

	}
  
  function is_waiver_action(value,name)
  {
	  // alert(value);
	   //exit();
	   $("#available_type_"+value).hide();
	   $("#not_applicable_"+value).hide();
	   $("#not_available_"+value).hide();
	    $("#is_pdd_"+value).hide();
	   $("#document_for_uploading_"+value).hide();
       $("#upload-button_"+value).hide();
       $("#approve-button_"+value).hide();
       $('#lable_not_applicable_'+value+'').html("Waiver Available");
	   $('#Waiver_loan_document_id').val(value);
	  $('#Waiver_loan_document_name').val(name);
	   
	    $('#Mymodal4').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal4').modal('show');

  }
  
function submit_existing_document_status()
{
	var existing_doc_ID= document.getElementById('existing_doc_ID').value;
	var DOC_TYPE = document.getElementById('DOC_TYPE').value;
	var existing_doc_status= document.getElementById('existing_doc_status').value;
	var customer_id =document.getElementById('applicant_unique_code').value;
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
	if(existing_doc_status == "Waiver")
	{
		
		var selected_waiver_document= document.getElementById('selected_waiver_document').value;
		var comments= document.getElementById('comments').value;
		if(selected_waiver_document == "")
		{
			swal( "Warning!","Please Select Document","warning");
		}
		else if(comments == "" )
		{
			swal( "Warning!","Please add comment ","warning");
		}
	}
	else if(existing_doc_status == "Reject")
	{
		var comments= document.getElementById('comments').value;
	    if(comments == "" )
		{
			swal( "Warning!","Please add comment ","warning");
		}
	}
	else
	{
		var comments="";
		var selected_document="";
	}
	
	var selected_document=  $('#selected_waiver_document').val();
    var fileSelect = document.getElementById('selected_waiver_document');
	var selected_document_ = fileSelect.files[0];
	let formData = new FormData(); 
	    formData.append("existing_doc_ID",existing_doc_ID);
		formData.append("existing_doc_status",existing_doc_status);
		formData.append("customer_id",customer_id);
		formData.append("login_user_unique_code",login_user_unique_code);
		formData.append("comments",comments);
		formData.append("file",selected_document_);
		
	$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_existing_doc_status"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								    $("#div_existing_"+existing_doc_ID).hide();
									//alert(existing_doc_status);
								    if(existing_doc_status == "Approve")
									{
										var lable_existing='<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+existing_doc_ID+'" target="_blank" title="Approved"><i class="fa fa-file-pdf-o text-right" style="color:blue;" ></i></a>&nbsp;&nbsp;<lable style="color:green;">'+DOC_TYPE+'</lable><br>';
									    $("#lable_existing_"+existing_doc_ID).html(lable_existing);
									}
									else if(existing_doc_status == "Reject")
									{
										var lable_existing='<i class="fa fa-edit text-right" style="color:gray;" ></i>&nbsp;&nbsp;<lable style="color:red;">'+DOC_TYPE+'</lable>&nbsp;&nbsp;<i class="fa fa-exclamation-circle" style="color:blue;" data-toggle="modal" data-target="#existing_documents_info" onclick="Find_Info('+existing_doc_ID+');"> <br> ';
									    $("#lable_existing_"+existing_doc_ID).html(lable_existing);
									
									}
									else if(existing_doc_status == "Waiver")
									{
										var lable_existing='<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+existing_doc_ID+'" target="_blank" title="Original"><i class="fa fa-file-pdf-o text-right" style="color:blue;" ></i></a>&nbsp;&nbsp;<lable style="color:orange;">'+DOC_TYPE+'</lable>&nbsp;&nbsp;<i class="fa fa-exclamation-circle" style="color:blue;" data-toggle="modal" data-target="#existing_documents_info" onclick="Find_Info('+existing_doc_ID+');"><br>';
									    $("#lable_existing_"+existing_doc_ID).html(lable_existing);
									}
									
									
								//$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              });  
	 
	
	
	
}
function submit_report_document_status()
{
	var report_doc_id= document.getElementById('report_doc_id').value;
	var report_doc_status= document.getElementById('report_doc_status').value;
	var report_doc_type= document.getElementById('report_doc_type').value;
	var customer_id =document.getElementById('applicant_unique_code').value;
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
	if(report_doc_status == "Reject")
	{
		var comments_for_report= document.getElementById('comments_for_report').value;
	    if(comments_for_report == "" )
		{
			swal( "Warning!","Please add comment ","warning");
		}
	}
	else
	{
		var comments_for_report= "";
	}
	
	
		let formData = new FormData(); 
	    formData.append("report_doc_id",report_doc_id);
		formData.append("report_doc_status",report_doc_status);
		formData.append("comments_for_report",comments_for_report);
		formData.append("customer_id",customer_id);
		formData.append("login_user_unique_code",login_user_unique_code);
		$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_report_doc_status"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								
								  $("#div_reports_"+report_doc_id).hide();
									//alert(existing_doc_status);
								    if(report_doc_status == "Approve")
									{
										var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+report_doc_id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+report_doc_type+'</lable>';
									    
										$("#lable_reports_"+report_doc_id).html(lable_reports);
									}
									else if(report_doc_status == "Reject")
									{
										var lable_reports='<i class="fa fa-edit text-right" style="color:gray;" ></i>&nbsp;&nbsp; <lable style="color:red;">'+report_doc_type+'</lable>&nbsp;&nbsp; <i class="fa fa-exclamation-circle" style="color:blue;" data-toggle="modal" data-target="#report_documents_info" onclick="Find_report_info('+report_doc_id+');"></i><br>';
									   
									   $("#lable_reports_"+report_doc_id).html(lable_reports);
									
									}
								
									
									
								//$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              });  
	
}
function div_waiver()
{
	var existing_doc_status =document.getElementById('existing_doc_status').value;
	
	if(existing_doc_status == "Approve")
	{
		$("#waiver_div_content").hide();
		$('#div_comment').hide();
	}
	else if(existing_doc_status == "Waiver")
	{
		$("#waiver_div_content").show();
		$('#div_comment').show();
	}
	else if(existing_doc_status == "Reject")
	{
		$('#div_comment').show();
		$("#waiver_div_content").hide();
	}
	
	
}
function div_report()
{
	var report_doc_status =document.getElementById('report_doc_status').value;
	if(report_doc_status == "Approve")
	{
		$('#div_report_comment').hide();
	}
	else if(report_doc_status == "Reject")
	{
		$('#div_report_comment').show();
	}
	
}
function assigne_values(ID)
{

	var existing_document_ID =document.getElementById('existing_document_ID_'+ID+'').value;
	var DOC_TYPE =document.getElementById('DOC_TYPE_'+ID+'').value;
	
	document.getElementById('DOC_TYPE').value=DOC_TYPE;
	document.getElementById('existing_doc_ID').value=existing_document_ID;
	$('#lable_DOC_TYPE').html(DOC_TYPE);
	var view_doc='<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+ID+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i></a>';
	$('#view_doc').html(view_doc);
}

function assigne_report_values(ID)
{
	
	var reports_document_ID =document.getElementById('reports_document_ID_'+ID+'').value;
	var report_name =document.getElementById('report_name_'+ID+'').value;
	//alert(report_name);
	
	document.getElementById('report_doc_type').value=report_name;
	document.getElementById('report_doc_id').value=reports_document_ID;
	$('#lable_report_name').html(report_name);
	var view_report='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+ID+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i></a>';
	$('#view_report').html(view_report);
}


function uplod_all_type()
{
	var select_document_name =document.getElementById('select_document_name').value;
	//alert(select_document_name);
	var customer_id =document.getElementById('applicant_unique_code').value;
	var loan_application_id =document.getElementById('loan_application_id').value;
	var selected_document=  $('#selected_document').val();
    var fileSelect = document.getElementById('selected_document');
	var selected_document_ = fileSelect.files[0];
    let formData = new FormData(); 
	    formData.append("loan_application_id",loan_application_id);
		formData.append("customer_id",customer_id);
		formData.append("select_repot_name",select_document_name);
		formData.append("file",selected_document_);

	 
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_Report_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Document Uploded Successfully","success");
								 var id= obj.docid;
														 
								if(select_document_name == "Loan Application Form")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_loan_application_form").html(lable_reports);
									$("#div_loan_application_form").hide();
								}	
									
								else if(select_document_name == "Signed Loan Agreement")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_loan_agreement").html(lable_reports);
									$("#div_loan_agreement").hide();
								}
								else if(select_document_name == "Signed Sanction Letter")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_loan_signed_sanction_letter").html(lable_reports);
									$("#div_loan_signed_sanction_letter").hide();
								}	
								else if(select_document_name == "Signed MITC Letter")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_signed_MITC_letter").html(lable_reports);
									$("#div_signed_MITC_letter").hide();
								}	
								else if(select_document_name == "Bank signature verification")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_signature_varification").html(lable_reports);
									$("#div_signature_varification").hide();
								}	
								else if(select_document_name == "Vernacular Declaration")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_vernacular_declaration").html(lable_reports);
									$("#div_vernacular_declaration").hide();
								}	
								else if(select_document_name == "Dual name declatarion")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_dual_name").html(lable_reports);
									$("#div_dual_name").hide();
								}	
								else if(select_document_name == "End use letter")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_end_use").html(lable_reports);
									$("#div_end_use").hide();
								}	
								else if(select_document_name == "Pre EMI letter")		
								{
									var lable_reports='<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/'+id+'" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp; <lable style="color:green">'+select_document_name+'</lable>';
									$("#lable_pre_emi").html(lable_reports);
									$("#div_pre_emi").hide();
								}									
								
								 // document.getElementById('loan_application_form_').style.display = 'block';
								  //window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 
	 
}
//=================================================================================================================
function submit_cancel_status()
{
	$('#close_model3').prop('disabled', false); 
}

function cancel_Waiver()
{
	$('#close_model4').prop('disabled', false); 
}
function reject_loan_document_comment()
{
	var reject_loan_document_comment=document.getElementById('reject_loan_document_comment').value;
	var reject_loan_document_comment_id=document.getElementById('reject_loan_document_comment_id').value;
	let formData = new FormData(); 
	 formData.append("reject_loan_document_comment",reject_loan_document_comment);
	 formData.append("reject_loan_document_comment_id",reject_loan_document_comment_id);
	 
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_comments_for_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								//show_comment_
								 $('#show_comment_'+reject_loan_document_comment_id+'').html(''+reject_loan_document_comment+'');
								  $('#Mymodal3').modal('hide'); 
                     		}
                     	
                     }
              });  
}

function Waiver_loan_document_status()
{
	var Waiver_loan_document_comment=document.getElementById('Waiver_loan_document_comment').value;
	var Waiver_loan_document_comment_id=document.getElementById('Waiver_loan_document_comment_id').value;
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	var Waiver_doc=  $('#Waiver_loan_document_file').val();
	var fileSelect = document.getElementById('Waiver_loan_document_file');
	var Waiver_doc_ = fileSelect.files[0];
	
	let formData = new FormData(); 
	formData.append("Waiver_loan_document_comment",Waiver_loan_document_comment);
	formData.append("Waiver_loan_document_comment_id",Waiver_loan_document_comment_id);
	formData.append("file",Waiver_doc_);
	formData.append("login_user_unique_code",login_user_unique_code);
    formData.append("applicant_unique_code",applicant_unique_code);
		
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_Waiver_comments_for_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								 $('#show_comment_'+Waiver_loan_document_comment_id+'').html(''+Waiver_loan_document_comment+'');
								  $('#Mymodal4').modal('hide');
								  
								  //window.location.reload(true);
								 document.getElementById('display_wiver_doc_'+Waiver_loan_document_comment_id+'').style.display = 'block';
                     		}
                     	
                     }
              });  
}

function function_disbursement_status(id)
{
	 var doc_id = id;
	 var status_for_document=document.getElementById('status_for_document_'+id+'').value;
     if(status_for_document == 'Reject')
	 {
		document.getElementById('reject_loan_document_comment_id').value = id;
		    $('#Mymodal3').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal3').modal('show');
	 }
	 else if(status_for_document == 'Waiver')
	 {
		document.getElementById('Waiver_loan_document_comment_id').value = id;
		    $('#Mymodal4').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal4').modal('show');
	 }
	 else
	 {
	 let formData = new FormData(); 
	 formData.append("doc_id",doc_id);
	 formData.append("status_for_document",status_for_document);
	 
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_status_for_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			swal( "Success!","Details saved Successfully","success");
								//$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              });  
	 }
			  
}

function Approve_disbursement_application()
{
	var login_user_unique_code = document.getElementById('login_user_unique_code').value;
    var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	let formData = new FormData(); 
	 formData.append("login_user_unique_code",login_user_unique_code);
     formData.append("applicant_unique_code",applicant_unique_code);

	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/Approve_disbursement_application"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
				    	var obj =JSON.parse(response);
					    var data2=obj.show_array;
						
							var login_user_unique_code = document.getElementById('login_user_unique_code').value;
							var applicant_unique_code = document.getElementById('applicant_unique_code').value;
							var approval_remarks = document.getElementById('approval_remarks').value;
							var disbursement_date = document.getElementById('disbursement_date').value;
							
							if(disbursement_date == '')
							{
								 swal( "Warning!","Please add disbursement date","warning");
							}
							
							else
							{
								let formData2 = new FormData(); 
								formData2.append("login_user_unique_code",login_user_unique_code);
								formData2.append("applicant_unique_code",applicant_unique_code);
								formData2.append("approval_remarks",approval_remarks);
								formData2.append("disbursement_date",disbursement_date);
								$.ajax({
										 type: "POST",
										 url:'<?php echo base_url("index.php/Disbursement_OPS/save_disbursement_approval"); ?>',
										 data:formData2,
										 processData: false,
										 contentType: false,
										 success: function(response) 
										 {
											var obj =JSON.parse(response);
											//var data2=obj.show_array;
											if(obj.status == 'inserted')
											{
												 swal( "Success!","Details Saved","success");
												 $('#final_approve_btn').html("Saved");
												 $('#cheque_details').show();
											}
											else if(obj.status == 'updated') 
											{
												 swal( "Success!","Details Saved Successfully ","success");
												 $('#final_approve_btn').html("Details Saved");
												  $('#cheque_details').show();
												// $('#cheque_details').prop('disabled', false);
											}
											
											
											
											
											
										 }
								});
							}
						 
	 							
		 				
						
						
                   	    
                     	
                     }
              }); 
}
</script>
<script>
function submit_pdd_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id2').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name2').value;
		 var pdd_date = document.getElementById('pdd_date').value;
		  var pdd_comments = document.getElementById('pdd_comments').value;
		 if(pdd_date== '')
		 {
		 		swal( "Warning!","Please add date","warning");
		 		exit();
		 }
		 	
		 else
		 {

          var selected_document_type_id = not_availabale_document_id;
		  var selected_document_type_name = not_availabale_document_name;
		  var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		  var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		    if ($('#is_pdd_'+not_availabale_document_id+'').is(':checked')) 
					{
				        var is_pdd_ = "yes";
					}
					else
					{
						var is_pdd_ = "no";
					}
   
		  let formData = new FormData();  
          formData.append("not_availabale_document_id", not_availabale_document_id);
          formData.append("not_availabale_document_comments", not_availabale_document_comments);
          formData.append("selected_document_type_id", selected_document_type_id);
		  formData.append("selected_document_type_name", selected_document_type_name);
		  formData.append("login_user_unique_code", login_user_unique_code);
		  formData.append("applicant_unique_code", applicant_unique_code);
		  formData.append("is_pdd_", is_pdd_);
		   formData.append("pdd_date", pdd_date);
		     formData.append("pdd_comments", pdd_comments);
		  
	 	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_pdd_date"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{

                     			      // $("#is_pdd_"+selected_document_type_id).hide();
									 // $(“#is_pdd_”). removeAttr(“disabled”);
									  // $('#is_pdd_').attr('readonly',true);
									    // ("#is_pdd_"+selected_document_type_id).attr('readonly',true);
                     		           $("#available_type_"+selected_document_type_id).hide();
                     		           $("#not_applicable_"+selected_document_type_id).hide();
                     		           $("#document_for_uploading_"+selected_document_type_id).hide();
                     		           $("#upload-button_"+selected_document_type_id).hide();
                     		           $("#approve-button_"+selected_document_type_id).hide();//'
                     		           //$('#lable_not_applicable_'+selected_document_type_id+'').html("Waiting For Revert");
                       		
                      			swal( "Success!","Details saved Successfully","success");
								$('#close_model2').prop('disabled', false);   
                     		}
                     	
                     }
              });  
		 }

		

	}
	
function submit_pdd_cancel_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id2').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name2').value;
		 //var not_availabale_document_comments = document.getElementById('not_availabale_document_comments').value;
		 var selected_document_type_id = not_availabale_document_id;
		// alert(selected_document_type_id);
		 var selected_document_type_name = not_availabale_document_name;
		 var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		 var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	     // $("#is_pdd_"+selected_document_type_id).show();
         $("#available_type_"+selected_document_type_id).show();
         $("#not_applicable_"+selected_document_type_id).show();
		 $("#is_pdd_"+selected_document_type_id).prop('checked', false); 
		 $("#document_for_uploading_"+selected_document_type_id).show();
         $("#upload-button_"+selected_document_type_id).show();
         $("#approve-button_"+selected_document_type_id).show();
		 $('#lable_not_applicable_'+not_availabale_document_id+'').html("");
		 swal( "Success!","PDD Process Cancelled","success");
         $('#close_model2').prop('disabled', false);    

		

	}
function submit_cancel_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name').value;
		 var not_availabale_document_comments = document.getElementById('not_availabale_document_comments').value;
		 var selected_document_type_id = not_availabale_document_id;
		 var selected_document_type_name = not_availabale_document_name;
		
		 var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		 var applicant_unique_code = document.getElementById('applicant_unique_code').value;
	     $("#is_pdd_"+selected_document_type_id).show();
         $("#available_type_"+selected_document_type_id).show();
         $("#not_applicable_"+selected_document_type_id).show();
		 $("#not_available_"+selected_document_type_id).prop('checked', false); // Unchecks it
		 $("#document_for_uploading_"+selected_document_type_id).show();
         $("#upload-button_"+selected_document_type_id).show();
         $("#approve-button_"+selected_document_type_id).show();
		 $('#lable_not_applicable_'+not_availabale_document_id+'').html("");
		 swal( "Success!","Process Cancelled","success");
         $('#close_model').prop('disabled', false);    

		

	}
	function DeleteFile(value,name)
	{
		
		 var Delete_Document_number = value;
		 var Delete_document_name = name;

		// alert()
		 let formData = new FormData(); 
     formData.append("Delete_Document_number",Delete_Document_number);
     formData.append("Delete_document_name",Delete_document_name);

		 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/delete_disbursement_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{

                     			         $("#is_pdd_"+Delete_Document_number).hide();
                     		           $("#available_type_"+Delete_Document_number).hide();
                     		           $("#not_available_"+Delete_Document_number).hide();
                     		           $("#not_applicable_"+Delete_Document_number).hide();
                     		           $("#document_for_uploading_"+Delete_Document_number).hide();// id="document_name_' + value.id + '"
                     		           $("#document_name_"+Delete_Document_number).hide();
                     		           $("#save-button_"+Delete_Document_number).hide();//'
                     		           $("#approve-button_"+Delete_Document_number).hide();//'
                     		           $("#delete-button_"+Delete_Document_number).hide();//'
									   $("#pdf_icon_"+Delete_Document_number).hide();
									     $("#delete_link_"+Delete_Document_number).hide();
                     		           $('#lable_not_applicable_'+Delete_Document_number+'').html("File Deleted"); //    
                       		
                      			swal( "Success!","Document Deleted Successfully","success");
                     		}
                     	
                     }
              }); 
	}
	function submit_not_available_data()
	{
	
		 var not_availabale_document_id = document.getElementById('not_availabale_document_id').value;
		 var not_availabale_document_name = document.getElementById('not_availabale_document_name').value;
		 var not_availabale_document_comments = document.getElementById('not_availabale_document_comments').value;
		 if(not_availabale_document_comments== '')
		 {
		 		swal( "Warning!","Please add comment","warning");
		 		//exit();
		 }
		 else
		 {

           var selected_document_type_id = not_availabale_document_id;
		  var selected_document_type_name = not_availabale_document_name;
		  var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		  var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		    if ($('#not_available_'+not_availabale_document_id+'').is(':checked')) 
					{
				     var not_available_ = "yes";
					}
					else
					{
						 var not_available_ = "no";
					}
   

		  let formData = new FormData();  
      formData.append("not_availabale_document_id", not_availabale_document_id);
      formData.append("not_availabale_document_comments", not_availabale_document_comments);
      formData.append("selected_document_type_id", selected_document_type_id);
		  formData.append("selected_document_type_name", selected_document_type_name);
		  formData.append("login_user_unique_code", login_user_unique_code);
		  formData.append("applicant_unique_code", applicant_unique_code);
		  formData.append("not_available_", not_available_);


		 	$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/save_not_available_document_data"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{

                     			         $("#is_pdd_"+selected_document_type_id).hide();
                     		           $("#available_type_"+selected_document_type_id).hide();
                     		           $("#not_applicable_"+selected_document_type_id).hide();
                     		           $("#document_for_uploading_"+selected_document_type_id).hide();
                     		           $("#upload-button_"+selected_document_type_id).hide();
                     		           $("#approve-button_"+selected_document_type_id).hide();//'
                     		           	$('#lable_not_applicable_'+selected_document_type_id+'').html("Waiting For Revert");
                       		
                      			swal( "Success!","Document Reverted Successfully","success");
								$('#close_model').prop('disabled', false);   
                     		}
                     	
                     }
              });  
		 }

		

	}
	function upload_doc(value,name)
	{
		  $('#selected_document_number').val(value);
		  $('#selected_document_name').val(name);
  }

  function function_not_available(value,name)
  {
	   $("#is_pdd_"+value).hide();
       $("#available_type_"+value).hide();
       //$("#not_available_"+value).hide();
	   $("#not_applicable_"+value).hide();
	   $("#save-button_"+value).hide();
       $("#document_for_uploading_"+value).hide();
       $("#upload-button_"+value).hide();
       $("#approve-button_"+value).hide();//'
       $('#lable_not_applicable_'+value+'').html("Not Available");

  	  $('#not_availabale_document_id').val(value);
	  $('#not_availabale_document_name').val(name);
      $('#selected_document_name_model_lable').html(name);
      document.getElementById('not_availabale_document_comments').value='';
	  		  $('#Mymodal').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal').modal('show');

  }
  function is_pdd_action(value,name)
  {
	  // alert(value);
       $("#available_type_"+value).hide();
	   $("#not_applicable_"+value).hide();
	   $("#not_available_"+value).hide();
	   $("#document_for_uploading_"+value).hide();
       $("#upload-button_"+value).hide();
       $("#approve-button_"+value).hide();//'
       $('#lable_not_applicable_'+value+'').html("Post Disbursement Document");
	   $('#not_availabale_document_id2').val(value);
	  $('#not_availabale_document_name2').val(name);
	    $('#selected_document_name_model_lable2').html(name);
	    $('#Mymodal2').modal({
				backdrop: 'static',
				keyboard: false

				});
		  $('#Mymodal2').modal('show');
  }
  
	  
 function uploadFile() {

   var selected_document_number = document.getElementById('selected_document_number').value;
    if(selected_document_number == '')
   		{
  			swal( "Warning!","Please select document for Uploading","warning");
            exit();        			
   		}
  
   var selected_document_name = document.getElementById('selected_document_name').value;
   var document_for_uploadingID= 'document_for_uploading_'+selected_document_number;
   var available_type_ = document.getElementById('available_type_'+selected_document_number+'').value;
 
  
   if(available_type_ == '')
   		{
  			swal( "Warning!","Please select document available type","warning");
              exit();        			
   		}
   else {
			swal("Please wait document is uploading");
			let formData = new FormData();  
			if(selected_document_number == 1) 
			{       
				formData.append("file",document_for_uploading_1.files[0]);
			}
			if(selected_document_number == 2) 
			{       
				formData.append("file",document_for_uploading_2.files[0]);
			}
			if(selected_document_number == 3) 
			{       
				formData.append("file",document_for_uploading_3.files[0]);
			}
			if(selected_document_number == 4) 
			{       
				formData.append("file",document_for_uploading_4.files[0]);
			}
			if(selected_document_number == 5) 
			{       
				formData.append("file",document_for_uploading_5.files[0]);
			}
			if(selected_document_number == 6) 
			{       
				formData.append("file",document_for_uploading_6.files[0]);
			}
			if(selected_document_number == 7) 
			{       
				formData.append("file",document_for_uploading_7.files[0]);
			}
			if(selected_document_number == 8) 
			{       
				formData.append("file",document_for_uploading_8.files[0]);
			}
			if(selected_document_number == 9) 
			{       
				formData.append("file",document_for_uploading_9.files[0]);
			}
			if(selected_document_number == 10) 
			{       
				formData.append("file",document_for_uploading_10.files[0]);
			}
			if(selected_document_number == 11) 
			{       
				formData.append("file",document_for_uploading_11.files[0]);
			}
			if(selected_document_number == 12) 
			{       
				formData.append("file",document_for_uploading_12.files[0]);
			}
			if(selected_document_number == 13) 
			{       
				formData.append("file",document_for_uploading_13.files[0]);
			}
			if(selected_document_number == 14) 
			{       
				formData.append("file",document_for_uploading_14.files[0]);
			}
			if(selected_document_number == 15) 
			{       
				formData.append("file",document_for_uploading_15.files[0]);
			}
			if(selected_document_number == 16) 
			{       
				formData.append("file",document_for_uploading_16.files[0]);
			}
			if(selected_document_number == 17) 
			{       
				formData.append("file",document_for_uploading_17.files[0]);
			}
			if(selected_document_number == 18) 
			{       
				formData.append("file",document_for_uploading_18.files[0]);
			}
			if(selected_document_number == 19) 
			{       
				formData.append("file",document_for_uploading_19.files[0]);
			}
			if(selected_document_number == 20) 
			{       
				formData.append("file",document_for_uploading_20.files[0]);
			}
			if(selected_document_number == 21) 
			{       
				formData.append("file",document_for_uploading_21.files[0]);
			}
			if(selected_document_number == 22) 
			{       
				formData.append("file",document_for_uploading_22.files[0]);
			}
			if(selected_document_number == 23) 
			{       
				formData.append("file",document_for_uploading_23.files[0]);
			}
			if(selected_document_number == 24) 
			{       
				formData.append("file",document_for_uploading_24.files[0]);
			}
			if(selected_document_number == 25) 
			{       
				formData.append("file",document_for_uploading_25.files[0]);
			}
			if(selected_document_number == 26) 
			{       
				formData.append("file",document_for_uploading_26.files[0]);
			}
			if(selected_document_number == 27) 
			{       
				formData.append("file",document_for_uploading_27.files[0]);
			}
			if(selected_document_number == 28) 
			{       
				formData.append("file",document_for_uploading_28.files[0]);
			}
			if(selected_document_number == 29) 
			{       
				formData.append("file",document_for_uploading_29.files[0]);
			}
			if(selected_document_number == 30) 
			{       
				formData.append("file",document_for_uploading_30.files[0]);
			}
			if(selected_document_number == 31) 
			{       
				formData.append("file",document_for_uploading_31.files[0]);
			}
			if(selected_document_number == 32) 
			{       
				formData.append("file",document_for_uploading_32.files[0]);
			}
			if(selected_document_number == 33) 
			{       
				formData.append("file",document_for_uploading_33.files[0]);
			}
			if(selected_document_number == 34) 
			{       
				formData.append("file",document_for_uploading_34.files[0]);
			}
			if(selected_document_number == 35) 
			{       
				formData.append("file",document_for_uploading_35.files[0]);
			}
			if(selected_document_number == 36) 
			{       
				formData.append("file",document_for_uploading_36.files[0]);
			}
			if(selected_document_number == 37) 
			{       
				formData.append("file",document_for_uploading_37.files[0]);
			}
			if(selected_document_number == 38) 
			{       
				formData.append("file",document_for_uploading_38.files[0]);
			}
			if(selected_document_number == 39) 
			{       
				formData.append("file",document_for_uploading_39.files[0]);
			}
			if(selected_document_number == 40) 
			{       
				formData.append("file",document_for_uploading_40.files[0]);
			}
			if(selected_document_number == 41) 
			{       
				formData.append("file",document_for_uploading_41.files[0]);
			}
			if(selected_document_number == 42) 
			{       
				formData.append("file",document_for_uploading_42.files[0]);
			}
			if(selected_document_number == 43) 
			{       
				formData.append("file",document_for_uploading_43.files[0]);
			}
			if(selected_document_number == 44) 
			{       
				formData.append("file",document_for_uploading_44.files[0]);
			}
			if(selected_document_number == 45) 
			{       
				formData.append("file",document_for_uploading_45.files[0]);
			}
			if(selected_document_number == 46) 
			{       
				formData.append("file",document_for_uploading_46.files[0]);
			}
			if(selected_document_number == 47) 
			{       
				formData.append("file",document_for_uploading_47.files[0]);
			}
			if(selected_document_number == 48) 
			{       
				formData.append("file",document_for_uploading_48.files[0]);
			}
			if(selected_document_number == 49) 
			{       
				formData.append("file",document_for_uploading_49.files[0]);
			}
			if(selected_document_number == 50) 
			{       
				formData.append("file",document_for_uploading_50.files[0]);
			}
			if(selected_document_number == 51) 
			{       
				formData.append("file",document_for_uploading_51.files[0]);
			}
			if(selected_document_number == 52) 
			{       
				formData.append("file",document_for_uploading_52.files[0]);
			}
			if(selected_document_number == 53) 
			{       
				formData.append("file",document_for_uploading_53.files[0]);
			}
			if(selected_document_number == 54) 
			{       
				formData.append("file",document_for_uploading_54.files[0]);
			}
			if(selected_document_number == 55) 
			{       
				formData.append("file",document_for_uploading_55.files[0]);
			}
			if(selected_document_number == 56) 
			{       
				formData.append("file",document_for_uploading_56.files[0]);
			}
			if(selected_document_number == 57) 
			{       
				formData.append("file",document_for_uploading_57.files[0]);
			}
			if(selected_document_number == 58) 
			{       
				formData.append("file",document_for_uploading_58.files[0]);
			}
			if(selected_document_number == 59) 
			{       
				formData.append("file",document_for_uploading_59.files[0]);
			}
			if(selected_document_number == 60) 
			{       
				formData.append("file",document_for_uploading_60.files[0]);
			}
			if(selected_document_number == 61) 
			{       
				formData.append("file",document_for_uploading_61.files[0]);
			}
			if(selected_document_number == 62) 
			{       
				formData.append("file",document_for_uploading_62.files[0]);
			}
			if(selected_document_number == 63) 
			{       
				formData.append("file",document_for_uploading_63.files[0]);
			}
			if(selected_document_number == 64) 
			{       
				formData.append("file",document_for_uploading_64.files[0]);
			}
			if(selected_document_number == 65) 
			{       
				formData.append("file",document_for_uploading_65.files[0]);
			}
			if(selected_document_number == 66) 
			{       
				formData.append("file",document_for_uploading_66.files[0]);
			}
			if(selected_document_number == 67) 
			{       
				formData.append("file",document_for_uploading_67.files[0]);
			}
			if(selected_document_number == 68) 
			{       
				formData.append("file",document_for_uploading_68.files[0]);
			}
			if(selected_document_number == 69) 
			{       
				formData.append("file",document_for_uploading_69.files[0]);
			}
			if(selected_document_number == 70) 
			{       
				formData.append("file",document_for_uploading_70.files[0]);
			}
			
        var selected_document_type_id = selected_document_number;
		var selected_document_type_name = selected_document_name;
		var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;

   if ($('#not_available_'+selected_document_number+'').is(':checked')) 
		{
	        var not_available_ = "yes";
		}
		else
		{
			var not_available_ = "no";
		}
   
    if ($('#is_pdd_'+selected_document_number+'').is(':checked')) 
		{
	     var is_pdd_ = "yes";
		}
		else
		{
			 var is_pdd_ = "no";
		}//not_applicable_

		 if ($('#not_applicable_'+selected_document_number+'').is(':checked')) 
		{
	     var not_applicable_ = "yes";
		}
		else
		{
			 var not_applicable_ = "no";
		}
    
		if(not_available_ == "yes" && not_applicable_ == "yes")
		{
			$('#not_available_'+selected_document_number+'').prop('checked', false);
    		$('#not_applicable_'+selected_document_number+'').prop('checked', false);
    		swal( "Warning!","Please select any one from Not applicable or Not Available","warning");
    			exit();

    }
		formData.append("available_type_", available_type_);
       formData.append("not_available_", not_available_);
	  formData.append("is_pdd_", is_pdd_);
	  formData.append("not_applicable_", not_applicable_);

		formData.append("selected_document_type_id", selected_document_type_id);
		formData.append("selected_document_type_name", selected_document_type_name);
		formData.append("login_user_unique_code", login_user_unique_code);
		formData.append("applicant_unique_code", applicant_unique_code);

    //alert(formData);
      $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/upload_one_by_one_documents"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       			$('#upload-button_'+selected_document_type_id+'').hide();
								$('#approve-button_'+selected_document_type_id+'').prop('disabled', false);
                       	 		$('#pdf_icon_'+selected_document_type_id+'').css({color:"red"	});
                      			swal( "Success!","Document Uploded Successfully","success");
                     		}
                     		else if(obj.status == 'blank')
                     		{
                     		
                      			swal( "Warning!","Please select document","warning");
                      			
                     		}
                     		else 
                     		{
                     		
                      			swal( "Warning!","Document Already Exists","warning");
                      			
                     		}
                     }
              }); 
   }			  
    
}
</script>
<script>
 function ApproveFile(value,name) 
 {
   var selected_document_number =value;
   var selected_document_name =name;
   let formData = new FormData();   
   var selected_document_type_id = selected_document_number;
   var selected_document_type_name = selected_document_name;
   var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;


		var available_type_ = document.getElementById('available_type_'+selected_document_number+'').value;
	
	
   if ($('#not_available_'+selected_document_number+'').is(':checked')) 
		{
	     var not_available_ = "yes";
		}
		else
		{
			 var not_available_ = "no";
		}
   
    if ($('#is_pdd_'+selected_document_number+'').is(':checked')) 
		{
	     var is_pdd_ = "yes";
		}
		else
		{
			 var is_pdd_ = "no";
		}

		 if ($('#not_applicable_'+selected_document_number+'').is(':checked')) 
		{
	       var not_applicable_ = "yes";
		}
		else
		{
			 var not_applicable_ = "no";
		}
		
		if(not_applicable_ == 'no' && is_pdd_ == 'no' && not_available_ == 'no')
		{
			swal( "Warning!","Please select document For uploading","warning");
		}
		
		formData.append("selected_document_type_id", selected_document_type_id);
		formData.append("selected_document_type_name", selected_document_type_name);
		formData.append("login_user_unique_code", login_user_unique_code);
		formData.append("applicant_unique_code", applicant_unique_code);
		formData.append("available_type_", available_type_);
        formData.append("not_available_", not_available_);
	    formData.append("is_pdd_", is_pdd_);
	    formData.append("not_applicable_", not_applicable_);

      $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/Approval_of_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       			$('#approve-button_'+selected_document_type_id+'').html("Approved");
                       	 	
                      			swal( "Success!","Document Approved","success");
                     		}
                     		else if(obj.status == 'blank')
                     		{
                     		
                      			swal( "Warning!","Please select document available type","warning");
                      			
                     		}
                     		else if(obj.status == 'saved')
                     		{
                     		 
                        			swal( "Success!","Details saved successfully","success");
                      			
                     		}
                     		else if(obj.status == 'not_applicable_saved')
                     		{
                     		   
                     		           $("#is_pdd_"+selected_document_type_id).hide();
                     		           $("#available_type_"+selected_document_type_id).hide();
                     		           $("#not_available_"+selected_document_type_id).hide();
                     		           $("#document_for_uploading_"+selected_document_type_id).hide();
                     		           $("#upload-button_"+selected_document_type_id).hide();
                     		           $("#approve-button_"+selected_document_type_id).hide();//'
                     		           	$('#lable_not_applicable_'+selected_document_type_id+'').html("Not Applicable");

                      			swal( "Success!","Details saved successfully","success");
                      			
                     		}
                     		else 
                     		{
                     		
                      			swal( "Warning!","Something went wrong","warning");
                      			
                     		}
                     }
              });   
    
}

	
</script>
<?php

 
 for($k=1;$k<=$total_types; $k++)
 {
	
	?> 
	<script type="text/javascript">
	
		
	function section<?php echo $k;?>()
	{
		
		 $("#pending_documents").hide();
		var common = <?php echo $k;?>;
	   var total_types = <?php echo $total_types;?>;
		var master_doc_id = document.getElementById('master_doc_id'+common+'').value;
		var master_doc_name = document.getElementById('master_doc_name'+common+'').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;
		$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_join_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						'applicant_unique_code':applicant_unique_code
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
					
						 var tr1 = '';
						 $.each(obj.subtypes, function(key, value){
							 //	alert(value.Approved_status);
				     	 	var not_available_,not_applicable_,condition3 = "" ;
						    var condition1,condition2,is_pdd_ = "" ;
							if(value.available_type_ == "original")
							{
						  	    condition1 = "selected";
							}
							else
							{
							    condition1 = "";
							}
		 				    if(value.available_type_ == "certifiedcopy")
						    {
							   condition2 = "selected";
							}
							else
							{
							   condition2 = "";
							}
							if(value.available_type_ == "photocopy")
							{
								condition3 = "selected";
							}
							else
							{
								condition3 = "";
							}
    	 					if(value.not_available_ == "yes")
		 					{
								 not_available_ = " checked=checked";
		 					}
	     					else
		 					{
							   not_available_ = "";
		 					}
							if(value.not_applicable_ == "yes")
					    	{
							   not_applicable_ = " checked=checked";
							}
							else
							{
						        not_applicable_ = "";
							}
							if(value.is_pdd_ == "yes")
							{
								is_pdd_ = " checked=checked";
							}
							else
							{
								is_pdd_ = "";
							}
							if(value.Approved_status == 'Approved')
					 		{
                       		   var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;
     							if(value.is_pdd_ == 'yes')
						 			{
						                			tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'" disabled="disabled"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled" ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+' disabled="disabled"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled"></td></td><td><lable>Post Disbursement Document</lable></td></tr>';
    							        $('#section'+common+'_data').html(tr1);
    						            $('#heading'+common+'').html(master_doc_name);
						 			}
					 			else
   					 			    {
			                       
			                          tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control" style="border:2px solid green" id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" disabled="disabled"  ></td><td><input type="checkbox"  disabled="disabled" id="not_applicable_'+value.id+'"  ></td><td><input disabled="disabled" type="checkbox" id="is_pdd_'+value.id+'"   ></td><td><input disabled="disabled" type="checkbox"  id="is_waiver_'+value.id+'"  onclick="is_waiver_action('+value.id+',\'' + value.subtype_document_name + '\');"></td></td><td><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); "> Approved </button><a  style="margin-left: 8px; color:red " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank" id="delete_link_'+value.id+'"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a><button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Delete File </button><lable id="lable_not_applicable_'+value.id+'"</lable></td></tr>';
    							      $('#section'+common+'_data').html(tr1);
    							      $('#heading'+common+'').html(master_doc_name);
					     			}
					 		}
							else if(value.Approved_status == 'Waiver')
					 		{
								 var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;
								 	if(value.is_waiver_ == 'yes')
						 			{
									  	tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'" disabled="disabled"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled" ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+' disabled="disabled"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled"></td><td><input type="checkbox" id="is_waiver_'+value.id+'" checked></td></td><td><lable>Waiver </lable><a  style="margin-left: 8px; color:red " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank" id="delete_link_'+value.id+'"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';
    							        $('#section'+common+'_data').html(tr1);
    						            $('#heading'+common+'').html(master_doc_name);
									}
									else
									{
									  tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control" style="border:2px solid green" id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" disabled="disabled"  ></td><td><input type="checkbox"  disabled="disabled" id="not_applicable_'+value.id+'"  ></td><td><input disabled="disabled" type="checkbox" id="is_pdd_'+value.id+'"   ></td><td><input disabled="disabled" type="checkbox"  id="is_waiver_'+value.id+'"  onclick="is_waiver_action('+value.id+',\'' + value.subtype_document_name + '\');"></td></td><td><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); "> Approved </button><a  style="margin-left: 8px; color:red " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank" id="delete_link_'+value.id+'"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a><button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Delete File </button><lable id="lable_not_applicable_'+value.id+'"</lable></td></tr>';
    							      $('#section'+common+'_data').html(tr1);
    							      $('#heading'+common+'').html(master_doc_name);
									}
     							 //alert(applicant_encoded_unique_code);
							}
							else if(value.not_applicable_ == 'yes')
							{
							    tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control" id="available_type_'+value.id+'" disabled="disabled" ><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled" ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+' checked="checked"  disabled="disabled" ></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled" ></td><td><input type="checkbox"  id="is_waiver_'+value.id+'"  onclick="is_waiver_action('+value.id+',\'' + value.subtype_document_name + '\');"></td></td><td><lable id="lable_not_applicable_'+value.id+'">Not Applicable</lable></td></tr>';
    					        $('#section'+common+'_data').html(tr1);
    					        $('#heading'+common+'').html(master_doc_name);
							}
						   else if(value.not_available_ == 'yes' && value.not_available_status == 'Reverted')
							{
							    tr1 += '<tr><td><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control" id="available_type_'+value.id+'" disabled="disabled" ><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled"  checked="checked"></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+'  disabled="disabled" ></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled" ></td></td><td><lable id="lable_not_applicable_'+value.id+'">Waiting for Revert</lable></td></tr>';
    					        $('#section'+common+'_data').html(tr1);
    						    $('#heading'+common+'').html(master_doc_name);
							}
							else
							{
								if(value.DOC_TYPE == '')
							 				{
							 					if(value.is_pdd_ == 'yes')
										 			{
										 				tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'" disabled="disabled"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' disabled="disabled" ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+' disabled="disabled"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+' disabled="disabled"></td></td><td><lable>Post Disbursement Document</lable></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);
										 			}
										 			else
										 			{
										 				tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" ></td><td><input type="checkbox"  disabled="disabled" id="not_applicable_'+value.id+'"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" ></td></td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary" title="Upload Document"> <i class="fa fa-upload" ></i><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " disabled="true"> Approve </button><lable id="lable_not_applicable_'+value.id+'"</lable></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);

										 			}
							 				}
							 				else
							 				{
							 					if(value.is_pdd_ == 'yes')
										 			{
										 				tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" '+not_available_+' ></td><td><input type="checkbox"  id="not_applicable_'+value.id+'" '+not_applicable_+'></td><td><input type="checkbox" id="is_pdd_'+value.id+'" '+is_pdd_+'></td><td><input type="checkbox"  id="is_waiver_'+value.id+'"  onclick="is_waiver_action('+value.id+',\'' + value.subtype_document_name + '\');"></td></td><td>										 					<table class="table table-bordered"><tr><td><button id="save-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " title="Save Details"> <i class="fa fa-save"></i> </button></td><td><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Approve </button></td><td><button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Delete File </button></td><td><lable id="lable_not_applicable_'+value.id+'"</lable></td>										 					</tr>	</table></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);
										 			}
										 			else
										 			{
										 	tr1 += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" '+condition1+'>Original</option><option value="photocopy" '+condition3+'>Photocopy</option><option value="certifiedcopy" '+condition2+'>Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" ></td><td><input type="checkbox"  disabled="disabled" id="not_applicable_'+value.id+'"></td><td><input type="checkbox" id="is_pdd_'+value.id+'" ></td><td><input type="checkbox"  id="is_waiver_'+value.id+'"  onclick="is_waiver_action('+value.id+',\'' + value.subtype_document_name + '\');"></td></td><td>										 					<table class="table table-bordered"><tr><td><button id="save-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " title="Save Details"> <i class="fa fa-save"></i> </button></td><td><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Approve </button></td><td><button id="delete-button_'+value.id+'"  class="btn btn-outline-primary" onclick="DeleteFile('+value.id+',\'' + value.subtype_document_name + '\'); " > Delete File </button></td><td><lable id="lable_not_applicable_'+value.id+'"</lable></td>										 					</tr>	</table></td></tr>';
    							            $('#section'+common+'_data').html(tr1);
    							            $('#heading'+common+'').html(master_doc_name);

										 			}
							 				}
  
							 		}
    					});


							  var tr = '';
							 $.each(obj.not_present_subtypes, function(key, value)
							 {
										 	 
							 	  tr += '<tr><td ><lable id="document_name_' + value.id + '">' + value.subtype_document_name + '</lable></td><td><select class="form-control"  id="available_type_'+value.id+'"><option value="">Select</option><option value="original" >Original</option><option value="photocopy">Photocopy</option><option value="certifiedcopy">Certified Copy</option></select></td><td><input type="checkbox" id="not_available_'+value.id+'" onclick="function_not_available('+value.id+',\'' + value.subtype_document_name + '\');" ></td><td><input type="checkbox" id="not_applicable_'+value.id+'" ></td><td><input type="checkbox"  id="is_pdd_'+value.id+'"  onclick="is_pdd_action('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><input type="checkbox"  id="is_waiver_'+value.id+'"  onclick="is_waiver_action('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><table class="table table-bordered"><tr><td><button id="save-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " title="Save Details" > <i class="fa fa-save"></i> </button></td><td> <input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td>	 <button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary" title="Upload Document"> <i class="fa fa-upload" ></i> </button><button id="approve-button_'+value.id+'"  class="btn btn-outline-primary" onclick="ApproveFile('+value.id+',\'' + value.subtype_document_name + '\'); " disabled="true"> Approve </button></td><td><lable id="lable_not_applicable_'+value.id+'"</lable></td></tr></table></td></tr>';
    							  $('#section'+common+'_data'+common+'').html(tr);
    							    $('#heading'+common+'').html(master_doc_name);
             

            					});
							 
											
				        }
                });
    
       
		document.getElementById('section'+common+'').style.display = 'block';
	
	      
		  
	  
	
		
		//document.getElementById('section2').style.display = 'none';
		//document.getElementById('section3').style.display = 'none';
		//document.getElementById('section4').style.display = 'none';
		//document.getElementById('section5').style.display = 'none';
		//document.getElementById('section6').style.display = 'none';
		//document.getElementById('section7').style.display = 'none';
		//document.getElementById('section8').style.display = 'none';
		//document.getElementById('section9').style.display = 'none';
		//document.getElementById('section10').style.display = 'none';
		//document.getElementById('section11').style.display = 'none';
		//document.getElementById('section12').style.display = 'none';
		//document.getElementById('default').style.display = 'none';


         



	}
	function section_loan_documents()
	{
		document.getElementById('section_loan_documents_').style.display = 'block';
	}
	function loan_application_form()
	{
		document.getElementById('loan_application_form_').style.display = 'block';
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
		document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function KYC()
	{
		document.getElementById('KYC_').style.display = 'block';
		document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('Bureau_').style.display = 'none'
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
		document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function Bureau()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('Bureau_').style.display = 'block';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
		document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function Reports()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'block';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
			document.getElementById('Income_analysys_').style.display = 'none';
			document.getElementById('sanction_').style.display = 'none';
			 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
			 document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function PD()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('PD_').style.display = 'block';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
			document.getElementById('Income_analysys_').style.display = 'none';
			document.getElementById('loan_application_form_').style.display = 'none';
			document.getElementById('sanction_').style.display = 'none';
			 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
			 document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function CAM()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'block';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
			document.getElementById('Income_analysys_').style.display = 'none';
			document.getElementById('loan_application_form_').style.display = 'none';
			document.getElementById('sanction_').style.display = 'none';
			 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
			 document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function Income()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Income_').style.display = 'block';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
			document.getElementById('Income_analysys_').style.display = 'none';
			document.getElementById('loan_application_form_').style.display = 'none';
			document.getElementById('sanction_').style.display = 'none';
			 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
			 document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function Income_analysys()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'block';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
		 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		 document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function Bank_pass()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'block';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
		 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		 document.getElementById('sanction_conditions_').style.display = 'none';
	}//
	function Property_doc()
	{
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'block';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
		 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		 document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function sanction()
	{//sanction_
	document.getElementById('sanction_').style.display = 'block';
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		 document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		 document.getElementById('sanction_conditions_').style.display = 'none';
	}
	function Sanction_Conditions()
	{
		document.getElementById('sanction_conditions_').style.display = 'block';
		document.getElementById('legal_conditions_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
	    document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		
	}
	function Post_sanctioned_documents()
	{//sanction_
	document.getElementById('sanction_').style.display = 'none';
	    document.getElementById('Post_sanctioned_documents_').style.display = 'block';
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		//document.getElementById('sanction_conditions_').style.display = 'block';
	}
	
	function system_generated_documents()
	{
		document.getElementById('system_generated_documents_').style.display = 'block';
	}
	//=========================== added by priya 03-01-2022===================================
	function Legal_Conditions()
	{
		document.getElementById('legal_conditions_').style.display = 'block';
		document.getElementById('sanction_conditions_').style.display = 'none';
		document.getElementById('sanction_').style.display = 'none';
	    document.getElementById('Post_sanctioned_documents_').style.display = 'none';
		document.getElementById('KYC_').style.display = 'none';
		document.getElementById('Property_doc_').style.display = 'none';
		document.getElementById('Bureau_').style.display = 'none';
		document.getElementById('Reports_').style.display = 'none';
		document.getElementById('PD_').style.display = 'none';
		document.getElementById('CAM_').style.display = 'none';
		document.getElementById('Income_').style.display = 'none';
		document.getElementById('Bank_pass_').style.display = 'none';
		document.getElementById('Income_analysys_').style.display = 'none';
		document.getElementById('loan_application_form_').style.display = 'none';
		
	}
	//======================= added by priya 03-01-2023==================
	function show_legal_condition_info(id)
	{
		//alert("hii");
		var legal_condition_for_info =document.getElementById('legal_condition_for_info_'+id).value;
	      var customer_id =document.getElementById('applicant_unique_code').value;
		let formData = new FormData(); 
	    formData.append("customer_id",customer_id);
		formData.append("legal_condition_for_info",legal_condition_for_info);
		$.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/show_info_for_legal_condition"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
								 var form = document.createElement("div");
									//form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document Name</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>OTC/ PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_sanction_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
								if(obj.Not_applicable  == 'yes')
								 {
								
										 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Condition Not Applicable</td></tr></tbody></table>';
									 
								
								 }
								 else
								 {
								 if(obj.OTC == 'yes')
								 {
									 if(obj.OTC_PDD_document != '')
									 {
										 if(obj.Documnt_name != '')
										{
											form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_leagl_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
										else
										{
											 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Document Not Found</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
									 }
									 else
									 {
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is OTC</td><td>'+obj.OTC+'</td></tr><tr><td>OTC Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td>Document Not Found</td></tr></tbody></table>';
									 }
								 }
								 else  if(obj.PDD == 'yes')
								 {
									 if(obj.OTC_PDD_document != '')
									 {
										  if(obj.Documnt_name != '')
										{
									   form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
										else
										{
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Document Not Found</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document_approval_email/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.OTC_PDD_document+'</td></tr></tbody></table>';
									
										}
									 }
									 else
									 {
									   form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr><tr><td>Is PDD</td><td>'+obj.PDD+'</td></tr><tr><td>PDD Date</td><td>'+obj.OTC_Date+'</td></tr><tr><td>Approval Email(OTC/PDD)</td><td>Document Not Found</td></tr></tbody></table>';
									 }
								 }
								  else
								 {
									 if(obj.Documnt_name != '')
									 {
										form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td><a href="<?php echo base_url();?>index.php/customer/view_legal_document/'+obj.ID+'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+obj.Documnt_name+'</td></tr></tbody></table>';
									 }
									 else
									 {
										 	form.innerHTML ='<table class="table table-bordered"><th>Paramenters</th><th>Info.</th><tbody><tr><td>Document</td><td>Document Not Found</td></tr></tbody></table>';
									 
									 }
								 }
							}
									  swal({
										title:'',
										text: 'Details:'+obj.LegalCondition,
										content: form,
										buttons: {
										  cancel: "OK",
										 
										}
									  }).then((value) => {
										//console.log(slider.value);
									  });
	  
                     		//	 swal( "Success!","Details Saved !!","success");
								//  $('#Mymodal18').modal('show');
				       		}
                     	else
							if(obj.status == 'fail')
                     		{
                     			 swal( "Warning!","Somthing is wrong","warning");
							}
                     }
              });
		
		
	}
	</script>
    <?php	
 }

?>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
