<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require_once('Includes/metadata.php');
            require_once('Includes/dbConnection.php');
        ?>

        <title>Home - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/style.css" rel="stylesheet">
    </head>
    <body onload="startSlideshow()">
        <section id="background-gradient"></section>
        
        <?php
            require_once('Includes/page_elements.php');
            displayHeader();
            displaySidebarNavigation();
        ?>

        

        <section id="page-content">
            
            <section id="page-container">

                <section id="slideshowContainer">
                    <div id="slideshowImage" class="parallaxBG-large">
                        <div id="slideshowFade"></div>
                    </div>
                    <div class="parallaxText1">
                        <h2>Welcome to GrizzChat</h2>
                        <a href="signup.php" title="Click here to sign up for GrizzChat">Join in on the action</a>
                    </div>
                </section>
                
                <main>
                    <section class="narrowPad">
                    <h1>Welcome to GrizzChat</h1>
                         <p>Thank you for visiting Grizzchat! GrizzChat is an online forum dedicated to help bridge the communcation for the Oakland University Community.
					        Here you will be able to communicate with other Oakland University students as well as Oakland
					        University Alumni! We want to create an inclusive welcoming enviroment where students can feel comfortable communicating with each
					        other and be able to interact with and expand their networking opportunities to help get a head start on their professional careers.
                            GrizzChat is an application we wanted to make in order to create a centralized communications hub between all of the Oakland University community during the current pandemic era and in to the future.
                         </p>

                        <img src="Images\Oakland_Center.jpg" alt="Grizz Image" width="720" height="420">  
                    <p>Have a suggestion to improve the app? We'd love to hear from you.</p>
                    <a href="contact.php" title="Browse our menu" class="button-1">Contact Us</a>
                </main>
            </section>
            

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
