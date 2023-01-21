 
 $("#Add_Risk_Dimentions").submit(function(e) 
 {
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	   
	    var Risk_Dimention= $.trim($('#risk_dimention').val());
		
	    var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/Add_Risk_Dimentions";
	    $.ajax({
						type:'POST',
						url:url,
						data:{Risk_Dimention:Risk_Dimention},
						success:function(data)
						{  
						   if(data>0)
						   {     
					            
					            var modal = $('#deleteModel');//The modal which is opened
								modal.find("input").val("");
								$('#deleteModel').modal('toggle');
							    swal("success!", "Risk Dimentions Added Sucessfully", "success").then(function() { window.location.replace("/dsa/dsa/index.php/Rule_Engine/Risk_Dimension");});
				                return false;
						   }
						}
		});
		
 });
  $(".add_parameter ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   var datarisk=$(this).attr("data-risk_dimention");
		   $("#risk_name").html(datarisk);
		   $("#risk_id").val(dataId);
		   
       
    });
	$(".remove_risk ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   var datarisk=$(this).attr("data-risk_dimention");
		   $("#risk_dimention_remove").html(datarisk);
		   $("#risk_dimention_remove_id").val(dataId);
		   
		   
       
    });
	$(".add_criteria ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   var datarisk=$(this).attr("data-risk_dimention");
		   $("#risk_name").html(datarisk);
		   $("#parameter_id").val(dataId);
		 
		
		   
       
    });
	
	$(".edit_weight ").on("click", function(){
           var dataId = $(this).attr("data-id");
		   var Weights=$(this).attr("data-Weights");
		   var datarisk=$(this).attr("data-risk_dimention");
		   var Parameter=$(this).attr("data-paramete_weight");
		     
		   $("#risk_name_weight").html(datarisk);
		   $("#parameter_weight").html(Parameter);
		   //$("#Weights_save").text(Weights);
		    $("#Weights_save").val(Weights);
		   $("#P_ID").val(dataId);
		 
		
		   
       
    });
	$(".remove_parameter ").on("click", function()
	{
           var dataId = $(this).attr("data-id");
		   var parameter_remove=$(this).attr("data-paramete");
		 
		   $("#P_ID").val(dataId);
		   $("#parameter_remove").html(parameter_remove)
		
		   
       
    });
	
	$('#criteria_type').on("change",function(){
		 var select_type = $('#criteria_type').val();
		 
		 if(select_type=='Numeric')
		 {
			    $("#text_criteria").css("display", "none");
				$("#numeric_criteria").css("display", "block");
				//$("#criteria_to").prop('required',true);
				$("#criteria_from").prop('required',true);
		 }
		 else if(select_type=='Text')
		 {
			    $("#numeric_criteria").css("display", "none");
				$("#text_criteria").css("display", "block");
				$("#criteria").prop('required',true);
		 }
	});
	
	
$("#Add_Parameters").submit(function(e) 
    {
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	   
	    var Parameter= $.trim($('#parameter').val());
		
		var risk_id=$('#risk_id').val();
		var Weights=$('#Weights').val();
	    var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/Add_Parameters";
	    $.ajax({
						type:'POST',
						url:url,
						data:{risk_id:risk_id,Parameter:Parameter,Weights:Weights},
						success:function(data)
						{  
						   if(data>0)
						   {     
					            
					            var modal = $('#Add_parameter');//The modal which is opened
								modal.find("input").val("");
								$('#Add_parameter').modal('toggle');
							    swal("success!", "Parameter Added Sucessfully", "success").then(function() { window.location.replace("/dsa/dsa/index.php/Rule_Engine/Risk_Dimension");});
				                return false;
						   }
						}
		});
		
    });
	$("#Add_Criteria_Form").submit(function(e) 
    {
		
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	   
	    var P_ID= $('#parameter_id').val();
		var criteria_from= $('#criteria_from').val();
		var criteria_to= $('#criteria_to').val();
		var criteria= $('#criteria').val();
		var criteria_type=$.trim($('#criteria_type').val());
		var Score=$('#score').val();
	    var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/Add_Criteria";
	    $.ajax({
						type:'POST',
						url:url,
						data:{criteria_from:criteria_from,criteria_to:criteria_to,criteria:criteria,criteria_type:criteria_type,Score:Score,P_ID:P_ID},
						success:function(data)
						{  
						   if(data>0)
						   {     
					            
					            var modal = $('#Add_Criteria');//The modal which is opened
								modal.find("input").val("");
								$('#Add_Criteria').modal('toggle');
							    swal("success!", "Criteria Added Sucessfully", "success").then(function() { window.location.replace("/dsa/dsa/index.php/Rule_Engine/Criteria");});
				                return false;
						   }
						}
		});
		
    });
	
	$("#edit_weight_form").submit(function(e) 
    {
	   e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	   
	    var P_ID= $('#P_ID').val();
		var Weights_save= $('#Weights_save').val();
	    var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/Update_Weights";
	    $.ajax({
						type:'POST',
						url:url,
						data:{P_ID:P_ID,Weights_save:Weights_save},
						success:function(data)
						{  
						   if(data>0)
						   {     
					            
					            
							    swal("success!", "Weights Updated Sucessfully", "success").then(function() { window.location.replace("/dsa/dsa/index.php/Rule_Engine/Risk_Dimension");});
				                return false;
						   }
						}
		});
		
    });
	
	$("#remove_parameter_form").submit(function(e) 
    {
	   
	    e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	    var P_ID= $('#P_ID').val();
		
	    var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/Remove_Parameter";
	    $.ajax({
						type:'POST',
						url:url,
						data:{P_ID:P_ID},
						success:function(data)
						{  
						   
						   if(data>0)
						   {     
					            
					            
							    swal("success!", "Parameter Removed Sucessfully", "success").then(function() { window.location.replace("/dsa/dsa/index.php/Rule_Engine/Risk_Dimension");});
				                return false;
						   }
						}
		});
		
    });
	$("#remove_risk_dimention_form").submit(function(e) 
    {
	   
	    e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	    var RD_ID= $('#risk_dimention_remove_id').val();
		
		
	    var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/Remove_Risk_Dimention";
	    $.ajax({
						type:'POST',
						url:url,
						data:{RD_ID:RD_ID},
						success:function(data)
						{  
						   
						   if(data>0)
						   {     
					            
					            
							    swal("success!", "Risk Dimention Removed Sucessfully", "success").then(function() { window.location.replace("/dsa/dsa/index.php/Rule_Engine/Risk_Dimension");});
				                return false;
						   }
						}
		});
		
    });
	$("#remove_criteria_form").submit(function(e) 
    {
	   
	    e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
	    var CR_ID= $('#Criteria_remove_id').val();
		
		
	    var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/Remove_criteria";
	    $.ajax({
						type:'POST',
						url:url,
						data:{CR_ID:CR_ID},
						success:function(data)
						{  
						   
						   if(data>0)
						   {     
					            
					            
							    swal("success!", "Criteria Removed Sucessfully", "success").then(function() { window.location.replace("/dsa/dsa/index.php/Rule_Engine/Criteria");});
				                return false;
						   }
						}
		});
		
    });
	function display_criteria(e)
	{

		var id=(e.id);
		var dataId = $(e).attr("data-id");
		var dataparameter=$(e).attr("data-parameter");
		
		
		
		
		        
				//$('#Criteria_'+dataId).toggle();
		var url = window.location.origin+"/dsa/dsa/index.php/Rule_Engine/get_criteria";
		$.ajax({
						type:'POST',
						url:url,
						data:{P_ID:id},
						success:function(data)
						{ 
						$('#Criteria_'+dataId).html('');
						 var obj =JSON.parse(data);
						 var i=1;
						 if(obj.length==0)
						 {
							 //$('#Criteria_'+dataId).append('<div> No Criteria Found </div>')
							 $('#Criteria_'+dataId).html('<div> No Criteria Found </div>')
						 }
						 else
						 {
							 
						   $.each(obj, function (index, value) 
								{
									if(value.Type=='Numeric')
									{
										if(i==1)
										{
											$('#Criteria_'+dataId).append
											(   '<div><b>'+dataparameter+'</b></div>'+
											   '<table id="criteria_first_'+id+'" Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
											       '<tr Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
												        '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">Sr no</td>'+
														'<td Style=" border: 1px solid #ddd; border-collapse: collapse;">Criteria</td>'+
														'<td Style=" border: 1px solid #ddd; border-collapse: collapse;">Score</td>'+
														'<td>Action</td>'+
													'</tr>'+
													'<tr>'+
													    '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+i+'</td>'+
														'<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Criteria_From + ' To ' + value.Criteria_To+'</td>'+
														'<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Score+'</td>'+
														'<td onclick="Remove_criteria(this)" id="'+value.CR_ID+'" data-toggle="modal" data-target="#Remove_Criteria"><i class="fa fa-trash-o" aria-hidden="true" Style="font-size:20px; color:red;"></i></td>'+
													'</tr>'+
												'</table>' 
											);
										}
										else 
										{
										    $('#criteria_first_'+id).append
											(
											    '<tr Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+i+'</td>'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Criteria_From + ' To ' + value.Criteria_To+'</td>'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Score+'</td>'+
												   '<td onclick="Remove_criteria(this)" id="'+value.CR_ID+'" data-toggle="modal" data-target="#Remove_Criteria"><i class="fa fa-trash-o" aria-hidden="true" Style="font-size:20px; color:red;"></i></td>'+
												'</tr>' 
											);
										}
										i++;
									}
									if(value.Type=='Text')
									{
										if(i==1)
										{
											$('#Criteria_'+dataId).append
											(
											   '<div><b>'+dataparameter+'</b></div>'+
											   '<table id="criteria_first_'+id+'" Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
											   '<tr Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">Sr no</td>'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">Criteria</td>'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">Score</td>'+
												   '<td>Action</td>'+
												   '</tr>'+
											   '<tr>'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+i+'</td>'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Criteria+'</td>'+
												   '<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Score+'</td>'+
												   '<td onclick="Remove_criteria(this)" id="'+value.CR_ID+'" data-toggle="modal" data-target="#Remove_Criteria"><i class="fa fa-trash-o" aria-hidden="true" Style="font-size:20px; color:red;"></i></td>'+
												   '</tr>'+
											   '</table>' 
											);
										}
										else {
										     $('#criteria_first_'+id).append
											 (
											    '<tr Style=" border: 1px solid #ddd; border-collapse: collapse;">'+
												'<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+i+'</td>'+
												'<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Criteria+'</td>'+
												'<td Style=" border: 1px solid #ddd; border-collapse: collapse;">'+value.Score+'</td>'+
												'<td onclick="Remove_criteria(this)" id="'+value.CR_ID+'" data-toggle="modal" data-target="#Remove_Criteria"><i class="fa fa-trash-o" aria-hidden="true" Style="font-size:20px; color:red;"></i></td>'+
												'</tr>' 
											 );
										}
										i++;
									}
								});
						 }
								
						}
		});
	}
	function Remove_criteria(e)
	{
		
		 $("#Criteria_remove_id").val(e.id);
	}