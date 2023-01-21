

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


<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="screen-title" style="margin-bottom:40px;">                    	
						<small class="screen-title-txt">Customers </small> 
                    </div>                    
                </div>     
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 margin-top-15">
                	Filter By : 
                	<i style="font-size: 12px; margin-right: 4px; margin-left: 4px;"> DATE </i>
                	<input type="date" name="filter_date" onchange="filterDateSelected_payment(event);"/>
                	<?php if($userType != 'NONE') { ?>
	                	<?php if($userType != 'DSA_CSR') { ?>
		                	
		                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/aadhar_esign_report?s=all" class="btn-dsa-new-customer">ALL </a>&nbsp;
						    <a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/aadhar_esign_report?s=refund" class="btn-dsa-new-customer">refund </a>&nbsp;
							<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/aadhar_esign_report?s=Sucess" class="btn-dsa-new-customer">Sucess </a>
		                			                	
		                <?php } ?>	

		                	
	                <?php } ?>	
            	</div>       	                
            </div>
        </div>
</div>

<?php if(count($customers) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
	            	<small style="border-radius: 10px; padding: 15px; background-color: white; margin-top: 50px;" class="full-black-color">Unable to find any Payment.
	                </small>							
	            </div>
	        </div>
	</div>
<?php } ?>


	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		
				<div class="table-responsive">
				  <table class="table">
					<thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">Name</th>
						  <th scope="col">Mobile</th>
						  <th scope="col">Email</th>
						  <th scope="col">Payment Id</th>
						  <th scope="col">Payment date Time</th>
						  <th scope="col">Payment Status</th>
						   <th scope="col" hidden>Link</th>
						  <th scope="col">Refund</th>
						  <th scope="col">Email send</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=1;foreach($customers as $row){?>
					
					 <tr>
						  <th scope="row"><?php echo $i; ?></th>
						  <td><?php echo $row->cname; ?> </td>
						  <td><?php echo $row->cmob; ?></td>
						  <td id="email_<?php echo $i; ?>"><?php echo $row->cemail; ?> </td>
						  <td id="pay_id_<?php echo $i; ?>"><?php echo $row->razorpay_payment_id; ?> </td>
						  <td><?php echo $row->created_at; ?> </td>
						  <td><?php echo $row->status; ?> </td>
						  <td id="link_<?php echo $i; ?>" hidden> <?php echo $row->link; ?> </td>
						  <td><?php echo $row->refund; ?> </td>
						  <td> <button type="button" class="btn btn-info btn-lg open-AddBookDialog" data-toggle="modal" data-id="<?php echo $i; ?>" data-target="#myModal">Send Mail</button></td>
						  
						</tr>
						
					<?php $i++;} ?>
					</tbody>
				  </table>
				</div>

		
	     </div>
	</div>
	 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     
       <div class="modal-content">
							<div class="modal-header">
							  
							  <h4 class="modal-title">Enter Email</h4>
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="credit-form" action="" method="post">
							<div class="modal-body">
							  <div class="form-group">
																
																	<label for="">Enter Email id</label>
																<input type="email" name="email" class="form-control" id="email" 
																	placeholder="example@gmail.com"   required>
																	<input type="text" name="email" class="form-control" id="razor_pay_id" 
																	placeholder="example@gmail.com"   hidden>
																	<input type="text" name="link" class="form-control" id="link" 
																	placeholder="example@gmail.com"   hidden>
																</div>
																
																
							</div>
							 </form>
							<div class="modal-footer">
							  <button type="button" class="btn btn-info btn-lg" onclick="send_mail()" >send mail</button>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							 
							</div>
						  </div>
    </div>
  </div>
  
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
<script>
function filterDateSelected_payment(e){
      e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
      var form = $(this);
      var url = form.attr('action'); 
      window.location.replace("Payment_report?date="+e.target.value);
  }
function send_mail()
                        {
							var razor=document.getElementById('razor_pay_id').value;
							var email=document.getElementById('email').value;
							var link=document.getElementById('link').value
							
							
						  $.ajax({
														type:'POST',
														url:'<?php echo base_url("index.php/front/send_mail_aadhar"); ?>',
														data:{'razor':razor,'email':email,'link':link},
														success:function(data){
															var obj =JSON.parse(data);
															if(obj.status=='1')
															{
																swal("success!", "Mail send Sucessfully", "success");
																$('#send_otp').hide();
																$('#resend_otp').show();
															}
															else if(obj.status=='2')
															{
																swal("warning!", "Report not store in system", "warning");
																}
																else if(obj.status=='3')
															{
																swal("warning!", "Report not pull successfully", "warning");
														    }
															else
															{
																swal("warning!", "Something get wrong", "warning");
														    }
														}
													});
							
						}
$(document).on("click", ".open-AddBookDialog", function () {
     var id = $(this).data('id');
	// var email=$('#pay_id_'+i).val();
	    var pay_id= document.getElementById('pay_id_'+id).innerHTML;
		var email= document.getElementById('email_'+id).innerHTML;
		var link= document.getElementById('link_'+id).innerHTML;
     $(".modal-body #email").val( email );
	 $(".modal-body #razor_pay_id").val( pay_id );
	 $(".modal-body #link").val( link );
	
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
				
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>