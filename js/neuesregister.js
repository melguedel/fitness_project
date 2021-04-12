$('document').ready(function() {   
    /* handle form validation */  
    $(".register-form").validate({
        rules:
     {
     username: {
        required: true,
        minlength: 3
     },
     password: {
        required: true,
        minlength: 8,
        maxlength: 15
     },
     email: {
        required: true,
        email: true
              },
      },
         messages:
      {
              username: "please enter user name",
              password:{
                        required: "please provide a password",
                        minlength: "password at least have 8 characters"
                       },
              email: "please enter a valid email address",
         },
      submitHandler: submitForm 
         });  
      /* handle form submit */
      function submitForm() {  
      let data = $(".register-form").serialize();    
      $.ajax({    
      type : 'POST',
      url  : 'nochmalneu.php',
      data : data,
      success :  function(response) {      
          if(response==1){         
               $(".error-message").fadeIn(1000, function(){
                 $(".error-message").html("<p class=error-message>Oh no!</p>");                   
               });                    
          } else {          
               $(".error-message").fadeIn(1000, function(){           
                    $(".error-message").html('<p class="error-message'+data+' !</p>');                   
               });           
             }
          }
      });
      return false;
    }
  });