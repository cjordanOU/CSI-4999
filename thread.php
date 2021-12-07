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
                      $cid = $_GET['Categories']; 
                      echo  '<form action = "post-thread.php?Categories='.$cid.'" class="POST" method ="POST">
                        <input type="submit" value = "Make a Thread" class="thread-creator">
                        </form>';

                        echo "<BR>";
                        $cid = $_GET['Categories'];
                        $sql = "SELECT * FROM threads
                        INNER JOIN user_info
                        on threads.User_Info_USER_ID = user_info.USER_ID
                        Where Categories_CATEGORIES_ID = $cid";
                       /* INNER JOIN posts
                        on threads.THREADS_ID = posts.PARENT_THREAD
                        inner Join user_info
                        where posts.User_Info_USER_ID = user_info.USER_ID";*/
                        //$result = mysqli_query($dbConnection, $sql);
                        $result = $dbConnection-> query($sql);
                        //$resultCheck = mysqli_num_rows($result);
                        if ($result-> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $tid = $row['THREADS_ID'];
                                echo "<div class = 'block-container'>";
                                echo "<div class = 'block-body'><h2> <a href ='thread-page.php?THREADS=$tid'>" . $row["THREAD_TITLE"]."</a></h2><hr>" .$row["THREAD_CONTENT"]. "<p class='post-user'>". $row["USER_NAME"]. "</p> <p class='post-info'>" 
                                . $row["CREATED"] . $_SESSION["id"]. "</p>" ;
                                echo "</div>  <br>";
                               // echo "<div class = 'block-body'>" . $row["CONTENT"]. $row["USER_NAME"]. " " 
                               // . $row["POST_TIME"];


                            }
                        }
                        

                    ?>
                </main>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>