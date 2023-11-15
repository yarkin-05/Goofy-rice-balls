$(document).ready(function(){

  $('#Register').click(function(e){
    // Log to check if the click event is firing
    console.log('Register button clicked');

    let page = 'login';
    let name = $('#name').val();
    let username = $('#user').val();
    let last = $('#last_name').val();
    let birthday = $('#birthday').val();
    
    // Log to check the values being sent in the AJAX request
    /*console.log('Sending AJAX request with values:');
    console.log('page:', page);
    console.log('name:', name);
    console.log('username:', username);
    console.log('last:', last);
    console.log('birthday:', birthday);*/

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
        console.log('AJAX request successful!');
        console.log('Server response:', msg);

        console.log('login was a success!');
        console.log('enjoy your stay');
        setTimeout(function() {
          window.location.href = 'password.php';
        }, 30000);
      },
      error: function(xhr, status, error){
        // Log to check if there's an error in the AJAX request
        console.log('AJAX request failed!');
        console.log('Status:', status);
        console.log('Error:', error);
        setTimeout(function() {
          window.location.href = 'password.php';
        }, 30000);
      }
    });
  });
});
