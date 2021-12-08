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

                <section id="slideshowContainer">
                    <div id="slideshowImage" class="parallaxBG-large">
                        <div id="slideshowFade"></div>
                    </div>
                    <div class="parallaxText1">
                        <h2>About Us</h2>
                    </div>
                </section>
                
                <main>
                    <section>
                    <h1>What is GrizzChat?</h1>
                         <p>GrizzChat was an idea inspired to help bridge communication between Oakland University students
						 as well as Oakland University Alumni. One of the many reasons why this application was created was 
						 that Oakland University students did not have a platform for them to reach out to each other. Futhremore,
						  there are not many outlets for alumni to reach out to current students. GrizzChat is an online forum where 
						  students and alumni to reach out and talk to one another.
                         </p>
						 <br>
					<h1> Our Vision</h1>
						<p> Our vision is to create a platform that will evolve and help better connect students and 
						alumni. We hope that this can become a communication tool for all people involved with Oakland University. 
						The end-goal of GrizzChat is to become a central communication tool for all of Oakland University.
						</p>
						<br><br><br>

                </main>
            </section>
            

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
