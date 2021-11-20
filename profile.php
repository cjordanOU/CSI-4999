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
            loginCheckBasic();
        ?>

        <section id="page-content">
            
            <section id="page-container" class="profile-page">
                <section id="posts-container">
                    <main>
                        <?php displayUsersPosts(); ?>
                    </main>
                </section>

                <section id="profile-container">
                    <aside>
                        <?php displayUsersProfile(); ?>
                    </aside>
                </section>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>