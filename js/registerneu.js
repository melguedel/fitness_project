$(document).ready(function() {                 
    $(".login-form").submit(function(e){
      e.preventDefault();
      $.ajax({
      url:'check.php',
      type:'POST',
      data: {username:$("#userName").val(), password:$("#pass").val()},
      success: function(resp) {
         if(resp == "invalid") {
          $("#error-login").html("Invalid username and password!");  
         } else {
          window.location.href= resp;
         }
      }
     });
  });
});