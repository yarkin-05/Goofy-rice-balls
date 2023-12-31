$(document).ready(function () {
  // Container to output the image
  let image_popup = document.querySelector('.image-popup');

  // Iterate the images and apply the onclick event to each individual image
  document.querySelectorAll('.images a').forEach(img_link => {
    // Add a click event listener to each image link
    img_link.addEventListener('click', (e) => {
      e.preventDefault();
      let img_meta = img_link.querySelector('img');
      let img = new Image();
      img.onload = () => {
        // Create the pop-out image
        image_popup.innerHTML = `
          <div class="con">
            <h3>${img_meta.dataset.title}</h3>
            <p>${img_meta.alt}</p>
            <img src="${img.src}" width="${img.width}" height="${img.height}">
            <a href="delete.php?id=${img_meta.dataset.id}" class="trash" title="Delete Image">
              <i class="fas fa-trash fa-xs"></i>
            </a>
          </div>
        `;
        image_popup.style.display = 'flex';
      };
      img.src = img_meta.src;
    });
  });

  // Hide the image popup container if the user clicks outside the image
  if(image_popup !== null){
    image_popup.addEventListener('click', (e) => {
      if (e.target.className === 'image-popup') {
        image_popup.style.display = 'none';
      }
    });
  }
});
