
	
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
                                 
                                  <center></h1><b>View Issue List</b></h1></center>

        
      
                               

        

                                       
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
                                        <th>Cust_id</th>
                                        <th>Acc_holder_name</th>
                                        
                                        <th>Bank_name</th>
                                        <th>Branch_name</th>
                                        <th>Check_no</th>
                                        <th>IFSC_code</th>
                                        <th>Acc_type</th>

                                        <th>Amount</th>

                                        <th>Actions</th>
                                        <th>Recived_date </th>
                                        
                                       
                                        
                                       
                                       
																				</tr>
                                       

																			</thead>
                                      
																			<tbody>
																				<?php //print_r($payments);  
																				$i= 1; if(!empty($payments)){foreach($payments as $value){ ?>
                                          <tr>
          <td><?php  echo $i; ?></td>
         <td><?php echo $value->Cust_id;?></td>
       <td><?php echo $value->Acc_holder_name;?></td>

       <td><?php echo $value->Bank_name;?></td>
       <td><?php echo $value->Branch_name;?></td>
       <td><?php echo $value->Check_no;?></td>
       <td><?php echo $value->IFSC_code;?></td>
       <td><?php echo $value->Acc_type;?></td>

       <td><?php echo $value->Amount;?></td>

       <td><a href="<?php echo base_url('/index.php/Help/help_view_Admin_form?tikit_id='.$value->tikit_id);?>"><i class="fa fa-eye text-right" style="color:blue;"></i></a>&nbsp;&nbsp;
       <td><?php echo $value->Recived_date ;?></td>

       
      
      
                                        
      	
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

       
