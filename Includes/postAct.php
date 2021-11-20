<?php
	session_start();
	if(isset($_POST["submit"])){

		$postMess = $_POST['forumPost'];
		$postTitle = $_POST['title'];
		$uid = $_SESSION["id"];
		include_once 'dbConnection.php';
		include_once 'function-inc.php';
		
		if (emptyPost($postMess, $postTitle)!== false){
			header("location: ./post-thread.php?error=emptyinput");
			exit();
		}

		createPost($dbConnection, $uid, $postMess, $postTitle);

	}
	
	else{
		header("location: ./post-thread.php");
		exit();
	}
?>
	