<?php 
	session_start();
	include '../db.php';
	$email = $_POST['email'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];

	if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $_POST['email'])) {
		if ((strlen($_POST['password']) > 8)) {
			if ((strlen($_POST['login']) > 6)) {
				if ((empty($_POST['email']['login']['password']))) {
					if ($password === $password_confirm) {
						$password = md5($password);
						mysqli_query($db, "INSERT INTO `user` (`user_id`, `email`, `login`, `password`) VALUES (NULL, '$email', '$login', '$password')");
						$_SESSION['message'] = 'Регистрация прошла успешно!';
						header('location: ../login.php');
					} else{
						$_SESSION['message'] = 'Пароли не совпадают!';
						header('location: ../reg.php');
					}
				} else{
					$_SESSION['message'] = 'Введите данные для регистрации!';
					header('location: ../reg.php');
				}
			} else{
				$_SESSION['message'] = 'Логин должен содержать больше 6 символов!';
				header('location: ../reg.php');
			}
		} else{
			$_SESSION['message'] = 'Пароль должен содержать больше 8 символов!';
			header('location: ../reg.php');
		}
	}else{
		$_SESSION['message'] = 'Адрес указан не правильно.';
		header('location: ../reg.php');
	}
?>

