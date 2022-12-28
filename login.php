<?php
    session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    
    <link href="libs/font/Roboto-Bold.ttf" rel="stylesheet">
    <link href="libs/font/Roboto-Regular.ttf" rel="stylesheet">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/png">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/libs/font/fontawesome/css/all.min.css">
</head> 
</body>
<div class="popup-bg">
   <div class="popup">
    <form action="/auth/signin.php" method="post">
        <h1 class="title_auth">Вход</h1>
        <div class="btn">
            <a class="button_subs" href="#">
                <span class="text-facebook">
                    <span class="button__ico">
                        <i class="fab fa-facebook-f"></i>
                    </span>
                    <span>Facebook</span>
                </span>
            </a>
        </div>
        <div class="btn">
            <a class="button_subs" href="#">
                <span class="text-google">
                    <span class="button__ico">
                        <i class="fab fa-google"></i>
                    </span>
                    <span>GOOGLE</span>
                </span>
            </a>
        </div>
        <div class="btn">
            <a class="button_subs" href="#">
                <span class="text-twitter">
                    <span class="button__ico">
                        <i class="fab fa-twitter"></i>
                    </span>
                    <span>Twitter</span>
                </span>
            </a>
        </div>
        <p class="text_auth">или используйте данные для входа в систему</p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="password_check"> ' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <p class="text_auth">Нет аккаунта? Щелкните здесь, чтобы <a class="registration_link" href="/reg.php">Зарегистрироваться</a></p>
        <input type="checkbox" class="custom-checkbox" id="happy" name="happy" value="yes">
        <label class="text_lab" for="happy">Запомнить меня</label>
        <button type="submit">Войти</button>
    </form>
</div>
</div>
</body>  
</html> 