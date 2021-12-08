<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once('Includes/metadata.php');
            require_once('Includes/dbConnection.php');
        ?>

        <!-- Styles -->
        <link href="Styles/style.css" rel="stylesheet">
    </head>
    <body>
        <section id="background-gradient"></section>
        <?php
            require_once('Includes/page_elements.php');
            require_once('Includes/profileHandler.php');
            displayHeader();
            displaySidebarNavigation();
            loginCheckRedirect();
        ?>

        <section id="page-content">
            
        <section id="page-container" class="profile-page">
                <section id="posts-container">
                    <main>
                        <?php
                        $uid = $_GET["userid"];
                        echo '<form class = "post" action="message.php?userid='.$uid.'"  class="POST" method ="POST">
                        
                        <input type="submit" value = "message this person" class="thread-creator">

                        </form>';
                        
                        displayUsersPostsOther();
                        ?>

                    </main>
                </section>

                <section id="profile-container">
                    <aside>
                        <?php displayUsersProfileOther(); ?>
                    </aside>
                </section>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
