<?php
    /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // Database connection script
    // This is required to be included in all scripts or pages that access data from the database.
    // The $dbConnection variable is what is used to establish a connection.
    /* ------------------------------------------------------------------------------------- */


    // Pulls sensitive connection info from private file outside of root directory.
    // In this case (on windows machine), it is located in the xampp directory in a new folder created called connectionInfo.
    // In that folder, there is a file called grizzchatDB that has the variables for database location, username, password, and name of database.
    // This require then takes those variables and uses them for logging in and connecting to the database. (Added security)
    require_once '../../connectionInfo/grizzchatDB.php';

    // Creates the variable that is used to log in and establish a database connection.
    // For security reasons, we only connect when we need to access data, and end the connection when we are done with that action.
    $dbConnection = mysqli_connect("$dbLocation", "$dbUsername", "$dbPassword", "$dbName");

    // Connection check to make sure that we aren't getting any errors.
    if ($dbConnection-> connect_error) {
        die("ERROR: Connection to database failed. ". $dbConnection-> connect_error);
    }

?>