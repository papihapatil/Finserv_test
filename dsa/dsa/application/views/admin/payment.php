

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

<!-----------------------------------------> 
                                                        

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
                        <small class="screen-title-txt"><h3>Customers</h3> </small> 
                    </div>                    
                </div>     
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 margin-top-15">
                    Filter By : 
                    <i style="font-size: 12px; margin-right: 4px; margin-left: 4px;"> DATE </i>
                    <input type="date" name="filter_date" onchange="filterDateSelected_payment(event);"/>
                    <?php if($userType != 'NONE') { ?>
                        <?php if($userType != 'DSA_CSR') { ?>
                            
                            <a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/Payment_report?s=all" class="btn-dsa-new-customer">ALL </a>&nbsp;
                            <a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/Payment_report?s=refund" class="btn-dsa-new-customer">refund </a>&nbsp;
                            <a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/admin/Payment_report?s=Sucess" class="btn-dsa-new-customer">Sucess </a>
                                                        
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
                    <small style="border-radius: 10px; padding: 15px; background-color: white; margin-top:17px;" class="full-black-color">Unable to find any Payment.
                    </small>                            
                </div>
            </div>
    </div>
<?php } ?>



    
                 <div class="wide comments example">
        
                        <div class="fw-body">
                            <div class="content">
                                <div style="overflow-x:auto;">
                                    <div class="demo-html">
                                        <table id="example" class="display" style="width:100%">
                                          <thead>
                                                <tr>
                                                <th>sr</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Payment Id</th>
                                                <th>Payment date Time</th>
                                                <th>Payment Status</th>
                                                <th>Credit Buerau Status</th>
                                                <th>Refund</th>
                                                <th>Email send</th>
                                                <th>View Report</th>
                                                <th>Download Report</th>
                                                <!-- <th scope="col">View report</th>-->
                                                </tr>
                                            </thead>


                                            <tbody>
                    <?php $i=1;foreach($customers as $row){
                        //if(isset($row->response)) 
                        //{
                         if($row->response!='')
                          {
                            $oredr_id_responce=json_decode($row->response,true);
                            if(isset($oredr_id_responce))
                            {
                              $respnse_no = $oredr_id_responce['CCRResponse']['CIRReportDataLst'][0]['InquiryResponseHeader']['ReportOrderNO'];
                            }   
                        }
                        

                        //}

                    ?>
                     
                     <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $row->cname; ?> </td>
                          <td><?php echo $row->cmob; ?></td>
                          <td id="email_<?php echo $i; ?>"><?php echo $row->cemail; ?> </td>
                          <td id="pay_id_<?php echo $i; ?>"><?php echo $row->razorpay_payment_id; ?> </td>
                          <td><?php echo $row->created_at; ?> </td>
                          <td><?php echo $row->status; ?> </td>
                          <td><?php echo $row->score_success; ?> </td>
                          <td><?php echo $row->refund; ?> </td>
                          <td><button type="button" class="btn btn-info btn-lg open-AddBookDialog" data-toggle="modal" data-id="<?php echo $i; ?>" data-target="#myModal">Send Mail</button></td>
                          <td>
                              <?php if(isset($row->response)) {?>
                                <a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $respnse_no ;?>.pdf">
                                    <button type="button" class="btn btn-info btn-lg open-AddBookDialog">View Report</button>
                                </a>
                            <?php }
                            else{
                            ?>
                              <button type="button" class="btn btn-info btn-lg open-AddBookDialog">Report Not found </button>
                            
                            <?php
                            }
                            ?>
                          </td>
                          <td>
                          <?php if(isset($row->response)) {?>
                                <a href="<?php base_url()?>/dsa/dsa/images/all_document_pdf/<?php echo $respnse_no; ?>.pdf" target='_blank' download>
                                    <button type="button" class="btn btn-info btn-lg open-AddBookDialog">Download Report</button>
                                </a>
                                <?php }
                            else{
                            ?>
                                    <button type="button" class="btn btn-info btn-lg open-AddBookDialog">Report Not found </button>
                            
                            <?php
                            }
                            ?>
                          </td>
                         
                          <!--<td><input type="text" value="" id="Filename"></td>-->
                          
                        </tr>
                        
                    <?php $i++;} ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

        
 </body>
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
                    placeholder="example@gmail.com"   required><input type="text" name="email" class="form-control" id="razor_pay_id" 
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
        </main>
        </div>
        
        <script >
         $(".modal_test ").on("click", function(){
           var dataId = $(this).attr("data-id");
           $(".idform").val(dataId);
       
    });
    </script>






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
                            
                            
                          $.ajax({
                                                        type:'POST',
                                                        url:'<?php echo base_url("index.php/front/send_mail"); ?>',
                                                        data:{'razor':razor,'email':email},
                                                        success:function(data){
                                                            var obj =JSON.parse(data);
                                                            if(obj.status=='1')
                                                            {
                                                                swal("success!", "Mail send Sucessfully", "success");
                                                                //$file_name=obj.file_path;
                                                                //document.getElementById('Filename').value =$file_name;
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
     $(".modal-body #email").val( email );
     $(".modal-body #razor_pay_id").val( pay_id );
    
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});

    
    