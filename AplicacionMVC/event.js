$(document).ready(function(){

  $('input[type=button]').click(function(){

    let decision = $(this).val(); //valor de lo que sea que le haya picado
    let id = $(this).val();

    $.ajax({
      url:'studentsController.php',
      type: 'POST',
      data:{
        'action': decision,
        'id':id
      },
      success: function(msg){
        console.log(msg);
      }
    }).error(function(response){
      console.log(response);
    });
  })
})