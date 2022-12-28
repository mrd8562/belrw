    <body>
 
            
    <!--Шапка-->
    <div class="header-block">
        <div class="content-header">
            
            <div class="menu-header">
                <ul class="hr" id="myTopnav">
                    <li><a class="header-link" href="https://www.rw.by/corporate/contacts/">Информация</a></li>
                    <li><a class="header-link" href="/">Категории</a></li>
                </ul>
            </div>
            
            <ul class="auth">
                <?php
                    if ($_SESSION['user']['login']) {
                        global $id_user;
                        $id_user = $_SESSION['user']['user_id'];
                         echo 
                         '<li class="welcome_user">Здравствуй, ' .$_SESSION['user']['login']. '</li>
                          <li>
                            <a id="open-login-form" class="header-link" href="auth/logout.php">
                                <span class="left-label">Выйти</span>
                            </a>
                          </li>';
                    } else {
                        echo 
                        '<li id="login">
                            <a id="open-login-form" class="header-link" href="/login.php">

                        <span class="left-icon">
                            <i class="fas fa-unlock"></i>
                        </span>
                        <span class="left-label">Войти</span>
                    </a>
                </li>
                <li id="register">
                    <a id="open-reg-form" class="header-link" href="/reg.php">
                        <span class="left-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="left-label">Зарегистрироваться</span>
                        
                    </a>
                </li>';
                    }

                ?>
                
            </ul>
            
            <div class="search-box">
                

                <div class="vl"></div>
                <form action="/search.php">
                    <div class="search">
                        <input class="label-search" type="search" name="query" placeholder = "Найти...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>