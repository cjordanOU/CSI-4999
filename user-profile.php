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
            displayHeader();
            displaySidebarNavigation();
            loginCheckRedirect(); // Not intended to be in final release
        ?>

        <section id="page-content">
            
            <section id="page-container">
                <main>
                    <?php
                    $uid = $_GET["userid"];
                    echo '<form class = "post" action="message.php?userid='.$uid.'"  class="POST" method ="POST">
                    
                    <input type="submit" value = "message this person" class="thread-creator">

                    </form>';

                    ?>
                </main>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
