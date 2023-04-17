function displayImage(imageUrl) {
    // Get the overlay and image elements
    var overlay = document.getElementById("overlay");
    var image = document.getElementById("image-display");
    
    // Set the image source and display the overlay
    image.src = imageUrl;
    overlay.style.display = "block";
    
    // Hide the overlay when clicked
    overlay.onclick = function() {
      overlay.style.display = "none";
    }
  }
  