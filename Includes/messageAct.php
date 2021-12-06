<?php

if(isset($_POST["submit"])){
	session_start();
	$rUID = $_SESSION["id"];
  $sUID = $_GET['userid'];
	$Mess = $_POST['forumPost'];
	include_once 'dbConnection.php';
	include_once 'function-inc.php';
	
	if (emptyMess($Mess)!== false){
		header("location: ../index.php?error=emptyinput");
		exit();

	}

	createMess($dbConnection, $rUID, $sUID, $Mess);

	}else{
	
  header("location: ../message.php?userid=$rUID");
	exit();
	}
	


?>
