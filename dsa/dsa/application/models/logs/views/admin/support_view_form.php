



<?php


$message=$this->session->flashdata('success');
 if(isset($message))
 {
  
    echo '<script> swal("success!", "Ticket Save Successfully! Ticket_id='  . $user_data->tikit_id . '",  "success")</script>';
    $this->session->unset_userdata('success');
 }
 else 
 {
  $message=$this->session->flashdata('error');
  if(isset($message))
  {
    
   echo '<script>swal("Are you sure?", {  dangerMode: true,  buttons: true,});</script>';
   $this->session->unset_userdata('error');
  }
 }
 ?>
 
 


 
 <div class="c-body">
<main class="c-main">
<div class="container-fluid">
<div class="fade-in">

<div class="col-md-12">
<div class="card">

<div class="card-body">

<div class="col-sm-12">
<div>


  									
                    

<form  class="form-group" action="<?php echo base_url()?>index.php/Support_Member/update_tikit" method="POST"  id="upload_form" enctype="multipart/form-data">

    <center><b><label>TICKET</label><br>
    <label>Enter Your Issue Here</b></label>
    </center>




<!------>	<!---1st row complete----------------> 
    <div class="form-row">
        <div class="form-group">
            <b><label   for="subject">Subject</label></b>
            <input class="form-control" type="text" value="<?php echo $user_data->subject;?>" style="width:530px" name="subject" id="subject" readonly>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


       <div class="form-group col-md-2">
            <table border='0'>
                <tr>
            <b>Issue category*</b>
            <?php if (!empty($user_data))
            {?>
                <input class="form-control" type="text" value="<?php echo $user_data->issue_category;?>" style="width:270px; margin-top:7px;" name="issue" id="issue" readonly>

            <?php }
            else 
            {


            ?>
            
            <select name="issue" style="width:260px" class="form-control" id="issue">
                
                <option> Select issue category </option>
                
            
                <?php
                
                foreach($issue_category as $issue)
                {?>
                
                    <option value="<?php echo $issue['id']?>"><?php echo $issue['Issue_category_name'];?> </option>
                

            <?php } }
                
            ?>
            </select>
            <input  type="text" hidden name="category_name" class="form-control" id="category_name">

            </tr>



            </table>
      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
      <div class="form-group col-md-2">
        <table>
        <tr>
        
        <b>Sub category*</b><br>
        <?php if (!empty($user_data))
        {?>
            <input class="form-control" type="text" value="<?php echo $user_data->sub_category;?>" style="width:265px; margin-top:7px;" name="sub_issue1" id="sub_issue1" readonly>

        <?php }

        else{
        ?>
            
        <select id='sub_issue1' style="width:260px" class="form-control" name='sub_issue1' required > 
                <option> Select sub category </option>
                
            <?php } ?>
            
            </select>
            
        
        </tr>

            </table>
    </div>
</div>   
<!-----2nd row------------------->
    <div class="form-row">
        <div class="form-group col-md-5">
			
            <b><label for="subject" > Detail Description of Issue</label></b>
            
            <textarea class="form-control" name="details_description"  style="width:530px" id="details_description" rows="2" readonly><?php echo $user_data->details_description;?></textarea>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-group col-md-5">

            <b><label  for="subject">Impact</label></b>
            <textarea type="text" class="form-control" style="width:560px" name="impact" id="impact" rows="2" readonly><?php echo $user_data->impact;?></textarea>
        </div>

    </div>
<!--3rs row---->
      <div class="form-row">
      <div class="form-group col-md-5">

      <b><label   for="subject">Comment</label></b>
    <input class="form-control" type="text"  style="width:532px" name="comment" id="comment">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <div class="form-group col-md-3">
			
                <b>  <label for="subject">Department</label></b>
                    
                <select name="department"  class="form-control" id="department"  readonly >
                                   
                                    <option value="">Select  Department</option>
                        <option value="IT" <?php if($user_data->department=='IT') echo 'selected="selected"';?>>IT</option>
                        <option value="Operation" <?php if($user_data->department=='Operation') echo 'selected="selected"';?>>Operation</option>
                        <option value="Credit" <?php if($user_data->department=='Credit') echo 'selected="selected"';?>>Credit</option>

                        <option value="Sales" <?php if($user_data->Sales=='Sales') echo 'selected="selected"';?>>Sales</option>
                                </select>
                                <input type="text" hidden value="<?php if(!empty($uid)){echo $uid;} ?>" name="id">
                        <input type="text" hidden value="<?php if(!empty($user_data->tikit_id)){echo $user_data->tikit_id;} ?>" name="tikit_id">

                        <input type="text" hidden value="<?php if(!empty($user_name)){echo $user_name;} ?>" name="user_name">
                        <input type="text" hidden value="<?php if(!empty($user_email)){echo $user_email;} ?>" name="email">
            </div>&nbsp;&nbsp;&nbsp;
      
           
           <div class="form-group col-md-2">

                    <b>  <label for="status">Status</label></b>
                    
                                    <select name="status" style="width:260px"class="form-control" id="status" required>
                                    <option value="">Select  Status</option>
                                    <option value="Open" <?php if($user_data->status=='Open') echo 'selected="selected"';?>>Open</option>
                                    <option value="In Progress" <?php if($user_data->status=='In Progress') echo 'selected="selected"';?>>In Progress</option>
                                    <option value="Resolved" <?php if($user_data->status=='Resolved') echo 'selected="selected"';?>>Resolved</option>
                                    <option value="Close" <?php if($user_data->status=='Close') echo 'selected="selected"';?>>Close</option>
                                    <option value="Rejected" <?php if($user_data->status=='Rejected') echo 'selected="selected"';?>>Rejected</option>
                                   
                                    </select>
                                
           </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
        </div>
    <!----next_row---->
      <div class="form-row">
           
      <div class="form-group col-md-2">
			
            <b><label for="issue_open">Issue Date</label></b>
                <input class="form-control" type="text" value="<?php echo $user_data->created_date;?>" style="width:265px" name="issue_open" id="issue_open" readonly>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


             <div class="form-group col-md-2"><br>

             
                    <img src="<?php echo base_url().$doc_path->doc_path;?>" style="width:20%"><br>
                    <a href="<?php echo base_url().$doc_path->doc_path;?>" target="_blank"><b> View</b></a>
                    <a href="<?php echo base_url().$doc_path->doc_path;?>" target="_blank" Download><b> Download</b></a>
     
            </div>&nbsp;&nbsp;&nbsp;
      
    
        
      
      </div>
      <div>
      </div>
      
      
              
                  <center><input type="submit" class="login100-form-btn btn btn-primary px-4"   name="update_ticket" value="Save"/></center> 
              </div>


             
              </body>
            </html>
              
    </form>
      
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

 			
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type='text/javascript'>
// baseURL variable




	   //////////////////////////////
   
    
    
 // issue change
 $(document).ready(function(){
 $('#issue').change(function(){
     // alert("hello");
      var issue_category_id = $(this).val();
      var issue_category_name = $(this).find(':selected').text();
      $('#category_name').val(issue_category_name);
      //alert(issue_category_id);
      var url = window.location.origin+"/dsa/dsa/index.php/Help/get_sub_issue"; 
     
     // alert(url);
      // AJAX request
      $.ajax({
                 type:'POST',
                 url:url,
                  
                 data:{issue_category_id:issue_category_id},
               
                 success:function(data){

                  // Remove options 
                   $('#sub_issue1').find('option').not(':first').remove();
                  


                  var obj =JSON.parse(data);
                      
                     
                         $('#Refered_By_Name').val(obj.sub_category_name);
                         $.each(obj, function (index, value) {
                                          $('#sub_issue1').append($('<option/>', { 
                                            value: value.sub_category_name,
                                            text : value.sub_category_name,
                                            }));
                                          });   
        
                       
                    
                   
                 }
                });
   });
  });

 
  $(document).ready(function() {
			$('#example').DataTable();
			} );
	
	
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
 			gtag('config', 'UA-118965717-1');
       </script>
		<style>
			table {
  					border-collapse: collapse;
  					border-spacing: 0;
  					width: 100%;
  					border: 1px solid #ddd;
				}
			th, td {
  					text-align: left;
  					padding: 8px;
				}
			tr:nth-child(even){
					background-color: #f2f2f2
					}
		</style>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">


<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

       
