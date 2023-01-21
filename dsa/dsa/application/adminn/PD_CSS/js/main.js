$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<span class="title">#title#</span>',
        labels: {
            previous : 'Previous',
            next : 'Next Step',
            finish : 'Final Step',
            current : ''
        }
    });


        //hang on event of form with id=myform
        $("#myform").submit(function(e) {
           

            let x = document.forms["myform"]["first-name"].value;
            if (x == "") {
                swal("success!", "PAN verified Sucessfully!", "success");
                return false;
            }
            else
            {

            }



            //prevent Default functionality
            e.preventDefault();
    
            //get the action-url of the form
            var actionurl = e.currentTarget.action;
    
            //do your own request an handle the results
            $.ajax({
                    url: actionurl,
                    type: 'post',
                    dataType: 'application/json',
                    data: $("#myform").serialize(),
                    success: function(data) {
                        
                    }
            });
    
        });
    
   
    
});


function getDate(){
    var today = new Date();

document.getElementById("Date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);


}


   


