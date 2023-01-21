if ($('.dropdown-menu a.dropdown-toggle').length) {

  $(".dropdown-menu a.dropdown-toggle").on("click", function(e) {
      if (
          !$(this)
          .next()
          .hasClass("show")
      ) {
          $(this)
              .parents(".dropdown-menu")
              .first()
              .find(".show")
              .removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass("show");
  
      $(this)
          .parents("li.nav-item.dropdown.show")
          .on("hidden.bs.dropdown", function(e) {
              $(".dropdown-submenu .show").removeClass("show");
          });
  
      return false;
  });
  
  }
  // accordion js
  
  if ($('.collapse').length) {
  
      $('.collapse').on('shown.bs.collapse', function() {
          $(this).parent().find(".fa-plus-circle").removeClass("fa-plus-circle").addClass("fa-minus-circle");
      }).on('hidden.bs.collapse', function() {
          $(this).parent().find(".fa-minus-circle").removeClass("fa-minus-circle").addClass("fa-plus-circle");
      });
  
      $('.card-header a').click(function() {
          $('.card-header').removeClass('active');
  
          //If the panel was open and would be closed by this click, do not active it
          if (!$(this).closest('.card').find('.collapse').hasClass('in'))
              $(this).parents('.card-header').addClass('active');
      });
  
  }
  
  // Slider Ranger
  
  if ($('#slider-range-min , #slider-range-max').length) {
      $(function() {
          $("#slider-range-min").slider({
              range: "min",
              value: 3000,
              min: 1000,
              max: 5000,
              slide: function(event, ui) {
                  $("#amount").val("$" + ui.value);
              }
          });
          $("#amount").val("$" + $("#slider-range-min").slider("value"));
      });
      $(function() {
          $("#slider-range-max").slider({
              range: "min",
              min: 1,
              max: 10,
              value: 2,
  
              slide: function(event, ui) {
                  $("#j").val(ui.value);
              }
          });
          $("#j").val($("#slider-range-max").slider("value"));
      });
  }
  
  
  
  
  
  // header collapse
  
  if ($('.header-transparent').length) {
      $(window).scroll(function() {
          if ($(".header-transparent").offset().top > 50) {
              $(".navbar-fixed-top").addClass("top-nav-collapse");
          } else {
              $(".navbar-fixed-top").removeClass("top-nav-collapse");
          }
      });
  }
  
  
  
  // counter
  if ($('.counter').length) {
      $('.counter').each(function() {
          var $this = $(this),
              countTo = $this.attr('data-count');
  
          $({ countNum: $this.text() }).animate({
                  countNum: countTo
              },
  
              {
                  duration: 10000,
                  easing: 'linear',
                  step: function() {
                      $this.text(Math.floor(this.countNum));
                  },
                  complete: function() {
                      $this.text(this.countNum);
                      //alert('finished');
                  }
  
              });
      });
  
  }
  
  // post fallery
  
  if ($('#post-gallery , .slider , .service ').length) {
  
      $("#post-gallery").owlCarousel({
  
          navigation: false, // Show next and prev buttons
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true,
          pagination: false,
          autoPlay: true
  
      });
  
  
      $(".slider").owlCarousel({
          navigation: true, // Show next and prev buttons
          slideSpeed: 3000,
          paginationSpeed: 400,
          singleItem: true,
          pagination: true,
          autoPlay: true,
          navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
          addClassActive: true,
  
      });
  
      $(".service").owlCarousel({
  
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          navigation: true, // Show next and prev buttons
          navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
          items: 3,
          itemsDesktop: [1199, 3],
          itemsDesktopSmall: [979, 3],
          pagination: false
  
      });
  
  }
  
  
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
  }, 5000);
  
  /*window.setTimeout(function() {
     $("#nonsalaried_view").hide();
  }, 1000);*/
  
  
  function alertMe(){
      swal ( "Oops" ,  "Something went wrong!" ,  "success" )
  }
  
  function setSalaried(){
      $(document).ready(function(){
         $("#salaried_view").show();
         $("#nonsalaried_view").hide();
     });
  }
  
  function setNoSalaried(){
      $(document).ready(function(){
         $("#salaried_view").hide();
         $("#nonsalaried_view").show();
     });
  }
  
  $(document).ready(function(){
  
        $( window ).load(function() {
          
              setTimeout(function () {
                var profession = $("input[name='user_profession']:checked").val();
                if (profession == 'Business Man') {              
                $('#business_man_layout_2').show();
                $('#business_man_layout').show(); 
                $('#regi_no_layout').hide();
              
                /*$("#business_income_1").attr('required','required');  
                $("#business_income_2").attr('required','required');  
                $("#business_income_3").attr('required','required');  
                $("#business_income_4").attr('required','required');  
                $("#business_income_5").attr('required','required');  
                $("#business_income_6").attr('required','required');  
                $("#business_income_7").attr('required','required');  
                $("#business_income_8").attr('required','required');  
                $("#business_income_9").attr('required','required');  
                $("#business_income_10").attr('required','required');  
                $("#business_income_11").attr('required','required');  
                $("#business_income_12").attr('required','required');  
                $("#business_income_13").attr('required','required');  
                $("#business_income_14").attr('required','required');  
                $("#business_income_15").attr('required','required');  */
              }else {
                  $('#business_man_layout_2').show();
                  $('#business_man_layout').hide(); 
                  $("#business_income_1").removeAttr("required");              
                  $("#business_income_2").removeAttr("required");              
                  $("#business_income_3").removeAttr("required");              
                  $("#business_income_4").removeAttr("required");              
                  $("#business_income_5").removeAttr("required");              
                  $("#business_income_6").removeAttr("required");              
                  $("#business_income_7").removeAttr("required");              
                  $("#business_income_8").removeAttr("required");              
                  $("#business_income_9").removeAttr("required");              
                  $("#business_income_10").removeAttr("required");              
                  $("#business_income_11").removeAttr("required");              
                  $("#business_income_12").removeAttr("required");              
                  $("#business_income_13").removeAttr("required");              
                  $("#business_income_14").removeAttr("required");              
                  $("#business_income_15").removeAttr("required");              
              }
          }, 2000);
        
        });
        $("#resi_pincode").bind("change paste keyup", function() {
  
           if($(this).val()!=''){
            if($(this).val().length == 6){
              var pincode_s = $(this).val();
              if(window.location.host.includes("http"))url = window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";
              else url = window.location.protocol+"//"+window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";            
              $.ajax({
                 type: "POST",
                 url: url,
                 data: '{ "pincode": "'+pincode_s+'"}',
                 contentType: "application/json; charset=UTF-8",
                 success: function (response) {
                    if(response!=''){
                      var data = JSON.parse(response);
                      if(data.data){
                        if(data.data.hasOwnProperty("statename")){
                          $('#resi_state').val(data.data.statename);
                          $('#resi_district').val(data.data.Districtname);
                          $('#resi_state_view').val(data.data.statename);
                          $('#resi_district_view').val(data.data.Districtname);
                          $('#resi_city').val(data.data.City);  
                        }else {
                          $('#resi_state').val("");
                          $('#resi_district').val("");
                          $('#resi_state_view').val("");
                          $('#resi_district_view').val("");
                          $('#resi_city').val("");
                        }                      
                      }else {
                        $('#resi_state').val("");
                        $('#resi_district').val("");
                        $('#resi_state_view').val("");
                        $('#resi_district_view').val("");
                        $('#resi_city').val("");
                      }                    
                    }
                 }
               });
            }
          }
        });
  
  
        $("#salaried_org_pin").bind("change paste keyup", function() {
  
           if($(this).val()!=''){
            if($(this).val().length == 6){
              var pincode_s = $(this).val();
              if(window.location.host.includes("http"))url = window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";
              else url = window.location.protocol+"//"+window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";            
              $.ajax({
                 type: "POST",
                 url: url,
                 data: '{ "pincode": "'+pincode_s+'"}',
                 contentType: "application/json; charset=UTF-8",
                 success: function (response) {
                    if(response!=''){
                      var data = JSON.parse(response);
                      if(data.data){
                        if(data.data.hasOwnProperty("statename")){
                          $('#resi_state').val(data.data.statename);
                          $('#resi_district').val(data.data.Districtname);
                          $('#resi_state_view').val(data.data.statename);
                          $('#resi_district_view').val(data.data.Districtname);
                          $('#resi_city').val(data.data.City);  
                        }else {
                          $('#resi_state').val("");
                          $('#resi_district').val("");
                          $('#resi_state_view').val("");
                          $('#resi_district_view').val("");
                          $('#resi_city').val("");
                        }                      
                      }else {
                        $('#resi_state').val("");
                        $('#resi_district').val("");
                        $('#resi_state_view').val("");
                        $('#resi_district_view').val("");
                        $('#resi_city').val("");
                      }                    
                    }
                 }
               });
            }
          }
        });
  
  
        $("#per_pincode").bind("change paste keyup", function() {
  
           if($(this).val()!=''){
            if($(this).val().length == 6){
              var pincode_s = $(this).val();
              if(window.location.host.includes("http"))url = window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";
              else url = window.location.protocol+"//"+window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";            
              $.ajax({
                 type: "POST",
                 url: url,
                 data: '{ "pincode": "'+pincode_s+'"}',
                 contentType: "application/json; charset=UTF-8",
                 success: function (response) {
                    if(response!=''){
                      var data = JSON.parse(response);
                      if(data.data){
                        if(data.data.hasOwnProperty("statename")){
                          $('#per_state').val(data.data.statename);
                          $('#per_district').val(data.data.Districtname);
                          $('#per_state_view').val(data.data.statename);
                          $('#per_district_view').val(data.data.Districtname);
                          $('#per_city').val(data.data.City);  
                        }else {
                          $('#per_state').val("");
                          $('#per_district').val("");
                          $('#per_state_view').val("");
                          $('#per_district_view').val("");
                          $('#per_city').val("");
                        }                      
                      }else {
                        $('#per_state').val("");
                        $('#per_district').val("");
                        $('#per_state_view').val("");
                        $('#per_district_view').val("");
                        $('#per_city').val("");
                      }                    
                    }
                 }
               });
            }
          }
        });
  
  
       /* $("#file-upload").change(function(e){
              if(e){
                $('#txt_doc_selected').html('Document selected');
                $('#txt_doc_selected').css('color', 'teal');
              }else {
                $('#txt_doc_selected').html('No document fsdf selected');
                $('#txt_doc_selected').css('color', 'black');
              }
       });     */ 
  
  
        $('input[type=radio][name=user_profession]').change(function() {
            if (this.value == 'Business Man') {
              $('#regi_no_layout').hide();
              $('#business_man_layout').show(); 
              /*$("#business_income_1").attr('required','required');  
              $("#business_income_2").attr('required','required');  
              $("#business_income_3").attr('required','required');  
              $("#business_income_4").attr('required','required');  
              $("#business_income_5").attr('required','required');  
              $("#business_income_6").attr('required','required');  
              $("#business_income_7").attr('required','required');  
              $("#business_income_8").attr('required','required');  
              $("#business_income_9").attr('required','required');  
              $("#business_income_10").attr('required','required');  
              $("#business_income_11").attr('required','required');  
              $("#business_income_12").attr('required','required');  
              $("#business_income_13").attr('required','required');  
              $("#business_income_14").attr('required','required');  
              $("#business_income_15").attr('required','required'); */ 
            }else {
                $('#regi_no_layout').show();
                $('#business_man_layout').hide(); 
                $("#business_income_1").removeAttr("required");              
                $("#business_income_2").removeAttr("required");              
                $("#business_income_3").removeAttr("required");              
                $("#business_income_4").removeAttr("required");              
                $("#business_income_5").removeAttr("required");              
                $("#business_income_6").removeAttr("required");              
                $("#business_income_7").removeAttr("required");              
                $("#business_income_8").removeAttr("required");              
                $("#business_income_9").removeAttr("required");              
                $("#business_income_10").removeAttr("required");              
                $("#business_income_11").removeAttr("required");              
                $("#business_income_12").removeAttr("required");              
                $("#business_income_13").removeAttr("required");              
                $("#business_income_14").removeAttr("required");              
                $("#business_income_15").removeAttr("required");              
            }
        });

        $('input[type=radio][name=work_under]').change(function() {
          if (this.value == 'Yes') {
            $('#layout_corporate_dsa').show();   
          }else {
            $('#layout_corporate_dsa').hide();           
          }
      });

      $('input[type=radio][name=rdo_fees]').change(function() {
        if (this.value == 'Yes') {
          $('#layout_fees_dsa').show();   
        }else {
          $('#layout_fees_dsa').hide();           
        }
    });
  
        $('input[type=radio][name=loan_on_property]').change(function() {
            if (this.value == 'Yes') {
              $('#bank_layout').show(); 
                var clone = "<div class='bl_row' id='line_1'>"+
                          "<select style='width: 17%;' class='other-income-select bank-name' id='bl' name='bl[]'>"+
                           "     <option id='1_1' value=''>Select Bank</option>"+
                            "      <option id='2_1'>State Bank of India</option>"+
                             "     <option id='3_1' >Axis Bank</option>"+
                              "    <option id='4_1' >HDFC Bank</option>"+
                               "   <option id='5_1' >ICICI Bank</option>"+
                                "  <option id='6_1' >Bank of Baroda</option>"+
                                 " <option id='7_1' >Union Bank of India</option>"+
                                  "<option id='8_1' >IDBI Bank</option>"+
                                  "<option id='9_1' >Canara Bank</option>"+
                                  "<option id='10_1' >Punjab National Bank</option>"+
                                  "<option id='11_1' >UCO Bank</option>"+
                                  "<option id='12_1' >Other</option>"+
                              "</select>"+
                              "<input placeholder='Loan Amount' class='other-income-select bank-loan-amount' type='number' name='emis_loan_amount' style='width: 17%; margin-left:5px;' >"+
                              "<input placeholder='Loan End Date' class='other-income-select loan-end-date' type='date' name='loan_end_date' style='width: 17%; margin-left:4px;' >"+
                              "<input placeholder='EMI' class='other-income-select bank-emi-data' type='number' name='bank_emi_data' style='width: 17%;margin-left:3px;' >"+                 
                              "<input class='bl_remove other-income-select' type='button' value='DELETE' style='width: 8%; color: red; margin-left:4px;' >"+
                      "</div>";
              $("#blS_row").append(clone);                        
            }else {
                $('#bank_layout').hide();  
                $('#blS_row').empty(); 
            }
        });
  
        $('input[type=radio][name=sole_owner]').change(function() {
            if (this.value == 'Yes') {
              $('#share_prop').prop('disabled', false);
            }else {
                $('#share_prop').prop('disabled', true);
            }
        });
  
         $('.past_employee').hide();
         $('#other_profession_layout').hide();
  
         $("#add_more").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = $(".faculty_row").eq(0).clone();
            $(".other_income_wrapper").append(clone);
        });
  
        $("#add_more_emis").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<div class='emis_row' id='line_1'>"+
                        "<select style='margin-right:4px;width: 17%;' class='other-income-select  emis-select-data' id='emis' name='emi[]'>"+
                          "<option id='1_1' value=''>Select Loan Type</option>"+
                           " <option id='2_1' value='Personal Loan'>Personal Loan</option>"+
                           " <option id='3_1' value='Business Loan'>Business Loan</option>"+
                           " <option id='4_1' value='Home Loan'>Home Loan</option>"+
                           " <option id='5_1' value='Plot Loan'>Plot Loan</option>"+
                           " <option id='6_1' value='Car Loan'>Car Loan</option>"+
                           " <option id='7_1' value='Other'>Other</option>"+
                        "</select>"+
                        "<input placeholder='Loan Amount' class='other-income-select emis-loan-data' type='number' name='emis_loan_amount' style='margin-right:4px; width: 17%;'>"+
                        "<input placeholder='Outstanding Loan' class='other-income-select emis-outstanding-data' type='number' name='emis_outstanding_amount' style='margin-right:4px; width: 17%;'>"+
                        "<input placeholder='EMI' class='other-income-select emis-emi-data' type='number' name='emis_emi_amount' style='margin-right:4px; width: 17%;'>"+
                        "<input placeholder='Balance From' class='other-income-select emis-bal_from-data' type='number' name='emis_bal_from_amount' style='margin-right:4px; width: 17%;'>"+
                        "<input class='emis_remove other-income-select' type='button' value='DELETE' style='width: 8%; color: red;'>"+
                    "</div>";
            $("#emisS_row").append(clone);
        });  
  
        $('#emisS_row').on('click', '.emis_remove', function() {
         $(this).closest(".emis_row").remove();
         //alert("hi");
        }); 
  
  
        $("#add_more_bank").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<div class='bank_row' id='line_1'>"+
                        "<input required placeholder='Bank Acc Name' class='other-income-select emis-loan-data' type='text' maxlength='20' oninput='maxLengthCheck(this)' name='bank_acc_name' style='width: 17%;' >"+
                        "<select required style='width: 17%; margin-left:4px' class='other-income-select emis-select-data' id='acc_type' name='acc_type[]'>"+
                         " <option id='1_1' value=''>Account Type</option>"+
                          "  <option id='2_1'>Current</option>"+
                           " <option id='3_1' >Saving</option>"+
                        "</select>                           "+
                        "<input required placeholder='Acc for no of years' class='other-income-select emis-outstanding-data' type='number' name='acc_years' style='width: 17%;'  maxlength='2' oninput='maxLengthCheck(this)'>"+
                        "<input required placeholder='IFSC code' class='other-income-select emis-emi-data' type='text' name='ifsc_code' style='width: 17%; margin-left:4px' maxlength='8' oninput='maxLengthCheck(this)' onkeydown='upperCaseF(this)'>"+
                        "<input required placeholder='Account Number' class='other-income-select emis-bal_from-data' type='number' name='acc_no' style='width: 17%; margin-left:4px' >"+
                        "<input class='bank_remove other-income-select' type='button' value='DELETE' style='width: 8%; margin-left:4px; color: red;' >"+
                    "</div>";
            $("#bankS_row").append(clone);
        });  
		
		 
  
        $('#bankS_row').on('click', '.bank_remove', function() {
         $(this).closest(".bank_row").remove();
         //alert("hi");
        }); 
  
  
        $("#add_more_bl").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<div class='bl_row' id='line_1'>"+
                        "<select style='width: 17%;' class='other-income-select bank-name' id='bl' name='bl[]'>"+
                         "     <option id='1_1' value=''>Select Bank</option>"+
                          "      <option id='2_1'>State Bank of India</option>"+
                           "     <option id='3_1' >Axis Bank</option>"+
                            "    <option id='4_1' >HDFC Bank</option>"+
                             "   <option id='5_1' >ICICI Bank</option>"+
                              "  <option id='6_1' >Bank of Baroda</option>"+
                               " <option id='7_1' >Union Bank of India</option>"+
                                "<option id='8_1' >IDBI Bank</option>"+
                                "<option id='9_1' >Canara Bank</option>"+
                                "<option id='10_1' >Punjab National Bank</option>"+
                                "<option id='11_1' >UCO Bank</option>"+
                                "<option id='12_1' >Other</option>"+
                            "</select>"+
                            "<input oninput='maxLengthCheck(this)' maxlength='10' placeholder='Loan Amount' class='other-income-select bank-loan-amount' type='number' name='emis_loan_amount' style='width: 17%; margin-left:5px;' >"+
                            "<input oninput='maxLengthCheck(this)' maxlength='10' placeholder='Loan End Date' class='other-income-select loan-end-date' type='date' name='loan_end_date' style='width: 17%; margin-left:4px;' >"+
                            "<input oninput='maxLengthCheck(this)' maxlength='10' placeholder='EMI' class='other-income-select bank-emi-data' type='number' name='bank_emi_data' style='width: 17%;margin-left:3px;' >"+                 
                            "<input class='bl_remove other-income-select' type='button' value='DELETE' style='width: 8%; color: red; margin-left:4px;' >"+
                    "</div>";
            $("#blS_row").append(clone);
        });  
  
        $('#blS_row').on('click', '.bl_remove', function() {
         $(this).closest(".bl_row").remove();
         //alert("hi");
        }); 
  
  
        $("#add_more_income").click(function(e){
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);         
            var clone = "<div class='income_row' id='line_1'>"+
                        "<select style='margin-right:4px;width: 49%;' class='other-income-select other-income-select-data' id='income' name='salaried_other_income[]'>"+
                          "<option id='1_1' value=''>Select Source</option>"+
                            "<option id='2_1' value='Agriculture Income'>Agriculture Income</option>"+
                            "<option id='3_1' value='Rental / Comission'>Rental / Comission</option>"+
                            "<option id='4_1' value='Business'>Business</option>"+
                            "<option id='5_1' value='Other'>Other</option>"+
                        "</select>"+
                        "<input placeholder='Amount' class='other-income-select other-income-amount-data' type='number' name='income_amount' style='margin-right:4px; width: 30%;'>"+                      
                        "<input class='income_remove other-income-select' type='button' value='DELETE' style='width: 18%; color: red;'>"+
                    "</div>";
            $("#incomeS_row").append(clone);
        });  
  
        $('#incomeS_row').on('click', '.income_remove', function() {
         $(this).closest(".income_row").remove();
         //alert("hi");
        });    
        
        /*var values = {};
        $("#submit").on('click', function(e){
           e.preventDefault ? e.preventDefault() : (e.returnValue = false);
           $.each($("#faculty_wrapper").serializeArray(), function (i, field)       {
           values[field.value] = field.value;
        });*/
  
         $("form input:radio").change(function () {
              if ($(this).val() == "salaried") {
                  $("#salaried_view").show();
                  $("#nonsalaried_view").hide();
              } else if ($(this).val() == "nonsalaried"){
                  $("#salaried_view").hide();
                  $("#nonsalaried_view").show();
              }
          });
  
  
  
  
         $("#cust_form").submit(function(e) {
  
              var is_valid = 0;
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var salaried = $(this).find('input:radio[name=userType]:checked').val() || '';
              var formData = $("#cust_form").serializeArray();
                  console.log(salaried);
              if(salaried == 'nonsalaried'){                    
                  if($('input[name=sba]').val() == ''){                        
                      swal("Oops", "Please enter business address", "error");                        
                      return false;
                  }else if($('input[name=bt]').val() == ''){
                      swal("Oops", "Please enter business type/nature", "error");                        
                      return false;   
                  }else is_valid = 1;
              }else if(salaried == 'salaried'){
                  if($('input[name=designation]').val() == ''){                        
                      swal("Oops", "Please enter Designation", "error");                        
                      return false;
                  }else if($('input[name=ped]').val() == ''){
                      swal("Oops", "Please enter past employment details", "error");                        
                      return false;   
                  }else if($('input[name=ca]').val() == ''){
                      swal("Oops", "Please enter company address", "error");                        
                      return false;   
                  }else if($('input[name=oe]').val() == ''){
                      swal("Oops", "Please enter office email", "error");                        
                      return false;   
                  }else if($('input[name=ocn]').val() == ''){
                      swal("Oops", "Please enter office contact number", "error");                        
                      return false;   
                  }else if($('input[name=cs]').val() == ''){
                      swal("Oops", "Please enter cash salary", "error");                        
                      return false;   
                  }else if($('input[name=gs]').val() == ''){
                      swal("Oops", "Please enter gross salary", "error");                        
                      return false;   
                  }else if($('input[name=bs]').val() == ''){
                      swal("Oops", "Please enter basic salary", "error");                        
                      return false;   
                  }else if($('input[name=ledfs]').val() == ''){
                      swal("Oops", "Please enter loan EMI", "error");                        
                      return false;   
                  }else if($('input[name=sctb]').val() == ''){
                      swal("Oops", "Please enter Salary credits to bank", "error");                        
                      return false;   
                  }else is_valid = 1;
              }
  
              if(is_valid == 1){
                  var form = $(this);
                  var url = form.attr('action');            
                  $.ajax({
                         type: "POST",
                         url: url,
                         data: form.serialize(),
                         success: function (response) {
                              var parsed_data = JSON.parse(response);
                              if(parsed_data.status == 1){                                                                
                                  swal({
                                        title: "SUCCESS",
                                        text: parsed_data.message,
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "OK",
                                        closeOnConfirm: true
                                      }).then(function() {
                                        //window.location = "logout";
                                        window.location.replace("/dsa/dsa/index.php/customer/moreinfo");
                                      });
  
                              }
                              else swal("Oops", parsed_data.message, "error");
                          }
                  });            
              }            
          });
  
      $("#cust_form_1").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    if(parsed_data.user_type == 'CUSTOMER')window.location.replace("/dsa/dsa/index.php/customer");
                                    else if(parsed_data.user_type == 'DSA' || parsed_data.user_type == 'DSA_MANAGER' || parsed_data.user_type == 'DSA_CSR')window.location.replace("/dsa/dsa/index.php/dsa/profile");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });
  
      $("#cust_form_apply_for_loan").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/applied_loans_list");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });  
  
  
                 $("#new_cust_form").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');  
              $("#loader").css("display", "block");          
              $(':input[type="submit"]').prop('disabled', true);
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                        $("#loader").css("display", "none");
                        $(':input[type="submit"]').prop('disabled', false);
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    if(parsed_data.status == 1)
                                      {
                                        if(parsed_data.USER_TYPE == 'branch_manager')
                                        {
                                          window.location.replace("/dsa/dsa/index.php/admin/customers_allusers");
                                        }
                                        else if (parsed_data.USER_TYPE == 'Relationship_Officer')
                                        {
                                          window.location.replace("/dsa/dsa/index.php/admin/customers_allusers");
                                        }
                                        else if (parsed_data.USER_TYPE == 'DSA')
                                        {
                                          window.location.replace("/dsa/dsa/index.php/admin/customers_allusers");
                                        }
										else if (parsed_data.USER_TYPE == 'Cluster_Manager')
                                        {
                                          window.location.replace("/dsa/dsa/index.php/admin/customers_allusers");
                                        }
                                        else
                                        {
                                          window.location.replace("/dsa/dsa/index.php/admin/customers_allusers");
                                        }
                                      }
                                    else if(parsed_data.status == 7)window.location.replace("/dsa/dsa/index.php/dsa/managers");
                                    else if(parsed_data.status == 6)window.location.replace("/dsa/dsa/index.php/dsa/csr");
                                    else if(parsed_data.status == 2)
                                    {
                                      if(parsed_data.USER_TYPE == 'branch_manager')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/dsa_allusers");
                                      }
                                      else if (parsed_data.USER_TYPE == 'Relationship_Officer')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/dsa_allusers");
                                      }
									  else if (parsed_data.USER_TYPE == 'Cluster_Manager')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/Cluster_Manager/dsa");
                                      }
                                     else
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/dsa?s=all");
                                      }
                                    
                                    }
                                    else if(parsed_data.status == 4)
                                    {
                                      if(parsed_data.USER_TYPE == 'branch_manager')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/Connector_alluser");
                                      }
                                      else if (parsed_data.USER_TYPE == 'Relationship_Officer')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/Connector_alluser");
                                      }
                                      else if (parsed_data.USER_TYPE == 'DSA')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/Connector_alluser");
                                      }
									   else if (parsed_data.USER_TYPE == 'Cluster_Manager')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/Cluster_Manager/Connector");
                                      }
                                     else
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/Connector");
                                      }
                                    
                                    }
                                    else if(parsed_data.status == 3)
                                    {
                                      
                                        window.location.replace("/dsa/dsa/index.php/admin/Operations_user?s=all");
                                      
                                    
                                    }
                                    else if(parsed_data.status == 8)
                                    {
                                      
                                        window.location.replace("/dsa/dsa/index.php/admin/credit_manager_user?s=all");
                                      
                                    
                                    }
                                    else if(parsed_data.status == 9)
                                    {
                                      
                                        window.location.replace("/dsa/dsa/index.php/admin/HR");
                                      
                                    
                                    }
                                    
                                    else if(parsed_data.status == 13)
                                    {
                                       if (parsed_data.USER_TYPE == 'Cluster_Manager')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/Cluster_Manager/branch_manager");
                                      }
									  else
									  {
                                        window.location.replace("/dsa/dsa/index.php/admin/branch_manager");
                                      }
                                    
                                    }
                                    else if(parsed_data.status == 14)
                                    {
                                      
                                      if(parsed_data.USER_TYPE == 'branch_manager')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/Relationship_Officer");
                                      }
                                       if(parsed_data.USER_TYPE == 'Cluster_Manager')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/Cluster_Manager/Relationship_Officer");
                                      }
                                    
                                    }
									 else if(parsed_data.status == 15)
                                    {
                                      
                                      if(parsed_data.USER_TYPE == 'ADMIN')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/Cluster_Manager");
                                      }
                                      
                                    
                                    }
									 else if(parsed_data.status == 16)
                                    {
                                      
                                      if(parsed_data.USER_TYPE == 'ADMIN')
                                      {
                                        window.location.replace("/dsa/dsa/index.php/admin/Area_Manager");
                                      }
                                      
                                    
                                    }
                                   
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });
          
		  
          $("#customer_otp_login").submit(function(e) {
              
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            
            var form = $(this);
            var url = form.attr('action'); 
            var dataArr = form.serialize();  
            if($('#email').val() == ''){
              swal("Oops", "Please enter either mobile number or email id", "error");                        
              return;
            }


            $isChecked = $('#logintype').is(':checked');
            if(!$isChecked){
              if(!validateEmail($('#email').val())){
                swal("Oops", "Please enter valid email id", "error");                        
                $('#email').focus();
                return;
              }
              dataArr = dataArr+"&type=email"; 
            }

            var mob = /^[1-9]{1}[0-9]{9}$/;
            if($isChecked){
              if (mob.test($('#email').val()) == false) {
                swal("Oops", "Please enter valid mobile number", "error");  
                $('#mobile').focus();                      
                return; 
              }
              dataArr = dataArr+"&type=mobile"; 
            }   

            $("#loader").css("display", "block");          
            $(':input[type="submit"]').prop('disabled', true);
            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                      $("#loader").css("display", "none");
                      $(':input[type="submit"]').prop('disabled', false);
                        var parsed_data = JSON.parse(response);
                        if(parsed_data.status >0){                                                                
                            swal({
                                  title: "SUCCESS",
                                  text: parsed_data.message,
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#DD6B55",
                                  confirmButtonText: "OK",
                                  closeOnConfirm: true
                                }).then(function() {
                                  window.location.replace(parsed_data.path);
                                });

                        }
                        else swal("Oops", parsed_data.message, "error");
                    }
            });                
        });
  
        $("#customer_score_update_user_details_js").submit(function(e) {
              
          e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
          
          var form = $(this);
          var url = form.attr('action'); 
          var dataArr = form.serialize();  
          if($('#email').val() == ''){
            swal("Oops", "Please enter either mobile number or email id", "error");                        
            return;
          }

          var mob = /^[1-9]{1}[0-9]{9}$/;
          if (mob.test($('#mobile').val()) == false) {
            swal("Oops", "Please enter valid mobile number", "error");  
            $('#mobile').focus();                      
            return; 
          }   

          $("#loader").css("display", "block");          
          $(':input[type="submit"]').prop('disabled', true);
          $.ajax({
                 type: "POST",
                 url: url,
                 data: dataArr,
                 success: function (response) {
                    $("#loader").css("display", "none");
                    $(':input[type="submit"]').prop('disabled', false);
                      var parsed_data = JSON.parse(response);
                      if(parsed_data.status >0){                                                                
                          swal({
                                title: "SUCCESS",
                                text: parsed_data.message,
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                              }).then(function() {
                                window.location.replace("/dsa/dsa/index.php/customer/customer_apply_for_loan?UID="+ parsed_data.UID);
                              });

                      }
                      else swal("Oops", parsed_data.message, "error");
                  }
          });                
      });

          $("#comission_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/dsa/loans");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
  
          $("#doc_delete_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
						 
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+parsed_data.UID);
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
		   $("#doc_delete_dsa_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/dsa_documents_upload");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
		   $("#homeloan_doc_delete_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/home_loan_doc?UID="+parsed_data.UID);
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
		    $("#lap_doc_delete_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/lap_loan_doc?UID="+parsed_data.UID);
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
          
          $("#doc_delete_form_coapp").submit(function(e) {
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action'); 
            //alert($('input[name=id]').val());
            $.ajax({
                   type: "POST",
                   url: url,
                   data: form.serialize(),
                   success: function (response) {
                        var parsed_data = JSON.parse(response);
                        if(parsed_data.status == 1){                                                                
                            swal({
                                  title: "SUCCESS",
                                  text: parsed_data.message,
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#DD6B55",
                                  confirmButtonText: "OK",
                                  closeOnConfirm: true
                                }).then(function() {
                                  window.location.replace(parsed_data.path);
                                });

                        }
                        else swal("Oops", parsed_data.message, "error");                        
                    }
            }); 
        });
  
          $(function() {
            $('.pop').on('click', function() {
              $('.imagepreview').attr('src', $(this).find('img').attr('src'));
              $('#imagemodal').modal('show');   
            });   
        });
  
          $("#new_bank_form").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/dsa/banks");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          }); 
  
  
          $("#new_doctype_form").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/manage_documents_type");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          }); 
  
          $("#doctype_delete_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/manage_documents_type");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
  
          $("#new_admin_bank_form").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/manage_banks");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });
		    $("#new_loan_type_form").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/Loan_types");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });
		   $("#credt_buerau").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/dashboard");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });
		  $("#credt_buerau_chances").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/dashboard");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });
		   $("#refund_money").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/refund_money");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });
  
  
          $("#admin_bank_delete_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/manage_banks");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
		   $("#admin_loan_type_delete_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/Loan_types");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
  
          $("#dsa_bank_delete_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/dsa/banks");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
  
          $("#strategic_partner_add").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/dsa?s=all");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
  
          $("#strategic_partner_remove").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/dsa?s=all");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
  
          $("select.state").change(function(e){
            var selectedCountry = $(".state option:selected").val();
              var url = window.location.origin+"/dsa/dsa/index.php/admin/load_district?name=resi_district&req=true";             
              //alert(url);
              $.ajax({
                     type: "POST",
                     url: url,
                     data: { country : selectedCountry }, 
                     success: function (response) {    
                     //alert(response);                
                       $("#district_response").html(response);
                      }
              });           
          });
  
  
          $("#district_div").on('change','select',function () {           
            var selectedState = $(".resi_district option:selected").val();
            var selectedCountry = $(".state option:selected").val();          
              var url = window.location.origin+"/dsa/dsa/index.php/admin/load_city?name=resi_city&req=true";             
              $.ajax({
                     type: "POST",
                     url: url,
                     data: { country : selectedCountry,  district : selectedState}, 
                     success: function (response) {                    
                       $("#city_response").html(response);
                      }
              });           
          });
  
          //permanemt address of personal info 
          $("select.perstate").change(function(e){
            var selectedCountry = $(".perstate option:selected").val();
              var url = window.location.origin+"/dsa/dsa/index.php/admin/load_district?name=per_district&req=false";             
              $.ajax({
                     type: "POST",
                     url: url,
                     data: { country : selectedCountry }, 
                     success: function (response) {                    
                       $("#per_district_response").html(response);
                      }
              });           
          });
  
  
          $("#per_district_div").on('change','select',function () {           
            var selectedState = $(".per_district option:selected").val();
            var selectedCountry = $(".perstate option:selected").val();          
              var url = window.location.origin+"/dsa/dsa/index.php/admin/load_city?name=per_city&req=false";             
              $.ajax({
                     type: "POST",
                     url: url,
                     data: { country : selectedCountry,  district : selectedState}, 
                     success: function (response) {                    
                       $("#per_city_response").html(response);
                      }
              });           
          });
  
          //----- end -------  permanemt address of personal info ---------
  
          //resi - per address check box 
  
          $('#customSwitches').on('change', function() { 
              if (!this.checked) {
                  $("#per_add_1").val("");               
                  $("#per_add_2").val("");               
                  $("#per_add_3").val("");               
                  $("#per_no_of_years").val("");               
                  $("#per_landmark").val("");               
                  $("#per_pincode").val("");               
                  $("#sel_per_property_type").val("");               
                  $("#per_state").val("");               
                  $("#per_district").val("");               
                  $("#per_city").val("");  
                  $("#per_state_view").val("");               
                  $("#per_district_view").val("");                            
              }else {
                  if($("#resi_add_1").val() == '' ||               
                  $("#resi_no_of_years").val() == '' ||               
                  $("#resi_landmark").val() == '' ||               
                  $("#resi_pincode").val() == '' ||               
                  $("#resi_per_property_type").val() == '' ||               
                  $("#resi_state").val() == '' ||               
                  $("#resi_district").val() == '' ||               
                  $("#resi_city").val() == ''){
                    $("#customSwitches").attr("checked", false);
                    swal("Oops", "All value must be entered in residence address.", "error");                        
                    return;
                  }else{
                    $("#per_add_1").val($("#resi_add_1").val());               
                    $("#per_add_2").val($("#resi_add_2").val());               
                    $("#per_add_3").val($("#resi_add_3").val());               
                    $("#per_no_of_years").val($("#resi_no_of_years").val());               
                    $("#per_landmark").val($("#resi_landmark").val());               
                    $("#per_pincode").val($("#resi_pincode").val());               
                    $("#sel_per_property_type").val($(".resi_prop_type option:selected").val());               
                    $("#per_state").val($("#resi_state").val());               
                    $("#per_district").val($("#resi_district").val());               
                    $("#per_state_view").val($("#resi_state").val());               
                    $("#per_district_view").val($("#resi_district").val());               
                    $("#per_city").val($("#resi_city").val());               
                  }
                  
              }
          });
  
          $('#emiSwitches').on('change', function() { 
              if (!this.checked) {
                  //unchecked
                  $('#emisLayout').hide();
              }else {
                //checked
                $('#emisLayout').show();
              }
          }); 
  
  
          $('input[type=radio][name=editList]').change(function() {
              var type = 1; var url = '';
              if (this.value == 'Same as residential address') {
                  url = $('#s_url').val();
                  type = 1;
              }else {
                  url = $('#s_url').val();
                  type = 2;
              }
			  $id=$('#ID').val()
              url = url + "index.php/customer/get_address?ID="+$id;
              
              $.ajax({
                     type: "POST",
                     url: url,
                     contentType: "application/json; charset=UTF-8",
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              var data = parsed_data.data;
                              if (type == 2) {
                                if (data.PER_ADDRS_LINE_1 == '') {
                                  $('#resi_add_1').val(data.RES_ADDRS_LINE_1); 
                                  $('#resi_add_2').val(data.RES_ADDRS_LINE_2); 
                                  $('#resi_add_3').val(data.RES_ADDRS_LINE_3);
                                  $('#business_landmark').val(data.RES_ADDRS_LANDMARK); 
                                  $('#resi_pincode').val(data.RES_ADDRS_PINCODE); 
                                  $('#sel_property_type').val(data.RES_ADDRS_PROPERTY_TYPE);
                                  $('#resi_no_of_years').val(data.RES_ADDRS_NO_YEARS_LIVING);
                                  $('#resi_state').val(data.RES_ADDRS_STATE);                                
                                  $('#resi_district').val(data.RES_ADDRS_DISTRICT);
                                  $('#resi_city').val(data.RES_ADDRS_CITY);                                                                                                                            
  
                                  $('#resi_state_view').val(data.RES_ADDRS_STATE);                                
                                  $('#resi_district_view').val(data.RES_ADDRS_DISTRICT);
                                }else{
                                  $('#resi_add_1').val(data.PER_ADDRS_LINE_1);     
                                  $('#resi_add_2').val(data.PER_ADDRS_LINE_2); 
                                  $('#resi_add_3').val(data.PER_ADDRS_LINE_3);
                                  $('#business_landmark').val(data.PER_ADDRS_LANDMARK); 
                                  $('#resi_pincode').val(data.PER_ADDRS_PINCODE); 
                                  $('#sel_property_type').val(data.PER_ADDRS_PROPERTY_TYPE);  
                                  $('#resi_no_of_years').val(data.PER_ADDRS_NO_YEARS_LIVING);                               
                                  
                                  $('#resi_state').val(data.PER_ADDRS_STATE);
                                  $('#resi_city').val(data.PER_ADDRS_CITY); 
                                  $('#resi_district').val(data.PER_ADDRS_DISTRICT);                                
  
                                  $('#resi_state_view').val(data.PER_ADDRS_STATE);
                                  $('#resi_district_view').val(data.PER_ADDRS_DISTRICT);                                
                                }
                              }else{
                                  $('#resi_add_1').val(data.RES_ADDRS_LINE_1); 
                                  $('#resi_add_2').val(data.RES_ADDRS_LINE_2); 
                                  $('#resi_add_3').val(data.RES_ADDRS_LINE_3);  
                                  $('#business_landmark').val(data.RES_ADDRS_LANDMARK); 
                                  $('#resi_pincode').val(data.RES_ADDRS_PINCODE); 
                                  $('#sel_property_type').val(data.RES_ADDRS_PROPERTY_TYPE);                                 
                                  $('#resi_no_of_years').val(data.RES_ADDRS_NO_YEARS_LIVING);
                                  $('#resi_district').val(data.RES_ADDRS_DISTRICT);
                                  $('#resi_state').val(data.RES_ADDRS_STATE);
                                  $('#resi_city').val(data.RES_ADDRS_CITY); 
                                                                  
                                  $('#resi_district_view').val(data.RES_ADDRS_DISTRICT);
                                  $('#resi_state_view').val(data.RES_ADDRS_STATE);                                
                              }
                          }else swal("Oops", "Error", "error");                        
                      }
              }); 
          });
  
  
          $('input[type=radio][name=coapp_add_radio]').change(function() {
              var type = 1; var url = '';
              if (this.value == 'Same as residential address') {
                  url = $('#s_url').val();
                  type = 1;
              }else {
                  url = $('#s_url').val();
                  type = 2;
              }
              url = url + "index.php/customer/get_coapp_address?ID="+$('#coappid').val();
              
              $.ajax({
                     type: "POST",
                     url: url,
                     contentType: "application/json; charset=UTF-8",
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              var data = parsed_data.data;
                              if (type == 2) {
                                if (data.PER_ADDRS_LINE_1 == '') {
                                  $('#resi_add_1').val(data.RES_ADDRS_LINE_1); 
                                  $('#resi_add_2').val(data.RES_ADDRS_LINE_2); 
                                  $('#resi_add_3').val(data.RES_ADDRS_LINE_3);
                                  $('#business_landmark').val(data.RES_ADDRS_LANDMARK); 
                                  $('#resi_pincode').val(data.RES_ADDRS_PINCODE); 
                                  $('#sel_property_type').val(data.RES_ADDRS_PROPERTY_TYPE);
                                  $('#resi_no_of_years').val(data.RES_ADDRS_NO_YEARS_LIVING);
                                  $('#resi_state').val(data.RES_ADDRS_STATE);                                
                                  $('#resi_district').val(data.RES_ADDRS_DISTRICT);
                                  $('#resi_city').val(data.RES_ADDRS_CITY);                                                                                                                            
  
                                  $('#resi_state_view').val(data.RES_ADDRS_STATE);                                
                                  $('#resi_district_view').val(data.RES_ADDRS_DISTRICT);
                                }else{
                                  $('#resi_add_1').val(data.PER_ADDRS_LINE_1);     
                                  $('#resi_add_2').val(data.PER_ADDRS_LINE_2); 
                                  $('#resi_add_3').val(data.PER_ADDRS_LINE_3);
                                  $('#business_landmark').val(data.PER_ADDRS_LANDMARK); 
                                  $('#resi_pincode').val(data.PER_ADDRS_PINCODE); 
                                  $('#sel_property_type').val(data.PER_ADDRS_PROPERTY_TYPE);  
                                  $('#resi_no_of_years').val(data.PER_ADDRS_NO_YEARS_LIVING);                               
                                  
                                  $('#resi_state').val(data.PER_ADDRS_STATE);
                                  $('#resi_city').val(data.PER_ADDRS_CITY); 
                                  $('#resi_district').val(data.PER_ADDRS_DISTRICT);                                
  
                                  $('#resi_state_view').val(data.PER_ADDRS_STATE);
                                  $('#resi_district_view').val(data.PER_ADDRS_DISTRICT);                                
                                }
                              }else{
                                  $('#resi_add_1').val(data.RES_ADDRS_LINE_1); 
                                  $('#resi_add_2').val(data.RES_ADDRS_LINE_2); 
                                  $('#resi_add_3').val(data.RES_ADDRS_LINE_3);  
                                  $('#business_landmark').val(data.RES_ADDRS_LANDMARK); 
                                  $('#resi_pincode').val(data.RES_ADDRS_PINCODE); 
                                  $('#sel_property_type').val(data.RES_ADDRS_PROPERTY_TYPE);                                 
                                  $('#resi_no_of_years').val(data.RES_ADDRS_NO_YEARS_LIVING);
                                  $('#resi_district').val(data.RES_ADDRS_DISTRICT);
                                  $('#resi_state').val(data.RES_ADDRS_STATE);
                                  $('#resi_city').val(data.RES_ADDRS_CITY); 
                                                                  
                                  $('#resi_district_view').val(data.RES_ADDRS_DISTRICT);
                                  $('#resi_state_view').val(data.RES_ADDRS_STATE);                                
                              }
                          }else swal("Oops", "Error", "error");                        
                      }
              }); 
          });
  
          //cust flow 1 screen update
          $("#cust_flow_s_one_update").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              
              var val = validatedate($('#dob').val());            
               var ID=($('#ID').val());
              if(!val){
                swal("Oops", "Invalid date of birth", "error");                        
                return;
              }
  
              if($('#resi_state').val() == ''){
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter residence address pincode", "error");                        
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                        
                return;
              }
  
              if($('#resi_district').val() == ''){
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter residence address pincode", "error");                        
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                        
                return;
              }
  
              if($('#per_state').val() == ''){              
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter permanent address pincode", "error");
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                                                
                return;
              }
  
              if($('#per_district').val() == ''){
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter permanent address pincode", "error");
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                                                
                return;
              }
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/customer_edit_profile_2_income?type=salaried&ID="+parsed_data.ID);
                                  });
  
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
          
          //dsa flow 1 screen update
          $("#dsa_update_profile_one_new_action").submit(function(e) {
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action'); 
            var dataArr = form.serialize();   

            var val = validatedate($('#dob').val());            

            if(!val){
              swal("Oops", "Invalid date of birth", "error");                        
              return;
            }

            if($('#resi_state').val() == ''){
              if($('#resi_pincode').val() == '')swal("Oops", "Please enter residence address pincode", "error");                        
              else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                        
              return;
            }

            if($('#resi_district').val() == ''){
              if($('#resi_pincode').val() == '')swal("Oops", "Please enter residence address pincode", "error");                        
              else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                        
              return;
            }

            var loan_types_main = '{ "loan_types" : [';
            var loan_types = '';
            if($("#business_loan").prop('checked') == true){
              loan_types = loan_types + '{ "value":"'+$('#business_loan').val()+'"'+'}';
            }
            if($("#home_loan").prop('checked') == true){
              if(loan_types!='')loan_types = loan_types +',';
              loan_types = loan_types + '{ "value":"'+$('#home_loan').val()+'"'+'}';
            }
            if($("#personal_loan").prop('checked') == true){
              if(loan_types!='')loan_types = loan_types +',';
              loan_types = loan_types + '{ "value":"'+$('#personal_loan').val()+'"'+'}';
            }
            if($("#lap").prop('checked') == true){
              if(loan_types!='')loan_types = loan_types +',';
              loan_types = loan_types + '{ "value":"'+$('#lap').val()+'"'+'}';
            }
            if($("#msme_loan").prop('checked') == true){
              if(loan_types!='')loan_types = loan_types +',';
              loan_types = loan_types + '{ "value":"'+$('#msme_loan').val()+'"'+'}';
            }
            if($("#education_loan").prop('checked') == true){
              if(loan_types!='')loan_types = loan_types +',';
              loan_types = loan_types + '{ "value":"'+$('#education_loan').val()+'"'+'}';
            }
            if($("#cc").prop('checked') == true){
              if(loan_types!='')loan_types = loan_types +',';
              loan_types = loan_types + '{ "value":"'+$('#cc').val()+'"'+'}';
            }
            
            loan_types_main = loan_types_main + loan_types;
            loan_types_main = loan_types_main + ']}'; 
            dataArr = dataArr+"&loan_types="+loan_types_main;               

            var work_under = $(this).find('input:radio[name=work_under]:checked').val() || '';
            if(work_under == 'Yes'){
              if($('input[name=corporate_dsa_name]').val() == ''){                        
                  swal("Oops", "Please enter corporate dsa name", "error");                        
                  return false;
              }

              if($('input[name=corporate_dsa_contact]').val() == ''){                        
                  swal("Oops", "Please enter corporate dsa contact number", "error");                        
                  return false;
              }
            }
            
            var rdo_fees = $(this).find('input:radio[name=rdo_fees]:checked').val() || '';
            if(rdo_fees == 'Yes'){
              if($('input[name=fees]').val() == ''){                        
                  swal("Oops", "Please enter fees", "error");                        
                  return false;
              }
            }

            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                        var parsed_data = JSON.parse(response);
                        if(parsed_data.status == 1){                                                                
                            swal({
                                  title: "SUCCESS",
                                  text: parsed_data.message,
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#DD6B55",
                                  confirmButtonText: "OK",
                                  closeOnConfirm: true
                                }).then(function() {
                                  window.location.replace("/dsa/dsa/index.php/customer/dsa_documents_upload");
                                });

                        }else swal("Oops", parsed_data.message, "error");                        
                    }
            }); 
        });
		 $("#dsa_update_profile_one_new_action_dsa").submit(function(e) {
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action'); 
            var dataArr = form.serialize();   
            var id = $('#id').val();
          

            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                        var parsed_data = JSON.parse(response);
                        if(parsed_data.status == 1){                                                                
                            swal({
                                  title: "SUCCESS",
                                  text: parsed_data.message,
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#DD6B55",
                                  confirmButtonText: "OK",
                                  closeOnConfirm: true
                                }).then(function() {
                                  window.location.replace("/dsa/dsa/index.php/admin/update_basic_profile_dsa?id="+ id);
                                });

                        }else swal("Oops", parsed_data.message, "error");                        
                    }
            }); 
        });
  
          //cust flow 2 screen update salaried
          $("#customer_flow_update_s_two_salaried").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action');
              var isCoapp = url.includes("coapplicant_new_screen_two_action")
              var dataArr = form.serialize();   
              
              var val = validatedate($('#org_working_from').val());
              
              if(!val){
                swal("Oops", "Invalid date of birth", "error");                        
                return;
              }
              
              var is_other_income_valid = true; 
              var other_income_select_arr = []; var other_income_amount_arr = {};
              $.each($(".other-income-select-data").serializeArray(), function (i, field){
                 if(other_income_select_arr.includes(field.value)){
                     swal("Oops", "Please avoid duplicate entry in other income source", "error");   
                     is_other_income_valid = false;                        
                     return;
                 }else {
                    other_income_select_arr[i]= field.value; 
                 }
              });
  
              $.each($(".other-income-amount-data").serializeArray(), function (i, field){
                 if(field.value == ''){
                      
                 }else other_income_amount_arr["other_income_amount_"+i]=field.value;                   
              });
  
              if (!is_other_income_valid) {return;}
              //console.log(other_income_select_arr[0]);
              //console.log(other_income_select_arr[1]);
              //console.log(other_income_amount_arr); 
              
              var is_emis_available = false;
              if(dataArr.search('resiperchk') >= 0)is_emis_available = true;
              //dataArr = dataArr+"&emis_arr=mahesh";
              var emis_select_arr = []; var emis_loan_amount_arr = {}; var emis_outstanding_amount_arr = {}; var emis_emi_amount_arr = {}; var emis_bal_from_amount_arr = {};
              if(is_emis_available){                
                  var is_emis_valid = true;                  
                  $.each($(".emis-select-data").serializeArray(), function (i, field){
                     if(emis_select_arr.includes(field.value)){
                         swal("Oops", "Please avoid duplicate entry in EMI's", "error");   
                         is_emis_valid = false;                        
                         return;
                     }else if(field.value == ''){
                          swal("Oops", "All fields are mandatory in EMI's", "error");   
                          is_emis_valid = false;                        
                          return;
                     }else emis_select_arr[i]=field.value;                   
                  });
  
                  $.each($(".emis-loan-data").serializeArray(), function (i, field){
                     if(field.value == ''){
                          swal("Oops", "All fields are mandatory in EMI's", "error");   
                          is_emis_valid = false;                        
                          return;
                     }else emis_loan_amount_arr["loan_"+i]=field.value;                   
                  });
  
                  $.each($(".emis-outstanding-data").serializeArray(), function (i, field){
                     if(field.value == ''){
                          swal("Oops", "All fields are mandatory in EMI's", "error");   
                          is_emis_valid = false;                        
                          return;
                     }else emis_outstanding_amount_arr["outstanding_"+i]=field.value;                   
                  });
  
                  $.each($(".emis-emi-data").serializeArray(), function (i, field){
                     if(field.value == ''){
                          swal("Oops", "All fields are mandatory in EMI's", "error");   
                          is_emis_valid = false;                        
                          return;
                     }else emis_emi_amount_arr["emi_"+i]=field.value;                   
                  });
  
                  $.each($(".emis-bal_from-data").serializeArray(), function (i, field){
                     if(field.value == ''){
                          swal("Oops", "All fields are mandatory in EMI's", "error");   
                          is_emis_valid = false;                        
                          return;
                     }else emis_bal_from_amount_arr["bal_from_"+i]=field.value;                   
                  });
  
                  /*console.log("final");
                  console.log(emis_select_arr);
                  console.log(emis_loan_amount_arr);
                  console.log(emis_outstanding_amount_arr);
                  console.log(emis_emi_amount_arr);
                  console.log(emis_bal_from_amount_arr);*/
                  if (!is_emis_valid) {return;}
                  if(emis_select_arr.length == 0){
                    swal("Oops", "Please enter EMI details", "error");   
                    return;
                  }
  
  
                  var emis_index;
                  var emis = '{ "emis" : [';
                  dataArr = dataArr+"&emis_select_count="+emis_select_arr.length;
                  for (emis_index = 0; emis_index < emis_select_arr.length; emis_index++) {
                    if(emis_select_arr.length-1 != emis_index)emis = emis + '{ "title":"'+emis_select_arr[emis_index]+'"'+' , "loan_amount":"'+emis_loan_amount_arr["loan_"+emis_index]+'"'+', "outstanding_amount":"'+emis_outstanding_amount_arr["outstanding_"+emis_index]+'"'+', "emi_amount":"'+emis_emi_amount_arr["emi_"+emis_index]+'"'+', "bal_from_amount":"'+emis_bal_from_amount_arr["bal_from_"+emis_index]+'"'+'},';
                    else emis = emis + '{ "title":"'+emis_select_arr[emis_index]+'"'+' , "loan_amount":"'+emis_loan_amount_arr["loan_"+emis_index]+'"'+', "outstanding_amount":"'+emis_outstanding_amount_arr["outstanding_"+emis_index]+'"'+', "emi_amount":"'+emis_emi_amount_arr["emi_"+emis_index]+'"'+', "bal_from_amount":"'+emis_bal_from_amount_arr["bal_from_"+emis_index]+'"'+'}';                  
                  }
  
                  emis = emis + ']}'; 
                  dataArr = dataArr+"&emis="+emis;               
  
              } 
  
  
              if(other_income_select_arr.length > 0){                  
                  var other_income = '{ "other_income" : [';
                  var oi_index;
                  for (oi_index = 0; oi_index < other_income_select_arr.length; oi_index++) {
                    if(other_income_select_arr.length-1 != oi_index)other_income = other_income + '{ "title":"'+other_income_select_arr[oi_index]+'"'+' , "amount":"'+other_income_amount_arr["other_income_amount_"+oi_index]+'"'+'},';                      
                    else other_income = other_income + '{ "title":"'+other_income_select_arr[oi_index]+'"'+' , "amount":"'+other_income_amount_arr["other_income_amount_"+oi_index]+'"'+'}';                      
                  }
  
                  other_income = other_income + ']}'; 
                  dataArr = dataArr+"&other_income="+other_income; 
              }    
              
              var past_date = new Date($('#org_working_from').val());
              var current_date = new Date();
              var difference = (current_date.getFullYear()*12 + current_date.getMonth()) - (past_date.getFullYear()*12 + past_date.getMonth());
              if(difference < 12){
                var org_past_designation = $('#org_past_designation').val();
                if (org_past_designation == '') {
                  swal("Oops", "Please select past company designation", "error");                        
                  return;
                }
  
                var org_past_work_email = $('#org_past_work_email').val();
                if (org_past_work_email == '') {
                  swal("Oops", "Please enter past company email id", "error");                        
                  return;
                }
  
                var org_past_working_from = $('#org_past_working_from').val();
                if (org_past_working_from == '') {
                  swal("Oops", "Please select past company working date", "error");                        
                  return;
                }
  
                var org_past_salary_1 = $('#org_past_salary_1').val();
                if (org_past_salary_1 == '') {
                  swal("Oops", "Please enter past company salary", "error");                        
                  return;
                }
  
                var org_past_salary_2 = $('#org_past_salary_2').val();
                if (org_past_salary_2 == '') {
                  swal("Oops", "Please enter past company salary", "error");                        
                  return;
                }
  
                var org_past_salary_3 = $('#org_past_salary_3').val();
                if (org_past_salary_3 == '') {
                  swal("Oops", "Please enter past company salary", "error");                        
                  return;
                }
  
                var org_past_gross_salary = $('#org_past_gross_salary').val();
                if (org_past_gross_salary == '') {
                  swal("Oops", "Please enter past company anual gross salary", "error");                        
                  return;
                }              
              } 
  
              $.ajax({
                     type: "POST",
                     url: url,
                     data: dataArr,
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    if(!isCoapp)window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+parsed_data.ID);
                                    else window.location.replace("/dsa/dsa/index.php/customer/coapplicant_documents?UID="+$('#coappid').val());
                                  });
  
                          }else if(parsed_data.status == 301){
                              window.location.replace("/dsa/dsa/index.php/login");
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
          
          //cust flow 2 screen update retired
          $("#customer_flow_update_s_two_retired").submit(function(e) {
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action');
            var isCoapp = url.includes("coapplicant_new_screen_two_action")
            var dataArr = form.serialize();   
            
            var is_emis_available = false;
            if(dataArr.search('resiperchk') >= 0)is_emis_available = true;
            //dataArr = dataArr+"&emis_arr=mahesh";
            var emis_select_arr = []; var emis_loan_amount_arr = {}; var emis_outstanding_amount_arr = {}; var emis_emi_amount_arr = {}; var emis_bal_from_amount_arr = {};
            if(is_emis_available){                
                var is_emis_valid = true;                  
                $.each($(".emis-select-data").serializeArray(), function (i, field){
                   if(emis_select_arr.includes(field.value)){
                       swal("Oops", "Please avoid duplicate entry in EMI's", "error");   
                       is_emis_valid = false;                        
                       return;
                   }else if(field.value == ''){
                        swal("Oops", "All fields are mandatory in EMI's", "error");   
                        is_emis_valid = false;                        
                        return;
                   }else emis_select_arr[i]=field.value;                   
                });

                $.each($(".emis-loan-data").serializeArray(), function (i, field){
                   if(field.value == ''){
                        swal("Oops", "All fields are mandatory in EMI's", "error");   
                        is_emis_valid = false;                        
                        return;
                   }else emis_loan_amount_arr["loan_"+i]=field.value;                   
                });

                $.each($(".emis-outstanding-data").serializeArray(), function (i, field){
                   if(field.value == ''){
                        swal("Oops", "All fields are mandatory in EMI's", "error");   
                        is_emis_valid = false;                        
                        return;
                   }else emis_outstanding_amount_arr["outstanding_"+i]=field.value;                   
                });

                $.each($(".emis-emi-data").serializeArray(), function (i, field){
                   if(field.value == ''){
                        swal("Oops", "All fields are mandatory in EMI's", "error");   
                        is_emis_valid = false;                        
                        return;
                   }else emis_emi_amount_arr["emi_"+i]=field.value;                   
                });

                $.each($(".emis-bal_from-data").serializeArray(), function (i, field){
                   if(field.value == ''){
                        swal("Oops", "All fields are mandatory in EMI's", "error");   
                        is_emis_valid = false;                        
                        return;
                   }else emis_bal_from_amount_arr["bal_from_"+i]=field.value;                   
                });

                if (!is_emis_valid) {return;}
                if(emis_select_arr.length == 0){
                  swal("Oops", "Please enter EMI details", "error");   
                  return;
                }


                var emis_index;
                var emis = '{ "emis" : [';
                dataArr = dataArr+"&emis_select_count="+emis_select_arr.length;
                for (emis_index = 0; emis_index < emis_select_arr.length; emis_index++) {
                  if(emis_select_arr.length-1 != emis_index)emis = emis + '{ "title":"'+emis_select_arr[emis_index]+'"'+' , "loan_amount":"'+emis_loan_amount_arr["loan_"+emis_index]+'"'+', "outstanding_amount":"'+emis_outstanding_amount_arr["outstanding_"+emis_index]+'"'+', "emi_amount":"'+emis_emi_amount_arr["emi_"+emis_index]+'"'+', "bal_from_amount":"'+emis_bal_from_amount_arr["bal_from_"+emis_index]+'"'+'},';
                  else emis = emis + '{ "title":"'+emis_select_arr[emis_index]+'"'+' , "loan_amount":"'+emis_loan_amount_arr["loan_"+emis_index]+'"'+', "outstanding_amount":"'+emis_outstanding_amount_arr["outstanding_"+emis_index]+'"'+', "emi_amount":"'+emis_emi_amount_arr["emi_"+emis_index]+'"'+', "bal_from_amount":"'+emis_bal_from_amount_arr["bal_from_"+emis_index]+'"'+'}';                  
                }

                emis = emis + ']}'; 
                dataArr = dataArr+"&emis="+emis;               

            }  

            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                        var parsed_data = JSON.parse(response);
                        if(parsed_data.status == 1){                                                                
                            swal({
                                  title: "SUCCESS",
                                  text: parsed_data.message,
                                  type: "success",
                                  showCancelButton: false,
                                  confirmButtonColor: "#DD6B55",
                                  confirmButtonText: "OK",
                                  closeOnConfirm: true
                                }).then(function() {
                                  if(!isCoapp)window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+parsed_data.ID);
                                  else window.location.replace("/dsa/dsa/index.php/customer/customer_documents?ID="+$('#coappid').val());
                                });

                        }else if(parsed_data.status == 301){
                            window.location.replace("/dsa/dsa/index.php/login");
                        }else swal("Oops", parsed_data.message, "error");                        
                    }
            }); 
        });

        //cust flow 2 screen update coapp-retired
        $("#customer_flow_update_s_two_coapp_retired").submit(function(e) {
          e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
          var form = $(this);
          var url = form.attr('action');
          var dataArr = form.serialize();   
          
          var is_emis_available = false;
          if(dataArr.search('resiperchk') >= 0)is_emis_available = true;
          //dataArr = dataArr+"&emis_arr=mahesh";
          var emis_select_arr = []; var emis_loan_amount_arr = {}; var emis_outstanding_amount_arr = {}; var emis_emi_amount_arr = {}; var emis_bal_from_amount_arr = {};
          if(is_emis_available){                
              var is_emis_valid = true;                  
              $.each($(".emis-select-data").serializeArray(), function (i, field){
                 if(emis_select_arr.includes(field.value)){
                     swal("Oops", "Please avoid duplicate entry in EMI's", "error");   
                     is_emis_valid = false;                        
                     return;
                 }else if(field.value == ''){
                      swal("Oops", "All fields are mandatory in EMI's", "error");   
                      is_emis_valid = false;                        
                      return;
                 }else emis_select_arr[i]=field.value;                   
              });

              $.each($(".emis-loan-data").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in EMI's", "error");   
                      is_emis_valid = false;                        
                      return;
                 }else emis_loan_amount_arr["loan_"+i]=field.value;                   
              });

              $.each($(".emis-outstanding-data").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in EMI's", "error");   
                      is_emis_valid = false;                        
                      return;
                 }else emis_outstanding_amount_arr["outstanding_"+i]=field.value;                   
              });

              $.each($(".emis-emi-data").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in EMI's", "error");   
                      is_emis_valid = false;                        
                      return;
                 }else emis_emi_amount_arr["emi_"+i]=field.value;                   
              });

              $.each($(".emis-bal_from-data").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in EMI's", "error");   
                      is_emis_valid = false;                        
                      return;
                 }else emis_bal_from_amount_arr["bal_from_"+i]=field.value;                   
              });

              if (!is_emis_valid) {return;}
              if(emis_select_arr.length == 0){
                swal("Oops", "Please enter EMI details", "error");   
                return;
              }


              var emis_index;
              var emis = '{ "emis" : [';
              dataArr = dataArr+"&emis_select_count="+emis_select_arr.length;
              for (emis_index = 0; emis_index < emis_select_arr.length; emis_index++) {
                if(emis_select_arr.length-1 != emis_index)emis = emis + '{ "title":"'+emis_select_arr[emis_index]+'"'+' , "loan_amount":"'+emis_loan_amount_arr["loan_"+emis_index]+'"'+', "outstanding_amount":"'+emis_outstanding_amount_arr["outstanding_"+emis_index]+'"'+', "emi_amount":"'+emis_emi_amount_arr["emi_"+emis_index]+'"'+', "bal_from_amount":"'+emis_bal_from_amount_arr["bal_from_"+emis_index]+'"'+'},';
                else emis = emis + '{ "title":"'+emis_select_arr[emis_index]+'"'+' , "loan_amount":"'+emis_loan_amount_arr["loan_"+emis_index]+'"'+', "outstanding_amount":"'+emis_outstanding_amount_arr["outstanding_"+emis_index]+'"'+', "emi_amount":"'+emis_emi_amount_arr["emi_"+emis_index]+'"'+', "bal_from_amount":"'+emis_bal_from_amount_arr["bal_from_"+emis_index]+'"'+'}';                  
              }

              emis = emis + ']}'; 
              dataArr = dataArr+"&emis="+emis;               

          }  

          $.ajax({
                 type: "POST",
                 url: url,
                 data: dataArr,
                 success: function (response) {
                      var parsed_data = JSON.parse(response);
                      if(parsed_data.status == 1){                                                                
                          swal({
                                title: "SUCCESS",
                                text: parsed_data.message,
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                              }).then(function() {
                                window.location.replace("/dsa/dsa/index.php/customer/coapplicant_documents?UID="+$('#coappid').val());
                              });

                      }else if(parsed_data.status == 301){
                          window.location.replace("/dsa/dsa/index.php/login");
                      }else swal("Oops", parsed_data.message, "error");                        
                  }
          }); 
      });
  
  
          $("#customer_flow_update_s_two_business").submit(function(e) { 
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var dataArr = form.serialize();   
              var radioValue = $("input[name='user_profession']:checked").val();
              var url = form.attr('action');
              var isCoapp = url.includes("coapplicant_new_screen_two_action_business");
  
              var business_annual_income = $('#business_annual_income').val();
              if(business_annual_income == ''){
                swal("Oops", "Please enter annual income", "error");                        
                return;
              }
              
              var business_pan = $('#business_pan').val();
              if(business_pan != ''){
                var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
  
                if(regpan.test(business_pan)){
                  // valid pan card number
                } else {
                  swal("Oops", "Please enter valid PAN card number", "error");                        
                  return;
                } 
              }           
  
              if(radioValue == 'Business Man'){              
                var bank_balance ='{ "amount_1":"'+$('#business_income_1').val()+'"'+' , "amount_2":"'+$('#business_income_2').val()+'"'+', "amount_3":"'+$('#business_income_3').val()+'"'+', "amount_4":"'+$('#business_income_4').val()+'"'+', "amount_5":"'+$('#business_income_5').val()+'"';              
                bank_balance = bank_balance + ', "amount_6":"'+$('#business_income_6').val()+'"'+' , "amount_7":"'+$('#business_income_7').val()+'"'+', "amount_8":"'+$('#business_income_8').val()+'"'+', "amount_9":"'+$('#business_income_9').val()+'"'+', "amount_10":"'+$('#business_income_10').val()+'"';              
                bank_balance = bank_balance + ', "amount_11":"'+$('#business_income_11').val()+'"'+' , "amount_12":"'+$('#business_income_12').val()+'"'+', "amount_13":"'+$('#business_income_13').val()+'"'+', "amount_14":"'+$('#business_income_14').val()+'"'+', "amount_15":"'+$('#business_income_15').val()+'"';              
                bank_balance = bank_balance + '}';
                dataArr = dataArr+"&bank_balance="+bank_balance; 
                              
              }else{
                var regi_no = $('#regi_no').val();
                if(regi_no == ''){
                  swal("Oops", "Please enter registration number", "error");                        
                  return;
                }
              }            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: dataArr,
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    if(!isCoapp)window.location.replace("/dsa/dsa/index.php/customer/customer_documents?UID="+parsed_data.ID);
                                    else window.location.replace("/dsa/dsa/index.php/customer/coapplicant_documents?UID="+$('#coappid').val());
                                  });
  
                          }else if(parsed_data.status == 301){
                              window.location.replace("/dsa/dsa/index.php/login");
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              });  91141472
          });  
  
  
          $("#coapplicant_new_screen_one_action").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              
              var val = validatedate($('#dob').val());
              
              if(!val){
                swal("Oops", "Invalid date of birth", "error");                        
                return;
              }
              if($('#resi_state').val() == ''){
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter residence address pincode", "error");                        
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                        
                return;
              }
  
              if($('#resi_district').val() == ''){
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter residence address pincode", "error");                        
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                        
                return;
              }
  
              if($('#per_state').val() == ''){              
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter permanent address pincode", "error");
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                                                
                return;
              }
  
              if($('#per_district').val() == ''){
                if($('#resi_pincode').val() == '')swal("Oops", "Please enter permanent address pincode", "error");
                else swal("Oops", "We are not providing service in you pincode area. Try to enter another pincode", "error");                                                
                return;
              }
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/coapplicant_new_screen_two?COAPPID="+parsed_data.UNIQUE_CODE+"&type=salaried");
                                  });
  
                          }else if(parsed_data.status == 3){
                              window.location.replace("/dsa/dsa/index.php/login");
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
  
  
          $("#login_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              
              if($('#email').val() == ''){
                swal("Oops", "Please enter either mobile number or email id", "error");                        
                return;
              }
  
              $isChecked = $('#logintype').is(':checked');
              if(!$isChecked){
                if(!validateEmail($('#email').val())){
                  swal("Oops", "Please enter valid email id", "error");                        
                  $('#email').focus();
                  return;
                }
              }
  
              var mob = /^[1-9]{1}[0-9]{9}$/;
              if($isChecked){
                if (mob.test($('#email').val()) == false) {
                  swal("Oops", "Please enter valid mobile number", "error");  
                  $('#mobile').focus();                      
                  return; 
                }
              }
  
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 0){
                              swal("Oops", parsed_data.message, "error");
                          }else if(parsed_data.status == 1){
                              window.location.replace(parsed_data.path);
                          }
                      }
              }); 
          });
		   $("#customer_otp").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              
              if($('#email').val() == ''){
                swal("Oops", "Please enter either mobile number or email id", "error");                        
                return;
              }
  
              $isChecked = $('#logintype').is(':checked');
              if(!$isChecked){
                if(!validateEmail($('#email').val())){
                  swal("Oops", "Please enter valid email id", "error");                        
                  $('#email').focus();
                  return;
                }
              }
  
              var mob = /^[1-9]{1}[0-9]{9}$/;
              if($isChecked){
                if (mob.test($('#email').val()) == false) {
                  swal("Oops", "Please enter valid mobile number", "error");  
                  $('#mobile').focus();                      
                  return; 
                }
              }
  
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 0){
                              swal("Oops", parsed_data.message, "error");
                          }else if(parsed_data.status == 1){
                              window.location.replace(parsed_data.path);
                          }
                      }
              }); 
          });
		   $("#login_by_otp").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              
              if($('#email').val() == ''){
                swal("Oops", "Please enter either mobile number or email id", "error");                        
                return;
              }
  
              $isChecked = $('#logintype').is(':checked');
              if(!$isChecked){
                if(!validateEmail($('#email').val())){
                  swal("Oops", "Please enter valid email id", "error");                        
                  $('#email').focus();
                  return;
                }
              }
  
              var mob = /^[1-9]{1}[0-9]{9}$/;
              if($isChecked){
                if (mob.test($('#email').val()) == false) {
                  swal("Oops", "Please enter valid mobile number", "error");  
                  $('#mobile').focus();                      
                  return; 
                }
              }
  
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 0){
                              swal("Oops", parsed_data.message, "error");
                          }else if(parsed_data.status == 1){
                              window.location.replace(parsed_data.path);
                          }
                      }
              }); 
          });
		  
		  $("#reset_password_1").submit(function(e) {
			  
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action'); 
            var dataArr = form.serialize();  
            if($('#email').val() == ''){
              swal("Oops", "Please enter either mobile number or email id", "error");                        
              return;
            }

            $isChecked = $('#forgotlogintype').is(':checked');
            if(!$isChecked){
              if(!validateEmail($('#email').val())){
                swal("Oops", "Please enter valid email id", "error");                        
                $('#email').focus();
                return;
              }
              dataArr = dataArr+"&type=email"; 
            }

            var mob = /^[1-9]{1}[0-9]{9}$/;
            if($isChecked){
              if (mob.test($('#email').val()) == false) {
                swal("Oops", "Please enter valid mobile number", "error");  
                $('#mobile').focus();                      
                return; 
              }
              dataArr = dataArr+"&type=mobile"; 
            }            

            $("#loader").css("display", "block");

            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                        $("#loader").css("display", "none");
                        var parsed_data = JSON.parse(response);
                        if(parsed_data.status == 0){
                            swal("Oops", parsed_data.message, "error");
                        }else if(parsed_data.status == 1){
                         window.location.replace(parsed_data.path);
                        }
                    }
            }); 
        });
          
          $("#forgot_form").submit(function(e) {
			  
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action'); 
            var dataArr = form.serialize();  
            if($('#email').val() == ''){
              swal("Oops", "Please enter either mobile number or email id", "error");                        
              return;
            }

            $isChecked = $('#forgotlogintype').is(':checked');
            if(!$isChecked){
              if(!validateEmail($('#email').val())){
                swal("Oops", "Please enter valid email id", "error");                        
                $('#email').focus();
                return;
              }
              dataArr = dataArr+"&type=email"; 
            }

            var mob = /^[1-9]{1}[0-9]{9}$/;
            if($isChecked){
              if (mob.test($('#email').val()) == false) {
                swal("Oops", "Please enter valid mobile number", "error");  
                $('#mobile').focus();                      
                return; 
              }
              dataArr = dataArr+"&type=mobile"; 
            }            

            $("#loader").css("display", "block");

            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                        $("#loader").css("display", "none");
                        var parsed_data = JSON.parse(response);
                        if(parsed_data.status == 0){
                            swal("Oops", parsed_data.message, "error");
                        }else if(parsed_data.status == 1){
                          if($isChecked){
                            window.location.replace(parsed_data.path);
                          }else {
                              swal({
                              title: "SUCCESS",
                              text: parsed_data.message,
                              type: "success",
                              showCancelButton: false,
                              confirmButtonColor: "#DD6B55",
                              confirmButtonText: "OK",
                              closeOnConfirm: true
                            }).then(function() {
                              window.location.replace(parsed_data.path);
                            });
                          }
                        }
                    }
            }); 
        });
  
        $("#forgot_verify_otp_form").submit(function(e) {
          e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
          var form = $(this);
          var url = form.attr('action'); 
          var dataArr = form.serialize();  
          
          $("#loader").css("display", "block");

          $.ajax({
                 type: "POST",
                 url: url,
                 data: dataArr,
                 success: function (response) {
                          $("#loader").css("display", "none");
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 0){
                              swal("Oops", parsed_data.message, "error");
                          }else if(parsed_data.status == 1){
                            swal({
                              title: "SUCCESS",
                              text: parsed_data.message,
                              type: "success",
                              showCancelButton: false,
                              confirmButtonColor: "#DD6B55",
                              confirmButtonText: "OK",
                              closeOnConfirm: true
                            }).then(function() {
                              window.location.replace(parsed_data.path);
                            });
                          }
                      }
              }); 
          });
          

          $("#forgot_pass_reset_form").submit(function(e) {
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action'); 
            var dataArr = form.serialize();  
            if($('#otp').val() == ''){
              swal("Oops", "Please enter OTP", "error");                        
              return;
            }
			  var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
			 if(!regularExpression.test($('#password').val())) {
			
				 swal("Oops", "password should contain atleast one number and one special character", "error");  
				return ;
			}
  
            if($('#password').val() != $('#confirm_password').val()){
              swal("Oops", "Password and Confirm Password should match", "error");                        
              return;
            }
            
            $("#loader").css("display", "block");
  
            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                            $("#loader").css("display", "none");
                            var parsed_data = JSON.parse(response);
                            if(parsed_data.status == 0){
                                swal("Oops", parsed_data.message, "error");
                            }else if(parsed_data.status == 1){
                              swal({
                                title: "SUCCESS",
                                text: parsed_data.message,
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                              }).then(function() {
                                window.location.replace(parsed_data.path);
                              });
                            }
                        }
                }); 
            });
			$("#updatepassword").submit(function(e) {
            e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
            var form = $(this);
            var url = form.attr('action'); 
            var dataArr = form.serialize();  
            if($('#otp').val() == ''){
              swal("Oops", "Please enter OTP", "error");                        
              return;
            }
            var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
			 if(!regularExpression.test($('#password').val())) {
			
				 swal("Oops", "password should contain atleast one number and one special character", "error");  
				return ;
			}
            if($('#password').val() != $('#confirm_password').val()){
              swal("Oops", "Password and Confirm Password should match", "error");                        
              return;
            }
            
            $("#loader").css("display", "block");
  
            $.ajax({
                   type: "POST",
                   url: url,
                   data: dataArr,
                   success: function (response) {
                            $("#loader").css("display", "none");
                            var parsed_data = JSON.parse(response);
                            if(parsed_data.status == 0){
                                swal("Oops", parsed_data.message, "error");
                            }else if(parsed_data.status == 1){
                              swal({
                                title: "SUCCESS",
                                text: parsed_data.message,
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "OK",
                                closeOnConfirm: true
                              }).then(function() {
                                window.location.replace(parsed_data.path);
                              });
                            }
                        }
                }); 
            });
  
          $("#apply_loan_screen_1").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              var dataArr = form.serialize();   
              if($('#loan_availed_for').val() == 'Construction of Standalone House on a Plot'){
                if($('#area_land').val() == ''){
                  swal("Oops", "Area of land is mandatory for Construction of Standalone House on a Plot", "error");                        
                  return;
                }
              }else {
                if($('#carpet_area').val() == ''){
                  swal("Oops", "Carpet area is mandatory", "error");                        
                  return;
                }
  
                if($('#buildup_area').val() == ''){
                  swal("Oops", "Build up area is mandatory", "error");                        
                  return;
                }
              }
               var UID = $('#UID').val();
              //var emis_select_arr = []; var emis_loan_amount_arr = {}; var emis_outstanding_amount_arr = {}; var emis_emi_amount_arr = {}; var emis_bal_from_amount_arr = {};
              var acc_type = []; var bank_acc_name = {}; var bank_acc_year = {}; var ifsc_code = {}; var bank_acc_no = {};
                             
              var is_bank_valid = true;                  
              $.each($(".bank-select-data").serializeArray(), function (i, field){
                 if(acc_type.includes(field.value)){
                     swal("Oops", "Please avoid duplicate entry in Bank's", "error");   
                     is_bank_valid = false;                        
                     return;
                 }else if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Bank's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else acc_type[i]=field.value;                   
              });
  
              $.each($(".bank-acc-name").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Bank's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else bank_acc_name["bank_acc_name_"+i]=field.value;                   
              });
  
              $.each($(".bank-acc-years").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Bank's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else bank_acc_year["bank_acc_year_"+i]=field.value;                   
              });
  
              $.each($(".bank-ifsc").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Bank's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else ifsc_code["ifsc_code_"+i]=field.value;                   
              });
  
              $.each($(".bank-acc-no").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Bank's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else bank_acc_no["bank_acc_no_"+i]=field.value;                   
              });
  
              if(!is_bank_valid){
                swal("Oops", "All fields are mandatory in Bank's", "error");   
                return;
              }
  
              if($("#is_agree").is(':checked')){
                  
              }else {
                swal("Oops", "Please tick checkbox I/We agree", "error");   
                return; 
              }
  
  
              if(parseInt($("#shortfall_1").val()) > 0) {
                swal("Oops", "Please adjust your loan estimation breakdown. Shortfall of funds should be zero after adjustment of amounts.", "error");   
                return; 
              }                   
  
              var bank_index;
              var bank = '{ "banks" : [';
              for (bank_index = 0; bank_index < acc_type.length; bank_index++) {
                if(acc_type.length-1 != bank_index)bank = bank + '{ "acc_type":"'+acc_type[bank_index]+'"'+' , "bank_acc_name":"'+bank_acc_name["bank_acc_name_"+bank_index]+'"'+', "bank_acc_year":"'+bank_acc_year["bank_acc_year_"+bank_index]+'"'+', "ifsc_code":"'+ifsc_code["ifsc_code_"+bank_index]+'"'+', "bank_acc_no":"'+bank_acc_no["bank_acc_no_"+bank_index]+'"'+'},';
                else bank = bank + '{ "acc_type":"'+acc_type[bank_index]+'"'+' , "bank_acc_name":"'+bank_acc_name["bank_acc_name_"+bank_index]+'"'+', "bank_acc_year":"'+bank_acc_year["bank_acc_year_"+bank_index]+'"'+', "ifsc_code":"'+ifsc_code["ifsc_code_"+bank_index]+'"'+', "bank_acc_no":"'+bank_acc_no["bank_acc_no_"+bank_index]+'"'+'}';                  
              }
  
              bank = bank + ']}'; 
              dataArr = dataArr+"&banks="+bank;               
              $.ajax({
                     type: "POST",
                     url: url,
                     data: dataArr,
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/home_loan_doc?UID="+UID);
                                  });
  
                          }else if(parsed_data.status == 3){
                              window.location.replace("/dsa/dsa/index.php/login");
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
  
  
          $("#apply_loan_screen_2_lap").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              var dataArr = form.serialize();   
              
              if($("#is_agree").is(':checked')){
                  
              }else {
                swal("Oops", "Please tick checkbox I/We agree", "error");   
                return; 
              }
  
              //var emis_select_arr = []; var emis_loan_amount_arr = {}; var emis_outstanding_amount_arr = {}; var emis_emi_amount_arr = {}; var emis_bal_from_amount_arr = {};
              var bank_type = []; var bank_loan_amount = {}; var end_date = {}; var bank_loan_emi = {};
                             
              var is_bank_valid = true;                  
              $.each($(".bank-name").serializeArray(), function (i, field){
                 if(bank_type.includes(field.value)){
                     swal("Oops", "Please avoid duplicate entry in Bank Name", "error");   
                     is_bank_valid = false;                        
                     return;
                 }else if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Existing Loan's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else bank_type[i]=field.value;                   
              });
  
              $.each($(".bank-loan-amount").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Existing Loan's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else bank_loan_amount["bank_loan_amount_"+i]=field.value;                   
              });
  
              $.each($(".loan-end-date").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Existing Loan's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else end_date["bank_end_date_"+i]=field.value;                   
              });
  
              $.each($(".bank-emi-data").serializeArray(), function (i, field){
                 if(field.value == ''){
                      swal("Oops", "All fields are mandatory in Existing Loan's", "error");   
                      is_bank_valid = false;                        
                      return;
                 }else bank_loan_emi["bank_emi_"+i]=field.value;                   
              });
  
              if(!is_bank_valid){
                swal("Oops", "All fields are mandatory in Existing Loan's", "error");   
                return;
              }            
  
              var bank_index;
              var bank = '{ "banks" : [';
              for (bank_index = 0; bank_index < bank_type.length; bank_index++) {
                if(bank_type.length-1 != bank_index)bank = bank + '{ "bank_type":"'+bank_type[bank_index]+'"'+' , "bank_loan_amount":"'+bank_loan_amount["bank_loan_amount_"+bank_index]+'"'+', "end_date":"'+end_date["end_date_"+bank_index]+'"'+', "bank_loan_emi":"'+bank_loan_emi["bank_loan_emi_"+bank_index]+'"'+'},';
                else bank = bank + '{ "bank_type":"'+bank_type[bank_index]+'"'+' , "bank_loan_amount":"'+bank_loan_amount["bank_loan_amount_"+bank_index]+'"'+', "end_date":"'+end_date["end_date_"+bank_index]+'"'+', "bank_loan_emi":"'+bank_loan_emi["bank_loan_emi_"+bank_index]+'"'+'}';                  
              }
  
              bank = bank + ']}'; 
              dataArr = dataArr+"&banks="+bank;               
              $.ajax({
                     type: "POST",
                     url: url,
                     data: dataArr,
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/lap_loan_doc?UID="+parsed_data.UID);
                                  });
  
                          }else if(parsed_data.status == 3){
                              window.location.replace("/dsa/dsa/index.php/login");
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
  
  
          $("#apply_loan_screen_3_busi_per_cc").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              var dataArr = form.serialize();   
              
              if($("#is_agree").is(':checked')){
                  
              }else {
                swal("Oops", "Please tick checkbox I/We agree", "error");   
                return; 
              }
  
                            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: dataArr,
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/customer/applied_loans_list?UID="+parsed_data.UID);
                                  });
  
                          }else if(parsed_data.status == 3){
                              window.location.replace("/dsa/dsa/index.php/login");
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
  
  
          $("#signup_form").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              var dataArr = form.serialize();   
              var radioValue = $("input[name='userType']:checked").val();
              var pass = $('#pass').val();
              var confirmpass = $('#confirmpass').val();
  
              if(pass != confirmpass){
                swal("Oops", "Confirm password mismatch", "error");   
                return; 
              } 
  
              $.ajax({
                     type: "POST",
                     url: url,
                     data: dataArr,
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              window.location.replace("/dsa/dsa/index.php/mobileotp");
                          }else if(parsed_data.status == 3){
                              window.location.replace("/dsa/dsa/index.php/login");
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
  
  
          $("#resend").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
               
              $.ajax({
                     type: "POST",
                     url: url,
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal("SUCCESS", parsed_data.message, "success");                        
                          }else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          });
          
  });
  
  
  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  
  function filterDateSelected(e){
      e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
      var form = $(this);
      var url = form.attr('action'); 

      window.location.replace("customers?date="+e.target.value);
  }
 
  
  function openApplyForm(){
      window.location.replace("/dsa/dsa/index.php/customer/customer_apply_for_loan");
  }    
  
  function checkExperienceMonths(e){
  
    var past_date = new Date(e.target.value);
    var current_date = new Date();
    var difference = (current_date.getFullYear()*12 + current_date.getMonth()) - (past_date.getFullYear()*12 + past_date.getMonth());
    if(difference < 12){
      $('.past_employee').show();
    }
    else{
      $('.past_employee').hide();
    } 
  }
  
  function removeRow(input){
    $('.remove').closest('.other_income_wrapper').find('.faculty_row').not(':first').last().remove();
  
  }
  
  function wait(ms){
     var start = new Date().getTime();
     var end = start;
     while(end < start + ms) {
       end = new Date().getTime();
    }
  }
  
  function maxLengthCheck(object){
      if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
  }
  
  function aadharValidate(object){
      if (object.value.length > 4){  
        let val = object.value.split(" ").join("")    
        let joy = val.match(/.{1,4}/g);
        object.value = joy.join(' ');
      }
  }
  
  function validateText(object){
  
      if(object.value.length > 0){
        if(/^[a-zA-Z- ]*$/.test(object.value) == false) {
            object.value = object.value.replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,'');
            swal("Oops", "Your entering invalid value", "error");                        
            return;
        }
      }    
      if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
  }
  
  function shortFall(object){
      if (object.value.length > object.maxLength){
        object.value = object.value.slice(0, object.maxLength);
      }
  
      var right_total = 0, left_total = 0;
      var loan_requested = 0, prop_extimated = 0, bank_bal = 0, disposal = 0, sale_of_prop = 0, family = 0, provident = 0, others = 0;
      if($('#estimate_req_fund').val()!='')prop_extimated = $('#estimate_req_fund').val();
      if($('#requested_fund').val()!='')loan_requested = $('#requested_fund').val();
      if($('#bank_saving').val()!='')bank_bal = $('#bank_saving').val();
      if($('#disposal_invest').val()!='')disposal = $('#disposal_invest').val();
      if($('#sale_of_property').val()!='')sale_of_prop = $('#sale_of_property').val();
      if($('#family_amount').val()!='')family = $('#family_amount').val();
      if($('#provident_fund').val()!='')provident = $('#provident_fund').val();
      if($('#others').val()!='')others = $('#others').val();
  
      right_total = parseInt(loan_requested) + parseInt(bank_bal) + parseInt(disposal) + parseInt(sale_of_prop) + parseInt(family) + parseInt(provident) + parseInt(others);
      left_total = parseInt(prop_extimated);
  
  
      var diff = left_total - right_total;
      $('#shortfall').val(diff<0 ? 0 : diff);
      $('#shortfall_1').val(diff<0 ? 0 : diff);
      $('#left_total').val(left_total);
      $('#right_total').val(right_total);
  }
  
  
    function load_resi_state_d_c(state, district, city){
      var selectedCountry = state;
      var url = window.location.origin+"/dsa/dsa/index.php/admin/load_district?name=resi_district&req=true";             
      $.ajax({
             type: "POST",
             url: url,
             data: { country : selectedCountry }, 
             success: function (response) {                                           
                 $("#district_response").html(response);
                 $('#resi_district').val(district);
  
                 var selectedState = district;
                  var selectedCountry = state;          
                    var url = window.location.origin+"/dsa/dsa/index.php/admin/load_city?name=resi_city&req=true";             
                    $.ajax({
                           type: "POST",
                           url: url,
                           data: { country : selectedCountry,  district : selectedState}, 
                           success: function (response) {                    
                              $("#city_response").html(response);
                              $('#resi_city').val(city); 
                            }
                    }); 
              }
      });
    }
  
    function load_per_state_d_c(state, district, city){
      var selectedCountry = state;
      var url = window.location.origin+"/dsa/dsa/index.php/admin/load_district?name=per_district&req=true";             
      $.ajax({
             type: "POST",
             url: url,
             data: { country : selectedCountry }, 
             success: function (response) {                                           
                 $("#per_district_response").html(response);
                 $('#per_district').val(district);
  
                 var selectedState = district;
                  var selectedCountry = state;          
                    var url = window.location.origin+"/dsa/dsa/index.php/admin/load_city?name=per_city&req=true";             
                    $.ajax({
                           type: "POST",
                           url: url,
                           data: { country : selectedCountry,  district : selectedState}, 
                           success: function (response) {                    
                              $("#per_city_response").html(response);
                              $('#per_city').val(city); 
                            }
                    }); 
              }
      });
    }
  
  
  function upperCaseF(a){
      setTimeout(function(){
          a.value = a.value.toUpperCase();
      }, 1);
  }
  
  function selectProperty1Changed(selectObject) {
    var value = selectObject.value;  
    if(value!='' && value == 'Others'){
      $('#other_prop_type_1').css('visibility','visible');
  
    }else {
      $("#other_prop_type_1").attr("placeholder", "Enter other property type").val("");
      $('#other_prop_type_1').css('visibility','hidden');    
    }
  }
  
  function validatedate(inputText){
  
      var tokens = inputText.split('-');  
      var day    = parseInt(tokens[2]);
      var month  = parseInt(tokens[1]);
      var year   = parseInt(tokens[0]);
      var d = new Date();
      var n = d.getFullYear();
  
      if(day <= 0 || month <= 0 || year <= 0){
        return false;
      }else if(year < 1900 || year > n){
        return false;
      }else return true;
  
    }
	 
  //adeed by papiha
  function get_options()
	{
		//alert("hello");
	}
	$( "#select_category" ).change(function() 
	{
        
	    var select_category = $('#select_category').val();
		
		if(select_category=="branch_manager")
		{
			 var url = window.location.origin+"/dsa/dsa/index.php/admin/get_BranchManager"; 
			 $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		}
		if(select_category=="Relationship_officer")
		{
			
			 var url = window.location.origin+"/dsa/dsa/index.php/admin/get_RelationshipManager"; 
			 $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		}
		
		//alert(select_category);
	});
	$( "#options_display" ).change(function() 
	{
		
	    var select_category = $('#select_category').val();
		
		if(select_category=="branch_manager")
		{
			var BM_ID = $('#options_display').val();
			
          
		       window.location.replace("/dsa/dsa/index.php/admin/Connector?BM_ID="+BM_ID);    
			 
		}
    if(select_category=="Relationship_officer")
		{
			var RO_ID = $('#options_display').val();
			
          
		       window.location.replace("/dsa/dsa/index.php/admin/Connector?RO_ID="+RO_ID);    
			 
		}
		//alert(select_category);
	});


  //added by priyanka

  $( "#select_dropdown_filters" ).change(function() 
	{
   	///	alert('select_category'); 
     var select_dropdown_filters = $('#select_dropdown_filters').val();
     if(select_dropdown_filters=="all")
		{
		   window.location.replace("/dsa/dsa/index.php/admin/dsa?s=all");    
			 
		}
    else if(select_dropdown_filters=="Complete")
		{
		   window.location.replace("/dsa/dsa/index.php/admin/dsa?s=Complete");    
			 
		}
    else if(select_dropdown_filters=="Incomplete")
		{
		   window.location.replace("/dsa/dsa/index.php/admin/dsa?s=Incomplete");    
			 
		}
    else if(select_dropdown_filters=="bank")
		{
      $("#deleteModel").modal("show");
	 
		}
    else if(select_dropdown_filters=="city")
		{
      $("#deleteModel_city").modal("show");
			 
		}
  });

//===============================for customers
  $( "#select_filters_customers" ).change(function() 
	{
   
     var select_dropdown_filters = $('#select_filters_customers').val();
     if(select_dropdown_filters=="all")
		{
		   window.location.replace("/dsa/dsa/index.php/dsa/customers?s=all");    
			 
		}
    else if(select_dropdown_filters=="Complete")
		{
		   window.location.replace("/dsa/dsa/index.php/dsa/customers?s=Complete");    
			 
		}
    else if(select_dropdown_filters=="Incomplete")
		{
		   window.location.replace("/dsa/dsa/index.php/dsa/customers?s=Incomplete");    
			 
		}
    });

    
//===============================for admin customers
 /* $( "#select_filters_customers_admin" ).change(function() 
	{
   
     var select_dropdown_filters = $('#select_filters_customers_admin').val();
     if(select_dropdown_filters=="all")
		{
		   window.location.replace("/dsa/dsa/index.php/admin/customers?s=all");    
			 
		}
    else if(select_dropdown_filters=="Complete")
		{
		   window.location.replace("/dsa/dsa/index.php/admin/customers?s=Complete");    
			 
		}
    else if(select_dropdown_filters=="Incomplete")
		{
		   window.location.replace("/dsa/dsa/index.php/admin/customers?s=Incomplete");    
			 
		}
    });*/
//======================added by sonal on 12-05-2022 for cluster customer
    //=================================customers all
    $( "#select_filters_customers_all" ).change(function() 
    {
     
      var select_dropdown_filters = $('#select_filters_customers_all').val();
      if(select_dropdown_filters=="all")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=all");    
        
     }
     else if(select_dropdown_filters=="Application_Completed")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=Application_Completed");    
        
     }
     else if(select_dropdown_filters=="Application_InCompleted")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=Application_InCompleted");    
        
     }
     else if(select_dropdown_filters=="Cam_Completed")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=Cam_Completed");    
        
     }
     else if(select_dropdown_filters=="PD_Completed")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=PD_Completed");    
        
     }
     else if(select_dropdown_filters=="income_details_complete")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=income_details_complete");    
        
     }
     else if(select_dropdown_filters=="Created")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=Created");    
        
     }
     else if(select_dropdown_filters=="reject")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=reject");    
        
     }
     else if(select_dropdown_filters=="Hold")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=Hold");    
        
     }
     else if(select_dropdown_filters=="Continue")
     {
        window.location.replace("/dsa/dsa/index.php/admin/Cluster_customers?s=Continue");    
        
     }
     });
    //=====================for connector
	
    $( "#select_dropdown_filters_connector" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_dropdown_filters_connector').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Connector_alluser?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Connector_alluser?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Connector_alluser?s=Incomplete");    
         
      }
      }); 

       //=====================for connector admin
	
    $( "#select_dropdown_filters_connector_admin" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_dropdown_filters_connector_admin').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Connector?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Connector?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Connector?s=Incomplete");    
         
      }
      }); 


          //=====================for operations user changes by priya 04-05-2022
    $( "#select_dropdown_filters_OUsers" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_dropdown_filters_OUsers').val();
       
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/Operations_user/customers?s=all");    
         
      }
      else if(select_dropdown_filters=="Completed_CAM")
      {
        
          window.location.replace("/dsa/dsa/index.php/Operations_user/customers?s=Completed_CAM");   
         
      }
      else if(select_dropdown_filters=="Incomplete_CAM")
      {
         
          window.location.replace("/dsa/dsa/index.php/Operations_user/customers?s=Incomplete_CAM");   
         
      }
      
      }); 
    //=====================for operations user admin
	
    $( "#select_dropdown_filters_OUsers_admin" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_dropdown_filters_OUsers_admin').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Operations_user?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Operations_user?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Operations_user?s=Incomplete");    
         
      }
      }); 

       //=================================branch manager admin
    $( "#select_dropdown_filters_branchManaer_admin_filter" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_dropdown_filters_branchManaer_admin_filter').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/branch_manager?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/branch_manager?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/branch_manager?s=Incomplete");    
         
      }
      });
         //=================================credit manager admin
         $( "#select_dropdown_filters_creditmanager_admin" ).change(function() 
         {
          
            var select_dropdown_filters = $('#select_dropdown_filters_creditmanager_admin').val();
            if(select_dropdown_filters=="all")
           {
              window.location.replace("/dsa/dsa/index.php/admin/credit_manager_user?s=all");    
              
           }
           else if(select_dropdown_filters=="Complete")
           {
              window.location.replace("/dsa/dsa/index.php/admin/credit_manager_user?s=Complete");    
              
           }
           else if(select_dropdown_filters=="Incomplete")
           {
              window.location.replace("/dsa/dsa/index.php/admin/credit_manager_user?s=Incomplete");    
              
           }
           });
 //======================================================================================
 
 $( "#select_dropdown_filters_HR" ).change(function() 
 {
    ///	alert('select_category'); 
    var select_dropdown_filters = $('#select_dropdown_filters_HR').val();
    if(select_dropdown_filters=="all")
   {
      window.location.replace("/dsa/dsa/index.php/HR/Applicants?s=all");    
      
   }
    else if(select_dropdown_filters=="city")
   {
     $("#deleteModel_city").modal("show");
      
   }
   else if(select_dropdown_filters=="job_position")
   {
     $("#deleteModel").modal("show");
      
   }
   else if(select_dropdown_filters=="application_status")
   {
     $("#deleteModel_application_status").modal("show");
      
   }
 });

  //======================================================================================
 
  $('#option1').click(function() 
  {
     	alert('select_category'); 

  });

  function job_actions(value,textAreaExample) {
    var inputVal = document.getElementById("applicant_id").value;
    var HR_name = document.getElementById("HR_name").value;
    var HR_ID= document.getElementById("HR_ID").value;
    //alert(textAreaExample);
   
     if(value=='accept')
    {
      //alert(textAreaExample); 
     window.location.replace("/dsa/dsa/index.php/HR/job_application_actions?s=accept&ID="+inputVal+"&HR="+HR_name+"&remark="+textAreaExample+"&HR_ID="+HR_ID);  
    }
    else if(value=='reject')
    {
     // alert(textAreaExample); 
    window.location.replace("/dsa/dsa/index.php/HR/job_application_actions?s=reject&ID="+inputVal+"&HR="+HR_name+"&remark="+textAreaExample+"&HR_ID="+HR_ID); 
    }
    else if(value=='hold')
    {
     
     window.location.replace("/dsa/dsa/index.php/HR/job_application_actions?s=hold&ID="+inputVal+"&HR="+HR_name+"&remark="+textAreaExample+"&HR_ID="+HR_ID); 
    }
   
} 

function add_remarks(value) {
  alert('select_category'); 
}
//=======================added by papiha on  09_12_2021=================================//
	$( "#select_category_For_Lead" ).change(function() 
	{
		  $("#options_display_form_lead").find("option:not(:first)").remove();
	      var select_category = $('#select_category_For_Lead').val();
		  var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Lead_From_users";
		  if(select_category=="Connector")
		  {
			   $.ajax({
						type:'POST',
						url:url,
						data:{user:'Connector'},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_form_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		  }
		  else if(select_category=="DSA")
		  {
			    $.ajax({
						type:'POST',
						url:url,
						data:{user:'DSA'},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_form_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		  }
		   else if(select_category=="Relationship_officer")
		  {
			    $.ajax({
						type:'POST',
						url:url,
						data:{user:'Relationship_officer'},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_form_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		  }
		 
		  
	});
  $( "#options_display_form_lead" ).change(function() 
	{
		
		$('#lead_data').empty();
		
	    var select_category = $('#select_category_For_Lead').val();
		var get_lead_from_id = $('#options_display_form_lead').val();
		
		var url = window.location.origin+"/dsa/dsa/index.php/admin/Get_lead_For_Assign"; 
		    if(select_category=="Connector")
			{
				$.ajax({
						type:'POST',
						url:url,
						data:{user:'Connector',id:get_lead_from_id},
						success:function(data){
                                if(data) {
									$('#thead_selct').html("Select All");
								$('#select_all').append('<input type="checkbox" id="myCheck" onclick="myFunction()">');
									
                                       
								}
								else
								{
									$('#select_all_tr').empty();
								}
								
                                var obj =JSON.parse(data);
								var i=1;
								
								$.each(obj, function (index, value) 
								{ 
									$('#lead_data').append
									(
									   
										'<tr>'+
											'<td>'+i+'</td>'+
											'<td><input type="checkbox" class="checkbox" value="'+value.id+'" name="lead_id" ></td>'+
											'<td>'+value.first_name+' '+value.last_name+'</td>'+
											'<td>'+value.address+'</td>'+
											'<td>'+value.email+'</td>'+
											'<td>'+value.mobile+'</td>'+
											(value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
										'</tr>'
										
									);
									i++;
								});
									
							 
							
						}
					 });
			}
			else if(select_category=="DSA")
			{
				$.ajax({
						type:'POST',
						url:url,
						data:{user:'DSA',id:get_lead_from_id},
						success:function(data){
                                if(data) {
									$('#thead_selct').html("Select All");
								$('#select_all').append('<input type="checkbox" id="myCheck" onclick="myFunction()">');
									
                                       
								}
								else
								{
									$('#select_all_tr').empty();
								}
								
								
                                var obj =JSON.parse(data);
								var i=1;
								$('#lead_data').empty();
								$.each(obj, function (index, value) 
								{ 
									$('#lead_data').append
									(
									   
										'<tr>'+
											'<td>'+i+'</td>'+
											'<td><input type="checkbox" class="checkbox" value="'+value.id+'" name="lead_id" id="lead_id"></td>'+
											'<td>'+value.first_name+' '+value.last_name+'</td>'+
											'<td>'+value.address+'</td>'+
											'<td>'+value.email+'</td>'+
											'<td>'+value.mobile+'</td>'+
											(value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
											
										'</tr>'
										
									);
									i++;
								});
									
							 
							
						}
					 });
			}
			else if(select_category=="Relationship_officer")
			{
				
				$.ajax({
						type:'POST',
						url:url,
						data:{user:'RO',id:get_lead_from_id},
						success:function(data){
                                if(data) {
									$('#thead_selct').html("Select All");
									$('#select_all').append('<input type="checkbox" id="myCheck" onclick="myFunction()">');
									
                                       
								}
								else
								{
									$('#select_all_tr').empty();
								}
								
								
                                var obj =JSON.parse(data);
								var i=1;
								$('#lead_data').empty();
								$.each(obj, function (index, value) 
								{ 
									$('#lead_data').append
									(
									   
										'<tr>'+
											'<td>'+i+'</td>'+
											'<td><input type="checkbox" class="checkbox checkBoxClass" value="'+value.id+'" name="lead_id" id="lead_id"></td>'+
											'<td>'+value.first_name+' '+value.last_name+'</td>'+
											'<td>'+value.address+'</td>'+
											'<td>'+value.email+'</td>'+
											'<td>'+value.mobile+'</td>'+
											(value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
											
										'</tr>'
										
									);
									i++;
								});
									
							 
							
						}
					 });
			}
	});
	$( "#select_category_to_Lead" ).change(function() 
	{
		$("#options_display_to_lead").find("option:not(:first)").remove();
	    var select_category = $('#select_category_to_Lead').val();
		var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Lead_From_users";
		 if(select_category=="Connector")
		  {
			   $.ajax({
						type:'POST',
						url:url,
						data:{user:'Connector'},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_to_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		  }
		  else if(select_category=="DSA")
		  {
			    $.ajax({
						type:'POST',
						url:url,
						data:{user:'DSA'},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_to_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		  }
		   else if(select_category=="Relationship_officer")
		  {
			    $.ajax({
						type:'POST',
						url:url,
						data:{user:'Relationship_officer'},
						success:function(data){

                                var obj =JSON.parse(data);
								    $.each(obj, function (index, value) {
																				$('#options_display_to_lead').append($('<option/>', { 
																						value: value.UNIQUE_CODE,
																						text : value.FN +' '+ value.LN
																					}));
																				});      
									
							 
							
						}
					 });
		  }
		
	});
  $( "#Assign_lead" ).click(function() 
	{
		 if (!$("input[name='lead_id']:checked").is(':checked')) 
		   {
			   swal("warning!", "Please Select Lead To Assign", "warning");
				return false;
			}
		else{
			    var select_category = $('#options_display_to_lead').val();
				if(select_category=='')
				{
					 swal("warning!", "Please Select Person To Assign Lead", "warning");
				     return false;
				}
				else
				{
						var arr = [];
						$.each($("input[name='lead_id']:checked"), function(){
								  arr.push($(this).val());
							  });
							  var url = window.location.origin+"/dsa/dsa/index.php/admin/Get_Id_To_Assign_Lead"; 
							  $.ajax({
										type:'POST',
										url:url,
									   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
										data:{Lead_ID_To_Assign:arr},
										success:function(data){

													
											 
											
										}
										
								 });

				   
							var Lead_assign_id = $('#options_display_to_lead').val();
							var Lead_assign_To = $('#options_display_to_lead').find(":selected").text();
							var Email=$('#email').val();

							var body = "Are you sure you want to Assign Lead "+Lead_assign_To+'?'+'<input name="Lead_Assign_To" type="text" class="idform" value="'+Lead_assign_id+'"  hidden /><input name="Lead_Assign_To_name" type="text" class="idform" value="'+Lead_assign_To+'" hidden /><input name="Email" type="text" class="idform" value="'+Email+'" hidden  />';
							
							$("#Assign_Lead_Modal .modal-body #Content_To_display ").html(body);
							
							$("#Assign_Lead_Modal").modal("show");
				}
			}
		 
		
	});
	
	
	function myFunction() {
     var checkBox = document.getElementById("myCheck");
	
	 if (checkBox.checked == true){
		  $('input[name="lead_id"]').prop('checked', true);
		 
	  } else 
	  {
		 $('input[name="lead_id"]').prop('checked', false);
	  }
}
    
  
//---------------------------------11-12-2012--------------added by priyanka
$("#resi_pincode_2").bind("change paste keyup", function() {
      
  
  if($(this).val()!=''){
   if($(this).val().length == 6){
     var pincode_s = $(this).val();
     if(window.location.host.includes("http"))url = window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";
     else url = window.location.protocol+"//"+window.location.host + "/dsa/dsa/index.php/customer/get_address_by_pincode";            
     $.ajax({
        type: "POST",
        url: url,
        data: '{ "pincode": "'+pincode_s+'"}',
        contentType: "application/json; charset=UTF-8",
        success: function (response) {
           if(response!=''){
             var data = JSON.parse(response);
             if(data.data){
               if(data.data.hasOwnProperty("statename")){
                 $('#resi_state').val(data.data.statename);
                 $('#resi_district').val(data.data.Districtname);
                 $('#resi_state_view').val(data.data.statename);
                 $('#resi_district_view').val(data.data.Districtname);
                 $('#resi_city').val(data.data.City);  
               }else {
                 $('#resi_state').val("");
                 $('#resi_district').val("");
                 $('#resi_state_view').val("");
                 $('#resi_district_view').val("");
                 $('#resi_city').val("");
               }                      
             }else {
               $('#resi_state').val("");
               $('#resi_district').val("");
               $('#resi_state_view').val("");
               $('#resi_district_view').val("");
               $('#resi_city').val("");
             }                    
           }
        }
      });
   }
 }
});

$('#customSwitches_2').on('change', function() { 
  if (!this.checked) {
      $("#per_add_1").val("");               
      $("#per_add_2").val("");               
      $("#per_add_3").val("");               
      $("#per_no_of_years").val("");               
      $("#per_landmark").val("");               
      $("#per_pincode").val("");               
      $("#sel_per_property_type").val("");               
      $("#per_state").val("");               
      $("#per_district").val("");               
      $("#per_city").val("");  
      $("#per_state_view").val("");               
      $("#per_district_view").val("");                            
  }else {
      if($("#resi_add_1").val() == '' ||               
      $("#resi_no_of_years").val() == '' ||               
      $("#resi_landmark").val() == '' ||               
      $("#resi_pincode").val() == '' ||               
      $("#resi_per_property_type").val() == '' ||               
      $("#resi_state").val() == '' ||               
      $("#resi_district").val() == '' ||               
      $("#resi_city").val() == ''){
        $("#customSwitches").attr("checked", false);
        swal("Oops", "All value must be entered in residence address.", "error");                        
        return;
      }else{
        $("#per_add_1").val($("#resi_add_1").val());               
        $("#per_add_2").val($("#resi_add_2").val());               
        $("#per_add_3").val($("#resi_add_3").val());               
        $("#per_no_of_years").val($("#resi_no_of_years").val());               
        $("#per_landmark").val($("#resi_landmark").val());               
        $("#per_pincode").val($("#resi_pincode").val());               
        $("#sel_per_property_type").val($(".resi_prop_type option:selected").val());               
        $("#per_state").val($("#resi_state").val());               
        $("#per_district").val($("#resi_district").val());               
        $("#per_state_view").val($("#resi_state").val());               
        $("#per_district_view").val($("#resi_district").val());               
        $("#per_city").val($("#resi_city").val());               
      }
      
  }
});


//=====================================added by priyanka 16-12-2021

$( "#select_profile_name" ).change(function() 
{
 
   var select_profile_name = $('#select_profile_name').val();
 
     if(select_profile_name=='all')
     {
      window.location.replace("/dsa/dsa/index.php/HR/job_Analysis_details?profile_name=all");  
     }
     else
     {
     window.location.replace("/dsa/dsa/index.php/HR/job_Analysis_details?profile_name="+select_profile_name);  
     }  
     
  
  });
  	/*-------------------------------------------------added by papiha on 18_12_2021 for other user customer---------------------------------------------------------------*/
  /* $( "#select_category_user" ).change(function(e) 
    {
          $("#options_display_user").find("option:not(:first)").remove();
        var select_category = $('#select_category_user').val();
      var User_id = $('#User_id').val();
      if(select_category=="DSA")
      {
        
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Dsa_User"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_user').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Relationship_officer")
      {
        
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_RM_user"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_user').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
	  else if(select_category=="branch_manager")
      {
        
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_BM_user"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_user').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="self")
      {
          window.location.replace("/dsa/dsa/index.php/admin/customers_allusers");    
      }
      
      //alert(select_category);
    });
      */
    $( "#options_display_user" ).change(function() 
    {
      
        var select_category = $('#select_category_user').val();
      var User_id = $('#options_display_user').val();
      if(select_category=="DSA")
      {
        $('#display_customer').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/admin/get_customer_user_DSA"; 
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
                                          $('#display_customer').append( 
                                          '<tr>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
                                            '<td>'+value.MOBILE+'</td>'+
                                            '<td>'+value.loan_type+'</td>'+
                                            (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
                                            (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                              '<td>'+new_date+'</td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/customer/profile_view_p_o_dsa?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/view_loan_details?ID="+value.UNIQUE_CODE+'"  class="btn modal_test"><i class="fa fa-inr text-right"></i> </a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/check_bureau_score?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-line-chart text-right" style="color:green;"></i></a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/show_coapplicants?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>'+
                                            (value.cam_status=='Cam details complete' ? '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/Operations_user/genrate_pdf?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>' : '<td><a style="margin-left: 8px; " class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a></td>')+
  
                                            
                                          '</tr>'
                                          );
                                          });      
                    
                 
                
              }
             });			   
         
      }
      if(select_category=="Relationship_officer")
      {
      $('#display_customer').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/admin/get_customer_user_RO"; 
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
                                          $('#display_customer').append
                                          ( 
                                                          '<tr>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
                                            '<td>'+value.MOBILE+'</td>'+
                                            '<td>'+value.loan_type+'</td>'+
                                            (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
                                            (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                            '<td>'+new_date+'</td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/customer/profile_view_p_o_dsa?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/view_loan_details?ID="+value.UNIQUE_CODE+'"  class="btn modal_test"><i class="fa fa-inr text-right"></i> </a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/check_bureau_score?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-line-chart text-right" style="color:green;"></i></a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/show_coapplicants?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>'+
                                            (value.cam_status=='Cam details complete' ? '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/Operations_user/genrate_pdf?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>' : '<td><a style="margin-left: 8px; " class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a></td>')+
  
                                            
                                          '</tr>'
                                          );
                                          });      
                    
                 
                
              }
             });			   
         
      }
      if(select_category=="branch_manager")
      {
      $('#display_customer').html('');	
          var url = window.location.origin+"/dsa/dsa/index.php/admin/get_customer_user_BM"; 
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
                                          $('#display_customer').append
                                          ( 
                                                          '<tr>'+
                                            '<td>'+value.FN+" "+value.LN+'</td>'+
                                            '<td>'+value.EMAIL+'</td>'+
                                            '<td>'+value.MOBILE+'</td>'+
                                            '<td>'+value.loan_type+'</td>'+
                                            (value.PROFILE_PERCENTAGE == ''||value.PROFILE_PERCENTAGE!=100 ? '<td style="font-size: 10px; color: red">	INCOMPLETE PROFILE </td>': '<td style="color: green; font-size: 10px;">COMPLETED PROFILE </td>') +
                                            (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+
                                            '<td>'+new_date+'</td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/customer/profile_view_p_o_dsa?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-edit text-right" style="color:green;"></i></a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/view_loan_details?ID="+value.UNIQUE_CODE+'"  class="btn modal_test"><i class="fa fa-inr text-right"></i> </a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/check_bureau_score?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-line-chart text-right" style="color:green;"></i></a></td>'+
                                            '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/dsa/show_coapplicants?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>'+
                                            (value.cam_status=='Cam details complete' ? '<td><a style="margin-left: 8px; " href="'+window.location.origin+"/dsa/dsa/index.php/Operations_user/genrate_pdf?ID="+value.UNIQUE_CODE+'" class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:red;"></i></a></td>' : '<td><a style="margin-left: 8px; " class="btn modal_test"><i class="fa fa-file-pdf-o text-right" style="color:gray;"></i></a></td>')+
  
                                            
                                          '</tr>'
                                          );
                                          });      
                    
                 
                
              }
             });			   
         
      }
      //alert(select_category);
    });
   
    
    $( "#select_category_lead" ).change(function(e) 
    {
    
          $("#options_display_lead").find("option:not(:first)").remove();
        var select_category = $('#select_category_lead').val();
      var User_id = $('#User_id').val();
      if(select_category=="DSA")
      {
        
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Dsa_User"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Relationship_officer")
      {
        
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_RM_user"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Connector")
      {
        
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Connector_user_BM"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="self")
      {
          window.location.replace("/dsa/dsa/index.php/dsa/View_Lead");    
      }
      
      //alert(select_category);
    });
      
    $( "#options_display_lead" ).change(function() 
	{
		
	    var select_category = $('#select_category_lead').val();
		var User_id = $('#options_display_lead').val();
		
			$('#user_lead').html('');
			$('#user_lead_assign').html('');
		    var url = window.location.origin+"/dsa/dsa/index.php/dsa/View_Lead_user"; 
                $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{User_id:User_id,userType:select_category},
						success:function(data){
							
							
                                var obj =JSON.parse(data);
								
								if(obj.length==0)
								{
									$('#user_lead').append( 
																				'<tr><td colspan="5" style="text-align:center"> Self Lead Not Found</td></tr>'
																				);
								}
								else{
									
								    var i=1;
								    $.each(obj, function (index, value) {
										                                        
																				$('#user_lead').append( 
																				'<tr>'+
																				    '<td>'+ i +'</td>'+
																					'<td>'+value.first_name+" "+value.last_name+'</td>'+
																					'<td>'+value.address+'</td>'+
																					'<td>'+value.email+'</td>'+
																				    '<td>'+value.mobile+'</td>'+	
                                            (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+	
                                            (value.status==''||value.status==null ? '<td><a style="margin-left: 8px; " data-toggle="modal" data-id = "'+value.id+'" data-target="#deleteModel" class="btn btn-info modal_test">Change Contact Status</a></td>':(value.status=='Convert to Customer')?'<td>  <a style="margin-left: 8px; " data-toggle="modal" data-id = "'+value.id+'" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer</a></td>':(value.status=='Convert to customer with consent')?'<td>	<a style="margin-left: 8px;" data-toggle="modal" data-id = "'+value.id+'" data-target="#deleteModel" class="btn btn-info modal_test disabled"> Convert to Customer with Consent</a></td>':(value.status=='Reject')?'<td>  <a style="margin-left: 8px; " data-toggle="modal" data-id = "'+value.id+'" data-target="#deleteModel" class="btn btn-info modal_test disabled">Reject</a> </td>' :(value.status=='Hold')?'<td>  <a style="margin-left: 8px; " data-toggle="modal" data-id = "'+value.id+'" data-target="#deleteModel" class="btn btn-info modal_test disabled">Hold</a>  <a style="margin-left: 8px;" data-toggle="modal" data-id = "'+value.id+'"  data-target="#deleteModel" class="btn btn-info modal_test "> Convert to Customer</a></td> ':"" )+
																				'</tr>'
																			       );
																				i++; }); 
								}
														
							 
							
						}
					 });	
            var url1 = window.location.origin+"/dsa/dsa/index.php/dsa/View_Lead_user_assign"; 
                $.ajax({
						type:'POST',
						url:url1,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{User_id:User_id},
						success:function(data){

                                var obj =JSON.parse(data);
								if(obj.length==0)
								{
										$('#user_lead_assign').append( 
																				'<tr><td colspan="5" style="text-align:center">Assigned Lead Not Found</td></tr>'
																				);
								}
								else{
									
								    var i=1;
								    $.each(obj, function (index, value) {
										                                        
																				$('#user_lead_assign').append( 
																			
																				'<tr>'+
																				    '<td>'+ i +'</td>'+
																					'<td>'+value.first_name+" "+value.last_name+'</td>'+
																					'<td>'+value.address+'</td>'+
																					'<td>'+value.email+'</td>'+
																				  '<td>'+value.mobile+'</td>'+	
                                            (value.Refer_By== '' ?'<td></td>':'<td>'+value.Refer_By_Name+'['+value.Refer_By_Category+']</td>')+	
																				'</tr>'
																			       );
																				i++; });   
								}																				
									
							 
							
						}
					 });					 
			 
		
		
		
		//alert(select_category);
	});
    /*-----------------------------------------Added By papiha for Dsa page Other than Admin---------------------------------------*/
    $( "#select_dropdown_filters_dsa" ).change(function() 
    {
       ///	alert('select_category'); 
       var select_dropdown_filters = $('#select_dropdown_filters_dsa').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/dsa_allusers?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/dsa_allusers?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/dsa_allusers?s=Incomplete");    
         
      }
      else if(select_dropdown_filters=="bank")
      {
        $("#deleteModel").modal("show");
     
      }
      else if(select_dropdown_filters=="city")
      {
        $("#deleteModel_city").modal("show");
         
      }
    });
    /*-----------------------------------------------Added by papiha on 28_12_2021 when create a lead refer by aoption is display----------------------------------------*/
    $( "#select_category_lead_1" ).change(function(e) 
    {
    
	//alert("hello");
          $("#options_display_lead_1").find("option:not(:first)").remove();
        var select_category = $('#select_category_lead_1').val();
      var User_id = $('#User_id').val();
      if(select_category=="DSA")
      {
        
        if($("#options_display_lead_1 option[value='']").prop('disabled'))
        {
          $("#options_display_lead_1 option[value='']").prop('disabled', false);
        }
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Dsa_User"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead_1').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Relationship_officer")
      {
        
        if($("#options_display_lead_1 option[value='']").prop('disabled'))
        {
          $("#options_display_lead_1 option[value='']").prop('disabled', false);
        }
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_RM_user"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead_1').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Connector")
      {
		 // alert("hello1");
        if(!$('#display_option').is(":visible"))
        {
          
          $("#display_option").css("display", "block")
        }
        if($('#Agency_name').is(":visible"))
        {
          
          $("#Agency_name").css("display", "none")
        }
        if($("#options_display_lead_1 option[value='']").prop('disabled'))
        {
          $("#options_display_lead_1 option[value='']").prop('disabled', false);
        }
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Connector_user_BM"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead_1').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Agency")
      {
        $("#Agency_name").css("display", "block");
        $("#display_option").css("display", "none")
        
      }
      else
      {
        
          var User_id=$('#User_id').val()
        //$('#options_display_lead_1').html('self');
        /*$('#options_display_lead_1').append($('<option/>', { 
                                  value: $('#User_id').val(),
                                  text : 'Self',
                                  selected:'selected',
                                }));
         $('#options_display_lead_1').prop( "disabled", true );
         $('#Refered_By_self').val($('#User_id').val());*/
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_user_data"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      
                                          $('#options_display_lead_1').append($('<option/>', { 
                                              value: obj.UNIQUE_CODE,
                                              text : obj.FN +' '+ obj.LN,
                                              selected:'selected'
                                            }));
                                             $('#Refered_By_Name').val(obj.FN +' '+ obj.LN);
                                                
                    
                 
                
              }
             });
        
           
        $("#options_display_lead_1 option[value='']").prop('disabled', true);
        
          $('#options_display_lead_1').val($('#User_id').val());
  
      }
        
      
         
    });
    $( "#options_display_lead_1" ).change(function() 
    {
       var value=$("#options_display_lead_1").val();
    $('#Refered_By_Name').val($("#options_display_lead_1 option[value="+value+"]").text());
    });
      /*---------------------------------Added by papiha on 30_12_2021 From admin/relationship_officer---------------------------------------------------*/
    $( "#select_dropdown_filters_relationship" ).change(function() 
    {
       ///	alert('select_category'); 
       var select_dropdown_filters = $('#select_dropdown_filters_relationship').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Relationship_Officer?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Relationship_Officer?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Relationship_Officer?s=Incomplete");    
         
      }
     
    });
    /*----------------------------Added by papiha 01-01-2022-------------------------------------------------------------*/
  
  $( "#options_display_to_lead" ).change(function() 
	{
		var User_id=$('#options_display_to_lead').val();
		 $('#email').val('');
		 var url = window.location.origin+"/dsa/dsa/index.php/admin/get_user_data"; 
			 $.ajax({
						type:'POST',
						url:url,
					   // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
						data:{User_id:User_id},
						success:function(data){

                                var obj =JSON.parse(data);
								    
																					 $('#email').val(obj.EMAIL);
																				      
									
							 
							
						}
					 });
	});
	/*---------------------------------Added by papiha on 11_01_2022---------------------------------------------*/
	 $( "#selec_dsa_cluster" ).change(function() 
    {
       ///	alert('select_category'); 
       var select_dropdown_filters = $('#selec_dsa_cluster').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/Cluster_Manager/dsa?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/Cluster_Manager/dsa?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/Cluster_Manager/dsa?s=Incomplete");    
         
      }
      else if(select_dropdown_filters=="bank")
      {
        $("#deleteModel").modal("show");
     
      }
      else if(select_dropdown_filters=="city")
      {
        $("#deleteModel_city").modal("show");
         
      }
    });
	   /*-----------------------------------------------Added by papiha on 11_01_2022 when create a lead refer by option is display----------------------------------------*/
    $( "#select_category_lead_2" ).change(function(e) 
    {
    
          $("#options_display_lead_2").find("option:not(:first)").remove();
        var select_category = $('#select_category_lead_2').val();
      var User_id = $('#User_id').val();
      if(select_category=="DSA")
      {
        
        if($("#options_display_lead_2 option[value='']").prop('disabled'))
        {
          $("#options_display_lead_2 option[value='']").prop('disabled', false);
        }
         var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getDsa"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead_2').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Relationship_officer")
      {
        
        if($("#options_display_lead_2 option[value='']").prop('disabled'))
        {
          $("#options_display_lead_2 option[value='']").prop('disabled', false);
        }
         var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getRelationship_Officer"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead_2').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
	  else if(select_category=="Branch_Manager")
      {
        
        if($("#options_display_lead_2 option[value='']").prop('disabled'))
        {
          $("#options_display_lead_2 option[value='']").prop('disabled', false);
        }
         var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getBranchManger"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead_2').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Connector")
      {
        if(!$('#display_option').is(":visible"))
        {
          
          $("#display_option").css("display", "block")
        }
        if($('#Agency_name').is(":visible"))
        {
          
          $("#Agency_name").css("display", "none")
        }
        if($("#options_display_lead_2 option[value='']").prop('disabled'))
        {
          $("#options_display_lead_2 option[value='']").prop('disabled', false);
        }
         var url = window.location.origin+"/dsa/dsa/index.php/Cluster_Manager/getConnector_for_lead"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      $.each(obj, function (index, value) {
                                          $('#options_display_lead_2').append($('<option/>', { 
                                              value: value.UNIQUE_CODE,
                                              text : value.FN +' '+ value.LN
                                            }));
                                          });      
                    
                 
                
              }
             });
      }
      else if(select_category=="Agency")
      {
        $("#Agency_name").css("display", "block");
        $("#display_option").css("display", "none")
        
      }
      else
      {
        
          var User_id=$('#User_id').val()
        //$('#options_display_lead_1').html('self');
        /*$('#options_display_lead_1').append($('<option/>', { 
                                  value: $('#User_id').val(),
                                  text : 'Self',
                                  selected:'selected',
                                }));
         $('#options_display_lead_1').prop( "disabled", true );
         $('#Refered_By_self').val($('#User_id').val());*/
         var url = window.location.origin+"/dsa/dsa/index.php/admin/get_user_data"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{User_id:User_id},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                      
                                          $('#options_display_lead_2').append($('<option/>', { 
                                              value: obj.UNIQUE_CODE,
                                              text : obj.FN +' '+ obj.LN,
                                              selected:'selected'
                                            }));
                                             $('#Refered_By_Name').val(obj.FN +' '+ obj.LN);
                                                
                    
                 
                
              }
             });
        
           
        $("#options_display_lead_2 option[value='']").prop('disabled', true);
        
          $('#options_display_lead_2').val($('#User_id').val());
  
      }
        
      
         
    });
    $( "#options_display_lead_2" ).change(function() 
    {
       var value=$("#options_display_lead_2").val();
    $('#Refered_By_Name').val($("#options_display_lead_2 option[value="+value+"]").text());
    });
	/*------------------------------added by papiha on 25_02_2022------------------------------------*/
	  $( "#Bank_name" ).change(function() 
    {
		$("#Loan_Type").find("option:not(:first)").remove();
       var value=$("#Bank_name").val();
	
	   var url = window.location.origin+"/dsa/dsa/index.php/admin/get_cooperator_Loan_type"; 
         $.ajax({
              type:'POST',
              url:url,
               // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
              data:{bank_id:value},
              success:function(data){
  
                                  var obj =JSON.parse(data);
                                    
                                         $.each(obj, function (index, value) {
                                          $('#Loan_Type').append($('<option/>', { 
                                              value: value.loan_type,
                                              text : value.loan_type
                                            }));
                                          }); 
			  }
		 });
	});		 
    
    
		 
	                                            
    /*--------------------------------------Added by papiha on 25-01-2022-----------------------------------------------*/
	
         
 $("#calaculate").click(function(e) {
              
			    var Billing_type=$('#Billing_type').val();
				if(Billing_type=='')
				{
					 swal ( "Oops" ,  "Please Select Billing range" ,  "warning" )
					 return false;
				}
				var Start_Date  = new Date($('#Start_Date').val());
				if (!Date.parse(Start_Date)) {
					swal ( "Oops" ,  "Please Enter Start Date " ,  "warning" )
					 $('#Start_Date').focus();
                    return false;					
				} 
				var dd= Start_Date.getDate();
			    if(dd>1)
				{
					 swal ( "Oops" ,  "Please Enter First Date of Month For Start Date" ,  "warning" )
					 $('#Start_Date').focus();
					 return false;
					 
				}
                var End_Date  = new Date($('#End_Date').val());
				if (!Date.parse(End_Date)) {
					swal ( "Oops" ,  "Please Enter End Date " ,  "warning" )
					$('#End_Date').focus();
                    return false;					
				} 
				
				 var End_Date  = new Date($('#End_Date').val());
				var last_date = new Date(End_Date.getFullYear(), End_Date.getMonth() + 1, 0);  
				var dd = last_date.getDate();
				var dd_1= End_Date.getDate();
			    if(dd_1 < dd)
				{
					 swal ( "Oops" ,  "Please Enter Last Date of Month For End Date" ,  "warning" )
					 $('#End_Date').focus();
					 return false;
				}
				
            
				
				 
				
             
               var bank_id=$('#Bank_name').val();
               var Loan_Type=$('#Loan_Type').val();
			   
			   if(bank_id=='')
			   {
				   
				     swal("Oops", "Please Select Bank Name", "warning");
					 return false;
			   }
			    else if(Loan_Type=='')
			   {
				   
				     swal("Oops", "Please Select Loan Type", "warning");
					 return false;
			   }
			   
			   
			   
              
 });			  
    /*-------------------------------------------Added by  papiha on 27_01_2022-----------------------------------------------*/
	$( "#Billing_type" ).change(function() 
    {

       var value=$("#Billing_type").val();
		if(value=='Current_Month')
			
		{
				 var el_down = document.getElementById("Start_Date");
				 var date = new Date();
				// document.write("Current Date: " + date );
				 var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
				 
				var dd = firstDay.getDate();
				var mm = firstDay.getMonth() + 1;
		  
				var yyyy = firstDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var firstDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#Start_Date').val(firstDay);
				$('#Start_Date').prop('readonly', true);
				var lastDay = 
				new Date(date.getFullYear(), date.getMonth() + 1, 0);
				var dd = lastDay.getDate();
				var mm = lastDay.getMonth() + 1;
		  
				var yyyy = lastDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var lastDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#End_Date').val(lastDay);
				$('#End_Date').prop('readonly', true);
		}
		if(value=='Previous_Month')
			
		{
				 var el_down = document.getElementById("Start_Date");
				 var date = new Date();
				// document.write("Current Date: " + date );
				 var firstDay = new Date(date.getFullYear(), date.getMonth()- 1, 1);
				 
				var dd = firstDay.getDate();
				var mm = firstDay.getMonth() + 1;
		  
				var yyyy = firstDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var firstDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#Start_Date').val(firstDay);
				$('#Start_Date').prop('readonly', true);
				var lastDay = 
				new Date(date.getFullYear(), date.getMonth() , 0);
				var dd = lastDay.getDate();
				var mm = lastDay.getMonth() + 1;
		  
				var yyyy = lastDay.getFullYear();
				if (dd < 10) {
					dd = '0' + dd;
				}
				if (mm < 10) {
					mm = '0' + mm;
				}
				var lastDay =  yyyy+ '-' + mm + '-'+ dd;
				$('#End_Date').val(lastDay);
				$('#End_Date').prop('readonly', true);
		}
		if(value=='Select_Range')
		{
			if ( $('#Start_Date').is('[readonly]') ) { $('#Start_Date').prop('readonly', false); }
			if ( $('#End_Date').is('[readonly]') ) { $('#End_Date').prop('readonly', false); }
			$('#Start_Date').val('');
			$('#End_Date').val('');
			 
		}
	   
	});	
	/*-----------------------------Added by papiha on 1-02-2022-------------------------------------*/
$("#new_corporate_admin_bank_action").submit(function(e) {
              
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              
              var form = $(this);
              var url = form.attr('action');            
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status >0){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/manage_coorporate_banks");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");
                      }
              });                
          });	
		  $("#delete_admin_corporate_bank").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/manage_coorporate_banks");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
		   $("#Save_Bank_details").submit(function(e) {
              e.preventDefault ? e.preventDefault() : (e.returnValue = false); 
              var form = $(this);
              var url = form.attr('action'); 
              //alert($('input[name=id]').val());
              $.ajax({
                     type: "POST",
                     url: url,
                     data: form.serialize(),
                     success: function (response) {
                          var parsed_data = JSON.parse(response);
                          if(parsed_data.status == 1){                                                                
                              swal({
                                    title: "SUCCESS",
                                    text: parsed_data.message,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                  }).then(function() {
                                    window.location.replace("/dsa/dsa/index.php/admin/manage_coorporate_banks");
                                  });
  
                          }
                          else swal("Oops", parsed_data.message, "error");                        
                      }
              }); 
          }); 
            /*-------------------------------------- Added by papiha on 26_02_2022------------------------------*/
		   $( "#select_category_user" ).change(function(e) 
       {
             $("#options_display_user").find("option:not(:first)").remove();
          var User_Type=$('#User_Type').val();
          
           var select_category = $('#select_category_user').val();
         var User_id = $('#User_id').val();
         if(select_category=="DSA")
         {
           
            var url = window.location.origin+"/dsa/dsa/index.php/admin/get_Dsa_User"; 
            $.ajax({
                 type:'POST',
                 url:url,
                  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
                 data:{User_id:User_id, User_Type:User_Type},
                 success:function(data){
     
                                     var obj =JSON.parse(data);
                         $.each(obj, function (index, value) {
                                             $('#options_display_user').append($('<option/>', { 
                                                 value: value.UNIQUE_CODE,
                                                 text : value.FN +' '+ value.LN
                                               }));
                                             });      
                       
                    
                   
                 }
                });
         }
         else if(select_category=="Relationship_officer")
         {
          
            var url = window.location.origin+"/dsa/dsa/index.php/admin/get_RM_user"; 
            $.ajax({
                 type:'POST',
                 url:url,
                  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
                 data:{'User_id':User_id,'User_Type':User_Type},
                 success:function(data){
     
                                     var obj =JSON.parse(data);
                                           $.each(obj, function (index, value) {
                                             $('#options_display_user').append($('<option/>', { 
                                                 value: value.UNIQUE_CODE,
                                                 text : value.FN +' '+ value.LN
                                               }));
                                             });      
                       
                    
                   
                 }
                });
         }
       else if(select_category=="branch_manager")
         {
           
            var url = window.location.origin+"/dsa/dsa/index.php/admin/get_BM_user"; 
            $.ajax({
                 type:'POST',
                 url:url,
                  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
                 data:{User_id:User_id},
                 success:function(data){
     
                                     var obj =JSON.parse(data);
                         $.each(obj, function (index, value) {
                                             $('#options_display_user').append($('<option/>', { 
                                                 value: value.UNIQUE_CODE,
                                                 text : value.FN +' '+ value.LN
                                               }));
                                             });      
                       
                    
                   
                 }
                });
         }
         else if(select_category=="self")
         {
             window.location.replace("/dsa/dsa/index.php/admin/customers_allusers");    
         }
         
         //alert(select_category);
       });
       /*-------------------------------------------------- added by papiha 23_04_2022----------------------------------------------*/
       /*---------------------------------- Added by papiha on 23_03_2022------------------------------------------ */

$( "#bank_name_legal" ).change(function(e)
{
    $("#Legal").find("option:not(:first)").remove();
	 $("#Technical").find("option:not(:first)").remove();
   //var Legal_id=$("#Legal").val();
   
   var bank_id = $('#bank_name_legal').val();
 	
   
  
    var url_corporate = window.location.origin+"/dsa/dsa/index.php/Legal/get_coorporate_data";
	 $.ajax({
         type:'POST',
         url:url_corporate,
          // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
         data:{bank_id:bank_id},
         success:function(data){

                             var obj =JSON.parse(data);
							 if(obj.Legal_required=='yes')
							 {
								  $('#Legal').prop('disabled', false);
								 var url = window.location.origin+"/dsa/dsa/index.php/Legal/get_legal_by_bank";
									$.ajax({
										 type:'POST',
										 url:url,
										  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
										 data:{bank_id:bank_id},
										 success:function(data){

															 var obj =JSON.parse(data);
												 $.each(obj, function (index, value) {
													 
														

																	 $('#Legal').append($('<option/>', {
																		 value: value.UNIQUE_CODE,
																		 text : value.FN +' '+ value.LN
																	   }));
																	 
												          
														  /*$("#select option").each(function() {
															  $(this).siblings('[value="'+ this.value +'"]').remove();
															});*/


										 });
											
							 }
									});
							 }
							 else
							 {
								// $('#Legal').addClass('disabled');
								   $('#Legal').prop('disabled', true);
							 }
							 if(obj.Technical_required=='yes')
							 {
								 //$('#Technical').removeClass('disabled');
								   $('#Technicalname').prop('disabled', false);
								 var url = window.location.origin+"/dsa/dsa/index.php/Technical/get_Technical_by_bank";
								$.ajax({
									 type:'POST',
									 url:url,
									  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
									 data:{bank_id:bank_id},
									 success:function(data){

														 var obj =JSON.parse(data);
											 $.each(obj, function (index, value) {
																 $('#Technicalname').append($('<option/>', {
																	 value: value.UNIQUE_CODE,
																	 text : value.FN +' '+ value.LN
																   }));
																 });



									 }
									});
							 }
							 else
							 {
								   $('#Technicalname').prop('disabled', true);
							 }




         }
        });
		
   




 });
 $( "#bank_name_technical" ).change(function(e)
{
    $("#Legal").find("option:not(:first)").remove();
	 $("#Technicalname").find("option:not(:first)").remove();


   var bank_id = $('#bank_name_technical').val();
 	
   
  
    var url_corporate = window.location.origin+"/dsa/dsa/index.php/Legal/get_coorporate_data";
	 $.ajax({
         type:'POST',
         url:url_corporate,
          // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
         data:{bank_id:bank_id},
         success:function(data){

                             var obj =JSON.parse(data);
							
							 if(obj.Technical_required=='yes')
							 {
								 //$('#Technical').removeClass('disabled');
								   $('#Technicalname').prop('disabled', false);
								 var url = window.location.origin+"/dsa/dsa/index.php/Technical/get_Technical_by_bank";
								$.ajax({
									 type:'POST',
									 url:url,
									  // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
									 data:{bank_id:bank_id},
									 success:function(data){

														 var obj =JSON.parse(data);
											 $.each(obj, function (index, value) {
																 $('#Technicalname').append($('<option/>', {
																	 value: value.UNIQUE_CODE,
																	 text : value.FN +' '+ value.LN
																   }));
																 });



									 }
									});
							 }
							 else
							 {
								   $('#Technicalname').prop('disabled', true);
							 }




         }
        });
		
   




 });
 /*----------------------------- Added by papiha on 13_03_2022-----------------------------------------*/
$( "#revert" ).click(function(e) {
  e.preventDefault ? e.preventDefault() : (e.returnValue = false);
  var comment = $('#Comment_by_Legal').val();
  var name = $('#name').val();

  if(comment=='' || comment==' ')
  {


	   swal ( "Oops" ,  "Please Comment !" ,  "warning" );
	   return false;
  }

  else
  {
	    var Application_id=$('#Application_Id').val();
		var credit_id=$('#credit_id').val();
		var Legal_name=$('#Legal_name').val();
	    var Comment=$('#Comment_by_Legal').val();
		var Cust_id=$('#id').val();
		var Legal_name=$('#User_name').val();
		//var Legal_doc= $('input[name="Legal_doc[]"]').val();
		var Legal_doc = $("input[name='Legal_doc[]']")
              .map(function(){return $(this).val();}).get();
		var categories = new Array();
		$("input[name='Legal_doc_status[]']").each(function (index, obj)
		{
			if($(this).is(":checked"))
			{
				categories.push('on');
			}
			else
			{
				categories.push('off');
			}
		})

	    var url = window.location.origin+"/dsa/dsa/index.php/Credit_manager_user/Revert_customer";
        $.ajax({
         type:'POST',
         url:url,
          // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
         data:{Application_id:Application_id,Comment:Comment,credit_id:credit_id,Legal_name:Legal_name,id:Cust_id,User_name:Legal_name,name:name,Legal_doc:Legal_doc,Legal_doc_status:categories},
         success:function(data){

                      if(data>0)
					  {
						  swal ( "Success" ,  "Revert To Credit Manager" ,  "success" );
					  }else
					  {
					  }



         }
        });
  }

});
/*-------------------------------------- Addded by papiha on 30_04_2022-------------------------------------------------------*/
/*---------------- added by papiha on  25_04_2022----------------------------------------*/
$( "#revert_to_legal" ).click(function(e) {
	
  //e.preventDefault ? e.preventDefault() : (e.returnValue = false);
 var comment = $('#comment_by_finaleap').val();
//  alert(comment);
 var name = $('#name').val();

 if(comment=='' || comment==' ')
 {


    swal ( "Oops" ,  "Please Comment !" ,  "warning" );
    return false;
 }

 
 

});
/*---------------------- Added by papiha on  27-04-2022----------------------------------*/
$( "#revert_technical" ).click(function(e) {
 
 e.preventDefault ? e.preventDefault() : (e.returnValue = false);
 var comment = $('#Comment_by_Legal').val();
 var name = $('#name').val();

 if(comment=='' || comment==' ')
 {


    swal ( "Oops" ,  "Please Comment !" ,  "warning" );
    return false;
 }

 else
 {
     var Application_id=$('#Application_Id').val();
   
   var credit_id=$('#credit_id').val();
   //var Legal_name=$('#Legal_name').val();
     var Comment=$('#Comment_by_Legal').val();
   var Cust_id=$('#id').val();
   var Legal_name=$('#User_name').val();
   //var Legal_doc= $('input[name="Legal_doc[]"]').val();
   var Legal_doc = $("input[name='Legal_doc[]']")
             .map(function(){return $(this).val();}).get();
   var categories = new Array();
   $("input[name='Legal_doc_status[]']").each(function (index, obj)
   {
     if($(this).is(":checked"))
     {
       categories.push('on');
     }
     else
     {
       categories.push('off');
     }
   })


     var url = window.location.origin+"/dsa/dsa/index.php/Credit_manager_user/Revert_customer_From_Technical";
       $.ajax({
        type:'POST',
        url:url,
         // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
        data:{Application_id:Application_id,Comment:Comment,credit_id:credit_id,Legal_name:Legal_name,id:Cust_id,User_name:Legal_name,name:name,Legal_doc:Legal_doc,Legal_doc_status:categories},
        success:function(data){

                     if(data>0)
           {
             swal ( "Success" ,  "Revert To Credit Manager" ,  "success" );
           }else
           {
           }



        }
       });
 }

});
/*--------------------------------- Addded by papiha on 03_05_2022----------------------------------------------------*/
$( "#revert_to_technical" ).click(function(e) {
	
  //e.preventDefault ? e.preventDefault() : (e.returnValue = false);
 var comment = $('#comment_by_finaleap_to_tech').val();
//  alert(comment);
 var name = $('#name').val();

 if(comment=='' || comment==' ')
 {


    swal ( "Oops" ,  "Please Comment !" ,  "warning" );
    return false;
 }

 
 

});
  

          //=====================for operations user changes by priya 054-05-2022
    $( "#select_dropdown_credit_allCustomers" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_dropdown_credit_allCustomers').val();
       
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/Credit_manager_user/customers?s=all");    
         
      }
      else if(select_dropdown_filters=="Completed_CAM")
      {
        
          window.location.replace("/dsa/dsa/index.php/Credit_manager_user/customers?s=Completed_CAM");   
         
      }
      else if(select_dropdown_filters=="Incomplete_CAM")
      {
         
          window.location.replace("/dsa/dsa/index.php/Credit_manager_user/customers?s=Incomplete_CAM");   
         
      }
        else if(select_dropdown_filters=="Completed_PD")
      {
         
          window.location.replace("/dsa/dsa/index.php/Credit_manager_user/customers?s=Completed_PD");   
         
      }
      
      }); 
       //for cluster connecter added by sonal on 13-05-2022
      //=====================for connector
	
    $( "#select_filters_connector_all" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_filters_connector_all').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Cluster_connector?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Cluster_connector?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Cluster_connector?s=Incomplete");    
         
      }
      }); 
      /*---------------------------------Added by sonal on 13-05-2022  From cluster/relationship_officer---------------------------------------------------*/
    $( "#select_dropdown_filters_relationship" ).change(function() 
    {
       ///	alert('select_category'); 
       var select_dropdown_filters = $('#select_dropdown_filters_relationship').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Cluster_RO?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Cluster_RO?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Cluster_RO?s=Incomplete");    
         
      }
     
    });
         /*-----------------------------------------Added By sonal on 13-05-2022 for cluster BM ---------------------------------------*/

       //=================================branch manager 
       $( "#select_dropdown_filters_branchManaer_admin" ).change(function() 
       {
        
          var select_dropdown_filters = $('#select_dropdown_filters_branchManaer_admin').val();
          if(select_dropdown_filters=="all")
         {
            window.location.replace("/dsa/dsa/index.php/admin/Cluster_BM?s=all");    
            
         }
         else if(select_dropdown_filters=="Complete")
         {
            window.location.replace("/dsa/dsa/index.php/admin/Cluster_BM?s=Complete");    
            
         }
         else if(select_dropdown_filters=="Incomplete")
         {
            window.location.replace("/dsa/dsa/index.php/admin/Cluster_BM?s=Incomplete");    
            
         }
         });
     /*-----------------------------------------Added By sonal on 13-05-2022 for cluster Dsa ---------------------------------------*/
     $( "#select_dropdown_filters_dsa" ).change(function() 
     {
        ///	alert('select_category'); 
        var select_dropdown_filters = $('#select_dropdown_filters_dsa').val();
        if(select_dropdown_filters=="all")
       {
          window.location.replace("/dsa/dsa/index.php/admin/Cluster_Dsa?s=all");    
          
       }
       else if(select_dropdown_filters=="Complete")
       {
          window.location.replace("/dsa/dsa/index.php/admin/Cluster_Dsa?s=Complete");    
          
       }
       else if(select_dropdown_filters=="Incomplete")
       {
          window.location.replace("/dsa/dsa/index.php/admin/Cluster_Dsa?s=Incomplete");    
          
       }
      
     });
      /*added by sonal 11-05-2022-----------Sales manager admin------------*/
     
  $( "#select_dropdown_filters_SalesManaer_admin" ).change(function() 
  {
   
     var select_dropdown_filters = $('#select_dropdown_filters_SalesManaer_admin').val();
     if(select_dropdown_filters=="all")
    {
     
       window.location.replace("/dsa/dsa/index.php/admin/Sales_Manager?s=all");    
       
    }
    else if(select_dropdown_filters=="Complete")
    {
       window.location.replace("/dsa/dsa/index.php/admin/Sales_Manager?s=Complete");    
       
    }
    else if(select_dropdown_filters=="Incomplete")
    {
       window.location.replace("/dsa/dsa/index.php/admin/Sales_Manager?s=Incomplete");    
       
    }
    });
      /*added by sonal 11-05-2022----------- manager admin------------*/
    //=================================manager admin
    $( "#select_dropdown_filters_manager_admin" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_dropdown_filters_manager_admin').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Manager?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Manager?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/Manager?s=Incomplete");    
         
      }
      });
        //for Branch connecter added by sonal on 14-05-2022
      //=====================for connector
	
    $( "#select_filters_connector_all_branch" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_filters_connector_all_branch').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_connector?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_connector?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_connector?s=Incomplete");    
         
      }
      }); 
       /*-----------------------------------------Added By sonal on 13-05-2022 for Branch Dsa ---------------------------------------*/
       $( "#select_dropdown_filters_dsa_branch" ).change(function() 
       {
          ///	alert('select_category'); 
          var select_dropdown_filters = $('#select_dropdown_filters_dsa_branch').val();
          if(select_dropdown_filters=="all")
         {
            window.location.replace("/dsa/dsa/index.php/admin/BranchManager_dsa?s=all");    
            
         }
         else if(select_dropdown_filters=="Complete")
         {
            window.location.replace("/dsa/dsa/index.php/admin/BranchManager_dsa?s=Complete");    
            
         }
         else if(select_dropdown_filters=="Incomplete")
         {
            window.location.replace("/dsa/dsa/index.php/admin/BranchManager_dsa?s=Incomplete");    
            
         }
        
       });
         /*---------------------------------Added by sonal on 14-05-2022  From Branch/relationship_officer---------------------------------------------------*/
    $( "#select_dropdown_filters_relationship_Branch" ).change(function() 
    {
       ///	alert('select_category'); 
       var select_dropdown_filters = $('#select_dropdown_filters_relationship_Branch').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_RO?s=all");    
         
      }
      else if(select_dropdown_filters=="Complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_RO?s=Complete");    
         
      }
      else if(select_dropdown_filters=="Incomplete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_RO?s=Incomplete");    
         
      }
     
    });

       //added by sonal on 14-05-2022 filter Branch customers
    //=================================customers all
    $( "#select_filters_customers_all_BM" ).change(function() 
    {
     
       var select_dropdown_filters = $('#select_filters_customers_all_BM').val();
       if(select_dropdown_filters=="all")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=all");    
         
      }
      else if(select_dropdown_filters=="Application_Completed")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=Application_Completed");    
         
      }
      else if(select_dropdown_filters=="Application_InCompleted")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=Application_InCompleted");    
         
      }
      else if(select_dropdown_filters=="Cam_Completed")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=Cam_Completed");    
         
      }
      else if(select_dropdown_filters=="PD_Completed")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=PD_Completed");    
         
      }
      else if(select_dropdown_filters=="income_details_complete")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=income_details_complete");    
         
      }
      else if(select_dropdown_filters=="Created")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=Created");    
         
      }
      else if(select_dropdown_filters=="reject")
      {
         window.location.replace("/dsa/dsa/index.php/admin/BranchManager_customers?s=reject");    
         
      }
      });
      
      /*----------------------------- Added by papiha on 06_05_2022-----------------------------------------------------*/
      $( "#Login_fees" ).click(function(e) {
        var Login_fees = $('#Login_fees_in_rs').val();
        var bank_id = $('#bank_id').val();
        
        swal({
          title: "Are you sure?",
          text: "You Want To Change Login Fees ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
             var url = window.location.origin+"/dsa/dsa/index.php/admin/Update_Login_Fees";
              $.ajax({
               type:'POST',
               url:url,
                // url:'<?php echo base_url("index.php/Api_Functions/Test_Voterid_verification"); ?>',
               data:{Login_Fees:Login_fees,bank_id:bank_id},
               success:function(data){
                   var obj =JSON.parse(data);
                 //alert(obj.id);
      
                            if(obj.id==true)
                  {
                    swal ( "Success" ,  "Login fees Update Successfully" ,  "success" );
                  }else
                  {
                     swal ( "warning" ,  "Error in Login fees Update" ,  "warning" );
                  }
      
      
      
               }
              });
          
        
          } else {
          
          }
        });
      });
      /*--------------------------- addded buy papiha on 03_06_2022-------------------------------------------------*/
      $( "#Start_Date_filter" ).change(function()
      {
  
         var Start_Date = $('#Start_Date_filter').val();
       var End_Date=$('#End_Date_filter').val();
       var filter=$('#select_filters_customers_admin').val();
       var range=$('#Billing_month').val();
       
         window.location.replace("/dsa/dsa/index.php/Admin/Admin_customers?Start_Date="+Start_Date+"&End_Date="+End_Date+"&filter="+filter+"&range="+range);
  
        
      });
    
    $( "#Billing_month" ).change(function()
      {
  
         var value=$("#Billing_month").val();
      
         var Start_Date = $('#Start_Date_filter').val();
       var End_Date=$('#End_Date_filter').val();
       var filter=$('#select_filters_customers_admin').val();
       var range=$('#Billing_month').val();
         if(value=='Current_Month' )
  
      {
        
        var el_down = document.getElementById("Start_Date");
           var date = new Date();
          // document.write("Current Date: " + date );
           var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
  
          var dd = firstDay.getDate();
          var mm = firstDay.getMonth() + 1;
  
          var yyyy = firstDay.getFullYear();
          if (dd < 10) {
            dd = '0' + dd;
          }
          if (mm < 10) {
            mm = '0' + mm;
          }
          var firstDay =  yyyy+ '-' + mm + '-'+ dd;
          //$('#Start_Date').val(firstDay);
          //$('#Start_Date').prop('readonly', true);
          var lastDay =
          new Date(date.getFullYear(), date.getMonth() + 1, 0);
          var dd = lastDay.getDate();
          var mm = lastDay.getMonth() + 1;
  
          var yyyy = lastDay.getFullYear();
          if (dd < 10) {
            dd = '0' + dd;
          }
          if (mm < 10) {
            mm = '0' + mm;
          }
          var lastDay =  yyyy+ '-' + mm + '-'+ dd;
          //$('#End_Date').val(lastDay);
          //$('#End_Date').prop('readonly', true);
                  window.location.replace("/dsa/dsa/index.php/Admin/Admin_customers?Start_Date="+firstDay+"&End_Date="+lastDay+"&filter="+filter+"&range="+range);
      }
      if(value=='Previous_Month')
  
      {
           var el_down = document.getElementById("Start_Date");
           var date = new Date();
          // document.write("Current Date: " + date );
           var firstDay = new Date(date.getFullYear(), date.getMonth()- 1, 1);
  
          var dd = firstDay.getDate();
          var mm = firstDay.getMonth() + 1;
  
          var yyyy = firstDay.getFullYear();
          if (dd < 10) {
            dd = '0' + dd;
          }
          if (mm < 10) {
            mm = '0' + mm;
          }
          var firstDay =  yyyy+ '-' + mm + '-'+ dd;
         // $('#Start_Date').val(firstDay);
         // $('#Start_Date').prop('readonly', true);
          var lastDay =
          new Date(date.getFullYear(), date.getMonth() , 0);
          var dd = lastDay.getDate();
          var mm = lastDay.getMonth() + 1;
  
          var yyyy = lastDay.getFullYear();
          if (dd < 10) {
            dd = '0' + dd;
          }
          if (mm < 10) {
            mm = '0' + mm;
          }
          var lastDay =  yyyy+ '-' + mm + '-'+ dd;
          //$('#End_Date').val(lastDay);
         // $('#End_Date').prop('readonly', true);
          window.location.replace("/dsa/dsa/index.php/Admin/Admin_customers?Start_Date="+firstDay+"&End_Date="+lastDay+"&filter="+filter+"&range="+range);
      }
      if(value=='Select_Range')
      {
        alert("hello");
        if ( $('#Start_Date_filter').is('[readonly]') ) { $('#Start_Date_filter').prop('readonly', false); }
        if ( $('#End_Date_filter').is('[readonly]') ) { $('#End_Date_filter').prop('readonly', false); }
        $('#Start_Date_filter').val('');
        $('#End_Date_filter').val('');
         
      }
        
      });
    
    $( "#End_Date_filter" ).change(function()
      {
  
         var Start_Date = $('#Start_Date_filter').val();
       var End_Date=$('#End_Date_filter').val();
       var filter=$('#select_filters_customers_admin').val();
       var range=$('#Billing_month').val();
       
          window.location.replace("/dsa/dsa/index.php/Admin/Admin_customers?Start_Date="+Start_Date+"&End_Date="+End_Date+"&filter="+filter+"&range="+range);
  
        
      });
    
    $( "#select_filters_customers_admin" ).change(function()
      {
  
         var Start_Date = $('#Start_Date_filter').val();
       var End_Date=$('#End_Date_filter').val();
       var filter=$('#select_filters_customers_admin').val();
       var range=$('#Billing_month').val();
       
          window.location.replace("/dsa/dsa/index.php/Admin/Admin_customers?Start_Date="+Start_Date+"&End_Date="+End_Date+"&filter="+filter+"&range="+range);
  
        
      });
        
      
      
      

         
      