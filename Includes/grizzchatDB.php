<?php
    /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // Sensitive Connection Info script
    // This file contains the information that is used to log in to the database.
    // It is important that this is kept out of the websites root directory! This adds an
    // additional layer of security incase someone was able to somehow view inside of our root
    // directory, they wouldn't be able to see our password and such.
    /* ------------------------------------------------------------------------------------- */

    // Variables that will be used for dbConnection.php
    $dbLocation = 'localhost:3306';
    $dbName = 'grizzchat';

    // This should be changed to be more secure when hosted online
    $dbUsername = 'root';
    $dbPassword = '';

?>