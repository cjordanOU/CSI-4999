/* ------ ------ Declarations ------ ------ */
var mediaQuery = window.matchMedia("screen and (max-width: 1199px)");

function HeaderScroll() {
    var headerExists = document.getElementById("header");
    if (headerExists != null) {
      // Changes the styling on the webpage header when the user scrolls the mouse down from the top of the page
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        // When the webpage is scrolled 50px or more
        document.getElementById("header").style.cssText = "height: 4.5em; max-height: 4.5em; padding: 1vh 3%; box-shadow: 0 0 4px rgba(0,0,0,.14), 0 4px 8px rgba(0,0,0,.28);";
      } else {
        // When the webpage is not scrolled
        document.getElementById("header").style.cssText = "height: 6.5em; max-height: 6.5em;";
      }
    }
    else {
        print("HEADER ERROR");
    }
  }