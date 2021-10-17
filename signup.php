<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>
        <title>Sign up - Forum</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/login.css" rel="stylesheet">
    </head>

    <body>
        <section class="login-box">
            <section class="login-area">
                <div class="login-topbar"></div>
                <div class="signup-logo"></div>
                <div class="login-text signup-text">
                    <h1>Sign Up</h1>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="signup-fillarea">
                            <label>First Name:</label>
                            <input type="text" name="firstname" class="form-control <?php /*echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; */?>" required>
                        </div>

                        <div class="signup-fillarea">
                            <label>Last Name:</label>
                            <input type="text" name="lastname" class="form-control <?php /*echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; */?>" required>
                        </div>
                    
                        <div class="signup-fillarea">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control <?php /*echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; */?>" required>
                        </div>

                        <div class="signup-fillarea">
                            <label>Major:</label>
                            <select name="major" title="Select your major" required>
                                <option>-----</option>
                                <optgroup label="SECS">
                                    <option value="Bioengineering">Bioengineering</option>
                                    <option value="Computer_Engineering">Computer Engineering</option>
                                    <option value="Computer_Science">Computer Science
                                    <option value="Electrical_Engineering">Electrical Engineering</option>
                                    <option value="Engineering_Sciences">Engineering Sciences</option>
                                    <option value="Industrial_Systems">Industrial Systems</option>
                                    <option value="Information_Technology">Information Technology</option>
                                    <option value="Mechanical_Engineering">Mechanical Engineering</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="signup-fillarea">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control <?php /*echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; */?>" required>
                            <span class="invalid-feedback"><?php /*echo $username_err;*/ ?></span>
                        </div>

                        <div class="signup-fillarea">
                            <label>Password:</label>
                            <input type="password" name="password1" class="form-control <?php /*echo (!empty($password_err)) ? 'is-invalid' : ''; */?>" required>
                            <span class="invalid-feedback"><?php /*echo $password_err;*/ ?>
                        </div>

                        <div class="signup-fillarea">
                            <label>Confirm Password:</label>
                            <input type="password" name="password2" class="form-control <?php /*echo (!empty($password_err)) ? 'is-invalid' : ''; */?>" required>
                            <span class="invalid-feedback"><?php /*echo $password_err;*/ ?>
                        </div>

                        <input type="submit" name="signupSubmit" value="Sign Up" class="login-button signup-button" title="Click here once you have filled out all of the above fields">
                    </form>
                    <p>Already have an account? <a href="login.php" title="Click here to go to the sign up page" class="link-1">Log in here.</a></p>
                    
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
