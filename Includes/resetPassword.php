<?php

if (isset($_POST["passReset"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pass"];
    $passwordVerify = $_POST["pass-verify"];

    if (empty($password) || empty($passwordVerify)) {
        header("Location: ../new-password.php?newpass=empty");
        exit();
    } else if ($password != $passwordVerify) { 
        header("Location: ../new-password.php?newpass=donotmatch");
        exit();
    }
    $todaysDate = date("U");

    require 'dbConnection.php';

    $dbConnection = $GLOBALS['dbConnection'];
    $sql = "SELECT * FROM passwdreset WHERE resetSelector=? AND resetExpires >= ?";
    $stmt = mysqli_stmt_init($dbConnection);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "An error has occurred!";
        exit();
    }   else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $todaysDate);
        mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
        echo "Request is invalid! Please re-submit.";
        exit();
    } else {
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["resetToken"]);

        if ($tokenCheck === false) {
            echo "Request is invalid! Please re-submit.";
            exit();
        } elseif ($tokenCheck === true){

            $tokenEmail = $row['resetEmail'];

            $dbConnection = $GLOBALS['dbConnection'];
            $sql = "SELECT * FROM user_info WHERE EMAIL_ADDRESS=?;";
            $stmt = mysqli_stmt_init($dbConnection);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                echo "An error has occurred!";
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
        echo "An error has occured ";
        exit();
    } else {
        $dbConnection = $GLOBALS['dbConnection'];
        $sql = "UPDATE user_info SET PASSWORD=? WHERE EMAIL_ADDRESS=?";
        $stmt = mysqli_stmt_init($dbConnection);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "An error has occurred!";
            exit();
        } else {
            $newPassHash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $newPassHash, $tokenEmail);
            mysqli_stmt_execute($stmt);

            $dbConnection = $GLOBALS['dbConnection'];
            $sql = "DELETE FROM passwdreset WHERE resetEmail=?";
            $stmt = mysqli_stmt_init($dbConnection);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                echo "An error has occurred!";
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location: ../login.php?newpass=passwordupdated");
            }
        }
    }
}
        }

    }
}
} else {
    header("Location: ../index.php");
}
