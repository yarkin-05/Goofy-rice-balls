function time(){
  const d = new Date; //new date object
  let hours = d.getHours();
  let minutes  = d.getMinutes();
  let seconds =  d.getSeconds();

  //console.log(time);
  console.log(hours);
  console.log(minutes);
  console.log(seconds);
  let msj = document.createElement('p'); //msj en msj
  let time = document.createElement('p');

  if( hours >= 19 || hours <= 4){ msj.textContent = "Buenas Noches" ;}
  else if(hours >= 5 && hours <= 12) {msj.textContent = "Buenos dias";}
  else if(hours >= 12 && hours <= 18) {msj.textContent="Buenas tardes";}
  time.textContent = hours+":"+minutes+":"+seconds;


  let clock = document.querySelector('#reloj');
  let show_message = document.querySelector('#msg');

  clock.appendChild(time);
  show_message.appendChild(msj);

}

$(document).ready(function(){
  setInterval(time,1000); //call time() every second
})