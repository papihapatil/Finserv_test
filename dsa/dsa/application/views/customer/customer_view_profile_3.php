




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
<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id == $this->session->userdata("ID")) { ?>
					<div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href="<?php echo base_url()?>index.php/customer/customer_documents"><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
				<?php } ?>					
			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="row justify-content-center">
					<div>
					</div>
					
					<div >
					</div>			
					<div>
					
					<?php 
							if(!empty($row_more))
							{
								if($row_more->STATUS == 'Income details complete')
								{
                            ?>
							
							<?php
								}
								else if($row_more->STATUS == 'Loan application complete')
								{
								?>
							<?php
								}
								else if($row_more->STATUS == 'Aadhar E-sign complete')
								{
								?>
							
							<?php
								}
								else
								{
							?>
						
							<?php
								}
							}
						?>
				
						</div>	

							
					<div >
					</div>			
					<div>
					</div>			
				</div>	
			</div>
		</div>
		
		
			
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
			

<?php $pos = 0; foreach($documents as $row){?>
	
	<?php //if($pos%2 == 0) {?> <div class="row col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 justify-content-center"> <?php //}$pos = $pos+1; ?>
		
		<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12" style="margin: 0px;">
			
			<div class="card shadow" style="margin-bottom: 5px;">
			    <div class="row">
			      <?php if(strpos($row->DOC_NAME, 'pdf') !== false) {?>
				      <!-- <img  src="<?php base_url()?>/dsa/dsa/images/documents/ic_pdf_placeholder.png" class="rounded manager-img">-->
				  <?php } else {?>  
				  	<div class="parent">
					  	<a href="#" class="pop image-back">
					  		<img  style="width: 20px; height: 20px; margin-left: 30px; margin-right: 20px; margin-top: 20px;" src="<?php base_url()?>/dsa/dsa/images/documents/<?php echo $row->DOC_NAME;  ?>" class="rounded manager-img">
					  	</a>
					  	<?php if($row->DOC_VERIFIED == 1) {?>
					  		<img right class="image-front" src="<?php base_url()?>/dsa/dsa/images/verified.png" style="width: 20px; height: 20px;">
					  	<?php } else { ?>
					  		<img right class="image-front" src="<?php base_url()?>/dsa/dsa/images/not_verified.png" style="width: 10px; height: 10px;">
					  	<?php } ?>
					</div>     	
				  <?php } ?>  

				  <div style="padding: 6px; margin-left: 20px;" class="col-xl-10 col-lg-10 col-md-10 col-sm-7 col-7">
			        <h5 class="align-self-center" style="color: #6f7272;"><b><?php echo $row->DOC_TYPE;  ?></b></h5>
			     
			        <?php if($row->DOC_VERIFIED == 0) {?>
			        	<p class="card-text"><small style="color: #d67a7a;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>			        	
			        <?php } else { ?>
			        	<p class="card-text"><small style="color: green;"><?php echo $row->VERIFICATION_MESSAGE;  ?></small></p>
			        <?php }?>
					<p class="card-text"><small style="color: green;"><?php echo strtoupper($row->DOC_MASTER_TYPE)." PROOF";  ?></small></p>
					
					<?php if($row->doc_cloud_name == '') {  ?>
					<a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>">View</a>
                    <a href="<?php echo base_url();?>images/documents/<?php echo $row->DOC_NAME;?>" target='_blank' download>Download</a>
					<?php } else { ?>
						<a href="<?php echo base_url();?>index.php/customer/view_cloud_dsa_file/<?php echo $row->ID; ?>" target='_blank' >View</a> 
											<!--	<a href="<?php echo base_url();?>index.php/customer/download_cloud_dsa_file/<?php echo $row->ID; ?>" target='_blank'  >Download</a> -->
												<?php } ?>
			      </div>
			      
			    </div>			    
			</div>		
		</div>			
	<?php if($pos%2 == 0) {?></div><?php } ?>
<?php } ?>

</div>

<!----added by sonal---26-02-2020-------->
<div class="w-100"></div> 
               <div style="margin-top: 20px;" class="row col-12 justify-content-center">
	              <div>
		               <a href="<?php echo base_url()?>index.php/customer/customer_view?ID=<?php echo $id;?>">
		                   <button class="login100-form-btn" style="background-color: #25a6c6;">
		                      	NEXT
		                   </button>
						</a>
	             </div>		
              </div>	    

</div>

<!-- Modal -->
	<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    ALERT
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/customer/delete_doc" method="POST" id="doc_delete_form">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this document ?</label>	                    
	                    <input name="id" type="number" class="idform" hidden/>	                        
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

	<!-- Creates the bootstrap modal where the image will appear -->
	<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<h4 class="modal-title" id="myModalLabel">Image preview</h4>
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>	        
	      </div>
	      <div class="modal-body">
	        <img src="" class="imagepreview" >
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		$('#deleteModel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)
		})		
	</script>