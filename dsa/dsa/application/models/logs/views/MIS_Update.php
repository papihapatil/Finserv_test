<!DOCTYPE html>
<html lang="en">
<head>
  <title>MIS UPDATES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  <style>
    
      
.container {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    margin-bottom: 2.5rem;
    word-wrap: break-word;
    background-clip: border-box;
    border: 1px solid;
    border-radius: 0.25rem;
    background-color: #fff;
    border-color: #d8dbe0;
}
*, *::before, *::after {
    box-sizing: border-box;
}
    </style>
</head>
<body>
<br>  <br>

<?php
 
		if(isset($_SESSION['result']))
		{
		  
		 if($_SESSION['result'] == "error")
			{
				?>
				<script>Swal.fire("warning","Data is not enter successfully ","warning");</script>
				<?php
			}
			
			else if($_SESSION['result'] == "Success")
			{
				?>
				<script>Swal.fire("Success","Data is Successfully Store","Success");</script>
				<?php
			}
			
			  unset($_SESSION['result']);
		}
		?>
<div class="container mt-3">

  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item" >
      <a class="nav-link active" data-toggle="tab" href="#home" >DSA VISIT</a>
    </li>
    <li class="nav-item" >
      <a class="nav-link" data-toggle="tab" href="#menu1" >NTB CUSTOMER VISIT</a>
    </li>
    <li class="nav-item" >
      <a class="nav-link" data-toggle="tab" href="#menu2" >EXISTING CUSTOMER VISIT</a>
    </li>
    <li class="nav-item" >
      <a class="nav-link" data-toggle="tab" href="#menu3" >LEAD MANAGEMENT</a>
    </li>
	

  </ul>
<br>


  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
		<form action="<?php echo base_url('index.php/Relationship_Officer/dsaform');?>" method="POST">
            <div class="row">
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1" >Meeting&nbsp;</label><small style="color:red">*</small>
                        <select class="form-control " aria-label="Default select example" name="dsa_meeting" required >
                            <option value="">Select</option>
                            <option value="DSA VISIT" >DSA VISIT</option>
                            <option value="Connector VISIT">Connector VISIT</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1" >Meeting Type&nbsp;</label><small style="color:red">*</small>
                        <select class="form-control " aria-label="Default select example" name="dsa_meeting_type" required >
                            <option value="">Select</option>
                            <option value="New">New</option>
                            <option value="Existing">Existing</option>
                        </select>
                    </div>
            </div>
            <div class="row">       
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">DSA/Connector Name&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder=""  pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="dname" required>              
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">DSA/Connector Mobile&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder="" pattern="[6-9]{1}[0-9]{9}" maxlength="10"   name="dmobile" required>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                         <label class="exampleFormControlFile1">DSA/Connector Office Name&nbsp;</label><small style="color:red">*</small>
                       <input type="text" class="form-control " placeholder="" pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="doffice" required>    
                     </div>
            </div>

            <div class="row">
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">DSA/Connector Address&nbsp;</label><small style="color:red">*</small>
                        <textarea class="form-control " placeholder=""  required  name="daddress">  </textarea>
                    </div>
					<div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Pincode&nbsp;</label><small style="color:red">*</small>
                         <input type="text"class="form-control " placeholder="" id="pincode" required maxLength ="6" name="pincode"> 
                    </div>
					<div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">City&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder="" id="city" required  readonly name="city"> 
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1" >Any file discussed&nbsp;</label>
                        <select class="form-control " aria-label="Default select example" name="dfile">
                         <option value="">Select</option>
                         <option value="Yes">Yes</option>
                         <option value="No">No</option>
                         </select>            
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1" style="margin-left: 26px;">Name of Customer referred by DSA&nbsp;</label>    
                        <div class="col-lg-12" style="margin-top: -14px;">
                                    <div id="row">
                                        <div class="input-group m-3">
                                        <input type="text" name="name_customer"  pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3" 
                                                class="form-control m-input">
                                            <div class="input-group-prepend">
                                                
                                                <button class="btn btn-danger"  
                                                    id="DeleteRow" type="button">
                                                    <i class="bi bi-trash"></i>
                                                  
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                
                                    <div id="newinput"></div>
                                    <button id="rowAdder" type="button" style="margin-left: 473px;"
                                        class="btn btn-dark">
                                        <span class="bi bi-plus-square-dotted">
                                        </span>
                                    </button>
                                </div>
                                
                     </div>
            </div>
           

            <div class="row">
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Does DSA Onboarding Completed&nbsp;</label>
                             
				<select class="form-control " aria-label="Default select example"  name="dsa_onboarding">
                         <option value="">Select</option>
                         <option value="Yes">Yes</option>
                         <option value="No">No</option>
                         </select> 							
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Meeting Photo&nbsp;</label><small style="color:red">*</small>
                            <input type="file" class="form-control " placeholder="" required  name="meeting_photo">              
                        </div>
            </div>
            <div class="row">
                         <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Revisit Date&nbsp;</label><small style="color:red">*</small>
                            <input type="text" class="form-control " placeholder="" required=""  id="datepicker"  name="rdate">
                         </div>
                         <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Remarks&nbsp;</label><small style="color:red">*</small>
                            <input type="text" class="form-control " placeholder="" required=""  name="remark">
                         </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                      <center> <button type="submit" class="btn btn-primary" >Submit</button></center>
                    </div>
         </div><br>
		 </form>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
	<form action="<?php echo base_url('index.php/Relationship_Officer/Ntbform');?>" method="POST">
            <div class="row">
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Date of Meeting&nbsp;</label><small style="color:red">*</small>
                         <input type="text" class="form-control " placeholder="" required readonly  name="ntb_date" value="<?php echo date("d-m-Y");?>"> 
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Product&nbsp;</label><small style="color:red">*</small>
                        <select class="form-control " aria-label="Default select example" name="ntb_pro" required>
                        <option value="">Select</option>
                        <option value="HL" >HL</option>
                        <option value="LAP">LAP</option>
                        </select>
                    </div> 
            </div>
           
            <div class="row">
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Customer Name&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder="" required   pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="ntb_name"> 
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Customer Contact No&nbsp;</label><small style="color:red">*</small>
                        <input type="number" class="form-control " placeholder="" required pattern="[6-9]{1}[0-9]{9}" maxlength = "10" minlength = "10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length > this.minLength) this.value = this.value.slice(0, this.minLength);" name="ntb_number"> 
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                         <label class="exampleFormControlFile1" >Customer Email ID&nbsp;</label><small style="color:red">*</small>
                         <input type="text" class="form-control " placeholder="" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]*([a-z]{4})+\.((com)|(org)|(net)|(co.in)|(in)|(co.uk)|(edu)|(gov))$"   name="ntb_email">         
                    </div> 
             </div>
             <div class="row">
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Address of Meeting &nbsp;</label><small style="color:red">*</small>
                        <textarea class="form-control " placeholder="" required  name="ntb_address"></textarea> 
                    </div>
					<div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Pincode&nbsp;</label><small style="color:red">*</small>
                         <input type="text"class="form-control " placeholder="" id="pincode1" required  maxLength ="6" name="pincode1"> 
                    </div>
					<div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">City&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder="" id="city1" readonly required  name="city1"> 
                    </div>
            </div>
             
             <div class="row">
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Customer Location&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder=""  pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  required  name="ntb_location"> 
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1"  >Customer Interested &nbsp;</label><small style="color:red">*</small>
                        <select class="form-control " aria-label="Default select example" id="yes_no" onchange="myFunction();" name="ntb_interest" required>
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>  
                    </div>  
             </div>

            <div id="yes_1" style="display:none;">
                    <div class="row">
                        <div class="col-md-12 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Next Action Date&nbsp;</label><small style="color:red">*</small>
                            <input type="text" class="form-control " placeholder=""  id="datepicker2"  name="ntby_date"> 
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Applicant Name&nbsp;</label><small style="color:red">*</small>
                            <input type="text" class="form-control " placeholder=""   pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="ntby_name"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Income&nbsp;</label><small style="color:red">*</small>
                            <input type="number" class="form-control " placeholder=""  min=0 oninput="validity.valid||(value='');" name="ntby_income"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Applicant Bureau Score&nbsp;</label><small style="color:red">*</small>
                            <input type="number" class="form-control " placeholder=""   name="ntby_score"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Whether Applicant Is&nbsp;</label><small style="color:red">*</small>
                            <select class="form-control " aria-label="Default select example" id="ap1" required name="ntby_appli"  >
                            <option value="">Select</option>
                            <option value="Salaried ">Salaried </option>
                            <option value="Self Employed">Self Employed</option>
                            </select>  
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Co Applicant Name&nbsp;</label><small style="color:red">*</small>
                            <input type="text" class="form-control " placeholder=""    pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="ntby_coappliname"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Income&nbsp;</label><small style="color:red">*</small>
                            <input type="number" class="form-control " placeholder="" min=0 oninput="validity.valid||(value='');"  name="ntby_coincome"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Co Applicant Bureau Score&nbsp;</label><small style="color:red">*</small>
                            <input type="number" class="form-control " placeholder=""   name="ntby_coscore"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Whether Co Applicant Is&nbsp;</label><small style="color:red">*</small>
                            <select class="form-control " aria-label="Default select example" id="ap2" required name="ntby_coappli"  >
                            <option value="">Select</option>
                            <option value="Salaried " >Salaried </option>
                            <option value="Self Employed">Self Employed</option>
                            </select>  
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Profile&nbsp;</label><small style="color:red">*</small>
                            <input type="text" class="form-control " placeholder=""   name="ntby_profile"> 
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Property Type&nbsp;</label><small style="color:red">*</small>
                            <select class="form-control " aria-label="Default select example" id="ap3" required name="ntby_type" >
                                    <option value="">Select</option>
                                    <option value="Grampanchayat " >Grampanchayat </option>
                                    <option value="NA TP">NA TP</option>
                                </select>  
                        </div>
                        
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Loan Amount&nbsp;</label><small style="color:red">*</small>
                            <input type="number" class="form-control " placeholder=""   name="ntby_loan"> 
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label class="exampleFormControlFile1" >Area of Property(sqft)&nbsp;</label><small style="color:red">*</small>
                                <input type="number" class="form-control " placeholder=""  name="ntby_area"> 
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label class="exampleFormControlFile1">Lead Assign To&nbsp;</label><small style="color:red">*</small>
                                <select class="form-control " aria-label="Default select example" id="ap4" required  name="ntby_lead" >
                                        <option value="">Select</option>
                                        <option value="Vastu " >Vastu </option>
                                        <option value="Muthoot">Muthoot</option>
                                        <option value="Singularity">Singularity</option>
                                        <option value="Northern Arc">Northern Arc</option>
                                        <option value="Finserv">Finserv</option>
                                        <option value="CNSB">CNSB</option>
                                    </select>  
                            </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Purpose of loan&nbsp;</label><small style="color:red">*</small>
                            <input type="text" class="form-control " placeholder=""   name="ntby_purpose"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Remarks If Any&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder=""   name="ntby_remark"> 
                    
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Selfy With Customer&nbsp;</label><small style="color:red">*</small>
                            <input type="file" class="form-control " placeholder=""   name="ntby_selfy"> 
                        </div>
                    </div>
                </div>

                <div id="no_1" style="display:none;">
                    <div class="row">
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Interest Of Customer (SCF, BL-Unsecured)&nbsp;</label>
                            <input type="text" class="form-control " placeholder="" id="n1" required name="ntbn_customer"> 
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Follow UP Date&nbsp;</label>
                            <input type="date" class="form-control " placeholder="" id="n2" required name="ntbn_foldate"> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <center> <button type="submit" class="btn btn-primary" >Submit</button></center>
                     </div>
                </div><br>
			</form>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
	<form action="<?php echo base_url('index.php/Relationship_Officer/Existingform');?>" method="POST">
            <div class="row">
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Date of Meeting&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder="" required  readonly name="exit_date" value="<?php echo date("d-m-Y");?>"> 
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <label class="exampleFormControlFile1">Product&nbsp;</label><small style="color:red">*</small>
                    <select class="form-control " aria-label="Default select example" required name="exit_product">
                    <option value="">Select</option>
                    <option value="HL" >HL</option>
                    <option value="LAP">LAP</option>
                    </select>
                </div>
            </div>
            <div class="row">
					<div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Customer Contact&nbsp;</label><small style="color:red">*</small>
                        <input type="number" class="form-control " placeholder="" required  id="mobileno" pattern="[6-9]{1}[0-9]{9}" maxlength = "10" minlength = "10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length > this.minLength) this.value = this.value.slice(0, this.minLength);" name="exit_number"> 
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Customer Name&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder="" required readonly id="name" pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="exit_name"> 
                  </div>
                   
            </div>

           <div class="row">
                 
                 <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label class="exampleFormControlFile1">Address of Meeting&nbsp;</label><small style="color:red">*</small>
                    <textarea class="form-control " placeholder="" required id="address" readonly name="exit_add"> </textarea>
                  </div>
				  <div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Pincode&nbsp;</label><small style="color:red">*</small>
                         <input type="text"class="form-control " placeholder="" id="pincode2" maxLength ="6" readonly required  name="pincode2"> 
                    </div>
					<div class="col-md-4 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">City&nbsp;</label><small style="color:red">*</small>
                        <input type="text" class="form-control " placeholder="" id="city2" readonly required  name="city2"> 
                    </div>
				 
            </div>
            <div class="row">
                  <div class="col-md-12 form-group mt-3 mt-md-0">
                    <label class="exampleFormControlFile1"> Reason For Follow Up Meeting&nbsp;</label><small style="color:red">*</small>
                    <input type="text" class="form-control " placeholder="" required name="exit_reason"> 
                  </div>
           </div>
             <div class="row">
                <div class="col-md-12">
                     <center> <button type="submit" class="btn btn-primary" >Submit</button></center>
                 </div>
            </div><br>
		</form>
    </div>
    <div id="menu3" class="container tab-pane fade"><br>
	<form action="<?php echo base_url('index.php/Relationship_Officer/Leadform');?>" method="POST">
	
        <div class="row">
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1" >Lead Type&nbsp;</label><small style="color:red">*</small>
                     <select class="form-control " aria-label="Default select example" name="lead_type" required <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';}?>>
                    <option value="">Select</option>
                    <option value="Hot" >Hot</option>
                    <option value="Warm">Warm</option>
                    <option value="Cold">Cold</option>
                    </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1" >Lead's City&nbsp;</label><small style="color:red">*</small>
				<select class="form-control " name="lead_area" id="lead_area"  required <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>>
				<option selected="selected">Choose Bank Name</option>
				<?php
					print_r($lead_area );
					
				foreach($lead_area as $res) {
					  ?>
			      <option value="<?php echo $res->Branch_Location;?>"><?php echo $res->Branch_Location;?></option>
			    <?php
				  } ?>
			</select>
           <!--     <input type="textarea" class="form-control " placeholder="" required  name="lead_area" <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>> --> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1">Lead Name&nbsp;</label><small style="color:red">*</small>
                <input type="text" class="form-control " placeholder="" required pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3" name="lead_name" <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>> 
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1">Lead Contact No.&nbsp;</label><small style="color:red">*</small>
                <input type="number" class="form-control " placeholder="" required pattern="[6-9]{1}[0-9]{9}" maxlength = "10" minlength = "10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length > this.minLength) this.value = this.value.slice(0, this.minLength);" name="lead_num" <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>> 
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1">Lead Address&nbsp;</label><small style="color:red">*</small>
                <input type="textarea" class="form-control " placeholder="" required  name="lead_add" <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 form-group mt-3 mt-md-0">
               <label class="exampleFormControlFile1">Lead Assigned By&nbsp;</label><small style="color:red">*</small>
                <input type="text" class="form-control " placeholder="" required  pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3" name="lead_ass" <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>>  
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1">Lead Assigned Branch&nbsp;</label><small style="color:red">*</small>
                <input type="text" class="form-control " placeholder="" required  pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3" name="lead_branch" <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>>  
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1">Lead Assigned To&nbsp;</label><small style="color:red">*</small>
                <input type="text" class="form-control " placeholder="" required  pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3" name="lead_assito" <?php if($row->ROLE=='14') {echo 'readonly';} else {echo '';} ?>>        
            </div>
        </div>    
        <div class="row">  
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1">Lead Status&nbsp;</label><small style="color:red">*</small>
                <select class="form-control " aria-label="Default select example" name="lead_status" required >
                <option value="">Select</option>
                <option value="Open" >Open</option>
                <option value="Reject">Reject</option>
                <option value="Convert">Convert</option>
                <option value="Underprocess">Underprocess</option>
                </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="exampleFormControlFile1">Reason/Remarks&nbsp;</label><small style="color:red">*</small>
                <input type="text" class="form-control " placeholder="" required  name="lead_reason">
            </div>
        </div>
            <div class="row">
              <div class="col-md-12">
                    <center> <button type="submit" class="btn btn-primary" >Submit</button></center>
              </div>
            </div><br>
			</form>
    </div>
  </div>
</div>

</body>
<script type="text/javascript">
 
 $("#rowAdder").click(function () {
     newRowAdd =
     '<div id="row"> <div class="input-group m-3">' +
     '<input type="text" class="form-control m-input" >'+
     '<div class="input-group-prepend">' +
     '<button class="btn btn-danger" id="DeleteRow" type="button">' +
     '<i class="bi bi-trash"></i></button> </div>' +
      '</div> </div>';

     $('#newinput').append(newRowAdd);
 });

 $("body").on("click", "#DeleteRow", function () {
     $(this).parents("#row").remove();
 })
</script>
<script>
function myFunction() {
//alert("hi");
var x = document.getElementById("yes_no").value;
if(x=='Yes')
{
	$("input").prop('required',true);
	document.getElementById("n1").required = false;
	document.getElementById("n2").required = false;
    document.getElementById("yes_1").style.display = "block";
    document.getElementById("no_1").style.display = "none";
}
else if(x=='No')
{
	document.getElementById("n1").required = false;
	document.getElementById("n2").required = false;
	document.getElementById("ap1").required = false;
	document.getElementById("ap2").required = false;
	document.getElementById("ap3").required = false;
	document.getElementById("ap4").required = false;
    document.getElementById("no_1").style.display = "block";
    document.getElementById("yes_1").style.display = "none";
}

}
$( document ).ready(function() {
	 document.getElementById('datepicker1').value = (new Date()).format("m/dd/yy");
  // document.getElementById('datepicker1').value = Date('Y-m-d');
});


</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link type="text/css" rel="Stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" />
<script type="text/javascript">
    $(function () {
        Date.prototype.ddmmyyyy = function () {
            var dd = this.getDate().toString();
            var mm = (this.getMonth() + 1).toString();
            var yyyy = this.getFullYear().toString();
            return  yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" +(dd[1] ? dd : "0" + dd[0]);
        };
        $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" });
        $("#datepicker").on('change', function () {
            var selectedDate = $(this).val();
            var todaysDate = new Date().ddmmyyyy();
            if (selectedDate <todaysDate) {
                alert('Selected date must be greater than today date');
                $(this).val('');
            }
        });

		   
  		$("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" });
        $("#datepicker2").on('change', function () {
            var selectedDate = $(this).val();
            var todaysDate = new Date().ddmmyyyy();
            if (selectedDate <todaysDate) {
                alert('Selected date must be greater than today date');
                $(this).val('');
            }
        });

  		
    });   
       

$("#pincode").bind("change paste keyup", function() {
  
  if($(this).val()!=''){
   if($(this).val().length == 6){
	 var pincode_s = $(this).val();
	 if(window.location.host.includes("http"))url = window.location.host + "/finserv_test/dsa/dsa/index.php/Relationship_Officer/get_address_by_pincode";
	 else url = window.location.protocol+"//"+window.location.host + "/finserv_test/dsa/dsa/index.php/Relationship_Officer/get_address_by_pincode";            
	 $.ajax({
		type: "POST",
		url: url,
		data: '{ "pincode": "'+pincode_s+'"}',
		contentType: "application/json; charset=UTF-8",
		success: function (response) {
			var data = JSON.parse(response);
			$('#city').val(data.data.City);  
		}
	  });
   }
 }
});
$("#pincode1").bind("change paste keyup", function() {
  
  if($(this).val()!=''){
   if($(this).val().length == 6){
	 var pincode_s = $(this).val();
	 if(window.location.host.includes("http"))url = window.location.host + "/finserv_test/dsa/dsa/index.php/Relationship_Officer/get_address_by_pincode";
	 else url = window.location.protocol+"//"+window.location.host + "/finserv_test/dsa/dsa/index.php/Relationship_Officer/get_address_by_pincode";            
	 $.ajax({
		type: "POST",
		url: url,
		data: '{ "pincode": "'+pincode_s+'"}',
		contentType: "application/json; charset=UTF-8",
		success: function (response) {
			var data = JSON.parse(response);
			$('#city1').val(data.data.City);  
		}
	  });
   }
 }
});



$("#mobileno").bind("change paste keyup", function() {
  
  if($(this).val()!=''){
   if($(this).val().length == 10){
	 var pincode_s = $(this).val();
	 
	 if(window.location.host.includes("http"))url = window.location.host + "/finserv_test/dsa/dsa/index.php/Relationship_Officer/get_address_by_mobileno";
	 else url = window.location.protocol+"//"+window.location.host + "/finserv_test/dsa/dsa/index.php/Relationship_Officer/get_address_by_mobileno";            
	 $.ajax({
		type: "POST",
		url: url,
		data: '{ "mobileno": "'+pincode_s+'"}',
		contentType: "application/json; charset=UTF-8",
		success: function (response) {
			var data = JSON.parse(response);
			$('#name').val(data.data.FN+data.data.LN);  
			$('#address').val(data.data.RES_ADDRS_LINE_1+data.data.RES_ADDRS_LINE_2+data.data.RES_ADDRS_LINE_3);  
			$('#pincode2').val(data.data.RES_ADDRS_PINCODE);
			$('#city2').val(data.data.RES_ADDRS_CITY);
		}
	  });
   }
 }
});

</script>
</html>