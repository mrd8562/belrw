<?php 
	session_start();
	include '../db.php';
	unset($_SESSION['user']);
	header('Location: ../');

?>

