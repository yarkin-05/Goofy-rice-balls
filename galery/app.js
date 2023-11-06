$(document).ready(function () {
  let arr = new Array();
  let list = $('#imageList');

  $('#upload').click(function (event) {
    // Triggered when a file is loaded :)
    event.preventDefault();
    let fd = new FormData();

    let files = $('#file')[0].files[0]; // Retrieves the first image that was uploaded

    if (files !== undefined) {
      fd.append('file', files); // Appends the image file

      $.ajax({
        url: "server.php",
        type: "POST",
        data: fd,
        processData: false,  // Tell jQuery not to process the data
        contentType: false,  // Tell jQuery not to set contentType
        success: function (response) {
          let str = response;
          arr = str.split(",\n"); // Adds the URLs of the images to the array

          // Clear the existing list
          list.empty();

          // Loop through the array and add images to the list
          for (let i = 0; i < arr.length; i++) {
            try {
              let li = document.createElement("li");
              let image = document.createElement("img");
              let aux = "galeria/" + arr[i];
              console.log(aux);
              image.setAttribute("src", aux);
              li.append(image);
              list.append(li);
            } catch (error) {
              console.log("Image not found");
            }
          }

          console.log(arr);
        },
        error: function (response) {
          console.log(response);
        }
      });

      return false;
    } else {
      console.log("There's no image to upload");
    }
  });
});
