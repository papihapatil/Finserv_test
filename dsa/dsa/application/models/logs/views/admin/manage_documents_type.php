
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
            	          	
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 margin-top-15">
				<a style="margin-left: 9px; background-color: #25a6c6;margin :2px;padding:6px;" href="<?php echo base_url()?>index.php/admin/new_doc_type?type=customer"  class="btn btn-info" style="background-color: #25a6c6;">Add New Document Type</a>
          	</div>
			  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="screen-title" style="margin-bottom:10px;">
                    	
                    </div>                    
                </div>  
            </div>
        </div>
		<hr>
</div>

<?php foreach($documents as $row){?>
	
	<div class="row justify-content-center">
		
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-xl-2.5 col-lg-2.5 col-md-2.5 col-sm-2.5 col-2.5 align-self-center">
				    
				    <i class="fa fa-file rounded" style="margin: 15px; font-size: 16px;"></i>	
				    </div>
				    <div class="col-xl-9 col-lg-8.5 col-md-8.5 col-sm-8.5 col-8"  style="margin-left: 10px; margin-top: 5px; margin-bottom: 5px;">
				      <div class="card-bg">
				        Document Name : <b><?php echo $row->DOC_NAME;  ?></b>
				        <br><small>Mandatory: <?php echo $row->DOC_MANDATORY;?></small>
				        <br>
				        	<small>Document For : 
				        		<?php if($row->DOC_FOR == 1) {echo "CUSTOMER";
				        		} else if($row->DOC_FOR == 2){echo "DSA";
				        		}else echo "CUSTOMER, DSA";?>				        		
				        	</small>

						<br><small>Document Type: <?php echo $row->DOC_MASTER_TYPE;?></small>				        
				      </div>
				    </div>
				    <div class="col-xl-0.5 col-lg-0.5 col-md-0.5 col-sm-0.5 col-0.5 align-self-center">
				    	<button data-toggle="modal" data-id = "<?php echo $row->ID;?>" data-target="#deleteModel"><i class="fa fa-trash"></i></button>
				    </div>
				  </div>
				</div>	
				
		</div>	
		
	</div>
<?php } ?>

<!-- Modal -->
	<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" 
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
	                
	                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/admin/delete_doctype" method="POST" id="doctype_delete_form">
	                  <div class="form-group">
	                    <label  class="col-12 control-label padding-10">Are you sure you want to DELETE this document type ?</label>	                    
	                    <input name="id" type="number" class="idform" hidden/>	                        
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
<script src="<?php base_url()?>/dsa/dsa/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php base_url()?>/dsa/dsa/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="<?php echo base_url(); ?>adminn/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>adminn/js/main.js"></script>
<script type="text/javascript">
		$('#deleteModel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var recipient = button.data('id') 
		  var modal = $(this)
		  modal.find('.modal-body .idform').val(recipient)
		})		
	</script>
</body>
</html>	