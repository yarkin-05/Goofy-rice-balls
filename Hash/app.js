$(document).ready(function(){

  $('#register').click(function(e){
    // Log to check if the click event is firing
    e.preventDefault();
    console.log('register button clicked');

    let page = 'register';
    let name = $('#name').val();
    let username = $('#user').val();
    let last = $('#last_name').val();
    let birthday = $('#birthday').val();

    $.ajax({
      url:'server.php',
      type: 'POST',
      data:{
        'page': page,
        'name' : name,
        'username': username,
        'last_name': last,
        'birthday': birthday,
        'password': '0000'
      },
      success: function(msg){
        // Log to check if the success callback is executed
        window.location.href = 'password.php';
        
      },
      error: function(xhr, status, error){
        // Log to check if there's an error in the AJAX request
        console.log('AJAX request failed!');
        console.log('Status:', status);
        console.log('Error:', error);
       
      }
    });
  });

  $('#password_change').click(function(e){
    // Log to check if the click event is firing
    e.preventDefault();
    let new_password = $('#new_password').val();
    let check_password = $('#check_password').val();

    if (new_password === check_password){
      //contraseñas iguales, procede
      console.log('new: ' + new_password + ' , check: ' + check_password);
      $.ajax({
        url:'server.php',
        type: 'POST',
        data:{
          'page': 'password',
          'password': new_password,
          'check_password': check_password
        },
        success: function(msg){
          // Log to check if the success callback is executed
          console.log(msg);
          //window.location.href = 'courses.php';
          
        },
        error: function(xhr, status, error){
          // Log to check if there's an error in the AJAX request
          console.log('AJAX request failed!');
          console.log('Status:', status);
          console.log('Error:', error);
         
        }
      });
    }else{
      console.log('Passwords dont match');
    }
    
  });

  $('#login').click(function(e){
    // Log to check if the click event is firing
    e.preventDefault();
    console.log('login button clicked');

    let page = 'login';
    let username = $('#usern').val();
    let password = $('#password_login').val();
    
  
    $.ajax({
      url:'server.php',
      type: 'POST',
      data:{
        'page': page,
        'username': username,
        'password': password
      },
      success: function(msg){
        // Log to check if the success callback is executed
        console.log(msg);
        //window.location.href = 'courses.php';
        
      },
      error: function(xhr, status, error){
        // Log to check if there's an error in the AJAX request
        console.log('AJAX request failed!');
        console.log('Status:', status);
        console.log('Error:', error);
       
      }
    });
  });
});
