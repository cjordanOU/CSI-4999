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
            displaySidebarNavigation();
            loginCheckRedirect(); // Not intended to be in final release
        ?>

        <section id="page-content">
            
            <section id="page-container">
                <main>
                    <?php

                        echo "<BR>";
                        $tid = $_GET['THREADS'];
                        $sql = "SELECT * FROM threads
                        INNER JOIN user_info
                        on threads.User_Info_USER_ID = user_info.USER_ID
                        Where THREADS_ID = $tid";
                       /* INNER JOIN posts
                        on threads.THREADS_ID = posts.PARENT_THREAD
                        inner Join user_info
                        where posts.User_Info_USER_ID = user_info.USER_ID";*/
                        //$result = mysqli_query($dbConnection, $sql);
                        $result = $dbConnection-> query($sql);
                        //$resultCheck = mysqli_num_rows($result);
                        if ($result-> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $uid = $row["USER_ID"];
                                echo "<div class = 'block-container'>";
                                echo "<div class = 'block-body'><h2>" . $row["THREAD_TITLE"]."</a></h2><hr>" .$row["THREAD_CONTENT"]. "<p class='post-user'> <a href ='user-profile.php?userid=$uid'>". $row["USER_NAME"]. "</a> " ."</p> <p class='post-info'> " 
                                . $row["CREATED"] . $_SESSION["id"]. "</p>" ;
                                echo "</div>  <br>";

                               echo '<form class = "post" action="Includes/replyAct.php?THREADS_ID='.$tid.'" class="POST" method ="POST">
                               <label for="forumPost"></label>
                               <br>
                               <br>
                               <textarea id="forumPost" name="forumPost" rows="4" cols="50">
                               </textarea>
                               <br><br>
                               <button type="submit" name ="submit" class="thread-reply">Reply</button>
                               </form>';
                               
   


                            }

                        }

                      $tid = $_GET['THREADS'];
                      $sql = "SELECT * FROM posts
                      WHERE PARENT_THREAD = $tid";
                      $result = $dbConnection-> query($sql);
                      if ($result-> num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $comments_user_id = $row['User_Info_USER_ID'];
                            $sql2 = "SELECT * FROM user_info where USER_ID = $comments_user_id ";
                            $result2 = mysqli_query($dbConnection, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $uid = $row2["USER_ID"];
                          echo "<div class = 'block-body'>" . $row["CONTENT"]. "<a href ='user-profile.php?userid=$uid'> ". $row2["USER_NAME"]. "</a> " 
                          . $row["POST_TIME"];


                        }
                      }
                        

                    ?>
                </main>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>