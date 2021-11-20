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
    $username = "";
    $password1 = "";

    function loginProcesser() {
        loginCheckBasic();  // Checks if user is already logged in

        // Define variables and initialize with empty values
        //$username = $password = "";
        //$username_err = $password_err = $login_err = "";
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
                    echo "Something went wrong. Please try again later.";
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
                    echo "Oops! Something went wrong. Please try again later. [validateSignupUsername()]";
                }

                // Close statement (Security purposes)
                mysqli_stmt_close($stmt);
            }
        }
    }

?>
