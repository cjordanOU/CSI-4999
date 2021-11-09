<?php
    /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // Page Elements script
    // This file contains the logic for populating page elements such as the header and footer.
    // We use this file to create them, so that we can change elements on multiple pages without
    // having to go back to all of pages and change them. (Essentially Model/View/Controller).
    /* ------------------------------------------------------------------------------------- */


    // Creates and populates the header of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displayHeader() {
        echo '<header id="header"><div class="header-top">';
        echo '<a href="index.php" title="logo" class="header-logo"><img src="Images/GrizzChat_Logo.png" alt="Grizzchat Logo"></a><input class="header-search" type="search" placeholder="Search..">';
        echo '<a href="login.php" title="Click here to log in" class="header-login button-1">Login</a><a href="signup.php" title="Click here to sign up" class="header-signup button-1 button-dark">Sign Up</a>';
        echo '</div><div class="header-bottom"><nav class="header-container">';
        echo '<a href="https://moodle.oakland.edu" title="Placeholder Header Link">Moodle</a><section></section><a href="https://mysail.oakland.edu" title="Placeholder Header Link">MySail</a><section></section><a href="#" title="Placeholder Header Link">Notifications</a>';
        echo '<section></section><a href="#" title="Placeholder Header Link">Contact</a><section></section><a href="#" title="Placeholder Header Link">About Us</a>';
        echo '</nav></div></header>';
    }

    // Creates and populates the footer of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displayFooter() {
        echo '<footer><div><h4 class="footer-logo">GrizzChat</h4><nav><a href="index.php" title="Return to the homepage">Home</a><a href="#" title="Placeholder Link">Placeholder</a>';
        echo '<a href="#" title="Placeholder Link">Placeholder</a><a href="#" title="Placeholder Link">Placeholder</a></nav><p class="footer-copyright">Copyright © 2021</p></div>';
        echo '<div><address><a href="#" title="Placeholder Link">Placeholder</a><a href="#" title="Placeholder Link">Placeholder</a><a href="#" title="Placeholder Link">Placeholder</a></address></div>';
        echo '<div><p>Our Motto:</p><p>Motto Here</p></div></footer>';
    }

    // Creates and populates the sidebar of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displaySidebarNavigation() {
        echo '<aside class="forum-navbar-container"><section class="forum-navbar-topbar"></section><section class="forum-navbar-content"><h3>Forum Navigation</h3><nav>';
        echo '<a href="#" title="Placeholder Sidebar Link">Placeholder</a><a href="#" title="Placeholder Sidebar Link">Placeholder</a><a href="#" title="Placeholder Sidebar Link">Placeholder</a>';
        echo '<a href="#" title="Placeholder Sidebar Link">Placeholder</a><a href="#" title="Placeholder Sidebar Link">Placeholder</a><a href="#" title="Placeholder Sidebar Link">Placeholder</a>';
        echo '</nav></section></aside>';
    }