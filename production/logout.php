<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();

	if(isset($_SESSION['usr_id'])){

	session_unset($_SESSION['usr_id']);
	session_destroy();
	}



	header('Location: login.php');

?>