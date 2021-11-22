<?php
    // dbConnection include
    require_once 'Includes/dbConnection.php';


    function displayUsersPosts() {
        // Select all of the user's posts and display them
        $sql = "SELECT * FROM posts WHERE User_Info_USER_ID={$_SESSION["id"]}";
        //$sql = "SELECT * FROM posts WHERE User_Info_USER_ID=1"; // DEBUG HARD CODE
        $dbConnection = $GLOBALS['dbConnection']; // Important since this code is inside a function
        $result = $dbConnection-> query($sql);

        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                echo "<section class='post-box'>";
                echo "<div class='post-box-title'><h3 title='". $row["POST_TIME"] ."'>". $row["PARENT_THREAD"] ."</h3><hr></div>";
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
                echo "<div class='post-box-content'><p>". $row["USER_NAME"] ."</p>";
                echo "<p>". $major . " Major</p>";
                if ($row["GRADUATION_DATE"] == "Alumni") {
                    echo "<p>OU Alumni</p>";
                }
                else {
                    echo "<p>Graduation Date: ". $row["GRADUATION_DATE"] ."</p>";
                }
                
                echo "<p>Grizzchat User Since: <span title='". $row["CREATED_AT"] . "'>". substr($row["CREATED_AT"], 0, -9) . "</span></p>";
                echo "</div></section>";
            }
        }
    }