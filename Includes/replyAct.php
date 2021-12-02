<?php

if(isset($_POST["submit"])){

	session_start();
	$uid = $_SESSION["id"];
	$replyMess = $_POST['forumPost'];
	$tid = $_GET['THREADS_ID'];
	include_once 'dbConnection.php';
	include_once 'function-inc.php';
	
	if (emptyReply($replyMess)!== false){
		header("location: ../index.php?error=emptyinput");
		exit();

	}

	createReply($dbConnection, $tid, $uid, $replyMess);

	}else{
	
  header("location: ../posts.php");
	exit();
	}
	
	