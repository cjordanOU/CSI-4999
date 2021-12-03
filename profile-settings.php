<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>

        <title>Profile - GrizzChat</title>
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
            loginCheckRedirect();
        ?>

        <section id="page-content">
            
            <section id="page-container">
                <div class="parallaxBG-vsmall settingsImage">
                    <div class="parallax-fadeBottom"></div>
                    <div class="parallaxText1-vsmall">
                        <h2>Profile Settings</h2>
                    </div>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="settings-form">
                    <?php displayUsersSettings(); ?>
                    <input type='submit' class='settings-submit' name='settings-submit' title='Submit the changes you have made to your account settings'>
                </form>
            </section>
        
            <?php displayFooter(); ?>
        </section>
    </body>
</html>