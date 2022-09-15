<div class="wrap">
    <div class="cur_news">
        <?php foreach($output as $key => $value): ?>
            <div class="news_output">
            <h1><?=$value["tittle"];?></h1>
            <h2>Дата публикации: <?=$value["pulic_date"];?> Автор статьи: <?=$value["Author"];?></h2>
            <h2>Категория: <?=$value["category"];?></h2>
            <h2><?=$value["content"];?></h2>
            </div>
        <?php endforeach; ?>
        <div><?foreach($navigate as $value):?><?=$value;?><?endforeach;?></div>
        <div class="user_out">

    </div>
    </div>
</div>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../source/css/news.css">
</html>