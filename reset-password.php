<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>
        <title>Reset Password - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/login.css" rel="stylesheet">
    </head>

    <body>

        <?php
            require_once('Includes/page_elements.php');
            require_once('Includes/userAuthHandler.php');
            loginHandler();
        ?>
        <h1 text-align="center">Reset Your Password</h1>
        <p>To reset your password, please enter your email below</p>
        <form action ="Includes/resetRequest.php" method="post">
            <input type ="text" name="email" placeholder="Enter your email address">
            <button type="submit" name="new-password-request">Send Request</button>
        </form>
        <?php
            if (isset($_GET["reset"])){
                if ($_GET["reset"]=="success"){
                    echo '<p class="signupsuccess">Check your email!</p>';
                }
            }
        ?>
    </body>
</html>
