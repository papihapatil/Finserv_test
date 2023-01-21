 $( "#Cluster_User_For_Ro" ).change(function(e) 
    {
        $("#Cluster_Options_For_Ro").find("option:not(:first)").remove(); 
		var select_category = $('#Cluster_User_For_Ro').val();
		var User_id = $('#User_id').val();
		if(select_category=="self")
		{
			  window.location.replace("/dsa/dsa/index.php/Cluster_Manager/Relationship_Officer");    
		}
		else if(select_category=="Branch_Manager")
		{
			
			 var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getBranchManger"; 
			 $.ajax({
				  type:'POST',
				  url:url,
				   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
				  data:{User_id:User_id},
				  success:function(data){
	  
									  var obj =JSON.parse(data);
						  $.each(obj, function (index, value) {
											  $('#Cluster_Options_For_Ro').append($('<option/>', { 
												  value: value.UNIQUE_CODE,
												  text : value.FN +' '+ value.LN
												}));
											  });      
						
					 
					
				  }
				 });
		  }
    });
	$( "#Cluster_Options_For_Ro" ).change(function() 
    {
		var select_category = $('#Cluster_User_For_Ro').val();
        var User_id = $('#Cluster_Options_For_Ro').val();
		if(select_category=="Branch_Manager")
        {
           $('#display_RO').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/get_RO_user_BM"; 
                  $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                                              var date = new Date(value.CREATED_AT);
                                                                                  var new_date=((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()+' '+ date.getHours()+ ':'+ date.getMinutes();
                                          $('#display_RO').append( 
                                          '<tr>'+
										  ' <td><i class="fa fa-user text-right" style="color:blue;"></i></td>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
                                            '<td>'+value.MOBILE+'</td>'+
                                            (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
                                              '<td>'+new_date+'</td>'+
                                          '</tr>'
                                          );
                                          });      
                    
                 
                
              }
             });			   
         
        }
	});
	/*--------------------------------For Dsa------------------------------------------------------------*/
	$( "#Cluster_User_For_DSA" ).change(function(e) 
    {
        $("#Cluster_Options_For_DSA").find("option:not(:first)").remove(); 
		var select_category = $('#Cluster_User_For_DSA').val();
		var User_id = $('#User_id').val();
		if(select_category=="self")
		{
			  window.location.replace("/dsa/dsa/index.php/Cluster_Manager/dsa");    
		}
		else if(select_category=="Branch_Manager")
		{
			
			 var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getBranchManger"; 
			 $.ajax({
				  type:'POST',
				  url:url,
				   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
				  data:{User_id:User_id},
				  success:function(data){
	  
									  var obj =JSON.parse(data);
						  $.each(obj, function (index, value) {
											  $('#Cluster_Options_For_DSA').append($('<option/>', { 
												  value: value.UNIQUE_CODE,
												  text : value.FN +' '+ value.LN
												}));
											  });      
						
					 
					
				  }
				 });
		}
		else if(select_category=="Relationship_Officer")
		{
			
			 var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getRelationship_Officer"; 
			 $.ajax({
				  type:'POST',
				  url:url,
				   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
				  data:{User_id:User_id},
				  success:function(data){
	  
									  var obj =JSON.parse(data);
						  $.each(obj, function (index, value) {
											  $('#Cluster_Options_For_DSA').append($('<option/>', { 
												  value: value.UNIQUE_CODE,
												  text : value.FN +' '+ value.LN
												}));
											  });      
						
					 
					
				  }
				 });
		}
    });
	$( "#Cluster_Options_For_DSA" ).change(function() 
    {
		var select_category = $('#Cluster_User_For_DSA').val();
        var User_id = $('#Cluster_Options_For_DSA').val();
		if(select_category=="Branch_Manager")
        {
           $('#display_DSA').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/get_DSA_user_BM"; 
                  $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                                              var date = new Date(value.CREATED_AT);
                                                                                  var new_date=((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()+' '+ date.getHours()+ ':'+ date.getMinutes();
                                          $('#display_DSA').append( 
                                          '<tr>'+
										  ' <td><i class="fa fa-user text-right" style="color:blue;"></i></td>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
											
                                            '<td>'+value.MOBILE+'</td>'+
											 '<td>'+value.Location+'</td>'+
                                             (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
											 (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                              '<td>'+new_date+'</td>'+
                                          '</tr>'
                                          );
                                          });      
                    
                 
                
              }
             });			   
         
        }
		else if(select_category=="Relationship_Officer")
        {
           $('#display_DSA').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/get_DSA_user_RO"; 
                  $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                                              var date = new Date(value.CREATED_AT);
                                                                                  var new_date=((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()+' '+ date.getHours()+ ':'+ date.getMinutes();
                                          $('#display_DSA').append( 
                                          '<tr>'+
										  ' <td><i class="fa fa-user text-right" style="color:blue;"></i></td>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
											
                                            '<td>'+value.MOBILE+'</td>'+
											 '<td>'+value.Location+'</td>'+
                                             (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
											 (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                              '<td>'+new_date+'</td>'+
                                          '</tr>'
                                          );
                                          });      
                    
                 
                
              }
             });			   
         
        }
	});
	/*-------------------------------Connector------------------------------------------------------*/
	$( "#Cluster_User_For_Connector" ).change(function(e) 
    {
        $("#Cluster_Options_For_Connector").find("option:not(:first)").remove(); 
		var select_category = $('#Cluster_User_For_Connector').val();
		var User_id = $('#User_id').val();
		if(select_category=="self")
		{
			  window.location.replace("/dsa/dsa/index.php/Cluster_Manager/Connector");    
		}
		else if(select_category=="Branch_Manager")
		{
			
			 var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getBranchManger"; 
			 $.ajax({
				  type:'POST',
				  url:url,
				   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
				  data:{User_id:User_id},
				  success:function(data){
	  
									  var obj =JSON.parse(data);
						  $.each(obj, function (index, value) {
											  $('#Cluster_Options_For_Connector').append($('<option/>', { 
												  value: value.UNIQUE_CODE,
												  text : value.FN +' '+ value.LN
												}));
											  });      
						
					 
					
				  }
				 });
		}
		else if(select_category=="Relationship_Officer")
		{
			
			 var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getRelationship_Officer"; 
			 $.ajax({
				  type:'POST',
				  url:url,
				   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
				  data:{User_id:User_id},
				  success:function(data){
	  
									  var obj =JSON.parse(data);
						  $.each(obj, function (index, value) {
											  $('#Cluster_Options_For_Connector').append($('<option/>', { 
												  value: value.UNIQUE_CODE,
												  text : value.FN +' '+ value.LN
												}));
											  });      
						
					 
					
				  }
				 });
		}
		else if(select_category=="DSA")
		{
			
			 var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getDsa"; 
			 $.ajax({
				  type:'POST',
				  url:url,
				   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
				  data:{User_id:User_id},
				  success:function(data){
	  
									  var obj =JSON.parse(data);
						  $.each(obj, function (index, value) {
											  $('#Cluster_Options_For_Connector').append($('<option/>', { 
												  value: value.UNIQUE_CODE,
												  text : value.FN +' '+ value.LN
												}));
											  });      
						
					 
					
				  }
				 });
		}
    });
	$( "#Cluster_Options_For_Connector" ).change(function() 
    {
	
		var select_category = $('#Cluster_User_For_Connector').val();
        var User_id = $('#Cluster_Options_For_Connector').val();
		if(select_category=="Branch_Manager")
        {
           $('#display_Connector').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/get_Connector_user_BM"; 
                  $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                                              var date = new Date(value.CREATED_AT);
                                                                                  var new_date=((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()+' '+ date.getHours()+ ':'+ date.getMinutes();
                                          $('#display_Connector').append( 
                                          '<tr>'+
										  ' <td><i class="fa fa-user text-right" style="color:blue;"></i></td>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
											
                                            '<td>'+value.MOBILE+'</td>'+
											 (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
											 (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                              '<td>'+new_date+'</td>'+
											  '<td><a href="'+window.location.origin+"/dsa/dsa/index.php/dsa/profile?id="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></td>'+
											 
                                          '</tr>'
                                          );
                                          });      
                    
                 
                
              }
             });			   
         
        }
		else if(select_category=="Relationship_Officer")
        {
           $('#display_Connector').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/get_Connector_user_RO"; 
                  $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                                              var date = new Date(value.CREATED_AT);
                                                                                  var new_date=((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()+' '+ date.getHours()+ ':'+ date.getMinutes();
                                          $('#display_Connector').append( 
                                          '<tr>'+
										  ' <td><i class="fa fa-user text-right" style="color:blue;"></i></td>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
											
                                            '<td>'+value.MOBILE+'</td>'+
											 (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
											 (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                              '<td>'+new_date+'</td>'+
											  '<td><a href="'+window.location.origin+"/dsa/dsa/index.php/dsa/profile?id="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></td>'+
											 
                                          '</tr>'
                                          );
                                          });       
                    
                 
                
              }
             });			   
         
        }
		else if(select_category=="DSA")
        {
           $('#display_Connector').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/get_Connector_user_DSA"; 
                  $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                                              var date = new Date(value.CREATED_AT);
                                                                                  var new_date=((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()+' '+ date.getHours()+ ':'+ date.getMinutes();
                                          $('#display_Connector').append( 
                                          '<tr>'+
										  ' <td><i class="fa fa-user text-right" style="color:blue;"></i></td>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
											
                                            '<td>'+value.MOBILE+'</td>'+
											 (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
											 (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                              '<td>'+new_date+'</td>'+
											  '<td><a href="'+window.location.origin+"/dsa/dsa/index.php/dsa/profile?id="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-eye text-right" style="color:blue;"></i></a></td>'+
											 
                                          '</tr>'
                                          );
                                          });       
                    
                 
                
              }
             });			   
         
        }
	});