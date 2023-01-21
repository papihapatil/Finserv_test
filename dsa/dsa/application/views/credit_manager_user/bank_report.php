<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);
//echo $id1;
 //echo $id;
 //exit(); Coapp_8: ["Bhubaneswar","Puri","Cuttack"],
?>
<html>

		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Bank Report</h2></div>
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
		
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id1==$row->credit_manager_id) 
				{?>
				 <div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href=""><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
									
			</div>
     	</div>
		
	

     <form id="credit_saction_form_personal_discussion" action="<?= base_url('index.php/credit_manager_user/save_bank_report')?>" method="post">
						
		<div class="row">
		        <div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
						<div class="col-sm-6">
						    <div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">EMI</label>
								<input required type="text" class="form-control" name="emi"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->emi;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">Credits</label>
								<input required type="text" class="form-control" name="credits"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->credits;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Outward</label>
								<input required type="text" class="form-control" name="no_of_outward"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->outward;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Digital Receipts</label>
								<input required type="text" class="form-control" name="digital_receipts"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->digital_receipts;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of total credit</label>
								<input required type="text" class="form-control" name="no_of_total_credit"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->total_credit;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
						</div>
						
						
						
						<div class="col-sm-6">
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">Average Balance</label>
								<input required type="text" class="form-control" name="average_balance"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->average_balance;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Inward</label>
								<input required type="text" class="form-control" name="no_of_inward"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->inward;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Digital Payments</label>
								<input required type="text" class="form-control" name="digital_payment"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->digital_payments;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of total debit</label>
								<input required type="text" class="form-control" name="no_of_total_debit"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->total_debit;?>" onkeypress="return onlyNumberKey(event)" maxlength="11">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
							   <button type="button" class="btn btn-success" value="">View Report</button>
							</div>
						</div>
				    </div>
					
					
				
					
			
				
					
				</div>
			    <div class="col-sm-2"></div>
			</div>
			<div style="margin-top: 20px;" class="row col-12 justify-content-center"><div >
				
			<center><button class="login100-form-btn" style="background-color: #25a6c6;" name="submit" value="submit"> Submit<button></center>	 
			</div>

        </form>
<?php
}
else
{	
?>

									
			</div>
     	</div>
		
	

     <form id="credit_saction_form_personal_discussion" action="<?= base_url('index.php/credit_manager_user/save_bank_report')?>" method="post">
						
		<div class="row">
		        <div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
						<div class="col-sm-6">
						    <div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">EMI</label>
								<input readonly type="text" class="form-control" name="emi"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->emi;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">Credits</label>
								<input readonly type="text" class="form-control" name="credits"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->credits;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Outward</label>
								<input readonly type="text" class="form-control" name="no_of_outward"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->outward;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Digital Receipts</label>
								<input readonly type="text" class="form-control" name="digital_receipts"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->digital_receipts;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of total credit</label>
								<input readonly type="text" class="form-control" name="no_of_total_credit"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->total_credit;?>">
							</div>
						</div>
						
						
						
						<div class="col-sm-6">
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">Average Balance</label>
								<input readonly type="text" class="form-control" name="average_balance"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->average_balance;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Inward</label>
								<input readonly type="text" class="form-control" name="no_of_inward"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->inward;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of Digital Payments</label>
								<input readonly type="text" class="form-control" name="digital_payment"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->digital_payments;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
								<label style="width:80%;margin-left:10px;color:black;">No of total debit</label>
								<input readonly type="text" class="form-control" name="no_of_total_debit"  placeholder="" value="<?php if(isset($row_bank_form)) echo $row_bank_form->total_debit;?>">
							</div>
							<div class="form-group" style="width:80%;margin-left:40px;">
							   <button type="button" class="btn btn-success" value="">View Report</button>
							</div>
						</div>
				    </div>
					
					
				
					
			
				
					
				</div>
			    <div class="col-sm-2"></div>
			</div>
			<div style="margin-top: 20px;" class="row col-12 justify-content-center"><div >
				
			</div>

        </form>



<?php 
}?>      
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
		
</html>
<!-- Modal -->
