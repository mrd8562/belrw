<?php session_start();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>

    <link href="libs/font/Roboto-Bold.ttf" rel="stylesheet">
    <link href="libs/font/Roboto-Regular.ttf" rel="stylesheet">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/png">
    <link rel="stylesheet" href="/styles/main.css">
    <!-- <link rel="stylesheet" href="/styles/category_styles.css"> -->
    <link rel="stylesheet" href="/libs/font/fontawesome/css/all.min.css">
</head> 
</body>   
<div class="popup-reg">
 <div class="popup__block">
    <form action="auth/signup.php" method="post" enctype="multipart/form-data">
        <h1 class="title_auth">Регистрация</h1>
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
        <p class="text_auth">или введите учетные данный для регистрации</p>
        <input type="text" value="" name="email" placeholder="E-mail">
        <input type="text" value="" name="login" placeholder="Логин">
        <?php
            if ($_SESSION['message']) {
                echo '<p class="password_check"> ' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
        <input type="password" value="" name="password" placeholder="Пароль">
        <input type="password" value="" name="password_confirm" placeholder="Подтвердите пароль">
        <p class="text_auth">Уже есть аккаунт? Щелкните здесь, чтобы <a class="auth_link" href="/login.php">Войти</a></p>
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
</div>
</body>  
</html>      