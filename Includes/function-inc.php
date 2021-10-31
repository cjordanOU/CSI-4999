<?php
  /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // Function-inc script
    // Description goes here.
    /* ------------------------------------------------------------------------------------- */

  function emptyPost($postMess, $postTitle){
    $result;
  
    if (empty($postMess) || empty($postTitle)){
      $result = true;
  
    }else{
      $result = false;
  
    }
  
    return $result; 
  }
  
  function createPost($dbConnection, $postMess, $postTitle){
  
    $sql = "INSERT INTO posts (User_Info_USER_ID, CONTENT, TITLE, POST_TIME)
    VALUES ('1', '$postMess', '$postTitle', CURRENT_TIMESTAMP) ";
  
    if ($dbConnection ->query($sql) === TRUE){
      echo " New record created successfully";
    }else{
      echo "Error: " . $sql . "<BR>". $conn->error;
  
    }
    $dbConnection ->close();
  
    header("location: ../posts.php?error=none");
    exit();
  }

?>