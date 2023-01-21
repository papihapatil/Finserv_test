<?php 
 $id = $this->session->userdata("ID");
 $this->session->set_userdata("id",$id);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



</head>

<style>
.change_pass
{
  padding:18px; 
  background-color:white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}


.pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 
</style>
<body>
<?php
 
 $result = $this->session->flashdata('result');   if (isset($result)) {
   if($result=='1')
   {
     
       echo '<script> swal("success!", "Password changed successfully", "success");</script>';
       $this->session->unset_userdata('result');	
                     
      }
      else if($result=='0')
      {
        
          echo '<script> swal("Worning!", "Old password not found. Please try again", "worning");</script>';
          $this->session->unset_userdata('result');	
                        
         }
   
   }
  
   
 
 ?>
<div id="main" style="background-color: #ebedef;">
<div id="login">
<?php echo @$error; ?>
 <br>
<form method="post" action=''  onsubmit="return checkForm(this);">

<div class="row" style="margin-top:20px;">

<div class="col-sm-4"></div>
<div class="col-sm-3 change_pass">
<div class="row">
   <div class="col-sm-2"></div>
   <div class="col-sm-8"> <center><h3>Change Password</h3></center></div>
   <div class="col-sm-2"></div>
</div>
<div class="row">

<center> <h6>password should contain atleast one number and one special character</h6></center>
</div>
<br>	    
		    <label>Current Password</label>
		        <div class="form-group pass_show"> 
               <input type="password" value="" class="form-control" placeholder="Current Password"  name="old_pass" required> 
            </div> 
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="" class="form-control" placeholder="New Password" name="new_pass" id="password" onkeyup='check();' required> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" value="" class="form-control" placeholder="Confirm Password" name="confirm_pass" id="confirm_password" onkeyup='check();' required> 
            </div> 
            <span id='message'></span>
            <input type="text" value="<?php echo $id ;?>" name="ID" hidden><br/>
            <center><button type="submit" value="submit" name="change_pass" class="btn btn-info">Save Changes</button></center>

</div>
<div class="col-sm-4"></div>
</div>
</form>
</div>
</div>
</body>

</html>



<script>
var check = function() {
  
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'password matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'password not matching';
  }


}

  
$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  


</script>

