
// Registration Validation with AJAX

$(document).ready(function(){

$(".register-form").submit(function(e) {
    // Neuladen der Seite verhindern
    e.preventDefault();
    
    // Variablen erstellen
    let gender = $("#validate-gender").val();
    let username = $("#validate-username").val();
    let email = $("#validate-email").val();
    let password = $("#validate-password").val();
    let agb = $("#validate-agb").val();
    let submit = $("#validate-submit").val();

    $(".error-message").load("Validation.php", {
        gender: gender,
        username: username,
        email: email,
        password: password,
        agb: agb,
        submit: submit
    });
});

});