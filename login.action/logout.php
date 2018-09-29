<?php
	session_start();
	session_unset(); 
	$_SESSION['user']="0";

	header("Location: ../index.php");
	
?>