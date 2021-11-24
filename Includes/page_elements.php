<?php
    /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // Page Elements script
    // This file contains the logic for populating page elements such as the header and footer.
    // We use this file to create them, so that we can change elements on multiple pages without
    // having to go back to all of pages and change them. (Essentially Model/View/Controller).
    /* ------------------------------------------------------------------------------------- */


    function loginCheckRedirect() {
        // Check to see if the user is logged in, if not then redirect to the login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login.php?warning=notLoggedIn");
            exit;
        }
    }

    // Creates and populates the header of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displayHeader() {
        loginCheckBasic();
        echo '<header id="header"><div class="header-top">';
        echo '<a href="index.php" title="logo" class="header-logo"><img src="Images/GrizzChat_Logo.png" alt="Grizzchat Logo"></a><input class="header-search" type="search" placeholder="Search..">';
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            echo '<a href="login.php" title="Click here to log in" class="header-login button-1">Login</a><a href="signup.php" title="Click here to sign up" class="header-signup button-1 button-dark">Sign Up</a>';
        }
        else {
            echo '<a href="profile.php" title="Click here to view your profile" class="header-login button-1">My Profile</a><a href="Includes/signout.php" title="Click here to sign out of your account" class="header-signup button-1 button-dark">Sign Out</a>';
        }
        echo '</div><div class="header-bottom"><nav class="header-container">';
        echo '<a href="https://moodle.oakland.edu" title="Click here to visit the Oakland University Moodle website"  target="_blank">Moodle</a><section></section><a href="https://mysail.oakland.edu" title="Click here to visit the Oakland University MySail website" target="_blank">MySail</a><section></section><a href="#" title="Placeholder Header Link">Notifications</a>';
        echo '<section></section><a href="contact.php" title="Click here to visit our Contact Us page">Contact</a><section></section><a href="#" title="Placeholder Header Link">About Us</a>';
        echo '</nav></div></header>';
    }

    // Creates and populates the footer of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displayFooter() {
        echo '<footer><div><h4 class="footer-logo">GrizzChat</h4><nav><a href="index.php" title="Return to the homepage">Home</a><a href="#" title="Placeholder Link">Notifications</a>';
        echo '<a href="#" title="Placeholder Link">Contact</a><a href="#" title="Placeholder Link">About Us</a></nav><p class="footer-copyright">Copyright © 2021</p></div>';
        echo '<div><address><a href="#" title="Placeholder Link">Contact</a><a href="#" title="Placeholder Link">About Us</a><a href="#" title="Placeholder Link">Placeholder</a></address></div>';
        echo '<div><p>Our Motto:</p><p>Connect with y<span class="footer-ou">OU</span>r Community</p></div></footer>';
    }

    // Creates and populates the sidebar of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displaySidebarNavigation() {
        echo '<aside class="forum-navbar-container"><section class="forum-navbar-topbar"></section><section class="forum-navbar-content"><h3>Forum Navigation</h3><nav>';
        echo '<a href="posts.php" title="View posts made by users">View Posts</a><a href="maps.php" title="View the Alumni Map">Alumni Map</a><a href="#" title="Placeholder Sidebar Link">Meet an Alumni</a>';
        echo '<a href="#" title="Placeholder Sidebar Link">Pinned Class #1</a><a href="#" title="Placeholder Sidebar Link">Pinned Class #2</a><a href="#" title="Placeholder Sidebar Link">Pinned Class #3</a>';
        echo '</nav></section></aside>';
    }

    // Checks to see if the user is logged in already or not
    function loginCheckBasic() {
        // Initialize the session
        session_start();

        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        }
    }
