<?php   $id = $_GET['ID']; // shows id of customer
?>
<html>
	<head>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<div class="row shadow bg-white rounded">
        <div class="row justify-content-center col-12">
	        <h4 style="margin-top: 15px;  color: black; font-weight: bold; margin-bottom: 10px;">Job Application By - <?php if(isset($row)) { echo $row->fname;} ?> </h4>
        </div>
		
		<br><br>
        <div class="row justify-content-center col-12">
		        <div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				    <span class="align-middle dot-light-theme"></span>
					<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">First Name</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->fname;?>">
	  					</div>
				</div>
				<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> 
						<span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Last Name</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->lname;?>">
	  					</div>
				</div>
		</div>

		<div class="row justify-content-center col-12">
		        <div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Email</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->email;?>">
	  					</div>
				</div>
				<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Mobile</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->mobile;?>">
	  					</div>
				</div>
		</div> 

		<div class="row justify-content-center col-12">
		        <div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Total Experience</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->total_experience;?>">
	  					</div>
				</div>
				<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Revelent Experience</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->relevent_experience;?>">
	  					</div>
				</div>
		</div>
		<div class="row justify-content-center col-12">
		        <div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Currently working Status</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->currently_working;?>">
	  					</div>
				</div>
				<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Name of the Organization</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->name_of_org;?>">
	  					</div>
				</div>
		</div>
       
		<div class="row justify-content-center col-12">
		        <div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Current Salary</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->current_sal_p_m;?>">
	  					</div>
				</div>
				<div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Expected Salary</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->expected_sal_p_m;?>">
	  					</div>
				</div>
		</div>
      
		<div class="row  col-12">
		        <div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Notice Period</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->notice_period;?>">
	  					</div>
				</div>
		</div>
    	<div class="row  col-12">
		        <div class="row col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				        <span class="align-middle dot-light-theme"></span> <span style="color: black; font-size: 12px; font-weight: bold; margin-left:54px;">Resume</span>
						<div style="margin-left: 35px; margin-top: 0px;" class="col">
	  						<input readonly style="margin-top: 8px;" class="form-control" value="<?php echo $row->resume_path;?>">
							  <br> <a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $row->resume_path;?>">View</a>
					        <br>
							<a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $row->resume_path;?>" target='_blank' download>Download </a>							
	     				</div>
				</div>
        </div>
    <div>
	<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 justify-content-center shadow bg-white rounded margin-10 padding-15">
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Status</label>
					<select class="form-control" name="status">
					    <option value="">Select</option>
						<option value="positive"  <?php if(!empty($data_row_file_path))if ($data_row_file_path->fi_status == 'positive') echo ' selected="selected"'; ?>>Positive</option>
						<option value="negative" <?php if(!empty($data_row_file_path))if ($data_row_file_path->fi_status == 'negative') echo ' selected="selected"'; ?>>Negative</option>
						<option value="refer" <?php if(!empty($data_row_file_path))if ($data_row_file_path->fi_status == 'refer') echo ' selected="selected"'; ?>>Refer</option>
					</select>
					</div>
					<div class="form-group" style="width:80%;margin-left:40px;">
						<label style="width:80%;margin-left:10px;color:black;">Comments</label>
						<textarea  class="form-control" name="comment" placeholder="<?php if(isset($data_row_file_path)) echo $data_row_file_path->fi_comment?>"></textarea>
					</div>
					 <div class="form-group" style="width:80%;margin-left:40px;">
						<label style="width:80%;margin-left:10px;color:black;">Upload</label>
					<?php if(isset( $data_row_file_path->fi_file_name))
						{
						?>
							<input  required  type="file" class="form-control" name="file"  placeholder=""><?php if(isset($data_row_file_path)) echo $data_row_file_path->fi_file_name?> 
						    <br> <a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $data_row_file_path->fi_file_name;?>">View</a>
					        <br>
							<a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $data_row_file_path->fi_file_name;?>" target='_blank' download>Download </a>					    <?php
						}
					     else
						 {
					     ?>
						
							 <input  required  type="file" class="form-control" name="file"  placeholder="">select file
						 <?php }
						 ?></div>
					<center><button type="submit" class="btn btn-primary" value="submit">Submit</button></center>
			</div>
			<div class="col-sm-4"></div>
		</div>

    

			  
		
</html>

