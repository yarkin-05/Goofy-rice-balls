$(document).ready(function(){

    $('#Register').click(function(e){
      e.preventDefault();
      //literal añidio un registro
      $.ajax({
        url:'studentsController.php',
        type:'POST',
        data:{
          'action': 'Register',
          'username': $('#username').value,
          'name': $('#username').value,
          'lastname' : $('#lastname').value,
          'birthdate' : $('#birthdate').value
        },
        success: function(msg){
          console.log('User added! '. msg);
          headers('/students');
        }
      }).error(function(msg){
        console.log('Problem with uploading user ' . msg );
      });
    })

    

    $('button[type=submit]').click(function(e){
      e.preventDefault();

      let decision = $(this).name; //lo que tiene que hacer
      let id = $(this).val(); //el id donde lo tiene que hacer

      $.ajax({
        url:'studentsController.php',
        type: 'POST',
        data:{
          'action': decision,
          'id': id
        },
        success: function(msg){
          console.log(msg);   
        }
        }).error(function(response){
            console.log('error ' + response);
          });
      });
})
      
 