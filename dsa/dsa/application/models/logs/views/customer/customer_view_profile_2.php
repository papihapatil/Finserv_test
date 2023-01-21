


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
	margin-left:9%;
	font-size:12px;
	color:gray;
}
.block_font_active{
	margin-left:9%;
	font-size:12px;
	color:White;
}
.income-type-box-unselected-view {
    width: 86px;
    height: 182px;
    border-width: 1px;
    margin-right: 10px;
    border-color: #e8fafc;
    background-color: #ffffff;
    border-radius: 5px;
    border-style: solid;
    padding: 10px;
}
@media only screen and (max-width: 460px){
.income-type-box-unselected-view {
    width: 60px;
    height: 120px;
    border-width: 1px;
    border-color: #25a6c6;
    background-color: #ffffff;
    border-radius: 5px;
    margin-left: 5px;
    margin-right: 5px;
    padding: 5px;
    border-style: solid;
}
}
</style>
  <div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
		   <?php  if(!empty($row_more))
					{
					   if($row_more->STATUS == 'Created')
						{
							?>
							<div class="col-sm-1 block_Active" title="Customer just created in system"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block" title="Step one initial GO NO GO  "><span class="block_font">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block" title="Go NO GO process"><span class="block_font">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block" title="Applicant personal information"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block" title="Applicant income information"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block" title="Applicant document information"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block" title="Loan application form"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block" title="Loan applicant document"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block" title="Aadhar e-sign process"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 

							<?php
						}
					  else if($row_more->STATUS == 'Rule Engine Step One')
						
						{
                            ?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
		    				<div class="col-sm-1 block_Active"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block"><span class="block_font">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
						<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							
							
							<?php
						}
						else if($row_more->STATUS == 'GO NO GO in progress')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_Active"><span class="block_font_active">3. &nbsp;Go NO Go</span></div>
							<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Go NO Go Hold')
					    {
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_hold"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
     						<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Go NO Go Reject')
					    {
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_reject"><span class="block_font_active">3. &nbsp;Go NO Go</span></div>
							<div class="col-sm-2 block"><span class="block_font">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div> 
<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 								
							<?php
						}
						else  if($row_more->STATUS == 'Personal details complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block"><span class="block_font">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
														<?php
						}
						else if($row_more->STATUS == 'Income details complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
							<div class="col-sm-1 block_Active"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block"><span class="block_font">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div> 
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Document upload complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div>
							<div class="col-sm-1 block_Active"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block"><span class="block_font">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div> 
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Loan application complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block"><span class="block_font">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div> 
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							
							<?php
						}
						else   if($row_more->STATUS == 'Loan Document Uploaded')
						{
						  ?><div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
              <div class="col-sm-2 block"><span class="block_font">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Aadhar E-sign complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div>
							<div class="col-sm-1 block"><span class="block_font">10. &nbsp;CAM</span></div>  
							<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>   
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
							else if($row_more->STATUS == 'Cam details complete')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
								<div class="col-sm-1 block_Active"><span class="block_font_active">10. &nbsp;CAM</span></div> 
								<div class="col-sm-1 block"><span class="block_font">11. &nbsp;PD</span></div> 
										<div class="col-sm-1 block"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>  
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'PD Completed')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">10. &nbsp;CAM</span></div> 
							<div class="col-sm-1 block_Active"><span class="block_font_active">11. &nbsp;PD</span></div>
									<div class="col-sm-1 block1"><span class="block_font">12. &nbsp;Recommendation</span></div> 
								<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div> 
<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 								
							<?php
						}
						else if($row_more->STATUS == 'Loan Recommendation Approved')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active personal_info">4. &nbsp;Personal Information</span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">10. &nbsp;CAM</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">11. &nbsp;PD</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">12. &nbsp;Loan Recommendation</span></div> 
							<div class="col-sm-1 block"><span class="block_font">13. &nbsp;Loan Sanction</span></div>
							<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
            else if($row_more->STATUS == 'Loan Sanctioned')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active personal_info">4. &nbsp;Personal Information</span><span id='tag'></span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">10. &nbsp;CAM</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">11. &nbsp;PD</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">12. &nbsp;Loan Recommendation</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">13. &nbsp;Loan Sanctioned</span></div> 
							<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						else if($row_more->STATUS == 'Sanction Rejected')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active personal_info">4. &nbsp;Personal Information</span><span id='tag'></span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">10. &nbsp;CAM</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">11. &nbsp;PD</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">12. &nbsp;Loan Recommendation</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">13. &nbsp;Sanction Rejected</span></div> 
								<div class="col-sm-2 block"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}
						 else if($row_more->STATUS == 'Disbursed')
						{
							?>
							<div class="col-sm-1 block_completed"><span class="block_font_active">1. &nbsp;Created</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">2. &nbsp;Step One</span></div>
							<div class="col-sm-1 block_completed"><span class="block_font_active">3. &nbsp;Go NO Go </span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active personal_info">4. &nbsp;Personal Information</span><span id='tag'></span></div> 
						    <div class="col-sm-1 block_completed"><span class="block_font_active">5. &nbsp;Income Info.</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">6. &nbsp;Documents</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">7. &nbsp;Loan Application Form</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">8. &nbsp;Loan Document Uploded</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">9. &nbsp;Aadhar E-sign</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">10. &nbsp;CAM</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">11. &nbsp;PD</span></div> 
							<div class="col-sm-1 block_completed"><span class="block_font_active">12. &nbsp;Loan Recommendation</span></div> 
							<div class="col-sm-2 block_completed"><span class="block_font_active">13. &nbsp;Sanctioned</span></div> 
							<div class="col-sm-2 block_Active"><span class="block_font_active">14. &nbsp;Disbursed</span></div> 
							<?php
						}

					}
           ?>
		

		</div>
</div>
<div >
		<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id == $this->session->userdata("ID")) {?>
					<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/customer/customer_edit_profile_2_income"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
				<?php } ?>					
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
					</div>
					
					<div>
					</div>			
					<div>
					</div>	
								
					<div >
					</div>			
					<div>
					</div>			
				</div>	
			</div>
		</div>
		
		

		<div class="row shadow bg-white rounded margin-10 padding-15">
			
			<div class="w-100"></div>
			<div class="row col-12 justify-content-md-center">
				<div class="row justify-content-md-center" style="padding: 0px !important;">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<div class="row <?php if($type == 'salaried'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected-view';}?> justify-content-center padding-5">
							<img class="income-type-img-size" src="<?php echo base_url()?>images/employee.png">
							<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You work in a organisation</span>
							<span class="font-9" style="margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Salaried</span>
							<div class="w-100"></div>
							<?php if($type == 'salaried') { ?>
								<img style="width: 25px; height: 25px;" src="<?php echo base_url()?>images/verified.png">
							<?php } ?>
						</div>				
					</div>	
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<div class="row <?php if($type == 'business'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected-view';}?> justify-content-center ">
							<img class="income-type-img-size" src="<?php echo base_url()?>images/businessman.png">
							<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You run your own business</span>
							<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Self Employed</span>
							<div class="w-100"></div>
							<?php if($type == 'business') { ?>
								<img style="width: 25px; height: 25px;" src="<?php echo base_url()?>images/verified.png">
							<?php } ?>
						</div>
		  			</div>	
		  			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
		  				<div class="row <?php if($type == 'notworking'){echo 'income-type-box-selected';}else{echo 'income-type-box-unselected-view';}?> justify-content-center ">
							<img class="income-type-img-size" src="<?php echo base_url()?>images/notworking.png">
							<span class="font-7" style="text-align: center; margin-top: 0px; color: black; opacity: 0.5;">You are retired or at home</span>
							<span class="font-9" style="text-align: center; margin-top: 0px; color: black; font-weight: bold; opacity: 0.8;">Retired/    Homemaker</span>
							<div class="w-100"></div>
							<?php if($type == 'notworking') { ?>
								<img style="width: 25px; height: 25px;" src="<?php echo base_url()?>images/verified.png">
							<?php } ?>
						</div>
		  			</div>
				</div>	
			</div>			
		</div>


		<!-- Salaried ------------------------------- -->
		<?php if($type == 'salaried') { ?>
			
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">About your organisation.</span>

				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Name of Organisation</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input   disabled maxlength="20"  oninput="maxLengthCheck(this)" placeholder="Organisation name" class="input-cust-name" type="text" name="org_name" value="<?php if(!empty($row))echo $row->ORG_NAME?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Industry operating</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<!--input placeholder="Enter industry operating" class="input-cust-name" type="text" name="org_operating""-->
	  					<select disabled class="input-cust-name" name="org_operating"> 
						  <option value="">Select Type *</option>
						  <option value="Mechanical" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Mechanical') echo ' selected="selected"'; ?>>Mechanical</option>
						  <option value="Electronics" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Electronics') echo ' selected="selected"'; ?>>Electronics</option>			
						  <option value="Software" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Software') echo ' selected="selected"'; ?>>Software</option>
						  <option value="Automobile" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Automobile') echo ' selected="selected"'; ?>>Automobile</option>
						  <option value="Engineering" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Engineering') echo ' selected="selected"'; ?>>Engineering</option>
						  <option value="Trading" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Trading') echo ' selected="selected"'; ?>>Trading</option>
						  <option value="Hospitality" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Hospitality') echo ' selected="selected"'; ?>>Hospitality</option>
						  <option value="Medical" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Medical') echo ' selected="selected"'; ?>>Medical</option>			  
						  <option value="Tourism" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Tourism') echo ' selected="selected"'; ?>>Tourism</option>			  
						  <option value="Hotel" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Hotel') echo ' selected="selected"'; ?>>Hotel</option>			  
						  <option value="Others" <?php if(!empty($row))if ($row->ORG_INDUSTRY_OPERATING == 'Others') echo ' selected="selected"'; ?>>Others</option>			  						  
						</select>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Organisation Type</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select disabled class="input-cust-name" name="salaried_org_type"> 
						  			<option value="">Select Type *</option>
						  <option value="Central Govt." <?php if(!empty($row))if ($row->ORG_TYPE == 'Central Govt.') echo ' selected="selected"'; ?>>Central Govt.</option>
						  <option value="Educational Institute" <?php if(!empty($row))if ($row->ORG_TYPE == 'Educational Institute') echo ' selected="selected"'; ?>>Educational Institute</option>			
						  <option value="Partnership Firm" <?php if(!empty($row))if ($row->ORG_TYPE == 'Partnership Firm') echo ' selected="selected"'; ?>>Partnership Firm</option>
						  <option value="Private Limited Company" <?php if(!empty($row))if ($row->ORG_TYPE == 'Private Limited Company') echo ' selected="selected"'; ?>>Private Limited Company</option>
						  <option value="Proprietorship Firm" <?php if(!empty($row))if ($row->ORG_TYPE == 'Proprietorship Firm') echo ' selected="selected"'; ?>>Proprietorship Firm</option>
						  <option value="Public Limited Company" <?php if(!empty($row))if ($row->ORG_TYPE == 'Public Limited Company') echo ' selected="selected"'; ?>>Public Limited Company</option>
						  <option value="Public Sector Undertaking" <?php if(!empty($row))if ($row->ORG_TYPE == 'Public Sector Undertaking') echo ' selected="selected"'; ?>>Public Sector Undertaking</option>
						  <option value="Society" <?php if(!empty($row))if ($row->ORG_TYPE == 'Society') echo ' selected="selected"'; ?>>Society</option>			  
						  <option value="State Govt." <?php if(!empty($row))if ($row->ORG_TYPE == 'State Govt.') echo ' selected="selected"'; ?>>State Govt.</option>			  
						  <option value="Trust" <?php if(!empty($row))if ($row->ORG_TYPE == 'Trust') echo ' selected="selected"'; ?>>Trust</option>			  
						  <option value="NGO" <?php if(!empty($row))if ($row->ORG_TYPE == 'NGO') echo ' selected="selected"'; ?>>NGO</option>			  
						  <option value="Startup" <?php if(!empty($row))if ($row->ORG_TYPE == 'Startup') echo ' selected="selected"'; ?>>Startup</option>  
						</select>
	  				</div> 

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Number of years working here *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter no of years working here" class="input-cust-name" type="number" name="salaried_org_no_of_years_working"  disabled maxlength="2"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_YEARS_WORKING?>">
	  				</div>  
					  <div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Net Worth (Paid Up Capital)</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input  disabled class="input-cust-name" type="number" name="org_net_worth"  required="true"   oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_NET_WORTH ?>">
	  				</div>  
	  						
	  							  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Address of Branch where you work</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Address line 1 *" class="input-cust-name" type="text" name="salaried_org_add_line_1"  disabled maxlength="20"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_1?>">
	  				</div>
	  				<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Address line 2 *" class="input-cust-name" type="text" name="salaried_org_add_line_2"   disabled maxlength="20"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_2?>">
	  				</div>
	  				<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Address line 3 *" class="input-cust-name" type="text" name="salaried_org_add_line_3"   disabled maxlength="20"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_3?>">
	  				</div>

	  				<div class="w-100"></div>

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter landmark" class="input-cust-name" type="text" name="salaried_org_landmark"  disabled maxlength="20"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_LANDMARK?>">
	  				</div>  

	  				<div class="w-100"></div>

	  				<div class="col" style="margin-top: 10px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Pin Code *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter pin code *" class="input-cust-name" type="number" name="salaried_org_pin" id="salaried_org_pin" disabled maxlength="6"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_PINCODE?>">
	  				</div>  
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										  							
				<div class="w-100"></div>

				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">
  					<input disabled placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">  					
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  					<input disabled placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row))echo $row->ORG_CITY ;?>">
  				</div> 
				</div>
			</div>

			<!-- what you do n company -->
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">About what I do there</span>

				</div>			
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-fax"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Designation</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select  disabled class="input-cust-name" id="org_designation" name="org_designation">
				        	<option value="">Select designation</option>
				            <option value="ACCOUNTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ACCOUNTANT') echo ' selected="selected"'; ?>>ACCOUNTANT</option>			  

				            <option value="AREA SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'AREA SALES MANAGER') echo ' selected="selected"'; ?>>AREA SALES MANAGER</option>			  

				            <option value="ASSISTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ASSISTANT') echo ' selected="selected"'; ?>>ASSISTANT</option>			  

				            <option value="ASSISTANT MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ASSISTANT MANAGER') echo ' selected="selected"'; ?>>ASSISTANT MANAGER</option>			  

				            <option value="ASST VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ASST VICE PRESIDENT') echo ' selected="selected"'; ?>>ASST VICE PRESIDENT</option>			  

				            <option value="CHIEF EXECUTIVE OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'CHIEF EXECUTIVE OFFICER') echo ' selected="selected"'; ?>>CHIEF EXECUTIVE OFFICER</option>			  

				            <option value="CLERK" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'CLERK') echo ' selected="selected"'; ?>>CLERK</option>			  

				            <option value="DATA ENTRY OPERATOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'DATA ENTRY OPERATOR') echo ' selected="selected"'; ?>>DATA ENTRY OPERATOR</option>			  

				            <option value="DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'DIRECTOR') echo ' selected="selected"'; ?>>DIRECTOR</option>			  

				            <option value="DY MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'DY MANAGER') echo ' selected="selected"'; ?>>DY MANAGER</option>			  

				            <option value="ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>			  

				            <option value="EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'EXECUTIVE') echo ' selected="selected"'; ?>>EXECUTIVE</option>			  

				            <option value="EXECUTIVE DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'EXECUTIVE DIRECTOR') echo ' selected="selected"'; ?>>EXECUTIVE DIRECTOR</option>			  

				            <option value="HOUSEWIFE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'HOUSEWIFE') echo ' selected="selected"'; ?>>HOUSEWIFE</option>			  

				            <option value="LECTURER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'LECTURER') echo ' selected="selected"'; ?>>LECTURER</option>			  

				            <option value="LIBRARIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'LIBRARIAN') echo ' selected="selected"'; ?>>LIBRARIAN</option>			  

				            <option value="MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'MANAGER') echo ' selected="selected"'; ?>>MANAGER</option>			  

				            <option value="PROPRIETOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'PROPRIETOR') echo ' selected="selected"'; ?>>PROPRIETOR</option>			  

				            <option value="REGIONAL MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'REGIONAL MANAGER') echo ' selected="selected"'; ?>>REGIONAL MANAGER</option>			  

				            <option value="SALES EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SALES EXECUTIVE') echo ' selected="selected"'; ?>>SALES EXECUTIVE</option>			  

				            <option value="SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SALES MANAGER') echo ' selected="selected"'; ?>>SALES MANAGER</option>			  

				            <option value="SECRETARY" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SECRETARY') echo ' selected="selected"'; ?>>SECRETARY</option>			  

				            <option value="SENIOR EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SENIOR EXECUTIVE') echo ' selected="selected"'; ?>>SENIOR EXECUTIVE</option>			  

				            <option value="SENIOR MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SENIOR MANAGER') echo ' selected="selected"'; ?>>SENIOR MANAGER</option>			  

				            <option value="SENIOR OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SENIOR OFFICER') echo ' selected="selected"'; ?>>SENIOR OFFICER</option>			  

				            <option value="STENOGRAPHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'STENOGRAPHER') echo ' selected="selected"'; ?>>STENOGRAPHER</option>			  

				            <option value="SUPERITENDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SUPERITENDENT') echo ' selected="selected"'; ?>>SUPERITENDENT</option>			  

				            <option value="SUPREVISOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SUPREVISOR') echo ' selected="selected"'; ?>>SUPREVISOR</option>			  

				            <option value="SYSTEM ANALYST" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SYSTEM ANALYST') echo ' selected="selected"'; ?>>SYSTEM ANALYST</option>			  

				            <option value="SYSTEM ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'SYSTEM ENGINEER') echo ' selected="selected"'; ?>>SYSTEM ENGINEER</option>			  

				            <option value="TEACHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'TEACHER') echo ' selected="selected"'; ?>>TEACHER</option>			  

				            <option value="TECHNICIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'TECHNICIAN') echo ' selected="selected"'; ?>>TECHNICIAN</option>			  

				            <option value="TRUSTEE" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'TRUSTEE') echo ' selected="selected"'; ?>>TRUSTEE</option>			  

				            <option value="VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'VICE PRESIDENT') echo ' selected="selected"'; ?>>VICE PRESIDENT</option>			  

				            <option value="MKTG MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'MKTG MANAGER') echo ' selected="selected"'; ?>>MKTG MANAGER</option>			  

				            <option value="NATIONAL SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'NATIONAL SALES MANAGER') echo ' selected="selected"'; ?>>NATIONAL SALES MANAGER</option>			  
				            <option value="OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'OFFICER') echo ' selected="selected"'; ?>>OFFICER</option>			  

				            <option value="OPERATORS" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'OPERATORS') echo ' selected="selected"'; ?>>OPERATORS</option>			  

				            <option value="OTHERS" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>			  

				            <option value="PARTNER" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'PARTNER') echo ' selected="selected"'; ?>>PARTNER</option>			  

				            <option value="PEON" <?php if(!empty($row))if ($row->ORG_DESIGNATION == 'PEON') echo ' selected="selected"'; ?>>PEON</option>			  
		  
				        </select>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Office/ Work Email Address *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter work email id" class="input-cust-name" type="email" name="org_work_email" disabled maxlength="30"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_WORK_EMAIL?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">You have worked here from</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled class="input-cust-name" max="<?php echo date('Y-m-d');?>" type="date" name="org_working_from" id="org_working_from" onchange="checkExperienceMonths(event);" value="<?php if(!empty($row))echo $row->ORG_WORKED_FROM?>">
	  				</div> 	  				 			  					 																		    
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Monthly take home salary for the last 3 months are *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<?php echo date('M', strtotime('-3 month'));?>
	  					<input style=" margin-bottom: 10px;" placeholder="<?php echo date('M', strtotime('-3 month'));?> months salary *" class="input-cust-name" type="number" name="salary_1"  disabled maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_SALARY_1?>">
	  					<?php echo date('M', strtotime('-2 month'));?>
	  					<input Style="margin-bottom:16px;" placeholder="<?php echo date('M', strtotime('-2 month'));?> months salary *" class="input-cust-name" type="number" name="salary_2"  disabled maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_SALARY_2?>">
	  					<?php echo date('M', strtotime('-1 month'));?>
	  					<input placeholder="<?php echo date('M', strtotime('-1 month'));?> months salary *" class="input-cust-name" type="number" name="salary_3"  disabled maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_SALARY_3?>">
	  				</div>  

	  				<div class="w-100"></div>

	  				<div class="col" style="margin-top: 6px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Please tell your total work experience *</span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 50px; margin-top: 8px;" class="row">
						<input disabled style="margin-right: 6px;" placeholder="Enter year *" class="other-income-select" type="number" name="work_experience_year" value="<?php if(!empty($row))echo $row->ORG_EXP_YEAR?>">
						<input placeholder="Enter months *" class="other-income-select" type="number" name="work_experience_month"  disabled maxlength="2"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_EXP_MONTH?>">	  											
					</div>								  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Annual gross salary</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Annual gross salary" class="input-cust-name" type="number" name="org_gross_salary" required="true" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ANNUAL_SALARY?>">
	  				</div>  				  				

	  				<div class="w-100"></div>	  				  				

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Other Income Source</span>
					</div>			
				
			
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<?php

	  						if(!empty($row->ORG_OTHER_INCOME)){
								$json = $row->ORG_OTHER_INCOME;

								$jsonData = json_decode($json);
								if($jsonData!=''){
									$data_array = $jsonData->other_income;
									for ($i=0; $i < count($data_array); $i++) { ?>
					  					<div class="other_income_wrapper">
					  						<fieldset id="incomeS_row">
												<div class="income_row">
											        <select disabled class="other-income-select other-income-select-data" id="faculty" name="salaried_other_income">
											        	<option value="">Source</option>
											            <option value="Agriculture Income" <?php if ($data_array[$i]->title == 'Agriculture Income') echo ' selected="selected"'; ?>>Agriculture Income</option>
											            <option value="Rental / Comission" <?php if ($data_array[$i]->title == 'Rental / Comission') echo ' selected="selected"'; ?>>Rental / Comission</option>
											            <option value="Business" <?php if ($data_array[$i]->title == 'Business') echo ' selected="selected"'; ?>>Business</option>
											            <option value="Other" <?php if ($data_array[$i]->title == 'Other') echo ' selected="selected"'; ?>>Other</option>
											        </select>
											        <input disabled placeholder="Annual Income" class="other-income-select other-income-amount-data" type="number" name="other_income_amount" style="width: 40%;" value="<?php echo $data_array[$i]->amount?>">
											        <input class="income_remove other-income-select" type="button" value="-" style="width: 8%; color: red;">
											    </div>	
											</fieldset> 
										</div>
									<?php }
									}
							}
							?>								
	  				</div> 

				</div>							
			</div>	

			<div class="past_employee row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">About my past company</span>

				</div>			
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-fax"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Designation</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select  disabled class="input-cust-name" id="org_past_designation" name="org_past_designation">
				        	<option value="">Select designation</option>
				            <option value="ACCOUNTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ACCOUNTANT') echo ' selected="selected"'; ?>>ACCOUNTANT</option>			  

				            <option value="AREA SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'AREA SALES MANAGER') echo ' selected="selected"'; ?>>AREA SALES MANAGER</option>			  

				            <option value="ASSISTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASSISTANT') echo ' selected="selected"'; ?>>ASSISTANT</option>			  

				            <option value="ASSISTANT MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASSISTANT MANAGER') echo ' selected="selected"'; ?>>ASSISTANT MANAGER</option>			  

				            <option value="ASST VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASST VICE PRESIDENT') echo ' selected="selected"'; ?>>ASST VICE PRESIDENT</option>			  

				            <option value="CHIEF EXECUTIVE OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'CHIEF EXECUTIVE OFFICER') echo ' selected="selected"'; ?>>CHIEF EXECUTIVE OFFICER</option>			  

				            <option value="CLERK" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'CLERK') echo ' selected="selected"'; ?>>CLERK</option>			  

				            <option value="DATA ENTRY OPERATOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DATA ENTRY OPERATOR') echo ' selected="selected"'; ?>>DATA ENTRY OPERATOR</option>			  

				            <option value="DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DIRECTOR') echo ' selected="selected"'; ?>>DIRECTOR</option>			  

				            <option value="DY MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DY MANAGER') echo ' selected="selected"'; ?>>DY MANAGER</option>			  

				            <option value="ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>			  

				            <option value="EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'EXECUTIVE') echo ' selected="selected"'; ?>>EXECUTIVE</option>			  

				            <option value="EXECUTIVE DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'EXECUTIVE DIRECTOR') echo ' selected="selected"'; ?>>EXECUTIVE DIRECTOR</option>			  

				            <option value="HOUSEWIFE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'HOUSEWIFE') echo ' selected="selected"'; ?>>HOUSEWIFE</option>			  

				            <option value="LECTURER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'LECTURER') echo ' selected="selected"'; ?>>LECTURER</option>			  

				            <option value="LIBRARIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'LIBRARIAN') echo ' selected="selected"'; ?>>LIBRARIAN</option>			  

				            <option value="MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'MANAGER') echo ' selected="selected"'; ?>>MANAGER</option>			  

				            <option value="PROPRIETOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PROPRIETOR') echo ' selected="selected"'; ?>>PROPRIETOR</option>			  

				            <option value="REGIONAL MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'REGIONAL MANAGER') echo ' selected="selected"'; ?>>REGIONAL MANAGER</option>			  

				            <option value="SALES EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SALES EXECUTIVE') echo ' selected="selected"'; ?>>SALES EXECUTIVE</option>			  

				            <option value="SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SALES MANAGER') echo ' selected="selected"'; ?>>SALES MANAGER</option>			  

				            <option value="SECRETARY" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SECRETARY') echo ' selected="selected"'; ?>>SECRETARY</option>			  

				            <option value="SENIOR EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR EXECUTIVE') echo ' selected="selected"'; ?>>SENIOR EXECUTIVE</option>			  

				            <option value="SENIOR MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR MANAGER') echo ' selected="selected"'; ?>>SENIOR MANAGER</option>			  

				            <option value="SENIOR OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR OFFICER') echo ' selected="selected"'; ?>>SENIOR OFFICER</option>			  

				            <option value="STENOGRAPHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'STENOGRAPHER') echo ' selected="selected"'; ?>>STENOGRAPHER</option>			  

				            <option value="SUPERITENDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SUPERITENDENT') echo ' selected="selected"'; ?>>SUPERITENDENT</option>			  

				            <option value="SUPREVISOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SUPREVISOR') echo ' selected="selected"'; ?>>SUPREVISOR</option>			  

				            <option value="SYSTEM ANALYST" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SYSTEM ANALYST') echo ' selected="selected"'; ?>>SYSTEM ANALYST</option>			  

				            <option value="SYSTEM ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SYSTEM ENGINEER') echo ' selected="selected"'; ?>>SYSTEM ENGINEER</option>			  

				            <option value="TEACHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TEACHER') echo ' selected="selected"'; ?>>TEACHER</option>			  

				            <option value="TECHNICIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TECHNICIAN') echo ' selected="selected"'; ?>>TECHNICIAN</option>			  

				            <option value="TRUSTEE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TRUSTEE') echo ' selected="selected"'; ?>>TRUSTEE</option>			  

				            <option value="VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'VICE PRESIDENT') echo ' selected="selected"'; ?>>VICE PRESIDENT</option>			  

				            <option value="MKTG MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'MKTG MANAGER') echo ' selected="selected"'; ?>>MKTG MANAGER</option>			  

				            <option value="NATIONAL SALES MANAGER" <?php if ($row->ORG_DESIGNATION_PAST == 'NATIONAL SALES MANAGER') echo ' selected="selected"'; ?>>NATIONAL SALES MANAGER</option>			  
				            <option value="OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OFFICER') echo ' selected="selected"'; ?>>OFFICER</option>			  

				            <option value="OPERATORS" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OPERATORS') echo ' selected="selected"'; ?>>OPERATORS</option>			  

				            <option value="OTHERS" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>			  

				            <option value="PARTNER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PARTNER') echo ' selected="selected"'; ?>>PARTNER</option>			  

				            <option value="PEON" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PEON') echo ' selected="selected"'; ?>>PEON</option>
				        </select>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Office/ Work Email Address *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter work email id" class="input-cust-name" type="email" name="org_past_work_email" id="org_past_work_email" maxlength="30"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_WORK_EMAIL_PAST?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">You have worked here from</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled class="input-cust-name" max="<?php echo date('Y-m-d');?>" type="date" name="org_past_working_from" id="org_past_working_from" value="<?php if(!empty($row))echo $row->ORG_WORKED_FROM_PAST?>">
	  				</div>  			  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Last 3 month's take home salarie's are *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input disabled style=" margin-bottom: 10px;" placeholder="Enter salary 1" class="input-cust-name" type="number" name="org_past_salary_1"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_1" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_1?>">
	  					
	  					<input disabled Style="margin-bottom:16px;" placeholder="Enter salary 2" class="input-cust-name" type="number" name="org_past_salary_2"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_2" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_2?>">
	  					
	  					<input disabled placeholder="Enter salary 3" class="input-cust-name" type="number" name="org_past_salary_3"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_3" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_3?>">
	  				</div>  				  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Annual gross salary</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Annual gross salary" class="input-cust-name" type="number" name="org_past_gross_salary" id="org_past_gross_salary" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ANNUAL_SALARY_PAST?>">
	  				</div>  				  					  				  				
				</div>				
			</div>		

			<div class="row shadow bg-white rounded margin-10 padding-15">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">About EMI's</span>
					<div class="w-100"></div>					

					<div class="row col-12" style="color: black; font-size: 14px;">
						<span class="align-middle dot-light-theme" style="margin-top: -5px;"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 12px;">Existing EMI's </span>
						<div style="margin-left: 20px;" class="custom-control custom-switch">				  
						  <input disabled checked type="checkbox" class="custom-control-input" id="emiSwitches" name="resiperchk">
						  <label class="custom-control-label" for="emiSwitches">Do you have any emi's ?</label>				  
						</div>					
					</div>
				</div>

				<div id="emisLayout" style="margin-left: 35px;" class="col">
					
						<?php

							if(!empty($row->EMIS)){
								$json = $row->EMIS;

								$jsonData = json_decode($json);
								if($jsonData!=''){
									$data_array = $jsonData->emis;
									for ($i=0; $i < count($data_array); $i++) { ?>
											<div class="emis_wrapper">
					  						<fieldset id="emisS_row">
												<div class="emis_row" id="line_1">
											        <select disabled style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
											        	<option id='1_1' value="">Select Loan Type</option>
											            <option id='2_1' value="Personal Loan" <?php if ($data_array[$i]->title == 'Personal Loan') echo ' selected="selected"'; ?>>Personal Loan</option>
											            <option id='3_1' value="Business Loan" <?php if ($data_array[$i]->title == 'Business Loan') echo ' selected="selected"'; ?>>Business Loan</option>
											            <option id='4_1' value="Home Loan" <?php if ($data_array[$i]->title == 'Home Loan') echo ' selected="selected"'; ?>>Home Loan</option>
											            <option id='5_1' value="Plot Loan" <?php if ($data_array[$i]->title == 'Plot Loan') echo ' selected="selected"'; ?>>Plot Loan</option>
											            <option id='6_1' value="Car Loan" <?php if ($data_array[$i]->title == 'Car Loan') echo ' selected="selected"'; ?>>Car Loan</option>
											            <option id='7_1' value="Other" <?php if ($data_array[$i]->title == 'Other') echo ' selected="selected"'; ?>>Other</option>
											        </select>
											        <input disabled placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" value="<?php echo $data_array[$i]->loan_amount;?>">
											        <input disabled placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" value="<?php echo $data_array[$i]->outstanding_amount;?>">
											        <input disabled placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" value="<?php echo $data_array[$i]->emi_amount;?>">
											        <input disabled placeholder="Balance Term in Months" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" value="<?php echo $data_array[$i]->bal_from_amount;?>">
											        <input disabled class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
											    </div>	
											</fieldset>
										</div>	
									<?php }
								}
						}
						?>	  										
	  				</div> 
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">My Reference's in organisation</span>

				</div>	
				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:14px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o"></i></span> <span style="color: black; font-size: 13px; margin-left: 8px;  font-weight: bold; ">Reference 1</span>
				</div>			

				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">First Name</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter first name" class="input-cust-name" type="text" name="org_ref_f_name" required="true" maxlength="20" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->REF_1_F_NAME?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Middle Name</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter middle name" class="input-cust-name" type="text" name="org_ref_m_name" required="true" maxlength="20" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->REF_1_M_NAME?>">
	  				</div>  
	  							  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Last Name</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter last name" class="input-cust-name" type="text" name="org_ref_l_name" required="true" maxlength="20" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->REF_1_L_NAME?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter last name" class="input-cust-name" type="number" name="org_ref_mobile" required="true" maxlength="10" oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" minlength="10" value="<?php if(!empty($row))echo $row->REF_1_MOBILE?>">
	  				</div>  				  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Relationship with you</span>
						</div>			
					
		  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
		  					<select disabled class="input-cust-name" name="org_ref_relation"> 
							  <option value="">Select Relationship *</option>
							  <option value="friend" <?php if(!empty($row))if ($row->REF_1_RELATION == 'friend') echo ' selected="selected"'; ?>>Friend</option>
							  <option value="relative" <?php if(!empty($row))if ($row->REF_1_RELATION == 'relative') echo ' selected="selected"'; ?>>Relative</option>
							  <option value="wife" <?php if(!empty($row))if ($row->REF_1_RELATION == 'wife') echo ' selected="selected"'; ?>>Wife</option>
							  <option value="bro" <?php if(!empty($row))if ($row->REF_1_RELATION == 'bro') echo ' selected="selected"'; ?>>Brother</option>
							  <option value="sister" <?php if(!empty($row))if ($row->REF_1_RELATION == 'sister') echo ' selected="selected"'; ?>>Sister</option>
							  <option value="father" <?php if(!empty($row))if ($row->REF_1_RELATION == 'father') echo ' selected="selected"'; ?>>Father</option>
							  <option value="mother" <?php if(!empty($row))if ($row->REF_1_RELATION == 'mother') echo ' selected="selected"'; ?>>Mother</option>
							  <option value="other" <?php if(!empty($row))if ($row->REF_1_RELATION == 'other') echo ' selected="selected"'; ?>>Other</option>
							</select>
		  				</div>  			
				</div>

				<div style="margin-top: 30px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:14px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-user-o"></i></span> <span style="color: black; font-size: 13px; margin-left: 8px;  font-weight: bold; ">Reference 2</span>
				</div>			

				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">First Name</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter first name" class="input-cust-name" type="text" name="org_ref_2_f_name" required="true" maxlength="20" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->REF_2_F_NAME?>">
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Middle Name</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter middle name" class="input-cust-name" type="text" name="org_ref_2_m_name" required="true" maxlength="20" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->REF_2_M_NAME?>">
	  				</div>  
	  							  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Last Name</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter last name" class="input-cust-name" type="text" name="org_ref_2_l_name" required="true" maxlength="20" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->REF_2_L_NAME?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Mobile Number</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled placeholder="Enter last name" class="input-cust-name" type="number" name="org_ref_2_mobile" required="true" maxlength="10" oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" minlength="10" value="<?php if(!empty($row))echo $row->REF_2_MOBILE?>">
	  				</div>  				  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-address-book-o"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Relationship with you</span>
						</div>			
					
		  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
		  					<select disabled class="input-cust-name" name="org_ref_2_relation"> 
							  <option value="">Select Relationship *</option>
							  <option value="friend" <?php if(!empty($row))if ($row->REF_2_RELATION == 'friend') echo ' selected="selected"'; ?>>Friend</option>
							  <option value="relative" <?php if(!empty($row))if ($row->REF_2_RELATION == 'relative') echo ' selected="selected"'; ?>>Relative</option>
							  <option value="wife" <?php if(!empty($row))if ($row->REF_2_RELATION == 'wife') echo ' selected="selected"'; ?>>Wife</option>
							  <option value="bro" <?php if(!empty($row))if ($row->REF_2_RELATION == 'bro') echo ' selected="selected"'; ?>>Brother</option>
							  <option value="sister" <?php if(!empty($row))if ($row->REF_2_RELATION == 'sister') echo ' selected="selected"'; ?>>Sister</option>
							  <option value="father" <?php if(!empty($row))if ($row->REF_2_RELATION == 'father') echo ' selected="selected"'; ?>>Father</option>
							  <option value="mother" <?php if(!empty($row))if ($row->REF_2_RELATION == 'mother') echo ' selected="selected"'; ?>>Mother</option>
							  <option value="other" <?php if(!empty($row))if ($row->REF_2_RELATION == 'other') echo ' selected="selected"'; ?>>Other</option>
							</select>
		  				</div>  			
				</div>						
			</div>
			</div>

			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/customer/profile_view_p_thre?ID=<?php echo $id;?>">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
					</div>		
				</div>					
			</div>
		
		<?php } ?>	

		<!-- self employed ------------------------------- -->
		<?php if($type == 'business') { ?>	
			
			<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Address of my Business</span>

			</div>
			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This will help us to collect any documents if necessary.</span>

			</div>
			<div class="w-100"></div>

			<div class="col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
				<div class="clearBoth"></div>
				<input disabled style="margin-right: 5px;" type="radio" name="editList" value="Same as permanent address">Same as permanent address
				<input disabled style="margin-left: 10px; margin-right: 5px;" type="radio" name="editList" value="Same as residential address">Same as residential address				
				<input disabled hidden="true" style="margin-left: 10px; margin-right: 5px;" type="text" id="s_url" value="<?php echo base_url()?>">
				<div class="clearBoth"></div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-marker"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled required="true" maxlength="20" oninput="maxLengthCheck(this)" style="margin-top: 1px;" placeholder="Address Line 1 *" class="input-cust-name" type="text" name="resi_add_1" id="resi_add_1" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_1?>">
  					<input disabled required="true" maxlength="20" oninput="maxLengthCheck(this)" style="margin-top: 8px;" placeholder="Address Line 2 *" class="input-cust-name" type="text" name="resi_add_2" id="resi_add_2" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_2?>">
  					<input disabled required="true" maxlength="20" oninput="maxLengthCheck(this)" style="margin-top: 8px;" placeholder="Address Line 3 *" class="input-cust-name" type="text" name="resi_add_3" id="resi_add_3" value="<?php if(!empty($row))echo $row->ORG_ADRS_LINE_3?>">
  				</div>  

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years at the current Address *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled required="true" maxlength="2" oninput="maxLengthCheck(this)" placeholder="Enter years *" class="input-cust-name" type="number" maxlength="2" name="resi_no_of_years" id="resi_no_of_years" value="<?php if(!empty($row))echo $row->ORG_YEARS_WORKING?>">
  				</div>			  				
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Landmark *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled required="true" maxlength="20" oninput="maxLengthCheck(this)" placeholder="Enter landmark *" class="input-cust-name" type="text" name="business_landmark" id="business_landmark" value="<?php if(!empty($row))echo $row->ORG_LANDMARK?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Pincode *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled required="true" maxlength="6" oninput="maxLengthCheck(this)" placeholder="Enter pincode *" class="input-cust-name" type="number" minlength="6" name="resi_pincode" id="resi_pincode" value="<?php if(!empty($row))echo $row->ORG_PINCODE?>">
  				</div>  
  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-home"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Property Type *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
					<select disabled class="input-cust-name" name="sel_property_type" id="sel_property_type"> 
					  <option value="">Select Property Type *</option>					  
					  <option value="Self Owned" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>
					  <option value="Parental/Ancestral" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Parental/Ancestral') echo ' selected="selected"'; ?>>Parental/Ancestral</option>
					  <option value="Rental personal Family" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Rental personal Family') echo ' selected="selected"'; ?>>Rental personal Family</option>
				      <option value="Shared Rental Accomodation" <?php if(!empty($row))if ($row->BIS_PROPERTY_TYPE == 'Shared Rental Accomodation') echo ' selected="selected"'; ?>>Shared Rental Accomodation</option>
					</select>
  				</div>  
				  <div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Paid up capital/ Equity in Business</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input disabled  class="input-cust-name" type="number" name="bis_equity"  required="true"   value="<?php if(!empty($row))echo $row->BIS_EQUITY ?>">
	  				</div> 			  							  				
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
  				<div style="margin-top: 0px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">State *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" id="resi_state_view" placeholder="State" class="input-cust-name" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">
  					<input disabled hidden="true" placeholder="State" class="input-cust-name" name="resi_state" id="resi_state" value="<?php if(!empty($row))echo $row->ORG_STATE ;?>">
  				
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">District *</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div id="district_div" style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled="true" placeholder="District" class="input-cust-name" id="resi_district_view" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  					<input disabled placeholder="District" class="input-cust-name" name="resi_district" id="resi_district" value="<?php if(!empty($row))echo $row->ORG_DISTRICT ;?>">
  				</div>  			  				

  				<div class="w-100"></div>

  				<div style="margin-top: 10px;" class="col">
					<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-signs"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">City</span>
				</div>			
				<div class="w-100"></div>
  				
  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
  					<input disabled placeholder="City" class="input-cust-name" name="resi_city" id="resi_city" value="<?php if(!empty($row))echo $row->ORG_CITY ;?>">
  				</div>   			  				
			</div> 			
		</div>


		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">About my profession</span>

			</div>

			<div class="row justify-content-center col-12">
				<span style="margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">This will help us to know about your income related details</span>

			</div>	  											  				
				
			<div class="justify-content-center row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input disabled style="margin-right: 5px;" type="radio" name="user_profession" value="Doctor">Doctor</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input disabled style="margin-left: 10px; margin-right: 5px;" type="radio" name="user_profession" value="CA">CA</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input disabled style="margin-right: 5px;" type="radio" name="user_profession" value="Architect">Architect</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input disabled style="margin-right: 5px;" type="radio" name="user_profession" value="Lawyer">Lawyer</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"><input disabled style="margin-right: 5px;" type="radio" name="user_profession" checked="true" value="Business Man">Business Man</div>
			</div>	

			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="business_man_layout_2">
				<div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Business PAN *</span>
					</div>			
					
					<div class="w-100"></div>
						
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input  disabled placeholder="Enter PAN *" class="input-cust-name" type="text" maxlength="10" name="business_pan" id="business_pan" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->BIS_PAN?>">
					</div>
				</div>	

				<div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">GST Number *</span>
					</div>			
					
					<div class="w-100"></div>
						
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input disabled maxlength="12" oninput="maxLengthCheck(this)" placeholder="Enter GST number *" class="input-cust-name" type="text" maxlength="2" id="business_gst_no" name="business_gst_no" value="<?php if(!empty($row))echo $row->BIS_GST?>">
					</div>
				</div>	
				
				<div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style=" margin-bottom: 20px; color: black; font-size: 14px;">
				
				<?php
				if(!empty($row))
				{
					if($row->BIS_PROFESSION=='CS')
					{
				?>
						<div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">CS Registration Number *</span>
						</div>			
					
						<div class="w-100"></div>
						
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input disabled maxlength="12" oninput="maxLengthCheck(this)" placeholder="Enter CS number *" class="input-cust-name" type="text" maxlength="2" id="cs_number" name="regi_no" value="<?php if(!empty($row))echo $row->CS_regi_no?>" >
						</div>
											
				<?php
					 }
					 if($row->BIS_PROFESSION=='CA')
					 {
				?>     <div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">CA Registration Number *</span>
						</div>			
					
						<div class="w-100"></div>
						
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input disabled maxlength="12" oninput="maxLengthCheck(this)" placeholder="Enter CA reg. number *" class="input-cust-name" type="text" maxlength="2" id="ca_number" name="regi_no" value="<?php if(!empty($row))echo $row->CA_regi_no?>" >
						</div>
				
				<?php
					 }
					 if($row->BIS_PROFESSION=='ICWA')
					 {
				?>
				        <div style="margin-top: 10px;" class="col">
							<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">ICWA Registration Number *</span>
						</div>			
					
						<div class="w-100"></div>
						
						<div style="margin-left: 35px; margin-top: 8px;" class="col">
							<input disabled maxlength="12" oninput="maxLengthCheck(this)" placeholder="Enter ICWA reg. number *" class="input-cust-name" type="text" maxlength="2" id="icwa_number" name="regi_no" value="<?php if(!empty($row))echo $row->ICWA_regi_no?>" >
						</div>
                <?php				
					 }
					  
		           }
				?>
				</div>	
				
			</div>			

			<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="other_profession_layout">
				<div class="justify-content-center row col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="margin-left: 20px; margin-bottom: 20px; color: black; font-size: 14px;">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-map-pin"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Annual Income *</span>
					</div>			
					
					<div class="w-100"></div>
						
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input disabled placeholder="Enter Annual Income *" class="input-cust-name" type="number" maxlength="18" name="business_annual_income" id="business_annual_income" oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_LANDMARK?>">
					</div>
				</div>					
			</div>					
		</div>		

		<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">About my organisation.</span>

				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">						  			

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Industry operating</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<!--input required="true" maxlength="20" oninput="maxLengthCheck(this)" placeholder="Enter industry operating" class="input-cust-name" type="text" name="self_emp_operating"-->
	  					<select disabled class="input-cust-name" name="self_emp_operating"> 
						  <option value="">Select Type *</option>
						  <option value="Mechanical" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Mechanical') echo ' selected="selected"'; ?>>Mechanical</option>
						  <option value="Electronics" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Electronics') echo ' selected="selected"'; ?>>Electronics</option>			
						  <option value="Software" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Software') echo ' selected="selected"'; ?>>Software</option>
						  <option value="Automobile" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Automobile') echo ' selected="selected"'; ?>>Automobile</option>
						  <option value="Engineering" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Engineering') echo ' selected="selected"'; ?>>Engineering</option>
						  <option value="Trading" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Trading') echo ' selected="selected"'; ?>>Trading</option>
						  <option value="Hospitality" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Hospitality') echo ' selected="selected"'; ?>>Hospitality</option>
						  <option value="Medical" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Medical') echo ' selected="selected"'; ?>>Medical</option>			  
						  <option value="Tourism" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Tourism') echo ' selected="selected"'; ?>>Tourism</option>			  
						  <option value="Hotel" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Hotel') echo ' selected="selected"'; ?>>Hotel</option>			  
						  <option value="Others" <?php if(!empty($row))if ($row->BIS_INDUS_OPERATING == 'Others') echo ' selected="selected"'; ?>>Others</option>			  						  
						</select>
	  				</div>  
	  					
	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Premises Type</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select disabled class="input-cust-name" name="self_emp_property_type"> 
						  <option value="">Select Premises *</option>
						  <option value="Rented" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Rented') echo ' selected="selected"'; ?>>Rented</option>
						  <option value="Self Owned" <?php if(!empty($row))if ($row->BIS_PREMISES_TYPE == 'Self Owned') echo ' selected="selected"'; ?>>Self Owned</option>						  
						</select>
	  				</div> 			  				
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Nature of Business</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select disabled class="input-cust-name" name="business_nature"> 
						<option value="">Select Business Nature *</option>
						    <option value="CA/CS/ICWA" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CA/CS/ICWA') echo ' selected="selected"'; ?>>CA/CS/ICWA</option>
                            <option value="DOCTOR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'DOCTOR') echo ' selected="selected"'; ?>>DOCTOR</option>
                            <option value="LAWYER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'LAWYER') echo ' selected="selected"'; ?>>LAWYER</option>	
                            <option value="RETAIL AND WHOLESALE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'RETAIL AND WHOLESALE') echo ' selected="selected"'; ?>>RETAIL AND WHOLESALE</option>	
                            <option value="INSURANCE AND FINANCIAL MANAGEMENT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'INSURANCE AND FINANCIAL MANAGEMENT') echo ' selected="selected"'; ?>>INSURANCE AND FINANCIAL MANAGEMENT</option>
                            <option value="MANPOWER AND HR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MANPOWER AND HR') echo ' selected="selected"'; ?>>MANPOWER AND HR</option>
                            <option value="FMCG/FOOD INDUSTRY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'FMCG/FOOD INDUSTRY') echo ' selected="selected"'; ?>>FMCG/FOOD INDUSTRY</option>
                            <option value="AGRICULTURE/FARMING" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'AGRICULTURE/FARMING') echo ' selected="selected"'; ?>>AGRICULTURE/FARMING</option>
                            <option value="INFORMATION TECHNOLOGY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'INFORMATION TECHNOLOGY') echo ' selected="selected"'; ?>>INFORMATION TECHNOLOGY</option>
                            <option value="ELECTRONICS/ELECTRICALS" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'ELECTRONICS/ELECTRICALS') echo ' selected="selected"'; ?>>ELECTRONICS/ELECTRICALS</option>
                            <option value="PHARMACEUTICAL/HEALTH MANAGEMENT" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'PHARMACEUTICAL/HEALTH MANAGEMENT') echo ' selected="selected"'; ?>>PHARMACEUTICAL/HEALTH MANAGEMENT</option>	
							<option value="TOURISM/HOSPITALITY/RESTAURENT/HOTEL" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'TOURISM/HOSPITALITY/RESTAURENT/HOTEL') echo ' selected="selected"'; ?>>TOURISM/HOSPITALITY/RESTAURENT/HOTEL</option>	
							<option value="JOURNALISM/TELECOMMUNICATION" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'JOURNALISM/TELECOMMUNICATION') echo ' selected="selected"'; ?>>JOURNALISM/TELECOMMUNICATION</option>	
							<option value="RTO AGENCY/MOTOR TRAINING SCHOOL" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'RTO AGENCY/MOTOR TRAINING SCHOOL') echo ' selected="selected"'; ?>>RTO AGENCY/MOTOR TRAINING SCHOOL</option>	
							<option value="PETROL/CNG/LPG AGENCY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'PETROL/CNG/LPG AGENCY') echo ' selected="selected"'; ?>>PETROL/CNG/LPG AGENCY</option>	
							<option value="REAL ESTATE/ARCHITECTURE/CONSTRUCTION/ BUILDING MATERIAL" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'REAL ESTATE/ARCHITECTURE/CONSTRUCTION/ BUILDING MATERIAL') echo ' selected="selected"'; ?>>REAL ESTATE/ARCHITECTURE/CONSTRUCTION/ BUILDING MATERIAL</option>
                            <option value="SALES/MARKETING" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'SALES/MARKETING') echo ' selected="selected"'; ?>>SALES/MARKETING</option>							
							<option value="BANKING/FINANCE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'BANKING/FINANCE') echo ' selected="selected"'; ?>>BANKING/FINANCE</option>	
							<option value="MECHANICAL/AUTOMOTIVE" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'MECHANICAL/AUTOMOTIVE') echo ' selected="selected"'; ?>>MECHANICAL/AUTOMOTIVE</option>
							<option value="EDUCATION INDUSTRY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'EDUCATION INDUSTRY') echo ' selected="selected"'; ?>>EDUCATION INDUSTRY</option>
							<option value="FILM/FASHION/BEAUTY/PERSONAL SERVICES" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'FILM/FASHION/BEAUTY/PERSONAL SERVICES') echo ' selected="selected"'; ?>>FILM/FASHION/BEAUTY/PERSONAL SERVICES</option>
							<option value="CONTRACTOR (ALL TYPE)" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'CONTRACTOR (ALL TYPE)') echo ' selected="selected"'; ?>>CONTRACTOR (ALL TYPE)</option>
							<option value="SMALL SERVICE INDUSTRY" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'SMALL SERVICE INDUSTRY') echo ' selected="selected"'; ?>>SMALL SERVICE INDUSTRY</option>
							<option value="WINE SHOP/BAR" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'WINE SHOP/BAR') echo ' selected="selected"'; ?>>WINE SHOP/BAR</option>
							<option value="OTHER" <?php if(!empty($row))if ($row->BIS_NATURE_OF_BIS == 'OTHER') echo ' selected="selected"'; ?>>OTHER</option>

						</select>
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">No of years in Business</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<input disabled="true" maxlength="2" oninput="maxLengthCheck(this)" placeholder="Enter years" class="input-cust-name" type="number" name="self_emp_no_years" value="<?php if(!empty($row))echo $row->BIS_YEARS_IN_BIS?>">
	  				</div> 
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Consitution of Company</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select disabled class="input-cust-name" name="business_constitution"> 
						  <option value="">Select Consitution *</option>
						  <option value="HUF" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'HUF') echo ' selected="selected"'; ?>>HUF</option>			  

						  <option value="INDIVIDUAL" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'INDIVIDUAL') echo ' selected="selected"'; ?>>INDIVIDUAL</option>			  

						  <option value="INDIVIDUAL - MUTUAL FUND" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'INDIVIDUAL - MUTUAL FUND') echo ' selected="selected"'; ?>>INDIVIDUAL - MUTUAL FUND</option>			  

						  <option value="PARTNERSHIP" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PARTNERSHIP') echo ' selected="selected"'; ?>>PARTNERSHIP</option>			  

						  <option value="PRIVATE LIMITED COMPANY" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PRIVATE LIMITED COMPANY') echo ' selected="selected"'; ?>>PRIVATE LIMITED COMPANY</option>			  
						  <option value="PRIVATE LTD." <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PRIVATE LTD.') echo ' selected="selected"'; ?>>PRIVATE LTD.</option>			  

						  <option value="PROPERITOR" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PROPERITOR') echo ' selected="selected"'; ?>>PROPERITOR</option>			  

						  <option value="PUBLIC LIMITED CMPANY" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'PUBLIC LIMITED CMPANY') echo ' selected="selected"'; ?>>PUBLIC LIMITED CMPANY</option>			  
						  <option value="SOCIETY" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'SOCIETY') echo ' selected="selected"'; ?>>SOCIETY</option>			  

						  <option value="TRUST" <?php if(!empty($row))if ($row->BIS_CONSTITUTION == 'TRUST') echo ' selected="selected"'; ?>>TRUST</option>			  
						  
						</select>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Designation</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
						<select disabled class="input-cust-name" name="business_desi"> 
						  <option value="">Select Designation *</option>
						  <option value="ACCOUNTANT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ACCOUNTANT') echo ' selected="selected"'; ?>>ACCOUNTANT</option>			  

				            <option value="AREA SALES MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'AREA SALES MANAGER') echo ' selected="selected"'; ?>>AREA SALES MANAGER</option>			  

				            <option value="ASSISTANT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ASSISTANT') echo ' selected="selected"'; ?>>ASSISTANT</option>			  

				            <option value="ASSISTANT MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ASSISTANT MANAGER') echo ' selected="selected"'; ?>>ASSISTANT MANAGER</option>			  

				            <option value="ASST VICE PRESIDENT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'ASST VICE PRESIDENT') echo ' selected="selected"'; ?>>ASST VICE PRESIDENT</option>			  

				            <option value="CHIEF EXECUTIVE OFFICER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'CHIEF EXECUTIVE OFFICER') echo ' selected="selected"'; ?>>CHIEF EXECUTIVE OFFICER</option>			  

				            <option value="CLERK" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'CLERK') echo ' selected="selected"'; ?>>CLERK</option>			  

				            <option value="DATA ENTRY OPERATOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'DATA ENTRY OPERATOR') echo ' selected="selected"'; ?>>DATA ENTRY OPERATOR</option>			  

				            <option value="DIRECTOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'DIRECTOR') echo ' selected="selected"'; ?>>DIRECTOR</option>			  

				            <option value="DY MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'DY MANAGER') echo ' selected="selected"'; ?>>DY MANAGER</option>			  

				            <option value="ENGINEER" <?php if ($row->BIS_DESIGNATION == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>			  

				            <option value="EXECUTIVE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'EXECUTIVE') echo ' selected="selected"'; ?>>EXECUTIVE</option>			  

				            <option value="EXECUTIVE DIRECTOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'EXECUTIVE DIRECTOR') echo ' selected="selected"'; ?>>EXECUTIVE DIRECTOR</option>			  

				            <option value="HOUSEWIFE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'HOUSEWIFE') echo ' selected="selected"'; ?>>HOUSEWIFE</option>			  

				            <option value="LECTURER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'LECTURER') echo ' selected="selected"'; ?>>LECTURER</option>			  

				            <option value="LIBRARIAN" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'LIBRARIAN') echo ' selected="selected"'; ?>>LIBRARIAN</option>			  

				            <option value="MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'MANAGER') echo ' selected="selected"'; ?>>MANAGER</option>			  

				            <option value="PROPRIETOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'PROPRIETOR') echo ' selected="selected"'; ?>>PROPRIETOR</option>			  

				            <option value="REGIONAL MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'REGIONAL MANAGER') echo ' selected="selected"'; ?>>REGIONAL MANAGER</option>			  

				            <option value="SALES EXECUTIVE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SALES EXECUTIVE') echo ' selected="selected"'; ?>>SALES EXECUTIVE</option>			  

				            <option value="SALES MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SALES MANAGER') echo ' selected="selected"'; ?>>SALES MANAGER</option>			  

				            <option value="SECRETARY" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SECRETARY') echo ' selected="selected"'; ?>>SECRETARY</option>			  

				            <option value="SENIOR EXECUTIVE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SENIOR EXECUTIVE') echo ' selected="selected"'; ?>>SENIOR EXECUTIVE</option>			  

				            <option value="SENIOR MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SENIOR MANAGER') echo ' selected="selected"'; ?>>SENIOR MANAGER</option>			  

				            <option value="SENIOR OFFICER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SENIOR OFFICER') echo ' selected="selected"'; ?>>SENIOR OFFICER</option>			  

				            <option value="STENOGRAPHER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'STENOGRAPHER') echo ' selected="selected"'; ?>>STENOGRAPHER</option>			  

				            <option value="SUPERITENDENT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SUPERITENDENT') echo ' selected="selected"'; ?>>SUPERITENDENT</option>			  

				            <option value="SUPREVISOR" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SUPREVISOR') echo ' selected="selected"'; ?>>SUPREVISOR</option>			  

				            <option value="SYSTEM ANALYST" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SYSTEM ANALYST') echo ' selected="selected"'; ?>>SYSTEM ANALYST</option>			  

				            <option value="SYSTEM ENGINEER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'SYSTEM ENGINEER') echo ' selected="selected"'; ?>>SYSTEM ENGINEER</option>			  

				            <option value="TEACHER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'TEACHER') echo ' selected="selected"'; ?>>TEACHER</option>			  

				            <option value="TECHNICIAN" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'TECHNICIAN') echo ' selected="selected"'; ?>>TECHNICIAN</option>			  

				            <option value="TRUSTEE" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'TRUSTEE') echo ' selected="selected"'; ?>>TRUSTEE</option>			  

				            <option value="VICE PRESIDENT" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'VICE PRESIDENT') echo ' selected="selected"'; ?>>VICE PRESIDENT</option>			  

				            <option value="MKTG MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'MKTG MANAGER') echo ' selected="selected"'; ?>>MKTG MANAGER</option>			  

				            <option value="NATIONAL SALES MANAGER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'NATIONAL SALES MANAGER') echo ' selected="selected"'; ?>>NATIONAL SALES MANAGER</option>			  
				            <option value="OFFICER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'OFFICER') echo ' selected="selected"'; ?>>OFFICER</option>			  

				            <option value="OPERATORS" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'OPERATORS') echo ' selected="selected"'; ?>>OPERATORS</option>			  

				            <option value="OTHERS" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>			  

				            <option value="PARTNER" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'PARTNER') echo ' selected="selected"'; ?>>PARTNER</option>			  

				            <option value="PEON" <?php if(!empty($row))if ($row->BIS_DESIGNATION == 'PEON') echo ' selected="selected"'; ?>>PEON</option>
						</select>
	  				</div>  
				</div>
			</div>

		<div class="row shadow bg-white rounded margin-10 padding-15" id="business_man_layout">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">More details about my business</span>

			</div>
			

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-3 month'));?></span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_1" id="business_income_1" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_1']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_2" id="business_income_2" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_2']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_3" id="business_income_3" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_3']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_4" id="business_income_4" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_4']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;" maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-3 month'));?>" class="input-cust-name" type="number" name="business_income_5" id="business_income_5" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_5']; }?>">
	  				</div> 
	  											  				
				</div>	

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-2 month'));?></span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_6" id="business_income_6" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_6']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_7" id="business_income_7" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_7']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_8" id="business_income_8" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_8']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_9" id="business_income_9" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_9']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-2 month'));?>" class="input-cust-name" type="number" name="business_income_10" id="business_income_10" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_10']; }?>">
	  				</div> 
	  											  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;"><?php echo date('M Y', strtotime('-1 month'));?></span>
					</div>			
					<div class="w-100"></div>
					<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "01 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_11" id="business_income_11" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_11']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "07 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_12" id="business_income_12" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_12']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "14 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_13" id="business_income_13" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_13']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "21 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_14" id="business_income_14" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_14']; }?>">
	  					<input min="0" style=" margin-bottom: 10px;"  maxlength="10" oninput="maxLengthCheck(this)" placeholder="<?php echo "28 - ".date('m-Y', strtotime('-1 month'));?>" class="input-cust-name" type="number" name="business_income_15" id="business_income_15" value="<?php if(!empty($row->BIS_BANK_BAL_JSON)) {$someObject = json_decode($row->BIS_BANK_BAL_JSON , true ); echo $someObject['amount_15']; }?>">
	  				</div>    
	  											  				
				</div>						
		</div>

		<div class="row shadow bg-white rounded margin-10 padding-15" >
				<div class="row col-12 justify-content-center">
					<div>
						<a href="<?php echo base_url()?>index.php/customer/profile_view_p_thre?ID=<?php echo $id;?>">
						<button class="login100-form-btn" style="background-color: #25a6c6;">
							NEXT
						</button></a>
					</div>		
				</div>					
			</div>
		
		<?php } ?>				

						  <!-- notworking ------------------------------- -->
		
		<?php if($type == 'notworking') { ?>
			<div class="row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold;">Awesome</span>

				</div>
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 35px; font-size: 12px; color: #bfbbbb;">Please can you tell a bit more annual income.</span>

				</div>
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Annual Income</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input  maxlength="20"  oninput="maxLengthCheck(this)" placeholder="Enter annual income" class="input-cust-name" type="number" min="10000" name="income" value="<?php if(!empty($row))echo $row->RETIRED_ANNUAL_INCOME?>">
	  				</div> 			  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="" class="col">
						<span class="align-middle dot-light-theme"><i style=" font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-industry"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Source of Annual income</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<select disabled class="input-cust-name" name="income_type"> 
						  <option value="">Select Type </option>
						  <option value="Mechanical" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Pension') echo ' selected="selected"'; ?>>Pension</option>
						  <option value="Electronics" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Dividend') echo ' selected="selected"'; ?>>Dividend</option>			
						  <option value="Software" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Interest') echo ' selected="selected"'; ?>>Interest</option>
						  <option value="Automobile" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Salary') echo ' selected="selected"'; ?>>Salary</option>
						  <option value="Engineering" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Coaching') echo ' selected="selected"'; ?>>Coaching</option>
						  <option value="Trading" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Consulting') echo ' selected="selected"'; ?>>Consulting</option>
						  <option value="Hospitality" <?php if(!empty($row))if ($row->RETIRED_ANNUAL_INCOME_TYPE == 'Others') echo ' selected="selected"'; ?>>Others</option>
						</select>
	  				</div>  
	  				
				</div>

			</div>	

			<div class="past_employee row shadow bg-white rounded margin-10 padding-15">
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us a bit more about your past company</span>

				</div>			
				<div class="w-100"></div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					
	  				<div style="margin-top: 0px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-fax"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Designation *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<select  class="input-cust-name" id="org_past_designation" name="org_past_designation">
				        	<option value="">Select designation</option>
				            <option value="ACCOUNTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ACCOUNTANT') echo ' selected="selected"'; ?>>ACCOUNTANT</option>			  

				            <option value="AREA SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'AREA SALES MANAGER') echo ' selected="selected"'; ?>>AREA SALES MANAGER</option>			  

				            <option value="ASSISTANT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASSISTANT') echo ' selected="selected"'; ?>>ASSISTANT</option>			  

				            <option value="ASSISTANT MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASSISTANT MANAGER') echo ' selected="selected"'; ?>>ASSISTANT MANAGER</option>			  

				            <option value="ASST VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ASST VICE PRESIDENT') echo ' selected="selected"'; ?>>ASST VICE PRESIDENT</option>			  

				            <option value="CHIEF EXECUTIVE OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'CHIEF EXECUTIVE OFFICER') echo ' selected="selected"'; ?>>CHIEF EXECUTIVE OFFICER</option>			  

				            <option value="CLERK" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'CLERK') echo ' selected="selected"'; ?>>CLERK</option>			  

				            <option value="DATA ENTRY OPERATOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DATA ENTRY OPERATOR') echo ' selected="selected"'; ?>>DATA ENTRY OPERATOR</option>			  

				            <option value="DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DIRECTOR') echo ' selected="selected"'; ?>>DIRECTOR</option>			  

				            <option value="DY MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'DY MANAGER') echo ' selected="selected"'; ?>>DY MANAGER</option>			  

				            <option value="ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'ENGINEER') echo ' selected="selected"'; ?>>ENGINEER</option>			  

				            <option value="EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'EXECUTIVE') echo ' selected="selected"'; ?>>EXECUTIVE</option>			  

				            <option value="EXECUTIVE DIRECTOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'EXECUTIVE DIRECTOR') echo ' selected="selected"'; ?>>EXECUTIVE DIRECTOR</option>			  

				            <option value="HOUSEWIFE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'HOUSEWIFE') echo ' selected="selected"'; ?>>HOUSEWIFE</option>			  

				            <option value="LECTURER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'LECTURER') echo ' selected="selected"'; ?>>LECTURER</option>			  

				            <option value="LIBRARIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'LIBRARIAN') echo ' selected="selected"'; ?>>LIBRARIAN</option>			  

				            <option value="MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'MANAGER') echo ' selected="selected"'; ?>>MANAGER</option>			  

				            <option value="PROPRIETOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PROPRIETOR') echo ' selected="selected"'; ?>>PROPRIETOR</option>			  

				            <option value="REGIONAL MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'REGIONAL MANAGER') echo ' selected="selected"'; ?>>REGIONAL MANAGER</option>			  

				            <option value="SALES EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SALES EXECUTIVE') echo ' selected="selected"'; ?>>SALES EXECUTIVE</option>			  

				            <option value="SALES MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SALES MANAGER') echo ' selected="selected"'; ?>>SALES MANAGER</option>			  

				            <option value="SECRETARY" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SECRETARY') echo ' selected="selected"'; ?>>SECRETARY</option>			  

				            <option value="SENIOR EXECUTIVE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR EXECUTIVE') echo ' selected="selected"'; ?>>SENIOR EXECUTIVE</option>			  

				            <option value="SENIOR MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR MANAGER') echo ' selected="selected"'; ?>>SENIOR MANAGER</option>			  

				            <option value="SENIOR OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SENIOR OFFICER') echo ' selected="selected"'; ?>>SENIOR OFFICER</option>			  

				            <option value="STENOGRAPHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'STENOGRAPHER') echo ' selected="selected"'; ?>>STENOGRAPHER</option>			  

				            <option value="SUPERITENDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SUPERITENDENT') echo ' selected="selected"'; ?>>SUPERITENDENT</option>			  

				            <option value="SUPREVISOR" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SUPREVISOR') echo ' selected="selected"'; ?>>SUPREVISOR</option>			  

				            <option value="SYSTEM ANALYST" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SYSTEM ANALYST') echo ' selected="selected"'; ?>>SYSTEM ANALYST</option>			  

				            <option value="SYSTEM ENGINEER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'SYSTEM ENGINEER') echo ' selected="selected"'; ?>>SYSTEM ENGINEER</option>			  

				            <option value="TEACHER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TEACHER') echo ' selected="selected"'; ?>>TEACHER</option>			  

				            <option value="TECHNICIAN" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TECHNICIAN') echo ' selected="selected"'; ?>>TECHNICIAN</option>			  

				            <option value="TRUSTEE" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'TRUSTEE') echo ' selected="selected"'; ?>>TRUSTEE</option>			  

				            <option value="VICE PRESIDENT" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'VICE PRESIDENT') echo ' selected="selected"'; ?>>VICE PRESIDENT</option>			  

				            <option value="MKTG MANAGER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'MKTG MANAGER') echo ' selected="selected"'; ?>>MKTG MANAGER</option>			  

				            <option value="NATIONAL SALES MANAGER" <?php if ($row->ORG_DESIGNATION_PAST == 'NATIONAL SALES MANAGER') echo ' selected="selected"'; ?>>NATIONAL SALES MANAGER</option>			  
				            <option value="OFFICER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OFFICER') echo ' selected="selected"'; ?>>OFFICER</option>			  

				            <option value="OPERATORS" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OPERATORS') echo ' selected="selected"'; ?>>OPERATORS</option>			  

				            <option value="PARTNER" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PARTNER') echo ' selected="selected"'; ?>>PARTNER</option>			  

				            <option value="PEON" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'PEON') echo ' selected="selected"'; ?>>PEON</option>

							<option value="OTHERS" <?php if(!empty($row))if ($row->ORG_DESIGNATION_PAST == 'OTHERS') echo ' selected="selected"'; ?>>OTHERS</option>			  

				        </select>
	  				</div> 

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-envelope-open"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">Office/ Work Email Address *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input placeholder="Enter work email id" class="input-cust-name" type="email" name="org_past_work_email" id="org_past_work_email" maxlength="30"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_WORK_EMAIL_PAST?>">
	  				</div>  

	  				<div style="margin-top: 10px;" class="col">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-calendar"></i></span> <span style="color: black; font-size: 12px; margin-left: 8px;  font-weight: bold; ">You have worked here from *</span>
					</div>			
				
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input class="input-cust-name" max="<?php echo date('Y-m-d');?>" type="date" name="org_past_working_from" id="org_past_working_from" value="<?php if(!empty($row))echo $row->ORG_WORKED_FROM_PAST?>">
	  				</div>  			  				
				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:15px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Last 3 month's take home salarie's are *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					
	  					<input min="0" style=" margin-bottom: 10px;" placeholder="Enter salary 1" class="input-cust-name" type="number" name="org_past_salary_1"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_1" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_1?>">
	  					
	  					<input min="0" Style="margin-bottom:16px;" placeholder="Enter salary 2" class="input-cust-name" type="number" name="org_past_salary_2"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_2" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_2?>">
	  					
	  					<input min="0" placeholder="Enter salary 3" class="input-cust-name" type="number" name="org_past_salary_3"  maxlength="12"  oninput="maxLengthCheck(this)" id="org_past_salary_3" value="<?php if(!empty($row))echo $row->ORG_SALARY_PAST_3?>">
	  				</div>  				  				
				</div>
				
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="col" style="margin-top: 0px;">
						<span class="align-middle dot-light-theme"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 8px;">Annual gross salary *</span>
					</div>			
					<div class="w-100"></div>
	  				<div style="margin-left: 35px; margin-top: 8px;" class="col">
	  					<input min="0" placeholder="Annual gross salary" class="input-cust-name" type="number" name="org_past_gross_salary" id="org_past_gross_salary" maxlength="12"  oninput="maxLengthCheck(this)" value="<?php if(!empty($row))echo $row->ORG_ANNUAL_SALARY_PAST?>">
	  				</div>  				  					  				  				
				</div>				
			</div>		

			<div class="row shadow bg-white rounded margin-10 padding-15">
				
				<div class="row justify-content-center col-12">
					<span style="text-align: center; margin-bottom: 30px; margin-top: 8px; font-size: 16px; color: black; font-weight: bold;">Tell us bit more about EMI's *</span>

					<div class="row col-12" style="color: black; font-size: 14px;">
						<span class="align-middle dot-light-theme" style="margin-top: -5px;"><i style="margin-top: 8px; font-size:11px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-money"></i></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left: 12px;">Existing EMI's </span>
					<div class="w-100"></div>
						<div style="margin-left: 20px;" class="custom-control custom-switch">				  
						  <input disabled checked type="checkbox" class="custom-control-input" id="emiSwitches" name="resiperchk">
						  <label class="custom-control-label" for="emiSwitches">Do you have any emi's ?</label>				  
						</div>					
					</div>
				</div>

				<div id="emisLayout" style="margin-left: 35px;" class="col">
					
	  					<?php

	  						if(!empty($row->RETIRED_EMIS)){
							$json = $row->RETIRED_EMIS;

							$jsonData = json_decode($json);
							if($jsonData!=''){
								$data_array = $jsonData->emis;
								for ($i=0; $i < count($data_array); $i++) { ?>
										<div class="emis_wrapper">
				  						<fieldset id="emisS_row">
											<div class="emis_row" id="line_1">
										        <select disabled style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
										        	<option id='1_1' value="">Select Loan Type</option>
										            <option id='2_1' value="Personal Loan" <?php if ($data_array[$i]->title == 'Personal Loan') echo ' selected="selected"'; ?>>Personal Loan</option>
										            <option id='3_1' value="Business Loan" <?php if ($data_array[$i]->title == 'Business Loan') echo ' selected="selected"'; ?>>Business Loan</option>
										            <option id='4_1' value="Home Loan" <?php if ($data_array[$i]->title == 'Home Loan') echo ' selected="selected"'; ?>>Home Loan</option>
										            <option id='5_1' value="Plot Loan" <?php if ($data_array[$i]->title == 'Plot Loan') echo ' selected="selected"'; ?>>Plot Loan</option>
										            <option id='6_1' value="Car Loan" <?php if ($data_array[$i]->title == 'Car Loan') echo ' selected="selected"'; ?>>Car Loan</option>
										            <option id='7_1' value="Other" <?php if ($data_array[$i]->title == 'Other') echo ' selected="selected"'; ?>>Other</option>
										        </select>
										        <input disabled min="0" placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" value="<?php echo $data_array[$i]->loan_amount;?>">
										        <input disabled disabled min="0" placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" value="<?php echo $data_array[$i]->outstanding_amount;?>">
										        <input disabled min="0" placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" value="<?php echo $data_array[$i]->emi_amount;?>">
										        <input disabled min="0" placeholder="Balance Term in Months" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" value="<?php echo $data_array[$i]->bal_from_amount;?>">
										        <input disabled class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
								<?php } 
								}
							} else { ?>
								<div class="emis_wrapper">
				  						<fieldset id="emisS_row">
											<div class="emis_row" id="line_1">
										        <select style="width: 17%;" class="other-income-select emis-select-data" id="emis" name="emi[]">
										        	<option id='1_1' value="">Select Loan Type</option>
										            <option id='2_1'>Personal Loan</option>
										            <option id='3_1' >Business Loan</option>
										            <option id='4_1' >Home Loan</option>
										            <option id='5_1' >Plot Loan</option>
										            <option id='6_1' >Car Loan</option>
										            <option id='7_1' >Other</option>
										        </select>
										        <input min="0" placeholder="Loan Amount" class="other-income-select emis-loan-data" type="number" name="emis_loan_amount" style="width: 17%;" >
										        <input min="0" placeholder="Outstanding Loan" class="other-income-select emis-outstanding-data" type="number" name="emis_outstanding_amount" style="width: 17%;" >
										        <input min="0" placeholder="EMI" class="other-income-select emis-emi-data" type="number" name="emis_emi_amount" style="width: 17%;" >
										        <input min="0" placeholder="Balance Term in Months" class="other-income-select emis-bal_from-data" type="number" name="emis_bal_from_amount" style="width: 17%;" >
										        <input class="emis_remove other-income-select" type="button" value="-" style="width: 8%; color: red;" >
										    </div>	
										</fieldset>
									</div>	
						<?php }?>	  	

	  				</div> 
			</div>

			
		<?php } ?>	
				
		</div>		
	</div>

