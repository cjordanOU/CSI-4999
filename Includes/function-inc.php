<?php

  function emptyPost($postMess, $postTitle){
    $result;
  
    if (empty($postMess) || empty($postTitle)){
      $result = true;
  
    }else{
      $result = false;
  
    }
  
    return $result; 
  }
  
  function createPost($conn, $postMess, $postTitle){
  
    $sql = "INSERT INTO posts (User_Info_USER_ID, CONTENT, TITLE, POST_TIME)
    VALUES ('1', '$postMess', '$postTitle', CURRENT_TIMESTAMP) ";
  
    if ($conn ->query($sql) === TRUE){
      echo " New record created successfully";
    }else{
      echo "Error: " . $sql . "<BR>". $conn->error;
  
    }
    $conn ->close();
  
    header("location: ../posts.php?error=none");
    exit();
  }

?>