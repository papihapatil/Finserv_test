<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);
//echo $id1;
 //echo $id;
 //exit(); Coapp_8: ["Bhubaneswar","Puri","Cuttack"], salaried
 $cust_type=$data_row_income_details->CUST_TYPE;
 //echo $cust_type;
 //exit();
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>adminn/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
</head>
	<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id1 ==$row->credit_manager_id || $row->credit_sanction_status==NULL ) 
				{ ?>
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

		
	</div>
		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Eligibility</h2></div>
								<?php if($this->session->flashdata('success'))
								     { 
								?>
								<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
					            <?php   echo $this->session->flashdata('success');?>
								</div>
								<?php 
								      }
									  else if($this->session->flashdata('error'))
									  {  ?>
								<?php 	echo $this->session->flashdata('error'); ?>				
								<?php }
								      else if($this->session->flashdata('warning'))
									   {  ?>
								<?php 	echo $this->session->flashdata('warning'); ?>
								<?php  }
								       else if($this->session->flashdata('info'))
									   {  ?>
								<?php    echo $this->session->flashdata('info'); ?>
								<?php  } ?>
  					
	   <form  action="<?= base_url('index.php/credit_manager_user/save_eligibility_non_salaried')?>"  method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6  shadow bg-white" style="padding:20px;border:1px solid black;">
			<center><h3>Non-Salaried</h3></center>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Assessed income per month</label>
					<input type="text" class="form-control" name="assessed_income_per_month" id ="assessed_income_per_month" value=""  placeholder="">
					</div>
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">FOIR Income @50%</label>
					<input type="text" class="form-control" name="Foir_income_50_non_sal" id ="Foir_income_50_non_sal" value=""  placeholder="">
			        </div>
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Existing Liabilities</label>
					<input type="text" class="form-control" name="existing_liabilities"  id ="existing_liabilities" value=""   placeholder="">
					</div>
					
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Property Value</label>
					<input type="text" class="form-control" name="property_value"  id ="property_value" value=""  placeholder="">
					</div>
					
					
					<div class="form-group" style="width:80%;margin-left:40px;">
					LTV(B)
					 <select  id="LTV_dropdown" name="LTV_B">
					     <option value="">Select LTV %</option>
						<option value="95">95</option>
						<option value="90">90</option>
						<option value="85">85</option>
						<option value="80">80</option>
						<option value="75">75</option>
						<option value="70">70</option>
						<option value="65">65</option>
						<option value="60">60</option>
						<option value="55">55</option>
						<option value="50">50</option>
					</select>
					<input type="text" class="form-control" id ="LTV_B" value=""  placeholder="">
			        </div>
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Minimum of (A) or (B) </label>
					<input type="text" class="form-control" name="minimum_a_b" id ="minimum_a_b" value=""  placeholder="">
					</div>
					
				
					
				
				</div>
				<div class="col-sm-6">
					<div class="form-group" style="width:80%;margin-left:40px;">
					<input type="hidden" name="total_days" id = "perlakh" value="100000" />
					<label style="width:80%;margin-left:10px;color:black;">ROI</label>
					<input type="text" class="form-control"  name="rate_of_intrest" id ="rate_of_intrest" value="" >
					</div>
						<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Tenure ( no of months)</label>
					<input type="text" class="form-control" name="tenure" id ="tenure" value=""   >
					</div>
				 <div class="form-group" style="width:80%;margin-left:40px;">
					 <label style="width:80%;margin-left:10px;color:black;">EMI Per Lakh</label><span id="total"></span> <!-- @26% -->
					 <input type="text" class="form-control total_cost"  name="emi"  id ="EMI" value=""  >
			         </div>
					  <div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Net Income</label>
					<input type="text" class="form-control" name="net_amount" id ="net_amount" value=""  placeholder="">
			        </div>
					 <div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Loan Amount (A)</label>
					<input type="text" class="form-control" name="Loan_amount" id ="Loan_amount" value=""  placeholder="" >
					</div>
						
					
					
				</div>
			</div>
	<!--		<center><button type="submit" class="btn btn-primary" value="submit">Submit</button></center> -->
		</div>
		
  <?php 
  
}

else
{
?>
	</div>

		
	</div>
		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Eligibility</h2></div>
								<?php if($this->session->flashdata('success'))
								     { 
								?>
								<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
					            <?php   echo $this->session->flashdata('success');?>
								</div>
								<?php 
								      }
									  else if($this->session->flashdata('error'))
									  {  ?>
								<?php 	echo $this->session->flashdata('error'); ?>				
								<?php }
								      else if($this->session->flashdata('warning'))
									   {  ?>
								<?php 	echo $this->session->flashdata('warning'); ?>
								<?php  }
								       else if($this->session->flashdata('info'))
									   {  ?>
								<?php    echo $this->session->flashdata('info'); ?>
								<?php  } ?>
  					
	   <form  action="<?= base_url('index.php/credit_manager_user/save_eligibility_non_salaried')?>"  method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6  shadow bg-white" style="padding:20px;border:1px solid black;">
			<center><h3>Non-Salaried</h3></center>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Assessed income per month</label>
					<input type="text" class="form-control" name="assessed_income_per_month" id ="assessed_income_per_month" value=""  placeholder="">
					</div>
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">FOIR Income @50%</label>
					<input type="text" class="form-control" name="Foir_income_50_non_sal" id ="Foir_income_50_non_sal" value=""  placeholder="">
			        </div>
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Existing Liabilities</label>
					<input type="text" class="form-control" name="existing_liabilities"  id ="existing_liabilities" value=""   placeholder="">
					</div>
					
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Property Value</label>
					<input type="text" class="form-control" name="property_value"  id ="property_value" value=""  placeholder="">
					</div>
					
					
					<div class="form-group" style="width:80%;margin-left:40px;">
					LTV(B)
					 <select  id="LTV_dropdown" name="LTV_B">
					     <option value="">Select LTV %</option>
						<option value="95">95</option>
						<option value="90">90</option>
						<option value="85">85</option>
						<option value="80">80</option>
						<option value="75">75</option>
						<option value="70">70</option>
						<option value="65">65</option>
						<option value="60">60</option>
						<option value="55">55</option>
						<option value="50">50</option>
					</select>
					<input type="text" class="form-control" id ="LTV_B" value=""  placeholder="">
			        </div>
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Minimum of (A) or (B) </label>
					<input type="text" class="form-control" name="minimum_a_b" id ="minimum_a_b" value=""  placeholder="">
					</div>
					
				
					
				
				</div>
				<div class="col-sm-6">
					<div class="form-group" style="width:80%;margin-left:40px;">
					<input type="hidden" name="total_days" id = "perlakh" value="100000" />
					<label style="width:80%;margin-left:10px;color:black;">ROI</label>
					<input type="text" class="form-control"  name="rate_of_intrest" id ="rate_of_intrest" value="" >
					</div>
						<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Tenure ( no of months)</label>
					<input type="text" class="form-control" name="tenure" id ="tenure" value=""   >
					</div>
				 <div class="form-group" style="width:80%;margin-left:40px;">
					 <label style="width:80%;margin-left:10px;color:black;">EMI Per Lakh</label><span id="total"></span> <!-- @26% -->
					 <input type="text" class="form-control total_cost"  name="emi"  id ="EMI" value=""  >
			         </div>
					  <div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Net Income</label>
					<input type="text" class="form-control" name="net_amount" id ="net_amount" value=""  placeholder="">
			        </div>
					 <div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Loan Amount (A)</label>
					<input type="text" class="form-control" name="Loan_amount" id ="Loan_amount" value=""  placeholder="" >
					</div>
						
					
					
				</div>
			</div>
			
		</div>
<?php 

}
?>
	<!---------------------------------------------------salaried-------------------------------------------------------------- -->		
	
		
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

<script type="text/javascript">
    $(document).ready(function() {


           $("#property_value").on('keyup',function(){
              var LTV_dropdown = $("#LTV_dropdown").val()
              var property_value = $("#property_value").val()
              var LTV_B = (LTV_dropdown /100 ) * property_value
              document.getElementById('LTV_B').value = LTV_B.toString();
             })

             $("#LTV_dropdown").on('click',function(){
              var LTV_dropdown = $("#LTV_dropdown").val()
              var property_value = $("#property_value").val()
              var LTV_B = (LTV_dropdown /100 ) * property_value
              document.getElementById('LTV_B').value = LTV_B.toString();
             })
			 
				$("#property_value").on('keyup',function(){
              var Loan_amount = $("#Loan_amount").val()
              var LTV_B = $("#LTV_B").val()
              if(Loan_amount > LTV_B  ){
              var minimum_a_b =LTV_B
              }
              else
              {
                var minimum_a_b =Loan_amount
              }
              document.getElementById('minimum_a_b').value = minimum_a_b.toString();
             }) 
             
			  $("#LTV_dropdown").on('click',function(){
              var Loan_amount = $("#Loan_amount").val()
              var LTV_B = $("#LTV_B").val()
              if(Loan_amount > LTV_B  )
			  {
              var minimum_a_b =LTV_B
              }
              else
              {
                var minimum_a_b = Loan_amount
              }
              document.getElementById('minimum_a_b').value = minimum_a_b.toString();
             })   
			 
            $("#assessed_income_per_month").on('keyup',function(){
              var q = $("#assessed_income_per_month").val()
              var FOIR_NON_SAL = q / 2 
              var existing_liabilities = $("#existing_liabilities").val()
              var Net_amount = FOIR_NON_SAL - existing_liabilities
              document.getElementById('Foir_income_50_non_sal').value = FOIR_NON_SAL.toString();
              document.getElementById('net_amount').value = Net_amount.toString();
             
             })

             $("#existing_liabilities").on('keyup',function(){
              var q = $("#assessed_income_per_month").val()
              var FOIR_NON_SAL = q / 2 
              var existing_liabilities = $("#existing_liabilities").val()
              var Net_amount = FOIR_NON_SAL - existing_liabilities
              document.getElementById('net_amount').value = Net_amount.toString();
             
             })

             $("#Foir_income_50_non_sal").on('keyup',function(){
              var q = $("#assessed_income_per_month").val()
              var FOIR_NON_SAL = q / 2 
              var existing_liabilities = $("#existing_liabilities").val()
              var Net_amount = FOIR_NON_SAL - existing_liabilities
              document.getElementById('net_amount').value = Net_amount.toString();
             
             })

             $("#rate_of_intrest").on('keyup',function(){
             var p = $("#perlakh").val()
             var r = $("#rate_of_intrest").val()/ 1200;
             var n = $("#tenure").val()
             var Net_amount = $("#net_amount").val()
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount = ( totalcost / Net_amount )*100000
             document.getElementById('EMI').value = totalcost.toString();
             document.getElementById('Loan_amount').value = Loan_amount .toString();
             })

            $("#perlakh").on('keyup',function(){
              var p = $("#perlakh").val()
             var r = $("#rate_of_intrest").val()/ 1200;
             var n = $("#tenure").val()
             var Net_amount = $("#net_amount").val()
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI').value = totalcost.toString();
             document.getElementById('Loan_amount').value = Loan_amount .toString();
             })

             $("#tenure").on('keyup',function(){
              var p = $("#perlakh").val()
             var r = $("#rate_of_intrest").val()/ 1200;
             var n = $("#tenure").val()
             var Net_amount = $("#net_amount").val()
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI').value = totalcost.toString();
             document.getElementById('Loan_amount').value = Loan_amount .toString();
             })

             $("#existing_liabilities").on('keyup',function(){
              var p = $("#perlakh").val()
             var r = $("#rate_of_intrest").val()/ 1200;
             var n = $("#tenure").val()
             var Net_amount = $("#net_amount").val()
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI').value = totalcost.toString();
             document.getElementById('Loan_amount').value = Loan_amount .toString();
             })

             $("#assessed_income_per_month").on('keyup',function(){
              var p = $("#perlakh").val()
             var r = $("#rate_of_intrest").val()/ 1200;
             var n = $("#tenure").val()
             var Net_amount = $("#net_amount").val()
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI').value = totalcost.toString();
             document.getElementById('Loan_amount').value = Loan_amount .toString();
             })
 <!-- ================================================================================ -->
             $("#type_of_salary_salaried").on('click',function(){
              var type_of_salary_salaried = $("#type_of_salary_salaried").val()
			   var q = $("#assessed_income_per_month_salaried").val()
              if( type_of_salary_salaried == 'cash')
			  {
				  if(q < 30000)
				  {
					  applicable_foir_salaried_new = (q * 40)/100
				  }
                  else if(q>30001 && q< 40000)
				  {
					  applicable_foir_salaried_new = (q * 45)/100
				  }
				  else if(q>40001 && q<55000)
				  {
					  applicable_foir_salaried_new = (q * 50)/100
				  }
				  else
				  {
					  applicable_foir_salaried_new = (q * 55)/100
				  }
			  }
              else if ( type_of_salary_salaried == 'bank')
              {
                  if(q < 30000)
				  {
					  applicable_foir_salaried_new = (q * 45)/100
				  }
                  else if(q>30001 && q< 40000)
				  {
					  applicable_foir_salaried_new = (q * 50)/100
				  }
				  else if(q>40001 && q<55000)
				  {
					  applicable_foir_salaried_new = (q * 55)/100
				  }
				  else
				  {
					  applicable_foir_salaried_new = (q * 60)/100
				  }
			  }
			   else
			   {
				   applicable_foir_salaried_new = 0 
			   }
              document.getElementById('applicable_foir_salaried').value = applicable_foir_salaried_new.toString();
             })	

             $("#applicable_foir_salaried").on('click',function(){
              var type_of_salary_salaried = $("#type_of_salary_salaried").val()
			   var q = $("#assessed_income_per_month_salaried").val()
              if( type_of_salary_salaried == 'cash')
			  {
				  if(q < 30000)
				  {
					  applicable_foir_salaried_new = (q * 40)/100
				  }
                  else if(q>30001 && q< 40000)
				  {
					  applicable_foir_salaried_new = (q * 45)/100
				  }
				  else if(q>40001 && q<55000)
				  {
					  applicable_foir_salaried_new = (q * 50)/100
				  }
				  else
				  {
					  applicable_foir_salaried_new = (q * 55)/100
				  }
			  }
              else if ( type_of_salary_salaried == 'bank')
              {
                  if(q < 30000)
				  {
					  applicable_foir_salaried_new = (q * 45)/100
				  }
                  else if(q>30001 && q< 40000)
				  {
					  applicable_foir_salaried_new = (q * 50)/100
				  }
				  else if(q>40001 && q<55000)
				  {
					  applicable_foir_salaried_new = (q * 55)/100
				  }
				  else
				  {
					  applicable_foir_salaried_new = (q * 60)/100
				  }
			  }
			   else
			   {
				   applicable_foir_salaried_new = 0 
			   }
              document.getElementById('applicable_foir_salaried').value = applicable_foir_salaried_new.toString();
             })			 
			 
			 
			 
			 $("#property_value_salaried").on('keyup',function(){
              var LTV_dropdown = $("#LTV_dropdown_salaried").val()
              var property_value = $("#property_value_salaried").val()
              var LTV_B = (LTV_dropdown /100 ) * property_value
              document.getElementById('LTV_B').value = LTV_B.toString();
             })

             $("#LTV_dropdown_salaried").on('click',function(){
              var LTV_dropdown = $("#LTV_dropdown_salaried").val()
              var property_value = $("#property_value_salaried").val()
              var LTV_B = (LTV_dropdown /100 ) * property_value
              document.getElementById('LTV_B_salaried').value = LTV_B.toString();
             })
			 
				$("#property_value_salaried").on('keyup',function(){
              var Loan_amount = $("#Loan_amount_salaried").val()
              var LTV_B = $("#LTV_B").val()
              if(Loan_amount > LTV_B  ){
              var minimum_a_b =LTV_B
              }
              else
              {
                var minimum_a_b =Loan_amount
              }
              document.getElementById('minimum_a_b_salaried').value = minimum_a_b.toString();
             }) 
             
			  $("#LTV_dropdown_salaried").on('click',function(){
              var Loan_amount = $("#Loan_amount_salaried").val()
              var LTV_B = $("#LTV_B_salaried").val()
              if(Loan_amount.toString() > LTV_B.toString()  )
			  {
              var minimum_a_b =LTV_B
              }
              else
              {
                var minimum_a_b = Loan_amount
              }
              document.getElementById('minimum_a_b_salaried').value = minimum_a_b.toString();
             })   
			 
            $("#assessed_income_per_month_salaried").on('keyup',function(){
              var FOIR_NON_SAL = $("#applicable_foir_salaried") .val()
              var existing_liabilities = $("#existing_liabilities_salaried").val()
              var Net_amount = FOIR_NON_SAL - existing_liabilities
              document.getElementById('applicable_foir_salaried').value = FOIR_NON_SAL.toString();
              document.getElementById('net_amount_salaried').value = Net_amount.toString();
             
             })

             $("#existing_liabilities_salaried").on('keyup',function(){
               var FOIR_NON_SAL = $("#applicable_foir_salaried") .val()
              var existing_liabilities = $("#existing_liabilities_salaried").val()
              var Net_amount = FOIR_NON_SAL - existing_liabilities
              document.getElementById('applicable_foir_salaried').value = FOIR_NON_SAL.toString();
              document.getElementById('net_amount_salaried').value = Net_amount.toString();
             
             })

             

             $("#rate_of_intrest_salaried").on('keyup',function(){
             var p = $("#perlakh_salaried").val()
             var r = $("#rate_of_intrest_salaried").val() / 1200;
             var n = $("#tenure_salaried").val()
             var Net_amount = $("#net_amount_salaried").val()
             
             var totalcost =Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI_salaried').value = totalcost.toString();
             document.getElementById('Loan_amount_salaried').value = Loan_amount .toString();
             })

            $("#perlakh_salaried").on('keyup',function(){
              var p = $("#perlakh_salaried").val()
             var r = $("#rate_of_intrest_salaried").val() / 1200;
             var n = $("#tenure_salaried").val()
             var Net_amount = $("#net_amount_salaried").val()
            // const interest = (p * (r)) / n;
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI_salaried').value = totalcost.toString();
             document.getElementById('Loan_amount_salaried').value = Loan_amount .toString();
             })

             $("#tenure_salaried").on('keyup',function(){
              var p = $("#perlakh_salaried").val()
             var r = $("#rate_of_intrest_salaried").val() / 1200;
             var n = $("#tenure_salaried").val()
             var Net_amount = $("#net_amount_salaried").val()
             //const interest = (p * (r)) / n;
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI_salaried').value = totalcost.toString();
             document.getElementById('Loan_amount_salaried').value = Loan_amount .toString();
             })

             $("#existing_liabilities_salaried").on('keyup',function(){
              var p = $("#perlakh_salaried").val()
             var r = $("#rate_of_intrest_salaried").val() / 1200;
             var n = $("#tenure_salaried").val()
             var Net_amount = $("#net_amount_salaried").val()
             //const interest = (p * (r)) / n;
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI_salaried').value = totalcost.toString();
             document.getElementById('Loan_amount_salaried').value = Loan_amount .toString();
             })

             $("#assessed_income_per_month_salaried").on('keyup',function(){
              var p = $("#perlakh_salaried").val()
             var r = $("#rate_of_intrest_salaried").val() / 1200;
             var n = $("#tenure_salaried").val()
             var Net_amount = $("#net_amount_salaried").val()
           
             var totalcost = Math.round(p * r / (1-(Math.pow(1/(1 + r), n)))*100)/100;  
             var Loan_amount =  ( totalcost / Net_amount )*100000
             document.getElementById('EMI_salaried').value = totalcost.toString();
             document.getElementById('Loan_amount_salaried').value = Loan_amount .toString();
             })
    });
    </script>
</html>
<!-- Modal -->
