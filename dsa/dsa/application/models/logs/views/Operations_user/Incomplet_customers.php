<!DOCTYPE html>
<?php
$CM_ID=$this->session->userdata('ID');
//echo $credit_manager_id;
//exit();
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
<div class="row">
<input type="text" hidden value="<?php echo $CM_ID;?>" id="CM_ID">

   <div class="col-sm-3">

  </div>
   </div>
   </div>
<hr>
  </div>

  <div>
<div class="container">
<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 justify-content-center">
</small>
</div>
</div>
  </div>
  <div >
       <div class="">

<div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="padding-right:0px;margin-right:0px;"></div>


  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
</div>
<div class="col-sm-1" style="text-align:right;padding-right:0px;margin-left:5%;"><lable style="margin-left:8px;">Filter : </lable>
  </div>
<div class="col-sm-2" >
   <input type="text" hidden value="<?php echo $s;?>" id="filter">
<select class="form-control" aria-label="Default select example" name="select_filters" id="select_dropdown_credit_allCustomers">
       <option value="">Select</option>
<option value="all">All Customers</option>
<option value="Completed_CAM">Completed CAM</option>
<option value="Incomplete_CAM">Incomplete CAM </option>
<option value="Completed_PD">Completed PD </option>

</select>

</div>

 

           </div>

       </div>
<hr>
</div>
  <body class="wide comments example">
<div class="fw-body">
<div class="content">
<div style="overflow-x:auto;">
<div class="demo-html">
<table id="empTable" class="display" style="width:100%">
<thead>
<tr>
   
<th>Application id</th>
<th>Customer Name</th>
<th>Legal Status</th>
<th>Other Info </th>



</tr>
</thead>

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
</main>
</div>
<footer class="c-footer">
<div>Copyright © 2020 Finaleap.</div>
<div class="mfs-auto">Powered by Finaleap</div>
</footer>
</div>
<script>
        $(document).ready(function(){

            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                  
                    'url': window.location.origin+"/dsa/dsa/index.php/Operations_user/Legal_incomplete"

                },
             
               
                'columns': [

                   
                    { data: 'Application_no' },
					{ data: 'Name' },
					{ data: 'Status' },
                    { data: 'view' }

                   
                   
               
                   


                ],
            });
           
        });
        </script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
