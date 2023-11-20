function isEmpty(str){
  return (!str || str.length === 0);
}

$(document).ready(function(){

  $('#login').click(function(e){
    e.preventDefault();
    e.stopPropagation();

    let username = $('#username').val();
    let password = $('#password').val();
    console.log(username + ' ' + password);

    if(!isEmpty(username) && !isEmpty(password)){
      let div = document.getElementById('validation');
      div.innerHTML = '';

      $.ajax({
        url: 'server.php',
        type: 'POST',
        data: {
          'action' : 'login',
          'username' : username,
          'password' : password
        },
        success: function(msg){
          console.log('server responded with: ' + msg);
          window.location.href = 'profile.php';
        }
      }).fail(function(jqXHR, textStatus, errorThrown){
        console.log('error: ' + textStatus);
      })
    }else{
      let div = document.getElementById('validation');
      div.innerHTML = 'Form invalid, please do not leave anything blank';
    }
  });

  $('#register').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    let name = $('#name').val();
    let username = $('#username').val();
    let email = $('#email').val();
    let role = $('#role').val();
    let password = $('#password').val();
    console.log(name + ' ' + username + ' ' + email + ' ' + role + ' ' + password);
    if(!isEmpty(username) && !isEmpty(email) && !isEmpty(role) && !isEmpty(password)){

      let div = document.getElementById('validation');
      div.innerHTML = '';
      
      //si no son vacios
      $.ajax({
        url:'server.php',
        type: 'POST',
        data:{
          'action': 'register',
          'name': name,
          'username': username,
          'email': email,
          'role': role,
          'password': password 
        },
        success: function(msg){
          console.log('server response: ' + msg)
          window.location.href = 'create_profile.php';
        }
      }).fail(function(jqXHR, textStatus, errorThrown){
        console.log('error: ' + textStatus);
     })
    }else{
      let div = document.getElementById('validation');
      div.innerHTML = 'Form invalid, please do not leave anything blank';
    }
  });
})

