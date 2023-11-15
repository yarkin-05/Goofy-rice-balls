$(document).ready(function(){

  $('#Register').click(function(e){
    let page = 'login';
    let name = $('#name').val();
    let username = $('#user').val();
    let last = $('#last_name').val();
    let birthday = $('#birthday').val();
    console.log(page+' '+name+' '+username+' '+last+' '+birthday);
    $.ajax({
      url:'server.php',
      type: 'POST',
      data:{
        'page': page,
        'name' : name,
        'username': username,
        'last_name': last,
        'birthday': birthday
      },
      success: function(msg){
        console.log(msg);
        console.log('login was a success!');
        console.log('enjoy your stay');
       // window.location.href = 'password.php';
      }
    }).error(function(msg){
      console.log('error hi ' + msg);
      
    });
  })





})