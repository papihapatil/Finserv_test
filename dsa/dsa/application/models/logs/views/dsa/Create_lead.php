
<?php
 
 $result = $this->session->flashdata('result');   if (isset($result)) {
	   if($result=='1'){
		   
			   echo '<script> swal("success!", "Lead Save successfully", "success");</script>';
			   $this->session->unset_userdata('result');	
						   
			}
			 else 
			  {
				  
				  echo '<script> swal("warning!", "Error in Lead Save", "warning");</script>';
					   $this->session->unset_userdata('result');	
					   
			  }
	   }	

   ?>
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
<div class="row justify-content-center ">
   <div class="col-sm-12">
				  <form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/BranchManager/add_new_lead" method="POST" enctype="multipart/form-data"  >
				   <center>
					   <span class="signup100-form-title p-b-43"><b>Upload Excel file</b></span><br>
					   <small style="color:green"><a style=" margin-top:-10px;color:green" target='_blank' href="<?php echo base_url()?>images/Excel/Lead_Sample_Excel.xlsx" class=""><i class='fas fa-cloud-download-alt'></i> Download Sample file </a></small>
					   <br>	
																		   
					   <input class="input100" type="File" name='userfile[]'  multiple="multiple" placeholder="Enter File" required>
					   <span class="focus-input100"></span>

					   <button class="btn btn-info">SAVE</button></center>	<hr>
				  </form>
   </div>
   <div class="col-sm-12">
				   <center><span class="signup100-form-title p-b-43"><b>OR</b></center>
				   <hr>
				   <center>
		<input type="button" value="Add new lead" onClick="showHideDiv('divMsg')" class="btn btn-info" /><br><br>
		<div id="divMsg" style=" display:none">
		<form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/BranchManager/add_new_single_lead" method="POST" enctype="multipart/form-data">
		   <div class="row">
			   
				   <div class="col-sm-3">
					   <div class="form-group">
						   <label style="margin-left:-73%;font-weight:500">First Name</label>
							  <input required type="text" class="form-control" id="fname"name="fname" placeholder="Enter first name">
						 </div>
				   </div>
				   <div class="col-sm-3">
					   <div class="form-group">
						   <label style="margin-left:-73%;font-weight:500">Last Name</label>
							  <input required type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
						 </div>
				   </div>
				   <div class="col-sm-3">
					   <div class="form-group">
						   <label style="margin-left:-73%;font-weight:500">Email ID</label>
							  <input required type="email" class="form-control" id="email" name="email" placeholder="Enter email ID">
						 </div>
				   </div>
				   <div class="col-sm-3">
					   <div class="form-group">
						   <label style="margin-left:-73%;font-weight:500">Mobile</label>
						   <input required type="text" maxlength="10" required oninput="maxLengthCheck(this)" pattern="[6-9]{1}[0-9]{9}" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile">
						 </div>
				   </div>
				
				   <div class="col-sm-3">
					   <div class="form-group">
						   <label style="margin-left:-73%;font-weight:500">Refer By</label>
						  <select class="form-control" aria-label="Default select example" name="Refer_By_Category" id="select_category_lead_1"  >
						   <option value="">Select category</option>
						   <option value="<?php echo $userType; ?>">Self</option>
						   <?php if ($userType=='branch_manager'){?>
						   <option value="Relationship_officer">Relationship Officer</option>
						   <?php }?>
						   <?php if ($userType=='branch_manager'||$userType=='Relationship_Officer'){?>
						   <option value="DSA">DSA</option>
						   <?php } ?>
						   <option value="connector">Connector</option>
						   <option value="Agency">Agency</option>
						   
						   
																						   
					   </select>
						 </div>
				   </div>
				   <div class="col-sm-3" id="display_option">
					   <div class="form-group">
						   <label style="margin-left:-73%;font-weight:500">Refer By Name</label>
							  <input type="text" id="User_id" value="<?php echo $this->session->userdata('ID'); ?>" hidden>
						   <select class="form-control" aria-label="Default select example"  id="options_display_lead_1" name="Refer_By">
								   <option value="">Select Name</option>
																								   
						   </select>
						   <input type="text" id="Refered_By_self" name="Refered_By_self" hidden >
						   <input type="text" id="Refered_By_Name" name="Refered_By_Name" hidden >
						 </div>
				   </div>
				   <div class="col-sm-3" Style="display:none" id="Agency_name">
					   <div class="form-group"> 
						   <label style="margin-left:-73%;font-weight:500">Refer By Name</label>
						   <input type="text"  name="Refered_By_Name_1" class="form-control" >
					   </div>
				   </div>
				    <div class="col-sm-3" id="Agency_name">
					   <div class="form-group"> 
						   <label style="margin-left:-73%;font-weight:500">City</label>
						   <input type="text"  name="Location" class="form-control" placeholder="Enter Location" >
					   </div>
				   </div>
				  
		   
		   </div>
		  
			<input type="submit" value="Add Lead"  class="btn btn-info" /><br><br>
	   </form>	
		</div>
	 </center>
   </div>
   </div>
</div>

</div>
</div>
</div>

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
<script type="text/javascript">
		function showHideDiv(ele) {
			var srcElement = document.getElementById(ele);
			if (srcElement != null) {
				if (srcElement.style.display == "block") {
					srcElement.style.display = 'none';
				}
				else {
					srcElement.style.display = 'block';
				}
				return false;
			}
		}
	 </script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>


<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>

</body>
</html>	
