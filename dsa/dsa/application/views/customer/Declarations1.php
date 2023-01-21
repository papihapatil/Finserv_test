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
  margin-top: -41px;
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
/** BEGIN: Non Openmrs CSS **/
@import url("https://fonts.googleapis.com/css?family=Roboto&display=swap");
* {
	font-family: "Roboto";
}
div.container {
	display: flex;
	align-items: flex-start;
	justify-content: space-around;
	margin-top: 30px;
	border: 1px solid whitesmoke;
	padding: 21px;
	border-radius: 4px;
}
h4.title {
	text-align: center;
	margin-bottom: 45px;
}
:root {
	--omrs-color-ink-lowest-contrast: rgba(47, 60, 85, 0.18);
	--omrs-color-ink-low-contrast: rgba(60, 60, 67, 0.3);
	--omrs-color-ink-medium-contrast: rgba(19, 19, 21, 0.6);
	--omrs-color-interaction: #1e4bd1;
	--omrs-color-interaction-minus-two: rgba(73, 133, 224, 0.12);
	--omrs-color-danger: #b50706;
	--omrs-color-bg-low-contrast: #eff1f2;
	--omrs-color-ink-high-contrast: #121212;
	--omrs-color-bg-high-contrast: #ffffff;
	
}
/** END: Non Openmrs CSS **/
div.omrs-input-group {
  margin-bottom: 1.5rem;
  position: relative;
  width: 20.4375rem;
}

/* Input*/
.omrs-input-underlined > input,
.omrs-input-filled > input {
	border: none;
	border-bottom: 0.125rem solid var(--omrs-color-ink-medium-contrast);
		height: 2rem;
	
	padding-left: 0.875rem;
	line-height: 147.6%;
	padding-top: 0.825rem;
	padding-bottom: 0.5rem;
}

.omrs-input-underlined > input:focus,
.omrs-input-filled > input:focus {
	outline: none;
}

.omrs-input-underlined > .omrs-input-label,
.omrs-input-filled > .omrs-input-label {
	position: absolute;
	top: 0.9375rem;
	left: 0.875rem;
	line-height: 147.6%;
	color: var(--omrs-color-ink-medium-contrast);
	transition: top .2s;
}

.omrs-input-underlined > svg,
.omrs-input-filled > svg {
	position: absolute;
	top: 0.9375rem;
	right: 0.875rem;
	fill: var(--omrs-color-ink-medium-contrast);
}

.omrs-input-underlined > .omrs-input-helper,
.omrs-input-filled > .omrs-input-helper {
	font-size: 0.9375rem;
	color: var(--omrs-color-ink-medium-contrast);
	letter-spacing: 0.0275rem;
	margin: 0.125rem 0.875rem;
}

.omrs-input-underlined > input:hover,
.omrs-input-filled > input:hover {
	background: var(--omrs-color-interaction-minus-two);
	border-color: var(--omrs-color-ink-high-contrast);
}

.omrs-input-underlined > input:focus + .omrs-input-label,
.omrs-input-underlined > input:valid + .omrs-input-label,
.omrs-input-filled > input:focus + .omrs-input-label,
.omrs-input-filled > input:valid + .omrs-input-label {
	top: 0;
	font-size: 0.9375rem;
	margin-bottom: 32px;;
}

.omrs-input-underlined:not(.omrs-input-danger) > input:focus + .omrs-input-label,
.omrs-input-filled:not(.omrs-input-danger) > input:focus + .omrs-input-label {
	color: var(--omrs-color-interaction);
}

.omrs-input-underlined:not(.omrs-input-danger) > input:focus,
.omrs-input-filled:not(.omrs-input-danger) > input:focus {
	border-color: var(--omrs-color-interaction);
}

.omrs-input-underlined:not(.omrs-input-danger) > input:focus ~ svg,
.omrs-input-filled:not(.omrs-input-danger) > input:focus ~ svg {
	fill: var(--omrs-color-ink-high-contrast);
}

/** DISABLED **/

.omrs-input-underlined > input:disabled {
	background: var(--omrs-color-bg-low-contrast);
	cursor: not-allowed;
}

.omrs-input-underlined > input:disabled + .omrs-input-label,
.omrs-input-underlined > input:disabled ~ .omrs-input-helper{
	color: var(--omrs-color-ink-low-contrast);
}

.omrs-input-underlined > input:disabled ~ svg {
	fill: var(--omrs-color-ink-low-contrast);
}


/** DANGER **/

.omrs-input-underlined.omrs-input-danger > .omrs-input-label, .omrs-input-underlined.omrs-input-danger > .omrs-input-helper,
.omrs-input-filled.omrs-input-danger > .omrs-input-label, .omrs-input-filled.omrs-input-danger > .omrs-input-helper{
	color: var(--omrs-color-danger);
}

.omrs-input-danger > svg {
	fill: var(--omrs-color-danger);
}

.omrs-input-danger > input {
	border-color: var(--omrs-color-danger);
}

.omrs-input-underlined > input {
	background: var(--omrs-color-bg-high-contrast);
}
.omrs-input-filled > input {
	background: var(--omrs-color-bg-low-contrast);
}
</style>

<?php ini_set('short_open_tag', 'On'); ?>
		


		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row justify-content-center col-12">
				<span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;"><h3>Customer Declarations</h3></span><hr>

			</div>
			<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-left:10px;"><span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">DUAL SIGNATURE DECLARATION</span></div>
			<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-left:10px;"><span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">DUAL NAME DECLARATION</span></div>

			<div class="row col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12" style="margin:10px;border:1px solid gray;margin-left:20px">
				<form action="<?= base_url('index.php/Disbursement_OPS/signature_D')?>" method="post" enctype="multipart/form-data" >
					<div id="DUAL_SIGNATURE" class="tabcontent">								
										<div class="row">
											<div class="col-sm-3">
												Declaration for :
											</div>
											<div class="col-sm-8">
												<select class="form-control" name="signature_declaration_for">
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
										<div class="row">
											<div class="col-sm-3">
												1.	That my signature is 
											</div>
											<div class="col-sm-9">
												<div class="omrs-input-group">
													<label class="omrs-input-underlined">
													<input type="text"  name="signature_name">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												2.	That I want to have this signature as follows
											</div>
											<div class="col-sm-8">
												<div class="omrs-input-group">
													<label class="omrs-input-underlined" >
													<input type="text" name="signature_name_want">
												</div>
											</div>
										</div>
									<span>3.	That for mortgage operation, apart from the aforesaid signature, I would not sign in any other manner. </span>
									<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless and indemnified for any loss, damage, costs and charges incurred or suffered by the PFSPL and against any claims, suits, proceedings and actions instituted against the Bank due to acceptance of my request to honour instruments and instructions bearing the above-mentioned signature.</span>
									<div class="row">
										<div class="col-sm-9">
										</div>
										<div class="col-sm-2">
										<button type="submit" class="btn btn-primary" >Submit</button>
										</div>
										<div class="col-sm-1">
										</div>
									</div>
							</div>	
						</form>
			</div>	
				
		<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:10px;border:1px solid gray;margin-left:20px">
		<form action="<?= base_url('index.php/Disbursement_OPS/name_D')?>" method="post" enctype="multipart/form-data" >
			<div id="DUAL_NAME" class="tabcontent">
			<br>
				<div class="row">
					<div class="col-sm-3">Declaration for :</div>
					<div class="col-sm-8">
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
					<div class="col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-sm-5">1.	That my actual name is</div>
					<div class="col-sm-7">
						<div class="omrs-input-group">
							<label class="omrs-input-underlined">
							<input type="text">
						</div>
					</div>
					<div class="col-sm-5">2.	That my second name is as per document is</div>
					<div class="col-sm-7">
						<div class="omrs-input-group">
							<label class="omrs-input-underlined">
							<input type="text">
						</div>
					</div>
				</div>
			    <span >3.	That the correct spelling of my name is as above.</span>
				<div class="row">
					<div class="col-sm-5">4.	My full name when expanded reads as </div>					
					<div class="col-sm-7">
						<div class="omrs-input-group">
							<label class="omrs-input-underlined">
							<input type="text">
						</div>
					</div>
				</div>
				<br><span >a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless for any loss or damage caused to it due to acceptance of my above request.</span>
				<div class="row">
					<div class="col-sm-4"><b>Applicable for Married Women:</b></div>					
					<div class="col-sm-4">That before marriage my name was
					</div>
					<div class="col-sm-4">
						<div class="omrs-input-group">
							<label class="omrs-input-underlined">
							<input type="text">
						</div>
					</div>
				</div>
		
				<div class="row">
					<div class="col-sm-9"></div>
					<div class="col-sm-2"><button type="submit" class="btn btn-primary" >Submit</button></div>
					<div class="col-sm-1"></div>
				</div>
				<br>
			</div>
			</form>
		</div>	
  					
	

		<div class="row shadow bg-white rounded margin-10 padding-15">
			<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-left:10px;"><span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">DATE OF BIRTH DECLARATION</span></div>
			<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-left:10px;"><span style="margin-top: 15px; font-size: 16px; color: black; font-weight: bold; margin-bottom: 10px;">DOCUMENT OBTAINED FOR VERNACULAR LANGUAGE DECLARATION</span></div>

			<div class="row col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12" style="margin:10px;border:1px solid gray;margin-left:20px">
				<form action="<?= base_url('index.php/Disbursement_OPS/birth_D')?>" method="post" enctype="multipart/form-data" >
					<div id="DUAL_SIGNATURE" class="tabcontent">								
										<div class="row">
											<div class="col-sm-3">
												Declaration for :
											</div>
											<div class="col-sm-8">
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
										<div class="row">
											<div class="col-sm-3">
												1. That my actual date of birth is
											</div>
											<div class="col-sm-9">
												<div class="omrs-input-group">
													<label class="omrs-input-underlined">
													<input type="text">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												2. That my date of birth is inadvertently recorded as 
											</div>
											<div class="col-sm-8">
												<div class="omrs-input-group">
													<label class="omrs-input-underlined">
													<input type="text">
												</div>
											</div>
										</div>
									<span>a) That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless for any loss or damage caused to it due to acceptance of my above request.
									</span>
									<div class="row">
										<div class="col-sm-9">
										</div>
										<div class="col-sm-2">
										<button type="submit" class="btn btn-primary" >Submit</button>
										</div>
										<div class="col-sm-1">
										</div>
									</div>
									</div>
								</form>
			</div>	
				
			<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:10px;border:1px solid gray;margin-left:20px">
			<form action="<?= base_url('index.php/Disbursement_OPS/language_D')?>" method="post" enctype="multipart/form-data" >
					<div id="DUAL_NAME" class="tabcontent">
					<br>
					<div class="row">
						<div class="col-sm-3">Declaration for :</div>
						<div class="col-sm-8">
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
						<div class="col-sm-3"></div>
					</div>
					<div class="row">
						<div class="col-sm-2"> the Applicant(s)</div>
						<div class="col-sm-7">
							<div class="omrs-input-group">
								<label class="omrs-input-underlined">
								<input type="text">
							</div>
						</div>
						<div class="col-sm-12">	have understood the document (LAF/ Loan Agreement,Sanction & MITC etc) as explained to me by the declaran </div>
						<div class="col-sm-12">
							<div class="omrs-input-group">
								<label class="omrs-input-underlined">
								<input type="text">
							</div>and agree to abide by all theterms and conditions of the Loan Disbursement Kit.
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-5">4.	My full name when expanded reads as </div>
						<div class="col-sm-7">
							<div class="omrs-input-group">
								<label class="omrs-input-underlined">
								<input type="text">
							</div>
						</div>
					</div>
					<br><span >a)	That I hereby agree and undertake to hold the PFSPL and its officers and Directors harmless for any loss or damage caused to it due to acceptance of my above request.</span>
					<div class="row">
						<div class="col-sm-4"><b>Applicable for Married Women:</b></div>					
						<div class="col-sm-4">That before marriage my name was</div>
						<div class="col-sm-4">
							<div class="omrs-input-group">
								<label class="omrs-input-underlined">
								<input type="text">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-9"></div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
						<div class="col-sm-1"></div>
					</div>
					<br>
				</div>
				</form>
			</div>
		</div>
<script type="text/javascript">
function signature_form()
{
	alert("hiii");
}
</script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->
<script src="<?php echo base_url()?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>