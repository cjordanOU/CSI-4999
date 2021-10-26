<?php

if(isset($_POST["submit"])){

	$postMess = $_POST['forumPost'];
	$postTitle = $_POST['title'];
	include_once 'conn.php';
	include_once 'function-inc.php';
	
	if (emptyPost($postMess, $postTitle)!== false){
		header("location: ./post-thread.php?error=emptyinput");
		exit();

	}

	createPost($conn, $postMess, $postTitle);

	}else{
	
	header("location: ./post-thread.php");
	exit();
	}
	
	