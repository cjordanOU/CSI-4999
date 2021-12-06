<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once('Includes/metadata.php');
            require_once('Includes/dbConnection.php');
        ?>

        <title>About Us - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/style.css" rel="stylesheet">
    </head>
    <body>
        <section id="background-gradient"></section>
        
        <?php
            require_once('Includes/page_elements.php');
            displayHeader();
            displaySidebarNavigation();
        ?>

        <section id="page-content">
            
            <section id="page-container">
                
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
