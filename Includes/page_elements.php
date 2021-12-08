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
            $sql = "SELECT PREFERRED_FONT FROM profile_info WHERE LINKED_USER_ID={$_SESSION["id"]}";
            $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
            $result = $dbConnection-> query($sql);
            echo '<a href="profile.php" title="Click here to view your profile" class="header-login button-1">My Profile</a><a href="Includes/signout.php" title="Click here to sign out of your account" class="header-signup button-1 button-dark">Sign Out</a>';
            if ($result-> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    if ($row["PREFERRED_FONT"] == "Default") {
                        // Do nothing
                    }
                    if ($row["PREFERRED_FONT"] == "comic_sans") {
                        echo '<style>* {font-family:"Comic Sans MS"!important;}</style>';
                    }
                    if ($row["PREFERRED_FONT"] == "Times_New_Roman") {
                        echo '<style>* {font-family:"Times New Roman"!important;}</style>';
                    }
                    if ($row["PREFERRED_FONT"] == "Helvetica") {
                        echo '<style>* {font-family:"Helvetica"!important;}</style>';
                    }
                    if ($row["PREFERRED_FONT"] == "Tahoma") {
                        echo '<style>* {font-family:"Tahoma"!important;}</style>';
                    }
                    if ($row["PREFERRED_FONT"] == "Garamond") {
                        echo '<style>* {font-family:"Garamond"!important;}</style>';
                    }
                    if ($row["PREFERRED_FONT"] == "Courier_New") {
                        echo '<style>* {font-family:"Courier New"!important;}</style>';
                    }
                }

            }

            
        }
        echo '</div><div class="header-bottom"><nav class="header-container">';
        echo '<a href="https://moodle.oakland.edu" title="Click here to visit the Oakland University Moodle website"  target="_blank">Moodle</a><section></section><a href="maps.php" title="Click here to visit the Alumni Map">Alumni Map</a><section></section><a href="forum.php" title="View forum posts">Forum</a>';
        echo '<section></section><a href="contact.php" title="Click here to visit our Contact Us page">Contact</a><section></section><a href="about.php" title="View information about our organization">About Us</a>';
        echo '</nav></div></header>';
    }

    // Creates and populates the footer of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displayFooter() {
        echo '<footer><div><h4 class="footer-logo">GrizzChat</h4><nav><a href="index.php" title="Return to the homepage">Home</a><a href="forum.php" title="View the forum">Forum</a>';
        echo '<a href="contact.php" title="View the contact page">Contact</a><a href="about.php" title="View the about us page">About Us</a></nav><p class="footer-copyright">Copyright © 2021</p></div>';
        echo '<div><address><a href="contact.php" title="View the contact page">Contact</a><a href="maps.php" title="View the alumni map">Alumni Map</a><a href="#" title="Return to the top of the page">Back to Top</a></address></div>';
        echo '<div><p>Our Motto:</p><p>Connect with y<span class="footer-ou">OU</span>r Community</p></div></footer>';
    }

    // Creates and populates the sidebar of the website on pages when the function is called.
    // Remember to make sure you have page_elements.php included in the frontend file if you are having issues.
    function displaySidebarNavigation() {
        echo '<aside class="forum-navbar-container"><section class="forum-navbar-topbar"></section><section class="forum-navbar-content"><h3>Forum Navigation</h3><nav>';
        echo '<a href="forum.php" title="View forum page ">View Forum</a><a href="maps.php" title="View the Alumni Map">Alumni Map</a><a href="#" title="Placeholder Sidebar Link">Meet an Alumni</a>';
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
