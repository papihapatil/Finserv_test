<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
  $this->session->set_userdata("id",$id);
   $this->session->set_userdata("id1",$id1);
//echo $id1;
 //echo $id;
 //exit(); Coapp_8: ["Bhubaneswar","Puri","Cuttack"],
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

	<div style="line-height: 40px; margin-left: 10px; margin-top: 20px;" class="row">
			<div style="color: black; font-size: 14px;" class="font-poppins-regular col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<?php if($id1==$row->credit_manager_id || $row->credit_sanction_status==NULL ) 
				{ ?>
				 <div class="row" style="margin-left: 10px;">
						Edit

						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
							<div>
								<span class="align-middle dot-white"><a href=""><i style="font-size:18px;color:#25a6c6; text-align: center; width: 100%;" class="fa fa-edit"></i></a></span>
							</div>	
						</div>				
					</div>
					
					<?php//				} ?>					
			</div>

		
	</div>
		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>RCU Report</h2></div>
								<?php if($this->session->flashdata('success'))
								     { 
								?>
								<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
					            <?php   echo $this->session->flashdata('success');?>
								</div>
								<?php 
								      }
									  else if($this->session->flashdata('error'))
									  {  ?>
								<?php 	echo $this->session->flashdata('error'); ?>				
								<?php }
								      else if($this->session->flashdata('warning'))
									   {  ?>
								<?php 	echo $this->session->flashdata('warning'); ?>
								<?php  }
								       else if($this->session->flashdata('info'))
									   {  ?>
								<?php    echo $this->session->flashdata('info'); ?>
								<?php  } ?>
      <!--  <form  action="<?= base_url('index.php/credit_manager_user/save_rcu_report')?>" method="post" enctype="multipart/form-data">-->
	 <form method="post" action="<?php echo base_url(); ?>index.php/credit_manager_user/save_rcu_report?UID=<?php  echo $id; ?>"  enctype="multipart/form-data">
	 	<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 justify-content-center shadow bg-white rounded margin-10 padding-15">
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Status</label>
					<select class="form-control" name="status">
					    <option value="">Select</option>
						<option value="positive" <?php if(!empty($data_row_file_path))if ($data_row_file_path->rcu_status == 'positive') echo ' selected="selected"'; ?>>Positive</option>
						<option value="negative" <?php if(!empty($data_row_file_path))if ($data_row_file_path->rcu_status == 'negative') echo ' selected="selected"'; ?>>Negative</option>
						<option value="refer" <?php if(!empty($data_row_file_path))if ($data_row_file_path->rcu_status == 'refer') echo ' selected="selected"'; ?>>Refer</option>
					</select>
					</div>
					<div class="form-group" style="width:80%;margin-left:40px;">
						<label style="width:80%;margin-left:10px;color:black;">Comments</label>
						<textarea  class="form-control" name="comment"placeholder="<?php if(isset($data_row_file_path)) echo $data_row_file_path->rcu_comment?>" ></textarea>
					</div>
					 <div class="form-group" style="width:80%;margin-left:40px;">
						<label style="width:80%;margin-left:10px;color:black;">Upload</label>
						
						<?php if(isset( $data_row_file_path->rcu_file_name))
						{
						?>
							<input  required  type="file" class="form-control" name="file"  placeholder=""><?php if(isset($data_row_file_path)) echo $data_row_file_path->rcu_file_name?> 
						    <br> <a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $data_row_file_path->rcu_file_name;?>">View Document</a>
						    <br> <a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $data_row_file_path->rcu_file_name;?>" target='_blank' download>Download </a>
					
					
						
					    <?php
						}
					     else
						 {
					     ?>
						
							 <input  required  type="file" class="form-control" name="file"  placeholder="">select file
						 <?php }
						 ?>
						
					</div>
					<center><button type="submit" class="btn btn-primary" value="submit">Submit</button></center>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</form>
  <?php }
else
{
?>      					
			</div>

		
	</div>

		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>FI Report</h2></div>
							   <?php if($this->session->flashdata('success'))
								     { 
								?>
								<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15">
					            <?php   echo $this->session->flashdata('success');?>
								</div>
								<?php 
								      }
									  else if($this->session->flashdata('error'))
									  {  ?>
								<?php 	echo $this->session->flashdata('error'); ?>				
								<?php }
								      else if($this->session->flashdata('warning'))
									   {  ?>
								<?php 	echo $this->session->flashdata('warning'); ?>
								<?php  }
								       else if($this->session->flashdata('info'))
									   {  ?>
								<?php    echo $this->session->flashdata('info'); ?>
								<?php  } ?>
			<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 justify-content-center shadow bg-white rounded margin-10 padding-15">
					<div class="form-group" style="width:80%;margin-left:40px;">
					<label style="width:80%;margin-left:10px;color:black;">Status</label>
					<select class="form-control" name="status">
					    <option value="">Select</option>
						<option value="positive" <?php if(!empty($data_row_file_path))if ($data_row_file_path->rcu_status == 'positive') echo ' selected="selected"'; ?>>Positive</option>
						<option value="negative" <?php if(!empty($data_row_file_path))if ($data_row_file_path->rcu_status == 'negative') echo ' selected="selected"'; ?>>Negative</option>
						<option value="refer" <?php if(!empty($data_row_file_path))if ($data_row_file_path->rcu_status == 'refer') echo ' selected="selected"'; ?>>Refer</option>
					</select>
					</div>
					<div class="form-group" style="width:80%;margin-left:40px;">
						<label style="width:80%;margin-left:10px;color:black;">Comments</label>
						<textarea  class="form-control" name="comment"placeholder="<?php if(isset($data_row_file_path)) echo $data_row_file_path->rcu_comment?>" ></textarea>
					</div>
					 <div class="form-group" style="width:80%;margin-left:40px;">
						<label style="width:80%;margin-left:10px;color:black;">Upload</label>
						
						<?php if(isset( $data_row_file_path->rcu_file_name))
						{
						?>
							<input  required  type="file" class="form-control" name="file"  placeholder=""><?php if(isset($data_row_file_path)) echo $data_row_file_path->rcu_file_name?> 
						    <br> <a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $data_row_file_path->rcu_file_name;?>">View Document</a>
						 
					
						
					    <?php
						}
					     else
						 {
					     ?>
						
							 <input  required  type="file" class="form-control" name="file"  placeholder="">select file
						 <?php }
						 ?>
						
					</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	
 

<?php 
} 
?>        
		
</html>
<!-- Modal -->
