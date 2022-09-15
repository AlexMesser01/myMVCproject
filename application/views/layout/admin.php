<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../source/css/layout.css">
    <title>Default</title>
</head>
<body>
<div id="wrapper">   
<div class="cart_wrap">
   
    <?foreach($cart as $value):?>
            <div class="order">
                <div class="ord_desc">
                    <div class="prod_name"><?=$value["ord_product"];?></div>
                    <div><span class="count_list">Количество: <?=$value["ord_count"];?></span><span> Цена:  <?=$value["ord_sum"];?></span></div>
                </div>
                <div class="ord_cls">X</div>
            </div>
    <?endforeach;?>
</div>
    <header class="header">
        <div class="top_navigation">
            <a class="logo" href="/">Логотип</a>
                <img class="cart" class src="../source/img/cart.png" alt="">
            <span class="close_menu">
                <span class="mid_line"></span>
            </span>
        </div>
        <div class="top_navigation_main">
                    <ul class="main_menu">
                        <li class="menu_list">
                        <a class="menu_top_name">Новости</a>
                            <ul class="submenu">
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc">Все Новости</div>
                                        <p class="sub_cont_desc"><a href="/news/all?page=1">Просмотр общих новостей</a></p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                <div class="submenu_content">
                                        <div class="sub_cont_desc">Подписки</div>
                                        <p class="sub_cont_desc"><a href="/news/subscribes">Просмотр доступных подписок</a></p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                <div class="submenu_content">
                                        <div class="sub_cont_desc">Панель Администратора</div>
                                        <p class="sub_cont_desc"><a href="/admin/control">Просмотр панели администратора</a></a></p>
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
                                        <div class="sub_cont_desc_name">Пользователи</div>
                                        <p class="sub_cont_desc">Просмотр всех пользователей</p>
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
                                        <div class="sub_cont_desc">Войти в профиль</div>
                                        <p class="sub_cont_desc"><form action="/" method="post"><div><a  href="/profile/user">Мой профиль</a></div></form></p>
                                    </div>
                                </li>
                                <li class="menu_item">
                                    <div class="submenu_content">
                                        <div class="sub_cont_desc">Выйти из профиля</div>
                                        <form class="sub_cont_desc" action="/" method="post"><input type="submit" id="logout" name="logout" value="Logout"></form>
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
                
                <img class="show_profile" class src="<?="..".explode("/home/o/o968434f/o968434f.beget.tech/public_html", $_SESSION["user"]["is_auth"]["Avatar"])[1];?>" alt="">
                <div><?=$_SESSION["user"]["is_auth"]["Firstname"]?></div>
                
                </div>
        </div>
        
        </div>
        </header>
        
        <?=$content;?>
        <footer class="footer">
            
        </footer>
        </div>
        <script type="text/javascript" src="../source/scripts/script.js"></script>
            <script type="text/javascript" src="../source/scripts/profile_link.js"></script>
                <script src="../source/scripts/purchase.js"></script>

</body>
</html>