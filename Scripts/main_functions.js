/* ------ ------ Declarations ------ ------ */
var prefix = "Images/Slideshow/";
var imageArray = new Array(4);

for (i=0; i<imageArray.length; i++){
  imageArray[i] = prefix + (i+1) + ".jpg";
}
var imageCounter = 0;

function rotate() {
  var imageObject = document.getElementById('slideshowImage');
  //var imageContainer = imageObject.parentNode;
  //removes and adds animation class so it fires everytime the image changes
  imageObject.classList.remove('fade');
  setTimeout(function(){
      imageObject.classList.add('fade');
      imageObject.style.backgroundImage = "url('"+imageArray[imageCounter]+"')";
      ++imageCounter;
      if (imageCounter >= 4) imageCounter = 0;
  }, 50);
}

function startSlideshow() {
  document.getElementById('slideshowImage').style.backgroundImage=imageArray[1];
  setInterval('rotate()', 4500);
}