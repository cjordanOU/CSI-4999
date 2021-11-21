<?php
  
  /* ------------------------------------------------------------------------------------- */
    // Grizzchat © 2021
    // Function-inc script
    // emptyPost/emptyReply function checks if a user leaves the textbox blank if so does
    // it does not allow the user to post.
    // creatPost/creatReply function creates a the post by inserting the message into the database
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
  
  function createPost($dbConnection, $uid, $postMess, $postTitle){
  
    $sql = "INSERT INTO threads (User_Info_USER_ID, Categories_CATEGORIES_ID, THREAD_TITLE, THREAD_CONTENT, CREATED, Views)
    VALUES ('$uid', '1', '$postTitle', '$postMess', CURRENT_TIMESTAMP, '1') ";
  
    if ($dbConnection ->query($sql) === TRUE){
      echo " New record created successfully";
    }else{
      echo "Error: " . $sql . "<BR>". $dbConnection->error;
  
    }
    $dbConnection ->close();
  
    header("location: ./post-thread.php?error=none");
    exit();
  }

  function emptyReply($postMess){
    $result;
  
    if (empty($postMess)){
      $result = true;
  
    }else{
      $result = false;
  
    }
  
    return $result; 
  }

  function createReply($dbConnection, $uid, $postMess){
  
    $sql = "INSERT INTO posts (User_Info_USER_ID, Parent_THREAD, CONTENT, POST_TIME)
    VALUES ('$uid', '4', '$postMess', CURRENT_TIMESTAMP) ";
  
    if ($dbConnection->query($sql) === TRUE){
      echo " New record created successfully";
    }else{
      echo "Error: " . $sql . "<BR>". $dbConnection->error;
  
    }
    $dbConnection ->close();

    header("location: ./post-thread.php?error=none");
    exit();
  }

?>