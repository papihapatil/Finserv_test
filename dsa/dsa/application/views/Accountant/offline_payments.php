<?php
 $result = $this->session->flashdata('result');   
 if (isset($result)) 
    {
		if($result=='1')	 { echo '<script> swal("success!", "Count updated successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='2'){ echo '<script> swal("success!", "IDCCR User added successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='3'){ echo '<script> swal("success!", "Payment Recived date Updated", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='4'){ echo '<script> swal("success!", "User Deleted successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else if($result=='5'){ echo '<script> swal("warning!", "Opps! Mobile already in use.", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='6'){ echo '<script> swal("warning!", "Opps! User ID already in use", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='7'){ echo '<script> swal("warning!", "Opps! Password already in use", "warning");</script>';$this->session->unset_userdata('result'); }
		else if($result=='8'){ echo '<script> swal("success!", "Count Reset Successfully", "success");</script>';$this->session->unset_userdata('result'); }
		else                 { echo '<script> swal("warning!", "Error in update Payment Recived date", "warning");</script>';$this->session->unset_userdata('result');	}
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
<div>
<div class="">
  											<div class="row">
                       
				
																<?php if(isset($tikit_data))
				      											{
				         											
						 											 ?>
						   											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;" >
						   												<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($tikit_data)) {echo count($tikit_data);}else {echo 0;}?>&nbsp;&nbsp;&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
																	</div>
																	<?php     
			           												} 
																	else
																	{ ?>
					       											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;">
						   												<lable style=" padding: 10px;border:1px solid #ccc;font-weight:bold;">  Total <?php if(isset($tikit_data)) {echo count($tikit_data);}else {echo 0;} ?>&nbsp;&nbsp;<a>
						   												<i class="fa fa-download "style='font-size:24px; color:green;'></i></a></lable>
																	</div>
																	<?php   }   ?><br><br>
                                 
                                  <center></h1><b>View Offline payment List</b></h1></center>

        
      
                               

        

                                       
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
                                       <!-- <th>Cust_id</th>  -->
                                        <th>Acc holder name</th>
                                        <th>Lending Bank name</th>
                                        <th>Bank name</th>
                                        <th>Branch name</th>
                                        <th>Check no</th>
                                        <th>IFSC code</th>
                                        <th>Acc type</th>

                                        <th>Amount</th>

                                        <th>Actions</th>
                                        <th>Payment Present date </th>
										<th>Payment Recived date </th>
										<th>Action</th>
                                        <th>Document</th>
                                       
                                        
                                       
                                       
																				</tr>
                                       

																			</thead>
                                      
																			<tbody>
																				<?php //print_r($payments);  
																				$i= 1; if(!empty($payments)){foreach($payments as $value){ ?>
                                          <tr>
          <td><?php  echo $i; ?></td>
        <!-- <td><?php // echo $value->Cust_id;?></td>  -->
       <td><?php echo $value->Acc_holder_name;?></td>
<td><?php echo $value->LoanBank;?></td>
       <td><?php echo $value->Bank_name;?></td>
       <td><?php echo $value->Branch_name;?></td>
       <td><?php echo $value->Check_no;?></td>
       <td><?php echo $value->IFSC_code;?></td>
       <td><?php echo $value->Acc_type;?></td>

       <td><?php echo $value->Amount;?></td>

       <td>&nbsp;&nbsp;</td>
       <td><?php echo $value->Recived_date ;?></td>
	   <td><form class="login100-form validate-form" action="<?php echo base_url(); ?>index.php/accountant/update_paymnet_recevied" method="POST" enctype="multipart/form-data"><input type="date" name="Payment_Recived_date" value="<?php echo $value->Payment_Recived_date ;?>" ><input type="text" name="cust_id" value="<?php echo $value->Cust_id; ?>" hidden></td>
	   <td><input type="submit" class="btn btn-info" value="Update" name="Update"></button></form></td>
	    <td><i class="fa fa-file-pdf-o text-right" style="color:blue;" onclick="assigne_values(<?php echo $value->id; ?>);"></i></td>

       
      
      
                                        
      	
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

</div>
</div>
</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>
<div class="modal fade" id="open_document" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<h4>View Document</h4>
							</div>
							<div class="modal-body">
							<lable  id="document_cust" name="document_cust" ></lable>
								
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
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
<script>
function assigne_values(ID)
{
	 let formData = new FormData();  
     formData.append("Entry_ID", ID);
	  $.ajax({
                     type: "POST",
                     url:'<?php echo base_url("index.php/Accountant/find_my_bank_statement"); ?>',
                     data:formData,
                     processData: false,
                     contentType: false,
                     success: function (response) 
                     {
                     		var obj =JSON.parse(response);
                     		if(obj.msg == 'sucess')
                     		{
							    var data_array=obj.data;
								//alert(data_array['id']);
								//swal( "Success!","Details saved Successfully","success");
								 $('#open_document').modal({
									backdrop: 'static',
									keyboard: false

									});
							  $('#open_document').modal('show');
							   	$('#document_cust').html(obj.doc);

                     		}
                     	
                     }
              }); 
	
}
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<!-- <script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script type="text/javascript"  src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css">
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

       
