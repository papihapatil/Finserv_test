


<?php
    $message = $this->session->userdata('result');
	
    if (isset($message)) {
      if($message==1)
      {
          echo '<script> swal("success!", "Ticket Created Successfully!", "success");</script>';
          $this->session->unset_userdata('result');	
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
                                      <form  class="form-group" action="<?php echo base_url()?>index.php/Help/save_ticket" method="POST"  id="upload_form" enctype="multipart/form-data">
                  <center><b><label>TICKET</label><br>
                            <label>Enter Your Issue Here</b></label>
                  </center>
                  
                    <div class="form-row">
                               <div class="col-md-6" style="padding-bottom: 10px;">
                        <b><label   for="subject">Subject</label></b>
                          <input class="form-control" type="text"  name="subject" id="subject" required >
                      </div>
                      <div class=" col-md-3" style="padding-bottom: 10px;">
                                  <table border='0'>
                                                          <tr>
                                                               <b>Issue Category*</b>
                                                                  <select name="issue" style= "margin-top:7px;" class="form-control" id="issue" required>
                                                                      <option> Select Issue Category </option>
                                          <?php
                                               foreach($issue_category as $issue)
                                          {?>
                            
                                     <option value="<?php echo $issue['id']?>"><?php echo $issue['Issue_category_name'];?> </option>
                                                                         <?php 
                                    }?>
                                  
                                    </select>
                                         <input  type="text" hidden name="category_name" class="form-control" id="category_name" required >

                            </tr>
                              </table>
                        </div>
                        <div class="col-md-3" style="padding-bottom: 10px;">
                                    <table>
                                      <tr>
                                       <b>Sub Category*</b>
                                        <select id='sub_issue1' style="margin-top:7px;" class="form-control" name='sub_issue1' required> 
                                          <option> Select Sub Category </option>
                                        </select>
                                      </tr>
                                    </table>
                                        </div>
                    
                                              </div>
                                   <!-----2nd row------------------->
                                  <div class="form-row">
                                  <div class="col-md-6" style="padding-bottom: 10px;">

                                        <b><label for="subject" > Detail Description Of Issue</label></b>
                                            <textarea class="form-control" name="details_description"  id="details_description" rows="2" required></textarea>
                                      </div>
                                    <div class="col-md-6" style="padding-bottom: 10px;">
                                        <b><label  for="subject">Impact</label></b>
                                          <textarea type="text" class="form-control"  name="impact" id="impact" rows="2" required></textarea>
                                      </div>
                                                                              </div>
                  
                                <!--3rs row---->
                                <div class="form-row">
                                <div class=" col-md-6" style="padding-bottom: 10px;">
                                        <b><label for="file">Attached Screenshot Of Issue</label></b>
                                      <input type="file" name="image_file"  class="form-control" multiple  style="padding: 3px;">
                                  </div>
                                  <div class=" col-md-6">
                                          <b><label for="subject">Department</label></b>
                                            <select name="department"  class="form-control" id="department" required>
                                              <option value="">Select  Department</option>
                                              <option value="IT">IT</option>
                                              <option value="Operation">Operation</option>
                                              <option value="Credit">Credit</option>
                                                <option value="Sales">Sales</option>
                                            </select>
                                                <input type="text" hidden value="<?php if(!empty($id)){echo $id;} ?>" name="id" >
                                                <input type="text" hidden value="<?php if(!empty($user_name)){echo $user_name;} ?>" name="user_name" >
                                                <input type="text" hidden value="<?php if(!empty($user_email)){echo $user_email;} ?>" name="email" >
                                      
                                      </div> 
                                </div> <br> 
                                   <center><input type="submit" class="login100-form-btn btn btn-primary px-4"   name="Create_ticket" value="Create ticket"/></center> 
                                        
                </form>               
              </div>            
            </div>                            
          </div>                            
           </div>
          </div>
    </div>                               
  </div>                            
      </main>
  </div>




  <div class="c-body">
  <main class="c-main">
      <div class="container-fluid">
          <div class="fade-in">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="col-sm-12">
                              <div>
              <div class="row">
                <?php if(isset($seperate_data))
                      {         
                  ?>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
                       <lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($seperate_data)) {echo count($seperate_data);}else {echo 0;}?>&nbsp;&nbsp;<a>
                           <i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
                  </div>
                <?php     
                         } 
                   else
                  { ?>
                       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
                       <lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($data)) {echo count($data);}else {echo 0;} ?>&nbsp;&nbsp;<a>
                         <i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
                  </div>
                <?php   
                  }   
                ?><br><br>

       

        
      
                               

        

                                  </div>   
                      </div>
                           </div>
                       </div>
         <div class ="col-sm-12">
                                                     <body class="wide comments example">
                  <div class="fw-body">
                      <div class="content">
                      <div style="overflow-x:auto;">
                        <div class="demo-html">
                          <table id="example" class="display" style="width:100%">
                                                              <thead>
                                                <tr>
                                <th>Sr_no</th>
                                <th>Ticket_Id</th>
                                <th>Subject</th>
                                <th>Issue_category</th>
                                <th>Sub_category</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Comment</th>
                                <th>Assign_to</th>
                                <th>Issue_Created_Date</th>
                                <th>User_Name</th>
                                <th>Impact</th>
                                <th>Detail_Description</th>
                                                                  </tr>
                            </thead>
                                  <tbody>
                                <?php  $i= 1 ; if(!empty($seperate_data)){foreach($seperate_data as $value){ ?>
                                                                      <tr>
                                                                          <td><?php echo $i; ?></td>
                                  <td><?php echo $value->tikit_id ;?></td>
                                  <td><?php echo $value->subject ;?></td>
                                  <td><?php echo $value->issue_category ;?></td>
                                  <td><?php echo $value->sub_category ;?></td>
                                  <td><?php echo $value->department ;?></td>
                                  <td><?php echo $value->status ;?></td>
                                  <td><?php echo $value->comment;?></td>
                                  <td><?php echo $value->supporter_name ;?></td>
                                  <td><?php echo $value->created_date ;?></td>
                                  <td><?php echo $value->user_name ;?></td>
                                  <td><?php echo $value->impact ;?></td>
                                  <td><?php echo $value->details_description ;?></td>
                                <?php  $i++; } } ?> 
                                                                      </tr>
                              </tbody>
                          </table>
                        </div>
                      </div>
                      </div>
                  </div>
                                      </body>
                
        
         </div>
                  </div>
              </div>
          </div>                   
      </div>


<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>



                        
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
