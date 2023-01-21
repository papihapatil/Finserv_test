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


  <!-- Tab panes -->
 
            <div >
                    <div class="row">
                        <div class="col-md-12 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Next Action Date&nbsp;</label>
                            <input type="date" readonly class="form-control " placeholder="" value="<?php if(!empty($get_more_info)) echo $get_more_info->next_action_date;?>"> 
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Applicant Name&nbsp;</label>
                            <input type="text" readonly class="form-control " placeholder=""   pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="ntby_name"  value="<?php if(!empty($get_more_info)) echo $get_more_info->applicant_name;?>"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Income&nbsp;</label>
                            <input type="number" readonly class="form-control " placeholder=""   name="ntby_income" value="<?php if(!empty($get_more_info)) echo $get_more_info->applicant_income;?>"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Applicant Bureau Score&nbsp;</label>
                            <input type="number" readonly class="form-control " placeholder=""   name="ntby_score" value="<?php if(!empty($get_more_info)) echo $get_more_info->applicant_bureu_score;?>"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Whether Applicant Is&nbsp;</label>
							<input type="text" class="form-control " placeholder="" readonly  name="ntby_appli" value="<?php if(!empty($get_more_info)) echo $get_more_info->applicant_is;?>"> 
                     
              
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Co Applicant Name&nbsp;</label>
                            <input type="text" class="form-control " placeholder=""   readonly  pattern="^[a-zA-Z][\sa-zA-Z]*" minlength="3"  name="ntby_coappliname" value="<?php if(!empty($get_more_info)) echo $get_more_info->coapplicant_name;?>"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Income&nbsp;</label>
                            <input type="number" class="form-control " placeholder=""  readonly name="ntby_coincome" value="<?php if(!empty($get_more_info)) echo $get_more_info->coapplicant_income;?>"> 
                        </div>
                        <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Co Applicant Bureau Score&nbsp;</label>
                            <input type="number" class="form-control " placeholder="" readonly  name="ntby_coscore" value="<?php if(!empty($get_more_info)) echo $get_more_info->coapplicant_bruer_score;?>"> 
                        </div>
						
						 <div class="col-md-3 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Whether Co Applicant Is&nbsp;</label><small style="color:red">*</small>
							  <input type="text" class="form-control " placeholder="" readonly  name="ntby_coappli" value="<?php if(!empty($get_more_info)) echo $get_more_info->coapplicant_is;?>"> 
                     
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Profile&nbsp;</label>
                            <input type="text" class="form-control " placeholder=""  readonly name="ntby_profile" value="<?php if(!empty($get_more_info)) echo $get_more_info->custyes_profile;?>"> 
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Property Type&nbsp;</label>
							  <input type="text" class="form-control " placeholder=""  readonly name="ntby_type" value="<?php if(!empty($get_more_info)) echo $get_more_info->custyes_type;?>"> 
                  
                           
                        </div>
                        
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Loan Amount&nbsp;</label>
                            <input type="number" class="form-control " placeholder="" readonly  name="ntby_loan" value="<?php if(!empty($get_more_info)) echo $get_more_info->custyes_loan;?>"> 
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label class="exampleFormControlFile1" >Area of Property(sqft)&nbsp;</label>
                                <input type="number" class="form-control " placeholder="" readonly name="ntby_area" value="<?php if(!empty($get_more_info)) echo $get_more_info->custyes_area;?>"> 
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label class="exampleFormControlFile1">Lead Assign To&nbsp;</label>
								   <input type="text" class="form-control " placeholder="" readonly name="ntby_lead" value="<?php if(!empty($get_more_info)) echo $get_more_info->custyes_laedass;?>"> 
                       
                              
                            </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1">Purpose of loan&nbsp;</label>
                            <input type="text" class="form-control " placeholder="" readonly  name="ntby_purpose" value="<?php if(!empty($get_more_info)) echo $get_more_info->custyes_purpose;?>"> 
                        </div>
                   
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label class="exampleFormControlFile1">Remarks If Any&nbsp;</label>
                        <input type="text" class="form-control " placeholder="" readonly  name="ntby_remark" value="<?php if(!empty($get_more_info)) echo $get_more_info->custyes_remarks;?>"> 
                    
                        </div>
						</div>
						
                        <!--<div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="exampleFormControlFile1" >Selfy With Customer&nbsp;</label></small>
                            <input type="file" class="form-control " placeholder=""  readonly name="ntby_selfy"> 
                        </div>
                    </div>-->
               
                
            </div><br>
			
    </div>


</body>


</html>