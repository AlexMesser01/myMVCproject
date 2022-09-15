<div class="wrap">
<main id="content">
            <div class="homepage">
                <div></div>
                <div>
                <div class="tittle_of_articles">Последние статьи</div>
                <div class="articles_page">
                    <?php  foreach($news as $key =>  $value): ?>
                    <div class="article">
                        <a class="desc_of_art" href="news/index?<?=array_search($value["id_news"], $news[$key])?>=<?=$value["id_news"];?>"><?=$value["tittle"]?></a>
                        <p class="desc_of_art"><?=$value["category"];?></p>
                        <p class="desc_of_art transparent_desc"><?=$value["content"]; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <section class="slider_box">
                    <span class="prev"></span>
                    <div>
                    <img class="slider_img current_img" src="../source/img/HTML.png" alt="">
                    <img  class="slider_img" src="../source/img/CSS.png" alt="">
                    <img  class="slider_img" src="../source/img/JS.png" alt="">
                    </div>
                    <div class="dots_list">
                        <div class="dots current_dots"></div>
                        <div class="dots"></div>
                        <div class="dots"></div>
                    </div>
                    <span class="next"></span>
                </section>
                <section class="news">
                    <div class="tittle_of_news">Последние новости: </div>
                    <div class="list_news">
                        <?php foreach($news as $key => $value): ?>
                        <div class="newses">
                            <p><?=$value["tittle"];?></p>
                            <p><?=$value["pulic_date"];?></p>
                        </div>
                        <?php endforeach; ?>
                        <div class="prog_bar">
                <div class="bar"></div>
            </div>
                    </div>
                </section>
                
                <div></div>
            </div>
        </main>
    </div>

<html lang="en">

<link rel="stylesheet" type="text/css" href="../source/css/content.css">
<script type="text/javascript" src="../source/scripts/slider.js"></script>
<script type="text/javascript" src="../source/scripts/progress.js"></script>
</html>