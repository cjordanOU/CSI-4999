<?php
    /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // User Authentication Script
    // This file contains the logic for processing user authentication such as logging in and signing up.
    /* ------------------------------------------------------------------------------------- */
    
    // dbConnection Include
    require_once 'Includes/dbConnection.php';

    echo "userAuthHandler.php succesfully loaded";

    // Global Variables
    $username = ""; // Used for signup and login
    $password = ""; // Used for login
    $password1 = ""; // Used for signup
    $hashed_password = "";

    function loginHandler() {
        loginCheckBasic();  // Checks if user is already logged in and starts session

        // Check to see if user is already logged in
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: profile.php");
            exit;
        }

        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "POST recieved\n"; // debug
            // Check if username is empty
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter username.";
            } else{
                $GLOBALS['username'] = trim($_POST["username"]);
                echo "username has been set globally\n"; // debug
            }

            // Check if password is empty
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter your password.";
            } else{
                $GLOBALS['password'] = trim($_POST["password"]);
                echo "password has been set globally\n"; // debug
            }

            // Validate credentials
            if(empty($username_err) && empty($password_err)) {
                // Prepare a select statement
                echo "select statement has been run\n"; // debug
                echo "username is: " . $GLOBALS['username']; // debug
                echo "password is: " . $GLOBALS['password']; // debug
                $sql = "SELECT USER_ID, USER_NAME, PASSWORD FROM user_info WHERE USER_NAME = ?";

                if($stmt = mysqli_prepare($GLOBALS['dbConnection'], $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    // Set parameters
                    $param_username = $GLOBALS['username'];

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Store result
                        mysqli_stmt_store_result($stmt);

                        // Check if username exists, if yes then verify password
                        if(mysqli_stmt_num_rows($stmt) == 1){                    
                            // Bind result variables
                            mysqli_stmt_bind_result($stmt, $id, $GLOBALS['username'], $GLOBALS['hashed_password']);


                            if(mysqli_stmt_fetch($stmt)){
                                if(password_verify($GLOBALS['password'], $GLOBALS['hashed_password'])){
                                    // Password is correct, so start a new session
                                    session_start();

                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["username"] = $GLOBALS['username'];
                                    echo "SESSION USERNAME IS: " . $_SESSION["username"]; // debug

                                    // Roles Check
                                    $roleCheckSQL = "SELECT * FROM roles WHERE User_Info_USER_ID=$id";
                                    $checkRoles = $GLOBALS['dbConnection']-> query($roleCheckSQL);

                                    $loginAttemptStatement = "INSERT INTO login_attempts (`TIME`, `SUCCESS`, `MEMBER_ID`) VALUES(NOW(), 1 ,$id)";
                                    if($stmt = mysqli_prepare($GLOBALS['dbConnection'], $loginAttemptStatement)) {
                                        mysqli_stmt_execute($stmt);
                                    }

                                    if ($checkRoles-> num_rows > 0) {
                                        $_SESSION["alumni"] = true;
                                        // Redirect user to accounts page
                                        header("location: profile.php");
                                    }
                                    else {
                                        $_SESSION["alumni"] = false;
                                        // Redirect user to accounts page
                                        header("location: profile.php");
                                    }

                                } else{

                                    $loginAttemptStatement = "INSERT INTO login_attempts (`TIME`, `SUCCESS`, `USER_ID`) VALUES(NOW(), 0 ,$id)";
                                    if($stmt = mysqli_prepare($GLOBALS['dbConnection'], $loginAttemptStatement)) {
                                        mysqli_stmt_execute($stmt);
                                    }

                                    // Password is not valid, display a generic error message
                                    $login_err = "Invalid username or password.";

                                }
                            }
                        } else{
                            // Username doesn't exist, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later. [Error UA202]";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }

            // Close connection
            mysqli_close($GLOBALS['dbConnection']);
        }
    }

    // Function that processes user sign in information and adds the information to the database
    function signupHandler() {
        // Define/Initialize variables
        $firstName = "";
        $lastName = "";
        $email = "";
        $major = ""; // Note that major names will include underscores, which can be removed later using php functions.
        $usernameError = "";
        $passwordError = "";
        $confirmPasswordError = "";

        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){   
            // Validate username
            // We want to make sure that the username entered is valid and is not already used by another user in the database.
            // See the function below for what this is doing.
            validateSignupUsername();

            // Validate password
            // We want to make sure the password entered is valid and matches between the base password and confirm password.
            // See the function below for what this is doing.
            validateSignupPassword();

            // Send over the validated information to be stored in the database, essentially creating the users account.
            // See the function below for what this is doing.
            passSignupInfoToDB();
        }
    }

    


    // Check input errors before inserting in database.
        // Essentially a quick double check to make sure no invalid information makes it into the database.
    function passSignupInfoToDB() {

        if(empty($usernameError) && empty($passwordError) && empty($confirmPasswordError)){
            // Non-Validated information
            // We trust that the user entered the right information here, don't need to check it against database like username.
            // By doing this, increases performance since we aren't doing unnecessary checks.
            $firstName = trim($_POST["firstname"]);
            $lastName = trim($_POST["lastname"]);
            $email = trim($_POST["email"]);
            $major = trim($_POST["major"]);
            
            // Prepare an insert statement for what is going to be passed to the DB.
            $sql = "INSERT INTO user_info (`USER_NAME`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ADDRESS`, `MAJOR`) VALUES (?,?,?,?,?,?)";
        
            if($stmt = mysqli_prepare($GLOBALS['dbConnection'], $sql)){
                 // Bind variables to the prepared statement as parameters (Security Reasons).
                mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $firstName, $lastName, $email, $major);

                // Set parameters
                // We are using a php function called password_hash in order to hash our passwords in the database, which makes it so if an attacker~
                // were to gain access to our database, they couldn't get users password information.
                $param_username = $GLOBALS['username'];
                $param_password = password_hash($GLOBALS['password1'], PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement and send it to the database.
                // If successful, it will bring you to the login page to log in with your new account information.
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Something went wrong. Please try again later. [Error UA102]";
                }
            }
        }
    }

    // Validates the password by checking to make sure there is text entered and that the two inputted passwords match.
    // Saves us and the user headaches by making them confirm they entered the right password.
    function validateSignupPassword() {
        // Validate base password (password1).
        // Makes sure that the password1 entered was not left blank.
        if(empty(trim($_POST["password1"]))){
            $passwordError = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password1"])) < 6){
            $passwordError = "Password must have atleast 6 characters."; // We can change this number easily if needed.
        } else{
            $password1 = (trim($_POST["password1"]));
        }
        
        // Validate confirm password (password2) and makes sure passwords match.
        if(empty(trim($_POST["password2"]))){
            $confirmPasswordError = "Please confirm password.";     
        } else{
            $password2 = trim($_POST["password2"]);
            if(empty($passwordError) && ($password1 != $password2)){
                $confirmPasswordError = "Password did not match.";
            }
            else {
                $GLOBALS['password1'] = $password1;
            }
        }
    }

    // Validates the username by checking to make sure there is text entered and that it is a unique username.
    function validateSignupUsername() {
        // Makes sure that the username entered was not left blank
        if(empty(trim($_POST['username']))){
            $usernameError = "Please enter a username.";
        }
        else {
            // Check to see if username already exists
            $usernameCheck = "SELECT USER_ID FROM user_info WHERE USER_NAME = ?";
            
            if($stmt = mysqli_prepare($GLOBALS['dbConnection'], $usernameCheck)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                 // Set parameters
                 $param_username = trim($_POST['username']);

                 // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $usernameError = "This username is already taken.";
                    } else{
                        $GLOBALS['username'] = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later. [Error UA101]";
                }

                // Close statement (Security purposes)
                mysqli_stmt_close($stmt);
            }
        }
    }

?>
