<?php
	session_start();
	if(isset($_POST["submit"])){

		$postMess = $_POST['forumPost'];
		$postTitle = $_POST['title'];
		$uid = $_SESSION["id"];
		$cid = $_GET["Categories"];
		include_once 'dbConnection.php';
		include_once 'function-inc.php';
		
		if (emptyPost($postMess, $postTitle)!== false){
			header("location: ../posts.php?error=emptyinput");
			exit();
		}

		createPost($dbConnection, $uid, $cid, $postMess, $postTitle);

	}
	
	else{
		header("location ../thread.php?");
		exit();
	}
?>
	