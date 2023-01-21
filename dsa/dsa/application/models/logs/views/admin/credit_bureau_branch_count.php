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
		                                  <div class="col-sm-12">
		                                    <div >
    		                                    <div class="container">
			                                        <div class="row">
		                                                <div class="col-sm-6">
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <form id="credit_saction_form" action="<?= base_url('index.php/admin/credit_bureau_reports')?>" method="post">
	  				                                            <select  class="form-control" aria-label="Default select example" name="select_filters">
						                                              <option value="">Select</option>
						                                              <option value="All">All Reports</option>
						                                              <?php foreach($idccr_users as $row){ ?>
  							                 						  <option value="<?php echo $row->Email;?>"><?php echo $row->User_name;?></option>
  						                        					  <?php  }?>
	       				                                        </select>
                                                        </div>
                                                        <div class="col-sm-1">     
                                                            <button class="btn btn-info" style="background-color: #25a6c6;" name="submit" value="submit">
		                                                      Search
	                                                       </button>
	                                                       </form>		
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                           <div class="row">
                                                               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                <div style=" margin-top: 8px;" class="col">
                                                                 <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Branch Name</label>
                                                                  <select class="form-control" id="filter_branch_name">
                                                                                 <option value="">Select</option>
                                                                                    <option value="All">All</option>
                                                                                      <option value="Ahmednagar">Ahmednagar</option>
                                                                                   <option value="Shevgaon">Shevgaon</option>
                                                                                   <option value="Bidkin">Bidkin</option>
                                                                                    <option value="Pachod">Pachod</option>
                                                                                   <option value="Ghatkopar">Ghatkopar</option>
                                                                                    <option value="Belapur">Belapur</option>
                                                                                    <option value="Finaleap">Finaleap</option>
                                                                  </select>
                                                               </div>
                                                               </div>
                                                               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                <div style=" margin-top: 8px;" class="col">
                                                                 <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Date Range</label>
                                                                  <select class="form-control"  name="Bank_name" id="Billing_type">
                                                                                 <option value="">Select</option>
                                                                                 <option value="Current_Month">Current Month</option>
                                                                                 <option value="Previous_Month">Previous Month</option>
                                                                                 <option value="Select_Range">Select Range</option>
                                                                  </select>
                                                               </div>
                                                               </div>
                                                               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">Start Date</label>
                                                                     <input  class="form-control Start_Date"  type="date" name="Start_Date" id="Start_Date"  >
                                                                  </div>  
                                                               </div> 
                                                               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                    <label for="email" style="font-size: 16px; color: black; font-weight: bold;">End Date</label>
                                                                     <input  class="form-control"  type="date" name="End_Date" id="End_Date"  >
                                                                  </div>  
                                                               </div> 
                                                              <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                                                   <div style=" margin-top: 8px;" class="col">
                                                                     <br>
                                                                         <button class="btn btn-info" style="background-color: #25a6c6;" id="get_idccr_DateFilter_Counts" onclick="get_idccr_DateFilter_Counts();">
                                                                           Get Count
                                                                     </button>
                                                                  </div>  
                                                               </div> 
                           </div>
        <hr>                            
                                    


<?php if(count($customers)!= 0) {?>

<div class="row justify-content-center">
        <div class="screen-title" style="margin-bottom:1%;">

        </div>                    
    </div>  
<?php } else{?>
	<div class="row justify-content-center">
        <div class="screen-title" style="margin-top:10%;">
        
        </div>                    
    </div> 
	<div class="row justify-content-center">
        <div class="screen-title" style="margin-top:2%;">
        	<small style="border-radius: 10px; padding: 15px; background-color: white;">Unable to find any Reports in selected filter, please change filter value.</small> 
        </div>                    
    </div>            	
<?php }
?>


<div style="overflow-x:auto;">
<table id="example" class="display" style="width:100%">
	<thead>
      <tr>
	    <th>Sr.No</th>
		<th> Branch Name</th>
        <th>Count </th>
        
	
		
       </tr>
    </thead>
	<tbody>
<?php $total=0; $i=1; foreach($customers as $row){ ?>
	<tr> 

<td style="width:3%"><?php echo $i;?></td>
<td style="width:15%"><?php echo $row->Branch_name?></td>
   <td style="width:10%"><?php echo $row->count;   ?></td>
   

</tr>
<?php $total=$total+$row->count; $i++; }?>

</tbody>
<tr style="background-color: yellow;">
    <td style="width:3%"> </td>
    <td style="width:15%">Total</td>
    <td style="width:10%"><?php echo $total; ?></td>

</tr>
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
<script>
    function get_idccr_DateFilter_Counts()
    {
               var filter_branch_name = document.getElementById("filter_branch_name").value;
               var Billing_type = document.getElementById("Billing_type").value;
               var Start_Date= document.getElementById("Start_Date").value;
               var End_Date= document.getElementById("End_Date").value;
               window.location.replace("/dsa/dsa/index.php/admin/credit_bureau_branch_count?B="+filter_branch_name+"&SD="+Start_Date+"&ED="+End_Date); 
    }
</script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>