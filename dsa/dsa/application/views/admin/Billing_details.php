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
<title>Finaleap | Monthly Billing</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
		<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=94461d89946ef749b7a43d14685c725d1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">
		<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" class="init">
			$(document).ready(function() {
			$('#example').DataTable();
			} );
		</script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
 			gtag('config', 'UA-118965717-1');
		</script>
		<style>
			table, td, th 
			{
			  border: 1px solid black;
			 border-collapse: collapse;
			}
		</style>

</head>
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
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Area_Manager?s=all">Area Manager</a>
		<a class="dropdown-item" href="<?php echo base_url();?>index.php/admin/Cluster_Manager?s=all">Cluster Manager</a>
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
        												<div class="">
															<div class="row">
																<?php if(isset($data))
				      											{
						 										 if(count($data) != 0) 
						  											{  ?>
						  											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php echo count($data); ?>&nbsp;&nbsp;<a href="<?=base_url('index.php/admin/download_Excel')?>">
						  												 <i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
						   												<?php $excelData = json_decode(json_encode($data), true);?>
						  											</div>
						 									 		<?php  } 
				         											 else
						 											 {?>
						   											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   												<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($data)) {echo count($data);}else {echo 0;}?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
																	</div>
																	<?php     } 
			           												} 
																	else
																	{ ?>
					       											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<label style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($array_intrest_final)) {echo count($array_intrest_final);}else {echo 0;} ?>&nbsp;&nbsp;<a href="<?=base_url('index.php/admin/download_Excel_Monthly_Billing')?>">
						   												<i class="fa fa-download "style='font-size:24px; color:green;'></i></a></label>
																	</div>
																	<?php   }   ?>
																	
																	
															</div>
          							      				</div>
														<hr>
													</div>


<body class="wide comments example">
														<div class="fw-body">
															<div class="content">
																<div style="overflow-x:auto;">
																	<div class="demo-html">
																		<table id="example" class="display" style="width:100%">
																	
																			<thead>
																				<tr>
					    															<th  style="">Sr</th>
																					<th  style="">Customer Name</th>
																					<th  style="">Rate Of Intrest</th>
																					<th style="">Tenure</th>
																					<th  style="">EMI</th>
																					<th  style="">Beginning Balance</th>
																					<th  style="">EMI Date</th>
																					<th  style="">Monthly EMI</th>
																				
																					
																					<th  style="">Interest Payment</th>
																					<th  style="">Our Payment</th>
																					
																					<th  style="">Principal Payment</th>
																					<th  style="">Ending Balance</th>
																					<th  style="">GST Amount (18%)</th>
																					
																				</tr>
																			</thead>
																			<tbody>
																				<?php  $i= 1 ;  $count=count($array_intrest_final); $total=0; $Total_GstAmout=0; if(!empty($array_intrest_final)){foreach($array_intrest_final as $row)
																				{  $total=$total+$row['Profit'];  $Total_GstAmout=$Total_GstAmout+$row['GST_Amount'];
																				 ?>
																				
																				<tr>
																	            <td  style=""> <?php echo $i; ?></td>
																				<td  style=""> <?php echo $row['Customer_name']; ?></td>
																				<td  style="text-align:right;"> <?php echo $row['Rate_Of_Intrest']; ?></td>
																				<td   style="text-align:right; "> <?php echo $row['Tenure']; ?></td>
																				<td style="text-align:right; "> <?php echo  $row['Payment_Number']; ?></td>
																				<td style="text-align:right;  "><?php $amount=IND_money_format($row['Beginning_Balance']); echo $decimal=is_decimal($amount);  ?></td>								
																				<td> <?php  $full_date= strtotime($row['EMI_Date']); echo date('d M Y',  $full_date); ?></td>
																				<td style="text-align:right; "> <?php $amount=IND_money_format($row['Monthly_EMI']);  echo $decimal=is_decimal($amount);  ?></td>
																				<td style="text-align:right;"><?php $amount=IND_money_format($row['Interest_Payment']);  echo $decimal=is_decimal($amount);  ?></td>			
																				<td style="text-align:right; "><?php $amount=IND_money_format($row['Profit']);  echo $decimal=is_decimal($amount);  ?></td>			
																				
																				<td style="text-align:right; "><?php $amount=IND_money_format($row['Principal_Payment']); echo $decimal=is_decimal($amount);  ?></td>			
																				<td style="text-align:right;"><?php $amount=IND_money_format($row['Ending_Balance']); echo $decimal=is_decimal($amount);  ?></td>
                                                                                <td style="text-align:right; "><?php $amount=IND_money_format($row['GST_Amount']); echo $decimal=is_decimal($amount);  ?></td>																							
																				
																				</tr>
																				<?php $i++; } } ?>
																				
																				
																		</tbody>
																		<tbody>
																				<tr>
																				<td></td>
																				<td></td>
																				<td></td>
																				<td></td>
																				<td></td>
																				<td>SubTotal</td>
																			
																				<td></td>
																				<td></td>
																				<td></td>
																				<td style="text-align:right;"><b><?php  $amount=IND_money_format($total); echo $decimal=is_decimal($amount);  ?></b></td>			
																				<td></td>
																				<td></td>
																				<td style="text-align:right;"><b><?php  $amount=IND_money_format($Total_GstAmout); echo $decimal=is_decimal($amount);  ?></b></td>
																				
																				</tr>
																				<tr>
																				<td></td>
																				<td></td>
																				<td></td>
																				<td></td>
																				<td></td>
																				<td>Final Total</td>
																				<td colspan="7" style="font-size: 18px; background-color:yellow; text-align:right;"><center></b><?php  $final_total=$Total_GstAmout+$total;  $amount=IND_money_format($final_total); echo $decimal=is_decimal($amount);  ?></b></td>			
																			
																				
																				</tr>
																				
																				
																		</tbody>
																	</table>
																	
																		
																</div>
															</div>
	    												</div>
													</div>
                                                </body>
												<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    DELETE
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_Cluster_Manager" method="POST" id="change_contact_status">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Cluster Manager?</label>	                         
	                    <input name="id" type="number" class="idform" hidden  />
							 						
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    DELETE IT
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>



<script >
		 $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>






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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
<?php 
function IND_money_format($number){
        $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);

        for($i=0;$i<$length;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
                $delimiter .=',';
            }
            $delimiter .=$money[$i];
        }

        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);

        if( $decimal != '0'){
            $result = $result.$decimal;
        }

        return $result;
    }
function is_decimal( $val )
{
	if(strpos($val, '.'))
	{
		$whatIWant = substr($val, strpos($val, ".") + 1);    
        $length= strlen($whatIWant);
		if($length==1)
		{
			return $val.'0';
		}
		else
		{
			return $val;
		}
	}
	else
	{
		return  $val.'.00';
	}
	//number_format($val);
    //return  is_numeric( $val ) && floor( $val ) != $val;
	
}
function add_decimal( $val )
{
    return  $val.'.00';
	
}
?>