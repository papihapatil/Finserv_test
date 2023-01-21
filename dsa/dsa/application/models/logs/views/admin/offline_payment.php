<style>
 .steps  li {
    margin: 0px;
    list-style-type: circle;
}
 .main {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #0088cc;
}

.Internal_nav {
  float: left;
      margin-left: auto;
    margin-right: auto;
}

.Internal_nav  {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.Internal_nav a:hover {
   border: 1px solid white;
    color: white;
}
		
 
</style>
<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">OFFLINE PAYMENT MODE</small>
                    </div>
                </div>            	
            </div>
        </div>
</div>



 <div class="external">
      <div class="middle">
        <div class="internal">
			<div class="row justify-content-center col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12" >
				
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
					
					<div class="card mb-3">
					  <div class="row no-gutters">			    
						<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
						  <div class="card-body">
							<div class="row justify-content-center">
									<!--<h2 class="text-center" style="color:#d62122;">Payment Details</h2>-->
							</div>
							 <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12 ">
								  <div class="container">
      
     
	   <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12 main">
	
	    <input type="text" class="form-control" id="save_payment_mode"  value="<?php if(isset($payment_mode)){echo $payment_mode;} ?>" hidden>
	    <div class="row col-md-4 col-sm-4 col-xs-4 col-lg-4 col-xl-4 Internal_nav" id="Cheque">
		Cheque Payment
		</div>
		<div class="row col-md-4 col-sm-4 col-xs-4 col-lg-4 col-xl-4 Internal_nav" id="Cash">
		Cash Payment
		</div>
		<div class="row col-md-4 col-sm-4 col-xs-4 col-lg-4 col-xl-4 Internal_nav" id="UPI">
		UPI Payment
		</div>
	   </div>
	   <div class="row justify-content-center">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
			
			<div class="card mb-3">
			  <div class="row no-gutters">			    
			    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
			      <div class="card-body">
				    <div class="row justify-content-center">
					      <?php if(isset($payment_details)){ if($payment_details->payment_status=='Successful'){?>  <h2 class="text-center" style="color:#28a745;"> Payment is Done Successfully</h2><?php }else{ ?>
						  <h2 class="text-center" style="color:#d62122;">Your Payment is Fail</h2><?php } }?>
					</div>
					<div class="row justify-content-center">
					      <?php if(isset($result)){ if($result==2){?>  <h2 class="text-center" style="color:#28a745;"> Cheque details are save successfully Do not Proceed till Payment recieved date not updated by Accounts Department </h2><?php }else{  if($result==3){ ?>
						  <h2 class="text-center" style="color:#d62122;">Something get Wrong in saving data</h2><?php } } }?>
					</div>
					<div class="row justify-content-center">
					      <?php if(isset($result)){ if($result==4){?>  <h2 class="text-center" style="color:#28a745;"> payment details are save successfully Do not Proceed till Payment recieved date not updated by Accounts Department</h2><?php }else {if($result==5){ ?>
						  <h2 class="text-center" style="color:#d62122;">Something get Wrong in saving data</h2><?php } } }?>
					</div>
					
					<div class="row ">
					    <div class="col-md-2 col-sm-1 col-xs-1 col-lg-2 col-xl-2">
						</div>
					    <div class="col-md-10 col-sm-10 col-xs-10 col-lg-10 col-xl-10">
					    
					     </div>
					</div>
				   
			        
			        
			      </div>
			    </div>
			  
			  </div>
			</div>		
		</div>	
		
	</div>

	   <div id="upload_attach">
	   <Form action="<?php echo base_url('index.php/admin/upload_cheque');?>" method="post" enctype="multipart/form-data">
												<div class="row" style="margin-top:8px;">
												   
													
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-left:auto; margin-right:auto;">
													   <div class="row">
													   <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
															<div class="input-group " style="margin-left: 8px;" required>
															 
															   <input type="text" value="<?php if(isset($Customer_data)){echo $Customer_data->UNIQUE_CODE; }?>"  name="cust_id" hidden>
																 <div class="custom-file">
																      
																	<input type="file" class="custom-file-input form-control" id="inputGroupFile01" name="userfile[]"
																	  aria-describedby="inputGroupFileAddon01">
																	<label class="custom-file-label" for="inputGroupFile01" id="filename" required>Choose file</label>
																  </div>
																  
															</div>
															
															
													    </div>
														<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
														         <button type="submit" id="upload"  name="upload" class="btn btn-primary" style="padding:10px;">Upload</button> 
														</div>
														<input type="text" name="upload_mode" id="upload_mode"  hidden>
													   </div>
												    </div>
												</div>
												
												<div class="row" style="margin-top: 8px;">
												<?php  if(isset($documents)){?>
												
												
													
														
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-left:auto; margin-right:auto;">
														<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
															<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10"><a href="<?php echo base_url('images/documents/'.$documents->DOC_NAME); ?>" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> <span  style="font-size: 13px; color: black; font-weight: bold;">
																				<?php echo strtoupper($documents->DOC_TYPE); ?>
																			</span></a></div>
															<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"><a href="<?php echo base_url('images/documents/'.$documents->DOC_NAME); ?>" target="_blank"> <i class="fa fa-eye" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
															</div>
															<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"> 	
															<a style="margin-left: 8px; " data-toggle="modal" data-id = "<?php echo $documents->ID;?>" data-target="#deleteModel" class="modal_test"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																				
															</div>
																	
														</div>								
																					
														</div>					
														
													 <?php } ?>
												</div>
			
													
										       
												
		</form>
       </div>
	 
	 <div id="cheque_mode">
	  
		
	   <form action="<?php echo base_url(); ?>index.php/admin/offline_payment" method="POST"  style="margin-left:auto; margin-right:auto;" id="offline_payment">
	                  <div class="form-group">
						<?php ?>
					    <input type="text" value="<?php if(isset($Customer_data)){echo $Customer_data->UNIQUE_CODE; }?>"  name="cust_id" id="cust_id"  hidden>
						<input type="text" value="<?php echo $this->input->get("x");  ?>"  name="cust_id_encoded"  id="cust_id_encoded" hidden>
						<input type="text" value="Cheque"  name="payment_mode"  id="payment_mode"  hidden>
	                    <label  class="col-12 control-label padding-10">Account Holder Name</label>	                         
	                    <input type="text"   name="Acc_holder_name" class="form-control" id="email" pattern="[a-zA-Z ]+"  title="Only Alphabets Are allow" value="<?php if(isset($Customer_data)){echo $Customer_data->FN.' ';if(!empty($Customer_data->MN)){ echo $Customer_data->MN.' ';} echo $Customer_data->LN;}  ?>" required>
						<label  class="col-12 control-label padding-10">Bank Name</label>	                         
	                    <input  name="Bank_name" type="text" class="form-control" id="email"  pattern="[a-zA-Z ]+"  title="Only Alphabets Are allow" value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Bank_name;}  ?>" required >
						<label  class="col-12 control-label padding-10">Branch Name</label>	                         
	                    <input name="Branch_name" type="text" class="form-control" id="email" pattern="[a-zA-Z ]+"  title="Only Alphabets Are allow"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Branch_name;}  ?>" required>
						<label  class="col-12 control-label padding-10">Cheque No</label>	                         
	                    <input  name="Check_no" type="text" class="form-control" id="email"  pattern="^[0-9]+$" maxlength="6"  title="Only Numbers Are allow"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Check_no;} ?>" required>
						<label  class="col-12 control-label padding-10">IFSC Code</label>	  
						<input name="IFSC_code" type="text" id="country_code" name="country_code" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" class="form-control" title="Example : SBIN0125620"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->IFSC_code;} ?>" required>
						<label  class="col-12 control-label padding-10">Account Type</label>	                         
	                    <select class="form-control" name="Acc_type" required>
						<option> Select Account Type </option>
						<option value="SAVING" <?php if(isset($get_payment_deteils_offline)){if($get_payment_deteils_offline->Acc_type=='SAVING'){echo 'selected';}} ?>> SAVINGS</option>
						<option value="CURRENT" <?php if(isset($get_payment_deteils_offline)){if($get_payment_deteils_offline->Acc_type=='CURRENT'){echo 'selected';}} ?>> CURRENT </option>
						
						</select>
						<label  class="col-12 control-label padding-10">Cheque Received By</label>
						<select name="RO_ID"  class="form-control" required id="RO_ID">
						<option> Select </option>
						<?php foreach ($RO as $R){?>
						<option value="<?php echo $R->UNIQUE_CODE;?>" <?php if(!empty($get_payment_deteils_offline)){if($get_payment_deteils_offline->cheque_handover_to== $R->UNIQUE_CODE){ echo 'selected';}} ?>><?php echo $R->FN.' '.$R->LN;?></option>
						<?php } ?>
						</select>
						<input type="text" name="RO_name" id="RO_name" hidden>
						<label  class="col-12 control-label padding-10">Payment Present date</label>
						<input type="date" class="form-control" id="email" name="Recived_date" value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Recived_date;} ?>" required>
						<label  class="col-12 control-label padding-10">Payment Received  date</label>
						<input type="date" class="form-control" id="Recived_date_acc" name="Recived_date_acc"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Payment_Recived_date;} ?>" required readonly>			
                        <label  class="col-12 control-label padding-10">Amount in RS</label>	                         
	                    <input type="number" class="form-control" id="Login_fees"  value="<?php if(isset($login_fees)){echo $login_fees;} ?>"title="Only Alphabets Are allow" name="Amount" required>						
	                  </div>                  

	                  <!-- Modal Footer -->
			           
			                <button type="submit" class="btn btn-primary" id="save" name="save_cheque" >
			                    Save
			                </button>
			            
	                </form>
	    </div>
		<div id="upi_mode" style="display:none;">
	  			
					<form action="<?php echo base_url(); ?>index.php/admin/offline_payment_upi" method="POST"  style="margin-left:auto; margin-right:auto;" id="upi_payment">
	                  <div class="form-group">
					    <input type="text" value="<?php if(isset($Customer_data)){echo $Customer_data->UNIQUE_CODE; }?>"  name="cust_id" id="cust_id"  hidden>
						<input type="text" value="<?php echo $this->input->get("x");  ?>"  name="cust_id_encoded"  id="cust_id_encoded" hidden>
						<input type="text" value="UPI"  name="payment_mode" id="payment_mode"   hidden>
	                    <label  class="col-12 control-label padding-10">Transaction / UTR id</label>	                         
	                    <input type="text"  name="transaction_id" class="form-control" id="email"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->transaction_id;} ?>"  required>
						<input type="text"   name="Acc_holder_name" class="form-control" id="email" pattern="[a-zA-Z ]+"  title="Only Alphabets Are allow" value="<?php if(isset($Customer_data)){echo $Customer_data->FN.' ';if(!empty($Customer_data->MN)){ echo $Customer_data->MN.' ';} echo $Customer_data->LN;}  ?>" hidden>
						
					
						<label  class="col-12 control-label padding-10">Credited to</label>	                         
	                    <select class="form-control" name="Account" required>
						<option> Select Account </option>
						<option value="PAYTM" <?php if(isset($get_payment_deteils_offline)){if($get_payment_deteils_offline->Account=='PAYTM'){echo 'selected';}} ?>> PAYTM</option>
						<option value="ICICI" <?php if(isset($get_payment_deteils_offline)){if($get_payment_deteils_offline->Account=='ICICI'){echo 'selected';}} ?>> ICICI </option>
						</select>
						<input type="text" name="RO_name" id="RO_name" hidden>
						<label  class="col-12 control-label padding-10">Date Of Transaction </label>
						<input type="date" class="form-control" id="email" name="Recived_date"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Recived_date;} ?>" required>
						<label  class="col-12 control-label padding-10">Payment Received  date</label>
						<input type="date" class="form-control" id="Recived_date_acc" name="Recived_date_acc"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Payment_Recived_date;} ?>" required readonly>			
                        <label  class="col-12 control-label padding-10">Amount in RS</label>	                         
	                    <input type="number" class="form-control" id="Login_fees"  value="<?php if(isset($login_fees)){echo $login_fees;} ?>" title="Only Alphabets Are allow" name="Amount" required>						
	                  </div>                  

	                  <!-- Modal Footer -->
			           
			                <button type="submit" class="btn btn-primary" id="save_upi" name="save_upi" >
			                    Save
			                </button>
			            
	                </form>
			
													
										       
												
		
		
	   
	    </div>
		<div id="cash_payment" style="display:none;">
		<form action="<?php echo base_url(); ?>index.php/admin/offline_payment_cash" method="POST"  style="margin-left:auto; margin-right:auto;" id="cash_offline_payment">
	                  <div class="form-group">
					    <input type="text" value="<?php if(isset($Customer_data)){echo $Customer_data->UNIQUE_CODE; }?>"  name="cust_id" id="cust_id"  hidden>
						<label  class="col-12 control-label padding-10">Cash Received By</label>
						<select name="RO_ID"  class="form-control" required id="RO_ID1">
						<option> Select </option>
						<?php foreach ($RO as $R){?>
						<option value="<?php echo $R->UNIQUE_CODE;?>" <?php if(!empty($get_payment_deteils_offline)){if($get_payment_deteils_offline->cheque_handover_to== $R->UNIQUE_CODE){ echo 'selected';}} ?>><?php echo $R->FN.' '.$R->LN;?></option>
						<?php } ?>
						</select>
						<input type="text" name="RO_name" id="RO_name1" hidden >
						<input type="text" value="Cash"  name="payment_mode"  id="payment_mode"  hidden>
						<label  class="col-12 control-label padding-10">Cash Received Date</label>
						<input type="date" class="form-control" id="email" name="Recived_date"   value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Recived_date;} ?>" required>	
						<label  class="col-12 control-label padding-10">Payment Received  date</label>
						<input type="date" class="form-control" id="Recived_date_acc" name="Recived_date_acc"  value="<?php if(isset($get_payment_deteils_offline)){echo $get_payment_deteils_offline->Payment_Recived_date;} ?>" required readonly>			
                        <label  class="col-12 control-label padding-10">Amount in RS</label>	                         
	                    <input type="number" class="form-control" id="Login_fees"  value="<?php if(isset($login_fees)){echo $login_fees;} ?>"title="Only Alphabets Are allow" name="Amount" required>						
	                  </div>                  

	                  <!-- Modal Footer -->
			           
			                <button type="submit" class="btn btn-primary" id="save1" name="cash_save">
			                    Save
			                </button>
			            
	                </form>
		</div>
	   </div>
    
    </div>
<!----------------------------------------------------------------------------- -->
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
	              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_doc_cheque?UID=<?php if(!empty($Customer_data)){ echo $Customer_data->UNIQUE_CODE;} ?>" method="POST" id="doc_delete_Legal">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Document?</label>	                         
	                    <input name="id" type="number" class="idform" hidden />
											
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
    <script>
    $(document).ready(function(e){
		
		var save_payment_mode=$("#save_payment_mode").val();
		

		

        $("#Cheque").click(function(){
           $('#Cheque').css('border', '5px solid #d9dbda');  
		   $('#Cheque').css('box-shadow', 'inset 0px 0px 0px 5px #969696'); 
		   $('#Cheque').css('box-sizing', 'border-box');
		   $('#Cash').css('border', '');  
		   $('#Cash').css('box-shadow', ''); 
		   $('#Cash').css('box-sizing', '');
		   $('#cheque_mode').show();
		   $('#cash_payment').hide();
		   $('#upi_mode').hide();
		   $('#upload_attach').show();
		   $('#upload_mode').val('Cheque');
        });
		$("#Cash").click(function(){
           $('#Cash').css('border', '5px solid #d9dbda');  
		   $('#Cash').css('box-shadow', 'inset 0px 0px 0px 5px #969696'); 
		   $('#Cash').css('box-sizing', 'border-box');
		   $('#Cheque').css('border', '');  
		   $('#Cheque').css('box-shadow', ''); 
		   $('#Cheque').css('box-sizing', '');
		   $('#cheque_mode').hide();
		   $('#cash_payment').show();
		   $('#upi_mode').hide();
		   $('#upload_attach').hide();
		   $('#upload_mode').val('Cash');
        });
		$("#UPI").click(function(){
           $('#UPI').css('border', '5px solid #d9dbda');  
		   $('#UPI').css('box-shadow', 'inset 0px 0px 0px 5px #969696'); 
		   $('#UPI').css('box-sizing', 'border-box');
		   $('#Cash').css('border', '');  
		   $('#Cash').css('box-shadow', ''); 
		   $('#Cash').css('box-sizing', '');
		   $('#Cheque').css('border', '');  
		   $('#Cheque').css('box-shadow', ''); 
		   $('#Cheque').css('box-sizing', '');
		   $('#cheque_mode').hide();
		   $('#cash_payment').hide();
		   $('#upi_mode').show();
		   $('#upload_attach').show();
		   $('#upload_mode').val('UPI');
        });
		$("#upload").click(function(){
			
			 var filename=$('#filename').text();
			 
			
			 if(filename=='Choose file')
			 {
				swal ( "Oops" ,  "Please Choose File !" ,  "warning" );
				 return false;
			 }
          
        });
	
		if(save_payment_mode!='')
		{
			$("#"+save_payment_mode).click();
		}
		else{
			$("#Cheque").click();
		}
     
    });
	
	document.getElementById('inputGroupFile01').onchange = function () {
	var fullPath=this.value;
	var filename = fullPath.replace(/^.*[\\\/]/, '')
    
	$('#filename').text(filename);
	$('#filename1').text(filename);
};
    </script>
	<script>
	$("#offline_payment").submit(function(e){
		  var form = $(this);
              var form_url = form.attr('action');
           
              var dataArr = form.serialize();
		  e.preventDefault ? e.preventDefault() : (e.returnValue = false);
		    
			var cust_id=$("#cust_id").val();
			var Recived_date_acc=$("#Recived_date_acc").val();
			var cust_id_encoded=$("#cust_id_encoded").val();
			var payment_mode='Cheque';
		
			 var url = window.location.origin+"/finserv_test/dsa/dsa/index.php/admin/check_payment_doc_present";
			$.ajax({
					 type:'POST',
					 url:url,
					  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
					 data:{cust_id:cust_id},
					 success:function(data){
						
                         var obj =JSON.parse(data);
						
						
						
								  if(obj.doc == 0)
								  {
										 swal ( "Oops" ,  "Please Upload Cheque Image" ,  "warning" );
										  return false;
								  }
								  else
								  {
									  
									  $.ajax({
												 type: "POST",
												 url: form_url,
												 data: dataArr,
												 success:function(data){
													   var obj_suc =JSON.parse(data);
													   if(Recived_date_acc=='')
													   {
														window.location.replace("/finserv_test/dsa/dsa/index.php/admin/offline_payment_view?x="+cust_id_encoded+"&z="+obj_suc.result+"&y="+cust_id+"&w="+payment_mode);
													   }
													   else{
													   window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Payment_result_offline?x="+obj_suc.result+"&y="+cust_id);
													   }
													 
												 }
									  });
								  }
								  
								 
								  


					 }
					});
			
			 
          
        });
		$("#upi_payment").submit(function(e){
		  var form = $(this);
              var form_url = form.attr('action');
			  var Recived_date_acc=$("#Recived_date_acc").val();
			var cust_id_encoded=$("#cust_id_encoded").val();
			var payment_mode='UPI';
              var dataArr = form.serialize();
		  e.preventDefault ? e.preventDefault() : (e.returnValue = false);
		    
			var cust_id=$("#cust_id").val()
			
			 var url = window.location.origin+"/finserv_test/dsa/dsa/index.php/admin/check_payment_doc_present";
			$.ajax({
					 type:'POST',
					 url:url,
					  
					 
					 data:{cust_id:cust_id},
					 success:function(data){
						
                         var obj =JSON.parse(data);
						
						
						
								  if(obj.doc == 0)
								  {
										 swal ( "Oops" ,  "Please Upload Cheque Image" ,  "warning" );
										  return false;
								  }
								  else
								  {
									  
									  $.ajax({
												 type: "POST",
												 url: form_url,
												 data: dataArr,
												 success:function(data){
													   var obj_suc =JSON.parse(data);
													   if(Recived_date_acc=='')
													   {
														window.location.replace("/finserv_test/dsa/dsa/index.php/admin/offline_payment_view?x="+cust_id_encoded+"&z="+obj_suc.result+"&y="+cust_id+"&w="+payment_mode);
													   }
													   else{
													   window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Payment_result_offline?x="+obj_suc.result+"&y="+cust_id);
													   }
													 
												 }
									  });
								  }
								  
								 
								  


					 }
					});
			
			 
          
        });
		$("#cash_offline_payment").submit(function(e){
		    var form = $(this);
            var form_url = form.attr('action');
            var dataArr = form.serialize();
			var Recived_date_acc=$("#Recived_date_acc").val();
			var payment_mode='Cash';
			var cust_id_encoded=$("#cust_id_encoded").val();
		    e.preventDefault ? e.preventDefault() : (e.returnValue = false);
			var cust_id=$("#cust_id").val();
			
			
									  
									  $.ajax({
												 type: "POST",
												 url: form_url,
												 data: dataArr,
												 success:function(data){
													   var obj_suc =JSON.parse(data);
													   if(Recived_date_acc=='')
													   {
														window.location.replace("/finserv_test/dsa/dsa/index.php/admin/offline_payment_view?x="+cust_id_encoded+"&z="+obj_suc.result+"&y="+cust_id+"&w="+payment_mode);
													   }
													   else
													   {
													  
													   window.location.replace("/finserv_test/dsa/dsa/index.php/admin/Payment_result_offline?x="+obj_suc.result+"&y="+cust_id);
													   }
													 
												 }
									  });
								  
			
			 
          
        });
		$( "#RO_ID" ).change(function() 
		{
			
			 var value=$("#RO_ID option:selected").text();
			//alert(value);
			
		$('#RO_name').val(value);
		});
		$( "#RO_ID1" ).change(function() 
		{
			
			 var value=$("#RO_ID1 option:selected").text();
			
		$('#RO_name1').val(value);
		});
		
	</script>
								
								  
							</div>
							
							
							
							
						  </div>
						</div>
					  
					  </div>
					</div>		
				</div>	
		
	</div>
	<script>
	
	</script>