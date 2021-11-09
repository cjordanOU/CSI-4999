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
    <body>
        <section id="background-gradient"></section>
        <?php
            require_once('Includes/page_elements.php');
            displayHeader();
        ?>

        <section id="page-content">
            
            <section id="page-container">
                <main>
                    <form action = "post-thread.php">

                        <input type="submit" value = "Post">

                    </form>
                    <?php

                        echo "<BR>";
                        $sql = "SELECT * FROM posts";
                        //$result = mysqli_query($dbConnection, $sql);
                        $result = $dbConnection-> query($sql);
                        //$resultCheck = mysqli_num_rows($result);
                        if ($result-> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<div class = 'block-container'>";
                                echo "<div class = 'block-body'>" .$row["TITLE"]. $row["CONTENT"]. " " 
                                . $row["POST_TIME"];
                                echo "</div> <br>";
                            }

                        }

                    ?>
                </main>
            </section>

            <?php displayFooter(); ?>
        </section>
    </body>
</html>