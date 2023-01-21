<?php 
	//print_r($_SESSION);
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


<?php
//$_SESSION['message'] = "Test ";
//echo "test = ".$_SESSION['message']='test';


 if(isset($_SESSION['title']) && $_SESSION['title'] != '') { ?>
 <script>
swal({
  title: "<?php echo $_SESSION['title']; ?>",
  text: "<?php echo $_SESSION['message']; ?>",
  icon: "success",
});

</script>

<?php unset($_SESSION['title']); unset($_SESSION['message']); } ?>
<?php ini_set('short_open_tag', 'On'); ?>
<form method="POST" action="<?php echo base_url(); ?>index.php/distributor/save_request_sataus_by_scfo" enctype='multipart/form-data' id="distributor_invoice" >
	<div class="margin-10 padding-5">
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		
		
			</div>
			
		</div>
		<div style="margin-left: 10px; margin-top: 4px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">			
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				
			</div>
		</div>
	
		
		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Update invoice</span>

			</div>
			 
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 45px; font-size: 12px; color: #bfbbbb;"></span>
               
			</div>
			
			
			<div class="w-100"></div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice number *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter invoice number *" class="input-cust-name" type="text" name="invoicenumber" value="<?php echo $Request->invoicenumber;?>" minlength="6" maxlength="75" readonly>
  				</div> 
				  <div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Subvent Type *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">

					<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="invoiceamount" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $product_details->interestsubvention;?>" readonly>
				</div> 
  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				
  					<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="invoiceamount" oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $Request->invoiceamount;?>" readonly>
  				</div> 
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">convenience Charge *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				
  					<input  required placeholder="Enter invoice amount*" class="input-cust-name" type="text"  title="Please enter invoice amount" name="totalcharges" oninput="maxLengthCheck(this)" maxlength="10" value="<?php if($product_details->interestsubvention=='Yes'){echo $Request->totalcharges; } else {echo '0.00'; }?>" readonly>
  				</div> 
				
				 <div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">View Incoice </span>
				</div>

						

  				
					
				 <div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				   
				        <div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
							<div class="col-sm-10"><a target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
															Invoice 
																			</label></a></div>
															<div class="col-sm-1"><a href="<?php echo base_url();?>index.php/Supply_chain/view_invoice_cloud_file/<?php echo $Request->id; ?>" target="_blank"> <i class="fa fa-eye" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
															</div>
															
															
																	
																						
																					
																				
														</div>
													
													
  				</div> 
				
 
 
  			</div>		
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Retailer Business name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter business name *" class="input-cust-name" type="text" name="retailerbusinessname" id="retailerbusinessname"  style="text-transform:uppercase"  value="<?php echo $retailerinfo->dsa_firm_name;?>" minlength="8" maxlength="75" readonly>
  				</div> 
				
				
				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Difference Amount *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input type="hidden" name="fundingamount3" id="fundingamount3" value="" >
					<input  required placeholder="Enter funding amount *" class="input-cust-name"  title="Please enter invoice issued by name" name="fundingamount" id="fundingamount" value="<?php echo $Request->additionaldeduction;?>" readonly>
  				</div> 

  				<div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Final Amount To Distributor *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input type="hidden" name="fundingamount3" id="fundingamount3" value="" >
					<input  required placeholder="Enter funding amount *" class="input-cust-name"  title="Please enter invoice issued by name" name="fundingamount" id="fundingamount" value="<?php echo $Request->disbursedamount;?>" readonly>
  				</div> 
				  <div class="w-100"></div>

				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Final Amount from Retailer *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input type="hidden" name="fundingamount2" id="fundingamount2" value="" >
					<input  required placeholder="Enter payment amount *" class="input-cust-name"  title="Please enter invoice issued by name" name="totalpayment" value="<?php echo $Request->fundingamount;?>" readonly>
  				</div> 
				  <div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Remark by SCFO *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<textarea name="remark_by_scfo" id="remark_by_scfo" class="input-cust-name" required ><?php echo $Request->remark_by_scfo;?></textarea>
					
					</div> 
					

  				
				
  			</div>	
			
			
			
			
  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="w-100"></div>
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Distributor Business name *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input  required placeholder="Enter business name *" class="input-cust-name" type="text" name="retailerbusinessname" id="retailerbusinessname"  style="text-transform:uppercase"  value="<?php echo $distributor_info->dsa_firm_name;?>" minlength="8" maxlength="75" readonly>
  				</div> 

				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Invoice Date *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
					<input  required  max="<?php echo date('Y-m-d');?>" class="input-cust-name" type="date" name="invoicedate" id="invoicedate" value="<?php $arr = explode(" ",$Request->invoicedate); echo $arr[0];  ?>"  readonly>
				</div>
			  	<div class="w-100"></div>

				<div style="margin-top: 20px; display:none;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-university"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Select Retailers *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px; display:none;" class="col">
					<select  required class="input-cust-name" name="retailerid" > 
					
					<option value="<?php echo $Request->retailerid ?>" ><?php echo $retailerinfo->FN." ".$retailerinfo->LN; ?></option> 
					
				</select>
				</div>
				
                    <div class="w-100"></div>

  				<div style="margin-top: 20px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Funding Tenure In Days *</span>
				</div>			
				<div class="w-100"></div>
  				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  					<input type="hidden" name="fundingamount" id="fundingamount" value="" >
					<input  required placeholder="Enter payment tenure *" class="input-cust-name"  title="Please enter invoice issued by name" name="tenure" value="<?php echo $Request->tenure;?>" readonly>
					<input type="hidden" name="requestid" id="requestid" value="<?php echo $Request->id; ?>" >
				</div> 
				<div class="w-100"></div>
					
				<div style="margin-top: 20px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Remark by distributor *</span>
				</div>			
				<div class="w-100"></div>
				<div style="margin-left: 35px;  margin-top: 8px;" class="col">
				<textarea name="remark_by_distributor" id="remark_by_distributor" class="input-cust-name" readonly><?php echo $Request->remark_by_distributor;?></textarea>
				
				</div> 
				
				
  			</div>  			
		</div>
		
		<div style="margin-top: 20px;" class="row col-12 justify-content-center">
		
		<?php if($Request->scfo_status!=''){ if($Request->scfo_status=="Approve"){?>
			<input type="button"  name="Confirm" value="Approved by SCFO"  class="login100-form-btn btn btn-success disabled" >
		<?php 
		}
		else if($Request->scfo_status=="SendBack")
		{
			if($Request->status=="Approve")
			{?>
			<div >
				
				<input type="button"  name="Confirm" value="SendBack" id="SendBack" class="login100-form-btn btn btn-primary" >
				
				<input type="submit"  name="Confirm" value="Approve" id="Approve" class="login100-form-btn btn btn-success" >
				
				<input type="button"  name="Confirm" value="Reject" id="reject" class="login100-form-btn btn btn-danger" >
			
			</div>	
			<?php } 
		else{
			?>
			<input type="button"  name="Confirm" value="SendBack by SCFO"  class="login100-form-btn btn btn-primary disabled" >
		<?php 
		} }
		else if($Request->scfo_status=="Reject")
		{
			?>
			<input type="button"  name="Confirm" value="Rejected by SCFO"  class="login100-form-btn btn btn-danger disabled" >
		<?php 
		}
		}
		else if($Request->status=="Approved By Distributor")
		{?>
				<div >
				
					<input type="button"  name="Confirm" value="SendBack" id="SendBack" class="login100-form-btn btn btn-primary" >
					
					<input type="submit"  name="Confirm" value="Approve" id="Approve" class="login100-form-btn btn btn-success" >
					
					<input type="button"  name="Confirm" value="Reject" id="reject" class="login100-form-btn btn btn-danger" >
					
				</div>	
		<?php } else if($Request->status=="SendBack"){?>
			<input type="button"  name="Confirm" value="SendBack by Distributor"  class="login100-form-btn disabled btn btn-primary" >
			<?php } 
			else if($Request->status=="Reject"){?>
			<input type="button"  name="Confirm" value="Rejected by distributor"  class="login100-form-btn disabled btn btn-danger">
			<?php } 
			else if($Request->status=="Approve"){?>
			<input type="button"  name="Confirm" value="Approved by distributor"  class="login100-form-btn disabled btn btn-success" >
			<?php } ?>

			</div>
</form>
	

		

		

		 </div>
			</form>


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
<?php //print_r($_SESSION); ?>


	$("#distributor_invoice").submit(function(e) {
             
			  e.preventDefault();
              
              var form = $(this);
              var url = form.attr('action');    
			  var formData=new FormData(this);
			  formData.append("status",'Approve');
              $.ajax({
                     type: "POST",
                     url: url,
                     data: formData,
					 processData: false,
					 contentType: false,
                     success: function (response) {
						//location.reload(true)
					    var parsed_data = JSON.parse(response);
						//alert(parsed_data.result);
						
						//exit;
						if(parsed_data.result == 'sucess'){                                                                
                              swal(
								"success!", 
								"Invoice Status Update Successfully", 
								"success"
                                  );
								  
								
								
								  

  
                          }
						  else{
							/* swal(
									"warning!", 
									"Something get Wrong", 
									"warning"
									);
									*/
									swal(
								"success!", 
								"Invoice Status Update Successfully", 
								"success"
                                  );
								  
								
								

						  }
						}
						  
						 
                          
                      
              });                
          });	
		  $("#SendBack").click(function(e) 
		        {
					var reques_id=$('#requestid').val();
					var remark=$('#remark_by_scfo').val();
					if(remark=='' || remark==' ')
					{
						swal(
								"warning!", 
								"Plaese Enter Remark", 
								"warning"
                                  );
						exit();
					}
					var url = window.location.origin+"/finserv_test/dsa/dsa/index.php/distributor/update_request_status_scfo";
					$.ajax({
						type:'POST',
						url:url,
						data:{reques_id:reques_id,status:'SendBack By SCFO',remark:remark},
						success:function(data)
						{
							location.reload(true)
							var parsed_data = JSON.parse(data);
						if(parsed_data.result == 'sucess'){                                                                
                              swal(
								"success!", 
								"Invoice Status Update Successfully", 
								"success"
                                  );
								  
								
								
								  

  
                          }
						  else{
							swal(
									"warning!", 
									"Something get Wrong", 
									"warning"
									);
								  
								
								

						  }
						}
				});

		  });
		  $("#reject").click(function(e) 
		        {
					var reques_id=$('#requestid').val();
					var remark=$('#remark_by_scfo').val();
					if(remark=='' || remark==' ')
					{
						swal(
								"warning!", 
								"Plaese Enter Remark", 
								"warning"
                                  );
						exit();
					}
					var url = window.location.origin+"/finserv_test/dsa/dsa/index.php/distributor/update_request_status_scfo";
					$.ajax({
						type:'POST',
						url:url,
						data:{reques_id:reques_id,status:'Reject By SCFO',remark:remark},
						success:function(data)
						{
							location.reload(true)
							var parsed_data = JSON.parse(data);
						   if(parsed_data.result == 'sucess'){                                                                
                              swal(
								"success!", 
								"Invoice Status Update Successfully", 
								"success"
                                  );
								  
								
								
								  

  
                          }
						  else{
							swal(
									"warning!", 
									"Something get Wrong", 
									"warning"
									);
								  
								
								

						  }
						}
				});

		  });
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>

</body>
</html>