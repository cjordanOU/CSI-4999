<?php
    // This file contains the logic for populating page elements such as header/footer

    function displayHeader() {
        echo '<header id="header"><div class="header-top">';
        echo '<a href="index.php" title="logo" class="header-logo">LOGO</a><input class="header-search" type="search" placeholder="Search..">';
        echo '<a href="login.php" title="Click here to log in" class="header-login button-1">Login</a><a href="signup.php" title="Click here to sign up" class="header-signup button-1 button-dark">Sign Up</a>';
        echo '</div><div class="header-bottom"><nav class="header-container">';
        echo '<a href="#" title="Placeholder Header Link">Link #1</a><section></section><a href="#" title="Placeholder Header Link">Link #2</a><section></section><a href="#" title="Placeholder Header Link">Link #3</a>';
        echo '<section></section><a href="#" title="Placeholder Header Link">Link #4</a><section></section><a href="#" title="Placeholder Header Link">Link #5</a>';
        echo '</nav></div></header>';
    }

    function displayFooter() {
        echo '<footer><div><h4 class="footer-logo">GrizzForum</h4><nav><a href="index.php" title="Return to the homepage">Home</a><a href="#" title="Placeholder Link">Placeholder</a>';
        echo '<a href="#" title="Placeholder Link">Placeholder</a><a href="#" title="Placeholder Link">Placeholder</a></nav><p class="footer-copyright">Copyright © 2021</p></div>';
        echo '<div><address><a href="#" title="Placeholder Link">Placeholder</a><a href="#" title="Placeholder Link">Placeholder</a><a href="#" title="Placeholder Link">Placeholder</a></address></div>';
        echo '<div><p>Our Motto:</p><p>Motto Here</p></div></footer>';
    }