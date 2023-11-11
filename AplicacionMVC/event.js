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

    

    $('input[type=submit]').click(function(e){
      e.preventDefault(e);

      let decision = $(this).attr('value'); // Use 'attr' to get the value attribute
      console.log(this);
      let id = $(this).attr('name'); // Use 'attr' to get the name attribute
      console.log('decision: ' + decision);
      console.log('id: ' + id);
  
      $.ajax({
        url:'studentsController.php',
        type: 'GET',
        data:{
          'action': decision,
          'id': id
        },         
        success: function(msg){
          console.log(msg);   
          /*let students = JSON.parse(msg);

            // Manipulate the DOM to display the information
            students.forEach(student => {
                // Create and append HTML elements based on the data
                
                let row = '<tr>';
                row += `<th>${student.username}</th>`;
                row += `<th>${student.name}</th>`;
                row += `<th>${student.last_name}</th>`;
                row += `<th>${student.birthdate}</th>`;
                row += `<th> <input type='submit' name='${student.id}' id='delete' value='delete'> </th>`;
                row += `<th> <input type='submit' name='${student.id}' id='details' value='details'> </th>`;
                row += `<th> <input type='submit' name='${student.id}' id='update' value='update'> </th>`;
                row += '</tr>';

                // Append the row to the table
                $('#table').append(row);

              });*/
            }
          }).error(function(response){
            console.log('error hi ' + response);
          });
      });
})
      
 