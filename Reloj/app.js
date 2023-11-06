var currentTime = '';

function time(){
  const d = new Date; //new date object
  let time = d.toTimeString();
  let hours = d.getHours();
  let minutes  = d.getMinutes();
  let seconds =  d.getSeconds();

  //console.log(time);
  console.log(hours);
  console.log(minutes);
  console.log(seconds);
  
  currentTime = hours+":"+minutes+":"+seconds;
  console.log(currentTime);

  if( hours >= 19 && hours <= 4) console.log("Buenas noches");
  else if(hours >= 5 && hours <= 12) console.log("Buenos dias");
  else if(hours >= 12 && hours <= 18) console.log("Buenas tardes");


}

$(document).ready(function(){
  setInterval(time,1000); //call time() every second
})