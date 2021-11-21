<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>
        <title>Login - GrizzChat</title>
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

        <section class="login-box">
            <?php warningDisplay(); ?>
            <section class="login-area">
                <div class="login-topbar"></div>
                <div class="signup-logo login-logo"></div>
                <div class="login-text">
                    <h1>Login</h1>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="login-fillarea">
                            <p>Username:</p>
                            <input type="text" name="username" class="form-control <?php /*echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; */?>" required>
                            <span class="invalid-feedback"><?php /*echo $username_err;*/ ?></span>
                        </div>

                        <div class="login-fillarea">
                            <p>Password:</p>
                            <input type="password" name="password" class="form-control <?php /*echo (!empty($password_err)) ? 'is-invalid' : ''; */?>" required>
                            <span class="invalid-feedback"><?php /*echo $password_err;*/ ?>
                            <br>
                        </div>

                        <br>
                        <input type="submit" name="loginSubmit" value="Login" class="login-button" title="Click here once you finish entering your username and password above">
                    </form>
                    <a class="login-button button-dark" href="reset-password.php" title="Click here to reset your password">Forgot Password?</a>
                    <p>Need to register for an account? <a href="signup.php" title="Click here to go to the sign up page" class="link-1">Sign up here.</a></p>
                    
                    <?php
                        if(!empty($login_err)) echo "<p>$login_err</p>"
                    ?>
                </div>
            </section>
        </section>

        <aside>
            <a class="return-button" href="index.php" title="Return to the homepage"> </a>
        </aside>
    </body>
</html>
