<?php 
  $id1 = $this->session->userdata("ID"); //shows id of credite manager user
  $id = $_GET['ID']; // shows id of customer
 // $this->session->set_userdata("id",$id);
  // $this->session->set_userdata("id1",$id1);
//echo $id1;
//echo $id;
 //exit();
?>
		
		
		
		
		
		
		
		<div class="row justify-content-center shadow bg-white rounded margin-10 padding-15"><h2>Approval Remark</h2></div>
		<div class="row  justify-content-center shadow bg-white rounded margin-10 padding-15">
		 					
				<br><br>
				<div>
				  <h3><?php //echo $row->approval_remark;?></h3>
				  <h5>Previous Remark</h5><br>
				  <?php  
				  if(!$row_remark=='')
				  {
				?> <?php echo $row_remark->form_submit_date; ?> : &emsp;&emsp;
				<?php
					echo $row_remark->approval_remark;
					
				 
				   }
				else
				{
                   ?>
				   <h4>No Remark found</h4>
				   
				   <?php
					}
				   ?>
				   
				</div>
         </div>
		

<!-- Modal -->
