<?php
    /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // User Authentication Script
    // This file contains the logic displaying and processing user profile settings and information.
    /* ------------------------------------------------------------------------------------- */

    // dbConnection include
    require_once 'Includes/dbConnection.php';


    function displayUsersPosts() {
        // Select all of the user's posts and display them
        $currentID = $_SESSION["id"];
        $sql = "SELECT * FROM posts INNER JOIN threads on posts.PARENT_THREAD = threads.THREADS_ID WHERE posts.User_Info_USER_ID={$_SESSION["id"]}";        //$sql = "SELECT * FROM posts WHERE User_Info_USER_ID={$_SESSION["id"]}";
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $result = $dbConnection-> query($sql);

        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                echo "<section class='post-box'>";
                echo "<div class='post-box-title'><h3 title='". $row["POST_TIME"] ."'>". $row["THREAD_TITLE"] ."</h3><hr></div>";
                echo "<div class='post-box-content'><p>". $row["CONTENT"] ."</p></div>";
                echo "</section>";
            }
        }
        else {
            echo "<section class='post-box post-box-empty'>";
            echo "<div class='post-box-content'><p>You haven't made any posts yet! Start contributing today, and you can see your posts that you have made here!</p></div>";
            echo "</section>";
        }
    }

    function displayUsersProfile() {
        //$sql = "SELECT * FROM user_info WHERE USER_ID={$_SESSION["id"]}";
        //$sql = "SELECT * FROM user_info INNER JOIN profile_info on user_info.USER_ID = profile_info.LINKED_USER_ID WHERE user_info.USER_ID={$_SESSION["id"]}";
        $sql = "SELECT * FROM profile_info INNER JOIN user_info on profile_info.LINKED_USER_ID = user_info.USER_ID WHERE profile_info.LINKED_USER_ID={$_SESSION["id"]}";
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $result = $dbConnection-> query($sql);

        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                $major = str_replace('_', ' ', $row["MAJOR"]);
                echo "<section class='profile-box'>";
                echo "<div class='profile-box-image'></div><hr>";
                echo "<div class='post-box-content'><p title='Username'><b>". $row["USER_NAME"] ."</b></p>";
                echo "<p title='Major'>". $major . " Major</p>";
                if ($row["GRADUATION_DATE"] == "Alumni") {
                    echo "<p title='Alumni Status'>OU Alumni</p>";
                }
                else {
                    if (empty($row["GRADUATION_DATE"])) {
                        echo "<p title='Graduation Date'>Graduation Date: 2021</p>";
                    }
                    else {
                        echo "<p title='Graduation Date'>Graduation Date: ". $row["GRADUATION_DATE"] ."</p>";
                    }
                }
                echo "<a href='profile-settings.php' title='Change your account settings'><div class='profile-icons'alt='Settings Icon'></div></a>";
                echo "<p title='User since'>Grizzchat User Since: <span title='". $row["CREATED_AT"] . "'>". substr($row["CREATED_AT"], 0, -9) . "</span></p>";
                echo "</div>";
                echo "<div class='post-box-content'><hr>";
                
                if ($row["LOCATION_PRIVACY"] == "public") {
                    echo "<p title='Work location' id='work-location'>". $row["LOCATION"] . "</p>";
                }
                if ($row["CONTACT_EMAIL_PRIVACY"] == "public") {
                    echo "<p title='Contact Email'>". $row["CONTACT_EMAIL"] . "</p>";
                }
                if ($row["LINKEDIN_PRIVACY"] == "public") {
                    echo "<p title='LinkedIn'>". $row["LINKEDIN"] . "</p>";
                }
                if ($row["ABOUT_PRIVACY"] == "public") {
                    echo "<hr><p title='About me' class='about-me'>". $row["ABOUT"] . "</p>";
                }
                echo "</div><hr>";
                echo "<div id='map' class='map-small'></div></section>";
            }
        }
    }

    function displayUsersSettings() {
        //$sql = "SELECT * FROM profile_info WHERE PROFILE_ID={$_SESSION["id"]}";
        $sql = "SELECT * FROM profile_info INNER JOIN user_info on profile_info.LINKED_USER_ID = user_info.USER_ID WHERE profile_info.LINKED_USER_ID={$_SESSION["id"]}";
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $result = $dbConnection-> query($sql);

        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                // Password change section
                echo "<div class='settings-block'>";
                echo "<h4>Change Password</h4><hr>";
                echo "<label>Current Password</label><input type='password' name='old_password'><br>";
                echo "<label>New Password</label><input type='password' name='new_password'><br>";
                echo "<label>Confirm New Password</label><input type='password' name='confirm_new_password' class='settings-confirm-pw'>";
                echo "</div>";

                // Profile picture section
                echo "<div class='settings-block'>";
                echo "<hr><h4>My Profile Picture</h4>";
                echo "<input type='file' name='profile-picture' accept='image/png, image/gif, image/jpeg'>";
                echo "</div>";

                // About me section
                echo "<div class='settings-block'>";
                echo "<hr><h4>About Me</h4>";
                if (empty($row["ABOUT"])) {
                    echo "<textarea name='about'></textarea>";
                }
                else {
                    echo "<textarea name='about'>" . $row["ABOUT"] . "</textarea>";
                }
                echo "<br><select name='about_privacy' title='Privacy settings for your about me description'>";
                if ($row["ABOUT_PRIVACY"] == "public") {
                    echo "<option value='public' selected>Public</option>";
                }
                else {
                    echo "<option value='public'>Public</option>";
                }
                if ($row["ABOUT_PRIVACY"] == "friends") {
                    echo "<option value='friends' selected>Friends only</option>";
                }
                else {
                    echo "<option value='friends'>Friends only</option>";
                }
                if ($row["ABOUT_PRIVACY"] == "private") {
                    echo "<option value='private' selected>Private</option>";
                }
                else {
                    echo "<option value='private'>Private</option>";
                }
                echo "</select></div>";
                

                // Location section
                echo "<div class='settings-block'>";
                echo "<hr><h4>Work Location</h4>";
                if (empty($row["LOCATION"])) {
                    echo "<input type='text' name='location'>";
                }
                else {
                    echo "<input type='text' name='location' value='"  . $row["LOCATION"] . "'>";
                }
                echo "<br><select name='location_privacy' title='Privacy settings for your about me description'>";
                if ($row["LOCATION_PRIVACY"] == "public") {
                    echo "<option value='public' selected>Public</option>";
                }
                else {
                    echo "<option value='public'>Public</option>";
                }
                if ($row["LOCATION_PRIVACY"] == "friends") {
                    echo "<option value='friends' selected>Friends only</option>";
                }
                else {
                    echo "<option value='friends'>Friends only</option>";
                }
                if ($row["LOCATION_PRIVACY"] == "private") {
                    echo "<option value='private' selected>Private</option>";
                }
                else {
                    echo "<option value='private'>Private</option>";
                }
                echo "</select></div>";


                // Email section
                echo "<div class='settings-block'>";
                echo "<hr><h4>Contact Email</h4>";
                if (empty($row["CONTACT_EMAIL"])) {
                    echo "<input type='text' name='contact_email'>";
                }
                else {
                    echo "<input type='text' name='contact_email' value='"  . $row["CONTACT_EMAIL"] . "'>";
                }
                echo "<br><select name='contact_email_privacy' title='Privacy settings for your about me description'>";
                if ($row["CONTACT_EMAIL_PRIVACY"] == "public") {
                    echo "<option value='public' selected>Public</option>";
                }
                else {
                    echo "<option value='public'>Public</option>";
                }
                if ($row["CONTACT_EMAIL_PRIVACY"] == "friends") {
                    echo "<option value='friends' selected>Friends only</option>";
                }
                else {
                    echo "<option value='friends'>Friends only</option>";
                }
                if ($row["CONTACT_EMAIL_PRIVACY"] == "private") {
                    echo "<option value='private' selected>Private</option>";
                }
                else {
                    echo "<option value='private'>Private</option>";
                }
                echo "</select></div>";


                // LinkedIn section
                echo "<div class='settings-block'>";
                echo "<hr><h4>My LinkedIn</h4>";
                if (empty($row["LINKEDIN"])) {
                    echo "<input type='text' name='linkedin'>";
                }
                else {
                    echo "<input type='text' name='linkedin' value='"  . $row["LINKEDIN"] . "'>";
                }
                echo "<br><select name='linkedin_privacy' title='Privacy settings for displaying your LinkedIn profile.'>";
                if ($row["LINKEDIN_PRIVACY"] == "public") {
                    echo "<option value='public' selected>Public</option>";
                }
                else {
                    echo "<option value='public'>Public</option>";
                }
                if ($row["LINKEDIN_PRIVACY"] == "friends") {
                    echo "<option value='friends' selected>Friends only</option>";
                }
                else {
                    echo "<option value='friends'>Friends only</option>";
                }
                if ($row["LINKEDIN_PRIVACY"] == "private") {
                    echo "<option value='private' selected>Private</option>";
                }
                else {
                    echo "<option value='private'>Private</option>";
                }
                echo "</select></div>";


                // Preferred Font section
                echo "<div class='settings-block'>";
                echo "<hr><h4>Preferred Global Font</h4>";
                echo "<select name='preferred_font' title='Your preferred global font used across the website.'>";
                // Default Font
                if ($row["PREFERRED_FONT"] == "default") {
                    echo "<option value='default' selected>Default</option>";
                }
                else {
                    echo "<option value='default'>Default</option>";
                }
                // Comic Sans MS Font
                if ($row["PREFERRED_FONT"] == "comic_sans") {
                    echo "<option value='comic_sans' selected>Comic Sans</option>";
                }
                else {
                    echo "<option value='comic_sans'>Comic Sans</option>";
                }
                // Times New Roman Font
                if ($row["PREFERRED_FONT"] == "Times_New_Roman") {
                    echo "<option value='Times_New_Roman' selected>Times New Roman</option>";
                }
                else {
                    echo "<option value='Times_New_Roman'>Times New Roman</option>";
                }
                // Helvetica Font
                if ($row["PREFERRED_FONT"] == "Helvetica") {
                    echo "<option value='Helvetica' selected>Helvetica</option>";
                }
                else {
                    echo "<option value='Helvetica'>Helvetica</option>";
                }
                // Tahoma Font
                if ($row["PREFERRED_FONT"] == "Tahoma") {
                    echo "<option value='Tahoma' selected>Tahoma</option>";
                }
                else {
                    echo "<option value='Tahoma'>Tahoma</option>";
                }
                // Garamond Font
                if ($row["PREFERRED_FONT"] == "Garamond") {
                    echo "<option value='Garamond' selected>Garamond</option>";
                }
                else {
                    echo "<option value='Garamond'>Garamond</option>";
                }
                // Courier New Font
                if ($row["PREFERRED_FONT"] == "Courier_New") {
                    echo "<option value='Courier_New' selected>Courier New</option>";
                }
                else {
                    echo "<option value='Courier_New'>Courier New</option>";
                }
                echo "</select></div>";
            }
        }
    }

    function displayNotifications() {
        $sql = "SELECT * FROM messages WHERE RECIEVER_ID={$_SESSION["id"]}";
        //$sql = "SELECT * FROM messages INNER JOIN user_info on messages.RECIEVER_ID = user_info.USER_ID WHERE profile_info.LINKED_USER_ID={$_SESSION["id"]}";
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $result = $dbConnection-> query($sql);
        
        echo "<div class='settings-block'>";
        echo "<h4>Direct Messages:</h4><hr>";
        echo "<p>TODO: HAVE SENDER ID SHOW USER_NAME INSTEAD</p>";
        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                echo "<div class='message-container'><div class='message-container-header'>";
                echo "<p class='message-title'>". $row["MESSAGE_TITLE"] . "</p></div>";
                echo "<div class='message-contents'>";
                echo "<p class='message-details'>Sent By:". $row["SENDER_ID"] . "</p>";
                echo "<p class='message-details'>Sent At:". $row["MESSAGE_TIME"] . "</p>";
                echo "<p>". $row["MESSAGE_CONTENT"] . "</p></div></div>";
            }
        }
        else {
            echo "<p>You haven't recieved any Direct Messages yet.</p>";
        }
        echo "</div>";
        
        echo "<div class='settings-block'>";
        echo "<h4>Replies to my Threads:</h4><hr>";
        echo "</div>";
    }

    function processUserSettingsChange() {
        // Define/Initialize variables
        $about = "";
        $about_privacy = "";
        $location = "";
        $location_privacy = "";
        $contact_email = "";
        $contact_email_privacy = "";
        $linkedin = "";
        $linkedin_privacy = "";
        $preferred_font = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $about = trim($_POST["about"]);
            $about_privacy = trim($_POST["about_privacy"]);
            $location = trim($_POST["location"]);
            $location_privacy = trim($_POST["location_privacy"]);
            $contact_email = trim($_POST["contact_email"]);
            $contact_email_privacy = trim($_POST["contact_email_privacy"]);
            $linkedin = trim($_POST["linkedin"]);
            $linkedin_privacy = trim($_POST["linkedin_privacy"]);
            $preferred_font = trim($_POST["preferred_font"]);

            // Prepare an insert statement for what is going to be passed to the DB.
            $uid = $_SESSION["id"];
            $dbConnection = $GLOBALS['dbConnection'];
            
            $sql = "UPDATE `profile_info` SET 
                `ABOUT` = '$about',
                `ABOUT_PRIVACY` = '$about_privacy',
                `LOCATION` = '$location',
                `LOCATION_PRIVACY` = '$location_privacy',
                `CONTACT_EMAIL` = '$contact_email',
                `CONTACT_EMAIL_PRIVACY` = '$contact_email_privacy', 
                `LINKEDIN` = '$linkedin',
                `LINKEDIN_PRIVACY` = '$linkedin_privacy',
                `PREFERRED_FONT` = '$preferred_font'
                WHERE LINKED_USER_ID={$_SESSION["id"]}";
            
            if ($dbConnection->query($sql) === TRUE){
                echo " New record created successfully";
                echo $sql;
                header("location: profile.php");
            }else{
                echo "Error: " . $sql . "<BR>". $dbConnection->error;
            }
            
            $dbConnection ->close();
        }
    }

    function verifyProfile() {
        $sql = "SELECT * FROM profile_info WHERE LINKED_USER_ID={$_SESSION["id"]}";
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $uid = $_SESSION["id"];
        $result = $dbConnection-> query($sql);

        if ($result-> num_rows > 0) {
        }
        else {
            /*$createProfileSQL = "INSERT INTO `profile_info` 
            `ABOUT` = '',
            `ABOUT_PRIVACY` = 'public',
            `LOCATION` = '',
            `LOCATION_PRIVACY` = 'public',
            `CONTACT_EMAIL` = '',
            `CONTACT_EMAIL_PRIVACY` = 'public', 
            `LINKEDIN` = '',
            `LINKEDIN_PRIVACY` = 'public',
            `PREFERRED_FONT` = 'default',
            `DEACTIVATE` = 0,
            `LINKED_USER_ID`='$uid',
            `PROFILE_ID`='$uid' ";*/
            $createProfileSQL = "INSERT INTO profile_info (ABOUT, ABOUT_PRIVACY, LOCATION, LOCATION_PRIVACY, CONTACT_EMAIL, CONTACT_EMAIL_PRIVACY, LINKEDIN, LINKEDIN_PRIVACY, PREFERRED_FONT, DEACTIVATE, LINKED_USER_ID, PROFILE_ID) VALUES ('','public','','public','','public','','public','default',0,'$uid','$uid')";

            $result = $dbConnection-> query($createProfileSQL);

            if ($dbConnection->query($createProfileSQL) === TRUE){
                echo " New record created successfully";
                header("location: profile.php");
            }else{
                echo "Error: " . $createProfileSQL . "<BR>". $dbConnection->error;
            }
        }
    }

    function checkIfGraduated() {
        // If users graduation date is approaching, have a pop-up ask if the user has graduated.
        // If the user hits graduate, their role is switched to alumni.
    }

?>