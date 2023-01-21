
<?php
 $result = $this->session->flashdata('result');   
 if (isset($result)) 
    {
		if($result=='1')	 { echo '<script> swal("success!", "Count updated successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='2'){ echo '<script> swal("success!", "IDCCR User added successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='3'){ echo '<script> swal("success!", "Details Updated successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='4'){ echo '<script> swal("success!", "User Deleted successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='5'){ echo '<script> swal("warning!", "Opps! Mobile already in use.", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='6'){ echo '<script> swal("warning!", "Opps! User ID already in use", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='7'){ echo '<script> swal("warning!", "Opps! Password already in use", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='8'){ echo '<script> swal("success!", "Count Reset Successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else                 { echo '<script> swal("warning!", "Error in count updation", "warning");</script>';$this->session->unset_userdata('result');	}
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
	<div class="col-sm-12">
					<center>
		<h5 style="color:green">Current Pull Chances : <?php if(isset($idccr_pull_chances)){echo $idccr_pull_chances;}else{echo 0;}?> </h5><br>
         <input type="button" value="Change Count" onClick="showHideDiv('divMsg')" class="btn btn-info" /><br><br>
         <div id="divMsg" style=" display:none">
		 <form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/admin/save_idccr_pull_chances" method="POST" enctype="multipart/form-data">
			<div class="row">
				
					<div class="col-sm-4">
				
					</div>
				
					<div class="col-sm-2">
					    <div class="form-group">
    						<label style="margin-left:-58%;font-weight:500">New Count</label>
   							<input required class="form-control" type="number" step="any" name="chance"  required>
  						</div>
					</div>
					<div class="col-sm-2">
					
					
					<button type="submit" class="btn btn-info" style="width:100%;margin-top:17%;">Save</button>
					</div>
					
					<div class="col-sm-4">
					    
					</div>
				
			
			</div>
		</form>	
         </div>
      </center>
	</div>
	</div>
	<div class="col-sm-12">
					<center><span class="signup100-form-title p-b-43"><b>OR</b></center>
					<hr>
					<center>
         <input type="button" value="Add new IDCCR user" onClick="showHideDiv2('divMsg2')" class="btn btn-info" /><br><br>
         <div id="divMsg2" style=" display:none">
		 <form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/admin/Save_idccr_user" method="POST" enctype="multipart/form-data">
			<div class="row">
			        
					<div class="col-sm-2">
					    <div class="form-group">
    						<label style="margin-left:-78%;font-weight:500">Full Name</label>
   							<input required type="text" class="form-control" id="fullname"name="fullname" placeholder="Enter Full name name">
  						</div>
					</div>
					<div class="col-sm-2">
					    <div class="form-group">
    						<label style="margin-left:-78%;font-weight:500">User ID</label>
   							<input required type="text" class="form-control" id="email" name="email" placeholder="Enter Unique User ID">
  						</div>
					</div>
					<div class="col-sm-2">
					    <div class="form-group">
    						<label style="margin-left:-70%;font-weight:500">Mobile</label>
   							<input  type="text" pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile">
  						</div>
					</div>
					<div class="col-sm-2">
					    <div class="form-group">
    						<label style="margin-left:-79%;font-weight:500">Password</label>
   							<input required type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
  						</div>
					</div>
					<div class="col-sm-2">
					  <div class="form-group">
    					<label style="margin-left:-79%;font-weight:500">Branch</label>
						<select class="form-control" name="branch_name">
						  <option>select</option>
						  <option value="Ahmednagar">Ahmednagar</option>
						  <option value="Shevgaon">Shevgaon</option>
						  <option value="Bidkin">Bidkin</option>
						   <option value="Pachod">Pachod</option>
						  <option value="Ghatkopar">Ghatkopar</option>
						   <option value="Belapur">Belapur</option>
						   <option value="Katraj">Katraj</option>
						   <option value="Hadapsar">Hadapsar</option>
						   <option value="Nilanga">Nilanga</option>
						   <option value="Shivaji Nagar">Shivaji Nagar</option>
						   <option value="Finaleap">Finaleap</option>

						</select>
						 </div>
																	</div>
					<div class="col-sm-2">
					
					<input type="text" hidden value=0 name="Count">
					<input type="text" hidden value=<?php if(isset($idccr_pull_chances)){echo $idccr_pull_chances;}else{echo 0;}?> name="balance">
					<button type="submit" class="btn btn-info" style="width:100%;margin-top:17%;">Add</button>
					</div>
							
			</div>
		</form>	
         </div>
      </center>
	</div>
<?php if(!empty($idccr_users)) {?>
	<table id="example" class="display" style="width:100%">
	<thead>
      	<tr>
	    	<th>Sr.No</th>
			<th>Full Name</th>
			<th>User ID</th>
        	<th>Mobile</th>
        	<th>Password</th>
			<th>Total Pull</th>
        	<th>Used Pull</th>
			<th>Branch</th>
			<!--<th>Date Created</th>-->
			<th>Reset</th>
			<th>Update</th>
			<th>Delete</th>
      	 </tr>
   		</thead>
		<tbody>
	<?php $i= 1;foreach($idccr_users as $idccr_users){?>
		<form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/admin/Edit_or_delete_idccr_user" method="POST" enctype="multipart/form-data">
		<tr> 
			<td><?php echo $i;?><input hidden type="text" class="form-control" name="user_ID" value="<?php echo $idccr_users->id;?>"></td>
			<td><input type="text" class="form-control" name="edit_name" value="<?php echo $idccr_users->User_name;?>"></td>
  			<td><input type="text" class="form-control" name="edit_email" value="<?php echo $idccr_users->Email; ?>"></td>
			<td><input type="text"  pattern="[6-9]{1}[0-9]{9}" oninput="maxLengthCheck(this)" maxlength="10" class="form-control" name="edit_mobile" value="<?php echo $idccr_users->mobile; ?>"></td>
			<td><input type="text" class="form-control" name="edit_password" value="<?php echo $idccr_users->Password; ?>"></td>
			<td><input type="number" class="form-control" name="edit_balance" value="<?php echo $idccr_users->Balance; ?>"></td>
			<td><input readonly type="number" class="form-control" name="edit_count" value="<?php echo $idccr_users->Count; ?>"></td>
			<td><input  type="text" class="form-control" name="edit_branch" value="<?php echo $idccr_users->Branch_name; ?>"></td>
			<input hidden type="number" class="form-control" name="idccr_pull_chances" value="<?php if(isset($idccr_pull_chances)){echo $idccr_pull_chances;}else{echo 0;}?>">
			<td><input type="submit" class="btn btn-info" value="Reset" name="Reset"></button></td>
			<td><input type="submit" class="btn btn-info" value="Update" name="Update"></button></td>
			<td><input type="submit" class="btn btn-info" value="Delete" name="delete"></button></td>

		</tr>
		</form>	
		<?php $i++; }?>
		</tbody>
     </table>
<?php } else {?>
No users found
<?php }?>



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
	  <script type="text/javascript">
         function showHideDiv2(ele) {
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>


<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->
<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>

<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>

</body>
</html>	
