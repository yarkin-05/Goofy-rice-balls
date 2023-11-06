function time(){
  const d = new Date; //new date object

  
  let msj = document.createElement('p'); //msj en msj
  let time = document.createElement('p');

  if( d.getHours() >= 19 || d.getHours() <= 4) msj.textContent = "Buenas Noches" ;
  else if(d.getHours() >= 5 && d.getHours() <= 12) msj.textContent = "Buenos dias";
  else if(d.getHours() >= 12 && d.getHours() <= 18) msj.textContent="Buenas tardes";
  time.textContent = hours+":"+minutes+":"+seconds;
  $('#reloj').html(time);
  $('#msg').html(msj)

  let clock = document.querySelector('#reloj');
  let show_message = document.querySelector('#msg');

}

$(document).ready(function(){
  setInterval(time,1000); //call time() every second
})