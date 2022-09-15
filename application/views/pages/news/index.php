<div class="selectedNews">
    <?if($_SESSION["user"]["layout"] != "Admin"):?>
    <div class="cur_news">
        <?php foreach($current_news as $key => $value): ?>
        <h1><?=$value["tittle"];?></h1>
        <h2>Дата публикации: <?=$value["pulic_date"];?> Автор статьи: <?=$value["Author"];?></h2>
        <h2>Категория: <?=$value["category"];?></h2>
        <h2><?=$value["content"];?></h2>
        <?php endforeach; ?>
    </div>
    <?else:?>
    <?php foreach($current_news as $key => $value): ?>
    
        <div class="cur_news">
        <?php foreach($current_news as $key => $value): ?>
        <h1><?=$value["tittle"];?></h1>
        <h2>Дата публикации: <?=$value["pulic_date"];?> Автор статьи: <?=$value["Author"];?></h2>
        <h2>Категория: <?=$value["category"];?></h2>
        <h2><?=$value["content"];?></h2>
        <?php endforeach; ?>
        </div>
    
        <form method="post" action="<?=$_SERVER["REQUEST_URI"];?>">
            
            <h1>Изменить название статьи: <input type="text" name="tittle" placeholder="<?=$value["tittle"];?>"></h1>
            <h2>Дата публикации: <input type="date" name="news_date"></h2>
            <h2>Автор статьи: <select name="author">
                <? foreach($author as $value): ?>
                    <option value="<?=$value["Firstname"];?>"><?=$value["Firstname"];?></option>
                <? endforeach; ?>
            </select></h2>
            <h2>Новостная категория: <select name="category">
                <? foreach($category as $value): ?>
                    <option value="<?=$value["category_name"];?>"><?=$value["category_name"];?></option>
                <? endforeach; ?>
            </select></h2></br>
            <textarea name="descript" placeholder="Описание статьи..." col="5" row="30"></textarea><br>
            <input type="submit" name="change_news">
        </form>
        <?php endforeach; ?>
    <?endif;?>
    
</div>
<html>
    <link rel="stylesheet" type="text/css" href="../source/css/news.css">
</html>