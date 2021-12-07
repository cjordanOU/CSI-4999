<?php

if (isset($_POST["new-password-request"])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "localhost/CSI-4999-post-reply/new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'dbConnection.php';
    
    $userEmail = $_POST["email"];

    $dbConnection = $GLOBALS['dbConnection'];
    $sql = "DELETE FROM passwdreset WHERE resetEmail=?";
    $stmt = mysqli_stmt_init($dbConnection);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "An error has occurred!";
        exit();
    }   else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $dbConnection = $GLOBALS['dbConnection'];
    $sql = "INSERT INTO passwdreset (resetEmail, resetSelector, resetToken, resetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($dbConnection);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "An error has occurred!";
        exit();
    }   else {
        $hashToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);

    $to = $userEmail;

    $subject = 'Reset your GrizzChat Password!';

    $message = '<p>You are receiving this email because
    you have requested to have your password reset. Please follow the link
    to do so!</p>';
    $message .= '<p>Here is your link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';
    
    $headers = "From: GrizzChat <csi4999.fa21@gmail.com>\r\n";
    $headers .= "Reply-To: csi4999.fa21@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email successfully sent to $to";
    } else {
        echo "Email sending failed";
    }

    //header("Location: ../reset-password.php?reset=success");

} else {
    header("Location: ../index.php");
}