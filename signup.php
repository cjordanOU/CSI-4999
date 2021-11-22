<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('Includes/metadata.php'); ?>
        <title>Sign up - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/login.css" rel="stylesheet">
    </head>

    <body>
        
        <?php
            require_once('Includes/page_elements.php');
            require_once('Includes/userAuthHandler.php');
            loginCheckBasic();
            signupHandler();
        ?>

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
                                <option disabled selected value> ---- </option>
                                <optgroup label="SECS">
                                    <option value="Bioengineering">Bioengineering</option>
                                    <option value="Computer_Engineering">Computer Engineering</option>
                                    <option value="Computer_Science">Computer Science
                                    <option value="Electrical_EngineeringO">Electrical Engineering</option>
                                    <option value="Engineering_Sciences">Engineering Sciences</option>
                                    <option value="Industrial_Systems">Industrial Systems</option>
                                    <option value="Information_Technology">Information Technology</option>
                                    <option value="Mechanical_Engineering">Mechanical Engineering</option>
                                </optgroup>
                                <optgroup label="Arts &amp; Sciences Major">
                                    <option value="Arts_&_Sciences">Arts &amp; Sciences</option>
                                </optgroup>
                                <optgroup label="Business Major">
                                    <option value="Business">Business</option>
                                </optgroup>
                                <optgroup label="Education &amp; Human Services Major">
                                    <option value="Education_&_Human_Services">Education &amp; Human Services</option>
                                </optgroup>
                                <optgroup label="Health Sciences Major">
                                    <option value="Health_Sciences">Health Sciences</option>
                                </optgroup>
                                <optgroup label="School of Medicine Major">
                                    <option value="School_of_Medicine">School of Medicine</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="signup-fillarea">
                            <label>Graduation:</label>
                            <select name="graduation_date" title="Select your graduation date" required>
                                <option disabled selected value> ---- </option>
                                <option value="Alumni">I'm an OU Alumni</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
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

                        <input type="submit" name="signupSubmit" value="Sign Up" class="login-button signup-button float-left" title="Click here once you have filled out all of the above fields">
                        <p class="float-right">Have an account? <a href="login.php" title="Click here to go to the sign up page" class="link-1">Log in here.</a></p>
                    </form>
                    
                    
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
