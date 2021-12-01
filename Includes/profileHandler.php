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
        $sql = "SELECT * FROM profile_info WHERE PROFILE_ID={$_SESSION["id"]}";
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $result = $dbConnection-> query($sql);

        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                echo "<p>Password section placeholder</p>";

                // About me section
                echo "<div class='settings-block'>";
                echo "<label>About Me</label>";
                if (empty($row["ABOUT"])) {
                    echo "<textarea name='about'></textarea>";
                }
                else {
                    echo "<textarea name='about'>" . $row["ABOUT"] . "</textarea>";
                }
                echo "<select name='about_privacy> title='Privacy settings for your about me description'>";
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
                echo "<label>Location Me</label>";
                if (empty($row["LOCATION"])) {
                    echo "<input type='text name='location'>";
                }
                else {
                    echo "<input type='text name='location' value='"  . $row["LOCATION"] . "'>";
                }
                echo "<select name='location_privacy> title='Privacy settings for your about me description'>";
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
            }
        }
    }

?>