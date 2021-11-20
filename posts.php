<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once('Includes/metadata.php');
            require_once('Includes/dbConnection.php');
        ?>
        <title>Posts - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/style.css" rel="stylesheet">
    </head>
    <script src="https://cdn.tiny.cloud/1/26v69f623t0meob0dymzvh6pyniv2h43rpmw08c9z1pae1sh/tinymce/5/tinymce.min.js" 
    referrerpolicy="origin">
    </script>
    <script>
    tinymce.init({
      selector: '#forumPost'

    });
    </script>
    <body>
        <section id="background-gradient"></section>
        <?php
            require_once('Includes/page_elements.php');
            displayHeader();
            loginCheckBasic();
            session_start();

        ?>

        <section id="page-content">
            
            <section id="page-container">
                <main>
                    <form action = "post-thread.php">

                        <input type="submit" value = "Make a Thread">

                    </form>
                    <?php

                        echo "<BR>";
                        $sql = "SELECT * FROM threads 
                        INNER JOIN user_info
                        on threads.User_Info_USER_ID = user_info.USER_ID";
                        $sqlPost = "SELECT * FROM posts
                        INNER JOIN user_info
                        on posts.User_Info_USER_ID = user_info.USER_ID";
                        //$result = mysqli_query($dbConnection, $sql);
                        $result = $dbConnection-> query($sql);
                        $resultPost = $dbConnection-> query($sqlPost);
                        //$resultCheck = mysqli_num_rows($result);
                        if ($result-> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<div class = 'block-container'>";
                                echo "<div class = 'block-body'>" . $row["THREAD_TITLE"]. $row["THREAD_CONTENT"]. $row["USER_NAME"]. " " 
                                . $row["CREATED"] . $_SESSION["id"] ;
                                echo "</div>  <br>";
                                
                            }
                            if ($resultPost-> num_rows > 0) {
                                while($row = $resultPost->fetch_assoc()) {
                                    echo "<div class = 'block-body'>" . $row["CONTENT"]. $row["USER_NAME"]. " " 
                                    . $row["POST_TIME"];
                                }
                            }

                        echo '<form class = "post" action="Includes/replyAct.php" class="POST" method ="POST">
                        <label for="forumPost"></label>
                        <br>
                            
                        <br>
                        <textarea id="forumPost" name="forumPost" rows="4" cols="50">
                        </textarea>
                        <br><br>
                        <button type="submit" name ="submit">reply</button>
                        </form>';

                        }
                        

                    ?>
                </main>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>