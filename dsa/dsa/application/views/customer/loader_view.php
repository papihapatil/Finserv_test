<link href="<?php base_url()?>/dsa/dsa/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>adminn/css/loader.css" rel="stylesheet">
    <script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>

    <script src="<?php base_url()?>/dsa/dsa/js/bootstrap/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript">
    $(document).ready(function()
    {
            //alert();
            $.ajax({
                 type: "POST",
                 url: document.location.origin+"/finserv_test/dsa/dsa/index.php/customer/customer_apply_for_loan_with_score_credit?UID=<?php echo $id; ?>",
                 success: function (response) {
                    var parsed_data = JSON.parse(response);
                    
                    if(parsed_data.status >0){                                                                
                    window.location.replace("/finserv_test/dsa/dsa/index.php/customer/customer_apply_for_loan_next?UID=<?php echo $id; ?>");
                    }
                    else {
                        var error = parsed_data.error
                        window.location.replace("/finserv_test/dsa/dsa/index.php/customer/score_error_popup?error="+error);
                    }
                }
          });    
    });
</script>

<div style="width:100%; height:100%" id="loading">
    <div class="row justify-content-center" style="margin-top:13%">
        <div class=" container-login100-form-btn">
            <div id="loader" class="loader" style="margin-top:10px;"></div>
        </div>					
    </div>			
</div>

