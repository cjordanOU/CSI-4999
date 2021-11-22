<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>

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
                         <p> Thank you for visiting our webpage. GrizzChat is an online forum dedicated to help bridge the communcation for Oakland University 
					        Here you will be able to communicate with other Oakland University students as well as Oakland
					        University Alumni! We want to create an inclusive welcoming enviroment where students can feel comfortable communicating with each
					        other. GrizzChat is an application we aimed to create to help centralize communication between all Oakland University students.
                         </p>

                
     
                        <img src="Images\Oakland_Center.jpg" alt="Grizz Image" width="720" height="420">  
                    <p>Suggestions to improve the app?</p>
                    <a href="contact.php" title="Browse our menu">Contact Us</a>
                </main>
            </section>
            

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
