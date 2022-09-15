<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../source/css/layout.css">
    <title>Document</title>
</head>

<body id="over">
            <div class="authorization">
                <div id="modal_cls">
                    
                </div>
                <div class="modal_switch">
                        <p class="r">Регистрация</p>
                        <p class="a">Авторизация</p>
                </div>
                    <form class="login" action="/request/autentification" method="post">
                        <div class="input_wrap">
                            <div class="check_wrap">
                                <p>Введите почту:</p>
                            <input type="email" name="email" value="" required>
                                <p class="err_output"><? if (isset($_SESSION["auth_error"])): ?>  <?=$_SESSION["auth_error"];?><?endif;?></p>
                            </div>
                            <div class="check_wrap">
                                <p>Введите пароль:</p>
                                <input type="password" name="pswrd" value="" required>
                            </div>
                            
                        </div>
                        <input type="submit" name="auth_send" value="Войти">
                    </form>
                    <form class="registr" action="/request/autentification" method="post">
                        <div class="input_wrap">
                            <div class="check_wrap">
                                <p>Введите логин:</p>
                                <input type="text" name="username" value="" required>
                            </div>
                            <div class="check_wrap">
                                <p>Введите почту:</p>
                                <input type="email" name="email" value="" required pattern="([a-z]+[0-9]+)\@[a-z]+\.([ru|com|gov|edu|uk|au]+)">
                                <p class="err_output"><? if (isset($_SESSION["reg_error"])): ?>  <?=$_SESSION["reg_error"];?><?endif;?></p>
                            </div>
                            <div class="check_wrap">
                                <p>Введите пароль:</p>
                                <input type="password" name="pswrd" value="">
                            </div>
                        </div>
                        <input type="submit" name="reg_send" value="Зарегестрирваться">
                    </form>
            </div>  
    <div id="overlay">
            <header class="header">
        <div class="top_navigation">
            <a class="logo" href="/">Логотип</a>
            <span class="close_menu">
                <span class="mid_line"></span>
            </span>
        </div>
        <div class="top_navigation_main">
                    <ul class="main_menu">
                        <li class="menu_list">
                        <a class="menu_top_name">Гайды</a>
                            <ul class="submenu">
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc">CSS</div>
                                        <p class="sub_cont_desc">Обучение ксакадным стилям и их расширениям</p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                <div class="submenu_content">
                                        <div class="sub_cont_desc">PHP</div>
                                        <p class="sub_cont_desc">Актуальность струтурного программирования</p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                <div class="submenu_content">
                                        <div class="sub_cont_desc">JavaScript</div>
                                        <p class="sub_cont_desc">Актуальность стандартной версии</p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                <div class="submenu_content">
                                        <div class="sub_cont_desc">MySQL</div>
                                        <p class="sub_cont_desc">Подключение и использование в ООП</p>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li class="menu_list">
                        <a class="menu_top_name">Ссылки</a>
                            <ul class="submenu">
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc_name">HTTP</div>
                                        <p class="sub_cont_desc">Работа с запросами на сервере</p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc">Laravel</div>
                                        <p class="sub_cont_desc">Все преимущества фреймворка</p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc">CSS</div>
                                        <p class="sub_cont_desc">Обучение ксакадным стилям и их расширениям</p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc">CSS</div>
                                        <p class="sub_cont_desc">Обучение ксакадным стилям и их расширениям</p>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li class="menu_list">
                        <a class="menu_top_name">Справочник</a>
                            <ul class="submenu">
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc">FAQ</div>
                                        <p class="sub_cont_desc">Справочная служба для пользователей</p>
                                    </div>
                                </li>
                            </ul>
                        </li>


                    </ul>

        <div class="top_header_set">
            <div class="header_search">
                <div id="form">
                    <input type="text" name="content" id="srch_area" class="serach">
                    <button  class="srch_btn_cls" id="clear_btn"></button>
                    <button  class="srch_btn" id="send"></button>
                </div>
                <div class="search_menu">
                    <div>
                        <div class="newses">

                        </div>
                    </div>
                </div>
            </div>

            <div class="auth">
                <img class="show_modal" class src="../source/img/user2.png" alt="">
            </div>
        </div>
        
        </div>
        </header>
        
        <?=$content;?>
        <footer class="footer">
            
        </footer>
    </div>
    <script type="text/javascript" src="../source/scripts/script.js"></script>

        <script type="text/javascript" src="../source/scripts/overlay.js"></script>
        
        <script type="text/javascript" src="../source/scripts/modal.js"></script>
</body>
</html>