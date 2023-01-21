<style>
	.vertical-menu {
  width: 250px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #04AA6D; /* Add a green color to the "active/current" link */
  color: white;
}
</style>
<?php

//echo $get_all_disbursement_documents->selected_document_type_id;

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
									    <body class="wide comments example">
											<div class="fw-body">
												<div class="content">
													<div class="row" style="padding:20px;margin-top: -20px;">
														<input hidden type="text" value="<?php echo $userID;?>" id="login_user_unique_code">
														<input hidden type="text" value="<?php echo $row->UNIQUE_CODE;?>" id="applicant_unique_code">
														<input hidden type="text" value="<?php echo base64_encode($row->UNIQUE_CODE);?>" id="applicant_encoded_unique_code">
														<input hidden type="number" value="" id="selected_document_number">	
														<input hidden type="text" value="" id="selected_document_name">	   				
														<div class="col-sm-12"> 
															<h5>Applicant Name : <?php echo  $row->FN." ".$row->MN." ".$row->LN ; ?></h5>
															<hr>
														</div>
														<br>

														<div class="col-sm-4"> 
															<h6>Type of loan: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>Sanctioned loan Amount: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>Tenure: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
														</div>
														<div class="col-sm-4"> 
															<h6>ROI: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															<hr>
														</div>
														<div class="col-sm-4"> 
															<h6>Source Name: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															<hr>
														</div>
														<div class="col-sm-4"> 
															<h6>Sourcing Branch Name: <?php echo  $loan_details->LOAN_TYPE ; ?></h6>
															<hr>
														</div>

													</div>
													<div class="row">
														<div class="col-sm-3">
															<div class="vertical-menu">
															  <a href="#" class="active">Disbursement documents</a>
															  <?php 
															        $i=1;
															  		foreach ($disbursement_property_type_documents as  $value)
															  		{
															  			?>
															  				 <a href="#" id="<?php echo $value->id;?>" onclick="section<?php echo $value->id;?>();"><?php echo $value->Main_Document_Type ;?></a>
															  				 <input hidden type="number" value="<?php echo $value->id;?>" id="master_doc_id<?php echo $value->id;?>">
															  				 <input hidden type="text" value="<?php echo $value->Main_Document_Type;?>" id="master_doc_name<?php echo $value->id;?>">
															  			<?php
															  			$i++;
															  		}
															  ?>
															</div>
														</div>
														<div class="col-sm-9" style="border:1px solid gray;">
															<div id="default"> <- Plese select document menu for further process
															</div>
															<div id="section1" style="display:none">
																<br>
																<h4 id="heading1"></h4>
																  <table class="table table-bordered">
																    <thead>
																      <tr>
																       <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody id="section1_data">
																    </tbody>
																  </table>
															</div>
															<div id="section2" style="display:none">
																<br>
																<h4 id="heading2"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																       <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section2_data">
																    </tbody>
																  </table>
															</div>
															<div id="section3" style="display:none">
																<br>
																<h4 id="heading3"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																       <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section3_data">
																    </tbody>
																  </table>
															</div>
															<div id="section4" style="display:none">
																<br>
																<h4 id="heading4"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																        <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																       </tr>
																    </thead>
																    <tbody  id="section4_data">
																    </tbody>
																  </table>
															</div>
															<div id="section5" style="display:none">
																<br>
																<h4 id="heading5"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																         <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section5_data">
																    </tbody>
																  </table>
															</div>
															<div id="section6" style="display:none">
																<br>
																<h4 id="heading6"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																         <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section6_data">
																    </tbody>
																  </table>
															</div>
															<div id="section7" style="display:none">
																<br>
																<h4 id="heading7"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																         <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section7_data">
																    </tbody>
																  </table>
															</div>
															<div id="section8" style="display:none">
																<br>
																<h4 id="heading8"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																        <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section8_data">
																    
																    </tbody>
																  </table>
															</div>
															<div id="section9" style="display:none">
																<br>
																<h4 id="heading9"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																         <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section9_data">
																    </tbody>
																  </table>
															</div>
															<div id="section10" style="display:none">
																<br>
																<h4 id="heading10"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																         <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section10_data">
																    </tbody>
																  </table>
															</div>
															<div id="section11" style="display:none">
																<br>
																<h4 id="heading11"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																        <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody id="section11_data">
																    </tbody>
																  </table>
															</div>
															<div id="section12" style="display:none">
																<br>
																<h4 id="heading12"></h4>
																  <table class="table table-bordered">
																    <thead>
																       <tr>
																        <th>Document Name</th>
																        <th>Select Document</th>
																        <th>Upload</th>
																        <th>View</th>
																      </tr>
																    </thead>
																    <tbody  id="section12_data">
																    </tbody>
																  </table>
															</div>
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
				</div>
			</div>
		</div>
	</main>
	<footer class="c-footer">
		<div>Copyright © 2020 Finaleap.</div>
		<div class="mfs-auto">Powered by Finaleap</div>
	</footer>
</div>
<script>
 function uploadFile() {

   var selected_document_number = document.getElementById('selected_document_number').value;
   var selected_document_name = document.getElementById('selected_document_name').value;
   swal("Please wait document is uploading");
	 var document_for_uploadingID= 'document_for_uploading_'+selected_document_number;


	// alert(document_for_uploadingID);

    let formData = new FormData();   
    if(selected_document_number == 1) 
    {       

    	formData.append("file",document_for_uploading_1.files[0]);
  	}
  	 if(selected_document_number == 2) 
    {       
    	formData.append("file",document_for_uploading_2.files[0]);
  	}
  	 if(selected_document_number == 3) 
    {       
    	formData.append("file",document_for_uploading_3.files[0]);
  	}
  	 if(selected_document_number == 4) 
    {       
    	formData.append("file",document_for_uploading_4.files[0]);
  	}
  	 if(selected_document_number == 5) 
    {       
    	formData.append("file",document_for_uploading_5.files[0]);
  	}
  	 if(selected_document_number == 6) 
    {       
    	formData.append("file",document_for_uploading_6.files[0]);
  	}
  	 if(selected_document_number == 7) 
    {       
    	formData.append("file",document_for_uploading_7.files[0]);
  	}
  	 if(selected_document_number == 8) 
    {       
    	formData.append("file",document_for_uploading_8.files[0]);
  	}
  	 if(selected_document_number == 9) 
    {       
    	formData.append("file",document_for_uploading_9.files[0]);
  	}
  	 if(selected_document_number == 10) 
    {       
    	formData.append("file",document_for_uploading_10.files[0]);
  	}
  	 if(selected_document_number == 11) 
    {       
    	formData.append("file",document_for_uploading_11.files[0]);
  	}
  	if(selected_document_number == 12) 
    {       
    	formData.append("file",document_for_uploading_12.files[0]);
  	}
  	if(selected_document_number == 13) 
    {       
    	formData.append("file",document_for_uploading_13.files[0]);
  	}

   if(selected_document_number == 14) 
    {       
    	formData.append("file",document_for_uploading_14.files[0]);
  	}
  	if(selected_document_number == 15) 
    {       
    	formData.append("file",document_for_uploading_15.files[0]);
  	}
  	if(selected_document_number == 16) 
    {       
    	formData.append("file",document_for_uploading_16.files[0]);
  	}
  	if(selected_document_number == 17) 
    {       
    	formData.append("file",document_for_uploading_17.files[0]);
  	}
		if(selected_document_number == 18) 
    {       
    	formData.append("file",document_for_uploading_18.files[0]);
  	}
  	if(selected_document_number == 19) 
    {       
    	formData.append("file",document_for_uploading_19.files[0]);
  	}
		if(selected_document_number == 20) 
    {       
    	formData.append("file",document_for_uploading_20.files[0]);
  	}
    if(selected_document_number == 21) 
    {       
    	formData.append("file",document_for_uploading_21.files[0]);
  	}
  	if(selected_document_number == 22) 
    {       
    	formData.append("file",document_for_uploading_22.files[0]);
  	}
  	if(selected_document_number == 23) 
    {       
    	formData.append("file",document_for_uploading_23.files[0]);
  	}
  	if(selected_document_number == 24) 
    {       
    	formData.append("file",document_for_uploading_24.files[0]);
  	}
  	if(selected_document_number == 25) 
    {       
    	formData.append("file",document_for_uploading_25.files[0]);
  	}
  	if(selected_document_number == 26) 
    {       
    	formData.append("file",document_for_uploading_26.files[0]);
  	}
  	if(selected_document_number == 27) 
    {       
    	formData.append("file",document_for_uploading_27.files[0]);
  	}
  	if(selected_document_number == 28) 
    {       
    	formData.append("file",document_for_uploading_28.files[0]);
  	}
  	if(selected_document_number == 29) 
    {       
    	formData.append("file",document_for_uploading_29.files[0]);
  	}
  	if(selected_document_number == 30) 
    {       
    	formData.append("file",document_for_uploading_30.files[0]);
  	}
  	if(selected_document_number == 31) 
    {       
    	formData.append("file",document_for_uploading_31.files[0]);
  	}
  	if(selected_document_number == 32) 
    {       
    	formData.append("file",document_for_uploading_32.files[0]);
  	}
  	if(selected_document_number == 33) 
    {       
    	formData.append("file",document_for_uploading_33.files[0]);
  	}
  	if(selected_document_number == 34) 
    {       
    	formData.append("file",document_for_uploading_34.files[0]);
  	}
  	if(selected_document_number == 35) 
    {       
    	formData.append("file",document_for_uploading_35.files[0]);
  	}
  	if(selected_document_number == 36) 
    {       
    	formData.append("file",document_for_uploading_36.files[0]);
  	}
  	if(selected_document_number == 37) 
    {       
    	formData.append("file",document_for_uploading_37.files[0]);
  	}
    if(selected_document_number == 38) 
    {       
    	formData.append("file",document_for_uploading_38.files[0]);
  	}
  	if(selected_document_number == 39) 
    {       
    	formData.append("file",document_for_uploading_39.files[0]);
  	}
  	if(selected_document_number == 40) 
    {       
    	formData.append("file",document_for_uploading_40.files[0]);
  	}
  	if(selected_document_number == 41) 
    {       
    	formData.append("file",document_for_uploading_41.files[0]);
  	}
  	if(selected_document_number == 42) 
    {       
    	formData.append("file",document_for_uploading_42.files[0]);
  	}
  		if(selected_document_number == 43) 
    {       
    	formData.append("file",document_for_uploading_43.files[0]);
  	}
  	if(selected_document_number == 44) 
    {       
    	formData.append("file",document_for_uploading_44.files[0]);
  	}
  		if(selected_document_number == 45) 
    {       
    	formData.append("file",document_for_uploading_45.files[0]);
  	}
  	if(selected_document_number == 46) 
    {       
    	formData.append("file",document_for_uploading_46.files[0]);
  	}
  		if(selected_document_number == 47) 
    {       
    	formData.append("file",document_for_uploading_47.files[0]);
  	}
  	if(selected_document_number == 48) 
    {       
    	formData.append("file",document_for_uploading_48.files[0]);
  	}
  		if(selected_document_number == 49) 
    {       
    	formData.append("file",document_for_uploading_49.files[0]);
  	}
  	if(selected_document_number == 50) 
    {       
    	formData.append("file",document_for_uploading_50.files[0]);
  	}
  	if(selected_document_number == 51) 
    {       
    	formData.append("file",document_for_uploading_51.files[0]);
  	}
  	if(selected_document_number == 52) 
    {       
    	formData.append("file",document_for_uploading_52.files[0]);
  	}
  	if(selected_document_number == 53) 
    {       
    	formData.append("file",document_for_uploading_53.files[0]);
  	}
   if(selected_document_number == 54) 
    {       
    	formData.append("file",document_for_uploading_54.files[0]);
  	}
  	if(selected_document_number == 55) 
    {       
    	formData.append("file",document_for_uploading_55.files[0]);
  	}
  	if(selected_document_number == 56) 
    {       
    	formData.append("file",document_for_uploading_56.files[0]);
  	}
  	if(selected_document_number == 57) 
    {       
    	formData.append("file",document_for_uploading_57.files[0]);
  	}
  	if(selected_document_number == 58) 
    {       
    	formData.append("file",document_for_uploading_58.files[0]);
  	}
  	if(selected_document_number == 59) 
    {       
    	formData.append("file",document_for_uploading_59.files[0]);
  	}
  	if(selected_document_number == 60) 
    {       
    	formData.append("file",document_for_uploading_60.files[0]);
  	}
  	if(selected_document_number == 61) 
    {       
    	formData.append("file",document_for_uploading_61.files[0]);
  	}
  	if(selected_document_number == 62) 
    {       
    	formData.append("file",document_for_uploading_62.files[0]);
  	}
  	if(selected_document_number == 63) 
    {       
    	formData.append("file",document_for_uploading_63.files[0]);
  	}
  	if(selected_document_number == 64) 
    {       
    	formData.append("file",document_for_uploading_64.files[0]);
  	}
  	if(selected_document_number == 65) 
    {       
    	formData.append("file",document_for_uploading_65.files[0]);
  	}
  	if(selected_document_number == 66) 
    {       
    	formData.append("file",document_for_uploading_66.files[0]);
  	}
  	if(selected_document_number == 67) 
    {       
    	formData.append("file",document_for_uploading_67.files[0]);
  	}



    var selected_document_type_id = selected_document_number;
		var selected_document_type_name = selected_document_name;
		var login_user_unique_code = document.getElementById('login_user_unique_code').value;
		var applicant_unique_code = document.getElementById('applicant_unique_code').value;

		formData.append("selected_document_type_id", selected_document_type_id);
		formData.append("selected_document_type_name", selected_document_type_name);
		formData.append("login_user_unique_code", login_user_unique_code);
		formData.append("applicant_unique_code", applicant_unique_code);

    //alert(formData);
      $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Disbursement_OPS/upload_one_by_one_documents"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.status == 'success')
                     		{
                       			$('#upload-button_'+selected_document_type_id+'').html("Done");
                       	 		$('#pdf_icon_'+selected_document_type_id+'').css({color:"red"	});
                      			swal( "Success!","Document Uploded Successfully","success");
                     		}
                     		else if(obj.status == 'blank')
                     		{
                     		
                      			swal( "Warning!","Please select document","warning");
                      			
                     		}
                     		else 
                     		{
                     		
                      			swal( "Warning!","Document Already Exists","warning");
                      			
                     		}
                     }
              });   
    
}
</script>
<script type="text/javascript">
	 $(document).ready(function(){
	 var selected_document_number = document.getElementById('selected_document_number').value;
	 const form_id= '#Form_'+selected_document_number;
	});

	
	function upload_doc(value,name)
	{
		  $('#selected_document_number').val(value);
		  $('#selected_document_name').val(name);
  }
	  
	function section1()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id1').value;
		var master_doc_name = document.getElementById('master_doc_name1').value;
		var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

   	$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
                  

							 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section1_data').html(tr);
   							    $('#heading1').html(master_doc_name);

							               				
            					});
											
				        }
                });

		document.getElementById('section1').style.display = 'block';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';


         



	}
	function section2()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id2').value;
		var master_doc_name = document.getElementById('master_doc_name2').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 	 	 	  	 	  		 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section2_data').html(tr);
    							  $('#heading2').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'block';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section3()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id3').value;
		var master_doc_name = document.getElementById('master_doc_name3').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 	 	 	 	 	 tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section3_data').html(tr);
    							  $('#heading3').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'block';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section4()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id4').value;
		var master_doc_name = document.getElementById('master_doc_name4').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 		 	 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section4_data').html(tr);
    							  $('#heading4').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'block';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section5()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id5').value;
		var master_doc_name = document.getElementById('master_doc_name5').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 	 		 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section5_data').html(tr);
    							  $('#heading5').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'block';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section6()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id6').value;
		var master_doc_name = document.getElementById('master_doc_name6').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 	  	 	 	 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section6_data').html(tr);
    							  $('#heading6').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'block';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section7()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id7').value;
		var master_doc_name = document.getElementById('master_doc_name7').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 	 	 		 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section7_data').html(tr);
    							  $('#heading7').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'block';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section8()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id8').value;
		var master_doc_name = document.getElementById('master_doc_name8').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
								 		 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section8_data').html(tr);
    							  $('#heading8').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'block';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section9()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id9').value;
		var master_doc_name = document.getElementById('master_doc_name9').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 		 	   tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section9_data').html(tr);
    							  $('#heading9').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'block';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section10()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id10').value;
		var master_doc_name = document.getElementById('master_doc_name10').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
								 		 	 tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section10_data').html(tr);
    							  $('#heading10').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'block';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section11()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id11').value;
		var master_doc_name = document.getElementById('master_doc_name11').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 		 	 	 	 tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section11_data').html(tr);
    							  $('#heading11').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'block';
		document.getElementById('section12').style.display = 'none';
		document.getElementById('default').style.display = 'none';

	}
	function section12()
	{
		//alert("hii");
		var master_doc_id = document.getElementById('master_doc_id12').value;
		var master_doc_name = document.getElementById('master_doc_name12').value;
var applicant_encoded_unique_code = document.getElementById('applicant_encoded_unique_code').value;

			$.ajax({
					type:'POST',
					url:'<?php echo base_url("index.php/Disbursement_OPS/show_subtypes"); ?>',
				    data:{
						'master_doc_id':master_doc_id,
						},
					success:function(data)
						{
						var obj =JSON.parse(data);
							  var tr = '';
							 $.each(obj.subtypes, function(key, value){
							 	 	  tr += '<tr><td>' + value.subtype_document_name + '</td><td><input type="file" id="document_for_uploading_'+value.id+'" id="document_for_uploading_'+value.id+'" onclick="upload_doc('+value.id+',\'' + value.subtype_document_name + '\');"></td><td><button id="upload-button_'+value.id+'" onclick="uploadFile();"  class="btn btn-outline-primary"> Upload </button></td><td>	<a style="margin-left: 8px; " href="<?php echo base_url()?>index.php/Disbursement_OPS/view_Upladed_documents?I='+applicant_encoded_unique_code+'" class="btn modal_test" target="_blank"><i class="fa fa-file-pdf-o text-right" id="pdf_icon_'+value.id+'"></i></a></td></tr>';

    							  $('#section12_data').html(tr);
    							  $('#heading12').html(master_doc_name);

							
                				
            					});
											
				        }
                });
		
		document.getElementById('section1').style.display = 'none';
		document.getElementById('section2').style.display = 'none';
		document.getElementById('section3').style.display = 'none';
		document.getElementById('section4').style.display = 'none';
		document.getElementById('section5').style.display = 'none';
		document.getElementById('section6').style.display = 'none';
		document.getElementById('section7').style.display = 'none';
		document.getElementById('section8').style.display = 'none';
		document.getElementById('section9').style.display = 'none';
		document.getElementById('section10').style.display = 'none';
		document.getElementById('section11').style.display = 'none';
		document.getElementById('section12').style.display = 'block';
		document.getElementById('default').style.display = 'none';

	}
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
