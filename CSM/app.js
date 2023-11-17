(function () {
  'use strict' //stricter rules for js
  const forms = document.querySelectorAll('.requires-validation') //returns a nodelist that requre validation
  Array.from(forms) //covnerts to an array and uses for each
    .forEach(function (form) {
      //for each form, it adds a submit event listener 
      form.addEventListener('submit', function (event) {
        //when a for is submitted, it checks if the form is invalid
        if (!form.checkValidity()) {
          //if invalid, prevents default from submission and stops event propagation
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated') //adds validation
      }, false) //event in the bubbling phase
    })
  })()
//IIFE -> function that inmediately executed right after its definition, encapsulating te code and preventing variable pollution in the global scope

$(document).ready(function(){

  $('#register').submit(function(e){
    e.preventDefault();
    let username = $('#username').val();
    let email = $('#email').val();
    let role = $('#role').attr('value');
    let password = $('#password').val();

    if(!empty(username) && !empty(email) && !empty(role) && !empty(password)){

      $.ajax({
        url:'server.php',
        type: 'POST',
        data:{
          'action': 'register',
          'username': username,
          'email': email,
          'role': role,
          'password': password 
        },
        success: function(msg){
          console.log('server response: ' + msg)
        }
      }).error(function(msg){
        console.log('error: ' + msg);
      })
    }
  });
})