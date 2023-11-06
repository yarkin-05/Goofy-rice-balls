$(document).ready(function () {
  //container to output the image
  let image_popup = document.querySelector('.image-popup');

  //iterate the images and apply the onclick event to each individual image
  document.querySelectorAll('.images a').forEach(img_link => {
    //for each image class link
    img_link =onclick = e =>{
      e.preventDefault();
      let img_meta = img_link.querySelector('img');
      let img = new Image();
      img.onload = () => {
        //create the pop out image
        image_popup.innerHTML = `
          <div class = "con">
            <h3>${img_meta.dataset.title}</h3>
            <p>${img.meta.alt}</p>
            <img src=${img.src} "width="${img.width}" height="${img.height}">
            <a href="delete.php?id=${img_meta.dataset.id}" class="trash" title="Delete Image"><i class="fas fa-trash fa-xs"></i></a>
          </div>
        `;
        image_popup.computedStyleMap.display = 'flex';
      };
      img.src = img_meta.src;
    };
  });

  //hide the image popup container, but only if the user clicks outside the image
  image_popup.onclick = e =>{
    if(e.target.className == 'image-popup'){
      image_popup.computedStyleMap.display = "none";
    }
  };
});


