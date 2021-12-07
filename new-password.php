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
       <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "Request cannot be validated at this time.";
        } else {
            if (ctype_xdigit($selector) !==false && ctype_xdigit($validator) !== false) {
                ?>
                <form action="Includes/resetPassword.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <input type="password" name="pass" placeholder="Enter your new password">
                    <input type="password" name="pass-verify" placeholder="Verify your new password">
                    <button type="submit" name="passReset">Reset your password</button>
                </form> 
                <?php
            }
        }
       ?>
    </body>
</html>