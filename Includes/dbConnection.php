<?php

    // Pulls sensitive connection info from private file outside of root directory
    require_once '../../connectionInfo/grizzchatDB.php';

    $dbConnection = mysqli_connect("$dbLocation", "$dbUsername", "$dbPassword", "$dbName");

    // Connection check
    if ($dbConnection-> connect_error) {
        die("ERROR: Connection to database failed. ". $connection-> connect_error);
    }

    ?>