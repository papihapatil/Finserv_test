<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style>
				body {font-family: Arial;}

				/* Style the tab */
				.tab {
				  overflow: hidden;
				  border: 1px solid #ccc;
				  background-color: #f1f1f1;
				}

				/* Style the buttons inside the tab */
				.tab button {
				  background-color: inherit;
				  float: left;
				  border: none;
				  outline: none;
				  cursor: pointer;
				  padding: 14px 16px;
				  transition: 0.3s;
				  font-size: 17px;
				}

				/* Change background color of buttons on hover */
				.tab button:hover {
				  background-color: #ddd;
				}

				/* Create an active/current tablink class */
				.tab button.active {
				  background-color: #ccc;
				}

				/* Style the tab content */
				.tabcontent {
				  display: none;
				  padding: 6px 12px;
				  border: 1px solid #ccc;
				  border-top: none;
				}
			</style>
		</head>
		<body>
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
					<div class="card mb-3">
						<div class="row no-gutters">			    
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
								<div class="card-body">
									<div class="row justify-content-center">
										<h2 class="text-center" style="color:#d62122;">Customer Declarations</h2>
									</div>
									<div class="tab">
									  <button class="tablinks" onclick="openCity(event, 'DUAL_SIGNATURE')">DUAL SIGNATURE</button>
									  <button class="tablinks" onclick="openCity(event, 'DUAL_NAME')">DUAL NAME</button>
									  <button class="tablinks" onclick="openCity(event, 'DATE_OF_BIRTH')">DATE OF BIRTH</button>
									  <button class="tablinks" onclick="openCity(event, 'VERNACULAR')">DOCUMENT OBTAINED FOR VERNACULAR LANGUAGE</button>
									</div>
									<div id="DUAL_SIGNATURE" class="tabcontent">
										<center><h3>DUAL SIGNATURE DECLARATION</h3></center><br>
										<div class="row">
											<div class="col-sm-2">
												Declaration for :
											</div>
											<div class="col-sm-4">
												<select class="form-control">
													<option>Select</option>
													<option value="<?php if(!empty($row)) echo $row->UNIQUE_CODE; ?>"><?php if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); ?></option>
												    <?php
														foreach ( $coapplicants as $coapplicant) 
															{ 
													?>
													<option value="<?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo $coapplicant->UNIQUE_CODE; }?>"><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->LN); }?></option>
													<?php
															}
													?>
												</select>
											</div>
											<div class="col-sm-3">
											</div>
										</div>
										<br><span>1.	That my signature is </span><input type="text" class="form-control">.
										<br><span>2.	That I want to have this signature as follows: </span><input type="text" class="form-control">.
										<br><br><span>3.	That for mortgage operation, apart from the aforesaid signature, I would not sign in any other manner. </span>
										<br><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless and indemnified for any loss, damage, costs and charges incurred or suffered by the PFSPL and against any claims, suits, proceedings and actions instituted against the Bank due to acceptance of my request to honour instruments and instructions bearing the above-mentioned signature.</span>
									</div>
									<div id="DUAL_NAME" class="tabcontent">
										<center><h3>DUAL NAME DECLARATION</h3></center>
										<div class="row">
											<div class="col-sm-2">
												Declaration for :
											</div>
											<div class="col-sm-4">
												<select class="form-control">
													<option>Select</option>
													<option value="<?php if(!empty($row)) echo $row->UNIQUE_CODE; ?>"><?php if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); ?></option>
												    <?php
														foreach ( $coapplicants as $coapplicant) 
															{ 
													?>
													<option value="<?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo $coapplicant->UNIQUE_CODE; }?>"><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->LN); }?></option>
													<?php
															}
													?>
												</select>
											</div>
											<div class="col-sm-3">
											</div>
										</div>
										<span >1.	That my actual name is<input type="text" class="form-control">. </span>
										<br><span >2.	That my second name is as per document is <input type="text" class="form-control"></span>
										<br><span >3.	That the correct spelling of my name is as above.</span>
										<br><span >4.	My full name when expanded reads as  <input type="text" class="form-control"></span>
										<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless for any loss or damage caused to it due to acceptance of my above request.</span>
										<br><span ><b>Applicable for Married Women:</b></span>
										<br><span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;That before marriage my name was <input type="text" class="form-control">.</span>
	
									</div>
									<div id="DATE_OF_BIRTH" class="tabcontent">
									    <center><h3>DATE OF BIRTH DECLARATION</h3></center>
										<div class="row">
											<div class="col-sm-2">
												Declaration for :
											</div>
											<div class="col-sm-4">
												<select class="form-control">
													<option>Select</option>
													<option value="<?php if(!empty($row)) echo $row->UNIQUE_CODE; ?>"><?php if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); ?></option>
												    <?php
														foreach ( $coapplicants as $coapplicant) 
															{ 
													?>
													<option value="<?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo $coapplicant->UNIQUE_CODE; }?>"><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->LN); }?></option>
													<?php
															}
													?>
												</select>
											</div>
											<div class="col-sm-3">
											</div>
										</div>
										<span">1.	That my actual date of birth is <input type="text" class="form-control"></span>
										<br><span>2.	That my date of birth is inadvertently recorded as <input type="text" class="form-control"></span>
										<br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless for any loss or damage caused to it due to acceptance of my above request.</span>
									</div>
									<div id="VERNACULAR" class="tabcontent">
									  	<center><h3>DOCUMENT OBTAINED FOR VERNACULAR LANGUAGE DECLARATION</h3></center>
										<div class="row">
											<div class="col-sm-2">
												Declaration for :
											</div>
											<div class="col-sm-4">
												<select class="form-control">
													<option>Select</option>
													<option value="<?php if(!empty($row)) echo $row->UNIQUE_CODE; ?>"><?php if(!empty($row)) echo strtoupper($row->FN)." ".strtoupper($row->LN); ?></option>
												    <?php
														foreach ( $coapplicants as $coapplicant) 
															{ 
													?>
													<option value="<?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo $coapplicant->UNIQUE_CODE; }?>"><?php if(!empty($coapplicant)) { if(!empty($coapplicant)) echo strtoupper($coapplicant->FN)." ".strtoupper($coapplicant->LN); }?></option>
													<?php
															}
													?>
												</select>
											</div>
											<div class="col-sm-3">
											</div>
										</div>
										<span>
										I the Applicant(s) Mr./Ms <input type="text" class="form-control">  have understood the document (LAF/ Loan Agreement, Sanction & MITC etc) as explained to me by the declaran
										(<input type="text" class="form-control">.) and agree to abide by all the terms and conditions of the Loan Disbursement Kit.
										</span>
										<span>
											 I <input type="text" class="form-control">. Declarant residing at <input type="text" class="form-control"> have read out and explained the contents of this Loan Application Form to the Applicant (s) Mr./Ms <input type="text" class="form-control">. in <input type="text" class="form-control">
											 . language and he/ she/ they have confirmed that he / she/ they has /have understood
											 the same and have agreed to abide by all the terms and conditions of the said Loan application Form. I confirm that whatever I have stated hereinabove is true and correct to the best of my knowledge and belief. 
									<br>
									Signed by Mr./Ms. <input type="text" class="form-control"> (The Declarant – who is explaining the contents) 

										</span>
									</div>
								</div>
							</div>
						</div>		
					</div>	
				</div>
			</div>
		<script>
		function openCity(evt, cityName) {
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }
		  document.getElementById(cityName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
		</script>
   </body>
</html>