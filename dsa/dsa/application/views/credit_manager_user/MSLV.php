<?php // echo"<pre>";
      // print_r($get_all_values);
      // echo"</pre>";
      // echo $get_all_values->value_1;
      // exit(); ?>
<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
			<div class="fade-in">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
											<form class="form-register" action="<?php echo base_url()?>index.php/admin/update_sanction_letter_pdf_values" method="post">
											<table class="table">
											  <thead>
											    <tr>
											      <th scope="col">No</th>
											      <th scope="col">Parameters</th>
											      <th scope="col">Values</th>
											
											    </tr>
											  </thead>
											  <tbody>
											    <tr>
											      <th>1</th>
											      <td>EMI Due Date </td>
											      <td><input type="text" class="form-control" name="value_1" value="<?php if(!empty($get_all_values->value_1)) echo $get_all_values->value_1;?>"></td>
											    </tr>
											    <tr>
											      <th>2</th>
											      <td>Cersai</td>
											      <td><input type="text" class="form-control" name="value_2" value="<?php if(!empty($get_all_values->value_2)) echo $get_all_values->value_2;?>"></td>
											    </tr>
											    <tr>
											      <th>3</th>
											      <td>Loan Application Fees (Non-Refundable)</td>
											      <td><input type="text" class="form-control" name="value_3" value="<?php if(!empty($get_all_values->value_3))echo $get_all_values->value_3;?>"></td>
											    </tr>
											     <tr>
											      <th>4</th>
											      <td>Re-Login Application Fees: ( Non – Refundable) Cases where application fees
													cheque bounced earlier but said case is again considered for Login.</td>
											       <td><input type="text" class="form-control" name="value_4" value="<?php if(!empty($get_all_values->value_4)) echo $get_all_values->value_4;?>"></td>
											    
											    </tr>
											    <tr>
											      <th>5</th>
											      <td>Re-Login Application Fees: ( Non- Refundable ) In Cases of Expiry of 60 Days of
													Period from the date of login, need to collect fresh login fees
													</td>
											       <td><input type="text" class="form-control" name="value_5" value="<?php if(!empty($get_all_values->value_5)) echo $get_all_values->value_5;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>6</th>
											      <td>Processing Fees (non-refundable) 
													</td>
											       <td><input type="text" class="form-control" name="value_6" value="<?php if(!empty($get_all_values->value_6)) echo $get_all_values->value_6;?>"></td>
											    
											    </tr>
											       <tr>
											      <th>7</th>
											      <td>Bounce charges (Exclusive of applicable taxes) 
													</td>
											        <td><input type="text" class="form-control" name="value_7" value="<?php if(!empty($get_all_values->value_7)) echo $get_all_values->value_7;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>8</th>
											      <td>Penal Interest (Applicable in case of non-payment of Monthly Installment on/
													before the Due Date) 
													</td>
											        <td><input type="text" class="form-control" name="value_8" value="<?php if(!empty($get_all_values->value_8))echo $get_all_values->value_8;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>9</th>
											      <td>Document Processing Charges (Exclusive of applicable taxes)
													</td>
											        <td><input type="text" class="form-control" name="value_9" value="<?php if(!empty($get_all_values->value_9))echo $get_all_values->value_9;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>10</th>
											      <td>Property Insight (Exclusive of applicable taxes) 
												</td>
											        <td><input type="text" class="form-control" name="value_10" value="<?php
											        if(!empty($get_all_values->value_10)) echo $get_all_values->value_10;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>11</th>
											      <td>Stamp duty Amount, as applicable, for execution of the Loan documents in the
													respective State(s)
													</td>
											        <td><input type="text" class="form-control" name="value_11" value="<?php if(!empty($get_all_values->value_11))echo $get_all_values->value_11;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>12</th>
											      <td>CERSAI charges (to be collected from Loan Disbursement Amount)

													</td>
											       <td><input type="text" class="form-control" name="value_12" value="<?php if(!empty($get_all_values->value_12)) echo $get_all_values->value_12;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>13</th>
											      <td>Mandate Rejection Charges (Exclusive of taxes) will be applicable if new
														mandate form is not registered within 30 days from the date of rejection of
														previous mandate form by Customer’s Bank for any reasons whatsoever

													</td>
											        <td><input type="text" class="form-control" name="value_13" value="<?php if(!empty($get_all_values->value_13))echo $get_all_values->value_13;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>14</th>
											      <td>Repayment Modes [ECS/NACH] 
													</td>
											        <td><input type="text" class="form-control" name="value_14" value="<?php if(!empty($get_all_values->value_14)) echo $get_all_values->value_14;?>"></td>
											    
											    </tr>
											     <tr>
											      <th >15</th>
											      <td>Disbursement Cheque Cancellation Charges Post Disbursal (Disbursed but
													cheque not handed over)

														</td>
											        <td><input type="text" class="form-control" name="value_15" value="<?php if(!empty($get_all_values->value_15))echo $get_all_values->value_15;?>"></td>
											    
											    </tr>
											      <tr>
											      <th>16</th>
											      <td>Repayment Swap Fees: PDC / NACH (ECS) 

</td>
											        <td><input type="text" class="form-control" name="value_16" value="<?php
											        if(!empty($get_all_values->value_16)) echo $get_all_values->value_16;?>"></td>
											    
											    </tr>
											     <tr>
											      <th>17</th>
											      <td>Statement Request (List of Documents, Statement of Account/ Duplicate NOC/
													Foreclosure Statement) 

													</td>
											       <td><input type="text" class="form-control" name="value_17" value="<?php if(!empty($get_all_values->value_17))echo $get_all_values->value_17;?>"></td>
											    
											    </tr>
											     <tr>
											      <th>18</th>
											      <td>Retrieval of Copy of Loan Documents (1st copy OF Loan Agreement will be free
													of cost and given post Loan Disbursal) 

													</td>
											        <td><input type="text" class="form-control" name="value_18" value="<?php if(!empty($get_all_values->value_18))echo $get_all_values->value_18;?>"></td>
											    
											    </tr>
											    <tr>
											      <th>19</th>
											      <td>Restructuring/ Switching Fee

												</td>
											         <td><input type="text" class="form-control" name="value_19" value="<?php if(!empty($get_all_values->value_19)) echo $get_all_values->value_19;?>"></td>
											    
											    </tr>
											       <tr>
											      <th>20</th>
											      <td>CERSAI Charge removal and Loan Closure Document Retrieval charges 

												</td>
											      <td><input type="text" class="form-control" name="value_20" value="<?php if(!empty($get_all_values->value_20)) echo $get_all_values->value_20;?>"></td>
											    
											    </tr>
											       <tr>
											      <th>21</th>
											      <td>Field Visit Charges 
													</td>
											        <td><input type="text" class="form-control" name="value_21" value="<?php if(!empty($get_all_values->value_21)) echo $get_all_values->value_21;?>"></td>
											    
											    </tr>
											  </tbody>
											</table>	
												<button type="submit" value="submit" name="submit" class="btn btn-info" style="margin-top:14%;" >Update</button>
										</form>										
												
										
        						
								</div>
							</div>
						</div>
					</main>
				</div>
				<footer class="c-footer">
					<div>Copyright © 2020 Finaleap.</div>
					<div class="mfs-auto">Powered by Finaleap</div>
				</footer>
			</div>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
