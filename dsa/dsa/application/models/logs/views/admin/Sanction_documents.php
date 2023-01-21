<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
  $this->session->set_userdata("id1",$id1);
  $month = date('m');
  $day = date('d');
  $year = date('Y');
  $today = $year . '-' . $month . '-' . $day;
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

//print_r($sanction_conditions);
//print_r($sanction_conditions_done);
$sanction_conditions_pending = array_diff($sanction_conditions,$sanction_conditions_done);
//exit();
  $this->session->set_userdata("CM_ID",$CM_ID);
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
            $edit ='<a href="'.base_url().'index.php/customer/profile_view_p_o?ID='. $Applicant_row->UNIQUE_CODE.'"  target="_blank"><i class="fa fa-eye text-right" style="color:blue;" ></i></a>';
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
	       if( $Applicant_row->cam_status=='Cam details complete')
		   {
			 $Cam_pdf ='<a  href="'.base_url().'index.php/Operations_user/genrate_pdf?ID='.$Applicant_row->UNIQUE_CODE.'" target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>';
		   }
   		   else
		   {
			 $Cam_pdf='<a><i class="fa fa-file-text-o" aria-hidden="true" style="color:gray;"></i></a>';
		   }
		?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>adminn/PD_CSS/css/montserrat-font.css">
        <link rel="stylesheet" href="<?php echo base_url()?>adminn/PD_CSS/css/style.css"/>
		<link href="sweetalert.css" type="text/css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
	</head>
	<body >
		<div class="" style="" id="border_style">
			<div class="row  shadow bg-white rounded margin-10 padding-15" id="border_style">
				<div class="wizard-form" >
					<div class="wizard-header"style="padding:20px;">
					</div>
					<form id="credit_saction_form" action="<?= base_url('index.php/credit_manager_user/upload_sanction_documents')?>" method="post" enctype="multipart/form-data" >
		        	  	<input hidden type="text" name="customer_id" id="customer_id"  value="<?php echo $row->UNIQUE_CODE;?>">
					 	<input hidden type="text" name="dsa_id" id="dsa_id"  value="<?php if(!empty($login_ID)) { echo $login_ID;}?>">
						<input type="text" hidden value="<?php echo  $data_row_applied_loan->Application_id ; ?>" id="loan_application_id">
						<input type="text" hidden value="<?php echo  $data_row_applied_loan->CUST_ID ; ?>" id="customer_id">
						<div id="form-total" style="padding:40px;" >
		        		<!-- SECTION 1 ---------------------------------------------------------------------------------------------------------------- -->
							<b>
								<div class="col-sm-12" style="padding-left:0px; margin-left:-1%;">
								<div class="col-sm-3"><lable style="font-size:13px;">Name : <?php echo $row->FN.' '.$row->LN; ?></lable></div>
								<div class="col-sm-3"><lable style="font-size:13px;">Loan Amount :  <?php if(!empty($Sanction_letter_details)) if(isset($Sanction_letter_details->total_loan_amount)) echo $Sanction_letter_details->total_loan_amount; ?></lable></div>
								<div class="col-sm-2"><lable style="font-size:13px;">Tenure :  <?php if(!empty($Sanction_letter_details)) if(isset($Sanction_letter_details->tenure)) echo $Sanction_letter_details->tenure; ?></lable></div>
								<div class="col-sm-2"><lable style="font-size:13px;">ROI :  <?php if(!empty($Sanction_letter_details)) if(isset($Sanction_letter_details->rate_of_interest)) echo $Sanction_letter_details->rate_of_interest; ?></lable></div>
								
							<br><hr>
							</div></b>
							<br><br>
							<section id="section1">
								<div class="col-sm-12">
									<table class="table table-bordered" style="margin-left:-15px;">
										<thead>
											<td>DOCUMENT TYPE</td>
											<td><?php echo strtoupper($row->FN.' '.$row->LN); ?></td>
											 <?php $i=1; 
													 Foreach($Coapplicant_Doacuments AS $Coapplicant_docs)
														 { 
											 ?>
											<td><?php echo strtoupper($Coapplicant_docs['FN'].' '.$Coapplicant_docs['LN']);?></td>
											<?php 
											 }?>
										<thead> 
										<tbody>
										<tr>
											<td>
											<!--<?php 
												if(!empty($Sanction_letter_details))
												{
													if($Sanction_letter_details->Status == "Approved" )
														{
														}
													else
														{
											?>
											<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal4" ></span>&nbsp;&nbsp; 
											<?php
														}
												}
												else
												{
											?>
									    	<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal4" ></span>	&nbsp;&nbsp; 
											<?php
												}
											?>-->
											<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal4" ></span>&nbsp;&nbsp;
											KYC</td>
											<td> 
											<?php
												foreach($get_documents  as $value)
												{
										  		  if(!empty($value->DOC_MASTER_TYPE))	
													{		
														if($value->DOC_MASTER_TYPE == "KYC")	
														{																			
											?>
											<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE); ?> <lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;} ?></lable><br>
											<?php 
											    		}
														if($value->DOC_MASTER_TYPE == "RESIDENCE PROOF")	
														{
											?><a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php  echo ucwords($value->DOC_TYPE);?><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;}?><br>
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
											<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?><br>
											<?php
															}
															else
															{
																if($document->DOC_MASTER_TYPE == "KYC")	
																{
											?>
											<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE); ?> <lable style="font-size:11px;" ><?php if(!empty($document->Doc_uploded_type)) {echo "( ".$document->Doc_uploded_type." )" ;}?></lable><br>
											<?php
																}
																if($document->DOC_MASTER_TYPE == "RESIDENCE PROOF")	
																{
											?>
																					
																					   <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE); ?><lable style="font-size:11px;" ><?php if(!empty($document->Doc_uploded_type)) { echo "( ".$document->Doc_uploded_type." )"  ;} ?></lable><br>
																					   															
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
																		   
														   </td>
														   </tr>
														   
														   <tr>
														   <td>
														 
														   <span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal2" ></span>&nbsp;&nbsp;BUREAU REPORTS</td>
														   <td> 
																<a  href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Applicant_row->UNIQUE_CODE;?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;EQUIFAX<br>
																
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
															<a href="<?php echo base_url()?>index.php/dsa/pdf?ID=<?php echo $Coapplicant_docs['UNIQUE_CODE'];?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;EQUIFAX<br>
															<?php 
															
																          if(!empty($coapplicant_CRIF))
																		   {
																			   //if(!empty($coapplicant_CRIF[0]))
																						//{
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
																			
																			       <!-- <a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;CRIF 
																			
																				-->
																			   <?php
																								}
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
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;CRIF <span style="color:red;font-size:5px;">(pending)</span>
																			
																				
																			   <?php
																		   }
															?>
															<?php 
															}?>
														   </tr>
														   
														   <tr>
																<td>
																
																
																<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal" ></span>&nbsp;&nbsp;REPORTS</td>
																<td>
																		<?php
																		   if(!empty($find_my_legal_documents))
																		   {
																				foreach($find_my_legal_documents as $d)
																					{
																			   ?>
																				
																				
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>
																				
																			   <?php
																					}
																		   }
																		   else
																		   {
																				?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;&nbsp;Legal document <span style="color:red;font-size:9px;">(pending)</span>
																			
																				
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
																		      
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>
																			
																		   <?php
																				}
																	   }
																	   else
																	   {
																			?>
																		
																				
																				<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Technical document <span style="color:red;font-size:9px;">(pending)</span>
																			
																				
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
																			
																		
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>
																			
																		   <?php
																				}
																	   }
																	   else
																	   {
																			?>
																				
																	<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>	&nbsp;&nbsp;RCU document <span style="color:red;font-size:9px;">(pending)</span>
																			
																			
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
																			
																		<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>	&nbsp;&nbsp;<?php echo ucwords($d->Doc_name); ?>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			 
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;FI document<span style="color:red;font-size:9px;">(pending)</span>
																			
																		
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
																			
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords("Court case /Background Verification documents"); ?>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Court case /Background Verification documents <span style="color:red;font-size:9px;">(pending)</span>
																			
																		
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
																			
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords("Legal Document Search"); ?>
																			<?php
																				}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Legal Document Search <span style="color:red;font-size:9px;">(pending)</span>
																			
																		
																		   <?php
																	   }
																	?>
																
																
																
																</td>
															
														   </tr>
														
														
														   <tr>
																<td>PD</td>
																<td><?php echo $PD;?> &nbsp;&nbsp;PD Report</td>
																
														   </tr>
														   <tr>
																<td>
															
																<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal3" >&nbsp;&nbsp;CAM</td>
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
																				<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;CAM Excel <span style="color:red;font-size:9px;">(pending)</span>
																			<?php
																		
																			}
                                 
																		?>	
																			   
																		
																			
																
																
																</td>
														   </tr>
														     <tr>
																<td>
																<!--<?php 
																	if(!empty($Sanction_letter_details))
																	{
																		if($Sanction_letter_details->Status == "Approved" )
																		{
																		}
																		else
																		{
																			?>
																			<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal6" >&nbsp;<?php
																		}
																		
																	}
																	else
																		{
																			?>
																			<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal6" >&nbsp;<?php
																		}
																?>-->
																<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal6" >&nbsp;INCOME DOCUMENTS</td>
																<td> 
																	<?php
																		foreach($get_documents  as $value)
																		{
																			if(!empty($value->DOC_MASTER_TYPE))	
																			{		
																				if($value->DOC_MASTER_TYPE == "INCOME PROOF")	
																				{																			
																	?>
																	<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;}?></lable> <br>
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
																					
																						<a  href="<?php echo base_url('/images/documents/'.$document->DOC_NAME); ?>" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a>&nbsp;&nbsp;<?php echo ucwords($document->DOC_TYPE); ?><br>
																						
																						<?php
																						}
																						else
																						{
																						
																							if($document->DOC_MASTER_TYPE == "INCOME PROOF")	
																							{
																						?>
																					 
																					   <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE);?><lable style="font-size:11px;" ><?php  if(!empty($document->Doc_uploded_type)) {echo "( ".$document->Doc_uploded_type." )" ;}?></lable><br>
																					   																
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
														    <tr>
																<td>
																
																<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal3" ></span>&nbsp;&nbsp;INCOME ANALYSIS BANK STATEMENT</td>
																<td><?php
																	   if(!empty($find_my_IncomeAnalysisbankstatement))
																	   {  $i=1;
																			foreach($find_my_IncomeAnalysisbankstatement as $d)
																				{
																		   ?>
																			
																			<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $d->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords("Income Analysis bank statement ").$i; ?><br>
																			<?php
																			$i++;	}
																	   }
																	   else
																	   {
																			?>
																			
																			<a> <i class="fa fa-file-pdf-o text-right"aria-hidden="true" style="color:gray; text-align:right !important "></i>	</a>&nbsp;&nbsp;Income Analysis bank statement <span style="color:red;font-size:9px;">(pending)</span><br>
																			
																		
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
																				
																				
																				<a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $v->id; ?>" target="_blank"> <i class="fa fa-file-pdf-o text-right" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>&nbsp;&nbsp;<?php echo ucwords($v->Doc_name)." ".$i; ?><br>
																				
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
														    
														    <tr>
																<td> BANK PASS BOOK/ STATEMENT</td>
																<td> 
																	<?php
																		foreach($get_documents  as $value)
																		{
																			if(!empty($value->DOC_MASTER_TYPE))	
																			{		
																				if($value->DOC_MASTER_TYPE == "BANK PASS BOOK/BANK STATEMENT")	
																				{																			
																	?>
																	<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;}?></lable> <br>
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
																					 
																					   <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $document->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp; <?php echo ucwords($document->DOC_TYPE); ?><lable style="font-size:11px;" ><?php if(!empty($document->Doc_uploded_type)) {echo "( ".$document->Doc_uploded_type." )" ;} ?></lable>
																					   																
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
														   
														    <tr>
																<td>
																<!--<?php 
																	if(!empty($Sanction_letter_details))
																	{
																		if($Sanction_letter_details->Status == "Approved" )
																		{
																		}
																		else
																		{
																			?>
																				<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal5" ></span><?php
																		}
																		
																	}
																	else
																		{
																			?>
																				<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal5" ></span><?php
																		}
																?>-->

															 <span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal5" ></span>&nbsp;&nbsp;PROPERTY DOCUMEENT</td>
																<td>
																<?php 
																	foreach($get_documents  as $value)
																	{
																		    if($value->DOC_MASTER_TYPE == 'Home Improvement Loans' || $value->DOC_MASTER_TYPE == 'House Construction On Self Own Plot' || $value->DOC_MASTER_TYPE == 'Balance Transfer' ||$value->DOC_MASTER_TYPE == 'Re-Finance' ||$value->DOC_MASTER_TYPE == 'LAP' || $value->DOC_MASTER_TYPE == 'Home Loans' ||$value->DOC_MASTER_TYPE == 'Home Improvement Loans')	
																			{		?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;} ?></lable> <br>
																<?php
																			}
																			if($value->DOC_MASTER_TYPE == 'Property Document' )
																			{
																				?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?><lable style="font-size:11px;" ><?php if(!empty($value->Doc_uploded_type)) {echo "( ".$value->Doc_uploded_type." )" ;} ?> </lable><br>
																<?php
																			}
																			
																																						
																	}
																?>
																</td>
														   </tr>
														   
														   <!-- <tr>
																<td>OTHER DOCUMENTS</td>
																<td>
																<?php 
																	foreach($get_documents  as $value)
																	{
																		    if($value->DOC_MASTER_TYPE != 'KYC' && $value->DOC_MASTER_TYPE != 'RESIDENCE PROOF' && $value->DOC_MASTER_TYPE != 'INCOME PROOF'  && $value->DOC_MASTER_TYPE != 'EMPLOYMENT PROOF' && $value->DOC_MASTER_TYPE != 'BANK PASS BOOK/BANK STATEMENT' && $value->DOC_MASTER_TYPE != 'Home Improvement Loans' && $value->DOC_MASTER_TYPE != 'House Construction On Self Own Plot' && $value->DOC_MASTER_TYPE != 'Balance Transfer' && $value->DOC_MASTER_TYPE != 'Re-Finance' && $value->DOC_MASTER_TYPE != 'LAP' && $value->DOC_MASTER_TYPE != 'Home Loans' && $value->DOC_MASTER_TYPE != 'Home Improvement Loans' && $value->DOC_MASTER_TYPE != 'Post Disbursement Documents' )	
																			{		?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?> <br>
																<?php
																			}
																			
																			
																																						
																	}
																?>
																</td>
														   </tr>
														   -->
														   <tr>
																<td> 
																<?php 
																if(!empty($Sanction_letter_details))
																{
																	if($Sanction_letter_details->Status == "Approved")
																	{
																		if(isset($userType))
																		{
																			if($userType == "credit_manager_user" || $userType == "ADMIN")
																			{
																				?>
																					<span class="glyphicon glyphicon-open" data-toggle="modal" data-target="#myModal5" ></span>&nbsp;&nbsp;<?php
																			}
																		}
																	}
																}
																?>PRE DISBURSEMENT DOCUMENTS</td>
																<td>
																<?php 
																	foreach($get_documents  as $value)
																	{
																		    if($value->DOC_MASTER_TYPE == 'Post Sanctioned Documents' )	
																			{		?>
																		<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<?php echo ucwords($value->DOC_TYPE);?> <br>
																<?php
																			}
																			
																			
																			
																																						
																	}
																?>
																</td>
														   </tr>
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
																	if(!empty($sanction_conditions_pending))
																	{
																		foreach($sanction_conditions_pending  as $Sp)
																		{
																			if(!empty($Sp))
																			{
																		?>
																				<i class="fa fa-info-circle" aria-hidden="true" style="color:gray;"></i>&nbsp;&nbsp;<?php echo ucwords($Sp);?> <br>
																				<input hidden type="text" id="check_pendings" value="False">
																	
																		<?php
																			}
																			else
																			{
																				?><input hidden type="text" id="check_pendings" value="True">
																				<?php
																			}
																					
																		}
																	}
																	else
																	{
																		?><input hidden type="text" id="check_pendings" value="True">
																		<?php
																	}
																?>
																</td>
														   </tr>
														</tbody>
													</table>
												</div>
													<?php 	
														$a=json_decode($getCustomerSanction_letter_details->disbursement_queries);	
														if($a != '')	
														{															
															if(isset($userType))
																{
																	if($userType == "credit_manager_user")
																		{
																				?>  <div class="col-sm-12">
																						<div class="col-sm-6"> 
																							
																								<h5>Remarks / Queries </h5>
																								<textarea id="approval_remarks" name="approval_remarks" class="form-control" type="text" ></textarea>
																								<hr>
																							</div>
																							<div class="col-sm-4"> 
																								
																								<h5>Revert to Disbursement OPS</h5><br>
																								<button type="button" class="btn btn-primary"  onclick="send_queries();">Send Queries</button><hr>
																							</div>
																						</div>
																					<?php
																			}
																		}
														}
																									
													?>
												
											   <div class="col-sm-12">
														
														    
															<?php
									
															
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
													<?php 
														if(!empty($Sanction_letter_details))
														{
															if($Sanction_letter_details->Status == "Approved")
															{
																if(isset($userType))
																{
																	if($userType == "credit_manager_user" || $userType == "ADMIN")
																	{
																		?>
																			<div class="col-sm-12">
																				<div class="form-group">
																					<label class="class_bold">I have uploded and checked all the documents and confirm that this case is ok to Proceed for Disbursement.</label>
																					<?php
																					if(!empty($Sanction_letter_details))
																					{
																						if(!empty($Sanction_letter_details->Credit_proceed_status))
																						{
																								if($Sanction_letter_details->Credit_proceed_status == "Confirmed" )
																								{
																									?>
																									<button type="button" class="btn btn-info">Sent for Disbursement</button>
																									<?php
																								}
																								else
																								{
																									?>
																									 <button type="button" class="btn btn-info" onclick="credit_proceed_status();">Confirm</button>
																									<?php
																								}
																							?>
																							<?php
																						}
																						else
																						{
																							?>
																								<button type="button" class="btn btn-info" onclick="credit_proceed_status();"><lable id="confirm_btn">Confirm</lable></button>
																				
																							<?php
																						}
																					}
																					
																					?>
																				</div>
																			</div>
																<?php
																	}
																}
															}
														}
													?>
												<br>
												<input hidden type="text"  id="LOGIN_CREDIT_MANAGER_ID" value="<?php echo $CM_ID;?>">
										</section>
						        	</div>
  							</form>
							
		            </div>
					
		          </div>
		
		 <!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload REPORTS</h4>
							</div>
							<div class="modal-body">
								<p>Select Document Type</p>
								<select class="form-control"  onChange="function_disbursement_status" id="select_repot_name">
								    <option value="">--Select--</option>
									<option value="Legal document">Legal document</option>
									<option value="Technical document">Technical document</option>
									<option value="FI document">FI document</option>
									<option value="RCU document">RCU document</option>
									<option value="Court case document">Court case document / Background Verification</option>
									<option value="Legal Document Search">Legal Document Search</option>
								</select>
								<br>
							     <p>Select File</p>
								<input type="file"name="report_document" id="report_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_Reports();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		
		
		 <!-- Modal -->
				<div class="modal fade" id="myModal2" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload CRIF</h4>
							</div>
							<div class="modal-body">
							    
								<p>Upload CRIF For :</p>
								<select class="form-control"  id="select_user_name">
								    <option value="">--Select--</option>
									<option value="<?php echo $row->UNIQUE_CODE; ?>"><?php echo $row->FN.' '.$row->LN; ?></option>
									<?php 
										foreach($coapplicants as $c)
										{
											?>
											<option value="<?php echo $c->UNIQUE_CODE; ?>"><?php echo $c->FN.' '.$c->LN; ?></option>
											<?php
										}
										
									?>
								
								</select>
								<br>
							     <p>Select File</p>
								<input type="file"name="CRIF_document" id="CRIF_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_CRIF();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		
		
		
		<div class="modal fade" id="myModal3" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload Document</h4>
							</div>
							<div class="modal-body">
							    <p>Upload Document For :</p>
								<select class="form-control"  id="select_bank_statement_user_name">
								    <option value="">--Select--</option>
									<option value="<?php echo $row->UNIQUE_CODE; ?>"><?php echo $row->FN.' '.$row->LN; ?></option>
									<?php 
										foreach($coapplicants as $c)
										{
											?>
											<option value="<?php echo $c->UNIQUE_CODE; ?>"><?php echo $c->FN.' '.$c->LN; ?></option>
											<?php
										}
										
									?>
								
								</select>
								<br>
								<p>Select Document Type</p>
								<select class="form-control"  id="select_document_name">
								    <option value="">--Select--</option> 
									<option value="Loan Application Form">Loan Application Form</option> 
   								    <option value="Income Analysis bank statement">Income Analysis bank statement 1</option>
									<option value="Income Analysis bank statement">Income Analysis bank statement 2</option>
									<option value="Income Analysis bank statement">Income Analysis bank statement 3</option>
									<option value="Income Analysis bank statement">Income Analysis bank statement 4</option>
									<option value="Income Analysis bank statement">Income Analysis bank statement 5</option>
									<option value="Income Analysis bank statement">Income Analysis bank statement 6</option>
									<option value="CAM Excel">CAM Excel</option> 
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
		
		  <div class="modal fade" id="myModal4" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload Document</h4>
							</div>
							<div class="modal-body">
							
							    <p>Upload KYC For :</p>
								<select class="form-control"  id="select_KYC_user_name">
								    <option value="">--Select--</option>
									<option value="<?php echo $row->UNIQUE_CODE; ?>"><?php echo $row->FN.' '.$row->LN; ?></option>
									<?php 
										foreach($coapplicants as $c)
										{
											?>
											<option value="<?php echo $c->UNIQUE_CODE; ?>"><?php echo $c->FN.' '.$c->LN; ?></option>
											<?php
										}
										
									?>
								
								</select>
								<br>
								<p>Select Document Type</p>
								<select class="form-control"  id="select_KYC_document_name">
								    <option value="">--Select--</option> 
   								    <option value="PAN CARD">PAN CARD</option> 
									<option value="AADHAR CARD">AADHAR CARD</option> 
									<option value="VOTER ID">VOTER ID</option> 
									<option value="PASSPORT">PASSPORT</option> 
									<option value="DRIVING LINCENCE">DRIVING LINCENCE</option> 
									<option value="ELECTRICITY BILL">ELECTRICITY BILL</option>
									<option value="MOBILE BILL">MOBILE BILL </option>
									<option value="TELEPHONE BILL">TELEPHONE BILL</option>
									<option value="RATION CARD">RATION CARD</option>
									<option value="MUNICIPAL  TAX RECIPT">MUNICIPAL  TAX RECIPT</option>
									<option value="LPG GAS REGISTRAION">LPG GAS REGISTRAION</option>
									<option value="RENT AGREEMENT">RENT AGREEMENT</option>
									<option value="AADHAR CARD">AADHAR CARD</option>
								</select>
								<br>
							     <p>Select File</p>
								<input type="file"name="selected_KYD_document" id="selected_KYC_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_KYC_type();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		<div class="modal fade" id="myModal5" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload Document</h4>
							</div>
							<div class="modal-body">
							
							    <p>Upload Property Document:</p>
								<select class="form-control"  id="select_property_doc_name">
								    <option value="">--Select--</option>
								
									<?php 
										foreach($Property_document_list as $c)
										{
											?>
											<option value="<?php echo $c->Doc_name; ?>"><?php echo $c->Doc_name; ?></option>
											<?php
										}
										
									?>
								
								</select>
							
								<br>
							     <p>Select File</p>
								<input type="file"name="selected_property_doc_document" id="selected_property_doc_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_property_doc_type();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		
  
  		<div class="modal fade" id="myModal6" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload Document</h4>
							</div>
							<div class="modal-body">
							<p>Upload Income Document For :</p>
								<select class="form-control"  id="select_income_user_name">
								    <option value="">--Select--</option>
									<option value="<?php echo $row->UNIQUE_CODE; ?>"><?php echo $row->FN.' '.$row->LN; ?></option>
									<?php 
										foreach($coapplicants as $c)
										{
											?>
											<option value="<?php echo $c->UNIQUE_CODE; ?>"><?php echo $c->FN.' '.$c->LN; ?></option>
											<?php
										}
										
									?>
								
								</select>
								<br>
							    <p>Upload Income Document:</p>
								<select class="form-control"  id="select_income_doc_name">
								    <option value="">--Select--</option>
									<option value="SALARY SLIP 4">SALARY SLIP 4</option>
									<option value="BALANCE SHEET">BALANCE SHEET</option>
									<option value="ITR 1">ITR 1</option>
									<option value="ITR 2">ITR 2</option>
									<option value="ITR 3">ITR 3</option>
									<option value="Sale Bill / Purchase Bill">Sale Bill /Purchase Bill</option>
									<option value="Rent Agreement">Rent Agreement</option>
									<option value="Rental Income">Rental Income</option>
									<option value="GST recipt">GST recipt</option>
									<option value="Contract Agreement">Contract Agreement</option>
							
								</select>
							
								<br>
							     <p>Select File</p>
								<input type="file"name="selected_income_doc_document" id="selected_income_doc_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_income_doc_type();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		<div class="modal fade" id="myModal7" role="dialog">
					<div class="modal-dialog modal-lg">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload Document</h4>
							</div>
							<div class="modal-body">
							
							    <p>Sanction Conditions </p>
								<select class="form-control"  id="select_sanction_condition_name">
								    <option value="">--Select--</option>
								<?php
																	   $a= $getCustomerSanction_recommendation_details->sanction_conditions;
																	   $employee_arr = explode(PHP_EOL, $a);
																	   $i=1;
																	   foreach ($employee_arr as $employee)
																		{
																			?>
																				<option value="<?php echo $employee ; ?>"><?php echo $employee ; ?></option>
																						
																		
																			<?php
																		$i++;
																		}
																?>
								
								</select>
							
								<br>
									<table class="table table-bordered">
							
										<th>Upload File</th>
										<th>OTC</th>
										<th>PDD</th>
										<th>NOt Applicable</th>
										<tbody>
											<tr>
											    <td><input type="file" id="select_sanction_condition_file"></td>
												<td><input type="checkbox" id="is_otc"></td>
												<td><input type="checkbox" id="is_pdd"></td>
												<td><input type="checkbox" id="not_applicable"></td>
											</tr>
										</tbody>
									</table>
							    <lable>OTC date</lable>
								<?php
								$Date =date('Y-m-d');
								$date = date('Y-m-d', strtotime($Date. ' + 15 days'));
								?>
								<input class="form-control" type="date" id="otc_date" name="otc_date" value="<?php echo $date ;?>">
								<br>
								<lable>Approval Email(OTC/PDD)</lable>
								<input type="file" class="form-control" id="OTC_PDD_document" name="OTC_PDD_document">
								<br>
								<button type="file" class="btn btn-primary" onclick="uplod_sanction_condition_documents();">Save</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		<!---------------- added by priya 29-10-2022--------------------------------------------------------------------------------- -->
						  <div class="modal fade" id="upload_document_model" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>Upload Post Sanction Documents</h4>
							</div>
							<div class="modal-body">
							 
								<p>Select Document Type</p>
								<select class="form-control"  id="select_post_document_name">
								    <option value="">--Select--</option> 
									<?php 
										foreach($disbursement_property_type_documents as $p)
										{
											?>
											<option value="<?php echo  $p->Main_Document_Type ;?>"><?php echo  $p->Main_Document_Type ;?></option> 
											<?php
										}
									?>
									
								</select>
								<br>
							     <p>Select File</p>
								<input type="file"name="selected_post_document" id="selected_post_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="upload_post_sanction_documents();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		<!------------------------------------------------------------------------------------------------------------------------------------ -->
		<!--------------------------------------------------------------- added by priya 16-11-2022------------------------------------------- -->
			<div class="modal fade" id="myModal18" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>INFO</h4>
							</div>
							<div class="modal-body">
								<p>Select Document Type</p>
								<select class="form-control"  onChange="function_disbursement_status" id="select_repot_name">
								    <option value="">--Select--</option>
									<option value="Legal document">Legal document</option>
									<option value="Technical document">Technical document</option>
									<option value="FI document">FI document</option>
									<option value="RCU document">RCU document</option>
									<option value="Court case document">Court case document / Background Verification</option>
									<option value="Legal Document Search">Legal Document Search</option>
								</select>
								<br>
							     <p>Select File</p>
								<input type="file"name="report_document" id="report_document">
								<br>
								<button type="button" class="btn btn-primary" onclick="uplod_Reports();">Upload</button>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
		</div>
		<!------------------------------------------------------------------------------------------------------------------------------------ -->
  
</div>
				  
	          </div>
			  
			  	

</body>
</html>

<script>
$(document).ready(function(){
	$('#myModal').click(function(){
  		$('#myModal').modal({
    		backdrop: 'static',
    		keyboard: false
		});
	});
});
</script>
<script type="text/javascript">
function send_queries()
{
	
	var customer_id =document.getElementById('customer_id').value;
	var login_user_unique_code = document.getElementById('dsa_id').value;
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
<!----------------------------------------- added by priya 16-11-2022 ---------------------------- -->
function show_sanction_condition_info(id)
	{
		//alert("hii");
		var sanction_condition_for_info =document.getElementById('sanction_condition_for_info_'+id).value;
	    var customer_id =document.getElementById('customer_id').value;
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
<!-----------------------------------------added by priya 11-11-2022----------------------------- -->
function uplod_sanction_condition_documents()
{
	//alert("hii");
	var customer_id =document.getElementById('customer_id').value;
	var dsa_id =document.getElementById('dsa_id').value;
	var otc_date =document.getElementById('otc_date').value;
	var OTC_PDD_document =document.getElementById('OTC_PDD_document').value;
	var select_sanction_condition_name =document.getElementById('select_sanction_condition_name').value;
	var otc_date =document.getElementById('otc_date').value;
		
    var select_sanction_condition_file=$('#select_sanction_condition_file').val();
	
	
	if(select_sanction_condition_name == '')
	{
		swal( "Warning!","Please select sanction condition","warning");
		exit();
	}
	if ($('#is_otc').is(':checked')) 
		{
		  var is_otc = "yes";
		  
		  
		}
	else
		{
		  var is_otc = "no";
		}
	if ($('#is_pdd').is(':checked')) 
		{
		  var is_pdd = "yes";
		}
	else
		{
		  var is_pdd = "no";
		}
		
	if ($('#not_applicable').is(':checked')) 
		{
		  var not_applicable = "yes";
		}
	else
		{
		  var not_applicable = "no";
		  	if(is_otc == "yes")
			{
					
					if(otc_date == '')
					{
						 swal( "Warning!","Please Enter Date","warning");
						 exit();
					}
					if(OTC_PDD_document == '')
					{
						swal( "Warning!","Please Upload Approval Email Copy","warning");
						exit();
					}
					
			}
			if(is_pdd == "yes")
			{
				if(otc_date == '')
					{
						 swal( "Warning!","Please Enter Date","warning");
						 exit();
					}
					if(OTC_PDD_document == '')
					{
						swal( "Warning!","Please Upload Approval Email Copy","warning");
						exit();
					}
			}
			
			if(select_sanction_condition_file == '')
			{
				if(OTC_PDD_document == '')
				{
					swal( "Warning!","Please Select Document","warning");
						exit();
				}
			}
		}



	var fileSelect1 = document.getElementById('select_sanction_condition_file');
	var select_sanction_condition_file = fileSelect1.files[0];
	
	var OTC_PDD_document=$('#OTC_PDD_document').val();
	var fileSelect2 = document.getElementById('OTC_PDD_document');
	var OTC_PDD_document = fileSelect2.files[0];
	
	 let formData = new FormData(); 
	 formData.append("customer_id",customer_id);
	 formData.append("dsa_id",dsa_id);
	 formData.append("select_sanction_condition_name",select_sanction_condition_name);
	 formData.append("is_otc",is_otc);
	 formData.append("is_pdd",is_pdd);
	 formData.append("not_applicable",not_applicable);
	 formData.append("otc_date",otc_date);
	 formData.append("file1",select_sanction_condition_file); 
	 formData.append("file2",OTC_PDD_document);
	 
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_sanction_conditions_details"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Details Saved !!","success");
									//$("#confirm_btn").html("Sent for Disbursement");					  
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
<!---------------------------------------- added by priya 29-10-2022----------------------------- -->
function credit_proceed_status()
{
	var check_pendings =document.getElementById('check_pendings').value;

    if(check_pendings == 'False')
	{
		 swal( "Warning!","Please check all the sanction conditions","warning");
		 exit();
	}
	 var customer_id =document.getElementById('customer_id').value;
	 var dsa_id =document.getElementById('dsa_id').value;
	 var status="Confirmed";
	 let formData = new FormData(); 
	 formData.append("customer_id",customer_id);
	  formData.append("dsa_id",dsa_id);
	 formData.append("status",status);
	 $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_credit_proceed_status"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Mail Sent!","Application sent for the disbursement.","success");
									$("#confirm_btn").html("Sent for Disbursement");					  
								 // window.location.reload(true);
					
                     		}
                     	else
							if(obj.status == 'fail')
                     		{
                     			 swal( "Warning!","Somthing is wrong","warning");
								
					
                     		}
                     }
              });
}
function upload_post_sanction_documents()
{

	 var select_post_document_name =document.getElementById('select_post_document_name').value;
	 var selected_post_document =document.getElementById('selected_post_document').value;
	 var customer_id =document.getElementById('customer_id').value;
	         if(select_post_document_name =='')
			 {
				  swal( "Warning!","Please select document name","warning");
					exit();				
			 }
			 if(selected_post_document =='')
			{
				  swal( "Warning!","Please select document","warning");
				  exit();				
			 }
	  var fileSelect = document.getElementById('selected_post_document');
	  var selected_post_document = fileSelect.files[0];
	  let formData = new FormData(); 
	  formData.append("select_post_document_name",select_post_document_name);
      formData.append("customer_id",customer_id);
	  formData.append("file",selected_post_document);
	  	 
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/post_disbursement_documents"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Document Uploded Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	
}
<!----------------------------------------------------------------------------------------------- -->
function uplod_income_doc_type()
{
	
	 	
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var select_income_doc_name =document.getElementById('select_income_doc_name').value;
	 var dsa_id =document.getElementById('dsa_id').value;
	 var select_income_user_name =document.getElementById('select_income_user_name').value;
	 var selected_income_doc_document=  $('#selected_income_doc_document').val();
	 var fileSelect = document.getElementById('selected_income_doc_document');
	 var selected_income_doc_document_ = fileSelect.files[0];
	
	 let formData = new FormData(); 
	 formData.append("loan_application_id",loan_application_id);
	 formData.append("select_income_user_name",select_income_user_name);
     formData.append("select_income_doc_name",select_income_doc_name);
	  formData.append("dsa_id",dsa_id);
	 formData.append("file",selected_income_doc_document_);

	 
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_income_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Document Uploded Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 
	 
}
function uplod_property_doc_type()
{
	
	 var dsa_id =document.getElementById('dsa_id').value;
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var select_property_doc_name =document.getElementById('select_property_doc_name').value;
	 var customer_id =document.getElementById('customer_id').value;
	 var selected_property_doc_document=  $('#selected_property_doc_document').val();
	 var fileSelect = document.getElementById('selected_property_doc_document');
	 var selected_property_doc_document_ = fileSelect.files[0];
	 var select_KYC_user_name =document.getElementById('select_KYC_user_name').value;

	 let formData = new FormData(); 
	 formData.append("loan_application_id",loan_application_id);
	 formData.append("customer_id",customer_id);
	 formData.append("dsa_id",dsa_id);
     formData.append("select_property_doc_name",select_property_doc_name);
	 formData.append("file",selected_property_doc_document_);

	 
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_Property_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Document Uploded Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 
	 
}
function uplod_KYC_type()
{
	
	 	
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var select_KYC_document_name =document.getElementById('select_KYC_document_name').value;
	 var customer_id =document.getElementById('customer_id').value;
	var dsa_id =document.getElementById('dsa_id').value;
	 var selected_document=  $('#selected_KYC_document').val();
	 var fileSelect = document.getElementById('selected_KYC_document');
	 var selected_document_ = fileSelect.files[0];
	  var select_KYC_user_name =document.getElementById('select_KYC_user_name').value;
	 // alert(select_KYC_user_name);
	 let formData = new FormData(); 
	 formData.append("loan_application_id",loan_application_id);
	 formData.append("select_KYC_user_name",select_KYC_user_name);
	 formData.append("customer_id",customer_id);
	 formData.append("dsa_id",dsa_id);
     formData.append("select_KYC_document_name",select_KYC_document_name);
	 formData.append("file",selected_document_);

	 
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_KYC_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Document Uploded Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 
	 
}
function uplod_all_type()
{
	var select_bank_statement_user_name =document.getElementById('select_bank_statement_user_name').value;
	 var select_document_name =document.getElementById('select_document_name').value;
	if(select_document_name == "Income Analysis bank statement" )
	{
			 var customer_id =document.getElementById('select_bank_statement_user_name').value;
			 if(customer_id=='')
			 {
				  swal( "Warning!","Please select name","warning");
					exit();				
			 }
	}
	else
	{
			 var customer_id =document.getElementById('customer_id').value;
	}		
	
	
	 var loan_application_id =document.getElementById('loan_application_id').value;
	// var select_document_name =document.getElementById('select_document_name').value;
	// var customer_id =document.getElementById('customer_id').value;
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
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 
	 
}
 function uplod_CRIF()
 {
	
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var select_user_name =document.getElementById('select_user_name').value;
	 var CRIF_document=  $('#CRIF_document').val();
	 var fileSelect = document.getElementById('CRIF_document');
	 var CRIF_document_ = fileSelect.files[0];
	 var customer_id =document.getElementById('customer_id').value;
    
	 let formData = new FormData(); 
	 formData.append("loan_application_id",loan_application_id);
	 formData.append("customer_id",customer_id);
     formData.append("select_user_name",select_user_name);
	 formData.append("file",CRIF_document_);
	 formData.append("select_repot_name","CRIF");
	 
	  
	 if(select_user_name == '')
	 {
		 swal("Warning!", "Please Select User Name", "warning");
	 }
	 else if(CRIF_document == '')
	 {
		 swal("Warning!", "Please Select Document", "warning");
	 }
	 else
	 {
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
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 }

	
 }
 function uplod_Reports()
 {
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var customer_id =document.getElementById('customer_id').value;
     var select_repot_name =document.getElementById('select_repot_name').value;
	 var report_document=  $('#report_document').val();
	 var fileSelect = document.getElementById('report_document');
	 var report_document_ = fileSelect.files[0];
	 
	 let formData = new FormData(); 
	 formData.append("loan_application_id",loan_application_id);
     formData.append("customer_id",customer_id);
	 formData.append("file",report_document_);
	 formData.append("select_repot_name",select_repot_name);
	 
	 if(select_repot_name == '')
	 {
		 swal("Warning!", "Please Select Document Name", "warning");
	 }
	 else if(report_document == '')
	 {
		 swal("Warning!", "Please Select Document", "warning");
	 }
	 else
	 {
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
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });
	 }
	
 }
 
function uplod_legal_doc()
{
	  var upload_legal_document =document.getElementById('upload_legal_document').value;
	  var loan_application_id =document.getElementById('loan_application_id').value;
	  var customer_id =document.getElementById('customer_id').value;
	  if(upload_legal_document == '')
	  {
		     swal("Warning!", "Please Select Legal Document", "warning");
									
	  }
	  else
	  {
		 
	      var fileSelect = document.getElementById('upload_legal_document');
	      var legal_doc_ = fileSelect.files[0];
		  
		  let formData = new FormData(); 
		  formData.append("loan_application_id",loan_application_id);
		  formData.append("customer_id",customer_id);
		  formData.append("file",legal_doc_);
		  
		   $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_legal_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Details saved Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });  
	 
	  }
	  
	  
}
function uplod_technical_doc()
{
	 var upload_technical_document =document.getElementById('upload_technical_document').value;
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var customer_id =document.getElementById('customer_id').value;
	 if(upload_technical_document == '')
	  {
		     swal("Warning!", "Please Select Technical Document", "warning");
									
	  }
	  else
	  {
		 
	      var fileSelect = document.getElementById('upload_technical_document');
	      var technical_doc_ = fileSelect.files[0];
		  
		  let formData = new FormData(); 
		  formData.append("loan_application_id",loan_application_id);
		  formData.append("customer_id",customer_id);
		  formData.append("file",technical_doc_);
		  
		   $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_technical_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Details saved Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });  
	 
	  }
	
}
function uplod_FI_doc()
{
	 var upload_FI_document =document.getElementById('upload_FI_document').value;
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var customer_id =document.getElementById('customer_id').value;
	 if(upload_FI_document == '')
	  {
		     swal("Warning!", "Please Select FI Document", "warning");
									
	  }
	  else
	  {
		 
	      var fileSelect = document.getElementById('upload_FI_document');
	      var FI_doc_ = fileSelect.files[0];
		  
		  let formData = new FormData(); 
		  formData.append("loan_application_id",loan_application_id);
		  formData.append("customer_id",customer_id);
		  formData.append("file",FI_doc_);
		  
		   $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_FI_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Details saved Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });  
	 
	  }
	  
	
}
function uplod_RCU_doc()
{
	 var upload_RCU_document =document.getElementById('upload_RCU_document').value;
	 var loan_application_id =document.getElementById('loan_application_id').value;
	 var customer_id =document.getElementById('customer_id').value;
	 if(upload_RCU_document == '')
	  {
		     swal("Warning!", "Please Select RCU Document", "warning");
									
	  }
	  else
	  {
		 
	      var fileSelect = document.getElementById('upload_RCU_document');
	      var RCU_doc_ = fileSelect.files[0];
		  
		  let formData = new FormData(); 
		  formData.append("loan_application_id",loan_application_id);
		  formData.append("customer_id",customer_id);
		  formData.append("file",RCU_doc_);
		  
		   $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Credit_manager_user/save_RCU_document"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                     			 swal( "Success!","Details saved Successfully","success");
														  
								  window.location.reload(true);
					
                     		}
                     	
                     }
              });  
	 
	  }
	  
}

</script>
	 
	
						 
	<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
		<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
							<!--[if IE]><!--><!--<![endif]-->
							<script src="<?php echo base_url()?>js/jquery.min.js"></script> 
							
						
							<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
	