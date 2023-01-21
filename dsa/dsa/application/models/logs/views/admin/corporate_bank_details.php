<!DOCTYPE html>

<html lang="en">
<head>
<!--<base href="./">-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="Finaleap">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Finaleap">
<title>Finaleap</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">

		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>	
		</svg> Dashboard</a></li>
		<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>All Users
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Hr?s=all">HR</a>
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/CSR">CSR</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/dsa?s=all">DSA</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Connector?s=all">Connector</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/customers">Customers</a>
				<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Manager"> Managers</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/IDCCR_USERS">IDCCR Users</a>
			
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_manager_user?s=all">Credit Manager</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/branch_manager?s=all">Branch Manager</a>
			
				<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Operations_user?s=all">Operations user</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Relationship_Officer_list?s=all">Relatationship Officer</a>
			
		
        </div>
    </li>
	<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>Fees Options
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_buerau_price">Credit Bureau Fees</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_price">Aadhar E-sign Fees</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/loan_application_fees">Loan Application Fees</a>
        </div>
    </li>

	<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>Bureau Reports
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Payment_report">Credit Bureau Reports</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Internal_bureau_reports">Internal Bureau</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/credit_bureau_reports">IDCCR Reports</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_report">Aadhar E-sign report</a>
        </div>
    </li>
	<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>Refund Fees
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/refund_money">credit Bureau</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/refund_money_aadhar">Aadhar E-sign</a>
       </div>
    </li>

	<li class="c-sidebar-nav-item">
		<button class="btn  dropdown-toggle c-sidebar-nav-link" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;margin-left:40px;">
			<i class="fa fa-th-large" style="margin-right: 20px;"></i>Edit Pull Chances
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item"  href="<?php echo base_url();?>index.php/admin/credit_buerau_pull_chances">Credit Bureau</a>
			<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/aadhar_esign_pull_chances">Aadhar E-sign</a>
       </div>
    </li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/View_Lead">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-users" style="margin-right: 20px;"></i>	
		</svg> View Lead</a>
	</li>

	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/customers">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg> Strategic Dsa Reports</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/manage_documents_type">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-file" style="margin-right: 20px;"></i>	
		</svg> Manage Documents Type</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/manage_banks">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-university" style="margin-right: 20px;"></i>	
		</svg> Manage Banks</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/admin/Loan_types">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-university" style="margin-right: 20px;"></i>	
		</svg> Manage Loan Types</a>
	</li>
   	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/manage_coorporate_banks">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg>Add New Coorporate Bank</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/One_Monthly_Billing">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg>One Time Monthly billing</a>
	</li>
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/Admin/Monthly_Billing">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-user-circle-o" style="margin-right: 20px;"></i>	
		</svg>Regular Monthly  billing</a>
	</li>
	
	<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?php echo base_url();?>index.php/logout">
		<svg class="c-sidebar-nav-icon">
			<i class="fa fa-arrow-circle-left" style="margin-right: 20px;"></i>	
		</svg> Logout</a>
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

</svg></a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
	<i class="fa fa-bars"></i>
</button>
<ul class="c-header-nav d-md-down-none">
<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?php echo base_url();?>index.php/admin/dashboard">Dashboard</a></li>
</ul>
<ul class="c-header-nav mfs-auto">
<li class="c-header-nav-item px-3 c-d-legacy-none">
<button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="Toggle Light/Dark Mode">

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

</button>
</ul>
</header>
<?php
 $result = $this->session->flashdata('result');   
 if (isset($result)) 
    {
		if($result=='1')	 { echo '<script> swal("success!", "Count updated successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='2'){ echo '<script> swal("success!", "IDCCR User added successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='3'){ echo '<script> swal("success!", "Details Updated successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='4'){ echo '<script> swal("success!", "User Deleted successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='5'){ echo '<script> swal("warning!", "Opps! Mobile already in use.", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='6'){ echo '<script> swal("warning!", "Opps! User ID already in use", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='7'){ echo '<script> swal("warning!", "Opps! Password already in use", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='8'){ echo '<script> swal("success!", "Count Reset Successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else                 { echo '<script> swal("warning!", "Error in count updation", "warning");</script>';$this->session->unset_userdata('result');	}
	}
?>


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

		
<div class="row justify-content-center ">
	<div class="col-sm-12">
	<div class="col-sm-12">
					<center>
		<h5 style="color:green">Bank : <?php if(isset($corporate_bank_name)){echo $corporate_bank_name->Bank_name;}?> </h5><br>
        <input type="text" name="bank_id" id="bank_id"  value="<?php echo $_GET['id']; ?>" hidden>
      </center>
	</div>
	</div>
	<div class="row justify-content-center ">
		<div class="col-sm-12">
		    <b><label>Processing Fess </label></b> 
			<input type="text" class="form-control" name="Processing_fees_in_rs" id="Login_fees_in_rs" value="<?php echo $corporate_bank_name->Login_fees_in_rs;?>">
			<input type="button" class="btn btn-info" value="Update"  target="" name="Update"  id="Login_fees" style="margin-top:10px;">
		</div>
	</div>
	<div> </div>
<?php if(!empty($corporate_bank_details)) {?>
	<table class="table table-bordered" style="margin-top:10px;">
    	<thead>
      	<tr>
	    	<th>Sr.No</th>
			<th>Loan type</th>
			<th>Rate of Intrest in (%)</th>
        	<th>Processing Fees in (%)</th>
        	<th>Insurance Amount in (%)</th>
			
      	 </tr>
   		</thead>
		<tbody>
	<?php $i= 1;foreach($corporate_bank_details as $bank){?>
		<form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/admin/Update_bank_details" method="POST" enctype="multipart/form-data">
		<tr> 
			<td><?php echo $i;?><input hidden type="text" class="form-control" name="id" value="<?php echo $bank->id;?>"><input hidden type="text" class="form-control" name="bank_id" value="<?php echo $bank->bank_id;?>"></td>
			<td><input  type="text" class="form-control" name="loan_type" value="<?php echo $bank->loan_type;?>"></td>
			<td><input type="text" class="form-control" name="rate_of_intrest" value="<?php echo $bank->rate_of_intrest;?>"></td>
  			<td><input type="text" class="form-control" name="Processing_Fees" value="<?php echo $bank->Processing_Fees; ?>"></td>
			<td><input type="text" class="form-control" name="Insurance_Amount" value="<?php echo $bank->Insurance_Amount; ?>"></td>
			
			
			<td><input type="submit" class="btn btn-info" value="Update" name="Update"></button></td>
			

		</tr>
		</form>	
		<?php $i++; }?>
		</tbody>
     </table>
<?php } else {?>
No users found
<?php }?>



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
<script type="text/javascript">
         function showHideDiv(ele) {
         	var srcElement = document.getElementById(ele);
         	if (srcElement != null) {
         		if (srcElement.style.display == "block") {
         			srcElement.style.display = 'none';
         		}
         		else {
         			srcElement.style.display = 'block';
         		}
         		return false;
         	}
         }
      </script>
	  <script type="text/javascript">
         function showHideDiv2(ele) {
         	var srcElement = document.getElementById(ele);
         	if (srcElement != null) {
         		if (srcElement.style.display == "block") {
         			srcElement.style.display = 'none';
         		}
         		else {
         			srcElement.style.display = 'block';
         		}
         		return false;
         	}
         }
      </script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>	
