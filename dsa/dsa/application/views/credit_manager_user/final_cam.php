<!DOCTYPE html>
<?php ini_set('short_open_tag', 'On'); ?>
<?php 

  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
 $id = $_GET['ID']; // shows id of customer
 // $id = $this->session->userdata("id");
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);

?>
<style>
.designe{
	border:1px solid ;
	
}
.block:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -1px;
}
.block1:after {
  color: #ccc;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
  margin-top: -82px;
}

.block1:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block1 {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}

.block:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block {
  background-color: #ccc;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active {
  background-color: #25a6c6;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_Active:after {
  color: #25a6c6;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_Active:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}
.block_completed {
  background-color: #83dcf0;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  margin:16px;
}
.block_completed:after {
  color: #83dcf0;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  right: -23px;
}

.block_completed:before {
  color: #f0f3f5;
  border-left: 23px solid;
  border-top: 23px solid transparent;
  border-bottom: 23px solid transparent;
  display: inline-block;
  content: '';
  position: absolute;
  left: -23px;
  margin-left:20px;
}


.block_hold {
  background-color: yellow;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_reject {
  background-color: red;
 
  width: 100px;
  height: 45px;
  display: inline-block;
  position: relative;
  	margin:16px;
}
.block_font{
	margin-left:7%;
	font-size:12px;
	color:gray;
}
.block_font_active{
	margin-left:7%;
	font-size:12px;
	color:White;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<?php 
if(!empty($final_cam_table))
{
$cust_employment_details = json_decode($final_cam_table->cust_employment_details);
}
?>
<?php $this->session->set_userdata("CM_ID",$CM_ID);

if(!empty($data_row_PD_details))
{
$Basic_details_JSON = json_decode($data_row_PD_details->Basic_details_JSON);
$Applicant_details_JSON = json_decode($data_row_PD_details->Applicant_details_JSON);
$Applicant_family_details_JSON=json_decode($data_row_PD_details->Applicant_family_details_JSON);
$Applicant_family_members_JSON=json_decode($data_row_PD_details->Applicant_family_members_JSON);
$current_employement_json=json_decode($data_row_PD_details->current_employement_json);
$pd_details_json=json_decode($data_row_PD_details->pd_details_json);
$business_details_json=json_decode($data_row_PD_details->business_details_json);
}
?>
    <div class="c-body">
	    <main class="c-main">
		    <div class="container-fluid">
			   <div class="fade-in">
				    <div class="margin-10 padding-5"> 
					    <div style="line-height: 40px; margin-left: 10px; margin-top: 20px;">
					      <div class="shadow bg-white rounded margin-10 padding-15 " style="padding:25px;" >
                  <form class="form-register"  id="form_1" action="<?php echo base_url()?>index.php/credit_manager_user/final_cam_save" method="post">
                    <input type="text" name="unique_code" value="<?php  echo $_GET['ID']; ?>" hidden >
                    <table class="table table-bordered">
                        <tr>
                          <td><b>Customer Name (from pd): <?php if(!empty($data_row_PD_details)) { if(!empty($Applicant_details_JSON)) echo $Applicant_details_JSON->applicant_name; } else { if(!empty($row)) echo $row->FN." ".$row->MN." ".$row->LN;} ?></b></td>
                          <td>Date of PD (from pd): <?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->Date; }?></td>
                          <td>Product (from pd): <?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->Product; }?></td>
                          <td>Branch (from login): <?php if(!empty($row)) { echo $row->Location; }?></td>
                          
                        </tr>
                        <tr>
                          <td>PD Done By (from pd): <?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PDDoneby; }?></td>
                          <td>Person Met (from pd): <?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PersonMet; }?></td>
                          <td><b>Applied Loan Amount  (from recomndation): <?php if(!empty($data_row_sanction_form)) { if(!empty($data_row_sanction_form)) echo $data_row_sanction_form->final_loan_amount; }?></b></td>
                          <td>Credit Officer (from pd): <?php if(!empty($data_row_PD_details)) { if(!empty($Basic_details_JSON)) echo $Basic_details_JSON->PDDoneby; }?></td>
                        </tr>
                        <tr>
                          <td>Place of PD  (from pd): <?php if(!empty($data_row_PD_details)) { if(!empty($pd_details_json)) echo $pd_details_json->PDAddress; }?></td>
                          <td>Primary Profile of PD Person (from pd):  <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) { echo $Basic_details_JSON->PrimaryProfileOfPDPerson; } ?></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                    <!----------------------------------------------Personal Information---------------------------------------------------------------->
                    <table class="table table-bordered">
                      <tr  style="background-color: #C24641;"><th style="width:100%;padding-left:5px;color:white;font-size:10px;">PERSONAL INFORMATION</th></tr>
                    </table>
                    <table class="table table-bordered">
                              
                                  <tbody style="margin-top: 5rem">
                                            <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
                                      <td  ><span   >PARTICULARS</span></td>
                                      <td  ><b><span   >APPLICANT</span></b></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                      <td  ><b><span   >CO-APPLICANT <?php echo $i;?></span></b></td>
                                    <?php $i++; }?>
                                </tr>
                                
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >NAME</span></td>
                                    <td   ><?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){echo ucwords($coapplicant->FN)." ".ucwords($coapplicant->MN)." ".ucwords($coapplicant->LN);}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >EMAIL ID</span></td>
                                    <td   ><?php if(!empty($row)){ echo $row->EMAIL;}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo $coapplicant->EMAIL;}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >RELATION </span></td>
                                    <td   ></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ if(isset($coapplicant->relation)) echo $coapplicant->relation;}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >AGE</span></td>
                                    <td   > <?php if(!empty($row)){ echo $row->AGE;} ;?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo $coapplicant->AGE;} ;?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >NO OF DEPENDENTS</span></td>
                                    <td   ><?php if(!empty($NO_OF_DEPENDANTS)){ echo $NO_OF_DEPENDANTS;}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   > <?php if(!empty($coapplicant)){ echo $coapplicant->NO_OF_DEPENDANTS;}?></td>
                                    <?php $i++; }?>
                                </tr>
                                
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >HIGHEST EDUCATION</span></td>
                                    <td   ><?php if(!empty($row)){ echo ucwords($row->EDUCATION_BACKGROUND);}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->EDUCATION_BACKGROUND);}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >MARITAL STATUS</span></td>
                                    <td   ><?php if(!empty($row)){ echo ucwords($row->MARTIAL_STATUS);} ?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->MARTIAL_STATUS);} ?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >CONTACT NO</span></td>
                                    <td   ><?php if(!empty($row)){ echo $row->MOBILE;}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo $coapplicant->MOBILE;}?> </td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >PERMANENT ADDRESS</span></td>
                                    <td ><?php if(!empty($PER_ADDRS_LINE_1))echo $PER_ADDRS_LINE_1." ";if(!empty($PER_ADDRS_LINE_2))echo $PER_ADDRS_LINE_2." "; if(!empty($PER_ADDRS_LINE_3))echo $PER_ADDRS_LINE_3;?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->PER_ADDRS_LINE_1)." ";}if(!empty($coapplicant->PER_ADDRS_LINE_2)){  echo ucwords($coapplicant->PER_ADDRS_LINE_2)." ";}if(!empty($coapplicant->PER_ADDRS_LINE_3)){  echo ucwords($coapplicant->PER_ADDRS_LINE_3);}?></td>
                                    <?php $i++; }?>
                                </tr>
                                
                              
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >CURRENT ADDRESS</span></td>
                                    <td   ><?php if(!empty($RES_ADDRS_LINE_1))echo $RES_ADDRS_LINE_1." ";if(!empty($RES_ADDRS_LINE_2))echo $RES_ADDRS_LINE_2." ";if(!empty($RES_ADDRS_LINE_3))echo $RES_ADDRS_LINE_3;?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->RES_ADDRS_LINE_1)." ";}if(!empty($coapplicant->RES_ADDRS_LINE_2)){  echo ucwords($coapplicant->RES_ADDRS_LINE_2)." ";}if(!empty($coapplicant->RES_ADDRS_LINE_3)){  echo ucwords($coapplicant->RES_ADDRS_LINE_3);}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >OCCUPATION </span></td>
                                    <td   ><?php if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed'){ echo "Self Employed" ;}elseif($income_details->CUST_TYPE=='salaried'){ echo " Salaried" ;} else { echo ucwords($income_details->CUST_TYPE); }}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ if($coapplicant->COAPP_TYPE=='retired'){ if($coapplicant->GENDER== 'male') echo "Retired"; else echo "House Wife"; }else{echo ucwords($coapplicant->COAPP_TYPE);}}?> </td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >STABILITY AT CURRENT ADDRESS(YEARS)</span></td>
                                    <td   ><?php if(isset($data_row_more)){ echo $data_row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >STABILITY IN CITY (YEARS)</span></td>
                                    <td   ><?php if(!empty($data_row_more)){ echo $data_row_more->RES_ADDRS_NO_YEARS_LIVING;}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo $coapplicant->RES_ADDRS_NO_YEARS_LIVING;}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >NATIVE PLACE</span></td>
                                    <td   ><?php if(!empty($NATIVE_PLACE)){ echo ucwords($NATIVE_PLACE);}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->NATIVE_PLACE);}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >IS CURRENT AND PERMANENT ADDRESS SAME ?</span></td>
                                    <td   ><?php if(!empty($RES_ADDRS_LINE_1)){ if($RES_ADDRS_LINE_1!=$PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ if($coapplicant->RES_ADDRS_LINE_1!=$coapplicant->PER_ADDRS_LINE_1){ echo 'No';} else{echo 'Yes';}}?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >GENDER</span></td>
                                    <td   ><?php if(!empty($row)){  echo ucwords($row->GENDER); }?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){  echo ucwords($coapplicant->GENDER); }?></td>
                                    <?php $i++; }?>
                                </tr>
                                <tr style="border: 1px solid #ddd;border-bottom:1px solid; border-left:1px solid;border-right:1px solid;">
                                    <td   ><span   >LOCALITY TYPE</span></td>
                                    <td   > <?php if(!empty($Locality_type)){ echo ucwords($Locality_type);}?></td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td   ><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->Locality_type);}?></td>
                                    <?php $i++; }?>
                                </tr>
                            </tbody>
                    </table>
                    <!------------------------------------------------------------------------------------------------------------->
                    <!----------------------------------------------Brief Background of the case---------------------------------------------------------------->
                    <table class="table table-bordered">
                      <tr  style="background-color: #C24641;"><th style="width:100%;padding-left:5px;color:white;font-size:10px;">Brief Background of the case (from pd)</th></tr>
                    </table>
                          <textarea class="form-control" readonly><?php if(!empty($data_row_PD_details)) if(!empty($data_row_PD_details->customer_details_comments)) echo $data_row_PD_details->customer_details_comments;?></textarea>
                        
                    
                    <!------------------------------------------------------------------------------------------------------------------------------------------>
                    <!---------------------------------------------- Employment / Business Details from login---------------------------------------------------------------->
                    <br>
                    <table class="table table-bordered">
                      <tr  style="background-color: #C24641;"><th style="width:100%;padding-left:5px;color:white;font-size:10px;"> Employment / Business Details</th></tr>
                    </table>
                    <table class="table table-bordered">
                              
                        <tbody style="margin-top: 5rem">
                            <tr style="border: 1px solid;background-color:#E8E8E8;width:30px;">
                                <td><span>PARTICULARS</span></td>
                                <td><b><span >APPLICANT</span></b></td>
                                  <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td  ><b><span   >CO-APPLICANT <?php echo $i;?></span></b></td>
                                  <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td   ><span   >Name</span></td>
                                <td   ><?php if(!empty($row)){echo ucwords($row->FN)." ".ucwords($row->MN)." ".ucwords($row->LN);}?></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><?php if(!empty($coapplicant)){echo ucwords($coapplicant->FN)." ".ucwords($coapplicant->MN)." ".ucwords($coapplicant->LN);}?></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                    <td><span   >Occupation </span></td>
                                    <td><select class="form-control" required name="CUST_TYPE"> 
                                              <option>select occupation</option>
                                              <option <?php if(!empty($final_cam_table)){if(!empty($cust_employment_details)){ if($cust_employment_details->cust_type=='self employeed'){ echo 'selected'; } } }else{ if(!empty($income_details)){ if($income_details->CUST_TYPE=='self employeed'){ echo 'selected'; }} }?> value="self employeed">self employeed</option>  
                                              <option <?php if(!empty($income_details)){if($income_details->CUST_TYPE=='salaried'){ echo 'selected';}} ?> value="salaried">salaried</option>
                                          </select>
                                    </td>
                                    <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                    <td>
                                            <select class="form-control" required name="COAPP_TYPE"> 
                                              <option>select occupation</option>
                                              <option <?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='self employeed'){ echo 'selected';}} ?> value="self employeed">self employeed</option>  
                                              <option <?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='salaried'){ echo 'selected';}} ?> value="salaried">salaried</option>
                                              <option <?php if(!empty($coapplicant)){if($coapplicant->COAPP_TYPE=='retired'){ echo 'selected';}} ?> value="retired">retired</option>
                                          </select> </td>
                                    <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span>Company / Firm name</span></td>
                                <td><?php if(isset($income_details)){ if($income_details->CUST_TYPE=='salaried' ){?><textarea  name="comp_name" class="form-control"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_NAME);}?></textarea><?php }else {?><textarea class="form-control" name="comp_name"> <?php if(!empty($income_details)){ echo ucwords($income_details->BIS_NAME);}?> </textarea> <?php }  }else { ?> <textarea class="form-control" name="comp_name">   </textarea> <?php }?></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td> <?php if(isset($coapplicant)){ if($coapplicant->COAPP_TYPE=='salaried' ){?><textarea class="form-control"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_NAME);}?></textarea><?php }else {?><textarea class="form-control"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->BIS_NAME);}?> </textarea> <?php }  }else { ?> <textarea class="form-control">  </textarea> <?php }?></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span   >Company / Firm Address</span></td>
                                <td><?php if(isset($income_details)){ if($income_details->CUST_TYPE=='salaried' ){?><textarea class="form-control" name="comp_add"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_ADRS_LINE_1.' '.$income_details->ORG_ADRS_LINE_2.' '.$income_details->ORG_ADRS_LINE_3);}?></textarea><?php }else {?><textarea class="form-control" name="comp_add"> <?php if(!empty($income_details)){ echo ucwords($income_details->ORG_ADRS_LINE_1.' '.$income_details->ORG_ADRS_LINE_2.' '.$income_details->ORG_ADRS_LINE_3);}?> </textarea> <?php }  }else { ?> <textarea class="form-control" name="comp_add">   </textarea> <?php }?></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td><?php if(isset($coapplicant)){ if($coapplicant->COAPP_TYPE=='salaried' ){?><textarea class="form-control"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_ADRS_LINE_1.' '.$coapplicant->ORG_ADRS_LINE_2.' '.$coapplicant->ORG_ADRS_LINE_3);}?></textarea><?php }else {?><textarea class="form-control"><?php if(!empty($coapplicant)){ ucwords($coapplicant->ORG_ADRS_LINE_1.' '.$coapplicant->ORG_ADRS_LINE_2.' '.$coapplicant->ORG_ADRS_LINE_3); }?> </textarea> <?php }  }else { ?> <textarea class="form-control">  </textarea> <?php }?></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span   >Landmark of the employment / business  </span></td>
                                <td> <?php if(isset($income_details)){ if($income_details->CUST_TYPE=='salaried' ){?><textarea class="form-control" name="comp_land_mark"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_LANDMARK);}?></textarea><?php }else {?><textarea class="form-control" name="comp_land_mark"> <?php if(!empty($income_details)){ echo ucwords($income_details->ORG_LANDMARK);}?> </textarea> <?php }  }else { ?> <textarea class="form-control" name="comp_land_mark">   </textarea> <?php }?></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td> <?php if(isset($coapplicant)){ if($coapplicant->COAPP_TYPE=='salaried' ){?><textarea class="form-control"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_LANDMARK);}?></textarea><?php }else {?><textarea class="form-control"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_LANDMARK);}?> </textarea> <?php }  }else { ?> <textarea class="form-control">  </textarea> <?php }?></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span   >Business License if any</span></td>
                                <td>  <select class="form-control" required name="bis_license"> 
                                              <option>select option</option>
                                              <option value="Yes">Yes</option>  
                                              <option value="No">No</option>
                                              <option value="NA">NA</option>
                                        </select>
                                </td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td >  <select class="form-control" required name="COAPP_TYPE"> 
                                              <option>select option</option>
                                              <option value="Yes">Yes</option>  
                                              <option value="No">No</option>
                                              <option value="NA">NA</option>
                                        </select>
                                </td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span   >Working Hours & Weekly Off</span></td>
                                <td><textarea class="form-control" name="workinh_hour">   </textarea></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td> <textarea class="form-control">   </textarea></td>
                                <?php $i++; }?>
                            </tr>
                            
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span   >Customer Category</span></td>
                                <td>	<select class="form-control" aria-label="Default select example" id="PrimaryProfileOfPDPerson" name="cust_category">
                                          <option value="">select</option>
                                          <option value="SENP"  <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SENP') echo ' selected="selected"'; ?>>SENP</option>
                                          <option value="SEP"   <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SEP') echo ' selected="selected"'; ?>>SEP</option>
                                          <option value="SE"    <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SE') echo ' selected="selected"'; ?>>SE</option>
                                          <option value="SALARIED"    <?php if(!empty($data_row_PD_details)) if(!empty($Basic_details_JSON)) if($Basic_details_JSON->PrimaryProfileOfPDPerson == 'SALARIED') echo ' selected="selected"'; ?>>SALARIED</option>
                                          <option value="NA">NA</option>
                                      </select>
                                </td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><select class="form-control" aria-label="Default select example" id="PrimaryProfileOfPDPerson" name="PrimaryProfileOfPDPerson">
                                          <option value="">select</option>
                                          <option value="SENP">SENP</option>
                                          <option value="SEP">SEP</option>
                                          <option value="SE">SE</option>
                                          <option value="SALARIED">SALARIED</option>
                                          <option value="NA">NA</option>
                              
                                      </select></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span   >Designation / Department</span></td>
                                <td><?php if(isset($income_details)){ if($income_details->CUST_TYPE=='salaried' ){?><textarea class="form-control" name="cust_designation"><?php if(!empty($income_details)){ echo ucwords($income_details->ORG_DESIGNATION);}?></textarea><?php }else {?><textarea class="form-control" name="cust_designation"> <?php if(!empty($income_details)){ echo ucwords($income_details->BIS_DESIGNATION);}?> </textarea> <?php }  }else { ?> <textarea class="form-control" name="cust_designation">   </textarea> <?php }?></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td><?php if(isset($coapplicant)){ if($coapplicant->COAPP_TYPE=='salaried' ){?><textarea class="form-control"><?php if(!empty($coapplicant)){ echo ucwords($coapplicant->ORG_DESIGNATION);}?></textarea><?php }else {?><textarea class="form-control"> <?php if(!empty($coapplicant)){ echo ucwords($coapplicant->BIS_DESIGNATION);}?> </textarea> <?php }  }else { ?> <textarea class="form-control">   </textarea> <?php }?></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span >Salary Increment Cycle (yrly/Once in 3 yrs)</span></td>
                                <td> <select class="form-control" aria-label="Default select example" id="PrimaryProfileOfPDPerson" name="cust_sal_inc">
                                          <option value="">select</option>
                                          <option value="Yearly">Yearly</option>
                                          <option value="Once in 3 Years">Once in 3 Years</option>
                                          <option value="NA">NA</option>
                                        
                              
                                      </select></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td > <select class="form-control" aria-label="Default select example" id="PrimaryProfileOfPDPerson" name="PrimaryProfileOfPDPerson">
                                          <option value="">select</option>
                                          <option value="Yearly">Yearly</option>
                                          <option value="Once in 3 Years">Once in 3 Years</option>
                                          <option value="NA">NA</option>
                                        
                              
                                      </select></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td   ><span   >Promotion in last 3 years</span></td>
                                <td ><?php if(isset($income_details)){ if($income_details->CUST_TYPE=='salaried' ){?><textarea class="form-control" name="cust_promotion"></textarea><?php }else {?><textarea class="form-control" name="cust_promotion"> <?php echo "NA"; ?> </textarea> <?php }  }else { ?> <textarea class="form-control" name="cust_promotion">   </textarea> <?php }?></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><?php if(isset($coapplicant)){ if($coapplicant->COAPP_TYPE=='salaried' ){?><textarea class="form-control"></textarea><?php }else {?><textarea class="form-control"> <?php echo "NA"; ?> </textarea> <?php }  }else { ?> <textarea class="form-control">   </textarea> <?php }?></td>
                                <?php $i++; }?>
                            </tr>
                            
                          
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td   ><span   >Income Details per Month (Gross / Net Income)</span></td>
                                <td   ><input  name="cust_net_sal" class="form-control" type="number" step= "any" ><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$income_details->ORG_SALARY_3);}?> </td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><input  class="form-control" type="number" step= "any" ><?php if(!empty($income_details)){ echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$income_details->ORG_SALARY_3);}?></input></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td   ><span   >Deduction Details - PF , Loan , Esic , Tax  </span></td>
                                <td   ><input  name="cust_deduction" class="form-control" type="number" step= "any" value="<?php if(!empty($income_details)){ echo $income_details->ORG_SALARY_3-$data_credit_analysis->net_salary_3;}else {echo '0';}?>"> </td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><input  class="form-control" type="number" step= "any" value="<?php if(!empty($coapplicant)){ if(!empty($coapp_data_credit_analysis_array)){if(!empty($coapp_data_credit_analysis_array[$i])){  echo $coapplicant->ORG_SALARY_3-$coapp_data_credit_analysis_array[$i]->net_salary_3; }}}?>"> </td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td><span>Documents collected as proof of Income</span></td>
                                <td><textarea name="cust_doc" class="form-control">   </textarea></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td><textarea class="form-control">   </textarea></td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td   ><span   >Number of years in current Job  </span></td>
                                <td   ><?php if(isset($income_details)){ if($income_details->CUST_TYPE=='salaried' ){?><input  name="cust_exp_curr_job" class="form-control" type="number" step= "any" value="<?php if(!empty($income_details)){ echo $income_details->ORG_YEARS_WORKING;} ?>" > <?php }else {?><input  name="cust_exp_curr_job" class="form-control" type="number" step= "any" value="<?php if(!empty($income_details)){ echo $income_details->BIS_YEARS_IN_BIS;} ?>" ><?php }  }else { ?> <input  name="cust_exp_curr_job" class="form-control" type="number" step= "any" value="0"; > <?php }?></td> 
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><?php if(isset($coapplicant)){ if($coapplicant->COAPP_TYPE=='salaried' ){?><input  class="form-control" type="number" step= "any" value="<?php if(!empty($coapplicant)){ echo $coapplicant->ORG_YEARS_WORKING;} ?>"><?php }else {?><input  class="form-control" type="number" step= "any" value="<?php if(!empty($coapplicant)){ echo $coapplicant->BIS_YEARS_IN_BIS;} ?>" ><?php }  }else { ?> <input  class="form-control" type="number" step= "any" value="0"; > <?php }?></td> 
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td   ><span   >Over all experience / Overall Business Experience</span></td>
                                <td   ><input  name="total_exp" class="form-control" type="number" step= "any" value="0"; > </td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><input  class="form-control" type="number" step= "any" value="0"; > </td>
                                <?php $i++; }?>
                            </tr>
                            <tr style="border: 1px solid #ddd; border-left:1px solid;border-right:1px solid;">
                                <td   ><span   >Other Income - Rent , Agri , Misc</span></td>
                                <td   > <?php if(!empty($data_row_PD_details->reference_check_JSON))
                                                {
                                                  $reference_array_2=json_decode($data_row_PD_details->additional_income_JSON,true);
                                                
                                                    $reference_array_2=json_decode($reference_array_2['AdditionalIncomeType']);
                                                  if(!empty($reference_array_2))
                                                  {
                                                      $total_add_income=0;
                                                      foreach($reference_array_2 as $value) 
                                                      {
                                                    
                                                        if(!empty($value->Reference_type))
                                                          {  $total_add_income=$total_add_income+$value->Contact_No; ?>
                                                            
                                                            <input   name="cust_other_income" class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo $total_add_income; ?>">
                                                          <?php }
                                                          else{?>
                                                            <input   name="cust_other_income" class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo'0'; ?>">
                                                          <?php }
                                                      }
                                                  }
                                                  else{?>
                                                    <input   name="cust_other_income" class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo'0'; ?>">
                                                <?php }
                                                }
                                                else{?>
                                                  <input  name="cust_other_income"  class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo'0'; ?>">
                                              <?php }
                                  ?></td>
                                <?php $i=1; foreach ($coapplicants as $coapplicant) { ?>
                                <td   ><input   class = "form-control" type="number" id="Contact_No" name="Contact_No[]" value="<?php echo'0'; ?>"></td>
                                <?php $i++; }?>
                            </tr>
                            
                        </tbody>
                    </table>
                    <input type=submit>
                  </form>
                
                </div>
               
                   
                
                
                   
              </div>
            </div>
			    </div>
		    </div>
	    </main>
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
   

		  $("#final_loan_amount").keyup(function(){
    
		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#final_loan_amount").val() !== "")
			       P = parseFloat($("#final_loan_amount").val());
			                   
			                        
			    if ($("#final_roi").val() !== "") 
			      r = parseFloat(parseFloat($("#final_roi").val()) / 100);

			    if ($("#final_tenure").val() !== "")
			        n = parseFloat($("#final_tenure").val());

			                    
			                  
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    			$("#emi").val(emi.toFixed(2));
     	   	document.getElementById('EMI').value= emi.toFixed(2);
     		

              });

		   $("#final_roi").keyup(function(){
    
		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#final_loan_amount").val() !== "")
			       P = parseFloat($("#final_loan_amount").val());
			                   
			                        
			    if ($("#final_roi").val() !== "") 
			      r = parseFloat(parseFloat($("#final_roi").val()) / 100);

			    if ($("#final_tenure").val() !== "")
			        n = parseFloat($("#final_tenure").val());
			                   
			                  
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    			$("#emi").val(emi.toFixed(2));
     	   	document.getElementById('EMI').value= emi.toFixed(2);
     		
           });

 $("#final_tenure").keyup(function(){
    
		    	var emi = 0;
			    var P = 0;
			    var n = 1;
			    var r = 0;   

			    if($("#final_loan_amount").val() !== "")
			       P = parseFloat($("#final_loan_amount").val());
			                   
			                        
			    if ($("#final_roi").val() !== "") 
			      r = parseFloat(parseFloat($("#final_roi").val()) / 100);

			    if ($("#final_tenure").val() !== "")
			        n = parseFloat($("#final_tenure").val());
			                   
			                  
			    if (P !== 0 && n !== 0 && r !== 0)
			    emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
              
    			$("#emi").val(emi.toFixed(2));
     	   	document.getElementById('EMI').value= emi.toFixed(2);
  

              });


$("#Total_Value_of_property").keyup(function(){
            var P = 0;
              var n = 0;
                var LTV = 0;
			    if($("#final_loan_amount").val() !== "")
			    P = parseFloat($("#final_loan_amount").val());
			    if ($("#Total_Value_of_property").val() !== "")
			     n = parseFloat($("#Total_Value_of_property").val());
			    LTV =  P / (n/100);
	        $("#LTV").val(LTV.toFixed(2));
     	   	document.getElementById('LTV').value= LTV.toFixed(2);
  

              });



		   
		    
</script>
<script>
function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var country=document.getElementById("country_row"+no);
 var age=document.getElementById("age_row"+no);
	
 var name_data=name.innerHTML;
 var country_data=country.innerHTML;
 var age_data=age.innerHTML;


 name.innerHTML="<input type='text' name='Reference_type[]' id='name_text"+no+"' value='"+name_data+"'>";
 country.innerHTML="<input type='text' name='Name[]' id='country_text"+no+"' value='"+country_data+"'>";
 age.innerHTML="<input type='number' id='age_text"+no+"' name='age[]' value='"+age_data+"'>";
 
}

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;
 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 document.getElementById("age_row"+no).innerHTML=age_val;
 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_name=document.getElementById("Reference_type").value;
 var new_country=document.getElementById("Name").value;
 var new_age=document.getElementById("Contact_No").value;
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input type='text' class = 'form-control' name='Reference_type[]' id='name_row"+table_len+"' value='"+new_name+"'></td><td><input type='number' class = 'form-control' name='Name[]' id='country_row"+table_len+"' value='"+new_country+"'></td><td><input class = 'form-control' name='Contact_No[]' step='any' type='number' id='age_row"+table_len+"' value='"+new_age+"'></td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
 document.getElementById("Reference_type").value="";
 document.getElementById("Name").value="";
 document.getElementById("Contact_No").value="";


}
</script>