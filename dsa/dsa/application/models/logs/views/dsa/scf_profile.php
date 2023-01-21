<style> 
.btn_1 {
    font-size: 14px;
    border-radius: 2px;
    line-height: 12px;
    /* letter-spacing: 1px; */
    text-transform: uppercase;
     padding: 10px 2px; */
    font-weight: 600;
}
input[type="file"] {
    display: block;
}
</style>

<form method="POST" action="<?php echo base_url(); ?>index.php/dsa/dsa_update_profile_one_new_action" id="retailer_update_profile_one_new_action" enctype="multipart/form-data">
        
    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-plus"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Firm Name *
            </span>
			<div style="margin-left: 35px; margin-top: 0px;" class="col">
				<input style="margin-top: 8px;" placeholder="First Name *" class="input-cust-name" type="text" id="f_name" name="f_name" minlength="3" maxlength="30" required value="<?php echo $row->FN;?>" oninput="validateText(this)">
				<input  hidden style="margin-top: 8px;"  type="text" name="id" id="id"   value="<?php echo $row->UNIQUE_CODE;?>" >
				<input  hidden style="margin-top: 8px;"  type="text" name="ROLE" id="ROLE"   value="<?php if(!empty($row))	{ echo $row->ROLE; } ?>" >
			</div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Email-Id *
            </span>
			<div style="margin-left: 35px;  margin-top: 8px;" class="col">
  				<input required placeholder="Enter email-Id *" class="input-cust-name" type="email" name="email" value="<?php echo $row->EMAIL;?>" minlength="8" maxlength="75">
  			</div> 
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-mobile-phone"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number *
            </span>
            <div style="margin-left: 35px;  margin-top: 8px;" class="col">
                <input required placeholder="Enter mobile number *" class="input-cust-name" type="text"  name="mobile" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number"oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $row->MOBILE;?>">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Date of Incorporation *
            </span>
            <div style="margin-left: 35px;  margin-top: 8px;" class="col">
			    <input required class="input-cust-name" type="date" name="dob" id="dob" value="<?php if(!empty($row->DOB)){echo $row->DOB;}?>" >
			</div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 inc_1">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Alternative Mobile No
            </span>
            <?php if(!empty($row->alternate_mob)){
                 $alternate_mobile_no=json_decode($row->alternate_mob, true); 
                 $i=1;
                 foreach($alternate_mobile_no as $alternate_mobile )
                 {
                     if($i==1)
                    {
                         ?>
                           <div class="row" style="margin-left: 35px;  margin-top: 8px;" class="col">
                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	
                                    <input  placeholder="Enter Mob " class="input-cust-name" type="text" name="alternativemob[]" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number"oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $alternate_mobile; ?>" >
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">
                                    <i class="fa fa-plus add_parameter" style="font-size:24px; color:green;" title="Add Parameters" id="append_mob"></i>
                                </div>
                            </div>
                          
                        <?php 
                    }
                    else
                    {  ?>
                          <div class="row controls" style="margin-left: 35px;  margin-top: 8px;" class="col">
                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	
                                    <input  placeholder="Enter Mob " class="input-cust-name" type="text" name="alternativemob[]" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number"oninput="maxLengthCheck(this)" maxlength="10" value="<?php echo $alternate_mobile; ?>" >
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">
                                    <i class="fa fa-minus remove_this" style="font-size:24px; color:red;" title=""></i>
                                </div>
                            </div>
                       <?php 
                    }
                    $i++;
                 }
                 ?>
            <?php } else{ ?>
            <div class="row" style="margin-left: 35px;  margin-top: 8px;" class="col">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	
                    <input  placeholder="Enter Mob " class="input-cust-name" type="text" name="alternativemob[]" pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number"oninput="maxLengthCheck(this)" maxlength="10"  >
				</div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">
                     <i class="fa fa-plus add_parameter" style="font-size:24px; color:green;" title="Add Parameters" id="append_mob"></i>
				</div>
            </div>
            <?php } ?>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 inc">
            <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-birthday-cake"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Alternative Email
            </span>
            <?php if(!empty($row->alternate_email)){
                 $alternate_emails=json_decode($row->alternate_email, true); 
                 $i=1;
                 foreach($alternate_emails as $email )
                 {
                     if($i==1)
                    {?>
                        <div class="row" style="margin-left: 35px;  margin-top: 8px;" class="col">
                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	
                                <input  placeholder="Enter Email " class="input-cust-name" type="email" name="alternativeemail[]" value="<?php echo $email; ?>" >
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">
                                <i class="fa fa-plus add_parameter" style="font-size:24px; color:green;" title="Add Parameters" id="append_email"></i>
                            </div>
                        </div>  
                     <?php
                    } 
                    else{ ?>
                              <div class="row controls_1" style="margin-left: 35px;  margin-top: 8px;" class="col">
                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	
                                    <input  placeholder="Enter Email " class="input-cust-name" type="email" name="alternativeemail[]" value="<?php echo $email; ?>" >
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">
                                <i class="fa fa-minus remove_this_1" style="font-size:24px; color:red;" title=""></i>
                                </div>
                             </div>
                    <?php }
                    $i++;
                 }
                }
                    else{
                          ?>
                            <div class="row" style="margin-left: 35px;  margin-top: 8px;" class="col">
                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	
                                    <input  placeholder="Enter Email " class="input-cust-name" type="email" name="alternativeemail[]"  >
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">
                                    <i class="fa fa-plus add_parameter" style="font-size:24px; color:green;" title="Add Parameters" id="append_email"></i>
                                </div>
                            </div>  
                    <?php } ?>
        </div>
    </div>
    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
        <div class="row justify-content-center col-12">
            <span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Business Proof verification</span>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
            <div style="margin-top: 0px;" class="col">
                <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST NUMBER *</span>
            </div>
            <div style="margin-left: 35px; margin-top: 8px;" class="col">
                <input  required pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$"  placeholder="GST number" class="input-cust-name" maxlength="15"  type="text" name="GST_number" id="GST_number" title="Please enter valid GST number" maxlength="10" <?php if(!empty($row)){ if( $row->verify_retailer_dis_gst=='true'){echo 'readonly ';} }?> value="<?php if(isset($row) )echo $row->dsa_GST;?>" >
                <input  type="text" id="verify_GST_status" name="verify_GST_status" value="<?php if(!empty($row)){echo $row->verify_retailer_dis_gst;} ?>"  hidden >
            </div> 
        </div>
        <?php if(!empty($row)){ if( $row->verify_retailer_dis_gst=='true')
            { 
        ?> 
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                            <div style="margin-top:0px;" class="col">
                                <span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
                            </div>			
                            <div class="w-100"></div>
                                <a class="btn btn-success disabled" id="verify_GST" style="color:white;">GST Verified <i class="fas fa-check"></i></a>
                        </div>
                        <?php }	else {	?>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                            <div style="margin-top: 0px;" class="col">
                                <span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
                            </div>			
                            <div class="w-100"></div>
                                <a class="btn btn-success " id="verify_GST" style="color:white;">Verify GST </a>
                        </div>
                        <?php } }else{?>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                            <div style="margin-top:0px;" class="col">
                                <span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
                            </div>			
                            <div class="w-100"></div>
                            <a class="btn btn-success " id="verify_GST" style="color:white;">Verify GST </a>
                        </div>
              <?php 
            }
        ?> 	
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" >
		    <div style="margin-top: 0px;" class="col">
                <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Business address *
                </span>
                <label class="" for="" style="font-size: 12px;">&nbsp;</label>
                <textarea  type="text" required  class="input-cust-name"    name="Buisness_add" id="Buisness_add" style="height:100px"   readonly><?php if(isset($row)){ echo $row->dsa_address_line_1; } ?></textarea>
				
		       
            </div>
	    </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
            <div style="margin-top: 0px;" class="col">
                <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Current Business address *</span>
                <div style="margin-left: 30px;" class="custom-control custom-switch" id="chechshow">		  
                    <input type="checkbox" class="custom-control-input" id="customSwitches" name="resiperchk">
                    <label class="custom-control-label" for="customSwitches" style="font-size: 12px;">Current Business Address Same As Registered  Address ?</label>	
                    <textarea  type="text" required  class="input-cust-name"    name="Buisness_add_current" id="Buisness_add_current" style="height:100px"   ><?php if(isset($row)){ echo $row->dsa_address_line_2; } ?></textarea>
                </div>	
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
            <div style="margin-top: 0px;" class="col">
                <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Registered Firm name *</span>	
        
                <input  type="text"   class="input-cust-name"    name="Buisness_name" id="Buisness_name"   style="text-transform:uppercase" value="<?php if(isset($row)){ echo $row->dsa_firm_name; } ?>" required>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >
            <div style="margin-top: 0px;" class="col">
                <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Constitution Of Business *</span>	
                <input  type="text"   class="input-cust-name"     name="Buisness_con" id="Buisness_con"   style="text-transform:uppercase" value="<?php if(isset($row)){ echo $row->Buisness_con; } ?>" readonly required>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" id="prop_con" >
           <!--<a class="btn btn-primary " id="add_propriter" style="color:white;"  data-toggle="modal" data-target="#myModal5" >Add Propriter</a>-->
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pan Number * </span>	
                	<input pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required placeholder="PAN number *" class="input-cust-name" maxlength="10"  type="text" name="pan" id="pan" title="Please enter valid PAN number" maxlength="10" <?php if(!empty($row)){ if( $row->verify_retailer_dis_pan=='true'){echo 'readonly ';} }?> value="<?php echo $row->PAN_NUMBER; ?><?php /*if(isset($row->PAN_NUMBER)){ echo  preg_replace("/(?!^).(?!$)/", "*", $row->PAN_NUMBER);} */?>"  >
  				   	<input type="text" id="verify_pan_status" name="verify_pan_status" value="<?php if(!empty($row)){echo $row->verify_retailer_dis_pan;} ?>"  hidden >
                    <textarea id="verify_pan_response_bis" name="verify_pan_response_bis"  style="display:none" ><?php if(!empty($row)){echo $row->verify_pan_response_bis;} ?></textarea>
                         
                </div>
        </div>
        
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; "> Firm Name AS Per Pan Number * </span>
                    <input required placeholder="Name on PAN *" class="input-cust-name"   type="text" name="nameonpan" id="nameonpan" title="" <?php if(!empty($row)){ if( $row->verify_retailer_dis_pan=='true'){echo 'readonly ';} }?> value="<?php echo $row->nameonpan; ?><?php /*if(isset($row->PAN_NUMBER)){ echo  preg_replace("/(?!^).(?!$)/", "*", $row->PAN_NUMBER);} */?>"  >
  			</div>  																	
		</div>
        <?php if(!empty($row)){ if( $row->verify_retailer_dis_pan=='true')
            { ?> 
                <div class="col-xl-4 -lg-4 col-md-col4 col-sm-12 col-12" >
                    <div style="margin-top:0px;" class="col">
                        <span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
                    </div>			
                
                    <a class="btn btn-success disabled" id="verify_pan_bis" style="color:white;">PAN Verified <i class="fas fa-check"></i></a>
                </div>
                <?php }	else {	?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div style="margin-top: 0px;" class="col">
                        <span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
                    </div>	
                    <a class="btn btn-success " id="verify_pan_bis" style="color:white;">Verify PAN </a>
                </div>
                <?php } }else{?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div style="margin-top:0px;" class="col">
                        <span class=""></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">  </span>
                    </div>								
                    <a class="btn btn-success " id="verify_pan_bis" style="color:white;">Verify PAN </a>
                </div>
		       <?php  
            }?>
        
    </div>
    <div class="row shadow bg-white rounded margin-10 padding-15"  style="margin: 20px;" id="abc">		
    </div>
    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
        <div class="row justify-content-center col-12">
            <span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Bank Details <?php  $dsa_BANK_DETAILS=json_decode($row->dsa_BANK_DETAILS_JSON, true); ?></span>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
			    <span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">IFSC Code</span>	
                <div style="margin-left: 35px; margin-top: 8px;" class="col">
                    <input required placeholder="IFSC Code*" class="input-cust-name" type="text"  name="ifsc_code"  maxlength="11" min="0" id="IFSC_Code" oninput="maxLengthCheck(this)" onkeydown="upperCaseF(this)" pattern="^[A-Z]{4}0[A-Z0-9]{6}$"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['ifsc_code'];}?>">
				</div>  			  				
			</div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank Name</span>	
                <div style="margin-left: 35px; margin-top: 8px;" class="col">
                    <input  readonly required placeholder="Bank Name*" class="input-cust-name" type="text"  id="Bank_name" name="Bank_name"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['bank_name'];}?>" >
				</div>  
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Bank branch</span>
                <div style="margin-left: 35px; margin-top: 8px;" class="col">
                    <input  readonly required placeholder="Bank branch*" class="input-cust-name" type="text"  id="Bank_branch" name="Bank_branch"  value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['bank_branch'];}?>" >
				</div>  			  				
			</div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
			<div style="margin-top: 0px;" class="col">
				<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Account Number</span>
                <div style="margin-left: 35px; margin-top: 8px;" class="col">
                    <input required placeholder="Account Number*" class="input-cust-name" type="number"  name="acc_no"  maxlength="16" min="0" oninput="maxLengthCheck(this)" value="<?php if(!empty($dsa_BANK_DETAILS)){ echo $dsa_BANK_DETAILS['acc_no'];}?>">
				</div>  	
            </div>
        </div>
    </div>
    <?php if(!empty($get_uploded_doc))
    { ?>
    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
        <div class="row justify-content-center col-12">
            <span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Documents</span>
        </div>
        <?php
        foreach($get_uploded_doc  as $value)
            {
				?>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <a href="<?php echo base_url();?>index.php/customer/view_cloud_file/<?php echo $value->ID; ?>" target='_blank' ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;<b><?php echo ucwords($value->DOC_TYPE); ?></b><br>
                       </div>
                        <?php 
                    
                }
                ?>
    </div>
    <?php
         if($data_row_more->STATUS=='Send back from SCFO' || $data_row_more->STATUS=='Rejected')
         {
             ?>
                    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
                            <div class="row justify-content-center col-12">
                                <span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">SCFO Comment</span>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                 <textarea readonly ><?php if(!empty($data_row_more)){echo $data_row_more->scfremark;} ?></textarea>
                            </div>
                    </div>
                   
             <?php 
        }
    ?>
    <?php } ?>
    <?php 
            if( $row->Profile_Status!='Complete')
            {        ?>
                    <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">		
                        <div style="margin-top: 20px;margin-right: 20px;" class="row col-12 justify-content-center">
                            <div style="margin-right: 40px;">
                                <a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
                                    <button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue3">
                                        SAVE & CONTINUE
                                    </button>
                                </a>
                            </div> 
                        </div>
                    </div>
                <?php 
            }
        
        
            if($data_row_more->STATUS=='Send back from SCFO')
            {?>
                  <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">		
                        <div style="margin-top: 20px;margin-right: 20px;" class="row col-12 justify-content-center">
                            <div style="margin-right: 40px;">
                                <a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income?type=salaried">
                                    <button class="login100-form-btn disabled" style="background-color: #25a6c6;" id="continue3">
                                        SAVE & CONTINUE
                                    </button>
                                </a>
                            </div> 
                        </div>
                    </div>

           <?php
            }
            else if($data_row_more->STATUS=='Revet Action Taken')
            { 
                if(!empty($Login_details))
                { 
                    if($Login_details->ROLE==28)
                    {
                ?>
                            <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <input type="button"  name="Confirm" value="SendBack" id="SendBack"  data-toggle="modal" data-target="#myModal1"   class="btn btn-primary" style="border-radius: 10px;">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <input type="button"  name="Confirm" value="Approve"  id="Approve" data-toggle="modal" data-target="#myModal2" class="btn btn-success" style="border-radius: 10px;" >
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                <input type="button"  name="Confirm" value="Reject"  id="reject" class="btn btn-danger" style="border-radius: 10px;">
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                </div>
                            </div>
                

                                <?php
                      }
                }
            }
            else if($data_row_more->STATUS=='Approved')
            {   ?>
                            <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"></div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12"></div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <input type="button"  name="Confirm" value="Profile Approved"  id="Approve" class="btn btn-success disabled" style="border-radius: 10px;">
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12"></div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            </div>
            </div>
            <?php }
             else if($data_row_more->STATUS=='Rejected')
             {   ?>
                             <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
                             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"></div>
                             <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12"></div>
                             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                 <input type="button"  name="Confirm" value="Profile Rejected"  id="Approve" class="btn btn-danger disabled" style="border-radius: 10px;" >
                             </div>
                             <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12"></div>
                             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                             </div>
             </div>
             <?php }
            else
            {  if(!empty($Login_details))
                { if($Login_details->ROLE==28)
                    {    
                        if($data_row_more->STATUS=='Updated')
                        { 
                           ?>
               
                                <div class="row shadow bg-white rounded margin-10 padding-15" style="margin: 20px;">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                       <input type="button"  name="Confirm" value="SendBack" id="SendBack" class=" btn btn-primary" data-toggle="modal" data-target="#myModal1" style="border-radius: 10px;"   >
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                       <input type="button"  name="Confirm" value="Approve"  id="Approve"  data-toggle="modal" data-target="#myModal2" class=" btn btn-success" style="border-radius: 10px;" >
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                       <input type="button"  name="Confirm" value="Reject" id="reject" data-toggle="modal" data-target="#myModal3" class=" btn btn-danger" style="border-radius: 10px;" >
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    </div>
                                </div>

                           <?php 
                        }
                    }
                }
            }
        ?>
    
   
</form>
        
    <div class="modal fade" id="myModal5" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
                   
					<h4 id="heading">Director</h4>
                   
				</div>
                <div class="modal-body">
                 
                        <input  hidden style="margin-top: 8px;"  type="text" name="d_id" id="d_id" value="<?php echo $row->UNIQUE_CODE;?>" >
                       
                        <p style="font-size:15px;" id="prop_name"><b>Director Name:</b></p>
                        <input  type="text" name="d_name" id="d_name" class="form-control" required>
                        <br>
                        <p style="font-size:15px;" id="prop_pan"><b>Director Pan:</b></p>
                        <input required type="text" name="d_pan" id="d_pan" class="form-control" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" >
                        <input hidden type="text" id="verify_pan_status_pro" name="verify_pan_status_pro">
                        <input hidden type="text" id="verify_pan_response_pro" name="verify_pan_response_pro" >
                        <br>
                        <button type="button" class="btn btn-success" id="verify_pan">Verify Pan</button>
                        <p style="font-size:15px;"><b>Upload AAadhar card</b></p>
                        <input type="file" name="d_aadhar[]" id="d_aadhar" required>
                        <br>
                        <p style="font-size:15px;"><b>Upload pan card</b></p>
                        <input type="file" name="d_pan_document[]" id="d_pan_document" required>
                        <br>
                            <button type="submit" class="btn btn-primary" onclick="uplod_property_doc_type();">Upload</button>
        
				</div>
                <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
                   
					<h4 id="heading">Send back</h4>
                   
				</div>
                <div class="modal-body">
                 
                        <input  hidden style="margin-top: 8px;"  type="text" name="Login_id" id="Login_id" value="<?php echo $Login_details->UNIQUE_CODE;?>" >
                        
                        <p style="font-size:15px;" id="prop_name"><b>Remark/comment:</b></p>
                        <input  type="text" name="sendback_remark" id="sendback_remark" class="form-control" required>
                        <br>
                       
                            <button type="submit" class="btn btn-primary" onclick="sendback();">send back</button>
        
				</div>
                <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="myModal2" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
                   
					<h4 id="heading">Approve</h4>
                   
				</div>
                <div class="modal-body">
                 
                        <input  hidden style="margin-top: 8px;"  type="text" name="Login_id" id="Login_id" value="<?php echo $Login_details->UNIQUE_CODE;?>" >
                        
                        <p style="font-size:15px;" id="prop_name"><b>Select Product :</b></p>
                            <select id="loan_product" name="loan_product" class="form-control">
                               <option value="">select option</option>
                               <?php foreach($loanproduct as $product) { ?>
                                  <option <?php if(!empty($product->product_id)){if($product->product_id==$product->product_code){$selected="selected";}else{$selected='';}} ?> value="<?php echo $product->product_code; ?>"><?php echo $product->product_code; ?></option>
                                <?php } ?>
                            </select>
                        <br>
                       
                            <button type="submit" class="btn btn-primary" onclick="Approve();">Approve</button>
        
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
                   
					<h4 id="heading">Reject</h4>
                   
				</div>
                <div class="modal-body">
                 
                        <input  hidden style="margin-top: 8px;"  type="text" name="Login_id" id="Login_id" value="<?php echo $Login_details->UNIQUE_CODE;?>" >
                        
                        <p style="font-size:15px;" id="prop_name"><b>Remark/comment:</b></p>
                        <input  type="text" name="reject_remark" id="reject_remark" class="form-control" required>
                        <br>
                       
                            <button type="submit" class="btn btn-primary" onclick="reject();">Reject</button>
        
				</div>
                <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<script>
            $( document ).ready(function() 
            {
                var Buisness_con=$('#Buisness_con').val();
                var dis_id=document.getElementById('d_id').value;
                if(Buisness_con=='PRIVATE LIMITED COMPANY')
                {
                                $('#prop_con').html(
                                '<a class="btn btn-primary " id="add_propriter" style="color:white;"  data-toggle="modal" data-target="#myModal5" >Add Directors</a>'
                                  
                                );
                                $('#prop_name').html(
                                   '<b>Director name</b>'
                                );
                              
                                $('#prop_pan').html(
                                   '<b>Director pan</b>'
                                );
                                $('#heading').html(
                                   '<b>Director</b>'
                                );
                }
                else if(Buisness_con=='PARTNERSHIP')
                {
                                $('#prop_con').html(
                                '<a class="btn btn-primary " id="add_propriter" style="color:white;"  data-toggle="modal" data-target="#myModal5" >Add Propriter</a>'
                                );
                                $('#prop_name').html(
                                   '<b>Propriter name</b>'
                                  
                                );
                                $('#prop_pan').html(
                                   '<b>Propriter pan</b>'
                                );
                                $('#heading').html(
                                   '<b>Propriter</b>'
                                );
                }
                $('#abc').html();
                $.ajax({
                                                type: "POST",
                                                url:'<?php echo base_url("index.php/dsa/find_propriter_details"); ?>',
                                                data:{'dis_id':dis_id},
                                                success: function (response) 
                                                {
                                                    
                                                    var obj =JSON.parse(response);
                                                   
                                                  var i=1;
                                                    $.each(obj, function (index, value) 
                                                    {
                                                        var prp_doc='';
                                                        $.each(value.doc, function (index, value) 
                                                        {
                                                            prp_doc=prp_doc+'<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+value.ID+'"target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+value.DOC_TYPE+'<br>';
                                                        });
                                                        
                                                            $('#abc').append
                                                            (
                                                                '<table class="table" Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
                                                                '<tr>'+
                                                                '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+i+'</td>'+
                                                                '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.d_name+'</td>'+
                                                                '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+prp_doc+'</td>'+
                                                                '</tr>'+
                                                            '</table>' 
                                                            );
                                                        
                                                           i++;
                                                      
                                                        
                                                    });
                                                    
                                                    
                                                }
                                });

            });
            $("#append_mob").click( function(e) 
			{
                e.preventDefault();
                    $(".inc_1").append('<div class="row controls " style="margin-left: 35px;  margin-top: 8px;" >\
                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	\
                                <input  placeholder="Enter Mob " class="input-cust-name " type="text" name="alternativemob[]"  pattern="[6-9]{1}[0-9]{9}" title="Please enter valid 10 digit phone number"oninput="maxLengthCheck(this)" maxlength="10"   >\
                            </div>\
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">\
                                <i class="fa fa-minus remove_this" style="font-size:24px; color:red;" title=""></i>\
                                </div>\
                        </div>');
                    return false;
			});
            $("#append_email").click( function(e) 
			{
                $(".inc").append('<div class="row controls_1 " style="margin-left: 35px;  margin-top: 8px;" >\
                        <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 " >	\
                            <input  placeholder="Enter Email " class="input-cust-name " type="email" name="alternativeemail[]"  >\
                        </div>\
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">\
                            <i class="fa fa-minus remove_this_1" style="font-size:24px; color:red;" title=""></i>\
                            </div>\
                    </div>');
                return false;
			});
            jQuery(document).on('click', '.remove_this', function() 
			 {
				
                jQuery(this).closest( 'div.controls' ).remove();
				return false;
			});
                jQuery(document).on('click', '.remove_this_1', function() 
			{
				
                jQuery(this).closest( 'div.controls_1' ).remove();
				return false;
			});
            $( "#verify_GST" ).click(function() 
            {
      
	    
	  
	
                var pan_no = $.trim($('#GST_number').val());
                
                var type="gstinSearch";
                
                if(pan_no=='')
                {
                    swal("Error!","Please Enter GST Number", "warning").then((willDelete) => {alert("hello");});
                   
                return false;
                }
                
            
                
                $.ajax({
                        type:'POST',
                        url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
                        //url:'<?php echo base_url("index.php/Api_Functions/Test_PAN_verification"); ?>',
                        data:{'pan_no':pan_no,'type':type,'GST_retailer':'retailer'},
                        success:function(data){
                            
                            var obj =JSON.parse(data);
                            
                            if(obj.msg=='sucess')
                            {
                            
                                        
                                    swal({
                                            title: "success!",
                                            text: "GST Number verified sucessfully",
                                            type: "success"
                                        });
                                        
                                        response = JSON.parse(obj.response);
                                        
                                        result = response.result.gstnDetailed.tradeNameOfBusiness;
                                        
                                        //alert(result);
                                        
                                        //return true;
                                if(result != '')
                                {
                                    $('#GST_number').attr('readonly', true);
                                    
                                }
                                $('#verify_GST').addClass('disabled');
                                $('#verify_GST_status').val('true');
                                $('#Buisness_name').val(obj.legalNameOfBusiness);
                                //$('#Buisness_name').val(result);
                                $('#Buisness_add').val(obj.principalPlaceAddress);
                                $('#Buisness_con').val(obj.constitutionOfBusiness);
                                if(obj.constitutionOfBusiness=='PRIVATE LIMITED COMPANY')
                                {
                                $('#prop_con').html(
                                '<a class="btn btn-primary " id="add_propriter" style="color:white;"  data-toggle="modal" data-target="#myModal5" >Add Directors</a>'
                                  
                                );
                                $('#prop_name').html(
                                   '<b>Director name</b>'
                                );
                              
                                $('#prop_pan').html(
                                   '<b>Director pan</b>'
                                );
                                $('#heading').html(
                                   '<b>Director</b>'
                                );
                               }
                               else if(obj.constitutionOfBusiness=='PARTNERSHIP')
                               {
                                $('#prop_con').html(
                                '<a class="btn btn-primary " id="add_propriter" style="color:white;"  data-toggle="modal" data-target="#myModal5" >Add Propriter</a>'
                                );
                                $('#prop_name').html(
                                   '<b>Propriter name</b>'
                                  
                                );
                                $('#prop_pan').html(
                                   '<b>Propriter pan</b>'
                                );
                                $('#heading').html(
                                   '<b>Propriter</b>'
                                );
                               }
                               
                                
                                
                                
                            
                                
                            }
                            else if(obj.msg=='fail')
                            {
                                var pan_name=obj.name;
                                var father_name=obj.fatherName;
                                
                                

                                // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
                                var words = obj.name.split(' ');          var length = words.length;
                                var words_2 = obj.fatherName.split(' ');  var length_2 = words_2.length;
                                        
                                    swal({
                                            title: "success!",
                                            text: "Your name on Pan is "+obj.name+" and Your Father name on Pan is "+obj.fatherName,
                                            type: "success"
                                        }).then((willDelete) => {
                                                            if (willDelete) {
                                                                if(length==3)
                                                                {
                                                                //$("#f_name").val(words[0]);
                                                                //$("#m_name").val(words[1]);
                                                                //$("#l_name").val(words[2]);
                                                                }
                                                                if(length==2)
                                                                {
                                                                // $("#f_name").val(words[0]);
                                                                //  $("#l_name").val();
                                                                // $("#l_name").val(words[1]);
                                                                
                                                                }
                                                                if(length_2==3)
                                                                {
                                                                // $("#s_f_name").val(words_2[0]);
                                                                // $("#s_m_name").val(words_2[1]);
                                                                // $("#s_l_name").val(words_2[2]);
                                                                }
                                                                if(length_2==2)
                                                                {
                                                                // $("#s_f_name").val(words_2[0]);
                                                                //  $("#s_m_name").val();
                                                                // $("#s_l_name").val(words_2[1]);
                                                                
                                                                }
                                                            
                                                            
                                                            
                                                            }
                                        });
                                
                                $('#verify_pan').addClass('disabled');
                                $('#pan').attr('readonly', true);
                                $('#verify_pan_status').val('true');
                                
                            }
                            else if(obj.msg=='error')
                            {   
                                swal("Error!",obj.response , "warning");
                                $('#continue1').addClass('disabled');
                                
                                $('#verify_pan_status').val('false');
                                
                            }
                            
                        }
                    });
            });
            $('#customSwitches').on('change', function() { 
              if (this.checked) 
			  {
				  var add=$('#Buisness_add').val();
				  if(add==''|| add==' ')
				  {
					swal({
								  title: "warning",
								  text: "Registered adddress not present",
								  type: "warning"
							  })
							  $('#customSwitches').prop('checked', false);
				  }
				  $('#Buisness_add_current').val(add);
			  }
			  else{

				   $('#Buisness_add_current').val('');
			  }
			});
            function uplod_property_doc_type()
            {
                //var dis_id=document.getElementById('d_id').value;
                
                var dis_id=document.getElementById('d_id').value;
                var d_name =document.getElementById('d_name').value;
                var d_pan =document.getElementById('d_pan').value;
                var d_verify_pan_status=document.getElementById('verify_pan_status_pro').value;
                var d_verify_pan_response =document.getElementById('verify_pan_response_pro').value;
               if(d_verify_pan_status=='')
               {
                swal("Warning!", "Please verify pan", "warning");
               }
                var d_aadhar = document.getElementById('d_aadhar');
                var d_aadhar_document = document.getElementById('d_aadhar').value;
                if(d_aadhar_document=='')
                {
                    swal("Warning!", "Please Select Aadhar card", "warning");
                   return false;
                }
                var d_aadhar_doc = d_aadhar.files[0];
                var d_pan_document = document.getElementById('d_pan_document');
                var d_pan_document_1 = document.getElementById('d_pan_document').value;
                if(d_pan_document_1=='')
                {
                    swal("Warning!", "Please Select pan card", "warning");
                    return false;
                }
                if(d_name=='')
                {
                    swal("Warning!", "Please Enter Name", "warning");
                    return false;
                }
                if(d_pan=='')
                {
                    swal("Warning!", "Please Enter Pan No", "warning");
                    return false;
                   
                }
                var d_pan_doc = d_pan_document.files[0];
               

                let formData = new FormData(); 
                formData.append("dis_id",dis_id);
                formData.append("d_name",d_name);
                formData.append("d_pan",d_pan);
                formData.append("d_verify_pan_status",d_verify_pan_status);
                formData.append("d_verify_pan_response",d_verify_pan_response);
                formData.append("d_aadhar",d_aadhar_doc);
                formData.append("d_pan_doc",d_pan_doc);
               
                
                $.ajax({
                                type: "POST",
                                url:'<?php echo base_url("index.php/dsa/save_propriter_details"); ?>',
                                data:formData,
                                processData: false,
                                contentType: false,
                                success: function (response) 
                                {
                                    $('#myModal5').modal('toggle');
                                    swal({
                                                title: "success!",
                                                text: "Data saved successfully",
                                                type: "success"
                                            });

                                           
                                    $.ajax({
                                                type: "POST",
                                                url:'<?php echo base_url("index.php/dsa/find_propriter_details"); ?>',
                                                data:{'dis_id':dis_id},
                                                success: function (response) 
                                                {
                                                    $('#abc').html('');
                                                    var obj =JSON.parse(response);
                                                   
                                                  var i=1;
                                                    $.each(obj, function (index, value) 
                                                    {
                                                        var prp_doc='';
                                                        $.each(value.doc, function (index, value) 
                                                        {
                                                            prp_doc=prp_doc+'<a href="<?php echo base_url();?>index.php/customer/view_cloud_file/'+value.ID+'"target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:blue;"></i></a>&nbsp;&nbsp;'+value.DOC_TYPE+'<br>';
                                                        });
                                                        
                                                            $('#abc').append
                                                            (
                                                                '<table class="table" Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
                                                                '<tr>'+
                                                                '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+i+'</td>'+
                                                                '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.d_name+'</td>'+
                                                                '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+prp_doc+'</td>'+
                                                                '</tr>'+
                                                            '</table>' 
                                                            );
                                                        
                                                           i++;
                                                      
                                                        
                                                    });
                                                    
                                                    
                                                }
                                });
                
                                      

                                    
                                }
                        });
                        
                
            }
            function sendback()
            {
                var remark=document.getElementById('sendback_remark').value;
                var dis_id=document.getElementById('d_id').value;
                var login_id=document.getElementById('Login_id').value;
                if(remark=='')
                {
                    swal("Error!","Please add remark", "warning");
                    exit;
                }
                else
                {
                    $.ajax({
                                type:'POST',
                                url:'<?php echo base_url("index.php/Distributor/update_distributor_status"); ?>',
                                
                                data:{'dis_id':dis_id,'scfremark':remark,'login_id':login_id},
                                success:function(data)
                                {
                                    
                                    var obj =JSON.parse(data);
                                    
                                    if(obj.msg=='sucess')
                                    {
                                        swal({
                                                    title: "success!",
                                                    text: "Status updated sucessfully",
                                                    type: "success"
                                                })
                                                .then((willDelete) => {
                                                    location.reload(true); 

                                                });
                                        

                                    }
                                    
                                    
                                    
                                }
                            });
                
                }
            }
            $( "#verify_pan" ).click(function() 
            {
      
	    
                    var f_name = $.trim($('#d_name').val());
                    var pan_no = $.trim($('#d_pan').val());
                    var pantype="individualPan";
                    
                    if(f_name=='')
                    {
                       // $('#pan_error').html("Please Fill Full name as per PAN card. ");
                        //exit;
                        //return false;
                        
                        swal("Error!","Please Fill Full name as per PAN card", "warning");
                                            exit;
                    }
                    if(pan_no=='')
                    {
                        //$('#pan_error').html("Please Fill PAN Number. ");
                       //	exit;
                       //return false;
                       swal("Error!","Please Fill Pan Number", "warning");
                       
                                            exit;
                    }
                    
                    
                   
                    var full_name=f_name;
                    
                
                    //alert(full_name);
                    
                    $.ajax({
                            type:'POST',
                            url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
                            
                            data:{'full_name':full_name,'pan_no':pan_no,'type':pantype},
                            success:function(data){
                                var obj =JSON.parse(data);
                         
                                if(obj.msg=='sucess')
                                {
                                    var pan_name=obj.name;
                                    var father_name=obj.fatherName;
                                    var words = obj.name.split(' ');          var length = words.length;
                                    var words_2 = obj.fatherName.split(' ');  var length_2 = words_2.length;
                                   
                                            if(pantype == "individualPan") 
                                            {	
                                                $("#d_name").val(obj.name);
                                          swal({
                                                title: "success!",
                                                text: "Your name on Pan is "+obj.name+" and Your Father name on Pan is "+obj.fatherName,
                                                type: "success"
                                            }).then((willDelete) => {
                                                                if (willDelete) {
                                                                   
                                                                }
                                            });
                                            }
                                            else{
                                                
                                                swal({
                                                title: "success!",
                                                text: "Your firm name on Pan is "+obj.name+"",
                                                type: "success"
                                            });
                                            
                                            $("#d_name").val(obj.name);
                                            
                                            
                                            
                                                                                                // $("#f_name").val("");
                                                                    //$("#m_name").val(" ");
                                                                    //$("#l_name").val(" ");
                                            
                                            }
                                    
                                    //$('#verify_pan').addClass('disabled');
                                    $('#verify_pan').prop("disabled", true);
                                    $('#verify_pan_status_pro').val('true');
                                    $('#verify_pan_response_pro').val(obj.response);
                                    $('#d_pan').prop('readonly', true);
                                    $('#d_name').prop('readonly', true);
                                    
                                
                                    
                                }
                                else if(obj.msg=='fail')
                                {
                                    var pan_name=obj.name;
                                    var father_name=obj.fatherName;
                                    
                                    

                                    // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
                                    var words = obj.name.split(' ');          var length = words.length;
                                    var words_2 = obj.fatherName.split(' ');  var length_2 = words_2.length;
                                            
                                        if(pantype == "individualPan") 
                                            {
                                                $("#d_name").val(obj.name);
                                                
                                        swal({
                                                title: "success!",
                                                text: "Your name on Pan is "+obj.name+" and Your Father name on Pan is "+obj.fatherName,
                                                type: "success"
                                            }).then((willDelete) => {
                                                                if (willDelete) {
                                                                    if(type == '')
                                                                    if(length==3)
                                                                    {
                                                                    // $("#f_name").val(words[0]);
                                                                    // $("#m_name").val(words[1]);
                                                                    // $("#l_name").val(words[2]);
                                                                    }
                                                                    if(length==2)
                                                                    {
                                                                    // $("#f_name").val(words[0]);
                                                                    //  $("#l_name").val();
                                                                    // $("#l_name").val(words[1]);
                                                                    
                                                                    }
                                                                    if(length_2==3)
                                                                    {
                                                                    // $("#s_f_name").val(words_2[0]);
                                                                    // $("#s_m_name").val(words_2[1]);
                                                                    // $("#s_l_name").val(words_2[2]);
                                                                    }
                                                                    if(length_2==2)
                                                                    {
                                                                    // $("#s_f_name").val(words_2[0]);
                                                                    //  $("#s_m_name").val();
                                                                    // $("#s_l_name").val(words_2[1]);
                                                                    
                                                                    }
                                                                
                                                                
                                                                
                                                                }
                                                                $('#d_pan').prop('readonly', true);
                                                               $('#d_name').prop('readonly', true);
                                                               $('#verify_pan_response_pro').val(obj.response);
                                            }); }
                                            else{
                                                
                                                swal({
                                                title: "success!",
                                                text: "Your firm name on Pan is "+obj.name+"",
                                                type: "success"
                                            });
                                            
                                            $("#d_name").val(obj.name);
                                            
                                            
                                            //document.getElementById('l_name').value = ' ';
                                            
                                            //document.getElementById('m_name').value = ' ';
                                            
                                            
                                            }
                                    
                                    $('#verify_pan').prop("disabled", true);
                                    $('#verify_pan_status_pro').val('true');
                                    $('#d_pan').prop('readonly', true);
                                    $('#d_name').prop('readonly', true);
                                    $('#verify_pan_response_pro').val(obj.response);
                                    
                                }
                                else if(obj.msg=='error')
                                {   
                                    swal("Error!",obj.response , "warning");
                                    $('#continue1').addClass('disabled');
                                    
                                    $('#verify_pan_status_pro').val('false');
                                    $('#verify_pan_response_pro').val(obj.response);
                                    
                                }
                                
                            }
                        });
            });
            $("#IFSC_Code").bind("keyup", function() 
            {
  
                if($(this).val()!=''){
                if($(this).val().length == 11){
                    var IFSC_Code = $(this).val();
                    url = window.location.protocol+"//"+window.location.host + "/finserv_test/dsa/dsa/index.php/dsa/get_bank_details";            
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: '{ "IFSC": "'+IFSC_Code+'"}',
                        contentType: "application/json; charset=UTF-8",
                        success: function (response) {
                            var data = JSON.parse(response);
                            if (data=="Not Found")
                            {
                                Swal.fire("Warning!", "Please Enter Valid IFSC Code  ", "warning");

                                exit;

                            }
                            else{
                            $('#Bank_name').val(data.BANK);  
                            $('#Bank_branch').val(data.BRANCH);
                            }
                            
                        }
                    });
                }
                }
            });
            $('#continue3').on('click',function(e)
            {
                var verify_pan_status=$('#verify_pan_status').val();
				var verify_GST_status=$('#verify_GST_status').val();
                if(verify_pan_status=='true' && verify_GST_status=='true')
							{
								
								    $('#continue3').removeClass('disabled');
									
								
							}
							
							else if( $(this).hasClass('disabled') )
							{
								e.preventDefault();
								swal("Warning!", "Please Verify PAN AND GST  Document", "warning");
								
							}


            });
            $( "#verify_pan_bis" ).click(function() 
            {
      
	    
                   
                    var pan_no = $.trim($('#pan').val());
                    var pantype="businessPan";
                    
                  
                    if(pan_no=='')
                    {
                        //$('#pan_error').html("Please Fill PAN Number. ");
                       //	exit;
                       //return false;
                       swal("Error!","Please Fill Buisness an Number", "warning");
                       
                                            exit;
                    }
                    
                    
                   
                    var full_name='';
                    
                
                    //alert(full_name);
                    
                    $.ajax({
                            type:'POST',
                            url:'<?php echo base_url("index.php/Api_Functions/Authentication"); ?>',
                            
                            data:{'full_name':full_name,'pan_no':pan_no,'type':pantype},
                            success:function(data){
                                var obj =JSON.parse(data);
                         
                                if(obj.msg=='sucess')
                                {
                                    var pan_name=obj.name;
                                    var father_name=obj.fatherName;
                                    var words = obj.name.split(' ');          var length = words.length;
                                    var words_2 = obj.fatherName.split(' ');  var length_2 = words_2.length;
                                   
                                            if(pantype == "businessPan") 
                                            {	
                                               
                                                    swal({
                                                    title: "success!",
                                                    text: "Your firm name on Pan is "+obj.name+"",
                                                    type: "success"
                                                });
                                                
                                                $("#nameonpan").val(obj.name);
							  
                                            }
                                            
                                            
                                            
                                            
                                            
                                            
                                                                                                // $("#f_name").val("");
                                                                    //$("#m_name").val(" ");
                                                                    //$("#l_name").val(" ");
                                            
                                            
                                    
                                    //$('#verify_pan').addClass('disabled');
                                    $('#verify_pan_bis').prop("disabled", true);
                                    $('#verify_pan_status').val('true');
                                    $('#verify_pan_response_bis').val(obj.response);
                                   
                                
                                    
                                }
                                else if(obj.msg=='fail')
                                {
                                    var pan_name=obj.name;
                                    var father_name=obj.fatherName;
                                    
                                    

                                    // swal("Error!", "Your name on Pan is "+obj.name+". Please update name as per your Pan card", "warning");
                                    var words = obj.name.split(' ');          var length = words.length;
                                   
                                            
                                      
                                            
                                                
                                                swal({
                                                title: "success!",
                                                text: "Your firm name on Pan is "+obj.name+"",
                                                type: "success"
                                            });
                                            
                                            $("#nameonpan").val(obj.name);
                                            
                                            
                                            //document.getElementById('l_name').value = ' ';
                                            
                                            //document.getElementById('m_name').value = ' ';
                                            
                                            
                                            
                                    
                                    $('#verify_pan_bis').prop("disabled", true);
                                    $('#verify_pan_status').val('true');
                                   
                                    $('#verify_pan_response_bis').val(obj.response);
                                    
                                }
                                else if(obj.msg=='error')
                                {   
                                    swal("Error!",obj.response , "warning");
                                    $('#continue1').addClass('disabled');
                                    
                                    $('#verify_pan_status').val('false');
                                    $('#verify_pan_response_bis').val(obj.response);
                                    
                                }
                                
                            }
                        });
            });
            function Approve()
            {
                
                    var product=$('#loan_product').val();
                    
                    var login_id=document.getElementById('Login_id').value;
                    if(product=='' || product== ' ' )
                    {
                        swal("Error!","Please select Product", "warning");
                                    exit;
                    }
                    else{
                    
                            var customer_id=document.getElementById('d_id').value;
                            $.ajax({
                                            type:'POST',
                                            url:'<?php echo base_url("index.php/Distributor/update_distributor_status_approved"); ?>',
                                            
                                            data:{'id':customer_id,'product':product,'login_id':login_id},
                                            success:function(data)
                                            {
                                                
                                                var obj =JSON.parse(data);
                                                
                                                if(obj.msg=='sucess')
                                                {
                                                    swal({
                                                                title: "success!",
                                                                text: "Status updated sucessfully",
                                                                type: "success"
                                                            })
                                                            .then((willDelete) => {
                                                                location.reload(true); 

                                                            });
                                                    

                                                }
                                                
                                                
                                                
                                            }
                                    });
                        }
            }
            function reject()
            {
                var remark=document.getElementById('reject_remark').value;
                var dis_id=document.getElementById('d_id').value;
                var login_id=document.getElementById('Login_id').value;
                if(remark=='')
                {
                    swal("Error!","Please add remark", "warning");
                    exit;
                }
                else
                {
                    $.ajax({
                                type:'POST',
                                url:'<?php echo base_url("index.php/Distributor/update_distributor_status_reject"); ?>',
                                
                                data:{'dis_id':dis_id,'scfremark':remark,'login_id':login_id},
                                success:function(data)
                                {
                                    
                                    var obj =JSON.parse(data);
                                    
                                    if(obj.msg=='sucess')
                                    {
                                        swal({
                                                    title: "success!",
                                                    text: "Status updated sucessfully",
                                                    type: "success"
                                                })
                                                .then((willDelete) => {
                                                    location.reload(true); 

                                                });
                                        

                                    }
                                    
                                    
                                    
                                }
                            });
                
                }
            }
  
            

</script>

