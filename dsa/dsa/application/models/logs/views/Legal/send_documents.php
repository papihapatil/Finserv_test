<style>
.tablink_ {
 
  color: blue;
  float: left;
  border: 1px solid gray;
  outline: none;
  margin:2px;
  padding: 14px 16px;
  font-size: 17px;
 
}

.active, .tablink_:hover {
    border: 2px solid blue;
}


</style>
<?php
    $message = $this->session->userdata('result');
	
    if (isset($message)) {
		if($message==1)
		{
        echo '<script> swal("success!", "Document Uploaded Successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['result']);
		}
		else if($message==2)
		{
			  echo '<script> swal("success!", "Document Deleted Successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['result']);
		}
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             $this->session->unset_userdata('result');	
		}
    }

    ?>
	<?php
    $message1 = $this->session->userdata('result1');
	
    if (isset($message1)) {
		if($message1==1)
		{
        echo '<script> swal("success!", "Remark Save Successfully", "success");</script>';
         //$this->session->unset_userdata('result');
		  unset($_SESSION['result1']);
		}
		else
		{
			 echo '<script> swal("warning!", "Something get wrong", "warning");</script>';
             unset($_SESSION['result1']);
		}
    }

    ?>
	
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                       
						<div class="card tabcontent"  id="Legal1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
										
											<div class="container">
												<div class="text-center">
												<h3>Send Documents For</h3><h4 style="color:green;"><?php if(isset($cust_info)){echo $cust_info->FN.' '.$cust_info->LN;} ?></h4>
												</div>
												
												<br>
												</br>
												
											
											<Form action="<?php echo base_url('index.php/Legal/do_upload_Legal_doc_Legal');?>" method="post" enctype="multipart/form-data" id="Legal_send_doc">
												<div class="row">
												   
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												        
															<div style=" margin-top: 8px;" class="col">
															  <label style="font-size: 12px;" for='file-upload' class='custom-file-upload'>
																				<i class='fa fa-cloud-upload'></i> Select Document
																			</label>
																			<input id='file-upload' type='file' name='userfile'  multiple="multiple" required  onchange="Filevalidation()" />
																			<input type="text" name="send_to" value="CPA" hidden />
																			<input type="text" id="Credit_id" name="Credit_id" value="<?php if(isset($Applicant_data)){echo $Applicant_data->credit_manager_id;} ?>" hidden >
													                        <input type="text" class="form-control" id="Application_Id" name="Application_Id" value="<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" readonly hidden>
																			 <input type="text" class="form-control" id="unique_code" name="unique_code" value="<?php if(!empty($cust_info)){ echo $cust_info->UNIQUE_CODE;} ?>" readonly hidden>
																 <button type="submit" name="upload" class="btn btn-primary">Upload</button>
															</div>  
                                                       
													   
													</div>	
												</div>
												</form>
												<div class="row" style="margin-top: 8px;" id="docs">
												<?php $i=1;  foreach($documents as $row){?>
												
												
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">
															<div class="col-sm-10"><a href="<?php echo base_url($row->path); ?>" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">
															Legal Document <?php echo $i; ?>
																			</label></a></div>
															<div class="col-sm-1"><a href="<?php echo base_url();?>index.php/customer/view_vendors_cloud_file/<?php echo $row->id; ?>" target="_blank"> <i class="fa fa-eye" aria-hidden="true" style="color:blue; text-align:right !important "></i>	</a>
															</div>
															<div class="col-sm-1"> 	
															<a style="margin-left: 8px; " href="<?php echo base_url();?>index.php/Legal/delete_Legal_doc/<?php echo $row->id; ?>/<?php if(!empty($cust_info)){ echo $cust_info->UNIQUE_CODE;} ?>"><i class="fa fa-trash text-right" style="color:red;"></i></a>
																				
															</div>
															
																	
																						
																					
																				
														</div>
													
													</div>
			
													
										        <?php $i++; } ?>
												</div>
												
												
											
											<Form action="<?php echo base_url('index.php/Legal/Legal_remark');?>" method="post" enctype="multipart/form-data"  id="Remark">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
													   
													   <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Comments </label>
													   </br>
															   <?php if(isset($Applicant_data))
																   {
																	   
																	   if(!empty($Applicant_data->additional_comments))
																   
																	   {
																	   $Conditions_to_Loan_Sanction_2= json_decode($Applicant_data->additional_comments);
																	   
																				   if(!empty($Conditions_to_Loan_Sanction_2))
																				   { ?>
																				   
																				   
																							   
																								   <table class="table table-bordered" id="data_table3">
																							   <?php 
																								   foreach($Conditions_to_Loan_Sanction_2 as $value) 
																								   {
																								   if(!empty($value->additional_comments))
																								   {
																									   ?>
																										   <tr>
																										   <td><textarea class = "form-control" type="text"  name="additional_emi_comments_3[]" > <?php 	echo $value->additional_comments;?></textarea></td>
																											   </tr>
																										   
																									   <?php
																								   }
																								   }?>
																								   <tr>
																								   <tr>
																									   <td><textarea class = "form-control" type="text" id="additional_emi_comments_3" name="additional_emi_comments_3[]"></textarea></td>
																									   <td><input class = "form-control" type="button" class="add" onclick="add_row3();" value="Add Row" ></td>
																								   </tr>
																								   
																								   </table>
																							   
																							   
																						   <?php
																				   } 
																					   
																				   
																		   }else
																		   {
																		   ?>
																			   <table class="table table-bordered" id="data_table3">
																				   
																				   <tr>
																					   <td><textarea class = "form-control" type="text" id="additional_emi_comments_3" name="additional_emi_comments_3[]"></textarea></td>
																					   <td><input class = "form-control" type="button" class="add" onclick="add_row3();" value="Add Row" ></td>
																				   </tr>
																			   </table>
																		   <?php 
																		   }
																	   }
																   
															   
													   else {
													   ?>
										   
													   
															   
																	   
																		   <table class="table table-bordered" id="data_table3">
																			   <tr>
																				   <td></td>
																			   </tr>
																			   <tr>
																				   <td><textarea class = "form-control" type="text" id="additional_emi_comments_3" name="additional_emi_comments_3[]"></textarea></td>
																				   <td><input class = "form-control" type="button" class="add" onclick="add_row3();" value="Add Row" ></td>
																			   </tr>
																		   </table>
																	   
														   <?php } ?>
												   </div>
											
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
													  
														                <input type="text" id="id" name="id" value="<?php echo base64_decode($_GET['x']); ?>" hidden >
																		<input type="text" id="Credit_id" name="Credit_id" value="<?php if(isset($Applicant_data)){echo $Applicant_data->credit_manager_id;} ?>" hidden >
																		<input type="text" id="UNIQUE_CODE" name="UNIQUE_CODE" value="<?php echo base64_decode($_GET['y']); ?>" hidden >
															<?php if($this->session->userdata("USER_TYPE")=='Legal'){?>
																<div style=" margin-top: 8px;" class="col">
																	 <label for="email" style="font-size: 16px; color: black; font-weight: bold;"> Remark </label>
																	 <br>
																	 <input type="radio" id="html" name="remark" value="Positive" <?php if(isset($Applicant_data)){if($Applicant_data->Legal_remark=='Positive'){  echo 'checked="checked"';}} ?>>
			                                                         <label for="html">Positive </label>
																	 <input type="radio" id="html" name="remark" value="Negative" <?php if(isset($Applicant_data)){if($Applicant_data->Legal_remark=='Negative'){  echo 'checked="checked"';}} ?> required>
			                                                         <label for="html">Negative</label>
																	 <input type="radio" id="html" name="remark" value="Referred" <?php if(isset($Applicant_data)){if($Applicant_data->Legal_remark=='Referred'){  echo 'checked="checked"';}} ?>required>
			                                                         <label for="html">Referred</label>
															</div>
															<?php } ?>
															
															<div class="form-check">
															<div style=" margin-top: 8px;" class="col">
															  <input class="form-check-input" type="checkbox" value="" required>
															  <label class="form-check-label" for="defaultCheck1">
																Are you Sure? You want to Submit Documents?
															  </label>
															</div>
															</div>
														</div>
													</div>		
												
                                                   											
												
													
                                                   
												</div>
												 
                                                <div class="row col-12 justify-content-center">
													<div class="text-center ">
														<center>
														   <button type="submit" class="btn btn-primary">Submit</button>
														 
														</center>
													</div>
												</div>
												
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
<!----------------------------------------------------------------------------- -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    DELETE
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Credit_manager_user/delete_doc_Legal?UID=<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" method="POST" id="doc_delete_Legal">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Document?</label>	                         
	                    <input name="id" type="number" class="idform" hidden  />
						 <input name="unique_code" type="text" class="unique" hidden  />			
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    DELETE IT
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>
	<script >
		 $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   var unique_id=$(this).attr("data-unique");
		   $(".idform").val(dataId);
		    $(".unique").val(unique_id);
		   
       
    });
	</script>
<!---------------------------------------delete technical document------------------------------------>
<div class="modal fade" id="deleteModel_technical" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	            	<h4 class="modal-title" id="myModalLabel">
	                    DELETE
	                </h4>
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>                
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Credit_manager_user/delete_doc_technical?UID=<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" method="POST" id="doc_delete_Legal">
	                  <div class="form-group">
	                                <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this Document?</label>	                         
	                    <input name="id" type="number" class="idform" hidden  />
										
	                  </div>                  

	                  <!-- Modal Footer -->
			            <div class="modal-footer">
			                <button type="button" class="btn btn-default"
			                        data-dismiss="modal">
			                            CANCEL
			                </button>
			                <button type="submit" class="btn btn-primary">
			                    DELETE IT
			                </button>
			            </div>
	                </form>                
	            </div>            
	        </div>
	    </div>
	</div>
	<script >
		 $(".modal_test_technical ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   $(".idform").val(dataId);
       
    });
	</script>
<!------------------------------------------------------------------------------ -->
<div class="modal fade" id="deleteModel1__" tabindex="-1" role="dialog" 
												aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<h4 class="modal-title" id="myModalLabel">
																ALERT
															</h4>
															<button type="button" class="close" 
															data-dismiss="modal">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Close</span>
														</button>                
													</div>

													<!-- Modal Body -->
													<div class="modal-body">

														<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Credit_manager_user/delete_doc?UID=<?php if(!empty($cust_info)){ echo $cust_info->Application_id;} ?>" method="POST" id="doc_delete_form">
															<div class="form-group">
																<label  class="col-12 control-label padding-10">Are you sure you want to DELETE this document ?</label>	                    
																<input name="id" type="number" class="idform" />	                        
															</div>                  

															<!-- Modal Footer -->
															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																data-dismiss="modal">
																CANCEL
															</button>
															<button type="submit" class="btn btn-primary">
																DELETE IT
															</button>
														</div>
													</form>                
												</div>            
											</div>
										</div>
									</div>
<script type="text/javascript">
									
$('#deleteModel1__').on('show.bs.modal', function (e) {
   alert("hello");
});										
</script>
<script  type="text/javascript">
		
 $(document).ready(function () {
            
	
    var bank_id = $('#bank_name').val();
 	var Legal_id=$('#Legal').val();
	
	if(bank_id!="")
{
   
  
    var url_corporate = window.location.origin+"/finserv_test/dsa/dsa/index.php/Legal/get_coorporate_data";
	 $.ajax({
         type:'POST',
         url:url_corporate,
          // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
         data:{bank_id:bank_id},
         success:function(data){

                             var obj =JSON.parse(data);
							 if(obj.Legal_required=='yes')
							 {
								 
								  $('#Legal').prop('disabled', false);
								 var url = window.location.origin+"/finserv_test/dsa/dsa/index.php/Legal/get_legal_by_bank";
									$.ajax({
										 type:'POST',
										 url:url,
										  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
										 data:{bank_id:bank_id},
										 success:function(data){

															 var obj =JSON.parse(data);
												 $.each(obj, function (index, value) {
													if(Legal_id==' ')
													{
														 $('#Legal').append($('<option/>', {
																		 value: value.UNIQUE_CODE,
																		 text : value.FN +' '+ value.LN
																	   }));
													}
													else
													{
														 if(Legal_id==value.UNIQUE_CODE)
														 {
															 return;
														 }
														 else{
																	 $('#Legal').append($('<option/>', {
																		 value: value.UNIQUE_CODE,
																		 text : value.FN +' '+ value.LN
																	   }));
																	 }
												     }
												 });



										 }
										});
							 }
							 else
							 {
								// $('#Legal').addClass('disabled');
								   $('#Legal').prop('disabled', true);
							 }
							 if(obj.Technical_required=='yes')
							 {
								 
								 //$('#Technical').removeClass('disabled');
								   $('#Technical').prop('disabled', false);
								 var url = window.location.origin+"/finserv_test/dsa/dsa/index.php/Technical/get_Technical_by_bank";
								$.ajax({
									 type:'POST',
									 url:url,
									  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
									 data:{bank_id:bank_id},
									 success:function(data){

														 var obj =JSON.parse(data);
											 $.each(obj, function (index, value) {
																 $('#Technical').append($('<option/>', {
																	 value: value.UNIQUE_CODE,
																	 text : value.FN +' '+ value.LN
																   }));
																 });



									 }
									});
							 }
							 else
							 {
								   $('#Technical').prop('disabled', true);
							 }




         }
        });
}
				
            });
	$( "#Legal" ).change(function() 
	{
		 var value=$("#Legal option:selected").text();
		
	$('#Legal_name').val(value);
	});
	$( "#Technical" ).change(function() 
	{
		 var value=$("#Technical option:selected").text();
		
		
	$('#Technical_name').val(value);
	});
	$( "#bank_name" ).change(function() 
	{
		 var value=$("#bank_name option:selected").text();
		
		
	$('#bank_name_1').val(value);
	});
	function add_row3()
{
 var new_additional_emi_comments=document.getElementById("additional_emi_comments_3").value;
 var table=document.getElementById("data_table3");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td><input class = 'form-control' name='additional_emi_comments_3[]' type='text' id='additional_emi_comments_3_row"+table_len+"' value='"+new_additional_emi_comments+"'></td><td><input type='button' value='Delete' class='delete' onclick='delete_row3("+table_len+")'></td></tr>";
  document.getElementById("additional_emi_comments_3").value="";
}
function delete_row3(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}
	
</script>

<script>
function openPage(pageName,elmnt,idvalue) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink_");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
	tablinks[i].style.border  = "1px solid gray"; 
  }
  document.getElementById(pageName).style.display = "block";
 
  document.getElementById(idvalue).style.border  = "2px solid blue";  
}

// Get the element with id="defaultOpen" and click on it
<?php if(isset($_SESSION['form_id']))
{?>
//alert("hello");
document.getElementById(<?php  echo $this->session->userdata('form_id'); ?>).click();
<?php  } else{ ?>
//alert("hello1");
document.getElementById("4").click();
<?php } ?>
</script>
<script type="text/javascript">
	$("#Legal_send_doc").submit(function(e) {
              var Application_Id=$('#Application_Id').val();
			  e.preventDefault();
              
              var form = $(this);
              var url = form.attr('action');    
			 
              $.ajax({
                     type: "POST",
                     url: url,
                     data: new FormData(this),
					 processData: false,
					 contentType: false,
                     success: function (response) {
					    var parsed_data = JSON.parse(response);
						if(parsed_data.result == 3){                                                                
                              swal(
								"success!", 
								"Document uploaded Successfully", 
								"success"
                                  );
								  $('#docs').html(' ');	
									$.each(parsed_data.docs ,function (index, value)
								  {
									
									var content='<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">'+
														'<div class="row " style="border: 1px solid #edeff1; margin-left:13px; margin-right:13px">'+
															'<div class="col-sm-10"><a href="'+value.path+'" target="_blank">  <i class="fa fa-file-text" style="color:green" aria-hidden="true"></i> &nbsp; <label for="email" style="font-size: 13px; color: black; font-weight: bold;">'+ value.Doc_name +'</label></a></div>'+
																'<div class="col-sm-1"><a href="'+ window.location.origin+'/finserv_test/dsa/dsa/index.php/customer/view_vendors_cloud_file/'+value.id+'"target="_blank" ><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></div>'+
																'<div class="col-sm-1">'+	
															       '<a style="margin-left: 8px; " href="'+window.location.origin+'/finserv_test/dsa/dsa/index.php/Legal/delete_Legal_doc/'+value.id+'/'+Application_Id+'"><i class="fa fa-trash text-right" style="color:red;"></i></a>'+
															'</div>'+			
														'</div></div></div>';
																	
																						
														$('#docs').append(content);								
																				
																		
								  }
								
								);
								  

  
                          }
						  
						 
                          
                      }
              });                
          });	
</script>
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
		