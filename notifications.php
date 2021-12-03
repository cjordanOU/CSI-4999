<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>

        <title>Notifications - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

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
        ?>

        <section id="page-content">
            
            <section id="page-container">
                <?php displayNotifications(); ?>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
