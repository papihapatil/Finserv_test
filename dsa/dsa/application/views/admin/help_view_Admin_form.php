<?php


$message=$this->session->flashdata('success');
 if(isset($message))
 {
  
  echo '<script> swal("success!", "Ticket Updated Successfully! Ticket_id='  . $user_data->tikit_id . '",  "success")</script>';

  $this->session->unset_userdata('success');
 }
 else 
 {
  $message=$this->session->flashdata('error');
  if(isset($message))
  {
    
   echo '<script>swal("Are you sure?", {  dangerMode: true,  buttons: true,});</script>';
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


<form  class="form-group" action="<?php echo base_url()?>index.php/Help/update_tikit" method="POST"  id="upload_form" enctype="multipart/form-data">

<center><b><label>TICKET</label><br>
<label>Enter Your Issue Here</b></label>
</center>





  <!---1st row complete----------------> 
<div class="form-row">


  
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
<b><label   for="subject">Subject</label></b>
    <input class="form-control" type="text" value="<?php echo $user_data->subject;?>"  name="subject" id="subject" readonly>
</div>


<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
<table border='0'>


<tr>
 <b>Issue Category*</b>
<?php if (!empty($user_data))
{?>
    <input class="form-control" type="text" value="<?php echo $user_data->issue_category;?>" style="margin-top:7px;" name="issue" id="issue" readonly>

<?php }
else 
{


?>
 
  <select name="issue"  class="form-control" id="issue">
    
    <option> Select Issue Category </option>
    
  
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
      </div>
    
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

<table>
  <tr>
  
  <b>Sub Category*</b><br>
  <?php if (!empty($user_data))
{?>
    <input class="form-control" type="text" value="<?php echo $user_data->sub_category;?>" style="margin-top:7px;" name="sub_issue1" id="sub_issue1" readonly>

<?php }

else{
?>
    
  <select id='sub_issue1'  class="form-control" name='sub_issue1' required > 
        <option> Select Sub Category </option>
          
      <?php } ?>
      
      </select>
      
  
  </tr>

      </table>
      </div>
     
<!-----2nd row------------------->
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
      
      <b><label for="subject" > Detail Description Of Issue</label></b>
      
      <textarea class="form-control" name="details_description"   id="details_description" rows="2" readonly><?php echo $user_data->details_description;?></textarea>
 </div>
 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

<b><label  for="subject">Impact</label></b>
<textarea type="text" class="form-control"  name="impact" id="impact" rows="2" readonly><?php echo $user_data->impact;?></textarea>
</div>


<!--3rs row---->


      

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
      
      <b>  <label for="subject">Department</label></b>
        
      <select name="department"  class="form-control" id="department"  disabled="true">
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
      </div>
      
           
            
        
           
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

<b>  <label for="subject">Status</label></b>
  
                <select name="status" class="form-control" id="status">
                  <option value="Assigned">Select  Status</option>
                  <option value="Open">Open</option>
                  <option value="On_hold">On hold</option>
                  <option value="Close">Close</option>
                  <option value="Resolved">Resolved</option>
                  <option value="Waiting_reply">Waiting reply</option>
                </select>
               
</div>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
      
<b><label   for="subject">Comment</label></b>
    <input class="form-control" type="text" name="comment" id="comment" required>
</div>
      
      </div>
      <div class="form-row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

      
<table border='0'>
      <tr>
      <b>Assign To</b>

 
<select name="supporter_name" style="margin-top:7px;" class="form-control" id="supporter_name" required>
  
  <option> Select Name </option>
  

  <?php
  
    foreach($supporter as $supporter_name)
    {?>
    
      <option value="<?php echo $supporter_name['id']?>"><?php echo $supporter_name['name'];?> </option>

    
     
<?php }
  
?>
</select>

<input type="text" hidden name="supporter" class="form-control" id="supporter">




</tr>



</table>
      </div>
      
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
      
<b><label for="issue_open">Issue Open Date</label></b>
    <input class="form-control" type="text" value="<?php echo $user_data->issue_open;?>"  name="issue_open" id="issue_open" readonly>
</div>

<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

<b><label for="issue_close">Issue Resolve Date</label></b>
    <input class="form-control" type="text" value="<?php echo $user_data->issue_close;?>"  name="issue_open" id="issue_open" readonly>
</div>
      <div class="form-group col-md-2"><br>

             
           <img src="<?php echo base_url().$doc_path->doc_path;?>" style="width:20%"><br>
           <a href="<?php echo base_url().$doc_path->doc_path;?>" target="_blank"><b> view</b></a>
           <a href="<?php echo base_url().$doc_path->doc_path;?>" target="_blank" Download><b> Download</b></a>
     
      </div>
      

      
                    
                <div>
            </div>
        </div>
    </div>
</div>
              
                  <center><input type="submit" class="login100-form-btn btn btn-primary px-4"   name="update_ticket" value="Update Ticket"/></center> 
              </div>
             </body>
            </html>
              
      </form>
      
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



//dependent dropdown send hide name

$(document).ready(function(){
 $('#supporter_name').change(function(){
     //alert("hello");
      //var supporter_id = $(this).val();
      var name = $(this).find(':selected').text();
     //  alert(name);
      $('#supporter').val(name);
      //alert(issue_category_id);
     
    });
  });


 //////////////////////
   

    
    
    
 // issue change
 $(document).ready(function(){
 $('#issue').change(function(){
     // alert("hello");
      var supporter = $(this).val();
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