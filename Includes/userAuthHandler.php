<?php
    /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // User Authentication Script
    // This file contains the logic for processing user authentication such as logging in and signing up.
    /* ------------------------------------------------------------------------------------- */
    
    // dbConnection Include
    require_once 'Includes/dbConnection.php';


    // Test Function
    function dbTest() {
        $sql = "SELECT `USER_ID`, `USER_NAME`, `PASSWORD` FROM user_info WHERE `USER_NAME` = 'admin'";
        $dbConnection = $GLOBALS['dbConnection'];
        $result = $dbConnection-> query($sql) or die($dbConnection->error);
        $row = $result->fetch_assoc();

        echo "Test USER_ID is: " . $row["USER_ID"] . "<br>";
        echo "Test USER_NAME is: " . $row["USER_NAME"];
    }
?>