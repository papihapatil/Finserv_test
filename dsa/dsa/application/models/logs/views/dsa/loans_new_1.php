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
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-3 col-3">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	<small class="screen-title-txt">Customer Applied for Loan</small> 
                    </div>                    
                </div>  
                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-9 col-9 margin-top-15">
                	Filter By :
                	<a <?php if($s == 'all'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/loans?s=all" class="btn-dsa-new-customer " style=" border:1px solid black; margin :2px;padding:2px;">ALL </a>
                    <a <?php if($s == 'business'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/loans?s=business" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Business </a>
		            <a <?php if($s == 'personal'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/loans?s=personal" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Personal</a>
		            <a <?php if($s == 'credit'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/loans?s=credit" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">credit</a>
		            <a <?php if($s == 'home'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/loans?s=home" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Home</a>
		            <a <?php if($s == 'lap'){echo "class='dsa-filter-btn-active'";}else {echo "class='dsa-filter-btn-inactive'";}?> href="<?php echo base_url()?>index.php/dsa/loans?s=lap" class="btn-dsa-new-customer" style=" border:1px solid black; margin :2px;padding:2px;">Lap</a>
		              	
              </div>				
            
            </div>
        </div>
</div>

<?php if(count($loans) == 0) { ?>
	<div >
	        <div class="container">
	            <div class="row">
	            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="screen-title" style="margin:100px;">
	                    	<small class="full-black-color">Nobody applied for any loan yet.</small>
	                    </div>
	                </div>            	
	            </div>
	        </div>
	</div>
<?php } ?>
<table class="table table-bordered">
    <thead>
      <tr>
	    <th>Sr.No</th>
		<th>Entry No.</th>
		<th>Application ID</th>
        <th>Customer</th>
        <th>Mobile</th>
        <th>Loan Type</th>
		<th>Status </th>
        <th>Applied On</th>
      </tr>
    </thead>
	<tbody>

<?php  $i= 1 ;foreach($loans as $row){  ?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		
	    <tr> 

			<td><?php echo $i;?></td>
			<td><?php echo $row->ID;?></td>
			<td><?php echo $row->Application_id;?></td>
       		<td><?php echo $row->FN." ".$row->LN;  ?></td>
       		<td><?php echo $row->MOBILE;  ?></td>
        	<td><?php echo $row->LOAN_TYPE;  ?></td>
			<td><?php echo $row->LOAN_STATUS;  ?></td>
        	<td><?php $date=date_create($row->CREATED_AT); echo date_format($date,"d-m-Y h:i:s");  ?></td>
      	</tr>
<?php  $i++; } ?> 
    </tbody>
     </table>
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

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<!--[if IE]><!--><!--<![endif]-->

<script src="<?php base_url()?>/dsa/dsa/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>

</body>
</html>