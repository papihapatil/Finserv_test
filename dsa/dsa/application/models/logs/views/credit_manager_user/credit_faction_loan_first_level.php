<!DOCTYPE html>
<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
 $id = $_GET['ID']; // shows id of customer
 // $id = $this->session->userdata("id");
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);
//echo $id1;
 //echo $id;
 //exit();
?>

<html lang="en">
<head>
<!--<base href="./">-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="Finaleap">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Finaleap">
<title>Finaleap Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-118965717-1');
</script></head>
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-md-down-none" style="background-color: white;">
<img src="<?php echo base_url(); ?>images/logo.png"/>

</div>
<ul class="c-sidebar-nav">
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/credit_manager_user">
       <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Dashboard</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_KVC_documents?ID=<?php echo $id;?>">
       <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> KYC Documents</a>
	</li>

	<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>Customer Details
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_Applicant_details?ID=<?php echo $id;?>">Applicant Details</a>
			<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_Co_applicant_details?ID=<?php echo $id;?>">Co-applicant Details</a>
        </div>
    </li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_Income_details?ID=<?php echo $id;?>">
       <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Income Documents</a>
	</li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_CAM_details?ID=<?php echo $id;?>">
       <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> CAM</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_Property_details?ID=<?php echo $id;?>">
       <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Property Details</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url()?>index.php/credit_manager_user/View_Approval_Remark_details?ID=<?php echo $id;?>">
       <svg class="c-sidebar-nav-icon"><i class="fa fa-th-large" style="margin-right: 20px;"></i></svg> Approval Remark</a>
	</li>
	<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>Verification Results
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_GST_PAN_ITR_details?ID=<?php echo $id;?>">GST/PAN/ITR</a>
        	<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_bank_report_details?ID=<?php echo $id;?>"> Bank Report</a>
			<a class="dropdown-item" href="<?php echo base_url()?>index.php/credit_manager_user/View_CIBIL_Equifax_details?ID=<?php echo $id;?>">CIBIL/Equifax</a>
        	    </div>
    </li>
	

	
</ul>

<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
</div>

<div class="c-wrapper">
<header class="c-header c-header-light c-header-fixed">
<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
	<i class="fa fa-bars"></i>
</button><a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="index.html#">
<svg width="118" height="46" alt="CoreUI Logo">
<use xlink:href="assets/brand/coreui-pro.svg#full"></use>
</svg></a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
	<i class="fa fa-bars"></i>
</button>

<ul class="c-header-nav mfs-auto">
<li class="c-header-nav-item px-3 c-d-legacy-none">
<button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="Toggle Light/Dark Mode">
<svg class="c-icon c-d-dark-none">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
</svg>
<svg class="c-icon c-d-default-none">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
</svg>
</button>
</li>
</ul>
<ul class="c-header-nav">
<li class="c-header-nav-item dropdown d-md-down-none mx-2">
	<a href="<?php echo base_url();?>index.php/logout">
		<svg class="c-sidebar-nav-icon">
			
		</svg> Logout</a>
</li>

<button class="c-header-toggler c-class-toggler mfe-md-3" type="button" data-target="#aside" data-class="c-sidebar-show">
<svg class="c-icon c-icon-lg">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
</svg>
</button>
</ul>
</header>

<div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">

<?php ini_set('short_open_tag', 'On'); ?>

	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id1==$row->credit_manager_id || $row->credit_sanction_status==NULL ) 
				{?>
				 <div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href=""><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
					<?php//				} ?>					
			</div>
</span>	

		
	</div>

	<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
										<?php if($this->session->flashdata('success')){ ?>
    <?php echo $this->session->flashdata('success');?>
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
		
		
		</div>
	
    <div class="row" >
	<form id="credit_saction_form" action="<?= base_url('index.php/credit_manager_user/credit_manager_first_level_form')?>" method="post">
	    
		<div class="col-sm-12" >
		
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="row justify-content-center col-12">
							<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Credit Sanction Loan Application</span>
                     	</div>
				        <div class="row col-12">
							<div class="w-100"></div>
						<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
				  
					
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Name of the customer</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
					<input readonly style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
	  			</div>
					
	  				
					<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Application ID</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						  <input readonly style="margin-top: 8px;" name="application_number" placeholder="Application number" class="form-control" type="text" value="<?php echo $data_row_applied_loan->CUST_ID;?>">
	  			
	  				</div>


					  <div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Type</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
	  				
	  				</div>
					
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Tenure</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input readonly  placeholder="Tenure" name="tenure" class="form-control" value="<?php echo $data_row_applied_loan->TENURE;?>">
  				</div>
				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Amount</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly style="margin-top: 8px;" name="loan_amount"  placeholder="Loan Amount" class="form-control" type="text" value="<?php echo $data_row_applied_loan->DESIRED_LOAN_AMOUNT;?>" >
	  				
	  				</div>
					  
					  
					  <div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">ROI</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly style="margin-top: 8px;" name="loan_amount"   class="form-control" type="text" value="<?php echo $credit_analysis_data->final_roi;?>" >
	  				
	  				</div>	
				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
				  <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Tenure *</span>
				</div>			
				<div class="w-100"></div>
				<input required style="margin-top: 8px;margin-left:45px;"id="months"  name="final_tenure" placeholder="Final Tenure" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)" onchange="Calculate()">
	  				
															
										
                	<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">Final Loan Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				  <input required placeholder="Final Loan Amount" name="final_loan_amount" id="amount" class="form-control" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
  				</div> 


				  <div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left: 54px;  font-weight: bold; ">Final ROI *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="ROI" name="roi" class="form-control"  id="rate" value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)" onchange="Calculate()">
  				</div> 
  					
              				
  			</div>  
					    
						</div>
						  
					</div>
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
					      <div class="row col-12">
						  <div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
				   
					
				<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Channel *</span>
					<div style=" margin-top: 0px;" class="col">
					<select class="form-control" name="channel" id="channel" required style="margin-left: 46px; margin-top: 9px;" >
											    <option value="">Select</option>
												<option value="connector" <?php if(!empty($row_sanction))if ($row_sanction->channel == 'connector') echo ' selected="selected"'; ?>>Connector</option>
												<option value="dsa" <?php if(!empty($row_sanction))if ($row_sanction->channel == 'dsa') echo ' selected="selected"'; ?>>DSA</option>
												<option value="rm" <?php if(!empty($row_sanction))if ($row_sanction->channel == 'rm') echo ' selected="selected"'; ?>>RM</option>
										      </select>
	  				</div>
					
	  							
					
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Product *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Product" class="form-control" type="text" name="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?>" >
  				</div> 

				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Program *</span>
				</div>			
				<div class="w-100"></div>
  				 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Program" name="program" class="form-control" type="text"  value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
  				</div> 


  						
  			</div>  			
					     
						</div>
					</div>
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
					    <div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Income Assessed</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input readonly style="margin-top: 8px;" name="income_assessed"  class="form-control"  value="	
						  <?php if(isset($credit_analysis_data))
							    {
									if(isset($credit_analysis_data->avg_net_salary))
									{
									   echo  preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round($credit_analysis_data->avg_net_salary));
									}
									else if(isset($credit_analysis_data->PAT_3))
									{
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round((($credit_analysis_data->PAT_3)/12+($credit_analysis_data->PAT_2)/12+($credit_analysis_data->PAT_1)/12)/3));
									}
							    	else if(isset($credit_analysis_data->gross_profit))
									{
										echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",round((($data_income_details->gross_profit)/12)));
									}
									else
									{
										echo "0";
									}

								}
							?>" type="number" maxlength="11" oninput="maxLengthCheck(this)"  onchange="Calculate()">
	  				</div>
				</div>		
                <div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Final Income Assessed *</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 45px;  margin-top: 8px;" class="col">
					  	<input required style="margin-top: 8px;" name="income_assessed"  placeholder="Income Assessed" class="form-control"  value="<?php if(isset($row_sanction)) echo $row_sanction->income_assessed;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)"  onchange="Calculate()">
	  				
                      
	  				</div>
	
				<div class="w-100"></div>



				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Loan Application Status*</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left:35px; margin-top: 8px;" class="col">
						  <select class="form-control" name="loan_status" id="loan_status" required style=" margin-top: 9px;" >
											    <option value="">Select</option>
												<option value="accepted" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'accepted') echo ' selected="selected"'; ?>>Accepted</option>
												<option value="hold" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'hold') echo ' selected="selected"'; ?>>On Hold</option>
										   		<option value="in_progress" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'in_progress') echo ' selected="selected"'; ?>>In Progress</option>
												<option value="rejected" <?php if(!empty($row_sanction))if ($row_sanction->loan_status == 'rejected') echo ' selected="selected"'; ?>>Rejected</option>
											 </select>
                      
	  				</div>

		
															
										
                	<div class="w-100"></div>	
					
	  						 					
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Eligibility *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input required placeholder="Eligibility" class="form-control"  name="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>" type="number" maxlength="11" oninput="maxLengthCheck(this)">
  				</div> 
				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Approval Remark</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					  <input type="textarea" name="approval_remark" id="Approval_Remark" style="font-family:sans-serif;font-size:1.2em;" class="form-control" maxlength = "500" value="<?php if(isset($row_remark)) echo $row_remark->approval_remark;?>">

                      
	  				</div>

				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  			
				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; margin-left:54px;  font-weight: bold; ">Recommended by</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly style="margin-top: 8px;" placeholder="Recommended by" name="recommended_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
	  				
	  				</div>
				
             </div> 

			 
				
						   
						
					</div>
		</div>
		<div style="margin-top: 20px;" class="row col-12 justify-content-center">
				<div >
				
				<button class="login100-form-btn" style="background-color: #25a6c6;" name="submit" value="submit">
						SUBMIT
					</button></a> 
				</div>		
			</div>
			<br><br><br>
	</form>
	</div>
<?php
}
else
{
	?>
			
			</div>
</span>	
<?php

?>
		
	</div>

	<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
										<?php if($this->session->flashdata('success')){ ?>
    <?php echo $this->session->flashdata('success');?>
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
		
		
		</div>
	
    <div class="row" >
	<form id="credit_saction_form" action="<?= base_url('index.php/credit_manager_user/credit_manager_first_level_form')?>" method="post">
	    
		<div class="col-sm-12" >
		
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
						<div class="row justify-content-center col-12">
							<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">Loan Information</span>
                     	</div>
				        <div class="row col-12">
							<div class="w-100"></div>
						<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="col">
				  
					
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Application Number</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input readonly style="margin-top: 8px;" name="application_number" placeholder="Application number" class="form-control" type="text" value="<?php echo $data_row_applied_loan->CUST_ID;?>">
	  				</div>
					
	  				
					<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Type</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly style="margin-top: 8px;" name="loan_type" placeholder="Loan Type" class="form-control" type="text"  value="<?php echo $data_row_applied_loan->LOAN_TYPE;?>">
	  				
	  				</div>
					
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Tenure</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input readonly  placeholder="Tenure" name="tenure" class="form-control" value="<?php echo $data_row_applied_loan->TENURE;?>">
  				</div>
				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Loan Amount</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly style="margin-top: 8px;" name="loan_amount"  placeholder="Loan Amount" class="form-control" type="text" value="<?php echo $data_row_applied_loan->DESIRED_LOAN_AMOUNT;?>">
	  				
	  				</div>				
				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Channel</span>
				</div>			
				<div class="w-100"></div>
  										<select class="form-control" name="channel" id="channel" required>
												<option value="connector">Connector</option>
												<option value="dsa">DSA</option>
												<option value="rm">RM</option>
										</select>
                	<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">ROI</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input readonly  placeholder="ROI" name="roi" class="form-control" type="text" value="<?php if(isset($row_sanction)) echo $row_sanction->roi;?>">
  				</div> 
  					
              				
  			</div>  
					    
						</div>
						  
					</div>
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
					      <div class="row col-12">
						  <div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
				   
					
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Name of the customer</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input readonly style="margin-top: 8px;" name="customer_name" placeholder="Name of the customer" class="form-control" type="text" value="<?php echo $row->FN." ".$row->MN." ".$row->LN;?>">
	  				</div>
					
	  							
					
				</div>							  				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Product</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input readonly  placeholder="Product" class="form-control" type="text" name="product" value="<?php if(isset($row_sanction)) echo $row_sanction->product;?> ">
  				</div> 

				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Program</span>
				</div>			
				<div class="w-100"></div>
  				 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input readonly  placeholder="Program" name="program" class="form-control" type="text"  value="<?php if(isset($row_sanction)) echo $row_sanction->program;?>">
  				</div> 


  						
  			</div>  			
					     
						</div>
					</div>
					<div class="row shadow bg-white rounded" style="margin:15px;padding:9px; ">
					    <div class="w-100"></div>
			<div class="row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Income Assessed</span>
					<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  					<input readonly  style="margin-top: 8px;" name="income_assessed" placeholder="Income Assessed" class="form-control" type="text"  value="<?php if(isset($row_sanction)) echo $row_sanction->income_assessed;?>">
	  				</div>
				</div>		
                <div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Final Tenure</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly  style="margin-top: 8px;" name="final_tenure" placeholder="Final Tenure" class="form-control" type="text" value="<?php if(isset($row_sanction)) echo $row_sanction->final_tenure;?>">
	  				
	  				</div>				
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Eligibility</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input readonly  placeholder="Eligibility" class="form-control" type="text" name="eligibility" value="<?php if(isset($row_sanction)) echo $row_sanction->eligibility;?>">
  				</div> 
				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Approval Remark</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					  <textarea name="approval_remark" id="Approval_Remark" style="font-family:sans-serif;font-size:1.2em;" class="form-control" maxlength = "500">

                        </textarea>
	  				</div>

				
  			</div>	
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-venus-mars"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Final Loan Amount</span>
				</div>			
				<div class="w-100"></div>
  				 <div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input readonly  placeholder="Final Loan Amount" name="final_loan_amount" class="form-control" type="text" value="<?php if(isset($row_sanction)) echo $row_sanction->final_loan_amount;?>">
  				</div> 
				<div class="w-100"></div>

	  				<div style="margin-top: 20px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Recommended by</span>
					</div>			
					<div class="w-100"></div>
	  					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
						<input readonly style="margin-top: 8px;" placeholder="Recommended by" name="recommended_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
	  				
	  				</div>
				
             </div> 
				
						   
						
					</div>
		</div>
		
			<br><br><br>
	</form>
	</div>
<?php }?>
</main>
</div>

</div>
</div>
<script>
    function onlyNumberKey(evt) {
         
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
		{
            alert("Please enter numeric value"); return false;
		}
		else{
        return true;
		}
    }
</script>
<script>
  function maxLengthCheck(object){
      if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
  }
</script>
    <script>
	function Calculate() {
  
    // Extracting value in the amount 
    // section in the variable
    const amount = document.querySelector("#amount").value;
  
    // Extracting value in the interest
    // rate section in the variable
    const rate = document.querySelector("#rate").value;
  
    // Extracting value in the months 
    // section in the variable
    const months = document.querySelector("#months").value;
  
    // Calculating interest per month
    const interest = (amount * (rate * 0.01)) / months;
      
    // Calculating total payment
    const total = ((amount / months) + interest).toFixed(2);
  
    document.querySelector("#total")
        .innerHTML = ":(₹)" + total;
}  </script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
</body>
</html>