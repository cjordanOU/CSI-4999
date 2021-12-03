<?php
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
        $sql = "SELECT * FROM user_info WHERE USER_ID={$_SESSION["id"]}";
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $result = $dbConnection-> query($sql);

        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                $major = str_replace('_', ' ', $row["MAJOR"]);
                echo "<section class='profile-box'>";
                echo "<div class='profile-box-image'></div><hr>";
                echo "<div class='post-box-content'><p title='Username'>". $row["USER_NAME"] ."</p>";
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
                echo "</div></section>";
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

                // About me section
                echo "<div class='settings-block'>";
                echo "<hr><h4>About Me</h4>";
                if (empty($row["ABOUT"])) {
                    echo "<textarea name='about'></textarea>";
                }
                else {
                    echo "<textarea name='about'>" . $row["ABOUT"] . "</textarea>";
                }
                echo "<br><select name='about_privacy> title='Privacy settings for your about me description'>";
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
                    echo "<input type='text name='location'>";
                }
                else {
                    echo "<input type='text name='location' value='"  . $row["LOCATION"] . "'>";
                }
                echo "<br><select name='location_privacy> title='Privacy settings for your about me description'>";
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
                    echo "<input type='text name='contact_email'>";
                }
                else {
                    echo "<input type='text name='contact_email' value='"  . $row["CONTACT_EMAIL"] . "'>";
                }
                echo "<br><select name='contact_email_privacy> title='Privacy settings for your about me description'>";
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
                    echo "<input type='text name='linkedin'>";
                }
                else {
                    echo "<input type='text name='linkedin' value='"  . $row["LINKEDIN"] . "'>";
                }
                echo "<br><select name='linkedin_privacy> title='Privacy settings for displaying your LinkedIn profile.'>";
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
                echo "<select name='preferred_font'> title='Your preferred global font used across the website.'>";
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

?>