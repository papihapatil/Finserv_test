<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);
//echo $id1;
 //echo $id;
 //exit(); Coapp_8: ["Bhubaneswar","Puri","Cuttack"],
?>

<script type="text/javascript">
var citiesByState = {
Coapp_8: ["Description for code 8"],
Coapp_9: ["Description for code 9"],
Coapp_10: ["Description for code 10"]
}
function makeSubmenu(value) {
if(value.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
else {
var citiesOptions = "";
for(cityId in citiesByState[value]) {
citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
}
document.getElementById("citySelect").innerHTML = citiesOptions;
}
}
function displaySelected() { var country = document.getElementById("countrySelect").value;
var city = document.getElementById("citySelect").value;
alert(country+"\n"+city);
}
function resetSelection() {
document.getElementById("countrySelect").selectedIndex = 0;
document.getElementById("citySelect").selectedIndex = 0;
}
</script>
<html>		
		
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

		
		</div>
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Deviations</h2></div>
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
	
		
		<form id="credit_saction_form_personal_discussion" action="<?= base_url('index.php/credit_manager_user/deviations_details')?>" method="post">
	    <div class="row ">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 justify-content-center shadow bg-white rounded margin-10 padding-15" >
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Code</span>
					</div>
				   <body onload="resetSelection()">
					<select id="countrySelect" size="1" onchange="makeSubmenu(this.value)" class="form-control" name="code">
						<option value="" disabled selected>Select Code</option>
						<option>Coapp_8</option>
						<option>Coapp_9</option>
						<option>Coapp_10</option>
					</select>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Description</span>
					</div>
					<select id="citySelect" size="1" class="form-control" name="description">
						<option value="" disabled selected>Description</option>
						<option></option>
						
					
					</select>
					</body>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Level</span>
					</div>			
					<select class="form-control" name="level" id="level">
						<option value="">Select Level</option>
						<option value="1" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '1') echo ' selected="selected"'; ?>>1</option>
						<option value="2" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '2') echo ' selected="selected"'; ?>>2</option>
						<option value="3" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '3') echo ' selected="selected"'; ?>>3</option>
						<option value="4" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '4') echo ' selected="selected"'; ?>>4</option>
					</select>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mitigants</span>
					</div>			
					<select class="form-control" name="mitigants" id="mitigants">
						<option value="">Select</option>
						<option value="property_owner"  <?php if(!empty($data_row_file_path))if ($data_row_file_path->mitigants == 'property_owner') echo ' selected="selected"'; ?>>property owner</option>
						<option value="co_applicant"  <?php if(!empty($data_row_file_path))if ($data_row_file_path->mitigants == 'co_applicant') echo ' selected="selected"'; ?>>co-applicant</option>
				
					</select>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Approved By</span>
					</div>			
					<div style="margin-top:8px;margin-left:-15px;" class="col">
						<input  placeholder="Approved By" name="approved_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
					</div>
					<div style="margin-top: 20px;" class="row col-12 justify-content-center">
						<div>
							<button class="login100-form-btn" style="background-color: #25a6c6;" name="submit" value="submit">SUBMIT
							</button>
						</div>		
					</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
		
	</form>
</html>        
<?php 
}
else
{
?>	
				
					<?php//				} ?>					
			</div>

		
		</div>
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Deviations</h2></div>
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
	
		
		<form id="credit_saction_form_personal_discussion" action="<?= base_url('index.php/credit_manager_user/deviations_details')?>" method="post">
	    <div class="row ">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 justify-content-center shadow bg-white rounded margin-10 padding-15" >
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Code</span>
					</div>
				   <body onload="resetSelection()">
					<select id="countrySelect" size="1" onchange="makeSubmenu(this.value)" class="form-control" name="code">
						<option value="" disabled selected>Select Code</option>
						<option>Coapp_8</option>
						<option>Coapp_9</option>
						<option>Coapp_10</option>
					</select>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Description</span>
					</div>
					<select id="citySelect" size="1" class="form-control" name="description">
						<option value="" disabled selected>Description</option>
						<option></option>
						
					
					</select>
					</body>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Level</span>
					</div>			
					<select class="form-control" name="level" id="level">
						<option value="">Select Level</option>
						<option value="1" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '1') echo ' selected="selected"'; ?>>1</option>
						<option value="2" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '2') echo ' selected="selected"'; ?>>2</option>
						<option value="3" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '3') echo ' selected="selected"'; ?>>3</option>
						<option value="4" <?php if(!empty($data_row_file_path))if ($data_row_file_path->level == '4') echo ' selected="selected"'; ?>>4</option>
					</select>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mitigants</span>
					</div>			
					<select readonly class="form-control" name="mitigants" id="mitigants">
					    <option readonly value="">Select</option>
						<option readonly  value="property_owner"  <?php if(!empty($data_row_file_path))if ($data_row_file_path->mitigants == 'property_owner') echo ' selected="selected"'; ?>>property owner</option>
						<option readonly value="co_applicant"  <?php if(!empty($data_row_file_path))if ($data_row_file_path->mitigants == 'co_applicant') echo ' selected="selected"'; ?>>co-applicant</option>
					</select>
					<div style="margin-top: 0px;" class="col">
						<span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Approved By</span>
					</div>			
					<div style="margin-top:8px;margin-left:-15px;" class="col">
						<input readonly placeholder="Approved By" name="approved_by" class="form-control" type="text" value="<?php echo $row_2->FN." ".$row_2->MN." ".$row_2->LN;?>">
					</div>
					<div style="margin-top: 20px;" class="row col-12 justify-content-center">
								
					</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
		
	</form>
</html> 
		
<?php
}
?>		


