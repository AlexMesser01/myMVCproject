<div class="wrap">
    <?php foreach($current_prod as $value): ?>
        <div class="cur_news">
            <img class="prod_img" src="<?="..".explode("/home/o/o968434f/o968434f.beget.tech/public_html", $value["prod_img"])[1];?>">
        <h1>Название продукта: <?=$value["prod_name"];?></h1>
        <h2>Описание : <?=$value["prod_desc"];?></h2>
        <h2>Доступно: <?=$value["avaliable"];?></h2> <h2> Стоимость за единицу: <?=$value["prod_price"];?></h2>
        
        </div>
    
        <form id="edit_prod" method="post" enctype="multipart/form-data" action="<?=$_SERVER["REQUEST_URI"];?>">
            <h1>Изменить название продукта:</h1>
            <input required type="text" name="prod_name" placeholder="<?=$value["prod_name"];?>">
            <h2>Изображение:</h2><input required type="file" name="ava" placeholder="Изображение...">
            <h2>Доступно: </h2><input required type="number" name="available" placeholder="<?=$value["avaliable"];?>">
            <h2>Стоимость за единицу: </h2><input required type="number" name="pord_price" placeholder="<?=$value["prod_price"];?>">
            <textarea required name="prod_desc" placeholder="Описание статьи..." cols="60" rows="10"></textarea><br>
            <input  type="submit" name="change_prod">
        </form>
    <?php endforeach; ?>
</div>
<html>
    <link rel="stylesheet" type="text/css" href="../source/css/news.css">
</html>