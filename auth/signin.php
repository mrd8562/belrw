<?php 
	session_start();
	include '../db.php';


	$login = $_POST['login'];
	$password = md5($_POST['password']);

	$check_user = mysqli_query($db, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");

	if (mysqli_num_rows($check_user) > 0) {

		$user = mysqli_fetch_assoc($check_user);

		$_SESSION['user'] = [
			"login" => $user['login'],
			"user_id" => $user['user_id']
		];

		header('location: ../index.php');

	} else {
		$_SESSION['message'] = 'Не верный логин или пароль!';
		header('location: ../login.php');
	}
?>

