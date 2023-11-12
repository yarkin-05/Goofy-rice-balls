function getAll(students)
{
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
  });
}

function detail(student){
  let pop = 'div class="popup">';
    pop += `<span class="popuptext" id="myPopup">Popup text...</span>`;
}

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

      let id = -1;
      let decision = $(this).attr('value'); // action
      console.log(this);
      id = $(this).attr('name'); // id
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
          console.log('message: ' + msg); //response of server
          console.log(typeof(msg)); //type of response

          if (decision === 'show'){
            $("#table tbody tr").remove(); //removrs the tables body          
            let students = JSON.parse(msg); //parsing into json array to execute the DOM manipulation
            getAll(students);
          }
          if (decision === 'details'){

          }

          }
          }).error(function(response){
            console.log('error hi ' + response);
          });
      });
})
      
 